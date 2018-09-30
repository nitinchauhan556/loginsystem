<?php
define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DBNAME","loginsystem");
$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die('can not 
connect to the database.');

?>