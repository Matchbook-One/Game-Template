<?php

use fhnw\gii\generators\game\ModuleGenerator;

/** @var  ModuleGenerator $generator */

echo "<?php\n\n";
?>
use <?= $generator->getClassNamespace().'\\'.$generator->getModuleName() ?>;
use <?= $generator->getClassNamespace() ?>\Events;
use humhub\modules\admin\widgets\AdminMenu;

return [
	'id' => '<?= $generator->moduleID; ?>',
	'class' => <?= $generator->getModuleName(); ?>::class,
	'namespace' => '<?= $generator->getClassNamespace(); ?>',
  'events'    => [
    [
      'class'    => AdminMenu::class,
      'event'    => TopMenu::EVENT_INIT,
      'callback' => [Events::class, 'onAdminMenuInit']
    ]
  ]
];
