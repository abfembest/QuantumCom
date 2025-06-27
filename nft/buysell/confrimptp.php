<?php include 'sidemenu.php' ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 m-auto">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Confirm payment</h3>
              </div>
                    <!-- /.card-header -->
              <div class="card-body">
                <form method = "POST" action = "actions/confirmbuy.php">
                <?php include "db_connect.php";
                          $id = $_GET['id'];
                          echo $id;
                          $name1 = $_SESSION['username'];
                          $sql ="SELECT * FROM quantum.buyers WHERE id = '$id' and sellerid = '$name1'";
                          $result = $connect->query($sql);
                          if ($result-> num_rows >0) {
                            while ($row = $result-> fetch_assoc()) {?>
                              <p class ="text-center text-danger w-bold"><b>Make sure your receive funds before confirmation.</b></p>
                  <div class="col-12 mb-3">
                    <label>Bought with :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['coin'];?></label><br>
                    <label>NFT UNIT :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['unit'];?></label><br>
                    <label>Buyer's wallet :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['buyerwaddress'];?></label><br>
                    <label>Buyer's ID: </label>&nbsp;&nbsp;&nbsp;<label><?php echo $row['userid'];?></label><br>
                    <label>Amount: </label>&nbsp;&nbsp;&nbsp;<label>$<?php echo ($row['unit']*10);?></label><br>
                    <input type="hidden" value = "<?php echo $row['unit'];?>" id="quan" name ="balance">
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
             
                 
          
                   <!--<div class="row justify-content-center">
                      <label class="h6 ">Copy seller USDT address to pay</label>
                      <div class="col-8 mb-3 input-group">
                    <input type="text" class="form-control" style="border-radius: 17px 0px 0px 17px" value="<?php echo $row['waddress'];?>" id ="myInput" readonly name = "sellerwaddress">-->
                    <?php
                            }
                          }
                  ?>
                    <!--
                    <p class="btn btn-info" style="border-radius: 0px 17px 17px 0px"><i class="fa fa-copy mr-2" onclick = "copyadd()"></i>Copy</p>
              </div>
                    </div>-->
                          
                  <div class="card-footer col-12">
                  <button type="submit" class="btn btn-success col-5 text-center" name="confirm" >Confirm</button>                  
                </div>
                </div>
              </div>
</form>
              <!-- /.card-body -->
            </div>
          </div>

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