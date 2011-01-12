<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/26 16:36:16
?>
<?php echo form_tag('fortotfueinggen/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php if ($sf_flash->has('notice1')): ?>
<div class="form-errors">
<h2><?php echo __($sf_flash->get('notice1')) ?></h2>
</div>
<?php endif; ?>

<?php echo object_input_hidden_tag($fortipfin, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<? if ($eximov=='N')
{
?>
<div align="center">
	<?php echo button_to('Actualizar Disponibilidad Fuentes de Ingreso', 'fortotfueinggen/actualizardis?id='.$fortipfin->getId()) ?>
</div>
<br>
<? } ?>

<?php echo __('* Total Ingreso Estimado.. ')."  : ".input_tag('tot_ing_est', '0', array (
    'disabled' => true, 'size' => '16')); ?>
<br>
<br>
<?php echo __('* Total Ingreso Disponible : ').input_tag('tot_ing_dis', '0', array (
    'disabled' => true, 'size' => '16')); ?>
<br>
<br>
<?
	echo grid_tag($grid);
?>
</div>






</fieldset>

<?php include_partial('edit_actions', array('fortipfin' => $fortipfin)) ?>

</form>