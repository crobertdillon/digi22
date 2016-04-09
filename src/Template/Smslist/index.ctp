<p><a href="/Smslist/add">Add New List</a></p>
    <table data-toggle="table" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
        <thead>
        <tr>
            <th data-field="state" data-checkbox="true" ></th>
            <th data-field="shortname" data-sortable="true"><?= $this->Paginator->sort('shortname','Short Name') ?></th>
            <th data-field="created" data-sortable="true"><?= $this->Paginator->sort('created', 'Long Name') ?></th>
            <th data-sortable="false" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($smslist as $smslist): ?>
        <tr>
            <td></td>
            <td><?= h($smslist->shortname) ?></td>
            <td><?= h($smslist->longname) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $smslist->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $smslist->id], ['confirm' => __('Are you sure you want to delete '.$smslist->shortname.' ?', $smslist->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
