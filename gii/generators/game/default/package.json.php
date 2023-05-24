<?php
use fhnw\gii\generators\game\GameModuleGenerator;

/** @var $generator GameModuleGenerator */

?>
{
  "name": "<?= $generator->getModuleID() ?>",
  "version": "1.0.0",
  "scripts": {
    'scss': 'scss resources/scss:resources/css',
    "lint": "eslint"
  },
  "type": "module",
  "devDependencies": {
    "@eslint/js": "^8.38.0",
    "@types/eslint": "^8.37.0",
    "@types/jquery": "^3.5.16",
    "@types/web": "^0.0.99",
    "eslint": "^8.38.0",
    "sass": "^1.59.2"
  }
}
