<?php
declare(strict_types=1);

use fhnw\gii\generators\game\GameModuleGenerator;
use fhnw\gii\helpers\PhpPreset;

/** @var  GameModuleGenerator $generator */
?>
<?= PhpPreset::startTag() ?>
<?= PhpPreset::use($generator->getNamespace(), $generator->getModuleName()) ?>
<?= PhpPreset::use($generator->getNamespace(), 'Events') ?>
<?= PhpPreset::use('humhub\modules\admin\widgets', 'AdminMenu') ?>

return [
	'id' => '<?= $generator->getModuleID(); ?>',
	'class' => <?= $generator->getModuleName(); ?>::class,
	'namespace' => '<?= $generator->getNamespace(); ?>',
  'events'    => [
    [
      'class'    => AdminMenu::class,
      'event'    => AdminMenu::EVENT_INIT,
      'callback' => [Events::class, 'onAdminMenuInit']
    ]
  ]
];
