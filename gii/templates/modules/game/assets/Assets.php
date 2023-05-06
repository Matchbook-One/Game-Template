<?php

use fhnw\generator\gii\generators\ModuleGenerator;

/* @var $generator ModuleGenerator */

?>
<?= "<?php\n"; ?>

namespace <?= $generator->getClassNamespace('assets'); ?>

use fhnw\modules\gamecenter\assets\GameCenterAssets;
use humhub\components\assets\AssetBundle;
use yii\web\View;

/**
 * The class <?= $generator->name ?>Asset
 */
class <?= $generator->name ?>Asset extends AssetBundle
{

  /** @var array $css */
  public $css = [
    'css/<?= $generator->moduleID ?>.css'
  ];

  /** @var array $depends */
  public $depends = [
    GameCenterAssets::class
    // any additional dependencies
  ];

  /** @var array $js */
  public $js = [
    'js/<?= $generator->moduleID ?>.js'
  ];

  /** @var int $jsPosition */
  public $jsPosition = View::POS_HEAD;

  /** @var array $publishOptions */
  public $publishOptions = [
    'forceCopy' => true // TODO: remove for production
  ];

  /** @var string $sourcePath */
  public $sourcePath = '@<?= $generator->moduleID ?>/resources';
}
