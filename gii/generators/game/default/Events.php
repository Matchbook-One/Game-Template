<?php
declare(strict_types=1);

use fhnw\gii\generators\game\GameModuleGenerator;
use fhnw\gii\helpers\Comment;

/* @var GameModuleGenerator$generator  */

echo "<?php\n\n";
echo Comment::fileComment($generator->getGameName());
?>

namespace <?= $generator->getNamespace() ?>;

use Yii;
use yii\base\Event;
use yii\helpers\Url;

class Events
{
  /**
  * Defines what to do if admin menu is initialized.
  *
  * @param Event $event
  *
  * @return void
  */
  public static function onAdminMenuInit(Event $event): void
  {
    $config = [
      'label'     => '<?= $generator->getGameName() ?>',
      'url'       => Url::to(['/<?= $generator->getModuleID() ?>/admin']),
      'group'     => 'manage',
      'icon'      => '<i class="fa <?= $generator->icon ?>"></i>',
      'sortOrder' => 99999,
      'isActive'  => (Yii::$app->controller->module &&
                      Yii::$app->controller->module->id === '<?= $generator->getModuleID() ?>' &&
                      Yii::$app->controller->id === 'admin')
    ];
    $event->sender->addItem($config);
  }

  /**
   * Defines what to do when the top menu is initialized.
   *
   * @param Event $event
   *
   * @return void
   */
  public static function onTopMenuInit($event): void
  {
    $config = [
      'label'     => '<?= $generator->getGameName() ?>',
      'icon'      => '<i class="fa <?= $generator->icon ?>"></i>',
      'url'       => Url::to(['/<?= $generator->getModuleID() ?>/index']),
      'sortOrder' => 99999,
      'isActive'  => (Yii::$app->controller->module &&
                      Yii::$app->controller->module->id === '<?= $generator->getModuleID() ?>' &&
                      Yii::$app->controller->id === 'index')
    ];
    $event->sender->addItem($config);
  }
}
