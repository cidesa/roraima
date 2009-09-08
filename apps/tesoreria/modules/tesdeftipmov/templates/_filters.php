<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/27 10:00:43
?>
<?php use_helper('Object', 'Javascript') ?>

<div class="sf_admin_filters">
<?php echo form_tag('tesdeftipmov/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codtip"><?php echo __('Código:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codtip]', isset($filters['codtip']) ? $filters['codtip'] : null, array (
  'size' => 4,
  'maxlength' => 4,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="destip"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[destip]', isset($filters['destip']) ? $filters['destip'] : null, array (
  'size' => 15,
  'maxlength' => 40,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="debcre"><?php echo __('Tipo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[debcre]', isset($filters['debcre']) ? $filters['debcre'] : null, array (
  'maxlength' => 1,
  'size' => 5,
  'onBlur' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('filters_debcre').value=cadena", 
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'tesdeftipmov/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
