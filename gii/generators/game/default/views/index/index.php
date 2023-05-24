<?php

use fhnw\gii\generators\game\GameModuleGenerator;

/* @var $generator GameModuleGenerator */

?>
<?= "<?php\n\n"; ?>

/**
 * @package <?= $generator->getGameName() . "\n" ?>
 * @var \humhub\modules\ui\view\components\View $this
 */

use <?= $generator->getClassNamespace('assets') . '\\' . $generator->getGameName() . 'Assets'; ?>;
use <?= $generator->getClassNamespace().'\\' . $generator->getGameName() ?>Module;

<?= $generator->getGameName() ?>Assets::register($this);

$module = <?= $generator->getModuleName() ?>::getInstance();
$game = $module->getGame();

$this->registerCss('<?= $generator->getID() ?>');

$this->registerJsConfig('<?= $generator->getID() ?>', [
  'assetUrl'  => $module->getAssetsUrl(),
  'player'    => Yii::$app->user->id
]);
<?= '?>' ?>

<div class="container">
  <!-- -->
</div>
