<?php use_helper("Date"); ?>
<?php include_partial('menu', array('actions' => $actions, 'logFiles' => $logFiles)); ?>
<?php $i = 0; ?>

<?php echo form_tag('scSvnManagementUI/update', array('method'=>'GET')); ?>
<div id="svn_content">

	<h2>Update - Overview</h2>
	
	<table width="100%" cellpadding="2" cellspacing="0" class="svn_overview">
		<tr class="head">
			<td colspan="2">Revision</td>
			<td>Message</td>
			<td width="100" align="center">Update</td>
		</tr>
		<?php foreach($logs as $log): $i++; ?>
			
			<?php include_partial('RevisionTableRow', array('RevisionInfo' => $log, 
			                                                'workingCopy' => $workingCopy,
			                                                'alternateRow' => $i%2 
			                                          )); ?>
	
		<?php endforeach; ?>
		  <tr class="foot">
		    <td colspan="3" valign="top">
		      Update to Revision nr: 
		      <?php echo input_tag('to', 1, array('style' => 'width: 45px; text-align: right;'));?>
		    </td>
		    <td valign="top" align="center">
		      <?php echo submit_tag('Update');?>
        </td> 
    </tr> 
	</table>
</div>
<?php echo '</form>'; ?>
