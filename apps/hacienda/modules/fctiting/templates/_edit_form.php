<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/08 10:27:41
?>
<?php echo form_tag('fctiting/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fcpreing, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend>&nbsp;Datos de la Partida</legend>
<div class="form-row">
  <?php echo label_for('fcpreing[codpar]', __($labels['fcpreing{codpar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcpreing{codpar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcpreing{codpar}')): ?>
    <?php echo form_error('fcpreing{codpar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcpreing, 'getCodpar', array (
  'size' => 20,
  'control_name' => 'fcpreing[codpar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fcpreing[nompar]', __($labels['fcpreing{nompar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcpreing{nompar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcpreing{nompar}')): ?>
    <?php echo form_error('fcpreing{nompar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcpreing, 'getNompar', array (
  'size' => 80,
  'control_name' => 'fcpreing[nompar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
    <fieldset id="sf_fieldset_none" class="">
    <legend> <? echo $labels['fcpreing{estima}']; ?></legend>
    <div class="form-row" align="center">
<?  if ($fcpreing->getEstima()=='S') 
   		$valor=true;
   else 
    	$valor=false; 
	
    echo radiobutton_tag('fcpreing[estima]','S', $valor) .'  '. "Si".'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo radiobutton_tag('fcpreing[estima]','N', !$valor) .'  '. "No";?>
	</div>
</fieldset> 
<br>
 <strong>Visible en Reporte</strong>&nbsp;&nbsp;&nbsp;&nbsp;
   <?php
	if ($fcpreing->getAcum()=='S') 
   		$valorC=true;
   else 
    	$valorC=false; 
    echo checkbox_tag('fcpreing[acum]','S', $valorC) ?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('fcpreing' => $fcpreing)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fcpreing->getId()): ?>
<?php echo button_to(__('delete'), 'fctiting/delete?id='.$fcpreing->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
