<?= $this->Form->create($smslist) ?>
<fieldset>
    <div class="form-group"><?= $this->Form->input('shortname',['class'=>'form-control','placeholder'=>'Short Name','label' => false,'autofocus'=>'autofocus']) ?></div>
    <div class="form-group"><?= $this->Form->input('longname',['class'=>'form-control','placeholder'=>'Long Name','label' => false]) ?></div>
</fieldset>
<?= $this->Form->button(__('Edit Brand Spanking Antique SMS List'),['class' => 'btn btn-primary','style'=>'margin:25px;']); ?><a class="btn btn-primary" style="margin-left:25px;" href="/Smslist">Cancel</a>

<?= $this->Form->end() ?>