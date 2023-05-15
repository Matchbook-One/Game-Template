<?php
/**
 * @author Christian Seiler <christian@christianseiler.ch>
 */

namespace fhnw\gii\generators\game;

use fhnw\gii\helpers\ModuleClassHelper;
use fhnw\gii\models\Author;
use Yii;
use yii\gii\CodeFile;
use yii\gii\Generator;
use function array_merge;

/**
 *
 * @package GameGenerator
 *
 * @property-read string $name                The name of the generator.
 * @property-read string $description         The detailed description of the generator.
 * @property-read string $controllerNamespace The controller namespace of the module.
 * @property-read string $modulePath          The directory that contains the module class.
 * @method stickyAttributes()
 */
class ModuleGenerator extends Generator
{
  public string $namespace = 'fhnw\\modules\\games\\';
  public string $icon = 'fa-gamepad';
  //public bool $isSpaceModule = false;
  //public bool $isUserModule = false;
  /** @var string outputPath */
  public string $outputPath = 'result';
  /** @var string */
  public string $moduleID = '';

  /**
   * @var ModuleClassHelper
   */
  public ModuleClassHelper $moduleClass;

  public function init(): void
  {
    parent::init();
    $this->moduleClass = new ModuleClassHelper(['root' => $this]);
  }

  /** @return string */
  public function getName(): string
  {
    return 'Game Module Generator';
  }

  /** @return string */
  public function getDescription(): string
  {
    return 'This generator helps you to generate the skeleton code needed by a HumHub Game module.';
  }

  /**
   * @return array
   */
  public function rules(): array
  {
    return array_merge(parent::rules(), [
      [['moduleID', 'namespace'], 'trim'],
      [['moduleID', 'namespace', 'outputPath'], 'required'],
      [
        ['moduleID'],
        'match',
        'pattern' => '/^[a-z0-9][a-z0-9-]*$/',
        'message' => 'The "moduleID" must be lowercase and one word, and may contain hyphens.'
      ],
      [
        ['namespace'],
        'match',
        'pattern' => '/^[a-zA-Z0-9\\\]+\\\$/',
        'message' => 'Only letters, numbers and backslashes are allowed, the namespace has to end with a backslash. e.g. \'myCompany\\\' or \'myCompany\\social\\\'.'
      ]
    ]);
  }

  /**
   * @inheritDoc
   * @return array<string,string>
   */
  public function attributeLabels(): array
  {
    return array_merge(
      parent::attributeLabels(),
      [
        'moduleID'    => 'Module ID',
        'moduleClass' => 'Module Class'
      ]
    );
  }

  /**
   * {@inheritdoc}
   * @return array<string,string>
   */
  public function hints(): array
  {
    return array_merge(
      parent::hints(),
      [
        'moduleID'    => 'This refers to the ID of the module, e.g., <code>admin</code>.',
        'moduleClass' => 'This is the fully qualified class name of the module, e.g., <code>app\modules\admin\Module</code>.',
      ]
    );
  }

  /**
   * @inheritdoc
   * @return Array<string>
   */
  public function requiredTemplates(): array
  {
    return [
      'config.php',
      'module.json.php',
      'Module.php',
      'Events.php',
      'controllers/IndexController.php',
      'views/index/index.php'
    ];
  }

  /**
   * @inheritdoc
   * @return CodeFile
   */
  public function generate(): array
  {
    return [
      new CodeFile($this->getOutputPath('config.php'), $this->render('config.php')),
      new CodeFile($this->getOutputPath('module.json'), $this->render('module.json.php')),
      new CodeFile($this->getOutputPath($this->moduleClass->getModuleName() . '.php'), $this->render('Module.php')),
      new CodeFile($this->getOutputPath('Events.php'), $this->render('Events.php')),
      new CodeFile($this->getOutputPath('controllers/AdminController.php'), $this->render('controllers/AdminController.php')),
      new CodeFile($this->getOutputPath('controllers/IndexController.php'), $this->render('controllers/IndexController.php')),
      new CodeFile($this->getOutputPath('views/admin/index.php'), $this->render('views/admin/index.php')),
      new CodeFile($this->getOutputPath('views/index/index.php'), $this->render('views/index/index.php')),
      // new CodeFile($this->getOutputPath('views/layouts/default.php'), $this->render('views/layouts/default.php')),
      new CodeFile($this->getOutputPath('assets/Assets.php'), $this->render('assets/Assets.php')),
      new CodeFile($this->getOutputPath("resources/js/{$this->moduleClass->getID()}.js"), $this->render('resources/js/game.js.php')),
      new CodeFile($this->getOutputPath('resources/js/humhub.d.ts'), $this->render('resources/js/humhub.d.ts.php')),
      new CodeFile($this->getOutputPath("resources/css/{$this->moduleClass->getID()}.css"), $this->render('resources/css/game.css')),
      new CodeFile($this->getOutputPath("resources/scss/{$this->moduleClass->getID()}.scss"), $this->render('resources/scss/game.scss')),
      new CodeFile($this->getOutputPath('package.json'), $this->render('package.json.php')),
      new CodeFile($this->getOutputPath('translate.json'), $this->render('translate.php')),
      new CodeFile($this->getOutputPath('eslint.config.js'), $this->render('eslint.config.js'))
    ];
  }

  /**
   * @param string $file
   * @return string
   */
  public function getOutputPath(string $file = ''): string
  {
    return Yii::getAlias("$this->outputPath/{$this->moduleClass->getID()}/$file");
  }

}