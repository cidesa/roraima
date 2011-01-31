<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/09/13 10:50:17
?>
<?php use_helper('Object', 'Javascript' ) ?>
<?php echo javascript_include_tag('tools') ?>
<div class="sf_admin_filters">
<?php echo form_tag('pagtipret/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codtip"><?php echo __('Codigo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codtip]', isset($filters['codtip']) ? $filters['codtip'] : null, array (
  'size' => 3,
  'maxlength' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('filters_codtip').value=valor",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="destip"><?php echo __('Descripcion:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[destip]', isset($filters['destip']) ? $filters['destip'] : null, array (
  'size' => 15,
  'maxlength' => 250,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'pagtipret/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
