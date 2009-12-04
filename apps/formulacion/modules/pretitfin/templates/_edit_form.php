<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/19 12:48:43
?>
<?php echo form_tag('pretitfin/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fortipfin, 'getId') ?>
<?php echo javascript_include_tag('tools') ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Tipo de Financiamiento') ?></legend>
<div class="form-row">
  <?php echo label_for('fortipfin[codfin]', __($labels['fortipfin{codfin}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fortipfin{codfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fortipfin{codfin}')): ?>
    <?php echo form_error('fortipfin{codfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fortipfin, 'getCodfin', array (
  'size' => 4,
  'readonly'  =>  $fortipfin->getId()!='' ? true : false ,
  'control_name' => 'fortipfin[codfin]',
  'maxlength' => 4,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('fortipfin_codfin').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fortipfin[nomext]', __($labels['fortipfin{nomext}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fortipfin{nomext}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fortipfin{nomext}')): ?>
    <?php echo form_error('fortipfin{nomext}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fortipfin, 'getNomext', array (
  'size' => 80,
  'control_name' => 'fortipfin[nomext]',
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fortipfin[nomabr]', __($labels['fortipfin{nomabr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fortipfin{nomabr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fortipfin{nomabr}')): ?>
    <?php echo form_error('fortipfin{nomabr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fortipfin, 'getNomabr', array (
  'size' => 20,
  'control_name' => 'fortipfin[nomabr]',
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fortipfin[tipfin]', __($labels['fortipfin{tipfin}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fortipfin{tipfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fortipfin{tipfin}')): ?>
    <?php echo form_error('fortipfin{tipfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<table>
<tr>
<th>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?
	if ($fortipfin->getTipfin()=='O'){$valor1 = true;}else{ $valor1=false;}
		   	echo radiobutton_tag('fortipfin[tipfin]', 'O', $valor1 )        ."Ordinario".'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo radiobutton_tag('fortipfin[tipfin]', 'E', !$valor1)."   Extraordinario".'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
?>
</div>
</fieldset>
</th>
</tr>
</table>
    </div>
</div>
</fieldset>


<?php include_partial('edit_actions', array('fortipfin' => $fortipfin)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fortipfin->getId()): ?>
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
<?php endif; ?>
</li>
  </ul>
<script type="text/javascript">
  function eliminar()
  {
    var codigo=$('fortipfin_codfin').value;
    var id=$('id').value;


    location.href='/formulacion_dev.php/pretitfin/eliminar?codigo='+codigo+'&id='+id;
  }
 </script>