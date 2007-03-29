<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<div id="sf_admin_container">

<h1><?php echo __('Calculo de Nominas Especiales', array()) ?></h1>


<fieldset id="sf_fieldset_none" class="">


<fieldset id="sf_fieldset_none" class="">
<legend>Tipo de Nomina Especial</legend>
<div class="form-row">
<strong>C&oacute;digo del Tipo de N&oacute;mina</strong>
<?php echo input_tag('codigo', '', 'size=7 maxlength=3') ?>
&nbsp;
<?php echo button_to('...','#')?>
</div>

<div class="form-row">
<strong>C&oacute;digo del Tipo de N&oacute;mina</strong>
<?php echo input_tag('codigo', '', 'size=7 maxlength=3') ?>
&nbsp;&nbsp;
<?php echo button_to('...','#')?>
</div>

<div class="form-row">
<strong>Este Mes Tiene</strong>
<?php echo input_tag('codigo', '', 'size=15 maxlength=10') ?>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Fechas de Procesamiento</legend>
<div align=center>
<div class="form-row">
<strong>Desde</strong>
<?php echo input_tag('codigo', '', 'size=15 maxlength=10') ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Desde</strong>
<?php echo input_tag('codigo', '', 'size=15 maxlength=10') ?>
</div></div>
</fieldset>

<div class="form-row">
 <div align=right><?php echo submit_tag('Calcular', 'message="El Calculo de Nomina Fue Realizado"') ?></div>
</div>

</fieldset>