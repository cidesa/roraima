<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_filters.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/08 16:58:26
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('tools') ?>
<div class="sf_admin_filters">
<?php echo form_tag('pretitfin/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codfin"><?php echo __('Código:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codfin]', isset($filters['codfin']) ? $filters['codfin'] : null, array (
  'size' => 4,
  'maxlength' => 4,
    'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('filters_codfin').value=valor;",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="nomext"><?php echo __('Nombre Extendido:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomext]', isset($filters['nomext']) ? $filters['nomext'] : null, array (
  'size' => 15,
  'maxlength' => 100,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'pretitfin/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
