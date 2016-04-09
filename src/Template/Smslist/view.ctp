<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Smslist'), ['action' => 'edit', $smslist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Smslist'), ['action' => 'delete', $smslist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $smslist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Smslist'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Smslist'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="smslist view large-9 medium-8 columns content">
    <h3><?= h($smslist->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Shortname') ?></th>
            <td><?= h($smslist->shortname) ?></td>
        </tr>
        <tr>
            <th><?= __('Longname') ?></th>
            <td><?= h($smslist->longname) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($smslist->id) ?></td>
        </tr>
    </table>
</div>
