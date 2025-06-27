<?php session_start();
include 'db_connect.php';

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
	$myid = $_GET['myid'];
    $username = $_GET['username'];	
		$sql= "UPDATE quantum.applicants SET activate = 1  WHERE myid = '$myid' and username = '$username'";
		if(mysqli_multi_query($connect, $sql)){
			$_SESSION['status'] = 'Activation successful, You can now log in.';
            header('location:../../../home.php');
			exit();
} 

		
		else{
			echo "Error: ".$sql."<br>".$connect->error;
		}
		$connect->close();

?>