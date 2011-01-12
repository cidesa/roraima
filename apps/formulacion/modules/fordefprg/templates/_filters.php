<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_filters.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/09 17:39:24
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fordefprg/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codprg"><?php echo __('Código:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codprg]', isset($filters['codprg']) ? $filters['codprg'] : null, array (
  'size' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);$('filters_codprg').value=valor;",
)) ?>
    </div>
<br>
    <label for="desprg"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desprg]', isset($filters['desprg']) ? $filters['desprg'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordefprg/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
