<?php session_start();
include 'db_connect.php';
$coin= mysqli_real_escape_string($connect, $_POST['coin']);
$id= mysqli_real_escape_string($connect, $_POST['id']);
$unit= mysqli_real_escape_string($connect, $_POST['unit']);
$balance= mysqli_real_escape_string($connect, $_POST['balance']);
$userid= mysqli_real_escape_string($connect, $_POST['userid']);
$buyerwaddress = mysqli_real_escape_string($connect, $_POST['buyerwaddress']);
$sellerwaddress = mysqli_real_escape_string($connect, $_POST['sellerwaddress']);
$sellerid= mysqli_real_escape_string($connect, $_POST['sellerid']);
$bphone= mysqli_real_escape_string($connect, $_POST['phone']);
$mynft = mysqli_real_escape_string($connect, $_POST['mynft']);
$mylevel = mysqli_real_escape_string($connect, $_POST['mylevel']);
$myid = mysqli_real_escape_string($connect, $_POST['myid']);

if(isset($_POST['submit'])){
   $mytotal =  $mynft + ($unit*2);
        if($unit > $balance){

            $_SESSION['status'] = 'The unit cannot be higher than Unit listed on the market for sale.';
                header('location:../buy.php');
                exit(); 

        }elseif( $mytotal > 2 ){
                $_SESSION['status'] ='You can only hold a total of 2 NFT and you currently have ' .$mynft. ' the unit you chose is too much <p>
                Note: rule is buy 1 and get 2. </p>';
            header('location:../buy.php');
            exit(); 
        }
        
        else{
            
            $sql ="SELECT * FROM quantum.market Where id ='$id'";
                        $result = $connect->query($sql);
                        if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {
                                  $cunit = $row['unit'];
                                  } 
                            if ($cunit >= $unit) {
                                $query = "UPDATE quantum.market SET unit = (unit-'$unit')WHERE id = '$id';UPDATE quantum.market SET status = 1 WHERE id = '$id';
                                UPDATE quantum.applicants SET nftwaiting =(nftwaiting + '$unit') WHERE username = '$userid';
                                UPDATE quantum.applicants SET paystatus = 1 WHERE username = '$userid';
                                INSERT INTO quantum.buyers(userid,tranid,buyername,phone,sellerid,coin,unit,amount,buyerwaddress,sellerwaddress,boughtdate) VALUES('$userid','$id','$myid','$bphone', '$sellerid','$coin','$unit',20,'$buyerwaddress','$sellerwaddress',current_timestamp)";
                                    if(mysqli_multi_query($connect,$query)) {
                                            header('location:../payptpp.php');
                                            exit();

                                         } else {
    
                                                echo "Error completing transcation: ".$query."<br>".$connect->error;
                                                }
                            }
                            elseif($cunit < $unit){
                                 $_SESSION['bstatus'] = 'Available unit is lower than unit you want to buy.';
                                    header('location:../buy.php');
                                    exit();
                            }

                        else{
                                 $_SESSION['bstatus'] = 'Welcome to buying page';
                                    header('location:../buy.php');
                                    exit();
                            }                         
                    }
}
            $connect->close();

}
?>
          