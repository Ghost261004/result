`
`<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Result Page</title>
     <link rel="stylesheet" href="in1style.css">
  </head>
  <body>
	<form method="post" action="">
    Register Number:
		<input type="text" name="RegNo" required>
		<br>
		Full Name:
		<input type="text" name="FullName">
		<br>
    Date of Birth:
		<input type="text" name="dob">
		<br>
		Course Code:
		<input type="text" name="CourseCode">
		<br>
    Course Name:
		<input type="text" name="CourseName">
		<br>
    Year of Examination:
		<input type="text" name="Year">
		<br>
    <a href="admin.php"><button type="button">Back</button></a>
    <a href="insert2.php"><button type="buttont" name="save">Submit</button></a>
	</form>
  </body>
</html>

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
if(isset($_POST['save']))
{

	 $RegNo = $_POST['RegNo'];
	 $FullName = $_POST['FullName'];
   $dob = $_POST['dob'];
	 $CourseCode = $_POST['CourseCode'];
   $CourseName = $_POST['CourseName'];
   $Year = $_POST['Year'];

	 $insert_data_sql = "INSERT INTO std5 (RegNo,FullName,dob,CourseCode,CourseName,Year)
	 VALUES ('$RegNo','$FullName','$dob','$CourseCode','$CourseName','$Year')";
   // Execute query to create table
   if ($conn->query($insert_data_sql) === TRUE) {
      echo "Data Inserted successfully<br>";
   } else {
      echo "Error inserting data: " . $conn->error . "<br>";
   }
	 $conn->close();
 }
?>
