
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
  $Semester = $_POST['Semester'];

  // SQL query
  $sql = "SELECT std5.RegNo, std5.FullName, std5.dob, std5.CourseCode, std5.CourseName, std5.Year,
                 res5.Semester, res5.SubCode, res5.SubName, res5.Internal, res5.External, res5.Total
          FROM std5
          INNER JOIN res5 ON std5.RegNo = res5.RegNo
          WHERE std5.RegNo = $RegNo AND res5.Semester = $Semester";

  // Execute query
  $result = $conn->query($sql);

  // Check if the query was successful
  if ($result->num_rows > 0) {
      // Fetch and display the data
    $i=0;
      while ($row = $result->fetch_assoc()) {
          echo "RegNo: " . $row["RegNo"] . "<br>";
          echo "Full Name: " . $row["FullName"] . "<br>";
          echo "Date of Birth: " . $row["dob"] . "<br>";
          echo "Course Code: " . $row["CourseCode"] . "<br>";
          echo "Course Name: " . $row["CourseName"] . "<br>";
          echo "Year of Examination: " . $row["Year"] . "<br>";
          echo "Semester: " . $row["Semester"] . "<br>";
?>
   <!DOCTYPE html>
   <html lang="en" dir="ltr">
     <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Result Page</title>
       <link rel="stylesheet" href="res2style.css">
     </head>
     <body>
        <table>
          <tr>
              <th>Subject Code</th>
              <th>Subject Name</th>
              <th>Internal Mark</th>
              <th>External Mark</th>
              <th>Total Mark</th>
          </tr>

          <tr>
              <td><?php echo $row["SubCode"]; ?></td>
              <td><?php echo $row["SubName"]; ?></td>
              <td><?php echo $row["Internal"]; ?></td>
              <td><?php echo $row["External"]; ?></td>
              <td><?php echo $row["Total"]; ?></td>
          </tr>
        </table>
      </body>
    </html>
<?php
$i++;
}
}
}

 else {
      echo "No results found";
  }

  // Close connection
  $conn->close();
  ?>
