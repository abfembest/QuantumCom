<?php
include 'sidemenu.php' ;
      include 'db_connect.php';
      
?>
 
 <main id="main" class="main">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Pay rent</h3>
              </div>


                
                    <!-- /.card-header -->

                    
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <p class="text-center"><b>Please make it a very breif details.</b></p>
                        <?php
                              if (isset($_SESSION['status'])) {
                                echo '<p class = "text-success text-center w-bold"><b>'. $_SESSION['status'].'</b></p>';
                                    unset($_SESSION['status']);
                                # code...
                              }

                        ?>

<?php            
                          $name = $_SESSION['username'];
                          $sql = "SELECT id, username,myid, waddress FROM quantum.applicants WHERE username ='$name'";
                              $result = $connect->query($sql);
                          if ($result-> num_rows >0) {
                          while ($row = $result-> fetch_assoc())

                         {?>
                    <form class="w-75 m-auto" action="actions/usercomplain.php" method="POST">
                    
                     

                    <input type="hidden" name="id" class="form-control mt-2 mb-2" required value="<?php echo $row['myid'];?>" readonly>

                    <div id='notice' class ='font-weight-bold text-success justify-content-center'></div>

                    <input type="hidden" name="username" class="form-control mt-2"
                    value='<?php echo $row['username'];?>'>

                    <input type="hidden" name="walletaddress" class="form-control mt-2" value="<?php echo $row['waddress'];?>">

                    <input type="hidden" name="userid" class="form-control mt-2 mb-2" value="<?php echo $row['myid'];?>">
                  
                    <!--<label>Sell With</label>: USDT PEP20-->
                  </div>
                    
                
                  <div class="col-12 mb-3">
                        <label>Your Complains:</label>
                          <input type="text" class="form-control mb-auto" value="" id="quan" name = "message" required>

                  </div>
                  <input type="submit" name="submit" class="bg-success form-control" value="Send">

                  <?php
                    }
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
    <main>


 
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
  alert("Copied the text: " + copyText.value);
  
};
  </script>