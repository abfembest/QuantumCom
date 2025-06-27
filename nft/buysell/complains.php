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
                          <th>#</th>
                          <th>Userid</th>
                          <th>username</th>
                          <th>Wallet</th>
                          <th>Complain</th>
                          <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                             include 'db_connect.php';
                                $sql ="SELECT * FROM quantum.complaints Where status =0";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {

                                  $profile = $row['level'];
                                  ?>
                        
                        <tr>    
                                <td scope = "row"><?php echo $row['id'];?>
                                <td><?php echo $row['userid']; ?></td>
                                <td scope = "row"><?php echo $row['username']; ?></td>
                                <td><?php echo $row['waddress']; ?></td>
                                <td scope = "row"><?php echo $row['complain']; ?></td>
                                <td scope = "row"><a href="cdetail.php?id=<?php echo $row['id'];?>" class="btn btn-info" id="delete">view</a>
                             
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