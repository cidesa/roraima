<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<div id="sf_admin_container">

<h1><?php echo __('Calculo de Prestaciones Sociales', 
array()) ?></h1>

<fieldset id="sf_fieldset_none" class="">
<fieldset id="sf_fieldset_none" class="">
<legend>Datos del Trabajador</legend>
<div class="form-row">
 <?php echo label_for('','Trabajador','class="required" ') ?>
 <?php echo input_tag('codigo', '', 'size=20 maxlength=20') ?>
 <?php echo button_to('...','#')?>
&nbsp;
<strong>Nombre</strong>
</div>

<div class="form-row">
<strong>C.I</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>C. Colectivo</strong>
</div>

<div class="form-row">
<strong>Ingreso</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;() &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>F. Calculo</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Iniciar el Calculo Al Mes</strong>
<?php echo input_tag('calculo', '', 'size=10 maxlength=10') ?>
</div>

</fieldset>
<fieldset id="sf_fieldset_none" class="">
<legend>Datos del Calculo</legend>
<div class="form-row">
<?php echo label_for('','Fecha','class="required" ') ?>
 <?php echo input_tag('fecha', '', 'size=7 maxlength=7') ?>
</div>	
<div class="form-row">
<?php echo radiobutton_tag('radio1', 'V', true)        ."Año(365/366)".'&nbsp;&nbsp;';
	  echo radiobutton_tag('radio1', 'E', false)."   Año(360)";?>
</div>
<fieldset id="sf_fieldset_none" class="">
<legend>Tiempo de Servicio R. Anterior</legend>
<div class="form-row">
<br><strong>Dias</strong>
<br><strong>Meses</strong>
<br><strong>A&ntilde;os</strong>
&nbsp;
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Tiempo de Servicio R. Nuevo</legend>
<div class="form-row">
<br><strong>Dias</strong>
<br><strong>Meses</strong>
<br><strong>A&ntilde;os</strong>
&nbsp;
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Tiempo Neto Trabajado</legend>
<div class="form-row">
<br><strong>Dias</strong>
<br><strong>Meses</strong>
<br><strong>A&ntilde;os</strong>
&nbsp;
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Tasa de Interes</legend>
<div class="form-row">
<?php echo radiobutton_tag('radio', 'A', true)        ."Activa".'&nbsp;&nbsp;';
	  echo radiobutton_tag('radio', 'P', false)."   Pasiva";
	  echo radiobutton_tag('radio', 'Prom', false)."   Promedio";?>
&nbsp;
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Tipo de Intereses para C&aacute;lculo</legend>
<div class="form-row">
<?php echo radiobutton_tag('radio', 'A', true)        ."Simple".'&nbsp;&nbsp;';
	  echo radiobutton_tag('radio', 'P', false)."   Compuesto";
	  echo radiobutton_tag('radio', 'Prom', false)."   Matematica Financiera";?>
&nbsp;
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Tipo de Intereses para C&aacute;lculo</legend>
<div class="form-row">
<?php echo radiobutton_tag('radio', 'A', true)        ."Simple".'&nbsp;&nbsp;';
	  echo radiobutton_tag('radio', 'P', false)."   Compuesto";
	  echo radiobutton_tag('radio', 'Prom', false)."   Matematica Financiera";?>
&nbsp;
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Salario D&iacute;as Adicionales de Antiguedad</legend>
<div class="form-row">
<?php echo radiobutton_tag('radio2', 'A', true)        ."Promedio de A&ntilde;o".'&nbsp;&nbsp;';
	  echo radiobutton_tag('radio2', 'D', false)."   Ultimo Salario Devengado"; ?>
&nbsp;
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Capitalizacion de Interes</legend>
<div class="form-row">
<?php echo select_tag('capital',
  '<option selected="selected">Anual</option>
   <option>Mensual</option>
   <option>No Capitalizable</option>')?>
&nbsp;</div>
</fieldset>
<div class="form-row">
<?php echo button_to('Calcular','#')?>
</div>

<div class="form-row"><span lang=ES-VE>
<img src=" /images/vineta.gif"  >&nbsp; &nbsp;<a href="#NREG">Nuevo Regimen</a> 
<img src=" /images/vineta.gif" >&nbsp; &nbsp;<a href="#AREG"> <span lang=ES-VE>Regimen Anterior</span></a>
<img src=" /images/vineta.gif" >&nbsp; &nbsp;<a href="#RES"> <span lang=ES-VE>Resumen</span></a>
<img src=" /images/vineta.gif" >&nbsp; &nbsp;<a href="#INT"> <span lang=ES-VE>Intereses Sobre Capital</span></a>
<br><strong>Total Antiguedad Acumulada + Intereses 0.00</strong>
</div>

<fieldset id="sf_fieldset_none" class="">
<legend>Capitalizacion de Interes</legend>
<div class="form-row">
<?php echo select_tag('capital',
  '<option selected="selected">Anual</option>
   <option>Mensual</option>
   <option>No Capitalizable</option>')?>
&nbsp;
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Resumen</legend>
<div class="form-row">
<div align="center"><strong>Resumen de Calculo al 18-06-1997 </strong></div>
<br><strong>Anticipos Prestaciones</strong>
<br><strong>Antiguedad menos(-) Anticipos</strong>
<br><strong>Interes sobre Prestaciones</strong>
<br><strong>Bono de Transferencia</strong>
<br><strong>Articulo 146</strong>
<br>
<br><strong>Total Pasivo Regimen Anterior</strong>
&nbsp;
</div>
</fieldset>

</fieldset>
</fieldset>