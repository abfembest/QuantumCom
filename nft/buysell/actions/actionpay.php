<?php session_start();
include 'db_connect.php';
$coin= mysqli_real_escape_string($connect, $_POST['coin']);
$id= mysqli_real_escape_string($connect, $_POST['id']);
$fullname= mysqli_real_escape_string($connect, $_POST['fullname']);
$amount= mysqli_real_escape_string($connect, $_POST['amount']);
$unit= mysqli_real_escape_string($connect, $_POST['unit']);
$tranid= mysqli_real_escape_string($connect, $_POST['tranid']);
$waddress= mysqli_real_escape_string($connect, $_POST['waddress']);
$userid= mysqli_real_escape_string($connect, $_POST['userid']);
$idnumber = mysqli_real_escape_string($connect, $_POST['idnumber']);
$identity= mysqli_real_escape_string($connect, $_POST['identity']);
$buyerwaddress = mysqli_real_escape_string($connect, $_POST['buyerwaddress']);
$sellerwaddress = mysqli_real_escape_string($connect, $_POST['sellerwaddress']);
$buyername= mysqli_real_escape_string($connect, $_POST['name']);
$sellerid= mysqli_real_escape_string($connect, $_POST['sellerid']);
$baddress= mysqli_real_escape_string($connect, $_POST['baddress']);
$saddress= mysqli_real_escape_string($connect, $_POST['saddress']);
$buyerid= mysqli_real_escape_string($connect, $_POST['buyerid']);
$thash= mysqli_real_escape_string($connect, $_POST['thash']);
if(isset($_POST['confirm'])){
        
               
                $query= "UPDATE quantum.market SET status = '1' WHERE id = '$tranid';UPDATE quantum.applicants SET paystatus = (paystatus + 1), buystatus = (buystatus + 1)  WHERE username = '$sellerid';UPDATE quantum.applicants SET paystatus = '2'  WHERE username = '$buyerid';UPDATE quantum.buyers SET thash = '$thash', bstatus = 1 WHERE userid = '$buyerid' and bstatus !=3 AND confirmedby = ''";    
                if(mysqli_multi_query($connect,$query)) {


                    $_SESSION['status'] = 'Transaction completed';
                    header('location:../pending.php');
                    exit();

                }

        
            
                } else {
    
        echo "Error completing sale: ".$query."<br>".$connect->error;
}
        #}

            $connect->close();

#}
?>



