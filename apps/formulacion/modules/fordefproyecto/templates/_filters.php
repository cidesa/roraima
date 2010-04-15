<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/27 17:25:29
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('dFilter') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fordefproyecto/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codpro"><?php echo __('Código') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codpro]', isset($filters['codpro']) ? $filters['codpro'] : null, array (
  'size' => 15,
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('filters_codpro').value=cadena;}",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraproyecto')",
)) ?>
    </div>
    </div>

 <div class="form-row">
    <label for="proacc"><?php echo __('Proyecto o Acción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[proacc]', isset($filters['proacc']) ? $filters['proacc'] : null, array (
  'size' => 1,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="fecini"><?php echo __('Fecha Inicio:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fecini]', isset($filters['fecini']) ? $filters['fecini'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
)) ?>
    </div>
    </div>


      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordefproyecto/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
