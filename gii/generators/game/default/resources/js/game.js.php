<?php
/** @noinspection JSNonStrictModeUsed */
use fhnw\gii\generators\game\ModuleGenerator;

/* @var $generator ModuleGenerator */

?>
/** @namespace humhub */
humhub.module('<?= $generator->moduleID ?>', (module, req, $) => {

  const event = req('event');
  const gamecenter = req('gamecenter');

  /** @returns {void} */
  function init() {
    console.log('<?= $generator->moduleID ?> module activated')
  }

  /**
   * @param {number} score
   * @param {number} player
   */
  function submitScore(score, player) {
    const data = {id: module.id, score, player};

    gamecenter.submitScore({data})
              .then((res) => {
                // Do something with the result
              })
              .catch(function (e) {
                // Do something with the the error
                module.log.error(e, undefined, true)
              })
  }

  module.export({init})
});
