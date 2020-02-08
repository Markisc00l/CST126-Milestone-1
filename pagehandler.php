<?php
/* 
 * Author: Mark Mislang
		File: pagehandler.html
		Date: January 21
		Description: PHP form handler to process user input for registration
		*/
?>
<?php
$hostName = "localhost";
$userName = "root";
$password = "root";
$dbName = "activity";
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dbConnect = mysqli_connect($hostName, $userName, $password);
if (!dbConnect) {
    echo "<p>Connection error: " . mysqli_connect_error(). "</p>";
}
else {
    // Selecting the database 
    if (mysqli_select_db($dbConnect, $dbName)) {
        // success
        echo "<p> Successfully select the  ". $dbName .
        " database.</p>";
        echo "<p>" . $firstName . " " . $lastName . "</p>";
        $tableName = "users"; 
        $sql = "INSERT INTO $tableName (firstName, lastName)
            VALUES('$firstName', '$lastName')";
    $result = mysqli_query($dbConnect, $sql);
    }
    else {
        echo "<p> Could not select the ". $dbName .
        " database: " .mysqli_errno($dbConnect) . "</p>";
    }
    echo "Database Closing";
    mysqli_close($dbConnect);
}
?>
