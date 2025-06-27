 <?php 
                            include_once 'db_connect.php';

                                          $name  = $_SESSION['username'];
                                          
                                                $sql ="SELECT * FROM quantum.admessage WHERE id = 1";
                                                      $result = $connect->query($sql);
                                                      if ($result-> num_rows >0) {
                                                        while ($row = $result-> fetch_assoc()) {
                                                          $id = $row['id'];
                                                          $message = $row['message'];

                                          
                                          
                                          } 
                                          if ($message != '') {
                                            
                        echo '<div class="col-xxl-4 col-md-6 ">
                      <div class="card info-card revenue-card bg-warning">
                    
                        <div class="card-body">
                          <h5 class="card-title">Urgent attention <span>|</span></h5>
                    
                          <div class="d-flex align-items-center">
                            <div class="ps-3">
                              <h4>'. $message .'  </h4>
                               
                    
                            </div>
                          </div>
                        </div>
                    
                      </div>
                    </div>
                      ';
}
            

}


                  
?>