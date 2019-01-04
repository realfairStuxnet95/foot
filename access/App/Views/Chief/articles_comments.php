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
                    <h4 class="page-title">Articles Comments</h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="#">Articles</a>
                        </li>
                        <li>
                            <a href="#">Comments</a>
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
                    <h4 class="header-title m-t-0 m-b-30">Available Articles Comments</h4>
                    <?php 
                    if(isset($_GET['status']) && $_GET['status']=='success'){
                        include 'user_save_success.php';
                    }
                    ?>
                    <?php
                    $recent_articles=array();
                    $recent_articles=$article->get_articles_comments();
                    if(count($recent_articles)>0){
                    	?>
                    <div class="table-responsive">
                        <table class="table table table-hover m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Comment</th>
                                    <th>Article Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
                            	foreach ($recent_articles as $key => $value) {
                                    $article_info=$article->get_article($value['article_id']);
                                    
                                    // $category_name=$article->get_articles_category_name($value['category_id']);
                            		if($value['status']!='TRASHED'){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                echo $value['comment_id'];
                                                ?>
                                            </td>
                                            <td>
                                             <?php
                                                if($value['status']=='PENDING'){
                                                    ?>
                                                    <span class="badge badge-warning" style="color: #000;padding: 10px;">
                                                        <?php echo $value['comment']; ?>
                                                    </span>
                                                    <?php
                                                }elseif($value['status']=='ACTIVE'){
                                                    ?>
                                                    <span class="badge badge-success" style="color: #000;padding: 10px;">
                                                        <?php echo $value['comment']; ?>
                                                    </span>
                                                    <?php
                                                }
                                             ?>   
                                            </td>
                                            <td>
                                                <?php
                                                   $posters=$article->get_article_poster($value['article_id']);
                                                ?>
                                                <?php 
                                                foreach ($posters as $key => $poster) {
                                                    ?>
                                                    <img src="assets/IMG/<?php echo $poster['filename']; ?>" style="width:50px;">
                                                    <?php
                                                }
                                                foreach ($article_info as $key => $info) {
                                                    echo $info['title'];
                                                }
                                                ?>
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
                                                if($value['status']=="PENDING"){
                                                    ?>
                                                    <div class="btn-group m-b-10">
                                                        <a action="<?php echo $value['comment_id']; ?>" class="btn btn-warning btn-sm cmnt_publish" data-toggle="tooltip" data-placement="top" title data-original-title="Publish Online">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a action="<?php echo $value['comment_id']; ?>" class="btn btn-danger btn-sm cmnt_trash" data-toggle="tooltip" data-placement="top" title data-original-title="Move to Trash">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }elseif($value['status']=="ACTIVE"){
                                                    ?>
                                                    <a action="<?php echo $value['comment_id']; ?>" class="btn btn-success btn-sm cmnt_unpublish" data-toggle="tooltip" data-placement="top" title data-original-title="Unpublish">
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