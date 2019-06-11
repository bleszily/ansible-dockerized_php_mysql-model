<?php
$servername = "mysql_container";
$username = "joseph";
$password = "123456";
$dbname = "bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT fname, lname, title FROM employee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
echo "<table border='1'>";
        echo "<tr><th>" . "FirstName" . "</th><th>" . "LastName" . "</th><th>" . "Title" . "</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["fname"]. "</td><td>" . $row["lname"]. "</td><td>" . $row["title"]. "</td></tr>";
    }
echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>
