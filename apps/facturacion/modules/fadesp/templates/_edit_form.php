<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 41780 2010-12-20 22:20:57Z cramirez $
 */
// date: 2007/03/16 11:39:26
?>
<?php echo form_tag('fadesp/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('dFilter', 'ajax', 'facturacion/fadesp', 'tools','observe') ?>

<?php echo object_input_hidden_tag($cadphart, 'getId') ?>
<?php echo input_hidden_tag('verificaexisydisp', '') ?>
<?php echo input_hidden_tag('mensaje', '') ?>
<?php echo input_hidden_tag('existeubicacion', '') ?>
<?php echo input_hidden_tag('nrofilas', $numreg) ?>

<?php echo input_hidden_tag('cadphart[codcli]', $cadphart->getCodcli()) ?>

<fieldset id="sf_fieldset_datos_del_despacho" class="">

<div class="form-row" id="divDatos del Despacho">
<fieldset id="sf_fieldset_none" class="">
<legend><?php if ($despnotent=="") {?>
	<?php echo __('Datos del Despacho') ?>
	<?php }else {?>
    <?php echo __('Datos de la Nota de Entrega') ?>
    <?php }?>

	</legend>
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

<table>
  <tr>
    <th>
		<div id="divtipref">
		  <?php echo label_for('cadphart[tipref]', __($labels['cadphart{tipref}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('cadphart{tipref}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('cadphart{tipref}')): ?>
		    <?php echo form_error('cadphart{tipref}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

           <?php echo select_tag('cadphart[tipref]', options_for_select(Constantes::ListaRefiereDespachos(),$cadphart->getTipref(),'include_custom=Seleccione Uno'),array(
             'onchange' => "habilitarefere(this.id)",
             'onFocus'  =>  $cadphart->getId()!='' ? "this.blur()" : false ,
	       )) ?>

		    </div>
		</div>
	</th>
	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
	<th>
		<table>
			<tr>
				<th>
					<div id="divreqart">
					  <?php echo label_for('cadphart[reqart]', __($labels['cadphart{reqart}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
					  <div class="content<?php if ($sf_request->hasError('cadphart{reqart}')): ?> form-error<?php endif; ?>">
					  <?php if ($sf_request->hasError('cadphart{reqart}')): ?>
					    <?php echo form_error('cadphart{reqart}', array('class' => 'form-error-msg')) ?>
					  <?php endif; ?>

					  <?php $value = object_input_tag($cadphart, 'getReqart', array (
					  'size' => 20,
					  'control_name' => 'cadphart[reqart]',
					  'readonly'  =>  $cadphart->getId()!='' ? true : false ,
					  'onBlur'=> remote_function(array(
				        'update'   => 'divGrid',
				        'url'      => 'fadesp/grid',
				        'complete' => 'AjaxJSON(request, json), actualizarsaldos() ',
				        'condition' => "$('cadphart_reqart').value != '' && $('id').value == ''",
				        'script' => true,
				        'with' => "'ajax=2&cajtexmos=cadphart_desreq&cajtexcom=cadphart_reqart&codigo='+this.value+'&tipref='+$(cadphart_tipref).value"
						  ))
			  )); echo $value ? $value : '&nbsp;' ?>


					    </div>
					</div>
				</th>
				<th>
					<div id="divrefpedido">
				   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fapedido_Fanotent/clase/Fapedido/frame/sf_admin_edit_form/obj1/cadphart_reqart/campo1/nroped','','','botoncat')?></th>
					</div>
				</th>
				<th>
					<div id="divreffactura">
				   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Factura_Fanotent/clase/Fafactur/frame/sf_admin_edit_form/obj1/cadphart_reqart/campo1/reffac','','','botoncat')?></th>
					</div>
				</th>
				<th>
				    <div id="divrefrequisicion">
				    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Careqart_Almdes/clase/Careqart/frame/sf_admin_edit_form/obj1/cadphart_reqart/campo1/reqart','','','botoncat')?></th>
				    </div>
				</th>
			</tr>
		</table>
	</th>
  </tr>
</table>

<br>

<table>
  <tr>
    <th>
		<div id="divrifpro">
		  <?php echo label_for('cadphart[rifpro]', __($labels['cadphart{rifpro}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('cadphart{rifpro}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('cadphart{rifpro}')): ?>
		    <?php echo form_error('cadphart{rifpro}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

			<?php $value = object_input_tag($cadphart, 'getRifpro', array (
			  'size' => 20,
			  'control_name' => 'cadphart[rifpro]',
			  'readonly'  =>  true,
			  'onKeyDown' => "javascript:return dFilter (event.keyCode, this)",
			  'onBlur'=> remote_function(array(
						  'url'      => 'cadphart/ajax',
						  'script' => true,
						  'complete' => 'AjaxJSON(request, json)',
						  'condition' => "$('cadphart_rifpro').value != ''",
			  			  'with' => "'ajax=1&cajtexmos=cadphart_nompro&codigo='+this.value"
						  ))
			  )); echo $value ? $value : '&nbsp;' ?>
			<th>
			   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Rifcli_Fapedido/clase/Facliente/frame/sf_admin_edit_form/obj1/cadphart_rifpro/obj2/cadphart_nompro/campo1/rifpro/campo2/nompro','','','botoncat')?></th>
			</th>
			<th>
			  <?php $value = object_input_tag($cadphart, 'getNompro', array (
			  'size' => 60,
			  'disabled' => true,
			  'control_name' => 'cadphart[nompro]',
			)); echo $value ? $value : '&nbsp;' ?>
			</th>
		    </div>
		</div>
	</th>
  </tr>
</table>

<br>

<table>
  <tr>
    <th>
		<div id="divdirpro">
		  <?php echo label_for('cadphart[dirpro]', __($labels['cadphart{dirpro}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('cadphart{dirpro}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('cadphart{dirpro}')): ?>
		    <?php echo form_error('cadphart{dirpro}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($cadphart, 'getDirpro', array (
		  'disabled' => true,
		  'size' => '90',
		  'control_name' => 'cadphart[dirpro]',
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
		</div>
	</th>
</table>

<br>

<table>
	<th>
		<div id="divtelpro">
		  <?php echo label_for('cadphart[telpro]', __($labels['cadphart{telpro}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('cadphart{telpro}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('cadphart{telpro}')): ?>
		    <?php echo form_error('cadphart{telpro}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($cadphart, 'getTelpro', array (
		  'disabled' => true,
		  'control_name' => 'cadphart[telpro]',
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
		</div>
	</th>
  </tr>
</table>

<br>
<table>
	<tr>
		<th>
		  <?php echo label_for('cadphart[desdph]', __($labels['cadphart{desdph}']), 'class="required" style="width: 150px"') ?>
		  <div class="content<?php if ($sf_request->hasError('cadphart{desdph}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('cadphart{desdph}')): ?>
		    <?php echo form_error('cadphart{desdph}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_textarea_tag($cadphart, 'getDesdph', array (
		  'size' => '90x3',
		  'maxlength'=>250,
		  'control_name' => 'cadphart[desdph]',
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
		</th>
	</tr>
</table>

<br>

<table>
	<tr>
		<th>
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
		</th>
	</tr>
</table>

</div>
</fieldset>

<?php if($sf_user->getAttribute('orddesveh','','fadesp')=='S') { ?>
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
</div>
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
      <li class="float-rigth"><?php if ($cadphart->getId()): ?>
<?php echo button_to(__('delete'), 'fadesp/delete?id='.$cadphart->getId(), array (
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

 $('divrefpedido').hide();
 $('divrefrequisicion').hide();
 $('divreffactura').hide();

 $$('.botoncat')[0].disabled=true; //pedido
 $$('.botoncat')[1].disabled=true; //factura
 $$('.botoncat')[2].disabled=true; //requisicion
 $$('.botoncat')[3].disabled=true; //rif
 $('cadphart_reqart').readOnly=true;

 function habilitarefere(id)
 {
	 var neww='<?php echo $cadphart->getId()?>';
	 if ($(id).value!="" && neww=="")
	 {
	 	if ($(id).value=='F')
	 	{
	      $('cadphart_reqart').readOnly=false;
	      $('cadphart_reqart').value='';
	      $$('.botoncat')[1].disabled=false;
		  $('divreffactura').show();
		  $('divrefpedido').hide();
		  $('divrefrequisicion').hide();
	 	}
	 	else if ($(id).value=='P')
	 	{
	      $('cadphart_reqart').readOnly=false;
	      $('cadphart_reqart').value='';
	      $$('.botoncat')[0].disabled=false;
		  $('divrefpedido').show();
		  $('divreffactura').hide();
		  $('divrefrequisicion').hide();
	 	}
	 	else if ($(id).value=='R')
	 	{
	      $('cadphart_reqart').readOnly=false;
	      $('cadphart_reqart').value='';
	      $$('.botoncat')[2].disabled=false;
		  $('divrefpedido').hide();
		  $('divreffactura').hide();
		  $('divrefrequisicion').show();
	 	}
	 	else
	 	{
	      $('cadphart_reqart').value='';
	 	}
	 }
	 else{
	      $('cadphart_reqart').value='';
	      $('cadphart_reqart').readOnly=true;
	      //$$('.botoncat')[0].disabled=true;
	      //$$('.botoncat')[1].disabled=true;
	 }
 }



</script>

