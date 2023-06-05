<?php
declare(strict_types=1);
use fhnw\gii\generators\game\GameModuleGenerator;

/** @var GameModuleGenerator $generator  */

?>
{
  "name": "<?= $generator->getModuleID() ?>",
  "version": "1.0.0",
  "scripts": {
    "lint": "eslint"
  },
  "type": "module",
  "devDependencies": {
    "@eslint/js": "^8.38.0",
    "@types/eslint": "^8.37.0",
    "@types/jquery": "^3.5.16",
    "@types/web": "^0.0.99",
    "eslint": "^8.38.0"
  }
}
