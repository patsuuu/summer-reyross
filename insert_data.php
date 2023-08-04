<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are provided
    if (isset($_POST["title"]) && isset($_POST["details"]) && isset($_POST["authors"])) {

        // Get the data from the form
        $title = $_POST["title"];
        $details = $_POST["details"];
        $authors = $_POST["authors"];

        // Include the connection script
        include "conn.php";

        // Prepare and execute the SQL query
        $sql = "INSERT INTO data (title, details, authors) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sss", $title, $details, $authors);

        if ($stmt->execute()) {
            // Data insertion successful
            echo "Data inserted successfully!";
        } else {
            // Data insertion failed
            echo "Error: " . $stmt->error;
        }

        // Close the statement and the connection
        $stmt->close();
        $con->close();
    } else {
        // Required fields not provided
        echo "Please provide all required fields!";
    }
} else {
    // Invalid request method
    echo "Invalid request!";
}
?>
