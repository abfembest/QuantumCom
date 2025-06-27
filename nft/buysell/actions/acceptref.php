<?php session_start();
include 'db_connect.php';
$unit = mysqli_real_escape_string($connect, $_POST['unit']);
$refid= mysqli_real_escape_string($connect, $_POST['refid']);
$userid= mysqli_real_escape_string($connect, $_POST['userid']);
if(isset($_POST['submit'])){
           $query = "UPDATE quantum.applicants SET referals = (referals + '$unit') WHERE username = '$userid';UPDATE quantum.applicants SET waitref = (waitref + '$unit') WHERE myid = '$refid'
           ;UPDATE quantum.applicants SET waitref = 0 WHERE username = '$userid'";
                if(mysqli_multi_query($connect,$query)) {
            $_SESSION['status'] = 'Referal updated.';
            header('location:../index.php');
			exit();

                }
             } else {
    
        echo "Error completing sale: ".$query."<br>".$connect->error;
}

            $connect->close();


?>



