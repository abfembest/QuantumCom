<?php
   include 'db_connect.php';
   $name = $_SESSION['username'];
          $sql ="SELECT photo, fullname
            FROM quantum.applicants WHERE username = '$name'";
        $result = $connect->query($sql);
        if ($result-> num_rows >0) {
          while ($row = $result-> fetch_assoc()) {
            $user = $row['fullname'];
            echo ("<img src='actions/documents/".$row['photo']."' class='rounded-circle' alt='User Image' style= 'width:50px; height:50px;'>");
           
  }
       
  
    $connect->Close();
  }
  ?>