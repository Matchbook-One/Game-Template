<?php

/**
 * @link      https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license   https://www.humhub.com/licences
 *
 */

namespace fhnw\gii\widgets;

use yii\base\{Model, Widget};

/**
 * User Administration Menu
 *
 * @author Basti
 */
class IconSelect extends Widget
{

  /** @var Model */
  public Model $model;
  public string $attribute;

  public function run()
  {
    return $this->render('iconSelect', [
      'model'     => $this->model,
      'attribute' => $this->attribute,
      'formName'  => "{$this->model->formName()}[$this->attribute]"
    ]);
  }
}
