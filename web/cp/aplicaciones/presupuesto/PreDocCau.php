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
$forma="Causados";
$modulo=$_SESSION["modulo"] . " > Def. Especificas > Documentos > ".$forma;


if (!empty($_POST["var"]))
{
  $var=$_POST["var"];
  if (!empty($_POST["tipdoc"])) {$tipcau=strtoupper(trim($_POST["tipdoc"]));}

  /* if ($var=='C') //CONSULTA
   {
   $tipcau=strtoupper(trim($_POST["tipdoc"]));
   }
   else */
  if ($var=='1')//PRIMERO
  {
    if ($tb=$z->primerRegistro('cpdoccau','tipcau'))
    {
      $tipcau=strtoupper(trim($tb->fields["tipcau"]));
    }
  }
  else if ($var=='2')//ANTERIOR
  {
    if (!empty($tipcau))
    {
      $aux=strtoupper(trim($tipcau));
      //chekeamos q no sea el primero
      $tb=$z->primerRegistro('cpdoccau','tipcau');
      $tipcau=strtoupper(trim($tb->fields["tipcau"]));
      if ($aux!=$tipcau)
      {
        $tb=$z->anteriorRegistro('cpdoccau','tipcau',$aux,'N');
      }
      else
      {
        $tb=$z->ultimoRegistro('cpdoccau','tipcau');
      }
    }
    else
    {
      $tb=$z->ultimoRegistro('cpdoccau','tipcau');
    }
    if (!$tb->EOF)
    {
      $tipcau=strtoupper(trim($tb->fields["tipcau"]));
    }
  }
  else if ($var=='3')//SIGUIENTE
  {
    if (!empty($tipcau))
    {
      $aux=strtoupper(trim($tipcau));
      //chekeamos q no sea el ultimo
      $tb=$z->ultimoRegistro('cpdoccau','tipcau');
      $tipcau=strtoupper(trim($tb->fields["tipcau"]));
      if ($aux!=$tipcau)
      {
        $tb=$z->proximoRegistro('cpdoccau','tipcau',$aux,'N');
      }
      else
      {
        $tb=$z->primerRegistro('cpdoccau','tipcau');
      }
    }
    else
    {
      $tb=$z->primerRegistro('cpdoccau','tipcau');
    }
    if (!$tb->EOF)
    {
      $tipcau=strtoupper(trim($tb->fields["tipcau"]));
    }
  }
  else if ($var=='4')//ULTIMO
  {
    if ($tb=$z->ultimoRegistro('cpdoccau','tipcau'))
    {
      $tipcau=strtoupper(trim($tb->fields["tipcau"]));
    }
  }
  //TRAER DATOS
  $sql="select * from cpdoccau where trim(upper(tipcau))='".$tipcau."' ";
  if ($tb=$z->buscar_datos($sql))
  {
    $tipdoc=$tb->fields["tipcau"];
    $nomext=$tb->fields["nomext"];
    $nomabr=$tb->fields["nomabr"];
    $refprc=$tb->fields["refier"];
    $afeprc=$tb->fields["afeprc"];
    $afecom=$tb->fields["afecom"];
    $afecau=$tb->fields["afecau"];
    $afedis=$tb->fields["afedis"];
    $imec="M";
    $block='1';
    $save='S';
    $delete='S';
  }
  else
  {
    $tipdoc=strtoupper(trim($tipcau));
    $nomext="";
    $nomabr="";
    $imec="I";
    $block='1';
    $save='S';
    $delete='N';
  }
}
else//SI EL VAR VIENE VACIO
{
  $tipdoc="";
  $nomext="";
  $nomabr="";
  $block='0';
  $imec="I";
  $save='S';
  $delete='N';
}


//////////////////////////
if ($var=="L")
{
  //Limpiar
  $tipdoc="";
  $nomext="";
  $nomabr="";
  $block='0';
  $imec="I";
  $save='S';
  $delete='N';
}


?>
<!--DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"-->
<html>
<head>
<title><? echo $forma; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="../../lib/css/base.css" type=text/css
  rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">
<link rel="STYLESHEET" type="text/css"
  href="../../lib/general/toolbar/css/dhtmlXToolbar.css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet"
  type="text/css">
