<?php

//dbinfo
$servername = "flowershop1.c1afi6dhlbym.us-west-1.rds.amazonaws.com";
$rootuser = "admin";
$password = "caseyjeanthuan";
$database = "flowershop";

//connection
$db = mysqli_connect($servername, $rootuser, $password, $database);


//check
if(!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

//get user input
$name = mysqli_real_escape_string($db, $_REQUEST['Name']);
$phonenumber = mysqli_real_escape_string($db, $_REQUEST['PhoneNumber']);

//prepared statement for user input
$insertCust = "INSERT INTO CUSTOMER (PhoneNumber, Name) VALUES
    (?, ?)";
$insertStmt = mysqli_prepare($db, $insertCust);
mysqli_stmt_bind_param($insertStmt, "ss", $phonenumber, $name);
mysqli_stmt_execute($insertStmt);


//select user input and display
$query = "SELECT * FROM CUSTOMER WHERE PhoneNumber='$phonenumber'";
    mysqli_query($db, $query) or die('Error querying database.');

    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo  $row['Name'] . ': ' . $row['PhoneNumber'] . '<br />';
        }

mysqli_close($db);


?>

