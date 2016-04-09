<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$this->loadHelper('Tools.AuthUser');
$this->assign('title', $title);
$this->assign('sub',$sub);
$this->assign('sidebar',$sidebar);
$this->assign('nav',$nav);
$this->assign('bc',$bc);
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap/bootstrap.css') ?>
    <?= $this->Html->css('bootstrap-table.css') ?>

    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('datepicker3.css') ?>

    <?= $this->Html->script('lumino.glyphs.js') ?>

    <?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('bootstrap/bootstrap.js', ['block' => 'scriptBottom']) ?>

    <?= $this->Html->script('bootstrap-table.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('base.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('mask.js', ['block' => 'scriptPhone']) ?>
    <?= $this->Html->script('phony.js', ['block' => 'scriptPhone']) ?>
    <?= $this->AuthUser->id() ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<?php
echo $this->element($this->fetch('nav'));
echo $this->element($this->fetch('sidebar'));
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"><?= $this->fetch('bc') ?></li>
        </ol>
    </div><!--/.row-->
<div class="row">
    <div class="col-lg-12">
     <?= $this->Flash->render() ?>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $this->fetch('title') ?></h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?= $this->fetch('sub') ?></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->


</div>	<!--/.main-->
<footer></footer>
<?= $this->fetch('scriptBottom') ?>

<?= $this->fetch('scriptPhone') ?>
</body>
</html>
