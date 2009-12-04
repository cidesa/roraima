/**
 * Librerías Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

 function repetido(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var codpre=$(id).value;

   var am=totalregistros('ax',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="ax_"+i+"_1";

    var codpre2=$(codigo).value;

    if (i!=fila)
    {
      if (codpre==codpre2)
      {
        alert_('C&oacute;digo Presupuestario repetido');
        $(id).value='';
      }
    }
   i++;
   }
 }

   function valcod(e,id)
   {
     var num=toFloat(id);
     if ((num<=0) && (num!='')){
       alert("El monto debe ser mayor que 0");
      }else{
      $(id).value=format(num.toFixed(2),'.',',','.');
      }
  }

    function ajaxcodpre(e,id){


    var cod=$(id).value;

      if ($(id).value!="")
      {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&cajtexcom='+id+'&codigo='+cod})
      }
  }

       function mostrarDivRefMov(){

      $('divrefere').show();
     }

     function ocultarDivRefMov(){

      $('divrefere').hide();
     }

   function blanqueargrid(){

     var codigo=1;

      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3'});
   }

  function anular()
  {
    if ($('ciajuste_staaju').value!='N'){  //Si no esta nulo del documento
      var refaju = $('ciajuste_refaju').value;
      var fecaju = $('ciajuste_fecaju').value;
      window.open(getUrlModulo()+'anular?refaju='+refaju+'&fecaju='+fecaju,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
    }else{
      alert('Ya se encuentra Anulado...');
    }

  }

  function valmonto(e,id){

   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var monaju=toFloat(id);

   var monto2="ax_"+fila+"_3";
   if ($F(monto2) != '')
   {
     var monimp=toFloat(monto2);
     if(monaju>monimp){
       alert_("El monto del ajuste es mayor que el monto de la imputaci&oacute;n");
       $(id).value='0.00';
     }
   }

  }

  function calculartotal1(){

   var am=totalregistros('ax',1,10);
   var fil=0;
   var total=0;


   while (fil<am)
   {
    var id="ax_"+fil+"_1";
    var mon="ax_"+fil+"_2";

  if ($(id).value!=''){

    var mont=toFloat(mon);
    total=total+mont;
  }

   fil++;
   }

   $('ciajuste_totaju').value=format(total.toFixed(2),'.',',','.');


 }

   function calculartotal2(){

   var am=totalregistros('ax',1,10);
   var fil=0;
   var total=0;



   while (fil<am)
   {
    var id="ax_"+fil+"_1";
    var mon="ax_"+fil+"_2";

  if ($(id).value!=''){

    var mont=toFloat(mon);
    total=total+mont;
  }

   fil++;
   }

   $('ciajuste_totaju').value=format(total.toFixed(2),'.',',','.');


 }

 function haydisponibilidad(e,id){

   var monto=$(id).value;
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];

   var idcod=name+"_"+fila+"_1";
   var codigo=$(idcod).value;

   if (codigo != '')
   {
      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&monto='+monto+'&codigo='+codigo})
   }


 }

 function esultimonivel(e,id)
 {
   var valor=$(id).value;
   var longitud=valor.length;
   var longpre=$('ciajuste_longpre').value;

   if (valor = 'undefined')
   {
        $(id).value='';
        return false;
   }
   if (longitud!=longpre && $F(id)!=''){
     alert_('El C&oacute;digo Presupuestario debe ser de &uacute;ltimo nivel');
     $(id).value='';
        return false;
   }
  return true;
 }