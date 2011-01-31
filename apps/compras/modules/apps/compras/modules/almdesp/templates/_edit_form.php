<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 11:39:26
?>
<?php echo form_tag('almdesp/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'compras/almdesp', 'tools','observe') ?>

<?php echo object_input_hidden_tag($cadphart, 'getId') ?>
<?php echo input_hidden_tag('verificaexisydisp', '') ?>
<?php echo input_hidden_tag('mensaje', '') ?>
<?php echo input_hidden_tag('existeubicacion', '') ?>
<?php echo input_hidden_tag('cadphart[manartlot]', $cadphart->getManartlot()) ?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Despacho') ?></legend>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('cadphart[dphart]', __($labels['cadphart{dphart}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{dphart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{dphart}')): ?>
    <?php echo form_error('cadphart{dphart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($cadphart, 'getDphart', array (
  'size' => 15,
  'maxlegth' => 8,
  'control_name' => 'cadphart[dphart]',
  'readonly'  =>  $cadphart->getId()!='' ? true : false,
  'onBlur'  => "javascript:enter(this.value);",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th> <?php echo label_for('cadphart[fecdph]', __($labels['cadphart{fecdph}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{fecdph}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{fecdph}')): ?>
    <?php echo form_error('cadphart{fecdph}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
   <?php
	$value = object_input_date_tag($cadphart, 'getFecdph', array (
	  'rich' => true,
	  'maxlegth' => 10,
	  'calendar_button_img' => '/sf/sf_admin/images/date.png',
	  'control_name' => 'cadphart[fecdph]',
	  'date_format' => 'dd/MM/yy',
	  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
	  'readonly'  =>  $cadphart->getId()!='' ? true : false,
		),date('Y-m-d')); echo $value ? $value : '&nbsp;'; ?>
    </div></th>
</tr>
</table>
<br>
  <?php echo label_for('cadphart[reqart]', __($labels['cadphart{reqart}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{reqart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{reqart}')): ?>
    <?php echo form_error('cadphart{reqart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo input_auto_complete_tag('cadphart[reqart]', $cadphart->getReqart(),
    'almdesp/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 8,
       'readonly'  =>  $cadphart->getId()!='' ? true : false, 'onBlur'=> remote_function(array(
        'update'   => 'divGrid',
         'url'      => 'almdesp/grid',
        'complete' => 'AjaxJSON(request, json), actualizarsaldos() ',
         'condition' => "$('cadphart_reqart').value != '' && $('id').value == ''",
         'script' => true,
          'with' => "'ajax=2&cajtexmos=cadphart_desreq&cajtexcom=cadphart_reqart&codigo='+this.value"
        ))),
     array('use_style' => 'true') )?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Careqart_Almdes/clase/Careqart/frame/sf_admin_edit_form/obj1/cadphart_reqart/obj2/cadphart_desreq','','','botoncat')?></th>
&nbsp;&nbsp;

 <?php $value = object_input_tag($cadphart, 'getDesreq', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'cadphart[desreq]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadphart[desdph]', __($labels['cadphart{desdph}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{desdph}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{desdph}')): ?>
    <?php echo form_error('cadphart{desdph}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getDesdph', array (
  'size' => 80,
  'control_name' => 'cadphart[desdph]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadphart[codori]', __($labels['cadphart{codori}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{codori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{codori}')): ?>
    <?php echo form_error('cadphart{codori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php $value = object_input_tag($cadphart, 'getCodori', array (
  'size' => 20,
  'control_name' => 'cadphart[codori]',
  'maxlength' => $lonubi,
  'readonly'  =>  $cadphart->getId()!='' ? true : false,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$forubi')",
  'onBlur'=> remote_function(array(
       'url'      => 'almdesp/ajax',
       'script'   => true,
       'condition' => "$('cadphart_codori').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=3&cajtexmos=cadphart_nomcat&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Bnubica_Pagemiord/clase/Bnubica/frame/sf_admin_edit_form/obj1/cadphart_codori/obj2/cadphart_nomcat/campo1/codubi/campo2/desubi/param1/".$lonubi,'','','botoncat')?></th>
&nbsp;&nbsp;
 <?php $value = object_input_tag($cadphart, 'getNomcat', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'cadphart[nomcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadphart[codcen]', __($labels['cadphart{codcen}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{codcen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{codcen}')): ?>
    <?php echo form_error('cadphart{codcen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php $value = object_input_tag($cadphart, 'getCodcen', array (
  'size' => 20,
  'control_name' => 'cadphart[codcen]',
  'maxlength' => 4,
  'readonly'  =>  $cadphart->getId()!='' ? true : false,
  'onBlur'=> remote_function(array(
       'url'      => 'almdesp/ajax',
       'script'   => true,
       'condition' => "$('cadphart_codcen').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=7&cajtexmos=cadphart_descen&cajtexcom=cadphart_codcen&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefcen_Almsolegr/clase/Cadefcen/frame/sf_admin_edit_form/obj1/cadphart_codcen/obj2/cadphart_descen/campo1/codcen/campo2/descen','','','botoncat')?>
&nbsp;&nbsp;
 <?php $value = object_input_tag($cadphart, 'getDescen', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'cadphart[descen]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadphart[mondph]', __($labels['cadphart{mondph}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{mondph}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{mondph}')): ?>
    <?php echo form_error('cadphart{mondph}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getMondph', array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'cadphart[mondph]',
),$default_value = number_format($value,2,',','.')); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>
</div>
<?php if($sf_user->getAttribute('orddesveh','','almdesp')=='S') { ?>
<h2 class="h2" onclick="javascript: return $('divDatos Orden de Despacho Vehicular').toggle();"><?php echo __('Datos Orden de Despacho Vehicular') ?></h2>
    <fieldset id="sf_fieldset_datos_orden_de_despacho_vehicular" style="">



<div class="form-row" id="divDatos Orden de Despacho Vehicular">
  <?php echo label_for('cadphart[fecemiov]', __($labels['cadphart{fecemiov}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{fecemiov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{fecemiov}')): ?>
    <?php echo form_error('cadphart{fecemiov}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cadphart, 'getFecemiov', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cadphart[fecemiov]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>

  <?php echo label_for('cadphart[feccarov]', __($labels['cadphart{feccarov}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{feccarov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{feccarov}')): ?>
    <?php echo form_error('cadphart{feccarov}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cadphart, 'getFeccarov', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cadphart[feccarov]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>

  <?php echo label_for('cadphart[locori]', __($labels['cadphart{locori}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{locori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{locori}')): ?>
    <?php echo form_error('cadphart{locori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getLocori', array (
  'size' => 80,
  'control_name' => 'cadphart[locori]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>

  <?php echo label_for('cadphart[direccion]', __($labels['cadphart{direccion}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{direccion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{direccion}')): ?>
    <?php echo form_error('cadphart{direccion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getDireccion', array (
  'size' => 80,
  'control_name' => 'cadphart[direccion]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>


  <?php echo label_for('cadphart[rubro]', __($labels['cadphart{rubro}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{rubro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{rubro}')): ?>
    <?php echo form_error('cadphart{rubro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getRubro', array (
  'size' => 80,
  'control_name' => 'cadphart[rubro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>


  <?php echo label_for('cadphart[cankg]', __($labels['cadphart{cankg}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{cankg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{cankg}')): ?>
    <?php echo form_error('cadphart{cankg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getCankg', array (
  'size' => 7,
  'control_name' => 'cadphart[cankg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>


  <?php echo label_for('cadphart[totpasreal]', __($labels['cadphart{totpasreal}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{totpasreal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{totpasreal}')): ?>
    <?php echo form_error('cadphart{totpasreal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getTotpasreal', array (
  'size' => 7,
  'control_name' => 'cadphart[totpasreal]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>


  <?php echo label_for('cadphart[locrec]', __($labels['cadphart{locrec}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{locrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{locrec}')): ?>
    <?php echo form_error('cadphart{locrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getLocrec', array (
  'size' => 80,
  'control_name' => 'cadphart[locrec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>


  <?php echo label_for('cadphart[emptra]', __($labels['cadphart{emptra}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{emptra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{emptra}')): ?>
    <?php echo form_error('cadphart{emptra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getEmptra', array (
  'size' => 80,
  'control_name' => 'cadphart[emptra]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>


  <?php echo label_for('cadphart[nomrep]', __($labels['cadphart{nomrep}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{nomrep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{nomrep}')): ?>
    <?php echo form_error('cadphart{nomrep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getNomrep', array (
  'size' => 80,
  'control_name' => 'cadphart[nomrep]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>


  <?php echo label_for('cadphart[telemp]', __($labels['cadphart{telemp}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{telemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{telemp}')): ?>
    <?php echo form_error('cadphart{telemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getTelemp', array (
  'size' => 80,
  'control_name' => 'cadphart[telemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>


  <?php echo label_for('cadphart[choveh]', __($labels['cadphart{choveh}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{choveh}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{choveh}')): ?>
    <?php echo form_error('cadphart{choveh}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getChoveh', array (
  'size' => 80,
  'control_name' => 'cadphart[choveh]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>


  <?php echo label_for('cadphart[cedcho]', __($labels['cadphart{cedcho}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{cedcho}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{cedcho}')): ?>
    <?php echo form_error('cadphart{cedcho}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getCedcho', array (
  'size' => 20,
  'control_name' => 'cadphart[cedcho]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>


  <?php echo label_for('cadphart[telcho]', __($labels['cadphart{telcho}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{telcho}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{telcho}')): ?>
    <?php echo form_error('cadphart{telcho}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getTelcho', array (
  'size' => 80,
  'control_name' => 'cadphart[telcho]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>

     <fieldset id="sf_fieldset_none" class="">
      <legend><?php echo __('Conformidad de Despacho') ?></legend>
        <div class="form-row">
            <?php echo label_for('cadphart[nomconfordes]', __($labels['cadphart{nomconfordes}']), 'class="required" style="width: 150px"') ?>
              <div class="content<?php if ($sf_request->hasError('cadphart{nomconfordes}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('cadphart{nomconfordes}')): ?>
                <?php echo form_error('cadphart{nomconfordes}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($cadphart, 'getNomconfordes', array (
              'size' => 80,
              'control_name' => 'cadphart[nomconfordes]',
            )); echo $value ? $value : '&nbsp;' ?>
                </div>

                <br>


              <?php echo label_for('cadphart[cedconfordes]', __($labels['cadphart{cedconfordes}']), 'class="required" style="width: 150px"') ?>
              <div class="content<?php if ($sf_request->hasError('cadphart{cedconfordes}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('cadphart{cedconfordes}')): ?>
                <?php echo form_error('cadphart{cedconfordes}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($cadphart, 'getCedconfordes', array (
              'size' => 20,
              'control_name' => 'cadphart[cedconfordes]',
            )); echo $value ? $value : '&nbsp;' ?>
                </div>

                <br>


              <?php echo label_for('cadphart[horsalconfordes]', __($labels['cadphart{horsalconfordes}']), 'class="required" style="width: 150px"') ?>
              <div class="content<?php if ($sf_request->hasError('cadphart{horsalconfordes}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('cadphart{horsalconfordes}')): ?>
                <?php echo form_error('cadphart{horsalconfordes}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($cadphart, 'getHorsalconfordes', array (
              'size' => 20,
              'control_name' => 'cadphart[horsalconfordes]',
            )); echo $value ? $value : '&nbsp;' ?>
                </div>
        </div>
     </fieldset>

    <br>

    <fieldset id="sf_fieldset_none" class="">
      <legend><?php echo __('Conformidad de Recepción') ?></legend>
        <div class="form-row">
            <?php echo label_for('cadphart[nomconforrec]', __($labels['cadphart{nomconforrec}']), 'class="required" style="width: 150px"') ?>
              <div class="content<?php if ($sf_request->hasError('cadphart{nomconforrec}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('cadphart{nomconforrec}')): ?>
                <?php echo form_error('cadphart{nomconforrec}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($cadphart, 'getNomconforrec', array (
              'size' => 80,
              'control_name' => 'cadphart[nomconforrec]',
            )); echo $value ? $value : '&nbsp;' ?>
                </div>

                <br>


              <?php echo label_for('cadphart[cedconforrec]', __($labels['cadphart{cedconforrec}']), 'class="required" style="width: 150px"') ?>
              <div class="content<?php if ($sf_request->hasError('cadphart{cedconforrec}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('cadphart{cedconforrec}')): ?>
                <?php echo form_error('cadphart{cedconforrec}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($cadphart, 'getCedconforrec', array (
              'size' => 20,
              'control_name' => 'cadphart[cedconforrec]',
            )); echo $value ? $value : '&nbsp;' ?>
                </div>

                <br>


              <?php echo label_for('cadphart[horlleconforrec]', __($labels['cadphart{horlleconforrec}']), 'class="required" style="width: 150px"') ?>
              <div class="content<?php if ($sf_request->hasError('cadphart{horlleconforrec}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('cadphart{horlleconforrec}')): ?>
                <?php echo form_error('cadphart{horlleconforrec}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($cadphart, 'getHorlleconforrec', array (
              'size' => 20,
              'control_name' => 'cadphart[horlleconforrec]',
            )); echo $value ? $value : '&nbsp;' ?>
                </div>
        </div>
     </fieldset>
  <br/>
</div>

</fieldset>
<?php } ?>

<div class="form-row" id="divGrid">
<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
</form>
<br>
<!--
<table>
 <tr>
 <th>&nbsp;&nbsp;&nbsp;<?php echo __('Totales') ?></th>
  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th><input class="grid_txtright" type="text" id="totalcantd" name="totalcantd" size="10" disabled=true></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><input class="grid_txtright" type="text" id="totalcantnd" name="totalcantnd" size="10" disabled=true></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><input class="grid_txtright" type="text" id="totalcosto" name="totalcosto" size="10" disabled=true></th>
 </tr>
</table> -->
</div>

</fieldset>


<?php include_partial('edit_actions', array('cadphart' => $cadphart)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($cadphart->getId() && $oculeli!="S"): ?>
<?php echo button_to(__('delete'), 'almdesp/delete?id='.$cadphart->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">
  var id="";
  var id='<?php echo $cadphart->getId()?>';
  actualiza(id);
  if (id=="")
  {
     var manesolcorr='<?php echo $mansolocor; ?>';
     if (manesolcorr=='S')
     {
        $('cadphart_dphart').value='########';
     	$('cadphart_dphart').readOnly=true;
        $('cadphart_reqart').focus();
     }
  }

  var deshab='<?php echo $bloqfec; ?>';
  if (deshab=='S')
  {
  	$('trigger_cadphart_fecdph').hide();
  	$('cadphart_fecdph').readOnly=true;
  }


 function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}
     $('cadphart_dphart').value=valor;
     
     var dphdesh='<?php echo $dphdesh; ?>';
     if (dphdesh=='S')
     {
     	$('cadphart_dphart').readOnly=true;
     }
 }
</script>
