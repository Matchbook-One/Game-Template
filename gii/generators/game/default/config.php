<?php

use fhnw\gii\generators\game\ModuleGenerator;

/** @var  ModuleGenerator $generator */

echo "<?php\n\n";
?>
use <?= $generator->moduleClass->getClassNamespace().'\\'.$generator->moduleClass->getModuleName() ?>;
use <?= $generator->moduleClass->getClassNamespace() ?>\Events;
use humhub\modules\admin\widgets\AdminMenu;

return [
	'id' => '<?= $generator->moduleClass->getID(); ?>',
	'class' => <?= $generator->moduleClass->getModuleName(); ?>::class,
	'namespace' => '<?= $generator->moduleClass->getClassNamespace(); ?>',
  'events'    => [
    [
      'class'    => AdminMenu::class,
      'event'    => TopMenu::EVENT_INIT,
      'callback' => [Events::class, 'onAdminMenuInit']
    ]
  ]
];
