<? session_start(); ?>
<DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><? echo $forma; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">
<link rel="STYLESHEET" type="text/css"  href="../../lib/general/toolbar/css/dhtmlXToolbar.css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript"  src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type='text/javascript' src='../../lib/general/js/dFilter.js'></script>
<script type='text/javascript' src='../../lib/general/js/funciones.js'></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>
<?
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/tools.php');
validar(array(8,11,15),'compras','almordcom');            //Seguridad  del Sistema

$codemp = $_SESSION["codemp"];
$bd     = new basedatosAdo($codemp);
$z      = new tools();

  $modulo = "";
  $forma  = "Comprobantes";
  $modulo = $_SESSION["modulo"] . " > Contabilidad Financiera > ".$forma;
  $block  = "1";

  $fecini = iif($_POST["fecini"]!='',$_POST["fecini"],$_GET["fecini"]);
  $dia    = substr($fecini,0,1);
  $ano    = substr($fecini,6,4);
  $feccie = iif($_POST["feccie"]!='',$_POST["feccie"],$_GET["feccie"]);
  $fecha  = iif($_POST["feccie"]!='',$_POST["feccie"],$_GET["feccie"]);
  $_SESSION["esquemaorigen"]  = iif($_POST["esquemaorigen"]!='',$_POST["esquemaorigen"],$_SESSION["esquemaorigen"]);
  $_SESSION["esquemadestino"]  = iif($_POST["esquemadestino"]!='',$_POST["esquemadestino"],$_SESSION["esquemadestino"]);

