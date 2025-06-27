<?php include_once 'sidemenu.php'; 
     include 'db_connect.php';
?>
<main id="main" class="main">
    

    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <?php
                    if(isset($_SESSION['status'])){
                      echo '<p class="text-center btn-success fw-bolder m-auto">'.$_SESSION['status']. '</p>';
                      unset($_SESSION['status']);
                    }?>

    <?php
$name = $_SESSION["username"];
$sql ="SELECT paystatus,id,pnumber,waddress,photo,idcard,completeddate,
    nft,nftwaiting,profile,idnumber,referals, nftonsales,rentconfirmdate,myid,rentconfirmed FROM quantum.applicants WHERE username = '$name'";
$result = $connect->query($sql);
if ($result-> num_rows >0) {
  while ($row = $result-> fetch_assoc()) {
    $status = $row['paystatus'];
    $id = $row['id'];
    $phone = $row['pnumber'];
    $idnumber = $row['idnumber'];
    $waddress = $row['waddress'];
    $photo = $row['photo'];
    $idcard = $row['idcard'];
    $completeddate = $row['completeddate'];
    $profile = $row['profile'];
    $nft = $row['nft'];
    $level = $row['referals'];
    $nftwaiting = $row['nftwaiting'];
    $nftonsales = $row['nftonsales'];
    $rentconfirmdate = $row['rentconfirmdate'];
    $myid = $row['myid'];
    $rentconfirm = $row['rentconfirmed'];
  }
  $tzone = date_default_timezone_set('Africa/Lagos');
  $time_ago = strtotime($completeddate);
  $current_time = time();
  $timedifference = $current_time -$time_ago;
  $seconds = $timedifference;
  $timedif1 = round($seconds / 60); //In minutes
  $timedif = round($seconds / 3600); //In hours

  $final =time();   
  $start = strtotime($rentconfirmdate);
  $rentdays = round(($final-$start)/86400);
  
  if(!$photo||!$phone||!$idnumber||!$waddress||!$idcard){
    echo '<div class="container-fluid">
        <div class="row">
          <div class="col-md-10 m-auto">
            <div class="card card-info">
              
              <div class="card-body p-3 bg-info">
                
                  
                  <div class="card-body mb-4">
                    <div class="row justify-content-center">
                    

                      
                    <div class="row justify-content-center">
               
                
                      <a href="eprofile.php" class=" btn btn-secondary" ><i class="fas fa-user mr-2"></i>Update Profile</a>
                  
                
                  
                  
              </div>
            </div>
            </div>' ;
      
  }
  elseif($rentdays >= 25){

    echo '<div class="container-fluid">
        <div class="row">
          <div class="col-md-10 m-auto">
            <div class="card card-info">
              
              <div class="card-body p-3 bg-info">
                
                  
                  <div class="card-body mb-4">
                    <div class="row justify-content-center">
                
                    <div class="row justify-content-center">
                      <p class= "h5 m-4 fw-bolder text-center"><b>Kindly <a href="payrent.php""><u>Pay</u></a> your rent
                      </b></p>
                      
                      
              </div>
            </div>
            </div>' ;
  
  }
  elseif($rentconfirm == 1){
    echo '<div class="col-xxl-4 col-md-6 ">
    <div class="card info-card revenue-card bg-warning">
  
      <div class="card-body">
        <h5 class="card-title">Information <span>|</span></h5>
  
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-cart"></i>
          </div>
          <div class="ps-3">
            <h3>Your rent is awaiting confirmation.</h3>
            <span class="text-success small pt-1 fw-bold"><span class="text-muted small pt-2 ps-1"> 
  
          </div>
        </div>
      </div>
  
    </div>
  </div>
    ';}
  elseif(!$profile){

    echo '<div class="container-fluid">
        <div class="row">
          <div class="col-md-10 m-auto">
            <div class="card card-info">
              
              <div class="card-body p-3 bg-info">
                
                  
                  <div class="card-body mb-4">
                    <div class="row justify-content-center">
                    

                      
                    <div class="row justify-content-center">
               
                
                      <a href="profile.php" class=" btn btn-secondary" >
                      <i class="fas fa-user mr-2"></i>Awaiting profile comfirmation</a>
                  
                
                  
                  
              </div>
            </div>
            </div>' ;
  }
            elseif($timedif< 24){

              echo '<div class="container-fluid">
                  <div class="row">
                    <div class="col-md-10 m-auto">
                      <div class="card card-info">
                        
                        <div class="card-body p-3 bg-info">
                          
                            
                            <div class="card-body mb-4">
                              <div class="row justify-content-center">
                          
                              <div class="row text-center">
                                <p class= "h5 m-4 w-bold"><b>NFT will mature in '.(24-$timedif). '  hours</b></p>
                        </div>
                      </div>
                      </div>' ;
            
}

elseif($nftwaiting>0){

  echo '<div class="container-fluid">
      <div class="row">
        <div class="col-md-10 m-auto">
          <div class="card card-info">
            
            <div class="card-body p-3 bg-info">
              
                
                <div class="card-body mb-4">
                  <div class="row justify-content-center">
              
                  <div class="row justify-content-center">
                    <p class= "h5 m-4 w-bold"><b>You have '.$nftwaiting. ' NFT pending <a href ="pending.php" class ="h5 text-warning">See details</a></b></p>
            </div>
          </div>
          </div>' ;

}

elseif($nftonsales>0){

  echo '<div class="container-fluid">
      <div class="row">
        <div class="col-md-10 m-auto">
          <div class="card card-info">
            
            <div class="card-body p-3 bg-info">
              
                
                <div class="card-body mb-4">
                  <div class="row justify-content-center">
              
                  <div class="row justify-content-center">
                    <p class= "h5 m-4 w-bold text-center"><b>You have '.$nftonsales. ' NFT on sales
                    
                    </b></p>
            </div>
          </div>
          <p class="text-center"><a href ="index.php" class ="h5 text-light"><u>check here</u></a></p>
          </div>' ;

}


else{?>
        <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8"  style="border-top:20px solid red;">
                <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><h1><b>Sell NFT</b></h1><hr></h5>
                                    <span>1 GRAIN = <input type="hidden" id="rate" value="20.0" min="0" ><span> 20.0 USDT</span><span class="ml-5"> My NFT: <?php echo $nft;?></span>
                                                                       
                                    <form action="actions/sell.php" method="POST">
                                    
                                
                                           
                        <input type="hidden" value = USDT name = "coin">
                        <div class="col-12">
                        <input type="hidden" class="form-control" value="<?php echo $nft;?>" id="quan" name = "nft">
                        
                    <label><b>Quantity</b></label>
                    <input type="number" class="form-control" placeholder="quantity" required ="required"oninput = "display()"
                    id = "data" name="unit" min ="1" max="2">

                 
                    <br>
                        <label>Total Amount:</label> <span id="notice">0.00</span>
                  </div>
                  <input type = "hidden" name="userid" value = "<?php echo $_SESSION['username'] ?>">
                  <input type = "hidden" name="fullname" value = "<?php echo $myid;?>">
                    <input type = "hidden" name="pnumber" value = "<?php echo $phone;?>">

                  <div class="col-12 mb-3">
                  <!--<label>Contract Address</label>-->

                    <input type="hidden" class="form-control" placeholder="Contract Address" name="waddress" value = "<?php echo $waddress; ?>">
                  </div>
                  <div class="card-footer col-12">
                  <button type="submit" class="btn btn-danger col-12" name ="submit" onclick="sell()">Sell</button>
                </div>
                                        </form>

                                        <?php
                            }
                            ?>
                                </div>
                            </div>
                </div>
                <?php
                  }
                
              
              ?>
            </div>
        </div>
    </section>
</main>


</main><!-- End #main -->


<script>
              function display() {
                
                var quantity = parseInt(document.getElementById("data").value);
                //var output = document.getElementById("display");
                var rate = parseFloat(document.getElementById("rate").value);
                var quan = parseInt(document.getElementById("quan").value);

                var cost = quantity * rate;

                document.getElementById("notice").innerHTML = '$'+cost;
                //output.innerHTML(cost);
                if(quantity > quan){
                  document.getElementById('notice').innerHTML = 'This unit is higher than sellable grains.';

              }
            }
              
        </script>

          
<?php include_once 'footerlinks.php';?>