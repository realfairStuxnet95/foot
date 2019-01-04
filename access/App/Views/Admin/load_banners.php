<?php 
// require_once $_SERVER['DOCUMENT_ROOT'].'/e/classes_loader.php';
if(isset($_GET['ads']) && $_GET['ads']!=""){
    $ads=$function->sanitize($_GET['ads']);
    //get ads name
    $adsName=$banner->get_ads_name($ads);

    //get ads banners
    $ads_banners=$banner->get_ads_banners($ads);
}else{
    backHome();
}
function backHome(){
    header("Location :dashboard?action=ads");
    exit();
}
?>
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
        <div class="row">
			<div class="col-xs-12">
				<div class="page-title-box">
                    <h4 class="page-title">Ads Banners</h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="?action=ads">Advertisment</a>
                        </li>
                        <li>
                            <a href="#"><?php echo $adsName; ?></a>
                        </li>
                        <li class="active">
                            Banners
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
                    <!-- <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">ADD NEW BANNER</button> -->
                    <?php include 'add_banner.php'; ?>
                    <?php 
                    if(isset($_GET['status']) && $_GET['status']=='success'){
                        include 'category_save_success.php';
                    }
                    ?>
                    <?php 
                    if(count($ads_banners)>0){
                    	?>
<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Text in a modal</h4>
                                                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                                    <hr>
                                                    <h4>Overflowing text to show scroll behavior</h4>
                                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                    <div class="table-responsive">
                        <table class="table table table-hover m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                                $count=1;
                            	foreach ($ads_banners as $key => $category) {
                                    if($category['status']!='DELETED'){
                                        ?>
                                        <tr>
                                            <th>
                                                <img src="assets/banners/<?php echo $category['filename']; ?>" style="width:200px;">
                                            </th>
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
                                                <a action="<?php echo $category['banner_id']; ?>" class="btn btn-primary waves-effect waves-light btn_update_banner">
                                                    <i class="fa fa-pencil"></i>
                                                 </a>
                                                <a action="<?php echo $category['banner_id']; ?>" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 btn_remove_banner">
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
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
                            <strong>Oh snap!</strong>No Banner found in This Category .
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