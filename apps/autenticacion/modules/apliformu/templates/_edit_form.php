<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/04/27 20:30:22
?>
<?php echo form_tag('apliformu/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($aplifor, 'getId') ?>
<?php echo javascript_include_tag('dFilter','Linktoapp','ajax','tools','observe') ?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('aplifor[codapl]', __($labels['aplifor{codapl}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('aplifor{codapl}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('aplifor{codapl}')): ?>
    <?php echo form_error('aplifor{codapl}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('aplifor[codapl]', options_for_select($listaapli,$aplifor->getCodapl(),'include_custom=Seleccione Uno')) ?>
   </div>

<br>
  <?php echo label_for('aplifor[coddiv]', __($labels['aplifor{coddiv}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('aplifor{coddiv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('aplifor{coddiv}')): ?>
    <?php echo form_error('aplifor{coddiv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('aplifor[coddiv]', options_for_select($listadiv,$aplifor->getCoddiv(),'include_custom=Seleccione Uno')) ?>
    </div>

<br>
  <?php echo label_for('aplifor[desopc]', __($labels['aplifor{desopc}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('aplifor{desopc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('aplifor{desopc}')): ?>
    <?php echo form_error('aplifor{desopc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($aplifor, 'getDesopc', array (
  'size' => 80,
  'control_name' => 'aplifor[desopc]',
  'maxlength' => 1000,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('aplifor[nomopc]', __($labels['aplifor{nomopc}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('aplifor{nomopc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('aplifor{nomopc}')): ?>
    <?php echo form_error('aplifor{nomopc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($aplifor, 'getNomopc', array (
  'size' => 25,
  'control_name' => 'aplifor[nomopc]',
  'maxlength' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
</div>

</fieldset>

<?php include_partial('edit_actions', array('aplifor' => $aplifor)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($aplifor->getId()): ?>
<?php echo button_to(__('delete'), 'apliformu/delete?id='.$aplifor->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
