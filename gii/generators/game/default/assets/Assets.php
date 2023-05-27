<?php
declare(strict_types=1);

use fhnw\gii\generators\game\GameModuleGenerator;
use fhnw\gii\helpers\Comment;use fhnw\gii\helpers\PhpPreset;

/* @var GameModuleGenerator$generator  */
?>
<?= PhpPreset::startTag() ?>
<?= PhpPreset::namespace($generator->getNamespace('assets')) ?>
use fhnw\modules\gamecenter\assets\GameCenterAssets;
use humhub\components\assets\AssetBundle;
use yii\web\View;

/**
* The class <?= $generator->getGameName() ?>Assets
*/
class <?= $generator->getGameName() ?>Assets extends AssetBundle
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

  /** @var int $jsPosition */
  public $jsPosition = View::POS_HEAD;

  /** @var array $publishOptions */
  public $publishOptions = [
    'forceCopy' => true // TODO: remove for production
  ];

  /** @var string $sourcePath */
  public $sourcePath = '<?= $generator->getAlias('resources') ?>';
}
