  <?php $value = object_input_date_tag($contabc, 'getFeccom', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'contabc[feccom]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",  
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

<script language="JavaScript" type="text/javascript">
  var ids='<?php echo $contabc->getId();?>';
  var bloqfec='<?php echo $contabc->getBloqfec();?>';
  if (ids!="")
  {
  	$('trigger_contabc_feccom').hide();
  	$('contabc_feccom').readOnly=true;
  	$('contabc_numcom').readOnly=true;
  }else {
      if (bloqfec=='S')
      {
        $('trigger_contabc_feccom').hide();
  	$('contabc_feccom').readOnly=true;
      }
  }


</script>
