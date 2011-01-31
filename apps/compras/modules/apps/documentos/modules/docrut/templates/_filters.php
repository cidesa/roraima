<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/16 14:35:05
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('docrut/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="tipdoc"><?php echo __('Tipo de Documento:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[tipdoc]', isset($filters['tipdoc']) ? $filters['tipdoc'] : null, array (
  'size' => 4,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="id_acunidad"><?php echo __('Unidad:') ?></label>
    <div class="content">
    <?php echo object_select_tag(isset($filters['id_acunidad']) ? $filters['id_acunidad'] : null, null, array (
  'include_blank' => true,
  'related_class' => 'Acunidad',
  'text_method' => 'getNomuni',
  'control_name' => 'filters[id_acunidad]',
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'docrut/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
