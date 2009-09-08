<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/16 17:54:03
?>
<?php echo form_tag('facrecpag/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fcpagos, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
<table>
<tr>
<th> <?php echo label_for('fcpagos[numpag]', __($labels['fcpagos{numpag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{numpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcpagos{numpag}')): ?>
    <?php echo form_error('fcpagos{numpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcpagos, 'getNumpag', array (
  'size' => 20,
  'control_name' => 'fcpagos[numpag]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>    
<th><?php echo label_for('fcpagos[fecpag]', __($labels['fcpagos{fecpag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{fecpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcpagos{fecpag}')): ?>
    <?php echo form_error('fcpagos{fecpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fcpagos, 'getFecpag', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcpagos[fecpag]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
</tr>
</table>
<br>
  <?php echo label_for('fcpagos[despag]', __($labels['fcpagos{despag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{despag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcpagos{despag}')): ?>
    <?php echo form_error('fcpagos{despag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcpagos, 'getDespag', array (
  'size' => 80,
  'control_name' => 'fcpagos[despag]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fcpagos[monpag]', __($labels['fcpagos{monpag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{monpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcpagos{monpag}')): ?>
    <?php echo form_error('fcpagos{monpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcpagos, 'getMonpag', array (
  'size' => 7,
  'control_name' => 'fcpagos[monpag]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fcpagos[rifcon]', __($labels['fcpagos{rifcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{rifcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcpagos{rifcon}')): ?>
    <?php echo form_error('fcpagos{rifcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcpagos, 'getRifcon', array (
  'size' => 20,
  'control_name' => 'fcpagos[rifcon]',
)); echo $value ? $value : '&nbsp;' ?>
 &nbsp;&nbsp;
<?php echo button_to('...','#')?>
&nbsp;&nbsp;
<strong>Nombre</strong>
<?php $value = object_input_tag($fcpagos, 'getNomcon', array (
  'size' => 60,
  'control_name' => 'fcpagos[nomcon]',
  'disabled' => true,
)); echo $value ? $value : '&nbsp;' ?>   
</div>
<br>
  <?php echo label_for('fcpagos[dircon]', __($labels['fcpagos{dircon}']),  'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{dircon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcpagos{dircon}')): ?>
    <?php echo form_error('fcpagos{dircon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcpagos, 'getDircon', array (
  'disabled' => true,
   'size' => 80,
  'control_name' => 'fcpagos[dircon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<table border="0" cellspacing="0"  class="sf_admin_list">
    <td width="50"><fieldset id="sf_fieldset_none" class="">
<legend>Nacionalidad</legend>
<div class="form-row">
<?
if ($fcpagos->getNaccon()=='V')	{
  ?><?php echo radiobutton_tag('fcpagos[naccon]', 'V', true, 'disabled=true')        ."Venezolano(a)".'&nbsp;&nbsp;';
		  echo radiobutton_tag('fcpagos[naccon]', 'E', false, 'disabled=true')."   Extranjero(a)";?>
		<?

}else{
	echo radiobutton_tag('fcpagos[naccon]', 'V', false, 'disabled=true')        ."Venezolano(a)".'&nbsp;&nbsp;';
	echo radiobutton_tag('fcpagos[naccon]', 'E', true, 'disabled=true')."   Extranjero(a)";

} ?> </div></td>
</fieldset>
    <td width="50">
    <fieldset id="sf_fieldset_none" class="">
<legend>Tipo</legend>
<div class="form-row">
<?
if ($fcpagos->getTipcon()=='N')	{
  ?><?php echo radiobutton_tag('fcpagos[tipcon]', 'N', true, 'disabled=true')        ."Natural".'&nbsp;&nbsp;';
		  echo radiobutton_tag('fcpagos[tipcon]', 'J', false, 'disabled=true')."   Jurídica";?>
		<?

}else{
	echo radiobutton_tag('fcpagos[tipcon]', 'N', false, 'disabled=true')        ."Natural".'&nbsp;&nbsp;';
	echo radiobutton_tag('fcpagos[tipcon]', 'J', true, 'disabled=true')."   Jurídica";

} ?></div> </td>
</fieldset>
</table>   
</div>
	
</fieldset>
<br>

<?php tabMainJS("tp2","tabPane2", "tabPage1", 'Detalles');?>
<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
</form>

<?php tabPageOpenClose("tp2", "tabPage2", 'Recargos/Descuentos');?>
<div class="form-row" >
<table>
<tr>
<th>
<?php echo label_for('Pagado', __('Pagado Contribuyente'), 'class="required" ') ?> 
<?php echo input_tag('pagcon', '', 'size=10 disabled=true') ?>
</th>
<th><strong>&nbsp;&nbsp;&nbsp;<?php echo '+' ?>&nbsp;&nbsp;&nbsp;</strong></th>
<th>
<?php echo label_for('Recargo', __('Recargo'), 'class="required" ') ?>
<?php echo input_tag('recargo', '', 'size=10 disabled=true') ?>
</th>
<th><strong>&nbsp;&nbsp;&nbsp;<?php echo '-' ?>&nbsp;&nbsp;&nbsp;</strong</th>
<th>
<?php echo label_for('Descuento', __('Descuento'), 'class="required" ') ?>
<?php echo input_tag('descuento', '', 'size=10 disabled=true') ?>
</th>
<th><strong>&nbsp;&nbsp;&nbsp;<?php echo '=' ?>&nbsp;&nbsp;&nbsp;</strong</th>
<th>
<?php echo label_for('TotalPagar', __('Total a Pagar'), 'class="required" ') ?>
<?php echo input_tag('Totalpag', '', 'size=10 disabled=true') ?>
</th>
</tr>
</table>
</div>

<form name="form3" id="form3">
<?
echo grid_tag($obj3);
?>
</form>

<?php tabPageOpenClose("tp2", "tabPage3", 'Forma de Pagos');?>
<div class="form-row" >
<table>
<tr>
<th>
<?php echo label_for('Total a Pagar', __('Total a Pagar'), 'class="required" ') ?> 
<?php echo input_tag('totalpag', '', 'size=20 disabled=true') ?>
</th>
<th><?php echo label_for('-', __('-'), 'class="required" ') ?></th>
<th>
<?php echo label_for('Total Monto', __('Total Monto'), 'class="required" ') ?>
<?php echo input_tag('totalmon', '', 'size=20 disabled=true') ?>
</th>
<th><?php echo label_for('=', __('='), 'class="required" ') ?></th>
<th>
<?php echo label_for('Saldo', __('Saldo'), 'class="required" ') ?>
<?php echo input_tag('saldo', '', 'size=20 disabled=true') ?>
</th>
</tr>
</table>
</div>

<form name="form2" id="form2">
<?
echo grid_tag($obj2);
?>
</form>


<?php tabPageOpenClose("tp2", "tabPage4", 'Recepción');?>
<div class="form-row">
  <?php echo label_for('fcpagos[funpag]', __($labels['fcpagos{funpag}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{funpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcpagos{funpag}')): ?>
    <?php echo form_error('fcpagos{funpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcpagos, 'getfunpag', array (
  'size' => 80,
  'control_name' => 'fcpagos[funpag]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fcpagos[fecpag]', __($labels['fcpagos{fecpag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{fecpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcpagos{fecpag}')): ?>
    <?php echo form_error('fcpagos{fecpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fcpagos, 'getfecpag', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcpagos[fecpag]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<?php tabInit("tp2");?>

<?php include_partial('edit_actions', array('fcpagos' => $fcpagos)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fcpagos->getId()): ?>
<?php echo button_to(__('delete'), 'facrecpag/delete?id='.$fcpagos->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
