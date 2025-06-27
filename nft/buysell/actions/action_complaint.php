<?php 
include 'db_connect.php';

$resolution = mysqli_real_escape_string($connect, $_POST['resolution']);

$id = mysqli_real_escape_string($connect, $_POST['id']);
$username = mysqli_real_escape_string($connect, $_POST['username']);


if(isset($_POST['submit'])){

    $query = "UPDATE quantum.complaints SET resolution = '$resolution', status = 1, reslved = current_timestamp WHERE id  = '$id';
        UPDATE quantum.applicants SET mymessage = '$resolution' WHERE username = '$username'";
    if(mysqli_multi_query($connect,$query)){
        header('location:../complains.php');
        exit();

    }

                } 
                else {
    
        echo "Error submitting form: ".$query."<br>".$connect->error;
}
        #}

            $connect->close();

#}
?>