//  $numero = $ref="CIEJ".$ano;
  $desc   = "Comprobante de Cierre del Ejercicio Actual";
  $tipcom = "CON";
  $comprobante=$_GET["comprobante"];


     $sql="select codres, codresant from contaba";
    if ($tb=$z->buscar_datos($sql))
    {
      $resultado= $tb->fields["codres"];
      $resultado_anterior= $tb->fields["codresant"];
    }

    $sql="select descta from contabb where codcta='$resultado'";
    if ($tb=$z->buscar_datos($sql))
    {
      $descta= $tb->fields["descta"];
    }

    if (!empty($fecini))
    {
       if (((!Verificar_Diferidos()) and Cargar_Cuentas()) and Verificar_Comprobante($numero))
       {
       		if ($_GET["comprobante"]=='1')
       		{
       		    $numero='CIERREIN';
       			Generar_Comprobante_CierreIng('CIERREIN');
       			irPagina('contabilidad','ConFinComGen.php?comprobante=2&fecini='.$fecini.'&feccie='.$fecha.'');

       		}else if ($_GET["comprobante"]=='2'){
       		    $numero='CIERRERE';
       			Generar_Comprobante_CierreRes('CIERRERE');
       		}else{
                $numero='CIERREEG';
       			Generar_Comprobante_CierreEgr('CIERREEG');
       			irPagina('contabilidad','ConFinComGen.php?comprobante=1&fecini='.$fecini.'&feccie='.$fecha.'');
       		}

    	}else{
       		Regresar('ConFinCie.php');
    	}
    }else{
       Regresar('ConFinCie.php');
    }


	function Generar_Comprobante_CierreRes($numero)
    {
       global $z;
       global $feccie;
       global $fecini;
       global $resultado;
       global $resultado_anterior;
       global $descta;
       global $grid1;
       global $grid2;
       global $grid3;
       global $grid4;
       global $grid5;
       global $cont;
       global $check;
       global $totalD;
       global $totalC;

       if (Verificar_Comprobante($numero))
       {
          $sql="select B.CODCTA as CODCTA,B.DESCTA as DESCTA,A.SALACT as SALACT
		          FROM
			          CONTABB1 A,CONTABB B
		          WHERE
			         A.CODCTA=B.CODCTA AND
		          	 A.CODCTA LIKE '".trim($GLOBALS["egresos"])."%' and
		          	 A.PEREJE='".trim($GLOBALS["ultimoperiodo"])."' AND
		          	 A.SALACT<>0 AND
		          	 B.CARGAB='C'
		          ORDER BY
		          	B.CODCTA";


          if ($tb2=$z->buscar_datos($sql))
          {
            $check='1';
            $cont=0;
            $i=0;
            $grid1="";
            $grid2="";
            $grid3="";
            $grid4="";
            $grid5="";

            $i=$i+1;
            $cont=$i;
//////
			 $sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
	                	WHERE A.CODCTA=B.CODCTA AND
	                	A.CODCTA LIKE '".trim($GLOBALS["ingresos"])."%' AND
	                	A.PEREJE='".trim($GLOBALS["ultimoperiodo"])."' AND B.CARGAB='C'";

	         if ($tb=$z->buscar_datos($sql))
	         {
	         	$toting = abs($tb->fields["total"]);
	         }
/////
			 $sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
	                	WHERE A.CODCTA=B.CODCTA AND
	                	A.CODCTA LIKE '".trim($GLOBALS["egresos"])."%' AND
	                	A.PEREJE='".trim($GLOBALS["ultimoperiodo"])."' AND B.CARGAB='C'";


	         if ($tb=$z->buscar_datos($sql))
	         {
	         	$totegr = abs($tb->fields["total"]);
	         }

			$monres = $toting - $totegr;
            $grid1[$i]=$resultado;
            $grid2[$i]=$descta;
            $grid3[$i]=$numero;
            //D
            $grid4[$i]=$monres;
            $grid5[$i]=0;

			    $totalD = $totalD + $grid4[$i];
			    $totalC = $totalC + $grid5[$i];

			$i=$i+1;
			$cont=$i;
            $grid1[$i]=$resultado_anterior;
            $grid2[$i]=$descta;
            $grid3[$i]=$numero;
            //C
            $grid4[$i]=0;
            $grid5[$i]=$monres;

			    $totalD = $totalD + $grid4[$i];
			    $totalC = $totalC + $grid5[$i];
     	  }

    	}
    }



	function Generar_Comprobante_CierreIng($numero)
    {
       global $z;
       global $feccie;
       global $fecini;
       global $resultado;
       global $descta;
       global $grid1;
       global $grid2;
       global $grid3;
       global $grid4;
       global $grid5;
       global $cont;
       global $check;
       global $totalD;
       global $totalC;


       if (Verificar_Comprobante($numero))
       {
          $sql="select B.CODCTA as CODCTA,B.DESCTA as DESCTA,A.SALACT as SALACT
		          FROM
			          CONTABB1 A,CONTABB B
		          WHERE
			         A.CODCTA=B.CODCTA AND
		          	 A.CODCTA LIKE '".trim($GLOBALS["ingresos"])."%' and
		          	 A.PEREJE='".trim($GLOBALS["ultimoperiodo"])."' AND
		          	 A.SALACT<>0 AND
		          	 B.CARGAB='C'
		          ORDER BY
		          	B.CODCTA";

          if ($tb2=$z->buscar_datos($sql))
          {
            $check='1';
            $cont=0;
            $i=0;
            $grid1="";
            $grid2="";
            $grid3="";
            $grid4="";
            $grid5="";

            while (!$tb2->EOF)
            {
            	$i=$i+1;
            	$cont=$i;
				    $sql="select debcre from contabb where codcta='".$tb2->fields['codcta']."' and codcta like '".trim($GLOBALS["ingresos"])."%' ";
				    if ($tb=$z->buscar_datos($sql))
				    {
	            		$grid1[$i]=$tb2->fields["codcta"];
	            		$grid2[$i]=$tb2->fields["descta"];
	            		$grid3[$i]=$numero;

	            	if (strtoupper($tb->fields["debcre"])=='D')
	            	{
	            		//Colocarlo por el credito
	            		$grid4[$i]=0;
	              		$grid5[$i]=$tb2->fields["salact"];
	            	}
		            else
	            	{
	            		//Colocarlo por el debito
		            	$grid4[$i]=$tb2->fields["salact"]*(-1);
		            	$grid5[$i]=0;
	            	}
			    }
			    $totalD = $totalD + $grid4[$i];
			    $totalC = $totalC + $grid5[$i];
            	$tb2->MoveNext();
            }

            //Calculamos el Monto del Resultado del Ejercicio Actual e incluimos el asiento
			 $sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
	                	WHERE A.CODCTA=B.CODCTA AND
	                	A.CODCTA LIKE '".trim($GLOBALS["ingresos"])."%' AND
	                	A.PEREJE='".trim($GLOBALS["ultimoperiodo"])."' AND B.CARGAB='C'";

	         if ($tb=$z->buscar_datos($sql))
	         {
	         	$toting = abs($tb->fields["total"]);
	         }

		   	 $i=$i+1;
		   	 $cont=$i;
	       	 $grid1[$i]=$resultado;
           	 $grid2[$i]=$descta;
           	 $grid3[$i]=$numero;

	         if ($toting >= 0)
	         {
             //Comprobante.IncluirAsiento FILL(Resultado, " ", 32, 3), DesResultado, Comprob, "C", CDbl(MonRes)
              	$grid4[$i]=0;
              	$grid5[$i]=$toting;

	         }else{
             //Comprobante.IncluirAsiento FILL(Resultado, " ", 32, 3), DesResultado, Comprob, "D", CDbl(MonRes)
                $grid4[$i]=$toting*(-1);
              	$grid5[$i]=0;

	         }

			    $totalD = $totalD + $grid4[$i];
			    $totalC = $totalC + $grid5[$i];
       	}
       }
    }



	function Generar_Comprobante_CierreEgr($numero)
    {
       global $z;
       global $feccie;
       global $fecini;
       global $resultado;
       global $descta;
       global $grid1;
       global $grid2;
       global $grid3;
       global $grid4;
       global $grid5;
       global $cont;
       global $check;
       global $totalD;
       global $totalC;

       if (Verificar_Comprobante($numero))
       {
          $sql="select B.CODCTA as CODCTA,B.DESCTA as DESCTA,A.SALACT as SALACT
		          FROM
			          CONTABB1 A,CONTABB B
		          WHERE
			         A.CODCTA=B.CODCTA AND
		          	 A.CODCTA LIKE '".trim($GLOBALS["egresos"])."%' and
		          	 A.PEREJE='".trim($GLOBALS["ultimoperiodo"])."' AND
		          	 A.SALACT<>0 AND
		          	 B.CARGAB='C'
		          ORDER BY
		          	B.CODCTA";

          if ($tb2=$z->buscar_datos($sql))
          {
            $check='1';
            $cont=0;
            $i=0;
            $grid1="";
            $grid2="";
            $grid3="";
            $grid4="";
            $grid5="";

            $i=$i+1;
            $cont=$i;
			$sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
	                	WHERE A.CODCTA=B.CODCTA AND
	                	A.CODCTA LIKE '".trim($GLOBALS["egresos"])."%' AND
	                	A.PEREJE='".trim($GLOBALS["ultimoperiodo"])."' AND B.CARGAB='C'";

	         if ($tb=$z->buscar_datos($sql))
	         {
	         	$totegr = abs($tb->fields["total"]);
	         }

            $grid1[$i]=$resultado;
            $grid2[$i]=$descta;
            $grid3[$i]=$numero;
            //D
            $grid4[$i]=$totegr;
            $grid5[$i]=0;
			    	$totalD = $totalD + $grid4[$i];
			    	$totalC = $totalC + $grid5[$i];

            while (!$tb2->EOF)
            {
            	$i=$i+1;
				$cont=$i;
				    $sql="select debcre from contabb where codcta='".$tb2->fields['codcta']."' and codcta like '".trim($GLOBALS["egresos"])."%' ";
				    if ($tb=$z->buscar_datos($sql))
				    {
	            		$grid1[$i]=$tb2->fields["codcta"];
	            		$grid2[$i]=$tb2->fields["descta"];
	            		$grid3[$i]=$numero;

	            		if (strtoupper($tb->fields["debcre"])=='D')
	            		{
	            			//	C
	            			$grid4[$i]=0;
	              			$grid5[$i]=$tb2->fields["salact"];
	            		}
		            	else
	            		{
	            		//	D
		            		$grid4[$i]=$tb2->fields["salact"]*(-1);
		            		$grid5[$i]=0;
	            		}
			    	}
			    	$totalD = $totalD + $grid4[$i];
			    	$totalC = $totalC + $grid5[$i];
            	$tb2->MoveNext();
	         }
       	  }
       }
    }



    function Verificar_Comprobante($numero)
    {
       global $z;
      $sql = "select * from contabc Where numcom='".$numero."'";

      if ($tb=$z->buscar_datos($sql))
      {
          Mensaje("Ya se Realizo el Cierre...");
        return false;
      }else{
        return true;
      }
    }

    function Verificar_Diferidos()
    {
       global $z;
       global $feccie;
       global $fecini;

       $sql = "select * from contabc where feccom>=TO_DATE('".$fecini."','DD/MM/YYYY') AND feccom<=TO_DATE('".$feccie."','DD/MM/YYYY') AND STACOM='D'";
      if ($tb=$z->buscar_datos($sql))
      {
         Mensaje("Todavia existen comprobantes diferidos en el Ejercicio.");
         return true;
      }

      $sql = "select * from contaba1 where status='A'";
      if ($tb=$z->buscar_datos($sql))
      {
         Mensaje("Debe cerrar todos los Periodos antes de hacer el Cierre de Ejercicio.");
         return true;
       }
      return false;
    }


    function Cargar_Cuentas()
    {
       global $z;
       global $fecini;
       //global $resultado;

        $sql= "select * from contaba";
      if ($tb=$z->buscar_datos($sql))
      {
          $GLOBALS["feccie"]    = $tb->fields["feccie"];
          $GLOBALS["activos"]   = $tb->fields["codtesact"];
          $GLOBALS["pasivos"]   = $tb->fields["codtespas"];
          $GLOBALS["ingresos"]  = $tb->fields["codind"];
          $GLOBALS["egresos"]   = $tb->fields["codegd"];
          $GLOBALS["capital"]   = $tb->fields["codcta"];
          $GLOBALS["resultado"] = $tb->fields["codres"];
          $GLOBALS["resultado_anterior"] = $tb->fields["codresant"];

          $sql = "Select descta from contabb where codcta='".$resultado."'";
          if ($tb=$z->buscar_datos($sql))
          {
             $GLOBALS["desresultado"] = $tb->fields["descta"];
          }

          $sql= "select max(pereje) as ultper from contabb1";
          if ($tb=$z->buscar_datos($sql))
          {
           $GLOBALS["ultimoperiodo"] = $tb->fields["ultper"];
          }

          if ($activos = "" or
           $pasivos = "" or
           $ingresos = "" or
           $egresos = "" or
           $capital = "" or
           $resultado = "" or
           $resultado_anterior = ""){

           Mensaje("Verifique en Tipos de Cuentas y en Cuentas Contables que los datos esten completos");
           return false;

          }else{
          return true;
          }

        }else{
          return  false;
        }
    }

