 function calcularneto(){

   var am=totalregistros('ax',1,10);
   var fil=0;
   var netototal=0;

   while (fil<am)
   {
    var net=0;
    var id="ax_"+fil+"_1";
    var monto="ax_"+fil+"_2";
    var recar="ax_"+fil+"_3";
    var desc="ax_"+fil+"_4";
    var neto="ax_"+fil+"_5";

	if ($(id).value!=''){

		var mon=toFloat(monto);
		var rec=toFloat(recar);
		var des=toFloat(desc);
		net=mon+rec-des;
		if (net<0){
		  alert('Neto no puede ser menor que cero');
		  $(desc).value='';
		}else{
		$(neto).value=format(net.toFixed(2),'.',',','.');
		}

	}

	netototal=netototal+net;

   fil++;
   }

   $('cireging_montot').value=format(netototal.toFixed(2),'.',',','.');

 }


  function calculardcto(){

   var am=totalregistros('ax',1,10);
   var fil=0;
   var dctototal=0;



   while (fil<am)
   {
    var id="ax_"+fil+"_1";
    var desc="ax_"+fil+"_4";

	if ($(id).value!=''){

		var des=toFloat(desc);
		dctototal=dctototal+des;
	}

   fil++;
   }

   $('cireging_mondes').value=format(dctototal.toFixed(2),'.',',','.');


 }


  function valcod(e,id){

    var num=toFloat(id);

     if (num<=0){
       alert("El monto debe ser mayor que 0");
      }

  }

  function valdes(e,id){

  	var des=toFloat(id);

  	var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);

    var mon= "ax_"+fil+"_2";
    var moning=toFloat(mon);

    var rec="ax_"+fil+"_3";
    var monrec=toFloat(rec);

    var sum=moning+monrec;

  	if (monrec==0 && des>moning){
  	  alert("El descuento no puede ser mayor que el monto del ingreso");
  	  $(id).value="";
  	}

  	if (des>sum){
  	  alert("El descuento no puede ser mayor que el monto del ingreso + monto del recargo");
  	  $(id).value="";
  	}

  }



  function anular()
  {
    var refing=document.getElementById('cireging_refing').value;
    var fecing=document.getElementById('cireging_fecing').value;
    window.open('/ingresos_dev.php/ingreging/anular?refing='+refing+'&fecing='+fecing,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }

  function comprobante(formulario)
  {
      window.open('/ingresos_dev.php/confincomgen/edit/?formulario='+formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }


  function ajaxcodpre(e,id){

    var cod=$(id).value;

      if ($(id).value!="")
      {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&cajtexcom='+id+'&codigo='+cod})
      }
  }

  function consultarComp()
  {
    window.open('/ingresos_dev.php/confincomgen/edit/id/'+document.getElementById("cireging_idrefer").value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

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
        alert('Codigo repetido');
        $(id).value='';
      }
    }
   i++;
   }
 }