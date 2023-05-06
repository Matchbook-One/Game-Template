<?php
use fhnw\generator\gii\generators\ModuleGenerator;
/* @var  ModuleGenerator $generator*/
?>

<?= "<?php\n"; ?>
/**
 * @package <?= $generator-> ?>
 * @author  {{USER_NAME}} <{{USER_MAIL}}>
 */

use {{NAMESPACE}}\Events;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\widgets\TopMenu;

return [
	'id' => '<?= $generator->moduleID; ?>',
	'class' => '<?= $generator->getModuleClass()->getNameSpace(); ?>',
	'namespace' => '<?= $generator->getClassNamespace(); ?>',
  'events'    => [
    [
      'class'    => TopMenu::class,
      'event'    => TopMenu::EVENT_INIT,
      'callback' => [Events::class, 'onTopMenuInit'],
    ],
    [
      'class'    => AdminMenu::class,
      'event'    => TopMenu::EVENT_INIT,
      'callback' => [Events::class, 'onAdminMenuInit']
    ]
  ]
];
