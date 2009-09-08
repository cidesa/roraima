<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/12 18:40:52
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('pretiptit/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codtip"><?php echo __('Código:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codtip]', isset($filters['codtip']) ? $filters['codtip'] : null, array (
  'size' => 4,
    'maxlength' => 4,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('filters_codtip').value=valor;",
)) ?>
    </div>

<br>

    <label for="destip"><?php echo __('Nombre:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[destip]', isset($filters['destip']) ? $filters['destip'] : null, array (
  'size' => 15,
   'maxlength' => 100,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'pretiptit/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