?>
<script>

    function format(nStr, inD, outD, sep)
    {
      nStr += '';
      var dpos = nStr.indexOf(inD);
      var nStrEnd = '';
      if (dpos != -1) {
        nStrEnd = outD + nStr.substring(dpos + 1, nStr.length);
        nStr = nStr.substring(0, dpos);
      }
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(nStr)) {
        nStr = nStr.replace(rgx, '$1' + sep + '$2');
      }
      return nStr + nStrEnd;
    }

     function actualizarsaldos2bueno()
      {
       f=document.form1;
        i=1;
        var acum=0;
        var acum2=0;
        while (i<=20)
        {
          var x="x"+i+"4";
          var x2="x"+i+"5";
          str= document.getElementById(x).value.toString();
          str2= document.getElementById(x2).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          str2= str2.replace(',','');
          str2= str2.replace(',','');
          str2= str2.replace(',','');

          var num=parseFloat(str);
          var num2=parseFloat(str2);
          acum=acum+num;
          acum2=acum2+num2;
          //alert(num);
          document.getElementById(x).value=format(num.toFixed(2),'.','.',',');
          document.getElementById(x2).value=format(num2.toFixed(2),'.','.',',');
          i=i+1;
        }
        document.form1.debitos.value=format(acum.toFixed(2),'.','.',',');
        document.form1.creditos.value=format(acum2.toFixed(2),'.','.',',');

       }

