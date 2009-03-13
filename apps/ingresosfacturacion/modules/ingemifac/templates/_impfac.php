<input type="button" name="Submit" value="Forma Pre-Impresa" onclick="javascript:Mostrar_factura_preimpresa();" />


<script type="text/javascript">

function Mostrar_factura_preimpresa()
  {

	     if(confirm("¿Desea imprimir la factura?"))
	     {
	   	      var fecdes=$('infactura_fecemi').value;
	   	      var fechas=$('infactura_fecemi').value;

			  //alert(coddes);
	   	      var numfacdes=$('infactura_numfac').value;
	   	      var numfachas=$('infactura_numfac').value;

	   	      //var tiporddes=$('opordpag_tipcau').value;
	   	      //var tipordhas=$('opordpag_tipcau').value;

	   	      //var codartdes=primer_art;
	   	      //var codarthas=ultimo_art;

	   	      //var fecorddes=$('opordpag_fecemi').value;
	   	      //var fecordhas=$('opordpag_fecemi').value;


			   var  ruta='http://'+'<? echo $this->getContext()->getRequest()->getHost();?>';
		       pagina=ruta+"/reportes/reportes/ingresos/r.php=?r=ingfactura.php&fecdes="+fecdes+"&fechas="+fechas+"&numfacdes="+numfacdes+"&numfachas="+numfachas;
		       //pagina=ruta+"/reportes/reportes/tesoreria/roprordpre.php?ordpagdes="+ordpagdes+"&ordpaghas="+ordpaghas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&tiporddes="+tiporddes+"&tipordhas="+tipordhas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&status="+status;
		       window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
		  }
  }
 </script>