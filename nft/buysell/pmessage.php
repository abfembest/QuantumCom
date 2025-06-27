 <?php 
                            include_once 'db_connect.php';

                                          $name  = $_SESSION['username'];
                                          
                                                $sql ="SELECT id, username, mymessage FROM quantum.applicants WHERE username = '$name'";
                                                      $result = $connect->query($sql);
                                                      if ($result-> num_rows >0) {
                                                        while ($row = $result-> fetch_assoc()) {
                                                          $id = $row['id'];
                                                          $mymessage = $row['mymessage'];

                                          
                                          
                                          } 
                                          if ($mymessage != '') {
                                            
                        echo '<div class="col-xxl-4 col-md-6 ">
                      <div class="card info-card revenue-card bg-warning">
                    
                        <div class="card-body">
                          <h5 class="card-title">Support response <span>|</span></h5>
                    
                          <div class="d-flex align-items-center">
                            <div class="ps-3">
                              <h4>'. $mymessage .'  </h4>
                               <span class="text-success small pt-1 fw-bold"><span class="text-muted small pt-2 ps-1"><a href = "actions/clearmsg.php?id='.$id.'"><p"><b>Clear message</b></p></a></span> 
                    
                            </div>
                          </div>
                        </div>
                    
                      </div>
                    </div>
                      ';
}
            

}


                  
?>