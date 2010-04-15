<?
session_start();
//   require_once("../../../lib/genegociocatalogo.php");
   require_once('../../lib/bd/basedatosAdo.php');
   require_once('../../lib/general/Herramientas.class.php');
   require_once('../../lib/general/funciones.php');
   require_once('../../lib/general/funciones2.php');
   $obj=new negociocatalogo2();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $_GET["titulo"]; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">

</head>

<style type="text/css">
.distabla tr:hover {	background-color: #DFE7F2;	color: #000000;}
.distabla tr.resaltar {	background-color: #DFE7F2;	color: #000000;}
.distabla td {	border: 1px solid #CCCCCC;}
.distabla th {	border: 1px solid #CCCCCC;
                background-color: #CCCCCC;}


</style>

<body>

<?php
$sql = H::GetPost('sql');
$sqlget=$sql;

$campo = H::GetPost('campo');
/*if(!empty($sql))
	$_SESSION["sql"]=$sql;
else
	$sql=$_SESSION["sql"];*/
$filtros = $obj->sacarfiltros($sql);
?>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	$sqlnew=$sql;
	foreach($filtros as $k => $f){
	  $valfiltro = H::GetPost(str_replace(".","_",trim($f)));
	  $obj->transf($sqlnew,$valfiltro,$f);
	}
	$sql=$sqlnew;

}
?>


<form name="form1" method="post" action="../../lib/general/catalogoobj.php?campo=<?php echo $campo;?>">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr>
      <td><table width="80%" align="center">
  <tr>
    <td align="center" class="tpButtons">Opciones de B&uacute;squeda </td>
    </tr>
  <tr valign="middle">
    <?php foreach($filtros as $k => $f) { ?>
    <tr valign="middle">
    <td height="32" class="recuadro"><font face="verdana">&nbsp;&nbsp;&nbsp;<? echo ucfirst($k); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
       <input name="<? echo $f; ?>" type="text" id="<? echo $f; ?>" value="<? echo H::GetPost($f); ?>" size="30" maxlength="200" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'">
    </td>
    </tr>
  <?php }?>
  <tr>
    <td>
  <input type="button" name="Button" value="Filtrar" onClick="enviar();">
  <input type="hidden" name="sql" value="<?php echo $sqlget;?>">
  </td>
  </tr>
    <tr>
      <td align="center">
    <div class="div_catalogo">
      <table width="100%" height="100" border="0" bordercolor="#000000" id="TablaCatalogo"  class="recuadro" align="center">
      <td align="center"><tr align="center">
      <?
  if ($sql!="")
  {
     $obj->mostrar($sql,$filtros);
  }
  $cuantasfilas = $obj->numerofilas();
  $arreglo      = $obj->devuelve_arreglo();
  $numcampos    = $obj->numerocampos();
  ?>
    </table>
     </div>
      </td>
    </tr>
  </table>

  <p>&nbsp;  </p>
  <p>&nbsp;</p>
  <!--input type="hidden" name="aux"-->

  </tr></td>
</form>
</body>

<script language="JavaScript">

   function enviar()
   {
     f=document.form1;
   //f.action="catalogo2.php";
   //document.getElementById("filtro2").value

   f.submit();
   }
</script>


<script language="JavaScript">

   function aceptar(c,d)
   {
	 f=opener.document;
     if(c!="")
        f.getElementById('<?php echo $campo?>').value=d;

     close();
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
