<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/17 11:11:57
?>
<?php echo form_tag('almregpro/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'double_list_submit(); return true;'
)) ?>


<?php echo object_input_hidden_tag($caprovee, 'getId') ?>
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
   <?php echo label_for('caprovee[codpro]', __($labels['caprovee{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codpro}')): ?>
    <?php echo form_error('caprovee{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caprovee, 'getCodpro', array (
   'size'      => 15,
   'maxlength' => 15,
   'readonly'  => $caprovee->getId()!='' ? true : $corcodpro=='S' ? true : false ,
   'value'     => $caprovee->getId()=='' ? $corcodpro=='S' ? '########' : '' : $caprovee->getCodpro(),
   'control_name' => 'caprovee[codpro]',
   'onBlur'  => "javascript: valor=this.value; if ($('caprovee_codpro').value!='') valor=valor.pad(8, '0',0);document.getElementById('caprovee_codpro').value=valor;document.getElementById('caprovee_codpro').disabled=false;validarExistencia(this.id);",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 </th>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th>
  <?php echo label_for('caprovee[nompro]', __($labels['caprovee{nompro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{nompro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{nompro}')): ?>
    <?php echo form_error('caprovee{nompro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caprovee, 'getNompro', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'caprovee[nompro]',
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
 <fieldset id="sf_fieldset_none" class="">
    <legend><h2><?php echo  __('Tipo de Persona:') ?></h2></legend>
    <div class="form-row"  align="left">
   <?
if ($caprovee->getNitpro()=='J')  {
  ?><?php echo radiobutton_tag('caprovee[nitpro]', 'J', true, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false ))." Jurídica".'<br> ';
      echo radiobutton_tag('caprovee[nitpro]', 'N', false, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false))." Natural".'<br> ';
      echo radiobutton_tag('caprovee[nitpro]', 'G', false, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false))." Gubernamental".'<br>';  ?>

<? }else if ($caprovee->getNitpro()=='N'){?>
  <?php echo radiobutton_tag('caprovee[nitpro]', 'J', false, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false))." Jurídica".'<br>';
  echo radiobutton_tag('caprovee[nitpro]', 'N', true, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false))." Natural".'<br>';
  echo radiobutton_tag('caprovee[nitpro]', 'G', false, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false))." Gubernamental".'<br>';?>
<? }else if ($caprovee->getNitpro()=='G'){?>
  <?php echo radiobutton_tag('caprovee[nitpro]', 'J', false, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false))." Jurídica".'<br>';
  echo radiobutton_tag('caprovee[nitpro]', 'N', false, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false))." Natural".'<br>';
  echo radiobutton_tag('caprovee[nitpro]', 'G', true, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false))." Gubernamental".'<br>';?>

<? } else { ?>
    <?php echo radiobutton_tag('caprovee[nitpro]', 'J', false, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false))." Jurídica".'<br>';
    echo radiobutton_tag('caprovee[nitpro]', 'N', false, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false))." Natural".'<br>';
  echo radiobutton_tag('caprovee[nitpro]', 'G', false, array('onClick' => 'colocaletra(this.value);', 'readonly'  =>  $caprovee->getId()!='' ? true : false ))." Gubernamental".'<br>';  ?>
  <? } ?>
 </div> </fieldset>
 </th>
   <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
  <?php echo label_for('caprovee[rifpro]', __($labels['caprovee{rifpro}']), 'class="required" ') ?>
  <div
    class="content<?php if ($sf_request->hasError('caprovee{rifpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{rifpro}')): ?> <?php echo form_error('caprovee{rifpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($caprovee, 'getRifpro', array (
    'size' => 15,
    'maxlength' => 12,
    'readonly'  =>  $caprovee->getId()!='' ? true : false ,
    'control_name' => 'caprovee[rifpro]',
    'onKeyDown' => " if ($('id').value=='') {javascript:return dFilter (event.keyCode, this,'$mascararif')}",
    //'onBlur'  => "javascript: validarRif(this.id)",
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
 </tr>
