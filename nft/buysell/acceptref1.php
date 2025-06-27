<?php
include 'sidemenu.php' ;
      include 'db_connect.php';
      
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div>
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Buy</li>
            </ol>
          </div>-->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <?php
$name = $_SESSION["username"];
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 m-auto">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">New referer</h3>
              </div>


                
                    <!-- /.card-header -->

                    
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <form action="actions/acceptref.php" method="post">
                      <?php
                        if(isset($_SESSION['status'])){
                          echo '<p class= "text-center text-success font-weight-bolder">'.$_SESSION['status'].'</p>';
                          unset($_SESSION['status']);
                        }
                      ?>
                      <?php
                      
                      ?>
                    <!--<span>1 GRAIN = <input type="hidden" id="rate" value="10.0" min="0" disabled ><span> 10.0 USDT</span><span class="ml-5">My NFT: <?php?></span>
                    <label>Sell With</label>: USDT PEP20-->
                  </div>
                    
                 
                  
                  

                    <!--<label>Number</label>&nbsp&nbsp&nbsp<label>Buyer/seller level</label>-->
                              
                   
                    <label for="" id='notice' class ='font-weight-bold text-danger'></label><br>
                        <label>Total waiting referals :</label> <span id="display"><?php echo $waitref; ?></span>
                  </div>
                  <input type = "hidden" name="userid" value = "<?php echo $_SESSION['username'] ?>">
                  <input type = "hidden" name="fullname" value = "<?php echo $_SESSION['fullname'] ?>">
                  <input type = "hidden" name="refid" value = "<?php echo $ref; ?>">
                  <div class="col-12 mb-3">
                  <!--<label>Contract Address</label>-->

                    <input type="hidden" readonly class="form-control" name="unit" value = "<?php echo $waitref; ?>">
                  </div>
                  <div class="card-footer col-12">
                  <button type="submit" class="btn btn-danger col-12" name ="submit" onclick="sell()">Accept</button>
                </div>
                </form>
                </div>
                <?php
                            }
                            ?>
              </div>

             
                                          <!-- /.card-body -->
            </div>
          </div>

          <script>
              function display() {
                
                var quantity = parseInt(document.getElementById("data").value);
                //var output = document.getElementById("display");
                var rate = parseFloat(document.getElementById("rate").value);
                var quan = parseInt(document.getElementById("quan").value);

                var cost = quantity * rate;

                document.getElementById("display").innerHTML = '$'+cost;
                //output.innerHTML(cost);
                if(quantity > quan){
                  var notify = document.getElementById('notice').innerHTML = 'This unit is higher than sellable grains.';

              }
            }
              
        </script>