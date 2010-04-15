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

require($_SESSION["x"].'lib/bd/basedatosAdo.php');
require($_SESSION["x"].'lib/general/funciones.php');
require($_SESSION["x"].'lib/general/tools.php');
validar(array(8,11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tools=new tools();

$modulo="";
$forma="Asignación Inicial";
$modulo=$_SESSION["modulo"] . " > Presupuesto Financiero > ".$forma;

Limpiar();
Obtener_FormatoPresup();
ObtenerNiveles();
$numreg=ObtenerNumeroDeRegistros('cpasiini');
if (!empty($_GET["var"]))
  {
    if (!empty($_POST["codpre"])){ $codpre=trim($_POST["codpre"]); } else { $codpre=trim($_GET["codpre"]);}
    if (!empty($_POST["ano"])){ $ano=$_POST["ano"]; } else { $ano=$_GET["ano"];}
    $var=$_GET["var"];

        ///////////////// BARRA DE MENU /////////////////
    if ($var=='1')
      {
        if ($tb=$tools->primerRegistro('cpasiini','codpre'))
        {
          $codpre=trim($tb->fields["codpre"]);
          $ano=$tb->fields["anopre"];
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='2') //Anterior
      {
        if (!empty($codpre))
        {
          $aux=$codpre;
            //chekeamos q no sea el primero
          $tb=$tools->primerRegistro('cpasiini','codpre');
          $codpre=trim($tb->fields["codpre"]);
          if ($aux==$codpre)
          {
              $tb=$tools->ultimoRegistro('cpasiini','codpre');
              $codpre=trim($tb->fields["codpre"]);
              $ano=$tb->fields["anopre"];
              $var=9;   //Para que haga la busqueda
          }
       else
          {
            $tb=$tools->anteriorRegistro('cpasiini','codpre',$aux,'N');
            $codpre=trim($tb->fields["codpre"]);
            $ano=$tb->fields["anopre"];
            $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->ultimoRegistro('cpasiini','codpre');
          $codpre=trim($tb->fields["codpre"]);
          $ano=$tb->fields["anopre"];
          $var=9;   //Para que haga la busqueda
        }
      }
      else if ($var=='3') //PROXIMO
      {
        if (!empty($codpre))
        {
          $aux=$codpre;
            //chekeamos q no sea el primero
          $tb=$tools->ultimoRegistro('cpasiini','codpre');
          $codpre=trim($tb->fields["codpre"]);
          if ($aux==$codpre)
          {
              $tb=$tools->primerRegistro('cpasiini','codpre');
              $codpre=trim($tb->fields["codpre"]);
              $ano=$tb->fields["anopre"];
              $var=9;   //Para que haga la busqueda
          }
       else
          {
            $tb=$tools->proximoRegistro('cpasiini','codpre',$aux,'N');
            $codpre=trim($tb->fields["codpre"]);
            $ano=$tb->fields["anopre"];
            $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->primerRegistro('cpasiini','codpre');
          $codpre=trim($tb->fields["codpre"]);
          $ano=$tb->fields["anopre"];
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='4')
      {
        if ($tb=$tools->ultimoRegistro('cpasiini','codpre'))
        {
          $codpre=$codpre=trim($tb->fields["codpre"]);
          $ano=$tb->fields["anopre"];
          $var=9;   //Para que haga la busqueda
        }
      }
    //////////////// FIN MENU ////////////////
    if (($var=='9') and (!empty($codpre))){
      //////  Busqueda por Codigo  ////////

       $sql="select to_char(fecper,'yyyy') as fecha from cpdefniv";
       if ($tb=$tools->buscar_datos($sql))
       {
       	$ano = $tb->fields["fecha"];
       }



      $sql="select * from cpdeftit where trim(codpre)='$codpre'";
       if ($tb=$tools->buscar_datos($sql))
       {
        if (strlen($codpre)<>strlen($FormatoPresup)){
          Mensaje("El Título Presupuestario no es de Ultimo Nivel");
          Limpiar();
        }
        $nompre=$tb->fields["nompre"];

        if (!empty($ano)){
           $salvar="Si";
           $sql= "select * from cpasiini where codpre = '$codpre' and anopre='$ano' and PerPre='00' Order by codpre,anopre,PerPre";
           if ($tb=$tools->buscar_datos($sql))
           {
             $IncMod = "M";
            $Eliminar="Si";
            $monasi=$tb->fields["monasi"];
            Cargar_GridAsigna();

           }
         }
         $foco='ano';
        }
        else
        {
          Mensaje("El Título Presupuestario no Existe");
          Limpiar();
          $foco='codpre';
       }
        $msg=VerificarEliminar();
    }
}

  function Cargar_GridAsigna()
  {
  global $tools;
  global $bd;
  global $codpre;
  global $anoinicio;
  global $anocierre;
  global $sql_grip;

    $sql_grip="select * from cpasiini where codpre='$codpre' and anopre>='$anoinicio' and anopre<='$anocierre' and perpre<>'00' Order By codpre,anopre,perpre";
  //  print "<br> Ano inicio ".$anoinicio."<br> Ano cierre ".$anocierre;


  }

  function Limpiar()
  {
  global $codpre;
  global $nompre;
  global $salvar;
  global $Eliminar;
  global $monasi;
    $salvar="Si";
    $Eliminar="No";
    $codpre="";
    $nompre="";
    $monasi=0;
  }

  function Obtener_FormatoPresup()
  {
  global $tools;
  global $bd;
  global $FormatoPresup;
  global $NumeroPeriodos;
  global $fechainicio;
  global $anoinicio;
  global $fechacierre;
  global $anocierre;
  global $asignacion;
  global $asiper;

    ////////// Definicion Presupuestaria ///////////
     $sql="select * from cpdefniv";
     if ($tb=$tools->buscar_datos($sql))
     {
     $asiper=trim($tb->fields["asiper"]);
     $FormatoPresup=trim($tb->fields["forpre"]);
     $NumeroPeriodos=trim($tb->fields["numper"]);
     $fechainicio=$tb->fields["fecini"];
     $anoinicio=substr($tb->fields["fecini"],0,4);
     $fechacierre=$tb->fields["feccie"];
     $anocierre=substr($tb->fields["feccie"],0,4);
     if (trim($tb->fields["asiper"])=='S'){ $asignacion=true; } else { $asignacion=false; }
     }
  }

  function ObtenerNiveles()
  {
  global $tools;
  global $tb;
  global $mascara;

    $sql="select * from cpniveles";
    if ($tb=$tools->buscar_datos($sql))
     {
       while(!$tb->EOF){
         $aux=$aux.'-'.$tb->fields["nomabr"];
      $tb->MoveNext();
      }
     }
     $mascara=substr($aux,1,strlen($aux));
  }

  function ObtenerNumeroDeRegistros($tabla)
  {
  global $tools;
  global $bd;

    $sql= "select count(*) as numreg from $tabla";
    if ($tb=$tools->buscar_datos($sql))
     {
       return $tb->fields["numreg"];
     }else{
       return 0;
     }

  }

  function VerificarEliminar()
  {
     global $codigo;
     global $tools;
     global $anocierre;
     global $anoinicio;
     global $codpre;

      //verificar si tiene: precompromiso, compromiso, causado, pagado, ajuste, traslado, adiciones
      $sql="select * from cpimpprc where trim(codpre)='$codpre'";
      if (!$tools->buscar_datos($sql)){
         $sql="select * from cpimpcom where trim(codpre)='$codpre'";
         if (!$tools->buscar_datos($sql)){
           $sql="select * from cpimpcau where trim(codpre)='$codpre'";
           if (!$tools->buscar_datos($sql)){
             $sql="select * from cpimppag where trim(codpre)='$codpre'";
             if (!$tools->buscar_datos($sql)){
               $sql="select * from cpmovaju where trim(codpre)='$codpre'";
               if (!$tools->buscar_datos($sql)){
                 $sql="select * from cpmovadi where trim(codpre)='$codpre'";
                 if (!$tools->buscar_datos($sql)){
                     $sql="select * from cpmovtra where trim(codori)='$codpre' or trim(coddes)='$codpre'";
                     if (!$tools->buscar_datos($sql)){
                       $sql="select * from cpasiini where trim(codpre)='$codpre' and anopre >= '$anoinicio' and anopre <= '$anocierre'";
                       if (!$tools->buscar_datos($sql)){
                      $msg="";
                      return $msg;
                      }
                    }else{
                      $msg="Código Presupuestario ya tiene Asociado un Traslado";
                    }
                  }else{
                    $msg="Código Presupuestario ya tiene Asociado una Adicion/Disminución";}
              }else{
                $msg="Código Presupuestario ya tiene Asociado un Ajuste";}
            }else{
              $msg="Código Presupuestario ya tiene Pagado Asociados";}
          }else{
            $msg="Código Presupuestario ya tiene Causado Asociados";}
        }else{
          $msg="Código Presupuestario ya tiene Compromisos Asociados";}
      }else{
        $msg="Código Presupuestario ya tiene Precompromisos Asociados";}
  return $msg;
  }


?>
<!-- DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"-->
<html>
<head>
<title><? echo $forma; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">
<link rel="STYLESHEET" type="text/css"  href="../../lib/general/toolbar/css/dhtmlXToolbar.css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript"  src="../../lib/general/js/funciones.js"></script>
<script language="JavaScript"  src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type='text/javascript' src='../../lib/general/js/dFilter.js'></script>
<script language="JavaScript"  src="../../lib/general/js/prototype.js"></script>

<style type="text/css">
<!--
.style9 {color: #FFFFFF
 }

.gridasignacion {
  color: #00000;
  width: 235px;
  height: 140px;
  overflow: auto;
  overflow:auto;
  background-color: #FFFFFF;
}

-->
</style>
<script language="JavaScript" type="text/JavaScript">
  function desactivar()
  {
  asig='<? echo $asignacion; ?>'
  if (asig){
  i=1;
  var pereje='<? echo $pereje;?>';
  while (i<pereje)
    {
    var x="x"+i+"1";
    var x2="x"+i+"2";

    document.getElementById(x).disabled=true;  //Para mandar los valores por el form se tiene q habilitar
    document.getElementById(x2).disabled=true;
    i=i+1;
    }
    }
  }

  </script>

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

<body onLoad="MM_preloadImages('../../images/rbut_01_f2.gif','../../images/rbut_02_f2.gif','../../images/rbut_03_f2.gif','../../images/rbut_04_f2.gif')">
<form name="form1" method="post" action="PreAsiIni.php?var=<? echo '9'; ?>">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top_p.php'); ?>
    </td>
  </tr>
</table>
<table width="584" align="center">
<tr>
<td height="343" valign="top">
<table width="100%" height="175" border="0" class="box">
  <!--DWLayoutTable-->
  <tr>
    <td height="20" valign="top" class="breadcrumb">SIGA <? echo $modulo; ?></td>
  </tr>
  <tr >
    <td>
      <table width="100%" class="recuadro">
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
    </table>
  </td>
  </tr>
  <tr>
    <td class="box" >

        <table width="100%" align="center" class="bodyline">
          <!--DWLayoutTable-->
                  <tr>
                  <td width="276" height="22" class="form_label_01">
          <fieldset><legend>&nbsp;Datos Del Código Presupuestario&nbsp;</legend>
          <table width="100%" border="0">
                    <tr>
                      <td width="29%">C&oacute;digo</td>
                      <td width="71%"><input name="codpre" type="text" class="imagenInicio" id="codpre" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $codpre; ?>" size="25" maxlength="<? echo strlen($FormatoPresup); ?>"  onKeyDown="javascript:return dFilter (event.keyCode, this,'<? echo $FormatoPresup; ?>');" onKeyPress="buscarenter(event)">
                        <input name="suss" type="button" id="suss" value="..." onClick="javascript: catalogo2(nompre.id,codpre.id,codpre.id);"></td>
                    </tr>
                    <tr>
                      <td>Descripci&oacute;n </td>
                      <td><input name="nompre" type="text" class="imagenInicio" id="nompre" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $nompre; ?>" size="32" readonly="true"></td>
                    </tr>
                  </table>
           </fieldset>
          </td>
                  <td width="276" rowspan="2" valign="top" class="form_label_01">
            <fieldset><legend>&nbsp;Asignación Períodica&nbsp;: &nbsp;<? echo iif($asiper=='S','SI','NO'); ?>&nbsp;&nbsp;</legend>
              <div class="gridasignacion" id="gridasignacion">
            <table width="100%"  border="0" cellpadding="0" cellspacing="0">
            <tr>
            <td width="90" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">Per&iacute;odo</td>
            <td width="154" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Saldo Actual </td>
            </tr>
            <?
          //////// Cargar_Periodos //////////

          if (empty($sql_grip)){  }
          else{
            $tb=$bd->select($sql_grip); }

            if ((!$tb->EOF) and ($sql_grip<>"")){
            $i=1;
              while (!$tb->EOF){  ?>
                <tr>
                <td class="grid_line01_br"><input name="x<? print $i;?>1" type="text" class="grid_txt01" id="x<? print $i;?>1" tabindex="1" value="<? print $tb->fields["perpre"]; ?>" size="8" maxlength="2" ></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt02" size="14" value="<? print number_format($tb->fields["monasi"],2,'.',','); ?>" onKeyPress="entermonto(event,this.id,'x<? print $i+1;?>2')" align="right"  tabindex="2"></td>
                </tr>
                <?
                $i=$i+1;
                $tb->MoveNext();
              }

        $pereje=$i-1;

            }else{
            $i=1;
        $sql="select pereje from cppereje order by pereje";
      $tb=$bd->select($sql);
      if ($tb->EOF){
        Mensaje("No se ha definido ningun periodo...");
      }else{
            //while ($i<=12){
      while (!$tb->EOF){
          $pereje=$tb->fields["pereje"];
            ?>
              <tr>
              <td class="grid_line01_br"><input name="x<? print $i;?>1" type="text" class="grid_txt01" id="x<? print $i;?>1" tabindex="1" value="<? print digitos($i); ?>" size="8" maxlength="2" ></td>
              <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt02" size="10" value="<? print number_format($tb->fields["totdeb1"],2,'.',','); ?>" align="right"  onKeyPress="entermonto(event,this.id,'x<? print $i+1;?>2')" tabindex="2" ></td>
              </tr>
              <?
             $i=$i+1;
      $tb->MoveNext();
            }
      }
          }
          ?>
            </table>
                <? ///////////////////////?>
            </div>
             </fieldset>

          </td>
                  </tr>
                  <tr>
                    <td height="22" class="form_label_01">
          <fieldset><legend>&nbsp;Datos de la Asignación&nbsp;</legend>
          <table width="100%" border="0">
                    <tr>
                      <td width="37%">A&ntilde;o</td>
                      <td width="63%"><input name="ano" type="text" class="imagenInicio" id="ano" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $ano; ?>" size="5" maxlength="4" onKeyPress="buscarenter(event)"></td>
                    </tr>
                    <tr>
                      <td>Monto a Asignar </td>
                      <td>
              <? if ($asignacion)
            { ?>
                 <input name="monasi" type="text" class="imagenInicio" id="monasi" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo number_format($monasi,2,'.',','); ?>" size="15" maxlength="32" onKeyPress="Generar_MontosAsignacion(this.value)" onblur="event.keyCode=13;return formatoDecimal(event,this.id)">
            <?
            }
            else
             {
            ?>
             <input name="monasi" type="text" class="imagenInicio2" id="monasi"  value="<? echo number_format($monasi,2,'.',','); ?>" size="15" maxlength="32" readonly="true">
            <?
             }
            ?>
            </td>
                    </tr>
                  </table>
          </fieldset>

          </td>
                  </tr>
      </table>

    </td>
  </tr>
  <tr>
    <td class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...
  <?  ///// variable oculta que se necesita para guardar //// ?>
      <input name="fechainicio" type="hidden" id="fechainicio" value="<? echo $fechainicio; ?>" />
      <input name="anoinicio" type="hidden" id="anoinicio" value="<? echo $anoinicio; ?>" />
      <input name="fechacierre" type="hidden" id="fechacierre" value="<? echo $fechacierre; ?>" />
      <input name="anocierre" type="hidden" id="anocierre" value="<? echo $anocierre; ?>" />
  <?  /////////////////////////////////////////////////////// ?>
    </span></td>
  </tr>
</table>  </tr>
</td>
</table>
<script>desactivar()</script>
</form>
<? require_once('../../lib/general/bottom.php'); ?>
</body>
<script language="JavaScript">

    function buscarenter(e)
      {
        if (e.keyCode==13)
    {
      f=document.form1;
      f.action="PreAsiIni.php?var=<? echo '9'; ?>";
      f.submit();
    }
     }

     function entermonto(e,id,fc)
    {
      if (e.keyCode==13)
      {
        if (validarnumero(id)==true)
        {
            actualizarsaldos(e);
            focos(e,fc);
        }
        else
         {
            document.getElementById(id).value='0.00';
            document.getElementById(id).focus();
            document.getElementById(id).select();
        }
      } //if (e.keyCode==13)
    } //end function

    function actualizarsaldos(e)
      {
    if (e.keyCode==13)
    {
        f=document.form1;
        i=1;
        var acum=0;
    var pereje='<? echo $pereje;?>';
        while (i<=pereje)
        {
          var x="x"+i+"2";
          str= document.getElementById(x).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');

          var num=parseFloat(str);

          acum=acum+num;

          document.getElementById(x).value=format(num.toFixed(2),'.','.',',');
          i=i+1;
        }
        document.form1.monasi.value=format(acum.toFixed(2),'.','.',',');
      }
       }

    function Eliminar()
     {
      if(confirm("¿Esta seguro que desear Eliminar este Código?"))
        {
          f=document.form1;
          f.action="imecPreAsiIni.php?imec=<? echo 'E'; ?>";
          f.submit();
        }
     }

  function Limpiar()
           {
               location=("PreAsiIni.php")
           }


         function onButtonClick(itemId,itemValue)// TOOLBAR
    {
      f=document.form1;

      if(itemId == '0_ojo'){
        //alert("Usted vera una Consulta");
        catalogo2('mcodigo','x','mcodigo');  // campo, x = que no devuelva nada en el 2do campo, mcodigo = foco
      }
      /////////////////////
      else if(itemId == '0_cancelar')
           {
               Limpiar();
           }

      else if(itemId == '0_save')
      {
      salvar='<? echo $salvar; ?>'
    var pereje='<? echo $pereje;?>';
      if (salvar!='No'){
        if(confirm("¿Realmente desea Salvar?"))
        {
          f=document.form1;
          if (document.form1.codpre.value=="")
            { alert("No puede salvar sin introducir el Código del Título Presupuestario"); }
            else if (document.form1.ano.value=="")
              { alert("No puede salvar sin introducir el Año de la Asignación"); }

              else{
                f.action="imecPreAsiIni.php?imec=<? echo 'I'; ?>&IncMod=<? echo $IncMod; ?>";
                 //Se debe habilitar para poder enviar por el $_POST
                 i=1;
                while (i<pereje)
                  {
                  var x="x"+i+"1";
                  var x2="x"+i+"2";

                  document.getElementById(x).disabled=false;  //Para mandar los valores por el form se tiene q habilitar
                  document.getElementById(x2).disabled=false;
                  i=i+1;
                  }

                f.submit();

            }
        }
       }
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
          catalogo2(nompre.id,codpre.id,codpre.id);
      }
      else if(itemId == '0_filter'){

      }
      else if(itemId == '0_cancelar'){
          cancelar();
      }
      else if(itemId == '0_delete')
      {
        var eliminar='<? echo $Eliminar; ?>';
        var msg='<? echo $msg; ?>';
        if (eliminar=='No'){ alert("No se puede eliminar esta Cuenta Presupuestaria")}
        else if (msg!=''){ alert("No se puede eliminar el " +msg)}
        else
        {
          if(confirm("¿Esta seguro que desea Eliminar este Código?"))
            {
              f=document.form1;
              f.action="imecPreAsiIni.php?imec=<? echo 'E'; ?>";
              f.submit();
            }
        }
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


     function primero()
      {
      f=document.form1;
      f.action="PreAsiIni.php?var=<? print '1';?>";
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
      f.action="PreAsiIni.php?var=<? print '2';?>";
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      f.action="PreAsiIni.php?var=<? print '3';?>";
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      f.action="PreAsiIni.php?var=<? print '4';?>";
      f.submit();
     }


     function catalogo2(campo,campo2,foco)
     {
    f=document.form1;
      ////sql='select codcta  as CODIGO,descta as DESCRIPCION from contabb where descta like upper(�%�) order by codcta';
      //sql='select nompre as descripcion,codpre as codigo from cpdeftit a, cpdefniv b where length(trim(a.codpre))= length(trim(b.forpre)) and upper(a.nompre) like upper(�%�) order by a.codpre'
      //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
      //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=600,height=470,resizable=yes,left=50,top=50");


        var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Preasiini_Cpdeftit/clase/Cpdeftit/frame/form1/obj1/codpre/obj2/nompre/campo1/codpre/campo2/nompre/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

     }


     function Generar_MontosAsignacion(valor)
     {
  var pereje='<? echo $pereje;?>';

    MontoPeriodo=valor/pereje;
    i=1;
      while (i<=pereje)
        {
        var x2="x"+i+"2";
        document.getElementById(x2).value=format(MontoPeriodo.toFixed(2),'.','.',',');
        i=i+1;
        }

     }
</script>

<script language="JavaScript" type="text/javascript">
  //var foco='<? print $foco; ?>';
  //document.getElementById(foco).focus();
</script>


</html>

