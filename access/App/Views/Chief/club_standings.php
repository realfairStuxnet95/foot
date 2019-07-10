<?php 
//require_once $_SERVER['DOCUMENT_ROOT'].'/magazine_web/classes_loader.php';
?>
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
        <div class="row">
			<div class="col-xs-12">
				<div class="page-title-box">
                    <h4 class="page-title">Clubs Standing</h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="#">Clubs</a>
                        </li>
                        <li>
                            <a href="#">Standing</a>
                        </li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
			</div>
		</div>
        <!-- end row -->
        <!-- end row -->
        <!-- end row -->


        <div class="row">
            <!-- end col -->

            <div class="col-lg-12">
                <div class="card-box">
                    <?php
                    $Standings=$user->getClubsStandings();
                    //var_dump($Standings);
                    if(count($Standings)>0){
                    	?>
                    <div class="table-responsive">
                        <table class="table table table-hover m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Club name</th>
                                    <th>Points</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                                $count=1;
                            	foreach ($Standings as $key => $value) {
                                    //$article_info=$article->get_article($value['article_id']);
                                    
                                    // $category_name=$article->get_articles_category_name($value['category_id']);
                            		if($value['status']!='TRASHED'){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                echo $count;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                echo $value['club_name'];
                                                ?>
                                            </td>
                                            <td>
                                                <strong>
                                                    <?php echo $value['points']; ?>
                                                </strong>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    <?php 
                                                    echo $value['status'];
                                                    ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php 
                                                echo $value['status'];
                                                ?>
                                            </td>
                                            <td>
                                                <div class="btn-group m-b-10">
                                                        <a club_name="<?php echo $value['club_name']; ?>" club="<?php echo $value['id']; ?>" class="btn btn-warning btn-sm club_points" data-toggle="tooltip" data-placement="top" title data-original-title="Publish Online">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                    ?>
                            		<?php
                            	}
                            	?>
                            </tbody>
                        </table>

                    </div>
                    	<?php
                    }else{
                    	echo "NO Clubs Standings";
                    }
                    ?>

                    <!-- table-responsive -->
                </div> <!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->




    </div> <!-- container -->

</div> <!-- content -->



</div>