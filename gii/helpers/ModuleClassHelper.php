<?php
/**
 * @link      https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license   https://www.humhub.com/licences
 *
 */

namespace fhnw\gii\helpers;


use fhnw\gii\generators\game\ModuleGenerator;
use yii\base\Component;

class ModuleClassHelper extends Component
{
  /** @var ModuleGenerator */
  public ModuleGenerator $root;

  public function getNameSpace(): string
  {
    return $this->getClassNamespace();
  }


  public function getID(): string
  {
    return mb_strtolower($this->getGameName());
  }

  public function getGameName(): string
  {
    $name = $this->root->moduleID;
    $pattern = '/-/';
    $array = array_map('ucfirst', preg_split($pattern, $name));
    return join('', $array);
  }

  /**
   * @param ?string $suffix
   * @return string the controller namespace of the module.
   */
  public function getClassNamespace(?string $suffix = null): string
  {
    $namespace = $this->root->namespace . mb_strtolower($this->getGameName());
    return $suffix ? "$namespace\\$suffix" : $namespace;
  }

  public function getModuleName(): string
  {
    return "{$this->getGameName()}Module";
  }

  public function getAlias(string $folder = null): string
  {

    return $folder ? "@{$this->getID()}/$folder" : "@{$this->getID()}";
  }
}