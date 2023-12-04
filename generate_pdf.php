<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF
{
    function Header()
    {
        // Set font and size for the header
        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor(31, 73, 125); // Dark blue text color
        // Title
        $this->Cell(0, 15, 'Fees Payment Status Report', 0, 1, 'C');

        // Add a line break
        $this->Ln(10);
    }

    function Footer()
    {
        // Position at 1.5 cm from the bottom
        $this->SetY(-15);

        // Set font and size for the footer
        $this->SetFont('Arial', 'I', 8);

        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();

// Database connection (you'll need to adjust this part)
$host = '127.0.0.1:3307';
$user = 'root';
$pass = '';
$dbname = 'sms';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$query = "SELECT Student_id, CONCAT(Fname, ' ', Lname) AS Name, acad_fees, hostel_fees, mess_fees FROM student";
$result = $conn->query($query);

// Set font and size for the table headers
$pdf->SetFont('Arial', 'B', 14);

// Set background color for table header
$pdf->SetFillColor(31, 73, 125); // Dark blue background
$pdf->SetTextColor(255, 255, 255); // White text color
$pdf->Cell(40, 10, 'Roll No', 1, 0, 'C', 1);
$pdf->Cell(60, 10, 'Name', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Acad Fees', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Hostel Fees', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Mess Fees', 1, 1, 'C', 1);

// Set font and size for the table data
$pdf->SetFont('Arial', '', 12);

// Set background color for alternate rows
$isEvenRow = false;

while ($row = $result->fetch_assoc()) {
    // Alternate row colors
    $fillColor = $isEvenRow ? 230 : 255; // Light gray for even rows
    $pdf->SetFillColor($fillColor);
    $pdf->SetTextColor(0, 0, 0); // Black text color

    // Table data
    $pdf->Cell(40, 10, $row['Student_id'], 1, 0, 'C', 1);
    $pdf->Cell(60, 10, $row['Name'], 1, 0, 'C', 1);
    $pdf->Cell(30, 10, $row['acad_fees'] == 1 ? 'Paid' : 'Not Paid', 1, 0, 'C', 1);
    $pdf->Cell(30, 10, $row['hostel_fees'] == 1 ? 'Paid' : 'Not Paid', 1, 0, 'C', 1);
    $pdf->Cell(30, 10, $row['mess_fees'] == 1 ? 'Paid' : 'Not Paid', 1, 1, 'C', 1);

    $isEvenRow = !$isEvenRow;
}

$conn->close();

$pdf->Output();
?>
