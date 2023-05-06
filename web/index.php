<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

$dir = __DIR__;
require "$dir/../vendor/autoload.php";
require "$dir/../vendor/yiisoft/yii2/Yii.php";
$config = require "$dir/../config/web.php";

(new yii\web\Application($config))->run();
