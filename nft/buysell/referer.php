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
            <h1>Referrer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Referrer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="row justify-content-center">
                  <div class = "col-8 mb-3 justify-content-center"><label class="h5 m-auto" id="notice">Your referer code</label></div>
                            <?php $name = $_SESSION['username'];
                                $sql ="SELECT myid FROM quantum.applicants where username = '$name'";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {

                                  $id = $row['myid'];
                                  ?>
                                  
                  
                <div class="col-8 mb-3 input-group">
                  <input type="text" class="form-control" style="border-radius: 17px 0px 0px 17px" value="localhost/quantum/signup.php?id=<?php echo $id?>" id ="myInput">
                  <button class="btn btn-secondary" style="border-radius: 0px 17px 17px 0px"><i class="fa fa-copy mr-2" onclick = "copyadd()"></i>Copy</button>
                </div>
                  </div>
                  <?php
                                }
                              
                              }
                  ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 m-auto">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Referrer</h3>
              </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table  table-striped col-md-12">
                        <thead>
                        <tr>
                          <!--<th>Userid</th>-->
                          <th>Username</th>
                          <th>Email</th>
                          <!--<th>Rating</th>-->
                          <th>Phone</th>
                          <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $name = $_SESSION['username'];
                                $sql ="SELECT fullname, username, pnumber,profile FROM quantum.applicants where ref = '$id'";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {

                                  $profile = $row['profile'];
                                  ?>
                        
                        <tr>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['pnumber']; ?></td>
                                <td>
                                <?php if($profile == 1){?>
                                    <?php echo 'Approved';
                                    ?>
                                <?php
                                        }elseif($profile==0){?>
                                        <?php echo 'Pending';
                                    ?>  
                                 <?php
                                        }else{?>
                                        <?php echo 'rejected';
                                    ?>
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
                        <!--<tfoot>
                        <?php
                          
                          $sql ="SELECT unit, sum(amount) as tamount, sum(unit) as tunit FROM quantum.market ORDER BY cdate DESC";
                              $result = $connect->query($sql);
                              if ($result-> num_rows >0) {
                                while ($row = $result-> fetch_assoc()) {?>
                               
                                <tr>
                          <th colspan = "1">Total </th>                          
                          <th><?php echo $row['tunit'];?></th>
                          <th></th>
                          <th></th>
                        
                        </tr>
                        
                        <?php
                         }
                        }
                      
                      ?>
                       
                         
                        </tfoot>-->
                        
                      </table>
                    </div>
            
              <!- /.card-body -->
            </div>
          </div>

          <script>
    function copyadd() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  var notify = document.getElementById('notice').innerHTML = 'Link copied';
};
  </script>