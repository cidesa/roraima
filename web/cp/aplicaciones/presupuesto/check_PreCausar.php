<?
session_start();

require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/funciones2.php');
require($_SESSION["x"].'lib/general/tools.php');
$codemp = $_SESSION["codemp"];
$bd     = new basedatosAdo($codemp);
$tools  = new tools();

   $sql    = $_GET["sql"];
   $refere = $_GET["refere"];
   $sql    = str_replace("�","'",$sql);
   $sql    = str_replace("¿","'",$sql);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Catalogo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">
<script language="JavaScript"  src="../../lib/general/js/prototype.js"></script>

<style type="text/css">
<!--
.style14 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="500" border="0">
<form action="" method="post" name="form1">
  <tr>
    <td colspan="2">
  <div class="div_check">
    <table width="100%" border="0" class="recuadro">
      <tr>
      <td colspan="8" align="center" class="tpButtons">Opciones de B&uacute;squeda </td>
      </tr>
      <tr class='queryheader'>
      <td width="20" >
        <input type="checkbox" name="todos" id="todos" value="" onClick="seleccion_check()">
      </td>
      <td width="28" ><span class="style14">Id</span></td>
      <td width="97"><span class="style14">Referencia</span></td>
      <td width="105"><span class="style14">Descripci&oacute;n</span></td>
      <td width="108"><span class="style14">Beneficiario</span></td>
      <td width="54"><span class="style14">Fecha</span></td>
      <td width="18"><span class="style14">Monto</span></td>
      <td width="40"><span class="style14">Estatus</span></td>
      <td bordercolor="#FFFFFF" bgcolor="#EEF2F2"></td>
      </tr>
      <?
      if ($tb=$tools->buscar_datos($sql)){
        $totcausado=0;
        $totmonto=0;
        $totpagdo=0;
        $cont=0;

      while (!$tb->EOF){
        $cont=$cont+1;
      ?>
      <tr bgcolor='#EEF2F2'>
      <td>
       <?php if ($tb->fields["aprcom"]!='Por Aprobar'){ ?>
           <input type="checkbox" name="x<? print $cont;?>1" id="x<? print $cont;?>1" value="<? echo $tb->fields["referencia"]; ?>" onClick="marcar(this)">
       <?php }else{  ?>
          <input type="checkbox" name="x<? print $cont;?>1" id="x<? print $cont;?>1" value="<? echo $tb->fields["referencia"]; ?>" disabled='true'">
       <?php }?>
      </td>
      <td><? echo $cont; ?></td>
      <td><? echo $tb->fields["referencia"]; ?></td>
      <td><? echo $tb->fields["descripcion"]; ?></td>
      <td><? echo trim($tb->fields["cedula"]); ?></td>
        <td bgcolor="#EEF2F2"><input name="x<? print $cont;?>6" id="x<? print $cont;?>6" type="text"  class="escondido"   size="8"  readonly="true" value="<? echo $tb->fields["fecha"]; ?>"></td>


      <td align="right">
      <input name="x<? print $cont;?>7" id="x<? print $cont;?>7" type="text"  class="escondido"   size="13"  readonly="true" value="<? echo number_format($tb->fields["monto"],2,'.',','); ?>">
      </td>
      <td>

      <?php if ($tb->fields["aprcom"]=='Por Aprobar'){ ?>
        <div class='letras_rojas'>
          <? echo $tb->fields["aprcom"]; ?>
        </div>
      <?php }else{  ?>
        <? echo $tb->fields["aprcom"]; ?>
        <?php }?>

      </td>
          <td bordercolor="#FFFFFF" bgcolor="#EEF2F2">
                <input name="x<? print $cont;?>8" id="x<? print $cont;?>8" type="hidden" readonly="true" value="<? echo trim($tb->fields["cedula"]); ?>">
            </td>

      </tr>
      <?
      $tb->MoveNext();
       }
       }
      ?>

    </table>
    </div>
  </td>
  </tr>
  <tr>
    <td width="292"><div align="right">
          <input type="button" name="Button" value="Aceptar" onClick="aceptar()">
          <input type="button" name="Button2" value="Cerrar" onClick="javascript:window.close()">
        </div></td>
      <td width="198">
        <input name="compara" type="hidden" id="compara">
    <input name="cuantos" type="hidden" id="cuantos" value="0">
        <input name="cedula" type="hidden" id="cedula"></td>
  </tr>
