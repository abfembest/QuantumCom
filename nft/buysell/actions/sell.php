<?php session_start();
include 'db_connect.php';
$coin= mysqli_real_escape_string($connect, $_POST['coin']);
$fullname= mysqli_real_escape_string($connect, $_POST['fullname']);
$unit= mysqli_real_escape_string($connect, $_POST['unit']);
$waddress= mysqli_real_escape_string($connect, $_POST['waddress']);
$userid= mysqli_real_escape_string($connect, $_POST['userid']);
$nft= mysqli_real_escape_string($connect, $_POST['nft']);
$phone= mysqli_real_escape_string($connect, $_POST['pnumber']);
if(isset($_POST['submit'])){
                    $name = $_SESSION['username'];
                $sql ="SELECT *, count(rentpaid) as myrent FROM quantum.buyers WHERE sellerid = '$name' AND bstatus = 3 AND rentpaid = 0";
                        $result = $connect->query($sql);
                        if ($result-> num_rows >0) {
                          while ($row = $result-> fetch_assoc()) {
                            $myrent = $row['myrent'];
                            $rentid = $row['id'];
                          }
                          if ($myrent > 0) {
                                $_SESSION['rent']='Pay rent for all '. $myrent.' completed transactions';
                                header('location:../payrent.php');
                                exit();
                              
                          }
                      }
            if($unit>$nft){
                $_SESSION['status']='Insufficient NFT';
                header('location:../sell.php');
                exit();
            }
            $query = "INSERT INTO quantum.market(fullname,userid,network,unit,amount,waddress,cdate, pnumber, onlineid) VALUES('$fullname','$userid','$coin','$unit','$amount','$waddress','$phone',current_timestamp,1);UPDATE quantum.applicants SET nft = (nft-'$unit'), nftonsales = (nftonsales+'$unit') WHERE username = '$userid'";
                if(mysqli_multi_query($connect,$query)) {

            $_SESSION['status'] = 'Listed on market place.';
            header('location:../sell.php');
			exit();

            
                } else {
    
        echo "Error completing sale: ".$query."<br>".$connect->error;
}

            $connect->close();

}
/*INSERT INTO quantumnft_quantum.market(fullname,userid,network,unit,amount,waddress,cdate, onlineid) VALUES('$fullname','$userid','$coin','$unit','$amount','$waddress',current_timestamp,1);UPDATE quantumnft_quantum.applicants SET nft = (nft-'$unit'), nftonsales = (nftonsales+'$unit') WHERE username = '$userid'";*/
?>



