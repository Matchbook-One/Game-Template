<?php

use yii\web\Application;

/**
 * This class only exists here for IDE (PHPStorm/Netbeans/...) autocompletion.
 * This file is never included anywhere.
 * Adjust this file to match classes configured in your application config, to enable IDE autocompletion for custom components.
 * Example: A property phpdoc can be added in `__Application` class as `@property Rollbar | __Rollbar $rollbar` and adding a class in this file
 *
 *  ```php
 * // @property of \vendor\package\Rollbar goes here
 * class __Rollbar {
 * }
 * ```
 */
class Yii
{
  /** @var Application|\yii\console\Application */
  public static \yii\console\Application | Application $app;
}