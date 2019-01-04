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
                            <a href="#">Categories</a>
                        </li>
                        <li>
                            <a href="#">Available</a>
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
                    <h4 class="header-title m-t-0 m-b-30">Recent Categories</h4>
                    <!-- <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">ADD ARTICLE CATEGORY</button> -->
                    <?php include 'add_category.php';?>
                    <?php 
                    if(isset($_GET['status']) && $_GET['status']=='success'){
                        include 'category_save_success.php';
                    }
                    ?>
                    <?php 
                    $categories=$article->get_articles_categories();
                    if(count($categories)>0){
                    	?>
                    <div class="table-responsive">
                        <table class="table table table-hover m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
                            	foreach ($categories as $key => $category) {
                            		?>
	                                <tr>
	                                    <th>
	                                        <span class="avatar-sm-box bg-success">
	                                        	<?php echo substr($category['name'], 0,1) ?>
	                                        </span>
	                                    </th>
	                                    <td>
	                                        <h5 class="m-0">
	                                        	<?php echo $category['name']; ?>
	                                        </h5>
	                                    </td>
	                                    <td>
                                         <?php echo $category['description']; ?>   
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
<!--                                             <button class="btn btn-icon waves-effect waves-light btn-primary m-b-5">
                                                <i class="fa fa-pencil"></i>
                                            </button> -->
<!--                                             <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5">
                                                <i class="fa fa-remove"></i>
                                            </button> -->
                                        </td>
	                                </tr>
                            		<?php
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