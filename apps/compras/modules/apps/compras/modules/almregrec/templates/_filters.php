<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 16:52:03
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>

<div class="sf_admin_filters">
<?php echo form_tag('almregrec/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codrec"><?php echo __('Código') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codrec]', isset($filters['codrec']) ? $filters['codrec'] : null, array (
  'size' => 8,
  'maxlength' => 8,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('filters_codrec').value=valor;",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="codtiprec"><?php echo __('Grupo') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codtiprec]', isset($filters['codtiprec']) ? $filters['codtiprec'] : null, array (
  'size' => 4,
   'maxlength' => 4,
    'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('filters_codtiprec').value=valor;",
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'almregrec/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
