<!-- File: src/Template/Users/login.ctp -->
<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <div class="form-group"><?= $this->Form->input('username',['class'=>'form-control','placeholder'=>'User Name','label' => false,'autofocus'=>'autofocus']) ?></div>
        <div class="form-group"><?= $this->Form->input('password',['class'=>'form-control','placeholder'=>'Password','label' => false]) ?></div>
    </fieldset>
    <?= $this->Form->button(__('Login'),['class' => 'btn btn-primary']); ?>
    <?= $this->Form->end() ?>
</div>