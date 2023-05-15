<?php

use fhnw\gii\generators\game\ModuleGenerator;

/* @var $generator ModuleGenerator */

echo "<?php\n\n";
?>

namespace <?= $generator->getClassNamespace('controllers') ?>;

use humhub\components\Controller;

class IndexController extends Controller
{
  /** @return string */
  public function actionIndex(): string
  {
    return $this->render('index', []);
  }

}
