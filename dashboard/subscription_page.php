<?php 
require 'authorization.php';
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hi there,<?php echo $_SESSION['user_names']; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/libs/css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
<div class="container portfolio">
    <div class="row">
        <div class="col-md-12">
            <div class="heading">               
              <div class="btn-group">
                <a href="../" class="btn btn-primary">
                    <i class="fa fa-home"></i> Home
                </a>
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-user"></i> Profile
                </button>
                <a href="logoff" class="btn btn-primary">
                    Log Out <i class="fa fa-sign-out"></i>
                </a>
              </div>
            </div>
        </div>  
    </div>
    <div class="bio-info">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bio-image">
                            <img src="https://cdn2.iconfinder.com/data/icons/rcons-user/32/male-shadow-circle-512.png" alt="image" style="width: 200px;" />
                        </div>          
                    </div>
                </div>  
            </div>
            <div class="col-md-6">
                <div class="bio-content">
                    <h1>Hi there,<?php echo $_SESSION['user_names']; ?></h1>
                    <h6>We are still building Our subscription platform we will let you know ASAP (As Soon As Possible)</h6>
                    <p>We are Happy for your Help to register as a member to our Club</p>
                </div>
            </div>
        </div>  
    </div>
    <footer>
    <p style="color: #000;"> &copy; Copyright <?php echo date('Y'); ?> All Right Reserved to Gasogi United FC <b><a href="../">Back Home</a></b></p>
</footer>
</div>

  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>