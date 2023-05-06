<?php

use Codeception\Test\Unit;
use function fhnw\gamecenter\gii\helpers\classDoc;

class CommentTest extends Unit
{

  /** @var UnitTester */
  public UnitTester $tester;

  function testClassDoc(): void
  {
    $actual = classDoc('CLASS');
    $expected = <<<D
    /**
     * The clas CLASS
     */
    D;
    verify($actual)->equals($expected);

  }
}
