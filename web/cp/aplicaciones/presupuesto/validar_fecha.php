<?
session_start();
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/tools.php');
//validar();            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tool= new tools();

if ( !empty($_GET["fecha"]) )
{
  $fecha=$_GET["fecha"];
  $periodo=$_GET["periodo"];
  $origen=$_GET["origen"];
  $fecotr=$_GET["fecotr"];


  if  ($origen=="S") //solicitud de traslado
  {
    if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
    {
       if (Fecha_Periodo($fecha,$periodo))
      {
        if ($tool->Fecha_en_Periodo_Abierto($fecha)) //cppereje, CERRADO='N'
         {
        ?>
        <script>
          opener.document.getElementById('desc').focus();
        </script>
        <?
        }
        else
        {
        ?>
        <script>
          opener.document.getElementById('fecha').value="";
          opener.document.getElementById('fecha').focus();
        </script>
        <?
        }
      }
      else
      {
        ?>
        <script>
          opener.document.getElementById('fecha').value="";
          opener.document.getElementById('fecha').focus();
        </script>
        <?
      }
    }//if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
   else
   {
    ?>
    <script>
      opener.document.getElementById('fecha').value="";
      opener.document.getElementById('fecha').focus();
    </script>
    <?
    }
  }//if ($origen=="S")

  if ($origen=="T") //Traslados
  {
    if ($tool->validarFechaPresup($fecha))
    {
       if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
       {
         if (Fecha_Periodo($fecha,$periodo))
         {
        ?>
        <script>
          opener.document.getElementById('desc').focus();
        </script>
        <?
        }
        else
        {
        ?>
        <script>
          opener.document.getElementById('fecha').value="";
          opener.document.getElementById('fecha').focus();
        </script>
        <?
        }
      }//  if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
      else
      {
      ?>
      <script>
        opener.document.getElementById('fecha').value="";
        opener.document.getElementById('fecha').focus();
      </script>
      <?
      }
    }//if ($tool->validarFechaPresup($fecha))
    else
    {
      ?>
      <script>
        opener.document.getElementById('fecha').value="";
        opener.document.getElementById('fecha').focus();
      </script>
      <?
    }
  }//if ($origen=="T")

  if ($origen=="A") //Anular Traslados
  {
    $splitfecha = split('/', $fecha);
    $splitfecotr = split('/', $fecotr);
    $fecha_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];
    $fecotr_for = $splitfecotr[2] . "-" . $splitfecotr[1] . "-" . $splitfecotr[0];
    if (strtotime($fecha_for) >= strtotime($fecotr_for))
    {
      if ($tool->validarFechaPresup($fecha))
       {
       if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
         {
        ?>
        <script>
          opener.document.getElementById('desanu').focus();
        </script>
        <?
        }
        else
        {
        ?>
        <script>
          opener.document.getElementById('fecha').value="";
          opener.document.getElementById('fecha').focus();
        </script>
        <?
        }
      }
      else
      {
      ?>
      <script>
        opener.document.getElementById('fecha').value="";
        opener.document.getElementById('fecha').focus();
      </script>
      <?
      }
    }//if ($fecha >=  $fecotr)
    else
    {
      Mensaje("La Fecha debe ser Mayor a la del Movimiento");
      ?>
      <script>
        opener.document.getElementById('fecha').value="";
        opener.document.getElementById('fecha').focus();
      </script>
      <?
    }
  }//if ($origen=="A")

  if ($origen=="AD") //ADICION/DISMINUCION
  {
      if ($tool->validarFechaPresup($fecha))
       {
       if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
         {
        ?>
        <script>
          opener.document.getElementById('desc').focus();
        </script>
        <?
        }//if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
        else
        {
        ?>
        <script>
          opener.document.getElementById('fecha').value="";
          opener.document.getElementById('fecha').focus();
        </script>
        <?
        }
      }//     if ($tool->validarFechaPresup($fecha))
      else
      {
      ?>
      <script>
        opener.document.getElementById('fecha').value="";
        opener.document.getElementById('fecha').focus();
      </script>
      <?
      }
  }//if ($origen=="AD")

  if ($origen=="AJ") //AJUSTES
  {
      if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
       {
        $splitfecha = split('/', $fecha);
        $splitfecotr = split('/', $fecotr);
        $fecha_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];
        $fecotr_for = $splitfecotr[2] . "-" . $splitfecotr[1] . "-" . $splitfecotr[0];
        if  ((!empty($fecotr))  and (strtotime($fecha_for) < strtotime($fecotr_for)))
         {
          Mensaje("La Fecha del Ajuste no puede ser menor a la Fecha del Movimiento");
        ?>
        <script>
          opener.document.getElementById('fecha').value="";
          opener.document.getElementById('fecha').focus();
        </script>
        <?
        }
        else
        {
        ?>
        <script>
          opener.document.getElementById('desc').focus();
        </script>
        <?
        }
      }
      else
      {
      ?>
      <script>
        opener.document.getElementById('fecha').value="";
        opener.document.getElementById('fecha').focus();
      </script>
      <?
      }
  }//if ($origen=="AJ")

}//if ( !empty($_GET["fecha"])  )


function Fecha_Periodo($fecha,$periodo)
{
  $x = new tools();
  global $bd;

    //chekea periodo
      $periodo = strtoupper(trim(str_pad($periodo,2,'0',STR_PAD_LEFT)));
      $sql     = "select to_char(fechas,'dd/mm/yyyy') as fechas from CPPerEje where PerEje='".trim($periodo)."' ";
      if ($tb=$x->buscar_datos($sql))
      {
        $fechas      = $tb->fields["fechas"];
        $splitfecha  = split('/', $fecha);
        $splitfechas = split('/', $fechas);
        $fecha_for   = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];
        $fechas_for  = $splitfechas[2] . "-" . $splitfechas[1] . "-" . $splitfechas[0];

        if (strtotime($fecha_for)<= strtotime($fechas_for))
        {
          return true;
        }
        else
        {
         Mensaje("Fecha debe ser Menor a la Fecha Final del Periodo");
         return false;
        }
      }
      else
      {
        Mensaje("Fecha debe ser Menor a la Fecha Final del Período. Verifique la Definicion del Periodo");
        return false;
      }

} //end function

?>
<script>
  close();
</script>