<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 33258 2009-09-21 22:34:36Z dmartinez $
 */
// date: 2007/07/03 12:48:57
?>
<?php echo form_tag('pagdefemp/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript', 'Grid', 'tabs') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'observe') ?>

<?php echo object_input_hidden_tag($opdefemp, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('opdefemp[codemp]', __($labels['opdefemp{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{codemp}')): ?>
    <?php echo form_error('opdefemp{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opdefemp, 'getCodemp', array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'opdefemp[codemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('opdefemp[nomemp]', __($labels['opdefemp{nomemp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{nomemp}')): ?>
    <?php echo form_error('opdefemp{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opdefemp, 'getNomemp', array (
  'disabled' => true,
  'size'=>100,
  'control_name' => 'opdefemp[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('opdefemp[diremp]', __($labels['opdefemp{diremp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{diremp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{diremp}')): ?>
    <?php echo form_error('opdefemp{diremp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opdefemp, 'getDiremp', array (
  'disabled' => true,
  'size'=>100,
  'control_name' => 'opdefemp[diremp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Datos Orden');?>
<table>
<tr>
 <th>
 <fieldset><legend><?php echo __('Datos de la Orden') ?></legend>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('opdefemp[ctapag]', __($labels['opdefemp{ctapag}']), 'class="required" Style="width:100px"') ?>
<div
	class="content<?php if ($sf_request->hasError('opdefemp{ctapag}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opdefemp{ctapag}')): ?> <?php echo form_error('opdefemp{ctapag}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


 <?php $value = object_input_tag($opdefemp, 'getCtapag', array (
  'size' => 32,
  'maxlength' => $lonconta,
  'control_name' => 'opdefemp[ctapag]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_ctapag').value != '' && $('id').value == ''",
          'with' => "'ajax=3&cajtexmos=opdefemp_nomctapag&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp;  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp/clase/Contabb/frame/sf_admin_edit_form/obj1/opdefemp_ctapag/obj2/opdefemp_nomctapag/campo1/codcta/campo2/descta/param1/'.$lonconta)?>
</th>
</tr>
</table>
  <?php $value = object_input_tag($opdefemp, 'getNomctapag', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomctapag]',
   )); echo $value ? $value : '&nbsp;' ?>

<br><br>

<table>
<tr>
<th>
<?php echo label_for('opdefemp[ctades]', __($labels['opdefemp{ctades}']), 'class="required" Style="width:100px"') ?>
<div
	class="content<?php if ($sf_request->hasError('opdefemp{ctades}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opdefemp{ctades}')): ?> <?php echo form_error('opdefemp{ctades}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php $value = object_input_tag($opdefemp, 'getCtades', array (
  'size' => 32,
  'maxlength' => $lonconta,
  'control_name' => 'opdefemp[ctades]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_ctades').value != '' && $('id').value == ''",
          'with' => "'ajax=3&cajtexmos=opdefemp_nomctades&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp;  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp/clase/Contabb/frame/sf_admin_edit_form/obj1/opdefemp_ctades/obj2/opdefemp_nomctades/campo1/codcta/campo2/descta/param1/'.$lonconta)?>
</th>
</tr>
</table>
<?php $value = object_input_tag($opdefemp, 'getNomctades', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomctades]',
  )); echo $value ? $value : '&nbsp;' ?>

<br><br><br><br>

<?php echo label_for('opdefemp[numini]', __($labels['opdefemp{numini}']), 'class="required" Style="width:120px"') ?>
<div
	class="content<?php if ($sf_request->hasError('opdefemp{numini}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opdefemp{numini}')): ?> <?php echo form_error('opdefemp{numini}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opdefemp, 'getNumini', array (
  'size' => 20,
  'maxlength' => 8,
  'control_name' => 'opdefemp[numini]',
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('opdefemp_forubi').focus();}",
  'onBlur'  => "javascript:event.keyCode=13; valor=this.value; valor=valor.pad(8,'0',0);document.getElementById('opdefemp_numini').value=valor;",
  )); echo $value ? $value : '&nbsp;' ?></div>

<br><br><br><br>

<?php echo label_for('opdefemp[forubi]', __($labels['opdefemp{forubi}']), 'class="required" Style="width:100px"') ?>
<div class="content<?php if ($sf_request->hasError('opdefemp{forubi}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opdefemp{forubi}')): ?> <?php echo form_error('opdefemp{forubi}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php if ($esta!='1') {?>
<?php $value = object_input_tag($opdefemp, 'getForubi', array (
  'size' => 32,
  'maxlength' => 32,
  'control_name' => 'opdefemp[forubi]',
)); echo $value ? $value : '&nbsp;' ?>
<?php } else {?>
<?php $value = object_input_tag($opdefemp, 'getForubi', array (
  'size' => 32,
  'maxlength' => 32,
  'readonly' => true,
  'control_name' => 'opdefemp[forubi]',
)); echo $value ? $value : '&nbsp;' ?>
  <?php } ?>
