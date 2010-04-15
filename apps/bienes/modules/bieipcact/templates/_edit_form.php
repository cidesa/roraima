<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/31 10:55:23
?>
<?php echo form_tag('bieipcact/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bnipcact, 'getId') ?>
<?php use_helper('Javascript','wait','Grid','PopUp','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('bnipcact[anoipc]', __($labels['bnipcact{anoipc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{anoipc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{anoipc}')): ?>
    <?php echo form_error('bnipcact{anoipc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, 'getAnoipc', array (
  'size' => 4,
  'maxlength' => 4,
  'control_name' => 'bnipcact[anoipc]',
  'onBlur'=> remote_function(array(
          'update'   => 'mensaje',
          'condition' =>  "$('id').value == ''",
          'url'      => 'bieipcact/ajax',
          'complete' => 'AjaxJSON(request, json)',
          'script' => true,
          'with' => "'ajax=1&cajtexmos1=bnipcact_ipcene&cajtexmos2=bnipcact_ipcfeb&cajtexmos3=bnipcact_ipcmar&cajtexmos4=bnipcact_ipcabr&cajtexmos5=bnipcact_ipcmay&cajtexmos6=bnipcact_ipcjun&cajtexmos7=bnipcact_ipcjul&cajtexmos8=bnipcact_ipcago&cajtexmos9=bnipcact_ipcsep&cajtexmos10=bnipcact_ipcoct&cajtexmos11=bnipcact_ipcnov&cajtexmos12=bnipcact_ipcdic&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </div>
  </fieldset>

<br>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Meses')?></legend>
<div class="form-row">
<table><tr><th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('bnipcact[ipcene]', __($labels['bnipcact{ipcene}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcene}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcene}')): ?>
    <?php echo form_error('bnipcact{ipcene}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcene',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcene]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnipcact[ipcfeb]', __($labels['bnipcact{ipcfeb}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcfeb}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcfeb}')): ?>
    <?php echo form_error('bnipcact{ipcfeb}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcfeb',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcfeb]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnipcact[ipcmar]', __($labels['bnipcact{ipcmar}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcmar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcmar}')): ?>
    <?php echo form_error('bnipcact{ipcmar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcmar',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcmar]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnipcact[ipcabr]', __($labels['bnipcact{ipcabr}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcabr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcabr}')): ?>
    <?php echo form_error('bnipcact{ipcabr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcabr',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcabr]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnipcact[ipcmay]', __($labels['bnipcact{ipcmay}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcmay}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcmay}')): ?>
    <?php echo form_error('bnipcact{ipcmay}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcmay',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcmay]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnipcact[ipcjun]', __($labels['bnipcact{ipcjun}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcjun}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcjun}')): ?>
    <?php echo form_error('bnipcact{ipcjun}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcjun',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcjun]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('bnipcact[ipcjul]', __($labels['bnipcact{ipcjul}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcjul}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcjul}')): ?>
    <?php echo form_error('bnipcact{ipcjul}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcjul',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcjul]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnipcact[ipcago]', __($labels['bnipcact{ipcago}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcago}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcago}')): ?>
    <?php echo form_error('bnipcact{ipcago}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcago',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcago]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('bnipcact[ipcsep]', __($labels['bnipcact{ipcsep}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcsep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcsep}')): ?>
    <?php echo form_error('bnipcact{ipcsep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcsep',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcsep]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnipcact[ipcoct]', __($labels['bnipcact{ipcoct}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcoct}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcoct}')): ?>
    <?php echo form_error('bnipcact{ipcoct}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcoct',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcoct]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnipcact[ipcnov]', __($labels['bnipcact{ipcnov}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcnov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcnov}')): ?>
    <?php echo form_error('bnipcact{ipcnov}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcnov',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcnov]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnipcact[ipcdic]', __($labels['bnipcact{ipcdic}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnipcact{ipcdic}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnipcact{ipcdic}')): ?>
    <?php echo form_error('bnipcact{ipcdic}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnipcact, array('getIpcdic',true), array (
  'size' => 7,
  'control_name' => 'bnipcact[ipcdic]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</th></tr></table>

</fieldset>

<?php include_partial('edit_actions', array('bnipcact' => $bnipcact)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bnipcact->getId()): ?>
<?php echo button_to(__('delete'), 'bieipcact/delete?id='.$bnipcact->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
