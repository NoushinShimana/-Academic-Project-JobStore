<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}
require_once("../db.php");
?>
<!DOCTYPE html>
<html>
<?php include('../bootstrap.php') ?>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header"  style="margin-bottom: 50px">
    <!-- Logo -->
      

    <!-- The <nav> tag defines a set of navigation links.only for major block of navigation links.
      Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="margin: 0px 3px 0px 0px">


      <a class="logo logo-bg" href="index.php" style=" ;
      width:200px; height :50px; border-bottom:2px solid white;padding:3px;">
      <span class="logo-lg"><p style="font-size:27px;color:white ;margin: 0px 0px 0px 30px ;"><b>Job</b> <i>Store</i></p></span>
      </a>
    <!-- Logo -->
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
               <li ><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li ><a href="view-my-company-profile.php"><i class="fa fa-tv"></i> My Company</a></li>
                  <li><a href="create-job-post.php"><i class="fa fa-pencil"></i> Create Job Post</a></li>
                  <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Job Post</a></li>
                  <li ><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                  <li class="active"><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>

                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Talent Database</i></h2>
            <p>In this section you can see the resume of all candidates</p>



            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Resume</th>
                      <th>View</th>
                    </thead>
                    <tbody>
                    <?php
                     $sql = "SELECT * FROM users";
                      $result = $conn->query($sql);

                      //If Job Post exists then display details of post
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) 
                        {
                      ?>
                      <tr>
                        <td><?php echo $row['id_user']; ?></td>
                        <td><a href="view-resume.php?id=<?php echo $row['id_user']; ?>"><i class="fa fa-user"></i></a></td>
                      </tr>
                      <?php
                       }
                     }
                     ?>
           
                        

                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <!-- /.content-wrapper -->

 <?php include('../footer.php'); ?> 


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php include('../script.php'); ?> 


<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