</div>

<br><br>

  <?php echo label_for('opdefemp[gencomalc]', __($labels['opdefemp{gencomalc}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{gencomalc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{gencomalc}')): ?>
    <?php echo form_error('opdefemp{gencomalc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($opdefemp, 'getGencomalc', array (
  'control_name' => 'opdefemp[gencomalc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</fieldset>
 </th>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th>
  <fieldset><legend><?php echo __('Tipos de Orden') ?></legend>
  <div class="form-row">
  <table>
  <tr>
  <th>
    <?php echo label_for('opdefemp[ordnom]', __($labels['opdefemp{ordnom}']), 'class="required" Style="width:40px"') ?>
<div
	class="content<?php if ($sf_request->hasError('opdefemp{ordnom}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opdefemp{ordnom}')): ?> <?php echo form_error('opdefemp{ordnom}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

   <?php echo input_auto_complete_tag('opdefemp[ordnom]', $opdefemp->getOrdnom(),
    'pagdefemp/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_ordnom').value=cadena",
'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_ordnom').value != '' && $('id').value == ''",
        'script' => true,
          'with' => "'ajax=1&cajtexmos=opdefemp_nomtipnom&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?></div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp2/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opdefemp_nomtipnom/obj2/opdefemp_ordnom/campo1/nomext/campo2/tipcau/param1/1')?>
  </th>
  </tr>
  </table>

<?php $value = object_input_tag($opdefemp, 'getNomtipnom', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomtipnom]',
  )); echo $value ? $value : '&nbsp;' ?>

<br><br>

<table>
<tr>
<th>
<?php echo label_for('opdefemp[ordobr]', __($labels['opdefemp{ordobr}']), 'class="required" Style="width:40px"') ?>
<div
	class="content<?php if ($sf_request->hasError('opdefemp{ordobr}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opdefemp{ordobr}')): ?> <?php echo form_error('opdefemp{ordobr}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

   <?php echo input_auto_complete_tag('opdefemp[ordobr]', $opdefemp->getOrdobr(),
    'pagdefemp/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_ordobr').value=cadena",
'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_ordobr').value != '' && $('id').value == ''",
        'script' => true,
         'with' => "'ajax=1&cajtexmos=opdefemp_nomttipobr&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp2/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opdefemp_nomttipobr/obj2/opdefemp_ordobr/campo1/nomext/campo2/tipcau/param1/1')?>
</th>
</tr>
</table>

<?php $value = object_input_tag($opdefemp, 'getNomttipobr', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomttipobr]',
  )); echo $value ? $value : '&nbsp;' ?>

<br><br>

