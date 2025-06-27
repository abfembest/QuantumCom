<?php include 'sidemenu.php';
        
 ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
          <!--<nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>-->
    </div><!-- End Page Title -->

   
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
            <?php
                    if(isset($_SESSION['updated'])){
                      echo '<p class="text-center btn-success w-75 m-auto">'.$_SESSION['updated']. '</p>';
                      unset($_SESSION['updated']);
                    }
                    elseif(isset($_SESSION['updated2'])){
                      echo '<p class="text-center btn-success w-75 m-auto">'.$_SESSION['updated']. '</p>';
                      unset($_SESSION['updated2']);
                    }
                    ?>


<?php
                #$id = $_GET['id'];
                include 'db_connect.php';
                $name=$_SESSION['username'];
                  $sql = "SELECT photo, fullname, username,identity, idnumber, country, waddress,gender,pnumber, rejectedreason, myid 
                  FROM quantum.applicants WHERE username ='$name'";
                  $result = $connect->query($sql);
                  if ($result-> num_rows >0) {
                  while ($row = $result-> fetch_assoc()) {
                    $reject = $row['rejectedreason'];
                
                    ?>
            

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            
                        <img class='rounded-circle' src="actions/documents/<?php echo $row['photo'];?>" alt='No photo'>
                        <h2><?php echo $row['myid'];?></h2>
                        <h3><?php echo $row['username'];?></h3>
                        
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            <!--<li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>-->

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['fullname'];?></div>
                                </div>
                                <?php
                                if($reject){
                                    echo '<div class ="text-danger text-center"><b>Your profile was rejected. '.$reject. '</b></div>';
                                        }
                                    ?>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Username:</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['myid'];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Wallet Address</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['waddress'];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['country'];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Id Card number</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['idnumber'];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['pnumber'];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['username'];?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                
                                <form  method="POST" action="actions/updatep.php" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                        <img class='rounded-circle' 
                                        src="actions/documents/<?php echo $row['photo'];?>" alt='No photo'> 
                                        <?php
                                }
                                }
                                ?>
                                            
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Wallet address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="waddress" type="text" class="form-control" id="fullName" required>
                                        </div>
                                    </div>
                           
                                    
                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Profile photo</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input  type="file" name="photo" class="form-control" id="Job" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">ID Card</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="file" name = "idcard" class="form-control" id="Job" required>
                                        </div>
                                    </div>

                                    
                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">ID Card no.</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" name ="idnumber" class="form-control" id="Job" required>
                                        </div>
                                    </div>

                                    
                                    <div class="text-center">
                                        <button type="submit" name ="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
                          

                                <!-- Change Password Form -->
                                

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include_once 'footerlinks.php';?>
