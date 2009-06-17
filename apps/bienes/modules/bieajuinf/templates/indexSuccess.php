<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp', 'Grid','Linktoapp') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'observe') ?>
<div id="sf_admin_container">
<h1><?php echo __('Revalorización', array()) ?></h1>
<div id="sf_admin_content">
<?php if ($sf_flash->has('notice')): ?>
<div class="save-ok">
<h2><?php echo __($sf_flash->get('notice')) ?></h2>
</div>
<?php endif; ?>
<?php echo form_tag('bieajuinf/index', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php echo input_hidden_tag('depcalculada', '') ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table width="75%" border="0">
  <tr>
    <td width="36%" rowspan="3" valign="top">
       <div align="center">
        <p><strong><u><?php echo __('Información:') ?></u></strong></p>
        <p><img src="/images/alerta.png"  ></p>
       </div>
    </td>
    <td width="64%" height="39">
     <fieldset id="sf_fieldset_none" class="">
      <div class="form-row">
        <p><font size="3" face="MS sans-serif"><?php echo __('Revalorización de Activos') ?></font></p>
        <p><font size="3" face="MS sans-serif"><?php echo __('1.- Reexpresa el valor de los activos a través del Ajuste por inflación (API)') ?></font><font face="Arial, Helvetica, sans-serif"></font></p>
      </div>
     </fieldset>
    </td>
  </tr>
<tr>
<th>
<div id="fechareval" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo label_for('fecha',__('Fecha de Revalorización') , 'class="required" Style="width:110px"') ?>
<?php echo input_tag('fecha','', array(
 'size' => 15,
 'rich' => true,
 'readonly' => true,
 'date_format' => 'dd/MM/yyyy',
 'onkeyup' => "javascript: mascara(this,'/',patron,true)",
 'onBlur'=> remote_function(array(
        'url'      => 'bieajuinf/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('fecha').value != ''",
        'with' => "'ajax=2&codigo='+this.value"
        ))
),date('d/m/Y')) ?>
</div>
</fieldset>
</div>
</th>
<tr>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('API')?></legend>
<div class="form-row">
  <div align=center>
    <input type="button" src="/images/candado.png" name="Submit" value="Ajustar Activos" onclick="javascript:ajustar();" />
  </div>
</div>
</fieldset>
</th>
</tr>
</table>

</form>
</div>
</div>

<script language="JavaScript" type="text/javascript">
  function ajustar()
  {
    new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1'})
  }
</script>

