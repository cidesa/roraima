<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/07/02 11:21:12
?>
<?php echo form_tag('oycval/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocregval, 'getId') ?>
<?php echo javascript_include_tag('tools','observe','dFilter','ajax','obras/ofertas') ?>
<?php echo input_hidden_tag('ivaante', $ivaant) ?>
<?php echo input_hidden_tag('valfinal', $val_fin) ?>
<?php echo input_hidden_tag('valant', $val_ant) ?>
<?php echo input_hidden_tag('valpar', $val_par) ?>
<?php echo input_hidden_tag('valret', $val_ret) ?>
<?php echo input_hidden_tag('valrec', $val_rec) ?>
<?php echo input_hidden_tag('ocregval[tieneant]', $ocregval->getTieneant()) ?>
<?php echo input_hidden_tag('ocregval[montotoferacum]', $ocregval->getMontotoferacum()) ?>
<?php echo input_hidden_tag('ocregval[montotparacum]', $ocregval->getMontotparacum()) ?>
<?php echo input_hidden_tag('ocregval[monperiva]', $ocregval->getMonperiva()) ?>
<?php echo input_hidden_tag('ocregval[codtipcon]', $ocregval->getCodtipcon()) ?>
<?php echo input_hidden_tag('ocregval[filaspar]', $ocregval->getFilaspar()) ?>
<?php echo input_hidden_tag('ocregval[filasofer]', $ocregval->getFilasofer()) ?>
<?php echo input_hidden_tag('ocregval[filasret]', $ocregval->getFilasret()) ?>
<?php echo input_hidden_tag('ocregval[monaumtot]', $ocregval->getMonaumtot()) ?>
<?php echo input_hidden_tag('ocregval[mondistot]', $ocregval->getMondistot()) ?>
<?php echo input_hidden_tag('ocregval[monexttotal]', $ocregval->getMonexttotal()) ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
<table>
<tr>
<th>
  <?php echo label_for('ocregval[codcon]', __($labels['ocregval{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{codcon}')): ?>
    <?php echo form_error('ocregval{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('ocregval[codcon]', $ocregval->getCodcon(),
    'oycval/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 8,
    'readonly'  =>  $ocregval->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
        'url'      => 'oycval/ajax',
        'condition' => "$('ocregval_codcon').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=9&codcon='+this.value"
        ))),
     array('use_style' => 'true')
  )
?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ocregcon_Oycval/clase/Ocregcon/frame/sf_admin_edit_form/obj1/ocregval_codcon/campo1/codcon','','','botoncat')?>
    </div>
</th>
<th>
&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocregval[codtipval]', __($labels['ocregval{codtipval}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{codtipval}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{codtipval}')): ?>
    <?php echo form_error('ocregval{codtipval}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo select_tag('ocregval[codtipval]', options_for_select($tipos,$ocregval->getCodtipval(),'include_custom=Seleccione Uno'),array(
     'onChange'=> remote_function(array(
		'url'      => 'oycval/ajax?ajax=2',
		'complete' => 'AjaxJSON(request, json)',
		'with' => "'codcon='+$('ocregval_codcon').value+'&idval='+$('id').value+'&cajtexmos=ocregval_numval&tipoval='+this.value"
)))) ?>
    </div>
