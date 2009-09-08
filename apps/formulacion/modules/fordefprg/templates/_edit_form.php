<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/09 17:06:07
?>
<?php echo form_tag('fordefprg/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>



<?php echo object_input_hidden_tag($fordefprg, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('fordefprg[codprg]', __($labels['fordefprg{codprg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefprg{codprg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefprg{codprg}')): ?>
    <?php echo form_error('fordefprg{codprg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefprg, 'getCodprg', array (
  'size' => 3,
  'maxlength' => 3,
  'control_name' => 'fordefprg[codprg]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);$('fordefprg_codprg').value=valor;",
  'readonly'  =>  $fordefprg->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fordefprg[desprg]', __($labels['fordefprg{desprg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefprg{desprg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefprg{desprg}')): ?>
    <?php echo form_error('fordefprg{desprg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefprg, 'getDesprg', array (
  'size' => 80,
  'control_name' => 'fordefprg[desprg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fordefprg[prbasoprg]', __($labels['fordefprg{prbasoprg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefprg{prbasoprg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefprg{prbasoprg}')): ?>
    <?php echo form_error('fordefprg{prbasoprg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefprg, 'getPrbasoprg', array (
  'control_name' => 'fordefprg[prbasoprg]',
  'cols' => 50,
  'rows' => 3,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fordefprg' => $fordefprg)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fordefprg->getId()): ?>
<?php echo button_to(__('delete'), 'fordefprg/delete?id='.$fordefprg->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
