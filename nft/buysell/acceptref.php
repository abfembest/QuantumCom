<?php include 'sidemenu.php' ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">referals</li>
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
                                    <h5 class="card-title"><h1><b>Accept bonus</b></h1><hr></h5>
                                    <form action="actions/acceptref.php" method="post">
                      <?php
                        if(isset($_SESSION['status'])){
                          echo '<p class= "text-center text-success font-weight-bolder">'.$_SESSION['status'].'</p>';
                          unset($_SESSION['status']);
                        }
                      ?>
                      <?php
                      
                      ?>
                    
                  </div>
                
                    <?php
                                    $name = $_SESSION["username"];
                                    include_once 'db_connect.php';
                                    $sql ="SELECT id, waitref, referals,ref
                                        FROM quantum.applicants WHERE username = '$name'";
                                    $result = $connect->query($sql);
                                    if ($result-> num_rows >0) {
                                    while ($row = $result-> fetch_assoc()) {
                                        $id = $row['id'];
                                        $level = $row['referals'];
                                        $waitref = $row['waitref'];
                                        $ref = $row['ref'];

                                    }?>
                                                    
                    <label for="" id='notice' class ='font-weight-bold text-danger'></label><br>
                        <label>Total bonus :</label> <span id="display" class = "fw-bolder"><?php echo $waitref; ?></span>
                  
                  <input type = "hidden" name="userid" value = "<?php echo $_SESSION['username'] ?>">
                  <input type = "hidden" name="fullname" value = "<?php echo $_SESSION['fullname'] ?>">
                  <input type = "hidden" name="refid" value = "<?php echo $ref; ?>">
                 
                  <!--<label>Contract Address</label>-->

                    <input type="hidden" readonly class="form-control" name="unit" value = "<?php echo $waitref; ?>">
                  
                  <div class="card-footer col-12">
                  <button type="submit" class="btn btn-danger col-12 m-auto" name ="submit" onclick="sell()">Accept</button>
                </div>

                <?php
                            }
                            ?>
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