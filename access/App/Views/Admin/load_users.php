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
                            <a href="#">Users</a>
                        </li>
                        <li>
                            <a href="#">Available</a>
                        </li>
                        <li class="active">
                            Users
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
                    <h4 class="header-title m-t-0 m-b-30">Recent Users</h4>
                    <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">ADD NEW USER</button>
                    <?php include 'add_user.php';?>
                    <?php 
                    if(isset($_GET['status']) && $_GET['status']=='success'){
                        include 'user_save_success.php';
                    }
                    ?>
                    <?php 
                    $all_users=$user->get_all_users();
                    if(count($all_users)>0){
                    	?>
                    <div class="table-responsive">
                        <table class="table table table-hover m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
                            	foreach ($all_users as $key => $value) {
                            		?>
	                                <tr>
	                                    <th>
	                                        <span class="avatar-sm-box bg-success">
	                                        	<?php echo substr($value['names'], 0,1) ?>
	                                        </span>
	                                    </th>
	                                    <td>
	                                        <h5 class="m-0">
	                                        	<?php echo $value['names']; ?>
	                                        </h5>
	                                        <p class="m-0 text-muted font-13">
	                                        	<small>
	                                        		<?php 
	                                        		if($value['user_type']==1){
	                                        			echo "Admin";
	                                        		}elseif($value['user_type']==2){
	                                        			echo "Chief Editor";
	                                        		}else{
	                                        			echo "Editor";
	                                        		}
	                                        		?>
	                                        	</small>
	                                        </p>
	                                    </td>
	                                    <td>
                                         <?php echo $value['email']; ?>   
                                        </td>
	                                    <td>
                                            <?php 
                                            if($value['user_type']==1){
                                                echo "Admin";
                                            }elseif($value['user_type']==2){
                                                echo "Chief Editor";
                                            }else{
                                                echo "Editor";
                                            }
                                            ?>
                                        </td>
	                                    <td>
                                         <?php 
                                         if($value['status']=='ACTIVE'){
                                            ?>
                                            <span class="badge badge-info">
                                                <?php echo $value['status']; ?>
                                            </span>
                                            <?php
                                         }
                                         ?>   
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
                    	echo "NO user Available";
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