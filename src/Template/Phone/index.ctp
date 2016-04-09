<p><a href="/Phone/add">Add New Phone Number to Torment</a></p>
<table data-toggle="table" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
    <thead>
    <tr>
        <th data-field="state" data-checkbox="true" ></th>
        <th data-field="first_name" data-sortable="true"><?= $this->Paginator->sort('first_name','First Name') ?></th>
        <th data-field="last_name" data-sortable="true"><?= $this->Paginator->sort('last_name','Last Name') ?></th>
        <th data-field="station" data-sortable="true"><?= $this->Paginator->sort('station', 'Station') ?></th>
        <th data-field="phone" data-sortable="true"><?= $this->Paginator->sort('phone', 'Digits') ?></th>
        <th data-sortable="false" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($phone as $phone): ?>
    <tr>
        <td></td>
        <td><?= h($phone->first_name) ?></td>
        <td><?= h($phone->last_name) ?></td>
        <td><?= h($phone->station) ?></td>
        <td><?= h($phone->phone) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $phone->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $phone->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $phone->id], ['confirm' => __('Are you sure you want to delete '.$phone->first_name.' ?', $phone->id)]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

