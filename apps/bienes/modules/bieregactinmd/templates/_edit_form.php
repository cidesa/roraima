<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 37631 2010-04-15 21:32:33Z cramirez $
 */
// date: 2007/10/31 17:46:14
?>
<?php echo form_tag('bieregactinmd/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs', 'Catalogo') ?>
<?php echo javascript_include_tag('dFilter','bienes/bieregactinmd','ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($bnreginm, 'getId') ?>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Registro ');?>

<fieldset id="sf_fieldset_none" class="">
<legend><strong><? echo __('Datos Principales')?></strong></legend>

<div class="form-row">
  <?php echo label_for('bnreginm[codact]', __($labels['bnreginm{codact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{codact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{codact}')): ?>
    <?php echo form_error('bnreginm{codact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getCodact', array (
  'size' => $lonact,
  'control_name' => 'bnreginm[codact]',
  'maxlength' => $lonact,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$foract')",
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactinmd/ajax',
        'condition' => "$('bnreginm_codact').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=bnreginm_codact&cajtexcom=bnreginm_desinm&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>


&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndefact_Bieregactinm/clase/Bndefact/frame/sf_admin_edit_form/obj1/bnreginm_codact/obj2/bnreginm_desinm/campo1/codact/campo2/desact')?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Código Activo:  ') ?></strong>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_tag($bnreginm, 'getCodinm', array (
  'size' => 12,
  'maxlength' => 20,
  'control_name' => 'bnreginm[codinm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('bnreginm[desinm]', __($labels['bnreginm{desinm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{desinm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{desinm}')): ?>
    <?php echo form_error('bnreginm{desinm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($bnreginm, 'getDesinm', array (
  'maxlength' => 250,
  'control_name' => 'bnreginm[desinm]',
      'cols' => '78'
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('bnreginm[codalt]', __($labels['bnreginm{codalt}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{codalt}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{codalt}')): ?>
    <?php echo form_error('bnreginm{codalt}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getCodalt', array (
  'size' => 20,
  'maxlength' => 30,
  'control_name' => 'bnreginm[codalt]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



</fieldset>
<fieldset id="sf_fieldset_none" class="">


<div class="form-row">
  <?php echo label_for('bnreginm[ordcom]', __($labels['bnreginm{ordcom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{ordcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{ordcom}')): ?>
    <?php echo form_error('bnreginm{ordcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getOrdcom', array (
  'size' => 8,
  'maxlength' => 8,
  'control_name' => 'bnreginm[ordcom]',
  'onBlur'=> remote_function(array(
              'url' => 'bieregactinmd/ajax',
               'condition' => "$('bnreginm_ordcom').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=2&cajtexmos=bnreginm_ordcom&cajtexmos_uno=bnreginm_codpro&cajtexmos_dos=nomprovee&cajtexmos_tres=bnreginm_feccom&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caordcom_Bieregactmued/clase/Caordcom/frame/sf_admin_edit_form/obj1/bnreginm_ordcom/obj2/bnreginm_codpro/obj3/bnreginm_feccom/obj4/nomprovee/campo1/ordcom/campo2/codpro/campo3/fecord/campo4/nompro')?>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Factura:  ') ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_tag($bnreginm, 'getOrdrcp', array (
  'size' => 13,
  'maxlength' => 8,
  'control_name' => 'bnreginm[ordrcp]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('bnreginm_ordrcp').value=valor;document.getElementById('bnreginm_ordrcp').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>


  <?php echo label_for('bnreginm[codpro]', __($labels['bnreginm{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{codpro}')): ?>
    <?php echo form_error('bnreginm{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getCodpro', array (
  'size' => 15,
   'maxlength' => 20,
  'control_name' => 'bnreginm[codpro]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caprovee_Bieregactinmd/clase/Caprovee/frame/sf_admin_edit_form/obj1/bnreginm_codpro/obj2/nomprovee/campo1/codpro/campo2/nompro/param1/')?>


&nbsp;
  <? echo input_tag('nomprovee',$bnreginm->getNomprovee(),'disabled=true,size=41')?>
    </div>

<div id="divnumord" style="display:none">
<br>
<?php echo label_for('bnreginm[numord]', __($labels['bnreginm{numord}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{numord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{numord}')): ?>
    <?php echo form_error('bnreginm{numord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getNumord', array (
  'size' => 15,
  'maxlength' => 8,
  'control_name' => 'bnreginm[numord]',
  'onBlur'=> remote_function(array(
        'url' => 'bieregactinmd/ajax',
        'condition' => "$('bnreginm_numord').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=6&cajtexmos=bnreginm_numord&cajtexmos=bnreginm_numord&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opordpag_Bieregactmued/clase/Opordpag/frame/sf_admin_edit_form/obj1/bnreginm_numord/campo1/numord')?>
</div>
</div>
</div>

</fieldset>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('bnreginm[feccom]', __($labels['bnreginm{feccom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{feccom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{feccom}')): ?>
    <?php echo form_error('bnreginm{feccom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bnreginm, 'getFeccom', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnreginm[feccom]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if ($bnreginm->getEtifeccal()=='S') {?>
<strong><? echo __('Fecha de Recepción del Bien:  ') ?></strong>
<?php } else {?>
<strong><? echo __('Fecha Cálculo:  ') ?></strong>
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_date_tag($bnreginm, 'getFecreg', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnreginm[fecreg]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


</fieldset>
<fieldset id="sf_fieldset_none" class="">
<legend><strong><? echo __('Ubicación')?></strong></legend>



<div class="form-row">
  <?php echo label_for('bnreginm[codubi]', __($labels['bnreginm{codubi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{codubi}')): ?>
    <?php echo form_error('bnreginm{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getCodubi', array (
  'size' => $lonubi,
  'control_name' => 'bnreginm[codubi]',
  'maxlength' => $lonubi,
   'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$forubi')",
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactinmd/ajax',
        'condition' => "$('bnreginm_codubi').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=3&cajtexmos=bnreginm_codubi&cajtexcom=desubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Bieregactinmd/clase/Bnubibie/frame/sf_admin_edit_form/obj1/bnreginm_codubi/obj2/desubi/campo1/codubi/campo2/desubi/param1/')?>


&nbsp;&nbsp;

 <? echo input_tag('desubi',$bnreginm->getDesubi(),'size=41')?>
    </div>
</div>


</fieldset>
<fieldset id="sf_fieldset_none" class="">
<legend><strong><? echo __('Vida Util (Meses)')?></strong></legend>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Original')?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo '(+)' ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo '(-)'?></strong>


<div class="form-row">


  <?php $value = object_input_tag($bnreginm, 'getViduti', array (
  'size' => 20,
 'maxlength' => 20,
   'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnreginm[viduti]',
)); echo $value ? $value : '&nbsp;' ?>

 <?php $value = object_input_tag($bnreginm, 'getAumviduti', array (
 'size' => 5,
  'maxlength' => 4,
   'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnreginm[aumviduti]',
)); echo $value ? $value : '&nbsp;' ?>

  <?php $value = object_input_tag($bnreginm, 'getDimviduti', array (
  'size' => 5,
  'maxlength' => 4,
   'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnreginm[dimviduti]',
)); echo $value ? $value : '&nbsp;' ?>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<strong><? echo 'Actual= ' ?></strong>

&nbsp;&nbsp;&nbsp;
  <? echo input_tag('vidaact',(($bnreginm->getViduti()+$bnreginm->getAumviduti())-$bnreginm->getDimviduti()),'disabled=true,size=10')?>

</div>



</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Caracteristicas Inmuebles');?>
<fieldset id="sf_fieldset_none" class="">
<legend><strong><? echo __('Datos Generales')?></strong></legend>
<div class="form-row">
  <?php echo label_for('bnreginm[deninm]', __($labels['bnreginm{deninm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{deninm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{deninm}')): ?>
    <?php echo form_error('bnreginm{deninm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getDeninm', array (
  'size' => 20,
    'maxlength' => 50,
  'control_name' => 'bnreginm[deninm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br/>

  <?php echo label_for('bnreginm[nroexp]', __($labels['bnreginm{nroexp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{nroexp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{nroexp}')): ?>
    <?php echo form_error('bnreginm{nroexp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getNroexp', array (
  'size' => 20,
  'maxlength' => 20,
  'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnreginm[nroexp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br/>

  <?php echo label_for('bnreginm[detinm]', __($labels['bnreginm{detinm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{detinm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{detinm}')): ?>
    <?php echo form_error('bnreginm{detinm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getDetinm', array (
  'size' => 70,
  'maxlength' =>70,
  //'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnreginm[detinm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br/>

  <?php echo label_for('bnreginm[avaact]', __($labels['bnreginm{avaact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{avaact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{avaact}')): ?>
    <?php echo form_error('bnreginm{avaact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getAvaact',true), array (
 'size' => 17,
 'maxlength' =>17,
 'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
 'control_name' => 'bnreginm[avaact]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br/>

  <?php echo label_for('bnreginm[avacom]', __($labels['bnreginm{avacom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{avacom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{avacom}')): ?>
    <?php echo form_error('bnreginm{avacom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getAvacom',true), array (
 'size' => 17,
 'maxlength' =>17,
 'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[avacom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br/>

  <?php echo label_for('bnreginm[clafun]', __($labels['bnreginm{clafun}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{clafun}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{clafun}')): ?>
    <?php echo form_error('bnreginm{clafun}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo Catalogo($bnreginm,5,array(
  'getprincipal' => 'getCodcla',
  'getsecundario' => 'getDescla',
  'campoprincipal' => 'codcla',
  'camposecundario'=> 'descla',
  'campobase' => 'xxx',
  ), 'Bieregactinmd_Bnclafun', 'bnclafun', '' );
?>
    </div>

    <br/>

  <?php echo label_for('bnreginm[edoleg]', __($labels['bnreginm{edoleg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{edoleg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{edoleg}')): ?>
    <?php echo form_error('bnreginm{edoleg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getEdoleg', array (
  'size' => 70,
  'maxlength' =>70,
  'control_name' => 'bnreginm[edoleg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br/>
    <br/>

  <?php echo label_for('bnreginm[obsinm]', __($labels['bnreginm{obsinm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{obsinm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{obsinm}')): ?>
    <?php echo form_error('bnreginm{obsinm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($bnreginm, 'getObsinm', array (
  'size' => '80x5',
  'maxlength' =>250,
  'control_name' => 'bnreginm[obsinm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

  <br/>

  <?php echo label_for('bnreginm[numreg]', __($labels['bnreginm{numreg}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{numreg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{numreg}')): ?>
    <?php echo form_error('bnreginm{numreg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getNumreg', array (
  'size' => 20,
  'control_name' => 'bnreginm[numreg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

  <br/>

  <?php echo label_for('bnreginm[numfol]', __($labels['bnreginm{numfol}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{numfol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{numfol}')): ?>
    <?php echo form_error('bnreginm{numfol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getNumfol', array (
  'size' => 20,
  'control_name' => 'bnreginm[numfol]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

  <br/>

  <?php echo label_for('bnreginm[fecreginm]', __($labels['bnreginm{fecreginm}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{fecreginm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{fecreginm}')): ?>
    <?php echo form_error('bnreginm{fecreginm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bnreginm, 'getFecreginm', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnreginm[fecreginm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

  <br/>

  <?php echo label_for('bnreginm[ofireg]', __($labels['bnreginm{ofireg}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{ofireg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{ofireg}')): ?>
    <?php echo form_error('bnreginm{ofireg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getOfireg', array (
  'size' => 50,
  'control_name' => 'bnreginm[ofireg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

  <br/>

  <?php echo label_for('bnreginm[protocolo]', __($labels['bnreginm{protocolo}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{protocolo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{protocolo}')): ?>
    <?php echo form_error('bnreginm{protocolo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getProtocolo', array (
  'size' => 20,
  'control_name' => 'bnreginm[protocolo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

  <br/>

  <?php echo label_for('bnreginm[tomo]', __($labels['bnreginm{tomo}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{tomo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{tomo}')): ?>
    <?php echo form_error('bnreginm{tomo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getTomo', array (
  'size' => 20,
  'control_name' => 'bnreginm[tomo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

  <br/>

  <?php echo label_for('bnreginm[trimestre]', __($labels['bnreginm{trimestre}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{trimestre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{trimestre}')): ?>
    <?php echo form_error('bnreginm{trimestre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getTrimestre', array (
  'size' => 20,
  'control_name' => 'bnreginm[trimestre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Linderos');?>
<fieldset id="sf_fieldset_none" class="">
<legend><strong><? echo __('Linderos')?></strong></legend>



<div class="form-row">
  <?php echo label_for('bnreginm[linnor]', __($labels['bnreginm{linnor}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{linnor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{linnor}')): ?>
    <?php echo form_error('bnreginm{linnor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getLinnor', array (
  'size' => 50,
  'maxlength' =>50,
  'control_name' => 'bnreginm[linnor]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[linsur]', __($labels['bnreginm{linsur}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{linsur}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{linsur}')): ?>
    <?php echo form_error('bnreginm{linsur}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getLinsur', array (
  'size' => 50,
  'maxlength' =>50,
  'control_name' => 'bnreginm[linsur]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[linest]', __($labels['bnreginm{linest}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{linest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{linest}')): ?>
    <?php echo form_error('bnreginm{linest}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getLinest', array (
  'size' => 50,
  'maxlength' =>50,
  'control_name' => 'bnreginm[linest]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[linoes]', __($labels['bnreginm{linoes}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{linoes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{linoes}')): ?>
    <?php echo form_error('bnreginm{linoes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, 'getLinoes', array (
  'size' => 50,
  'maxlength' =>50,
  'control_name' => 'bnreginm[linoes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>




</fieldset>
<fieldset id="sf_fieldset_none" class="">
<legend><strong><? echo __('Areas')?></strong></legend>


<div class="form-row">
  <?php echo label_for('bnreginm[areter]', __($labels['bnreginm{areter}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{areter}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{areter}')): ?>
    <?php echo form_error('bnreginm{areter}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getAreter',true), array (
  'size' => 20,
   'maxlength' =>50,
   'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
   'control_name' => 'bnreginm[areter]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[arecub]', __($labels['bnreginm{arecub}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{arecub}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{arecub}')): ?>
    <?php echo form_error('bnreginm{arecub}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getArecub',true), array (
  'size' => 20,
   'maxlength' =>50,
   'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[arecub]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[arecon]', __($labels['bnreginm{arecon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{arecon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{arecon}')): ?>
    <?php echo form_error('bnreginm{arecon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getArecon',true), array (
  'size' => 20,
   'maxlength' =>50,
   'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[arecon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[areotr]', __($labels['bnreginm{areotr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{areotr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{areotr}')): ?>
    <?php echo form_error('bnreginm{areotr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getAreotr',true), array (
  'size' => 20,
   'maxlength' =>50,
   'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[areotr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[aretot]', __($labels['bnreginm{aretot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{aretot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{aretot}')): ?>
    <?php echo form_error('bnreginm{aretot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getAretot',true), array (
  'size' => 20,
   'maxlength' =>50,
   'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
   'control_name' => 'bnreginm[aretot]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


</fieldset>
<fieldset id="sf_fieldset_none" class="">
<legend><strong><? echo __('Disposición')?></strong></legend>

<div class="form-row">
  <?php echo label_for('bnreginm[coddis]', __($labels['bnreginm{coddis}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{coddis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{coddis}')): ?>
    <?php echo form_error('bnreginm{coddis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

      <?php $value = object_input_tag($bnreginm, 'getCoddis', array (
      'size' => 10,
      'control_name' => 'bnreginm[coddis]',
      'maxlength' => 20,
      'onBlur'=> remote_function(array(
            'url'      => 'bieregactinmd/ajax',
            'condition' => "$('bnreginm_coddis').value != ''",
            'complete' => 'AjaxJSON(request, json)',
            'script' => true,
            'with' => "'ajax=4&cajtexmos=bnreginm_coddis&cajtexcom=desdis&codigo='+this.value"
            ))
    )); echo $value ? $value : '&nbsp;' ?>

        &nbsp;
        <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndisbie_Bieregactinmd/clase/Bndisbie/frame/sf_admin_edit_form/obj1/bnreginm_coddis/obj2/desdis/campo1/coddis/campo2/desdis/param1/')?>


&nbsp;&nbsp;

<strong><? echo __('Nombre: ') ?></strong>

&nbsp;&nbsp;&nbsp;

       <? echo input_tag('desdis',$bnreginm->getNomdispos(),'disabled=true,size=50')?>
    </div>
</div>


</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Costo Historico');?>
<fieldset id="sf_fieldset_none" class="">
<legend><strong><? echo __('Costo Historico')?></strong></legend>

<div class="form-row">
  <?php echo label_for('bnreginm[valini]', __($labels['bnreginm{valini}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{valini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{valini}')): ?>
    <?php echo form_error('bnreginm{valini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getValini',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[valini]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[depacu]', __($labels['bnreginm{depacu}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{depacu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{depacu}')): ?>
    <?php echo form_error('bnreginm{depacu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getDepacu',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[depacu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[valrex]', __($labels['bnreginm{valrex}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{valrex}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{valrex}')): ?>
    <?php echo form_error('bnreginm{valrex}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getValrex',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[valrex]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[valres]', __($labels['bnreginm{valres}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{valres}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{valres}')): ?>
    <?php echo form_error('bnreginm{valres}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getValres',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[valres]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[vallib]', __($labels['bnreginm{vallib}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{vallib}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{vallib}')): ?>
    <?php echo form_error('bnreginm{vallib}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getVallib',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[vallib]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[cosrep]', __($labels['bnreginm{cosrep}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{cosrep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{cosrep}')): ?>
    <?php echo form_error('bnreginm{cosrep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getCosrep',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[cosrep]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


<div class="form-row">
  <?php echo label_for('bnreginm[depmen]', __($labels['bnreginm{depmen}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{depmen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{depmen}')): ?>
    <?php echo form_error('bnreginm{depmen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getDepmen',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[depmen]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnreginm[valadis]', __($labels['bnreginm{valadis}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{valadis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{valadis}')): ?>
    <?php echo form_error('bnreginm{valadis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnreginm, array('getValadis',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnreginm[valadis]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<br>
<div class="form-row">
  <?php echo label_for('bnreginm[valactual]', __($labels['bnreginm{valactual}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnreginm{valactual}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnreginm{valactual}')): ?>
    <?php echo form_error('bnreginm{valactual}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php $value = object_input_tag($bnreginm, array('getValactual',true), array (
  'size' => 17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'disabled' =>true,
  'control_name' => 'bnreginm[valactual]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>

</fieldset>

<?php tabInit('tp1','0');?>

<?php include_partial('edit_actions', array('bnreginm' => $bnreginm)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bnreginm->getId()): ?>
<?php echo button_to(__('delete'), 'bieregactinmd/delete?id='.$bnreginm->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
  <script type="text/javascript">
   var savenumord='<?php echo $bnreginm->getSavenumord()?>';
   if (savenumord=='S')
   {
      $('divnumord').show();
   }

function num(e) {
    evt = e ? e : event;
    tcl = (window.Event) ? evt.which : evt.keyCode;
    if ((tcl < 48 || tcl > 57 ) && tcl != '8')
    {
        return false;
    }
    return true;
}

function enter(e,valor)
 {

   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(10, '0',0);}
     else
     {valor=valor.pad(10, '#',0);}

     $('bnreginm_codinm').value=valor;
   }
 }

  </script>

