<?php

use fhnw\generator\gii\generators\ModuleGenerator;

/* @var $generator ModuleGenerator */

?>
<?= "<?php\n"; ?>

/**
 * @package <?= $generator->name ?>
 * @author  Christian Seiler <christian@christianseiler.ch>
 * @var \humhub\modules\ui\view\components\View $this
 */

use <?= $generator->getClassNamespace('assets') . '\\' . $generator->name .'Asset'; ?>;
use <?= $generator->namespace ?>\<?= $generator->name ?>Module;

<?=$generator->name?>Assets::register($this);

$module = <?=$generator->name?>Module::getInstance();
$game = $module->getGame();
$highscore = $game->getHighscore();
$score = $highscore ? $highscore->score : 0;

$this->registerCss('<?=$generator->moduleID?>');

$this->registerJsConfig('<?=$generator->moduleID?>', [
  'assetUrl'  => $module->getAssetsUrl(),
  'player'    => Yii::$app->user->id
]);
<?= "?>" ?>

<div class="container">
  <!-- -->
</div>
