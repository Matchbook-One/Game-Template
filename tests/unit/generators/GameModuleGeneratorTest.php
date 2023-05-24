<?php

namespace fhnw\tests\unit\generators;


use Codeception\Test\Unit;
use fhnw\gii\generators\game\GameModuleGenerator;


class GameModuleGeneratorTest extends Unit
{

  public function testBehaviors()
  {
    $gen = new GameModuleGenerator();

    // $gen->moduleID = "Flappy Bird";

    // $this->assertFalse($gen->validate('moduleID'));

  }
}