<table>
<tr>
<th>
<?php echo label_for('opdefemp[tipeje]', __($labels['opdefemp{tipeje}']), 'class="required" Style="width:40px"') ?>
<div
	class="content<?php if ($sf_request->hasError('opdefemp{tipeje}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opdefemp{tipeje}')): ?> <?php echo form_error('opdefemp{tipeje}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

   <?php echo input_auto_complete_tag('opdefemp[tipeje]', $opdefemp->getTipeje(),
    'pagdefemp/autocomplete?ajax=3',  array('autocomplete' => 'off','maxlength' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_tipeje').value=cadena",
'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_tipeje').value != ''",
        'script' => true,
        'with' => "'ajax=2&cajtexmos=opdefemp_nomtipeje&codigo='+this.value",
        ))),
     array('use_style' => 'true',)
  )
?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp3/clase/Tstipmov/frame/sf_admin_edit_form/obj1/opdefemp_nomtipeje/obj2/opdefemp_tipeje/campo1/destip/campo2/codtip/param1/1')?>
</th>
</tr>
</table>

<?php $value = object_input_tag($opdefemp, 'getNomtipeje', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomtipeje]',
  )); echo $value ? $value : '&nbsp;' ?>

<br><br>

<table>
<tr>
<th>
<?php echo label_for('opdefemp[ordliq]', __($labels['opdefemp{ordliq}']), 'class="required" Style="width:40px"') ?>
<div
	class="content<?php if ($sf_request->hasError('opdefemp{ordliq}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opdefemp{ordliq}')): ?> <?php echo form_error('opdefemp{ordliq}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

    <?php echo input_auto_complete_tag('opdefemp[ordliq]', $opdefemp->getOrdliq(),
    'pagdefemp/autocomplete?ajax=4',  array('autocomplete' => 'off','maxlength' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_ordliq').value=cadena",
'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_ordliq').value != ''",
        'script' => true,
        'with' => "'ajax=1&cajtexmos=opdefemp_nomtipliq&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp; <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp2/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opdefemp_nomtipliq/obj2/opdefemp_ordliq/campo1/nomext/campo2/tipcau/param1/1')?>
</th>
</tr>
</table>

<?php $value = object_input_tag($opdefemp, 'getNomtipliq', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomtipliq]',
  )); echo $value ? $value : '&nbsp;' ?>
<br><br>
<table>
<tr>
<th>
    <?php echo label_for('opdefemp[ordfid]', __($labels['opdefemp{ordfid}']), 'class="required" Style="width:40px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{ordfid}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{ordfid}')): ?>
    <?php echo form_error('opdefemp{ordfid}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('opdefemp[ordfid]', $opdefemp->getOrdfid(),
  'pagdefemp/autocomplete?ajax=5',  array('autocomplete' => 'off','maxlength' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_ordfid').value=cadena",
'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_ordfid').value != '' && $('id').value == ''",
        'script' => true,
        'with' => "'ajax=1&cajtexmos=opdefemp_nomtipfid&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp; <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp2/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opdefemp_nomtipfid/obj2/opdefemp_ordfid/campo1/nomext/campo2/tipcau/param1/1')?>
</th>
</tr>
</table>
<?php $value = object_input_tag($opdefemp, 'getNomtipfid', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomtipfid]',
  )); echo $value ? $value : '&nbsp;' ?>
<br><br>
<table>
<tr>
<th>
  <?php echo label_for('opdefemp[ordval]', __($labels['opdefemp{ordval}']), 'class="required" Style="width:40px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{ordval}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{ordval}')): ?>
    <?php echo form_error('opdefemp{ordval}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('opdefemp[ordval]', $opdefemp->getOrdval(),
  'pagdefemp/autocomplete?ajax=5',  array('autocomplete' => 'off','maxlength' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_ordval').value=cadena",
  'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_ordval').value != '' ",
        'script' => true,
        'with' => "'ajax=1&cajtexmos=opdefemp_nomtipobr&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp; <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp2/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opdefemp_nomtipobr/obj2/opdefemp_ordval/campo1/nomext/campo2/tipcau/param1/1')?>
</th>
</tr>
</table>
<?php $value = object_input_tag($opdefemp, 'getNomtipobr', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomtipobr]',
  )); echo $value ? $value : '&nbsp;' ?>
