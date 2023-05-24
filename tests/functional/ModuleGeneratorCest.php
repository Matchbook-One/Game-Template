<?php

namespace fhnw\tests\functional;

use Codeception\Lib\Connector\Yii2;
use fhnw\tests\FunctionalTester;

class ModuleGeneratorCest
{
  public function _before(FunctionalTester $I): void
  {
    $I->amOnRoute('site/contact');
  }

  public function openContactPage(FunctionalTester $I, \Codeception\Module\Yii2 $module): void
  {
    $module->_reconfigure(['responseCleanMethod' => Yii2::CLEAN_RECREATE]);
    $I->see('Contact', 'h1');
  }

}
