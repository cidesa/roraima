<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/30 18:33:23
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('generales/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="dphart"><?php echo __('Numero:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[dphart]', isset($filters['dphart']) ? $filters['dphart'] : null, array (
  'size' => 8,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="desdph"><?php echo __('Descripcion:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desdph]', isset($filters['desdph']) ? $filters['desdph'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="fecdph"><?php echo __('Fecha:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fecdph]', isset($filters['fecdph']) ? $filters['fecdph'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yyyy',
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'almdespser/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
