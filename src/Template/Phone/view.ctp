<table data-toggle="table" id="table-style" data-row-style="rowStyle">
    <tr>
        <th><?= __('First Name') ?></th>
        <td><?= h($phone->first_name) ?></td>
    </tr>
    <tr>
        <th><?= __('Last Name') ?></th>
        <td><?= h($phone->last_name) ?></td>
    </tr>
    <tr>
        <th><?= __('Station') ?></th>
        <td><?= h($phone->station) ?></td>
    </tr>
    <tr>
        <th><?= __('Phone') ?></th>
        <td><?= h($phone->phone) ?></td>
    </tr>
    <tr>
        <th><?= __('Id') ?></th>
        <td><?= $this->Number->format($phone->id) ?></td>
    </tr>
</table>
<span class="input-group-btn"">
<a href="/Phone/edit/<?= $this->Number->format($phone->id) ?>"><button class="btn btn-primary btn-md" id="btn-todo" style="margin-top:25px;">Edit Unsuspecting SMS Victim</button></a>
</span><p style="margin-top:10px;"><a href="/Phone"><button class="btn btn-primary">Cancel</button></a></p>