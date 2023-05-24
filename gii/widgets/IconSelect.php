<?php

/**
 * @link      https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license   https://www.humhub.com/licences
 *
 */

namespace fhnw\gii\widgets;

use Yii;
use yii\base\{InvalidConfigException, Model, Widget};

/**
 * User Administration Menu
 *
 * @author Basti
 */
class IconSelect extends Widget
{

  public string $attribute;

  /** @var Model */
  public Model $model;

  /**
   * @return string
   */
  public function run(): string
  {
    try {
      return $this->render('iconSelect', [
        'model'     => $this->model,
        'attribute' => $this->attribute,
        'formName'  => "{$this->model->formName()}[$this->attribute]"
      ]);
    }
    catch (InvalidConfigException $e) {
      Yii::error($e);
    }

    return '';
  }
}
