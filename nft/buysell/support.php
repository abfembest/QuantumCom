<?php include 'sidemenu.php' ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Support</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Support</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
        <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8"  style="border-top:20px solid red;">
                <div class="row">
                            <div class="card">
                                <div class="card-body">
                        <?php
                              if (isset($_SESSION['status'])) {
                                echo '<p class = "text-success text-center w-bold"><b>'. $_SESSION['status'].'</b></p>';
                                    unset($_SESSION['status']);
                                # code...
                              }
                              else{
                                echo '<p class="text-center"><b>Please make it a very breif details.</b></p>';
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
        </div>
    </section>
</main>


</main><!-- End #main -->
<?php include 'footerlinks.php' ?>