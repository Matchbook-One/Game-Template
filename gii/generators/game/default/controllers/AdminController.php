<?php

use fhnw\gii\generators\game\GameModuleGenerator;

/* @var $generator GameModuleGenerator */

echo "<?php\n\n";
?>

namespace <?= $generator->getClassNamespace('controllers') ?>;

use humhub\components\Controller;

class AdminController extends Controller
{
  /** @return string */
  public function actionIndex(): string
  {
    return $this->render('index', []);
  }

}
