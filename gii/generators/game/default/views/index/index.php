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

<?= PhpPreset::use($generator->getNamespace(),$generator->getModuleName()) ?>
<?= PhpPreset::use($generator->getNamespace('assets'),$generator->getGameName() . 'Assets') ?>

<?= $generator->getGameName() ?>Assets::register($this);

$module = <?= $generator->getModuleName() ?>::getInstance();
$game = $module->getGame();

$this->registerCss('<?= $generator->getID() ?>');

$this->registerJsConfig('<?= $generator->getID() ?>', [
  'assetUrl'  => $module->getAssetsUrl()
]);
<?= PhpPreset::endTag() ?>

<div class="container">
  <!-- -->
</div>
