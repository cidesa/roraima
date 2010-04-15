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
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid') ?>
<?php echo javascript_include_tag('ajax') ?>
<form name="form1" id="form1">
<?
  echo grid_tag($obj);
?>
<? if ($mensaje!="")
{
?>
      <script type="text/javascript">
            mens='<? print $mensaje; ?>';
            alert(mens);
            $('cadphart_reqart').value="";
            $('cadphart_desreq').value="";
            $('cadphart_codori').value='';
            $('cadphart_nomcat').value='';
            $('cadphart_mondph').value='0.00'
            $('cadphart_reqart').focus();
        </script>
<?php
}
?>
</form>