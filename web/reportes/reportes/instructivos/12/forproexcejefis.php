<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>
<style type="text/css">
<!--
.style1 {color: #0000CC}
-->
</style>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();

function LlenarTextoSql($sql,$campo1,$con)
  {
     $tb=$con->select($sql);
	 if (!$tb->EOF)
	 {
	   print $tb->fields[$campo1];    
	 }
	 else
	 {
	   print "";  
	 }
  }
  
  function LlenarComboSql($sql,$campo0,$campo1,$campo2,$seleccionado,$con)
  {
     $tb=$con->select($sql);
	 while (!($tb->EOF))
	 {
	   if ($tb->fields[$campo0]==$seleccionado)
	      {
	   ?>
	      <option value="<? print $tb->fields[$campo1];?>" selected><? print substr($tb->fields[$campo2],0,60);?></option>
	   <?  
	      }
	   else
	      {/*
	   ?>
	      <option value="<? print $tb->fields[$campo1];?>"><? print substr($tb->fields[$campo2],0,65);?></option>
	   <?   
		  */}   
	   $tb->MoveNext();	  
	 }
  }
?>
<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr> 
      <td width="190" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></a></td>
      <td colspan="2" class="cell_date" align="right">
		<? 
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacute;bado");
		$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$me=$mes[date('n')];
		echo $dias[date('w')].strftime(", %d de $me del %Y")."<br>"; 
		?>          
		</td>
    </tr>
    <tr> 
      <td width="313">&nbsp; </td>
      <td width="257" align="right" valign="middle" class="cell_logout">&nbsp;</td>
    </tr>
  </table>
  <table width="760"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr> 
      <td width="6" align="left" valign="top" class="cell_left_line02"><img src="../../img/center02_tl.gif" width="6" height="6"></td>
      <td rowspan="2" valign="top" class="cell_padding_01"> <p class="breadcrumb">Reportes 
        </p>
        <fieldset>
       
        <div align="left">&nbsp; 
          <table width="647" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>PROYECTOS QUE EXCEDEN EL EJERCICIO FISCAL  
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td width="194" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="181"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="258">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"> <div align="left"><strong>Salida del 
                  Reporte:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left"> <strong> 
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td> <strong> 
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
                IMPRESORA</strong></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios 
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Codigo de Empresa : </strong></td>
              <td colspan="2"><input name="codemp" type="text"  value="<?
				$sql="select codemp from empresa";
                LlenarTextoSql($sql,"codemp",$bd);				
				?>" class="breadcrumb" id="codemp" size="20" maxlength="20"></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Nombre Empresa :</strong></td>
              <td colspan="2"><input name="nomemp" type="text"  value="<?
				$sql="select nomemp from empresa";
                LlenarTextoSql($sql,"nomemp",$bd);				
				?>" class="breadcrumb" id="nomemp" size="50" maxlength="50"></td>
            </tr>
            <tr>
              
			  <td class="form_label_01"><strong>Proyecto   :</strong></td>
			  <?
			  $tb2=$bd->select("select codpro, nompro from fordefpry order by codpro asc");	
			  $proyecto=$_POST["proyecto"];	
			  $accesp=$_POST["accesp"];
			  ?>
              <td colspan="2"><select name="proyecto" class="breadcrumb" id="proyecto" onChange="recargar()" >
                  <option value="" selected>(Seleccione una opcion)</option>
				  <?				   
				  
				   while (!$tb2->EOF)
				   { 
				  if ($proyecto==$tb2->fields["codpro"])
				  {
				  ?>
				  <option value="<? print $tb2->fields["codpro"];?>" selected><? print $tb2->fields["codpro"]." - ".substr($tb2->fields["nompro"],0,60);?></option>					  
				  <? }
				  else{
				  ?>
				  	
				  <option value="<? print $tb2->fields["codpro"];?>" ><? print $tb2->fields["codpro"]." - ".substr($tb2->fields["nompro"],0,60);?></option>
              	  <? }
				  $tb2->MoveNext();
				  }
				  
				  ?>
			  	  </select></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Acci&oacute;n Espec&iacute;fica   :</strong></td>
              <td colspan="2"><select name="accesp" class="breadcrumb" id="accesp" onChange="recargar()"  >
                  <?					
				   $tb=$bd->select("select codaccesp, desaccesp from fordefaccesp where rtrim(codpro)=rtrim('".$proyecto."')order by codaccesp asc");					
				   
				   while (!$tb->EOF)
				   { 
				   if ($accesp==$tb->fields["codaccesp"])
				  	{
				  	?>
				  		<option value="<? print $tb->fields["codaccesp"];?>" selected><? print $tb->fields["codaccesp"]." - ".substr($tb->fields["desaccesp"],0,60);?></option>					  
				  	<? }
				  	else{
				  	?>
				  	  	<option value="<? print $tb->fields["codaccesp"];?>"> <? print $tb->fields["codaccesp"]." - ".substr($tb->fields["desaccesp"],0,60);?></option>
              	  	<? }
				  	$tb->MoveNext();
				  	}
				  
				  	?>
              </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">&nbsp;</td>
            </tr>
          </table>
        </div>
        <div align="left">&nbsp; </div>
        </fieldset>
        <table width="356"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
          <tr> 
            <td width="38" rowspan="3" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="258"><img src="../../img/box01_tl.gif" width="6" height="6"></td>
            <td width="60" align="right"><img src="../../img/box01_tr.gif" width="6" height="6"></td>
          </tr>
          <tr> 
            <td colspan="2" align="center"><input name="Button" type="button" class="form_button01" value="Generar" onClick="enviar()"> 
              <input name="Button" type="button" class="form_button01" value="   Salir    " onClick="cerrar()"> </td>
          </tr>
          <tr> 
            <td><img src="../../img/box01_bl.gif" width="6" height="6"></td>
            <td align="right"><img src="../../img/box01_br.gif" width="6" height="6"></td>
          </tr>
        </table></td>
      <td width="6" align="right" valign="top"><img src="../../img/center01_tr.gif" width="6" height="6"></td>
      <td width="40" rowspan="2" align="center" bgcolor="#EEEEEE">&nbsp;</td>
    </tr>
    <tr> 
      <td align="left" valign="bottom" class="cell_left_line02"><img src="../../img/center02_bl.gif" width="6" height="6"></td>
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="6" height="6"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	if (f.accesp.value=='')
	{
		alert("Faltan datos");
		location="forproexcejefis";
	}
	else
	{
	f.titulo.value="PROYECTOS QUE EXCEDEN EL EJERCICIO FISCAL";
	f.action="rforproexcejefis.php";
	f.submit();
	}
}
function recargar()
{
	f=document.form1;
	f.action="forproexcejefis.php";
	f.submit();	
}

function cerrar()
{
	window.close();
}
</script>
</html>
