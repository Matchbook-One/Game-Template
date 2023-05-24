<?php

namespace fhnw\gii\components;

use fhnw\gii\behaviors\ModuleIDBehavior;
use fhnw\gii\behaviors\NamespaceBehavior;
use Yii;
use yii\gii\Generator;
use yii\helpers\ArrayHelper;

/**
 * @property bool $autoID
 * @property string $moduleID
 * @property array $templates
 * @property string $template
 * @property bool $enableI18N
 * @property string $messageCategory
 * @property string $namespace
 * @method getID(): string
 * @method getModuleID(): string
 * @method getNamespace(): string
 * @method getClassNamespace(?string $suffix = null): string
 * @method getAlias(?string $folder = null): string
 */
abstract class ModuleGenerator extends Generator
{
  private const MODULE_PATTERN = '/^(?:[a-z]|[a-z][a-z-]*[a-z])$/';
  private const NAMESPACE_PATTERN = '/^(?:[a-zA-Z_]\w+\\\)+$/';

  /** @var string outputPath */
  public string $outputPath = 'result';

  public function init(): void
  {
    parent::init();
    $this->ensureBehaviors();
  }

  public function attributeLabels(): array
  {
    $labels = [
      'moduleID'   => 'Module ID',
      'namespace'  => 'Namespace',
      'outputPath' => 'Output Path'
    ];

    return array_merge(parent::attributeLabels(), $labels);
  }

  /**
   * @return Array<string>
   * @inheritdoc
   */
  public function behaviors(): array
  {
    return [ModuleIDBehavior::class, NamespaceBehavior::class];
  }

  /**
   * @param string $file
   *
   * @return string
   */
  public function getOutputPath(string $file = ''): string { return Yii::getAlias("{$this->outputPath}/{$this->getID()}/$file"); }

  /**
   * @inheritdoc
   * @return array<string,string>
   */
  public function hints(): array
  {
    $hints = [
      'moduleID'   => 'This refers to the ID of the module.<br /> e.g. <code>flappy-bird</code>',
      'namespace'  => 'This is the namespace of the module.<br /> e.g. <code>fhnw\modules\games\</code>',
      'outputPath' => 'This is where the new Module will be saved.'
    ];

    return ArrayHelper::merge(parent::hints(), $hints);
  }

  /**
   * @inheritDoc
   * @return array
   */
  public function rules(): array
  {
    $rules = [
      [['namespace'], 'trim'],
      [['namespace'], 'required'],
      [
        ['namespace'],
        'match',
        'pattern' => self::NAMESPACE_PATTERN,
        'message' => 'Only letters, numbers and backslashes are allowed, the namespace has to end with a backslash. e.g. \'myCompany\\\' or \'myCompany\\social\\\'.'
      ],
      [['moduleID'], 'trim'],
      [['moduleID', 'outputPath'], 'required'],
      [
        ['moduleID'],
        'match',
        'pattern' => self::MODULE_PATTERN,
        'message' => 'The "Module ID" must be lowercase and one word, and may contain hyphens.'
      ]
    ];

    return ArrayHelper::merge(parent::rules(), $rules);
  }

  /**
   * @inheritDoc
   * @return array
   */
  function stickyAttributes(): array
  {
    $sticky = ['namespace'];

    return ArrayHelper::merge(parent::stickyAttributes(), $sticky);
  }
}

