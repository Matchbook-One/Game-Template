<?php

use fhnw\generator\gii\generators\ModuleGenerator;

/* @var $generator ModuleGenerator */

?>
<?= "<?php\n"; ?>

namespace <?= $generator->getClassNamespace('controllers'); ?>

use humhub\components\Controller;

class IndexController extends Controller
{
  /** @return string */
  public function actionIndex(): string
  {
    return $this->render('index', []);
  }

}
