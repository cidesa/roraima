/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function mostrarperiodos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codact=name+"_"+fil+"_1";
    var codart=name+"_"+fil+"_4";
    var cadper=name+"_"+fil+"_17";
    var colmon=name+"_"+fil+"_9";

    var codmet=$('forestcos_codmet').value;
    var codpro=$('forestcos_codpro').value;
    var cadena=$(cadper).value;
    var actividad=$(codact).value;
    var articulo=$(codart).value;

    if (articulo!='')
    {
       new Ajax.Updater('divgridper', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&actividad='+actividad+'&articulo='+articulo+'&cadena='+cadena+'&meta='+codmet+'&colmon='+colmon+'&filper='+fil+'&producto='+codpro});
    }else{
        alert('Debe Introducir el Articulo');
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

  var canart="ax_"+$('forestcos_filper').value+"_9";
  var cadper="ax_"+$('forestcos_filper').value+"_17";
  var monart="ax_"+$('forestcos_filper').value+"_10";
  var totpre="ax_"+$('forestcos_filper').value+"_11";

  var num2=toFloat(monart);
  var cal=acumu*num2;

  $(canart).value=format(acumu.toFixed(2),'.',',','.');
  $(cadper).value=cadena;
  $(totpre).value=format(cal.toFixed(2),'.',',','.');

   $('divgridper').hide();
   $('divgrid').show();
}


function mostrarfinanciamientos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codact=name+"_"+fil+"_1";
    var codart=name+"_"+fil+"_4";
    var cadfin=name+"_"+fil+"_18";
    var colmon=name+"_"+fil+"_9";

    var codmet=$('forestcos_codmet').value;
    var codpro=$('forestcos_codpro').value;
    var cadena=$(cadfin).value;
    var actividad=$(codact).value;
    var articulo=$(codart).value;

    if (articulo!='')
    {
       new Ajax.Updater('divgridfue', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&actividad='+actividad+'&meta='+codmet+'&producto='+codpro+'&cadena='+cadena+'&colmon='+colmon+'&filfin='+fil+'&articulo='+articulo});
    }else{
        alert('Debe Introducir el At&iacute;lo ');
    }
}

function totalfinanciamiento()
{
  var filas=parseInt($('forestcos_totfil').value);
  var l=0;
  var acum=0;
  while (l<filas)
  {
      var monfin="cx_"+l+"_3";

      var num1=toFloat(monfin);
      acum=acum+ num1;
      l++;
  }

  return acum;
}

function ocultarFuentes()
{
    var filafin=parseInt($('forestcos_filfin').value);

    var montopre=toFloat("ax_"+filafin+"_11");
    var montofin=totalfinanciamiento();
    /*if (montofin!=montopre)
    {
      var resta=montopre-montofin;
      if (resta>0)
      {
          alert('Falta una fuente de financiamiento por : '+resta+' Bs.');
      }
    }else {*/
        var codfin="ax_"+$('forestcos_filfin').value+"_12";
        var nomext="ax_"+$('forestcos_filfin').value+"_13";
        var cadfin="ax_"+$('forestcos_filfin').value+"_18";

         var filas=parseInt($('forestcos_totfil').value);
          var l=0;
          var cuantos=0;
          var cadena='';
          while (l<filas)
          {
              var codparing="cx_"+l+"_1";
              var nomexting="cx_"+l+"_2";
              var monfin="cx_"+l+"_3";

              var num1=toFloat(monfin);
              if (num1!=0)
              {
                cuantos++;
                $(codfin).value=$(codparing).value;
                $(nomext).value=$(nomexting).value;
              }

              cadena=cadena + $(codparing).value+'_' + $(nomexting).value +'_' + $(monfin).value + '!';
              l++;
          }

          $(cadfin).value=cadena;
          if (cuantos>1)
          {
              $(codfin).value="Mixtos";
              $(nomext).value="Diversos";
          }

           $('divgridfue').hide();
           $('divgrid').show();
   // }
}

function validarDisponibilidad(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var idcodfin=name+"_"+fil+"_1";
   var idmonfin=name+"_"+fil+"_3";

   var filafin=$('forestcos_filfin').value;
   var montopre=toFloat("ax_"+filafin+"_11");
   var totfin=totalfinanciamiento();
   var monfin=toFloat(idmonfin);
   var codfin=$(idcodfin).value;

   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&montopre='+montopre+'&totfin='+totfin+'&monfin='+monfin+'&codfin='+codfin+'&codigo='+id})

}

function validararticulorepetida(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes= col + 1;
   var coluni= col + 2;
   var colpar= col + 3;
   var colnom= col + 4;
   var colmon= col + 7;
   var descripcion=name+"_"+fila+"_"+coldes;
   var unidad=name+"_"+fila+"_"+coluni;
   var part=name+"_"+fila+"_"+colpar;
   var nompar=name+"_"+fila+"_"+colnom;
   var mont=name+"_"+fila+"_"+colmon;

   if (articulo_repetida(id))
   {
      alert_('El Articulo ya se encuentra Asociado a esa Actividad');
      $(id).value="";
      $(descripcion).value="";
      $(unidad).value="";
      $(part).value="";
      $(nompar).value="";
      $(mont).value="0,00";
      $(id).focus();
   }

}

 function articulo_repetida(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var act=name+"_"+fila+"_1";

   var compara=$(act).value+""+$(id).value;

   var articulorepetido=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";
    var codart="ax"+"_"+i+"_4";

    var compara2=$(codigo).value+""+$(codart).value;

    if (i!=fila)
    {
      if (compara==compara2)
      {
        articulorepetido=true;
        break;
      }
    }
   i++;
   }
   return articulorepetido;
 }

function Calcular(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var colcant= col - 1;
   var coltot= col + 1;
   var cantart=name+"_"+fila+"_"+colcant;
   var totalpre=name+"_"+fila+"_"+coltot;

   var num1=toFloat(cantart);
   var num2=toFloat(id);

   var cal=num1*num2;

   $(totalpre).value=format(cal.toFixed(2),'.',',','.');


}
