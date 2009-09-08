<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/22 18:11:57
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('almdefcatsnc/list', array('method' => 'get')) ?>
<?php echo javascript_include_tag('ajax', 'tools', 'observe', 'dFilter') ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codsnc"><?php echo __('Código:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codsnc]', isset($filters['codsnc']) ? $filters['codsnc'] : null, array (
  'size' => $longsnc,
  'maxlength' => $longsnc,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$formatosnc');",
  'onKeyUp' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();$('filters_codsnc').value=cadena;",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="dessnc"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[dessnc]', isset($filters['dessnc']) ? $filters['dessnc'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'almdefcatsnc/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
