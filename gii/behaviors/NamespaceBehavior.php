<?php

namespace fhnw\gii\behaviors;

use fhnw\gii\components\GeneratorBehavior;
use yii\gii\Generator;

/**
 * @property  ?Generator $owner
 */
class NamespaceBehavior extends GeneratorBehavior
{
  public const NAMESPACE_PATTERN = '/^(?:[a-zA-Z_]\w+\\\)+$/';

  public string $namespace = 'fhnw\\modules\\';

  /**
   * @param ?string $suffix
   *
   * @return string the controller namespace of the module.
   */
  public function getClassNamespace(?string $suffix = null): string
  {
    return $suffix ? $this->getNamespace() . "\\$suffix" : $this->getNamespace();
  }

  public function getNamespace(): string
  {
    if ($this->owner->hasMethod('getModuleID')) {
      $name = $this->owner->getModuleID();

      return $this->namespace . join('', explode('-', $name));
    }

    return $this->namespace;
  }
}
