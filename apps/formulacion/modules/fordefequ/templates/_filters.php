<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/18 08:40:34
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('tools') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fordefequ/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codequ"><?php echo __('Código') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codequ]', isset($filters['codequ']) ? $filters['codequ'] : null, array (
  'size' => 2,
  'maxlength' => 2,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(2, '0',0);document.getElementById('filters_codequ').value=valor;",
)) ?>
    </div>
    
  <br>
  
    <label for="desequ"><?php echo __('Descripción') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desequ]', isset($filters['desequ']) ? $filters['desequ'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordefequ/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
