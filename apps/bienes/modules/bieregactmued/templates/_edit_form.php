<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/02 20:18:52
?>
<?php echo form_tag('bieregactmued/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs', 'Catalogo') ?>
<?php echo javascript_include_tag('dFilter','bienes/bieregactmued','ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($bnregmue, 'getId') ?>
<?php echo object_input_hidden_tag($bnregmue, 'getStamue') ?>
<?php echo input_hidden_tag('incorporacion', $incorporacion) ?>

<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="4" face="Verdana, Arial, Helvetica, sans-serif"> <? print $desincorp;?></font></strong></th>
  </tr>
</table>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Registro ');?>
<a name="registro"></a>
<fieldset>
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Datos Principales') ?></h2>
<div class="form-row">
  <?php echo label_for('bnregmue[codact]', __($labels['bnregmue{codact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codact}')): ?>
    <?php echo form_error('bnregmue{codact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
&nbsp;&nbsp;
  <?php $value = object_input_tag($bnregmue, 'getCodact', array (
  'size' => 16,
  'control_name' => 'bnregmue[codact]',
  'maxlength' => $lonact,
  'readonly'  =>  $bnregmue->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$foract')",
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
         'condition' => "$('bnregmue_codact').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=bnregmue_codact&cajtexcom=bnregmue_desmue&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndefact_Bieregactmued/clase/Bndefact/frame/sf_admin_edit_form/obj1/bnregmue_codact/obj2/bnregmue_desmue/campo1/codact/campo2/desact','','','botoncat')?>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Código Activo:') ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php $value = object_input_tag($bnregmue, 'getCodmue', array (
  'size' => 12,
  'control_name' => 'bnregmue[codmue]',
  'maxlength' => 20,
  'readonly'  =>  $bnregmue->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnregmue[desmue]', __($labels['bnregmue{desmue}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{desmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{desmue}')): ?>
    <?php echo form_error('bnregmue{desmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
&nbsp;&nbsp;
  <?php $value = object_textarea_tag($bnregmue, 'getDesmue', array (
  'control_name' => 'bnregmue[desmue]',
  'maxlength'    => '250',
  'cols' => '84',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  <br>
 <?php echo label_for('bnregmue[codalt]', __($labels['bnregmue{codalt}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codalt}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codalt}')): ?>
    <?php echo form_error('bnregmue{codalt}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
&nbsp;&nbsp;
  <?php $value = object_input_tag($bnregmue, 'getCodalt', array (
  'size' => 20,
  'maxlength' => 30,
  'control_name' => 'bnregmue[codalt]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('bnregmue[ordcom]', __($labels['bnregmue{ordcom}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{ordcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{ordcom}')): ?>
    <?php echo form_error('bnregmue{ordcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getOrdcom', array (
  'size' => 15,
  'maxlength' => 8,
  'control_name' => 'bnregmue[ordcom]',
  'onBlur'=> remote_function(array(
        'url' => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_ordcom').value != '' ",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=bnregmue_ordcom&cajtexmos_uno=bnregmue_codpro&cajtexmos_dos=nomprovee&cajtexmos_tres=bnregmue_feccom&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caordcom_Bieregactmued/clase/Caordcom/frame/sf_admin_edit_form/obj1/bnregmue_ordcom/obj2/bnregmue_codpro/obj3/bnregmue_feccom/obj4/nomprovee/campo1/ordcom/campo2/codpro/campo3/fecord/campo4/nompro')?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Factura:  ') ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php $value = object_input_tag($bnregmue, 'getOrdrcp', array (
  'size' => 13,
  'maxlength' => 8,
  'control_name' => 'bnregmue[ordrcp]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('bnregmue_ordrcp').value=valor;document.getElementById('bnregmue_ordrcp').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnregmue[codpro]', __($labels['bnregmue{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codpro}')): ?>
    <?php echo form_error('bnregmue{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodpro', array (
  'size' => 15,
  'maxlength' => 20,
  'control_name' => 'bnregmue[codpro]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caprovee_Bieregactmued/clase/Caprovee/frame/sf_admin_edit_form/obj1/bnregmue_codpro/obj2/nomprovee/campo1/codpro/campo2/nompro')?>
&nbsp;
  <? echo input_tag('nomprovee',$bnregmue->getNomprovee(),'disabled=true,size=41')?>
    </div>
<div id="divnumord" style="display:none">
<br>
<?php echo label_for('bnregmue[numord]', __($labels['bnregmue{numord}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{numord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{numord}')): ?>
    <?php echo form_error('bnregmue{numord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getNumord', array (
  'size' => 15,
  'maxlength' => 8,
  'control_name' => 'bnregmue[numord]',
  'onBlur'=> remote_function(array(
        'url' => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_numord').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=8&cajtexmos=bnregmue_numord&cajtexmos=bnregmue_numord&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opordpag_Bieregactmued/clase/Opordpag/frame/sf_admin_edit_form/obj1/bnregmue_numord/campo1/numord')?>
</div>
</div>
</div>
</fieldset>
</div>

<div class="form-row">
  <?php echo label_for('bnregmue[feccom]', __($labels['bnregmue{feccom}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{feccom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{feccom}')): ?>
    <?php echo form_error('bnregmue{feccom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
&nbsp;&nbsp;
  <?php $value = object_input_date_tag($bnregmue, 'getFeccom', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[feccom]',
  'date_format' => 'dd/MM/yyyy',
   'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if ($bnregmue->getEtifeccal()=='S') {?>
<strong><? echo __('Fecha de Recepción del Bien:  ') ?></strong>
<?php } else {?>
<strong><? echo __('Fecha Cálculo:  ') ?></strong>
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php $value = object_input_date_tag($bnregmue, 'getFecreg', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[fecreg]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Ubicación') ?></h2>
<div class="form-row">
  <?php echo label_for('bnregmue[codubi]', __($labels['bnregmue{codubi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codubi}')): ?>
    <?php echo form_error('bnregmue{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodubi', array (
  'size' => $lonubi,
  'control_name' => 'bnregmue[codubi]',
  'maxlength' => $lonubi,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$forubi')",
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codubi').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=3&cajtexmos=bnregmue_codubi&cajtexcom=desubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Bieregactmued/clase/Bnubibie/frame/sf_admin_edit_form/obj1/bnregmue_codubi/obj2/desubi/campo1/codubi/campo2/desubi')?>
&nbsp;&nbsp;
  <? echo input_tag('desubi',$bnregmue->getNomubicac(),'size=41')?>
    </div>
 </div>
</fieldset>
</div>

<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Vida Util (Meses)')?> </h2>
<div class="form-row">
&nbsp;
<strong><? echo __('Original')?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo '(+)' ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo '(-)'?></strong>
<br>
  <?php $value = object_input_tag($bnregmue, 'getViduti', array (
  'size' => 20,
  'maxlength' => 20,
   'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[viduti]',
 )); echo $value ? $value : '&nbsp;' ?>
 <?php $value = object_input_tag($bnregmue, 'getAumviduti', array (
  'size' => 5,
  'maxlength' => 4,
   'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[aumviduti]',
)); echo $value ? $value : '&nbsp;' ?>
  <?php $value = object_input_tag($bnregmue, 'getDimviduti', array (
  'size' => 5,
  'maxlength' => 4,
   'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[dimviduti]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo 'Actual = '?></strong>
&nbsp;
<?php echo input_tag('vidaAct',$bnregmue->getVidutiactual(),'disabled=true,size=10')?>
</div>
</fielset>
</div>
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Responsables')?> </h2>
<div class="form-row">
  <?php echo label_for('bnregmue[codrespat]', __($labels['bnregmue{codrespat}']), 'class="required" Style="width:200px"') ?>
   <div class="contentform-error">
  <?php echo Catalogo($bnregmue,5,array(
  'getprincipal' => 'getCodrespat',
  'getsecundario' => 'getNomrespat',
  'campoprincipal' => 'codrespat',
  'camposecundario' => 'nomrespat',
  'tamanoprincipal' => '10',
  'campobase' => 'id_codrespat',
  ), 'Nphojint_Almdespser', 'Nphojint', ''); ?>
  </div>
  <br>
    <?php echo label_for('bnregmue[codresuso]', __($labels['bnregmue{codresuso}']), 'class="required" Style="width:200px"') ?>
  <?php echo Catalogo($bnregmue,5,array(
  'getprincipal' => 'getCodresuso',
  'getsecundario' => 'getNomresuso',
  'campoprincipal' => 'codresuso',
  'camposecundario' => 'nomresuso',
  'tamanoprincipal' => '10',
  'campobase' => 'id_codresuso',
  ), 'Nphojint_Almdespser', 'Nphojint', ''); ?>
  <br>
<?php echo label_for('bnregmue[tippro]', __($labels['bnregmue{tippro}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('bnregmue{tippro}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bnregmue{tippro}')): ?> <?php echo form_error('bnregmue{tippro}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getTippro', array (
  'size' => 8,
  'maxlength' => 4,
  'control_name' => 'bnregmue[tippro]',
  'onBlur'=> remote_function(array(
       'url' => 'bieregactmued/ajax',
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=7&cajtexmos=bnregmue_despro&cajtexcom=bnregmue_tippro&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catippro_Almordcom/clase/Catippro/frame/sf_admin_edit_form/obj1/bnregmue_tippro/obj2/bnregmue_despro/campo1/codpro/campo2/despro')?></th>

<?php $value = object_input_tag($bnregmue, 'getDespro', array (
'size' => 60,
'disabled' => true,
'control_name' => 'bnregmue[despro]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
  <br>

<?php echo label_for('bnregmue[logusu]', __($labels['bnregmue{logusu}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('bnregmue{logusu}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bnregmue{logusu}')): ?> <?php echo form_error('bnregmue{logusu}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getNomuse', array (
'size' => 60,
'disabled' => true,
'control_name' => 'bnregmue[nomuse]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>
</fielset>
</div>
</fieldset>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage2", 'Caracteristicas del Mueble');?>
<a name="caracteristicas"></a>
<fieldset>

<h2><? echo __('Datos Generales') ?></h2>
<div class="form-row">

<?php echo label_for('bnregmue[marmue]', __($labels['bnregmue{marmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{marmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{marmue}')): ?>
    <?php echo form_error('bnregmue{marmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getMarmue', array (
  'size' => 20,
  'maxlength' => 50,
  'control_name' => 'bnregmue[marmue]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Modelo:') ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php $value = object_input_tag($bnregmue, 'getModmue', array (
  'size' => 20,
  'maxlength' => 20,
  'control_name' => 'bnregmue[modmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('bnregmue[anomue]', __($labels['bnregmue{anomue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{anomue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{anomue}')): ?>
    <?php echo form_error('bnregmue{anomue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getAnomue', array (
  'size' => 20,
  'maxlength' =>10,
  'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[anomue]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo 'Color:  ' ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php $value = object_input_tag($bnregmue, 'getColmue', array (
  'size' => 20,
  'maxlength' =>25,
  'control_name' => 'bnregmue[colmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>

<?php echo label_for('bnregmue[capmue]', __($labels['bnregmue{capmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{capmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{capmue}')): ?>
    <?php echo form_error('bnregmue{capmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCapmue', array (
  'size' => 20,
  'maxlength' =>20,
  'control_name' => 'bnregmue[capmue]',
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Tipo:  ') ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_tag($bnregmue, 'getTipmue', array (
  'size' => 20,
  'maxlength' =>20,
  'control_name' => 'bnregmue[tipmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('bnregmue[sermue]', __($labels['bnregmue{sermue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{sermue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{sermue}')): ?>
    <?php echo form_error('bnregmue{sermue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getSermue', array (
  'size' => 65,
  'maxlength' =>80,
  'control_name' => 'bnregmue[sermue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<table>
<tr>
<th>
  <?php echo label_for('bnregmue[nropie]', __($labels['bnregmue{nropie}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{nropie}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{nropie}')): ?>
    <?php echo form_error('bnregmue{nropie}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getNropie', array (
  'size' => 20,
  'maxlength' =>10,
  'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[nropie]',
)); echo $value ? $value : '&nbsp;' ?>  </div>

</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('bnregmue[pesmue]', __($labels['bnregmue{pesmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{pesmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{pesmue}')): ?>
    <?php echo form_error('bnregmue{pesmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($bnregmue,'getPesmue', array (
  'size' => 20,
  'maxlength' =>20,
  //'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[pesmue]',
)); echo $value ? $value : '&nbsp;' ?></div>

</th>
</tr>
<tr>
<th>
<br>
<?php echo label_for('bnregmue[usomue]', __($labels['bnregmue{usomue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{usomue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{usomue}')): ?>
    <?php echo form_error('bnregmue{usomue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getUsomue',true), array (
  'size' => 20,
  'maxlength' =>25,
  'control_name' => 'bnregmue[usomue]',
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>
  <?php echo label_for('bnregmue[altmue]', __($labels['bnregmue{altmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{altmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{altmue}')): ?>
    <?php echo form_error('bnregmue{altmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getAltmue', array (
  'size' => 20,
   'maxlength' =>45,
   'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
  'control_name' => 'bnregmue[altmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</th>
</tr>
<tr>
<th>
<br>
  <?php echo label_for('bnregmue[larmue]', __($labels['bnregmue{larmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{larmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{larmue}')): ?>
    <?php echo form_error('bnregmue{larmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getLarmue',true), array (
  'size' => 20,
  'maxlength' =>45,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
  'control_name' => 'bnregmue[larmue]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>
 <?php echo label_for('bnregmue[ancmue]', __($labels['bnregmue{ancmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{ancmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{ancmue}')): ?>
    <?php echo form_error('bnregmue{ancmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($bnregmue, array('getAncmue',true), array (
  'size' => 20,
  'maxlength' =>45,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
  'control_name' => 'bnregmue[ancmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</th></tr></table>
<div class="form-row">
    <fieldset>
        <div class="form-row">
          <?php echo label_for('bnregmue[coddis]', __($labels['bnregmue{coddis}']), 'class="required" ') ?>
          <div class="content<?php if ($sf_request->hasError('bnregmue{coddis}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('bnregmue{coddis}')): ?>
            <?php echo form_error('bnregmue{coddis}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>


      <?php $value = object_input_tag($bnregmue, 'getCoddis', array (
      'size' => 10,
      'control_name' => 'bnregmue[coddis]',
      'maxlength' => 25,
      'onBlur'=> remote_function(array(
            'url'      => 'bieregactmued/ajax',
            'condition' => "$('bnregmue_coddis').value != ''",
            'complete' => 'AjaxJSON(request, json)',
            'script' => true,
            'with' => "'ajax=4&cajtexmos=bnregmue_coddis&cajtexcom=desdis&codigo='+this.value"
            ))
    )); echo $value ? $value : '&nbsp;' ?>

        &nbsp;
        <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndisbie_Bieregactmued/clase/Bndisbie/frame/sf_admin_edit_form/obj1/bnregmue_coddis/obj2/desdis/campo1/coddis/campo2/desdis')?>
        &nbsp;&nbsp;
          <? echo input_tag('desdis',$bnregmue->getNomdispos(),'disabled=true,size=42')?>
         </div>
        </div>
    </fieldset>

<br>

  <?php echo label_for('bnregmue[detmue]','Observaciones', 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{detmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{detmue}')): ?>
    <?php echo form_error('bnregmue{detmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php $value = object_textarea_tag($bnregmue, 'getdetmue', array (
  'size' => '83x5',
  'control_name' => 'bnregmue[detmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Costo');?>
<a name="costo"></a>


<fieldset>
<h2><? echo __('Costo Historico') ?></h2>

<div class="form-row">
<table>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('bnregmue[valini]', __($labels['bnregmue{valini}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{valini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{valini}')): ?>
    <?php echo form_error('bnregmue{valini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getValini',true), array (
  'size' => 17,
  'maxlength' =>17,
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[valini]',
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>

<?php echo label_for('bnregmue[valres]', __($labels['bnregmue{valres}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{valres}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{valres}')): ?>
    <?php echo form_error('bnregmue{valres}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getValres',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[valres]',
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
</tr>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>
  <?php echo label_for('bnregmue[depmen]', __($labels['bnregmue{depmen}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{depmen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{depmen}')): ?>
    <?php echo form_error('bnregmue{depmen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getDepmen',true), array (
   'size' => 17,
  'maxlength' =>17,
 'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[depmen]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
 </th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
 <?php echo label_for('bnregmue[depacu]', __($labels['bnregmue{depacu}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{depacu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{depacu}')): ?>
    <?php echo form_error('bnregmue{depacu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getDepacu',true), array (
 'size' => 17,
  'maxlength' =>17,
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[depacu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>

<?php echo label_for('bnregmue[vallib]', __($labels['bnregmue{vallib}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{vallib}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{vallib}')): ?>
    <?php echo form_error('bnregmue{vallib}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getVallib',true), array (
  'size' => 17,
  'maxlength' =>17,
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[vallib]',
)); echo $value ? $value : '&nbsp;' ?>
 </div>
  </div>
 </th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('bnregmue[valadi]', __($labels['bnregmue{valadi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{valadi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{valadi}')): ?>
    <?php echo form_error('bnregmue{valadi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getValadi',true), array (
 'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[valadi]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</th>
</tr>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>

<br>
  <?php echo label_for('bnregmue[valrex]', __($labels['bnregmue{valrex}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{valrex}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{valrex}')): ?>
    <?php echo form_error('bnregmue{valrex}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($bnregmue, array('getValrex',true), array (
   'size' => 17,
  'maxlength' =>17,
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[valrex]',
)); echo $value ? $value : '&nbsp;' ?>
 </div>
  </th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
 <?php echo label_for('bnregmue[cosrep]', __($labels['bnregmue{cosrep}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{cosrep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{cosrep}')): ?>
    <?php echo form_error('bnregmue{cosrep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getCosrep',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[cosrep]',
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</th>
</tr>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>
<?php echo label_for('bnregmue[valactual]', __($labels['bnregmue{valactual}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{valactual}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{valactual}')): ?>
    <?php echo form_error('bnregmue{valactual}', array('class' => 'form-error-msg')) ?>

  <?php endif; ?>
    <?php $value = object_input_tag($bnregmue, array('getValactual',true), array (
  'size' => 17,
  'disabled' =>true,
  'control_name' => 'bnregmue[valactmue]',
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
</tr></table>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a name="guardar"></a>

</fieldset>
<?php tabInit('tp1','0');?>
<?php include_partial('edit_actions', array('bnregmue' => $bnregmue)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bnregmue->getId()): ?>
<?php echo button_to(__('delete'), 'bieregactmued/delete?id='.$bnregmue->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
  <script type="text/javascript">
   var savenumord='<?php echo $bnregmue->getSavenumord()?>';
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

     $('bnregmue_codmue').value=valor;
   }
 }

var incorporacion='<?php echo $incorporacion;  ?>';
var  id='<? echo $bnregmue->getId();?>';
if (id){
	     $$('.botoncat')[0].disabled=true;
}
if ((incorporacion=='S'))
{
    if(confirm("¿Desea Incorporar este Mueble?"))
    {

      new Ajax.Request('/bienes_dev.php/bieregactmued/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&id='+id})
//new Ajax.Request('/bienes_dev.php/bieregactmued/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&id='+id})s
    }
}

  </script>
