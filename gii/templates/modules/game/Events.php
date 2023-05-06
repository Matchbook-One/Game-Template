<?php

/**
 * @package {{GAME}}
 * @author  {{USER_NAME}} <{{USER_MAIL}}>
 */

namespace {{NAMESPACE}}

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
      'label'     => '{{GAME}}',
      'url'       => Url::to(['/{{GAME}}/admin']),
      'group'     => 'manage',
      'icon'      => '<i class="fa fa-gamepad"></i>',
      'sortOrder' => 99999,
      'isActive'  => (Yii::$app->controller->module &&
                      Yii::$app->controller->module->id === '{{GAME}}' &&
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
      'label'     => '{{GAME}}',
      'icon'      => '<i class="fa fa-gamepad"></i>',
      'url'       => Url::to(['/{{GAME}}/index']),
      'sortOrder' => 99999,
      'isActive'  => (Yii::$app->controller->module &&
                      Yii::$app->controller->module->id === '{{GAME}}' &&
                      Yii::$app->controller->id === 'index'),
    ];
    $event->sender->addItem($config);
  }
}
