<?php 
require 'auth.php';
require $_SERVER['DOCUMENT_ROOT'].'/e/classes_loader.php';
?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Zircos - Responsive Admin Dashboard Template</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- App css -->
        <?php 
        $router->loadView("Home/stylesheet");
        ?>
        <script src="assets/js/modernizr.min.js"></script>

    </head>

