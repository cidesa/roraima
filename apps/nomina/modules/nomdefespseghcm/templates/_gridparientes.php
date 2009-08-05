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
		$('npseghcm_codnom').readOnly=true;
		$('npseghcm_codcon').readOnly=true;
	}	
</script>