<br><br>
<table>
<tr>
<th>
  <?php echo label_for('opdefemp[ordret]', __($labels['opdefemp{ordret}']), 'class="required" Style="width:40px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{ordret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{ordret}')): ?>
    <?php echo form_error('opdefemp{ordret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('opdefemp[ordret]', $opdefemp->getOrdret(),
  'pagdefemp/autocomplete?ajax=5',  array('autocomplete' => 'off','maxlength' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_ordret').value=cadena",
  'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_ordret').value != '' ",
        'script' => true,
        'with' => "'ajax=1&cajtexmos=opdefemp_nomtipret&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp; <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp2/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opdefemp_nomtipret/obj2/opdefemp_ordret/campo1/nomext/campo2/tipcau/param1/1')?>
</th>
</tr>
</table>
<?php $value = object_input_tag($opdefemp, 'getNomtipret', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomtipret]',
  )); echo $value ? $value : '&nbsp;' ?>
<br><br>
<table>
<tr>
<th>
  <?php echo label_for('opdefemp[ordtna]', __($labels['opdefemp{ordtna}']), 'class="required" Style="width:40px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{ordtna}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{ordtna}')): ?>
    <?php echo form_error('opdefemp{ordtna}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('opdefemp[ordtna]', $opdefemp->getOrdtna(),
  'pagdefemp/autocomplete?ajax=5',  array('autocomplete' => 'off','maxlength' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_ordtna').value=cadena",
  'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_ordtna').value != '' ",
        'script' => true,
        'with' => "'ajax=1&cajtexmos=opdefemp_nomtiptna&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp; <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp2/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opdefemp_nomtiptna/obj2/opdefemp_ordtna/campo1/nomext/campo2/tipcau/param1/1')?>
</th>
</tr>
</table>
<?php $value = object_input_tag($opdefemp, 'getNomtiptna', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomtiptna]',
  )); echo $value ? $value : '&nbsp;' ?>
<br><br>
<table>
<tr>
<th>
  <?php echo label_for('opdefemp[ordtba]', __($labels['opdefemp{ordtba}']), 'class="required" Style="width:40px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{ordtba}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{ordtba}')): ?>
    <?php echo form_error('opdefemp{ordtba}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('opdefemp[ordtba]', $opdefemp->getOrdtba(),
  'pagdefemp/autocomplete?ajax=5',  array('autocomplete' => 'off','maxlength' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_ordtba').value=cadena",
  'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_ordtba').value != '' ",
        'script' => true,
        'with' => "'ajax=1&cajtexmos=opdefemp_nomtiptba&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp; <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp2/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opdefemp_nomtiptba/obj2/opdefemp_ordtba/campo1/nomext/campo2/tipcau/param1/1')?>
</th>
</tr>
</table>
<?php $value = object_input_tag($opdefemp, 'getNomtiptba', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomtiptba]',
  )); echo $value ? $value : '&nbsp;' ?>
</div>
  </fieldset>
 </th>
</tr>
</table>

