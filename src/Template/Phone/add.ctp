<?= $this->Form->create($phone) ?>
<fieldset>
    <div class="form-group"><?= $this->Form->input('first_name',['class'=>'form-control','placeholder'=>'First Name','label' => false,'autofocus'=>'autofocus']) ?></div>
    <div class="form-group"><?= $this->Form->input('last_name',['class'=>'form-control','placeholder'=>'Last Name','label' => false]) ?></div>
    <div class="form-group"><?= $this->Form->input('station',['class'=>'form-control','placeholder'=>'Station','label' => false]) ?></div>
    <div class="form-group"><?= $this->Form->input('phone',['class'=>'form-control','placeholder'=>'Phone Number','label' => false]) ?></div>
    <label>All Users are added to the 'Default' list. This may not be changed (Shift Click for Multiple Lists)</label>
    <div class="form-group"><?= $this->Form->input('additional_lists(s)', array(
        'type' => 'select',
        'options' => $slists,
        'name' => 'smslists',
        'id' => 'smslists',
        'multiple' => true,
        'required' => true,
        'default' => ['1'],
        'label' => false
        ));
        ?></div>
</fieldset>
<?= $this->Form->button(__('Add SMS Phone Number'),['class' => 'btn btn-primary','style'=>'margin:25px;']); ?><a class="btn btn-primary" style="margin-left:25px;" href="/Phone">Cancel</a>

<?= $this->Form->end() ?>




