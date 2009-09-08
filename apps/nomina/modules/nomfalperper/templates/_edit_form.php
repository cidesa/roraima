<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/26 15:54:53
?>
<?php echo form_tag('nomfalperper/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>
<?php echo object_input_hidden_tag($nphojint, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('nphojint[codemp]', __($labels['nphojint{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codemp}')): ?>
    <?php echo form_error('nphojint{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCodemp', array (
  'size' => 20,
  'control_name' => 'nphojint[codemp]',
  'maxlength' => 9,
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'url'      => 'nomfalperper/grid',
        'complete' => 'AjaxJSON(request, json)',
		'condition' => "$(this.id).value!=''",
        'script' => true,
        'with' => "'ajax=1&cajtexmos=nphojint_nomemp&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Nomfalperper/clase/Nphojint/frame/sf_admin_edit_form/obj1/nphojint_codemp/obj2/nphojint_nomemp/campo1/codemp/campo2/nomemp/param1/')?>

    </div>


  <div class="content<?php if ($sf_request->hasError('nphojint{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{nomemp}')): ?>
    <?php echo form_error('nphojint{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <br>

  <?php $value = object_input_tag($nphojint, 'getNomemp', array (
  'readonly' => 'true',
  'size' => 80,
  'control_name' => 'nphojint[nomemp]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>

<?php //include_partial('edit_actions', array('nphojint' => $nphojint)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($nphojint->getId()): ?>
<?php //echo button_to(__('delete'), 'nomfalperper/delete?id='.$nphojint->getId(), array (
  //'post' => true,
  //'confirm' => __('Are you sure?'),
  //'class' => 'sf_admin_action_delete',
//)) ?><?php endif; ?>
</li>
  </ul>
<script language="JavaScript">
	if($('nphojint_codemp').value!='')
	{
		$('nphojint_codemp').focus();
		$('nphojint_nomemp').focus();
	}
	
</script>  