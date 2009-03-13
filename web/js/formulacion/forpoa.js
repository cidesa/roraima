
  function CatalogoGrid(e,id)  //Grid fuente de financiamiento
  {
    var aux = id.split("_");
  //var name=aux[0];
  var name='ax';
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var id1=name+"_"+fil+"_"+'5';       //Distribucion del Monto
  var asig=name+"_"+fil+"_"+'6';      //Asignacion Presupuestaria
  var codpre=name+"_"+fil+"_"+'14';   //Código Presupuestario
  var ftemonto=name+"_"+fil+"_"+'16';   //Fte.Financiamiento.Monto

  //se hizo asi por que no encontre la manera mas optima de hacerlo
  //ya que precarga los monto al momento de cargar el grid principal y se lo pasa
  //al grid de financiamiento...
  var monfin1=name+"_"+fil+"_"+'16';   //valores del monfin

  //if ((e.keyCode==13) && (document.getElementById(id).value!=''))
  if (document.getElementById(id).value!='')
  {
      var obj1=document.getElementById('forencpryaccespmet_codpro').value;
      var obj2=document.getElementById('forencpryaccespmet_codaccesp').value;
      var obj3=document.getElementById('forencpryaccespmet_codmet').value;
      var obj4=document.getElementById(codpre).value;
      var obj5=QuitarComa(document.getElementById(asig).value);
      var obj6=document.getElementById(ftemonto).value;
      var monfin=document.getElementById(monfin1).value;

      window.open('/formulacion_dev.php/forpoa/finan?obj1='+obj1+'&obj2='+obj2+'&obj3='+obj3+'&obj4='+obj4+'&obj5='+obj5+'&id='+id+'&monfin='+monfin+'&obj6='+obj6,'...','menubar=no,toolbar=no,scrollbars=yes,width=960,height=380,resizable=yes,left=500,top=80')
   }
  }

  function AsigPresup(e,id)  //Grid asignacion presupuestaria
  {
  if (((e.keyCode==13) || (e.keyCode==null)) && (document.getElementById(id).value!=''))
  {
  var aux = id.split("_");

  // Si viene por el evento del boton cambiar el ab_0_11 por ax_0_11
  // var name=aux[0];
  var name='ax';
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var distmont=name+"_"+fil+"_"+'5';  //Distribucion del Monto
  var asig_pre=name+"_"+fil+"_"+'6';  //Asignacion Presupuestaria
  var coduni=name+"_"+fil+"_"+'1';    //Codigo Unidad Ejecutora
  var codpar=name+"_"+fil+"_"+'3';    //Codigo Partida
//  var codpre=name+"_"+fil+"_"+'14';   //Codigo Presupuesto
  var codpre=name+"_"+fil+"_"+'14';   //Codigo Presupuesto
  var arreg=name+"_"+fil+"_"+'15';    //Arreglo que contiene los montos de las asignaciones presupuestaria

//   if (document.getElementById(distmont).value=='V')
//   {
      var obj2=document.getElementById('forencpryaccespmet_codaccesp').value;
      var obj3=document.getElementById('forencpryaccespmet_codmet').value;
      var obj4=document.getElementById(codpar).value;
      var obj5=document.getElementById(coduni).value+'-'+document.getElementById(codpar).value;
      document.getElementById(codpre).value=obj5;
      var obj1=document.getElementById(arreg).value;
      var obj6=QuitarComa(document.getElementById(asig_pre).value);
      var distmont=document.getElementById(distmont).value;

      //window.open('/formulacion_dev.php/forpoa/grid?obj1='+obj11+'&obj2='+obj2+'&obj3='+obj3+'&obj4='+obj4+'&obj5='+obj5+'&id='+id,'...','menubar=no,toolbar=no,scrollbars=no,width=280,height=400,resizable=yes,left=500,top=80')
      window.open('/formulacion_dev.php/forpoa/grid?arreg='+obj1+'&id='+id+'&asig_pre='+obj6+'&distmont='+distmont,'...','menubar=no,toolbar=no,scrollbars=no,width=240,height=340,resizable=yes,left=500,top=80')
//     }
    }
  }

   function AsigCodPre(id)
   {
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  //var col1=parseInt(aux[1]);
  //var col4=parseInt(aux[4]);

  var col1=name+"_"+fil+"_"+'1';    //Codigo Unidad Ejecutora
  var col3=name+"_"+fil+"_"+'3';    //Codigo Partida
  var col10=name+"_"+fil+"_"+'14';  //Codigo Presupuesto

    document.getElementById(col10).value=document.getElementById(col1).value+'-'+document.getElementById(col3).value
   }

  function QuitarComa(valor)
  {
    if (valor!="")
    {
      str= valor.toString();
      str= str.replace('.','');
      str= str.replace('.','');
      str= str.replace('.','');

         str = str.replace(",",".");
         var num=parseFloat(str);
      return num;
    }
  }

function actualizar(id)
{
  var aux = id.split("_");
  //var name=aux[0];
  var name='ax';
  var fil=aux[1];
  var col=parseInt(aux[2]);

// Si viene por el evento del boton cambiar el ab_0_11 por ax_0_11
   var id = id.replace('b','x');
//

  var id1=name+"_"+fil+"_"+'15';  //Agrid Asig Presup

  window.opener.document.getElementById(id).value=document.getElementById('x12').value;
  window.opener.document.getElementById(id1).value=Generarmatriz();
// window.opener.actualizarsaldos();
  window.close();
}

function Generarmatriz()
{
  var arreglo='';
  var cont=11;   //Numero de Periodo
  var str;

  while (cont>=0)
  {
    id='x'+cont;
	str= document.getElementById(id).value.toString();
	str= str.replace('.','');
	str= str.replace('.','');
	str= str.replace('.','');
    arreglo=str+'_'+arreglo;
    cont --;
  }
  //arreglo=arreglo+'_';
  return arreglo;
}


  function actualizarsaldos(e,id)
   {
	if (e.keyCode==13)
	{
		i=0;
		var acum=0;
		while (i<=11)
		{
			var x="x"+i;
			str= document.getElementById(x).value.toString();
			str= str.replace('.','');
			str= str.replace('.','');
			str= str.replace('.','');

			var num=parseFloat(str);
			acum=acum+num;

			i=i+1;
		}
		document.getElementById('x12').value=format(acum.toFixed(2),'.',',','.');
	}
  }

  function actualizar_codigo(id){
	  var aux = id.split("_");

	  // Si viene por el evento del boton cambiar el ab_0_11 por ax_0_11
	  // var name=aux[0];
	  var name='ax';
	  var fil=aux[1];
	  var col=parseInt(aux[2]);

	  //var distmont=name+"_"+fil+"_"+'5';  //Distribucion del Monto
	  //var asig_pre=name+"_"+fil+"_"+'6';  //Asignacion Presupuestaria
	  var coduni=name+"_"+fil+"_"+'1';    //Codigo Unidad Ejecutora
	  var codpar=name+"_"+fil+"_"+'3';    //Codigo Partida
	//  var codpre=name+"_"+fil+"_"+'14';   //Codigo Presupuesto
	  var codpre=name+"_"+fil+"_"+'14';   //Codigo Presupuesto
	//  var arreg=name+"_"+fil+"_"+'15';    //Arreglo que contiene los montos de las asignaciones presupuestaria

		if ((document.getElementById(coduni).value!='') ||  (document.getElementById(codpar).value!=''))
		{
	      var obj5=document.getElementById(coduni).value+'-'+document.getElementById(codpar).value;
	      document.getElementById(codpre).value=obj5;
		}
  }