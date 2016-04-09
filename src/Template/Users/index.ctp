<p><a href="/Users/add">Add New Adminstrative User</a></p>
<table data-toggle="table" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
    <thead>
    <tr>
        <th data-field="state" data-checkbox="true" ></th>
        <th data-field="username" data-sortable="true"><?= $this->Paginator->sort('username','User ID') ?></th>
        <th data-field="role" data-sortable="true"><?= $this->Paginator->sort('role','Role') ?></th>
        <th data-field="created" data-sortable="true"><?= $this->Paginator->sort('created', 'Date Created') ?></th>
        <th data-field="modified" data-sortable="true"><?= $this->Paginator->sort('modified', 'Date Modified') ?></th>
        <th data-sortable="false" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
        <td></td>
        <td><?= h($user->username) ?></td>
        <td><?= h($user->role) ?></td>
        <td><?= h($user->created) ?></td>
        <td><?= h($user->modified) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete '.$user->username.' ?', $user->id)]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
