<?php if($giproanu->getId()!='' && $giproanu->getEstprog()!='C') {?>	
<ul  class="sf_admin_actions" >
	
<?php echo submit_to_remote('btnCerrar', 'Cerrar Programacion', array(
			   'url'      => 'gindproanu/ajax',
			   'script'   => true,
			   'condition'=> "  confirm('¿Seguro Desea Cerrar la Programacion?')",
			   'complete' => 'AjaxJSON(request, json), CambiarPropiedades()',
			   'with'     => "'ajax=2&indicador='+$('giproanu_numindg').value+'&ano='+$('giproanu_anoindg').value+'&revision='+$('giproanu_revanoindg').value",
));

 ?>
</ul>
<?php }?>
<script>
	function CambiarPropiedades()
	{
	   var 	tfil = obtener_filas_grid('c',1);	   
	   var i=0;
	   var c=parseInt(tfil)-1;
	   while(i<c)
	   {	   	
		$('cx_'+i+'_2').readOnly=true;
		$('cx_'+i+'_4').value='C';			   				   	
		i++;
	   }
	   alert('Se ha cerrado la Programacion para el Año: '+$('giproanu_anoindg').value+' Revision: '+$('giproanu_revanoindg').value);
	}
	
</script>