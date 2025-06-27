<?php session_start();
include 'db_connect.php';
$assignee= mysqli_real_escape_string($connect, $_POST['assignee']);
$assigner= mysqli_real_escape_string($connect, $_POST['assigner']);
$unit= mysqli_real_escape_string($connect, $_POST['unit']);
if(isset($_POST['assign'])){
        
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
                
                $query = "INSERT INTO quantum.assignednft(assignee,quantity,username,assign_date) VALUES('$assignee','$unit','$assigner',current_timestamp);UPDATE quantum.applicants SET nft = (nft+'$unit') WHERE myid = '$assignee'";
                
                if(mysqli_multi_query($connect,$query)) {


                    $_SESSION['status'] = 'NFT assigned.';
                    header('location:../assign.php');
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
