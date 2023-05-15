<?php

use fhnw\gii\generators\game\ModuleGenerator;

/* @var $generator ModuleGenerator */

?>
<?= "<?php\n\n"; ?>

/**
* @package <?= $generator->moduleClass->getGameName() . "\n" ?>
* @var \humhub\modules\ui\view\components\View $this
*/

use <?= $generator->moduleClass->getClassNamespace('assets') . '\\' . $generator->moduleClass->getGameName() . 'Asset'; ?>;
use <?= $generator->moduleClass->getClassNamespace().'\\' . $generator->moduleClass->getGameName() ?>Module;

<?= $generator->moduleClass->getGameName() ?>Assets::register($this);

$module = <?= $generator->moduleClass->getModuleName() ?>::getInstance();
$game = $module->getGame();

$this->registerCss('<?= $generator->moduleClass->getID() ?>');

$this->registerJsConfig('<?= $generator->moduleClass->getID() ?>', [
  'assetUrl'  => $module->getAssetsUrl(),
  'player'    => Yii::$app->user->id
]);
<?= '?>' ?>

<div class="container">
  <!-- -->
</div>
