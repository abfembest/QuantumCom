<?php include_once 'sidemenu.php';?>
<main id="main" class="main">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                

                <div class="card-body">
                  <h5 class="card-title">P2P market <span>| Pending</span></h5>

                  <table class="table table-borderless datatable" id="example1">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Price</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th scope="col">Action</th>
                        <th scope="col">Stop transaction</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                              include_once 'db_connect.php';
                          $name  = $_SESSION['username'];
                          $sql ="SELECT * FROM quantum.buyers WHERE sellerid = '$name' AND bstatus != 3";
                                $result = $connect->query($sql);
                                if ($result-> num_rows >0) {
                                  while ($row = $result-> fetch_assoc()) {
                                    $status = $row['bstatus'];
                                    $id = $row['id'];
                                    $thash = $row['thash'];
                                    $buytime = $row['boughtdate'];
                                    $tranid = $row['tranid'];
                                    $sellerid = $row['sellerid'];
                                    $unit = $row['unit'];
                                    $confirmedby = $row['confirmedby'];
                                    $userid = $row['userid'];
                                    $bphone = $row['phone'];


                                     $tzone = date_default_timezone_set('Africa/Lagos');
                                    $time_ago = strtotime($buytime);
                                    $current_time = time();
                                    $timedifference = $current_time -$time_ago;
                                    $seconds = $timedifference;
                                    $minutes = round($seconds / 60); 
                                    

                                    ?>

                                  

                          <tr>
                      
                        <th scope="row"><a href="#"><?php echo $row['id']; ?></a></th>
                        <td><?php echo $row['unit']; ?></td>
                        <td><a href="#" class="text-primary"><?php echo '$'.$row['unit']*20; ?></a></td>
                        <td>
                          <?php echo $userid; ?>
                        </td>
                        <td> <?php echo $bphone; ?></td>
                        <td><?php if($status == 1 ){?>
                             <a href="confirmptp.php?id=<?php echo $id;
                             ?>&thash=<?php echo $thash;?>" class="btn btn-info" id="delete">Confirm</a>
                             
                             <?php
                          }elseif(($status == 0) AND ($minutes < 2)){?>
                            <a href="#" class="btn btn-warning" id="delete">Awaiting payment</a>

                           <?php
                           
                          }elseif($status == 0 AND $minutes >=2){?>
                            <a href="cancelptp.php?id=<?php echo $id;
                             ?>&tranid=<?php echo $tranid;?>" class="btn btn-danger" id="delete" name ="cancel">
                            Time elapsed Cancel</a>
                           <?php
                          }
                          ?>
                          </td>
                       <td>
                           <a href="cancelptp.php?id=<?php echo $id;
                             ?>&tranid=<?php echo $tranid;?>" class="btn btn-danger" id="delete" name= "cancelp">
                            Cancel</a>
                        </td>
                      </tr>
                      <?php
       }               
      }
    
  
      ?>
                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->


            <?php include_once 'footerlinks.php';
                include_once 'tablefooter.php';
            ?>

