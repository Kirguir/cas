<div class="container">
    <div class="row col-sm-6">
        <form class="form-horizontal" method="POST" action="/checks/load"
              id="load-form" enctype="multipart/form-data">
            <div class="panel panel-primary">
                <div class="panel-heading">Load checks</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Checks</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control"
                                   name="check_files[]">
                            <input type="file" class="form-control"
                                   name="check_files[]">
                            <input type="file" class="form-control"
                                   name="check_files[]">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
