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
    var codpar=name+"_"+fil+"_4";
    var cadper=name+"_"+fil+"_14";
    var colmon=name+"_"+fil+"_6";

    var codmet=$('formetotrcre_codmet').value;
    var codpro=$('formetotrcre_codpro').value;
    var cadena=$(cadper).value;
    var actividad=$(codact).value;
    var partida=$(codpar).value;

    if (partida!='')
    {
       new Ajax.Updater('divgridper', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&actividad='+actividad+'&partida='+partida+'&cadena='+cadena+'&meta='+codmet+'&colmon='+colmon+'&filper='+fil+'&producto='+codpro});
    }else{
        alert('Debe Introducir la Partida');
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

  var monpar="ax_"+$('formetotrcre_filper').value+"_6";
  var cadper="ax_"+$('formetotrcre_filper').value+"_14";

  $(monpar).value=format(acumu.toFixed(2),'.',',','.');
  $(cadper).value=cadena;

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
    var codpar=name+"_"+fil+"_4";
    var cadfin=name+"_"+fil+"_15";
    var colmon=name+"_"+fil+"_6";

    var codmet=$('formetotrcre_codmet').value;
    var codpro=$('formetotrcre_codpro').value;
    var cadena=$(cadfin).value;
    var actividad=$(codact).value;
    var partida=$(codpar).value;

    if (partida!='')
    {
       new Ajax.Updater('divgridfue', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&actividad='+actividad+'&meta='+codmet+'&producto='+codpro+'&cadena='+cadena+'&colmon='+colmon+'&filfin='+fil+'&partida='+partida});
    }else{
        alert('Debe Introducir la Partida');
    }
}

function totalfinanciamiento()
{
  var filas=parseInt($('formetotrcre_totfil').value);
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
    var filafin=parseInt($('formetotrcre_filfin').value);

    var montopre=toFloat("ax_"+filafin+"_6");
    var montofin=totalfinanciamiento();
    /*if (montofin!=montopre)
    {
      var resta=montopre-montofin;
      if (resta>0)
      {
          alert('Falta una fuente de financiamiento por : '+resta+' Bs.');
      }
    }else {*/
        var codfin="ax_"+$('formetotrcre_filfin').value+"_7";
        var nomext="ax_"+$('formetotrcre_filfin').value+"_8";
        var cadfin="ax_"+$('formetotrcre_filfin').value+"_15";

         var filas=parseInt($('formetotrcre_totfil').value);
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

   var filafin=$('formetotrcre_filfin').value;
   var montopre=toFloat("ax_"+filafin+"_6");
   var totfin=totalfinanciamiento();
   var monfin=toFloat(idmonfin);
   var codfin=$(idcodfin).value;

   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=8&montopre='+montopre+'&totfin='+totfin+'&monfin='+monfin+'&codfin='+codfin+'&codigo='+id})

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

function mostrarorganismos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codact=name+"_"+fil+"_1";
    var codpar=name+"_"+fil+"_4";
    var cadorg=name+"_"+fil+"_16";

    var codmet=$('formetotrcre_codmet').value;
    var codpro=$('formetotrcre_codpro').value;
    var cadena=$(cadorg).value;
    var actividad=$(codact).value;
    var partida=$(codpar).value;

    if (partida!='')
    {
       new Ajax.Updater('divgridorg', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&actividad='+actividad+'&meta='+codmet+'&producto='+codpro+'&partida='+partida+'&cadena='+cadena+'&filorg='+fil});
    }else{
        alert('Debe Introducir la Partida');
    }
}

function ocultarOrganismos()
{
  var t=0;
  var filaorg=$('formetotrcre_filorg').value;
  var montopre=toFloat("ax_"+filaorg+"_6");
  var codorg="ax_"+filaorg+"_9";
  var nomorg="ax_"+filaorg+"_10";
  var cadorg="ax_"+filaorg+"_16";

  var am=obtener_filas_grid('d',1);
  var acumu=0;
  var cadena='';
  var codigos='';
  var nombres='';
  var pri=0;
  while (t<am)
  {
    var codigo="dx_"+t+"_1";
    var nombre="dx_"+t+"_2";
    var monto="dx_"+t+"_3";

    var num1=toFloat(monto);
   if (num1>0){
    acumu=acumu + num1;

    cadena=cadena + $(codigo).value+'_' + $(nombre).value+'_' + $(monto).value + '!';
    if (pri==0) {
    codigos=codigos + $(codigo).value ;
    nombres=nombres + $(nombre).value;
    }
    else {
    codigos=codigos + $(codigo).value + ',';
    nombres=nombres + $(nombre).value + ',';
    }
    pri++;
   }
    t++;
  }

  if (montopre!=acumu && acumu!=0)
   {
       alert('El Monto de la DistribuciÃ³n no coincide con el Monto Total de la Partida que es: '+$("ax_"+filaorg+"_6").value);
   }else{
      $(cadorg).value=cadena;
      $(codorg).value=codigos;
      $(nomorg).value=nombres;

       $('divgridorg').hide();
       $('divgrid').show();
   }
}

function distribuirOrganismos()
{
   var totalfilas=obtener_filas_grid('d',1);
   if (totalfilas>0)
   {
     var j=$('formetotrcre_filorg').value;
     var cadenaorg="ax"+"_"+j+"_16";
     if ($(cadenaorg).value!="")
      {
        var distrib=$(cadenaorg).value;
        var aux2=distrib.split("!");

        var z=0;
        while (z<((aux2.length)-1))
        {
          var reg=aux2[z];
          var aux3=reg.split("_");
          var ccodorg=aux3[0];
          var cnomorg=aux3[1];
          var cmonorg=aux3[2];

          var codorg="dx"+"_"+z+"_1";
          var nomorg="dx"+"_"+z+"_2";
          var monorg="dx"+"_"+z+"_3";

          $(codorg).value=ccodorg;
          $(nomorg).value=cnomorg;
          $(monorg).value=cmonorg;
          z++;
        }
      }

  }
  else
  {
     alert("Esta Partida no tiene Organismos asociados...");
  }
}