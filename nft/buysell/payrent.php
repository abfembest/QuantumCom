<?php include_once 'sidemenu.php';
    include_once 'db_connect.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Pay rent</li>
            </ol>
        </nav>
    </div>
<section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8"  style="border-top:20px solid rgb(0, 255, 145);">
                <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center fw-bolder"><b>Rentage</b></p>
                        <?php
                              if (isset($_SESSION['status'])) {
                                echo '<p class = "text-warning text-center fw-bolder"><b>'. $_SESSION['status'].'</b></p>';
                                    unset($_SESSION['status']);
                                # code...
                              }
                              elseif(isset($_SESSION['rent'])) {
                                echo '<p class = "text-danger text-center fw-bolder"><b>'. $_SESSION['rent'].'</b></p>';
                                    unset($_SESSION['rent']);
                                # code...
                              }

                        ?>

                                
                                </h3><hr></h5>
                                   
                    <form action="actions/payrent.php" method="post">

                                    <?php            
                          $name = $_SESSION['username'];
                          $sql = "SELECT id, username,waddress, referals, myid FROM quantum.applicants WHERE username ='$name'";
                              $result = $connect->query($sql);
                          if ($result-> num_rows >0) {
                          while ($row = $result-> fetch_assoc()){
                          $level = $row['referals'];
                          $mywallet = $row['waddress'];
                          $myid = $row['myid'];
                          $myid1 = $row['id'];
                          }
                         

                           echo '<h4><b>Amount: $10.00</b></h4>

                    <input type="hidden" name="amount" class="form-control mt-2 mb-2" placeholder="Amount" required value="10.00" readonly>
                    <input type="text" name="tash" class="form-control mt-2 mb-2" placeholder="Transaction Hash" required>

                    <div id="notice" class ="font-weight-bold text-success justify-content-center"></div>
                    <div class="row justify-content-center">
                              <label>Use BEP20 USDT address to pay rent</label>
                            <div class="col-8 mb-3 input-group">
                              <input type="text" class="form-control" style="border-radius: 17px 0px 0px 17px" readonly value="xcdwrrffD3434w5wfVfYSHDKSUD8656" id ="myInput">
                              <div class="btn btn-secondary" style="border-radius: 0px 17px 17px 0px" onclick = "copyadd()"><i class="fa fa-copy mr-2" onclick = "copyadd()"></i>Copy</div>
                            </div>
                        </div>

                    <input type="hidden" name="username" class="form-control mt-2"
                    value="'.$name.'">
                    <input type="hidden" readonly name="walletaddress" class="form-control mt-2" value=" '. $mywallet.'">

                    <input type="hidden" name="userid" class="form-control mt-2 mb-2" value="'.  $myid1.' ">
                  
                  </div>
                    
                 <input type="hidden" value = USDT name = "coin">
                  <div class="col-12">
                  <input type="hidden" class="form-control" value="" id="quan" name = "nft">
                  <input type="submit" name="submit" class="bg-success form-control mb-3" value="I have paid">
            </div>';
                           
           
                          }


                  ?>
                  </div>
                </span>
                                    </form>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
</main>


</main><!-- End #main -->
<?php include_once 'footerlinks.php';?>
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

  // Alert the copied text 
  //alert("Copied the text: " + copyText.value);
  
};
  </script>