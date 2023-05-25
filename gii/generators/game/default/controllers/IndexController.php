<?php
declare(strict_types=1);

use fhnw\gii\generators\game\GameModuleGenerator;

/* @var GameModuleGenerator$generator  */

echo "<?php\n\n";
?>

namespace <?= $generator->getNamespace('controllers') ?>;

use humhub\components\Controller;

class IndexController extends Controller
{
  /** @return string */
  public function actionIndex(): string
  {
    return $this->render('index', []);
  }

}
