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
                                    <h5 class="card-title"><h1><b>Approve rent</b></h1><hr></h5>
                                    <form method = "POST" action = "actions/apayrent.php">
                <?php include "db_connect.php";
                          $id = $_GET['id'];
                          $name1 = $_SESSION['username'];
                          $sql ="SELECT * FROM quantum.rent WHERE id = '$id'";
                          $result = $connect->query($sql);
                          if ($result-> num_rows >0) {
                            while ($row = $result-> fetch_assoc()) {?>
                              <p class ="text-center text-danger w-bold"><b>Make sure your receive funds before confirmation.</b></p>
                  <div class="col-12 mb-3">
                    <label>Paid with :</label>&nbsp;&nbsp;&nbsp;<label><?php echo 'USDT';?></label><br>
                   
                    <label>Payer's wallet :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['walletaddress'];?></label><br>
                    <label>Tran. Hash :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['tash'];?></label><br>
                    <label>payer's ID: </label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['userid'];?></label><br>
                    <label for="">Amount paid:</label>
                    <input type="text" disabled value = "<?php echo $row['amount'];?>" id="quan" name ="amount">
                    <input type = "hidden" value = "<?php echo $id;?>" name = "tranid" >
                  <input type = "hidden" value = "<?php echo $row['userid'];?>" name = "payerid">
                  <input type = "hidden" value = "<?php echo $row['walletaddress'];?>"  readonly name = "payerwaddress">
                  <input type="hidden" value = "<?php echo $row['username'];?>" name="payername">

                  <input type="hidden" value = "<?php echo $name1;?>" name="confirmedby">
                  </div>                  
                    <input type="hidden" class="form-control" placeholder="Contract Address" name = "confirmedby" value = "<?php echo $_SESSION['myid']; ?>" readonly >
             
                    <?php
                            }
                          }
                  ?>
                   
                          
                  <div class="card-footer col-12">
                  <button type="submit" class="btn btn-success col-5 text-center" name="confirm" >Confirm</button>                  
                </div>
                </div>
              </div>
    </section>
</main>


</main><!-- End #main -->
<?php include_once 'footerlinks.php';?>