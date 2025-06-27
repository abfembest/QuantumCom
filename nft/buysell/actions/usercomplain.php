<?php session_start();
include 'db_connect.php';
$username = mysqli_real_escape_string($connect, $_POST['username']);
$userid = mysqli_real_escape_string($connect, $_POST['userid']);
$walletaddress = mysqli_real_escape_string($connect, $_POST['walletaddress']);
$message = mysqli_real_escape_string($connect, $_POST['message']);

if(isset($_POST['submit'])){

    $query = "INSERT INTO quantum.complaints (username, userid, waddress, complain, transaction_date) VALUES ('$username', '$userid','$walletaddress','$message', current_timestamp)";
    if(mysqli_query($connect,$query)){
        $_SESSION['status'] = 'Compliant was submitted and is being given attention.';
        header('location:../support.php');

        exit();

    }

                } 
                else {
    
        echo "Error Form submitting: ".$query."<br>".$connect->error;
        $connect->close();
}
        

            


?>



