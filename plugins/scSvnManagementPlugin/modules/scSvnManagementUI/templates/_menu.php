<?php use_helper('Date'); ?>
<h2 class="svn_headline">SVN Manager Plugin!</h2>

<div id="svn_left_frame">
  <h2>Actions</h2>
  <ul>
  	<?php foreach($actions as $action): ?>
  		<li><?php echo link_to($action['name'], 'scSvnManagementUI/'.$action['action'], array('class' => 'svn_link')); ?></li>
  	<?php endforeach;?>
  </ul>

  <h2>Logs</h2>
  <ul>
    <?php foreach($logFiles as $i => $logFile): if($i > 5) break; ?>
      <li><?php echo link_to(format_date(substr($logFile, 0, -4)), 'scSvnManagementUI/log?id='.$logFile, array('class' => 'svn_link', 'title' => distance_of_time_in_words($logFile, 0, -4).' ago')); ?></li>
    <?php endforeach;?>
    <li><?php echo link_to('... view all', 'scSvnManagementUI/log'); ?></li>
  </ul>
</div>
