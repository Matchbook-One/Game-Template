<?php

use fhnw\gii\generators\game\ModuleGenerator;

/* @var $generator ModuleGenerator */

echo "<?php\n\n";
?>

namespace <?= $generator->moduleClass->getClassNamespace('controllers') ?>;

use humhub\components\Controller;

class AdminController extends Controller
{
  /** @return string */
  public function actionIndex(): string
  {
    return $this->render('index', []);
  }

}
