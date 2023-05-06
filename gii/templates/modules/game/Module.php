<?php
/**
 * @package {{GAME}}
 * @author  0o <{{EMAIL}}>
 */

namespace {{NAMESPACE}};

use fhnw\modules\gamecenter\components\GameModule;
use humhub\modules\content\components\ContentContainerActiveRecord;
use humhub\modules\user\models\User;
use Yii;
use yii\helpers\Url;

/**
 * @property-read string[] $contentContainerTypes
 * @property-read string   $configUrl
 * @phpstan-import-type GameConfig from GameModule
 * @phpstan-import-type AchievementConfig from GameModule
 */
class {{GAME}}Module extends GameModule
{
  /**
   * @phpstan-return AchievementConfig[]
   * @return array
   */
  public function getAchievementConfig(): array
  {
    return [
      // TODO: ['name' => 'first-game', 'title' => 'Win your first game', 'description' => 'Win your first game']
    ];
  }

  /**
   * @inheritdoc
   * @return string the url
   * @noinspection PhpMissingParentCallCommonInspection
   */
  public function getConfigUrl(): string
  {
    return Url::to(['/{{GAME}}/admin']);
  }

  /**
   * @inheritdoc
   *
   * @param ContentContainerActiveRecord $container unused
   *
   * @return string
   * @noinspection PhpMissingParentCallCommonInspection
   */
  public function getContentContainerDescription(ContentContainerActiveRecord $container): string
  {
    return Yii::t('{{GAME}}Module.base', 'description');
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
    return Yii::t('{{GAME}}Module.base', 'name');
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
      'title'       => '{{GAME}}',
      'description' => 'The Game {{GAME}}'
    ];
  }
}
