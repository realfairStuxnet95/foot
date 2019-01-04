<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
        <div class="row">
			<div class="col-xs-12">
				<div class="page-title-box">
                    <h4 class="page-title">Articles Summarization</h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="#">Articles</a>
                        </li>
                        <li class="active">
                            Dashboard
                        </li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
			</div>
		</div>
        <!-- end row -->

        <div class="row">

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Published Articles</p>
                        <h2>
                        <?php 
                        echo count($article->get_articles_by_status('PUBLISHED'));
                        ?>
                         <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-convert widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">For Evaluation</p>
                        <h2>
                        <?php 
                        echo count($article->get_articles_by_status('SUBMITTED'));
                        ?>
                        <small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-layers widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Edit in Progress</p>
                        <h2>
                        <?php 
                        echo count($article->get_articles_by_status('EDITING'));
                        ?>                        	<small><i class="mdi mdi-arrow-down text-warning"></i></small></h2>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-av-timer widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Request Per Minute">Total Articles.</p>
                        <h2>
                        <?php 
                        echo $article->get_articles_number();
                        ?>
                        <small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Total Users">Deleted Articles</p>
                        <h2>3245 <small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-download widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">New Downloads</p>
                        <h2>78541 <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                    </div>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->
        <div class="row">

            <div class="col-lg-6" style="background: #9DBA00;">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">
                    	<font style="color: #009966;">
                    		Recent Published Articles
                    	</font>
                    </h4>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" id="txt_filter" class="form-control" placeholder="Filter Result Set">
                            <span class="input-group-btn">
                            <button id="btn_filter" type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                    <?php 
                    $recent_articles=$article->get_articles_by_status('PUBLISHED');
                    ?>
                    <div class="table-responsive">
                        <table class="table table table-hover m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <!-- <th>Category</th> -->
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
                            	foreach ($recent_articles as $key => $value) {
                                    $posters=$article->get_article_poster($value['article_id']);
                                    $category_name=$article->get_articles_category_name($value['category_id']);
                            		?>
	                                <tr>
	                                    <th>
                                            <?php 
                                            if(count($posters)>0){
                                                foreach ($posters as $key => $poster) {
                                                   ?>
                                                   <img src="assets/IMG/<?php echo $poster['filename']; ?>" class="img-responsive" style="width:100px;  ">
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
<!-- 	                                    <td>
                                         <?php echo $category_name; ?>   
                                        </td> -->
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
                                            <a href="add_article?action=edit&article=<?php echo $value['article_id']; ?>" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <?php 
                                            if($value['status']=="SUBMITTED"){
                                                ?>
                                                <a action="<?php echo $value['article_id']; ?>" class="btn btn-warning btn-sm btn_publish" data-toggle="tooltip" data-placement="top" title data-original-title="Publish Article">
                                                    <i class="fa fa-eye"></i>
                                                </a>
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
                            </tbody>
                        </table>

                    </div>
                    <!-- table-responsive -->
                </div> <!-- end card -->
            </div>
            <div class="col-lg-6" style="background: #FF8226;">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">
                    	<font style="color: #FF8226;">
                    		Articles submitted for Evaluation.
                    	</font>
                    </h4>
                    <?php 
                    $recent_articles=$article->get_articles_by_status('SUBMITTED');
                    ?>
                    <div class="table-responsive">
                        <table class="table table table-hover m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <!-- <th>Category</th> -->
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
                            	foreach ($recent_articles as $key => $value) {
                                    $posters=$article->get_article_poster($value['article_id']);
                                    $category_name=$article->get_articles_category_name($value['category_id']);
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
	                                    <!-- <td>
                                         <?php echo $category_name; ?>   
                                        </td> -->
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
                            </tbody>
                        </table>

                    </div>
                    <!-- table-responsive -->
                </div> <!-- end card -->
            </div>
            <!-- end col -->
            <!-- end col -->

        </div>
        <!-- end row -->




    </div> <!-- container -->

</div> <!-- content -->
</div>