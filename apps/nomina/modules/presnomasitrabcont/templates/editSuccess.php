<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/02/06 12:18:19
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Asignacion de Trabajadores para Prestaciones por Contrato',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('presnomasitrabcont/edit_header', array('npasiempcont' => $npasiempcont)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('presnomasitrabcont/edit_messages', array('npasiempcont' => $npasiempcont, 'labels' => $labels)) ?>
<?php include_partial('presnomasitrabcont/edit_form', array('npasiempcont' => $npasiempcont, 'labels' => $labels, 'obj' => $obj, 'totfil' => $totfil)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('presnomasitrabcont/edit_footer', array('npasiempcont' => $npasiempcont)) ?>
</div>

</div>
<?php
if ($mensaje!="")
{
?>
      <script type="text/javascript">
            mens='<? print $mensaje; ?>';
            if (confirm(mens))
            {
             var codigo= $('npasiempcont_codtipcon').value;
             new Ajax.Updater('mensaje','/nomina_dev.php/presnomasitrabcont/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json);}, parameters:'ajax=2&cod='+codigo});
            }
            else
            {
             var codigo= $('npasiempcont_codtipcon').value;
             new Ajax.Updater('mensaje','/nomina_dev.php/presnomasitrabcont/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json);}, parameters:'ajax=3&cod='+codigo});
            }
     </script>
<?php
}
?>