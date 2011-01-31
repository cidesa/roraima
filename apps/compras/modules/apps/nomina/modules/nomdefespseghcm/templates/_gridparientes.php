<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="divgridben">   

<?php $obj_parientes=$params['obj_parientes'];?>
<?php echo grid_tag_v2($obj_parientes); ?>	  

</div>

<script language="JavaScript">
	if($('id').value!='')
	{
		$$('.botoncat')[0].disabled=true;
		$$('.botoncat')[1].disabled=true;
		$$('.botoncat')[2].disabled=true;
		$('npseghcm_codnom').readOnly=true;
		$('npseghcm_codcon').readOnly=true;
		$('npseghcm_codconapo').readOnly=true;
	}	
	function actualizarmontocuota(t)
	{
		var id = t.id;
		var aux = id.split("_");
		var idnext = aux[0]+"_"+aux[1]+"_"+(parseInt(aux[2])+1)
		var idprev = aux[0]+"_"+aux[1]+"_"+(parseInt(aux[2])-1)
		var valprev = $(idprev).value.replace('.','');
		valprev = valprev.replace(',','.');
		var val = $(id).value;
		
        $(idnext).value=number_format(parseFloat(valprev)/parseFloat(val),'2',',','.');
		
	}
</script>