</form>
</table>
</body>
<script>

     function seleccion_check()
     {
     f=document.form1;
     var igual;
     fila='<? echo $cont; ?>';
     if (f.todos.checked==true)
      {

       i=1;
       while (i<=fila)
       {
         var x8="x"+i+"8";
        j=i+1;
        var aux8="x"+j+"8";

        if (i==1)
        {
          cod=$F(x8);
        }

        if ($(aux8)){
          if (cod==$F(aux8))
          {
            igual=true;
          }
          else
          {
            alert("No todos los documentos tienen el mismo Beneficiario");
            document.form1.todos.checked=false;

            fila = i;
          }
        }
      var x="x"+i+"1";
      document.getElementById(x).checked=true;
      i=i+1;
      }
        f.todos.value='1';    //Para saber si se marco todas para validarlo en imecPreAsiPar

    }
    else// para desmarcarlos todos
    {
       ////Si solo hay uno
         if (c==1)
         {
          document.getElementById('x11').checked=false;
          exit();
         }
       ////////////////////

       i=1;
       while (i<=c)
       {
        var x="x"+i+"1";
        document.getElementById(x).checked=false
        i=i+1;
      }
     }
     }


     function marcar(f)
     {

      if (parseInt(f.id.length)==5)
    {
      id=f.id.substring(0,4)+"8";
    }
    else if (parseInt(f.id.length)==4)
    {
      id=f.id.substring(0,3)+"8";
    }
    else
    {
      id=f.id.substring(0,2)+"8";
    }

       if ( (document.form1.compara.value=='') && (document.form1.cuantos.value=='0') )
       {
            document.form1.cuantos.value= 1;
         document.form1.compara.value=document.getElementById(id).value;
          }
       else//si ya hay alguien seleccionado
       {
             if (f.checked==false)//SI LO ESTA DESMARCANDO
          {
           document.form1.cuantos.value=parseInt(document.form1.cuantos.value) - 1;//lo resto

            if ( (document.form1.compara.value) == (document.getElementById(id).value) )//si esta desmarcando el mismo
            {
              if (document.form1.cuantos.value=='0')
              {
                document.form1.compara.value='';
              }
            }

          }
          else//SI LO ESTA MARCANDO
          {
            if ( (document.form1.compara.value) == (document.getElementById(id).value) )
            {
              document.form1.cuantos.value=parseInt(document.form1.cuantos.value) + 1;//lo sumo
            }
            else
            {
              alert("El beneficiario de este Documento es distinto al ya seleccionado, por favor seleccione uno igual");
              f.checked=false;
            }
          }
      }

     }

     function aceptar()
     {
       fila='<? echo $cont; ?>';
       i=1;
       var concate='';
       var fecha='';
       var sel=0;
       var monto=0;
       while (i<=fila)
       {
        var x="x"+i+"1";
        var x6="x"+i+"6";
        var x7="x"+i+"7";
        var x8="x"+i+"8";
          if (document.getElementById(x).checked==true)
          {
            concate=concate+'/'+document.getElementById(x).value;
            fecha=fecha+'-'+$(x6).value;

            str= document.getElementById(x7).value.toString();
            str= str.replace(',','');
            str= str.replace(',','');
            str= str.replace(',','');

            var num=parseFloat(str);  //Valor Real sin (.) y ni (,)
            monto=monto+num;
            document.getElementById('cedula').value=document.getElementById(x8).value;
            sel=sel+1;
          }
        i=i+1;
      }

     if (sel==0)
     {
         close();
     }
     else
     {

         cedula=document.getElementById('cedula').value;
       refere='<? print $refere;?>';

       document.form1.action="check_PreCausar2.php?concate="+concate+"&sel="+sel+"&monto="+monto+"&refere="+refere+"&cedula="+cedula+"&fecha="+fecha;
       document.form1.submit();
    }

     }
  </script>
</html>
