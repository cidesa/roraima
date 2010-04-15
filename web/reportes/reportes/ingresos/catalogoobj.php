<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<style type="text/css">
.distabla tr:hover {	background-color: #DFE7F2;	color: #000000;}
.distabla tr.resaltar {	background-color: #DFE7F2;	color: #000000;}
.distabla td {	border: 1px solid #CCCCCC;}
.distabla th {	border: 1px solid #CCCCCC;
                background-color: #CCCCCC;} 


</style>

<body>
<form name="form1" method="post" action="catalogoobj.php">
  <p> 
    <?
   require_once("negociocatalogo.php");

 function obtenerpost($campo)
  {
    $aux="";
	if (array_key_exists($campo,$_POST))
	{
	   $aux=$_POST[$campo];
	}
	return $aux;
  }

  function obtenerget($campo)
  {
    $aux="";
	if (array_key_exists($campo,$_GET))
	{
	   $aux=$_GET[$campo];
	}
	return $aux;
  }


   $obj=new negociocatalogo;
   $campo=obtenerget("campo");
   $sql=obtenerget("sql"); 
   $filtro=obtenerget("filtro");    
   $campoint=obtenerpost("campoint");
   $sqlint=obtenerpost("sqlint"); 
   $filtroint=obtenerpost("filtroint");   
   $condicion=obtenerpost("condicion");
   $condicionnew="";
   if ($sqlint=="")
   {
      $sqlint=$sql;
   }
   if ($campoint=="")
   {
      $campoint=$campo;
   }
   if ($filtroint!="")
   {      	  
      if ($condicion=="")
	  {
	     $condicion="like upper(¿%¿)";
	  }
	  $condicionnew="like upper(¿%".$filtroint."%¿)";
      $sqlint=str_replace($condicion,$condicionnew,$sqlint); 	  
	  $condicion=$condicionnew;	  	 
   }
   
?>
    <input name="sqlint" type="hidden" id="sqlint" value="<?print $sqlint;?>">
    <input name="campoint" type="hidden" id="campoint" value="<?print $campoint;?>">
    <input name="condicion" type="hidden" id="condicion" value="<?print $condicion;?>">
    <BR>
    <input name="filtroint" type="text" id="filtro2" value="<?print $filtroint;?>" size="65" maxlength="500">
    <input type="submit" name="Submit" value="Filtrar">
  </p>
  <div style="overflow:auto; width:450px; height:301px; border:1px solid #CCCCCC"> 
    <table width="100%" border="1" bordercolor="#000000" class="distabla" id="TablaCatalogo">
      <!--<tr bgcolor="#CCCCCC"> 
	    <td width="8%"> <div align="center"><font color="#336699"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Id</font></strong></font></div></td>
        <td width="17%"> <div align="center"><font color="#336699" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Orden</strong></font></div></td>
        <td width="68%"> <div align="center"><font color="#336699"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Proveedor</font></strong></font></div></td>
        <td width="15%"> <div align="center"><font color="#336699"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha</font></strong></font></div></td>
      </tr>-->
      <?
  if ($sql!="")
  {	       
     $obj->mostrar($sql,$filtro);	  
  }
  else
  {          
     $obj->mostrar($sqlint,$filtroint);	 
  }
  $cuantasfilas=$obj->numerofilas();    
  $arreglo=$obj->devuelve_arreglo();
  $numcampos=$obj->numerocampos();
  ?>
    </table>
  </div>
  <p> 
    <input name="buscarref" type="text" id="buscarref2"  onKeyDown="tecla(event)">
    <input type="button" name="Button" value="Referencia" onClick="mostrarreferencia();">
  </p>
  <p>&nbsp;</p>
  <input type="hidden" name="aux">
</form>
</body>
<script language="JavaScript">
   function aceptar(c)
   {     
     f=opener.document.form1;
	 <?
	 if ($campo=="")
	 {
	 ?>
	 f.<?print $campoint; ?>.value=c;
	 <?
	 }
	 else
	 {
	 ?>
	 f.<?print $campo; ?>.value=c;
	 <?
	 }?>	 
	 close(); 
   }
   
   function enviar()
   {     
     f=document.form1;
	 f.action="catalogoobj.php";
	 f.submit();	 	 
   }
   
   function mostrarreferencia(letra)
	{
	   var rows = document.getElementsByTagName("tr");
	   for(i in rows) 
	   {		
	     rows[i].className = null;
	   }
	   f=document.form1;
	   cuantos=f.buscarref.value.length+1; //validar error de longitud
	   maximo=<?print $cuantasfilas;?>;	   
	   referencia="";
	   f.aux.value=f.buscarref.value+letra;
	   for (i=0;i<maximo;i++)
	   {	      
	      valor=f.elements["r"+(i+1)].value.substr(0,cuantos);

	      if (valor==f.aux.value.toUpperCase())
		  {		     
		     rows[i+1].className = "resaltar";
		     referencia=f.elements["r"+(i+1)].value;
			 f.elements["p"+(i+1)].focus();			  
			 f.buscarref.focus();
			 break;
		  }
	   }	 	   
	}
	
	function enterbuscar()
	{
	   f=document.form1;
	   cuantos=f.buscarref.value.length;
	   maximo=<?print $cuantasfilas;?>;	   
	   referencia="";
	   for (i=0;i<maximo;i++)
	   {	      
	      if (f.elements["r"+(i+1)].value.substr(0,cuantos)==f.buscarref.value.toUpperCase())
		  {		     
		     referencia=f.elements["r"+(i+1)].value;
			 f.elements["p"+(i+1)].focus();			 			
			 f.buscarref.focus();
			 break;
		  }
	   }
	   aceptar(f.elements["c"+(i+1)].value);
	}
	
	function tecla(e)
	{
	   f=document.form1;
	   letra = String.fromCharCode(e.keyCode);  	   
	   if (e.keyCode!=13)
	   {
	      //f.buscarref.value=letra;
	      mostrarreferencia(letra);
	   }
	   else
	   {
	      enterbuscar();
	   }
	}
	
	function ColorFila() 
	{	
	   var rows = document.getElementsByTagName("tr");	
	   for(var i in rows) 
	   {		
	      rows[i].onmouseover = function() {			rows.className = "resaltar";		}		
		  rows[i].onmouseout = function() {			rows.className = null;		}	
	    }
	 }	 
	 
</script>
</html>
