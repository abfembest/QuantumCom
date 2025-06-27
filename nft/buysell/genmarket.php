<?php include_once 'sidemenu.php';
include_once 'db_connect.php';

?>
<main id="main" class="main">
  <!--If you are buying more than your holding capacity-->
<?php
              if (isset($_SESSION['status'])) {

                echo '<div class="col-xxl-4 col-md-6 ">
                <div class="card info-card revenue-card bg-warning">
              
                  <div class="card-body">
                    <h5 class="card-title">Notification <span>|</span></h5>
              
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-circle"></i>
                      </div>
                      <div class="ps-3">
                        <h6>'. $_SESSION['status'] .'</h6>            
                      </div>
                    </div>
                  </div>
              
                </div>
              </div>';
                
                unset($_SESSION['status']);        
                
              }
              elseif(isset($_SESSION['bstatus'])){
                        echo '<div class="col-xxl-4 col-md-6 ">
                        <div class="card info-card revenue-card bg-warning">
                      
                          <div class="card-body">
                            <h5 class="card-title">Information <span>|</span></h5>
                      
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                              </div>
                              <div class="ps-3">
                                <h6>' .$_SESSION['bstatus'].'</h6>                   
                              </div>
                            </div>
                          </div>
                      
                        </div>
                      </div>
                        ';
                        unset($_SESSION['bstatus']); 
                        }  
              ?>
 <!-- Recent Sales -->
    <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">General market place <span>| Today</span></h5>

                  <table class="table table-borderless datatable" id = "example1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th data-priority="1">User Id</th>
                        <th>Email</th>
                        <th>NFT</th>
                        <th>Price</th>
                        <th data-priority="1">Action</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                $sql ="SELECT *, id, unit, userid, status,onlineid, (unit* 20) as price FROM quantum.market WHERE unit >0";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {
                                  $status = $row['status'];
                                  $id = $row['id'];
                                  $online = $row['onlineid'];
                                  ?>

                  
                      <tr>
                       <td ><a href="#"><?php echo $row['id']; ?></a></td>
                       <td><?php echo $row['fullname']; ?></td>
                        <td scope="row"><a href="#"><?php echo $row['userid']; ?></a></td>
                        <td><a href="#" class="text-primary"><?php echo $row['unit']; ?></a></td>
                        <td><?php echo '$'. $row['price'];?></td>
                        <td><?php if($status == 1){
                            echo "<a class='btn btn-warning'>waiting<a>";
                          }else{?>
                            <a href="buyptp.php?id=<?php echo $id;
                            ?>" class="btn btn-info" id="delete">Buy</a>
                           <?php
                          }
                          ?>
                          </td>

                          <td>
                                                        
                            <?php if($online == 1){
                            echo "<a class='btn btn-success'>online<a>";
                          }else{?>
                            <a href="#" class="btn btn-secondary" id="delete">Offline</a>
                           <?php
                          }
                          ?>
                          </td>
                         
                      </tr>
                       <?php
       
                        }
                      }
      ?>
                    </tbody>
                    <tfoot>
                     
                    </tfoot>
        
                     
                  </table>

                </div>

              </div>
</div><!-- End Recent Sales -->
            <?php include_once 'footerlinks.php';
              include_once 'tablefooter.php';
            ?>
            