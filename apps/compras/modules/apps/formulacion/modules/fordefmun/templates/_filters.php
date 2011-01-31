<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_filters.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/14 10:23:04
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fordefmun/list', array('method' => 'get')) ?>
<fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codest"><?php echo __('Estado:') ?></label>
    <div class="content">
    <?php echo select_tag('filters[codest]', objects_for_select(FordefestPeer::doSelect(new Criteria()),'getCodest','getDesest',isset($filters['codest']) ? $filters['codest'] : null,'include_custom=Seleccione')) ?>

    </div>
    </div>

        <div class="form-row">
    <label for="codmun"><?php echo __('Codigo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codmun]', isset($filters['codmun']) ? $filters['codmun'] : null, array (
  'size' => 5,
  'maxlength' => 4,
   'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('filters_codmun').value=valor;",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="desmun"><?php echo __('Descripcion:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desmun]', isset($filters['desmun']) ? $filters['desmun'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordefmun/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
