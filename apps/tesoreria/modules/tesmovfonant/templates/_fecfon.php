  <?php $value = object_input_date_tag($tsfonant, 'getFecfon', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsfonant[fecfon]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'tesmovfonant/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('tsfonant_fecfon').value != '' && $('id').value == ''",
        'with' => "'ajax=2&numcue='+$('tsfonant_numcue').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

<script language="JavaScript" type="text/javascript">
  var ids='<?php echo $tsfonant->getId();?>';
  if (ids!="")
  {
  	$('trigger_tsfonant_fecfon').hide();
  	$('tsfonant_fecfon').readOnly=true;
  	$('tsfonant_reffon').readOnly=true;
  }
</script>
