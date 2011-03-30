<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  if($('limemoran_id').value=='')
    $('limemoran_codempadm').focus();
  else
    $('limemoran_numemo').readOnly=true;

  $('limemoran_desnumpre').setAttribute('style','border:none');

  if($('limemoran_tipcom').value!='NACIONAL')
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