<?php include 'sidemenu.php' ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <main id="main" class="main">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 m-auto">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Buy NFT</h3>
              </div>
                    <!-- /.card-header -->
              <div class="card-body">



              <?php
                include 'db_connect.php';
                        $name = $_SESSION["username"];
                      
                        $sql ="SELECT nft, username,referals
                              FROM quantum.applicants WHERE username = '$name'";
                        $result = $connect->query($sql);
                        if ($result-> num_rows >0) {
                          while ($row = $result-> fetch_assoc()) {
                            $nft = $row['nft'];$level = $row['referals'];                
                  if($nft >= 1 ){

                    echo '<div class="container-fluid mt-3">
                    <div class="row">
                      <div class="col-md-10 m-auto">
                        <div class="card card-info">
                          
                          <div class="card-body p-3 bg-inf">
                            
                              
                              <div class="card-body mb-4">
                                <div class="row justify-content-center">
                            
                                
                                  <p class= "h5 m-4 w-bold"><b>Your maximum holdable units is 2 . <br>Kindly sell off your '.$nft. ' NFT 
                                   
                                  </b></p>
                         
                          
                        </div>
                        <p class="text-center"><a href ="sell.php" class ="btn btn-secondary">Click here to Sell</a></p>

                        </div>' ;
                  
    
                  }else{?>
                         
                <form method = "POST" action = "actions/buy.php">
                <?php $name = $_SESSION['username'];
                include "db_connect.php";
                          $id1 = $_GET['id'];
                          $sql ="SELECT * FROM quantum.market WHERE id = '$id1'";
                          $result = $connect->query($sql);
                          if ($result-> num_rows >0) {
                            while ($row = $result-> fetch_assoc()) {
                              $sellerid = $row['userid'];
                              $selwaddress = $row['waddress'];
                              ?>
                <div class="row text-center">
                  <div class="col-12">
                    <span>1 GRAIN = <input type="hidden" id="rate" value="20.0" min="0" class="form-control col-3"><span> 20.0 USDT</span><span class="ml-5"></span>
                    <p btn-danger id = ''></p>
                    
                    <label><b>USDT BEP20</b></label>&nbsp;&nbsp;&nbsp;<label><b>(Available qty:<?php echo $row['unit'];?>)</b></label><br>
                    <input type="hidden" value = "<?php echo $row['unit'];?>" id="quan" name ="balance">
                    <input type="hidden" class="form-control" name="coin" value = "<?php echo $row['network'];?>" readonly>
                  </div>
                  
                    <?php
                        #Checking the seller to avoid seller buying from him/herself

                        if($sellerid==$name){
                          echo '<div class="col-12">
                          <p class="text-center text-danger"><b>You cannot buy your own NFT.</b></P>
                          </div>';
                        }else{
                    
                    ?>
                  <?php

                        $name = $_SESSION["username"];
                        $sql ="SELECT paystatus,id,pnumber,waddress,photo,idcard,completeddate,
                            nft,profile,idnumber,referals,nftwaiting,nftonsales,myid
                              FROM quantum.applicants WHERE username = '$name'";
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
                            $myid = $row['myid'];
                }
                  if($nftwaiting>0){
                                    
                    echo'<div class="col-8 m-auto"><label class="text-warning">You have '.$nftwaiting.' pending NFTs</label>';
                  }elseif($nftonsales>0){

                    echo '<div class="container-fluid mt-3">
                    <div class="row">
                      <div class="col-md-10 m-auto">
                        <div class="card card-info">
                          
                          <div class="card-body p-3 bg-info">
                            
                              
                              <div class="card-body mb-4">
                                <div class="row justify-content-center">
                            
                                <div class="row justify-content-center">
                                  <p class= "h5 m-4 w-bold"><b>You have '.$nftonsales. ' NFT on sales.
                                   
                                  </b></p>
                          </div>
                          
                        </div>
                        <p class="text-center"><a href ="index.php" class ="h5 text-light"><u>Check</u></a></p>

                        </div>' ;
              

                  }
                  
                  elseif($level<25){

                    echo'<div class="col-8 text-center m-auto">
                    <input type="number" class="form-control" placeholder="quantity" required ="required"oninput="display()"
                    id="data" name="unit" min ="1" max="1">
                   
                  
                  </div>
                 
                  <input type = "hidden" value = "' .$id1.'"name = "id" id="id">

                    <!--Phone number-->
                    <input type = "hidden" value = "'.$phone.'" name = "phone" id="id">

                  <input type = "hidden" value = "'. $_SESSION["username"].'" name = "userid">
                  <input type = "hidden" value = "' .$waddress. '" readonly>
                  <input type = "hidden" value = "'. $sellerid. '"  readonly name = "sellerid">
                  <input type = "hidden" value ="' .$nft.'" name = "mynft">
                  <input type = "hidden" value ="' .$myid.'" name = "myid">
                  <input type = "hidden" value = "buyer/seller"  readonly name = "mylevel">



                    <!--Phone number-->
                    <input type = "hidden" value = "'.$phone.'" name = "phone" id="id">

                  <div class="col-12 mb-3">
                    <input type="hidden" class="form-control" placeholder="Contract Address" name = "buyerwaddress" value = "'. $waddress. '" readonly >
                  </div>
             <?php    
         
            

              <p>
                  <div id="notice" class ="font-weight-bold text-success justify-content-center"></div>

                  <div class="row justify-content-center">
                    <div class="col-8">
                   
                      <label class="h6 ">Copy seller USDT address</label>
              
              
                      <div class="col-8 mb-3 input-group">
                          <input type="text" class="form-control col-lg-6" style="border-radius: 17px 0px 0px 17px" value="'. $selwaddress.'" id ="myInput" readonly name = "sellerwaddress">

                          <div class="btn btn-info form control" style="border-radius: 0px 17px 17px 0px"><i class="fa fa-copy mr-2" onclick = "copyadd()"></i>Copy</div>
                    
                        </div>
                    <div>      
                  <div class="card-footer col-12 text-center">
                  <button type="submit" class="btn btn-info col-12 w-75" name="submit" id="b01">Buy</button>
                  <button type="submit" class="btn btn-info col-12 w-75 m-auto" name="submit" id="b02" style ="display:none;">Buy</button>
                  
                </div>
                
                    ';

                  }
                  
                  
                 
                 
                 
                

                
                  
                
                }
              }
                            
                          }
                        }
                  ?>
                </div>
              </div>
              <?php
                        }
                      
              ?>
</form>

<?php
                  }
                }
              
?>
              <!-- /.card-body -->
            </div>
          </div>
              </main>
          <script>
              function display() {
                var quantity = parseFloat(document.getElementById("data").value);
                //var output = document.getElementById("display");
                var rate = parseFloat(document.getElementById("rate").value);

                var cost = quantity * rate;

                document.getElementById("display").innerHTML = "$"+cost;
                //output.innerHTML(cost);

              }

             
        </script>

<script>
    function copyadd() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  var notify = document.getElementById('notice').innerHTML = 'Wallet copied.';

  /* Alert the copied text 
  alert("Copied the text: " + copyText.value);*/
  document.getElementById("b01").removeAttribute(disabled="disabled");
  //document.getElementById('b02').style.display = 'block';
};
  </script>

<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
           