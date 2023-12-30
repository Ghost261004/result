<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Result Page</title>
     <link rel="stylesheet" href="in2style.css">
  </head>
<body>
    <form method="post" action="">
        Result ID:<br>
        <input type="text" name="Resid" required>
        <br> Register Number:<br>
        <input type="text" name="RegNo" required>
        <br> Semester:<br>
        <input type="text" name="Semester">
        <br> Subject Code:<br>
        <input type="text" name="SubCode">
        <br> Subject Name:<br>
        <input type="text" name="SubName">
        <br> Internal Mark:<br>
        <input type="text" name="Internal">
        <br> External Mark:<br>
        <input type="text" name="External">
        <br>
        <a href="#"><button id="" type="buttont" name="save" value="submit">Submit</button></a>
        <a href="admin.php"><button type="button">Back</button></a>
    </form>
</body>

</html>

<?php
if (isset($_POST['save'])) {
    $Resid = $_POST['Resid'];
    $RegNo = $_POST['RegNo'];
    $Semester = $_POST['Semester'];
    $SubCode = $_POST['SubCode'];
    $SubName = $_POST['SubName'];
    $Internal = $_POST['Internal'];
    $External = $_POST['External'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "admin";

    /* Create connection */
    $conn = new mysqli($servername, $username, $password, $dbname);

    /* Check connection */
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $insert_data_sql = "INSERT INTO res5 (Resid,RegNo,Semester,SubCode,SubName,Internal,External)
                        VALUES ('$Resid','$RegNo','$Semester','$SubCode','$SubName','$Internal','$External')";

    $update_data_sql = "UPDATE res5 SET Total = Internal+External WHERE Resid ='$Resid'";

    if ($conn->query($insert_data_sql) === TRUE) {
        echo "Data Inserted successfully<br>";

        // Execute query to update Total
        if ($conn->query($update_data_sql) === TRUE) {
            echo "Total Updated successfully<br>";
        } else {
            echo "Error updating Total: " . $conn->error . "<br>";
        }

    } else {
        echo "Error inserting data: " . $conn->error . "<br>";
    }

    $conn->close();
}
?>
