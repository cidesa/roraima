<?php use_helper('Object','ObjectAdmin','Grid');?>
<?php  $capitalizacion = $params['capitalizacion']?>
<fieldset>
 <legend><? echo __('Dias por AÃ±o y Capitalizacion de Intereses')?></legend>
 <div class="form-row">
<table>
<tr>
<th>

<?php echo "AÃ±o (365/366)"."&nbsp;&nbsp;" . radiobutton_tag('anno', '365', false) ?>
  <?php echo "&nbsp;&nbsp;&nbsp;". "AÃ±o 360 " . radiobutton_tag('anno', '360', true)?>

</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
 <?php echo label_for('lbcapitalizacion', __("CapitalizaciÃ³n de Interes"), 'class="required" ') ?>
 <?php echo select_tag('capitalizacion', options_for_select($capitalizacion,'01','')) ?>
</th>
</tr>
</table>
 </div>
</fieldset>
<fieldset>
<legend><? echo __('Salario Dias Adicionales de Antiguedad')?></legend>
<div class="form-row">
  <?php  echo  radiobutton_tag('nppresoc[salario]', 'P', true)." Promedio del AÃ±o"
    ?>
  &nbsp;&nbsp;
  <?php echo  radiobutton_tag('nppresoc[salario]', 'U', false)." Ultimo Salario Devengado"?>
</div>
</fieldset>