<?php use_helper('Javascript') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('Grid'); ?>

<? //javascript_include_tag('tools'); ?>

<script language="JavaScript">
	function validarmonto(e,id)
	{
	  if ((e.keyCode==13) && (document.getElementById(id).value!=''))
	  {
	  	var aux  = id.split("_");
	  	var name = aux[0];
		var fil  = aux[1];
		var col  = parseInt(aux[2]);

		var montodisp = name+"_"+fil+"_"+'3';
		var montodisp = QuitarComa(document.getElementById(montodisp).value);
		var valor     = QuitarComa(document.getElementById(id).value);
	    var total     = QuitarComa(document.getElementById('total').value);
	    var sumatoria = QuitarComa(document.getElementById('sumatoria').value);

/*alert(sumatoria);
alert(total);
alert(valor);
alert(montodisp);*/

	    if ((sumatoria > total) || (valor > montodisp))
	    {
	      alert('Monto de la Fuente de Financiamiento Excede del Monto Presupuestado...');
	      document.getElementById('sumatoria').value = sumatoria - valor;
	      document.getElementById(id).value='0,00';
	    }
	  }
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

	function actualizar(numero_reg,id)
	{
 	 // Si viene por el evento del boton cambiar el ab_0_11 por ax_0_11

	    var id = id.replace('b','x');
	  	var aux  = id.split("_");
	  	var name = aux[0];
		var fil  = aux[1];
		var variable='';
		var cod='';
	    var monfin=name+"_"+fil+"_"+'16'; //Para guardar los monto en el grip principal
	    var codfin=name+"_"+fil+"_"+'17'; //Para guardar los monto en el grip principal
	    var fte_fiananciamiento=name+"_"+fil+"_"+'7'; //Codigo Fte.Financiamiento en el grip principal
	    var nomb_fte_financ=name+"_"+fil+"_"+'8'; //Nombre del Fte.Financiamiento en el grip principal
	  //  alert(monfin);

		  var j=0;
		  //var cuantos=0;
		 //alert(id);
		  while(j<numero_reg)
		  {
		  //	alert(j);
		    var id=name+"_"+j+"_"+'4';
		    var id1=name+"_"+j+"_"+'1';

		    //valor=parseFloat(monfin[j]);

			variable=variable + QuitarComa(document.getElementById(id).value)+"_";
			cod=cod + document.getElementById(id1).value+"_";

			j++;
		  }
		  var datos=cuantos(numero_reg);
	  	  window.opener.document.getElementById(fte_fiananciamiento).value=datos[0];
	  	  window.opener.document.getElementById(nomb_fte_financ).value=datos[1];
	  	  window.opener.document.getElementById(monfin).value=variable;
	  	  window.opener.document.getElementById(codfin).value=cod;

	  window.close();
	}

	//Cuentas las filas que fueron asignados montos
	function cuantos(numero_reg)
	{
	  f=document.form1;
  	  var aux = 'ax_0_4'.split("_");
	  var name=aux[0];
	  var fil=aux[1];
	  var col=parseInt(aux[2]);
	  var cod;


	  var j=0;
	  var cuantos=0;
	  while(j<numero_reg)
	  {
	    var id=name+"_"+j+"_"+'4';
	    var idc=name+"_"+j+"_"+'1';
	    var nombre=name+"_"+j+"_"+'2';
	    if (QuitarComa(document.getElementById(id).value) > 0)
	    {
	      cod = document.getElementById(idc).value;
	      nombre1 = document.getElementById(nombre).value;
	      cuantos++;
	    }
        j++;
	  }

	  if (cuantos > 1)
	  {
	  	 resul=new Array('MIXTO','DIVERSOS');
	     return resul;

	  }else{
	  	 resul=new Array(cod,nombre1);
	     return resul;
	  }

	}

	function llenar_monto_a_formula(numero_reg)
	{

		  f=document.form1;
		  var montos='<? echo $monfin; ?>';
		  var monfin=montos.split("_");
		//  alert(monfin);
	  	  var aux = 'ax_0_4'.split("_");
		  var name=aux[0];
		  var fil=aux[1];
		  var col=parseInt(aux[2]);
		  var cod;

		  var j=0;
		  //var cuantos=0;
		 // alert(numero_reg);
		  while(j<numero_reg)
		  {
		  //	alert(j);
		    var id=name+"_"+j+"_"+'4';
		    valor=parseFloat(monfin[j]);
			document.getElementById(id).value=format(valor.toFixed(2),'.',',','.');

			j++;
		  }
		    /*var idc=name+"_"+j+"_"+'1';
		    if (QuitarComa(document.getElementById(id).value) > 0)
		    {
		      cod = document.getElementById(idc).value;
		      cuantos++;
		    }
	        j++;
		  }

		  if (cuantos > 1)
		  {
		     return 'MIXTO';
		  }else{
		     return cod;
		  }*/
	}
</script>


<div id="divGrid">
<form name="form1" id="form1">
<?
  echo grid_tag($obj);
?>
</form>
</div>

<div id="divGrid">
<table width="100%" border="1" cellpadding="0" cellspacing="0">
<tr valign="right">
<td align="RIGHT">
	<table width="100%" border="0">
	  <tr valign="right">
	   <td width="35%" align="RIGHT">
	     <input type="button" name="Submit" value="Actualizar" onclick="javascript:actualizar('<? echo $numero_reg; ?>','<? echo $id; ?>');">	   </td>

	   <td width="30%" align="LEFT">
	     <input class="grid_txtright"  type="text" name="sumatoria" id="sumatoria" value="" style="border: medium none ;">	   </td>

	   <td align="LEFT">
	      <b>TOTAL :</b>
	      <input class="grid_txtright"  readonly="true" type="text" name="total" id="total" value="<? echo number_format($asig,2,',','.'); ?>" style="border: medium none ;" /></td>
	   </tr>
	</table>
</td>
</tr>
</table>
</div>

<script language="JavaScript">

	llenar_monto_a_formula('<? echo $numero_reg; ?>');

</script>