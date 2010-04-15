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

?>
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
validar(array(8,11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z= new tools();
$btn = $z->ConfBotones();

$modulo="";
$forma="Comprobantes";
$modulo=$_SESSION["modulo"] . " > Contabilidad Financiera > ".$forma;
$block="1";
////
function verificar_cierre($fecha){
  global $z;
  global $block;
  global $save;
              //VERIFICAR CIERRE
                $sql="select * from contaba1
                where to_date('".$fecha."','dd/mm/yyyy')>=fecdes and to_date('".$fecha."','dd/mm/yyyy')<=fechas";
              if ($tb=$z->buscar_datos($sql))
              {
                if (strtoupper($tb->fields["status"])=='C')
                {
                  $block="2"; //blokear completo cajitas de texto
                              //Permite a la funcion eliminar mandar un mensaje
                  $save="N";
                }
                else if (strtoupper($tb->fields["status"])=='A')
                {
                  $block="1"; //blokear medio cajitas de texto
                              //Permite a la funcion eliminar mandar un mensaje
                  $save="S";
                }
              }
              else
              {
                Mensaje("ADVERTENCIA: La Fecha del Comprobante esta fuera del Periodo del Ejercicio Fiscal");
                $block="3";   //Permite a la funcion eliminar mandar un mensaje
                $save="S";
              }

   return $save;

  }
////

///  CARGAR MASCARA  y CONFIGURACIONES///
  $imec='I';
  $sql="select * from contaba where codemp='001'";
  if ($tb=$z->buscar_datos($sql))
  {
  	$modulo = $modulo."  *** Ejercicio Fiscal: ".substr($tb->fields["feccie"],0,4)." ***";
  	$btnelicomanu = $tb->fields["btnelicomanu"];
    if (strtoupper($tb->fields["etadef"])=='A')
    {
      Mensaje("La Etapa de Definicion no se ha Cerrado");
      Regresar("/autenticacion.php/principal/menu/m/contabilidad");
    }
    $_SESSION["formato"]=$tb->fields["forcta"];
  }
  else
  {
    $_SESSION["formato"]="";
  }
///////////////

  function ValidarEliminarComprobante($numero,$fecha)
  {
  $z= new tools();

    $sql = "Select * from Opordpag where numcom='".$numero."' --and fecemi=to_date('".$fecha."','dd/mm/yyyy')";
    if ($tb=$z->buscar_datos($sql))
    {
      return 0;
    }

    $sql = "Select * from Tsmovlib where NumCom='".$numero."' --and FecCom=to_date('".$fecha."','dd/mm/yyyy')";
    if ($tb=$z->buscar_datos($sql))
    {
      return 0;
    }
    return 1;
  }

  if (!empty($_GET["var"]))
  {
    $var=$_GET["var"];
    $ValidarEliminarComprobante=1;
    if ($var=='C')           ////  Busqueda Comprobante  ////
    //if (( $var=='C') and ($_POST["numero"]!='########'))////  Busqueda Comprobante  ////
    {
      //if ( (!empty($_POST["numero"])) && (!empty($_POST["fecha"])) )
      if  (!empty($_POST["numero"]))
      {
        $numero=strtoupper(trim(str_pad($_POST["numero"],8,'0',STR_PAD_LEFT)));
        $fecha=$_POST["fecha"];

        $ValidarEliminarComprobante=ValidarEliminarComprobante($numero,$fecha);
/*			    $ValidarEliminarComprobante=1;
        $sql = "Select * from Opordpag where NumCom='".$numero."' and FecEmi=to_date('".$fecha."','dd/mm/yyyy')";
        if ($tb=$z->buscar_datos($sql))
        {
            $ValidarEliminarComprobante=220;
        }
        $sql = "Select * from Tsmovlib where NumCom='" + DatosIns(0).Text + "' and FecCom=to_date('".$fecha."','dd/mm/yyyy')";
        if ($tb=$z->buscar_datos($sql))
        {
            $ValidarEliminarComprobante=20;
        }*/

        //DATOS COMPROBANTE
         $sql="select *, to_char(feccom,'dd/mm/yyyy') as feccom from contabc
          where trim(upper(numcom))='".$numero."' ";

		//	--and feccom=to_date('".$fecha."','dd/mm/yyyy')

          if ($tb=$z->buscar_datos($sql))
          {
            $desc   = $tb->fields["descom"];
            $fecha  = $tb->fields["feccom"];
            $tipcom = $tb->fields["tipcom"];
            if (strtoupper($tb->fields["stacom"])=='D')
            {
              $status="DIFERIDO";
              $act="S";
            }
            else if(strtoupper($tb->fields["stacom"])=='A')
            {
              $status="ACTUALIZADO";
              $act="N";
            }
            else if(strtoupper($tb->fields["stacom"])=='N')
            {
              $status="ANULADO";
              $act="N";
            }
            else if(strtoupper($tb->fields["stacom"])=='R')
            {
              $status="REVERSADO";
              $act="N";
            }
            else if(strtoupper($tb->fields["stacom"])=='E')
            {
              $status="DESCUADRADO";
              $act="S";
            }

            $sql2="select * from contabc1 where numcom='".$numero."' and feccom=to_date('".$fecha."','dd/mm/yyyy') order by numcom,debcre desc,numasi";
            if ($tb2=$z->buscar_datos($sql2))
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
                $grid1[$i]=$tb2->fields["codcta"];
                $grid2[$i]=$tb2->fields["desasi"];
                $grid3[$i]=$tb2->fields["refasi"];
                if (strtoupper($tb2->fields["debcre"])==strtoupper("D"))
                {
                  $grid4[$i]=$tb2->fields["monasi"];
                  $grid5[$i]=0;
                }
                else
                {
                  $grid4[$i]=0;
                  $grid5[$i]=$tb2->fields["monasi"];
                }

              $tb2->MoveNext();
              }
              $cont;
            }
              $imec="M";
              //VERIFICAR CIERRE
//echo $fecha.' 555';
			if ($fecha!='')
			{
               $sql="select * from contaba1
                where to_date('".$fecha."','dd/mm/yyyy')>=fecdes and to_date('".$fecha."','dd/mm/yyyy')<=fechas";
              if ($tb=$z->buscar_datos($sql))
              {
                if (strtoupper($tb->fields["status"])=='C')
                {
                  $block="2"; //blokear completo cajitas de texto
                              //Permite a la funcion eliminar mandar un mensaje
                  $save="N";
                }
                else if (strtoupper($tb->fields["status"])=='A')
                {
                  $block="1"; //blokear medio cajitas de texto
                              //Permite a la funcion eliminar mandar un mensaje
                  $save="S";
                }
              }
              else
              {
                Mensaje("ADVERTENCIA: La Fecha del Comprobante esta fuera del Período del Ejercicio Fiscal");
                $block="3";   //Permite a la funcion eliminar mandar un mensaje
                $save="N";
                $fecha='';
              }
			}
          }
          else//SI NO HAY DATOS
          {
            $imec="I";
			if ($fecha!='')
			{
	            //VERIFICAR CIERRE
	              $sql="select * from contaba1
	              where to_date('".$fecha."','dd/mm/yyyy')>=fecdes and to_date('".$fecha."','dd/mm/yyyy')<=fechas";
	            if ($tb=$z->buscar_datos($sql))
	            {
	              if (strtoupper($tb->fields["status"])=='C')
	              {
	                Mensaje("La Fecha del Comprobante debe pertenecer a un Período Abierto");
	                $numero=strtoupper(trim(str_pad($_POST["numero"],8,'0',STR_PAD_LEFT)));
	                $block='1';
	                $save="N";
	                $fecha="";
	                ?>
	                  <script>
	                    document.form1.fecha.focus();
	                  </script>
	                <?
	              }
	              else if (strtoupper($tb->fields["status"])=='A')
	              {
	                $block="3"; //blokear medio cajitas de texto menos descripcion
	                $save="S";
	              }
	            }
	            else
	            {
	              Mensaje("ADVERTENCIA: La Fecha del Comprobante esta fuera del Período del Ejercicio Fiscal");
	              $block="3"; //blokear medio cajitas de texto menos descripcion
	              $save="N";
	              $fecha='';
	            }
          }
          }
      }
    }
    else if ($var=='1')//PRIMERO
    {
      if ($tb=$z->primerRegistro('contabc','numcom'))
      {
        $numero=strtoupper(trim(str_pad($tb->fields["numcom"],8,'0',STR_PAD_LEFT)));
        $sql="select *, to_char(feccom,'dd/mm/yyyy') as feccom from contabc where trim(upper(numcom))='".$numero."' ";
        if ($tb=$z->buscar_datos($sql))
        {
          $desc=$tb->fields["descom"];
          $fecha=$tb->fields["feccom"];
          if (strtoupper($tb->fields["stacom"])=='D')
          {
            $status="DIFERIDO";
            $act="S";
            $block='1';
          }
          else if(strtoupper($tb->fields["stacom"])=='A')
          {
            $status="ACTUALIZADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='N')
          {
            $status="ANULADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='R')
          {
            $status="REVERSADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='E')
          {
            $status="DESCUADRADO";
            $act="S";
            $block='2';
          }

          $ValidarEliminarComprobante=ValidarEliminarComprobante($numero,$fecha);

          $sql2="select * from contabc1 where numcom='".$numero."' and feccom=to_date('".$fecha."','dd/mm/yyyy') order by numcom,debcre desc,numasi";

          if ($tb2=$z->buscar_datos($sql2))
          {
            $check='1';
            $save="N";
            $imec="M";
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
              $grid1[$i]=$tb2->fields["codcta"];
              $grid2[$i]=$tb2->fields["desasi"];
              $grid3[$i]=$tb2->fields["refasi"];
              if (strtoupper($tb2->fields["debcre"])==strtoupper("D"))
              {
                $grid4[$i]=$tb2->fields["monasi"];
                $grid5[$i]=0;
              }
              else
              {
                $grid4[$i]=0;
                $grid5[$i]=$tb2->fields["monasi"];
              }

            $tb2->MoveNext();
            }
            $cont;

          }
        }
      }
      $sqlvacio="select * from contabc";
      if ($tbvacio=$z->buscar_datos($sqlvacio))
      {
       verificar_cierre($fecha);
      }
    }
    else if ($var=='2')//ANTERIOR
    {
      if (!empty($_POST["numero"]))
      {
        $aux=strtoupper(trim(str_pad($_POST["numero"],8,'0',STR_PAD_LEFT)));
        //chekeamos q no sea el primero
          $tb=$z->primerRegistro('contabc','numcom');
          $numero=strtoupper(trim(str_pad($tb->fields["numcom"],8,'0',STR_PAD_LEFT)));
          if ($aux!=$numero)
          {
            $tb=$z->anteriorRegistro('contabc','numcom',$aux,'N');
          }
          else
          {
            $tb=$z->ultimoRegistro('contabc','numcom');
          }
      }
      else
      {
        $tb=$z->ultimoRegistro('contabc','numcom');
      }

      if ($tb)
      {
        $numero=strtoupper(trim(str_pad($tb->fields["numcom"],8,'0',STR_PAD_LEFT)));
        $sql="select *, to_char(feccom,'dd/mm/yyyy') as feccom from contabc where trim(upper(numcom))='".$numero."' ";
        if ($tb=$z->buscar_datos($sql))
        {
          $desc=$tb->fields["descom"];
          $fecha=$tb->fields["feccom"];
          if (strtoupper($tb->fields["stacom"])=='D')
          {
            $status="DIFERIDO";
            $act="S";
            $block='1';
          }
          else if(strtoupper($tb->fields["stacom"])=='A')
          {
            $status="ACTUALIZADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='N')
          {
            $status="ANULADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='R')
          {
            $status="REVERSADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='E')
          {
            $status="DESCUADRADO";
            $act="S";
            $block='2';
          }

          $ValidarEliminarComprobante=ValidarEliminarComprobante($numero,$fecha);

          $sql2="select * from contabc1 where numcom='".$numero."' and feccom=to_date('".$fecha."','dd/mm/yyyy') order by numcom,debcre desc,numasi";
          if ($tb2=$z->buscar_datos($sql2))
          {
            $check='1';
            $save="N";
            $imec="M";
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
              $grid1[$i]=$tb2->fields["codcta"];
              $grid2[$i]=$tb2->fields["desasi"];
              $grid3[$i]=$tb2->fields["refasi"];
              if (strtoupper($tb2->fields["debcre"])==strtoupper("D"))
              {
                $grid4[$i]=$tb2->fields["monasi"];
                $grid5[$i]=0;
              }
              else
              {
                $grid4[$i]=0;
                $grid5[$i]=$tb2->fields["monasi"];
              }

            $tb2->MoveNext();
            }
            $cont;

          }
        }
      }
     $sqlvacio="select * from contabc";
      if ($tbvacio=$z->buscar_datos($sqlvacio))
      {
       verificar_cierre($fecha);
      }
    }
    else if ($var=='3')//PROXIMO
    {
      if (!empty($_POST["numero"]))
      {
        $aux=strtoupper(trim(str_pad($_POST["numero"],8,'0',STR_PAD_LEFT)));
        //chekeamos q no sea el ultimo
          $tb=$z->ultimoRegistro('contabc','numcom');
          $numero=strtoupper(trim(str_pad($tb->fields["numcom"],8,'0',STR_PAD_LEFT)));
          if ($aux!=$numero)
          {
            $tb=$z->proximoRegistro('contabc','numcom',$aux,'N');
          }
          else
          {
             $tb=$z->primerRegistro('contabc','numcom');
          }
      }
      else
      {
        $tb=$z->primerRegistro('contabc','numcom');
      }

      if ($tb)
      {
        $numero=strtoupper(trim(str_pad($tb->fields["numcom"],8,'0',STR_PAD_LEFT)));
        $sql="select *, to_char(feccom,'dd/mm/yyyy') as feccom from contabc where trim(upper(numcom))='".$numero."' ";
        if ($tb=$z->buscar_datos($sql))
        {
          $desc=$tb->fields["descom"];
          $fecha=$tb->fields["feccom"];
          if (strtoupper($tb->fields["stacom"])=='D')
          {
            $status="DIFERIDO";
            $act="S";
            $block='1';
          }
          else if(strtoupper($tb->fields["stacom"])=='A')
          {
            $status="ACTUALIZADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='N')
          {
            $status="ANULADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='R')
          {
            $status="REVERSADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='E')
          {
            $status="DESCUADRADO";
            $act="S";
            $block='2';
          }

          $ValidarEliminarComprobante=ValidarEliminarComprobante($numero,$fecha);

          $sql2="select * from contabc1 where numcom='".$numero."' and feccom=to_date('".$fecha."','dd/mm/yyyy') order by numcom,debcre desc,numasi";
          if ($tb2=$z->buscar_datos($sql2))
          {
            $check='1';
            $save="N";
            $imec="M";
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
              $grid1[$i]=$tb2->fields["codcta"];
              $grid2[$i]=$tb2->fields["desasi"];
              $grid3[$i]=$tb2->fields["refasi"];
              if (strtoupper($tb2->fields["debcre"])==strtoupper("D"))
              {
                $grid4[$i]=$tb2->fields["monasi"];
                $grid5[$i]=0;
              }
              else
              {
                $grid4[$i]=0;
                $grid5[$i]=$tb2->fields["monasi"];
              }

            $tb2->MoveNext();
            }
            $cont;

          }
        }
      }

    $sqlvacio="select * from contabc";
      if ($tbvacio=$z->buscar_datos($sqlvacio))
      {
       verificar_cierre($fecha);
      }
    }
    else if ($var=='4')//ULTIMO
    {
      if ($tb=$z->ultimoRegistro('contabc','numcom'))
      {
        $numero=strtoupper(trim(str_pad($tb->fields["numcom"],8,'0',STR_PAD_LEFT)));
        $sql="select *, to_char(feccom,'dd/mm/yyyy') as feccom from contabc where trim(upper(numcom))='".$numero."' ";
        if ($tb=$z->buscar_datos($sql))
        {
          $desc=$tb->fields["descom"];
          $fecha=$tb->fields["feccom"];
          if (strtoupper($tb->fields["stacom"])=='D')
          {
            $status="DIFERIDO";
            $act="S";
            $block='1';
          }
          else if(strtoupper($tb->fields["stacom"])=='A')
          {
            $status="ACTUALIZADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='N')
          {
            $status="ANULADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='R')
          {
            $status="REVERSADO";
            $act="N";
            $block='2';
          }
          else if(strtoupper($tb->fields["stacom"])=='E')
          {
            $status="DESCUADRADO";
            $act="S";
            $block='2';
          }

          $ValidarEliminarComprobante=ValidarEliminarComprobante($numero,$fecha);

          $sql2="select * from contabc1 where numcom='".$numero."' and feccom=to_date('".$fecha."','dd/mm/yyyy') order by numcom,debcre desc,numasi";
          if ($tb2=$z->buscar_datos($sql2))
          {
            $check='1';
            $save="N";
            $imec="M";
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
              $grid1[$i]=$tb2->fields["codcta"];
              $grid2[$i]=$tb2->fields["desasi"];
              $grid3[$i]=$tb2->fields["refasi"];
              if (strtoupper($tb2->fields["debcre"])==strtoupper("D"))
              {
                $grid4[$i]=$tb2->fields["monasi"];
                $grid5[$i]=0;
              }
              else
              {
                $grid4[$i]=0;
                $grid5[$i]=$tb2->fields["monasi"];
              }

            $tb2->MoveNext();
            }
            $cont;

          }
        }
      }
    $sqlvacio="select * from contabc";
      if ($tbvacio=$z->buscar_datos($sqlvacio))
      {
       verificar_cierre($fecha);
      }
    }
    else if ($var=='R')//RELLENAR
    {
      if($_POST["numero"]=='') $numero='########';
      else $numero=strtoupper(trim(str_pad($_POST["numero"],8,'0',STR_PAD_LEFT)));
      $desc="";
      $fecha="";
      $check='0';
      $block='0';
      $status="";
      $save="N";
      $act="N";
      $imec="I";
    }
    else if (($var=='L'))// Si es Limpiar
    {
      $numero="";
      $desc="";
      $fecha="";
      $check='0';
      $block='-';//desblokea todo y pone foco en numero
      $status="";
      $save="N";
      $act="N";
      $imec="I";
    }
  //else 1ra vez
  }
  else
  {
    $numero="";
    $desc="";
    $fecha="";
    $check='0';
    $block='-';//desblokea todo y pone foco en numero
    $status="";
    $save="N";
    $act="N";
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

     function actualizarsaldos2()
      {
       f=document.form1;
        i=1;
        var acum=0;
        var acum2=0;
        while (i<=500)
        {
          var x="x"+i+"4";
          var x2="x"+i+"5";

          if ($(x))
          {
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
	       }else{
	       	i=501;
	       }
        }
        document.form1.debitos.value=format(acum.toFixed(2),'.','.',',');
        document.form1.creditos.value=format(acum2.toFixed(2),'.','.',',');

       }

</script>


<style type="text/css">
<!--
.style9 {color: #FFFFFF
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

<body onLoad="MM_preloadImages('../../images/rbut_01_f2.gif','../../images/rbut_02_f2.gif','../../images/rbut_03_f2.gif','../../images/rbut_04_f2.gif')">
<form name="form1" method="post" action="ConFinCom.php?var=C">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top.php'); ?>
    </td>
  </tr>
<tr>
<td height="432" valign="top" align="center">
<table height="50%" border="0" align="center" class="box">
  <tr>
        <td class="breadcrumb">SIGA  <? echo $modulo; ?>      </tr>
      <tr>
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
          <input type="button" name="Submit4" value="&gt;|" onClick="ultimo()">-->        </td>
        <td align="left" width="12%">
        </td>
          <td align="right" width="61%">
          <?  // MENU PRINCIPAL  // ?>
          <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>        </td>
      </tr>
    </table>        </td>
          </tr>
      <tr>
            <td colspan="2" class="box" >
      <table width="100%" align="center" class="bodyline">
                <tr>
                  <td height="22" colspan="3" class="form_label_01"><table width="100%" height="291%" border="0">
                  <td width="10%">
                  </td>
                  <td width="10%">
                  </td>
                  <td width="10%">
                  </td>
                  <td>
                   <input type="button" value="Catálogo de Cuentas" onClick="catalogocuentas()"/>
                  </td>
                      <tr>
                        <td width="13%" height="22" class="form_label_01">N&uacute;mero:</td>
                        <td width="56%" class="form_label_01">
                          <?
              if  (($block=='0') || ($block=='-'))
              {
            ?>
                          <input name="numero" type="text" class="imagenInicio" id="numero" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $numero; ?>" size="10" maxlength="8" onblur="if (($('numero').value!='') && ($F('numero')!='########')){ $('numero').value=$('numero').value.pad(8,'0',0); f.action='ConFinCom.php?var=C'; f.submit(); } else { $('numero').value='########';  }">
            <?
              }
              else if ( ($block=='1') || ($block=='2') || ($block=='3') )
              {
            ?>
                <input name="numero" readonly="true" type="text" id="numero" value="<? echo $numero; ?>" size="10" maxlength="8" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'">
            <?
              }
            ?>

            <? if ($status=="ACTUALIZADO")
              {
            ?>
            <strong><font color="#0000CC" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $status;?></font></strong>
                        <?
              }
              else if (($status=="ANULADO") || ($status=="REVERSADO") || ($status=="DESCUADRADO"))
              {
            ?>
            <strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $status."    ";?></font></strong>
                        <?
              }
              else if ($status=="DIFERIDO")
              {
            ?>
            <strong><font color="#009900" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $status."      ";?></font></strong>
                        <?
              }

            ?>            </td>
                        <td width="4%" class="form_label_01">
              <?
                if ($act=="S")
                {
              ?>
              <a href='javascript: actualizar();'><img src="../../images/act.gif" width="16" height="16"></a>
              <?
                }
              ?>
               </td>

                        <td width="27%" class="form_label_01">Fecha:
                          <?
              //if  (($block=='0') || ($block=='1') || ($block=='-'))

              if ($imec=="I")
              {
            ?>
                 <input name="fecha" type="text"  class="imagenInicio" id="fecha" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);" onBlur="if (($('fecha').value!='')){ f.action='ConFinCom.php?var=C'; f.submit(); }">
            <?
              }
              //else if (($block=='2') || ($block=='3'))
              else
              {
            ?>
                 <input name="fecha" type="text"  readonly="true" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" id="fecha" value="<? print $fecha;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);">
            <?
              }
            ?>              </td>
                      </tr>
                      <tr valign="middle">
                        <td height="40%" class="form_label_01">Descripci&oacute;n:</td>
                        <td colspan="3" class="form_label_01">
            <?
            //if ((trim($status)=="DIFERIDO") and (trim($tipcom)=="CON"))
            if ((trim($status)=="DIFERIDO"))
            { ?>
          <input name="desc" type="text"  class="imagenInicio" id="desc" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $desc;?>" size="70"  onKeyPress="focos(event,'x11')">
            <? }else if ($status==''){ ?>
          <input name="desc" type="text"  class="imagenInicio" id="desc" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $desc;?>" size="70"  onKeyPress="focos(event,'x11')">

            <? }else { ?>

          <input name="desc" type="text"  class="imagenInicio" id="desc" readonly="true" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $desc;?>" size="70">
      <? }
              // FOCOS
              if ($block=='-')
              {
            ?>
              <script>
                document.form1.numero.focus();
              </script>
            <?
              }
              else if (($block=='0') || ($block=='1'))
              {
            ?>
              <script>
                document.form1.fecha.focus();
              </script>
            <?
              }
              else if ($block=='3')
              {
            ?>
              <script>
                document.form1.desc.focus();
              </script>
            <?
              }
            ?>            </td>
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
            <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="recuadro">
                <tr valign="bottom" bgcolor="#ECEBE6">
                  <td width="100%" height="1">
                      <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="">
                      <!--DWLayoutTable-->
                      <tr> <a></a>

                        <td width="4%" class="tpButtons"><a href='javascript: catalogo2(1,2,2,"G");'><img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16"></a></td>
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
          while ($i<=50)
          {
           ?>
                              <tr>
                                <td class="grid_line01_br" ><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar(<? print $i;?>,5)" value="" size="1" ></td>
                                <td class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="30" value="" tabindex="1" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" onBlur="gridatos1(this.value,this.id,'x<? print $i;?>2','x<? print $i;?>2')"></td>
                                <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt01" size="30" value="" align="right" tabindex="2" onKeyPress="focos(event,'x<? print $i;?>3')">                                </td>
                                <td class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="15" value="" onKeyPress="focos(event,'x<? print $i;?>4')" maxlength="8"></td>
                                <td class="grid_line01_br" align="right"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt02" size="15" value="0.00" onBlur="montos(event,this.id,'x<? print $i;?>5')" onBlur="chequeamonto(this.id,'x<? print $i;?>5');" onKeyDown="chequeamonto(this.id,'x<? print $i;?>5');">                                </td>
                                <td class="grid_line01_br" align="right"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="grid_txt02" size="15" value="0.00" onBlur="montos2(event,this.id,'x<? print $i;?>4')" onBlur="chequeamonto2(this.id,'x<? print $i;?>4');" onKeyDown="chequeamonto2(this.id,'x<? print $i;?>4');">                                </td>
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
                                <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar(<? print $i;?>,5)" value="" size="1" ></td>
                                <td class="grid_line01_br" align="left"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="30" value="<? print $grid1[$i];?>" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" onBlur="gridatos1(this.value,this.id,'x<? print $i;?>2','x<? print $i;?>3')"></td>
                                <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt01" size="30" value="<? print $grid2[$i];?>">                                </td>
                                <td class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="15" value="<? print $grid3[$i];?>" onKeyPress="focos(event,'x<? print $i;?>4')" maxlength="8"></td>
                                <td class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt02" size="15" value="<? print number_format($grid4[$i],2,'.',',');?>" onBlur="montos(event,this.id,'x<? print $i;?>5')">                                </td>
                                <td class="grid_line01_br"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="grid_txt02" size="15" value="<? print number_format($grid5[$i],2,'.',',');?>" onBlur="montos2(event,this.id)">                                </td>
                              </tr>
                              <?
          $i=$i+1;
          }
          //$i=$i+1;
          while ($i<=50)
          {
          ?>
                              <tr>
                                <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar(<? print $i;?>,5)" value="" size="1" ></td>
                                <td class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="30" value="" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" onBlur="gridatos1(this.value,this.id,'x<? print $i;?>2','x<? print $i;?>3')"></td>
                                <td class="grid_line01_br" align="left"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt01" size="30" value="" align="right">                                </td>
                                <td class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="15" value="" onKeyPress="focos(event,'x<? print $i;?>4')" maxlength="8"></td>
                                <td class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt02" size="15" value="0.00" onBlur="montos(event,this.id,'x<? print $i;?>5')">                                </td>
                                <td class="grid_line01_br"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="grid_txt02" size="15" value="0.00" onBlur="montos2(event,this.id)">                                </td>
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

                        <td width="41%" height="17" align="center" class="queryheader"><span class="style9">Saldo</span></td>

                        <td width="18%" height="17" class="queryheader">
                          <div align="center"><span class="style9">Totales</span></div></td>

                        <td width="19%" align="right" bgcolor="#CCFFFF">
                          <input name="debitos" type="text" class="cajadetextosimple" id="montot3" size="15" readonly="true"></td>

                        <td width="10%" align="right" bgcolor="#CCFFFF">
                          <div align="right">
                              <input name="creditos" type="text" class="cajadetextosimple" id="creditos" size="15" readonly="true">
                            </div></td>

                        <td width="4%" align="right" bgcolor="#CCFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        </tr>
                        <? // } ?>
                      </table>
                      <? //include_once ('gridConFinCom.php'); ?>                  </td>
                </tr>
                <? // } ?>
              </table></td>
          </tr>
          <tr>
            <td colspan="2" class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...
              <?  ///// variable oculta que se necesita para guardar //// ?>
              <input name="fecini" type="hidden" id="fecini" value="<? echo $fecini; ?>" />
              <input name="feccie" type="hidden" id="feccie" value="<? echo $feccie; ?>" />
              <?  /////////////////////////////////////////////////////// ?>
              <input name="status" type="hidden" id="status" value="<? print $status;?>">
              <input name="save" type="hidden" id="save" value="<? print $save;?>">
              </span></td>
          </tr>

        </table>  </tr>
</td>
</table>
<? require_once('../../lib/general/bottom.php'); ?>
</form>
</body>
 <script>
  actualizarsaldos2();
</script>
<script language="JavaScript">

  function catalogocuentas()
  {
    pagina="ConFinCue.php";
      window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,height=650,width=900,height=20,resizable=yes,left=270,top=235");

  }

    function rellenar(e)
    {

      if (e.keyCode==13)
      {
        f=document.form1;

        f.action="ConFinCom.php?var=<? print 'R';?>";
        f.submit();
      }
    }

/*    function gridatos1(e,tira,id,donde,foco)
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
    }*/

    function gridatos1(tira,id,donde,foco)
    {
    if ($(id).value!='')
    {
      var j='';
      var ja='';
      if (parseInt(id.length)==3)
      {
        j=parseInt(id.substring(1,2));
        ja = j-1;
      }
      else
      {
        j=parseInt(id.substring(1,3));
        ja = j-1;
      }
      var ref   = 'x'+j+'3';
      var refant = 'x'+ja+'3';

          a=repetido2(id,donde);
          if (a==false)
          {
            cadena=rayitasfc(tira);
            document.getElementById(id).value=cadena;

            f=document.form1;
            cuantos='1';
            sql="select codcta as codigo, descta as campo1 from contabb where upper(cargab)=¿C¿ and trim(codcta)=trim(¿"+cadena+"¿)";
            pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&donde="+donde+"&foco="+foco+"&sql="+sql;

          //  $(x).value='';

	       //Para repetir la referencia anterior
		    if ($F(refant)) $(ref).value = $(refant).value;

            window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=no,width=500,height=20,resizable=no,left=100,top=300");
          }
    }
    }


    function montos(e,id,fc)
    {
      //if (e.keyCode==13)
      //{
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
          //focos(e,fc);
        }
      //}
    }

    function montos2(e,id,ant)
    {
      //if (e.keyCode==13)
      //{
        if (validarnumero(id)==false)
        {
          document.getElementById(id).value="0.00";
          document.getElementById(id).focus();
          document.getElementById(id).select();
        }
          actualizarsaldos(e,id);
      //}
    }


  function chequeamonto(id,prox)
  {
         if (document.getElementById(prox).value!='0.00')
         {
           document.getElementById(id).value='0.00';
         }
  }

  function chequeamonto2(id,ant)
  {
         if (document.getElementById(ant).value!='0.00')
         {
           document.getElementById(id).value='0.00';
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
        f.status.value="AC";
        salvar();
      }
    }

    function buscarenter(e)
      {
//        if (e.keyCode==13)
      //{
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
      //}
     }

    function validar_fecha5555()
    {
      f=document.form1;
      fecha=document.getElementById('fecha').value;
      if (fecha.length==10)
      {
        f=document.form1;
        pagina="validar.php?fecha="+f.fecha.value;
        window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");
      }
      else
      {
        //alert("Longitud de Fecha inválida");
        document.getElementById('fecha').value=mostrarfecha();
        document.getElementById('fecha').focus();
      }
    }


     function primero()
      {
      f=document.form1;
      f.action="ConFinCom.php?var=<? print '1';?>";
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
      f.action="ConFinCom.php?var=<? print '2';?>";
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      f.action="ConFinCom.php?var=<? print '3';?>";
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      f.action="ConFinCom.php?var=<? print '4';?>";
      f.submit();
     }


     function actualizarsaldos(e,id)
      {
       //if (e.keyCode==13)
      //{
        f=document.form1;
        i=1;
        var acum=0;
        var acum2=0;
        while (i<=500)
        {
          var x="x"+i+"4";
          var x2="x"+i+"5";

          if ($(x))
          {
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

          }else{
          	i=501;
          }
        }
        document.form1.debitos.value=format(acum.toFixed(2),'.','.',',');
        document.form1.creditos.value=format(acum2.toFixed(2),'.','.',',');

      //}
     }


     function cancelar()
     {
         f=document.form1;
      f.action="ConFinCom.php?var=<? print 'L';?>";
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
                    alert("La cuenta contable está repetida");
                    document.getElementById(id).focus();
                    i=51;
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
      if (!verificar_campo_clave(0,f.numero.value,"No puede salvar sin introducir el número del comprobante"))
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
      else if (f.debitos.value!=f.creditos.value)
      {
        alert("No puede salvar el comprobante ya que se encuentra descuadrado");
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
      while (i<=50)
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
            refant = "x1"+3;
            ref = "x1"+3;
            i=50;
          }
          else
          {
            campo=x;
            campo2=y;
            foco="x"+i+fc;
            a = i-1;
            refant = "x"+a+3;
            ref = "x"+i+3;
            i=50;
          }
        }
        i=i+1;
      }

      sql='select codcta as CODIGO, descta as DESCRIPCION from contabb where cargab=¿C¿ and descta like upper(¿%¿) order by codcta';
      pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
      window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");

     //Para repetir la referencia anterior
	  if ($F(refant)) $(ref).value = $(refant).value;

           //pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Contabb_Confincom/clase/Contabb/frame/form1/obj1/codcta/campo1/'+$campo1+'/campo2/'+$campo2+'/submit/true';
          //window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
     }


     function eliminar(i,c)
       {
         f=document.form1;
      var fila;
      for (fila=i;fila<50;fila++)
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
      if (i==50)
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

      }//if (fila==50)
     actualizarsaldos2();
     }


      function salvar()
      {
          f = document.form1;
          // PRENDER Y APAGAR EL SALVAR
          save      = f.save.value;
          estatus   = f.status.value;
          tipcom    = '<? echo $tipcom; ?>';
          imec    = '<? echo $imec; ?>';
          btnmodcom = '<? echo $btn["btnmodcom"]; ?>';

	      if ((estatus!='N' && estatus!='R' && estatus!='A') || estatus=='D' )
	      {
		      if ((btnmodcom=='f') && (tipcom!='CON')  && (imec!='I') ){
		      		alert('No se Puede modificar este Comprobante por que no fue Generado por el Modulo de Contabilidad');
		        }else{
		            if (save=='S')
		            {
		              if(confirm("¿Realmente desea Salvar?"))
		              {
		                if (verificar())
		                {
		                  status=f.status.value;
		                  if (status=='AC'){ status='A' }
		                  imec='<? print $imec;?>';
		                  f.action="imecConFinCom.php?imec="+imec+"&status="+status;
		                  f.submit();
		                }
		              }
		            }
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

          transformar();

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
        consulta();
      }
      else if(itemId == '0_filter'){
        alert("Filtro");
      }
      else if(itemId == '0_cancelar'){
          cancelar();
      }
      else if(itemId == '0_delete')
      {
	      transformar();
	      //alert($F('status'));
	      var status = '<? echo $btnelicomanu; ?>';
	      if ((status=='t') && ($F('status')=='N')){
              alert('No se puede Eliminar los Comprobantes Anulados, ya que se encuentra Restringido esta Operacion.');
	      }else{
	        if(confirm("¿Esta seguro que desear Eliminar este Comprobante?"))
	        {
	          Eliminar();
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


    function Eliminar()
     {
     f=document.form1;
     var status=f.status.value;
     var block='<? echo $block; ?>';

    if (status == 'N')
    {
      alert('Este Comprobante esta Nulo, no se puede Eliminar');
    }
     if (block=='2')
     {
       alert('La Fecha del Comprobante pertenece a un periodo Cerrado.');

         }else{
        if (block=='3'){
           alert('ADVERTENCIA: La Fecha del Comprobante esta fuera del Perodo del Ejercicio Fiscal.');		 }

      if (status=='A'){
        if(confirm("Realmente desea Reversar este comprobante?"))
        {
          f.action="imecConFinCom.php?imec=<? echo 'E'; ?>&status=R";
          f.submit();
        }

      }else if (status=='R'){
        if(confirm("Realmente desea colocar este comprobante Diferido nuevamente?"))
        {
          f.action="imecConFinCom.php?imec=<? echo 'E'; ?>&status=D";
          f.submit();
        }

      }else if (status=='D' || status=='E'){
        if(confirm("Realmente desea Anular este comprobante? "))
        {
          var validareliminarcomprobante='<? echo $ValidarEliminarComprobante; ?>';
          //alert(validareliminarcomprobante);
          f.action="imecConFinCom.php?imec=<? echo 'E'; ?>&status=N";
          f.submit();
        }
      }
      }
     }


  function catalogo(campo,campo2,sw)
   {
   if (sw=='1')
    {
     var sql='SELECT TIPPRC CODIGO,NOMEXT NOMBRE_EXTENDIDO, NOMABR NOMBRE_ABREVIADO FROM CPDOCPRC WHERE NOMEXT like upper(¿%¿) ORDER BY TIPPRC'
     var titulo="Catalogo de Tipo de PreCompromiso"
      ViewCatalogo(campo,campo2,sql,titulo);
  }

   if (sw=='2')
   {
      var sql='SELECT CEDRIF CEDULA_RIF,NOMBEN NOMBRE,DIRBEN DIRECCION FROM OPBENEFI WHERE CEDRIF like upper(¿%¿) ORDER BY CEDRIF'
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
          //document.getElementById('var').value='C';
          f=document.form1;
          var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';

          var campo2='fecha';
          var campo='numero';
          var foco='submit';
          sql='select numcom as Numero, to_char(feccom,¿dd/mm/yyyy¿) as Fecha, stacom as Estatus from contabc where upper(numcom) like upper(¿%¿) Order By numcom, feccom, stacom';

          //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
          //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");

          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Contabc_ConFinCom/clase/Contabc/frame/form1/obj1/numero/obj2/fecha/campo1/numcom/campo2/feccom/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
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
