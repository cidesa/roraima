<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/09/12 16:05:12
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('tools') ?>
<div class="sf_admin_filters">
<?php echo form_tag('tesdeftipmon/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codmon"><?php echo __('Codigo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codmon]', isset($filters['codmon']) ? $filters['codmon'] : null, array (
  'size' => 3,
  'maxlength' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('filters_codmon').value=valor",
)) ?>
    </div>
    </div>

          <div class="form-row">
    <label for="nommon"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nommon]', isset($filters['nommon']) ? $filters['nommon'] : null, array (
  'size' => 15,
  'maxlength' => 40,
)) ?>
    </div>
    </div>
    
        <div class="form-row">
    <label for="fecmon"><?php echo __('Fecha:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fecmon]', isset($filters['fecmon']) ? $filters['fecmon'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)"
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'tesdeftipmon/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
