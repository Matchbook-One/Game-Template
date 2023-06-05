<?php
declare(strict_types=1);
/** @noinspection JSNonStrictModeUsed */
use fhnw\gii\generators\game\GameModuleGenerator;

/* @var GameModuleGenerator$generator  */

?>
/** @namespace humhub */
humhub.module('<?= $generator->getModuleID() ?>', (module, req, $) => {

  const event = req('event');
  const gamecenter: GameCenter = req('gamecenter').shared(module.id);

  function init(): void {
    console.log('<?= $generator->getModuleID() ?> module activated')
  }

  function submitScore(score: number) {

    gamecenter.submitScore(score)
              .then((res) => {
                // Do something with the result
              })
              .catch((e) => {
                // Do something with the error
                module.log.error(e, undefined, true)
              })
  }

  module.export({ init })
});
