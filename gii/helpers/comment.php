<?php

namespace fhnw\gamecenter\gii\helpers;

function classDoc(string $className, string $package = null): string
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