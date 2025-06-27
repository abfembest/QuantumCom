<?php include 'sidemenu.php';
    include_once 'db_connect.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Complain</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
        <section class="section dashboard">
        <div class="row">
            
          <?php

                
                $id=$_GET['id'];
                  $sql = "SELECT * FROM quantum.complaints Where status =0 and id ='$id'";
                  $result = $connect->query($sql);
                  if ($result-> num_rows >0) {
                  while ($row = $result-> fetch_assoc()) {?>
            <!-- Left side columns -->
            <div class="col-lg-8"  style="border-top:20px solid rgb(0, 81, 255);">
                <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><h1><b>Complain resolution</b></h1><hr></h5>
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
                <input type = "hidden" value ="<?php echo $row['id'];?>" name ="id"> <input type="hidden" name="username" value="<?php echo $row['username']?>">
                <!-- /.card-header -->
                <div class="card-body">
                  <strong><i class="fas fa-user mr-1"></i>User name</strong>
  
                  <p class="text-muted">
                  <?php echo $row['username'];?>
                  </p>
  
                  <strong><i class="fas fa-phone mr-1"></i> Complain </strong>
  
                      <p class="text-muted"><b><?php echo $row['complain'];?></b></p>
                      <p><?php echo $row['transaction_date'];?></p>
  
                      <hr>
  
                      <br>
                          <label class="bi bi-pen"><b>Resolution:</b></label><br>
                        <textarea name="resolution" id="" cols="30" rows="10" class="form-control"></textarea> <br>
                        <input type="submit" value="Submit" class="btn btn-primary col-lg-8 " name = "submit">
              
                
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
            </div> <br> 
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