<?php session_start();
include 'db_connect.php';
$wallet = mysqli_real_escape_string($connect, $_POST['waddress']);
$idcard = mysqli_real_escape_string($connect, $_POST['idcard']);
$photo = mysqli_real_escape_string($connect, $_POST['photo']);
$idnumber = mysqli_real_escape_string($connect, $_POST['idnumber']);
$myid = mysqli_real_escape_string($connect, $_POST['myid']);
if(isset($_POST['submit'])){
    $name = $_SESSION['username']; 
  $photo = $_FILES['photo']['name'];
  $target_dir = "documents/";
  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
  $idcard = $_FILES['idcard']['name'];
  $target_dir = "documents/";
  $target_file2 = $target_dir . basename($_FILES["idcard"]["name"]);
  // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 
  // Select file type
 //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record

     $query = "UPDATE quantum.applicants SET waddress = '$wallet', photo = '$photo', idcard = '$idcard', idnumber = '$idnumber',rejectedreason ='' WHERE username = '$name'";
          if (mysqli_multi_query($connect,$query)){
  
     // Upload file
      move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$photo);
      move_uploaded_file($_FILES['idcard']['tmp_name'],$target_dir.$idcard);
      $_SESSION["updated"]= "The user profile has been updated.";
      header('location:../profile.php');
      exit();



  } else {
    $_SESSION["updated2"]= "The user profile cannot be updated.";
    header('location:../profile.php');
    exit();

}
 }
} 
?>
