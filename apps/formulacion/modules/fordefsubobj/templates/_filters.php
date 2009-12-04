<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_filters.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/07 16:26:44
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('tools') ?>
<div class="sf_admin_filters">
<?php echo form_tag('fordefsubobj/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codsubobj"><?php echo __('Código:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codsubobj]', isset($filters['codsubobj']) ? $filters['codsubobj'] : null, array (
  'size' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('filters_codsubobj').value=valor;",
)) ?>
    </div>
   
   <br>
   
    <label for="dessubobj"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[dessubobj]', isset($filters['dessubobj']) ? $filters['dessubobj'] : null, array (
  'size' => 15,
)) ?>
    </div>

<br>

      <label for="codequ"><?php echo __('Directriz:') ?></label>
    <div class="content">
    <?php echo select_tag('filters[codequ]', objects_for_select(FordefequPeer::doSelect(new Criteria()),'getCodequ','getDesequ',isset($filters['codequ']) ? $filters['codequ'] : null,'include_custom=Seleccione')) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordefsubobj/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
