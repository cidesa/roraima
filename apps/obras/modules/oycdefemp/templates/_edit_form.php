<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/09 14:37:02
?>
<?php echo form_tag('oycdefemp/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocdefemp, 'getId') ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<fieldset><legend><?php echo __('Datos de la Institución')?></legend>
<div class="form-row">
 <table>
  <tr>
  <th>
  <?php echo label_for('ocdefemp[codemp]', __($labels['ocdefemp{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codemp}')): ?>
    <?php echo form_error('ocdefemp{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodemp', array (
  'size' => 20,
  'maxlength' => 3,
  'readonly'  =>  $ocdefemp->getId()!='' ? true : false ,
  'control_name' => 'ocdefemp[codemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
   <th>
  <?php echo label_for('ocdefemp[nomemp]', __($labels['ocdefemp{nomemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{nomemp}')): ?>
    <?php echo form_error('ocdefemp{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getNomemp', array (
  'size' => 60,
  'control_name' => 'ocdefemp[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>
  <?php echo label_for('ocdefemp[diremp]', __($labels['ocdefemp{diremp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{diremp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{diremp}')): ?>
    <?php echo form_error('ocdefemp{diremp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getDiremp', array (
  'size' => 100,
  'control_name' => 'ocdefemp[diremp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<table>
 <tr>
 <th>
  <?php echo label_for('ocdefemp[telemp]', __($labels['ocdefemp{telemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{telemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{telemp}')): ?>
    <?php echo form_error('ocdefemp{telemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getTelemp', array (
  'size' => 20,
  'control_name' => 'ocdefemp[telemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
</th>
<th>
  <?php echo label_for('ocdefemp[faxemp]', __($labels['ocdefemp{faxemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{faxemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{faxemp}')): ?>
    <?php echo form_error('ocdefemp{faxemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getFaxemp', array (
  'size' => 20,
  'control_name' => 'ocdefemp[faxemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>

</th>
<th>
  <?php echo label_for('ocdefemp[emaemp]', __($labels['ocdefemp{emaemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{emaemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{emaemp}')): ?>
    <?php echo form_error('ocdefemp{emaemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getEmaemp', array (
  'size' => 40,
  'control_name' => 'ocdefemp[emaemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Códigos de Actas');?>
<fieldset>
<div class="form-row">
<table>
<tr>
<th>
  <?php echo label_for('ocdefemp[codactini]', __($labels['ocdefemp{codactini}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codactini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codactini}')): ?>
    <?php echo form_error('ocdefemp{codactini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodactini', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codactini]',
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipact_Oycdefemp/clase/Octipact/frame/sf_admin_edit_form/obj1/ocdefemp_codactini/campo1/codtipact','','','botoncat')?>
    </div>
<br>
  <?php echo label_for('ocdefemp[codactpar]', __($labels['ocdefemp{codactpar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codactpar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codactpar}')): ?>
    <?php echo form_error('ocdefemp{codactpar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodactpar', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codactpar]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipact_Oycdefemp/clase/Octipact/frame/sf_admin_edit_form/obj1/ocdefemp_codactpar/campo1/codtipact','','','botoncat')?>
    </div>
<br>
  <?php echo label_for('ocdefemp[codactrei]', __($labels['ocdefemp{codactrei}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codactrei}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codactrei}')): ?>
    <?php echo form_error('ocdefemp{codactrei}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodactrei', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codactrei]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipact_Oycdefemp/clase/Octipact/frame/sf_admin_edit_form/obj1/ocdefemp_codactrei/campo1/codtipact','','','botoncat')?>
    </div>
<br>
  <?php echo label_for('ocdefemp[codactter]', __($labels['ocdefemp{codactter}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codactter}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codactter}')): ?>
    <?php echo form_error('ocdefemp{codactter}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodactter', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codactter]',
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipact_Oycdefemp/clase/Octipact/frame/sf_admin_edit_form/obj1/ocdefemp_codactter/campo1/codtipact','','','botoncat')?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocdefemp[codactproini]', __($labels['ocdefemp{codactproini}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codactproini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codactproini}')): ?>
    <?php echo form_error('ocdefemp{codactproini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodactproini', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codactproini]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipact_Oycdefemp/clase/Octipact/frame/sf_admin_edit_form/obj1/ocdefemp_codactproini/campo1/codtipact','','','botoncat')?>
    </div>
<br>
  <?php echo label_for('ocdefemp[codactproter]', __($labels['ocdefemp{codactproter}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codactproter}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codactproter}')): ?>
    <?php echo form_error('ocdefemp{codactproter}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodactproter', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codactproter]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipact_Oycdefemp/clase/Octipact/frame/sf_admin_edit_form/obj1/ocdefemp_codactproter/campo1/codtipact','','','botoncat')?>
    </div>
<br>
  <?php echo label_for('ocdefemp[codactrecdef]', __($labels['ocdefemp{codactrecdef}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codactrecdef}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codactrecdef}')): ?>
    <?php echo form_error('ocdefemp{codactrecdef}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodactrecdef', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codactrecdef]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipact_Oycdefemp/clase/Octipact/frame/sf_admin_edit_form/obj1/ocdefemp_codactrecdef/campo1/codtipact','','','botoncat')?>
    </div>
<br>
  <?php echo label_for('ocdefemp[codactrecpro]', __($labels['ocdefemp{codactrecpro}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codactrecpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codactrecpro}')): ?>
    <?php echo form_error('ocdefemp{codactrecpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodactrecpro', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codactrecpro]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipact_Oycdefemp/clase/Octipact/frame/sf_admin_edit_form/obj1/ocdefemp_codactrecpro/campo1/codtipact','','','botoncat')?>
    </div>
  </th>
 </tr>
</table>
<br>
<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo __('Nota: En este submódulo asignamos los correspondientes códigos para que el sistema identifique los tipos')?></font></strong></th>
  </tr>
</table>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Otras Asignaciones Códigos');?>
<fieldset>
<div class="form-row">
<fieldset><legend><?php echo __('Tipos de Contratos')?></legend>
<div class="form-row">
<table>
<tr>
<th>
  <?php echo label_for('ocdefemp[codconobr]', __($labels['ocdefemp{codconobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codconobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codconobr}')): ?>
    <?php echo form_error('ocdefemp{codconobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodconobr', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codconobr]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipcon_Oycdefemp/clase/Octipcon/frame/sf_admin_edit_form/obj1/ocdefemp_codconobr/campo1/codtipcon','','','botoncat')?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocdefemp[codconins]', __($labels['ocdefemp{codconins}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codconins}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codconins}')): ?>
    <?php echo form_error('ocdefemp{codconins}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodconins', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codconins]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipcon_Oycdefemp/clase/Octipcon/frame/sf_admin_edit_form/obj1/ocdefemp_codconins/campo1/codtipcon','','','botoncat')?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocdefemp[codconsup]', __($labels['ocdefemp{codconsup}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codconsup}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codconsup}')): ?>
    <?php echo form_error('ocdefemp{codconsup}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodconsup', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codconsup]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipcon_Oycdefemp/clase/Octipcon/frame/sf_admin_edit_form/obj1/ocdefemp_codconsup/campo1/codtipcon','','','botoncat')?>
    </div>
</th>
</tr>
</table>
<br>
  <?php echo label_for('ocdefemp[codconpro]', __($labels['ocdefemp{codconpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codconpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codconpro}')): ?>
    <?php echo form_error('ocdefemp{codconpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodconpro', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codconpro]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipcon_Oycdefemp/clase/Octipcon/frame/sf_admin_edit_form/obj1/ocdefemp_codconpro/campo1/codtipcon','','','botoncat')?>
    </div>
</div>
</fieldset>

<br>

<fieldset><legend><?php echo __('Tipos de Valuación')?></legend>
<div class="form-row">
<table>
<tr>
<th>
  <?php echo label_for('ocdefemp[codvalant]', __($labels['ocdefemp{codvalant}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codvalant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codvalant}')): ?>
    <?php echo form_error('ocdefemp{codvalant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodvalant', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codvalant]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipval_Oycdefemp/clase/Octipval/frame/sf_admin_edit_form/obj1/ocdefemp_codvalant/campo1/codtipval','','','botoncat')?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocdefemp[codvalpar]', __($labels['ocdefemp{codvalpar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codvalpar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codvalpar}')): ?>
    <?php echo form_error('ocdefemp{codvalpar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodvalpar', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codvalpar]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipval_Oycdefemp/clase/Octipval/frame/sf_admin_edit_form/obj1/ocdefemp_codvalpar/campo1/codtipval','','','botoncat')?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocdefemp[codvalfin]', __($labels['ocdefemp{codvalfin}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codvalfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codvalfin}')): ?>
    <?php echo form_error('ocdefemp{codvalfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodvalfin', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codvalfin]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipval_Oycdefemp/clase/Octipval/frame/sf_admin_edit_form/obj1/ocdefemp_codvalfin/campo1/codtipval','','','botoncat')?>
    </div>
</th>
</tr>
</table>
<br>
<table>
<tr>
<th>
  <?php echo label_for('ocdefemp[codvalret]', __($labels['ocdefemp{codvalret}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codvalret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codvalret}')): ?>
    <?php echo form_error('ocdefemp{codvalret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodvalret', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codvalret]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipval_Oycdefemp/clase/Octipval/frame/sf_admin_edit_form/obj1/ocdefemp_codvalret/campo1/codtipval','','','botoncat')?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocdefemp[codvalrec]', __($labels['ocdefemp{codvalrec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codvalrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codvalrec}')): ?>
    <?php echo form_error('ocdefemp{codvalrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodvalrec', array (
  'size' => 20,
  'control_name' => 'ocdefemp[codvalrec]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipval_Oycdefemp/clase/Octipval/frame/sf_admin_edit_form/obj1/ocdefemp_codvalrec/campo1/codtipval','','','botoncat')?>
    </div>
</th>
</tr>
</table>
</div>
</fieldset>
<br>
<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo __('Nota: En este submódulo asignamos los correspondientes códigos para que el sistema identifique los tipos')?></font></strong></th>
  </tr>
</table>
</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage3", 'Porcentajes y Otros Datos');?>
<fieldset>
<div class="form-row">
<table>
<tr>
<th>
<fieldset>
<legend><?php echo __('Porcentajes')?></legend>
<div class="form-row">
  <?php echo label_for('ocdefemp[porant]', __($labels['ocdefemp{porant}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{porant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{porant}')): ?>
    <?php echo form_error('ocdefemp{porant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, array('getPorant',true), array (
  'size' => 7,
  'control_name' => 'ocdefemp[porant]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;'.'%'?>
    </div>
<br>
  <?php echo label_for('ocdefemp[poraumobr]', __($labels['ocdefemp{poraumobr}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{poraumobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{poraumobr}')): ?>
    <?php echo form_error('ocdefemp{poraumobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, array('getPoraumobr',true), array (
  'size' => 7,
  'control_name' => 'ocdefemp[poraumobr]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;'.'%'?>
    </div>
<br>
  <?php echo label_for('ocdefemp[pormul]', __($labels['ocdefemp{pormul}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{pormul}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{pormul}')): ?>
    <?php echo form_error('ocdefemp{pormul}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, array('getPormul',true), array (
  'size' => 7,
  'control_name' => 'ocdefemp[pormul]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;'.'(Alícuotas X/1000)'?>
    </div>
</div>
</fieldset>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<fieldset>
<legend><?php echo __('Otros Datos')?></legend>
<div class="form-row">
  <?php echo label_for('ocdefemp[unitri]', __($labels['ocdefemp{unitri}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{unitri}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{unitri}')): ?>
    <?php echo form_error('ocdefemp{unitri}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, array('getUnitri',true), array (
  'size' => 7,
  'control_name' => 'ocdefemp[unitri]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;'.'Bs'?>
    </div>
<br>
  <?php echo label_for('ocdefemp[plaini]', __($labels['ocdefemp{plaini}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{plaini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{plaini}')): ?>
    <?php echo form_error('ocdefemp{plaini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getPlaini', array (
  'size' => 7,
  'control_name' => 'ocdefemp[plaini]',
)); echo $value ? $value : '&nbsp;'?>
<?php echo '&nbsp;&nbsp;'.'días'?>
    </div>
<br>
  <?php echo label_for('ocdefemp[codingres]', __($labels['ocdefemp{codingres}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codingres}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codingres}')): ?>
    <?php echo form_error('ocdefemp{codingres}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodingres', array (
  'size' => 20,
  'maxlength' => 4,
  'control_name' => 'ocdefemp[codingres]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/octipcar_oycdefper/clase/Octipcar/frame/sf_admin_edit_form/obj1/ocdefemp_codingres/campo1/codtipcar','','','botoncat')?>
    </div>
</div>
</fieldset>
</th>
</tr>
</table>
<br>
<fieldset>
<legend><?php echo __('Partida de Reconsideración de Precios')?></legend>
<div class="form-row">
  <?php echo label_for('ocdefemp[codparrec]', __($labels['ocdefemp{codparrec}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{codparrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{codparrec}')): ?>
    <?php echo form_error('ocdefemp{codparrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefemp, 'getCodparrec', array (
  'size' => 32,
  'control_name' => 'ocdefemp[codparrec]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ocdefpar_Oycdefemp/clase/Ocdefpar/frame/sf_admin_edit_form/obj1/ocdefemp_codparrec/campo1/codpar','','','botoncat')?>
    </div>
</div>
</fieldset>
<br>
<fieldset>
<div class="form-row">
<table>
<tr>
<th>
  <?php echo label_for('ocdefemp[ivaant]', __($labels['ocdefemp{ivaant}']), 'class="required" Style="width:250px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{ivaant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{ivaant}')): ?>
    <?php echo form_error('ocdefemp{ivaant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($ocdefemp, 'getIvaant', array (
  'control_name' => 'ocdefemp[ivaant]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocdefemp[retant]', __($labels['ocdefemp{retant}']), 'class="required" Style="width:300px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefemp{retant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefemp{retant}')): ?>
    <?php echo form_error('ocdefemp{retant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($ocdefemp, 'getRetant', array (
  'control_name' => 'ocdefemp[retant]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
</div>
</fieldset>
</div>
</fieldset>

<?php tabInit('tp1','0');?>

<?php include_partial('edit_actions', array('ocdefemp' => $ocdefemp)) ?>

</form>