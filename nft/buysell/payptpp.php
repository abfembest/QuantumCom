<?php include 'sidemenu.php' ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <main id="main" class="main">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 m-auto">
            <div class="card card-warning">
              <div class="card-header">
                
                <h3 class="card-title">Make payment</h3>
              </div>
                    <!-- /.card-header -->
              <div class="card-body">

              
              
                <form method = "POST" action = "actions/actionpay.php">
                <?php include "db_connect.php";
                          //$id = $_GET['id'];
                          $name = $_SESSION['username'];
                          $sql ="SELECT * FROM quantum.buyers WHERE userid ='$name' && bstatus = 0";
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
                    <!--Hash code -->
                    <label><b>Paste Hash code:</b> </label>
                    <input type="text" name="thash" class="form-control col-lg-8" placeholder="Paste transaction hash code" required>


                    <input type = "hidden" value = "<?php echo $row['id'];?>" name = "id" id="id">
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
              <!-- /.card-body -->
            </div>
          </div>
</main>
          <script>
              function display() {
                var quantity = parseFloat(document.getElementById("data").value);
                //var output = document.getElementById("display");
                var rate = parseFloat(document.getElementById("rate").value);

                var cost = quantity * rate;

                document.getElementById("display").innerHTML = "$"+cost;
                //output.innerHTML(cost);

              }

             
        </script>

<script>
    function copyadd() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
  </script>