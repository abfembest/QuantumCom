<?php include_once 'sidemenu.php';
    include_once 'db_connect.php';
?>
<main id="main" class="main">

    

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">All participants <span>| Today</span></h5>

                  <table class="table table-borderless datatable" id= "example1">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Email</th>
                          <th>User ID</th>
                          <th>Wallet</th>
                          <th>NFT</th>
                          <th>referals</th>
                          <!--<th>Action</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                             include 'db_connect.php';
                                $sql ="SELECT id, fullname, username,myid,country,nft,referals, waddress FROM quantum.applicants";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {

                                  
                                  ?>
                        
                        <tr>    
                                <td scope = "row"><?php echo $row['id'];?>
                                <td scope = "row"><?php echo $row['username']; ?></td>
                                <td scope = "row"><?php echo $row['myid']; ?></td>
                                <td><?php echo $row['waddress']; ?></td>
                                <td><?php echo $row['nft']; ?></td>
                                <td><?php echo $row['referals']; ?></td>
                                <!--<td><a href="complaindetails.php?id=<?php# echo $row['id'];?>" class="btn btn-info" id="delete">view</a>
                             
                          </td>-->
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
            include_once 'tablefooter2.php';
            ?>