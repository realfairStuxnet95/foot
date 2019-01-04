<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Add new Article</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="frm_add_category" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Category Name</label>
                                <div class="col-md-10">
                                    <input id="Category" type="text" class="form-control" placeholder="Article Category" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">
                                    Description
                                </label>
                                <div class="col-md-10">
                                    <textarea id="Description" class="form-control"></textarea>
                                </div>
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