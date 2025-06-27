<?php include 'sidemenu.php'; 
     include 'db_connect.php';
    ?>
<div class="content-wrapper" style="">


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="">My Quantum NFT Grains <small>Dashboard</small></h1>
          </div><!-- /.col -->
         <!--  <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            </ol>
          </div>/.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Dashborad menu-->

    <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 m-auto">
            <div class="card card-info">
              
              <div class="card-body p-3 bg-info">
                
                  <!--<div class="col-6 mb-3">
                  <label></label>
                    <input type="text" class="form-control" placeholder="">
                  </div>-->
                  <!--<div class="col-12">
                  <label></label>
                    <input type="text" class="form-control" placeholder="">
                  </div>-->
                  <div class="card-body mb-4">
                    <div class="row justify-content-center">
                    
                      
                    <div class="row justify-content-center">
                <label class=""><?php if(isset($_SESSION['status'])){
                  echo '<p class= "h5 m-4 w-bold"><b>'.$_SESSION['status'].'</b></p>';
                  unset($_SESSION['status']);
                }?></label>
                  
                  
              </div>
            </div>
            </div>  
          <!-- /.col -->
        
                   
                  <!-- /.col -->
                 
               
                <!-- /.row -->
              
                    
                      
    
                       

  <script>
    function copyadd() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
  </script>