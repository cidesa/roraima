<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php $value = get_partial('gridfac', array('type' => 'edit', 'opordpag' => $opordpag,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>

<script language="JavaScript" type="text/javascript">
	$('divgridfac').show();
	//$('botonfac').hide();
	var totalfac="bx"+"_0_9";
   	$(totalfac).value=$('opordpag_totmoncau').value;
   	//actualizarsaldos_b();
   	var am=obtener_filas_grid('e','1');
    var cm=obtener_filas_grid('b','2');
   	var bm=parseInt($('opordpag_filasconsret').value);
    if (($('opordpag_incmod').value=="I" && am==0 && cm==0) || ($('opordpag_incmod').value!='I' && bm==0 && cm==0))
    {
      var l=0;
      while(l<1)
      {
      	var basimp="bx_"+l+"_11";
      	var monret="bx_"+l+"_12";
      	var moniva="bx_"+l+"_13";
      	var unomil="bx_"+l+"_14";
      	var basltf="bx_"+l+"_15";
      	var porltf="bx_"+l+"_16";
      	var monltf="bx_"+l+"_17";
      	var islr="bx_"+l+"_18";
      	var basislr="bx_"+l+"_19";
      	var monislr="bx_"+l+"_21";

      	$(basimp).readOnly=false;
      	$(monret).readOnly=false;
      	$(moniva).readOnly=false;
      	$(unomil).disabled=true;
      	$(basltf).readOnly=false;
      	$(porltf).readOnly=false;
      	$(monltf).readOnly=false;
      	$(islr).disabled=true;
      	$(basislr).readOnly=false;
      	$(monislr).readOnly=false;
      	l++;
      }
    }
</script>