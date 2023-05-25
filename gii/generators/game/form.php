<?php
declare(strict_types=1);

use fhnw\gii\generators\game\GameModuleGenerator;
use fhnw\gii\widgets\IconSelect;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var ActiveForm $form
 * @var GameModuleGenerator $generator
 */

?>

<?= $form->field($generator, 'namespace') ?>
<?= $form->field($generator, 'moduleID') ?>
<?= IconSelect::widget(['model' => $generator, 'attribute' => 'icon']) ?>

<?= $form->field($generator, 'outputPath'); ?>
