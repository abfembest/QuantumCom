<?php include 'sidemenu.php' ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Assign Grains</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
        <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8"  style="border-top:20px solid red;">
                <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><h1><b>Assign role</b></h1><hr></h5>
            <form action="actions/assignrole.php" method ="POST">
                    <div class="row">
                    <div class="col-12 mb-3"> 
                        <?php
                                if(isset($_SESSION['status'])){
                                    echo '<p class = "text-info" style="text-align: center; font-size: 20px;">' .$_SESSION['status'].'</p>';
                                    unset($_SESSION['status']);
                                }
                        ?>
                        <input type="text" class="form-control" placeholder=" Assignee user name" name="assignee" required>
                    </div>
                        <input type="hidden" class="form-control" placeholder=" Assigner" name="assigner"
                        value = "<?php echo $_SESSION['myid'] ;?>">
                    
                    <div class="col-12">
                        <select class ="form-control mb-3" name = "role" required = "required">
                        <option selected disabled="disabled">---Select role---</option>
                            <option value="0">participant</option>
                            <option value="1">manage</option>
                            <option value="2">manager</option>
                            <option value="3">Admin</option>
                        </select>
                       
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-danger" name ="assign">Assign</button>
                    </div>
                </form>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </section>
</main>


</main><!-- End #main -->
<?php include 'footerlinks.php' ?>