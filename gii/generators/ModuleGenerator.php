<?php

namespace fhnw\gamecenter\gii\generators;

use JetBrains\PhpStorm\ArrayShape;
use Yii;
use yii\base\InvalidArgumentException;
use yii\gii\CodeFile;
use yii\gii\Generator;
use yii\helpers\Url;
use yii\validators\Validator;

/**
 *
 * @package GameGenerator
 *
 * @property-read string      $name             The name of the generator.
 * @property-read string      $description      The detailed description of the generator.
 * @property-read string      $stickyDataFile   The file path that stores the sticky attribute values.
 * @property-read string      $templatePath     The root path of the template files that are currently being used.
 * @property-read Validator[] $activeValidators The validators applicable to the current [[scenario]].
 * @property array            $templates
 * @property string           $template
 * @property string           $messageCategory
 * @property bool             $enableI18N
 * @property string           $moduleID
 * @method formView
 * @method getStickyDataFile
 * @method save
 * @method getTemplatePath
 */
class ModuleGenerator extends Generator
{
  private const NS_DASH_REPLACEMENT = '';
  public string $namespace = 'fhnw\\modules\\game\\';
  public string $icon = 'gamepad';
  public bool $isSpaceModule = false;
  public bool $isUserModule = false;
  /** @var string outputPath */
  public string $outputPath = "result";
  /** @var ModuleClassHelper moduleClass */
  private ModuleClassHelper $moduleClass;

  /** @return string */
  public function getName(): string
  {
    return Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Game Module Generator');
  }

