<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: comprobanteSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?
if ($msgerr=="")
{
    $x=0;
    $formu='';
    while ($x<count($formulario))
    {
      $formu=$formu.$formulario[$x].'*';
      $x++;
    }
    ?>
        <script type="text/javascript">
         function comprobante(formulario)
  {
      window.open('/tesoreria<?php if (SF_ENVIRONMENT=='dev') echo ("_dev") ?>.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
            j=0;
            i='<? print $i; ?>';
            i=parseInt(i);
            formu='<? print $formu; ?>';
            formulario=formu.split('*');
            while (j<=i)
            {
              comprobante(formulario[j]);
              j++;
            }
        </script>
<?php
}//if ($msgerr!="")
else //hubo un error al generar el comprobante contable
{
?>
      <script type="text/javascript">
            mens='<? print $msgerr; ?>';
            alert(mens);
        </script>
<?php
}//else //hubo un error al generar el comprobante contable
?>
