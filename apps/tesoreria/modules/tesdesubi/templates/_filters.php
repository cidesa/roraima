<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/27 09:05:31
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('tools') ?>

<div class="sf_admin_filters">
<?php echo form_tag('tesdesubi/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codubi"><?php echo __('Código') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codubi]', isset($filters['codubi']) ? $filters['codubi'] : null, array (
  'size' => 15,
  'maxlength' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('filters_codubi').value=valor;",
)) ?>
    </div>

<br>

    <label for="desubi"><?php echo __('Descripción') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desubi]', isset($filters['desubi']) ? $filters['desubi'] : null, array (
  'size' => 15,
  'maxlength' => 250,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'tesdesubi/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
