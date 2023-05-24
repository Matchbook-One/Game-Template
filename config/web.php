<?php

use yii\caching\FileCache;
use yii\debug\Module as DebugModule;
use yii\helpers\StringHelper;
use yii\log\FileTarget;

$gii = require __DIR__ . '/gii.php';

$config = [
  'id'           => 'basic',
  'basePath'     => dirname(__DIR__),
  'extensions'   => require __DIR__ . '/../vendor/yiisoft/extensions.php',
  'defaultRoute' => 'gii',
  'bootstrap'    => ['log', 'gii'],
  'aliases'      => [
    '@bower' => '@vendor/bower-asset',
    '@npm'   => '@vendor/npm-asset',
    '@gii'   => '@app/gii'
  ],
  'components'   => [
    'request'      => ['cookieValidationKey' => '1234'],
    'cache'        => ['class' => FileCache::class],
    'errorHandler' => ['errorAction' => 'site/error'],
    'log'          => [
      'traceLevel' => YII_DEBUG ? 3 : 0,
      'targets'    => [['class' => FileTarget::class, 'levels' => ['error', 'warning']]]
    ],
    'urlManager'   => [
      'enablePrettyUrl' => true,
      'showScriptName'  => false,
      'rules'           => []
    ]
  ],
  'modules'      => ['gii' => $gii]
];

if (YII_ENV_DEV) {
  // configuration adjustments for 'dev' environment
  $config['bootstrap'][] = 'debug';
  $config['modules']['debug'] = [
    'class'      => DebugModule::class,
    'allowedIPs' => ['127.0.0.1', '::1'],
    'traceLine'  => function ($options, $panel) {
      $filePath = $options['file'];
      if (StringHelper::startsWith($filePath, Yii::$app->basePath)) {
        $filePath = dirname(__DIR__, 2) . substr($filePath, strlen(Yii::$app->basePath));
      }

      return strtr('<a href="ide://open?url=file://{file}&line={line}">{text}</a>', ['{file}' => $filePath]);
    }
  ];
}

return $config;
