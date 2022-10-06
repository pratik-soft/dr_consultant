<form action="{{ route('backend.dummies.list') }}" method="POST" id="searchForm">
    @csrf
    <!-- Default box -->
    <div class="card card-default card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Advanced Search</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">                
                <div class="col-sm-3">
                    <div class="form-group">                    
                        <select name="deleted" id="deleted" class="form-control">
                            <option value="">--All--</option>
                            <option value="1">Deleted</option>
                            <option value="2">Non Deleted</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">                    
                        <select name="status" id="status" class="form-control">
                            <option value="">--Select Status--</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>                            
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" id="created_at" name="created_at" class="form-control" placeholder="Created At" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" id="updated_at" name="updated_at" class="form-control" placeholder="Updated At" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" id="deleted_at" name="deleted_at" class="form-control" placeholder="Deleted At" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">                    
                        <button type="submit" id="searchBtn" class="btn btn-secondary float-left"><i class="fas fa-search"></i> Search</button>
                        <button type="button" id="clearBtn" class="btn btn-default ml-1"><i class="fa fa-redo"></i> Clear</button>
                    </div>
                </div>
            </div>            
        </div>
        <!-- /.card-body -->
        <!-- <div class="card-footer">
            <button type="submit" id="searchBtn" class="btn btn-secondary float-right btn-sm"><i class="fas fa-search"></i> Search</button>
        </div> -->
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</form>