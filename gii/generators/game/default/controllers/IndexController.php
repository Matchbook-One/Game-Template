<?php
declare(strict_types=1);

use fhnw\gii\generators\game\GameModuleGenerator;
use fhnw\gii\helpers\PhpPreset;

/* @var GameModuleGenerator$generator  */

?>
<?= PhpPreset::startTag() ?>
<?= PhpPreset::namespace($generator->getNamespace('controllers')) ?>

class IndexController <?= PhpPreset::extends('\humhub\components\Controller')?>
{
  /** @return string */
  public function actionIndex(): string
  {
    return $this->render('index', []);
  }

}
