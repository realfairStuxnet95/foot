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
                    <h4 class="page-title">Clubs Featured Slider</h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="#">Clubs</a>
                        </li>
                        <li>
                            <a href="#">Featured Matches</a>
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
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        ADD FEATURED MATCH
                    </button>
                    <?php
                    $Standings=$user->getClubFixture();
                    //var_dump($Standings);
                    if(count($Standings)>0){
                    	?>
                    <div class="table-responsive">
                        <table class="table table table-hover m-0">
                            <thead>
                                <tr>
                                    <th>Poster</th>
                                    <th>Match Info</th>
                                    <th>Avenue Info</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                                $count=1;
                            	foreach ($Standings as $key => $value) {
                            		if($value['status']!='TRASHED'){
                                        ?>
                                        <tr>
                                            <td>
                                                <img src="assets/IMG/<?php echo $value['poster']; ?>" style="width:100px;">
                                            </td>
                                            <td>
                                                <?php 
                                                echo $value['match_info'];
                                                ?>
                                            </td>
                                            <td>
                                                <strong>
                                                    <?php echo $value['avenue_info']; ?>
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
                                                        <a match='<?php echo $value['id']; ?>' class="btn btn-warning btn-sm dlt_match" data-toggle="tooltip" data-placement="top" title data-original-title="Delete Match">
                                                            <i class="fa fa-trash-o"></i>
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