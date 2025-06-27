<?php include 'sidemenu.php' ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Confirm payment</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
        <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8"  style="border-top:20px solid rgb(255, 213, 0);">
                <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><h1><b>Confirm payment</b></h1><hr></h5>
            <form method = "POST" action = "actions/confirmbuy.php">
                <?php include "db_connect.php";
                          $id = $_GET['id'];
                          $name1 = $_SESSION['username'];
                          $sql ="SELECT * FROM quantum.buyers WHERE id = '$id' and sellerid = '$name1'";
                          $result = $connect->query($sql);
                          if ($result-> num_rows >0) {
                            while ($row = $result-> fetch_assoc()) {
                                $confirmed = $row['bstatus']
                              ?>
                              <p class ="text-center text-danger w-bold"><b>Make sure your receive funds before confirmation.</b></p>
                  <div class="col-12 mb-3">
                    <label>Bought with :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['coin'];?></label><br>
                    <label>NFT UNIT :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['unit'];?></label><br>
                    <label>Buyer's wallet :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['buyerwaddress'];?></label><br>
                    <label>Buyer's ID: </label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['userid'];?></label><br>
                    <label>Amount: </label>&nbsp;&nbsp;&nbsp;<label>$<?php echo ($row['unit']*20);?></label><br>
                    <input type="hidden" value = "<?php echo $row['unit'];?>" id="quan" name ="balance">
                    
                    <div class="row"> 
                      <div class="col-lag-4"><label><b>Payment hash code</b></label></div>
                      <div class="col-lag-8">
                      <input type="text" value = "<?php echo $row['thash'];?>" id="quan" name ="thash" class = "form-control col-lg-8" readonly>
                    </div>
                    
                    </div>
                    <!--<input type="text" class="form-control" name="coin" value = "<?php echo $row['coin'];?>" readonly>-->
                    <input type = "hidden" value = "<?php echo $id;?>" name = "id" id="id">
                    <input type = "hidden" value = "<?php echo $row['tranid'];?>" name = "tranid">
                  <input type = "hidden" value = "<?php echo $row['userid'];?>" name = "buyerid">
                  <input type = "hidden" value = "<?php echo $row['buyerwaddress'];?>"  readonly>
                  <input type = "hidden" value = "<?php echo $row['sellerid'];?>"  readonly name="sellerid">
                  <input type = "hidden" value = "<?php echo $row['unit'];?>"  readonly name="unit">
                  <input type="hidden" value = "<?php echo $_SESSION['username'];?>" name="userid">
                  </div>
                     <!--<input type="hidden" class="form-control" oninput="display()" min="0" id="data" name="unit">
                       <label>Total Amount:</label> <span id="display"></span>-->
                  
                    <input type="hidden" class="form-control" placeholder="Contract Address" name = "buyerwaddress" value = "<?php echo $_SESSION['waddress']; ?>" readonly >
             
                 
          
                    <?php
                            }
                          }
                          if ($confirmed == 3) {

                            echo '
                                <div class="card-footer col-12 text-center">
                                <p class = "text-danger text-center fw-bolder">This transaction already confirmed</p>
                                <button type="submit" class="btn btn-danger col-5 text-center" name="delete" >Delete</button>                  
                              </div>

                            ';
                          }else{
                            echo '
                                 <div class="card-footer col-12 text-center">
                                <button type="submit" class="btn btn-success col-5 text-center" name="confirm" >Confirm</button>                  
                              </div>
                            ';
                          }
                  ?>
                   
                          
                 
                </div>
              </div>
                                </div>
            
                </div>
            </div>
        </div>
    </section>
</main>


</main><!-- End #main -->
<?php include_once 'footerlinks.php';?>