<? 
//session_destroy(); // Las sesiones se pierden si el usuario cierra el navegador o si se
session_start();

if (!empty($_GET["var"])) //Cerrar Sesion
	{
		  session_unset();
		  session_destroy();   //Las sesiones se pierden si el usuario cierra el navegador o si se	
		  	  		  
		  session_start();
	}


function real_path($path)
{
   if ($path == "")
   {
       return false;
   }

   $path = trim(preg_replace("/\\\\/", "/", (string)$path));

   if (!preg_match("/(\.\w{1,4})$/", $path)  && 
       !preg_match("/\?[^\\/]+$/", $path)  && 
       !preg_match("/\\/$/", $path))
   {
       $path .= '/';
   }

   $pattern = "/^(\\/|\w:\\/|https?:\\/\\/[^\\/]+\\/)?(.*)$/i";

   preg_match_all($pattern, $path, $matches, PREG_SET_ORDER);

   $path_tok_1 = $matches[0][1];
   $path_tok_2 = $matches[0][2];

   $path_tok_2 = preg_replace(
                   array("/^\\/+/", "/\\/+/"),
                   array("", "/"),
                   $path_tok_2);

   $path_parts = explode("/", $path_tok_2);
   $real_path_parts = array();

   for ($i = 0, $real_path_parts = array(); $i < count($path_parts); $i++)
   {
       if ($path_parts[$i] == '.')
       {
           continue;
       }
       else if ($path_parts[$i] == '..')
       {
           if (  (isset($real_path_parts[0])  &&  $real_path_parts[0] != '..')
               || ($path_tok_1 != "")  )
           {
               array_pop($real_path_parts);
               continue;
           }
       }

       array_push($real_path_parts, $path_parts[$i]);
   }

   return $path_tok_1 . implode('/', $real_path_parts);
}

$_SESSION["x"]=real_path(dirname(__FILE__));
require($_SESSION["x"].'lib/bd/basedatosAdo.php');
//require($_SESSION["x"].'lib/general/tools.php');
//require($_SESSION["x"].'lib/general/funciones.php');
//require($_SESSION["x"].'lib/general/funciones2.php');
//require($_SESSION["x"].'adodb/adodb-exceptions.inc.php');

$bd=new basedatosAdo('011');

	

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Inicie Sesi&oacute;n - SIGA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK media=all href="./lib/css/base.css" type=text/css rel=stylesheet>
<link href="./lib/css/siga.css" rel="stylesheet" type="text/css">
<link rel="STYLESHEET" type="text/css"  href="./lib/general/toolbar/css/dhtmlXToolbar.css">
<link  href="./lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript"  src="./lib/general/js/fecha.js"></script>
<script language="JavaScript" src="./lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript" src="./lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="./lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript" src="./lib/general/toolbar/js/dhtmlXCommon.js"></script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>
<body>
<p><br>
</p>
<table width="20%" border="0" align="center">
  <tr>
    <td><img src="./images/login_logo_01.jpg" width="300" height="200"></td>
  </tr>
  <tr>
    <td><table width="300"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="6" valign="top"><img src="./images/box02_tl.gif" width="6" height="6"></td>
        <td width="488" class="box02_tline"><img src="./images/spacer.gif" width="5" height="5"></td>
        <td width="6" valign="top"><img src="./images/box02_tr.gif" width="6" height="6"></td>
      </tr>
      <tr>
        <td class="box02_lline"><span class="box02_tline"><img src="./images/spacer.gif" width="1" height="100"></span></td>
        <td valign="middle" bgcolor="#FFFFFF" class="intd">
		<form name="form1" method="post" action="./lib/general/validar_usuario.php">
		<table width="280"  border="0" align="center" cellpadding="2" cellspacing="0" >
          <tr>
            <td class="nuevo">Nombre de Usuario:</td>
            <td><input name="loguse" type="text" id="loguse2" size="18"></td>
          </tr>
          <tr>
            <td class="form_label_01">Contrase&ntilde;a:</td>
            <td><input name="pasuse" type="password" id="pasuse" size="18"></td>
          </tr>
          <tr>
            <td class="form_label_01">Seleccione Empresa </td>
            <td>
              <select name="codemp" class="Order" id="codemp">
                <option value="" selected="selected">Seleccione</option>
                <?
   			  $sql="select CODEMP,NOMEMP from ".chr(34)."SIMA_USER".chr(34).".EMPRESA order by NOMEMP";
			  $tb=$bd->select($sql);
			  while(!$tb->EOF){
			  
			  ?>
                <option value="<? echo $tb->fields["codemp"]; ?>"><? echo $tb->fields["nomemp"]; ?></option>
                <? 
						$tb->MoveNext(); 
						} 						
						$bd->closed(); 
				?>
              </select>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="Ingresar"></td>
          </tr>
        </table></form></td>
        <td class="box02_rline">&nbsp;</td>
      </tr>
      <tr>
        <td valign="bottom"><img src="./images/box02_bl.gif" width="6" height="6"></td>
        <td class="box02_bline"><img src="./images/spacer.gif" width="5" height="5"></td>
        <td valign="bottom"><img src="./images/box02_br.gif" width="6" height="6"></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
