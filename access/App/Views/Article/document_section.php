<div class="col-lg-12">
    <div class="portlet">
        <div class="portlet-heading bg-success">
            <h3 class="portlet-title text-white">
                ADDING ARTICLE ATTACHMENTS
            </h3>
            <div class="portlet-widgets">
                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                <span class="divider"></span>
                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default"><i class="ion-minus-round"></i></a>
                <span class="divider"></span>
                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="bg-default" class="panel-collapse collapse in">
            <div class="portlet-body">
                <form>
                    <div class="form-group">
                        <label>Select Documents <?php echo $article_id; ?></label>
                        <input type="file" class="form-control" name="multiple_files" id="multiple_files" multiple />
                        <span id="error_multiple_files"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>