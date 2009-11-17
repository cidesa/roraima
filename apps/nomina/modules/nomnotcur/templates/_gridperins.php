<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="divinstructores">   
  
<?php echo grid_tag_v2($rhnotcur->getObj_percur()); ?>	  

</div>
<script language="JavaScript">
	function ValidarNota(t)
	{
		var valnot = $('rhnotcur_notapr').value;
		var nota = t.value;
		var notaid = t.id; 
		var aux = notaid.split('_');
		if(parseInt(nota)>=parseInt(valnot))
		{
			$(aux[0]+'_'+aux[1]+'_'+(parseInt(aux[2])+1)).disabled=false;
			$(aux[0]+'_'+aux[1]+'_'+(parseInt(aux[2])+1)).checked=true;
			$(aux[0]+'_'+aux[1]+'_'+(parseInt(aux[2])+1)).disabled=true;
		}else{
			$(aux[0]+'_'+aux[1]+'_'+(parseInt(aux[2])+1)).disabled=false;
			$(aux[0]+'_'+aux[1]+'_'+(parseInt(aux[2])+1)).checked=false;
			$(aux[0]+'_'+aux[1]+'_'+(parseInt(aux[2])+1)).disabled=true;
		}
	}
</script>