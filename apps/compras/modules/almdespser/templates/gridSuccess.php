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
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'PopUp') ?>
<?php echo grid_tag($obj);?>
<? if ($mensaje!="")
{
?>
      <script type="text/javascript">
            mens='<? print $mensaje; ?>';
            alert(mens);
            $('cadphartser_reqart').value="";
            $('cadphartser_desreqart').value="";
            $('cadphartser_codori').value='';
            $('cadphartser_nomcat').value='';
        </script>
<?php
}
?>