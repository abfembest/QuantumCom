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
                
                                    <form method = "POST" action = "actions/actionpay.php">
                <?php include "db_connect.php";
                          $id = $_GET['id'];
                          $name = $_SESSION['username'];
                          $sql ="SELECT * FROM quantum.buyers WHERE id = '$id' AND userid ='$name'";
                          $result = $connect->query($sql);
                          if ($result-> num_rows >0) {
                            while ($row = $result-> fetch_assoc()) {?>
                              <p class ="text-center text-danger w-bolder"><b>Make sure you send USDT BEP20 to the address below.</b></p>
                  <div class="col-12 mb-3">
                    <!--<label>Bought with :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['coin'];?></label><br>-->
                    <label>NFT UNIT :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['unit'];?></label><br>
                    <label>Seller's wallet :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['sellerwaddress'];?></label><br>
                    <label>Seller's ID: </label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['sellerid'];?></label><br>
                    <label>Amount: </label>&nbsp;&nbsp;&nbsp;<label>$<?php echo ($row['unit']*20);?></label><br>
                    <input type="hidden" value = "<?php echo $row['unit'];?>" id="quan" name ="balance">
                    <!--<input type="text" class="form-control" name="coin" value = "<?php echo $row['coin'];?>" readonly>-->
                    <input type = "text" value = "<?php echo $id;?>" name = "id" id="id">
                    <input type = "hidden" value = "<?php echo $row['tranid'];?>" name = "tranid">
                  <input type = "hidden" value = "<?php echo $row['userid'];?>" name = "buyerid">
                  <input type = "hidden" value = "<?php echo $row['buyerwaddress'];?>">
                  <input type = "hidden" value = "<?php echo $row['sellerid'];?>"  name="sellerid">
                  <input type = "hidden" value = "<?php echo $row['unit'];?>"  readonly name="unit">
                  <input type="hidden" value = "<?php echo $_SESSION['username'];?>" name="userid">
                  </div>
                     <!--<input type="hidden" class="form-control" oninput="display()" min="0" id="data" name="unit">
                       <label>Total Amount:</label> <span id="display"></span>-->
                  
                    <input type="hidden" class="form-control" placeholder="Contract Address" name = "buyerwaddress" value = "<?php echo $_SESSION['waddress']; ?>" readonly >
             
                 
          
                   <!--<div class="row justify-content-center">
                      <label class="h6 ">Copy seller USDT address to pay</label>
                      <div class="col-8 mb-3 input-group">
                    <input type="text" class="form-control" style="border-radius: 17px 0px 0px 17px" value="<?php# echo $row['waddress'];?>" id ="myInput" readonly name = "sellerwaddress">-->
                   
                    <!--
                    <p class="btn btn-info" style="border-radius: 0px 17px 17px 0px"><i class="fa fa-copy mr-2" onclick = "copyadd()"></i>Copy</p>
              </div>
                    </div>-->
                          
                  <div class="card-footer col-12 text-center">
                  <button type="submit" class="btn btn-warning w-75 m-auto" name="confirm" >I have paid</button>
                 <!-- <button type="submit" class="btn btn-danger col-5 float-right" name="reject" >Reject</button>-->
                  
                </div>
                </div>
              </div>

              <?php
                            }
                            
                            
                          }
                          else {
                            echo 'Transaction not found';
                          }
                  ?>
</form>


</main><!-- End #main -->
<?php include_once 'footerlinks.php';?>