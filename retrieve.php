
<?php
$servername = "localhost";
$username = "root";
$password = "";/* Put your password */
$dbname = "admin";/* Put your database name */

/* Create connection */
$conn = new mysqli($servername, $username, $password, $dbname);
/* Check connection*/
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT std5.RegNo, std5.FullName, std5.dob, std5.CourseCode, std5.CourseName, std5.Year,
               res5.Semester, res5.SubCode, res5.SubName, res5.Internal, res5.External, res5.Total
        FROM std5
        INNER JOIN res5 ON std5.RegNo = res5.RegNo";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 <link rel="stylesheet" href="resstyle.css">
 </head>
<body>
<?php
if ($result->num_rows > 0) {
?>
  <table>

  <tr>
    <td>Reg No</td>
    <td>Full Name</td>
    <td>Date of Birth</td>
    <td>Course Code</td>
    <td>Course Name</td>
    <td>Year of Examination</td>
    <td>Semester</td>
    <td>Subject Code</td>
    <td>Subject Name</td>
    <td>Internal Mark</td>
    <td>External Mark</td>
    <td>Total Mark</td>
  </tr>
<?php
$i=0;
while ($row = $result->fetch_assoc()) {
?>
<tr>
    <td><?php echo $row["RegNo"]; ?></td>
    <td><?php echo $row["FullName"]; ?></td>
    <td><?php echo $row["dob"]; ?></td>
    <td><?php echo $row["CourseCode"]; ?></td>
    <td><?php echo $row["CourseName"]; ?></td>
    <td><?php echo $row["Year"]; ?></td>
    <td><?php echo $row["Semester"]; ?></td>
    <td><?php echo $row["SubCode"]; ?></td>
    <td><?php echo $row["SubName"]; ?></td>
    <td><?php echo $row["Internal"]; ?></td>
    <td><?php echo $row["External"]; ?></td>
    <td><?php echo $row["Total"]; ?></td>

</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?><br>

<a href="admin.php"><button type="button">Back</button> </a>
</body>
</html>
