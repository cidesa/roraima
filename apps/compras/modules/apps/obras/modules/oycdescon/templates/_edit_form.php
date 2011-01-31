<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/03 19:46:21
?>
<?php echo form_tag('oycdescon/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocregcon, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe','obras/ofertas') ?>
<?php echo input_hidden_tag('ocregcon[fecact]', $ocregcon->getFecact()) ?>
<?php echo input_hidden_tag('ocregcon[pormul]', $ocregcon->getPormul()) ?>
<?php echo input_hidden_tag('ocregcon[plaini]', $ocregcon->getPlaini()) ?>
<?php echo input_hidden_tag('ocregcon[contratado]', $ocregcon->getContratado()) ?>
<?php echo input_hidden_tag('ocregcon[contrapar]', $ocregcon->getContrapar()) ?>
<?php echo input_hidden_tag('ocregcon[disponible]', $ocregcon->getDisponible()) ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Contrato')?></legend>
<div class="form-row">
  <?php echo label_for('ocregcon[codcon]', __($labels['ocregcon{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{codcon}')): ?>
    <?php echo form_error('ocregcon{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, 'getCodcon', array (
  'size' => 15,
  'maxlength' => 8,
  'readonly'  =>  $ocregcon->getId()!='' ? true : false ,
  'control_name' => 'ocregcon[codcon]',
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('ocregcon_tipcon').focus();}",
  'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

  <?php echo label_for('ocregcon[tipcon]', __($labels['ocregcon{tipcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{tipcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{tipcon}')): ?>
    <?php echo form_error('ocregcon{tipcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('ocregcon[tipcon]', $ocregcon->getTipcon(),
    'oycdescon/autocomplete?ajax=1', array('autocomplete' => 'off',
    'maxlength' => 3,'size' => 7,
    'readonly'  =>  $ocregcon->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
      'url'      => 'oycdescon/ajax',
      'condition' => "$('ocregcon_tipcon').value != '' && $('id').value == ''",
      'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&cajtexmos=ocregcon_nomtipcon&cajtexcom=ocregcon_tipcon&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipcon_Oycdefemp/clase/Octipcon/frame/sf_admin_edit_form/obj1/ocregcon_tipcon/obj2/ocregcon_nomtipcon/campo1/codtipcon/campo2/destipcon','','','botoncat')?>
&nbsp;&nbsp;
  <?php $value = object_input_tag($ocregcon, 'getNomtipcon', array (
  'disabled' => true,
  'size'=> 60,
  'control_name' => 'ocregcon[nomtipcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[codobr]', __($labels['ocregcon{codobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{codobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{codobr}')): ?>
    <?php echo form_error('ocregcon{codobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('ocregcon[codobr]', $ocregcon->getCodobr(),
    'oycdescon/autocomplete?ajax=2', array('autocomplete' => 'off',
    'maxlength' => 8,'size' => 20,
    'readonly'  =>  $ocregcon->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
      'url'      => 'oycdescon/ajax',
      'condition' => "$('ocregcon_codobr').value != '' && $('id').value == ''",
      'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=2&cajtexmos=ocregcon_desobr&cajtexcom=ocregcon_codobr&tipcon='+$('ocregcon_tipcon').value+'&numcon='+$('ocregcon_codcon').value+'&id='+$('id').value+'&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Obras_Ocoferpre/clase/Ocregobr/frame/sf_admin_edit_form/obj1/ocregcon_codobr/obj2/ocregcon_desobr/campo1/codobr/campo2/desobr','','','botoncat')?>
&nbsp;&nbsp;

  <?php $value = object_input_tag($ocregcon, 'getDesobr', array (
  'disabled' => true,
   'size' => 74,
  'control_name' => 'ocregcon[desobr]',
)); echo $value ? $value : '&nbsp;' ?> <?php echo input_hidden_tag('ocregcon[codpre]', $ocregcon->getCodpre()) ?><?php echo input_hidden_tag('ocregcon[despre]', $ocregcon->getDespre()) ?><?php echo input_hidden_tag('ocregcon[codpreiva]', $ocregcon->getCodpreiva()) ?>
    </div>
<br>
  <?php echo label_for('ocregcon[codpro]', __($labels['ocregcon{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{codpro}')): ?>
    <?php echo form_error('ocregcon{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, 'getCodpro', array (
  'size' => 15,
  'control_name' => 'ocregcon[codpro]',
  'onBlur'=> remote_function(array(
        'update'   => 'divGrid',
        'condition' => "$('ocregcon_codpro').value != '' && $('id').value == ''",
        'url'      => 'oycdescon/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=11&cajtexmos=ocregcon_nompro&cajtexcom=ocregcon_codpro&obra='+$('ocregcon_codobr').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caprovee_Oycregcon/clase/Caprovee/frame/sf_admin_edit_form/obj1/ocregcon_codpro/obj2/ocregcon_nompro/campo1/codpro/campo2/nompro','','','botoncat')
?>
&nbsp;&nbsp;
  <?php $value = object_input_tag($ocregcon, 'getNompro', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocregcon[nompro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[descon]', __($labels['ocregcon{descon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{descon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{descon}')): ?>
    <?php echo form_error('ocregcon{descon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, 'getDescon', array (
  'size' => 100,
  'malength' => 250,
  'control_name' => 'ocregcon[descon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Datos Generales');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo grid_tag($obj);?>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Partidas Covenin');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
 <?php echo label_for('ocregcon[poriva]', __($labels['ocregcon{poriva}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{poriva}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{poriva}')): ?>
    <?php echo form_error('ocregcon{poriva}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, array('getPoriva',true), array (
  'size' => 7,
  //'readonly' => true,
  'control_name' => 'ocregcon[poriva]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;'.'(Aplicado al Contrato)' ?>
    </div>
<br>

<div id="tipocom">
  <?php echo label_for('ocregcon[tipcom]', __($labels['ocregcon{tipcom}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{tipcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{tipcom}')): ?>
    <?php echo form_error('ocregcon{tipcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, 'getTipcom', array (
  'size' => 32,
  'maxlength' => 4,
  'readonly'  =>  $ocregcon->getId()!='' ? true : false,
  'control_name' => 'ocregcon[tipcom]',
  'onBlur'=> remote_function(array(
        'url'      => 'oycdescon/ajax',
        'condition' => "$('ocregcon_tipcom').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=16&cajtexcom=ocregcon_tipcom&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdoccom_Predoccom/clase/Cpdoccom/frame/sf_admin_edit_form/obj1/ocregcon_tipcom/campo1/tipcom','','','botoncat')?>
    </div>
</div>
<br>

<div id="partida">
<?php echo grid_tag($obj2);?>
</div>
<?php echo input_hidden_tag('ocregcon[totales]', $ocregcon->getTotales()) ?>

<br>
<div id="oferta" style="display:none">
<?php echo grid_tag($obj4);?>
</div>
<?php echo input_hidden_tag('ocregcon[totofer]', $ocregcon->getTotofer()) ?>
<table>
<tr>
<th>
<div id="oferta2" style="display:none">
  <?php echo label_for('ocregcon[gasree]', __($labels['ocregcon{gasree}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{gasree}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{gasree}')): ?>
    <?php echo form_error('ocregcon{gasree}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, array('getGasree',true), array (
  'size' => 7,
  'control_name' => 'ocregcon[gasree]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
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
</th>
<th>
  <?php echo label_for('ocregcon[subtot]', __($labels['ocregcon{subtot}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{subtot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{subtot}')): ?>
    <?php echo form_error('ocregcon{subtot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, array('getSubtot',true), array (
  'size' => 7,
  'control_name' => 'ocregcon[subtot]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
 <?php echo label_for('ocregcon[moniva]', __($labels['ocregcon{moniva}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{moniva}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{moniva}')): ?>
    <?php echo form_error('ocregcon{moniva}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, array('getMoniva',true), array (
  'size' => 7,
  'control_name' => 'ocregcon[moniva]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('ocregcon[totcon]', __($labels['ocregcon{totcon}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{totcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{totcon}')): ?>
    <?php echo form_error('ocregcon{totcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, 'getTotcon', array (
  'size' => 7,
  'readonly' => true,
  'control_name' => 'ocregcon[totcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Fechas');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
 <?php echo label_for('ocregcon[feclic]', __($labels['ocregcon{feclic}']), 'class="required" Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{feclic}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{feclic}')): ?>
    <?php echo form_error('ocregcon{feclic}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFeclic', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[feclic]',
  'readonly'  =>  $ocregcon->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur' => "javascript:event.keyCode=13; lostfocus_licitacion()",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[feccon]', __($labels['ocregcon{feccon}']), 'class="required" Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{feccon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{feccon}')): ?>
    <?php echo form_error('ocregcon{feccon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFeccon', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[feccon]',
  'readonly'  =>  $ocregcon->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur' => "javascript:event.keyCode=13; lostfocus_contratacion()",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[fecproini]', __($labels['ocregcon{fecproini}']), 'class="required"  Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{fecproini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{fecproini}')): ?>
    <?php echo form_error('ocregcon{fecproini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFecproini', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[fecproini]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[fecrei]', __($labels['ocregcon{fecrei}']), 'class="required"  Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{fecrei}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{fecrei}')): ?>
    <?php echo form_error('ocregcon{fecrei}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFecrei', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[fecrei]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[fecfin]', __($labels['ocregcon{fecfin}']), 'class="required"  Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{fecfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{fecfin}')): ?>
    <?php echo form_error('ocregcon{fecfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFecfin', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[fecfin]',
  'readonly'  =>  $ocregcon->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur' => "javascript:event.keyCode=13; lostfocus_fecfinal()",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[fecrecdef]', __($labels['ocregcon{fecrecdef}']), 'class="required"  Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{fecrecdef}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{fecrecdef}')): ?>
    <?php echo form_error('ocregcon{fecrecdef}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFecrecdef', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[fecrecdef]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocregcon[fecbuepro]', __($labels['ocregcon{fecbuepro}']), 'class="required" Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{fecbuepro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{fecbuepro}')): ?>
    <?php echo form_error('ocregcon{fecbuepro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFecbuepro', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[fecbuepro]',
  'readonly'  =>  $ocregcon->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur' => "javascript:event.keyCode=13; lostfocus_buenapro()",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[fecini]', __($labels['ocregcon{fecini}']), 'class="required" Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{fecini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{fecini}')): ?>
    <?php echo form_error('ocregcon{fecini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFecini', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[fecini]',
  'readonly'  =>  $ocregcon->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur' => "javascript:event.keyCode=13; lostfocus_fecinicio()",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[fecpar]', __($labels['ocregcon{fecpar}']), 'class="required" Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{fecpar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{fecpar}')): ?>
    <?php echo form_error('ocregcon{fecpar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFecpar', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[fecpar]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[fecpro]', __($labels['ocregcon{fecpro}']), 'class="required" Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{fecpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{fecpro}')): ?>
    <?php echo form_error('ocregcon{fecpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFecpro', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[fecpro]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[fecrecprov]', __($labels['ocregcon{fecrecprov}']), 'class="required" Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{fecrecprov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{fecrecprov}')): ?>
    <?php echo form_error('ocregcon{fecrecprov}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFecrecprov', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[fecrecprov]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[fecfinmod]', __($labels['ocregcon{fecfinmod}']), 'class="required" Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{fecfinmod}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{fecfinmod}')): ?>
    <?php echo form_error('ocregcon{fecfinmod}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregcon, 'getFecfinmod', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregcon[fecfinmod]',
  'readonly'  =>  $ocregcon->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>
  <?php echo label_for('ocregcon[tieejecon]', __($labels['ocregcon{tieejecon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{tieejecon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{tieejecon}')): ?>
    <?php echo form_error('ocregcon{tieejecon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('ocregcon[platie]', options_for_select($tipeje,$ocregcon->getPlatie(),'include_custom=Seleccione Uno')) ?>

  <?php $value = object_input_tag($ocregcon, 'getTieejecon', array (
  'size' => 7,
  'control_name' => 'ocregcon[tieejecon]',
  'readonly'  =>  $ocregcon->getId()!='' ? true : false ,
  'onBlur' => "javascript:event.keyCode=13; calcular_total_dias()",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'Montos');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
 <?php echo label_for('ocregcon[moncon]', __($labels['ocregcon{moncon}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{moncon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{moncon}')): ?>
    <?php echo form_error('ocregcon{moncon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, array('getMoncon',true), array (
  'size' => 7,
  'control_name' => 'ocregcon[moncon]',
  'readonly'  =>  $ocregcon->getId()!='' ? true : false ,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[monext]', __($labels['ocregcon{monext}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{monext}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{monext}')): ?>
    <?php echo form_error('ocregcon{monext}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, array('getMonext',true), array (
  'size' => 7,
  'control_name' => 'ocregcon[monext]',
  'onBlur' => "javascript:event.keyCode=13; entermontootro(event, this.id); calcular_contratro();",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[monmul]', __($labels['ocregcon{monmul}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{monmul}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{monmul}')): ?>
    <?php echo form_error('ocregcon{monmul}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, array('getMonmul',true), array (
  'size' => 7,
  'control_name' => 'ocregcon[monmul]',
  'onBlur' => "javascript:event.keyCode=13; entermontootro(event, this.id); calcular_contratro();",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[monmod]', __($labels['ocregcon{monmod}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{monmod}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{monmod}')): ?>
    <?php echo form_error('ocregcon{monmod}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, array('getMonmod',true), array (
  'size' => 7,
  'control_name' => 'ocregcon[monmod]',
  'onBlur' => "javascript:event.keyCode=13; entermontootro(event, this.id); calcular_contratro();",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregcon[monful]', __($labels['ocregcon{monful}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregcon{monful}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregcon{monful}')): ?>
    <?php echo form_error('ocregcon{monful}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregcon, array('getMonful',true), array (
  'size' => 7,
  'readonly' => true,
  'control_name' => 'ocregcon[monful]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage5", 'Retenciones');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo grid_tag($obj3);?>
</div>
</fieldset>

<?php tabInit('tp1','0');?>

<?php include_partial('edit_actions', array('ocregcon' => $ocregcon)) ?>

</form>

<ul class="sf_admin_actions">
 <li class="float-left"><?php if ($ocregcon->getId() && (!$verifica_anular)): ?>
<?php echo button_to(__('Anular'), 'oycdescon/anular?id='.$ocregcon->getId(), array (
  'class' => 'sf_admin_action_delete',
  'post' => true,
  'confirm' => __('Realmente desea Anular el Contrato?'),
)) ?><?php endif; ?>
</li>
      <li class="float-left"><?php if ($ocregcon->getId() && (!$verifica_eliminar)): ?>
<?php echo button_to(__('delete'), 'oycdescon/delete?id='.$ocregcon->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
  var reg='<?php echo $ocregcon->getId(); ?>';
  var tipo='<?php echo $ocregcon->getTipcon(); ?>';
  var conins='<?php echo $con_ins; ?>';
  var consup='<?php echo $con_sup; ?>';
  var conpro='<?php echo $con_pro; ?>';
  if (reg)
  {
    switch(tipo)
     {
       case (conins):
        $('oferta2').show();
        $('oferta').show();
        $('partida').hide();
        $('grid_a').innerHTML='<legend id=grid_a >Personal Contratado</legend>';
        $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>';
       break;
       case (consup):
        $('oferta2').show();
        $('oferta').show();
        $('partida').hide();
        $('grid_a').innerHTML='<legend id=grid_a >Personal Contratado</legend>';
        $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>';
       break;
       case (conpro):
        $('oferta2').show();
        $('oferta').show();
        $('partida').hide();
        $('grid_a').innerHTML='<legend id=grid_a >Personal Contratado</legend>';
        $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>';
       break;
       default:
       break;
     }

   $$('.botoncat')[0].disabled=true;
   $$('.botoncat')[1].disabled=true;
   $$('.botoncat')[2].disabled=true;
   $('trigger_ocregcon_feclic').hide();
   $('trigger_ocregcon_fecini').hide();
   $('trigger_ocregcon_feccon').hide();
   $('trigger_ocregcon_fecbuepro').hide();
   $('trigger_ocregcon_fecfin').hide();
   $('trigger_ocregcon_fecfinmod').hide();
   $('tipocom').hide();
   totalizargridcon();
  }


 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}

     $('ocregcon_codcon').value=valor;
   }
 }
</script>

