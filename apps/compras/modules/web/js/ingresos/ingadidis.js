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

 function valcod(e,id){

    var num=toFloat(id);

     if (num<=0){
       alert("El monto debe ser mayor que 0");
      }

  }

 function anular()
  {
    if ($('ciadidis_staadi').value!='N'){  //Si no esta nulo del documento
      var refadi = $('ciadidis_refadi').value;
      var fecadi = $('ciadidis_fecadi').value;
      window.open(getUrlModulo()+'anular?refadi='+refadi+'&fecadi='+fecadi,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
   }else{
      alert('Ya se encuentra Anulado...');
    }
  }



  function calculartotal(){

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

   $('ciadidis_totadi').value=format(total.toFixed(2),'.',',','.');

 }

  function vacio(e,id){

    if ($(id).value=='undefined'){
     alert_('C&oacute;digo Presupuestario no puede estar vac&iacute;o');
     $(id).value='';
   }

 }

  function hayasignacion(e,id){

   var codigo=$(id).value;

   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&codigo='+codigo})
 }

  function ajaxexiste(e,id){

    var cod=$(id).value;

      if ($(id).value!="")
      {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&cajtexcom='+id+'&codigo='+cod})
      }
  }

 function haydisponibilidad(e,id){

   var monto=$(id).value;
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];

   var fecha=$('ciadidis_fecadi').value;
   var aux2=fecha.split("/");
   var ano=aux2[2];

   var idcod="ax_"+fila+"_1";
   var codigo=$(idcod).value;

   var disponible="ax_"+fila+"_3";
   var cod="ax_"+fila+"_1";

   if ($('ciadidis_adidis_A').checked){ var tipo='A';}else{var tipo='D';}

   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&monto='+monto+'&codigo='+codigo+'&ano='+ano+'&cajtexmos='+disponible+'&cajtexcom='+cod+'&cajmon='+id+'&tipo='+tipo})

 }
