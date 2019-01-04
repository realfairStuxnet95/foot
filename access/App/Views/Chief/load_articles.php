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
                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="#">Articles</a>
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
                    <h4 class="header-title m-t-0 m-b-30">Available Articles</h4>
                    <a class="btn btn-primary waves-effect waves-light" href="add_article">CREATE NEW ARTICLE</a>
                    <?php //include 'add_user.php';?>
                    <?php 
                    if(isset($_GET['status']) && $_GET['status']=='success'){
                        include 'user_save_success.php';
                    }
                    ?>
                    <?php
                    $recent_articles=array();
                    if(isset($_GET['category'])){
                        $status=$function->sanitize($_GET['category']);
                        $allowedStatus=array("SUBMITTED","EDITING","DELETED","PUBLISHED");
                        if(in_array($status, $allowedStatus)){
                            $recent_articles=$article->get_articles_by_status($status);
                        }else{
                            $recent_articles=$article->get_recent_articles();
                        }
                    }else{
                       $recent_articles=$article->get_recent_articles(); 
                    }
                    if(count($recent_articles)>0){
                    	?>
                    <div class="table-responsive">
                        <table class="table table table-hover m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
                            	foreach ($recent_articles as $key => $value) {
                                    $posters=$article->get_article_poster($value['article_id']);
                                    $category_name=$article->get_articles_category_name($value['category_id']);
                            		if($value['status']!='TRASHED'){
                                        ?>
                                        <tr>
                                            <th>
                                                <?php 
                                                if(count($posters)>0){
                                                    foreach ($posters as $key => $poster) {
                                                       ?>
                                                       <img src="assets/IMG/<?php echo $poster['filename']; ?>" class="img-responsive" style="width:100px;">
                                                       <?php
                                                    }
                                                }
                                                ?>
                                            </th>
                                            <td>
                                                <h5 class="m-0">
                                                    <a href="add_article?action=edit&article=<?php echo $value['article_id']; ?>">
                                                        <strong>
                                                            <?php echo($value['title']); ?>
                                                        </strong>
                                                              
                                                    </a>
                                                </h5>
                                            </td>
                                            <td>
                                             <?php echo $category_name; ?>   
                                            </td>
                                            <td>
                                             <?php 
                                             if($value['status']=='PUBLISHED'){
                                                ?>
                                                <span class="badge badge-success">
                                                    <?php echo $value['status']; ?>
                                                </span>
                                                <?php
                                             }elseif($value['status']=="SUBMITTED"){
                                                ?>
                                                <span class="badge badge-danger">
                                                    <?php echo $value['status']; ?>
                                                </span>
                                                <?php
                                             }
                                             ?>   
                                            </td>
                                            <td>
                                                <?php 
                                                if($value['status']=="SUBMITTED"){
                                                    ?>
                                                    <div class="btn-group m-b-10">
                                                        <a href="add_article?action=edit&article=<?php echo $value['article_id']; ?>" class="btn btn-primary btn-sm waves-effect">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a action="<?php echo $value['article_id']; ?>" class="btn btn-warning btn-sm btn_publish" data-toggle="tooltip" data-placement="top" title data-original-title="Publish Article">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a action="<?php echo $value['article_id']; ?>" class="btn btn-danger btn-sm btn_trash" data-toggle="tooltip" data-placement="top" title data-original-title="Move to Trash This Article">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }elseif($value['status']=="PUBLISHED"){
                                                    ?>
                                                    <a action="<?php echo $value['article_id']; ?>" class="btn btn-success btn-sm btn_unpublish" data-toggle="tooltip" data-placement="top" title data-original-title="Unpublish Article">
                                                        <i class="fa fa-eye-slash"></i>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
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
                    	echo "NO Article Available";
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