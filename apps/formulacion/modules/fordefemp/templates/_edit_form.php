<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/19 09:21:55
?>
<?php echo form_tag('fordefemp/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($empresa, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Intitución')?></legend>
<div class="form-row">
  <?php echo label_for('empresa[nomemp]', __($labels['empresa{nomemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('empresa{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('empresa{nomemp}')): ?>
    <?php echo form_error('empresa{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($empresa, 'getNomemp', array (
  'size' => 80,
  'control_name' => 'empresa[nomemp]',
  'maxlength' => 250, 
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('empresa[diremp]', __($labels['empresa{diremp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('empresa{diremp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('empresa{diremp}')): ?>
    <?php echo form_error('empresa{diremp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($empresa, 'getDiremp', array (
  'size' => 50,
  'control_name' => 'empresa[diremp]',
  'maxlength' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <table>
   <tr>
   <th>
      <?php echo label_for('empresa[ciuemp]', __($labels['empresa{ciuemp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('empresa{ciuemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('empresa{ciuemp}')): ?>
    <?php echo form_error('empresa{ciuemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($empresa, 'getCiuemp', array (
  'size' => 50,
  'control_name' => 'empresa[ciuemp]',
  'maxlength' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
   </th>
   <th>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
      <?php echo label_for('empresa[tlfemp]', __($labels['empresa{tlfemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('empresa{tlfemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('empresa{tlfemp}')): ?>
    <?php echo form_error('empresa{tlfemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($empresa, 'getTlfemp', array (
  'size' => 20,
  'control_name' => 'empresa[tlfemp]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
   </th>
   </tr>
  </table>

<br>

  <?php echo label_for('empresa[urlemp]', __($labels['empresa{urlemp}']), 'class="required" style="width: 90px"') ?>
  <div class="content<?php if ($sf_request->hasError('empresa{urlemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('empresa{urlemp}')): ?>
    <?php echo form_error('empresa{urlemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($empresa, 'getUrlemp', array (
  'size' => 80,
  'control_name' => 'empresa[urlemp]',
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

 <table>
  <tr>
  <th>
    <?php echo label_for('empresa[faxemp]', __($labels['empresa{faxemp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('empresa{faxemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('empresa{faxemp}')): ?>
    <?php echo form_error('empresa{faxemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($empresa, 'getFaxemp', array (
  'size' => 20,
  'control_name' => 'empresa[faxemp]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
    <?php echo label_for('empresa[codpos]', __($labels['empresa{codpos}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('empresa{codpos}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('empresa{codpos}')): ?>
    <?php echo form_error('empresa{codpos}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($empresa, 'getCodpos', array (
  'size' => 20,
  'control_name' => 'empresa[codpos]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
  </tr>
 </table>
 


<br>



<br>

  <?php echo label_for('empresa[cleedo]', __($labels['empresa{cleedo}']), 'class="required" style="width: 190px"') ?>
  <div class="content<?php if ($sf_request->hasError('empresa{cleedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('empresa{cleedo}')): ?>
    <?php echo form_error('empresa{cleedo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($empresa, 'getCleedo', array (
  'size' => 80,
  'control_name' => 'empresa[cleedo]',
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('empresa[dirpre]', __($labels['empresa{dirpre}']), 'class="required" style="width: 190px"') ?>
  <div class="content<?php if ($sf_request->hasError('empresa{dirpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('empresa{dirpre}')): ?>
    <?php echo form_error('empresa{dirpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($empresa, 'getDirpre', array (
  'size' => 80,
  'control_name' => 'empresa[dirpre]',
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('empresa' => $empresa)) ?>

</form>

<ul class="sf_admin_actions">

  </ul>
