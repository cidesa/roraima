<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $_GET["titulo"]; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">

</head>

<style type="text/css">
.distabla tr:hover {	background-color: #DFE7F2;	color: #000000;}
.distabla tr.resaltar {	background-color: #DFE7F2;	color: #000000;}
.distabla td {	border: 1px solid #CCCCCC;}
.distabla th {	border: 1px solid #CCCCCC;
                background-color: #CCCCCC;}


</style>

<body>

<form name="form1" method="post" action="catalogo3.php">
  <p>
    <?
//   require_once("../../../lib/genegociocatalogo.php");
   require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
   require_once($_SESSION["x"].'lib/general/funciones.php');
   require_once($_SESSION["x"].'lib/general/funciones3.php');
   $obj=new negociocatalogo3();

   $aux1=obtenerget("campo");
   $aux2=obtenerget("campo2");
   $aux5=obtenerget("campo3");
   $aux3=obtenerget("foco");
   $aux4=obtenerget("tipo");

   if (!empty($aux1))
   {
     $_SESSION["c"]=$aux1;
    $campo=$_SESSION["c"];
   }
   else
   {
       $campo=$_SESSION["c"];
   }
   if (!empty($aux2))
   {
     $_SESSION["d"]=$aux2;
    $campo2=$_SESSION["d"];
   }
   else
   {
       $campo2=$_SESSION["d"];
   }
   if (!empty($aux5))
   {
     $_SESSION["e"]=$aux5;
    $campo3=$_SESSION["e"];
   }
   else
   {
       $campo3=$_SESSION["e"];
   }

   if (!empty($aux3))
   {
     $_SESSION["f"]=$aux3;
    $foco=$_SESSION["f"];
   }
   else
   {
       $foco=$_SESSION["f"];
   }
    if (!empty($aux4))
   {
     $_SESSION["t"]=$aux4;
    $tipo=$_SESSION["t"];
   }
   else
   {
       $tipo=$_SESSION["t"];
   }

   $campo=obtenerget("campo");
   $campo2=obtenerget("campo2");
   $campo3=obtenerget("campo3");
   $sql=obtenerget("sql");
   $foco=obtenerget("foco");
   $tipo=obtenerget("tipo");
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
      $campoint2=$campo2;
      $campoint3=$campo3;
      $focoint=$foco;
      $tipoint=$tipo;
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
  $i=1;
?>
    <input name="sqlint" type="hidden" id="sqlint" value="<?print $sqlint;?>">
    <input name="campoint" type="hidden" id="campoint" value="<?print $campoint;?>">
    <input name="condicion" type="hidden" id="condicion" value="<?print $condicion;?>">
    <BR>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr>
      <td>
  <table width="402" align="center">
  <tr>
    <td align="center" class="tpButtons">Opciones de B&uacute;squeda </td>
    </tr>
  <tr valign="middle">
   <td height="32" class="recuadro"><font face="verdana">&nbsp;&nbsp;&nbsp;Filtar por:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
       <input name="filtroint" type="text" id="filtro2" value="<?print $filtroint;?>" size="30" maxlength="200" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'">
    <input type="submit" name="Submit" value="Filtrar">	  </td>
    </tr>
  </table>
 </td>
    </tr>
    <tr>
      <td align="center">
  <div style="width:450px; height:301px; border:0px solid #CCCCCC" >
    <table width="100%" border="0" bordercolor="#000000" id="TablaCatalogo"  class="recuadro">
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
   </td>
    </tr>
  </table>
  <p>&nbsp;  </p>
  <p>&nbsp;</p>
  <input type="hidden" name="aux">
  <input type="hidden" name="valor" value="<?print $i;?>">
</form>
</body>
<script language="JavaScript">

   function aceptar(c,d,e)
   {
     f=opener.document.form1;
   var campo2='<? echo $campo2; ?>'
   var campoint2='<? echo $campoint2; ?>'
   var campoint3='<? echo $campoint3; ?>'
   var foco='<?print $foco; ?>';
   var focoint='<?print $focoint; ?>';
   <?
   if ($campo=="")
   {
   ?>
   f.<?print $campoint; ?>.value=c;
   if (campoint2=='x'){ }
   else
   {
   f.<?print $campoint2; ?>.value=d;
   f.<?print $campoint3; ?>.value=e;

   }

   if (focoint!='submit'){
     f.<?print $focoint; ?>.focus();
     f.<?print $focoint; ?>.select();
   }else{ opener.document.form1.submit(); }
   tipoint='<? echo $tipoint; ?>';
   if (tipoint=='G')
   {
     id='<?print $campoint; ?>';
    id2='<?print $campoint2; ?>';
    opener.repetido2(id,id2);
   }

   <?
   }
   else
   {
   ?>
   f.<?print $campo; ?>.value=c;
   if (campo2=='x'){ }
   else
   {
   f.<?print $campo2; ?>.value=d;
   //alert('<?print $campo3; ?>'+"-"+e);

   f.<?print $campo3; ?>.value=e;
   }

   if (foco!='submit'){
   f.<?print $foco; ?>.focus();
   f.<?print $foco; ?>.select();
   }else{ opener.document.form1.submit(); }

   tipo='<? echo $tipo; ?>';
   if (tipo=='G')
   {
     id='<?print $campo; ?>';
    id2='<?print $campo2; ?>';
    opener.repetido2(id,id2);
   }

   <?
   }
   ?>
   close();
   }

   function enviar()
   {
     f=document.form1;
   f.action="catalogo3.php";
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
