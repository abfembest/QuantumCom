<?php session_start();
include 'db_connect.php';
$assignee= mysqli_real_escape_string($connect, $_POST['assignee']);
$assigner= mysqli_real_escape_string($connect, $_POST['assigner']);
$level= mysqli_real_escape_string($connect, $_POST['level']);
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
                
                $query = "INSERT INTO quantum.assignlevel(assignee,assignedlevel,assigner,assign_date) VALUES('$assignee','$level','$assigner',current_timestamp);UPDATE quantum.applicants SET referals = '$level'  WHERE myid = '$assignee'";
                
                if(mysqli_multi_query($connect,$query)) {


                    $_SESSION['status'] = 'Level assigned.';
                    header('location:../assignl.php');
                    exit();

                }

        

            
                } else {
    
        echo "Error assigning level: ".$query."<br>".$connect->error;
}
        #}

            $connect->close();

#}
?>
