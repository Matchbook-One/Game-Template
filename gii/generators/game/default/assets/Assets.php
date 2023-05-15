<?php

use fhnw\gii\generators\game\ModuleGenerator;
use fhnw\gii\helpers\Comment;

/* @var $generator ModuleGenerator */

echo "<?php\n\n";
echo Comment::fileComment($generator->moduleClass->getGameName());
?>

namespace <?= $generator->moduleClass->getClassNamespace('assets') ."\n"?>

use fhnw\modules\gamecenter\assets\GameCenterAssets;
use humhub\components\assets\AssetBundle;
use yii\web\View;

/**
* The class <?= $generator->moduleClass->getGameName() ?>Asset
*/
class <?= $generator->moduleClass->getGameName() ?>Asset extends AssetBundle
{

  /** @var array $css */
  public $css = [
    'css/<?= $generator->moduleClass->getID() ?>.css'
  ];

  /** @var array $depends */
  public $depends = [
    GameCenterAssets::class
    // any additional dependencies
  ];

  /** @var array $js */
  public $js = [
    'js/<?= $generator->moduleClass->getID() ?>.js'
  ];

  /** @var int $jsPosition */
  public $jsPosition = View::POS_HEAD;

  /** @var array $publishOptions */
  public $publishOptions = [
    'forceCopy' => true // TODO: remove for production
  ];

  /** @var string $sourcePath */
  public $sourcePath = '<?= $generator->moduleClass->getAlias('resources') ?>';
}