</script>


<style type="text/css">
<!--
.style9 {color: #FFFFFF
 }
-->
</style>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>

<body>
<form name="form1" method="post" action="ConFinCom.php?var=C">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top.php'); ?>
    </td>
  </tr>
<tr>
<td height="320" valign="top" align="center">
<table height="100%" border="0" align="center" class="box">
          <tr>
      <td height="6%" valign="top" class="breadcrumb">SIGA
              <? echo $modulo; ?> </td>
          </tr>
          <tr>
            <td height="9%" valign="top" ><table width="100%" class="recuadro">
        <tr>
          <td width="100%" align="center">&nbsp;</td>
          <td align="right" width="2%">
            <?  // MENU PRINCIPAL  // ?>
            <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"></div>
          </td>
        </tr>
      </table></td>
          </tr>
      <tr>
            <td height="23%" colspan="2" class="box" >
      <table width="100%" align="center" class="bodyline">
                <tr>
                  <td height="22" colspan="3" class="form_label_01"><table width="100%" height="291%" border="0">
                      <tr>
                        <td width="13%" height="22" class="form_label_01">N&uacute;mero:</td>
                        <td width="56%" class="form_label_01">
                          <input name="numero" type="text" class="imagenInicio" id="numero" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="rellenar(event)" value="<? echo $numero; ?>" size="10" maxlength="8"></td>
                        <td width="4%" class="form_label_01">&nbsp;</td>
                        <td width="27%" class="form_label_01">Fecha:

                <input name="fecha" type="text" readonly="true" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" id="fecha" value="<? print $fecha;?>" size="10" datepicker="true" onKeyUp = "this.value=formateafecha(this.value);" onKeyPress="buscarenter(event)"></td>
                      </tr>
                      <tr valign="middle">
                        <td height="40%" class="form_label_01">Descripci&oacute;n:</td>
                        <td colspan="3" class="form_label_01"><input name="desc" type="text"  class="imagenInicio" id="desc" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $desc;?>" size="70"  onKeyPress="focos(event,'x11')"></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td width="140" height="0"></td>
                  <td width="182" colspan="-5"></td>
                  <td width="232"></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="55%" colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="recuadro">
                <tr valign="bottom" bgcolor="#ECEBE6">
                  <td width="100%" height="1">
                      <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="">
                      <!--DWLayoutTable-->
                      <tr> <a></a>

                        <td width="4%" class="tpButtons"><a href='javascript: catalogo2(1,2,3,"G");'><img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16"></a></td>
                          <td colspan="7" class="tpButtons">Asientos</td>
                        </tr>
                        <tr valign="bottom" bgcolor="#ECEBE6">
                          <td height="1" colspan="6" valign="top"><div class="grid02" id="grid01">
                            <table  width="100%" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="2%" class="queryheader" ></td>
                                <td width="27%" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"><span class="style9">&nbsp;C&oacute;digo
                                  de la Cuenta</span></td>
                                <td width="28%" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"><span class="style9">&nbsp;&nbsp;Descripci&oacute;n
                                  del Asiento</span></td>
                                <td width="16%" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"><span class="style9">&nbsp;&nbsp;Referencia</span></td>
                                <td width="13%" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"><span class="style9">&nbsp;&nbsp;D&eacute;bitos</span></td>
                                <td width="14%" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"><span class="style9">&nbsp;&nbsp;Cr&eacute;ditos</span></td>
                              </tr>
                              <?
        if ($check!='1')
        {
          $i=1;
          while ($i<=20)
          {
           ?>
                              <tr>
                                <td class="grid_line01_br" ><input name="xx<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar(<? print $i;?>,5)" value="" size="1" ></td>
                                <td class="grid_line01_br"><input name="xx<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="30" value="" tabindex="1" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" onKeyPress="gridatos1(event,this.value,this.id,'x<? print $i;?>2','x<? print $i;?>3')"></td>
                                <td  align="left" class="grid_line01_br"><input name="xx<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt01" size="30" value="" align="right" tabindex="2">                                </td>
                                <td class="grid_line01_br"><input name="xx<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="15" value="" onKeyPress="focos(event,'x<? print $i;?>4')"></td>
                                <td class="grid_line01_br" align="right"><input name="xx<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt02" size="15" value="0.00" onKeyPress="montos(event,this.id,'x<? print $i;?>5')">                                </td>
                                <td class="grid_line01_br" align="right"><input name="xx<? print $i;?>5" id="x<? print $i;?>5" type="text" class="grid_txt02" size="15" value="0.00" onKeyPress="montos2(event,this.id)">                                </td>
                              </tr>
                              <?

          $i=$i+1;
          }
        }
        else
        {
          $i=1;
          while ($i<=$cont)
          {
         ?>
                              <tr>
                                <td class="grid_line01_br"><input name="xx<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar(<? print $i;?>,5)" value="" size="1" ></td>
                                <td class="grid_line01_br" align="left"><input name="xx<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="30" value="<? print $grid1[$i];?>" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" onKeyPress="gridatos1(event,this.value,this.id,'x<? print $i;?>2','x<? print $i;?>3')"></td>
                                <td  align="left" class="grid_line01_br"><input name="xx<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt01" size="30" value="<? print $grid2[$i];?>">                                </td>
                                <td class="grid_line01_br"><input name="xx<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="15" value="<? print $grid3[$i];?>" ></td>
                                <td class="grid_line01_br"><input name="xx<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt02" size="15" value="<? print number_format($grid4[$i],2,'.',',');?>" >                                </td>
                                <td class="grid_line01_br"><input name="xx<? print $i;?>5" id="x<? print $i;?>5" type="text" class="grid_txt02" size="15" value="<? print number_format($grid5[$i],2,'.',',');?>" >                                </td>
                              </tr>
                              <?
          $i=$i+1;
          }
        }
        ?>
                            </table>
                          </div></td>
                        </tr>
                        <tr >
                          <td height="10" class="queryheader"></td>

                        <td width="5%" height="17" align="center" class="queryheader"><span class="style9">Saldo</span></td>

                        <td width="10%" height="17" class="queryheader">
                          <div align="center"><span class="style9">Totales</span></div></td>

                        <td width="10%" align="right" bgcolor="#CCFFFF">
                          <input name="debitos" type="text" class="cajadetextosimple" id="debitos" size="10" readonly="true" value="<? print number_format($totalD,2,'.',','); ?>"></td>

                        <td width="10%" align="right" bgcolor="#CCFFFF">
                              <input name="creditos" type="text" class="cajadetextosimple" id="creditos" size="10" readonly="true" value="<? print number_format($totalC,2,'.',','); ?>">
                          </td>

                        </tr>
                        <? // } ?>
                      </table>
                      <? //include_once ('gridConFinCom.php'); ?>                  </td>
                </tr>
                <? // } ?>
            </table></td>
          </tr>
          <tr>
            <td height="7%" colspan="2" class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...
              <?  ///// variable oculta que se necesita para guardar //// ?>
              <input name="fecini" type="hidden" id="fecini" value="<? echo $fecini; ?>" />
              <input name="feccie" type="hidden" id="feccie" value="<? echo $fecha; ?>" />
              <?  /////////////////////////////////////////////////////// ?>
              <input name="status" type="hidden" id="status" value="<? print $status;?>">
              <input name="save" type="hidden" id="save" value="<? print $save;?>">
        <input name="tipcom" type="hidden" id="tipcom" value="<? print $tipcom;?>">
            </span></td>
          </tr>
        </table>  </tr>
