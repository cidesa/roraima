<?php include_partial('menu', array('actions' => $actions, 'logFiles' => $logFiles)); ?>

<div id="svn_content">

  <h2>Log Files</h2>
  
  <?php echo form_tag('scSvnManagementUI/log'); ?>
  <?php include_partial('filesTable', 
                   array(
                    'tableElements' => $files, 
                    'check' => 'Delete?',
                    'link'  => array('scSvnManagementUI', 'log', 'id')
                   )); ?>          
    <p><?php echo submit_tag('Delete'); ?></p>
  <?php echo '</form>'; ?>
</div>