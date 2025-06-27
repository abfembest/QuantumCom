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


        <div class="register-box m-auto">
            
            <div class="card">
              <div class="card-body register-card-body" style="border-radius: 50%;">
                                        
                      <form action="{% url 'nursesearch' %}" method="POST">
                                                    
                                                    <span class="form-inline">
                                                      <label>ID:&nbsp&nbsp&nbsp</label>
                      
                                                      <input type="text" min="0" class="form-control" placeholder="Client ID or name" name="search" required>
                                                      <button name = "search1"><i class="fa fa-search"></i></button>
                                                    </span>
                                                      
                                                  </form>        
                                                
                      
                                                
                                  
                                        <form action="{% url 'vsigntake' %}" method="POST">
                                      
                                          <p class="text-center btn-info"> </p>
                                         
                                          <div class="input-group mb-3">
                                            <!--Hidden fields-->
                                            <input type="hidden" name="pid" value="{{i.id}}">  <input type="hidden" name="fullname" value="{{i.surname}} {{i.fname}}">
                                          
                                            <!--End of hidden fields-->
                                            <input type="number"  min="0" class="form-control" placeholder="Blood pressure" name="blood_pressure" required>
                                           
                                            <div class="input-group-append">
                                              <div class="input-group-text">
                                                <span>mmHg</span>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="input-group mb-3">
                                            <input type="number"  class="form-control" placeholder="Body Temperature" name="temperature" required>
                                            <div class="input-group-append">
                                              <div class="input-group-text">
                                                <span><sup>0</sup>C</span>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="input-group mb-3">
                                            <input type="number" min="0" class="form-control" placeholder="Body Weight" name= "body_weight" required>
                                            <div class="input-group-append">
                                              <div class="input-group-text">
                                               <span>kg</span>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="input-group mb-3">
                                            <input type="number" min="0" class="form-control" placeholder="Height" name="height" step="any" required>
                                            <div class="  input-group-append">
                                              <div class="input-group-text">
                                                <span>meter</span>
                                              </div>
                                            </div>
                                          </div>
                                          <label for="">Comment</label>
                                          <div class="input-group">
                                            <textarea class="form-control" name="comment"  required>
                                            </textarea>
                                          </div>
                                         
                                          <div class="row mt-2">
                                           
                                            <!-- /.col -->
                                             
                                              <div class="col-md-6">
                                                <a href="nurse" class="btn btn-danger btn-block">
                                                  Cancel</a>
                                              </div>          
                                              <div class="col-md-6 content-">
                                                <button type="submit" class="btn btn-primary btn-block" name="create" >Submit</button>
                                              </div>
                                           
                                            <!-- /.col -->
                                           
                                          </div>
                                        </form> 
                      
                                        <p class="text-info">Kindly supply ID, Name or <a href="reg" class="btn btn-danger">Register</a></p>
</div>
</div>
</div>


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
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><button type="button" class="btn btn-info">Action</button></td>
                        <td>112</td>
                        <td>Rec</td>
                        <td>May 29, 2022</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p>Patients Waiting</p>
            </div>
        </div>
        </div>
    </div>
</div>