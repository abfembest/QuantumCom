<?php include_once 'sidemenu.php';
    include_once 'db_connect.php';
?>
<main id="main" class="main">

    

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Pending NFTs <span>| Today</span></h5>

                  <table class="table table-borderless datatable" id= "example1">
                    <thead>
                    <tr>
                          <!--<th>Userid</th>-->
                          <th>Name</th>
                          <th>Email</th>
                          <!--<th>Rating</th>-->
                          <th>phone</th>
                          <th>photo</th>
                          <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $sql ="SELECT id,fullname, username, pnumber,profile, rejectedreason, photo FROM quantum.applicants where profile = '0'AND rejectedreason =''";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {

                                  $profile = $row['profile'];
                                  $photo = $row['photo'];
                                  ?>
                        
                        <tr>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['pnumber']; ?></td>
                                <td>
                                  <?php
                                  if(!$photo){
                                    echo 'None';
                                  }else{
                                    echo 'Uploaded';
                                  }
                                ?>
                                </td>
                                <td><a href="userdetails.php?id=<?php echo $row['id'];?>" class="btn btn-info" id="delete">view</a>
                             
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