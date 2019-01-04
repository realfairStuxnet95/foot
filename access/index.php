<?php 
require 'App/Views/Utils/auth.php';
require __DIR__.'/classes_loader.php';
$user_type=(int)$_SESSION['user_type'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Welcome <?php echo $_SESSION['user_names']; ?> - RedBlueJd Publish Agency</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- App css -->
        <?php 
        $router->loadView("Home/stylesheet");
        ?>
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <?php 
                $router->loadView("System/logo_section");
                ?>

                <!-- Button mobile view to collapse sidebar menu -->
                <?php 
                $router->loadView("Home/navigation");
                ?>
                <!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php
            $router->loadView("Home/sidebar");
            ?>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <?php 
            if($user_type==1){
                 if(isset($_GET['action'])){
                    $action=$function->sanitize($_GET['action']);
                    switch ($action) {
                        case 'users':
                            include 'App/Views/Admin/load_users.php';
                            break;
                        case 'categories':
                            include 'App/Views/Admin/load_categories.php';
                            break;
                        case 'ads':
                            include 'App/Views/Admin/load_ads.php';
                            break;
                        case 'banners':
                            include 'App/Views/Admin/load_banners.php';
                            break;
                        default:
                            include 'App/Views/Admin/dashboard.php';
                            break;
                    }
                 }else{
                    include 'App/Views/Admin/dashboard.php';
                 }
             }elseif($user_type==2){
                if(isset($_GET['action'])){
                    $action=$function->sanitize($_GET['action']);
                    switch ($action) {
                        case 'articles':
                            include 'App/Views/Chief/load_articles.php'; 
                            break;
                        case 'comments':
                            include 'App/Views/Chief/articles_comments.php'; 
                            break;
                    }
                }else{
                   include 'App/Views/Chief/dashboard.php'; 
                }
             }
             else{
                echo "UnAuthorized access";
             }
            ?>
            <?php 
            $router->loadView("Utils/footer");
            ?>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <?php $router->loadView("Utils/rightbar"); ?>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>
        <?php 
        $router->loadView("Home/scripts");
        ?>
    </body>
</html>