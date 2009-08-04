<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp', 'Grid','Linktoapp') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'observe') ?>
<div id="sf_admin_container">
<h1><?php echo __('Cierre de Mes', array()) ?></h1>
<div id="sf_admin_content">
<?php if ($sf_flash->has('notice')): ?>
<div class="save-ok">
<h2><?php echo __($sf_flash->get('notice')) ?></h2>
</div>
<?php endif; ?>
<?php echo form_tag('bieciemesdan/index', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table width="75%" border="0">
  <tr>
    <td width="36%" rowspan="3" valign="top">
       <div align="center">
        <p><strong><u><?php echo __('Advertencia:') ?></u></strong></p><?php echo input_hidden_tag('depcalculada', '') ?>
        <p><img src="/images/alerta.png"  ></p>
       </div>
    </td>
    <td width="64%" height="39">
    <fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
      <p><font size="3" face="MS sans-serif"><?php echo __('Resultados del Cierre de Mes') ?></font></p>
      <p><font size="3" face="MS sans-serif"><?php echo __('1.- Calcula próxima fecha del período del sistema.') ?></font><font face="MS sans-serif"></font></p>
      <p><font size="3" face="MS sans-serif"><?php echo __('2.- Calcula la depreciación de los activos para el mes que se esta cerrando.') ?></font></p>
      <p><font size="3" face="MS sans-serif"><?php echo __('3.- Crea movimientos contables de depreciación.')?></font></p>
      <p><br><strong><font size="2" face="MS sans-serif"><?php echo __('Nota: La depreciación de activos debe realizarse despúes del cierre del mes.')?></font></strong></p>
    </div>
    </fieldset>
    </td>
  </tr>
<tr>
<th>
<div id="fechareval" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo label_for('fecha',__('Fecha Inicio de Depreciación') , 'class="required" id="label16" Style="width:110px"') ?>
<?php echo input_date_tag('fecha','', array(
 'size' => 10,
 'maxlength' => 10,
 'rich' => true,
 'calendar_button_img' => '/sf/sf_admin/images/date.png',
 'date_format' => 'dd/MM/yyyy',
 'onkeyup' => "javascript: mascara(this,'/',patron,true)",
 'onKeyPress' => "javascript:if (event.keyCode==13){return false;}",
 'onBlur'=> remote_function(array(
        'url'      => 'bieciemesdan/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('fecha').value != ''",
        'with' => "'ajax=3&codigo='+this.value"
        ))
),date('Y-m-d')) ?>
</div>
</fieldset>
</div>
</th>
<tr>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Cerrar Mes')?></legend>
<div class="form-row">
  <div align=center>
  <button id="vela" name="Submit" type="button" onclick="javascript:depreciacion();" ><img src="/images/candado.png"><?php echo __('Depreciar Activos') ?></button>
  <button id="vela" name="Submit" type="button" onclick="javascript:asiento();" ><img src="/images/candado.png"><?php echo __('Asiento Contable') ?></button>
  </div>
  <div id="comp"></div>
</div>
</fieldset>
</th>
</tr>
</table>

</form>
</div>
</div>

<script language="JavaScript" type="text/javascript">
  function depreciacion()
  {
    new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1'})
  }

  function asiento()
  {
    new Ajax.Updater('comp',getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&deprecal='+$('depcalculada').value})
  }

  function comprobante(formulario)
  {
      window.open('/tesoreria_dev.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
</script>