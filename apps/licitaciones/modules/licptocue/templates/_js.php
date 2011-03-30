<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  if($('liptocue_id').value=='')
    $('liptocue_codempadm').focus();
  else
    $('liptocue_numemo').readOnly=true;

  $('liptocue_desnumemo').setAttribute('style','border:none');

  if($('liptocue_tipcom').value!='NACIONAL')
      $('divmonpreext').show();
  else
      $('divmonpreext').hide();
  
  function Correl(id)
  {
      if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0);
  }
</script>