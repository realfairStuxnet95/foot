<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Add new User</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="frm_add_user" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Names</label>
                                <div class="col-md-10">
                                    <input id="names" type="text" class="form-control" placeholder="Names" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="example-email">Email</label>
                                <div class="col-md-10">
                                    <input type="email" id="email" name="example-email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="example-email">Phone</label>
                                <div class="col-md-10">
                                    <input type="number" id="phone" name="example-email" class="form-control" placeholder="Phone" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="category">
                                    User Category
                                </label>
                                <div class="col-md-10">
                                    <select id="category" class="form-control">
                                        <option value="1">ADMINISTRATOR</option>
                                        <option value="2">CHIEF EDITOR</option>
                                        <option value="3">EDITOR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Password</label>
                                <div class="col-md-10">
                                    <input id="password" type="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Confirm Password</label>
                                <div class="col-md-10">
                                    <input id="cpassword" type="password" class="form-control" required>
                                </div>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save User</button>
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