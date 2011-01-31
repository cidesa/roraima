<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<div id='grid'>
<?
  echo grid_tag_v2($tsdefban->getGripdesmovban());
?>
</div>