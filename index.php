<?php
require $_SERVER['DOCUMENT_ROOT'].'/access/classes_loader.php';
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
    <?php //include 'App/Views/Home/slider.php'; ?>
    <?php include 'App/Views/Home/news.php'; ?>
    <?php include 'App/Views/Home/videos.php'; ?>
    <?php //include 'App/Views/Home/about.php'; ?>
    <?php //include 'App/Views/Home/last_match.php'; ?>  
    <?php //include 'App/Views/Home/upcoming.php'; ?>
    <?php //include 'App/Views/Home/players.php'; ?>
    <?php include 'App/Views/Home/gallery.php'; ?>
    <!-- Match Gallery Area End -->
    <?php //include 'App/Views/Home/products.php'; ?>
    <?php include 'App/Views/Home/footer.php'; ?>
<?php include 'App/Views/Utils/scripts.php'; ?>
</body>
</html>
