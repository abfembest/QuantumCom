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
        
// Comfirming whether email and phone number exists
        /*$sql ="SELECT pnumber, email
            FROM quantum.applicants WHERE pnumber = '$pnumber'|| email = '$email'";
        $result = $connect->query($sql);
        if ($result-> num_rows >0){
        	while ($row = $result-> fetch_assoc()) {
        		$_SESSION['reg1'] = 'Your phone number or email already exists.';
                header('location:../signup.php');
				exit(); 
			}
		}
// Insert record*/

                //Confirm payments
                
                $query= "UPDATE quantum.market SET status = '2'  WHERE id = '$tranid';
                UPDATE quantum.buyers SET status = '1'  WHERE id = '$id';
                UPDATE quantum.buyers SET confirmdate = current_timestamp  WHERE id = '$id';
                UPDATE quantum.buyers SET confirmedby = '$userid'  WHERE id = '$id';
                UPDATE quantum.applicants SET nftwaiting =(nftwaiting-'$unit')  WHERE username = '$buyerid';
                UPDATE quantum.applicants SET nft =(nft+'$unit') WHERE username = '$buyerid';
                UPDATE quantum.applicants SET paystatus = 1  WHERE username = '$buyerid';
                UPDATE quantum.applicants SET completeddate = current_timestamp  WHERE username = '$buyerid';
                UPDATE quantum.buyers SET status = 2  WHERE id = '$id'";    
                
                if(mysqli_multi_query($connect,$query)) {


                    $_SESSION['status'] = 'Transaction completed';
                    header('location:../market.php');
                    exit();

                }

        #elseif(isset($_POST['reject'])){	
            

            /*$to = "quantumlevel12@gmail.com";
            $to2 = $email;
            $subject = "Application for Quantum Trading";
            $body ="Name :".$fullname. "
                    Email :".$email. "
                    Phone :".$pnumber. " 
                    Identity :".$identity."
                    Country :".$country."

                  quantumnft.com/../signup.php";
            $header = "From: quantumnft.com";
 
           	mail($to, $subject, $body, $header);
            //mail($to2, $subject, $body, $header);*/
           

            
                } else {
    
        echo "Error completing sale: ".$query."<br>".$connect->error;
}
        #}

            $connect->close();

#}
?>



