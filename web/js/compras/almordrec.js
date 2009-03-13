  function actualiza(id)
  {
    $('trigger_carcpart_fecord').hide();
    if (id!="")
    {
        $('trigger_carcpart_fecrcp').hide();
	    $$('.botoncat')[0].disabled=true;
   }
  }


 function verificar()
 {
 	if ($('verificaexisydisp').value=="N")
	{
		alert($('mensaje').value);
	}
 }

 function verexisteubicacion()
 {
 	if ($('existeubicacion').value=="N")
	{
		alert('La ubicacion : '+$('carcpart_codubi').value+', no existe para el almacen seleccionado...');
		$('carcpart_codubi').value="";
		$('carcpart_desubi').value="";
		$('carcpart_codubi').focus();
	}
 }


function cantrecibida(e,id)
{
if (e.keyCode==13 || e.keyCode==9)
{
	var aux = id.split("_");
	var name=aux[0];
	var fil=aux[1];
	var col=parseInt(aux[2]);
   //Col es igual a 3
	var colcantrecocul=col+11;
	var colcantrec=col;
	var colcantfal=col+1;
	var colpreart=col+3;
	var coldtoart=col+4;
	var colrgoart=col+5;
	var colmontot=col+6;
    var colcodart=1;
    var colcodalm=19;
    var colcodubi=21;

	var coldtoartocul=col+12;
	var colrgoartocul=col+13;
	var colcanordocul=col+14;

	var canrecocul=name+"_"+fil+"_"+colcantrecocul;
	var canrec=name+"_"+fil+"_"+colcantrec;
	var canfal=name+"_"+fil+"_"+colcantfal;
	var preart=name+"_"+fil+"_"+colpreart;
	var dtoart=name+"_"+fil+"_"+coldtoart;
	var rgoart=name+"_"+fil+"_"+colrgoart;
	var montot=name+"_"+fil+"_"+colmontot;
    var codart=name+"_"+fil+"_"+colcodart;

	var dtoartocul=name+"_"+fil+"_"+coldtoartocul;
	var rgoartocul=name+"_"+fil+"_"+colrgoartocul;
	var canordocul=name+"_"+fil+"_"+colcanordocul;
	var cajcodalm=name+"_"+fil+"_"+colcodalm;
    var cajcodubi=name+"_"+fil+"_"+colcodubi;

 	 var numcanrecocu=toFloat(canrecocul);
	 var numcanrec=toFloat(canrec);
	 var numprecio=toFloat(preart);
	 var numdcto=toFloat(dtoartocul);
	 var numrecg=toFloat(rgoartocul);
	 var numcanord=toFloat(canordocul);

     if (numcanrec>numcanrecocu)
     {
         alert("La cantidad a recibir no puede ser mayor a "+document.getElementById(canrecocul).value);
         document.getElementById(canrec).value=document.getElementById(canrecocul).value;
		 var numcanrec=toFloat(canrec);
     }


	 resta=numcanrecocu-numcanrec;

	 if ((numcanrec > 0) &&  (numprecio>0))
	 {
	     montotal= (numprecio * numcanord);
	     dto = (numprecio * numcanrec) * numdcto / montotal;
         rgo = (numprecio * numcanrec) * numrecg / montotal;
      }
      else
      {
       montotal=0;
       dto = 0;
       rgo = 0;
      }



	 multiplica=(numcanrec*numprecio)-dto + rgo;

	 //FORMAT(PUNTO,COMA,PUNTO)
	 document.getElementById(canfal).value=format(resta.toFixed(2),'.',',','.');
	 document.getElementById(dtoart).value=format(dto.toFixed(2),'.',',','.');
	 document.getElementById(rgoart).value=format(rgo.toFixed(2),'.',',','.');
	 document.getElementById(montot).value=format(multiplica.toFixed(2),'.',',','.');

	 entermonto(e,id);

     var codart=document.getElementById(codart).value;
	 //var codalm=document.getElementById('carcpart_codalm').value;
   	 //var codubi=document.getElementById('carcpart_codubi').value;
   	 var codalm=$(cajcodalm).value;
   	 var codubi=$(cajcodubi).value;
   	 var canrec=numcanrec;
   	 if (codalm=='' || codubi=='')
   	    alert_("Debe indicar el C&oacute;digo del Almac&eacute;n y el de la Ubicaci&oacute;n para el art&iacute;culo "+codart);
   	 else
   	     new Ajax.Request('/compras_dev.php/almordrec/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json), verificar(); }, parameters:'ajax=5&codalm='+codalm+'&canrec='+canrec+'&codubi='+codubi+'&codart='+codart})
 }

}

function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('carcpart_rcpart').value=valor;
 }

 function ejecutaajax(e,id)
 {
    if (e.keyCode==13 || e.keyCode==9)
    {
        var aux = id.split("_");
	    var name=aux[0];
	    var fil=parseInt(aux[1]);
	    var col=parseInt(aux[2]);

	  	var coldes=col+1;
    	var descripcion=name+"_"+fil+"_"+coldes;

	    var colalm=col-2;
	    var codalm=name+"_"+fil+"_"+colalm;
	    var valcodalm=$(codalm).value;
	    var cod=$(id).value;

        if ($(id).value!="")
      	{
    		new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&cajtexmos='+descripcion+'&cajtexcom='+id+'&codalm='+valcodalm+'&codigo='+cod})
    	}
    }
 }
