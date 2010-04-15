<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/20 10:29:35
?>

<?php echo form_tag('almregart/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'compras/almregart', 'tools','observe') ?>
<?php echo input_hidden_tag('totalfilas', '') ?>

<?php echo object_input_hidden_tag($caregart, 'getId') ?>

<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $mensaler;?></font></strong></th>
  </tr>
</table>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Artículo ó Servicio')?></legend>
<div class="form-row">
<table>
 <tr>
  <th>
  <?php echo label_for('caregart[codart]', __($labels['caregart{codart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{codart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{codart}')): ?>
    <?php echo form_error('caregart{codart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php if ($caregart->getId()=="") { ?>
  <?php $value = object_input_tag($caregart, 'getCodart', array (
  'size' => 15,
  'control_name' => 'caregart[codart]',
  'maxlength' => $longart,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraarticulo');",
  'onKeyUp' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();$('caregart_codart').value=cadena;",
  'onBlur'=> remote_function(array(
        'url'      => 'almregart/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('caregart_codart').value != '' && $('id').value == ''",
        'script' => true,
          'with' => "'ajax=4&cajtexmos=deshab&tipart='+$('caregart_tipo_A').checked+'&tipser='+$('caregart_tipo_S').checked+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
<?php if ($caregart->getGencorart()=='S') { ?>
<div class="sf_admin_edit_help"><?php echo __('Por favor, indique con # en la ultima ruptura si el código a registrar es de último nivel') ?></div>
<?php }?>
<?php } else { ?>
<?php $value = object_input_tag($caregart, 'getCodart', array (
  'size' => 15,
  'readonly' => true,
  'control_name' => 'caregart[codart]',
  'maxlength' => $longart,
  //'onBlur' => "javascript:cadena=rayitas(this.value);document.getElementById('caregart_codart').value=cadena;",
  //'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraarticulo')",
  /**si es cunsulta y debe estar en readonly la cajita no necesita el onKeyDown**/
)); echo $value ? $value : '&nbsp;' ?> <?php } ?></div></th><?php echo input_hidden_tag('deshab', '') ?>
  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th><?
  if ($caregart->getTipo()=='S'){$valor1 = false;}else{ $valor1=true;}

  if ($caregart->getId()=='') //Es una Articulo o Servicio Nuevo
  {
       echo radiobutton_tag('caregart[tipo]', 'A', $valor1, array('id'=>'caregart_tipo_A'))        ."Artículo".'&nbsp;&nbsp;';
       echo "<br>".radiobutton_tag('caregart[tipo]', 'S', !$valor1, array('id'=>'caregart_tipo_S'))."   Servicio";
  }
  else //Aqui es modo Consulta  o Edicion
  {
      echo radiobutton_tag('caregart[tipo]', 'A', $valor1, array('id'=>'caregart_tipo_A'))        ."Artículo".'&nbsp;&nbsp;';
      echo "<br>".radiobutton_tag('caregart[tipo]', 'S', !$valor1, array('id'=>'caregart_tipo_S'))."   Servicio";
  }
?></th>
  <th>&nbsp; &nbsp;&nbsp;</th>
  <th><?php echo label_for('caregart[codcta]', __($labels['caregart{codcta}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{codcta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{codcta}')): ?>
    <?php echo form_error('caregart{codcta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getCodcta', array (
  'size' => 20,
  'maxlength' => $longcont,
  'control_name' => 'caregart[codcta]',
  //'onBlur' => "javascript:cadena=rayitas(this.value);document.getElementById('caregart_codcta').value=cadena; var aux=$('caregart_codcta').value; aux2=aux.split('-'); if (aux2[0]=='' || $('caregart_codcta').value=='undefined'){ $('caregart_codcta').value='';}",
  //'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onKeyPress' =>  "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
        'url'      => 'almregart/ajax',
        'complete' => 'AjaxJSON(request, json), $("caregart_desart").focus()',
        'condition' => "$('caregart_codcta').value != ''",
        'script' => true,
         'with' => "'ajax=8&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>



&nbsp;</div></th>
<th>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregart/clase/Contabb/frame/sf_admin_edit_form/obj1/caregart_codcta','','','botoncat')?></th>
 </tr>
</table>

<br>

  <?php echo label_for('caregart[desart]', __($labels['caregart{desart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{desart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{desart}')): ?>
    <?php echo form_error('caregart{desart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_textarea_tag($caregart, 'getDesart', array (
  'size' => '80x5',
  'control_name' => 'caregart[desart]',
  'maxlength' => 1500,
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
   </div>

<br>

  <table>
   <tr>
    <th><?php echo label_for('caregart[ramart]', __($labels['caregart{ramart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{ramart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{ramart}')): ?>
    <?php echo form_error('caregart{ramart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('caregart[ramart]', $caregart->getRamart(),
    'almregart/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 6, 'onBlur'=> remote_function(array(
        'url'      => 'almregart/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('caregart_ramart').value != ''",
          'with' => "'ajax=1&cajtexmos=caregart_nomram&cajtexcom=caregart_ramart&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?>&nbsp;&nbsp;&nbsp;</div></th>
   <th><?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caramart_Almregart/clase/Caramart/frame/sf_admin_edit_form/obj1/caregart_ramart/obj2/caregart_nomram','','','botoncat')?></th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>
     <?php $value = object_input_tag($caregart, 'getNomram', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'caregart[nomram]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>
  <table>
   <tr>
    <th><?php echo label_for('caregart[codpar]', __($labels['caregart{codpar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{codpar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{codpar}')): ?>
    <?php echo form_error('caregart{codpar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getCodpar', array (
  'size' => 20,
  'maxlength' => $longpar,
  'control_name' => 'caregart[codpar]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascarapartida');",
  'onBlur'=> remote_function(array(
        'url'      => 'almregart/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('caregart_codpar').value != ''",
        'script' => true,
         'with' => "'ajax=5&cajtexcom=caregart_codpar&cajtexmos=caregart_nompar&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;</div></th>
   <th><?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nppartidas_Almregart/clase/Nppartidas/frame/sf_admin_edit_form/obj1/caregart_codpar/obj2/caregart_nompar','','','botoncat')?></th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>
     <?php $value = object_input_tag($caregart, 'getNompar', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'caregart[nompar]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>

  <table>
   <tr>
    <th><?php echo label_for('caregart[unimed]', __($labels['caregart{unimed}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{unimed}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{unimed}')): ?>
    <?php echo form_error('caregart{unimed}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getUnimed', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'caregart[unimed]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
   </tr>
  </table>

<br>

  <table>
   <tr>
    <th>  <?php echo label_for('caregart[unialt]', __($labels['caregart{unialt}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{unialt}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{unialt}')): ?>
    <?php echo form_error('caregart{unialt}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getUnialt', array (
  'size' => 20,
  'control_name' => 'caregart[unialt]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?></div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('caregart[relart]', __($labels['caregart{relart}']), 'class="required" Style="width:80px"') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{relart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{relart}')): ?>
    <?php echo form_error('caregart{relart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getRelart', array (
  'size' => 25,
  'maxlength' => 26,
  'control_name' => 'caregart[relart]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
   </tr>
  </table>
<br>
  <table>
   <tr>
    <th><?php echo label_for('caregart[exitot]', __($labels['caregart{exitot}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{exitot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{exitot}')): ?>
    <?php echo form_error('caregart{exitot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart,array('getExitot',true), array (
  'size' => 10,
  'control_name' => 'caregart[exitot]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

<th><?php echo label_for('caregart[fecult]', __($labels['caregart{fecult}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{fecult}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{fecult}')): ?>
    <?php echo form_error('caregart{fecult}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($caregart, 'getFecult', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caregart[fecult]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
   </tr>
  </table>

 <table>
   <tr>
    <th>
  <?php echo label_for('caregart[codartsnc]', __($labels['caregart{codartsnc}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{codartsnc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{codartsnc}')): ?>
    <?php echo form_error('caregart{codartsnc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php  $value = object_input_tag($caregart, 'getCodartsnc', array (
  'size' => 15,
  'control_name' => 'caregart[codartsnc]',
  'maxlength' => $longcatsnc,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaracatsnc');",
  'onBlur'=> remote_function(array(
        'url'      => 'almregart/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('caregart_codartsnc').value != ''",
        'script' => true,
          'with' => "'ajax=6&cajtexmos=caregart_dessnc&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cacatsnc_Almregart/clase/Cacatsnc/frame/sf_admin_edit_form/obj1/caregart_codartsnc/obj2/caregart_dessnc/campo1/codsnc/campo2/dessnc','','','botoncat')?>
&nbsp;&nbsp;
<?php $value = object_input_tag($caregart, 'getDessnc', array (
 'size' => 60,
 'disabled' => true,
  'control_name' => 'caregart[dessnc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
<br>
  <table>
   <tr>
    <th><fieldset id="sf_fieldset_none" class="">
      <legend><?php echo __('Costos')?></legend>
      <div class="form-row">
     <table>
      <tr>
      <th> <?php echo label_for('caregart[cosult]', __($labels['caregart{cosult}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{cosult}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{cosult}')): ?>
    <?php echo form_error('caregart{cosult}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, array('getCosult',true), array (
  'size' => 15,
  'control_name' => 'caregart[cosult]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
      <th>&nbsp;</th>
      <th><?php echo label_for('caregart[cospro]', __($labels['caregart{cospro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{cospro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{cospro}')): ?>
    <?php echo form_error('caregart{cospro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, array('getCospro',true), array (
  'size' => 15,
  'control_name' => 'caregart[cospro]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
      </tr>
     </table>
     </div>
     </fieldset>
    </th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Existencia')?></legend>
<div class="form-row">
  <?php echo label_for('caregart[invini]', __($labels['caregart{invini}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{invini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{invini}')): ?>
    <?php echo form_error('caregart{invini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, array('getInvini',true), array (
  'size' => 15,
  'control_name' => 'caregart[invini]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div></fieldset></th>
   </tr>
  </table>
  </div>
</fieldset>


<?php
    if($sf_user->getAttribute('menu','','autenticacion')=='facturacion'){
      echo '<fieldset>';
      include_partial('almregart/facturacion', array('caregart' => $caregart, 'mascaraarticulo' => $mascaraarticulo, 'longart' => $longart, 'mascaracontabilidad' => $mascaracontabilidad, 'longcont' => $longcont, 'mascarapartida' => $mascarapartida, 'longpar' => $longpar, 'mascaraubicacion' => $mascaraubicacion, 'longubi' => $longubi, 'mascaracatsnc' => $mascaracatsnc, 'longcatsnc' => $longcatsnc, 'labels' => $labels, 'obj' => $obj, 'mensaler' => $mensaler));
      echo '</fieldset>';
    }
?>
</fieldset>
<br>
<div id="divGrid" style="display:none">
</div>
<?php
echo grid_tag($obj);
?>


</form>

<?php include_partial('edit_actions', array('caregart' => $caregart)) ?>

  <ul class="sf_admin_actions">
    <li class="float-rigth"><?php if ($caregart->getId()): ?> <?php echo button_to(__('delete'), 'almregart/delete?id='.$caregart->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?></li>
  </ul>

