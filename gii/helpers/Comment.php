<?php
/**
 *
 */

namespace fhnw\gii\helpers;

class Comment
{
  /**
   * @param string      $className
   * @param string|null $package
   *
   * @return string
   * @static
   */
  public static function classDoc(string $className, string $package = null): string
  {
    $comment = <<<EOD
  /**
   * The class $className
  EOD;
    if ($package) {
      $comment .= <<<EOD
     *
     * @package $package";
    EOD;
    }
    $comment .= ' */';
    return $comment;
  }
}