</th>
<th>
&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocregval[numval]', __($labels['ocregval{numval}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{numval}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{numval}')): ?>
    <?php echo form_error('ocregval{numval}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, 'getNumval', array (
  'size' => 5,
  'maxlength' => 2,
  'control_name' => 'ocregval[numval]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
<table>
<tr>
<th>
  <?php echo label_for('ocregval[codobr]', __($labels['ocregval{codobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{codobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{codobr}')): ?>
    <?php echo form_error('ocregval{codobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, 'getCodobr', array (
  'disabled' => true,
  'control_name' => 'ocregval[codobr]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;
  <?php $value = object_input_tag($ocregval, 'getDesobr', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'ocregval[desobr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
<tr>
<th>
  <?php echo label_for('ocregval[codpro]', __($labels['ocregval{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{codpro}')): ?>
    <?php echo form_error('ocregval{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, 'getCodpro', array (
  'disabled' => true,
  'control_name' => 'ocregval[codpro]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;
  <?php $value = object_input_tag($ocregval, 'getNompro', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'ocregval[nompro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
</th>
<th>
<div id="periodo">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Período')?></legend>
<div class="form-row">
  <?php echo label_for('ocregval[fecini]', __($labels['ocregval{fecini}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{fecini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{fecini}')): ?>
    <?php echo form_error('ocregval{fecini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregval, 'getFecini', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregval[fecini]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregval[fecfin]', __($labels['ocregval{fecfin}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{fecfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{fecfin}')): ?>
    <?php echo form_error('ocregval{fecfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregval, 'getFecfin', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregval[fecfin]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
</div>

</th>
</tr>
</table>
<br>
<table>
<tr>
<th>
  <?php echo label_for('ocregval[fecreg]', __($labels['ocregval{fecreg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{fecreg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{fecreg}')): ?>
    <?php echo form_error('ocregval{fecreg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregval, 'getFecreg', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregval[fecreg]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<div id="porcentaje" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Porcentajes')?></legend>
<div class="form-row">
<table>
<tr><th>
<?php echo label_for('ocregval[poriva]', __($labels['ocregval{poriva}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{poriva}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{poriva}')): ?>
    <?php echo form_error('ocregval{poriva}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getPoriva',true), array (
  'size' => 7,
  'control_name' => 'ocregval[poriva]',
  'onBlur' => "javascript: validar1(event, this.id, '1');",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th><th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th><th>
  <?php echo label_for('ocregval[porant]', __($labels['ocregval{porant}']), 'class="required" id="label19"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{porant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{porant}')): ?>
    <?php echo form_error('ocregval{porant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getPorant',true), array (
  'size' => 7,
  'control_name' => 'ocregval[porant]',
  'onBlur' => "javascript:validar1(event, this.id, '2');",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th></tr></table>
</div>
</fieldset>
</div>
</th>
</tr>
</table>
</div>
</fieldset>

<br>
<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Resumen');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('ocregval[moncon]', __($labels['ocregval{moncon}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{moncon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{moncon}')): ?>
    <?php echo form_error('ocregval{moncon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getMoncon',true), array (
  'size' => 7,
  'readonly' => true,
  'control_name' => 'ocregval[moncon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
 <?php echo label_for('ocregval[aumobr]', __($labels['ocregval{aumobr}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{aumobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{aumobr}')): ?>
    <?php echo form_error('ocregval{aumobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getAumobr',true), array (
  'size' => 7,
  'control_name' => 'ocregval[aumobr]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id); calcular_contratro(this.id);",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('ocregval[disobr]', __($labels['ocregval{disobr}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{disobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{disobr}')): ?>
    <?php echo form_error('ocregval{disobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getDisobr',true), array (
  'size' => 7,
  'control_name' => 'ocregval[disobr]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id); calcular_contratro(this.id);",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('ocregval[obrext]', __($labels['ocregval{obrext}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{obrext}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{obrext}')): ?>
    <?php echo form_error('ocregval{obrext}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getObrext',true), array (
  'size' => 7,
  'control_name' => 'ocregval[obrext]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id); calcular_contratro(this.id);",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('ocregval[monful]', __($labels['ocregval{monful}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{monful}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{monful}')): ?>
    <?php echo form_error('ocregval{monful}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getMonful',true), array (
  'size' => 7,
  'control_name' => 'ocregval[monful]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Partidas');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<div id="partida">
<?php echo grid_tag($obj);?>
</div>

<div id="oferta" style="display:none">
<?php echo grid_tag($obj4);?>
</div>

<br>
<table>
<tr>
<th>
<div id="gastosree" style="display:none">
  <?php echo label_for('ocregval[gasree]', __($labels['ocregval{gasree}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{gasree}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{gasree}')): ?>
    <?php echo form_error('ocregval{gasree}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getGasree',true), array (
  'size' => 7,
  'control_name' => 'ocregval[gasree]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id); calcular_gastosree(this.id);",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocregval[subtot]', __($labels['ocregval{subtot}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{subtot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{subtot}')): ?>
    <?php echo form_error('ocregval{subtot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getSubtot',true), array (
  'size' => 7,
  'control_name' => 'ocregval[subtot]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregval[moniva]', __($labels['ocregval{moniva}']), 'class="required" id="label16" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{moniva}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{moniva}')): ?>
    <?php echo form_error('ocregval{moniva}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getMoniva',true), array (
  'size' => 7,
  'control_name' => 'ocregval[moniva]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregval[totiva]', __($labels['ocregval{totiva}']), 'class="required" id="label41" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{totiva}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{totiva}')): ?>
    <?php echo form_error('ocregval{totiva}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getTotiva',true), array (
  'readonly' => true,
  'size' => 7,
  'control_name' => 'ocregval[totiva]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Retenciones');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('ocregval[totsiniva]', __($labels['ocregval{totsiniva}']), 'class="required" Style="width:170px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{totsiniva}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{totsiniva}')): ?>
    <?php echo form_error('ocregval{totsiniva}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getTotsiniva',true), array (
  'readonly' => true,
  'size' => 7,
  'control_name' => 'ocregval[totsiniva]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregval[amortant]', __($labels['ocregval{amortant}']), 'class="required" Style="width:170px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{amortant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{amortant}')): ?>
    <?php echo form_error('ocregval{amortant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getAmortant',true), array (
  'readonly' => true,
  'size' => 7,
  'control_name' => 'ocregval[amortant]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<table>
<tr>
<th>
  <?php echo label_for('ocregval[monfia]', __($labels['ocregval{monfia}']), 'class="required" Style="width:170px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{monfia}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{monfia}')): ?>
    <?php echo form_error('ocregval{monfia}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getMonfia',true), array (
  'size' => 7,
  'control_name' => 'ocregval[monfia]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocregval[monper]', __($labels['ocregval{monper}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{monper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{monper}')): ?>
    <?php echo form_error('ocregval{monper}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getMonper',true), array (
  'size' => 7,
  'control_name' => 'ocregval[monper]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<div id="divRet">
<?php echo grid_tag($obj2);?>
</div>
<br>
<table>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocregval[totded]', __($labels['ocregval{totded}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{totded}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{totded}')): ?>
    <?php echo form_error('ocregval{totded}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getTotded',true), array (
  'size' => 7,
  'control_name' => 'ocregval[totded]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
</div>
</fieldset>

<br>
<table>
<tr>
<th>
  <?php echo label_for('ocregval[valpag]', __($labels['ocregval{valpag}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{valpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{valpag}')): ?>
    <?php echo form_error('ocregval{valpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getValpag',true), array (
  'readonly' => true,
  'size' => 7,
  'control_name' => 'ocregval[valpag]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocregval[monpag]', __($labels['ocregval{monpag}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{monpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{monpag}')): ?>
    <?php echo form_error('ocregval{monpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getMonpag',true), array (
  'size' => 7,
  'control_name' => 'ocregval[monpag]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'Estados de Cuentas');?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Estado del Cuenta del Contrato hasta la Fecha')?></legend>
<div class="form-row">
  <?php echo label_for('ocregval[montotcon]', __($labels['ocregval{montotcon}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{montotcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{montotcon}')): ?>
    <?php echo form_error('ocregval{montotcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getMontotcon',true), array (
  'readonly' => true,
  'size' => 7,
  'control_name' => 'ocregval[montotcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregval[monval]', __($labels['ocregval{monval}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{monval}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{monval}')): ?>
    <?php echo form_error('ocregval{monval}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getMonval',true), array (
  'size' => 7,
  'control_name' => 'ocregval[monval]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregval[salliq]', __($labels['ocregval{salliq}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{salliq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{salliq}')): ?>
    <?php echo form_error('ocregval{salliq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getSalliq',true), array (
  'size' => 7,
  'control_name' => 'ocregval[salliq]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<div id="retacum" style="display:none">
  <?php echo label_for('ocregval[retacu]', __($labels['ocregval{retacu}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{retacu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{retacu}')): ?>
    <?php echo form_error('ocregval{retacu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getRetacu',true), array (
  'size' => 7,
  'control_name' => 'ocregval[retacu]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</div>
</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Saldo de Anticipo')?></legend>
<div class="form-row">
  <?php echo label_for('ocregval[monantic]', __($labels['ocregval{monantic}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{monantic}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{monantic}')): ?>
    <?php echo form_error('ocregval{monantic}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getMonantic',true), array (
  'readonly' => true,
  'size' => 7,
  'control_name' => 'ocregval[monantic]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregval[monant]', __($labels['ocregval{monant}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{monant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{monant}')): ?>
    <?php echo form_error('ocregval{monant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getMonant',true), array (
  'size' => 7,
  'control_name' => 'ocregval[monant]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id); calcular_monanticipo(this.id);",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregval[salantic]', __($labels['ocregval{salantic}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregval{salantic}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregval{salantic}')): ?>
    <?php echo form_error('ocregval{salantic}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregval, array('getSalantic',true), array (
  'readonly' => true,
  'size' => 7,
  'control_name' => 'ocregval[salantic]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage5", 'Inspectores');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo grid_tag($obj3);?>
</div>
</fieldset>

<?php tabInit('tp1','0');?>


<?php include_partial('edit_actions', array('ocregval' => $ocregval)) ?>

</form>

<ul class="sf_admin_actions">
 <li class="float-left"><?php if ($ocregval->getId() && (!$verifica_anular)): ?>
<?php echo button_to(__('Anular'), 'oycval/anular?id='.$ocregval->getId(), array (
  'class' => 'sf_admin_action_delete',
  'post' => true,
  'confirm' => __('Realmente desea Anular la valuacion?'),
)) ?><?php endif; ?>
</li>
      <li class="float-left"><?php if ($ocregval->getId() && (!$verifica_anular)): ?>
<?php echo button_to(__('delete'), 'oycval/delete?id='.$ocregval->getId(), array (
  'post' => true,
  'confirm' => __('Realmente desea Eliminar la valuacion?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
</ul>


<script language="JavaScript" type="text/javascript">
var nuevo='<?php  echo $ocregval->getId();?>';
if (nuevo!='')
{
  var tipoval=$('ocregval_codtipval').value;
  var val_ant='<?php echo $val_ant; ?>';
  var val_par='<?php echo $val_par; ?>';
  var val_ret='<?php echo $val_ret; ?>';
  var val_rec='<?php echo $val_rec; ?>';
  var val_fin='<?php echo $val_fin; ?>';
  var con_ins='<?php echo $con_ins; ?>';
  var con_sup='<?php echo $con_sup; ?>';
  var con_pro='<?php echo $con_pro; ?>';
  var codtipcon='<?php echo $ocregval->getCodtipcon(); ?>';
 switch(tipoval)
 {
   case (val_ant || val_ret):
     switch (codtipcon)
     {
      case (con_ins  || con_sup || con_pro):
       $('gastosree').show();
       $('oferta').show();
       $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>';
       break;
      default:
        $('tab1').innerHTML='<a id=tab1 href=#>Partidas</a>';
       break;
     }
    break;
   case (val_par || val_fin):
     switch (codtipcon)
     {
      case (con_ins  || con_sup || con_pro):
       $('gastosree').show();
       $('oferta').show();
       $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>';
       break;
      default:
        $('tab1').innerHTML='<a id=tab1 href=#>Partidas</a>';
       break;
    case val_rec:
      $('tab1').innerHTML='<a id=tab1 href=#>Partidas</a>';
     break;
     }
    break;
 }
 $$('.botoncat')[0].disabled=true;

 switch (tipoval)
 {
 	case val_ant:
 	  $('label16').innerHTML = 'IVA ( '+$('ocregval_poriva').value+' % )';
 	  $('label41').innerHTML = 'Anticipo ( '+$('ocregval_porant').value+' % )';
 	 break;
 	case val_ret:
 	  $('label16').innerHTML = 'IVA ( '+$('ocregval_poriva').value+' % )';
 	  $('label41').innerHTML = 'Retención ( '+$('ocregval_porant')+' % )';
 	 break;
    case val_par:
      $('label16').innerHTML = 'IVA ( '+$('ocregval_poriva').value+' % )';
      $('label41').innerHTML = 'Total con Iva';
     break;
    case val_fin:
      $('label16').innerHTML = 'IVA ( '+$('ocregval_poriva').value+' % )';
      $('label41').innerHTML = 'Total con Iva';
     break;
 }
 totalizar();

}

 function validar1(e,id, ind)
 {
  e.keyCode=13;
  entermontootro(e, id);

  if ($(id).value!='')
  {
     if (validarnumero(id))
     {
       var monto=toFloat(id);
       if (monto<=100)
       {
         if (ind=='2')
         {
          if ($('ocregval_poriva').value!='0,00')
          {
            if ($('ocregval_tieneant').value=='S')
            {
            	if ($('valfinal').value==$('ocregval_codtipval').value)
            	{
                  if ($('ocregval_porant').value!='0,00')
                  {
                    new Ajax.Updater('partida', '/obras_dev.php/oycval/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codcon='+$('ocregval_codcon').value+'&tipval='+$('ocregval_codtipval').value+'&numval='+$('ocregval_numval').value+'&idval='+$('id').value+'&poriva='+$('ocregval_poriva').value+'&porant='+$('ocregval_porant').value+'&aumobr='+$('ocregval_aumobr').value+'&disobr='+$('ocregval_disobr').value+'&obrext='+$('ocregval_obrext').value+'&monper='+$('ocregval_monper').value+'&valpag='+$('ocregval_valpag').value});
                    $('porcentaje').hide();
                  }
                  else
                  {
                     alert('Debe indicar el porcentaje de Anticipo');
                     $('ocregval_porant').value="0,00";
                  	 $('ocregval_porant').focus();
                  }
            	}
            	else
            	{
            	  new Ajax.Updater('partida', '/obras_dev.php/oycval/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codcon='+$('ocregval_codcon').value+'&tipval='+$('ocregval_codtipval').value+'&numval='+$('ocregval_numval').value+'&idval='+$('id').value+'&poriva='+$('ocregval_poriva').value+'&porant='+$('ocregval_porant').value+'&aumobr='+$('ocregval_aumobr').value+'&disobr='+$('ocregval_disobr').value+'&obrext='+$('ocregval_obrext').value+'&monper='+$('ocregval_monper').value+'&valpag='+$('ocregval_valpag').value});
            	  $('porcentaje').hide();
            	}
            }
            else
            {
              if ($('valant').value==$('ocregval_codtipval').value)
              {
              	if ($('ocregval_porant').value!='0,00')
	              {
                     new Ajax.Updater('partida', '/obras_dev.php/oycval/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codcon='+$('ocregval_codcon').value+'&tipval='+$('ocregval_codtipval').value+'&numval='+$('ocregval_numval').value+'&idval='+$('id').value+'&poriva='+$('ocregval_poriva').value+'&porant='+$('ocregval_porant').value+'&aumobr='+$('ocregval_aumobr').value+'&disobr='+$('ocregval_disobr').value+'&obrext='+$('ocregval_obrext').value+'&monper='+$('ocregval_monper').value+'&valpag='+$('ocregval_valpag').value});
                     $('porcentaje').hide();
	              }
	              else
	              {
	                 alert('Debe indicar el porcentaje de Anticipo');
	                 $('ocregval_porant').value="0,00";
	              	 $('ocregval_porant').focus();
	              }
              }
              else
              {
                new Ajax.Updater('partida', '/obras_dev.php/oycval/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codcon='+$('ocregval_codcon').value+'&tipval='+$('ocregval_codtipval').value+'&numval='+$('ocregval_numval').value+'&idval='+$('id').value+'&poriva='+$('ocregval_poriva').value+'&porant='+$('ocregval_porant').value+'&aumobr='+$('ocregval_aumobr').value+'&disobr='+$('ocregval_disobr').value+'&obrext='+$('ocregval_obrext').value+'&monper='+$('ocregval_monper').value+'&valpag='+$('ocregval_valpag').value});
              	$('porcentaje').hide();
              }
            }
          }
          else
          {
            if ($('ivaante').value=='S')
            {
              alert('Debe indicar el porcentaje de Iva');
              $('ocregval_poriva').value="0,00";
              $('ocregval_poriva').focus();
            }
            else
            {
              new Ajax.Updater('partida', '/obras_dev.php/oycval/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codcon='+$('ocregval_codcon').value+'&tipval='+$('ocregval_codtipval').value+'&numval='+$('ocregval_numval').value+'&idval='+$('id').value+'&poriva='+$('ocregval_poriva').value+'&porant='+$('ocregval_porant').value+'&aumobr='+$('ocregval_aumobr').value+'&disobr='+$('ocregval_disobr').value+'&obrext='+$('ocregval_obrext').value+'&monper='+$('ocregval_monper').value+'&valpag='+$('ocregval_valpag').value});
              $('porcentaje').hide();
            }
          }
         }
       }
       else
       {
       	 alert('El Monto debe ser menor al 100%');
         $(id).value="0,00";
         $(id).focus();
       }
     }
     else
     {
       alert('Monto Inválido');
       $(id).value="0,00";
     }
  }

 }

  function calcular_contratro(id)
  {
    if (validarnumero(id))
    {
       var moncon=toFloat('ocregval_moncon');
       var monaum=toFloat('ocregval_aumobr');
       var mondis=toFloat('ocregval_disobr');
       var monext=toFloat('ocregval_obrext');

       var total=moncon+monaum-mondis+monext;

       $('ocregval_monful').value=format(total.toFixed(2),'.',',','.');
       $('ocregval_montotcon').value=$('ocregval_moncon').value;
    }
    else
    {
       alert_('El Dato debe ser N&uacute;merico');
       $(id).value="0,00";
    }
  }

 function calcular_monanticipo(id)
 {
   if ($(id).value!="")
   {
   	 if (validarnumero(id))
    {
      var monantic=toFloat('ocregval_monantic');
      var monant=toFloat(id);
      if (monant<monantic)
      {
      	var calculo= monatici - monant;
      	$('ocregval_salantic').value=format(calculo.toFixed(2),'.',',','.');
      }
      else
      {
      	alert_('El monto a amortizar debe ser menor al monto del anticipo');
        $(id).value="0,00";
      }
    }
    else
    {
       alert_('El Dato debe ser N&uacute;merico');
       $(id).value="0,00";
    }
   }
 }

 function calcular_gastosree(id)
 {
   if ($(id).value!="")
   {
   	 if (validarnumero(id))
     {
       var codcontrato=$('ocregval_codcon').value;
       var codtipval=$('ocregval_codtipval').value;
       var gastos=$(id).value;
       new Ajax.Request('/obras_dev.php/oycval/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=8&codcon='+codcontrato+'&tipval='+codtipval+'&gastos='+gastos})
     }
     else
     {
       alert_('El Dato debe ser N&uacute;merico');
       $(id).value="0,00";
     }
   }
  }

</script>
