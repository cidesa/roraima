<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/23 14:33:48
?>
<?php use_helper('Object') ?>
<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('tools') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fadesp/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="dphart"><?php echo __('Número:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[dphart]', isset($filters['dphart']) ? $filters['dphart'] : null, array (
  'size' => 15,
  'maxlegth' => 8,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('filters_dphart').value=valor;",
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fadesp/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
