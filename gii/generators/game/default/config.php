<?php

use fhnw\gii\generators\game\GameModuleGenerator;

/** @var  GameModuleGenerator $generator */

echo "<?php\n\n";
?>
use <?= $generator->getClassNamespace().'\\'.$generator->getModuleName() ?>;
use <?= $generator->getClassNamespace() ?>\Events;
use humhub\modules\admin\widgets\AdminMenu;

return [
	'id' => '<?= $generator->getModuleID(); ?>',
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
