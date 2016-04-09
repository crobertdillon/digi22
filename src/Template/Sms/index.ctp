<table data-toggle="table" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
    <thead>
    <tr>
        <th data-field="sender" data-sortable="true"><?= $this->Paginator->sort('sender','Who Dealt It') ?></th>
        <th data-field="mess" data-sortable="true"><?= $this->Paginator->sort('mess','The Message') ?></th>
        <th data-field="utc" data-sortable="true"><?= $this->Paginator->sort('utc', 'Sent At') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($sms as $sm): ?>
    <tr>
        <td><?= h($sm->sender) ?></td>
        <td><?= h($sm->mess) ?></td>
        <td><?= h($sm->utc) ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>