<link rel="stylesheet" TYPE="text/css" MEDIA="screen"
  href="../../lib/css/tabber.css">
<script language="JavaScript" src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"
  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"
  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"
  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"
  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type='text/javascript' src='../../lib/general/js/dFilter.js'></script>
<script type='text/javascript' src='../../lib/general/js/funciones.js'></script>
<script type="text/javascript" src="../../lib/general/js/tabber.js"></script>
<script type="text/JavaScript" src="../../lib/general/js/prototype.js"></script>

</head>

<body>
<form name="form1" method="post" action="">
<table width="100%" align="center">
  <tr>
    <td width="100%"><? require_once('../../lib/general/top_p.php'); ?></td>
  </tr>
</table>
<table width="584" border="0" align="center">
  <tr>
    <td colspan="2">
    <table border="0" class="box">
      <tr>
        <td class="breadcrumb">SIGA <? echo $modulo; ?> <input name="imec"
          type="hidden" id="imec"></td>
      </tr>
      <tr>
        <td>
        <table width="100%" class="recuadro">
          <tr>
            <td align="center" width="27%">
            </td>
            <td align="right" width="73%"><?  // MENU PRINCIPAL  // ?>
            <div align="center" id="toolbar_zone2"
              style="border :0px solid Silver;" />

            </td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td class="box">
        <table width="100%" align="center" class="bodyline">
          <!--DWLayoutTable-->
          <tr>
            <td height="22" colspan="3" class="form_label_01">
            <fieldset><legend>Datos del Documento</legend>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="23%">Tipo de Documento</td>
                    <td width="77%"><? if ($block=='0') { ?> <input name="tipdoc"
                      type="text" class="imagenInicio" id="tipdoc"
                      onMouseOver="this.className='imagenFoco'"
                      onMouseOut="this.className='imagenInicio'"
                      onKeyPress="buscarenter(event)" value="<? print $tipdoc;?>"
                      size="7" maxlength="4"> <? } else { ?> <input name="tipdoc"
                      type="text" id="tipdoc" onKeyPress="buscarenter(event)"
                      value="<? print $tipdoc;?>" size="7" maxlength="4"
                      readonly="true"> <? } ?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;<input name="var" type="hidden" id="var"
                      value="<? print $var;?>"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Nombre Extendido</td>
                    <td><input name="nomext" type="text" id="nomext"
                      class="imagenInicio"
                      onMouseOver="this.className='imagenFoco'"
                      onMouseOut="this.className='imagenInicio'" size="75"
                      value="<? print $nomext;?>"
                      onKeyPress="focos(event,'nomabr')"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Nombre Abreviado</td>
                    <td><input name="nomabr" type="text" class="imagenInicio"
                      id="nomabr" onMouseOver="this.className='imagenFoco'"
                      onMouseOut="this.className='imagenInicio'"
                      value="<? print $nomabr;?>" size="7" maxlength="4"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="162">Refiere a</td>
                        <td width="400">
                        <fieldset>
                        <table width="356" border="0" cellpadding="0"
                          cellspacing="0">
                          <tr>
                            <td width="143">
                            <div align="center"><label> <? if ($refprc=='P') { ?> <input
                              type="radio" name="radio" id="radio" value="P" checked> <? } else { ?>
                            <input type="radio" name="radio" id="radio" value="P"> <? } ?>
                            Precompromiso</label></div>
                            </td>
                            <td width="131"><label> <? if ($refprc=='C') { ?> <input
                              type="radio" name="radio" id="radio" value="C" checked> <? } else { ?>
                            <input type="radio" name="radio" id="radio" value="C"> <? } ?>
                            Compromiso</label></td>
                            <td width="99">
                            <div align="center"><label> <? if (($refprc=='N') || ($refprc=='')) { ?>
                            <input type="radio" name="radio" id="radio" value="N"
                              checked> <? } else { ?> <input type="radio" name="radio"
                              id="radio" value="N"> <? } ?> Ninguno</label></div>
                            </div>
                            </td>
                          </tr>
                        </table>
                        </fieldset>
                        </td>
                        <td width="125">&nbsp;</td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td>
                <div class="tabber">
                <div class="tabbertab">
                <h2>Precompromiso</h2>
                <table width="522" height="100%" align="left" cellpadding="2"
                  cellspacing="1" bgcolor="#FFFFFF" class="recuadro">
                  <tr valign="middle">
                    <td width="19" height="10" valign="top"></td>
                    <td width="458" height="10" valign="top">
                    <fieldset>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="37%"><label> <? if ($afeprc=='S') { ?> <input
                          type="radio" name="radio0" id="radio0" value="S" checked> <? } else { ?>
                        <input type="radio" name="radio0" id="radio0" value="S"> <? } ?>
                        Suma </label></td>
                        <td width="38%"><label> <? if ($afeprc=='R') { ?> <input
                          type="radio" name="radio0" id="radio0" value="R" checked> <? } else { ?>
                        <input type="radio" name="radio0" id="radio0" value="R"> <? } ?>
                        Resta </label></td>
                        <td width="25%"><label> <? if (($afeprc=='N') || ($afeprc=='')) { ?>
                        <input type="radio" name="radio0" id="radio0" value="N"
                          checked> <? } else { ?> <input type="radio" name="radio0"
                          id="radio0" value="N"> <? } ?> No Afecta </label></td>
                      </tr>
                    </table>
                    </fieldset>
                    </td>
                    <td width="27" height="2" valign="top"></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
                </div>


                <div class="tabbertab">
                <h2>Compromiso</h2>
                <table width="522" height="100%" align="left" cellpadding="2"
                  cellspacing="1" bgcolor="#FFFFFF" class="recuadro">
                  <tr valign="middle">
                    <td width="19" height="10" valign="top"></td>
                    <td width="458" height="10" valign="top">
                    <fieldset>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="37%"><label> <? if ($afecom=='S') { ?> <input
                          type="radio" name="radio1" id="radio1" value="S" checked> <? } else { ?>
                        <input type="radio" name="radio1" id="radio1" value="S"> <? } ?>
                        Suma </label></td>
                        <td width="38%"><label> <? if ($afecom=='R') { ?> <input
                          type="radio" name="radio1" id="radio1" value="R" checked> <? } else { ?>
                        <input type="radio" name="radio1" id="radio1" value="R"> <? } ?>
                        Resta </label></td>
                        <td width="25%"><label> <? if (($afecom=='N') || ($afecom=='')) { ?>
                        <input type="radio" name="radio1" id="radio1" value="N"
                          checked> <? } else { ?> <input type="radio" name="radio1"
                          id="radio1" value="N"> <? } ?> No Afecta </label></td>
                      </tr>
                    </table>
                    </fieldset>
                    </td>
                    <td width="27" height="2" valign="top"></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
                </div>

                <div class="tabbertab">
                <h2>Causado</h2>
                <table width="522" height="100%" align="left" cellpadding="2"
                  cellspacing="1" bgcolor="#FFFFFF" class="recuadro">
                  <tr valign="middle">
                    <td width="19" height="10" valign="top"></td>
                    <td width="458" height="10" valign="top">
                    <fieldset>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="37%"><label> <? if ($afecau=='S') { ?> <input
                          type="radio" name="radio3" id="radio3" value="S" checked> <? } else { ?>
                        <input type="radio" name="radio3" id="radio3" value="S"> <? } ?>
                        Suma </label></td>
                        <td width="38%"><label> <? if ($afecau=='R') { ?> <input
                          type="radio" name="radio3" id="radio3" value="R" checked> <? } else { ?>
                        <input type="radio" name="radio3" id="radio3" value="R"> <? } ?>
                        Resta </label></td>
                        <td width="25%"><label> <? if (($afecau=='N') || ($afecau=='')) { ?>
                        <input type="radio" name="radio3" id="radio3" value="N"
                          checked> <? } else { ?> <input type="radio" name="radio3"
                          id="radio3" value="N"> <? } ?> No Afecta </label></td>
                      </tr>
                    </table>
                    </fieldset>
                    </td>
                    <td width="27" height="2" valign="top"></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
                </div>

                <div class="tabbertab">
                <h2>Disponibilidad</h2>
                <table width="522" height="100%" align="left" cellpadding="2"
                  cellspacing="1" bgcolor="#FFFFFF" class="recuadro">
                  <tr valign="middle">
                    <td width="19" height="10" valign="top"></td>
                    <td width="458" height="10" valign="top">
                    <fieldset>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="37%"><label> <? if ($afedis=='S') { ?> <input
                          type="radio" name="radio2" id="radio2" value="S" checked> <? } else { ?>
                        <input type="radio" name="radio2" id="radio2" value="S"> <? } ?>
                        Suma </label></td>
                        <td width="38%"><label> <? if ($afedis=='R') { ?> <input
                          type="radio" name="radio2" id="radio2" value="R" checked> <? } else { ?>
                        <input type="radio" name="radio2" id="radio2" value="R"> <? } ?>
                        Resta </label></td>
                        <td width="25%"><label> <? if (($afedis=='N') || ($afedis=='')) { ?>
                        <input type="radio" name="radio2" id="radio2" value="N"
                          checked> <? } else { ?> <input type="radio" name="radio2"
                          id="radio2" value="N"> <? } ?> No Afecta </label></td>
                      </tr>
                    </table>
                    </fieldset>
                    </td>
                    <td width="27" height="2" valign="top"></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
                </div>

                </div>
                </td>
              </tr>
            </table>
            </fieldset>
            </td>
          </tr>
          <tr>
            <td width="140" height="0"></td>
            <td width="182" colspan="-5"></td>
            <td width="232"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td class="breadcrumb">Registro de <? echo $forma; ?>... <?  ///// variable oculta que se necesita para guardar //// ?>
        <input name="fecini" type="hidden" id="fecini"
          value="<? //echo $fecini; ?>" /> <?  /////////////////////////////////////////////////////// ?>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<script>
