<?php

namespace fhnw\tests\unit\behaviors;

use Codeception\Test\Unit;
use fhnw\gii\behaviors\GameNameBehavior;

class GameNameBehaviorTest extends Unit
{

  function testGameName()
  {
    $b = new GameNameBehavior();
    $b->moduleID = 'flappy-bird';

    $this->assertEquals('FlappyBird', $b->getGameName());

  }

}
