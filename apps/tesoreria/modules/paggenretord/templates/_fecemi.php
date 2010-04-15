  <?php $value = object_input_date_tag($opordpag, 'getFecemi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecemi]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10
)); echo $value ? $value : '&nbsp;' ?>

<script language="JavaScript" type="text/javascript">
  var ids='<?php echo $opordpag->getId();?>';
  if (ids!="")
  {
  	$('trigger_opordpag_fecemi').hide();
  	$('opordpag_fecemi').readOnly=true;
  }
</script>
