<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo 'Estado de Cuenta Integral' ?></h1>

<div id="sf_admin_content">
<fieldset id="sf_fieldset_none" class="">
<legend>Fecha de consulta</legend>
<div class="form-row" align="center">
<?php echo input_date_tag('test', '', 'rich=true') ?>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Contribuyente</legend>
<div class="form-row">
<strong>C.I./RIF.</strong>
&nbsp;&nbsp;&nbsp;
<?php echo input_tag('ci', '', 'size=20') ?>
&nbsp;
<?php echo button_to_function('...','#')?> 
&nbsp;&nbsp;&nbsp;
<strong>Nombre</strong>
&nbsp;&nbsp;&nbsp;
<?php echo input_tag('nombre', '', 'size=20') ?>
</div>

<div class="form-row">
<strong>Dirección</strong>
&nbsp;&nbsp;&nbsp;
<?php echo input_tag('ci', '', 'size=80') ?>
</div>

<table border="0" class="sf_admin_list">
  <thead> <tr>
    <td width="50"><fieldset id="sf_fieldset_none" class="">
<legend>Nacionalidad</legend>
<?php echo radiobutton_tag('Nacionalidad[]', 'S', true) ."Venezolano(a)"?>
<?php echo radiobutton_tag('Nacionalidad[]', 'N', false)       .          "Extranjero(a)"?></td>
</fieldset>
    <td width="50"><fieldset id="sf_fieldset_none" class="">
<legend>Tipo</legend>
<?php echo radiobutton_tag('Tipo[]', 'S', true) ."Natural"?>
<?php echo radiobutton_tag('Tipo[]', 'N', false)        .           "Jurídica"?>
</fieldset></td>
  </tr></thead>
</table>
</fieldset>
</div>

<div id="sf_admin_content">
<fieldset id="sf_fieldset_none" class="">
<div class="grid01" id="grid01">
  <table border="0" class="sf_admin_list">
        <thead> <tr>
            <th width="17"><?php echo image_tag('/images/magnifier.png');  ?></th>
            <th width="30">Pagar</th>
            <th width="30">Nro.</th>
            <th width="100">Concepto</th>
            <th width="50">Nro. Declaración</th>
            <th width="50">Referencia</th>
            <th width="50">Nombre</th>
            <th width="50">Vencimiento</th>
            <th width="50">Frecuencia</th>
            <th width="80">Monto de la Deuda (A)</th>
            <th width="85">Descuento Pronto Pago (D)</th>
            <th width="80">Monto a Pagar (A+C-D)</th>
            <th width="90">Monto Pagado a Contribuyente (E)</th>
            <th width="75">Saldo (A+C-D)+B-E</th>
            <th width="80">Planilla de Liquidación</th>                        
          </tr></thead>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>		                         
  </table> 
</div>
</fieldset>
<div class="form-row" >
 <strong>Total de la Deuda</strong>
 &nbsp;&nbsp;&nbsp;
<?php echo input_tag('total', '', 'size=20 disabled=true') ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Total Descontado</strong>
 &nbsp;&nbsp;&nbsp;
<?php echo input_tag('totald', '', 'size=20 disabled=true') ?>
</div>

<div class="form-row" align="center">
<strong>Total Pagado del Contribuyente</strong>
 &nbsp;&nbsp;&nbsp;
<?php echo input_tag('totalc', '', 'size=20 disabled=true') ?>
</div>

</div>
</div>