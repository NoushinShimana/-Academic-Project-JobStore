<?php
session_start();

if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { 
  header("Location: index.php");
  exit();
}

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



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">
 
   <section class="content-header">
   <div class="container" style="width: 70%">
        <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
          <h1 class="text-center " style="font-size: 50px">create CANDIDATE profile</h1>
          <form method="post" id="registerCompanies" action="adduser.php" enctype="multipart/form-data">
            <div class="col-md-6 latest-job ">
                      <div class="form-group">
                <input class="form-control input-lg" type="text" id="fname" name="fname" placeholder="First Name *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="lname" name="lname" placeholder="Last Name *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="email" name="email" placeholder="Email *" required>
              </div>
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *" required></textarea>
              </div>
              <div class="form-group">
                <label>Date Of Birth</label>
                <input class="form-control input-lg" type="date" id="dob" min="1960-01-01" max="1999-01-31" name="dob" placeholder="Date Of Birth">
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="age" name="age" placeholder="Age" readonly>
              </div>
              <div class="form-group">
                <label>Passing Year</label>
                <input class="form-control input-lg" type="date" id="passingyear" name="passingyear" placeholder="Passing Year">
              </div>       
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="qualification" name="qualification" placeholder="Highest Qualification">
              </div>


  

              <div class="form-group checkbox">
                <label><input type="checkbox" required> I accept terms & conditions</label>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-flat btn-success">Register</button>
              </div>
              <?php 
              //If Company already registered with this email then show error message.
              if(isset($_SESSION['registerError'])) {
                ?>
                <div>
                  <p class="text-center" style="color: red;">Email Already Exists! Choose A Different Email!</p>
                </div>
              <?php
               unset($_SESSION['registerError']); }
              ?> 
              <?php 
              if(isset($_SESSION['uploadError'])) {
                ?>
                <div>
                  <p class="text-center" style="color: red;"><?php echo $_SESSION['uploadError']; ?></p>
                </div>
              <?php
               unset($_SESSION['uploadError']); }
              ?> 
            </div>
            <div class="col-md-6 latest-job ">
              <div class="form-group">
                <input class="form-control input-lg" type="password" name="password" placeholder="Password" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="password" name="cpassword" placeholder="Confirm Password" required>
              </div>
               <div id="passwordError" class="btn btn-flat btn-danger hide-me" >
                    Password Mismatch!! 
                  </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" name="contactno" placeholder="Phone Number" minlength="11" maxlength="11" autocomplete="off" onkeypress="return validatePhone(event);" required>
      
</div>


 <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="address" name="address" placeholder="Address"></textarea>
              </div>
              
              
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="skills" name="skills" placeholder="Enter Skills"></textarea>
              </div>              
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="designation" name="designation" placeholder="Designation">
              </div>
              <div class="form-group">
                <label style="color:#72619e">Attach Profile Picture (only jpg/png format allowed!)</label>
                <input type="file" name="image" class="form-control input-lg" required>
              </div>
            </div>
          </form>
          
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
<?php include('script.php'); ?> 



<script type="text/javascript">
  function validatePhone(event) {

    //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
    //event.which will return key for mouse events and other events like ctrl alt etc. 
    var key = window.event ? event.keyCode : event.which;

    if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
      // 8 means Backspace
      //46 means Delete
      // 37 means left arrow
      // 39 means right arrow
      return true;
    } else if( key < 48 || key > 57 ) {
      // 48-57 is 0-9 numbers on your keyboard.
      return false;
    } else return true;
  }
</script>

<script type="text/javascript">
  $('#dob').on('change', function() {
    var today = new Date();
    var birthDate = new Date($(this).val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();

    if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }

    $('#age').val(age);
  });
</script>


</script>
<script>
  $("#registerCandidates").on("submit", function(e) {
    e.preventDefault();
    if( $('#password').val() != $('#cpassword').val() ) {
      $('#passwordError').show();
    } else {
      $(this).unbind('submit').submit();
    }
  });
</script>
</body>
</html>
