<?php

namespace fhnw\gamecenter\gii\generators;

use yii\base\Component;

/**
 * @package GameGenerator
 */
class ModuleClassHelper extends Component
{

  public ModuleGenerator $root;

  /**
   * @return string[]
   */
  public function getIncludes(): array
  {
    $result = [
        'Yii',
        'yii\helpers\Url'
    ];

    if ($this->root->isContentContainerModule()) {
      $result[] = 'humhub\modules\content\components\ContentContainerActiveRecord';

      if ($this->root->isSpaceModule) {
        $result[] = 'humhub\modules\space\models\Space';
      }

      if ($this->root->isUserModule) {
        $result[] = 'humhub\modules\user\models\User';
      }

    }

    return $result;
  }

  public function getNameSpace(): string
  {
    return $this->root->getClassNamespace('Module');
  }

  public function getSuperClass(): string
  {
    return $this->root->isContentContainerModule() ? 'humhub\modules\content\components\ContentContainerModule' : 'humhub\components\Module';
  }

}