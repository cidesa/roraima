<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/22 14:46:37
?>
<?php echo form_tag('almtipemp/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($catipempsnc, 'getId') ?>
<?php echo javascript_include_tag('tools', 'observe') ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipo de Empresa Proveedora')?></legend>
<div class="form-row">
  <?php echo label_for('catipempsnc[codtip]', __($labels['catipempsnc{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catipempsnc{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catipempsnc{codtip}')): ?>
    <?php echo form_error('catipempsnc{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catipempsnc, 'getCodtip', array (
  'size' => 20,
  'control_name' => 'catipempsnc[codtip]',
  'maxlength' => 4,
  'readonly'  =>  $catipempsnc->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('catipempsnc_codtip').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('catipempsnc[destip]', __($labels['catipempsnc{destip}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('catipempsnc{destip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catipempsnc{destip}')): ?>
    <?php echo form_error('catipempsnc{destip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catipempsnc, 'getDestip', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'catipempsnc[destip]',
   'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('catipempsnc' => $catipempsnc)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($catipempsnc->getId()): ?>
<?php echo button_to(__('delete'), 'almtipemp/delete?id='.$catipempsnc->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
