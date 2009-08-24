 function enter1(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor="SP"+valor.pad(6, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('casolpag_solpag').value=valor;
   }
 }

function ajaxcodigospre(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var descripcion=name+"_"+fil+"_"+coldes;
   var cod=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
     if ($(id).value!="")
     {
        if (!codigopre_repetido(id))
        {
          new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
        }
        else
        {
          alert('La Codigo Presupuestario está Repetido');
          $(id).value="";
        }
      }
    }
 }

 function codigopre_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var codigopre=$(id).value;

   var codigoprerepetido=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var codigopre2=$(codigo).value;

    if (i!=fila)
    {
      if (codigopre==codigopre2)
      {
        codigoprerepetido=true;
        break;
      }
    }
   i++;
   }
   return codigoprerepetido;
 }

  function disponibilidad(e,id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colcod= col-2;
    var codigo=name+"_"+fil+"_"+colcod;
    var codpre=$(codigo).value;
    var letra='N';
    var monto=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
    new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&fila='+fil+'&monto='+monto+'&letra='+letra+'&codigo='+codpre+'&idmonto='+id})
   }
  }
