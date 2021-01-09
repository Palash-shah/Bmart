<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'sql200.epizy.com');
define('DB_USERNAME', 'epiz_27218685');
define('DB_PASSWORD', 'meraburhanpur');
define('DB_NAME', 'epiz_27218685_login');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}
?>
