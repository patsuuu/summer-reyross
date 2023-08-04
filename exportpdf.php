<?php

include "fpdf184/fpdf.php";
include "conn.php";

if (isset($_GET['title'])) {
    $title = $_GET['title'];

    $sql = "SELECT * FROM data WHERE title = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $title);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $details = $row['details'];
        $authors = $row['authors'];

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(50, 12, 'Title', 1, 0, 'C');
        $pdf->Cell(50, 12, 'Details', 1, 0, 'C');
        $pdf->Cell(50, 12, 'Authors', 1, 1, 'C');

        $pdf->Cell(50, 12, $title, 1, 0, 'C');
        $pdf->Cell(50, 12, $details, 1, 0, 'C');
        $pdf->Cell(50, 12, $authors, 1, 1, 'C');

        header('Content-Type: application/pdf');
        $pdf->Output();
    } else {
        echo "No record found!";
    }

    $stmt->close();
    $con->close();
} else {
    echo "Invalid or missing 'title' parameter!";
}
?>
