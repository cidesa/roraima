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
$forma="Tipos de Cuenta-Cuentas Contables";
$modulo=$_SESSION["modulo"].">Contabilidad Financiera>".$forma;
//CARGAR MASCARA
$sql="SELECT * from contaba where codemp='001'";
if ($tb=$z->buscar_datos($sql))
{
$modulo = $modulo."  *** Ejercicio Fiscal: ".substr($tb->fields["feccie"],0,4)." ***";
$_SESSION["formato"]=$tb->fields["forcta"];
}
else
{
$_SESSION["formato"]="";
}

  //PARA TIPOS CUENTAS
  $sql="select * from contaba where codemp='001'";
  if ($tb=$z->buscar_datos($sql))
  {
    $activos=$tb->fields["codtesact"];
    $pasivos=$tb->fields["codtespas"];
    $ingresos=$tb->fields["codind"];
    $egresos=$tb->fields["codegd"];
    $resultado=$tb->fields["codctd"];
    $capital=$tb->fields["codcta"];
    $orden=$tb->fields["codord"];

    if ($activos!="")
    {
      if ($z->buscar_codigoHijo($activos))
      {
        $r1=true;
      }
      else
      {
        $r1=false;
      }
    }  // if ($activos!="")

    if ($pasivos!="")
    {
      if ($z->buscar_codigoHijo($pasivos))
      {
        $r2=true;
      }
      else
      {
        $r2=false;
      }
    }// if ($pasivos!="")

    if ($ingresos!="")
    {
      if ($z->buscar_codigoHijo($ingresos))
      {
        $r3=true;
      }
      else
      {
        $r3=false;
      }
    }// if ($ingresos!="")

    if ($egresos!="")
    {
      if ($z->buscar_codigoHijo($egresos))
      {
        $r4=true;
      }
      else
      {
        $r4=false;
      }
    }//if ($egresos!="")

    if ($resultado!="")
    {
      if ($z->buscar_codigoHijo($resultado))
      {
        $r5=true;
      }
      else
      {
        $r5=false;
      }
    }// if ($resultado!="")

    if ($capital!="")
      {
        if ($z->buscar_codigoHijo($capital))
        {
          $r6=true;
        }
        else
        {
          $r6=false;
        }
      }//if ($capital!="")

    if ($orden!="")
    {
      if ($z->buscar_codigoHijo($orden))
      {
        $r7=true;
      }
      else
      {
        $r7=false;
      }
    }//if ($orden!="")

    /*$r1=false;
    $r2=false;
    $r3=false;
    $r4=false;
    $r5=false;
    $r6=false;
    $r7=false;*/

  }
  else
  {
    $activos="";
    $pasivos="";
    $ingresos="";
    $egresos="";
    $resultado="";
    $capital="";
    $orden="";
  }

  if ($_GET["var"]<>'9'){
    //PARA CUENTAS CONTABLES
    $sql="SELECT * FROM CONTABA WHERE CODEMP='001'";
    if ($tb=$z->buscar_datos($sql))
    {
      $resant=$tb->fields["codresant"];
      $resact=$tb->fields["codres"];
    }
    else
    {
      $resant="";
      $resact="";
    }
  }else{
    $resant=trim($_POST["resant"]);
    $resact=trim($_POST["resact"]);
    if (!empty($resant)){
      $sql="select * from contabb where codcta='$resant'";
      if ($tb=$z->buscar_datos($sql))
      {
        if ($tb->fields["cargab"]=='N')
        {
          Mensaje("La Cuenta de Resultado Acumulado de los Ejercicios Anteriores No es Cargable");
          $resant="";
        }else{
          $resant=$tb->fields["codcta"];
          }
      }else{
        Mensaje("Número de cuenta no Existe");
        $resant="";
      }
    }
    if (!empty($resact)){
      $sql="select * from contabb where codcta='$resact'";
      if ($tb=$z->buscar_datos($sql))
      {
        if ($tb->fields["cargab"]=='N')
        {
          Mensaje("La Cuenta de Resultado Acumulado de Restar los Ingresos menos los Egresos del Ejercicio en Curso No es Cargable");
          $resact="";
        }else{
          $resact=$tb->fields["codcta"];
          }
      }else{
        Mensaje("Número de cuenta no Existe");
        $resact="";
      }

    }

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
<script language="JavaScript"  src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"  src="../../lib/general/js/funciones.js"></script>
<script language="JavaScript"  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type='text/javascript' src='../../lib/general/js/dFilter.js'></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>

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
//-->
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
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
<form name="form1" method="post" action="">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top.php'); ?>
    </td>
  </tr>
<tr>
<td align="center">
<table width="584" height="175" border="0" class="box">
  <!--DWLayoutTable-->
    <tr>
        <td class="breadcrumb">SIGA  <? echo $modulo; ?>
      </tr>
  <tr >
    <td bgcolor="#FFFFDD"  class="box" >
      <? //include('menu.php'); ?>	</td>
  </tr>
  <tr>

    <td class="box" >
        <table width="545" align="center" class="bodyline">

                       <?  // MENU PRINCIPAL  // ?>
              <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>


                <!--DWLayoutTable-->
                <tr>
                  <td height="22" colspan="3" class="form_label_01"><table width="100%" border="0">
                      <tr>
                        <td height="17" colspan="3" class="tpButtons">Tipos de
                          Cuentas</td>
                      </tr>
                      <tr>
                        <td width="94">&nbsp;</td>
                        <td width="161">Cuentas de Activos:</td>
            <?
              if ($r1)
              {
            ?>
                          <td width="268"><input name="activos" type="text" class="imagenInicio"  onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"   readonly="true" id="activos" onKeyPress="buscarenter(event)" value="<? print $activos;?>" size="20"></td>
            <?
              }
              else
              {
            ?>
                          <td width="268"><input name="activos" type="text" class="imagenInicio" id="activos" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onBlur="buscarenter2(this.id,'pasivos')" value="<? print $activos;?>" size="20"></td>
            <?
              }
            ?>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>Cuentas de Pasivos:</td>
                        <?
              if ($r2)
              {
            ?>
                          <td width="268"><input name="pasivos" type="text" class="imagenInicio"  onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"   readonly="true" id="pasivos" onKeyPress="buscarenter(event)" value="<? print $pasivos;?>" size="20"></td>
            <?
              }
              else
              {
            ?>
                          <td width="268"><input name="pasivos" type="text" class="imagenInicio" id="pasivos" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onBlur="buscarenter2(this.id,'ingresos')" value="<? print $pasivos;?>" size="20"></td>
            <?
              }
            ?>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>Cuentas de Ingresos:</td>
                        <?
              if ($r3)
              {
            ?>
                          <td width="268"><input name="ingresos" type="text" class="imagenInicio"  onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"  readonly="true" id="ingresos" onKeyPress="buscarenter(event)" value="<? print $ingresos;?>" size="20"></td>
            <?
              }
              else
              {
            ?>
                          <td width="268"><input name="ingresos" type="text" class="imagenInicio" id="ingresos" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onBlur="buscarenter2(this.id,'egresos')" value="<? print $ingresos;?>" size="20"></td>
            <?
              }
            ?>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>Cuentas de Egresos:</td>
                        <?
              if ($r4)
              {
            ?>
                          <td width="268"><input name="egresos" type="text" class="imagenInicio"  onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"   readonly="true" id="egresos" onKeyPress="buscarenter(event)" value="<? print $egresos;?>" size="20"></td>
            <?
              }
              else
              {
            ?>
                          <td width="268"><input name="egresos" type="text" class="imagenInicio" id="egresos" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onBlur="buscarenter2(this.id,'resultado')" value="<? print $egresos;?>" size="20"></td>
            <?
              }
            ?>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>Cuentas de Resultado:</td>
                        <?
              if ($r5)
              {
            ?>
                          <td width="268"><input name="resultado" type="text" class="imagenInicio"  onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"   readonly="true" id="resultado" onKeyPress="buscarenter(event)" value="<? print $resultado;?>" size="20"></td>
            <?
              }
              else
              {
            ?>
                          <td width="268"><input name="resultado" type="text" class="imagenInicio" id="resultado" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onBlur="buscarenter2(this.id,'capital')" value="<? print $resultado;?>" size="20"></td>
            <?
              }
            ?>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>Cuentas de Capital:</td>
                         <?
              if ($r6)
              {
            ?>
                          <td width="268"><input name="capital" type="text" class="imagenInicio"  onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"  readonly="true" id="capital" onKeyPress="buscarenter(event)" value="<? print $capital;?>" size="20"></td>
            <?
              }
              else
              {
            ?>
                          <td width="268"><input name="capital" type="text" class="imagenInicio" id="capital" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onBlur="buscarenter2(this.id,'orden')" value="<? print $capital;?>" size="20"></td>
            <?
              }
            ?>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>Cuentas de Orden:</td>
                        <?
              if ($r7)
              {
            ?>
                          <td width="268"><input name="orden" type="text" class="imagenInicio"  onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"  readonly="true" id="orden" onKeyPress="buscarenter(event)" value="<? print $orden;?>" size="20"></td>
            <?
              }
              else
              {
            ?>
                         <td width="268"><input name="orden" type="text" class="imagenInicio" id="orden" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onBlur="buscarenter2(this.id,'activos')" value="<? print $orden;?>" size="20"></td>
            <?
              }
            ?>
                      </tr>
                    </table>
          <table width="100%" border="0">
                      <tr> </tr>
                      <tr>
                        <td height="17" colspan="3" class="tpButtons">Cuentas
                          Contables </td>
                      </tr>
                    </table>
<table width="100%" border="0">
  <tr>
    <td>
        <fieldset><legend>Cuenta Resultado de Ejercicios Anteriores</legend>
                <table width="100%" border="0">
                            <tr>
                              <td width="13%"><div align="right"><img src="../../images/adverten.gif"></div></td>
                              <td colspan="2">En esta cuenta se alojar&aacute;
                                el resultado acumulado de los Ejercicios anteriores
                                (INGRESOS - EGRESOS)</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td width="20%">&nbsp;</td>
                              <td width="67%"><input name="resant" type="text" id="resant" class="imagenInicio"  onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="buscarenter(event,this.value,this.id)" value="<? print $resant;?>" size="20" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" onBlur="buscar(this.value,this.id);">
                                <input name="Submit2" type="button" class="botton" value="..." onClick="catalogo('resant','resant','resant','2');"></td>
                            </tr>
                          </table>
         </fieldset>			   </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>
        <fieldset>
        <legend>Cuenta Resultado de Ejercicios Actual</legend>
                  <table width="100%" border="0">
                            <tr>
                              <td width="13%"><div align="right"><img src="../../images/adverten.gif"></div></td>
                              <td colspan="2">En esta cuenta se alojar&aacute;
                                el resultado de restar los Ingresos menos los
                                Egresos del Ejercicio en Curso (INGRESOS - EGRESOS)</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td width="20%">&nbsp;</td>
                              <td width="67%"><input name="resact" type="text" class="imagenInicio" id="resact" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="buscarenter(event,this.value,this.id)" value="<? print $resact;?>" size="20" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" onBlur="buscar(this.value,this.id);">
                                <input name="Submit22" type="button" class="botton" value="..." onClick="catalogo('resact','resact','resact','2');"></td>
                            </tr>
                          </table>
        </fieldset>				</td>
  </tr>
</table>                  </td>
                </tr>
                <tr>
                  <td width="138" height="0"></td>
                  <td width="391" colspan="2"></td>
                </tr>
              </table>		</td>
  </tr>
  <tr>
            <td></td>
  </tr>
  <tr>
    <td class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...</span></td>
  </tr>
</table>
  </tr>
</td>
</table>
<? require_once('../../lib/general/bottom.php'); ?>
</form>
 </body>

<script language="JavaScript">

    function buscarenter(e,tira,id)
      {
        if (e.keyCode==13)
      {
      //document.getElementById(id).value=rayitas(e,tira);
      f=document.form1;
      f.action="ConFinTipCueCon.php?var=<? echo '9'; ?>";
      f.submit();
      }
     }

    function buscarenter2(id,foco)
      {
        if (document.getElementById(id).value!='')
        {
        tira=document.getElementById(id).value;
        f=document.form1;
        pagina="gridatos.php?cuantos=2&tira="+tira+"&foco="+foco+"&id="+id;
        window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=no,width=20,height=20,resizable=no,left=100,top=300");
        }
     }



    function buscar(tira,id)
      {
      document.getElementById(id).value=rayitasfc(tira);
      f=document.form1;
      f.action="ConFinTipCueCon.php?var=<? echo '9'; ?>";
      f.submit();
     }


     function cancelar()
     {
         f=document.form1;
      f.action="ConFinTipCueCon.php";
      f.submit();
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
        f=document.form1;
         if (!(f.activos.value.length))
         {
          alert("Debe llenar la Cuenta de Activos")
          f.close();
         }
            else if (!(f.pasivos.value.length))
            {
              alert("Debe llenar la Cuenta de Pasivos")
              f.close();
            }
            else if (!(f.ingresos.value.length))
            {
              alert("Debe llenar la Cuenta de Ingresos")
              f.close();
            }
            else if (!(f.egresos.value.length))
            {
              alert("Debe llenar la Cuenta de Egresos")
              f.close();
            }
            else if (!(f.resultado.value.length))
            {
              alert("Debe llenar la Cuenta de Resultado")
              f.close();
            }
            else if (!(f.capital.value.length))
            {
              alert("Debe llenar la Cuenta de Capital")
              f.close();
            }
            else if (!(f.orden.value.length))
            {
              alert("Debe llenar la Cuenta de Orden")
              f.close();
            }
            else if (!(f.resant.value.length))
            {
              alert("Debe llenar la Cuenta de Resultados Anteriores")
              f.close();
            }
            else if (!(f.resact.value.length))
            {
              alert("Debe llenar la Cuenta de Resultados Actuales")
              f.close();
            }

        if(confirm("Realmente desea Salvar?"))
        {
        //  f.imec.value='I';
          f.action="imecConFinTipCueCon.php?imec=I";
          f.submit();
        }
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
        //consulta();
      }
      else if(itemId == '0_filter'){
        alert("Filtro");
      }
      else if(itemId == '0_cancelar'){
          cancelar();
      }
      else if(itemId == '0_delete')
      {
          f=document.form1;
          sta='<?=$staapa2;?>';
          pagina="eliminar.php?ref="+f.ref.value+"&sta="+sta+"&montot2="+f.montot2.value+"&apar="+f.apar.value+"&disp="+f.disp.value;
          window.open(pagina,"Eliminar Apartado","menubar=no,toolbar=no,scrollbars=no,width=200,height=20,resizable=yes,left=200,top=300");
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
    aToolBar.loadXML("../../lib/general/_toolbarV1.xml");
    aToolBar.setToolbarCSS("toolbar_zone2","toolbarText3");
    aToolBar.showBar();

  function catalogo(campo,campo2,foco,sw)
   {
   if (sw=='1')
    {
     var sql='Select CodCta AS Codigo,DesCta AS Descripcion From CONTABB Where Cargab<>¿N¿ descta like upper(¿%¿) Order By CodCta'
   var filtro='descta';
     var titulo="Catlogo de Tipo de PreCompromiso"
      ViewCatalogo(campo,campo2,sql,foco,titulo);
  }

   if (sw=='2')
   {
      var sql='Select DesCta AS Descripcion,CodCta AS Codigo From CONTABB Where Cargab<>¿N¿ and descta like upper(¿%¿) Order By CodCta'
    var filtro='descta';
      var titulo='Catlogo de Beneficiario'

    ViewCatalogo(campo,campo2,sql,foco,filtro,titulo);
  }
   }


   function ViewCatalogo(campo,campo2,sql,foco,filtro,titulo)
   {
      pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&titulo="+titulo+"&filtro="+filtro+"&foco="+foco;
     window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=600,height=450,resizable=yes,left=50,top=50");
   }

  function IsNumeric(valor)// FORMATEAR FECHA
    {
    var log=valor.length; var ok="S";
    for (x=0; x<log; x++)
    { v1=valor.substr(x,1);
    v2 = parseInt(v1);
    //Compruebo si es un valor numrico
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
    // Ao no viciesto y es febrero y el dia es mayor a 28
    if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; }
    }
    return (fecha);
  }
  </script>

</html>
