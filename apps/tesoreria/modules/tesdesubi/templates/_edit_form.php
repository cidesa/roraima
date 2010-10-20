<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 41078 2010-10-20 18:01:28Z cramirez $
 */
// date: 2007/03/15 17:11:15
?>
<?php echo form_tag('tesdesubi/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bnubica, 'getId') ?>
<?php echo javascript_include_tag('tools', 'observe', 'dFilter') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Ubicación')?></legend>
<div class="form-row">
  <?php echo label_for('bnubica[codubi]', __($labels['bnubica{codubi}']), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('bnubica{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnubica{codubi}')): ?>
    <?php echo form_error('bnubica{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnubica, 'getCodubi', array (
  'size' => 15,
  'maxlength' => $lonubi,
  'control_name' => 'bnubica[codubi]',
  'readonly'  =>  $bnubica->getId()!='' ? true : false ,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('bnubica[desubi]', __($labels['bnubica{desubi}']), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('bnubica{desubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnubica{desubi}')): ?>
    <?php echo form_error('bnubica{desubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php $value = object_input_tag($bnubica, 'getDesubi', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'bnubica[desubi]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<?php if($sf_user->getAttribute('respon','','tesdesubi')=='S') { ?>
<br>
  <?php if($labels['bnubica{nomemp}']!='.:') { ?>
  <?php echo label_for('bnubica[nomemp]', __($labels['bnubica{nomemp}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('bnubica{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnubica{nomemp}')): ?>
    <?php echo form_error('bnubica{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($bnubica, 'getNomemp', array (
  'size' => 80,
  'control_name' => 'bnubica[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['bnubica{nomemp}']!='.:') { ?>



  </div>
  <?php  } ?>

<br>

  <?php if($labels['bnubica{nomcar}']!='.:') { ?>
  <?php echo label_for('bnubica[nomcar]', __($labels['bnubica{nomcar}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('bnubica{nomcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnubica{nomcar}')): ?>
    <?php echo form_error('bnubica{nomcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($bnubica, 'getNomcar', array (
  'size' => 80,
  'control_name' => 'bnubica[nomcar]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['bnubica{nomcar}']!='.:') { ?>



  </div>
  <?php  } ?>


<?php } ?>
</div>

</fieldset>

<?php include_partial('edit_actions', array('bnubica' => $bnubica)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($bnubica->getId()): ?>
<?php echo button_to(__('delete'), 'tesdesubi/delete?id='.$bnubica->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
