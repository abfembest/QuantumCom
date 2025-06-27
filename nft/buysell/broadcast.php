<?php include_once 'sidemenu.php';
    ?>
<main id="main" class="main">

    <div class="pagetitle">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
                   <?php
                    if(isset($_SESSION['message'])){
                      echo '<p class="text-center text-success btn-success w-75 m-auto">'.$_SESSION['message']. '</p>';
                      unset($_SESSION['message']);
                    }
                    ?>
              <h5 class="card-title">Sending general notification</h5>

              <!-- Quill Editor Default -->
              <form action="actions/gennot.php" method="POST">
                <!--<div class="quill-editor-default" >-->
                
                  <textarea name = "message" class = "form-control h-100"></textarea>  
                 
                
                    
                   <input type="submit" class="btn btn-info mt-3 w-25" name= "submit" value = "Send">

                    <input type="submit" class="btn btn-danger mt-3 w-25 " name= "reset" value = "Reset">
                    
              </form>
              <!-- End Quill Editor Default -->

            </div>
          </div>

   

   <?php include_once 'footerlinks.php';?>       