<?php include_once 'sidemenu.php';
    ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
         
          <li class="breadcrumb-item active"><h3>
           
          </h3></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php

        include 'pendingalert.php';
        include 'genmessage.php';
        include 'pmessage.php';
    ?>

    <?php
    include_once 'db_connect.php';
$name = $_SESSION["username"];
$sql ="SELECT paystatus,id,pnumber,waddress,photo,idcard,completeddate,profile,idnumber,referals
      FROM quantum.applicants WHERE username = '$name'";
$result = $connect->query($sql);
if ($result-> num_rows >0) {
  while ($row = $result-> fetch_assoc()) {
    $status = $row['paystatus'];
    $id = $row['id'];
    $phone = $row['pnumber'];
    $idnumber = $row['idnumber'];
    $waddress = $row['waddress'];
    $photo = $row['photo'];
    $idcard = $row['idcard'];
    $completeddate = $row['completeddate'];
    $profile = $row['profile'];
    $level = $row['referals'];

  }
 
  $final =date("Y/m/d h:i:s ");   
  $start =strtotime($completeddate);
  $end = strtotime($final);
  
  $dif = $end-$start;
  $timedif = ($dif/3600);
  

                  if($level<25){

                    echo'<div class="text-center mb-2">
                    <span class="badge bg-primary"><i class="bi bi-star me-1"></i>Buyer and seller level</span>
                    </div>';

                  }elseif($level>=25 && $level<50){
                    echo'<div class="text-center mb-2">
                    <span class="badge bg-primary"><i class="bi bi-star me-1"></i>Retailer level</span>
                    </div>';
                  }elseif($level>=50 && $level<100){
                    echo'<div class="text-center mb-2">
                    <span class="badge bg-primary"><i class="bi bi-star me-1"></i>Wholesaller level</span></div>';
                  }

                  elseif($level>=100 && $level<150){
                    echo'<div class="text-center mb-2">
                    <span class="badge bg-primary"><i class="bi bi-star me-1"></i>Marchant level</span></div>';
                  }
                  elseif($level>=150 && $level<200){
                   echo'<div class="text-center mb-2">
                   <span class="badge bg-primary"><i class="bi bi-star me-1"></i>Distributor level</span>
                   </div>';
                  }
                  elseif($level>=200){
                    echo'<div class="text-center mb-2">
                    <span class="badge bg-primary"><i class="bi bi-star me-1"></i>Producer level</span></div>';
                  }
                  

  if(!$photo||!$phone||!$idnumber||!$waddress||!$idcard){
    echo '<div class="container-fluid">
        <div class="row">
          <div class="col-md-10 m-auto">
            <div class="card card-info">
              
              <div class="card-body p-3 bg-info">
                
                  
                  <div class="card-body mb-4">
                    <div class="row justify-content-center">
                    

                      
                    <div class="row justify-content-center">
               
                
                      <a href="eprofile.php" class=" btn btn-secondary" ><i class="fas fa-user mr-2"></i>Update Profile</a>
                  
                
                  
                  
              </div>
            </div>
            </div>' ;
      
  }elseif(!$profile){

    echo '<div class="container-fluid">
        <div class="row">
          <div class="col-md-10 m-auto">
            <div class="card card-info">
              
              <div class="card-body p-3 bg-info">
                
                  
                  <div class="card-body mb-4">
                    <div class="row justify-content-center">
                    

                      
                    <div class="row justify-content-center">
               
                
                      <a href="#" class=" btn btn-secondary" >
                      <i class="fas fa-user mr-2"></i>Awaiting profile confirmation</a>
                  
                
                  
                  
              </div>
            </div>
            </div>' ;
  
  
}else{?>
  

    
    <section class="section dashboard">
      
      
    <?php

                  $name = $_SESSION['username'];       
                  $query = "SELECT id,idnumber,nft,nftwaiting, salesstatus,nftonsales,referals,waitref, buystatus,message FROM quantum.applicants WHERE username = '$name'";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      $waitref = $row['waitref'];
                      $buystatus = $row['buystatus'];
                      $nft  =  $row['nft'];
                      $nftonsales  =  $row['nftonsales'];
                      $info = $row['message']
                      
                    ?>

                    <!--Message box-->
                    <?php
                        if($info != ''){
                      echo '<div class="col-xxl-4 col-md-6 ">
                      <div class="card info-card revenue-card bg-info">
                    
                        <div class="card-body">
                          <h5 class="card-title">Breaking news <span>|</span></h5>
                              
                          <div class="d-flex align-items-center">
                              
                            </div>
                            <div class="ps-3">
                              <h3>'. $info .'</h3>
                    
                            </div>
                          </div>
                        </div>
                    
                      </div>
                    </div>
                      ';}
                      ?>
                      <?php
                    if($waitref > 0){
                      echo '<div class="col-xxl-4 col-md-6 ">
                      <div class="card info-card revenue-card bg-warning">
                    
                        <div class="card-body">
                          <h5 class="card-title">New bonus <span>|</span></h5>
                    
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-person-circle"></i>
                            </div>
                            <div class="ps-3">
                              <h6>'. $waitref .'</h6>
                              <span class="text-success small pt-1 fw-bold"><span class="text-muted small pt-2 ps-1"><a href = "acceptref.php"><p"><b>Accept referer</b></p></a></span> 
                    
                            </div>
                          </div>
                        </div>
                    
                      </div>
                    </div>
                      ';
                      #comfirm transations
                    }elseif($buystatus > 0){
                      echo '<div class="col-xxl-4 col-md-6 ">
                      <div class="card info-card revenue-card bg-warning">
                    
                        <div class="card-body">
                          <h5 class="card-title">New bonus <span>|</span></h5>
                    
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                              <h6>Someone had paid for your NFT, kindly confirm</h6>
                              <span class="text-success small pt-1 fw-bold"><span class="text-muted small pt-2 ps-1"><a href = "market.php"><p"><b>Confirm here</b></p></a></span> 
                    
                            </div>
                          </div>
                        </div>
                    
                      </div>
                    </div>
                      ';
                    }elseif($nft < 1 and $nftonsales < 1){
                        echo '<div class="col-xxl-4 col-md-6 ">
                        <div class="card info-card revenue-card bg-warning">
                      
                          <div class="card-body">
                            <h5 class="card-title">Information <span>|</span></h5>
                      
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                              </div>
                              <div class="ps-3">
                                <h6>To avoid being blocked buy NFT now.</h6>
                                <span class="text-success small pt-1 fw-bold"><span class="text-muted small pt-2 ps-1"><a href = "buy.php"><p"><b>Buy here</b></p></a></span> 
                      
                              </div>
                            </div>
                          </div>
                      
                        </div>
                      </div>
                        ';
                    }?>
                    
                    
                    
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

          <?php
                    if(isset($_SESSION['status'])){
                      echo '<p class="text-center btn-success fw-bolder m-auto">'.$_SESSION['status']. '</p>';
                      unset($_SESSION['status']);
                    }?>

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
              
                <div class="card-body">
                  <h5 class="card-title">Total<span>| Grains</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$<?php echo $row['nft']*20;?></h6>
                      <span class="text-success small pt-1 fw-bold"> <?php echo $row['nft'];?> NFT</span> 
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">NFT on sales</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$ <?php echo $row['nftonsales']*20;?></h6>
                      <span class="text-success small pt-1 fw-bold"><?php echo $row['nftonsales'];?></span><span>&nbsp; units</span> 

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <div class="row">

<!-- Sales Card -->
<div class="col-xxl-4 col-md-6">
  <div class="card info-card sales-card">
  

    <div class="card-body">
      <h5 class="card-title">Awaiting <span>| quantums</span></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-cart"></i>
        </div>
        <a href="pending.php"><div class="ps-3">
          <h6>$<?php echo $row['nftwaiting']*20;?></h6>
         <span class="text-success small pt-1 fw-bold"><?php echo $row['nftwaiting'];?></span> <span class="text-muted small pt-2 ps-1">units</span>
          </a>
        </div>
      </div>
    </div>

  </div>
</div><!-- End Sales Card -->

<!-- Revenue Card -->
<div class="col-xxl-4 col-md-6">
  <div class="card info-card revenue-card">

    <div class="card-body">
      <h5 class="card-title">My referals <span>|</span></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-person-circle"></i>
        </div>
        <div class="ps-3">
          <h6><?php echo $row['referals'];?></h6>
          <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

        </div>
      </div>
    </div>

  </div>
</div>
</div>
</div>
</div><!-- End Revenue Card -->
<?php
                    }
}
}
                  ?>
          

        <!-- Left side columns -->
        <div class="col-lg-8">
          



            <!-- Recent Sales -->
            <?php
                                $sql ="SELECT username, myid, ref  FROM quantum.applicants WHERE username = '$name'";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {
                                  $myref = $row['ref'];

                                  
                              }?>
                            
                            <div class="col-xxl-4 col-md-6 ">
                      <div class="card info-card revenue-card bg-warning">
                    
                        <div class="card-body">
                          <h5 class="card-title">Information<span>|</span></h5>
                    
                          <div class="d-flex align-items-center">
                            <div class="ps-3">
                              <h4> You can now buy directly from your upline and sell directly to your downlines. If your upline is not available, kindly buy from general market.  </h4>
                               <span class="text-success small pt-1 fw-bold"><span class="text-muted small pt-2 ps-1"></span> 
                    
                            </div>
                          </div>
                        </div>
                    
                      </div>
                   </div>
      <?php   }?>
