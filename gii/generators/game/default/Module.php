<?php

use fhnw\gii\generators\game\ModuleGenerator;

/** @var ModuleGenerator $generator */


echo "<?php\n\n";
?>
namespace <?= $generator->getClassNamespace() . "\n"?>

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
  /**
   * @inheritdoc
   * @return array
   */
  public function getAchievementConfig(): array
  {
    return [
      /* TODO: [
        'name' => 'first-game',
        'title' => 'Win your first game',
        'description' => 'Win your first game'
      ]*/
    ];
  }

  /**
   * @inheritdoc
   * @return string the url
   */
  public function getConfigUrl(): string
  {
    return Url::to(['/<?= $generator->moduleID ?>/admin']);
  }

  /**
   * @inheritdoc
   * @param ContentContainerActiveRecord $container unused
   *
   * @return string
   */
  public function getContentContainerDescription(ContentContainerActiveRecord $container): string
  {
    return Yii::t('<?= $generator->getModuleName() ?>.base', 'description');
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
    return Yii::t('<?= $generator->getModuleName() ?>.base', 'name');
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
}
