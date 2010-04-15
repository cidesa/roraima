function Mostrar_Negacion()
{
  $('negacion').show();
  $('mostrar').hide();
  $('ocultar').show();
  $('fcsollic_licnegada').value='I';
}

function Ocultar_Negacion()
{
  $('negacion').hide();
  $('ocultar').hide();
  $('mostrar').show();
  $('fcsollic_licnegada').value='';
}

function Mostrar_orden_preimpresa()
{
      f=0;
      i=0;
      var primer_art=$("ax_0_2").value;
      while (f < $('numero_filas_orden').value)
      {
        var campo="ax_"+f+"_2";
        if(!$(campo))
        {
                i=f-1;
                var campo2="ax_"+i+"_2";
                var ultimo_art=$(campo2).value;
            break;
        }
            f++;
      }
      if(confirm("¿Desea imprimir la orden Pre-Impresa?"))
      {
            var ordcomdes=$('caordcom_ordcom').value;
            var ordcomhas=$('caordcom_ordcom').value;
            var codprodes='<?php echo $caordcom->getCodpro()?>';
            var codprohas='<?php echo $caordcom->getCodpro()?>';
            var codartdes=primer_art;
            var codarthas=ultimo_art;
            var fecorddes=$('caordcom_fecord').value;
            var fecordhas=$('caordcom_fecord').value;
            var status='Activas';
            var tipcom=$('caordcom_doccom').value;
        //$this->despacho=str_replace('*',' ',$_GET["despacho"]);
        var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
          pagina=ruta+"/reportes/reportes/compras/r.php=?r=<?php echo $caordcom->getReptipcom(); ?>&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&codartdes="+codartdes+"&codarthas="+codarthas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
          window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
      }
}

 function validargridAct(e,id)
 {
   if ($(id).value!="")
   {
		if (actividad_repetida(id))
		{
			alert_('La Actividad esta repetida');
		}
		else
		{
       ajaxactividad(e,id)
	}
   }
 }

  function actividad_repetida(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var actividad=$(id).value;

   var actividadrepetida=false;
   var am=obtener_filas_grid('ax',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";
    if($(codigo))
    {
	    var actividad2=$(codigo).value;

	    if (i!=fila)
	    {
	      if (actividad==actividad2)
	      {
	        actividadrepetida=true;
	        break;
	      }
	    }
    }
   i++;
   }
   return actividadrepetida;
 }

 function ajaxactividad(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var colexo1=col+3;
   var colexo2=col+4;
   var descripcion=name+"_"+fil+"_"+coldes;
   var exonerable=name+"_"+fil+"_"+colexo1;
   var exonerada=name+"_"+fil+"_"+colexo2;
   var cod=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
    if ($(id).value!="")
    {
     new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&cajtexmos='+descripcion+'&cajtexcom='+id+'&exo='+exonerable+'&exonerada='+exonerada+'&codigo='+cod})
    }
   }
 }



 function exonerado(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var porexo=name+"_"+fil+"_"+6;

 	if ($F(id)=="S")
 	{
		$(porexo).disabled=false;

 	}else{
 		$(porexo).disabled=true;
 	}
 }

