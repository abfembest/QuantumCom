<?php include 'sidemenu.php' ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Cancel payment</li>
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
                                    <h5 class="card-title"><h1><b>Cancel long waited transaction</b></h1><hr></h5>
            <form method = "POST" action = "actions/cancelbuy.php">
                <?php include "db_connect.php";
                          $id = $_GET['id'];
                          $tranid = $_GET['tranid'];
                          $name1 = $_SESSION['username'];
                          $sql ="SELECT * FROM quantum.buyers WHERE id = '$id' and sellerid = '$name1'";
                          $result = $connect->query($sql);
                          if ($result-> num_rows >0) {
                            while ($row = $result-> fetch_assoc()) {

                              ?>
                              <p class ="text-center text-danger w-bold"><b>Ensure you cancel correct transaction.</b></p>
                  <div class="col-12 mb-3 fw-bolder">
                    <label>Date :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['boughtdate'];?></label><br>
                    <label>NFT UNIT :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['unit'];?></label><br>
                    <label>Buyer's phone :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['phone'];?></label><br>
                    <label>Buyer's email: </label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['userid'];?></label><br>
                    <label>Amount: </label>&nbsp;&nbsp;&nbsp;<label>$<?php echo ($row['unit']*20);?></label><br>
                    <input type="hidden" value = "<?php echo $row['unit'];?>" id="quan" name ="unit">
                    <input type = "hidden" value = "<?php echo $id;?>" name = "id" id="id">
                    <input type = "hidden" value = "<?php echo $row['tranid'];?>" name = "tranid">
                  <input type = "hidden" value = "<?php echo $row['userid'];?>" name = "buyerid">
                  <input type = "hidden" name="bwaddress" value = "<?php echo $row['buyerwaddress'];?>"  readonly>
                  <input type = "hidden" value = "<?php echo $row['sellerid'];?>"  readonly name="sellerid">                  
                  </div>   
                  <input type = "hidden" value = "<?php echo $row['bstatus'];?>"  readonly name="bstatus">
                  <input type = "hidden" value = "$<?php echo ($row['unit']*20);?>"  readonly name="amount">
                  <input type = "hidden" value = "<?php echo $row['sellerwaddress'];?>"  readonly name="waddress">

                  </div>             
                    <?php
                            }
                          }
                  ?>
                          
                  <div class="card-footer col-12 text-center">
                  <button type="submit" class="btn btn-danger col-lg-8 text-center fw-bolder" name="cancel" >Cancel order</button>                  
                </div>
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