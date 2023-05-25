<?php
declare(strict_types=1);

namespace fhnw\gii\components;

use Yii;
use yii\gii\Generator;
use yii\helpers\ArrayHelper;

/**
 * @property array $templates
 * @property string $template
 * @property bool $enableI18N
 * @property string $messageCategory
 */
abstract class ModuleGenerator extends Generator
{
  private const MODULE_PATTERN = '/^(?:[a-z]|[a-z][a-z-]*[a-z])$/';
  private const NAMESPACE_PATTERN = '/^(?:[a-zA-Z_]\w+\\\)+$/';

  public string $moduleID = '';

  public string $namespace = 'fhnw\\modules\\';

  /** @var string outputPath */
  public string $outputPath = 'result';

  /**
   * @inheritdoc
   * @return array<string,string>
   */
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
   * @param ?string $folder
   *
   * @return string
   */
  public function getAlias(?string $folder = null): string
  {
    /** @noinspection PhpVariableNamingConventionInspection */
    $id = $this->getID();

    return $folder ? "@$id/$folder" : "@$id";
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
   *
   * @return void
   */
  public function setModuleID(string $id): void
  {
    $this->moduleID = $id;
  }

  /**
   * @param ?string $suffix
   *
   * @return string the controller namespace of the module.
   */
  public function getNamespace(?string $suffix = null): string
  {
    $namespace = "$this->namespace{$this->getID()}";

    return $suffix ? "$namespace\\$suffix" : $namespace;
  }

  /**
   * @param string $file
   *
   * @return string
   */
  public function getOutputPath(string $file = ''): string { return Yii::getAlias("$this->outputPath/{$this->getID()}/$file"); }

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
   * @return string[]
   */
  public function stickyAttributes(): array
  {
    $sticky = ['namespace'];

    return ArrayHelper::merge(parent::stickyAttributes(), $sticky);
  }
}

