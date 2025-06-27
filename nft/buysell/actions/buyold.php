<?php session_start();
include 'db_connect.php';
$coin= mysqli_real_escape_string($connect, $_POST['coin']);
$id= mysqli_real_escape_string($connect, $_POST['id']);
$fullname= mysqli_real_escape_string($connect, $_POST['fullname']);
$amount= mysqli_real_escape_string($connect, $_POST['amount']);
$unit= mysqli_real_escape_string($connect, $_POST['unit']);
$balance= mysqli_real_escape_string($connect, $_POST['balance']);
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
$tranid= mysqli_real_escape_string($connect, $_POST['tranid']);
$bphone= mysqli_real_escape_string($connect, $_POST['phone']);
$mynft = mysqli_real_escape_string($connect, $_POST['mynft']);
$mylevel = mysqli_real_escape_string($connect, $_POST['mylevel']);
if(isset($_POST['submit'])){
   $mytotal =  $mynft + ($unit*2);
        if($unit > $balance){

            $_SESSION['status'] = 'The unit cannot be higher than Unit listed on the market for sale.';
                header('location:../buy.php');
                exit(); 

        }elseif($mylevel=="buyerseller" && $mytotal > 2 ){
                $buyable = (2 - $mynft);

                $_SESSION['status'] ='Buyer/seller can only hold a total of 2 NFT and you currently have ' .$mynft. ' the unit you chose is too much <p>
                Note: rule is buy 1 and get 2. </p>';
            header('location:../buy.php');
            exit(); 
        }
        elseif($mylevel=="retailer" && $mytotal > 4 ){
            $buyable = (4 - $mynft);
            $_SESSION['status'] ='Retailer can only hold a total of 4 NFT and you currently have ' .$mynft. ' the unit you chose is too much <p>
            Note: rule is buy 1 and get 2. </p>';
        header('location:../buy.php');
        exit(); 
        }
        elseif($mylevel=="wholesaler" && $mytotal > 6 ){
            $buyable = (6 - $mynft);
            $_SESSION['status'] ='Wholesaler can only hold a total of 6 NFT and you currently have ' .$mynft. ' the unit you chose is too much <p>
            Note: rule is buy 1 and get 2. </p>';
        header('location:../buy.php');
        exit(); 
        }
        elseif($mylevel=="distributor" && $mytotal > 8 ){
            $buyable = ($mynft - 8);
            $_SESSION['status'] ='Distributor can only hold a total of 8 NFT and you currently have ' .$mynft. ' the unit you chose is too much <p>
            Note: rule is buy 1 and get 2. </p>';
            header('location:../buy.php');
            exit(); 
        
        }
        elseif($mylevel=="merchant" && $mytotal > 10 ){
            $buyable = (10 - $mynft);
            $_SESSION['status'] ='Merchant can only hold a total of 10 NFT and you currently have ' .$mynft. ' the unit you chose is too much <p>
            Note: rule is buy 1 and get 2. </p>';
        header('location:../buy.php');
        exit(); 
        }elseif($mylevel=="producer" && $mytotal > 12 ){
            $buyable = (12 - $mynft);
            $_SESSION['status'] ='Producer can only hold a total of 12 NFT and you currently have ' .$mynft. ' the unit you chose is too much <p>
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
                                $query = "UPDATE quantum.market SET unit = (unit-'$unit'),status = 1 WHERE id = '$id';
                                UPDATE quantum.applicants SET nftwaiting =(nftwaiting+'$unit'),paystatus = '1'  WHERE username = '$userid';
                                INSERT INTO quantum.buyers(userid,tranid,buyername,phone,sellerid,unit,buyerwaddress,sellerwaddress,boughtdate) VALUES('$userid','$id','$buyername','$bphone', '$sellerid','$unit','$buyerwaddress','$sellerwaddress',current_timestamp)";
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
          