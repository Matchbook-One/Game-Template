<?php
/**
 * @var yii\web\View                             $this
 * @var yii\widgets\ActiveForm                   $form
 * @var fhnw\gii\generators\game\ModuleGenerator $generator
 */

use fhnw\gii\widgets\IconSelect;

?>
<div class="module-form">
  <?= $form->field($generator, 'namespace'); ?>
  <?= $form->field($generator, 'moduleID'); ?>
  <?= IconSelect::widget(['model' => $generator, 'attribute' => 'icon']) ?>


  <?= $form->field($generator, 'outputPath'); ?>

</div>