<div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body bg-inf">
                  <h5 class="card-title">MY UPLINE MARKET <span>| Today</span></h5>

                  <table class="table table-borderless datatable table-warning" id = "example1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th data-priority="1">User Id</th>
                        <th>Email</th>
                        <th>NFT</th>
                        <th>Price</th>
                        <th data-priority="1">Action</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                                $sql ="SELECT *, id, unit, userid, status,onlineid, (unit* 20) as price FROM quantum.market WHERE fullname = '$myref' and unit > 0";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {
                                  $status = $row['status'];
                                  $id = $row['id'];
                                  $online = $row['onlineid'];
                                  ?>

                  
                      <tr>
                       <td ><a href="#"><?php echo $row['id']; ?></a></td>
                       <td><?php echo $row['fullname']; ?></td>
                        <td scope="row"><a href="#"><?php echo $row['userid']; ?></a></td>
                        <td><a href="#" class="text-primary"><?php echo $row['unit']; ?></a></td>
                        <td><?php echo '$'. $row['price'];?></td>
                        <td><?php if($status == 1){
                            echo "<a class='btn btn-warning'>waiting<a>";
                          }else{?>
                            <a href="buyptp.php?id=<?php echo $id;
                            ?>" class="btn btn-info" id="delete">Buy</a>
                           <?php
                          }
                          ?>
                          </td>

                          <td>
                                                        
                            <?php if($online == 1){
                            echo "<a class='btn btn-success'>online<a>";
                          }else{?>
                            <a href="#" class="btn btn-secondary" id="delete">Offline</a>
                           <?php
                          }
                          ?>
                          </td>
                         
                      </tr>
                       <?php
       
                        }
                      }
      ?>
                    </tbody>
                    <tfoot>
                     
                    </tfoot>
        
                     
                  </table>

                </div>

              </div>
</div>
        <div class="text-center">
          <a href="genmarket.php" class="btn btn-warning">Go to general market</a>
        </div>
<!-- End Recent Sales -->
            
            <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <?php
  			 include_once 'tablefooter.php';
  ?>
           
  