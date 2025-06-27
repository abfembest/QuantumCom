<?php
include 'topmenu.php';     
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <p class= "fw-bolder text-info">Click menu icon to close</p>
        <li class="nav-item">
            <a class="nav-link " href="index.php">
                <i class="bi bi-bank"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed"  href="profile.php"> 
              <i class="bi bi-person-circle"></i><span>Profile</span>
            </a>
            
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed"  href="buy.php">
                <i class="bi bi-cart-plus-fill"></i><span>Buy NFT</span>
            </a>
            <!--<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="bi bi-circle"></i><span>Form Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="forms-editors.html">
                        <i class="bi bi-circle"></i><span>Form Editors</span>
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="bi bi-circle"></i><span>Form Validation</span>
                    </a>
                </li>
            </ul>-->
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed"  href="sell.php">
                <i class="bi  bi-currency-exchange"></i><span>Sell grains</span>
            </a>
            
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed"  href="market.php">
                <i class="bi bi-bank2"></i><span>My queue</span><!--<i class="bi bi-chevron-down ms-auto"></i>-->
            </a>
            <!--<ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="charts-chartjs.html">
                        <i class="bi bi-circle"></i><span>Chart.js</span>
                    </a>
                </li>
                <li>
                    <a href="charts-apexcharts.html">
                        <i class="bi bi-circle"></i><span>ApexCharts</span>
                    </a>
                </li>
                <li>
                    <a href="charts-echarts.html">
                        <i class="bi bi-circle"></i><span>ECharts</span>
                    </a>
                </li>
            </ul>-->
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed"  href="pending.php">
                <i class="bi bi-gem"></i><span>Pending NFT</span>
            </a>
            
        </li><!-- End Icons Nav -->
         <li class="nav-item">
            <a class="nav-link collapsed" href="referals.php">
                <i class="bi bi-people-fill"></i>
                <span>Referrals</span>
            </a>
        </li><!-- End Login Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="payrent.php">
                <i class="bi bi-calendar3-event"></i>
                <span>Pay rent</span>
            </a>
        </li><!-- End Error 404 Page Nav -->
        <?php
          include 'db_connect.php';
            $myid = $_SESSION['myid'];
               $sql ="SELECT access FROM quantum.applicants WHERE myid = '$myid'";
               $result = $connect->query($sql);
               if ($result-> num_rows >0) {
                 while ($row = $result-> fetch_assoc()) {
                  $access = $row['access'];
                  ?>

        <?php
          if($access == 1){
            echo ' 
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-flag"></i><span>Manage</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="complains.php">
                        <i class="bi bi-circle"></i><span>Complaints</span>
                    </a>
                </li>
                <li>
                    <a href="applicants.php">
                        <i class="bi bi-circle"></i><span>Waiting users</span>
                    </a>
                </li>
                <li>
                    <a href="part.php">
                        <i class="bi bi-circle"></i><span>Community</span>
                    </a>
                </li>
                <li>
                    <a href="arent.php">
                        <i class="bi bi-circle"></i><span>Aprove rent</span>
                    </a>
                </li>
            </ul>
        </li>';


          }elseif($access == 2){
            echo'
            
            <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-flag"></i><span>Manage</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="complains.php">
                        <i class="bi bi-circle"></i><span>Complaints</span>
                    </a>
                </li>
                <li>
                    <a href="applicants.php">
                        <i class="bi bi-circle"></i><span>Waiting users</span>
                    </a>
                </li>
                <li>
                    <a href="part.php">
                        <i class="bi bi-circle"></i><span>Community</span>
                    </a>
                </li>
                <li>
                    <a href="arent.php">
                        <i class="bi bi-circle"></i><span>Aprove rent</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi  bi-calendar3-event"></i><span>Manager</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                    <a href="assign.php">
                        <i class="bi bi-circle"></i><span>Asign NFT</span>
                    </a>
                </li>
                <li>
                    <a href="assignl.php">
                        <i class="bi bi-circle"></i><span>Asign level</span>
                    </a>
                </li>
                <li>
                    <a href="broadcast.php">
                        <i class="bi bi-circle"></i><span>Messages</span>
                    </a>
                </li>

                    

            </ul>
        </li>';
          }
          elseif($access == 3){

        echo '
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-flag"></i><span>Manage</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="complains.php">
                        <i class="bi bi-circle"></i><span>Complaints</span>
                    </a>
                </li>
                <li>
                    <a href="applicants.php">
                        <i class="bi bi-circle"></i><span>Waiting users</span>
                    </a>
                </li>
                <li>
                    <a href="part.php">
                        <i class="bi bi-circle"></i><span>Community</span>
                    </a>
                </li>
                <li>
                    <a href="arent.php">
                        <i class="bi bi-circle"></i><span>Aprove rent</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi  bi-calendar3-event"></i><span>Manager</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                    <a href="assign.php">
                        <i class="bi bi-circle"></i><span>Asign NFT</span>
                    </a>
                </li>
                <li>
                    <a href="assignl.php">
                        <i class="bi bi-circle"></i><span>Asign level</span>
                    </a>
                </li>
            </ul>
        </li>
        
        
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-file-bar-graph-fill"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="rolesl.php">
                        <i class="bi bi-circle"></i><span>User roles</span>
                    </a>
                </li>
                <li>
                    <a href="musers.php">
                        <i class="bi bi-circle"></i><span>Manage users</span>
                    </a>
                </li>
                <li>
                    <a href="broadcast.php">
                        <i class="bi bi-circle"></i><span>Messages</span>
                    </a>
                </li>
            </ul>
        </li>
        </li>';

    }
}

  ?>
  <?php
  }
  ?>
  

                <li class="nav-item">
            <a class="nav-link collapsed" href="logout.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Log Out</span>
            </a>
        </li><!-- End Login Page Nav -->

    </ul>

</aside><!-- End Sidebar-->


