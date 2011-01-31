<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>

<div id='divgridtri'>
<?php
echo grid_tag_v2($giproanu->getObjtri()); ?>
  <br>
</div>

<script>
	
	function verificaranorev(t)
	{
		if(t.value!='' && $('id').value=='')
			toAjax(2,getUrlModulo()+'ajax',$(t.id).value,'','&ano='+$('giproanu_anoindg').value+'&rev='+$('giproanu_revanoindg').value+'&indg='+$('giproanu_numindg').value+'');
	}
</script>