  /** @return string */
  public function getDescription(): string
  {
    return Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'This generator helps you to generate the skeleton code needed by a HumHub module.');
  }

  /** @return void */
  public function init(): void
  {
    $this->templates['game'] = $this->defaultTemplate();
    $this->moduleClass = new ModuleClassHelper(['root' => $this]);
  }

  /** @return bool|string */
  public function defaultTemplate(): bool | string
  {
    return Yii::getAlias('@devtools/gii/templates/modules/game');
  }

  /**
   * @return array
   */
  public function rules(): array
  {
    return array_merge(parent::rules(), [
        [['moduleID', 'namespace'], 'trim'],
        [['moduleID', 'namespace', 'outputPath'], 'required'],
        [['isSpaceModule', 'isUserModule'], 'boolean'],
        [['contentContainerName', 'contentContainerDescription', 'icon'], 'string'],
        [
            ['moduleID'],
            'match',
            'pattern' => '/^[\w\\-]+$/',
            'message' => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Only word characters and dashes are allowed e.g.: \'myModule\'.')
        ],
        [
            ['namespace'],
            'match',
            'pattern' => '/^[a-zA-Z0-9\\\]+\\\$/',
            'message' => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Only letters, numbers and backslashes are allowed, the namespace has to end with a backslash. e.g. \'myCompany\\\' or \'myCompany\\social\\\'.')
        ],
        [
            ['outputPath'],
            function ($attribute, $params, $validator) {
              try {
                Yii::getAlias($this->$attribute);
              } catch (InvalidArgumentException $e) {
                $this->addError($attribute, Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Could not resolve output path.'));
              }
            }
        ],
    ]);
  }

  /**
   * @return array
   */
  #[ArrayShape([
      'moduleID'                    => "string",
      'outputPath'                  => "string",
      'namespace'                   => "string",
      'isUserModule'                => "string",
      'isSpaceModule'               => "string",
      'contentContainerName'        => "string",
      'contentContainerDescription' => "string",
      'icon'                        => 'string'
  ])]
  public function attributeLabels(): array
  {
    return [
        'moduleID'                    => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Module ID'),
        'icon'                        => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Module Navigation Icon'),
        'namespace'                   => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Namespace'),
        'isUserModule'                => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Is User Profile Module'),
        'isSpaceModule'               => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Is Space Module'),
        'contentContainerName'        => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Name displayed in Spaces and User Profiles'),
        'contentContainerDescription' => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Description displayed in Spaces and User Profiles'),
        'outputPath'                  => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'Output Path'),
    ];
  }

  /**
   * @inheritdoc
   * @return array
   */
  #[ArrayShape([
      'moduleID'                    => "string",
      'outputPath'                  => "string",
      'namespace'                   => "string",
      'isUserModule'                => "string",
      'isSpaceModule'               => "string",
      'contentContainerName'        => "string",
      'contentContainerDescription' => "string"
  ])]
  public function hints(): array
  {
    return [
        'moduleID'                    => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'This refers to the ID of the module, e.g. <code>myApp</code>. The id is used within your class namespaces as well as the Module configuration.'),
        'outputPath'                  => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'The temporary location of the generated files.'),
        'namespace'                   => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'The namespace prefix is used for all your module classes e.g., <code>myCompany</code> or <code>myCompany\\intranet</code>.'),
        'isUserModule'                => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'This module should be installable on a user profile.'),
        'isSpaceModule'               => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'This module should be installable on space level.'),
        'contentContainerName'        => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'This name will be shown in the module overview of Spaces and User Profiles'),
        'contentContainerDescription' => Yii::t('GameGeneratorModule.generators.ModuleGenerator', 'This description will be shown in module overview of Spaces and User Profiles'),
    ];
  }

  /**
   * @inheritdoc
   * @return string
   */
  public function successMessage(): string
  {
    $output = '<p>';
    $output .= Yii::t('DevtoolsModule.generators_ModuleGenerator', 'The module has been generated successfully.');
    $output .= '</p>';
    $output .= '<p>';
    $output .= Yii::t('DevtoolsModule.generators_ModuleGenerator', 'To access the module, you must enable it via the <a href="{url}">module admin panel</a>', ['url' => Url::to(['/admin/module'])]);
    $output .= '</p>';
    return $output;
  }

  /**
   * @inheritdoc
   * @return Array<string>
   */
  public function stickyAttributes(): array
  {
    return array_merge(parent::stickyAttributes(), [
        'namespace',
        'outputPath'
    ]);
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
        'controllers/AdminController.php',
        'controllers/IndexController.php',
        'views/index/index.php',
        'views/admin/index.php',
    ];
  }

  /**
   * @inheritdoc
   * @return Array<CodeFile>
   */
  public function generate(): array
  {
    $files = [];

    $files[] = new CodeFile($this->getOutputPath('config.php'), $this->render('config.php'));

    $files[] = new CodeFile($this->getOutputPath('module.json'), $this->render('module.json.php'));

    $files[] = new CodeFile($this->getOutputPath('Module.php'), $this->render('Module.php'));

    $files[] = new CodeFile($this->getOutputPath('Events.php'), $this->render('Events.php'));

    $files[] = new CodeFile($this->getOutputPath('controllers/AdminController.php'), $this->render('controllers/AdminController.php'));

    $files[] = new CodeFile($this->getOutputPath('controllers/IndexController.php'), $this->render('controllers/IndexController.php'));

    $files[] = new CodeFile($this->getOutputPath('views/admin/index.php'), $this->render('views/admin/index.php'));

    $files[] = new CodeFile($this->getOutputPath('views/index/index.php'), $this->render('views/index/index.php'));

    $files[] = new CodeFile($this->getOutputPath('views/layouts/default.php'), $this->render('views/layouts/default.php'));

    $files[] = new CodeFile($this->getOutputPath('assets/Assets.php'), $this->render('assets/Assets.php'));

    $files[] = new CodeFile($this->getOutputPath("resources/js/$this->moduleID.js"), $this->render('resources/js/demo.js.php'));

    return $files;
  }

  /**
   * @param string $file
   * @return boolean the directory that contains the module class
   */
  public function getOutputPath(string $file = ''): bool
  {
    return Yii::getAlias("$this->outputPath/$this->moduleID/$file");
  }

  /**
   * @param string  $text
   * @param bool    $view
   * @param ?string $paramsStr
   * @return string
   */
  public function translate(string $text, bool $view = false, string $paramsStr = null): string
  {
    $idParts = array_map(function ($i) {
      return ucfirst($i);
    }, preg_split('![_-]!', $this->moduleID));
    $idParts = implode('', $idParts);
    $paramsStr = (($paramsStr) ? ", $paramsStr" : '');

    $result = "Yii::t('{$idParts}Module.base', '$text'$paramsStr)";

    if ($view) {
      return "<?= $result ?>";
    } else {
      return $result;
    }
  }

  /**
   * @param ?string $suffix
   * @return string the controller namespace of the module.
   */
  public function getClassNamespace(string $suffix = null): string
  {
    $namespace = $this->namespace . str_replace('-', self::NS_DASH_REPLACEMENT, $this->moduleID);
    return ($suffix) ? "$namespace\\$suffix" : $namespace;
  }

  /**
   * @return bool
   */
  public function isContentContainerModule(): bool
  {
    return $this->isSpaceModule || $this->isUserModule;
  }

  /** @return ModuleClassHelper */
  public function getModuleClass(): ModuleClassHelper
  {
    return $this->moduleClass;
  }
}