<?php session_start();
include 'toplinks.php';
/*function getime1($value){
  $tzone = date_default_timezone_set('Africa/Lagos');
  $time_ago = strtotime($value);
  $current_time = time();
  $timedifference = $current_time -$time_ago;
  $seconds = $timedifference;
  $minutes = round($seconds / 60); 
  $hours = round($seconds/3600);
  $days= round($seconds/86400);
  $weeks = round($seconds/604800);
  $months = round($seconds/2629440);
  $years = round($seconds / 31553280);

echo $tzone. '<br>';
echo $seconds. '<br>';
echo $minutes.'<br>';
echo $hours. '<br>';
echo $days. '<br>';
echo $weeks. '<br>';

}
$time = '2022-09-03 19:50:00';
getime1($time);

/*$d1 = new DateTime("2018-01-10 00:00:00");
$d2 = new DateTime("2019-05-18 01:23:45"); 
$interval = $d1->diff($final);
$diffInSeconds = $interval->s; //45
$diffInMinutes = $interval->i; //23
$diffInHours   = $interval->h; //8
$diffInDays    = $interval->d; //21
$diffInMonths  = $interval->m; //4
$diffInYears   = $interval->y; //1
 echo $diffInMinutes.'<br>';
 echo $final;
 ?>

 <p> Another options</p>

 <?php 
 include 'db_connect.php';
$timeFirst  = strtotime('2022-08-30 19:08:32.00');
$timeSecond = strtotime('2022-08-30 19:18:20');
#$timeFirst  = strtotime('2022-08-30 19:08:32.00');
#$timeSecond = strtotime(date('Y-m-d H:m:s'));
$differenceInSeconds = $timeSecond - $timeFirst;
echo ($differenceInSeconds/60);

  ?>
  <p>
  	<?php
  	echo date('Y-m-d H:m:s');

  	// microtime(true) returns the unix timestamp plus milliseconds as a float

  	?>
  </p>

  <p>
  	<?php

  	include 'db_connect.php';
                                $sql ="SELECT * FROM quantum.assignlevel Where id =1";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {

                                  $profile = $row['assign_date'];
                                  }
  	$date1 = "2021-09-05 01:00:00";
$date2 = date('Y-m-d H:m:s');
$timestamp1 = strtotime($date1);
$timestamp2 = strtotime($date2);
  
$hours = abs($timestamp2 - $timestamp1)/(60*60);
  
echo "Difference between two dates is " . $hours . " hour(s)";*/



                              include_once 'db_connect.php';
                       
                                
                          $sql ="SELECT * FROM quantum.buyers WHERE bstatus !=3 AND confirmedby = ''";
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
                                    

                                  
                          #echo $seconds."<br>";
                          #echo $minutes."<br>";
                          if ($minutes > 40) {
                          #$query= "UPDATE quantum.market SET unit = (unit + $unit), status = 0 WHERE id = '$tranid' AND status != 0;UPDATE quantum.applicants SET nftwaiting =(nftwaiting -'$unit'),paystatus = '0'  WHERE username = '$userid';
                          #DELETE * FROM quantum.market WHERE id = '$tranid'
                          ";
                          mysqli_multi_query($connect,$query);
                          }

                          
                        }

                      }
                         ?>
                          