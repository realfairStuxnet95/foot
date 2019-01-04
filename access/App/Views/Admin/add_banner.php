<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Add new Banner in <span class="badge badge-info"><?php echo $adsName; ?></span> Category</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="frm_add_banner" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-12 control-label">
                                    Please Choose Valid Image in format of Jpg,gif or png Only.
                                </label>
                                <input id="ads_id" type="hidden" name="ads_id" value="<?php echo $ads; ?>">
                                <input id="banner_id" type="hidden" name="banner_id" value="">
                                <input id="file" type="file" class="form-control" name="file" required="">
                                
                                <img src="" id="preview" style="width:120px;">
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Category</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>