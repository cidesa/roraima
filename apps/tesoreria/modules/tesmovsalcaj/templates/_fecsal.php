  <?php $value = object_input_date_tag($tssalcaj, 'getFecsal', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tssalcaj[fecsal]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'tesmovsalcaj/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('tssalcaj_fecsal').value != '' && $('id').value == ''",
        'with' => "'ajax=2&numcue='+$('tssalcaj_numcue').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

<script language="JavaScript" type="text/javascript">
  var ids='<?php echo $tssalcaj->getId();?>';
  if (ids!="")
  {
  	$('trigger_tssalcaj_fecsal').hide();
  	$('tssalcaj_fecsal').readOnly=true;
  	$('tssalcaj_refsal').readOnly=true;
  }
</script>