</table>
 <br>

<table>
 <tr valign="top">

 <th><fieldset id="sf_fieldset_none" class="">
    <legend><h2><?php echo  __('Nacionalidad :') ?></h2></legend>
    <div class="form-row"  align="left">
    <?  if ($caprovee->getNacpro()=='N'){

        echo radiobutton_tag('caprovee[nacpro]','N', true, array('onClick' => 'colocaletra2(this.value);')) .'&nbsp;&nbsp;'. "Nacional"."<br>";
        echo radiobutton_tag('caprovee[nacpro]','P', false, array('onClick' => 'colocaletra2(this.value);')) .'&nbsp;&nbsp;'. "Internacional"."<br>";

      }elseif ($caprovee->getNacpro()=='P'){
        echo radiobutton_tag('caprovee[nacpro]','N', false, array('onClick' => 'colocaletra2(this.value);')) .'&nbsp;&nbsp;'. "Nacional".'&nbsp;&nbsp;'."<br>";
        echo radiobutton_tag('caprovee[nacpro]','P', true, array('onClick' => 'colocaletra2(this.value);')) .'&nbsp;&nbsp;'. "Internacional"."<br>";

      }else{
        echo radiobutton_tag('caprovee[nacpro]','N', true, array('onClick' => 'colocaletra2(this.value);')) .'&nbsp;&nbsp;'. "Nacional".'&nbsp;&nbsp;'."<br>";
        echo radiobutton_tag('caprovee[nacpro]','P', false, array('onClick' => 'colocaletra2(this.value);')) .'&nbsp;&nbsp;'. "Internacional"."<br>";
      }?>
 </div> </fieldset></th>
 <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
 <th><fieldset id="sf_fieldset_none" class="">
    <legend><h2><?php echo  __('Actividad Profesional :') ?></h2></legend>
    <div class="form-row"  align="left">
    <?  if ($caprovee->getTipo()=='P'){
      echo radiobutton_tag('caprovee[tipo]','P', true) .'&nbsp;&nbsp;'. "Cooperativa"."<br>";
      echo radiobutton_tag('caprovee[tipo]','C', false) .'&nbsp;&nbsp;'. "Contratista"."<br>";
      echo radiobutton_tag('caprovee[tipo]','O', false) .'&nbsp;&nbsp;'. "Proveedor"."<br>";

    }elseif ($caprovee->getTipo()=='C'){
      echo radiobutton_tag('caprovee[tipo]','P', false) .'&nbsp;&nbsp;'. "Cooperativa"."<br>";
      echo radiobutton_tag('caprovee[tipo]','C', true) .'&nbsp;&nbsp;'. "Contratista"."<br>";
      echo radiobutton_tag('caprovee[tipo]','O', false) .'&nbsp;&nbsp;'. "Proveedor"."<br>";
    }elseif ($caprovee->getTipo()=='O'){
      echo radiobutton_tag('caprovee[tipo]','P', false) .'&nbsp;&nbsp;'. "Cooperativa"."<br>";
      echo radiobutton_tag('caprovee[tipo]','C', false) .'&nbsp;&nbsp;'. "Contratista"."<br>";
      echo radiobutton_tag('caprovee[tipo]','O', true) .'&nbsp;&nbsp;'. "Proveedor"."<br>";

    }else{
      echo radiobutton_tag('caprovee[tipo]','P', true) .'&nbsp;&nbsp;'. "Cooperativa"."<br>";
      echo radiobutton_tag('caprovee[tipo]','C', false) .'&nbsp;&nbsp;'. "Contratista"."<br>";
      echo radiobutton_tag('caprovee[tipo]','O', false) .'&nbsp;&nbsp;'. "Proveedor"."<br>";
    }    ?>
  </div> </fieldset></th>
 </tr>
 </table>

 <br>

 <?php echo label_for('caprovee[dirpro]', __($labels['caprovee{dirpro}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{dirpro}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{dirpro}')): ?> <?php echo form_error('caprovee{dirpro}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caprovee, 'getDirpro', array (
  'size' => 80,
   'maxlength' => 100,
  'control_name' => 'caprovee[dirpro]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>
<table>
<tr>
 <th>
  <?php echo label_for('caprovee[telpro]', __($labels['caprovee{telpro}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caprovee{telpro}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{telpro}')): ?> <?php echo form_error('caprovee{telpro}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caprovee, 'getTelpro', array (
  'size' => 30,
   'maxlength' => 30,
   'control_name' => 'caprovee[telpro]',
)); echo $value ? $value : '&nbsp;' ?></div>
 </th>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th>
 <?php echo label_for('caprovee[faxpro]', __($labels['caprovee{faxpro}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{faxpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{faxpro}')): ?>
    <?php echo form_error('caprovee{faxpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caprovee, 'getFaxpro', array (
  'size' => 15,
   'maxlength' => 15,
  'control_name' => 'caprovee[faxpro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 </th>
</tr>
</table>

<br>

<table>
<tr>
<th>
<?php echo label_for('caprovee[nrocei]', __($labels['caprovee{nrocei}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{nrocei}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{nrocei}')): ?> <?php echo form_error('caprovee{nrocei}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caprovee, 'getNrocei', array (
  'size' => 30,
   'maxlength' => 30,
  'control_name' => 'caprovee[nrocei]',
)); echo $value ? $value : '&nbsp;' ?></div>

</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('caprovee[email]', __($labels['caprovee{email}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{email}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{email}')): ?> <?php echo form_error('caprovee{email}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caprovee, 'getEmail', array (
  'size' => 55,
   'maxlength' => 50,
  'control_name' => 'caprovee[email]',
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
</tr>
</table>

<br>

<?php echo label_for('caprovee[codram]', __($labels['caprovee{codram}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{codram}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{codram}')): ?> <?php echo form_error('caprovee{codram}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('caprovee[codram]', $caprovee->getCodram(),
    'almregpro/autocomplete?ajax=1', array('autocomplete' => 'off',
'maxlength' => 6,'size' => 7,'onBlur'=> remote_function(array(
      'url'      => 'almregpro/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('caprovee_codram').value != '' && $('id').value == ''",
         'with' => "'ajax=1&cajtexmos=caprovee_nomram&cajtexcom=caprovee_codram&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caramart_Almregpro/clase/Caramart/frame/sf_admin_edit_form/obj1/caprovee_nomram/obj2/caprovee_codram/campo1/nomram/campo2/ramart')?>
&nbsp;
<?php $value = object_input_tag($caprovee, 'getnomram', array (
  'size' => 50,
  'maxlength' => 80,
  'readonly' => true,
  'control_name' => 'caprovee[nomram]',
)); echo $value ? $value : '&nbsp;' ?></div>


<br>

   <?php echo label_for('caprovee[limcre]', __($labels['caprovee{limcre}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{limcre}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{limcre}')): ?> <?php echo form_error('caprovee{limcre}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
  <?php $value = object_input_tag($caprovee, array('getLimcre',true), array (
  'size' => 15,
  'control_name' => 'caprovee[limcre]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('caprovee[codcta]', __($labels['caprovee{codcta}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codcta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codcta}')): ?>
    <?php echo form_error('caprovee{codcta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($caprovee, 'getCodcta', array (
  'size' => 32,
  'maxlength' => $loncta,
  'readonly'  =>  $encontrado==true ? true : false ,
  'control_name' => 'caprovee[codcta]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'almregpro/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('caprovee_codcta').value != '' && $('id').value == ''",
   'with' => "'ajax=2&cajtexmos=caprovee_descta&cajtexcom=caprovee_codcta&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregpro/clase/Contabb/frame/sf_admin_edit_form/obj1/caprovee_descta/obj2/caprovee_codcta/campo1/descta/campo2/codcta')?>
&nbsp;
<?php $value = object_input_tag($caprovee, 'getDescta', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'caprovee[descta]',
)); echo $value ? $value : '&nbsp;' ?></div>


<br>

<?php echo label_for('caprovee[codord]', __($labels['caprovee{codord}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codord}')): ?>
    <?php echo form_error('caprovee{codord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php $value = object_input_tag($caprovee, 'getCodord', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'caprovee[codord]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'almregpro/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('caprovee_codord').value != ''",
   'with' => "'ajax=2&cajtexmos=caprovee_desctacodord&cajtexcom=caprovee_codord&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregpro/clase/Contabb/frame/sf_admin_edit_form/obj1/caprovee_desctacodord/obj2/caprovee_codord/campo1/descta/campo2/codcta')?>
&nbsp;
<?php $value = object_input_tag($caprovee, 'getDesctacodord', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'caprovee[desctacodord]',
)); echo $value ? $value : '&nbsp;' ?></div>


<br>

<?php echo label_for('caprovee[codpercon]', __($labels['caprovee{codpercon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codpercon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codpercon}')): ?>
    <?php echo form_error('caprovee{codpercon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caprovee, 'getCodpercon', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'caprovee[codpercon]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'almregpro/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('caprovee_codpercon').value != ''",
   'with' => "'ajax=2&cajtexmos=caprovee_desctacodpercon&cajtexcom=caprovee_codpercon&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregpro/clase/Contabb/frame/sf_admin_edit_form/obj1/caprovee_desctacodpercon/obj2/caprovee_codpercon/campo1/descta/campo2/codcta')?>
&nbsp;
<?php $value = object_input_tag($caprovee, 'getDesctacodpercon', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'caprovee[desctacodpercon]',
)); echo $value ? $value : '&nbsp;' ?></div>


<br>

<?php echo label_for('caprovee[fecinscir]', __($labels['caprovee{fecinscir}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{fecinscir}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{fecinscir}')): ?> <?php echo form_error('caprovee{fecinscir}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_date_tag($caprovee, 'getFecinscir', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caprovee[fecinscir]',
  'size' => 10,
  'maxlength' => 10,
   'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?></div>


<br>

  <?php echo label_for('caprovee[estpro]', __($labels['caprovee{estpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{estpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{estpro}')): ?>
    <?php echo form_error('caprovee{estpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php
	echo
	select_tag('caprovee[estpro]]', options_for_select(
	Constantes::ListaEstados(),
	$caprovee->getEstpro())
	);
?>

</div>

</fieldset>


<?php tabPageOpenClose("tp1", "tabPage2", 'Datos del Registro');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('caprovee[numinscir]', __($labels['caprovee{numinscir}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{numinscir}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{numinscir}')): ?> <?php echo form_error('caprovee{numinscir}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caprovee, 'getNuminscir', array (
  'size' => 20,
  'maxlength' => 20,
  'control_name' => 'caprovee[numinscir]',
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('caprovee[fecreg]', __($labels['caprovee{fecreg}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{fecreg}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{fecreg}')): ?> <?php echo form_error('caprovee{fecreg}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_date_tag($caprovee, 'getFecreg', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caprovee[fecreg]',
  'size' => 10,
  'maxlength' => 10,
   'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?></div>
</th>
</tr>
</table>

<br>

<table>
 <tr>
   <th>
   <?php echo label_for('caprovee[regmer]', __($labels['caprovee{regmer}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{regmer}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{regmer}')): ?> <?php echo form_error('caprovee{regmer}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caprovee, 'getRegmer', array (
  'size' => 20,
  'control_name' => 'caprovee[regmer]',
)); echo $value ? $value : '&nbsp;' ?></div>
   </th>
   <th>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
   <?php echo label_for('caprovee[folreg]', __($labels['caprovee{folreg}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{folreg}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{folreg}')): ?> <?php echo form_error('caprovee{folreg}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caprovee, 'getFolreg', array (
  'size' => 20,
  'control_name' => 'caprovee[folreg]',
)); echo $value ? $value : '&nbsp;' ?></div>
   </th>
 </tr>
</table>

<br>

<table>
 <tr>
 <th>
 <?php echo label_for('caprovee[tomreg]', __($labels['caprovee{tomreg}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{tomreg}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{tomreg}')): ?> <?php echo form_error('caprovee{tomreg}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caprovee, 'getTomreg', array (
  'size' => 20,
  'control_name' => 'caprovee[tomreg]',
)); echo $value ? $value : '&nbsp;' ?></div>
 </th>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th>
 <?php echo label_for('caprovee[cappag]', __($labels['caprovee{cappag}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{cappag}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{cappag}')): ?> <?php echo form_error('caprovee{cappag}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caprovee, array('getCappag',true), array (
  'size' => 20,
  'maxlength'=> 50,
  'control_name' => 'caprovee[cappag]',
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
 <?php echo label_for('caprovee[capsus]', __($labels['caprovee{capsus}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{capsus}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{capsus}')): ?> <?php echo form_error('caprovee{capsus}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caprovee, array('getCapsus',true), array (
  'size' => 20,
  'maxlength' => 50,
  'control_name' => 'caprovee[capsus]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
 )); echo $value ? $value : '&nbsp;' ?>
  </div>
 </th>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th>
 <?php echo label_for('caprovee[fecven]', __($labels['caprovee{fecven}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('caprovee{fecven}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caprovee{fecven}')): ?> <?php echo form_error('caprovee{fecven}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_date_tag($caprovee, 'getFecven', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caprovee[fecven]',
   'date_format' => 'dd/MM/yy',
   'size' => 10,
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?></div>
 </th>
 </tr>
</table>

<br>

  <?php echo label_for('caprovee[codtipemp]', __($labels['caprovee{codtipemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codtipemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codtipemp}')): ?>
    <?php echo form_error('caprovee{codtipemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('caprovee[codtipemp]', $caprovee->getCodtipemp(),
    'almregpro/autocomplete?ajax=5',  array('autocomplete' => 'off','size'=>6,'maxlength' => 4,
     'onBlur'=> remote_function(array(
        'url'      => 'almregpro/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('caprovee_codtipemp').value != '' && $('id').value == ''",
        'with' => "'ajax=7&cajtexmos=caprovee_destip&cajtexcom=caprovee_codtipemp&codigo='+this.value",
        ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catipempsnc_Almregpro/clase/Catipempsnc/frame/sf_admin_edit_form/obj1/caprovee_codtipemp/obj2/caprovee_destip/campo1/codtip/campo2/destip')?></th>

  <?php $value = object_input_tag($caprovee, 'getDestip', array (
  'disabled' => true,
  'size'=> 60,
  'control_name' => 'caprovee[destip]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br><br>

 <fieldset id="sf_fieldset_none" class="">
    <legend><h2><?php echo  __('Informacion Bancaria:') ?></h2></legend>
	<div class="form-row">
	  <?php echo label_for('caprovee[codban]', __($labels['caprovee{codban}']), 'class="required" ') ?>
	  <div class="content<?php if ($sf_request->hasError('caprovee{codban}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('caprovee{codban}')): ?>
	    <?php echo form_error('caprovee{codban}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

        <?php $value = get_partial('codban', array('type' => 'edit', 'caprovee' => $caprovee)); echo $value ? $value : '&nbsp;' ?>
	    </div>

<br >

	  <?php echo label_for('caprovee[numcue]', __($labels['caprovee{numcue}']), 'class="required"') ?>
	  <div class="content<?php if ($sf_request->hasError('caprovee{numcue}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('caprovee{numcue}')): ?>
	    <?php echo form_error('caprovee{numcue}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($caprovee, 'getNumcue', array (
	  'size' => 20,
	  'maxlength' => 20,
	  'control_name' => 'caprovee[numcue]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>

<br >

	  <?php echo label_for('caprovee[codtip]', __($labels['caprovee{codtip}']), 'class="required"') ?>
	  <div class="content<?php if ($sf_request->hasError('caprovee{codtip}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('caprovee{codtip}')): ?>
	    <?php echo form_error('caprovee{codtip}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

		<?php $value = get_partial('codtip', array('type' => 'edit', 'caprovee' => $caprovee)); echo $value ? $value : '&nbsp;' ?>
	    </div>
	</div>

 </fieldset>

</fieldset>


<?php tabPageOpenClose("tp1", "tabPage5", 'Contactos');?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('caprovee[gripcontactos]', __(''), '') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{gripcontactos}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{gripcontactos}')): ?>
    <?php echo form_error('caprovee{gripcontactos}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('gripcontactos', array('type' => 'edit', 'caprovee' => $caprovee)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


</fieldset>


<?php tabPageOpenClose("tp1", "tabPage6", 'Ramos');?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('caprovee[gripramos]', __(''), '') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{gripramos}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{gripramos}')): ?>
    <?php echo form_error('caprovee{gripramos}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('gripramos', array('type' => 'edit', 'caprovee' => $caprovee)); echo $value ? $value : '&nbsp;' ?>

</div>

  <?php echo label_for('caprovee[ramgen]', __($labels['caprovee{ramgen}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{ramgen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{ramgen}')): ?>
    <?php echo form_error('caprovee{ramgen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($caprovee, 'getRamgen', array (
  'size' => '90x2',
  'control_name' => 'caprovee[ramgen]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</div>

<?php tabPageOpenClose("tp1", "tabPage7", 'Retenciones');?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('caprovee[gripretenciones]', __(''), '') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{gripretenciones}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{gripretenciones}')): ?>
    <?php echo form_error('caprovee{gripretenciones}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('gripretenciones', array('type' => 'edit', 'caprovee' => $caprovee)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Recaudos');?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('caprovee[codtiprec]', __($labels['caprovee{codtiprec}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codtiprec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codtiprec}')): ?>
    <?php echo form_error('caprovee{codtiprec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('codtiprec', array('type' => 'edit', 'caprovee' => $caprovee)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('caprovee[griprecaudos]', __(''), '') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{griprecaudos}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{griprecaudos}')): ?>
    <?php echo form_error('caprovee{griprecaudos}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('griprecaudos', array('type' => 'edit', 'caprovee' => $caprovee)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'Otras cuentas contables (Actividad Secundaria)');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo label_for('caprovee[codctasec]', __($labels['caprovee{codctasec}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codctasec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codctasec}')): ?>
    <?php echo form_error('caprovee{codctasec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caprovee, 'getCodctasec', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'caprovee[codctasec]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'almregpro/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('caprovee_codctasec').value != ''",
   'with' => "'ajax=2&cajtexmos=caprovee_desctacodctasec&cajtexcom=caprovee_codctasec&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregpro/clase/Contabb/frame/sf_admin_edit_form/obj1/caprovee_desctacodctasec/obj2/caprovee_codctasec/campo1/descta/campo2/codcta')?>

 <?php $value = object_input_tag($caprovee, 'getDesctacodctasec', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'caprovee[desctacodctasec]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('caprovee[codordadi]', __($labels['caprovee{codordadi}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codordadi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codordadi}')): ?>
    <?php echo form_error('caprovee{codordadi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caprovee, 'getCodordadi', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'caprovee[codordadi]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'almregpro/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('caprovee_codordadi').value != ''",
   'with' => "'ajax=2&cajtexmos=caprovee_desctacodordadi&cajtexcom=caprovee_codordadi&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregpro/clase/Contabb/frame/sf_admin_edit_form/obj1/caprovee_desctacodordadi/obj2/caprovee_codordadi/campo1/descta/campo2/codcta')?>

  <?php $value = object_input_tag($caprovee, 'getDesctacodordadi', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'caprovee[desctacodordadi]',
)); echo $value ? $value : '&nbsp;' ?>  </div>

<br>

 <?php echo label_for('caprovee[codperconadi]', __($labels['caprovee{codperconadi}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codperconadi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codperconadi}')): ?>
    <?php echo form_error('caprovee{codperconadi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php $value = object_input_tag($caprovee, 'getCodperconadi', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'caprovee[codperconadi]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'almregpro/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('caprovee_codperconadi').value != ''",
   'with' => "'ajax=2&cajtexmos=caprovee_desctacodperconadi&cajtexcom=caprovee_codperconadi&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregpro/clase/Contabb/frame/sf_admin_edit_form/obj1/caprovee_desctacodperconadi/obj2/caprovee_codperconadi/campo1/descta/campo2/codcta')?>

<?php $value = object_input_tag($caprovee, 'getDesctacodperconadi', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'caprovee[desctacodperconadi]',
)); echo $value ? $value : '&nbsp;' ?>  </div>

<br>

<fieldset id="sf_fieldset_none" class=""><legend>
<h2><?php echo  __('Cuentas de Orden para Mercancias a Consignación :') ?></h2></legend>
<div class="form-row">
<?php echo label_for('caprovee[codordmercon]', __($labels['caprovee{codordmercon}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codordmercon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codordmercon}')): ?>
    <?php echo form_error('caprovee{codordmercon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($caprovee, 'getCodordmercon', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'caprovee[codordmercon]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'almregpro/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('caprovee_codordmercon').value != ''",
   'with' => "'ajax=2&cajtexmos=caprovee_desctacodordmercon&cajtexcom=caprovee_codordmercon&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregpro/clase/Contabb/frame/sf_admin_edit_form/obj1/caprovee_desctacodordmercon/obj2/caprovee_codordmercon/campo1/descta/campo2/codcta')?>

<?php $value = object_input_tag($caprovee, 'getDesctacodordmercon', array (
  'disabled' => true,
  'size' => 58,
  'control_name' => 'caprovee[desctacodordmercon]',
)); echo $value ? $value : '&nbsp;' ?>  </div>

<br>

<?php echo label_for('caprovee[codpermercon]', __($labels['caprovee{codpermercon}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codpermercon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codpermercon}')): ?>
    <?php echo form_error('caprovee{codpermercon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($caprovee, 'getCodpermercon', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'caprovee[codpermercon]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'almregpro/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('caprovee_codpermercon').value != ''",
    'with' => "'ajax=2&cajtexmos=caprovee_desctacodpermercon&cajtexcom=caprovee_codpermercon&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregpro/clase/Contabb/frame/sf_admin_edit_form/obj1/caprovee_desctacodpermercon/obj2/caprovee_codpermercon/campo1/descta/campo2/codcta')?>

 <?php $value = object_input_tag($caprovee, 'getDesctacodpermercon', array (
  'disabled' => true,
  'size' => 58,
  'control_name' => 'caprovee[desctacodpermercon]',
)); echo $value ? $value : '&nbsp;' ?>  </div>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class=""><legend>
<h2><?php echo  __('Cuentas de Orden para Contratos :') ?></h2></legend>
<div class="form-row">
<?php echo label_for('caprovee[codordcontra]', __($labels['caprovee{codordcontra}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codordcontra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codordcontra}')): ?>
    <?php echo form_error('caprovee{codordcontra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caprovee, 'getCodordcontra', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'caprovee[codordcontra]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'almregpro/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('caprovee_codordcontra').value != ''",
   'with' => "'ajax=2&cajtexmos=caprovee_desctacodordcontra&cajtexcom=caprovee_codordcontra&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregpro/clase/Contabb/frame/sf_admin_edit_form/obj1/caprovee_desctacodordcontra/obj2/caprovee_codordcontra/campo1/descta/campo2/codcta')?>

<?php $value = object_input_tag($caprovee, 'getDesctacodordcontra', array (
  'disabled' => true,
  'size' => 58,
  'control_name' => 'caprovee[desctacodordcontra]',
)); echo $value ? $value : '&nbsp;' ?>  </div>

<br>

<?php echo label_for('caprovee[codpercontra]', __($labels['caprovee{codpercontra}']), 'class="required" Style="width:120px"') ?>
  <div class="content<?php if ($sf_request->hasError('caprovee{codpercontra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprovee{codpercontra}')): ?>
    <?php echo form_error('caprovee{codpercontra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caprovee, 'getCodpercontra', array (
  'size' => 32,
  'maxlength' => $loncta,
  'control_name' => 'caprovee[codpercontra]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
   'url'      => 'almregpro/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('caprovee_codpercontra').value != ''",
   'with' => "'ajax=2&cajtexmos=caprovee_desctacodpercontra&cajtexcom=caprovee_codpercontra&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregpro/clase/Contabb/frame/sf_admin_edit_form/obj1/caprovee_desctacodpercontra/obj2/caprovee_codpercontra/campo1/descta/campo2/codcta')?>

  <?php $value = object_input_tag($caprovee, 'getDesctacodpercontra', array (
  'disabled' => true,
  'size' => 58,
  'control_name' => 'caprovee[desctacodpercontra]',
)); echo $value ? $value : '&nbsp;' ?></div>
</div>
</fieldset>

</div>
</fieldset>

<?php tabInit();?>

<?php include_partial('edit_actions', array('caprovee' => $caprovee)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($caprovee->getId()): ?>
<?php echo button_to(__('delete'), 'almregpro/delete?id='.$caprovee->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript" >
  var correlp='<?php echo $manprocor ?>';
  if (correlp=='S' && $('id').value=='')
  {
  	$('caprovee_codpro').value='###########';
  	$('caprovee_codpro').readOnly=true;
  }


function validarExistencia(id)
{
  var codigo = $(id).value;
  if (codigo!='' && $('id').value=='')
  {
    new Ajax.Request('/compras'+$("entorno").value+'.php/almregpro/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), seguirvalidarExistencia() }, parameters:'ajax=5&codigo='+codigo});
  }
}

function seguirvalidarExistencia()
{
  var cod = $('codproaux').value;
  if(cod!='-1')
  {
    alert('El Codigo de la Contratistas de Bienes o Servicio y Cooperativas ya se encuentra registrado');
    $('caprovee_codpro').value='';
    $('caprovee_codpro').focus();
  }
}

function validarRif(id)
{
  var codigo = $(id).value;
  if (codigo!='' && $('id').value=='')
  {
    new Ajax.Request('/compras'+$("entorno").value+'.php/almregpro/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), seguirvalidarRif() }, parameters:'ajax=6&codigo='+codigo});
  }
}

function seguirvalidarRif()
{
  var cod = $('rifproaux').value;
  if(cod!='-1')
  {
    alert('El RIF o CI ya se encuentra registrado');
    $('caprovee_rifpro').value='';
    $('caprovee_rifpro').focus();
  }
}

function colocaletra(valor)
{
  var idpro='<?php echo $caprovee->getId() ?>';
  if (idpro==''){
  $('caprovee_rifpro').value=valor;
  }
}

function colocaletra2(valor)
{
  var idpro='<?php echo $caprovee->getId() ?>';
  if (idpro==''){
    if ($('caprovee_nitpro_N').checked)
    {
      if (valor=='N') valnew='V';
      else valnew='E';
      $('caprovee_rifpro').value=valnew;
    }
  
  }
}


</script>

