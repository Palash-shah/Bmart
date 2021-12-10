<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'fdb21.awardspace.net');
define('DB_USERNAME', '3847324_bmart');
define('DB_PASSWORD', 'burhanpurmart123');
define('DB_NAME', '3847324_bmart');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}

?>
