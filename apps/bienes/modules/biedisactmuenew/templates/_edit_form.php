<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/03 12:24:32
?>
<?php echo form_tag('biedisactmuenew/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('Grid') ?>
<?php use_helper('Date') ?>
<?php echo javascript_include_tag('Linktoapp','observe') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>
<?php use_helper('tabs') ?>

<?php echo object_input_hidden_tag($bndismue, 'getId') ?>
<?php echo object_input_hidden_tag($bndismue, 'getIdrefer') ?>

<fieldset id="sf_fieldset_none" class="">
<h2>Datos</h2>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('bndismue[codact]', __($labels['bndismue{codact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndismue{codact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndismue{codact}')): ?>
    <?php echo form_error('bndismue{codact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndismue, 'getCodact', array (
  'size' => 15,
  'readonly'  =>  $bndismue->getId()!='' ? true : false ,
  'control_name' => 'bndismue[codact]',
  'maxlength' => strlen($mascaracatalogo),
  'onKeypress' => "javascript:return dFilter (event.keyCode, this,'$mascaracatalogo')",
  'onBlur'=> remote_function(array(
  'url'      => 'biedisactmuenew/ajax',
  'condition' => "$('bndismue_codact').value != '' && $('id').value == ''",
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=4&cajtexmos=bndismue_codact&cajtexcom=bndismue_codact&codmue='+$('bndismue_codmue').value+'&cajtexubi=bndismue_codubiori&cajtexdesubi=bndismue_desubiori&codigo='+this.value",
)),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnregmue_Biedisactmuenew/clase/Bnregmue/frame/sf_admin_edit_form/obj1/bndismue_codact/obj2/bndismue_codmue/obj3/bndismue_desmue/obj4/bndismue_mondismue/obj5/bndismue_codubiori/campo1/codact/campo2/codmue/campo3/desmue/campo4/valini/campo5/codubi/param1/')?>
</th>
</div>
<th></th>
<th>
<?php echo label_for('bndismue[codmue]', __($labels['bndismue{codmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndismue{codmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndismue{codmue}')): ?>
    <?php echo form_error('bndismue{codmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($bndismue, 'getCodmue', array (
  'size' => 15,
  'readonly'  =>  $bndismue->getId()!='' ? true : false ,
  'control_name' => 'bndismue[codmue]',
  'onBlur'=> remote_function(array(
  'url'      => 'biedisactmuenew/ajax',
  'condition' => "$('bndismue_codmue').value != '' && $('id').value == ''",
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=1&cajtexmos=bndismue_codact&cajtexcom=bndismue_desmue&cajtexubi=bndismue_codubiori&cajtexdesubi=bndismue_desubiori&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnregmue_Biedisactmuenew1/clase/Bnregmue/frame/sf_admin_edit_form/obj1/bndismue_codmue/obj2/bndismue_codact/obj3/bndismue_desmue/obj4/bndismue_mondismue/campo1/codmue/campo2/codact/campo3/desmue/campo4/valini/param1/')?>
</th>
</tr>
</table>
<?php echo label_for('bndismue[desmue]', __('Descripción'), 'class="required" ') ?>
   <?php $value = object_input_tag($bndismue, 'getDesmue', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'bndismue[desmue]',
)); echo $value ? $value : '&nbsp;' ?>

</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<h2>Transacci&oacute;n</h2>
<div class="form-row">
  <?php echo label_for('bndismue[nrodismue]', __($labels['bndismue{nrodismue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndismue{nrodismue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndismue{nrodismue}')): ?>
    <?php echo form_error('bndismue{nrodismue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndismue, 'getNrodismue', array (
  'size' => 15,
  'readonly'  =>  $bndismue->getId()!='' ? true : false ,
  'control_name' => 'bndismue[nrodismue]',
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('bndismue_codmot').focus();}",
  'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Tipo</strong>&nbsp;&nbsp;&nbsp;
<?php echo select_tag('bndismue[tipdismue]', options_for_select($tipos,$bndismue->getTipdismue()), array('disabled'  =>  $bndismue->getId()!='' ? true : false )); ?>
</div>
<br>
  <?php echo label_for('bndismue[codmot]', __($labels['bndismue{codmot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndismue{codmot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndismue{codmot}')): ?>
    <?php echo form_error('bndismue{codmot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndismue, 'getCodmot', array (
  'size' => 7 ,
  'readonly'  =>  $bndismue->getId()!='' ? true : false ,
  'control_name' => 'bndismue[codmot]',
  'onBlur'=> remote_function(array(
  'url'      => 'biedisactmuenew/ajax',
  'complete' => 'AjaxJSON(request, json)',
  'condition' => "$('bndismue_codmot').value != '' && $('id').value == '' ",
  'with' => "'ajax=2&cajtexmos=bndismue_desmot&cajtexcom=bndismue_codmot&codigo='+this.value",
     )),
)); echo $value ? $value : '&nbsp;' ?>

 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnmotdis_Biedisactmuenew/clase/Bnmotdis/frame/sf_admin_edit_form/obj1/bndismue_codmot/obj2/bndismue_desmot/campo1/codmot/campo2/desmot/param1/')?>

 <?php $value = object_input_tag($bndismue, 'getDesmot', array (
  'size' => 66,
  'disabled' => true,
  'control_name' => 'bndismue[desmot]',
)); echo $value ? $value : '&nbsp;' ?>

</div>
<br>
<table>
<tr>
<th>
<?php echo label_for('bndismue[fecdismue]', __($labels['bndismue{fecdismue}']), 'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('bndismue{fecdismue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndismue{fecdismue}')): ?>
    <?php echo form_error('bndismue{fecdismue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bndismue, 'getFecdismue', array (
  'size' => 11,
  'rich' => true,
  'readonly'  =>  $bndismue->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bndismue[fecdismue]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
</th>
<th>
<?php echo label_for('bndismue[fecdevdis]', __($labels['bndismue{fecdevdis}']), 'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('bndismue{fecdevdis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndismue{fecdevdis}')): ?>
    <?php echo form_error('bndismue{fecdevdis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_date_tag($bndismue, 'getFecdevdis', array (
  'rich' => true,
  'readonly'  =>  $bndismue->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bndismue[fecdevdis]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
</th>
<th>
<?php echo label_for('bndismue[mondismue]', __($labels['bndismue{mondismue}']), 'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('bndismue{mondismue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndismue{mondismue}')): ?>
    <?php echo form_error('bndismue{mondismue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php $value = object_input_tag($bndismue, array('getMondismue',true), array (
  'size' => 10,
  'readonly'  =>  $bndismue->getId()!='' ? true : false ,
  'control_name' => 'bndismue[mondismue]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>
<br>
<br>
 <div align="center"> <?php echo label_for('bndismue[detdismue]', __($labels['bndismue{detdismue}']), 'class="required" ') ?></div>
  <div class="content<?php if ($sf_request->hasError('bndismue{detdismue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndismue{detdismue}')): ?>
    <?php echo form_error('bndismue{detdismue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($bndismue, 'getDetdismue', array (
  'size' => '80x3',
  'control_name' => 'bndismue[detdismue]',
)); echo $value ? $value : '&nbsp;' ?>

</div>
</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<h2>Ubicaci&oacute;n</h2>
<div class="form-row" >
  <?php echo label_for('bndismue[codubiori]', __($labels['bndismue{codubiori}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndismue{codubiori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndismue{codubiori}')): ?>
    <?php echo form_error('bndismue{codubiori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndismue, 'getCodubiori', array (
  'size' => strlen($mascaraformatoubi),
  'maxlength' => strlen($mascaraformatoubi),
  'readonly'  =>  $bndismue->getId()!='' ? true : false ,
  'control_name' => 'bndismue[codubiori]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraformatoubi')",
  'onBlur'=> remote_function(array(
  'url'      => 'biedisactmuenew/ajax',
  'condition' => "$('bndismue_codubiori').value != '' && $('id').value == '' ",
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=3&cajtexmos=bndismue_desubiori&cajtexcom=bndismue_codubiori&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>


<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Biedisactmuenew/clase/Bnubibie/frame/sf_admin_edit_form/obj1/bndismue_codubiori/obj2/bndismue_desubiori/campo1/codubi/campo2/desubi/param1/')?>


<?php $value = object_input_tag($bndismue, 'getDesubiori', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'bndismue[desubiori]',
)); echo $value ? $value : '&nbsp;' ?>
</div>


<br>
  <?php echo label_for('bndismue[codubides]', __($labels['bndismue{codubides}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndismue{codubides}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndismue{codubides}')): ?>
    <?php echo form_error('bndismue{codubides}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php $value = object_input_tag($bndismue, 'getCodubides', array (
  'size' => strlen($mascaraformatoubi),
  'readonly'  =>  $bndismue->getId()!='' ? true : false ,
  'maxlength' => strlen($mascaraformatoubi),
  'control_name' => 'bndismue[codubides]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraformatoubi')",
  'onBlur'=> remote_function(array(
        'url'      => 'biedisactmuenew/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('bndismue_codubides').value != '' && $('id').value == '' ",
          'with' => "'ajax=3&cajtexmos=bndismue_desubides&cajtexcom=bndismue_codubides&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Biedisactmuenew/clase/Bnubibie/frame/sf_admin_edit_form/obj1/bndismue_codubides/obj2/bndismue_desubides/campo1/codubi/campo2/desubi/param1/')?>


<?php $value = object_input_tag($bndismue, 'getDesubides', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'bndismue[desubides]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<br>
<fieldset>
<div class="form-row">
  <?php echo label_for('bndismue[obsdismue]', __($labels['bndismue{obsdismue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndismue{obsdismue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndismue{obsdismue}')): ?>
    <?php echo form_error('bndismue{obsdismue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($bndismue, 'getObsdismue', array (
  'size' => '80x3',
  'control_name' => 'bndismue[obsdismue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



</fieldset>


<ul class="sf_admin_actions">
<li>
<?
  if(SF_ENVIRONMENT=='dev') $dev = '_dev';
  else $dev = '';

if ($bndismue->getId()=='') { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'biedisactmuenew/ajaxcomprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
</li>
<? } else if ($bndismue->getIdrefer()!='') { ?>
<li><input name="Comprobante" type="button" value="Comprobantes" class="sf_admin_action_save" onClick="consultarComp()"></li>
<?php } ?>
</ul>

<div id="comp"></div>
<script language="JavaScript" type="text/javascript">
  function comprobante(formulario)
  {
      window.open('/tesoreria_dev.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

   function consultarComp()
  {
    window.open('/tesoreria_dev.php/confincomgen/edit/id/'+$("idrefer").value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(10, '0',0);}
     else{valor=valor.pad(10, '#',0);}

     $('bndismue_nrodismue').value=valor;
   }
 }
</script>
<?php include_partial('edit_actions', array('bndismue' => $bndismue)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bndismue->getId()): ?>
<?php echo button_to(__('delete'), 'biedisactmuenew/delete?id='.$bndismue->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
