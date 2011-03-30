<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  var val = $('lisolegr_codmon').value;
  val = val.split(' - ');
  val = val[0];
  if(val!='001')
  {
      $('divcodmon').show();
      $('divvalcam').show();
      $('divfeccam').show();
      $('divmonsolext').show();
      $('divmonsolextletras').show();
  }else
  {
      $('divcodmon').hide();
      $('divvalcam').hide();
      $('divfeccam').hide();
      $('divmonsolext').hide();
      $('divmonsolextletras').hide();
  }
  $('lisolegr_codmon').readOnly=true;
  $('lisolegr_valcam').readOnly=true;
  $('lisolegr_feccam').readOnly=true;
  $('lisolegr_nompre').setAttribute('size','100')
  $('lisolegr_desnumpre').setAttribute('style','border:none');
  $('divgrid_rec').hide();
  $('trigger_lisolegr_feccam').hide();
  if($('lisolegr_id').value=='')
    $('lisolegr_codempadm').focus();
  else
    $('lisolegr_numsol').readOnly=true;
  
  function Correl(id)
  {
      if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0);
  }

  function OcultarGrid()
  {
     $('divgrid_rec').hide();
  }

  function MostrarGrid()
  {
      $('divgrid_rec').show();
  }
</script>