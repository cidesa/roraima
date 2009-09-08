<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/02 10:00:46
?>
<?php echo form_tag('vacdiafer/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npvacdiafer, 'getId') ?>
<?php echo input_hidden_tag('varcontrol', '') ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','nomina/vacdiafer') ?>


<fieldset id="sf_fieldset_none" class="">
<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('npvacdiafer' => $npvacdiafer)) ?>

</form>