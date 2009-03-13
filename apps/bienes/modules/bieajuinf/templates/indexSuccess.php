<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<div id="sf_admin_container">

<h1><?php echo __('Revalorizaci&oacute;n', array()) ?></h1>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table width="75%" border="0">
  <tr>
    <td width="36%" rowspan="3" valign="top">
<div align="center">
        <p><strong><u>Informaci&oacute;n:</u></strong></p>
        <p><img src=" /images/alerta.JPG"  ></p>
      </div></td>
    <td width="64%" height="39"><fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
    <p><font size="3" face="MS sans-serif">Revalorizaci&oacute;n
        de Activos</font></p>
      <p><font size="3" face="MS sans-serif">1.- Reexpresa el valor
        de los activos a trav&eacute;s del Ajuste por inflaci&oacute;n(API)</font><font face="Arial, Helvetica, sans-serif">
        </font></p>
    </div>

    </fieldset>
    </td>
  </tr>
  <tr>
    <td height="32">
    <fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
    <strong>Fecha de Revalorizaci&oacute;n</strong>
    <?php echo input_date_tag('1233', '', 'rich = true calendar_button_img= /sf/sf_admin/images/date.png date_format=dd/MM/yy') ?></td>
    </div>
    </fieldset>
  </tr>
  <tr>
    <td height="32">
    <fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
 <div align=center><?php echo button_to('Ajustar Activos','#')?></div>
</div></fieldset></td>
  </tr>
</table>
</div>
</fieldset>
