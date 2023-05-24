<?php

use fhnw\gii\generators\game\GameModuleGenerator;
use fhnw\gii\helpers\Comment;

/* @var $generator GameModuleGenerator */

echo "<?php\n\n";
echo Comment::fileComment($generator->getGameName());
?>

namespace <?= $generator->getClassNamespace('assets') ."\n"?>

use fhnw\modules\gamecenter\assets\GameCenterAssets;
use humhub\components\assets\AssetBundle;
use yii\web\View;

/**
* The class <?= $generator->getGameName() ?>Asset
*/
class <?= $generator->getGameName() ?>Asset extends AssetBundle
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
