<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<div id="sf_admin_container">

<h1><?php echo __('Cierre de Mes', array()) ?></h1>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table width="75%" border="0">
  <tr> 
    <td width="36%" rowspan="3" valign="top">
<div align="center">
        <p><strong><u>Advertencia:</u></strong></p>
        <p><img src=" /images/alerta.JPG"  ></p>
      </div></td>
    <td width="64%" height="39"><fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
    <p><font size="3" face="MS sans-serif">Resultados del Cierre de Mes
        </font></p>
      <p><font size="3" face="MS sans-serif">1.- Calcula pr&oacute;xima 
        fecha del per&iacute;odo del sistema</font><font face="MS sans-serif">.</font></p>
      <p><font size="3" face="MS sans-serif">2.- Calcula la depreciaci&oacute;n 
        de los activos para el mes que se esta cerrando.</font></p>
      <p><font size="3" face="MS sans-serif">3.- Crea movimientos contables 
        de depreciaci&oacute;n.</font></p>
      <p><font size="2" face="MS sans-serif">Nota: La depreciaci&oacute;n 
        de activos debe realizarse desp&uacute;es del cierre del mes.</font></p>
    </div>
    </fieldset>
    </td>
  </tr>
  <tr> 
    <td height="32">
    <fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
    <strong>Fecha de Inicio de Depreciaci&oacute;n</strong>
    <?php echo input_date_tag('1233', '', 'rich = true calendar_button_img= /sf/sf_admin/images/date.png date_format=dd/MM/yy') ?></td>
    </div>
    </fieldset>
  </tr>
  <tr> 
    <td height="32">
    <fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
 <div align=center><?php echo button_to('Depreciar Activos','#')?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
    <?php echo button_to('Asiento Contable','#')?></div>
</div></fieldset></td>
  </tr>
</table>
</div>
</fieldset>
