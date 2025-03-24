<?php
require('fpdf.php');
include 'db.php';

$user_id = $_GET['user_id'];

$result = $conn->query("SELECT * FROM users WHERE id=$user_id");
$user = $result->fetch_assoc();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, 'Resume', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, "Name: " . $user['name'], 0, 1);
$pdf->Cell(40, 10, "Email: " . $user['email'], 0, 1);
$pdf->Cell(40, 10, "Phone: " . $user['phone'], 0, 1);
$pdf->Cell(40, 10, "Address: " . $user['address'], 0, 1);

$pdf->Output('D', 'resume.pdf');
?>
