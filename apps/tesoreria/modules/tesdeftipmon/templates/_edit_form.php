<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/13 17:18:43
?>
<?php echo form_tag('tesdeftipmon/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($tsdesmon, 'getId') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('dFilter') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Tipo de Moneda')?></legend>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('tsdesmon[codmon]', __($labels['tsdesmon{codmon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsdesmon{codmon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdesmon{codmon}')): ?>
    <?php echo form_error('tsdesmon{codmon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdesmon, 'getCodmon', array (
  'size' => 7,
  'readonly'  =>  $tsdesmon->getId()!='' ? true : false ,
  'control_name' => 'tsdesmon[codmon]',
  'maxlength' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('tsdesmon_codmon').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('tsdesmon[fecmon]', __($labels['tsdesmon{fecmon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsdesmon{fecmon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdesmon{fecmon}')): ?>
    <?php echo form_error('tsdesmon{fecmon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsdesmon, 'getFecmon', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsdesmon[fecmon]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)"
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>

<?php echo label_for('tsdesmon[nommon]', __($labels['tsdesmon{nommon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsdesmon{nommon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdesmon{nommon}')): ?>
    <?php echo form_error('tsdesmon{nommon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdesmon, 'getNommon', array (
  'size' => 40,
  'maxlength' => 40,
  'control_name' => 'tsdesmon[nommon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('tsdesmon[valmon]', __($labels['tsdesmon{valmon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsdesmon{valmon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdesmon{valmon}')): ?>
    <?php echo form_error('tsdesmon{valmon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdesmon, array('getValmon',true), array (
  'size' => 20,
  'maxlength'=>15,
  'control_name' => 'tsdesmon[valmon]',
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('tsdesmon_aumdis').focus();}",
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('tsdesmon[aumdis]', __($labels['tsdesmon{aumdis}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsdesmon{aumdis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdesmon{aumdis}')): ?>
    <?php echo form_error('tsdesmon{aumdis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php if($tsdesmon->getAumdis()=='A') $val = true; else $val=false; ?>
  <?php echo "Aumenta".'&nbsp;&nbsp;'. radiobutton_tag('tsdesmon[aumdis]', 'A', $val).'&nbsp;&nbsp;' ?>
  <?php echo "Disminuye".'&nbsp;&nbsp;'. radiobutton_tag('tsdesmon[aumdis]', 'D', !$val).'&nbsp;&nbsp;'?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('tsdesmon' => $tsdesmon)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($tsdesmon->getId()): ?>
<?php echo button_to(__('delete'), 'tesdeftipmon/delete?id='.$tsdesmon->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>