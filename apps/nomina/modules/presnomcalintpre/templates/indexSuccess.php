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

<table width="98%" cellpadding="0" cellspacing="0" border="1">
  <tr> 
    <td width="48%"><fieldset id="sf_fieldset_none" class="">
<legend>Datos del Calculo</legend>
<div class="form-row">
<?php echo label_for('','Fecha','class="required" ') ?>
 <?php echo input_tag('fecha', '', 'size=7 maxlength=7') ?>
</div>	
<div class="form-row">
<?php echo radiobutton_tag('radio1', 'V', true)        ."Año(365/366)".'&nbsp;&nbsp;';
	  echo radiobutton_tag('radio1', 'E', false)."   Año(360)";?>
</div>
</fieldset></td>
<a name="Back"></a>
    <td colspan="2" rowspan="4" align="left" valign="top"><div class="form-row" >
    <div align="center"><span lang=ES-VE>
<img src=" /images/vineta.gif"  >&nbsp; &nbsp;<a href="#NREG">Nuevo Regimen</a> 
<img src=" /images/vineta.gif" >&nbsp; &nbsp;<a href="#AREG"> <span lang=ES-VE>Regimen Anterior</span></a>
<img src=" /images/vineta.gif" >&nbsp; &nbsp;<a href="#RES"> <span lang=ES-VE>Resumen</span></a>
<img src=" /images/vineta.gif" >&nbsp; &nbsp;<a href="#INT"> <span lang=ES-VE>Intereses Sobre Capital</span></a>
<br><strong>Total Antiguedad Acumulada + Intereses </strong></div>
</div></td>
  </tr>
  <tr> 
    <td><fieldset id="sf_fieldset_none" class="">
<legend>Tiempo de Servicio R. Anterior</legend>
<div class="form-row">
<br><strong>Dias</strong>
<br><strong>Meses</strong>
<br><strong>A&ntilde;os</strong>
&nbsp;
</div>
</fieldset></td>
  </tr>
  <tr> 
    <td><fieldset id="sf_fieldset_none" class="">
<legend>Tiempo de Servicio R. Nuevo</legend>
<div class="form-row">
<br><strong>Dias</strong>
<br><strong>Meses</strong>
<br><strong>A&ntilde;os</strong>
&nbsp;
</div>
</fieldset></td>
  </tr>
  <tr> 
    <td><fieldset id="sf_fieldset_none" class="">
<legend>Tiempo Neto Trabajado</legend>
<div class="form-row">
<br><strong>Dias</strong>
<br><strong>Meses</strong>
<br><strong>A&ntilde;os</strong>
&nbsp;
</div>
</fieldset></td>
  </tr>
  <tr> 
    <td><fieldset id="sf_fieldset_none" class="">
<legend>Tasa de Interes</legend>
<div class="form-row">
<?php echo radiobutton_tag('radio', 'A', true)        ."Activa".'&nbsp;&nbsp;';
	  echo radiobutton_tag('radio', 'P', false)."   Pasiva";
	  echo radiobutton_tag('radio', 'Prom', false)."   Promedio";?>
&nbsp;
</div></fieldset></td>
    <td width="32%"><fieldset id="sf_fieldset_none" class="">
<legend>Tipo de Intereses para C&aacute;lculo</legend>
<div class="form-row">
<?php echo radiobutton_tag('radio', 'A', true)        ."Simple".'&nbsp;&nbsp;';
	  echo radiobutton_tag('radio', 'P', false)."   Compuesto";
	  echo radiobutton_tag('radio', 'Prom', false)."   Matematica Financiera";?>
&nbsp;
</div>
</fieldset></td>
    <td width="20%" rowspan="2"><fieldset id="sf_fieldset_none" class="">
