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
    <?php include 'App/Views/Utils/stylesheets.php'; ?>
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
    <?php include 'App/Views/Home/videos.php'; ?>
    <?php include 'App/Views/Home/about.php'; ?>
    <?php include 'App/Views/Home/last_match.php'; ?>  
    <?php include 'App/Views/Home/upcoming.php'; ?>
    <?php include 'App/Views/Home/players.php'; ?>
    <?php include 'App/Views/Home/gallery.php'; ?>
    <!-- Match Gallery Area End -->
    <?php //include 'App/Views/Home/products.php'; ?>
    <?php include 'App/Views/Home/footer.php'; ?>
<?php include 'App/Views/Utils/scripts.php'; ?>
</body>
</html>
