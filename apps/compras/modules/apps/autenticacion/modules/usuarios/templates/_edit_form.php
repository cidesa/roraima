<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2008/04/23 18:44:08
?>
<?php echo form_tag('usuarios/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($usuarios, 'getId') ?>
<?php echo javascript_include_tag('dFilter','Linktoapp','ajax','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Usuario')?></legend>
<div class="form-row">
  <?php echo label_for('usuarios[cedemp]', __($labels['usuarios{cedemp}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('usuarios{cedemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuarios{cedemp}')): ?>
    <?php echo form_error('usuarios{cedemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuarios, 'getCedemp', array (
  'size' => 20,
  'control_name' => 'usuarios[cedemp]',
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
      <?php echo label_for('usuarios[nomuse]', __($labels['usuarios{nomuse}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('usuarios{nomuse}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuarios{nomuse}')): ?>
    <?php echo form_error('usuarios{nomuse}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuarios, 'getNomuse', array (
  'size' => 80,
  'control_name' => 'usuarios[nomuse]',
  'maxlength' => 250,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
      <?php echo label_for('usuarios[diremp]', __($labels['usuarios{diremp}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('usuarios{diremp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuarios{diremp}')): ?>
    <?php echo form_error('usuarios{diremp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuarios, 'getDiremp', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'usuarios[diremp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('usuarios[telemp]', __($labels['usuarios{telemp}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('usuarios{telemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuarios{telemp}')): ?>
    <?php echo form_error('usuarios{telemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuarios, 'getTelemp', array (
  'size' => 50,
  'control_name' => 'usuarios[telemp]',
  'maxlength' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Otros Datos')?></legend>
<div class="form-row">
  <?php echo label_for('usuarios[loguse]', __($labels['usuarios{loguse}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('usuarios{loguse}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuarios{loguse}')): ?>
    <?php echo form_error('usuarios{loguse}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuarios, 'getLoguse', array (
  'size' => 50,
  'control_name' => 'usuarios[loguse]',
  'maxlength' => 50,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('usuarios_loguse').value=cadena",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('usuarios[pasuse]', __($labels['usuarios{pasuse}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('usuarios{pasuse}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuarios{pasuse}')): ?>
    <?php echo form_error('usuarios{pasuse}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_password_tag('usuarios[pasuse]', $usuarios->getPasuse()) ?>
</div>
<br>
  <?php echo label_for('usuarios[confirm]', __($labels['usuarios{confirm}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('usuarios{confirm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuarios{confirm}')): ?>
    <?php echo form_error('usuarios{confirm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_password_tag('usuarios[confirm]', $usuarios->getConfirm()) ?>
    </div>

    <br>
<div id="niveles" style="display:none">
  <?php echo label_for('usuarios[codniv]', __($labels['usuarios{codniv}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuarios{codniv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuarios{codniv}')): ?>
    <?php echo form_error('usuarios{codniv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($usuarios, 'getCodniv', array (
  'size' => 10,
  'maxlength' => 3,
  'control_name' => 'usuarios[codniv]',
  'onBlur'=> remote_function(array(
        'url'      => 'usuarios/ajax',
        'condition' => "$('usuarios_codniv').value != ''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=1&cajtexmos=usuarios_desniv&cajtexcom=usuarios_codniv&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Segnivapr_Usuarios/clase/Segnivapr/frame/sf_admin_edit_form/obj1/usuarios_codniv/obj2/usuarios_desniv/campo1/codniv/campo2/desniv','','','botoncat')?>
 &nbsp;&nbsp;&nbsp;
  <?php $value = object_input_tag($usuarios, 'getDesniv', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'usuarios[desniv]',
)); echo $value ? $value : '&nbsp;' ?> </div>
</br>
</div>
</div>
</fieldset>

</div>
</fieldset>

<?php include_partial('edit_actions', array('usuarios' => $usuarios)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($usuarios->getId()): ?>
<?php echo button_to(__('delete'), 'usuarios/delete?id='.$usuarios->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
  var nivelapr='<?php echo $mannivelapr ?>';
  if (nivelapr=='S')
  {
  	$('niveles').show();
  }
</script>

