function mostrarperiodos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codpro=name+"_"+fil+"_1";
    var colcant=name+"_"+fil+"_3";
    var cadper=name+"_"+fil+"_10";

    var codmet=$('fordefmet_codmet').value;
    var cadena=$(cadper).value;
    var producto=$(codpro).value;

    if (producto!='')
    {
       new Ajax.Updater('divgridper', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&producto='+producto+'&cadena='+cadena+'&colmon='+colcant+'&filper='+fil+'&meta='+codmet});
    }else{
        alert('Debe Introducir la Unidad de Medida');
    }
}

function ocultarPeriodos()
{
  var l=0;
  var acumu=0;
  var cadena='';
  while (l<12)
  {
    var per="bx_"+l+"_1";
    var canper="bx_"+l+"_2";

    var num1=toFloat(canper);

    cadena=cadena + $(per).value+'_' + $(canper).value + '!';

    acumu=acumu + num1;
    l++;
  }

  var canpro="ax_"+$('fordefmet_filper').value+"_3";
  var cadper="ax_"+$('fordefmet_filper').value+"_10";

  $(canpro).value=format(acumu.toFixed(2),'.',',','.');
  $(cadper).value=cadena;

   $('divgridper').hide();
   $('divgridpro').show();
}

function verificarrepetido(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes= col + 1;
   var descripcion=name+"_"+fila+"_"+coldes;

   if (codpro_repetido(id))
   {
      alert_('El C&oacute;digo del Unidad de Medida se encuentra repetido');
      $(id).value="";
      $(descripcion).value="";
      $(id).focus();
   }

}

 function codpro_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var codpro=$(id).value;

   var codprorepetido=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var codpro2=$(codigo).value;

    if (i!=fila)
    {
      if (codpro==codpro2)
      {
        codprorepetido=true;
        break;
      }
    }
   i++;
   }
   return codprorepetido;
 }

 function validarrepetido(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes= col + 1;
   var descripcion=name+"_"+fila+"_"+coldes;

   if (codunieje_repetida(id))
   {
      alert_('La Unidad Ejecutora est&aacute; Repetida');
      $(id).value="";
      $(descripcion).value="";
      $(id).focus();
   }

}

 function codunieje_repetida(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var codunieje=$(id).value;

   var coduniejerepetido=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var codunieje2=$(codigo).value;

    if (i!=fila)
    {
      if (codunieje==codunieje2)
      {
        coduniejerepetido=true;
        break;
      }
    }
   i++;
   }
   return coduniejerepetido;
 }

 function validarmetarepetida(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes= col + 1;
   var descripcion=name+"_"+fila+"_"+coldes;

   if (codmeta_repetida(id))
   {
      alert_('La Acci&oacute;n est&aacute; Repetida');
      $(id).value="";
      $(descripcion).value="";
      $(id).focus();
   }

}

 function codmeta_repetida(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var codmeta=$(id).value;

   var codmetarepetido=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var codmeta2=$(codigo).value;

    if (i!=fila)
    {
      if (codmeta==codmeta2)
      {
        codmetarepetido=true;
        break;
      }
    }
   i++;
   }
   return codmetarepetido;
 }

  function validaractividadrepetida(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes= col + 1;
   var descripcion=name+"_"+fila+"_"+coldes;

   if (actividad_repetida(id))
   {
      alert_('La Meta est&aacute; Repetida');
      $(id).value="";
      $(descripcion).value="";
      $(id).focus();
   }

}

 function actividad_repetida(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var actividad=$(id).value;

   var actividadrepetido=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var actividad2=$(codigo).value;

    if (i!=fila)
    {
      if (actividad==actividad2)
      {
        actividadrepetido=true;
        break;
      }
    }
   i++;
   }
   return actividadrepetido;
 }
