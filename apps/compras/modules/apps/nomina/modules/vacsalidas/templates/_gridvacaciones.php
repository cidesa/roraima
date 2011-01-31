<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>

<div id='divgridvaca'>
<?php
echo grid_tag_v2($npvacsalidas->getObjvac()); ?>
</div>
<script language="JavaScript">
	var tot = obtener_filas_grid('a',1);
	for(i=0;i<tot;i++)
	{
		if($('ax_'+i+'_8').value==$('ax_'+i+'_9').value)
		{
			$('ax_'+i+'_10').checked=true;
			$('ax_'+i+'_10').disable();
		}
	}

</script>

