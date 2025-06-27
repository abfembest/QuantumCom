<?php session_start();
include 'db_connect.php';
$amount= mysqli_real_escape_string($connect, $_POST['amount']);
$tranid= mysqli_real_escape_string($connect, $_POST['tranid']);
$payerid= mysqli_real_escape_string($connect, $_POST['payerid']);
$payerwaddress= mysqli_real_escape_string($connect, $_POST['payerwaddress']);
$payername= mysqli_real_escape_string($connect, $_POST['payername']);
$confirmedby= mysqli_real_escape_string($connect, $_POST['confirmedby']);
$userid= mysqli_real_escape_string($connect, $_POST['userid']);
$myid = mysqli_real_escape_string($connect, $_POST['myid']);
if(isset($_POST['confirm'])){
        
                //Confirm payments
                
                $query= "UPDATE quantum.rent SET rentstatus = 1,confirmedby = '$confirmedby', confirmdate =current_timestamp  WHERE id = '$tranid';UPDATE quantum.applicants SET rentconfirmdate = current_timestamp,rentconfirmed = '2' WHERE id = '$payerid';
                    UPDATE quantum.buyers SET rentpaid = 1 WHERE sellerid = '$payername' AND bstatus = 3 AND rentpaid = 0";    
                
                if(mysqli_multi_query($connect,$query)) {


                    $_SESSION['status'] = 'Transaction completed';
                    header('location:../arent.php');
                    exit();

                }
            
                } else {
    
        echo "Error completing sale: ".$query."<br>".$connect->error;
}
        #}

            $connect->close();

#}
?>



