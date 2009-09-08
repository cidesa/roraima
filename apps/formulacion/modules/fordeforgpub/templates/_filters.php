<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/07 15:48:21
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('tools') ?>
<div class="sf_admin_filters">
<?php echo form_tag('fordeforgpub/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codorg"><?php echo __('Codigo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codorg]', isset($filters['codorg']) ? $filters['codorg'] : null, array (
  'size' => 5,
  'maxlength' => 4,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('filters_codorg').value=valor;",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="nomorg"><?php echo __('Nombre:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomorg]', isset($filters['nomorg']) ? $filters['nomorg'] : null, array (
  'size' => 15,
  'maxlength' => 100,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordeforgpub/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
