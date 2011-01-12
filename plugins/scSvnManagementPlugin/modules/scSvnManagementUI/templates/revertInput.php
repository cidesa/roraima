<?php include_partial('menu', array('actions' => $actions, 'logFiles' => $logFiles)); ?>

<div id="svn_content">

<h2>Revert</h2>
  <?php if(count($files) > 0): ?>
    <?php echo form_tag('scSvnManagementUI/revert'); ?>
    
    <?php include_partial('filesTable', array('tableElements' => $files, 'check' => 'Revert')); ?>
      <p>
	      Do you realy wan't to revert the selected files??
	      <?php echo submit_tag('Yes')?>
	      <?php echo submit_tag('No')?>
	    </p>
    <?php echo '</form>'; ?>
  <?php else: ?>
    <p>Nothing to revert!</p>
  <?php endif; ?>
</div>