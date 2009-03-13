  function actualiza(id)
  {
    if (id!="")
    {
      $('trigger_caentalm_fecrcp').hide();
     $$('.botoncat')[0].disabled=true;
  	 $$('.botoncat')[1].disabled=true;
   }
  }

function costoenter(e,id)
{
	var aux = id.split("_");
	var name=aux[0];
	var fil=aux[1];
	var col=parseInt(aux[2]);

//	var colcant=col-1;
	//var colcosto=col;
	//var coltot=col+1;

	var cant=name+"_"+fil+"_3";
	var costo=name+"_"+fil+"_4";
	var total=name+"_"+fil+"_5";

	 var num1=toFloat(cant);
	 var num2=toFloat(costo);

	 montotal=num1*num2;

	 //FORMAT(PUNTO,COMA,PUNTO)
	 $(total).value=format(montotal.toFixed(2),'.',',','.');

	 entermonto(e,id);
}

 function ejecutaajax(id)
 {
        var aux = id.split("_");
	    var name=aux[0];
	    var fil=parseInt(aux[1]);
	    var col=parseInt(aux[2]);

	  	var coldes=col+1;
	    var colcodart=name+"_"+fil+"_1";

    	var descripcion=name+"_"+fil+"_"+coldes;

	    var colalm=col-2;
	    var codalm=name+"_"+fil+"_"+colalm;
	    var valcodalm=$(codalm).value;
	    var cod=$(id).value;
	    var codart=$(colcodart).value;

        if ($(id).value!="")
      	{
    		new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&cajtexmos='+descripcion+'&cajtexcom='+id+'&codalm='+valcodalm+'&codart='+codart+'&codigo='+cod})
    	}
 }

 function ejecutaajaxalm(id)
 {
        var aux = id.split("_");
	    var name=aux[0];
	    var fil=parseInt(aux[1]);
	    var col=parseInt(aux[2]);

    	var colcodart=name+"_"+fil+"_1";
  		var desalm=name+"_"+fil+"_7"


	    var codart=$(colcodart).value;
	    var codalm=$(id).value;

        if ($(id).value!="")
      	{
    		new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&cajtexmos='+desalm+'&codalm='+codalm+'&codart='+codart})
    	}
 }
