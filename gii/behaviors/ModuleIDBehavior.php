<?php
declare(strict_types=1);

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

  /**
   * @param string|null $folder
   *
   * @return string
   */
  public function getAlias(string $folder = null): string
  {
    return $folder ? "@{$this->getID()}/$folder" : "@{$this->getID()}";
  }

  /**
   * @return string
   */
  public function getID(): string
  {
    return str_replace('-', '', $this->getModuleID());
  }

  /**
   * @return string
   */
  public function getModuleID(): string
  {
    return $this->moduleID;
  }

  /**
   * @param string $id
   */
  public function setModuleID(string $id): void
  {
    if ($this->autoID) {
      $id = strtolower($id);
    }
    $this->moduleID = $id;
  }
}
