<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo 'Resumen de Ingreso Diario' ?></h1>

<div id="sf_admin_content">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<strong>Contable de Ingreso</strong>
&nbsp;&nbsp;&nbsp;
<?php echo input_tag('ingreso', '', 'size=20') ?>
&nbsp;
<?php echo button_to('...','#')?> 
</div>

<div class="form-row">
<strong>Fecha comprobante</strong>
&nbsp;&nbsp;&nbsp;
<?php echo input_date_tag('test', '', 'rich=true') ?>
</div>
</fielset>
</div>

<div id="sf_admin_content">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <table border="0" class="sf_admin_list">
        <thead> <tr>
            <th width="17"><?php echo image_tag('/images/magnifier.png');  ?></th>
            <th width="30">Código Contable</th>
            <th width="30">Código Presupuestario</th>
            <th width="100">Descripción</th>
            <th width="50">Total</th>
          </tr></thead>
          <tr>
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
          </tr>
		  <tr>
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
          </tr>
          <tr>
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
          </tr>
          <tr>
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
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>                         
  </table> 
</div>
<div class="form-row" align="right">
 <strong>Total                           0.00</strong>
</div>

<div class="form-row" align="center">
<?php echo submit_tag('Generar Comprobante') ?>
</div>
</fieldset>
</div>
</div>