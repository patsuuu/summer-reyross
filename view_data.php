    <?php
include "conn.php";

function exportToPDF($title, $details, $authors) {
    require('fpdf.php');

    // Create a new PDF document
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('Arial', 'B', 16);

    // Add title, details, and authors to the PDF
    $pdf->Cell(0, 10, 'Title: ' . $title, 0, 1);
    $pdf->Cell(0, 10, 'Details: ' . $details, 0, 1);
    $pdf->Cell(0, 10, 'Authors: ' . $authors, 0, 1);

    // Output the PDF
    $pdf->Output();
}

if (isset($_GET['title'])) {
    $title = $_GET['title'];

    // Fetch data from the 'data' table based on the title
    $sql = "SELECT * FROM data WHERE title = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $title);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $details = $row['details'];
        $authors = $row['authors'];

        // Display the data
        echo "<center>";
        echo "<h2>View Data</h2>";
        echo "<p><strong>Title:</strong> " . $title . "</p>";
        echo "<p><strong>Details:</strong> " . $details . "</p>";
        echo "<p><strong>Authors:</strong> " . $authors . "</p>";
        echo "<p><a href='javascript:exportPDF()'>Export to PDF</a></p>";
        echo "</center>";

        echo "<script>
                function exportPDF() {
                    window.location.href = 'exportpdf.php?title=" . urlencode($title) . "&details=" . urlencode($details) . "&authors=" . urlencode($authors) . "';
                }
              </script>";
    } else {
        echo "Data not found!";
    }

    $stmt->close();
} else {
    echo "Invalid request!";
}

$con->close();
?>
