<?php

use fhnw\gii\generators\game\GameModuleGenerator;
use fhnw\gii\helpers\Comment;

/** @var GameModuleGenerator $generator */


echo "<?php\n\n";
echo Comment::fileComment($generator->getGameName());

?>

namespace <?= $generator->getClassNamespace() ?>;

use fhnw\modules\gamecenter\components\GameModule;
use humhub\modules\content\components\ContentContainerActiveRecord;
use humhub\modules\user\models\User;
use Yii;
use yii\helpers\Url;

/**
 * @property-read string[] $contentContainerTypes
 * @property-read string   $configUrl
 */
class <?= $generator->getModuleName() ?> extends GameModule
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
   * @return array
   */
  public function getAchievementConfig(): array
  {
    throw new \Exception('not implemented')
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
   * @param ContentContainerActiveRecord $container unused
   *
   * @return string
   */
  public function getContentContainerDescription(ContentContainerActiveRecord $container): string
  {
    return <?= $generator->getModuleName() ?>::t('base', 'description');
  }

  /**
  * @inheritdoc
   *
   * @param ContentContainerActiveRecord $container unused
   *
   * @return string
   * @noinspection PhpMissingParentCallCommonInspection
   */
  public function getContentContainerName(ContentContainerActiveRecord $container): string
  {
    return <?= $generator->getModuleName() ?>::t('base', 'name');
  }

  /**
   * @inheritdoc
   * @return string[] valid content container classes
   * @noinspection PhpMissingParentCallCommonInspection
   */
  public function getContentContainerTypes(): array
  {
    return [User::class];
  }

  /**
   * @inheritdoc
   * @return GameConfig
   */
  public function getGameConfig()
  {
    return [
      'title'       => '<?= $generator->getModuleName() ?>',
      'description' => 'The Game <?= $generator->getModuleName() ?>'
    ];
  }

  /**
   * @return void
   */
  private function registerTranslations(): void
  {
    Yii::$app->i18n->translations['<?= $generator->getID() ?>*'] = [
      'class'          => 'yii\i18n\PhpMessageSource',
      'sourceLanguage' => 'en',
      'basePath'       => '<?= $generator->getAlias('messages') ?>'
    ];
  }
}