<?php tabPageOpenClose("tp1", "tabPage2", 'Asociación');?>
<fieldset>
<div class="form-row">
<?php echo label_for('opdefemp[unitri]', __($labels['opdefemp{unitri}']), 'class="required" Style="width:200px"') ?>
<div
	class="content<?php if ($sf_request->hasError('opdefemp{unitri}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opdefemp{unitri}')): ?> <?php echo form_error('opdefemp{unitri}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opdefemp, array('getUnitri',true), array (
  'size' => 12,
  'control_name' => 'opdefemp[unitri]',
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('opdefemp_genctaord').focus();}",
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

  <?php echo label_for('opdefemp[manbloqban]', __($labels['opdefemp{manbloqban}']), 'class="required" style="width:350px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{manbloqban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{manbloqban}')): ?>
    <?php echo form_error('opdefemp{manbloqban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php $value = object_checkbox_tag($opdefemp, 'getManbloqban', array (
  'control_name' => 'opdefemp[manbloqban]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('opdefemp[genordret]', __($labels['opdefemp{genordret}']), 'class="required" style="width:350px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{genordret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{genordret}')): ?>
    <?php echo form_error('opdefemp{genordret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php $value = object_checkbox_tag($opdefemp, 'getGenordret', array (
  'control_name' => 'opdefemp[genordret]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
<br>

  <?php echo label_for('opdefemp[emichepag]', __($labels['opdefemp{emichepag}']), 'class="required" style="width:350px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{emichepag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{emichepag}')): ?>
    <?php echo form_error('opdefemp{emichepag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php $value = object_checkbox_tag($opdefemp, 'getEmichepag', array (
  'control_name' => 'opdefemp[emichepag]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br><br>
 <table width="35%">
  <tr>
    <th align="left">
<fieldset id="sf_fieldset_none" class="">
   <legend><?php echo __('Orden de Pago') ?></legend>
    <div class="form-row" width="100%">
      <table width="100%">
      <tr>
      <th width="10%"></th>
      <th>
          <?php echo label_for('opdefemp[reqaprord]', __($labels['opdefemp{reqaprord}']), 'class="required" style="width: 200px"') ?>
          <div class="content<?php if ($sf_request->hasError('opdefemp{reqaprord}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('opdefemp{reqaprord}')): ?>
            <?php echo form_error('opdefemp{reqaprord}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_checkbox_tag($opdefemp, 'getReqaprord', array (
          'control_name' => 'opdefemp[reqaprord]',
        )); echo $value ? $value : '&nbsp;' ?>
            </div>
      </th>
      </tr>

      <tr>
      <th width="10%"></th>
      <th>
          <?php echo label_for('opdefemp[ordcomptot]', __($labels['opdefemp{ordcomptot}']), 'class="required" style="width: 200px"') ?>
          <div class="content<?php if ($sf_request->hasError('opdefemp{ordcomptot}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('opdefemp{ordcomptot}')): ?>
            <?php echo form_error('opdefemp{ordcomptot}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_checkbox_tag($opdefemp, 'getOrdcomptot', array (
          'control_name' => 'opdefemp[ordcomptot]',
        )); echo $value ? $value : '&nbsp;' ?>
            </div>
      </th>
      </tr>

      <tr>
      <th width="10%"></th>
      <th>
          <?php echo label_for('opdefemp[ordmotanu]', __($labels['opdefemp{ordmotanu}']), 'class="required" style="width: 200px"') ?>
          <div class="content<?php if ($sf_request->hasError('opdefemp{ordmotanu}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('opdefemp{ordmotanu}')): ?>
            <?php echo form_error('opdefemp{ordmotanu}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_checkbox_tag($opdefemp, 'getOrdmotanu', array (
          'control_name' => 'opdefemp[ordmotanu]',
        )); echo $value ? $value : '&nbsp;' ?>
            </div>
      </th>
      </tr>

      <th width="10%"></th>
      <th>
          <?php echo label_for('opdefemp[ordconpre]', __($labels['opdefemp{ordconpre}']), 'class="required" style="width: 200px"') ?>
          <div class="content<?php if ($sf_request->hasError('opdefemp{ordconpre}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('opdefemp{ordconpre}')): ?>
            <?php echo form_error('opdefemp{ordconpre}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_checkbox_tag($opdefemp, 'getOrdconpre', array (
          'control_name' => 'opdefemp[ordconpre]',
        )); echo $value ? $value : '&nbsp;' ?>

            </div>
      </th>
      </tr>

      </table>
    </div>
 </fieldset>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
</tr>
</table>

<br> <br>

