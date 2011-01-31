<?php use_helper('Date'); ?>
<?php include_partial('menu', array('actions' => $actions, 'logFiles' => $logFiles)); ?>

<div id="svn_content">
  <h2>Welcome!</h2>

  <table width="100%" cellpadding="2" cellspacing="0">
  	<tr class="row_0">
  		<td valign="top" ><b>Working Directory:</b></td>
  		<td valign="top"  colspan="2"><?php echo $workingDirectory; ?></td>
  	</tr>
  	<tr class="row_1">
  	  <td valign="top" rowspan="2"><b>SVN info:</b></td>
  	  <td valign="top" ><b>Revision:</b></td>
  	  <td valign="top" ><?php echo $info['Revision'];?></td>
  	</tr>
  	<tr class="row_0">
  	  <td valign="top" >Schedule:</td>
      <td valign="top" ><?php echo $info['Schedule'];?></td>
    </tr>
    <tr class="row_1">
      <td valign="top" rowspan="4"><b>Last Changed:</b></td>
      <td valign="top" ><b>Revision:</b></td>
      <td valign="top" ><?php echo $info['Last Changed Revision'];?></td>
    </tr>
    <tr class="row_0">
      <td valign="top" >Author:</td>
      <td valign="top" ><?php echo $info['Last Changed Author'];?></td>
    </tr>
    <tr class="row_1">
      <td valign="top" >Date:</td>
      <td valign="top" ><?php echo date("Y-m-d H:i:s", $info['Date']);?></td>
    </tr>
    <tr class="row_0">
      <td valign="top" >Age:</td>
      <td valign="top" ><?php echo distance_of_time_in_words($info['Date']);?></td>
    </tr>
  </table>
</div>