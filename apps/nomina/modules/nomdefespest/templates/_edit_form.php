<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/09/03 11:04:27
?>
<?php echo form_tag('nomdefespest/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npestado, 'getId') ?>
<?php echo javascript_include_tag('tools','dFilter','ajax') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Estado')?></h2></legend>
<div class="form-row">
  <?php echo label_for('npestado[codpai]', __($labels['npestado{codpai}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npestado{codpai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npestado{codpai}')): ?>
    <?php echo form_error('npestado{codpai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('npestado[codpai]', $npestado->getCodpai(),
    'nomdefespest/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 4,
    'size ' => 5,
    'readonly'  =>  $npestado->getId()!='' ? true : false ,
	'onBlur'=> remote_function(array(
			  'url'      => 'nomdefespest/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('npestado_codpai').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=npestado_nompai&cajtexcom=npestado_codpai&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?>
&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nppais_Nomdefespest/clase/Nppais/frame/sf_admin_edit_form/obj1/npestado_codpai/obj2/npestado_nompai/campo1/codpai/campo2/nompai','','','botoncat')?>
     </div>

<br>

  <?php echo label_for('npestado[nompai]', __($labels['npestado{nompai}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npestado{nompai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npestado{nompai}')): ?>
    <?php echo form_error('npestado{nompai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npestado, 'getNompai', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'npestado[nompai]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Municipio')?></h2></legend>
<div class="form-row">
  <?php echo label_for('npestado[codedo]', __($labels['npestado{codedo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npestado{codedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npestado{codedo}')): ?>
    <?php echo form_error('npestado{codedo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npestado, 'getCodedo', array (
  'size' => 5,
  'control_name' => 'npestado[codedo]',
  'maxlength' => 4,
  'readonly'  =>  $npestado->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);$('npestado_codedo').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npestado[nomedo]', __($labels['npestado{nomedo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npestado{nomedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npestado{nomedo}')): ?>
    <?php echo form_error('npestado{nomedo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npestado, 'getNomedo', array (
  'size' => 60,
  'maxlength' => 100,
  'control_name' => 'npestado[nomedo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('npestado' => $npestado)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npestado->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefespest/delete?id='.$npestado->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
  var id='<?php echo $npestado->getId()?>';
  if (id!='')
  {
    $$('.botoncat')[0].disabled=true;
  }
</script>
