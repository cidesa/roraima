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

require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/tools.php');
validar(array(8,11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tools= new tools();


$modulo="";
$forma="Solicitud de Créditos Adiciones/Disminuciones";
$modulo=$_SESSION["modulo"] . " > Ejecución Presupuestaria > ".$forma;
Limpiar();
 //limitar datos  del movimiento
 $i=1;
 while ($i<=50)
 {
     $_POST["x".$i."1"]= "";
     $_POST["x".$i."2"]= "";
     $_POST["x".$i."3"]= number_format(0,2,'.',',');
     $_POST["x".$i."4"]= number_format(0,2,'.',',');
     $i=$i +1;
 }

//CARGAR MASCARA
  $sql="SELECT *, to_char(fecini,'dd/mm/yyyy') as fecini, to_char(feccie,'dd/mm/yyyy') as feccie,
    to_char(fecini,'yyyy') as anoinicio, to_char(feccie,'yyyy') as anocierre, nivdis
    from cpdefniv where codemp='001'";
  $tb=$bd->select($sql);
    if (!$tb->EOF)
  {
    $_SESSION["formato"]=$tb->fields["forpre"];
  //  $numper      = $tb->fields["numper"];
    $fechainicio = $tb->fields["fecini"];
    $fechacierre = $tb->fields["feccie"];
    $anoinicio   = $tb->fields["anoinicio"];
    $anocierre   = $tb->fields["anocierre"];
    $prenivdis   = $tb->fields["nivdis"];
  }
  else
  {
    $_SESSION["formato"]="G";
  }

///////////////

 $var=$_POST["var"];

 if  (!empty($_GET["mod"])) {$mod=$_GET["mod"];}
  if (!empty($_POST["codigo"])) { $codigo=strtoupper(trim(str_pad($_POST["codigo"],8,'0',STR_PAD_LEFT)));  $var = ($codigo[2]!='#') ? ('9') : $_POST["var"];}

///////////////// BARRA DE MENU /////////////////
    if ($var=='1')
      {
        if ($tb=$tools->primerRegistro('cpsolmovadi','refadi'))
        {
          $codigo=$codigo=strtoupper(trim($tb->fields["refadi"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='2') //Anterior
      {
        if (!empty($codigo))
        {
            $aux=$codigo;
            //chekeamos q no sea el primero
          $tb=$tools->primerRegistro('cpsolmovadi','refadi');
          $codigo=strtoupper(trim($tb->fields["refadi"]));
          if ($aux==$codigo)
          {
            $tb=$tools->ultimoRegistro('cpsolmovadi','refadi');
               $codigo=strtoupper(trim($tb->fields["refadi"]));
              $var=9;   //Para que haga la busqueda
          }
          else
          {
            $tb=$tools->anteriorRegistro('cpsolmovadi','refadi',$aux,'N');
            $codigo=strtoupper(trim($tb->fields["refadi"]));
            $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->ultimoRegistro('cpsolmovadi','refadi');
          $codigo=strtoupper(trim($tb->fields["refadi"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='3') //PROXIMO
      {
        if (!empty($codigo))
        {
            $aux=$codigo;
            //chekeamos q no sea el ultimo
          $tb=$tools->ultimoRegistro('cpsolmovadi','refadi');
          $codigo=strtoupper(trim($tb->fields["refadi"]));
          if ($aux==$codigo)
          {
            $tb=$tools->primerRegistro('cpsolmovadi','refadi');
               $codigo=strtoupper(trim($tb->fields["refadi"]));
              $var=9;   //Para que haga la busqueda
          }
          else
          {
            $tb=$tools->proximoRegistro('cpsolmovadi','refadi',$aux,'N');
            $codigo=strtoupper(trim($tb->fields["refadi"]));
            $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->primerRegistro('cpsolmovadi','refadi');
          $codigo=strtoupper(trim($tb->fields["refadi"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='4')
      {
        if ($tb=$tools->ultimoRegistro('cpsolmovadi','refadi'))
        {
          $codigo=strtoupper(trim($tb->fields["refadi"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    //////////////// FIN MENU ////////////////

    if ($var=='9'){
      //////  Busqueda por codigo de Adicion Disminucion  ////////
       $imec='I';
       $block="N";
      if (!empty($codigo))
      {
       //   $codigo=strtoupper(trim(str_pad($codigo,8,'0',STR_PAD_LEFT)));
          $sql="select a.*,to_char(a.fecadi,'dd/mm/yyyy') as  fecadi, to_char(a.fecanu,'dd/mm/yyyy') as fecanu, to_char(a.feccon,'dd/mm/yyyy') as  feccon,
          to_char(a.fecgob,'dd/mm/yyyy') as  fecgob, to_char(a.fecpre,'dd/mm/yyyy') as  fecpre,
          to_char(a.fecniv4,'dd/mm/yyyy') as  fecniv4, to_char(a.fecniv5,'dd/mm/yyyy') as  fecniv5, to_char(a.fecniv6,'dd/mm/yyyy') as  fecniv6  From cpsoladidis as a, cpartley b Where a.codart=b.codart and trim(refadi) = '".trim($codigo)."'";


          $tb=$bd->select($sql);
          if (!$tb->EOF)
           {
            $fecha         = $tb->fields["fecadi"];
            $desc          = $tb->fields["desadi"];
            $tipo          = $tb->fields["adidis"];
            $codart        = $tb->fields["codart"];
            $status        = $tb->fields["staadi"];
            $justificacion = $tb->fields["justificacion"];
            $enunciado     = $tb->fields["enunciado"];

      $status2 = Mostrar_status();

          $sql = "select * from cpartley where codart = '".$codart."' ";
          $tb  = $bd->select($sql);
          if (!$tb->EOF)
           {
             $desart = $tb->fields["desart"];
             $stacon = $tb->fields["stacon"];
             $stapre = $tb->fields["stapre"];
             $stagob = $tb->fields["stagob"];
             $staniv4 = $tb->fields["staniv4"];
             $staniv5 = $tb->fields["staniv5"];
             $staniv6 = $tb->fields["staniv6"];
           }

            if (strtoupper(trim($status))=="N")
            {
              if (trim($tb->fields["fecanu"])!="")
              {
               $estado="Anulado el " .$tb->fields["fecanu"];
              }
              else
              {
               $estado="Anulado";
                }
            }//if (strtoupper(trim($status))=="N")

             //cargar datos movimientos traslados  (grid)
             $block  = "S";
             $pos    = 1;
             $sqldet = "select * From cpsolmovadi Where trim(refadi)='".trim($codigo)."' ";
             $tb2    = $bd->select($sqldet);
             while (!$tb2->EOF)
             {
                $_POST["x".$pos."1"] = $tb2->fields["codpre"];
                $_POST["x".$pos."2"] = $tb2->fields["perpre"];
                $_POST["x".$pos."3"] = $tb2->fields["monmov"];
                $_POST["x".$pos."4"] = Monto_disponible_ejecucion($anoinicio,$tb2->fields["codpre"],'00');
                $tb2->MoveNext();
                $pos = $pos+1;
             }
             ///////////////////////////////////////////

            $ModoConsulta='S';
            $imec='M';
            //verificar si se puede eliminar
            //if (Verificar_Disponibilidad()==false) { $Eliminar='N'; };


           }//if (!$tb->EOF)
        }//si no esta vacio codigo
    }//if ($var=='9'){


  function Mostrar_status()
  {
  global $tb;
  global $bd;
  global $abrstacon;
  global $abrstapre;
  global $abrstagob;
  global $abrstaniv4;
  global $abrstaniv5;
  global $abrstaniv6;
  $estatus2='';

          $sql = "select * from cpdefapr";
          $tb2  = $bd->select($sql);
          if (!$tb2->EOF)
           {
             $des_stacon = $tb2->fields["stacon"];
             $abrstacon  = $tb2->fields["abrstacon"];
             $des_stapre = $tb2->fields["stapre"];
             $abrstapre  = $tb2->fields["abrstapre"];
             $des_stagob = $tb2->fields["stagob"];
             $abrstagob  = $tb2->fields["abrstagob"];
             $des_staniv4  = $tb2->fields["staniv4"];
             $des_staniv5  = $tb2->fields["staniv5"];
             $des_staniv6  = $tb2->fields["staniv6"];
             $abrstaniv4   = $tb2->fields["abrstaniv4"];
             $abrstaniv5   = $tb2->fields["abrstaniv5"];
             $abrstaniv6   = $tb2->fields["abrstaniv6"];
           }

  if ($tb->fields["stacon"] == "" and $tb->fields["stagob"] == "" and $tb->fields["stapre"] == ""){
      $estatus2 = "Elaborado el ".$tb->fields["fecadi"].".";
  }

  if ($tb->fields["stacon"] == "" and $tb->fields["stagob"] == "" and $tb->fields["stapre"] == "S"){
      $estatus2 = "Conformado por ".$des_stapre." el ".$tb->fields["fecpre"].".";
  }

  if ($tb->fields["stacon"] == "" and $tb->fields["stagob"] == "S" and $tb->fields["stapre"] == ""){
      $estatus2 = "Conformado por ".$des_stagob." el ".$tb->fields["fecgob"].".";
  }

  if ($tb->fields["stacon"] == "S" and $tb->fields["stagob"] == "" and $tb->fields["stapre"] == ""){
      $estatus2 = "Conformado por ".$des_stacon." el ".$tb->fields["feccon"].".";
  }

  if ($tb->fields["stacon"] == "S" and $tb->fields["stagob"] == "" and $tb->fields["stapre"] == "S"){
      $estatus2 = "Conformado por ".$des_stapre." el ".$tb->fields["fecpre"].", Aprobado por ".$des_stacon." el ".$tb->fields["feccon"].".";
  }

  if ($tb->fields["stacon"] == "" and $tb->fields["stagob"] == "S" and $tb->fields["stapre"] == "S"){
      $estatus2 = "Conformado por ".$des_stapre." el ".$tb->fields["fecpre"].", Autorizado por ".$des_stagob." el ".$tb->fields["fecgob"].".";
  }

  if ($tb->fields["stacon"] == "S" and $tb->fields["stagob"] == "S" and $tb->fields["stapre"] == ""){
      $estatus2 = "Autorizado por ".$des_stagob." el  ".$tb->fields["fecgob"].", Conformado por ".$des_stacon." el ".$tb->fields["feccon"].".";
  }

  if ($tb->fields["stacon"] == "S" and $tb->fields["stagob"] == "S" and $tb->fields["stapre"] == "S"){
      $estatus2 = "Conformado por ".$des_stapre." el ".$tb->fields["fecpre"].", Autorizado por ".$des_stagob." el  ".$tb->fields["fecgob"].", Aprobado por ".$des_stacon." el ".$tb->fields["feccon"].".";
  }


  if ($tb->fields["staniv4"] == "S"){
    $estatus2 = $estatus2.", Conformado por ".$des_staniv4." el ".$tb->fields["fecniv4"];
  }
  if ($tb->fields["staniv5"] == "S"){
    $estatus2 = $estatus2.", Conformado por ".$des_staniv5." el ".$tb->fields["fecniv5"];
  }
  if ($tb->fields["staniv6"] == "S"){
    $estatus2 = $estatus2.", Conformado por ".$des_staniv6." el ".$tb->fields["fecniv6"];
  }

  if ($tb->fields["stacon"] == "N" or $tb->fields["stagob"] == "N" or $tb->fields["stapre"] == "N" or $tb->fields["staniv4"] == "N" or $tb->fields["staniv5"] == "N" or $tb->fields["staniv6"] == "N"){
    //echo $tb->fields["stacon"];
      $estatus2 = "NO APROBADO";
  }


  return $estatus2;
  }

  function Limpiar()
  {
    global $desc;
    global $estado;
    global $block;
    global $status;
    global $tipo;

    $desc="";
    $estado="";
    $estado2="";
    $block="S";
    $status="";
    $nomcodpre="";
    $tipo="";
    }


   function Verificar_Disponibilidad()
  {
    global $bd;
    global $tools;
    global $Msj;
    global $tipo;
    global $anocierre;

    try
      {
            //////////Verificar disponibilidad para poder eliminar //////////////////////////////////////////////////////////////////////////
        $VerDispon="S";
        $Msj="";
        if ($tipo=='A')
        {
          $i=1;
          while ($i<=50)
          {
            if ((trim($_POST["x".$i."1"])!="")  and (number_format($_POST["x".$i."2"],2,'.',',')!= number_format(0,2,'.',','))  and (number_format($_POST["x".$i."3"],2,'.',',')!= number_format(0,2,'.',',')) )
            {
                $sql="select mondis from cpasiini where trim(codpre)='".trim($_POST["x".$i."1"])."'  and perpre='00'";
                if ($tb=$tools->buscar_datos($sql))
                {
                  $MonDis=$tb->fields["mondis"];
                  $MonDis = Monto_disponible_ejecucion($anocierre,trim($_POST["x".$i."1"]),'00');
                  //echo $MonDis."<br> ";
                  $MonTra=(float)(str_replace(',','',$_POST["x".$i."3"]));
                  if ($MonDis < $MonTra)
                  {
                    $VerDispon="N";
                    $Msj="NO se puede Eliminar / Anular la Adición.. El Monto Disponible de la Partida " . trim($_POST["x".$i."1"]) . " es de " . number_format($MonDis,2,'.',',') .". Al Disminuirla por el Monto de la Adición quedaría Negativa.";
                    $i=51;
                  }//if ($MonDis < $_POST["x".$i."3"])
                }  // if ($tb=$tool->buscar_datos($sql))
                else
                {
                  $VerDispon="N";
                  $Msj="La Partida " . trim($_POST["x".$i."1"]) . " no se encuentra en la Base de Datos. Por Favor Verifique";
                  $i=51;
                }//else  if ($tb=$tool->buscar_datos($sql))

                $i=$i+1;
            } //if ((trim($_POST["x".$i."1"])!="")  and (trim($_POST["x".$i."2"])!="") and (number_format($_POST["x".$i."3"],2,'.',',')!= number_format(0,2,'.',',')) )
            else
            {
              $i=51;
            }
          } //while
        }  //if ($tipo=='A')
        if ($VerDispon=="N")
        {
          return false;
        }
        else
        {
          return true;
        }

      }  // try
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }


?>
<script>

     function  actualizarsaldos2()
      {
       f=document.form1;
      i=1;
      var acum3=0;
      while (i<=50)
      {
        var x3="x"+i+"3";
        str3= document.getElementById(x3).value.toString();
        str3= str3.replace(',','');
        str3= str3.replace(',','');
        str3= str3.replace(',','');

        var num3=parseFloat(str3);

        acum3=acum3+num3;

        document.getElementById(x3).value=format(num3.toFixed(2),'.','.',',');
        i=i+1;
      }
      document.form1.totmon.value=format(acum3.toFixed(2),'.','.',',');
     }


  function ColocarFormatoOnBlueLocal(key,valor,id)
    {
      if (parseInt(id.length)==3)
        {
          j=parseInt(id.substring(1,2));
        }
        else
        {
          j=parseInt(id.substring(1,3));
        }
          var y="x"+j+"4"  //Posicion del Monto Disponible

          var valor = document.getElementById(y).value;
          valor= valor.replace(',','');
      valor= valor.replace(',','');
      valor= valor.replace(',','');
      var valor=parseFloat(valor);
      document.getElementById(id).value=format(valor.toFixed(2),'.','.',',');
    }

</script>
<!-- DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"-->
<html>
<head>
<title><? echo $forma; ?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
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
<script type="text/javascript" src="../../lib/general/js/funciones.js"></script>
<script type="text/javascript" src="../../lib/general/js/tabber.js"></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>
<style type="text/css">
<!--
.migrid {
  color: #00000;
  width: 540px;
  height: 156px;
  /*overflow: auto;*/
  overflow:scroll;
  background-color: #FFFFFF;
}

-->
</style>

</head>

<body>
<form name="form1" method="post" action="">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top_p.php'); ?>
    </td>
  </tr>
</table>
<table width="584" align="center">
<tr>
<td>
<table width="100%" height="175" border="0" class="box">
  <!--DWLayoutTable-->
  <tr>
            <td height="20" valign="top" class="breadcrumb">SIGA  <? echo $modulo; ?>
</td>
  </tr>
   <tr>
   <td>
    <table width="100%" class="recuadro">
      <tr>
         <td align="center" width="7%">
          <!-- a href='javascript: primero();'><img src="../../images/1.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: anterior();'><img src="../../images/2.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: siguiente();'><img src="../../images/3.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: ultimo();'><img src="../../images/4.GIF" width="13" height="13"--></a>
          <!--<input type="button" name="Button" value="|&lt;" onClick="primero()">
          <input type="button" name="Submit2" value="&lt;&lt;" onClick="anterior()">
          <input type="button" name="Submit3" value="&gt;&gt;" onClick="siguiente()">
          <input type="button" name="Submit4" value="&gt;|" onClick="ultimo()">-->
        </td>
          <td align="left" width="42%">
            <? if ($stapre=='S'){ ?><input name="AprSolP" type="button" class="important" id="AprSolP" value="<? echo $abrstapre; ?>" onClick="Aprobar_Solicitud('P');" > <? } ?>
            <? if ($stagob=='S'){ ?><input name="AprSolG" type="button" class="important" id="AprSolG" value="<? echo $abrstagob; ?>" onClick="Aprobar_Solicitud('G');" > <? } ?>
            <? if ($stacon=='S'){ ?><input name="AprSolC" type="button" class="important" id="AprSolC" value="<? echo $abrstacon; ?>" onClick="Aprobar_Solicitud('C');" > <? } ?>
            <? if ($staniv4=='S'){ ?><input name="AprSolN4" type="button" class="important" id="AprSolN4" value="<? echo $abrstaniv4; ?>" onClick="Aprobar_Solicitud('N4');" > <? } ?>
            <? if ($staniv5=='S'){ ?><input name="AprSolN5" type="button" class="important" id="AprSolN5" value="<? echo $abrstaniv5; ?>" onClick="Aprobar_Solicitud('N5');" > <? } ?>
            <? if ($staniv6=='S'){ ?><input name="AprSolN6" type="button" class="important" id="AprSolN6" value="<? echo $abrstaniv6; ?>" onClick="Aprobar_Solicitud('N6');" > <? } ?>
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
            <td colspan="2" class="box" >
            <table width="100%" border="0" class="bodyline">
            <tr>
               <td height="10" colspan="3">
                  <div align="center"><strong><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">
                    <? print  $estado."<br>".$status2;?></font></strong>
                  </div>
               </td>
                </tr>
                          <tr>
                            <td colspan="3">
                              <fieldset>
                              <legend>Datos de la Adici&oacute;n Disminuci&oacute;n</legend>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="1">&nbsp;</td>
                                  <td width="82">Referencia:</td>
                                  <td width="119">
                              <? if (($ModoConsulta=='S')  or ($mod=='I'))   { ?>
                              <input name="codigo" type="text" class="imageninicio2" id="codigo" value="<? print $codigo;?>" size="8" maxlength="8" readonly="true">
                                <? } else {?>
                              <input name="codigo" type="text" class="imagenInicio" id="codigo" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="buscarenter(event)" value="<? print $codigo;?>" size="8" maxlength="8" onblur="if (document.getElementById('codigo').value!=''){ document.getElementById('codigo').value=document.getElementById('codigo').value.pad(8,'0',0); document.getElementById('var').value='9'; document.getElementById('mod').value='I'; document.form1.submit(); }else{ document.getElementById('codigo').value=document.getElementById('codigo').value.pad(8,'#',0);  document.getElementById('var').value='9'; document.getElementById('mod').value='I'; f.submit();}">
                              <? } ?>
                        </td>
                                  <td colspan="2">&nbsp;</td>
                                  <input name="periodo" type="hidden" value="<?  print $periodo; ?>">
                                  <td width="61">

                                  </td>
                                  <td width="49">Fecha:</td>
                        <td width="99">
                            <? if ($ModoConsulta=='S') { ?>
                              <input name="fecha" type="text" id="fecha" value="<? print $fecha;?>" size="10"  readonly="true" class="imagenInicio2">
                            <? } else { ?>
                              <input name="fecha" type="text" class="imagenInicio" id="fecha" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onblur="validar_fecha()" value="<? print $fecha;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);"  maxlenght="10">
                            <? } ?>
                        </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td valign="top">Descripci&oacute;n:</td>
                                  <td colspan="6"><textarea name="desc"  cols="72" rows="2" wrap="VIRTUAL" class="imagenInicio" id="desc" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"><? print $desc;?></textarea>
                                  </td>
                                </tr>
                 <tr>
                                  <td>&nbsp;</td>
                                  <td valign="top">Tipo : </td>
                                  <td><?   if ($ModoConsulta=='S') { ?>
                        <input name="tipo" type="radio" value="A" <? if ($tipo=="A"){ print "checked";}?>  disabled="true">
                  <? } else { if  (empty($tipo)) {$tipo='A';} ?>
                    <input name="tipo" type="radio" value="A" <? if ($tipo=="A"){ print "checked";}?> >
                  <? } ?>
                   Adici&oacute;n </td>
                                  <td width="97">
                  <? if ($ModoConsulta=='S') { ?>
                        <input name="tipo" type="radio" value="D" <? if ($tipo=="D"){ print "checked";}?>  disabled="true" >
                  <? } else { ?>
                    <input name="tipo" type="radio" value="D" <? if ($tipo=="D"){ print "checked";}?> >
                  <? } ?>
                                   Disminuci&oacute;n</td>
                                  <td width="23">&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                  </tr>

                                <tr>
                                  <td>&nbsp;</td>
                                  <td colspan="7">
                                  <table width="100%" border="0">
                                    <tr>
                                      <td width="99">Art&iacute;culo/Ley</td>
                                      <td width="53"><? if ($block=='S') { ?>
                    <input name="codart" type="text" class="imagenInicio2" id="codart" value="<? print $codart;?>" size="4" maxlength="3" readonly="true" ></td>
                     <? } else { ?>
                    <input name="codart" type="text" class="imagenInicio" id="codart" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $codart;?>" size="4" maxlength="3" onKeyPress="enterA(event,'codart','desart','feccont')" >
                    <? } ?>
                                      <td width="43">
                    <? if ($block=='S') { ?>
                      <input name="Button" type="button" class="botton" value="..." readonly="true" >
                     <? } else { ?>
                     <input name="Button" type="button" class="botton" value="..." onClick="catalogoA('codart','desart','x11','C');">
                     <? } ?>
                     </td>
                                      <td width="352"><div align="right">
                                        <input name="desart" type="text" class="imagenInicio2" id="desart" value="<? print $desart;?>" size="62"  readonly="true">
                                      </div></td>
                                    </tr>
                                  </table></td>
                                </tr>



                              </table>
                            </fieldset>
              </td>
                          </tr>
                          <tr>
                            <td colspan="3" align="left">
               <div class="tabber" >
               <div class="tabbertab">
               <h2>Movimientos</h2>
              <table width="545" height="180" border="0" cellpadding="0" cellspacing="0">
                 <tr>
                <td colspan="3">
                <table width="545" border="0" class="recuadro">
                <tr>
                  <td width="26" class="tpButtons">
                  <? if ($block!='S') {?>
                  <a href='javascript: catalogogrid("G");'><img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16" border="0"></a>
                  <? } else {?>
                  <img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16" border="0">
                  <? } ?>
                  </td>
                  <td width="500" class="tpButtons">MOVIMIENTOS DE LA ADICION/DISMINUCION</td>
            </tr>
            <tr>
            <td colspan="4">
          <table border="0" cellpadding="0" cellspacing="0">
                    <tr valign="bottom" bgcolor="#ECEBE6">
                    <td height="1">
                      <div class="migrid" id="grid01">
                      <table  border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td class="queryheader" >&nbsp;</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Codigo Presupuestario</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Monto</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Disponible</td>
                        </tr>
                      <?
                      ////////   //////////
                     $i=1;
                  while ($i<=50)
                  {
                     ?>
                        <tr>
                          <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar(<? print $i;?>,4)"  value="" size="1" onFocus="this.blur()" ></td>
                          <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="32" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" align="right"  value="<? print  $_POST["x".$i."1"];?>" onblur="enterGRID(event,this.id,'trash','x<? print $i;?>3');" ></td>
                          <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="16" value="<? if (empty($_POST["x".$i."3"])) {print number_format(0,2,'.',',');}  else {print number_format($_POST["x".$i."3"],2,'.',',');}  ?>" align="right"  onblur="entermonto(event,'x<? print $i;?>1',this.id,'x<? print $i;?>4','Mon')"></td>
                          <!--td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt02" size="16" value="<? if (empty($_POST["x".$i."4"])) {print number_format(0,2,'.',',');}  else {print number_format($_POST["x".$i."4"],2,'.',',');}  ?>" align="right" readonly="true" onblur="entermonto(event,'x<? print $i;?>1',this.id,'x<? print $i+1;?>1','Dis')"--></td>
                          <td  align="right" class="grid_line01_br "><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="breadcrumbv2" size="16" value="<? if (empty($_POST["x".$i."4"])) {print number_format(0,2,'.',',');}  else {print number_format($_POST["x".$i."4"],2,'.',',');}  ?>" align="right" readonly="true"></td>
                        </tr>

                    <?
                    $i=$i+1;
                  }  //while
                ?>
                  </table>
                  </div></td>
                </tr>
                </table>
            </td>
            </tr>
            <tr>
            <td height="100%" colspan="4"><table width="100%" border="0" align="right">
                    <tr class="queryheader">

                    <td width="288" align="center" class="tpHead">TOTAL
                      </td>
                    <td width="89">
                      <div align="right">
                      <input name="totmon" type="text" class="cajadetextosimple" id="totmon" size="16" readonly="true">
                      </div></td>
                    <td width="149">&nbsp;&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table>
                </td>
                </tr>
              </table>

                </div>
              <div class="tabbertab">
                <h2>Enunciado</h2>
          <table width="530" height="180" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                    <td colspan="3"><div align="center">
                    <? if ($block=='S') { ?>
                        <textarea name="enunciado" cols="90" rows="15" wrap="PHYSICAL" class="imagenInicio2" id="enunciado " readonly="true"><? print $enunciado ;?></textarea>
                      <? } else { ?>
                            <textarea name="enunciado" cols="90" rows="15" wrap="PHYSICAL" class="imagenInicio" id="enunciado " onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"><? print $enunciado ;?></textarea>
                      <? } ?>
                      </div></td>
                    </tr>
                  </table>
                </div>

              <div class="tabbertab">
                <h2>Justificación</h2>
          <table width="530" height="180" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                    <td colspan="3"><div align="center">
                    <? if ($block=='S') { ?>
                        <textarea name="justificacion" cols="90" rows="15" wrap="PHYSICAL" class="imagenInicio2" id="justificacion " readonly="true"><? print $justificacion ;?></textarea>
                      <? } else { ?>
                            <textarea name="justificacion" cols="90" rows="15" wrap="PHYSICAL" class="imagenInicio" id="justificacion " onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" ><? print $justificacion ;?></textarea>
                      <? } ?>
                      </div></td>
                    </tr>
                  </table>
                </div>

                </div>

              </td>
              </tr>
              </table>
      </td>
  </tr>

  <tr>
    <td class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...</span></td>
                <input name="trash" type="hidden" id="trash">
          <input name="cajaactual" type="hidden" id="cajaactual" value="1">
           <input name="cajafoco" type="hidden" id="cajafoco" value="2">
           <input name="getf" type="hidden" id="getf" value="S">
           <input type="hidden" name="var" id="var" />
           <input type="hidden" name="mod" id="mod" />
  </tr>
</table>
  </tr>
</td>
</table>
 <?
if  (!empty($codigo))
{
   $salvar='S';

   if ($ModoConsulta=='S')
   {
      ?>
        <script>
          document.form1.desc.focus();
          document.form1.desc.select();
        </script>
      <?
   }
   else
   {
    ?>
      <script>
        document.form1.fecha.focus();
       </script>
    <?
   }
 }
else
{
 $salvar='N'
?>
  <script>
    document.form1.codigo.focus();
    document.form1.codigo.select();
   </script>
<?
}
?>
</form>
<? require_once('../../lib/general/bottom.php'); ?>
</body>
 <script>
    block='<? print $block;?>';
  if (block=="S")
  {
  bloquearGrip(3,50,0);
  }
  actualizarsaldos2();
</script>
<script language="JavaScript">


  function buscarenter(e)
      {
        if (e.keyCode==13)
    {
        f=document.form1;
      if (f.codigo.value!="")
      {
      //f.action="PreSolAdiDis.php?var=<? echo '9'; ?>&mod=<? echo 'I' ?>";
      document.getElementById('var').value='9';
      document.getElementById('mod').value='I';
      f.submit();
      }
      }
     }

    function validar_fecha()
    {
      f=document.form1;
      fecha=document.getElementById('fecha').value;
      if (fecha.length==10)
      {
        f=document.form1;
        ori="AD";
        pagina="validar_fecha.php?fecha="+f.fecha.value+"&origen="+ori;
        window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");
      }
      else
      {
        //alert("Longitud de Fecha inválida");
        document.getElementById('fecha').value=mostrarfecha();
        document.getElementById('fecha').focus();
      }
    }

     function catalogogrid(tipo)
     {
      f=document.form1;
      var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
      i=1;
      while (i<=50)
      {
        var x="x"+i+1;
        var x4="x"+i+4;
        if (document.getElementById(x).value=="")
        {
          if (i==1)
          {
            campo="x1"+1;
            campo3="x1"+4;
            foco="x1"+3;
            i=50;
          }
          else
          {
            campo=x;
            campo3=x4;
            foco="x"+i+3;
            i=50;
          }
        }
        i=i+1;
      }
      campo2='trash';
       sql='select a.codpre as codigo, a.nompre as descripcion, mondis as Disponible From cpasiini a, CPDEFTIT b Where upper(a.nompre) like upper(¿%¿) and  a.codpre=b.codpre and a.perpre=¿00¿ and a.monasi>=0  order by a.codpre';

     // pagina="catalogo3.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo+"&campo3="+campo3;
//      window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");

        pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpasiini_Presoladidis/clase/Cpasiini/frame/form1/obj1/'+campo+'/obj2/'+campo3+'/campo1/codpre/campo2/mondis/';
        window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
     }

     function enterGRID(e,id,donde,foco)
     {
        var tipo;
        //if (e.keyCode==13)
        //{
          a=repetido2(id,donde);
          if (a==false)
          {
            r=document.getElementById(id).value.substring(0,1);  //verificamos q no sean puras rayitas
            aux= document.getElementById(id).value;
            cadena=rayitasfc(aux);
            if (document.form1.tipo[0].checked)  tipo = 'A';   else  tipo = 'D';
            if ((aux!="") && (r!='-'))
            {
              cuantos='dossql';
              //sql       = "select mondis as campo1 from cpasiini where trim(codpre) = trim(�"+cadena+"�) and perpre=�00�";
              sql="select codpre as codigo, nompre as campo1 from cpdeftit where trim(codpre)= trim(¿"+cadena+"¿)";
              //sql2="select * from cpasiini where trim(codpre)= trim(¿"+cadena+"¿) and perpre='00'";
              //sql2="select mondis as campo1  from cpasiini where trim(codpre)= trim(¿"+cadena+"¿) and perpre=¿00¿ and monasi>=0";
              anocierre = '<? echo $anocierre;?>';
              sql2=cadena;
              mensaje="El Título Presupuestario no tiene asignación Inicial";
              pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&donde="+donde+"&foco="+foco+"&sql="+sql+"&sql2="+sql2+"&mensaje="+mensaje+"&anocierre="+anocierre;
              //alert(pagina);
              window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=100,top=300");
            }
          }
        //}
     }


     function rayitasfc(tira)
    {
        long=tira.length;
        i=1;
        if (long > 1)
        {
          i=long;
          while (i>0)
          {
            if ( (tira.charAt(i)=='0') || (tira.charAt(i)=='1') || (tira.charAt(i)=='2') || (tira.charAt(i)=='3') || (tira.charAt(i)=='4') || (tira.charAt(i)=='5') || (tira.charAt(i)=='6') || (tira.charAt(i)=='7') || (tira.charAt(i)=='8') || (tira.charAt(i)=='9'))
            {
              hasta=i+1;
              i=0;
            }
            i=i-1;
          }
        tira= tira.substring(0,hasta);
        return tira;
        }
    }


    function dispo(cod,id,donde,foco,row)
     {
        r=document.getElementById(cod).value.substring(0,1);//verificamos q no sean puras rayitas
         if ((document.getElementById(cod).value!="") && (r!='-') && (document.getElementById('getf').value=='S'))
      {
        cuantos="hayasig";
        anocierre='<? print $anocierre;?>';
        prenivdis='<? print $prenivdis;?>';
        codigo=document.getElementById(cod).value;
        referencia=document.getElementById('codigo').value;
        monmov=document.getElementById(id).value;
        fecha=document.getElementById('fecha').value;
        if (f.tipo[0].checked)
        {
            aumdis='A';
        }
        else
        {
            aumdis='D'
        }
        pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&monmov="+monmov+"&anocierre="+anocierre+"&prenivdis="+prenivdis+"&aumdis="+aumdis+"&fecha="+fecha+"&foco="+foco+"&codigo="+codigo;
        //alert(pagina);
        window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=300,top=300");
      }
     }



    function entermonto(e,cod,id,fc,tip)
    {
    //  if (e.keyCode==13)
    //  {
        // obtener fila actual
        if (parseInt(id.length)==3)
        {
          j=parseInt(id.substring(1,2));
        }
        else
        {
          j=parseInt(id.substring(1,3));
        }
        var x="x"+j+"1"
        var y="x"+j+"2"

        //verificar que los cod. pres este informado
        if ((document.getElementById(x).value=="")  )
        {
           document.getElementById(id).value='0.00';
           alert("El Código Presupuestario debe estar informado")
           document.getElementById(x).focus;
           document.getElementById(x).select();
        }
        else
        {
          if (validarnumero(id)==true)
          {
             if (tip=='Mon')
            {
              document.getElementById('getf').value='S'
              dispo(cod,id,'disp',fc,j);
              actualizarsaldos(e);
              }
              focos(e,fc);
          }
          else
          {
            document.getElementById(id).value='0.00';
            document.getElementById(id).focus();
            document.getElementById(id).select();
          }
        }// else  datos en  blanco
    //  } //if (e.keyCode==13)
    } //end function



    function actualizarsaldos(e)
      {
    //if (e.keyCode==13)
    //{
       f=document.form1;
        i=1;
        var acum3=0;
        while (i<=50)
        {
          var x3="x"+i+"3";
          str3= document.getElementById(x3).value.toString();
          str3= str3.replace(',','');
          str3= str3.replace(',','');
          str3= str3.replace(',','');

          var num3=parseFloat(str3);

          acum3=acum3+num3;

          document.getElementById(x3).value=format(num3.toFixed(2),'.','.',',');
          i=i+1;
        }
        document.form1.totmon.value=format(acum3.toFixed(2),'.','.',',');
     // }
       }

        function repetido2(id,id2)
    {
      f=document.form1;
      chk="N";
        // obtener fila actual
      if (parseInt(id.length)==3)
      {
        j=parseInt(id.substring(1,2));
      }
      else
      {
        j=parseInt(id.substring(1,3));
      }
      val=document.getElementById(id).value;
      if (val!="")
      {
          if (j!=1)
          {
            i=1;
             while (i<=50)
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
                    alert("El código presupuestario está repetido");
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


      function eliminar(i,c)
       {
        f=document.form1;
        var fila;
        var col;

        for (fila=i;fila<2;fila++)
        {
          for (col=1;col<=c;col++)
          {
            var x="x"+fila+col;
            fila2=parseInt(fila)+1;
            var y="x"+fila2+col;

            if ($(y) )
            {
	            $(x).value=$(y).value;
	            if ((col==3) || (col==4))
	            {

	              $(y).value="0.00";
	            }
	            else
	            {
	              $(y).value="" ;
	            }
            }
          }
      }
      //ultima fila
      if (i==50)
      {
        for (col=0;col<=c;col++)
        {
          var x="x"+i+col;
          var x="x"+i+col;
          if ((col==3) || (col==4))
          {
            document.getElementById(x).value="0.00";
           }
           else
           {
             document.getElementById(x).value="" ;
           }
        }

      }//if (fila==50)
      actualizarsaldos2()
     }

      function cancelar()
       {
        location=("PreSolAdiDis.php")
       }


       function verificar()
       {

      f=document.form1;
      if (TrimString(f.desc.value)=="")
      {
        alert("No puede salvar sin introducir Descripción de la Adición/Disminución");
        return false;
      }
      if (TrimString(f.codart.value)=="")
      {
        alert("No puede salvar sin introducir el Código Articulo de Ley");
        return false;
      }

      else if (TrimString(f.fecha.value)=="")
      {
        alert("No puede salvar sin introducir la Fecha de la Adición/Disminución");
        return false;
      }
      else if (TrimString(f.totmon.value)=="0.00")
      {
        alert("No puede salvar sin introducir el Monto de la Adición/Disminución");
        return false;
      }
      else
      {
        //Habilita los checkbok
        document.forms[0].tipo[0].disabled=false;
        return true;
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
        save='<? print $salvar;?>';
        if (save=='S')
        {
        if(confirm("¿Realmente desea Salvar?"))
        {
          f=document.form1;
          if (verificar())
          {
            f.tipo[0].disabled=false;
            f.tipo[1].disabled=false;
            f.action="imecPreSolAdiDis.php?imec=<? print $imec?>";
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
        consulta();
      }
      else if(itemId == '0_filter'){

      }
      else if(itemId == '0_cancelar'){
        if(confirm("¿Desea Cancelar la Transaccion?"))
        {
          cancelar();
        }
      }
      else if(itemId == '0_delete')
      {
        modoconsulta = "<? print $ModoConsulta?>";
        if (modoconsulta=='S')
          {
          status='<? echo $status; ?>';
          if (status=="N")
          {
             alert("La Solicitud del Crédito de la Adición/Disminución ya esta Anulado");
          }
          else
          {
          var fechainicio='<? echo $fechainicio; ?>';
          var fechacierre='<? echo $fechacierre; ?>';
          if (compareDate(document.getElementById('fecha').value,fechainicio,fechacierre)==0)
          {
      alert("La Fecha debe estar entre la Fecha de Inicio y la Fecha Final del Ejercicio");
          }else{

              var eliminar='<? echo $Eliminar; ?>';
              var msg ='<? echo $Msj; ?>';
              if (eliminar=='N'){ alert(msg)}
              else
              {
                if(confirm("¿Esta seguro que desea Eliminar?"))
                  {
                    f=document.form1;
                    codigo=f.codigo.value;
                    ope='P';
                    fecpre=f.fecha.value;

                      window.open("anuPreSolAdiDis.php?codigo="+codigo+"&fecpre="+fecpre+"&operacion="+ope,"AnularTraslado","menubar=no,toolbar=no,scrollbars=no,width=600,height=150,resizable=no,left=200,top=250");
                  }
              }//if (eliminar=='N'){ alert(msg)}
           } //compareDate
          }//if (status=="N")
        }// if (modoconsulta=='S')

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
      //f.action="PreSolAdiDis.php?var=<? print '1';?>";
      document.getElementById('var').value='1';
      f.submit();
     }

     function anterior()
      {
      f=document.form1;
      //f.action="PreSolAdiDis.php?var=<? print '2';?>";
      document.getElementById('var').value='2';
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      //f.action="PreSolAdiDis.php?var=<? print '3';?>";
      document.getElementById('var').value='3';
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      //f.action="PreSolAdiDis.php?var=<? print '4';?>";
      document.getElementById('var').value='4';
      f.submit();
     }

      function consulta()
      {
          f=document.form1;
          document.getElementById('var').value='9';
          //var campo2='desc';
          //var campo='codigo';
         // var foco='submit';
         // sql = 'select RefAdi as Referencia, desadi as Descripcion from cpsoladidis where upper(desadi) like upper(�%�) order by refadi';
         // pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
         // window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");

        var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpsoladidis_PreSolAdiDis/clase/Cpsoladidis/frame/form1/obj1/codigo/obj2/desc/campo1/refadi/campo2/desadi/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
     }


     function catalogoA(c1,c2,fc,tipo)
     {
      f=document.form1;
      if (f.codigo.value!="")
      {
        campo  = c1;
        campo2 = c2;
        foco   = fc;

        //sql='select codart as codigo,desart as descripcion from cpartley where upper(desart) like upper(�%�) order by codart';
        //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
        //window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=580,height=490,resizable=yes,left=50,top=50");

      var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpartley_Preartley/clase/Cpartley/frame/form1/obj1/'+campo+'/obj2/'+campo2+'/campo1/codart/campo2/desart/submit/false';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

      }
     }


    function Aprobar_Solicitud(sw)
    {
      var status='<? echo $status; ?>';
      if (status=="N")
      {
         alert("Este Traslado no se puede Aprobar por que esta Anulado");

      }else{
//        aprobar = '<? print $btnAprobar;?>';
  //      if (aprobar=='S')
    //    {
          if (f.codigo.value!="")
          {
            f   = document.form1;
            cod = f.codigo.value;
            ope = 'M';
            window.open("aprPreSolAdiDis.php?codigo="+cod+"&sw="+sw+"&operacion="+ope,"AprobarSolicitud","menubar=no,toolbar=no,scrollbars=no,width=600,height=240,resizable=no,left=200,top=200");
          } // if (f.codigo.value!="")
        // } //if (aprobar=='S')
      }
    }


  </script>
</html>




