<?php
session_start();
include_once('db_connect.php');
$myid =$_SESSION['username'];
$query = "UPDATE quantum.market SET onlineid = '0'  WHERE userid = '$myid' AND unit>0";
if(mysqli_multi_query($connect,$query)){
    require_once('../chat/php/logout.php');
    session_destroy();
// Redirect to the login page:
header('Location: ../../home.php');
}

?>