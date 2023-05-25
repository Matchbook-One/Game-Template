<?php
declare(strict_types=1);

namespace fhnw\gii\helpers;

/**
 *
 */
class Comment
{
  /**
   * @param string $classname
   * @param string $package
   * @param $other
   *
   * @return string
   * @static
   */
  public static function classComment(string $classname, string $package, $other): string
  {
    return <<<DOC
/**
 * The Class $classname
 * @package $package
 */
DOC;
  }

  /**
   * @param string $package
   *
   * @return string
   * @static
   */
  public static function fileComment(string $package): string
  {
    return <<<DOC
/**
 * @package $package
 */
DOC;
  }
}
