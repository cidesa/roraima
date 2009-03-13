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

  function repetido2(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var codpre=$(id).value;

    var codigo="ax_"+fila+"_1";

    var codpre2=$(codigo).value;

      if (codpre==codpre2)
      {
        alert_('C&oacute;digo Presupuestario repetido');
        $(id).value='';
      }

 }

   function valcod(e,id){

    var num=toFloat(id);

     if (num<=0){
       alert("El monto debe ser mayor que 0");
      }

  }

    function ajaxcodpre(e,id){///validaciones

    var cod2=$(id).value;
    var aux = id.split("_");
   	var name=aux[0];
   	var fila=aux[1];

   	var cod="ax_"+fila+"_1";
   	var cod1=$(cod).value;

	if (cod1!=''){

    if ($(id).value!="")
      {
        if (cod1!=cod2){

        			new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&codigo='+cod1})

        }else{
        		   alert_('Título presupuestario repetido');}
     }else{
        		   alert_('El título presupuestario no puede estar vacio');}

   }else{
        		   alert_('El título presupuestario origen no puede estar vacio');}

  }


  function anular()
  {
    var reftra=document.getElementById('citrasla_reftra').value;
    var fectra=document.getElementById('citrasla_fectra').value;
    window.open('/ingresos_dev.php/ingtrasla/anular?reftra='+reftra+'&fectra='+fectra,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }



  function calculartotal(){

   var am=totalregistros('ax',1,10);
   var fil=0;
   var total=0;


   while (fil<am)
   {
    var id="ax_"+fil+"_1";
    var mon="ax_"+fil+"_3";

	if ($(id).value!=''){

		var mont=toFloat(mon);
		total=total+mont;
	}

   fil++;
   }

   $('citrasla_tottra').value=format(total.toFixed(2),'.',',','.');

 }

 function haydisponibilidad(e,id){

   var monto=$(id).value;
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];

   var idcod="ax_"+fila+"_1";
   var codigo=$(idcod).value;

   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&monto='+monto+'&codigo='+codigo})

 }

 function vacios(e,id){

   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];

   var cod1="ax_"+fila+"_1";
   var cod2="ax_"+fila+"_2";

   if ($(cod1).value==''){
     alert_('C&oacute;digo Presupuestario no puede estar vac&iacute;o');
   }

   if ($(cod2).value==''){
     alert_('C&oacute;digo Presupuestario no puede estar vac&iacute;o');
   }

 }

 function vacio(e,id){

    if ($(id).value=='undefined'){
     alert_('C&oacute;digo Presupuestario no puede estar vac&iacute;o');
     $(id).value='';
   }

 }

 function hayasignacion(e,id){

   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];

   var cod="ax_"+fila+"_1";
   var codigo=$(cod).value;

   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&codigo='+codigo})
 }


 function ajaxexiste(e,id){

    var cod=$(id).value;

      if ($(id).value!="")
      {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&cajtexcom='+id+'&codigo='+cod})
      }
  }

  function escodigoorigen(e,id){

    var am=totalregistros('ax',1,10);
    var i=0;
    var cod2=$(id).value;
    while (i<am)
    {
       var caux="ax_"+i+"_1";
       var codaux=$(caux).value;
       if (cod2==codaux){
          alert_('El título presupuestario no puede ser origen del movimiento');
          $(id).value='';
       }
       i++;
    }

  }

  function escodigodestino(e,id){

    var am=totalregistros('ax',1,10);
    var i=0;
    var cod1=$(id).value;
    while (i<am)
    {
       var caux="ax_"+i+"_2";
       var codaux=$(caux).value;
       if (cod1==codaux){
 		   alert_('El título presupuestario no puede ser destino del movimiento');
 		   $(id).value='';
       }
       i++;
    }
  }

 function movimientorepetido(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var codp1="ax_"+fila+"_1";
   var codp2="ax_"+fila+"_2";

   var codpre1=$(codp1).value;
   var codpre2=$(codp2).value;

   var am=totalregistros('ax',1,10);
   var i=0;
   while (i<am)
   {
    var cod1="ax_"+i+"_1";
    var cod2="ax_"+i+"_2";

    var codaux1=$(cod1).value;
    var codaux2=$(cod2).value;

    if (i!=fila)
    {
      if (codpre1==codaux1 && codpre2==codaux2)
      {
        alert_('Movimiento repetido');
        $(codp1).value='';
        $(codp2).value='';
      }
    }
   i++;
   }
 }