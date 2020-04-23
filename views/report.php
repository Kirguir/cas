<div class="container">
    <div class="row col-sm-6">
        <form class="form-horizontal" method="POST" action="/report"
              id="login-form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="from" class="col-sm-2 control-label">From</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="from"
                           name="from" value="<?= $from ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="to" class="col-sm-2 control-label">To</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="text"
                           name="text" value="<?= $to ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <table class="table table-striped">
        <tr>
            <th>DATE</th>
            <th>LOADED</th>
            <th>PROCESSED THIS DAY</th>
            <th>PROCESSED BEFORE</th>
            <th>UNPROCESSED</th>
        </tr>
        <?php
        /**
         * @var \App\Entity\Statistic $statistic
         */
        foreach ($statistics as $statistic): ?>
            <tr>
                <th><?= $statistic->date ?></th>
                <th><?= $statistic->loaded ?></th>
                <th><?= $statistic->processed_current ?></th>
                <th><?= $statistic->processed_before ?></th>
                <th><?= $statistic->unprocessed ?></th>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
