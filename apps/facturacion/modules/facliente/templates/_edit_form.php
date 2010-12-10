<?php echo form_tag('facliente/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'double_list_submit(); return true;'
)) ?>

<?php echo object_input_hidden_tag($facliente, 'getId') ?>
<?php echo input_hidden_tag('entorno', $ent) ?>
<?php echo input_hidden_tag('codproaux', '') ?>
<?php echo input_hidden_tag('rifproaux', '') ?>
<?php use_helper('PopUp', 'tabs', 'DoubleList', 'Javascript') ?>
<?php echo javascript_include_tag('ajax','dFilter','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
 <th>
   <?php echo label_for('facliente[codpro]', __($labels['facliente{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codpro}')): ?>
    <?php echo form_error('facliente{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($facliente, 'getCodpro', array (
  'size' => 15,
  'maxlength' => 15,
  'readonly'  =>  $facliente->getId()!='' ? true : false ,
  'control_name' => 'facliente[codpro]',
  'onBlur'  => "javascript: valor=this.value; if ($('facliente_codpro').value!='') valor=valor.pad(8, '0',0);document.getElementById('facliente_codpro').value=valor;document.getElementById('facliente_codpro').disabled=false;validarExistencia(this.id);",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 </th>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th>
  <?php echo label_for('facliente[nompro]', __($labels['facliente{nompro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{nompro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{nompro}')): ?>
    <?php echo form_error('facliente{nompro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($facliente, 'getNompro', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'facliente[nompro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 </th>
</tr>
</table>
</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Datos Personales');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
 <tr>
  <th>
  <?php echo label_for('facliente[rifpro]', __($labels['facliente{rifpro}']), 'class="required" ') ?>
  <div
    class="content<?php if ($sf_request->hasError('facliente{rifpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{rifpro}')): ?> <?php echo form_error('facliente{rifpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($facliente, 'getRifpro', array (
    'size' => 15,
    'maxlength' => 15,
    'readonly'  =>  $facliente->getId()!='' ? true : false ,
    'control_name' => 'facliente[rifpro]',
    'onBlur'  => "javascript: validarRif(this.id)",
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
	  <?php echo label_for('facliente[fatipcte_id]', __($labels['facliente{fatipcte_id}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
	  <div class="content<?php if ($sf_request->hasError('facliente{fatipcte_id}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('facliente{fatipcte_id}')): ?>
	    <?php echo form_error('facliente{fatipcte_id}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_select_tag($facliente, 'getFatipcteId', array (
	  'control_name' => 'facliente[fatipcte_id]',
	  'include_blank' => true,
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
  </th>
 </tr>
</table>
 <br>

<table>
 <tr>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th><fieldset id="sf_fieldset_none" class="">
    <legend><strong><?php echo  __('Nacionalidad :') ?></strong></legend>
    <div class="form-row">
    <?  if ($facliente->getNacpro()=='N'){

        echo radiobutton_tag('facliente[nacpro]','N', true) .'&nbsp;&nbsp;'. "Nacional"."<br>";
        echo radiobutton_tag('facliente[nacpro]','E', false) .'&nbsp;&nbsp;'. "Extranjero"."<br>";

      }elseif ($facliente->getNacpro()=='E'){
        echo radiobutton_tag('facliente[nacpro]','N', false) .'&nbsp;&nbsp;'. "Nacional".'&nbsp;&nbsp;'."<br>";
        echo radiobutton_tag('facliente[nacpro]','E', true) .'&nbsp;&nbsp;'. "Extranjero"."<br>";

      }else{
        echo radiobutton_tag('facliente[nacpro]','N', true) .'&nbsp;&nbsp;'. "Nacional".'&nbsp;&nbsp;'."<br>";
        echo radiobutton_tag('facliente[nacpro]','E', false) .'&nbsp;&nbsp;'. "Extranjero"."<br>";
      }?>
 </div> </fieldset></th>
 <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
 <th><fieldset id="sf_fieldset_none" class="">
    <legend><strong><?php echo  __('Actividad Profesional :') ?></strong></legend>
    <div class="form-row">
    <?  if ($facliente->getTipo()=='P'){
      echo radiobutton_tag('facliente[tipo]','P', true) .'&nbsp;&nbsp;'. "Privada"."<br>";
      echo radiobutton_tag('facliente[tipo]','U', false) .'&nbsp;&nbsp;'. "Pública"."<br>";
      echo radiobutton_tag('facliente[tipo]','M', false) .'&nbsp;&nbsp;'. "Mixta"."<br>";

    }elseif ($facliente->getTipo()=='U'){
      echo radiobutton_tag('facliente[tipo]','P', false) .'&nbsp;&nbsp;'. "Privada"."<br>";
      echo radiobutton_tag('facliente[tipo]','U', true) .'&nbsp;&nbsp;'. "Pública"."<br>";
      echo radiobutton_tag('facliente[tipo]','M', false) .'&nbsp;&nbsp;'. "Mixta"."<br>";

    }elseif ($facliente->getTipo()=='M'){
      echo radiobutton_tag('facliente[tipo]','P', false) .'&nbsp;&nbsp;'. "Privada"."<br>";
      echo radiobutton_tag('facliente[tipo]','U', false) .'&nbsp;&nbsp;'. "Pública"."<br>";
      echo radiobutton_tag('facliente[tipo]','M', true) .'&nbsp;&nbsp;'. "Mixta"."<br>";

    }else{
      echo radiobutton_tag('facliente[tipo]','P', true) .'&nbsp;&nbsp;'. "Privada"."<br>";
      echo radiobutton_tag('facliente[tipo]','U', false) .'&nbsp;&nbsp;'. "Pública"."<br>";
      echo radiobutton_tag('facliente[tipo]','M', false) .'&nbsp;&nbsp;'. "Mixta"."<br>";
    }    ?>
  </div> </fieldset></th>
 <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
 <th><fieldset id="sf_fieldset_none" class="">
    <legend><strong><?php echo  __('Tipo de Persona :') ?></strong></legend>
    <div class="form-row">
    <?  if ($facliente->getTipper()=='N'){

        echo radiobutton_tag('facliente[tipper]','J', false) .'&nbsp;&nbsp;'. "Jurídica"."<br>";
        echo radiobutton_tag('facliente[tipper]','N', true) .'&nbsp;&nbsp;'. "Natural"."<br>";

      }elseif ($facliente->getTipper()=='J'){
        echo radiobutton_tag('facliente[tipper]','J', true) .'&nbsp;&nbsp;'. "Jurídica"."<br>";
        echo radiobutton_tag('facliente[tipper]','N', false) .'&nbsp;&nbsp;'. "Natural"."<br>";

      }else{
        echo radiobutton_tag('facliente[tipper]','J', true) .'&nbsp;&nbsp;'. "Jurídica"."<br>";
        echo radiobutton_tag('facliente[tipper]','N', false) .'&nbsp;&nbsp;'. "Natural"."<br>";
      }?>
 </div> </fieldset></th>
 </tr>
 </table>

 <br>

 <?php echo label_for('facliente[dirpro]', __($labels['facliente{dirpro}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{dirpro}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{dirpro}')): ?> <?php echo form_error('facliente{dirpro}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getDirpro', array (
  'size' => 80,
   'maxlength' => 100,
  'control_name' => 'facliente[dirpro]',
)); echo $value ? $value : '&nbsp;' ?></div>

 <br>
  <?php echo label_for('facliente[codedo]', __($labels['facliente{codedo}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{codedo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{codedo}')): ?> <?php echo form_error('facliente{codedo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
 <?php echo select_tag('facliente[codedo]', options_for_select(OcestadoPeer::getEstados(),$facliente->getCodedo(),'include_custom= Selecciones uno...'),array(
  )) ?></div>

<br>
<table>
<tr>
 <th>
  <?php echo label_for('facliente[telpro]', __($labels['facliente{telpro}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('facliente{telpro}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{telpro}')): ?> <?php echo form_error('facliente{telpro}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getTelpro', array (
  'size' => 30,
   'maxlength' => 30,
   'control_name' => 'facliente[telpro]',
)); echo $value ? $value : '&nbsp;' ?></div>
 </th>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th>
 <?php echo label_for('facliente[faxpro]', __($labels['facliente{faxpro}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{faxpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{faxpro}')): ?>
    <?php echo form_error('facliente{faxpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($facliente, 'getFaxpro', array (
  'size' => 15,
   'maxlength' => 15,
  'control_name' => 'facliente[faxpro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 </th>
</tr>
</table>

<br>

<table>
<tr>
<th>
<?php echo label_for('facliente[email]', __($labels['facliente{email}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{email}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{email}')): ?> <?php echo form_error('facliente{email}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getEmail', array (
  'size' => 55,
   'maxlength' => 50,
  'control_name' => 'facliente[email]',
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
    <br>
  <?php echo label_for('facliente[escontrib]', __($labels['facliente{escontrib}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{escontrib}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{escontrib}')): ?>
    <?php echo form_error('facliente{escontrib}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($facliente, 'getEscontrib', array (
  'control_name' => 'facliente[escontrib]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>

<table>
<tr>
<th>
<?php echo label_for('facliente[pagweb]', __($labels['facliente{pagweb}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{pagweb}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{pagweb}')): ?> <?php echo form_error('facliente{pagweb}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getPagWeb', array (
  'size' => 55,
   'maxlength' => 50,
  'control_name' => 'facliente[pagweb]',
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
</tr>
</table>

<br>

<?php echo label_for('facliente[codram]', __($labels['facliente{codram}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{codram}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{codram}')): ?> <?php echo form_error('facliente{codram}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('facliente[codram]', $facliente->getCodram(),
    'facliente/autocomplete?ajax=1', array('autocomplete' => 'off',
'maxlength' => 6,'size' => 7,'onBlur'=> remote_function(array(
      'url'      => 'facliente/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('facliente_codram').value != '' && $('id').value == ''",
         'with' => "'ajax=1&cajtexmos=facliente_nomram&cajtexcom=facliente_codram&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caramart_Facliente/clase/Caramart/frame/sf_admin_edit_form/obj1/facliente_nomram/obj2/facliente_codram/campo1/nomram/campo2/ramart')?>
&nbsp;
<?php $value = object_input_tag($facliente, 'getnomram', array (
  'size' => 50,
  'maxlength' => 80,
  'readonly' => true,
  'control_name' => 'facliente[nomram]',
)); echo $value ? $value : '&nbsp;' ?></div>


<br>

   <?php echo label_for('facliente[limcre]', __($labels['facliente{limcre}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{limcre}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{limcre}')): ?> <?php echo form_error('facliente{limcre}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
  <?php $value = object_input_tag($facliente, array('getLimcre',true), array (
  'size' => 15,
  'control_name' => 'facliente[limcre]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('facliente[codcta]', __($labels['facliente{codcta}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codcta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codcta}')): ?>
    <?php echo form_error('facliente{codcta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($facliente, 'getCodcta', array (
  'size' => 32,
  'maxlength' => $loncta,
  'readonly'  =>  $encontrado==true ? true : false ,
  'control_name' => 'facliente[codcta]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'facliente/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('facliente_codcta').value != '' && $('id').value == ''",
   'with' => "'ajax=2&cajtexmos=facliente_descta&cajtexcom=facliente_codcta&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Facliente/clase/Contabb/frame/sf_admin_edit_form/obj1/facliente_descta/obj2/facliente_codcta/campo1/descta/campo2/codcta')?>
&nbsp;
<?php $value = object_input_tag($facliente, 'getDescta', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'facliente[descta]',
)); echo $value ? $value : '&nbsp;' ?></div>


<br>

<?php echo label_for('facliente[codord]', __($labels['facliente{codord}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codord}')): ?>
    <?php echo form_error('facliente{codord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php $value = object_input_tag($facliente, 'getCodord', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'facliente[codord]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'facliente/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('facliente_codord').value != ''",
   'with' => "'ajax=2&cajtexmos=facliente_desctacodord&cajtexcom=facliente_codord&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Facliente/clase/Contabb/frame/sf_admin_edit_form/obj1/facliente_desctacodord/obj2/facliente_codord/campo1/descta/campo2/codcta')?>
&nbsp;
<?php $value = object_input_tag($facliente, 'getDesctacodord', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'facliente[desctacodord]',
)); echo $value ? $value : '&nbsp;' ?></div>


<br>

<?php echo label_for('facliente[codpercon]', __($labels['facliente{codpercon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codpercon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codpercon}')): ?>
    <?php echo form_error('facliente{codpercon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($facliente, 'getCodpercon', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'facliente[codpercon]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'facliente/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('facliente_codpercon').value != ''",
   'with' => "'ajax=2&cajtexmos=facliente_desctacodpercon&cajtexcom=facliente_codpercon&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Facliente/clase/Contabb/frame/sf_admin_edit_form/obj1/facliente_desctacodpercon/obj2/facliente_codpercon/campo1/descta/campo2/codcta')?>
&nbsp;
<?php $value = object_input_tag($facliente, 'getDesctacodpercon', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'facliente[desctacodpercon]',
)); echo $value ? $value : '&nbsp;' ?></div>


<br>

<?php echo label_for('facliente[fecinscir]', __($labels['facliente{fecinscir}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{fecinscir}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{fecinscir}')): ?> <?php echo form_error('facliente{fecinscir}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_date_tag($facliente, 'getFecinscir', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'facliente[fecinscir]',
  'size' => 10,
  'maxlength' => 10,
   'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?></div>
</div>
</fieldset>


<?php tabPageOpenClose("tp1", "tabPage2", 'Datos del Registro');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('facliente[numinscir]', __($labels['facliente{numinscir}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{numinscir}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{numinscir}')): ?> <?php echo form_error('facliente{numinscir}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getNuminscir', array (
  'size' => 20,
  'control_name' => 'facliente[numinscir]',
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('facliente[fecreg]', __($labels['facliente{fecreg}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{fecreg}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{fecreg}')): ?> <?php echo form_error('facliente{fecreg}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_date_tag($facliente, 'getFecreg', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'facliente[fecreg]',
  'size' => 10,
  'maxlength' => 10,
   'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
</tr>
</table>

<br>

<table>
 <tr>
   <th>
   <?php echo label_for('facliente[regmer]', __($labels['facliente{regmer}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{regmer}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{regmer}')): ?> <?php echo form_error('facliente{regmer}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getRegmer', array (
  'size' => 20,
  'control_name' => 'facliente[regmer]',
)); echo $value ? $value : '&nbsp;' ?></div>
   </th>
   <th>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
   <?php echo label_for('facliente[folreg]', __($labels['facliente{folreg}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{folreg}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{folreg}')): ?> <?php echo form_error('facliente{folreg}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getFolreg', array (
  'size' => 20,
  'control_name' => 'facliente[folreg]',
)); echo $value ? $value : '&nbsp;' ?></div>
   </th>
 </tr>
</table>

<br>

<table>
 <tr>
 <th>
 <?php echo label_for('facliente[tomreg]', __($labels['facliente{tomreg}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{tomreg}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{tomreg}')): ?> <?php echo form_error('facliente{tomreg}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getTomreg', array (
  'size' => 20,
  'control_name' => 'facliente[tomreg]',
)); echo $value ? $value : '&nbsp;' ?></div>
 </th>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th>
 <?php echo label_for('facliente[cappag]', __($labels['facliente{cappag}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{cappag}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{cappag}')): ?> <?php echo form_error('facliente{cappag}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, array('getCappag',true), array (
  'size' => 20,
  'maxlength'=> 50,
  'control_name' => 'facliente[cappag]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
 </th>
 </tr>
</table>

<br>

<table>
 <tr>
 <th>
 <?php echo label_for('facliente[capsus]', __($labels['facliente{capsus}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{capsus}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{capsus}')): ?> <?php echo form_error('facliente{capsus}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, array('getCapsus',true), array (
  'size' => 20,
  'maxlength' => 50,
  'control_name' => 'facliente[capsus]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
 )); echo $value ? $value : '&nbsp;' ?>
  </div>
 </th>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th>
 <?php echo label_for('facliente[fecven]', __($labels['facliente{fecven}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{fecven}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{fecven}')): ?> <?php echo form_error('facliente{fecven}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_date_tag($facliente, 'getFecven', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'facliente[fecven]',
   'date_format' => 'dd/MM/yy',
   'size' => 10,
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?></div>
 </th>
 </tr>
</table>

<br>

  <?php echo label_for('facliente[codtipemp]', __($labels['facliente{codtipemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codtipemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codtipemp}')): ?>
    <?php echo form_error('facliente{codtipemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('facliente[codtipemp]', $facliente->getCodtipemp(),
    'facliente/autocomplete?ajax=5',  array('autocomplete' => 'off','size'=>6,'maxlength' => 4,
     'onBlur'=> remote_function(array(
        'url'      => 'facliente/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('facliente_codtipemp').value != '' && $('id').value == ''",
        'with' => "'ajax=7&cajtexmos=facliente_destip&cajtexcom=facliente_codtipemp&codigo='+this.value",
        ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catipempsnc_Almregpro/clase/Catipempsnc/frame/sf_admin_edit_form/obj1/facliente_codtipemp/obj2/facliente_destip/campo1/codtip/campo2/destip')?></th>

  <?php $value = object_input_tag($facliente, 'getDestip', array (
  'disabled' => true,
  'size'=> 60,
  'control_name' => 'facliente[destip]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos Persona Contacto')?></legend>
<div class="form-row"><?php echo label_for('facliente[rifpercon]', __($labels['facliente{rifpercon}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{rifpercon}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{rifpercon}')): ?> <?php echo form_error('facliente{rifpercon}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getRifpercon', array (
  'size' => 20,
  'control_name' => 'facliente[rifpercon]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('facliente[nompercon]', __($labels['facliente{nompercon}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{nompercon}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{nompercon}')): ?> <?php echo form_error('facliente{nompercon}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getNompercon', array (
  'size' => 50,
  'control_name' => 'facliente[nompercon]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('facliente[dirpercon]', __($labels['facliente{dirpercon}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{dirpercon}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{dirpercon}')): ?> <?php echo form_error('facliente{dirpercon}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getDirpercon', array (
  'size' => 80,
  'control_name' => 'facliente[dirpercon]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('facliente[telpercon]', __($labels['facliente{telpercon}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{telpercon}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{telpercon}')): ?> <?php echo form_error('facliente{telpercon}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getTelpercon', array (
  'size' => 30,
  'maxlength' => 30,
  'control_name' => 'facliente[telpercon]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('facliente[corpercon]', __($labels['facliente{corpercon}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{corpercon}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{corpercon}')): ?> <?php echo form_error('facliente{corpercon}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getCorpercon', array (
  'size' => 55,
  'maxlength' => 100,
  'control_name' => 'facliente[corpercon]',
)); echo $value ? $value : '&nbsp;' ?></div>

</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos Representante Legal')?></legend>
<div class="form-row"><?php echo label_for('facliente[rifrepleg]', __($labels['facliente{rifrepleg}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{rifrepleg}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{rifrepleg}')): ?> <?php echo form_error('facliente{rifrepleg}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getRifrepleg', array (
  'size' => 20,
  'control_name' => 'facliente[rifrepleg]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('facliente[nomrepleg]', __($labels['facliente{nomrepleg}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{nomrepleg}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{nomrepleg}')): ?> <?php echo form_error('facliente{nomrepleg}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getNomrepleg', array (
  'size' => 50,
  'control_name' => 'facliente[nomrepleg]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('facliente[dirrepleg]', __($labels['facliente{dirrepleg}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{dirrepleg}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{dirrepleg}')): ?> <?php echo form_error('facliente{dirrepleg}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getDirrepleg', array (
  'size' => 80,
  'control_name' => 'facliente[dirrepleg]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('facliente[telrepleg]', __($labels['facliente{telrepleg}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{telrepleg}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{telrepleg}')): ?> <?php echo form_error('facliente{telrepleg}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getTelrepleg', array (
  'size' => 30,
  'maxlength' => 30,
  'control_name' => 'facliente[telrepleg]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('facliente[correpleg]', __($labels['facliente{correpleg}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{correpleg}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{correpleg}')): ?> <?php echo form_error('facliente{correpleg}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($facliente, 'getCorrepleg', array (
  'size' => 55,
  'maxlength' => 100,
  'control_name' => 'facliente[correpleg]',
)); echo $value ? $value : '&nbsp;' ?></div>

</div>
</fieldset>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Recaudos');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo label_for('facliente[codtiprec]', __($labels['facliente{codtiprec}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('facliente{codtiprec}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('facliente{codtiprec}')): ?> <?php echo form_error('facliente{codtiprec}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('facliente[codtiprec]', $facliente->getCodtiprec(),
    'facliente/autocomplete?ajax=4',  array('autocomplete' => 'off','size'=>6,'maxlength' => 4,
     'onBlur'=> remote_function(array(
        'update'   => 'doblelista',
        'url'      => 'facliente/doble?id='.$facliente->getId(),
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('facliente_codtiprec').value != '' ",
            'with' => "'ajax=4&cajtexmos=facliente_destiprec&cajtexcom=facliente_codtiprec&codigo='+this.value",
        'script'  => true,
        ))),
     array('use_style' => 'true')
  )
?>&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catiprec_Facliente/clase/Catiprec/frame/sf_admin_edit_form/obj1/facliente_codtiprec/obj2/facliente_destiprec/campo1/codtiprec/campo2/destiprec')?></th>

  <?php $value = object_input_tag($facliente, 'getDestiprec', array (
   'disabled' => true,
  'size' => 60,
  'control_name' => 'facliente[destiprec]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<div id="doblelista"class="form-row">
  <div class="content<?php if ($sf_request->hasError('facliente{recargo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{recargo}')): ?>
    <?php echo form_error('facliente{recargo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_double_list_criteria($c,$facliente, 'getRecargo', array (
  'control_name' => 'facliente[recargo]',
  'through_class' => 'Farecpro',
  'unassociated_label' => 'Recaudos',
  'associated_label' => 'Recaudos Seleccionados',
  'style' => 'width:450px'
)); echo $value ? $value : '&nbsp;' ?>


    </div>
</div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'Otras cuentas contables (Actividad Secundaria)');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo label_for('facliente[codctasec]', __($labels['facliente{codctasec}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codctasec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codctasec}')): ?>
    <?php echo form_error('facliente{codctasec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($facliente, 'getCodctasec', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'facliente[codctasec]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'facliente/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('facliente_codctasec').value != ''",
   'with' => "'ajax=2&cajtexmos=facliente_desctacodctasec&cajtexcom=facliente_codctasec&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Facliente/clase/Contabb/frame/sf_admin_edit_form/obj1/facliente_desctacodctasec/obj2/facliente_codctasec/campo1/descta/campo2/codcta')?>

 <?php $value = object_input_tag($facliente, 'getDesctacodctasec', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'facliente[desctacodctasec]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('facliente[codordadi]', __($labels['facliente{codordadi}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codordadi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codordadi}')): ?>
    <?php echo form_error('facliente{codordadi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($facliente, 'getCodordadi', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'facliente[codordadi]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'facliente/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('facliente_codordadi').value != ''",
   'with' => "'ajax=2&cajtexmos=facliente_desctacodordadi&cajtexcom=facliente_codordadi&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Facliente/clase/Contabb/frame/sf_admin_edit_form/obj1/facliente_desctacodordadi/obj2/facliente_codordadi/campo1/descta/campo2/codcta')?>

  <?php $value = object_input_tag($facliente, 'getDesctacodordadi', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'facliente[desctacodordadi]',
)); echo $value ? $value : '&nbsp;' ?>  </div>

<br>

 <?php echo label_for('facliente[codperconadi]', __($labels['facliente{codperconadi}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codperconadi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codperconadi}')): ?>
    <?php echo form_error('facliente{codperconadi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php $value = object_input_tag($facliente, 'getCodperconadi', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'facliente[codperconadi]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'facliente/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('facliente_codperconadi').value != ''",
   'with' => "'ajax=2&cajtexmos=facliente_desctacodperconadi&cajtexcom=facliente_codperconadi&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Facliente/clase/Contabb/frame/sf_admin_edit_form/obj1/facliente_desctacodperconadi/obj2/facliente_codperconadi/campo1/descta/campo2/codcta')?>

<?php $value = object_input_tag($facliente, 'getDesctacodperconadi', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'facliente[desctacodperconadi]',
)); echo $value ? $value : '&nbsp;' ?>  </div>

<br>

<fieldset id="sf_fieldset_none" class=""><legend>
<strong><?php echo  __('Cuentas de Orden para Artículos/Productos a Consignación :') ?></strong></legend>
<div class="form-row">
<?php echo label_for('facliente[codordmercon]', __($labels['facliente{codordmercon}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codordmercon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codordmercon}')): ?>
    <?php echo form_error('facliente{codordmercon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($facliente, 'getCodordmercon', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'facliente[codordmercon]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'facliente/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('facliente_codordmercon').value != ''",
   'with' => "'ajax=2&cajtexmos=facliente_desctacodordmercon&cajtexcom=facliente_codordmercon&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Facliente/clase/Contabb/frame/sf_admin_edit_form/obj1/facliente_desctacodordmercon/obj2/facliente_codordmercon/campo1/descta/campo2/codcta')?>

<?php $value = object_input_tag($facliente, 'getDesctacodordmercon', array (
  'disabled' => true,
  'size' => 80,
  'control_name' => 'facliente[desctacodordmercon]',
)); echo $value ? $value : '&nbsp;' ?>  </div>

<br>

<?php echo label_for('facliente[codpermercon]', __($labels['facliente{codpermercon}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codpermercon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codpermercon}')): ?>
    <?php echo form_error('facliente{codpermercon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($facliente, 'getCodpermercon', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'facliente[codpermercon]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'facliente/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('facliente_codpermercon').value != ''",
    'with' => "'ajax=2&cajtexmos=facliente_desctacodpermercon&cajtexcom=facliente_codpermercon&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Facliente/clase/Contabb/frame/sf_admin_edit_form/obj1/facliente_desctacodpermercon/obj2/facliente_codpermercon/campo1/descta/campo2/codcta')?>

 <?php $value = object_input_tag($facliente, 'getDesctacodpermercon', array (
  'disabled' => true,
  'size' => 80,
  'control_name' => 'facliente[desctacodpermercon]',
)); echo $value ? $value : '&nbsp;' ?>  </div>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class=""><legend>
<strong><?php echo  __('Cuentas de Orden para Contratos :') ?></strong></legend>
<div class="form-row">
<?php echo label_for('facliente[codordcontra]', __($labels['facliente{codordcontra}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codordcontra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codordcontra}')): ?>
    <?php echo form_error('facliente{codordcontra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($facliente, 'getCodordcontra', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'facliente[codordcontra]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'facliente/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('facliente_codordcontra').value != ''",
   'with' => "'ajax=2&cajtexmos=facliente_desctacodordcontra&cajtexcom=facliente_codordcontra&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Facliente/clase/Contabb/frame/sf_admin_edit_form/obj1/facliente_desctacodordcontra/obj2/facliente_codordcontra/campo1/descta/campo2/codcta')?>

<?php $value = object_input_tag($facliente, 'getDesctacodordcontra', array (
  'disabled' => true,
  'size' => 80,
  'control_name' => 'facliente[desctacodordcontra]',
)); echo $value ? $value : '&nbsp;' ?>  </div>

<br>

<?php echo label_for('facliente[codpercontra]', __($labels['facliente{codpercontra}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('facliente{codpercontra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('facliente{codpercontra}')): ?>
    <?php echo form_error('facliente{codpercontra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($facliente, 'getCodpercontra', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'facliente[codpercontra]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'facliente/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('facliente_codpercontra').value != ''",
   'with' => "'ajax=2&cajtexmos=facliente_desctacodpercontra&cajtexcom=facliente_codpercontra&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Facliente/clase/Contabb/frame/sf_admin_edit_form/obj1/facliente_desctacodpercontra/obj2/facliente_codpercontra/campo1/descta/campo2/codcta')?>

  <?php $value = object_input_tag($facliente, 'getDesctacodpercontra', array (
  'disabled' => true,
  'size' => 80,
  'control_name' => 'facliente[desctacodpercontra]',
)); echo $value ? $value : '&nbsp;' ?></div>
</div>
</fieldset>

</div>
</fieldset>

<?php tabInit();?>

<?php include_partial('edit_actions', array('facliente' => $facliente)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($facliente->getId()): ?>
<?php echo button_to(__('delete'), 'facliente/delete?id='.$facliente->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript" >

function validarExistencia(id)
{
  var codigo = $(id).value;
  if (codigo!='' && $('id').value=='')
  {
    new Ajax.Request('/facturacion'+$("entorno").value+'.php/facliente/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), seguirvalidarExistencia() }, parameters:'ajax=5&codigo='+codigo});
  }
}

function seguirvalidarExistencia()
{
  var cod = $('codproaux').value;
  if(cod!='-1')
  {
    alert('El Codigo de Cliente ya se encuentra registrado');
    $('facliente_codpro').value='';
    $('facliente_codpro').focus();
  }
}

function validarRif(id)
{
  var codigo = $(id).value;
  if (codigo!='' && $('id').value=='')
  {
    new Ajax.Request('/facturacion'+$("entorno").value+'.php/facliente/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), seguirvalidarRif() }, parameters:'ajax=6&codigo='+codigo});
  }
}

function seguirvalidarRif()
{
  var cod = $('rifproaux').value;
  if(cod!='-1')
  {
    alert('El RIF o CI ya se encuentra registrado');
    $('facliente_rifpro').value='';
    $('facliente_rifpro').focus();
  }
}


</script>

