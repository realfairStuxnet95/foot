    <!-- Slider Area Start -->
    <section class="kick-slider-area">
        <div class="kick-slide">
            <?php 
            $fixtures=$user->getClubFixture();
            foreach ($fixtures as $key => $value) {
                $image='access/assets/IMG/'.$value['poster'];
                ?>
                <div class="kick-main-slide slide-item-1" style='background: rgba(0, 0, 0, 0.3) url("<?php echo $image; ?>") repeat scroll 0 0;'>
                    <div class="kick-main-caption">
                        <div class="kick-caption-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <h2>
                                            <?php echo $value['match_info']; ?>
                                        </h2>
                                        <p>
                                            <?php echo $value['avenue_info']; ?>
                                        </p>
                                        <a href="#" class="kick-btn">
                                            READ MORE
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <!-- Slider Area End -->