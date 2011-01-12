<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_filters.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/09 12:16:07
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('dFilter', 'tools') ?>
<div class="sf_admin_filters">
<?php echo form_tag('fortiting/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codparing"><?php echo __('Código:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codparing]', isset($filters['codparing']) ? $filters['codparing'] : null, array (
  'size' => 15,
  'maxlength' => $lonpar,
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('filters_codparing').value=cadena;}",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$forpar')",
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fortiting/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
