<?php

namespace fhnw\generator\gii;

use fhnw\generator\gii\generators\ModuleGenerator;
use ReflectionClass;
use Yii;
use yii\base\Action;
use yii\gii\controllers\DefaultController;
use yii\gii\Module;
use yii\web\ForbiddenHttpException;

class GameGeneratorModule extends Module
{

  /**
   * @return void
   */
  public function init(): void
  {
    parent::init();
    $moduleClass = new ReflectionClass(Module::class);
    $this->setBasePath(dirname($moduleClass->getFileName()));
  }

  /**
   * @param Action $action
   * @return bool
   * @throws ForbiddenHttpException
   */
  public function beforeAction($action): bool
  {
    if (Yii::$app->controller instanceof DefaultController) {
      Yii::$app->view->registerCss('body {padding: 0 !important}');
      Yii::$app->view->registerCss('html {font-size: 14px !important}');
    }

    return parent::beforeAction($action);
  }

  /**
   * @return array[]
   */
  protected function coreGenerators(): array
  {
    return [
        'module' => ['class' => ModuleGenerator::class],
      /*'crud' => ['class' => 'yii\gii\generators\crud\Generator'],
      'controller' => ['class' => 'yii\gii\generators\controller\Generator'],
      'form' => ['class' => 'yii\gii\generators\form\Generator'],
      'module' => ['class' => 'yii\gii\generators\module\Generator'],
      'extension' => ['class' => 'yii\gii\generators\extension\Generator'],*/
    ];
  }
}