<?php
define('DB_SERVER','filmmoz');
define('DB_USER','root');
define('DB_PASS','123456789');
define('DB_NAME','filmmoz');

//Creating Connection
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

//Check Connection
// if(mysqli_connect_errno())
// {
//     echo "Failed to Connect to Filmmoz : ".mysqli_connect_error();
// }else{
//     echo "Successfully Connected to Filmmoz ";
// }
?>