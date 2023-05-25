<?php
declare(strict_types=1);

use fhnw\gii\generators\game\GameModuleGenerator;
use fhnw\gii\helpers\PhpPreset;

/* @var GameModuleGenerator $generator  */

?>
<?= PhpPreset::startTag() ?>

/**
 * @var \humhub\modules\ui\view\components\View $this
 */

use <?= $generator->getNamespace('assets') . '\\' . $generator->getGameName() . 'Assets'; ?>;
use <?= $generator->getNamespace().'\\' . $generator->getGameName() ?>Module;

<?= $generator->getGameName() ?>Assets::register($this);

$module = <?= $generator->getModuleName() ?>::getInstance();
$game = $module->getGame();

$this->registerCss('<?= $generator->getID() ?>');

$this->registerJsConfig('<?= $generator->getID() ?>', []);
<?= PhpPreset::endTag() ?>

<div class="container">
  <!-- -->
</div>
