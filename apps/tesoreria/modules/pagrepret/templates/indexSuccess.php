<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo 'Definicion de Reportes de Comprobantes de Retencion' ?></h1>

<div id="sf_admin_content">
<fieldset id="sf_fieldset_none" class="">
<legend> Tipo de Reporte</legend>
<div class="form-row">
 <?php echo select_tag('mescon', options_for_select(array(
  '01'  => 'Comprobante de Retención de I.V.A',
  '02'  => 'Comprobante de Retención de I.S.L.R',
  '03'  => 'Comprobante de Retención de Ley de Timbre Fiscal',  
), '01')) ?>
</div>
</fielset>
</div>

<div id="sf_admin_content">
<fieldset id="sf_fieldset_none" class="">
<legend> Tipo de Retencion</legend>
<div class="form-row">
  <table border="0" class="sf_admin_list">
        <thead> <tr>
            <th width="17"><?php echo image_tag('/images/magnifier.png');  ?></th>
            <th width="87">Retencion </th>
            <th width="259">Descripcion</th>
          </tr></thead>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>                         
  </table> 
</div>
</fieldset>
</div>
</div>