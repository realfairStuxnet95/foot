<?php 
require 'App/Views/Utils/auth.php';
require __DIR__.'/classes_loader.php';
$user_type=(int)$_SESSION['user_type'];
$user_id=(int)$_SESSION['user_id'];
if(isset($_GET['action']) && $_GET['action']=="edit"){
    if(isset($_GET['article']) && !empty($_GET['article'])){
        $article_id=(int)$function->sanitize($_GET['article']);
        //check article Id.
        $check_article=$article->check_article_id($article_id);
        if(!$check_article){
            backHome();
        }else{
            //get article information
            $article_info=$article->get_article($article_id);
        }
    }else{
        backHome();
    }
}elseif(isset($_GET['action']) && $_GET['action']=='articles'){
    backHome();
}
function backHome(){
    header("Location: dashboard");
    exit();
}
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
        <title>Create new Article - RedBlueJd Publish Agency</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- App css -->
        <?php 
        $router->loadView("Home/stylesheet");
        ?>
        <script src="assets/js/modernizr.min.js"></script>
        <script type="text/javascript">
            const current_user="<?php echo $user_id; ?>";
            
            <?php 
            if(isset($_GET['article'])){
                ?>
                const current_article="<?php echo $article_id; ?>";
                <?php
            }else{
                ?>
                const current_article=null;
                <?php
            }
            ?>
            
        </script>
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
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Add New Article</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="#">Articles </a>
                                        </li>
                                        <li class="active">
                                            Create New Article
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
                            <?php 
                            if(isset($_GET['action']) && $_GET['action']=="edit"){
                                include 'App/Views/Article/article_poster_section.php';
                            }
                            ?>
							<div class="col-sm-<?php echo (isset($_GET['action']) && $_GET['action']=='edit')?'9':'12';?>">
								<div class="card-box">
									<form id="frm_add_article" method="post">
                                        <?php 
                                        if(isset($_GET['action']) && $_GET['action']=="edit" && isset($_GET['article'])){
                                            if(count($article_info)>0){
                                                foreach ($article_info as $key => $value) {
                                                    ?>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">
                                                            Article Title
                                                        </label>
                                                        <input id="title" type="text" class="form-control" value="<?php echo $value['title']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">
                                                            Article Brief Description
                                                        </label>
                                                        <textarea id="description" class="form-control" rows="3"><?php echo $value['sub_title']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">
                                                            Select Article Category
                                                        </label>
                                                        <select id="category" class="form-control" required>
                                                            <?php 
                                                            $categories=$article->get_articles_categories();
                                                            ?>
                                                            <option value="<?php echo $value['category_id']; ?>">
                                                                <?php echo $article->get_articles_category_name($value['category_id']); ?>
                                                            </option>
                                                            <?php
                                                            foreach ($categories as $key => $category) {
                                                                ?>
                                                                <?php
                                                                if($value['category_id']!=$category['category_id']){
                                                                    ?>
                                                                    <option><?php  echo $category['name'];  ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <?php
                                                             } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <textarea id="elm1"><?php echo $value['text']; ?></textarea>
                                                    <div class="form-group" style="margin: 10px;">
                                                        <input id="click_counter" type="hidden" name="" value=0>
                                                      <button type="submit" class="btn btn-primary btn-bordered waves-effect w-md waves-light m-b-5">SAVE ARTICLE</button>
                                                      <a href="#" class="btn btn-default btn-bordered waves-effect w-md m-b-5">CANCEL</a>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }else{
                                            include 'App/Views/Article/new_article_form.php';
                                        }
                                        ?>
									</form>
								</div>
                                <?php 
                                if(isset($_GET['action']) && $_GET['action']=="edit" && isset($_GET['article'])){
                                    ?>
                                    <div class="col-lg-12">
                                        <div class="panel panel-border panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Available Attachments</h3>
                                            </div>
                                            <div id="output_sect" class="panel-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    include 'App/Views/Article/document_section.php';
                                }
                                ?>
							</div>
						</div>
                        <!-- End row -->



                    </div> <!-- container -->

                </div> <!-- content -->

            <?php 
            $router->loadView("Utils/footer");
            ?>

            </div>


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
        include 'App/Views/Article/script.php';
        ?>

    </body>
</html>