<legend>Capitalizacion de Interes</legend>
<div class="form-row">
<?php echo select_tag('capital',
  '<option selected="selected">Anual</option>
   <option>Mensual</option>
   <option>No Capitalizable</option>')?>
&nbsp;</div>
</fieldset></td>
  </tr>
  <tr> 
    <td>
<div class="form-row">
<?php echo button_to('Calcular','#')?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo button_to('Guardar','#')?>
</div>
</td>
    <td><fieldset id="sf_fieldset_none" class="">
<legend>Salario D&iacute;as Adicionales de Antiguedad</legend>
<div class="form-row">
<?php echo radiobutton_tag('radio2', 'A', true)        ."Promedio de A&ntilde;o".'&nbsp;&nbsp;';
	  echo radiobutton_tag('radio2', 'D', false)."   Ultimo Salario Devengado"; ?>
&nbsp;
</div>
</fieldset></td>
  </tr>
</table>
</fieldset>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a name="RES"></a>
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
<div align="right"><img src=" /images/vineta.gif" >&nbsp; &nbsp;<a href="#Back"> <span lang=ES-VE>Regresar</span></a></div>
</fieldset>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div>
<a name="NREG"></a>
<fieldset>
<legend>Nuevo Regimen</legend>
<div id="grid02" class="grid01">
<table border="0" class="sf_admin_list">
<? 
$titulo=array(0 => '', 1 => 'Del', 2 => 'Al', 3 => 'Devengado', 4 => 'Salario Diario', 5 => 'Alicuota de Utilidades', 6 => 'Alicuota Bono Vac.', 7 => 'Total Diario', 8 => 'Dias Art. 108', 9 => 'Salario Dia Adicional', 10 => 'Capital', 11 => 'Antiguedad Acumulada', 12 => 'Valor Art. 108', 13 => 'Tasa', 14 => 'Dias Difer', 15 => 'Interes Devengado', 16 => 'Interes Acumulado', 17 => 'Adelanto Anti', 18 => 'Adelanto Inter');

  	?>
  	 <thead><tr>
  	<?
	$i=0;
	while ($i<=18)
	{
	?>	  
	  <th><?php if ($i==0) echo image_tag('/images/magnifier.png'); else echo $titulo[$i] ?></th>
    <?
	 $i=$i+1;	
	}//end while
?>
   	</tr> </thead>   	  
	<tr>
	<? $i=0;
	  while ($i<=18)
	  {
	  ?>
	    <td><?php if ($i==0) echo' '; else echo input_tag($i,'','style=border:none') ?></td>
	<? $i=$i+1;
	  } //end while?>
	</tr>	
<?		
?></table>
</div>
<div align="right"><img src=" /images/vineta.gif" >&nbsp; &nbsp;<a href="#Back"> <span lang=ES-VE>Regresar</span></a></div>
</fieldset>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div>
<a name="AREG"></a>
<fieldset>
<legend>Regimen Anterior</legend>
<div id="grid02" class="grid01">
<table border="0" class="sf_admin_list">
<? 
$titulo=array(0 => '', 1 => 'Del', 2 => 'Al', 3 => 'Salario', 4 => 'Tasa', 5 => 'Deposito', 6 => 'Interes Devengado', 7 => 'Antiguedad Acumulada', 8 => 'A&ntilde;os de Servicios', 9 => 'Anticipo', 10 => 'Interes Acumulado', 11 => 'Dias Difer');

  	?>
  	 <thead><tr>
  	<?
	$i=0;
	while ($i<=11)
	{
	?>	  
	  <th><?php if ($i==0) echo image_tag('/images/magnifier.png'); else echo $titulo[$i] ?></th>
    <?
	 $i=$i+1;	
	}//end while
?>
   	</tr> </thead>   	  
	<tr>
	<? $i=0;
	  while ($i<=11)
	  {
	  ?>
	    <td><?php if ($i==0) echo' '; else echo input_tag($i,'','style=border:none') ?></td>
	<? $i=$i+1;
	  } //end while?>
	</tr>	
<?		
?></table>
</div>
<div align="right"><img src=" /images/vineta.gif" >&nbsp; &nbsp;<a href="#Back"> <span lang=ES-VE>Regresar</span></a></div>
</fieldset>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div>
<a name="INT"></a>
<fieldset>
<legend>Interes sobre Capital</legend>
<div id="grid02" class="grid01">
<table border="0" class="sf_admin_list">
<? 
$titulo=array(0 => '', 1 => 'Del', 2 => 'Al', 3 => 'Tasa', 4 => 'Dias Difer', 5 => 'Capital Regimen Anterior', 6 => 'Capital Capitalizado', 7 => 'Interes Regimen Anterior', 8 => 'Interes Acumulado', 9 => 'Adelanto Prestaciones');

  	?>
  	 <thead><tr>
  	<?
	$i=0;
	while ($i<=9)
	{
	?>	  
	  <th><?php if ($i==0) echo image_tag('/images/magnifier.png'); else echo $titulo[$i] ?></th>
    <?
	 $i=$i+1;	
	}//end while
?>
   	</tr> </thead>   	  
	<tr>
	<? $i=0;
	  while ($i<=9)
	  {
	  ?>
	    <td><?php if ($i==0) echo' '; else echo input_tag($i,'','style=border:none') ?></td>
	<? $i=$i+1;
	  } //end while?>
	</tr>	
<?		
?></table>
</div>
<div align="right"><img src=" /images/vineta.gif" >&nbsp; &nbsp;<a href="#Back"> <span lang=ES-VE>Regresar</span></a></div>
</fieldset>
</div>

</fieldset>
</fieldset>