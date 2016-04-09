<div class="sms form large-9 medium-8 columns content">
    <?= $this->Form->create($sm) ?>
    <fieldset>
        <h6 style="font-size:.75em;font-weight:bold;">Kickin' It Old School With that Funky Fresh 160 character limit</h6>
        <?php
            $narf = time();

            echo $this->Form->hidden('sender',['value' => $cuser]);
            echo $this->Form->textarea('mess',['maxlength'=>'160','style'=>'width:450px;height:80px;']);
            echo $this->Form->hidden('utc',['value' => $narf]);
        ?>
    </fieldset>

    <span class="input-group-btn"><?= $this->Form->button(__('Lets Get This Party Started, Right?'),['class'=>'btn btn-primary btn-md','style'=>'margin:20px;']) ?><a class="btn btn-primary" href="/Sms">Cancel</a></span>

</div>
