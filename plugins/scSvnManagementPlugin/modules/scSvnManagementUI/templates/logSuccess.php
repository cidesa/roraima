<?php include_partial('menu', array('actions' => $actions, 'logFiles' => $logFiles)); ?>

<div id="svn_content">

  <h2>Log File</h2>
  
  <pre class="svn_log_file"><?php echo $logContent; ?></pre>
  
  <?php echo link_to('back to overview', 'scSvnManagementUI/log');?>
</div>