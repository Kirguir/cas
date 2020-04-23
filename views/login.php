<div class="container">
    <div class="row col-sm-6">
        <form class="form-horizontal" method="POST" action="/login"
              id="login-form" enctype="multipart/form-data">
            <div class="panel panel-primary">
                <div class="panel-heading">Authorization</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="login"
                               class="col-sm-2 control-label">Login</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="login"
                                   name="login" value="<?= $login ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control"
                                   id="password" name="password" value="">
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
