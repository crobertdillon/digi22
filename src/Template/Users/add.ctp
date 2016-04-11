<?= $this->Form->create($user) ?>
<fieldset>
    <div class="form-group"><?= $this->Form->input('username',['class'=>'form-control','placeholder'=>'User Name','label' => false,'autofocus'=>'autofocus']) ?></div>
    <div class="form-group"><?= $this->Form->input('password',['class'=>'form-control','placeholder'=>'Password','label' => false]) ?></div>
    <div class="form-group"><?= $this->Form->input('role', array(
        'type' => 'select',
        'options' => $roles,
        'multiple' => false,
        'required' => true,
        'label' => false,
        'class' => 'form-control',
        'default' => [1]
        )); ?></div>

</fieldset>
<?= $this->Form->button(__('Update Admin user'),['class' => 'btn btn-primary','style'=>'margin:25px;']); ?><a class="btn btn-primary" style="margin-left:25px;" href="/Users">Cancel</a>

<?= $this->Form->end() ?>