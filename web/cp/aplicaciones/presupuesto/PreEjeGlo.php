<?
session_start();
if (empty($_SESSION["x"]))
{
  ?>
  <script language="JavaScript" type="text/javascript">
      location=("http://"+window.location.host+"/autenticacion_dev.php/login");
  </script>
  <?
}

require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/tools.php');
validar(array(8,11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z= new tools();

$modulo="";
$forma="Ejecución Global";
$modulo=$_SESSION["modulo"] . " > Ejecución Presupuestaria > ".$forma;
//CARGAR MASCARA
  $sql="SELECT forpre, to_char(fecini,'dd/mm/yyyy') as fecini, to_char(feccie,'dd/mm/yyyy') as feccie,
    to_char(fecini,'yyyy') as anoinicio, to_char(feccie,'yyyy') as anocierre
    from cpdefniv where codemp='001'";
  if ($tb=$z->buscar_datos($sql))
  {
    $_SESSION["formato"]=$tb->fields["forpre"];
    $numper=$tb->fields["numper"];
    $fechainicio=$tb->fields["fecini"];
    $fechacierre=$tb->fields["feccie"];
    $anoinicio=$tb->fields["anoinicio"];
    $anocierre=$tb->fields["anocierre"];
  }
  else
  {
    $_SESSION["formato"]="";
  }
///////////////

 if (!empty($_POST["codigo"])) {$codigo=strtoupper(trim($_POST["codigo"]));}
 $ano=$anoinicio;
 if (!empty($_POST["per"])) {$per=$_POST["per"];}

if (!empty($_GET["var"]))
  {
    $var=$_GET["var"];
    if ($var=='C') //CONSULTA
    {
      $codigo = strtoupper(trim($_POST["codigo"]));
      $ano    = $anoinicio;
      $per    = $_POST["per"];
    }
    else if ($var=='1')//PRIMERO
    {
      if ($tb=$z->primerRegistroAsi('cpasiini','codpre||anopre||perpre'))
      {
        $codigo=strtoupper(trim($tb->fields["codpre"]));
        $ano=$tb->fields["anopre"];
      }
    }
    else if ($var=='2')//ANTERIOR
    {
      if (!empty($codigo))
      {
        $cod=$codigo;
        $aux=trim($cod);
        $aux2=trim($aux).$anoinicio.'00';
        //chekeamos q no sea el primero
          $tb=$z->primerRegistroAsi('cpasiini','codpre||anopre||perpre');
          $codigo=strtoupper(trim($tb->fields["codpre"]));
          $ano=$tb->fields["anopre"];
          if ( ($aux!=$codigo) && ($anoinicio!=ano) )
          {
            $tb=$z->anteriorRegistroAsi('cpasiini','trim(codpre)||anopre||perpre',$aux,'N');
          }
            else
          {
             $tb=$z->ultimoRegistroAsi('cpasiini','codpre||anopre||perpre');
          }
      }
      else
      {
        $tb=$z->ultimoRegistroAsi('cpasiini','codpre||anopre||perpre');
      }
      if (!$tb->EOF)
      {
        $codigo=strtoupper(trim($tb->fields["codpre"]));
        $ano=$tb->fields["anopre"];
      }
    }
    else if ($var=='3')//SIGUIENTE
    {
      if (!empty($codigo))
      {
        $cod=$codigo;
        $aux=trim($cod);
        $aux2=trim($aux).$anoinicio.'00';
        //chekeamos q no sea el ultimo
          $tb=$z->ultimoRegistroAsi('cpasiini','codpre||anopre||perpre');
          $codigo=strtoupper(trim($tb->fields["codpre"]));
          $ano=$tb->fields["anopre"];
          if ( ($aux!=$codigo) && ($anoinicio!=ano) )
          {
            $tb=$z->proximoRegistroAsi('cpasiini','trim(codpre)||anopre||perpre',$aux2,'N');
          }
          else
          {
            $tb=$z->primerRegistroAsi('cpasiini','codpre||anopre||perpre');
          }
      }
      else
      {
        $tb=$z->primerRegistroAsi('cpasiini','codpre||anopre||perpre');
      }
      if (!$tb->EOF)
      {
        $codigo=strtoupper(trim($tb->fields["codpre"]));
        $ano=$tb->fields["anopre"];
      }
    }
    else if ($var=='4')//ULTIMO
    {
      if ($tb=$z->ultimoRegistroAsi('cpasiini','codpre||anopre||perpre'))
      {
        $codigo=strtoupper(trim($tb->fields["codpre"]));
        $ano=$tb->fields["anopre"];
      }
    }
          $sql = "select to_char(fecini,'YYYY') as ano, to_char(fecini,'MM') as fecini, to_char(feccie,'MM') as feccie from cpdefniv";
          if ($tb = $z->buscar_datos($sql))
          {
      if ($per=='00')
      {
            $fecini = $tb->fields["fecini"];  //MM
            $feccie = $tb->fields["feccie"];  //MM
            $ano    = $tb->fields["ano"];     //YYYY

        }else
        {
            $fecini = $per;  //MM
            $feccie = $per;  //MM
        }


      $arr = array('PRC','COM','CAU','PAG','TRA','TRN','ADI','DIS');
      $i=2;
      foreach ($arr as $temp)
      {
         $sql  = "select coalesce(obtener_ejecucion('".$codigo."%','".$fecini."','".$feccie."','".$ano."','".$temp."'),0) from empresa";
        //exit();
        $tb2  = $bd->select($sql);
          $reg[$i] = $tb2->fields[0];
        $i++;
      }

      $sql="select * from cpdeftit where trim(codpre)=trim('$codigo')";
      $tb2=$bd->select($sql);

            $nombre = strtoupper($tb2->fields["nompre"]);
      $codigo = $codigo;
            $per    = $per;

            $sql = "select coalesce(sum(monasi),0) as monasi from cpasiini where codpre like '$codigo%' and anopre='$ano' and perpre='$per'";
            $tb2 = $bd->select($sql);
              $m1  = $tb2->fields["monasi"];
            $m2  = $reg[2];
            $m3  = $reg[3];
            $m4  = $reg[4];
            $m5  = $reg[5];
            $m6  = $reg[6];
            $m7  = $reg[7];
            $m8  = $reg[8];
            $m9  = $reg[9];
            $m10 = Monto_disponible_ejecucion($ano,$codigo.'%',$per);

            //P1
            if ($m1!=0)
            {
              $p1=100;
            }
            else
            {
              $p1=0;
            }
            //P2
            if ( ($m2!=0) && ($m1!=0) )
            {
              $p2= $m2 * 100 / $m1;
            }
            else
            {
              $p2=0;
            }
            //P3
            if ( ($m3!=0) && ($m2!=0) )
            {
              $p3= $m3 * 100 / $m2;
            }
            else
            {
              $p3=0;
            }
            //P4
            if ( ($m4!=0) && ($m3!=0) )
            {
              $p4= $m4 * 100 / $m3;
            }
            else
            {
              $p4=0;
            }
            //P5
            if ( ($m5!=0) && ($m4!=0) )
            {
              $p5= $m5 * 100 / $m4;
            }
            else
            {
              $p5=0;
            }
            //P6
            if ( ($m6!=0) && ($m1!=0) )
            {
              $p6= $m6 * 100 / $m1;
            }
            else
            {
              $p6=0;
            }
            //P7
            if ( ($m7!=0) && ($m1!=0) )
            {
              $p7= $m7 * 100 / $m1;
            }
            else
            {
              $p7=0;
            }
            //P8
            if ( ($m8!=0) && ($m1!=0) )
            {
              $p8= $m8 * 100 / $m1;
            }
            else
            {
              $p8=0;
            }
            //P9
            if ( ($m9!=0) && ($m1!=0) )
            {
              $p9= $m9 * 100 / $m1;
            }
            else
            {
              $p9=0;
            }
            //P10
            if ( ($m10!=0) && ($m1!=0) )
            {
              $p10= $m10 * 100 / $m1;
            }
            else
            {
              $p10=0;
            }
          }
          else
          {
            Mensaje('No se ha Definido Saldo Inicial para este Periodo');
            $codigo="";
            $nombre="";
            $per="";
            $m1=0;
            $m2=0;
            $m3=0;
            $m4=0;
            $m5=0;
            $m6=0;
            $m7=0;
            $m8=0;
            $m9=0;
            $m10=0;
            $p1=0;
            $p2=0;
            $p3=0;
            $p4=0;
            $p5=0;
            $p6=0;
            $p7=0;
            $p8=0;
            $p9=0;
            $p10=0;
          }



  }
  else//SI EL VAR VIENE VACIO
  {
  }


  //////////////////////////
  if (!empty($_GET["var2"]))
  {
    //Limpiar
    $codigo="";
    $nombre="";
    $per="";
    $m1=0;
    $m2=0;
    $m3=0;
    $m4=0;
    $m5=0;
    $m6=0;
    $m7=0;
    $m8=0;
    $m9=0;
    $m10=0;
    $p1=0;
    $p2=0;
    $p3=0;
    $p4=0;
    $p5=0;
    $p6=0;
    $p7=0;
    $p8=0;
    $p9=0;
    $p10=0;
  }


?>
<!--DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"-->
<html>
<head>
<title><? echo $forma; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">
<link rel="STYLESHEET" type="text/css"  href="../../lib/general/toolbar/css/dhtmlXToolbar.css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" TYPE="text/css" MEDIA="screen" href="../../lib/css/tabber.css">
<script language="JavaScript"  src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type='text/javascript' src='../../lib/general/js/dFilter.js'></script>
<script type='text/javascript' src='../../lib/general/js/funciones.js'></script>
<script type="text/javascript" src="../../lib/general/js/tabber.js"></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>


</head>

<body>
<form name="form1" method="post" action="PreEjeGlo.php?var=<? echo 'C'; ?>">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top_p.php'); ?>
    </td>
  </tr>
</table>
<table width="584" border="0" align="center">
  <tr>
    <td colspan="2"><table width="100%" border="0"  class="box">
      <tr>
        <td class="breadcrumb">SIGA  <? echo $modulo; ?>
      <input name="imec" type="hidden" id="imec"></td>
      </tr>
      <tr>
        <td><table width="100%" class="recuadro">
      <tr>
         <td align="center" width="27%">
          <!-- a href='javascript: primero();'><img src="../../images/1.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: anterior();'><img src="../../images/2.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: siguiente();'><img src="../../images/3.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: ultimo();'><img src="../../images/4.GIF" width="13" height="13"--></a>
          <!--<input type="button" name="Button" value="|&lt;" onClick="primero()">
          <input type="button" name="Submit2" value="&lt;&lt;" onClick="anterior()">
          <input type="button" name="Submit3" value="&gt;&gt;" onClick="siguiente()">
          <input type="button" name="Submit4" value="&gt;|" onClick="ultimo()">-->
        </td>
        <td align="left" width="12%">
            </td>
          <td align="right" width="61%">
          <?  // MENU PRINCIPAL  // ?>
          <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>
        </td>
      </tr>
    </table></td>
      </tr>
      <tr>
        <td class="box">
<table width="100%" align="center" class="bodyline">
                <!--DWLayoutTable-->
                <tr>
                  <td height="22" colspan="3" class="form_label_01"> <fieldset>
                    <legend>Datos del Código Presupuestario</legend>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="10%"><div align="right">C&oacute;digo</div></td>
                        <td width="53%"> <div align="left">
                            <input name="codigo" type="text" class="imagenInicio" id="codigo" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $codigo;?>" size="40" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" onblur="cod(event,id)" maxlength="<?print strlen($_SESSION["formato"]);?>">
                            <input name="cat" type="button" id="cat" value="..." onClick="catalogo2('codigo','nombre','codigo','C');">
                          </div></td>
                        <td width="24%"><div align="right">Per&iacute;odo</div></td>
                        <td width="13%">
                        <select name="per" id="per" onChange="buscarenter()">
                        <option></option>
                            <?
                    $sql = "select numper from cpdefniv";
                    if ($tb = $z->buscar_datos($sql))
                    {
                      $numper = $tb->fields["numper"];
                    }

                  echo "<option value='00' selected='selected'	>00</option>";
                              for ($i=1;$i<=$numper;$i++)
                              {
                                $i=str_pad($i,2,'0',STR_LEFT_PAD);
                                if ($i==$per)
                                {
                                  echo "<option value='$i' selected='selected'>".$i."</option>";
                                }else
                                {
                                  echo "<option value='$i' >".$i."</option>";
                                }
                              }
                            ?>

                          </select></td>
                      </tr>
                      <tr>
                        <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="10%"><div align="right">Nombre </div></td>
                              <td width="89%"><input name="nombre" type="text" id="nombre" class="imagenInicio2" readonly="true" size="87" value="<? print $nombre;?>"  onKeyPress="focos(event,'nomabr')"></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                    </table>
                    </fieldset></td>
                </tr>
                <tr>
                  <td width="140" height="0"></td>
                  <td width="182" colspan="-5"></td>
                  <td width="232"></td>
                </tr>
              </table>		</td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
                <tr>
                  <td width="100%" colspan="2"> <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="recuadro">
                      <tr valign="bottom" bgcolor="#ECEBE6">
                        <td width="100%" height="1"> <div class="grid03" id="grid01">
                            <? ///////// G R I B ////////////?>
                            <table width="55%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><table  border="0" align="right" cellpadding="0" cellspacing="0" class="recuadro">
                                    <tr>
                                      <td class="queryheader" ><div align="center">&nbsp;Movimiento</div></td>
                                      <td class="queryheader" >
<div align="center">Montos</div></td>
                                      <td colspan="2" class="queryheader" ><div align="center">Porcentaje</div></td>
                                    </tr>
                                    <tr>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">Asignado</div></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="m1" id="m1" type="text" class="grid_txt02" size="15" value="<? print number_format($m1,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="p1" id="p1" type="text" class="grid_txt02" size="7" value="<? print number_format($p1,2,'.',',');?>">
                                      </td>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">%</div></td>
                                    </tr>
                                    <tr>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">Precomprometido</div></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="m2" id="m2" type="text" class="grid_txt02" size="15" value="<? print number_format($m2,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="p2" id="p2" type="text" class="grid_txt02" size="7" value="<? print number_format($p2,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">%</div></td>
                                    </tr>
                                    <tr>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">Comprometido</div></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="m3" id="m3" type="text" class="grid_txt02" size="15" value="<? print number_format($m3,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="p3" id="p3" type="text" class="grid_txt02" size="7" value="<? print number_format($p3,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">%</div></td>
                                    </tr>
                                    <tr>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">Causado</div></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="m4" id="m4" type="text" class="grid_txt02" size="15" value="<? print number_format($m4,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="p4" id="p4" type="text" class="grid_txt02" size="7" value="<? print number_format($p4,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">%</div></td>
                                    </tr>
                                    <tr>
                                      <td height="22"  align="right" class="grid_line01_br">
                                        <div align="left">Pagado</div></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="m5" id="m5" type="text" class="grid_txt02" size="15" value="<? print number_format($m5,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="p5" id="p5" type="text" class="grid_txt02" size="7" value="<? print number_format($p5,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">%</div></td>
                                    </tr>
                                    <tr>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">Traslados
                                          (+)</div></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="m6" id="m6" type="text" class="grid_txt02" size="15" value="<? print number_format($m6,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="p6" id="p6" type="text" class="grid_txt02" size="7" value="<? print number_format($p6,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">%</div></td>
                                    </tr>
                                    <tr>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">Traslados (-)</div></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="m7" id="m7" type="text" class="grid_txt02" size="15" value="<? print number_format($m7,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="p7" id="p7" type="text" class="grid_txt02" size="7" value="<? print number_format($p7,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">%</div></td>
                                    </tr>
                                    <tr>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">Aumentos</div></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="m8" id="m8" type="text" class="grid_txt02" size="15" value="<? print number_format($m8,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="p8" id="p8" type="text" class="grid_txt02" size="7" value="<? print number_format($p8,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">%</div></td>
                                    </tr>
                                    <tr>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">Disminuciones</div></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="m9" id="m9" type="text" class="grid_txt02" size="15" value="<? print number_format($m9,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br"><input readonly="true" name="p9" id="p9" type="text" class="grid_txt02" size="7" value="<? print number_format($p9,2,'.',',');?>"></td>
                                      <td  align="right" class="grid_line01_br">
                                        <div align="left">%</div></td>
                                    </tr>
                                    <tr>
                                      <td class="querybottom" ><div align="left">&nbsp;Disponibilidad</div></td>
                                      <td  align="right" class="querybottom"><input readonly="true" name="m10" id="m10" type="text" class="grid_txt02" size="13" value="<? print number_format($m10,2,'.',',');?>"></td>
                                      <td class="querybottom" ><div align="right"><input readonly="true" name="p10" id="p10" type="text" class="grid_txt02" size="5" value="<? print number_format($p10,2,'.',',');?>">
                                        </div></td>
                                      <td class="queryheader" >%</td>
                                    </tr>
                                  </table></td>
                              </tr>
                            </table>
                            <? ///////////////////////?>
                          </div>
              </td>
                      </tr>
                      <? // } ?>
                    </table></td>
                </tr>
              </table></td>
      </tr>
      <tr>
        <td class="breadcrumb">Registro de <? echo $forma; ?>...
  <?  ///// variable oculta que se necesita para guardar //// ?>
      <input name="fecini" type="hidden" id="fecini" value="<? //echo $fecini; ?>" />
  <?  /////////////////////////////////////////////////////// ?>	</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
<? require_once('../../lib/general/bottom.php'); ?>
</body>
<script language="JavaScript">

    function primero()
      {
      f=document.form1;
      f.action="PreEjeGlo.php?var=<? print '1';?>";
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
      f.action="PreEjeGlo.php?var=<? print '2';?>";
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      f.action="PreEjeGlo.php?var=<? print '3';?>";
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      f.action="PreEjeGlo.php?var=<? print '4';?>";
      f.submit();
     }

    function cod(e,id)
    {

    //  if (e.keyCode==13)
    //  {
        tira   = document.getElementById(id).value;
        cadena = rayitasfc(tira);
        document.getElementById(id).value            = cadena;
        document.getElementById('per').selectedIndex = "";
        document.getElementById('per').value         = "";
        $('nombre').value                           = "";
        focos(e,'per');
     // }
    }

    function buscarenter()
    {
      f=document.form1;
      if (f.per.value!="")
      {
        f.action="PreEjeGlo.php?var=<? echo 'C'; ?>";
        f.submit();
      }
    }

     function cancelar()
     {
         f=document.form1;
         f.action="PreEjeGlo.php?var2=<? print 'L';?>";
         f.submit();
     }

     function catalogo2(c1,c2,fc,tipo)
     {
      f=document.form1;
      campo=c1;
      campo2=c2;
      foco=fc;
      //per='<? echo $per; ?>';
     // ano='<? echo $ano; ?>';
      //alert(per);
      //alert(ano);
      //and perpre='".$per."' and anopre='".$ano."'
     /// sql='select codpre as codigo, nompre as descripcion from cpdeftit a, cpdefniv b where length(trim(a.codpre))= length(trim(b.forpre)) and upper(nompre) like upper(�%�) order by a.codpre';
     /// pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
     /// window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=580,height=400,resizable=yes,left=50,top=50");


           var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Preasiini_Cpdeftit/clase/Cpdeftit/frame/form1/obj1/'+campo+'/obj2/'+campo2+'/campo1/codpre/campo2/nompre/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

     }

     function onButtonClick(itemId,itemValue)// TOOLBAR
    {
      f=document.form1;

      if(itemId == '0_ojo'){
        catalogo2('codigo','nombre','codigo','C');
      }
      /////////////////////
      else if(itemId == '0_cancelar')
           {
               cancelar();
           }

      else if(itemId == '0_save')
      {
      }
      //////////////////////////
      else if(itemId == '0_print'){
          print();
      }
      else if(itemId == '0_new'){

      }
      else if(itemId == '0_form'){

      }
      else if(itemId == '0_search'){

      }
      else if(itemId == '0_filter'){
        alert("Filtro");
      }
      else if(itemId == '0_cancelar'){
          cancelar();
      }
      else if(itemId == '0_delete')
      {
        eliminar();
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
    aToolBar.loadXML("../../lib/general/_toolbarV1.xml")
    aToolBar.setToolbarCSS("toolbar_zone2","toolbarText3");
    aToolBar.showBar();

     // document.getElementById('codigo').focus();
</script>

</html>
