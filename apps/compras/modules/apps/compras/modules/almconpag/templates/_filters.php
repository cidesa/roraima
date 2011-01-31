<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/09/07 11:00:01
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>

<div class="sf_admin_filters">
<?php echo form_tag('almconpag/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codconpag"><?php echo __('Código') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codconpag]', isset($filters['codconpag']) ? $filters['codconpag'] : null, array (
  'size' => 4,
  'maxlength' => 4,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('filters_codconpag').value=valor;",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="desconpag"><?php echo __('Descripción') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desconpag]', isset($filters['desconpag']) ? $filters['desconpag'] : null, array (
  'size' => 15,
  'maxlength' => 255,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'almconpag/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
