<?
session_start();
//   require_once("../../../lib/genegociocatalogo.php");
   require_once('../../lib/bd/basedatosAdo.php');
   //require_once('../../lib/general/funciones.php');
   require_once('../../lib/general/Catalogo.class.php');
   require_once('../../lib/general/Herramientas.class.php');
   $objcatalogo = new Catalogo();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Catálogo</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">

</head>

<style type="text/css">
.distabla tr:hover {  background-color: #DFE7F2;  color: #000000;}
.distabla tr.resaltar {  background-color: #DFE7F2;  color: #000000;}
.distabla td {  border: 1px solid #CCCCCC;}
.distabla th {  border: 1px solid #CCCCCC;
                background-color: #CCCCCC;}


</style>

<body>


<?php

$id = H::GetPost('id');
$pos = H::GetPost('pos');

$filtros = array();

if($id!=''){
  $catalogo = $_SESSION[$id];
  $sql = $catalogo[$pos][0];
  $filtros = $catalogo[$pos][1];
  $objresp = $catalogo[$pos][2];
  //H::PrintR($filtros);
  $camporesp = $catalogo[$pos][3];
  $limite = $catalogo[$pos][4];
}


foreach($filtros as $k => $f){
  $valfiltro = H::GetPost('V_'.$k);
  $sql = str_replace('V_'.$k, strtoupper($valfiltro),$sql);
}

if($_SERVER['REQUEST_METHOD']=='GET'){
  $sql .= ' LIMIT '.$limite;
}

?>
<form name="form1" method="post" action="../../lib/general/Catalogo.php?id=<?echo $id;?>&pos=<?echo $pos;?>">

  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr>
      <td><table width="80%" align="center">
  <tr>
    <td align="center" class="tpButtons">Opciones de B&uacute;squeda </td>
    </tr>

  <?php foreach($filtros as $k => $f) { ?>
    <tr valign="middle">
    <td height="32" class="recuadro"><font face="verdana">&nbsp;&nbsp;&nbsp;<? echo $f!='' ? $f : H::GetPost('V_'.$k); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
       <input name="V_<? echo $k; ?>" type="text" id="V_<? echo $k; ?>" value="<? echo H::GetPost('V_'.$k); ?>" size="30" maxlength="200" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'">
    </td>
    </tr>
  <?php } ?>
  <tr>
    <td>
  <input type="button" name="Button" value="Filtrar" onClick="enviar();">
  </td>
  </tr>
  </table></td>
    </tr>
    <tr>
      <td align="center">
    <div class="div_catalogo">
      <table width="100%" height="100" border="0" bordercolor="#000000" id="TablaCatalogo"  class="recuadro" align="center">
      <td align="center"><tr align="center">
      <?
  if ($sql!="")
  {
     $objcatalogo->mostrar($sql, $objresp, $camporesp);
  }
  $cuantasfilas=$objcatalogo->numerofilas();
  $arreglo=$objcatalogo->devuelve_arreglo();
  $numcampos=$objcatalogo->numerocampos();
  ?>
    </table>
     </div>
      </td>
    </tr>
  </table>

  <p>&nbsp;  </p>
  <p>&nbsp;</p>
  </tr></td>
</form>
</body>

<script language="JavaScript">

   function enviar()
   {
     f=document.form1;
     f.submit();
   }
</script>

<script language="JavaScript">

   function aceptar(c,d)
   {
     f=opener.document;

     for(var i=0;i<c.length;i++) {
       if(c[i]!=""){
        f.getElementById(c[i]).value=d[i];
       }
     }
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

</script>
</html>