f=document.form1;
block='<? print $block;?>';
if (block=='0')
{
  f.tipdoc.focus();
}
else
{
  f.nomext.focus();
}
</script></form>
<? require_once('../../lib/general/bottom.php'); ?>
</body>
<script language="JavaScript">

     function consulta()
      {
          f=document.form1;
          document.getElementById('var').value='C';
          var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          var campo2='tipdoc';
          var campo='nomext';
          var foco='submit';
          sql='Select nomext as Nombre_Extendido,tipcau as Tipo,nomabr as Nombre_Abreviado From CPDocCau where upper(nomext) like upper(�%�)  Order By tipcau';
          //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
          //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");

          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpdoccau_Predoccom/clase/Cpdoccau/frame/form1/obj1/tipdoc/campo1/tipcau/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

     }

     function primero()
      {
      f=document.form1;
       document.getElementById('var').value='1';
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
       document.getElementById('var').value='2';
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
       document.getElementById('var').value='3';
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
       document.getElementById('var').value='4';
      f.submit();
     }

    function buscarenter(e)
    {
       if (e.keyCode==13)
       {
          f=document.form1;
          f.action="PreDocCau.php";
          document.getElementById('var').value='C';
          f.submit();
       }
    }

     function cancelar()
     {
         f=document.form1;
         document.getElementById('var').value='L';
         f.action="PreDocCau.php";
         f.submit();
     }

     function salvar()
    {
      f=document.form1;
      document.getElementById('var').value='';
      save='<? print $save;?>';
      if (save=='S')
      {
        if(confirm("�Realmente desea Salvar?"))
        {
          if (verificar())
          {
            imec='<? print $imec;?>';
            f.action="imecPreDocCau.php?imec="+imec;
            f.submit();
          }
        }
      }
    }

     function eliminar()
    {
      f=document.form1;
      document.getElementById('var').value='';
      del='<? print $delete;?>';
      if (del=='S')
      {
        if(confirm("�Realmente desea Eliminar?"))
        {
            imec='E';
            f.action="imecPreDocCau.php?imec="+imec;
            f.submit();
        }
      }
    }

    function verificar()
    {
      f=document.form1;

      if (!verificar_campo_clave(0,f.tipdoc.value,"No puede salvar sin introducir un Tipo del Causado"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.nomext.value,"No puede salvar sin introducir El nombre Extendido"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.nomabr.value,"No puede salvar sin introducir El nombre Abreviado"))
      {
        return false;
      }
      else
      {
        return true;
      }

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
               cancelar();
           }

      else if(itemId == '0_save')
      {
        salvar();
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
        consulta();
      }
      else if(itemId == '0_filter'){

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



</script>

</html>
