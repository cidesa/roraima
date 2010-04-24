<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/09 16:18:38
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>

<div class="sf_admin_filters">
<?php echo form_tag('pagemiord/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="numord"><?php echo __('Referencia') ?></label>
    <div class="content">
    <?php echo input_tag('filters[numord]', isset($filters['numord']) ? $filters['numord'] : null, array (
  'size' => 8,
  'maxlength' => 8,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('filters_numord').value=valor;",
)) ?>
    </div>

<br>

    <label for="fecemi"><?php echo __('Fecha') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fecemi]', isset($filters['fecemi']) ? $filters['fecemi'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yyyy',
   'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'##/##/####')",
)) ?>
    </div>

<br>

    <label for="tipcau"><?php echo __('Tipo') ?></label>
    <div class="content">
    <?php echo input_tag('filters[tipcau]', isset($filters['tipcau']) ? $filters['tipcau'] : null, array (
  'size' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('filters_tipcau').value=cadena",
)) ?>
    </div>
    </div>


        <div class="form-row">
    <label for="filters_cedrif"><?php echo __('C.I o R.I.F:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[cedrif]', isset($filters['cedrif']) ? $filters['cedrif'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nomben"><?php echo __('Beneficiario:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomben]', isset($filters['nomben']) ? $filters['nomben'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

   <div class="form-row">
    <label for="filters_status"><?php echo __('Estatus:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[status]', isset($filters['status']) ? $filters['status'] : null, array (
  'size' => 1,
)) ?>
    </div>
    </div>

  <div class="form-row">
    <label for="filters_codconcepto"><?php echo __('Concepto de Pago:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codconcepto]', isset($filters['codconcepto']) ? $filters['codconcepto'] : null, array (
  'size' => 4,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'pagemiord/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
