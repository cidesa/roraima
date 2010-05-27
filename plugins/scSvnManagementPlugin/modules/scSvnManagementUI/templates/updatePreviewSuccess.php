<?php include_partial('menu', array('actions' => $actions, 'logFiles' => $logFiles)); ?>

<div id="svn_content">

	<h2>Update</h2>
	
	<h3>
	 Revision <?php echo $toRevision['Revision']; ?>:	 
	</h3>
	
	<div class="svn_overview" style="min-height: 80px;">
		<div class="info info_frame">
		 <span>Author:</span> <?php echo $toRevision['Author']; ?><br clear=none>
	   <span>Date:</span> <?php echo date("Y-m-d", $toRevision['Date']); ?><br clear=none>
	   <span>Age:</span> <?php echo distance_of_time_in_words($toRevision['Date']); ?>
	  </div> 
	  <div class="log_message_frame">
      <span class="log_message"><?php echo htmlentities($toRevision['Message']); ?></span>
    </div>
	</div>
	
	<h3>
	   Revision <?php echo $fromRevision['Revision']; ?> 
	   &nbsp;&gt;&gt;&nbsp; Revision <?php echo $toRevision['Revision']; ?>: 
	   [<a href="#update">Update</a>] 
	</h3>
	
	<?php //include_partial('filesTable', array('files' => $diff, 'workingDirectory' => $workingDirectory, 'showUpdate' => false)); ?>
	<?php include_partial('filesTable', array('tableElements' => $files)); ?>
	
	
	<h3><a name="update">Update now?</a></h3>
	<?php echo form_tag('scSvnManagementUI/update') ?>
		<p>
			Do you realy wan't to run this update?
			(Revision <?php echo $fromRevision['Revision']; ?> ---&gt; Revision <?php echo $toRevision['Revision']; ?>)
			<?php echo input_hidden_tag('revision', $toRevision['Revision']); ?>
			<?php echo submit_tag('Yes')?>
			<?php echo submit_tag('No')?>
		</p>
	<?php echo '</form>'; ?>
</div>
