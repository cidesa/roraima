<?php use_helper('Date'); ?>
<?php include_partial('menu', array('actions' => $actions, 'logFiles' => $logFiles)); ?>

<div id="svn_content">
  <h2>Configuration Error!</h2>

  <table width="100%" cellpadding="2" cellspacing="0">
    <tr class="row_0">
      <td valign="top" ><b>Working Directory:</b></td>
      <td valign="top"  colspan="2"><?php echo $workingDirectory; ?></td>
    </tr>
    <tr class="row_1">
      <td valign="top" rowspan="2"><b>SVN info:</b></td>
      <td valign="top" ><b>Error:</b></td>
      <td valign="top" ><?php echo $info['Error'];?></td>
    </tr>
    <tr class="row_1">
      <td valign="top" ><b>Config:</b></td>
      <td valign="top" >Please check your configuration in <b>/plugins/scSvnManagerPlugin/config/svn.yml</b></td>
    </tr>
  </table>
</div>