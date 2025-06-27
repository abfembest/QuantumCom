<?php include 'sidemenu.php'?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Patients Waiting: 
                <span class="badge badge-success badge-pill">10</span>
                </h1>
              </div><!-- /.col -->
                       
                      <!-- Default box -->
                      
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="Doctordashboard.html">Home</a></li>
                  <li class="breadcrumb-item active">Patient</li>
                  <li class="breadcrumb-item"><a href="#">Queues</a></li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->



      <div class="container">
        <div class="card">
        
          <!-- /.card-header -->
          <div class="card-body">
            <div class="card">
                <!-- /.card-header --> 
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Action</th>
                      <th>ID</th>
                      <th>Sent By</th>
                      <th>Date Added</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><button type="button" class="btn btn-danger">Action</button></td>
                        <td>112</td>
                        <td>Rec</td>
                        <td>May 29, 2022</td>
                        <td><button type="button" class="btn btn-info">Discarge</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <h3>The above patient(s) are waiting for actions</h3>
            </div>
        </div>
        </div>
    </div>
</div>