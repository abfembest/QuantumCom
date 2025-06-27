<?php
include_once 'db_connect.php';
      
                          $sql ="SELECT * FROM quantum.buyers WHERE sellerid = '$name' AND bstatus !=3 AND confirmedby = ''";
                                $result = $connect->query($sql);
                                if ($result-> num_rows >0) {
                                  while ($row = $result-> fetch_assoc()) {
                                    $bstatus = $row['bstatus'];
                                    $bid = $row['id'];
                                    $thash = $row['thash'];
                                    $buytime = $row['boughtdate'];
                                    $tranid = $row['tranid'];
                                    $sellerid = $row['sellerid'];
                                    $unit = $row['unit'];
                                    $confirmedby = $row['confirmedby'];
                                    $userid = $row['userid'];

                                     $tzone = date_default_timezone_set('Africa/Lagos');
                                    $time_ago = strtotime($buytime);
                                    $current_time = time();
                                    $timedifference = $current_time -$time_ago;
                                    $seconds = $timedifference;
                                    $minutes = round($seconds / 60); 
                                    
                                    	}
                                  
                          #echo $seconds."<br>";
                          #echo $minutes."<br>";
                          if ($minutes > 40) {
                          $query= "UPDATE quantum.market SET unit = (unit + $unit), status = 0 WHERE id = '$tranid' AND status != 0;UPDATE quantum.applicants SET nftwaiting =(nftwaiting -'$unit'),paystatus = '0'  WHERE username = '$userid' and nftwaiting >= '$unit';
                          	DELETE FROM quantum.buyers WHERE id in ($bid)";
                          mysqli_multi_query($connect,$query);
                          }

                          
                          echo " <br>ID ". $bid. "Tranid ".$tranid." buyer ID".$userid;
                          
                        

                      }
                         ?>
