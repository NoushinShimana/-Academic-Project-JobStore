<?php
session_start();

if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { 
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<?php include('bootstrap.php') ?>
 <header class="main-header"  style="margin-bottom: 50px">
    <!-- Logo -->
      

    <!-- The <nav> tag defines a set of navigation links.only for major block of navigation links.
      Header Navbar: style can be found in header.less -->
     <nav class="navbar navbar-static-top" style="margin: 0px 3px 0px 0px">


      <a class="logo logo-bg" href="index.php" style=" ;
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


  <!-- Content Wrapper. -->
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Job</b> <i>Store</i></p></a> 
  </div>
  <!-- /.login-logo -->
   <div class="login-box-body" style="width: 100%; margin: 10px">
    <p class="login-box-msg">Candidates Login</p>

 <form method="post" action="checklogin.php">

      
       <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
       </div>
       <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
       </div>

   <div class="row">
        <div class="col-xs-8">
          <a href="#">I forgot my password</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
         <!-- /.col -->
       

        <div class="col-xs-12">
          <?php 
              //If candidates have successfully registered then show them this success message
              //Todo: Remove Success Message without reload?
              if(isset($_SESSION['registerCompleted'])) {
                ?>
                <div>
                  <p class="text-center">You Have Registered Successfully! Your Account Approval Is Pending By Admin</p>
                </div>
              <?php
               unset($_SESSION['registerCompleted']); }
              ?>   
              <?php 
              //If Company Failed To log in then show error message.
              if(isset($_SESSION['loginError'])) {
                ?>
                <div>
                  <p class="text-center">Invalid Email/Password! Try Again!</p>
                </div>
              <?php
               unset($_SESSION['loginError']); }
              ?>   
              <?php 
              if(isset($_SESSION['candidateLoginError'])) {
                ?>
                <div>
                  <p class="text-center"><?php echo $_SESSION['candidateLoginError'] ?></p>
                </div>
              <?php
               unset($_SESSION['candidateLoginError']); }
              ?>  
          </div>  


      </div>
    </form>

    <br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php include('script.php'); ?> 
<!-- iCheck -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>-->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>