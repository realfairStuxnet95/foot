<?php 
require 'const.php';
if(isset($_GET['article'])){
    require ROOT_URL.'classes_loader.php';
    $article_id=(int)$function->sanitize($_GET['article']);    //check article
    $category_id=0;
    //check if article_id is valid
    $check_status=$article->check_article_id($article_id);
    if(!$check_status){
        backHome();
    }else{
        //get article information
        $article_info=$article->get_article($article_id);
        $title=$function->extract_array($article_info,"title");
        $article_category="";
        $author_name="";
        foreach ($article_info as $key => $post) {
            $article_category=$article->get_article_category($post['category_id']);
            $author_name=$article->get_article_author($post['author_id']);
            $category_id=(int)$post['category_id'];
        }
        //update article views
        $article_views=$article->get_article_views($article_id);
        $article_views+=1;
        $comments_counter=$article->get_article_comments_counter($article_id);
        $update_views=$article->update_article_views($article_id,$article_views);
        $Posters=$article->get_article_poster($article_id);
        if(!$update_views){
            backHome();
        }
        $url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
    }
}else{
    backHome();
}

function backHome(){
    header("Location:home");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $title; ?>">
    <meta name="author" content="<?php echo $title; ?>">
    <meta name="description" content="<?php echo $title; ?>">
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:url" content="<?php echo $escaped_url;?>" />
    <meta property="og:description" content="<?php echo $title; ?>">
    <?php
    foreach($Posters as $key =>$value){
        ?>
        <meta property="og:image" content="https://gasogiunited.com/access/assets/IMG/<?php echo $value['filename']; ?>">
        <?php
    }
    ?>
    <meta property="og:type" content="article" />
    
    <meta name="twitter:card" content="<?php echo $title; ?>"></meta>
    <title><?php echo $title; ?> || Gasogi United FC</title>
    <?php include 'App/Views/Utils/stylesheets.php'; ?>
</head>
<body>
<?php include 'App/Views/Utils/page_header.php'; ?> 
    <!-- Breadcromb Area Start -->

    <!-- Breadcromb Area End -->    
    <!-- Blog Page Area Start -->
    <section class="kick-blog-page-area section_100">
        <div class="container">
            <div class="row" style="margin-top:10vh;margin-bottom:5vh;">
                <div class="col-lg-12">
                    <a href="http://gasogiunited.com/dashboard/subscription">
                        <img src="assets/img/banners/sm-banner.gif" style="cursor: pointer;">
                    </a>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="single-blog-page-section">
                        <div class="single-latest-post">
                            <?php 
                            foreach ($article_info as $key => $value) {
                                $Posters=$article->get_article_poster($value['article_id']);
                            }
                            ?>
                            <?php 
                            foreach ($Posters as $key => $poster) {
                                ?>
                            <img class="img-responsive" src="../access/assets/IMG/<?php echo $poster['filename']; ?>" alt="" />
                                <?php
                            }
                            ?>
                                                    <div class="post-text-bottom">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="admin-image">
                                        <img src="assets/img/logo.png" style="width: 20px;" alt="admin" />
                                        <a href="#"><?php echo $author_name; ?></a>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="admin-image-right">
                                        <ul>
                                            <li style="display: none;">
                                                <a href="#">
                                                    <i class="fa fa-eye"></i>
                                                <?php echo $article_views; ?>
                                                </a>
                                            </li>
                                            <li style="display: none;">
                                                <a href="#">
                                                    <i class="fa fa-heart-o"></i>
                                                228
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                    <?php echo $comments_counter; ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="single-post-text">
                                <h3><?php echo $title; ?></h3>
                                <?php 
                                foreach ($article_info as $key => $value) {
                                    ?>
                                    <p style="line-height: 30px;">
                                        <?php echo htmlspecialchars_decode($value['text']); ?>
                                    </p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php //include 'App/Views/Blog/comments.php'; ?>
                        <div class="comment-form-template">
                            <div class="comment-group-title">
                                <h2>Leave a Comment</h2>
                                <p>Your must sing-in to make or comment a post</p>
                            </div>
                            <form>
                                <input class="ns-com-name" name="name" placeholder="Name" type="text">
                                <input class="ns-com-name" name="email" placeholder="Email" type="email">
                                <textarea class="comment" placeholder="Comment..." name="comment"></textarea>
                                <button type="submit" >
                                    Post comment
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-fixture-page-right margin-top">
                        <div class="single-fixture-right-widget">
                            <form>
                                <input type="search" placeholder="keywords..." >
                                <button type="submit" >
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="single-fixture-right-widget">
                            <h3>Related News</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php 
                                    $Related=$article->getRelatedArticles($article_id);
                                    foreach ($Related as $key => $value) {
                                        $Posters=$article->get_article_poster($value['article_id']);
                                        ?>
                                        <div class="row" style="margin-bottom: 5px;">
                                            <div class="col-md-4">
                                                <?php 
                                                foreach ($Posters as $key => $poster) {
                                                    ?>
                                                <img class="img-responsive" src="../access/assets/IMG/<?php echo $poster['filename']; ?>" alt="" style="" />
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-8">
                                                <h5 style="font-weight: bold;">
                                                    <a href="article?article=<?php echo $post['article_id']; ?>">
                                                        <?php
                                                        if(strlen($value['title'])>100){
                                                            echo substr($post['title'],0,100);
                                                        }else{
                                                             echo $value['title']; 
                                                        }
                                                        ?>
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php //include 'App/Views/Blog/standing_table.php'; ?>
                        <div class="single-fixture-right-widget">
                            <h3>best moment</h3>
                            <div class="moment-slider">
                                <div class="single-moment">
                                    <img src="assets/img/best/1.jpg" alt="best moment" />
                                </div>
                                <div class="single-moment">
                                    <img src="assets/img/best/2.jpg" alt="best moment" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Page Area End -->
    <?php include 'App/Views/Home/footer.php'; ?>
    <?php include 'App/Views/Utils/scripts.php'; ?> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ca20bd5ae2844a2"></script>
</body>
</html>
