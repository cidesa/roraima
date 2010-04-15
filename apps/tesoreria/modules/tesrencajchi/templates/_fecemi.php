  <?php $value = object_input_date_tag($opordpag, 'getFecemi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecemi]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'update' => 'detalle',
        'url'      => 'tesrencajchi/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opordpag_fecemi').value != '' && $('id').value == ''",
        'with' => "'ajax=1&tipcau='+$('opordpag_tipcau').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

<script language="JavaScript" type="text/javascript">
  var ids='<?php echo $opordpag->getId();?>';
  if (ids!="")
  {
  	$('trigger_opordpag_fecemi').hide();
  	$('opordpag_fecemi').readOnly=true;
  	$('opordpag_numord').readOnly=true;
  }
</script>
