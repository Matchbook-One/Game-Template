<?php

use yii\web\Application;
use yii\web\Response;

return [
  'id'         => 'Response Events',
  'basePath'   => __DIR__,
  'bootstrap'  => [
    function (Application $application) {
      $application->response->on(Response::EVENT_BEFORE_SEND, function ($event) use ($application) {
        $application->trigger('responseBeforeSendBootstrap');
      });
    }
  ],
  'components' => [
    'request'  => [
      'cookieValidationKey' => 'secret'
    ],
    'response' => [
      'on beforeSend' => function () {
        Yii::$app->trigger('responseBeforeSendConfig');
      }
    ]
  ]
];
