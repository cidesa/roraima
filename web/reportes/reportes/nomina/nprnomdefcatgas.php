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
require_once("../../lib/general/funciones.php");
$bd=new basedatosAdo();


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
          <table width="647"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Listado
                      de Prenomina por Categoria y Tipo de Gasto
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
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo Empleado :</strong></div></td>
			  <td>
                  <div align="left">
                    <input name="codempdes" type="text" value="<?
				$sql="SELECT min(CODEMP) as cod FROM NPASICAREMP";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codempdes" size="20" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo1('codempdes');">
                </div></td>
              <td><input name="codemphas" type="text" value="<?
				$sql="SELECT max(CODEMP) as cod FROM NPASICAREMP";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codemphas" size="20" maxlength="20">
                  <input type="button" name="Button2" value="..." onClick="catalogo1('codemphas');">
              </td>
            </tr>

            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>C&oacute;digo del Cargo :</strong></td>
			  <td>
                  <div align="left">
                    <input name="codcardes" type="text" value="<?
				$sql="SELECT min(CODcar) as cod FROM NPASICAREMP where (nomcar<>'')";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codcardes" size="20" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo2('codcardes');">
                </div></td>
              <td><input name="codcarhas" type="text" value="<?
				$sql="SELECT max(CODcar) as cod FROM NPASICAREMP where (nomcar<>'')";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codcarhas" size="20" maxlength="20">
                  <input type="button" name="Button2" value="..." onClick="catalogo2('codcarhas');">
              </td>
            </tr>

            <tr>
              <td class="form_label_01"><strong>C&oacute;digo Gasto :</strong></td>
			  <td>
                  <div align="left">
                    <input name="codgasdes" type="text" value="<?
				$sql="SELECT min(codtipgas) as cod FROM NPTIPGAS ";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codgasdes" size="20" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo3('codgasdes');">
                </div></td>
              <td><input name="codgashas" type="text" value="<?
				$sql="SELECT max(codtipgas) as cod FROM NPTIPGAS ";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codgashas" size="20" maxlength="20">
                  <input type="button" name="Button2" value="..." onClick="catalogo3('codgashas');">
              </td>
            </tr>

            <tr>
              <td class="form_label_01"><strong>C&oacute;digo Concepto :</strong></td>
			  <td>
                  <div align="left">
                    <input name="codcondes" type="text" value="<?
				$sql="SELECT min(CODCON) as cod FROM NPASICONEMP";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codcondes" size="20" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo4('codcondes');">
                </div></td>
              <td><input name="codconhas" type="text" value="<?
				$sql="SELECT max(CODCON) as cod FROM NPASICONEMP";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codconhas" size="20" maxlength="20">
                  <input type="button" name="Button2" value="..." onClick="catalogo4('codconhas');">
              </td>
            </tr>

            <tr>
              <td class="form_label_01"><strong>Tipo de Nomina  :</strong></td>
              <td colspan="2">
                  <select name="tipnom" class="breadcrumb" id="tipnom">
                    <?
					$tb2=$bd->select("SELECT distinct(a.CODNOM),upper(a.NOMNOM) as nombre FROM npnomina a,npasicaremp b where a.codnom=b.codnom  order by a.CODNOM");
				  	while(!$tb2->EOF)
					{
				  ?>
                    <option value="<? print $tb2->fields["codnom"];?>"><? print $tb2->fields["codnom"].' - '.$tb2->fields["nombre"];?></option>
                    <?
				  		$tb2->MoveNext();
					}
				  ?>
                </select></td>
            </tr>
<tr>

              <td height="26" class="form_label_01"> <div align="left"><strong>Nomina
                  Especial:</strong></div></td>
              <td colspan="2" valign="middle"> <select name="especial" class="breadcrumb" id="especial">
                  <option value="N" selected="selected">No</option>
                  <option value="S">Si</option>
                </select></td>

</tr>

	 <tr>
              <td class="form_label_01"><strong>Tipo de Nomina Especial :</strong></td>
              <td colspan="2">
                  <select name="tipnomesp" class="breadcrumb" id="tipnomesp">
                    <?
					$tb2=$bd->select("SELECT distinct(a.CODNOMESP),upper(a.DESNOMESP) as nombre FROM npnomesptipos a order by a.CODNOMESP"); 
				  	while(!$tb2->EOF)
					{
				  ?>
                    <option value="<? print $tb2->fields["codnomesp"];?>"><? print $tb2->fields["codnomesp"].' - '.$tb2->fields["nombre"];?></option>
                    <?
				  		$tb2->MoveNext();
					}
				  ?> 
                </select></td>
            </tr>
	
            <tr>
              <td class="form_label_01"><strong>Elaborado Por: </strong></td>
              <td colspan="2"><input name="elaborado" type="text" class="breadcrumb" id="elaborado" value="" size="60"></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Revisado Por: </strong></td>
              <td colspan="2"><input name="revisado" type="text" class="breadcrumb" id="revisado" value="" size="60"></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Autorizado Por: </strong></td>
              <td colspan="2"><input name="autorizado" type="text" class="breadcrumb" id="autorizado" value="" size="60"></td>
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
	f.titulo.value="Nomina de Pago por Categoria y Tipo de Gasto";
	f.action="rnprnomdefcatgas.php";
	f.submit();
}
function cerrar()
{
	window.close();
}

   function catalogo1(campo)
   {
      pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT distinct(CODEMP) as Codigo,UPPER(nomemp) as Nombre FROM NPASICAREMP order by codemp";
	  window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
   }
      function catalogo2(campo)
   {
      pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT distinct(CODcar) as Codigo,UPPER(nomcar) as Nombre FROM NPASICAREMP order by codcar";
	  window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
   }
      function catalogo3(campo)
   {
      pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT codtipgas as Codigo, destipgas as Nombre FROM NPTIPGAS ORDER BY CODTIPGAS";
	  window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
   }
      function catalogo4(campo)
   {
      pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT distinct(CODCON) as Codigo,upper(NOMCON) as Nombre FROM NPASICONEMP order by CODCON";
	  window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
   }
</script>
</html>
<?php
$bd->closed();
?>
