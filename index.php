<?php
require $_SERVER['DOCUMENT_ROOT'].'/foot/access/classes_loader.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Title -->
    <title>Gasogi United || Football Club -Welcome</title>
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicons/apple-touch-icon.png">
    
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicons/favicon-32x32.png">
    
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicons/favicon-16x16.png">
    
    <link rel="manifest" href="assets/favicons/manifest.json">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    
    <!-- OwlCarousel CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    
    <!-- SlickNav CSS -->
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    
    <!-- Magnific popup CSS -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    
    <!-- Scroll CSS -->
    <link rel="stylesheet" href="assets/css/perfect-scrollbar.min.css">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <?php include 'App/Views/Home/header.php'; ?>  
    <!-- Slider Area Start -->
    <section class="kick-slider-area">
        <div class="kick-slide">
            <div class="kick-main-slide slide-item-1">
                <div class="kick-main-caption">
                    <div class="kick-caption-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h2>kika Semi Finals at city stadium</h2>
                                    <p>Friday, 10th Sep, 2018, 16:00GMT</p>
                                    <a href="#" class="kick-btn">
                                        buy tickets now
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kick-main-slide slide-item-2">
                <div class="kick-main-caption">
                    <div class="kick-caption-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h2>kika Semi Finals at city stadium</h2>
                                    <p>Friday, 10th Sep, 2018, 16:00GMT</p>
                                    <a href="#" class="kick-btn">
                                        buy tickets now
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider Area End -->
    <?php include 'App/Views/Home/news.php'; ?>
    <?php include 'App/Views/Home/about.php'; ?>
    <?php include 'App/Views/Home/last_match.php'; ?>  
    <?php include 'App/Views/Home/upcoming.php'; ?>
    <?php include 'App/Views/Home/videos.php'; ?>
    <?php include 'App/Views/Home/players.php'; ?>
    <?php include 'App/Views/Home/gallery.php'; ?>
    <!-- Match Gallery Area End -->
    <?php //include 'App/Views/Home/products.php'; ?>
    <?php include 'App/Views/Home/footer.php'; ?>
<?php include 'App/Views/Utils/scripts.php'; ?>
</body>
</html>
