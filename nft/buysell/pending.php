<?php include_once 'sidemenu.php';?>
<main id="main" class="main">

    

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Pending NFTs <span>| Today</span></h5>

                  <table class="table table-borderless datatable" id= "example1">
                    <thead>
                    <tr>
                          <th>ID</th>
                          <th>Phone</th>
                          <th>Unit</th>
                          <th>Tranid</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            include_once 'db_connect.php';

                                          $name  = $_SESSION['username'];   
                                                $sql ="SELECT * FROM quantum.buyers WHERE userid = '$name'  AND bstatus !=3";
                                                      $result = $connect->query($sql);
                                                      if ($result-> num_rows >0) {
                                                        while ($row = $result-> fetch_assoc()) {
                                                          $id = $row['id'];
                                                          $status = $row['bstatus'];
                                                          ?>
                                          <tr>
                                              <!--<td><?php #echo $row['id']; ?></td>-->
                                              <th scope="row"><?php echo $row['coin']; ?></th>
                                              <td><?php echo $row['phone']; ?></td>
                                              <td><?php echo $row['unit']; ?></td>
                                              <td><?php echo $row['tranid'];?></td>
                                              <td><?php echo $row['boughtdate'];?></td>
                                            
                                          <td><?php if($status == 0){?>
                                          <a href="payptpp.php?id=<?php echo $id;
                                          ?>" class="btn btn-info" id="delete">Pay</a>
                                          <?php
                                          }elseif($status == 1){?>
                                          <a href="#" class="btn btn-warning">waiting..</a>
                                          <?php
                                          }else{
                                            echo 'nothing...';
                                          }
                                          ?>
                                          </td>
                                                              
                                              

                                          </tr>
                                          
                      
                    </tbody>
                    <tfoot>
                    
                        <?php
                         }
                        }
                      
                      ?>
                       
                         
                        </tfoot>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->



            <?php include_once 'footerlinks.php';
            include_once 'tablefooter.php';
            ?>