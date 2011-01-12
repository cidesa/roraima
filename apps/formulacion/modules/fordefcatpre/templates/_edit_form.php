<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/29 09:09:22
?>
<?php echo form_tag('fordefcatpre/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefcatpre, 'getId') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools') ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Unidad Ejecutora') ?></legend>
<div class="form-row">
  <?php echo label_for('fordefcatpre[codcat]', __($labels['fordefcatpre{codcat}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefcatpre{codcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefcatpre{codcat}')): ?>
    <?php echo form_error('fordefcatpre{codcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefcatpre, 'getCodcat', array (
  'size' => 20,
  'maxlength' => $longunidad,
  'readonly'  =>  $fordefcatpre->getId()!='' ? true : false ,
  'control_name' => 'fordefcatpre[codcat]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$unidad')",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fordefcatpre[nomcat]', __($labels['fordefcatpre{nomcat}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefcatpre{nomcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefcatpre{nomcat}')): ?>
    <?php echo form_error('fordefcatpre{nomcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefcatpre, 'getNomcat', array (
  'size' => 80,
  'control_name' => 'fordefcatpre[nomcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('fordefcatpre[descat]', __($labels['fordefcatpre{descat}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefcatpre{descat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefcatpre{descat}')): ?>
    <?php echo form_error('fordefcatpre{descat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefcatpre, 'getDescat', array (
  'size' => 80,
  'control_name' => 'fordefcatpre[descat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fordefcatpre[objsec]', __($labels['fordefcatpre{objsec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefcatpre{objsec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefcatpre{objsec}')): ?>
    <?php echo form_error('fordefcatpre{objsec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefcatpre, 'getObjsec', array (
  'size' => '80x3',
  'control_name' => 'fordefcatpre[objsec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <table>
   <tr>
    <th><?php echo label_for('fordefcatpre[codemp]', __($labels['fordefcatpre{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefcatpre{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefcatpre{codemp}')): ?>
    <?php echo form_error('fordefcatpre{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('fordefcatpre[codemp]', $fordefcatpre->getCodemp(),
    'fordefcatpre/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 16, 'onBlur'=> remote_function(array(
			  'url'      => 'fordefcatpre/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('fordefcatpre_codemp').value != ''",
  			  'with' => "'ajax=1&cajtexmos=fordefcatpre_nomemp&cajtexcom=fordefcatpre_codemp&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?></div></th>
    <th>&nbsp;&nbsp;&nbsp;
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Fordefcatpre/clase/Nphojint/frame/sf_admin_edit_form/obj1/fordefcatpre_codemp/obj2/fordefcatpre_nomemp/campo1/codemp/campo2/nomemp')?>
    </th>
    <th> <?php $value = object_input_tag($fordefcatpre, 'getNomemp', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'fordefcatpre[nomemp]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>
</div>
</fieldset>

<br>

<?
//echo grid_tag($obj);
?>

</div>
</fieldset>

<?php include_partial('edit_actions', array('fordefcatpre' => $fordefcatpre)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($fordefcatpre->getId()): ?>
<?php echo button_to(__('delete'), 'fordefcatpre/delete?id='.$fordefcatpre->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
