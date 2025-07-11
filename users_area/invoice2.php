<?php
require_once('../tcpdf/tcpdf.php'); // Adjust the path to TCPDF as per your project

// Start the session
session_start();

// Connect to the database and fetch data from pending_orders table
include('../connect.php');

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    echo "User not logged in.";
    exit; // Stop execution
}
$invoice_number = $_GET['invoice_number'];
$username = $_SESSION['username'];

// Fetching user data from user_table
$select_user = "SELECT * FROM user_table WHERE username = '$username'";
$result_user = mysqli_query($conn, $select_user);
$data = mysqli_fetch_array($result_user);

// Create PDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Company Name');
$pdf->SetTitle('Invoice for ' . $username);
$pdf->SetSubject('Invoice');
$pdf->SetKeywords('Invoice, TCPDF, PHP');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Header
$pdf->Cell(0, 10, 'FurniMart Furniture Store', 0, 1, 'C');
$pdf->Cell(0, 7, 'Id: ' . $data['user_id'], 0, 1, 'L');
$pdf->Cell(0, 7, 'Name: ' . $data['username'], 0, 1, 'L');
$pdf->Cell(0, 7, 'Email: ' . $data['user_email'], 0, 1, 'L');
$pdf->Cell(0, 7, 'Address: ' . $data['user_address'], 0, 1, 'L');
$pdf->Ln(10);

// Table header
$pdf->Cell(30, 10, 'Product ID', 1, 0, 'C');
$pdf->Cell(60, 10, 'Product Title', 1, 0, 'C');
$pdf->Cell(30, 10, 'Quantity', 1, 0, 'C');
$pdf->Cell(30, 10, 'Product Price', 1, 0, 'C');
$pdf->Cell(40, 10, 'Subtotal', 1, 1, 'C');

$total_price = 0; // Initialize the total price variable

// Fetch data from pending_orders table based on the logged-in user's user_id
//$select_pending_orders = "SELECT * FROM pending_orders WHERE user_id = " . $data['user_id'];
$select_pending_orders = "SELECT * FROM pending_orders WHERE invoice_number =$invoice_number ";
$result_pending_orders = mysqli_query($conn, $select_pending_orders);

// Table data
while ($row = mysqli_fetch_array($result_pending_orders)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $quantity = $row['quantity'];
    $product_price = $row['product_price'];
    $subtotal = $row['product_price'] * $row['quantity'];
    $total_price += $subtotal; // Accumulate subtotal for each item

    $pdf->Cell(30, 10, $product_id, 1, 0, 'C');
    $pdf->Cell(60, 10, $product_title, 1, 0, 'C');
    $pdf->Cell(30, 10, $quantity, 1, 0, 'C');
    $pdf->Cell(30, 10, 'INR ' . number_format($product_price, 2), 1, 0, 'C');
    $pdf->Cell(40, 10, 'INR ' . number_format($subtotal, 2), 1, 1, 'C');
}

// Grand Total
$pdf->Cell(150, 10, 'Grand Total', 1, 0, 'R');
$pdf->Cell(40, 10, 'INR ' . number_format($total_price, 2), 1, 1, 'C');

$pdf->Cell(180, 50, 'Signature', 0, 1, 'R');

// Output the PDF
$pdf->Output('invoice_' . $username . '.pdf', 'I');
?>
