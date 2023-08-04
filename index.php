<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data List</title>
</head>
<body>
     <!-- Search Data Form -->
     <center>
        <h2></h2>
        <form method="get" action="search_data.php">
            <label>Search by Title:</label>
            <input type="text" name="search_title">
            <input type="submit" value="Search">
        </form>
    </center>
    <center>
        <h2></h2>
        
        <table border="2">
            <tr>
                <th>TITLE</th>
                <th>VIEW</th>
            </tr>

            <?php
            include "conn.php";

            // Fetch data from the 'data' table
            $sql = "SELECT * FROM data";
            $result = $con->query($sql);

            // Check if the query was successful and there are rows in the result
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $title = $row["title"];
            ?>

                    <tr>
                        <td><?php echo $title; ?></td>
                        <td><a href="view_data.php?title=<?php echo urlencode($title); ?>">View</a></td>
                    </tr>

            <?php
                }
            } else {
                echo "<tr><td colspan='2'>0 results!!</td></tr>";
            }
            $con->close();
            ?>

        </table>
    </center>



    <center>
    <a href="insert_form.php?title=<?php echo urlencode($title); ?>">Add data</a>
        </center>
    
   
</body>
</html>
