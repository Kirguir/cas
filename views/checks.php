<div class="container">
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>DATE</th>
            <th>STATUS</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($checks as $check): ?>
            <tr>
                <th><?= $check->id ?></th>
                <th><?= $check->delivery_date ?></th>
                <th><?= $check->status ?></th>
                <th><a href="/checks/processed/<?= $check->id ?>">Processed</a>
                </th>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
