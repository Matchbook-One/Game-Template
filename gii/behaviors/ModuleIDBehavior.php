<?php

namespace fhnw\gii\behaviors;

use fhnw\gii\components\GeneratorBehavior;
use yii\gii\Generator;
use function str_replace;
use function strtolower;

/**
 * @property  ?Generator $owner
 */
class ModuleIDBehavior extends GeneratorBehavior
{
  public bool $autoID = false;

  public string $moduleID = '';

  public function getAlias(string $folder = null): string
  {
    return $folder ? "@{$this->getID()}/$folder" : "@{$this->getID()}";
  }

  public function getID(): string
  {
    return str_replace('-', '', $this->getModuleID());
  }

  public function getModuleID(): string
  {
    return $this->moduleID;
  }

  /**
   * @param string $id
   */
  public function setModuleID(string $id): void
  {
    if ($this->autoID)
      $id = strtolower($id);
    $this->moduleID = $id;
  }

}
