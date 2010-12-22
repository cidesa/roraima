<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?
	echo grid_tag_v2($caentalm->getObj());
?>

<script type="text/javascript">
  var id="";
  var id='<?php echo $caentalm->getId()?>';
  actualiza(id);
  if (id=='')
  {
	var manesolcorr='<?php echo $caentalm->getMansolocor(); ?>';
     if (manesolcorr=='S')
     {
        $('caentalm_rcpart').value='########';
     	$('caentalm_rcpart').readOnly=true;
        $('caentalm_codpro').focus();
     }
  }

  var deshab='<?php echo $caentalm->getBloqfec(); ?>';
  if (deshab=='S')
  {
  	$('trigger_caentalm_fecrcp').hide();
  	$('caentalm_fecrcp').readOnly=true;
  }
</script>