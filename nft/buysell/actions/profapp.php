<?php session_start();
include 'db_connect.php';
$id= filter_input(INPUT_POST, 'id');
$userid= filter_input(INPUT_POST, 'userid');
$idnumber = filter_input(INPUT_POST, 'idnumber');
$rejected = filter_input(INPUT_POST, 'rejected');

            if(isset($_POST['submit'])){
            $query = "UPDATE quantum.applicants SET profile = 1, rentconfirmdate = current_timestamp  WHERE username = '$userid' and id = '$id'";
                if(mysqli_multi_query($connect,$query)) {
                    header('location:../applicants.php');
			         exit();

                }else{

    
                echo "Error cannot update user details.: ".$query."<br>".$connect->error;
                }
    }
    elseif (isset($_POST['reject'])) {

                    $query = "UPDATE quantum.applicants SET rejectedreason = '$rejected'  WHERE username = '$userid' and id = '$id'";
                if(mysqli_multi_query($connect,$query)) {
                    header('location:../applicants.php');
                     exit();
                    # code...
                    } else{

    
                echo "Error cannot update user details.: ".$query."<br>".$connect->error;

                }         


            $connect->close();

}

?>



