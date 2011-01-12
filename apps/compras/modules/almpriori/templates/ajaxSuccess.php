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
<?php if ($ajax=="") {?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
 <?php echo select_tag('casolart[articulo]', options_for_select($articulos,"",'include_custom=Seleccione un Artículo'),array('onChange'=> remote_function(array(
	'update'   => 'divGrid',
    'script'   => true,
	'url'      => 'almpriori/grid?ajax=1',
	'with'   => "'reqart='+document.getElementById('casolart_reqart').value+'&codart='+this.value"
  )))); ?>

<script language="JavaScript" type="text/javascript">
     new Ajax.Updater('divGrid', getUrlModulo()+'grid', {asynchronous:true, evalScripts:true, parameters:'ajax=0'})
</script>

<?php }else if ($ajax=="as") {?>
<?
  echo grid_tag($grid2);
?>
<?php }?>