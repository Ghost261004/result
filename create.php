<?php
$servername = "localhost";
$username = "root";
$password = "";/* Put your password */
$dbname = "admin";/* Put your database name */

/* Create connection */
$conn = new mysqli($servername, $username, $password, $dbname);

/* Check connection */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* sql to create table */
$create_table1_sql = "CREATE TABLE std5
(
    RegNo INT NOT NULL PRIMARY KEY,
    FullName VARCHAR(50),
    dob DATE,
    CourseCode INT,
    CourseName VARCHAR(50),
    Year VARCHAR(20)
)";

$create_table2_sql = "CREATE TABLE res5
(
    Resid INT NOT NULL PRIMARY KEY,
    RegNo INT NOT NULL,
    Semester INT,
    SubCode VARCHAR(10),
    SubName VARCHAR(50),
    Internal INT,
    External INT,
    Total INT,
    FOREIGN KEY (RegNo) REFERENCES std5(RegNo)
)";

// Execute query to create table
if ($conn->query($create_table1_sql) === TRUE) {
   echo "Table1 created successfully<br>";
} else {
   echo "Error creating table1: " . $conn->error . "<br>";
}
if ($conn->query($create_table2_sql) === TRUE) {
   echo "Table2 created successfully<br>";
} else {
   echo "Error creating table2: " . $conn->error . "<br>";
}

$conn->close();
?>
