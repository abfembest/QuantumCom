<?php session_start();
include 'db_connect.php';
$id= mysqli_real_escape_string($connect, $_POST['id']);
$amount= mysqli_real_escape_string($connect, $_POST['amount']);
$unit= mysqli_real_escape_string($connect, $_POST['unit']);
$tranid= mysqli_real_escape_string($connect, $_POST['tranid']);
$waddress= mysqli_real_escape_string($connect, $_POST['waddress']);
$buyerid= mysqli_real_escape_string($connect, $_POST['buyerid']);
$bstatus = mysqli_real_escape_string($connect, $_POST['bstatus']);
$bwaddress = mysqli_real_escape_string($connect, $_POST['bwaddress']);
$name = $_SESSION['username'];

		if(isset($_POST['cancel'])){
              if ($bstatus == 0) {
               
                    $query= "UPDATE quantum.market SET unit = (unit + $unit), status = 0 WHERE id = '$tranid';UPDATE quantum.applicants SET nftwaiting =(nftwaiting -'$unit'),paystatus = '0'  WHERE username = '$buyerid';
                          DELETE FROM quantum.buyers WHERE id = '$id'
                          ";
                          if(mysqli_multi_query($connect,$query)){
                          	 $_SESSION['status'] = 'Transaction reconciled';
		                    header('location:../buy.php');
		                    exit();

                          }

                          
                        }
                      
        elseif($bstatus == 1){

                          $query= "UPDATE quantum.market SET unit = (unit + $unit), status = 0 WHERE id = '$tranid';UPDATE quantum.applicants SET nftwaiting =(nftwaiting -'$unit'),paystatus = '0'  WHERE username = '$buyerid';
                           UPDATE quantum.applicants SET buystatus = (buystatus-1), paystatus = (paystatus - 1) WHERE username = '$name';INSERT INTO quantum.paidcancel (amount, unit, tranid,waddress,bwaddress,buyerid,deletedby, tdate) VALUES ('$amount','$unit','$tranid','$waddress','$bwaddress','$buyerid','$name',current_timestamp);
                            DELETE FROM quantum.buyers WHERE id = '$id'
                          ";                          
                          if(mysqli_multi_query($connect,$query)){
                             $_SESSION['status'] = 'Transaction reconciled';
                        header('location:../buy.php');
                        exit();

                          }

                          
                        }
                      }else{
                        echo "Cannot cancel transaction,undefined.";
                      }
                      
                         ?>
                          