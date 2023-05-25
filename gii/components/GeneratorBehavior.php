<?php
declare(strict_types=1);

namespace fhnw\gii\components;

use yii\base\Behavior;
use yii\gii\Generator;

/**
 *
 */
abstract class GeneratorBehavior extends Behavior
{
  /** @var ?Generator $owner */
  public $owner;

}
