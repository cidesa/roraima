<?php include_partial('menu', array('actions' => $actions, 'logFiles' => $logFiles)); ?>

<div id="svn_content">

	<h2>Status</h2>
	
	<?php include_partial('filesTable', array('tableElements' => $files)); ?>
	
</div>