</td>
</table>
<? require_once('../../lib/general/bottom.php'); ?>
</form>
</body>
 <script>
  //actualizarsaldos2();
</script>
<script language="JavaScript">

    function rellenar(e)
    {

      if (e.keyCode==13)
      {
        f=document.form1;

        if (!(f.numero.value.length))
        {
        }
        else
        {
          f.action="ConFinCom.php?var=<? print 'R';?>";
          f.submit();
        }
      }
    }

    function gridatos1(e,tira,id,donde,foco)
    {
      if (e.keyCode==13)
      {
        a=repetido2(id,donde);
        if (a==false)
        {
          cadena=rayitas(e,tira);
          document.getElementById(id).value=cadena;

          f=document.form1;
          cuantos='1';
          sql="select codcta as codigo, descta as campo1 from contabb where upper(cargab)=¿C¿ and trim(codcta)=trim(¿"+cadena+"¿)";
          pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&donde="+donde+"&foco="+foco+"&sql="+sql;
          window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=no,width=500,height=20,resizable=no,left=100,top=300");
        }
      }
    }


    function montos(e,id,fc)
    {
      if (e.keyCode==13)
      {
        if (validarnumero(id)==false)
        {
          document.getElementById(id).value="0.00";
          document.getElementById(id).focus();
          document.getElementById(id).select();
          actualizarsaldos(e,id);
        }
        else
        {
          actualizarsaldos(e,id);
          focos(e,fc);
        }
      }
    }

    function montos2(e,id)
    {
      if (e.keyCode==13)
      {
        if (validarnumero(id)==false)
        {
          document.getElementById(id).value="0.00";
          document.getElementById(id).focus();
          document.getElementById(id).select();
        }
          actualizarsaldos(e,id);

      }
    }

    function actualizar()
    {
      f= document.form1;
      if (f.debitos.value!=f.creditos.value)
      {
        alert("El Comprobante no se puede actualizar, ya que está descuadrado");
      }
      else
      {
        f.save.value="S";
        f.status.value="A";
        salvar();
      }
    }

    function buscarenter(e)
      {
        if (e.keyCode==13)
      {
        f=document.form1;

        if (!(f.numero.value.length))
        {
        }
        else if (!(f.fecha.value.length))
        {
        }
        else
        {
          f.action="ConFinCom.php?var=<? print 'C';?>";
          f.submit();
        }
      }
     }

     function actualizarsaldos666(e,id)
      {
       if (e.keyCode==13)
      {
        f=document.form1;
        i=1;
        var acum=0;
        var acum2=0;
        while (i<=20)
        {
          var x="x"+i+"4";
          var x2="x"+i+"5";
          str= document.getElementById(x).value.toString();
          str2= document.getElementById(x2).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          str2= str2.replace(',','');
          str2= str2.replace(',','');
          str2= str2.replace(',','');

          var num=parseFloat(str);
          var num2=parseFloat(str2);
          acum=acum+num;
          acum2=acum2+num2;
          document.getElementById(x).value=format(num.toFixed(2),'.','.',',');
          document.getElementById(x2).value=format(num2.toFixed(2),'.','.',',');
          i=i+1;
        }
        document.form1.debitos.value=format(acum.toFixed(2),'.','.',',');
        document.form1.creditos.value=format(acum2.toFixed(2),'.','.',',');

      }
     }


     function cancelar()
     {
        f=document.form1;
        f.action="ConFinCie.php";
        f.submit();
     }

    function repetido2(id,id2)
    {
      f=document.form1;
      chk="N";

        if (parseInt(id.length)==3)
      {
        j=parseInt(id.substring(1,2));
      }
      else
      {
        j=parseInt(id.substring(1,3));
      }

      //j=parseInt(id.substring(1,2));
      val=document.getElementById(id).value;
      if (val!="")
      {
          if (j!=1)
          {
            i=1;
             while (i<=20)
              {
                var x="x"+i+"1";
                if (j!=i)
                {
                  if (val==document.getElementById(x).value)
                  {
                    aux= j-1;
                    aux= "x"+aux+"2";
                    document.getElementById(id).value="";
                    document.getElementById(id2).value="";
                    alert("La cuenta contable está repetida");
                    document.getElementById(id).focus();
                    i=21;
                    chk="S";
                    return true;
                  }
                }
              i=i+1;
              }
          }
    }
      if (chk=="N")
      {
        return false;
      }
    }

    function verificar()
    {

      f=document.form1;
      if (!verificar_campo_clave(0,f.numero.value,"No puede salvar sin introducir el n�mero del comprobante"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.fecha.value,"No puede salvar sin introducir la fecha del comprobante"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.desc.value,"No puede salvar sin introducir la descripción del comprobante"))
      {
        return false;
      }
      else if ( (!verificar_campo_clave(1,f.x14.value,"No puede salvar sin introducir al menos un debito en el comprobante")) && (!verificar_campo_clave(1,f.x15.value,"No puede salvar sin introducir al menos un crédito en el comprobante"))  )
      {
        return false;
      }
      else
      {
        return true;
      }

    }

       function verificar_campo_clave(tipo,valor,msg)
    {
      if (msg=="")
      {
        msg="No puede salvar sin introducir todos los campos claves";
      }
      switch (tipo)
      {

        //tira
         case 0 :
            if (valor=="")
            {
              alert(msg);
              return false;
            }
            else
            {
              return true;
            }
            break;

        //numerogrid
         case 1 :
          if (valor=="0.00")
            {
              alert(msg);
              return false;
            }
            else
            {
              return true;
            }
          break;

        }

    }

     function catalogo2(c1,c2,fc,tipo)
     {
    f=document.form1;

      i=1;
      while (i<=20)
      {
        var x="x"+i+c1;
        var y="x"+i+c2;
        if (document.getElementById(x).value=="")
        {
          if (i==1)
          {
            campo="x1"+c1;
            campo2="x1"+c2;
            foco="x1"+fc;
            i=20;
          }
          else
          {
            campo=x;
            campo2=y;
            foco="x"+i+fc;
            i=20;
          }
        }
        i=i+1;
      }
      sql='select codcta as CODIGO, descta as DESCRIPCION from contabb where cargab=¿C¿ and descta like upper(¿%¿) order by codcta';
      pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
      window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
     }


     function eliminar(i,c)
       {
         f=document.form1;
      var fila;
      for (fila=i;fila<20;fila++)
      {
        for (col=0;col<=c;col++)
        {
          var x="x"+fila+col;
          fila2=parseInt(fila)+1;
          var y="x"+fila2+col;
          document.getElementById(x).value=document.getElementById(y).value;
          if ( (col==4) || (col==5))
          {
            document.getElementById(y).value="0.00";
          }
          else
          {
            document.getElementById(y).value="";
          }
        }

      }
      //ultima fila
      if (i==20)
      {
        for (col=0;col<=c;col++)
        {
          var x="x"+i+col;
          if ( (col==4) || (col==5))
          {
            document.getElementById(y).value="0.00";
          }
          else
          {
            document.getElementById(y).value="";
          }
        }

      }//if (fila==20)
     actualizarsaldos2();
     }


      function salvar()
      {

        f=document.form1;
            if(confirm("Realmente desea Salvar?"))
            {
              if (verificar())
              {
              //comprobante = '<? echo $comprobante; ?>'

        		f.action="imecConFinComGen.php";
                f.submit();
              }

            }
      }

    function onButtonClick(itemId,itemValue)// TOOLBAR
    {
      f=document.form1;

      //alert("Button "+itemId+" was pressed"+(itemValue?("\n select value : "+itemValue):""));
      if(itemId == '0_ojo'){
        alert("Usted vera una Consulta");
      }
      /////////////////////
      else if(itemId == '0_save')
      {

        //  transformar();

        salvar();
      }
      //////////////////////////
      else if(itemId == '0_print'){
          print();
      }
      else if(itemId == '0_new'){
        alert("Nuevo Formulario");
      }
      else if(itemId == '0_form'){
        alert("Modificar Formulario");
      }
      else if(itemId == '0_search'){
        alert("Busqueda");
      }
      else if(itemId == '0_filter'){
        alert("Filtro");
      }
      else if(itemId == '0_cancelar'){
          cancelar();
      }
      else if(itemId == '0_delete')
      {
      /*transformar();
        if(confirm("�Esta seguro que desear Eliminar este Comprobante?"))
        {
          Eliminar();
        }*/
      }

      else if(itemId == '0_calc'){
        alert("llamando la calculadora");
      }
      else if(itemId == '0_calend'){
        alert("LLamando el Calendario");
      }
      else if(itemId == '0_salir'){
        window.close();
      }
    };


    aToolBar=new dhtmlXToolbarObject('toolbar_zone2','100%',16,"");
    aToolBar.setOnClickHandler(onButtonClick);
    aToolBar.loadXML("../../lib/general/_toolbarV2.xml")
    aToolBar.setToolbarCSS("toolbar_zone2","toolbarText3");
    aToolBar.showBar();


  function catalogo(campo,campo2,sw)
   {
   if (sw=='1')
    {
     var sql='SELECT TIPPRC CODIGO,NOMEXT NOMBRE_EXTENDIDO, NOMABR NOMBRE_ABREVIADO FROM CPDOCPRC WHERE NOMEXT like upper(�%�) ORDER BY TIPPRC'
     var titulo="Catalogo de Tipo de PreCompromiso"
      ViewCatalogo(campo,campo2,sql,titulo);
  }

   if (sw=='2')
   {
      var sql='SELECT CEDRIF CEDULA_RIF,NOMBEN NOMBRE,DIRBEN DIRECCION FROM OPBENEFI WHERE CEDRIF like upper(�%�) ORDER BY CEDRIF'
      var titulo='Catalogo de Beneficiario'

    ViewCatalogo(campo,campo2,sql,titulo);
  }

   }


   function ViewCatalogo(campo,campo2,sql,titulo)
   {
      pagina="catalogoobj.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&titulo="+titulo;
     window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=300,resizable=yes,left=50,top=50");
   }

  function IsNumeric(valor)// FORMATEAR FECHA
    {
    var log=valor.length; var ok="S";
    for (x=0; x<log; x++)
    { v1=valor.substr(x,1);
    v2 = parseInt(v1);
    //Compruebo si es un valor numérico
    if (isNaN(v2)) { ok= "N";}
    }
    if (ok=="S") {return true;} else {return false; }
    }

    var primerslap=false;
    var segundoslap=false;
    var tercerslap=false;
   function formateafecha(fecha)
  {
    var long = fecha.length;
    var dia;
    var mes;
    var ano;

    if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2);
    if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; }
    else { fecha=""; primerslap=false;}
    }
    else
    { dia=fecha.substr(0,1);
    if (IsNumeric(dia)==false)
    {fecha="";}
    if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; }
    }
    if ((long>=5) && (segundoslap==false))
    { mes=fecha.substr(3,2);
    if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00")) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; }
    else { fecha=fecha.substr(0,3); segundoslap=false;}
    }
    else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } }
    if (long>=7)
    { ano=fecha.substr(6,4);
    if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); }
    else { if (long==10){ if ((ano==0) || (ano<1900) || (ano>2100)) { fecha=fecha.substr(0,6); } } }
    }

    if (long>=10)
    {
    fecha=fecha.substr(0,10);
    dia=fecha.substr(0,2);
    mes=fecha.substr(3,2);
    ano=fecha.substr(6,4);
    // A�o no viciesto y es febrero y el dia es mayor a 28
    if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; }
    }
    return (fecha);
  }

  function transformar()
  {
    f=document.form1;
    var status=f.status.value;
    if (status=='DIFERIDO')
    {
      f.status.value="D";
    }
    else if(status=='ACTUALIZADO')
    {
      f.status.value="A";
    }
    else if(status=='ANULADO')
    {
      f.status.value="N";
    }
    else if(status=='REVERSADO')
    {
      f.status.value="R";
    }
    else if(status=='DESCUADRADO')
    {
      f.status.value="E";
    }

  }

      function consulta()
      {
          f=document.form1;
          //document.getElementById('var').value='C';
          var campo2='fecha';
          var campo='numero';
          var foco='submit';
          sql='select numcom, to_char(feccom,¿dd/mm/yyyy¿) as feccom from contabc where upper(numcom) like upper(¿%¿)  Order By numcom, feccom';
          alert(sql);
          pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
          window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");
     }

</script>
<?
  function Limpiar()
  { ?> <script>
  //    alert(document.descta.value);
   // document.descta.value="55555";
    </script>
  <? }
?>
</html>
