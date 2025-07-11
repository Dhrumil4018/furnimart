<?php
    include('../connect.php');
    include('../functions/common_functions.php');

    session_start(); // Start the session

    // Getting total items and total price of all items
    $ip_add = getIPAddress();
    $total_price = 0;
    $cart_items = array();
    $cart_price = "SELECT * FROM cart_details WHERE ip_address = '$ip_add'";
    $result_cart_price = mysqli_query($conn, $cart_price);
    $invoice_number = mt_rand();
    $status = 'pending';
    $count_products = mysqli_num_rows($result_cart_price);

    while ($row_price = mysqli_fetch_array($result_cart_price)) {
        $product_id = $row_price['product_id'];

        // Fetch product details from the 'products' table
        $select_product = "SELECT * FROM products WHERE product_id = $product_id";
        $run_query = mysqli_query($conn, $select_product);
        $row_product_price = mysqli_fetch_array($run_query);

        $product_price = $row_product_price['product_price'];
        $product_quantity = $row_price['quantity'];
        $subtotal = $product_price * $product_quantity;
        $total_price += $subtotal;

        // Store cart items with product title for later use
        $cart_items[] = array(
            'product_id' => $product_id,
            'product_title' => $row_product_price['product_title'], // Add product title here
            'quantity' => $product_quantity,
            'subtotal' => $subtotal,
            'product_price' => $product_price
        );
    }

    // Check if a session username exists
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        // Retrieve user_id from user_table based on username
        $user_query = "SELECT user_id FROM user_table WHERE username = '$username'";
        $user_result = mysqli_query($conn, $user_query);

        if ($user_result && mysqli_num_rows($user_result) > 0) {
            $user_row = mysqli_fetch_assoc($user_result);
            $user_id = $user_row['user_id'];

            // Inserting the order into the 'user_orders' table
            $insert_order = "INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $total_price, $invoice_number, $count_products, NOW(), '$status')";
            $result = mysqli_query($conn, $insert_order);
            if ($result) {
                echo "<script>alert('Orders submitted successfully')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            }

            foreach ($cart_items as $item) {
                $product_id = $item['product_id'];
                $product_title = $item['product_title']; // Retrieve product title from the cart_items array
                $quantity = $item['quantity'];
                $product_price = $item['product_price'];

                // Insert the pending order with product title
                $insert_pending_order = "INSERT INTO pending_orders (user_id, invoice_number, product_id, product_title, product_price, quantity, order_status) VALUES ($user_id, $invoice_number, $product_id, '$product_title', $product_price, $quantity, '$status')";
                $result_pending = mysqli_query($conn, $insert_pending_order);
            }

            // Deleting items from cart
            $empty_cart = "DELETE FROM cart_details WHERE ip_address = '$ip_add'";
            $result_delete = mysqli_query($conn, $empty_cart);
        } else {
            echo "<script>alert('User not found. Please login or register.')</script>";
            echo "<script>window.open('login.php', '_self')</script>";
        }
    } else {
        echo "<script>alert('Username not found in session. Please login.')</script>";
        echo "<script>window.open('login.php', '_self')</script>";
    }
?>
