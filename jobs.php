<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<!DOCTYPE html>
<html>
<?php include('bootstrap.php') ?>
 
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

<header class="main-header"  style="margin-bottom: 50px">
    <!-- Logo -->
      

    <!-- The <nav> tag defines a set of navigation links.only for major block of navigation links.
      Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="margin: 0px 3px 0px 0px">


      <a class="logo logo-bg" href="index.php" ;" style="
      width:200px; height :50px; border-bottom:2px solid white;padding:3px;">
      <span class="logo-lg"><p style="font-size:27px;color:white ;margin: 0px 0px 0px 30px ;"><b>Job</b> <i>Store</i></p></span>
      </a>
    

      <!-- Navbar Right Menu (menu gula) -->
      <div style="float: right;" class="navbar-custom-menu">
        <ul   class="nav navbar-nav">
         
          <li><a href="jobs.php">Jobs</a></li>
          
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          
           <li><a style=" border:4px solid #239B56; border-radius:10px ;" href="login.php">Login</a> </li>
          <li><a style="border:4px  solid #E47A2E ;border-radius:15px ;border-top: 2px solid #641E16;border-bottom: 2px solid #641E16" ; href="sign-up.php">Sign Up</a></li> 
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="user/index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="company/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout.php">Logout</a>
          </li>
          <?php } ?>


         

        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header ">
      <div class="container">
        <div class="row">
          <div class=" col-md-12  latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center">Latest Jobs</h1>  
            <div class="input-group input-group-lg col-md-8" style="margin-left: 180px">
                <input type="text" id="searchBar" class="form-control" placeholder="Search job">
                <span class="input-group-btn">
                  <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button>
                </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Filters</h3>
              </div>
              <div class="box-body no-padding">
              
                 
                  <ul class="nav nav-pills nav-stacked tree" data-widget="tree">

  <li >
                    <a href="#"><i class="fa fa-plane text-red"></i> Category <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                 
<ul >
                      <li><a href=""  class="categorySearch" data-target="Web, Mobile & Software Dev"><i class="fa fa-circle-o text-yellow"></i> Web, Mobile & Software Dev</a></li>
                      <li><a href="" class="categorySearch" data-target="Design & Creative"><i class="fa fa-circle-o text-yellow"></i> Design & Creative</a></li>
                      <li><a href=""  class="categorySearch" data-target="Web, Mobile & Software Dev"><i class="fa fa-circle-o text-yellow"></i> Delhi</a></li>
                      <li><a href="" class="categorySearch" data-target="IT & Networking"><i class="fa fa-circle-o text-yellow"></i> IT & Networking</a></li>
                      <li><a href=""  class="categorySearch" data-target="Data Science & Analytics"><i class="fa fa-circle-o text-yellow"></i> Data Science & Analytics</a></li>
                     
                    </ul>
                  </li>
                  <li class="dropdownmenu menu-open">
                    <a href="#"><i class="fa fa-plane text-red"></i> Experience <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="dropdownmenu-menu">
                      <li><a href="" class="experienceSearch" data-target='1'><i class="fa fa-circle-o text-yellow"></i> > 1 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='2'><i class="fa fa-circle-o text-yellow"></i> > 2 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='3'><i class="fa fa-circle-o text-yellow"></i> > 3 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='4'><i class="fa fa-circle-o text-yellow"></i> > 4 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='5'><i class="fa fa-circle-o text-yellow"></i> > 5 Years</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        
        </div>
      </div>
    </section>





  </div>
  <!-- /.content-wrapper -->

  
  <?php include('footer.php'); ?> 


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

</body>
</html>
