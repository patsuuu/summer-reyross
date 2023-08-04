<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Insertion Form</title>
</head>
<body>
<a href="index.php?>">Back</a>
    <center>
        <h2>Data Insertion</h2>
        <form method="post" action="insert_data.php">
            <label>Title:</label>
            <input type="text" name="title" required><br><br>

            <label>Details:</label>
            <input type="text" name="details" required><br><br>

            <label>Authors:</label>
            <input type="text" name="authors" required><br><br>

            <input type="submit" value="Insert Data">
        </form>
    </center>
</body>
</html>
