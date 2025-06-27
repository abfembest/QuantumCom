 <?php include'sidemenu.php';
 include 'db_connect.php';
 ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profiles waiting confirmation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">profiles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 m-auto">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Profiles</h3>
                <?php
              if (isset($_SESSION['statu'])) {

                echo '<p class = " text-light text-center w-bold">'. $_SESSION['status'].'</p>';
                unset($_SESSION['status']);
              }
              ?>
              </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table  table-striped col-md-12">
                        <thead>
                        <tr>
                          <!--<th>Userid</th>-->
                          <th>Email</th>
                          <th>ID</th>
                          <!--<th>Rating</th>-->
                          <th>Wallet</th>
                          <th>amount</th>
                          <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $sql ="SELECT id,username, amount, walletaddress,userid,date, rentstatus FROM quantum.rent where rentstatus = '0'";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {

                                 
                                  ?>
                        
                        <tr>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['userid']; ?></td>
                                <td><?php echo $row['walletaddress']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                
                                <td><a href="aprent.php?id=<?php echo $row['id'];?>" class="btn btn-info" id="delete">view</a>
                             
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
          </div>