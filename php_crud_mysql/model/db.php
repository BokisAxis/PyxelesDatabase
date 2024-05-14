<!-- Connection with the database -->
<?php

//Start a new session
session_start(); 

//A connection is established to a MySQL database
$conn = mysqli_connect(  

'localhost',  //MySQL server name
'root',  //MySQL username
'',  //Mysql password
'pyxeles'  //Database name
);

?>