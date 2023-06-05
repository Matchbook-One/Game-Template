<?php
declare(strict_types=1);
/**
 * @author Christian Seiler <christian@christianseiler.ch>
 */

namespace fhnw\gii\generators\game;

use fhnw\gii\components\ModuleGenerator;
use yii\gii\CodeFile;
use yii\helpers\ArrayHelper;

/**
 *
 * @package GameGenerator
 *
 * @property-read string $name        The name of the generator.
 * @property-read string $description The detailed description of the generator.
 * @property string $outputPath
 * @property string $namespace
 * @property string $moduleID
 * @method getID(): string
 * @method getModuleID(): string
 * @method getNamespace(?string $suffix = null): string
 * @method getAlias(?string $folder = null): string
 */
class GameModuleGenerator extends ModuleGenerator
{
  public string $icon = 'fa-gamepad';

  /**
   * @inheritdoc
   */
  public function init(): void
  {
    parent::init();
    $this->namespace = 'fhnw\\modules\\games\\';
  }

  /**
   * @inheritDoc
   * @return array<string,string>
   */
  public function attributeLabels(): array
  {
    $labels = [
      'icon' => 'Icon'
    ];

    return ArrayHelper::merge(parent::attributeLabels(), $labels);
  }

  /**
   * @inheritdoc
   * @return array<CodeFile>
   */
  public function generate(): array
  {
    return [
      new CodeFile($this->getOutputPath('config.php'), $this->render('config.php')),
      new CodeFile($this->getOutputPath('module.json'), $this->render('module.json.php')),
      new CodeFile($this->getOutputPath($this->getModuleName() . '.php'), $this->render('Module.php')),
      new CodeFile($this->getOutputPath('Events.php'), $this->render('Events.php')),
      new CodeFile($this->getOutputPath('controllers/AdminController.php'), $this->render('controllers/AdminController.php')),
      new CodeFile($this->getOutputPath('controllers/IndexController.php'), $this->render('controllers/IndexController.php')),
      new CodeFile($this->getOutputPath('views/admin/index.php'), $this->render('views/admin/index.php')),
      new CodeFile($this->getOutputPath('views/index/index.php'), $this->render('views/index/index.php')),
      // new CodeFile($this->getOutputPath('views/layouts/default.php'), $this->render('views/layouts/default.php')),
      new CodeFile($this->getOutputPath('assets/' . $this->getGameName() . 'Assets.php'), $this->render('assets/Assets.php')),
      new CodeFile($this->getOutputPath("resources/js/{$this->getID()}.ts"), $this->render('resources/js/game.ts.php')),
      new CodeFile($this->getOutputPath('resources/js/humhub.d.ts'), $this->render('resources/js/humhub.d.ts.php')),
      new CodeFile($this->getOutputPath("resources/css/{$this->getID()}.scss"), $this->render('resources/css/game.scss')),
      new CodeFile($this->getOutputPath('package.json'), $this->render('package.json.php')),
      new CodeFile($this->getOutputPath('translate.json'), $this->render('translate.php')),
      new CodeFile($this->getOutputPath('eslint.config.js'), $this->render('eslint.config.js'))
    ];
  }

  /**
   * @return string
   * @noinspection PhpMissingParentCallCommonInspection
   */
  public function getDescription(): string { return 'This generator helps you to generate the skeleton code needed by a HumHub Game module.'; }

  /**
   * @return string
   */
  public function getGameName(): string
  {
    return join('', array_map('ucfirst', explode('-', $this->getModuleID())));
  }

  /**
   * @return string
   */
  public function getModuleName(): string { return "{$this->getGameName()}Module"; }

  /** @return string */
  public function getName(): string { return 'Game Module Generator'; }

  /**
   * {@inheritdoc}
   * @return array<string,string>
   */
  public function hints(): array
  {
    $hints = [];

    return ArrayHelper::merge(parent::hints(), $hints);
  }

  /**
   * @inheritdoc
   * @return Array<string>
   */
  public function requiredTemplates(): array
  {
    $templates = [
      'config.php',
      'module.json.php',
      'Module.php',
      'Events.php',
      'controllers/IndexController.php',
      'views/index/index.php'
    ];

    return ArrayHelper::merge(parent::requiredTemplates(), $templates);
  }

}
