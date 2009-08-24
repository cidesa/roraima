  <?php $value = object_input_date_tag($casolpag, 'getFecsol', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'casolpag[fecsol]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

<script language="JavaScript" type="text/javascript">
  var ids='<?php echo $casolpag->getId();?>';
  if (ids!="")
  {
  	$('trigger_casolpag_fecsol').hide();
  	$('casolpag_fecsol').readOnly=true;
  	$('casolpag_solpag').readOnly=true;
  }
</script>
