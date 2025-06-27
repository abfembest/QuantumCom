<?php session_start();    
    include 'db_connect.php';
 $amount = mysqli_real_escape_string($connect, $_POST['amount']);
 $username = mysqli_real_escape_string($connect, $_POST['username']);
 $walletaddress = mysqli_real_escape_string($connect, $_POST['walletaddress']);
 $userid = mysqli_real_escape_string($connect, $_POST['userid']);
 $tash = mysqli_real_escape_string($connect, $_POST['tash']);
 $submit = mysqli_real_escape_string($connect, $_POST['submit']);
 if (isset($_POST['submit'])){  
    $sql = "INSERT INTO quantum.rent(amount,username,walletaddress,userid, date,tash) values ('$amount', '$username','$walletaddress','$userid',current_timestamp, '$tash'); UPDATE quantum.applicants SET rent = '$amount', rentdate =current_timestamp, rentconfirmed = 1 WHERE username = '$username'";
  if (mysqli_multi_query($connect, $sql)){
    $_SESSION['status'] = 'Successful, awaiting confirmation.';
    header('location:../payrent.php');
                                
}else {
    
        echo "Error completing sale: ".$sql."<br>".$connect->error;
} 
        
            $connect->close();
          }
                        ?>  

