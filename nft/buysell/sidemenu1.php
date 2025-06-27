<?php include 'hint.php';
include 'topmenu.php';
include 'toplinks.php'; ?>
<title>NFT</title>
 <aside class="main-sidebar sidebar-dark-olive" style="font-size: 20px;">
    <!-- Brand Logo -->
    
      


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel top 0 " style = "text-align:center;">
        <div class="justify-content-center">
            <?php

                include 'image.php'; 
          ?>
        </div>
        <div class="">
          <a href="#" class="d-block" style="color:white;"><?php  
          echo $user;
          
          ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!--<li class="nav-item has-treeview menu-open">
            <a href="front.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <--<i class="right fas fa-angle-left"></i>->
              </p>
            </a>
          </li>-->

          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Dashboard
                <!--<i class="right fas fa-angle-left"></i>-->
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="profile.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <!--<i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>-->
              </p>
            </a>            
          </li>

          <li class="nav-item has-treeview">
            <a href="buy.php" class="nav-link">
              <i class="nav-icon fa fa-cart-plus" aria-hidden="true"></i>
              <p>
                Market
                <!--<i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>-->
              </p>
            </a>            
          </li>

          <li class="nav-item has-treeview">
            <a href="sell.php" class="nav-link">
              <i class="nav-icon fa fa-money-bill-alt" aria-hidden="true"></i>
              <p>
                Sell grains
                <!--<i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>-->
              </p>
            </a>            
          </li>

          


          <li class="nav-item has-treeview">
            <a href="market.php" class="nav-link">
              <i class="nav-icon fa fa-landmark" aria-hidden="true"></i>
              <p>
                My queue
                <!--<i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>-->
              </p>
            </a>            
          </li>

          <li class="nav-item has-treeview">
            <a href="pending.php" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Pending NFT
                <!--<i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>-->
              </p>
            </a>            
          </li>

          
          
          <li class="nav-item has-treeview">
            <a href="referer.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Referral
                <!--<i class="fas fa-angle-left right"></i>
               <span class="badge badge-info right">2</span>-->
              </p>
            </a>
            
            
          </li>
        

          
          <li class="nav-item has-treeview">
            <a href="payrent.php" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Pay rent
                <!--<i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>-->
              </p>
            </a>
            
            
          </li>
          <li class="nav-item has-treeview">
            <a href="logout.php" class="nav-link">
              <i class="far fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>            
          </li>
            
              </ul>
     
      </nav>
      <!-- /.sidebar-menu -->
     
    </div>
    <!-- /.sidebar -->
  </aside>
     
  <?php include 'javascriptlinks.php'?>
