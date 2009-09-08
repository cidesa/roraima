<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?php
if ($mensaje!="")
{
?>
      <script type="text/javascript">
            mens='<? print $mensaje; ?>';
            alert(mens);
            $('fordefaccesp_codpro').value="";
            $('fordefaccesp_proacc').value="";
            $('fordefaccesp_nompro').value="";
            $('fordefaccesp_codpro').focus();
      </script>
<?php
}//else //hubo un error al generar el comprobante contable
?>

