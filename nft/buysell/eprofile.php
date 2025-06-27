<?php include 'sidemenu.php';
include 'db_connect.php';?>
<main id="main" class="main">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 m-auto">
          <form method="POST" action="actions/updatep.php" enctype="multipart/form-data">
            <!-- Profile Image -->
            <div class="card card-success card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <?php
                if(isset($_SESSION['status'])){
                  echo '<p class= "text-danger w-bold"><b>'.$_SESSION['status'].'</b></p>';
                  unset($_SESSION['status']);
                }
                $name = $_SESSION['username'];
                $sql = "SELECT fullname, username, pnumber, idnumber, identity,country, waddress, idcard, photo FROM quantum.applicants WHERE username ='$name' ";
                $result = $connect->query($sql);
                if ($result-> num_rows >0) {
                while ($row = $result-> fetch_assoc()) {?>
                  <img class="profile-user-img img-fluid img-circle top-3"
                  src="actions/documents/<?php echo $row['photo'];?>" alt="No photo";?
                       alt="User profile picture" style = "width:100px; height:100px;">
                <!--<div class="float-right">
                  <a href="" class="btn btn-success">Edit Profile</a>
                </div>-->
                </div>
                


                

                <h3 class="profile-username text-center"><?php echo $row['fullname'];?></h3>

                <p class="text-muted text-center"><?php echo $row['username'];?></p>

                <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header bg-success">
                <h3 class="card-title">Edit Profile</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <label>USDT BEP20 Wallet Address</label>

                <div>
                  <input type="text" name="waddress" class="form-control" required>
                </div>
                <!--<hr>
                <label>User Id</label>

                  <div>
                    <input type="text" name="myid" class="form-control" required placeholder="Create your user id">
                  </div>-->
                  <hr>

              
                <label>Profile Picture</label>

                <div>
                  <input type="file" name="photo" class="form-control" required>
                </div>


                <hr>
                
                <label>ID Card</label>

                <div>
                  <input type="file" name="idcard" class="form-control" required>
                </div>

                <label>ID Number</label>

                <div>
                  <input type="text" name="idnumber" class="form-control" required>
                </div>

                
                <div class="m-3 float-right">
                  <button type="submit" name="submit" class="btn btn-success">Update</button>
                </div>
                <?php
                }
                 }
                ?>

            </div>
          </div>
                </main>