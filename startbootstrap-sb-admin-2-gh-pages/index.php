<?php
  session_start();
  $con=mysqli_connect("localhost","root","","qversity") or die ("<h1>Database Error</h1>");
  if (isset($_POST['submit'])){
    extract($_POST);
    if (isset($_GET['ref'])){
      $r=$_GET['ref'];
      $sql="SELECT `Points` from `users` where `ID`='$r'";
      $d=mysqli_query($con,$sql);
      if (!$d){
        echo "Error 1";
      }
      $a=mysqli_fetch_array($d);
      $p=$a['Points'];
      $p=$p+1;
      $sql="UPDATE `users` set `Points`='$p' where `ID`='$r'";
      $d=mysqli_query($con,$sql);
      if (!$d){
        echo "Error 2";
      }
    }
    $sql="INSERT INTO `users`(`First_name`,`Last_name`,`Email`,`Mobile_No`,`Points`) values ('$fname','$lname','$email','$mobileno',1)";
    if (mysqli_query($con,$sql)){
      $s="SELECT `ID` from `users` where `Email`='$email'";
      $data=mysqli_query($con,$s);
      $ans=mysqli_fetch_array($data);
      $refer=$ans['ID'];
      echo "<script>alert('Signed up successfully, Check your mail.')</script>";
      $to_email="$email";
      $subject="Honeymint Competition Registration Successful.";
      $body="Hi $fname. You have succesfully registered for HONEYMINT Competitionion.
      Your referral link is : http://localhost/phpprogs/qversity/startbootstrap-sb-admin-2-gh-pages/index.php?ref=$refer 
      Share this link with your friends and increase your chance of winning the competition.
      Thank you for participating.";
      mail($to_email,$subject,$body);
    }
    else{
      echo "<script>alert('Some error occured, try again')</script>";
    }
  }

  $target=mktime(0,0,0,6,2,2020);
  $today=time();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Honeymint Launch Competition</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        	<!--<img src="talc.png" height="70" width="70" align="middle" style="margin-left: 650px">-->
         


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

           

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800 text-center">Honeymint Launch Competition</h1>
          <hr>
          <br>
          <p style="font-size: 18px">Our company is proud to launch our new product <b>"HONEYMINT"</b>, a new talcum powder. Currently the sale will happen selectively through a programme. Sign up below to get yourself registered and get an entry point. You can also share the link to this competition with your referral, so if someone uses your link to enroll in the competition, you will get an entry point for that too. More the number of entry points, more chances you have to win. The top 10 people with the most entry points will win <b>100 bottles of HONEYMINT</b>. </p>
          <hr>
          <br>
          <?php
            if ($today<$target){
          ?>
           <div class="container">
              <div class="card card-register mx-auto mt-5">
                <div class="card-header" style="font-size: 30px; text-align: center;"><b>SIGN UP!</b></div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="fname">
                            
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="lastName" class="form-control" placeholder="Last name" required="required" name="lname">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" name="email">
                        
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="">
                        <div class="">
                          <div class="form-label-group">
                            <input type="number" id="mobilenum" class="form-control" placeholder="Mobile Number" required="required" name="mobileno" pattern=".{10,10}" required title="Should be 10 digits">
                            
                          </div>
                        </div>
                        <div class="col-md-6">
                          
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block"><b>SIGN UP!</b></button>
                  </form>
                  
                </div>
              </div>
            </div>

            <?php
              }
              else{
            ?>
            <p style="font-size: 28px; text-align: center;">The Competition has now ended!</p>

            <?php
              }
            ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Rahul Jain 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 
>  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
