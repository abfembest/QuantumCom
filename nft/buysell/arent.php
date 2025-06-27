<?php include_once 'sidemenu.php';?>
<main id="main" class="main">

    

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
              <?php
              if (isset($_SESSION['statu'])) {

                echo '<p class = " text-light text-center w-bold">'. $_SESSION['status'].'</p>';
                unset($_SESSION['status']);
              }
              ?>
                <div class="card-body">
                  <h5 class="card-title">Pending NFTs <span>| Today</span></h5>

                  <table class="table table-borderless datatable" id= "example1">
                    <thead>
                    <tr>
                          <!--<th>Userid</th>-->
                          <th scope ="col" >Email</th>
                          <th scope ="col">ID</th>
                          <!--<th>Rating</th>-->
                          <th scope ="col">Wallet</th>
                          <th scope ="col">amount</th>
                          <th scope ="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $sql ="SELECT id,username, amount, walletaddress,userid,date, rentstatus FROM quantum.rent where rentstatus = '0'";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {

                                 
                                  ?>
                        <tr>    
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['userid']; ?></td>
                                <td scope ="row"><?php echo $row['walletaddress']; ?></td>
                                <td scope ="row"><?php echo $row['amount']; ?></td>
                                
                                <td><a href="aprent.php?id=<?php echo $row['id'];?>" class="btn btn-info" id="delete">view</a>
                             
                          </td>
                        </tr>
        <?php
       }               
      }
    
  
      ?>
                       
                        
                        </tbody>
                        <!--<tfoot>
                        <?php
                          
                          
                               
                       
                      ?>
                       
                         
                        </tfoot>-->
                        
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->



            <?php include_once 'footerlinks.php';
            include_once 'tablefooter.php';
            ?>