<table>
 <tr>
  <th>
   <fieldset><legend><?php echo __('Generar Comprobantes de Orden') ?></legend>
   <div class="form-row">
  <?php echo label_for('opdefemp[genctaord]', __($labels['opdefemp{genctaord}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{genctaord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{genctaord}')): ?>
    <?php echo form_error('opdefemp{genctaord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($opdefemp, 'getGenctaord', array (
  'control_name' => 'opdefemp[genctaord]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
   </fieldset>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
  <fieldset><legend><?php echo __('Ver Comprobantes y Retenciones') ?></legend>
  <div class="form-row">
  <?php echo label_for('opdefemp[vercomret]', __($labels['opdefemp{vercomret}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{vercomret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{vercomret}')): ?>
    <?php echo form_error('opdefemp{vercomret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($opdefemp, 'getVercomret', array (
  'control_name' => 'opdefemp[vercomret]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
  </fieldset>
  </th>
 </tr>
 <tr>
 <th>
 </th>
 <th>
 </th>
 </tr>
 <tr>
 <th>
 <fieldset><legend><?php echo __('Generar Comprobante Adicional') ?></legend>
 <div class="form-row">
  <?php echo label_for('opdefemp[gencomadi]', __($labels['opdefemp{gencomadi}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{gencomadi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{gencomadi}')): ?>
    <?php echo form_error('opdefemp{gencomadi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($opdefemp, 'getGencomadi', array (
  'control_name' => 'opdefemp[gencomadi]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
 </fieldset>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
 <fieldset><legend><?php echo __('Generar Causado Bono Vacacional') ?></legend>
  <div class="form-row">
  <?php echo label_for('opdefemp[gencaubon]', __($labels['opdefemp{gencaubon}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{gencaubon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{gencaubon}')): ?>
    <?php echo form_error('opdefemp{gencaubon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($opdefemp, 'getGencaubon', array (
  'control_name' => 'opdefemp[gencaubon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </fieldset>
  </th>
 </tr>
</table>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Caja Chica');?>
<fieldset>
<div class="form-row">
  <?php echo label_for('opdefemp[cuecajchi]', __($labels['opdefemp{cuecajchi}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{cuecajchi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{cuecajchi}')): ?>
    <?php echo form_error('opdefemp{cuecajchi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('opdefemp[cuecajchi]', $opdefemp->getCuecajchi(),
  'pagdefemp/autocomplete?ajax=6',  array('autocomplete' => 'off','maxlength' => 20,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_cuecajchi').value=cadena",
'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_cuecajchi').value != ''",
        'script' => true,
        'with' => "'ajax=4&cajtexmos=opdefemp_nomcuecajchi&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?>
&nbsp;&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_tsdefban/clase/Tsdefban/frame/sf_admin_edit_form/obj1/opdefemp_cuecajchi/obj2/opdefemp_nomcuecajchi/campo1/numcue/campo2/nomcue')?>
&nbsp;&nbsp;&nbsp;
<?php $value = object_input_tag($opdefemp, 'getNomcuecajchi', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomcuecajchi]',
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opdefemp[tipcajchi]', __($labels['opdefemp{tipcajchi}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{tipcajchi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{tipcajchi}')): ?>
    <?php echo form_error('opdefemp{tipcajchi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('opdefemp[tipcajchi]', $opdefemp->getTipcajchi(),
  'pagdefemp/autocomplete?ajax=7',  array('autocomplete' => 'off','maxlength' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_tipcajchi').value=cadena",
  'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_tipcajchi').value != ''",
        'script' => true,
        'with' => "'ajax=5&cajtexmos=opdefemp_nomtipcajchi&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?>
&nbsp;&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp3/clase/Tstipmov/frame/sf_admin_edit_form/obj1/opdefemp_tipcajchi/obj2/opdefemp_nomtipcajchi/campo1/codtip/campo2/destip')?>
&nbsp;&nbsp;&nbsp;
<?php $value = object_input_tag($opdefemp, 'getNomtipcajchi', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomtipcajchi]',
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opdefemp[monapecajchi]', __($labels['opdefemp{monapecajchi}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{monapecajchi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{monapecajchi}')): ?>
    <?php echo form_error('opdefemp{monapecajchi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opdefemp, array('getMonapecajchi',true), array (
  'size' => 7,
  'control_name' => 'opdefemp[monapecajchi]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opdefemp[porrepcajchi]', __($labels['opdefemp{porrepcajchi}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{porrepcajchi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{porrepcajchi}')): ?>
    <?php echo form_error('opdefemp{porrepcajchi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opdefemp, array('getPorrepcajchi',true), array (
  'size' => 7,
  'control_name' => 'opdefemp[porrepcajchi]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opdefemp[tiprencajchi]', __($labels['opdefemp{tiprencajchi}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{tiprencajchi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{tiprencajchi}')): ?>
    <?php echo form_error('opdefemp{tiprencajchi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('opdefemp[tiprencajchi]', $opdefemp->getTiprencajchi(),
  'pagdefemp/autocomplete?ajax=8',  array('autocomplete' => 'off','maxlength' => 4,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opdefemp_tiprencajchi').value=cadena",
  'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_tiprencajchi').value != ''",
        'script' => true,
        'with' => "'ajax=8&cajtexmos=opdefemp_nomtiprencajchi&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?>
&nbsp;&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdoccau_Pagemiord/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opdefemp_tiprencajchi/obj2/opdefemp_nomtiprencajchi/campo1/tipcau/campo2/nomext')?>
&nbsp;&nbsp;&nbsp;
<?php $value = object_input_tag($opdefemp, 'getNomtiprencajchi', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomtiprencajchi]',
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opdefemp[numinicajchi]', __($labels['opdefemp{numinicajchi}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{numinicajchi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{numinicajchi}')): ?>
    <?php echo form_error('opdefemp{numinicajchi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opdefemp, 'getNuminicajchi', array (
  'size' => 20,
  'maxlength' => 8,
  'control_name' => 'opdefemp[numinicajchi]',
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('opdefemp_cedrifcajchi').focus();}",
  'onBlur'  => "javascript:event.keyCode=13; valor=this.value; valor=valor.pad(8,'0',0);document.getElementById('opdefemp_numinicajchi').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opdefemp[cedrifcajchi]', __($labels['opdefemp{cedrifcajchi}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{cedrifcajchi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{cedrifcajchi}')): ?>
    <?php echo form_error('opdefemp{cedrifcajchi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('opdefemp[cedrifcajchi]', $opdefemp->getCedrifcajchi(),
  'pagdefemp/autocomplete?ajax=9',  array('autocomplete' => 'off','maxlength' => 15,
  'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_cedrifcajchi').value != ''",
        'script' => true,
        'with' => "'ajax=6&cajtexmos=opdefemp_nomben&codigo='+this.value"
        ))),
     array('use_style' => 'true',)
  )
?>
&nbsp;&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Pagemiord/clase/Opbenefi/frame/sf_admin_edit_form/obj1/opdefemp_cedrifcajchi/obj2/opdefemp_nomben/campo1/cedrif/campo2/nomben')?>
&nbsp;&nbsp;&nbsp;
<?php $value = object_input_tag($opdefemp, 'getNomben', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'opdefemp[nomben]',
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('opdefemp[codcatcajchi]', __($labels['opdefemp{codcatcajchi}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('opdefemp{codcatcajchi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opdefemp{codcatcajchi}')): ?>
    <?php echo form_error('opdefemp{codcatcajchi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($opdefemp, 'getCodcatcajchi', array (
  'size' => 20,
  'maxlength' => $loncat,
  'control_name' => 'opdefemp[codcatcajchi]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracategoria')",
  'onBlur'=> remote_function(array(
        'url'      => 'pagdefemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opdefemp_codcatcajchi').value != ''",
          'with' => "'ajax=7&cajtexmos=opdefemp_nomcat&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npcatpre_Almsolegr/clase/Npcatpre/frame/sf_admin_edit_form/obj1/opdefemp_codcatcajchi/obj2/opdefemp_nomcat/campo1/codcat/campo2/nomcat/param1/'.$loncat)?>
&nbsp;&nbsp;&nbsp;
  <?php $value = object_input_tag($opdefemp, 'getNomcat', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opdefemp[nomcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabInit('tp1','0');?>

<?php include_partial('edit_actions', array('opdefemp' => $opdefemp)) ?>
</form>
