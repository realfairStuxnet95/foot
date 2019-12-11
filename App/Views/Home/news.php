<!-- Latest Post Area Start -->
<section class="kick-latest-post-area section_100">
    <div class="container">
        <div class="row">
            <center>
                <a href="http://gasogiunited.com/dashboard/subscription">
                    <div class="row">
                        <img src="assets/img/banners/sm-banner.gif" style="cursor: pointer;">
                    </div>
                </a>
            </center>
        </div>
        <div class="row">
            <div class="col-md-4" style="margin: 0px;padding: 0px;">
            <?php 
            $Feature=$article->get_featured_posts();
            $counter=1;
            foreach ($Feature as $key => $value) {
                $Posters=$article->get_article_poster($value['article_id']);
                $article_category=$article->get_article_category($value['category_id']);
                $views=$article->get_article_views($value['article_id']);
                $comments_counter=$article->get_article_comments_counter($value['article_id']);
                if($counter<=3){
                    ?>
                    <div class="col-md-12" style="height: 350px;overflow: hidden;margin: 0px;">
                        <div class="single-latest-post">
                            <a href="article?article=<?php echo $post['article_id']; ?>">
                                <?php 
                                foreach ($Posters as $key => $poster) {
                                    ?>
                                <img class="img-responsive" src="../access/assets/IMG/<?php echo $poster['filename']; ?>" alt="" style="" />
                                    <?php
                                }
                                ?>
                            </a>
                            <div class="single-post-text">
                                <h4>
                                    <a href="article?article=<?php echo $post['article_id']; ?>">
                                        <?php
                                        if(strlen($value['title'])>100){
                                            echo substr($post['title'],0,100);
                                        }else{
                                             echo $value['title']; 
                                        }
                                        ?>
                                    </a>
                                </h4>
                                <!-- <p class="post-date"><?php //echo $function->string_date_format($post['validate_date']); ?></p> -->
                            </div>
                        </div>
                    </div>
                    <?php
                }
                $counter++;
            }
            ?>
            </div>
            <div class="col-md-8" style="margin: 0px;padding: 0px;">
            <?php 
            $Feature=$article->get_featured_posts();
            $counter=1;
            foreach ($Feature as $key => $value) {
                $Posters=$article->get_article_poster($value['article_id']);
                $article_category=$article->get_article_category($value['category_id']);
                $views=$article->get_article_views($value['article_id']);
                $comments_counter=$article->get_article_comments_counter($value['article_id']);
                if($counter>3){
                    ?>
                    <div class="col-md-4" style="height: 300px;overflow: hidden;margin: 0px;">
                        <div class="single-latest-post">
                            <a href="article?article=<?php echo $post['article_id']; ?>">
                                <?php 
                                foreach ($Posters as $key => $poster) {
                                    ?>
                                <img class="img-responsive" src="../access/assets/IMG/<?php echo $poster['filename']; ?>" alt="" style="width:100%;height: auto;" />
                                    <?php
                                }
                                ?>
                            </a>
                            <div class="single-post-text" style="padding: 5px;">
                                <h4 style="font-weight: bold;font-size: 16px;">
                                    <a href="article?article=<?php echo $post['article_id']; ?>">
                                        <?php
                                        if(strlen($value['title'])>100){
                                            echo substr($post['title'],0,100);
                                        }else{
                                             echo $value['title']; 
                                        }
                                        ?>
                                    </a>
                                </h4>
                                <!-- <p class="post-date"><?php //echo $function->string_date_format($post['validate_date']); ?></p> -->
                            </div>
                        </div>
                    </div>
                    <?php
                }
                $counter++;
            }
            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="kick-section-heading">
                    <h2>latest <span>News & Updates</span></h2>
                    <div class="title-line-one"></div>
                    <div class="title-line-two"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php 
            $Posts=$article->get_featured_posts();
            foreach ($Posts as $key => $post) {
                $Posters=$article->get_article_poster($post['article_id']);
                $article_category=$article->get_article_category($post['category_id']);
                $views=$article->get_article_views($post['article_id']);
                $comments_counter=$article->get_article_comments_counter($post['article_id']);
                ?>
                <div class="col-md-4" style="max-height: 350px;overflow: hidden;margin-top: 2px;">
                    <div class="single-latest-post">
                        <a href="article?article=<?php echo $post['article_id']; ?>">
                            <?php 
                            foreach ($Posters as $key => $poster) {
                                ?>
                            <img class="img-responsive" src="../access/assets/IMG/<?php echo $poster['filename']; ?>" alt="" style="" />
                                <?php
                            }
                            ?>
                        </a>
                        <div class="single-post-text">
                            <h4>
                                <a href="article?article=<?php echo $post['article_id']; ?>">
                                    <?php
                                    if(strlen($post['title'])>100){
                                        echo substr($post['title'],0,100);
                                    }else{
                                         echo $post['title']; 
                                    }
                                    ?>
                                </a>
                            </h4>
                            <!-- <p class="post-date"><?php //echo $function->string_date_format($post['validate_date']); ?></p> -->
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Latest Post Area End -->