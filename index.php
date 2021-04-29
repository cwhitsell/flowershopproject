<html lang="en" xml:lang="en">
<meta http-equiv="Content-Language" content="en">
<meta name="google" content="notranslate">
    <head>
        FlowerShop by Casey, Jean, and Thuan
    </head>
    <body>
        <div>
            <p>
                Please input into all fields <br />    
            </p>
            <form name="form" action="flowershop.php" method="post"> 
                <input type="text" name="Name" placeholder="Full Name"><br>
                <input type="text" name="PhoneNumber" placeholder="Phone Number"><br>
                <input type="submit" name="submit" /><br><br><br>
            </form>
            <p>
                Please do not input any of the same phone numbers as listed below<br>
            </p>
        </div>
    </body>
</html>
 
 
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

    //query and print existing phonenumbers
    $query = "SELECT PhoneNumber FROM CUSTOMER";
    mysqli_query($db, $query) or die('Error querying database.');

    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo  $row['PhoneNumber'] . '<br />';
        }

    
 ?>
