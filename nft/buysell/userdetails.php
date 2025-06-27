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

          <?php
                
                $id=$_GET['id'];
                  $sql = "SELECT id, photo, fullname, username,identity, idnumber, country, waddress,gender,pnumber FROM quantum.applicants WHERE id ='$id'";
                  $result = $connect->query($sql);
                  if ($result-> num_rows >0) {
                  while ($row = $result-> fetch_assoc()) {?>

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                    
              <div class="card-body box-profile">
                <div class="text-center">
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
              <form action="actions/profapp.php" method="POST" >
                  <img class="profile-user-img img-fluid img-thumnail w-50"
                  src="actions/documents/<?php echo $row['photo'];?>" alt="No photo";?>
                
                </div>
                

                <h3 class="profile-username text-center" name="pname"><?php echo $row['fullname'];?></h3>

                <p class="text-muted text-center" name="job"><?php echo $row['username'];?></p>
          <div class="row">
             <div name='document' id="" class="col-md-6 float-left">
                      <img class="col-md-12 img-fluid img-thumnail"
                  src="actions/documents/<?php echo $row['photo'];?>" alt="No photo";?>
                  
            </div>

              <div class="col-md-6 float-right mt-1">
                <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Verification page</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-user mr-1"></i>Name</strong>

                <p class="text-muted">
                <?php echo $row['identity'];?><?php echo'<br>' ?><?php echo $row['idnumber'];?>
                </p>

                <hr>

                <strong><i class="fa fa-mail-bulk mr-1"></i> Email</strong>

                <p class="text-muted"><?php echo $row['country'];?></p>

                <hr>

                <strong><i class="fas fa-phone mr-1"></i> Phone number </strong>

                <p class="text-muted"><?php echo $row['waddress'];?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i>Other Details</strong>

                <p class="text-muted">
                  <span class="tag tag-success"><?php echo $row['gender'];?></span>,&nbsp;&nbsp;
                  <span class="tag tag-danger"><?php echo $row['pnumber'];?></span>
                  <!--<span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary"></span>-->
                </p>

                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                <input type="hidden" name="userid" value="<?php echo $row['username'];?>">

                             <!-- /.card-body -->
            <!-- /.card --></div></div></div>
                  <!-- Document uploaded-->
                 
          </div>

          <?php
                }
                  }
                ?>
              <!-- /.card-body -->
           
              <h5 class="p-2 b">Reason for rejection.<small class="text-danger">*</small></h5>
              <input type="text"  name="rejected" id="" class="col-lg-12">
              
                  <div class="col-md-6 m-auto p-1 mt-3">
                  <button type="submit" class="btn btn-danger float-left" name="reject">Reject</button>
 
                  <button type="submit" class="btn btn-success float-right" name="submit">Approve</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
</section>
</main>