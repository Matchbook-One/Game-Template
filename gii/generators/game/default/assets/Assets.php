<?php
declare(strict_types=1);

use fhnw\gii\generators\game\GameModuleGenerator;
use fhnw\gii\helpers\PhpPreset;

/* @var GameModuleGenerator$generator  */
?>
<?= PhpPreset::startTag() ?>
<?= PhpPreset::namespace($generator->getNamespace('assets')) ?>
use fhnw\modules\gamecenter\assets\GameCenterAssets;
use yii\web\View;

/**
* The class <?= $generator->getGameName() ?>Assets
*/
class <?= $generator->getGameName() ?>Assets <?= PhpPreset::extends('\fhnw\modules\gamecenter\components\GameAssets')?>
{

  /** @var array $css */
  public $css = [
    'css/<?= $generator->getID() ?>.css'
  ];

  /** @var array $depends */
  public $depends = [
    GameCenterAssets::class
    // any additional dependencies
  ];

  /** @var array $js */
  public $js = [
    'js/<?= $generator->getID() ?>.js'
  ];

  /** @var array $publishOptions */
  public $publishOptions = [
    'forceCopy' => true // TODO: remove for production
  ];

  /** @var string $sourcePath */
  public $sourcePath = '<?= $generator->getAlias('resources') ?>';
}
