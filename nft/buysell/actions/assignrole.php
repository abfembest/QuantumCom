<?php session_start();
include 'db_connect.php';
$assignee= mysqli_real_escape_string($connect, $_POST['assignee']);
$assigner= mysqli_real_escape_string($connect, $_POST['assigner']);
$role= mysqli_real_escape_string($connect, $_POST['role']);
if(isset($_POST['assign'])){
                
                $query = "UPDATE quantum.applicants SET access = '$role'  WHERE myid = '$assignee'";
                
                if(mysqli_multi_query($connect,$query)) {


                    $_SESSION['status'] = 'New role granted.';
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
