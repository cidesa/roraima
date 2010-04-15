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
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'Javascript', 'Linktoapp') ?>
<?php /*echo input_hidden_tag('fila', $numreg)*/ ?>

<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
<?
echo grid_tag($obj2);
?>
</div>


