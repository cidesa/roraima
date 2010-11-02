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

    var codpar=name+"_"+fil+"_1";
    var colmon=name+"_"+fil+"_3";
    var cadper=name+"_"+fil+"_11";
    
    var codcat=$('forotrcrepre_codcat').value;
    var cadena=$(cadper).value;
    var partida=$(codpar).value;

    if (partida!='')
    {
       new Ajax.Updater('divgridper', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&partida='+partida+'&cadena='+cadena+'&colmon='+colmon+'&filper='+fil+'&categoria='+codcat});
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
    var monper="bx_"+l+"_2";

    var num1=toFloat(monper);

    cadena=cadena + $(per).value+'_' + $(monper).value + '!';

    acumu=acumu + num1;
    l++;
  }

  var monpar="ax_"+$('forotrcrepre_filper').value+"_3";
  var cadper="ax_"+$('forotrcrepre_filper').value+"_11";

  $(monpar).value=format(acumu.toFixed(2),'.',',','.');
  $(cadper).value=cadena;

   $('divgridper').hide();
   $('divgridpar').show();
}


function mostrarfinanciamientos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codpar=name+"_"+fil+"_1";
    var colmon=name+"_"+fil+"_3";
    var cadfin=name+"_"+fil+"_12";

    var codcat=$('forotrcrepre_codcat').value;
    var cadena=$(cadfin).value;
    var partida=$(codpar).value;
    var montopar=$(colmon).value;

    if (partida!='')
    {
       new Ajax.Updater('divgridfue', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&partida='+partida+'&cadena='+cadena+'&colmon='+montopar+'&filfin='+fil+'&categoria='+codcat});
    }else{
        alert('Debe Introducir la Partida');
    }
}

function totalfinanciamiento()
{
  var filas=parseInt($('forotrcrepre_totfil').value);
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
    var filafin=$('forotrcrepre_filfin').value;

    var montopre=toFloat("ax_"+filafin+"_3");
    var montofin=totalfinanciamiento();
    if (montofin!=montopre)
    {
      var resta=montopre-montofin;
      if (resta>0)
      {
          alert('Falta una fuente de financiamiento por : '+resta+' Bs.');
      }
    }else {
        var codfin="ax_"+$('forotrcrepre_filfin').value+"_4";
        var nomext="ax_"+$('forotrcrepre_filfin').value+"_5";
        var cadfin="ax_"+$('forotrcrepre_filfin').value+"_12";

         var filas=parseInt($('forotrcrepre_totfil').value);
          var l=0;
          var cuantos=0;
          var cadena='';
          while (l<filas)
          {
              var codparing="cx_"+l+"_1";
              var nomexting="cx_"+l+"_2";
              var monfin="cx_"+l+"_3";
              var mondis="cx_"+l+"_4";
              var monasi="cx_"+l+"_5";

              var num1=toFloat(monfin);
              if (num1!=0) 
              { 
                cuantos++; 
                $(codfin).value=$(codparing).value;
                $(nomext).value=$(nomexting).value;
              }
         
              cadena=cadena + $(codparing).value+'_' + $(nomexting).value +'_' + $(monfin).value +'_' + $(mondis).value +'_' + $(monasi).value + '!';
              l++;
          }          

          $(cadfin).value=cadena;
          if (cuantos>1)
          {
              $(codfin).value="Mixtos";
              $(nomext).value="Diversos";
          }

           $('divgridfue').hide();
           $('divgridpar').show();
    }
}

function validarDisponibilidad(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var idcodfin=name+"_"+fil+"_1";
   var idmonfin=name+"_"+fil+"_3";

   var filafin=$('forotrcrepre_filfin').value;
   var montopre=toFloat("ax_"+filafin+"_3");
   var totfin=totalfinanciamiento();
   var monfin=toFloat(idmonfin);
   var codfin=$(idcodfin).value;
   var categoria=$('forotrcrepre_codcat').value;

   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&montopre='+montopre+'&totfin='+totfin+'&monfin='+monfin+'&codfin='+codfin+'&categoria='+categoria+'&codigo='+id})
   
}

function mostrarorganismos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codpar=name+"_"+fil+"_1";
    var cadorg=name+"_"+fil+"_13";

    var codcat=$('forotrcrepre_codcat').value;
    var cadena=$(cadorg).value;
    var partida=$(codpar).value;

    if (partida!='')
    {
       new Ajax.Updater('divgridorg', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=8&partida='+partida+'&cadena='+cadena+'&filorg='+fil+'&categoria='+codcat});
    }else{
        alert('Debe Introducir la Partida');
    }
}

function ocultarOrganismos()
{
  var t=0;
  var filaorg=$('forotrcrepre_filorg').value;
  var montopre=toFloat("ax_"+filaorg+"_3");
  var codorg="ax_"+filaorg+"_8";
  var nomorg="ax_"+filaorg+"_9";
  var cadorg="ax_"+filaorg+"_13";

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
       alert('El Monto de la DistribuciÃ³n no coincide con el Monto Total de la Partida que es: '+$("ax_"+filaorg+"_3").value);
   }else{
      $(cadorg).value=cadena;
      $(codorg).value=codigos;
      $(nomorg).value=nombres;

       $('divgridorg').hide();
       $('divgridpar').show();
   }
}

function distribuirOrganismos()
{
   var totalfilas=obtener_filas_grid('d',1);
   if (totalfilas>0)
   {
     var j=$('forotrcrepre_filorg').value;
     var cadenaorg="ax"+"_"+j+"_13";
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

function eliminar()
{
  if (confirm("Â¿Esta seguro de eliminar?"))
  {
    var codcat=$('forotrcrepre_codcat').value;

    location.href='/formulacion_dev.php/forotrcrepre/anular?codcat='+codcat;
  }
}

function validarpartidarepetida(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes= col + 1;
   var descripcion=name+"_"+fila+"_"+coldes;

if (partida_repetida(id))
   {
      alert_('El Partida esta repetida');
      $(id).value="";
      $(descripcion).value="";
      $(id).focus();
   }

}

 function partida_repetida(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var compara=$(id).value;

   var partidarepetido=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var compara2=$(codigo).value;

    if (i!=fila)
    {
      if (compara==compara2)
      {
        partidarepetido=true;
        break;
      }
    }
   i++;
   }
   return partidarepetido;
 }