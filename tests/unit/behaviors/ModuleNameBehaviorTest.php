<?php

namespace tests\unit\behaviors;

use Codeception\Test\Unit;
use fhnw\gii\behaviors\ModuleIDBehavior;
use fhnw\gii\generators\game\GameModuleGenerator;

class ModuleNameBehaviorTest extends Unit
{

  function testGameName()
  {
    $b = new ModuleIDBehavior();
    $b->owner = new GameModuleGenerator();

    $b->setModuleID('Flappy-Bird');
    $this->assertEquals('flappy-bird', $b->getModuleID());

  }

}
