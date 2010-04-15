<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/18 15:41:44
?>
<?php use_helper('Object') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<div class="sf_admin_filters">
<?php echo form_tag('pretiting/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codparing"><?php echo __('Codigo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codparing]', isset($filters['codparing']) ? $filters['codparing'] : null, array (
  'size' => 15,
  'maxlength' => 32,
  'onBlur' => "javascript:cadena=rayitas(this.value);document.getElementById('filters_codparing').value=cadena;",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascarapartida')",  
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="nomparing"><?php echo __('Nombre:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomparing]', isset($filters['nomparing']) ? $filters['nomparing'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'pretiting/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
