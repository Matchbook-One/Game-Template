<?php
declare(strict_types=1);

use fhnw\gii\generators\game\GameModuleGenerator;
use fhnw\gii\helpers\PhpPreset;

/* @var GameModuleGenerator $generator  */

echo PhpPreset::startTag();
?>

namespace <?= $generator->getNamespace('controllers') ?>;

use humhub\components\Controller;

class AdminController extends Controller
{
  /** @return string */
  public function actionIndex(): string
  {
    return $this->render('index', []);
  }

}
