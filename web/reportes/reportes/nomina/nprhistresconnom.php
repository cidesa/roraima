<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
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
          <table width="689"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <!--DWLayoutTable-->
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>HISTORICO RESUMEN DE  CONCEPTOS POR NOMINA
                <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td width="212" class="form_label_01">&nbsp;</td>
              <td width="198">&nbsp;</td>
              <td width="273"><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td>&nbsp;</td>
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
              <td class="form_label_01"> <div align="left"><strong>Tipo Concepto:</strong></div></td>
              <td colspan="2"> <div align="left">
                  <select name="tipcon" class="breadcrumb" id="tipcon">
                    <option value="%">Todos</option>
                    <option value="A">Asignaciones</option>
                    <option value="D">Deducciones</option>
                    <option value="p">Aportes</option>
                    <!--<option value="d">Descuentos</option>-->
                  </select>
                </div></td>
            </tr>





   <!-- codigo de nomina -->
            <tr>

             <td class="form_label_01"> <div align="left"><strong>C&oacute;digo
                  Nomina:</strong></div></td>
                <td> <div align="left">
               	<input name="con1" type="text" class="breadcrumb" id="con1"
                   value="<?$sql="SELECT min(CODNOM) as codnom FROM NPASICAREMP";
 					LlenarTextoSql($sql,"codnom",$bd); ?>" size ="20">
 					 <input type="button" name="Button6" value="..." onClick="catalogo4('con1');">
 			      </div></td>

              <td> <div align="left">
               	<input name="con2" type="text" class="breadcrumb" id="con2"
                   value="<?$sql="SELECT max(CODNOM) as codnom FROM NPASICAREMP";
 					LlenarTextoSql($sql,"codnom",$bd); ?>" size ="20">
 					 <input type="button" name="Button6" value="..." onClick="catalogo8('con2');">
 			      </div></td>
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
              <td class="form_label_01"><div align="left"><strong>Tipo de Nomina Especial:</strong></div></td>
              <td><div align="left">
                <input name="tipnomesp1" type="text"  value="<?
        $sql="SELECT min(CODNOMESP) as codnom from NPNOMESPTIPOS where trim(codnomesp)!=''";
                LlenarTextoSql($sql,"codnom",$bd);
        ?>" class="breadcrumb" id="tipnomesp1" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo2('tipnomesp1');">
              </div></td>

		 <td> <div align="left">
               	<input name="tipnomesp2" type="text" class="breadcrumb" id="tipnomesp2"
                   value="<?$sql="SELECT max(CODNOMESP) as codnom from NPNOMESPTIPOS where trim(codnomesp)!=''";
 					LlenarTextoSql($sql,"codnom",$bd); ?>" size ="20">
 					 <input type="button" name="Button3" value="..." onClick="catalogo2('tipnomesp2');">
 			      </div></td>

</tr>
<tr>
                 <td height="23" class="form_label_01"><strong>Per&iacute;odo de
                N&oacute;mina:</strong></td>
              <td> <div align="left"> </div>
                <div align="left">
                  <?

			  	$tb=$bd->select("SELECT to_char(MIN(fecnomdes),'DD/MM/YYYY') as fecha FROM nphiscon");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}

			  	$tb2=$bd->select("SELECT to_char(MAX(fecnom),'DD/MM/YYYY') as fecha FROM nphiscon");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}

				?>
                  <input name="fechades" type="text" class="breadcrumb" id="fechades" datepicker="true" value="<? print $fecini;?>">
                </div></td>
              <td><input name="fechahas" type="text" class="breadcrumb" id="fechahas" datepicker="true" value="<? print $fecdes;?>"></td>
            </tr>
                 <tr>
              <td class="form_label_01"><strong>DIRECCION DE RECURSOS HUMANOS: </strong></td>
              <td colspan="2"><input name="direccion" type="text" class="breadcrumb" id="direccion" value="" size="60"></td>
            </tr>
           <tr>
              <td class="form_label_01"><strong>DIRECCION DE PLANIFICACION Y PRESUPUESTO: </strong></td>
              <td colspan="2"><input name="elaborado" type="text" class="breadcrumb" id="elaborado" value="" size="60"></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>DIRECCION DE ADMINISTRACION: </strong></td>
              <td colspan="2"><input name="revisado" type="text" class="breadcrumb" id="revisado" value="" size="60"></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>CONTRALOR (A): </strong></td>
              <td colspan="2"><input name="autorizado" type="text" class="breadcrumb" id="autorizado" value="" size="60"></td>
            </tr>

            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">&nbsp;</td>
            </tr>



             <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>


            <td>&nbsp;</td>
            </tr>



           <!-- TIPO DE NOMINA
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Tipo de N&oacute;mina:</strong></div></td>
              <td colspan="2">
               <div align="left">
               	<input name="nom" type="text" class="breadcrumb" id="nom"
              		     value="<?$sql="select  min(codnom) as codnom from nphiscon";
 						LlenarTextoSql($sql,"codnom",$bd); ?>" size ="20">
 					 <input type="button" name="Button7" value="..." onClick="catalogo6('nom');">
 			      </div></td>
            </tr>
             -->
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
	f.titulo.value="HISTORICO RESUMEN DE CONCEPTOS POR NOMINA";
	f.action="r.php?m=<?php echo TraerModuloReporte()?>&r=<?php echo TraerNombreReporte()?>";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo8(campo)
   {

      mysql='SELECT distinct(CODNOM)as CODIGO,NOMNOM as DESCRIPCION FROM NPASICAREMP order by CODNOM desc';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
function catalogo4(campo)
   {

      mysql='SELECT distinct(CODNOM)as CODIGO,NOMNOM as DESCRIPCION FROM NPASICAREMP order by CODNOM';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
   function catalogo2(campo)
   {
      mysql='SELECT distinct(CODNOMESP) as Codigo, DESNOMESP as Nomina FROM NPNOMESPTIPOS order by CODNOMESP';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
    window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
</script>
</html>
