<table data-toggle="table" id="table-style" data-row-style="rowStyle">
    <tr>
        <th><?= __('Username') ?></th>
        <td><?= h($user->username) ?></td>
    </tr>
    <tr>
        <th><?= __('Password') ?></th>
        <td>Uh,huh. Yeah. Right.</td>
    </tr>
    <tr>
        <th><?= __('Role') ?></th>
        <td><?= h($user->role) ?></td>
    </tr>
    <tr>
        <th><?= __('Created') ?></th>
        <td><?= h($user->created) ?></td>
    </tr>
    <tr>
        <th><?= __('Modified') ?></th>
        <td><?= h($user->modified) ?></td>
    </tr>
</table>
<span class="input-group-btn"">
    <a href="/Users/edit/<?= $this->Number->format($user->id) ?>"><button class="btn btn-primary btn-md" id="btn-todo" style="margin-top:25px;">Edit User</button></a>
</span><p style="margin-top:10px;"><a href="/Users"><button class="btn btn-primary">Cancel</button></a></p>
