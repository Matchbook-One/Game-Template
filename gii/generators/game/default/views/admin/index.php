<?php

use fhnw\gii\generators\game\ModuleGenerator;

/* @var $generator ModuleGenerator */

?>
<?= "<?php\n\n"; ?>

/**
* @package <?= $generator->getGameName() . "\n" ?>
* @var \humhub\modules\ui\view\components\View $this
*/

use <?= $generator->getClassNamespace('assets') . '\\' . $generator->getGameName() . 'Asset'; ?>;
use <?= $generator->getClassNamespace().'\\' . $generator->getGameName() ?>Module;

<?= $generator->getGameName() ?>Assets::register($this);

$module = <?= $generator->getModuleName() ?>::getInstance();
$game = $module->getGame();

$this->registerCss('<?= $generator->moduleID ?>');

$this->registerJsConfig('<?= $generator->moduleID ?>', []);
<?= '?>' ?>

<div class="container">
  <!-- -->
</div>
