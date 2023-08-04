<?php

include 'conn.php';

// Fetch records from database
$query = $con->query("SELECT * FROM `employee` ORDER BY id ASC");

if ($query->num_rows > 0) {
    $delimiter = ",";
    $filename = "members-data_" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('id', 'name', 'salary');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as CSV and write to file pointer
    while ($row = $query->fetch_assoc()) {
        $lineData = array($row['id'], $row['name'], $row['salary']);
        fputcsv($f, $lineData, $delimiter);
    }

    // Move back to the beginning of the file
    fseek($f, 0);

    // Set headers to download file rather than display
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    // Output all remaining data on the file pointer
    fpassthru($f);
}

exit;

?>
