<?php
declare(strict_types=1);

use fhnw\gii\generators\game\GameModuleGenerator;
use fhnw\gii\helpers\PhpPreset;

/** @var GameModuleGenerator $generator */

?>

<?= PhpPreset::startTag()?>

<?= PhpPreset::namespace($generator->getNamespace())?>
<?= PhpPreset::use('fhnw\modules\gamecenter\components','GameModule') ?>
<?= PhpPreset::use('fhnw\modules\gamecenter\components','LeaderboardType') ?>
<?= PhpPreset::use('humhub\modules\content\components','ContentContainerActiveRecord') ?>
<?= PhpPreset::use('humhub\modules\user\models','User') ?>
<?= PhpPreset::use(null,'Yii') ?>
<?= PhpPreset::use('yii\helpers','Url') ?>
<?= PhpPreset::use('use yii\i18n','PhpMessageSource') ?>

/**
 * @property-read string $configUrl
 */
class <?= $generator->getModuleName() . PhpPreset::extends('GameModule') ?>
{

  /** @return void */
  public function init(): void
  {
    parent::init();
    $this->registerTranslations();
  }

  /**
   * Translates a message to the specified language.
   *
   * @param string   $category the message category.
   * @param string   $message the message to be translated.
   * @param string[] $params the parameters that will be used to replace the corresponding placeholders in the message.
   * @param ?string  $language the language code (e.g. `en-US`, `en`).
   *
   * @return string the translated message.
   */
  public static function t(string $category, string $message, array $params = [], string $language = null): string
  {
    return Yii::t("<?=$generator->getID() ?>/$category", $message, $params, $language);
  }

  /**
   * @inheritdoc
   * @return array<{name: string, title: string, description: string, secret?: bool, show_progress?: bool}>
   */
  public function getAchievementConfig(): array
  {
    throw new \Exception('not implemented');
      /* return [[
        'name' => 'first-game',
        'title' => 'Win your first game',
        'description' => 'Win your first game'
      ]]*/
  }

  /**
   * @inheritdoc
   * @return string the url
   */
  public function getConfigUrl(): string
  {
    return Url::to(['/<?= $generator->getModuleID() ?>/admin']);
  }

  /**
   * @inheritdoc
   * @return string
   * @noinspection PhpMissingParentCallCommonInspection
   */
  public function getName(): string
  {
    return <?= $generator->getModuleName() ?>::t('base', 'name');
  }

  /**
   * @inheritdoc
   * @return array<{title: string, description: string, tags?: string[]}>
   */
  #[ArrayShape(['title' => 'string', 'description' => 'string', 'tags' => 'string[]'])]
  public function getGameConfig()
  {
    return [
      'title'       => '<?= $generator->getGameName() ?>',
      'description' => 'The Game <?= $generator->getGameName() ?>'
    ];
  }

  /**
   * @return void
   */
  private function registerTranslations(): void
  {
    Yii::$app->i18n->translations['<?= $generator->getID() ?>*'] = [
      'class'          => PhpMessageSource::class,
      'sourceLanguage' => 'en-US',
      'basePath'       => '<?= $generator->getAlias('messages') ?>'
    ];
  }

  /**
   * @return LeaderboardType[]
   */
  public function getGameUrl(): string
  {
    return Url::to(['/<?= $generator->getModuleID() ?>/index']);
  }

  /**
   * @return string
   */
  public function getLeaderboardConfig(): array
  {
    return [];
  }
}
