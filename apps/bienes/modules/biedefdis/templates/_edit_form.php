<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/02 10:27:45
?>
<?php echo form_tag('biedefdis/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php use_helper('Grid') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo object_input_hidden_tag($bndisbie, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?echo __('Movimientos') ?></legend>
<div class="form-row">
<br>

  <?php echo label_for('bndisbie[coddis]', __($labels['bndisbie{coddis}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisbie{coddis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisbie{coddis}')): ?>
    <?php echo form_error('bndisbie{coddis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndisbie, 'getCoddis', array (
  'size' => 20,
  'maxlength' => 6,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(6, '0',0);document.getElementById('bndisbie_coddis').value=valor;document.getElementById('bndisbie_coddis').disabled=false;",
  'control_name' => 'bndisbie[coddis]',
  'readonly' => $bndisbie->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('bndisbie[desdis]', __($labels['bndisbie{desdis}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisbie{desdis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisbie{desdis}')): ?>
    <?php echo form_error('bndisbie{desdis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndisbie, 'getDesdis', array (
  'size' => 51,
  'maxlength' => 250,
  'control_name' => 'bndisbie[desdis]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<table>
<tr>
<th>

<fieldset id="sf_fieldset_none" class="">
<legend><?echo __('Afecta Contabilidad') ?></legend>
<div class="form-row">
  <?php echo label_for('bndisbie[afecon]', __($labels['bndisbie{afecon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisbie{afecon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisbie{afecon}')): ?>
    <?php echo form_error('bndisbie{afecon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($bndisbie->getAfecon()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('bndisbie[afecon]', 'S', $val) ?>&nbsp;
  <?php echo "No ".radiobutton_tag('bndisbie[afecon]', 'N', !$val) ?>
    </div>
    <br>
</div>
</fieldset>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><?echo __('Desincorpora') ?></legend>
<div class="form-row">

  <?php echo label_for('bndisbie[desinc]', __($labels['bndisbie{desinc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisbie{desinc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisbie{desinc}')): ?>
    <?php echo form_error('bndisbie{desinc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($bndisbie->getDesinc()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('bndisbie[desinc]', 'S', $val) ?>&nbsp;
  <?php echo "No ".radiobutton_tag('bndisbie[desinc]', 'N', !$val) ?>
    </div>
<br>
</div>

</fieldset>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><?echo __('Mejora el Bien') ?></legend>
<div class="form-row">
  <?php echo label_for('bndisbie[adimej]', __($labels['bndisbie{adimej}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisbie{adimej}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisbie{adimej}')): ?>
    <?php echo form_error('bndisbie{adimej}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($bndisbie->getAdimej()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('bndisbie[adimej]', 'S', $val) ?>&nbsp;
  <?php echo "No ".radiobutton_tag('bndisbie[adimej]', 'N', !$val) ?>
    </div>
    <br>
</div>
</fieldset>
</th>
</tr>
</table>
<fieldset id="sf_fieldset_none" class="">
<legend><?echo __('Afecta La Vida Util Del Bien') ?></legend>
<div class="form-row">
  <?php echo label_for('bndisbie[viduti]', __($labels['bndisbie{viduti}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndisbie{viduti}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndisbie{viduti}')): ?>
    <?php echo form_error('bndisbie{viduti}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php
    $val1 = false;
    $val2 = false;
    $val3 = false;
  if(trim($bndisbie->getViduti())=='N')
  {
    $val1 = true;
    $val2 = false;
    $val3 = false;
  }
  elseif(trim($bndisbie->getViduti())=='S')
  {
    $val1 = false;
    $val2 = true;
    $val3 = false;
  }
  elseif(trim($bndisbie->getViduti())=='R')
  {
    $val1 = false;
    $val2 = false;
    $val3 = true;
  }?>
  <?php echo "No Afecta ".radiobutton_tag('bndisbie[viduti]', 'N', $val1) ?>&nbsp;
  <?php echo "Aumenta ".radiobutton_tag('bndisbie[viduti]', 'S', $val2) ?>&nbsp;
  <?php echo "Disminuye ".radiobutton_tag('bndisbie[viduti]', 'R', $val3) ?>
   </div>
   <br>
</div>
</fieldset>
</div>
</fieldset>

<?php include_partial('edit_actions', array('bndisbie' => $bndisbie)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bndisbie->getId()): ?>
<?php echo button_to(__('delete'), 'biedefdis/delete?id='.$bndisbie->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
