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
          <table width="612"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>HISTORICO REPORTE POR ACTIVIDAD
                      <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"><font color="#00FFCC">&nbsp; </font></td>
            </tr>
			<tr bordercolor="#FFFFFF">
            <td colspan="3" >
			  <div align="center">
			    <table border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#6699CC">
                <tr bordercolor="#6699CC">
                  <td width="186" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
                  <td width="174"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
                  <td width="238">&nbsp;</td>
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
			      </table>
		      </div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td width="187" class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="10" colspan="3" bordercolor="#FFFFFF" class="form_label_01"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td width="180"><strong>DESDE</strong></td>
              <td width="244"><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo
                  Nivel:</strong></div></td>
              <td> <div align="left">


                <input name="codnivdes" type="text"  value="<?
                $sql="SELECT min(CODCAT) as codcat FROM  NPCATPRE";
                LlenarTextoSql($sql,"codcat",$bd);
				?>" class="breadcrumb" id="codnivdes" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo1('codnivdes');">

                </div></td>
              <td>

              <input name="codnivhas" type="text"  value="<?
                $sql="SELECT max(CODCAT) as codcat FROM  NPCATPRE";
                LlenarTextoSql($sql,"codcat",$bd);
				?>" class="breadcrumb" id="codnivhas" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo1('codnivhas');">

               </td>
            </tr>
            <tr>
              <td class="form_label_01"><div align="left"><strong>C&oacute;digo
                Concepto:</strong></div></td>
              <td><div align="left">

              	<input name="codcondes" type="text"  value="<?
                $sql="SELECT min(CODCON) as codcon FROM NPNOMCAL ";
                LlenarTextoSql($sql,"codcon",$bd);
				?>" class="breadcrumb" id="codcondes" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo2('codcondes');">

              </div></td>
              <td>
              	<input name="codconhas" type="text"  value="<?
                $sql="SELECT max(CODCON) as codcon FROM NPNOMCAL ";
                LlenarTextoSql($sql,"codcon",$bd);
				?>" class="breadcrumb" id="codconhas" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo2('codconhas');">


              </td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Tipo N&oacute;mina:</strong></div></td>
              <td colspan="2"> <div align="left">
                  <?

			  	$tb=$bd->select("SELECT DISTINCT A.CODNOM,B.NOMNOM
								FROM NPNOMCAL A,NPNOMINA B
								WHERE A.CODNOM=B.CODNOM
								ORDER BY A.CODNOM");
			  ?>
                  <select name="tipnom" class="breadcrumb" id="tipnom">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["codnom"];?>"><? print $tb->fields["codnom"]." - ".$tb->fields["nomnom"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
            </tr>

            </tr>
			 <tr>

              <td height="26" class="form_label_01"> <div align="left"><strong>Nomina
                  Especial:</strong></div></td>
              <td colspan="2" valign="middle"> <select name="especial" class="breadcrumb" id="especial">
                  <option value="N" selected="selected">No</option>
                  <option value="S">Si</option>
                </select></td>


		 <tr>
              <td class="form_label_01"><div align="left"><strong>Tipo de Nomina Especial:</strong></div></td>
              <td><div align="left">
                <input name="tipnomesp" type="text"  value="<?
        $sql="SELECT min(CODNOMESP) as codnom from NPNOMESPTIPOS where trim(codnomesp)!=''";
                LlenarTextoSql($sql,"codnom",$bd);
        ?>" class="breadcrumb" id="tipnomesp" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo3('tipnomesp');">
              </div></tr>

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
              <td class="form_label_01"><strong>Elaborado Por: </strong></td>
              <td ><input name="elaborado" type="text" class="breadcrumb" id="elaborado" value="Ingrid Hermoso" size="30"></td>
              <td ><input name="elaboradocar" type="text" class="breadcrumb" id="elaboradocar" value="Analista de Personal" size="30"></td>

            <tr>
              <td class="form_label_01"><strong>Revisado Por: </strong></td>
              <td ><input name="revisado" type="text" class="breadcrumb" id="revisado" value="Lic. Reinier Parra " size="30"></td>
              <td><input name="revisadocar" type="text" class="breadcrumb" id="revisadocar" value="Director(E) Recursos Humanos" size="30"></td>

            </tr>


            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
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
	f.titulo.value="HISTORICO REPORTE POR ACTIVIDAD";
	f.action="rhistnprconniv.php";
	f.submit();
}

function cerrar()
{
	window.close();
}
function catalogo1(campo)
{
 	mysql='SELECT distinct CODCAT ,NOMCAT FROM  NPCATPRE ORDER BY CODCAT';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}
function catalogo2(campo)
{
 	mysql='SELECT DISTINCT CODCON,NOMCON FROM NPNOMCAL ORDER BY CODCON';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}
function catalogo3(campo)
   {
      mysql='SELECT distinct(CODNOMESP) as Codigo, DESNOMESP as Nomina FROM NPNOMESPTIPOS order by CODNOMESP';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
    window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }


</script>
</html>
