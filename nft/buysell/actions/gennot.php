<?php session_start();
include 'db_connect.php';
$message= mysqli_real_escape_string($connect, $_POST['message']);
if (isset($_POST['submit'])) {
	$sql = "UPDATE quantum.admessage SET message = '$message', cdate = current_timestamp WHERE id = 1";
	if (mysqli_query($connect,$sql)) {

		 $_SESSION['message'] = 'Broadcast sent succefully.';
         header('location:../broadcast.php');
         exit();
	}
	else {

		echo "Error completing sale: ".$sql."<br>".$connect->error;
	}
}elseif (isset($_POST['reset'])) {
	$sql = "UPDATE quantum.admessage SET message = '' WHERE id = 1";
	if (mysqli_query($connect,$sql)) {

		 $_SESSION['message'] = 'Messages reset succefully.';
         header('location:../broadcast.php');
         exit();
	}
}
        

            $connect->close();






?> 