<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<div id="sf_admin_content">
<fieldset id="sf_fieldset_none" class="">
<legend>Criterio</legend>
<table width="28%" border="0" class="sf_admin_list" align="center">
  <tr>
    <td><?php echo radiobutton_tag('IC[]', 'value1', true) . "Industria y Comercio"?> </td>
  </tr>
  <tr>
    <td><?php echo radiobutton_tag('V[]', 'value1', true) . "Vehiculo"?></td>
  </tr>
  <tr>
    <td><?php echo radiobutton_tag('I[]', 'value1', true) . "Inmuebles Urbanos"?></td>
  </tr>
  <tr>
    <td><?php echo radiobutton_tag('A[]', 'value1', true) . "Apuestas Lícitas"?></td>
  </tr>
  <tr>
    <td><?php echo radiobutton_tag('G[]', 'value1', true) . "General"?></td>
  </tr>  
</table>
</div>
</fieldset>

</div>