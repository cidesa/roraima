<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/11 12:45:11
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('almsolegr/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="reqart"><?php echo __('Número') ?></label>
    <div class="content">
    <?php echo input_tag('filters[reqart]', isset($filters['reqart']) ? $filters['reqart'] : null, array (
  'size' => 8,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('filters_reqart').value=valor;",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_desreq"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desreq]', isset($filters['desreq']) ? $filters['desreq'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_fecreq"><?php echo __('Fecha:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fecreq]', isset($filters['fecreq']) ? $filters['fecreq'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yy',
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'almsolegr/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
