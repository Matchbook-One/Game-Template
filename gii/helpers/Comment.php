<?php
/**
 *
 */

namespace fhnw\gii\helpers;

class Comment
{
  public static function fileComment(string $package): string
  {
    return "/**\n * @package $package\n */";
  }
}