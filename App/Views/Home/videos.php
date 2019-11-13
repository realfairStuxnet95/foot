    <!-- Video Area Start -->
    <section class="kick-video-area section_100">
        <div class="kick-video-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="youtube-text">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=sirs-IkQXJc">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="kick-video-wrap">
                        <h2>First Division <span>ranking</span></h2>
                        <div class="title-line-one"></div>
                        <div class="title-line-two"></div>
                        <div class="kick-score-scroll">
                            <?php $Standings=$user->getClubsStandings(); ?>
                            <table class="table table-striped table-responsive">
                                <tbody>
                                    <?php 
                                    $counter=1;
                                    foreach ($Standings as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><p><?php echo $counter; ?></p></td>
                                            <td>
                                                <p><?php echo $value['club_name']; ?></p>
                                            </td>
                                            <td><p><?php echo $value['points']; ?></p></td>
                                        </tr>
                                        <?php
                                        $counter++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Area End -->