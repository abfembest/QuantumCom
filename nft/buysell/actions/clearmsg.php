<?php session_start();
include 'db_connect.php';

	$id = $_GET['id'];
		$sql= "UPDATE quantum.applicants SET mymessage = '' WHERE id = '$id'";
		if(mysqli_multi_query($connect, $sql)){
			 header('location:../index.php');

} 
		
		else{
			echo "Error: ".$sql."<br>".$connect->error;
		}
		$connect->close();

?>