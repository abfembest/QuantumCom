
                    <?php 
                            include_once 'db_connect.php';

                                          $name  = $_SESSION['username'];
                                          
                                                $sql ="SELECT * FROM quantum.buyers WHERE userid = '$name'  AND bstatus !=3";
                                                      $result = $connect->query($sql);
                                                      if ($result-> num_rows >0) {
                                                        while ($row = $result-> fetch_assoc()) {
                                                          $id = $row['id'];
                                                          $unit = $row['unit'];

                                          
                                          
                                          } 
                                          if ($unit > 0) {
                                            
                        echo '<div class="col-xxl-4 col-md-6 ">
                      <div class="card info-card revenue-card bg-warning">
                    
                        <div class="card-body">
                          <h5 class="card-title">Urgent attention <span>|</span></h5>
                    
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-person-circle"></i>
                            </div>
                            <div class="ps-3">
                              <h4> You have '. $unit .' Units awaiting your payment or confirmation </h4>
                              <span class="text-success small pt-1 fw-bold"><span class="text-muted  pt-5 ps-1"><a href = "pending.php"><p"><b>Check here</b></p></a></span> 
                    
                            </div>
                          </div>
                        </div>
                    
                      </div>
                    </div>
                      ';
}
                                          }


                  
?>

           