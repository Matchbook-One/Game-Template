<?php
declare(strict_types=1);

namespace fhnw\gii\helpers;

use function is_array;
use function join;
use function str_ends_with;

/**
 *
 */
class PhpPreset
{
  private const BACKSLASH = '\\';

  /**
   * @return string
   * @static
   */
  public static function endTag(): string { return "?>\n"; }

  /**
   * @param string|string[] $classes
   *
   * @return string
   * @static
   */
  public static function extends(array | string $classes): string
  {
    if (is_array($classes)) {
      $classes = join(', ', $classes);
    }

    return sprintf(' extends %s', $classes);
  }

  /**
   * @param string $namespace
   *
   * @return string
   * @static
   */
  public static function namespace(string $namespace): string
  {
    return "namespace $namespace;\n";
  }

  /**
   * @return string
   * @static
   */
  public static function startTag(): string { return "<?php\n"; }

  /**
   * @param ?string $namespace
   * @param string $classname
   *
   * @return string
   * @static
   */
  public static function use(?string $namespace, string $classname): string
  {
    if (!$namespace) {
      $namespace = '';
    }
    elseif (!str_ends_with($namespace, self::BACKSLASH)) {
      $namespace .= self::BACKSLASH;
    }

    return sprintf("use %s%s;\n", $namespace, $classname);
  }
}
