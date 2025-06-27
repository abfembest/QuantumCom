<?php include 'sidemenu.php';
include 'db_connect.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 m-auto">

          <?php
                
                $id=$_GET['id'];
                  $sql = "SELECT * FROM quantum.complaints Where status =0 and id ='$id'";
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
              <form action="actions/action_complaint.php" method="POST" >
                  
                
                </div>
          <div class="row">
             

              <div class="col-md-6 m-auto mt-1">
                <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Complain resolution</h3>
              </div>
              <input type = "text" value ="<?php echo $row['id'];?>" name ="id"> 
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-user mr-1"></i>User name</strong>

                <p class="text-muted">
                <?php echo $row['username'];?>
                </p>

                
                <!--<hr>

                <strong><i class="fa fa-mail-bulk mr-1"></i> Email</strong>

                <p class="text-muted"><?php #echo $row['userid'];?></p>

                <hr>
                  <strong><i class="fas fa-phone mr-1"></i> Wallet address </strong>

                <p class="text-muted"><?php #echo $row['waddress'];?></p>-->

                <hr>

                <strong><i class="fas fa-phone mr-1"></i> Complain </strong>

                    <p class="text-muted"><b><?php echo $row['complain'];?></b></p>
                    <p><?php echo $row['transaction_date'];?></p>

                    <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i>Resolution</strong>
              <input type="text"  name="resolution" id="" class="col-lg-12 form-control" required>
              <div class="col-md-6 m-auto p-1 mt-3">
              <button type="submit" class="btn btn-primary float-right" name="submit">Submit</button>
 
                  
                </div>
              
                             <!-- /.card-body -->
            <!-- /.card --></div></div></div>
                  <!-- Document uploaded-->
                 
          </div>

          <?php
                }
                  }
                ?>
              <!-- /.card-body -->
           
              
              
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
</section>