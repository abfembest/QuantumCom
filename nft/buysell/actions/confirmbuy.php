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
if(isset($_POST['confirm'])){
            $newnft = (2*$unit);

        $query= "UPDATE quantum.applicants SET nft =(nft+'$newnft'),paystatus = 3,completeddate = current_timestamp WHERE username = '$buyerid';UPDATE quantum.applicants SET  nftwaiting = (nftwaiting-'$unit') WHERE username = '$buyerid' AND nftwaiting >= '$unit';UPDATE quantum.applicants SET nftonsales = (nftonsales-'$unit')  WHERE username = '$sellerid' AND nftonsales >= '$unit';UPDATE quantum.applicants SET paystatus = (paystatus - 1)  WHERE paystatus >= 1 AND username = '$sellerid';UPDATE quantum.applicants SET buystatus = (buystatus - 1)  WHERE buystatus >= 1 AND username = '$sellerid';UPDATE quantum.buyers SET bstatus = '3' WHERE id = '$id';UPDATE quantum.buyers SET confirmdate = current_timestamp WHERE id = '$id';UPDATE quantum.buyers SET confirmedby = '$userid' WHERE id = '$id';UPDATE quantum.market SET status = '2'  WHERE id = '$tranid'";
                   if(mysqli_multi_query($connect,$query)) {
                    $_SESSION['status'] = 'Transaction completed';
                    header('location:../market.php');
                    exit();

                }
    
        echo "Error completing sale: ".$query."<br>".$connect->error;
}
        #}

            $connect->close();

#}
?>



