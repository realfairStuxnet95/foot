<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Add Featured Match</h4>
            </div>
            <div class="modal-body">
                <form id="frm_add_match" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Match Info</label>
                        <div class="col-md-10">
                            <input id="match_info" name="match_info" type="text" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Avenue / Date Info</label>
                        <div class="col-md-10">
                            <input id="avenue_info" name="avenue_info" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Match Image</label>
                        <div class="col-md-10">
                            <input id="poster_id" type="file" name="poster" class="form-control" required>
                        </div>
                    </div>
                    <center>
                        <button class="btn btn-info btn-lg">
                            SAVE MATCH INFO                           
                        </button>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>