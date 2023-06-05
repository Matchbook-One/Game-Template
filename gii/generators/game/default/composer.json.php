<?php
declare(strict_types=1);
use fhnw\gii\generators\game\GameModuleGenerator;
use yii\helpers\Html;
/** @var GameModuleGenerator $generator */
?>
{
  "name": "<?= $generator->getModuleID() ?>",
  "description": "<?= $generator->getGameName() ?>",
  "type": "library",
  "config": {
    "platform": { "php": "8.1" }
  },
  "repositories": [{
      "type": "composer",
      "url": "https://asset-packagist.org"
    }],
  "minimum-stability": "stable",
  "require-dev": {},
  "autoload": {
    "psr-4": {
      "<?= str_replace('\\', '\\\\', $generator->getNamespace()) ?>": "."
    }
  },
  "autoload-dev": { "psr-4": {} }
}
