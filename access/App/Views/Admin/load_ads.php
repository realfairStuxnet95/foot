<?php 
// require_once $_SERVER['DOCUMENT_ROOT'].'/e/classes_loader.php';
?>
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
        <div class="row">
			<div class="col-xs-12">
				<div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="#">Advertisment</a>
                        </li>
                        <li>
                            <a href="#">Banners Categories</a>
                        </li>
                        <li class="active">
                            Categories
                        </li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
			</div>
		</div>
        <!-- end row -->
        <div class="row">
            <!-- end col -->

            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">Available Banners Categories</h4>
                    <?php 
                    if(isset($_GET['status']) && $_GET['status']=='success'){
                        include 'category_save_success.php';
                    }
                    ?>
                    <?php 
                    $ads_categories=$banner->get_ads_categories();
                    if(count($ads_categories)>0){
                    	?>
                    <div class="table-responsive">
                        <table class="table table table-hover m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                                $count=1;
                            	foreach ($ads_categories as $key => $category) {
                            		?>
	                                <tr>
	                                    <th>
                                            <?php 
                                            if($count % 2 ==0){
                                                ?>
                                                <span class="avatar-sm-box bg-success">
                                                    <?php echo substr($category['name'], 0,1) ?>
                                                </span>
                                                <?php
                                            }else{
                                                ?>
                                                <span class="avatar-sm-box bg-danger">
                                                    <?php echo substr($category['name'], 0,1) ?>
                                                </span>
                                                <?php
                                            }
                                            ?>
	                                    </th>
	                                    <td>
	                                        <h5 class="m-0">
	                                        	<?php echo $category['name']; ?>
	                                        </h5>
	                                    </td>
	                                    <td>
                                         <?php 
                                         if($category['status']=='ACTIVE'){
                                            ?>
                                            <span class="badge badge-info">
                                                <?php echo $category['status']; ?>
                                            </span>
                                            <?php
                                         }
                                         ?>   
                                        </td>
                                        <td>
                                            <a href="?action=banners&ads=<?php echo $category['advert_id']; ?>" class="btn btn-icon waves-effect waves-light btn-primary m-b-5">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                        </td>
	                                </tr>
                            		<?php
                                    $count++;
                            	}
                            	?>
                            </tbody>
                        </table>

                    </div>
                    	<?php
                    }else{
                        ?>
                        <div class="alert alert-danger" role="alert" style="margin:10px;">
                            <strong>Oh snap!</strong>No Article Category Found you can create it by Clicking Button Above.
                        </div>
                        <?php
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