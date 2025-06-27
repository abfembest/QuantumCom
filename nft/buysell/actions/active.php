<?php session_start();
include 'db_connect.php';

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
	$id = $_GET['id'];
		
	
		$sql= "UPDATE quantum.applicants SET active = 0,deactivated_on = current_timestamp  WHERE id = '$id'";
		if(mysqli_multi_query($connect, $sql)){
			
			echo '<script type="text/javascript">';
			echo 'window.location.href = "../musers.php"';
			echo '</script>';

} 

		
		else{
			echo "Error: ".$sql."<br>".$connect->error;
		}
		$connect->close();

?>