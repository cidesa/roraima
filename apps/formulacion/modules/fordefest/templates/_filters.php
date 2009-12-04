<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_filters.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/14 10:22:37
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('tools') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fordefest/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codest"><?php echo __('Codigo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codest]', isset($filters['codest']) ? $filters['codest'] : null, array (
  'size' => 5,
  'maxlength' => 4,
   'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('filters_codest').value=valor;",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="desest"><?php echo __('Descripcion:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desest]', isset($filters['desest']) ? $filters['desest'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordefest/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
