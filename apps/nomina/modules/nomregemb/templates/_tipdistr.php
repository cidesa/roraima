<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="divtipdis">   
  <?php $valmon=$params['dis_valmon'];?>
  <?php $valpor=$params['dis_valpor'];?>
  <?php echo __('Monto Fijo')?>
  <?php echo radiobutton_tag('npmaeemb[tipdis]','M',$valmon,array(
    'id' => 'npmaeemb_tipdis_mon',	
	'onclick' => "validarmontoporcentaje();"
  )); ?>
  
  <?php echo __('Valor Porcentual')?>
  <?php echo radiobutton_tag('npmaeemb[tipdis]','P',$valpor,array(
    'id' => 'npmaeemb_tipdis_por',
  )); ?>      


</div>
<script language="JavaScript">
	function validarmontoporcentaje()
	{
		if($('npmaeemb_tipdis_mon').checked)
		{
			if($('npmaeemb_tipcal_por').checked==true)
			{
				alert('Si el tipo de Distribucion es Monto Fijo, el Tipo de Calculo no puede ser Porcentual');
				$('npmaeemb_tipdis_mon').checked=false;
			}	
			
		}
	}
</script>