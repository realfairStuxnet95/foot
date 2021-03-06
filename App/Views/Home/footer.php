

<!-- Footer Area Start -->
<footer class="kick-footer-area">
    <div class="kick-top-footer-area section_50">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="single-footer-widget">
                        <h3>about <span>Gasogi United</span></h3>
                        <p>Gasogi united is registered football club under the commercial law of Rwanda and as well a member of Rwanda football federation (Ferwafa )</p>
                        <ul class="single-footer-address">
                            <li>
                                <div class="add-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <p> KAKOZA NKURIZA CHARLES (KNC)</p>
                            </li>
                            <li>
                                <div class="add-icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <p><a href="mailto:info@gasogiunited.com" target="_blank">info@gasogiunited.com</a></p>
                            </li>
                            <li>
                                <div class="add-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <p><a href="#">+250783084464</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-footer-widget">
                        <h3>Usefull link</h3>
                        <ul class="single-footer-link">
                            <li>
                                <a href="#">
                                    <i class="fa fa-chevron-right"></i>
                                    home
                                </a>
                            </li>
                            <li>
                                <a href="about">
                                    <i class="fa fa-chevron-right"></i>
                                    about us
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-chevron-right"></i>
                                    team
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-chevron-right"></i>
                                    Fixtures
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-chevron-right"></i>
                                    News
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-chevron-right"></i>
                                    Photo Gallery
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-footer-widget">
                        <h3>recent post</h3>
                        <ul class="single-footer-post">
                            <?php 
                            $Posts=$article->get_featured_posts();
                            $counter=0;
                            foreach ($Posts as $key => $post){
                                $Posters=$article->get_article_poster($post['article_id']);
                                if($counter<3){
                                ?>
                                <li>
                                    <a href="#">
                                        <div class="footer-post-img">
                                            <?php 
                                            foreach ($Posters as $key => $poster) {
                                                ?>
                                            <img class="img-responsive" src="access/assets/IMG/<?php echo $poster['filename']; ?>" alt="" style="" />
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="footer-post-text">
                                            <a href="article?title=<?php echo $post['title']; ?>&article=<?php echo $post['article_id']; ?>">
                                                <?php
                                                if(strlen($post['title'])>30){
                                                    echo substr($post['title'],0,30).'....';
                                                }else{
                                                     echo $post['title']; 
                                                }
                                                ?>
                                            </a>
                                        </div>
                                    </a>
                                </li>
                                <?php
                            }else{
                                break;
                            }
                            $counter++;
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-footer-widget">
                        <h3>Connect with us</h3>
                        <p>Follow us to stay in the loop on what’s
                            Sed ut perspiciatis unde omnis iste natus
                            error sit Sed ut perspiciatis unde omnis
                        </p>
                        <ul class="single-footer-social">
                            <li>
                                <a href="https://www.youtube.com/channel/UCWioalcFi-9a5aqg_mH61QQ/featured" target="_blank" class="fb"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="#" class="fb"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/gasogiunited?lang=en" class="twit" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                               <a href="https://www.instagram.com/gasogiunited/" class="skype" target="_blank"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="kick-footer-bottom section_15">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p class="desktop">
                            Copyright &copy; <?php echo date('Y'); ?> <a href="#">Gasogi United</a>
                            . Made with <i class="fa fa-heart"></i> from <span>
                                <a href="https://radiotv1.rw/">TV1 Rwanda</a>
                            </span> 
                        </p>
                        <p class="mobile">
                            Copyright &copy; <?php echo date('Y'); ?> <a href="#">Gasogi United</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->