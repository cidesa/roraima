<?php include_partial('menu', array('actions' => $actions, 'logFiles' => $logFiles)); ?>

<div id="svn_content">

<h2>Revert - Done</h2>
  <?php if(count($files) > 0): ?>
    <?php include_partial('filesTable', array('tableElements' => $files)); ?>
  <?php else: ?>
    <p>Nothing to do!</p>
  <?php endif; ?>
</div>