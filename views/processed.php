<div class="container">
    <div class="row col-sm-6">
        <form class="form-horizontal" method="POST"
              action="/checks/update/<?= $check->id ?>" id="checks-form"
              enctype="multipart/form-data">
            <div class="panel panel-primary">
                <div class="panel-heading">Processed check</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="number" class="col-sm-2 control-label">Check
                            number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="number"
                                   name="number" value="<?= $check->number ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tracking" class="col-sm-2 control-label">Tracking
                            number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   id="tracking" name="tracking"
                                   value="<?= $check->tracking ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subscriber" class="col-sm-2 control-label">Subscriber</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   id="subscriber" name="subscriber"
                                   value="<?= $check->subscriber_id ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="magazine" class="col-sm-2 control-label">Magazine</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   id="magazine" name="magazine"
                                   value="<?= $check->magazine_rel_id ?>">
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
    <div class="row col-sm-6">
        <img src="<?= $check_src ?>"/>
    </div>
</div>
