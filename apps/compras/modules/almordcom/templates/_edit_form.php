<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/04 16:53:16
?>
<?php echo form_tag('almordcom/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','compras/almordcom','ajax','tools', 'observe') ?>
<?php echo object_input_hidden_tag($caordcom, 'getId') ?>
  <?php $value = object_input_hidden_tag($caordcom, 'getStaord', array (
  'control_name' => 'caordcom[staord]',
)); echo $value ? $value : '&nbsp;' ?>
<input id="fecha_egresos" name="fecha_egresos" value="0" type="hidden">
<input id="periodo" name="periodo" value="" type="hidden">
<input id="parcial" name="parcial" value="N" type="hidden">
<input id="cancotpril" name="cancotpril" value="0" type="hidden">
<input id="numero_filas_recargos" name="numero_filas_recargos" value="10" type="hidden">
<input id="numero_filas_orden" name="numero_filas_orden" value="150" type="hidden">
<input id="sumatoria_recargos" name="sumatoria_recargos" type="hidden">
<input id="sumatoria_detalle_orden" name="sumatoria_detalle_orden" type="hidden">
<input id="sumatoria_recargos" name="sumatoria_recargos" type="hidden">
<input id="sumatoria_descuentos" name="sumatoria_descuentos" type="hidden">
<?php echo input_hidden_tag('caordcom[codigoproveedor]', $caordcom->getCodigoproveedor()) ?>
<input id="tasacambio" name="tasacambio" type="hidden">
<input id="codconpag_dos" name="codconpag_dos" type="hidden">
<input id="mensaje_proveedor" name="mensaje_proveedor"  type="hidden">
<input id="codforent_dos" name="codforent_dos" type="hidden">
<?php echo input_hidden_tag('caordcom[partrec]', $caordcom->getPartrec()) ?>
<?php echo input_hidden_tag('caordcom[genctaord]', $caordcom->getGenctaord()) ?>
<?php echo input_hidden_tag('caordcom[gencomalc]', $caordcom->getGencomalc()) ?>
<?php echo input_hidden_tag('caordcom[eti]', $caordcom->getEti()) ?>
<?php echo input_hidden_tag('caordcom[tipopro]', $caordcom->getTipopro()) ?>
<?php echo input_hidden_tag('caordcom[compro]', $caordcom->getCompro()) ?>
<?php echo input_hidden_tag('fechaanuserv', $fechaanuserv) ?>
<?php echo input_hidden_tag('caordcom[manorddon]', $caordcom->getManorddon()) ?>

<input id="codigo_presupuestario_sin_disponibilidad" name="codigo_presupuestario_sin_disponibilidad" type="hidden">
<script language="JavaScript" type="text/javascript">
    entrar();
</script>
<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $caordcom->getEti();?></font></strong></th>
  </tr>
</table>


<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Orden')?></legend>
<div class="form-row">
<table>
 <tr>
  <th>
  <?php echo label_for('caordcom[ordcom]', __($labels['caordcom{ordcom}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{ordcom}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{ordcom}')): ?> <?php echo form_error('caordcom{ordcom}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caordcom, 'getOrdcom', array (
'readonly'  =>  $caordcom->getId()!='' ? true : false ,
'size' => 10,
'maxlength' => 8,
'control_name' => 'caordcom[ordcom]',
'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 8 caracteres') ?></div>
</div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
  <?php echo label_for('caordcom[fecord]', __($labels['caordcom{fecord}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{fecord}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{fecord}')): ?> <?php echo form_error('caordcom{fecord}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_date_tag($caordcom, 'getFecord', array (
  'size' => 11,
  'maxlength' => 10,  'rich' => true,
  'readonly' => $readonly,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caordcom[fecord]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'almordcom/ajax',
        'complete' => 'AjaxJSON(request, json), Mostrar_mensaje_periodo()',
        'condition' => "$('caordcom_fecord').value != '' && $('id').value == ''",
        'with' => "'ajax=14&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Introducir una Fecha valida') ?></div>
</div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
  <?php if ($caordcom->getTipmon()=='') $var='001'; else $var=$caordcom->getTipmon();?>
<?php echo label_for('caordcom[tipmon]', __($labels['caordcom{tipmon}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{tipmon}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{tipmon}')): ?> <?php echo form_error('caordcom{tipmon}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php echo select_tag('caordcom[tipmon]', objects_for_select(TsdesmonPeer::doSelect(new Criteria()),'getCodmon','getNommon',$var,'include_custom=Seleccione')) ?>
<div class="sf_admin_edit_help"><?php echo __('Escoja un Tipo de Moneda') ?></div></div>
  </th>
 </tr>
</table>

<br>

<?php echo label_for('caordcom[doccom]', __($labels['caordcom{doccom}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{doccom}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{doccom}')): ?> <?php echo form_error('caordcom{doccom}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getDoccom', array (
  'size' => 6,
  'maxlength' => 4,
  'control_name' => 'caordcom[doccom]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcom/ajax',
              'condition' => "$('caordcom_doccom').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
          'with' => "'ajax=2&cajtexmos=caordcom_nomext&cajtexcom=caordcom_doccom&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdoccom_Almordcom/clase/Cpdoccom/frame/sf_admin_edit_form/obj1/caordcom_doccom/obj2/caordcom_nomext/campo1/tipcom/campo2/nomext/param1/')?>


<?php $value = object_input_tag($caordcom, 'getNomext', array (
'size' => 60,
'control_name' => 'caordcom[nomext]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div>
<br>

  <?php echo label_for('caordcom[refprc]', __($labels['caordcom{refprc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{refprc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{refprc}')): ?>
    <?php echo form_error('caordcom{refprc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php if($caordcom->getRefprc()=='S') $val = true; else $val=false; ?>
    <?php echo "Si ".radiobutton_tag('caordcom[refprc]', 'S',  $val, array('id'=>'caordcom_refprc_s' , 'onClick'=> "$('div_solicitud').show();")); ?>&nbsp;
  <?php echo "No ".radiobutton_tag('caordcom[refprc]', 'N', !$val, array('id'=>'caordcom_refprc_n', 'onClick'=> "$('div_solicitud').hide();")) ?>

<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>
    </div>
    <br>
<?php //if (($caordcom->getId()!='') and ($caordcom->getRefsol()!='')) {?>
<div  id="div_solicitud">
 <?php echo label_for('caordcom[refsol]', __($labels['caordcom{refsol}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{refsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{refsol}')): ?>
    <?php echo form_error('caordcom{refsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php

echo input_tag('caordcom[refsol]', $caordcom->getRefsol(), array (
 'size' => 9,
 'maxlength' => 8,
 'control_name' => 'caordcom[refsol]',
 'onBlur'=> remote_function(array(
          'update'   => 'grid',
          'script' => true,
          'condition' => "$('caordcom_refsol').value != '' && $('id').value == ''",
          'url' => 'almordcom/grid?ajax=1&referencia=1',
          'complete' => 'AjaxJSON(request, json), Mostrar_mensaje_fecha_egresos_invalidad(),$("botonesmarcar").hide(),limpiardatos(),actualizarsaldos()',
          'with' => "'cajtexmos=caordcom_monord&filas_orden=numero_filas_orden&cajtexmos2=caordcom_rifpro&cajtexmos3=caordcom_nompro&ordcom='+this.value+'&fecord='+document.getElementById('caordcom_fecord').value+'&refsol='+document.getElementById('caordcom_refsol').value",
        ))))
 . '&nbsp;'. button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Casolart_Almcotiza/clase/Casolart/frame/sf_admin_edit_form/obj1/caordcom_refsol/campo1/reqart",'','','botoncat')
?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 8 caracteres') ?></div>
</div>
</div>
<?php //}?>
<br>
  <?php echo label_for('caordcom[monord]', __($labels['caordcom{monord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{monord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{monord}')): ?>
    <?php echo form_error('caordcom{monord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, array('getMonord',true), array (
  'readonly' => 'readonly',
  'size' => 10,
  'control_name' => 'caordcom[monord]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>


<?php echo label_for('caordcom[rifpro]', __($labels['caordcom{rifpro}']), 'class="required" Style="width:200px"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{rifpro}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{rifpro}')): ?> <?php echo form_error('caordcom{rifpro}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getRifpro', array (
  'size' => 16,
  'maxlength' => 15,
  'control_name' => 'caordcom[rifpro]',
  'onBlur'=> remote_function(array(
            //  'update'   => 'div_recargo',
          'script' => true,
        'url'      => 'almordcom/grid_recargos',
        'complete' => 'AjaxJSON(request, json),mensaje_rif_cambiado(),cargar_grid_orden_detalle_orden()',
          'with' => "'ajax=1&cajtexmos=caordcom_nompro&cancotpril=cancotpril&cajtexcom=caordcom_rifpro&cajtexcom=caordcom_rifpro&cajtexcom=caordcom_rifpro&numfilas=numero_filas_recargos&codconpag_codigo=codconpag_dos&codforent_codigo=codforent_dos&codconpag=caordcom_codconpag&codforent=caordcom_codforent&codconpag_des=caordcom_desconpag&codforent_des=caordcom_desforent&codigo_provee=caordcom_codigoproveedor&msg=mensaje_proveedor&refsol='+document.getElementById('caordcom_refsol').value+'&parcial='+document.getElementById('parcial').value+'&codigo='+this.value",
        )),

)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Caprovee_Almordcom/clase/Caprovee/frame/sf_admin_edit_form/obj1/caordcom_rifpro/obj2/caordcom_nompro/obj3/caordcom_codigoproveedor/campo1/rifpro/campo2/nompro/campo3/codpro/param1/'+$('caordcom_refsol').value+'",'','','botoncat')?>

<?php $value = object_input_tag($caordcom, 'getNompro', array (
  'size' => 80,
  'control_name' => 'caordcom[nompro]',
  )); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 15 caracteres') ?></div>
  </div>

<br>

<?php echo label_for('caordcom[desord]', __($labels['caordcom{desord}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{desord}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{desord}')): ?> <?php echo form_error('caordcom{desord}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php $value = object_textarea_tag($caordcom, 'getDesord', array (
  'size' => '106x3',
  'control_name' => 'caordcom[desord]',
  'maxlength'=> 1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Introduzca una Descripción Valida') ?></div></div>


<br>

<div id="div_tipo_orden">
<?php echo label_for('caordcom[tipord]', __($labels['caordcom{tipord}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{tipord}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{tipord}')): ?> <?php echo form_error('caordcom{tipord}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php echo select_tag('caordcom[tipord]', options_for_select($listatipocompra,$caordcom->getTipord(),'include_custom=Seleccione'),array('onChange' => 'actualizar_grid_dependientes()'));?>
<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>  </div>
</div>

<br>
  <?php echo label_for('caordcom[tipo]', __($labels['caordcom{tipo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{tipo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{tipo}')): ?>
    <?php echo form_error('caordcom{tipo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php if ($caordcom->getTipo()=='A')
{
  $v1=true; $v2=false; $v3=false; $v4=false; $v5=false;
}
elseif ($caordcom->getTipo()=='L')
{
  $v1=false; $v2=true; $v3=false; $v4=false; $v5=false;
}
elseif ($caordcom->getTipo()=='C')
{
  $v1=false; $v2=false; $v3=true; $v4=false; $v5=false;
}
elseif ($caordcom->getTipo()=='E')
{
  $v1=false; $v2=false; $v3=false; $v4=true; $v5=false;
}
elseif ($caordcom->getTipo()=='T')
{
  $v1=false; $v2=false; $v3=false; $v4=false; $v5=true;
}
else
{
  $v1=false; $v2=false; $v3=true; $v4=false; $v5=false;
}

?> <?php echo __(" Adjudicación Directa ").radiobutton_tag('caordcom[tipo]', 'A', $v1) ?>&nbsp;
<?php echo __(" $etiqtipord ").radiobutton_tag('caordcom[tipo]', 'L', $v2) ?>&nbsp;
<?php echo __(" Compra ").radiobutton_tag('caordcom[tipo]', 'C', $v3) ?>&nbsp;
<?php echo __(" Compra Eventual ").radiobutton_tag('caordcom[tipo]', 'E', $v4) ?>
<?php echo __(" Contratación ").radiobutton_tag('caordcom[tipo]', 'T', $v5) ?>
<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>  </div>
<br>
  <?php echo label_for('caordcom[tipo]', __('Descuento:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{tipo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{tipo}')): ?>
    <?php echo form_error('caordcom{tipo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php echo __("Tipo Porcentaje ").radiobutton_tag('descuenta', 'p', 'true', array('onClick'=> "inizializo_descuentos();")) ?>
    <?php echo __("Tipo Monto ").radiobutton_tag('descuenta', 'm', 'false', array('onClick'=> "inizializo_descuentos();")) ?>
    <?php echo __("Tipo Total ").radiobutton_tag('descuenta', 't', 'false', array('onClick'=> "inizializo_descuentos();")) ?>
<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<? if ($caordcom->getId()=='' && ($caordcom->getGenctaord()=='S')) { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'almordcom/ajaxcomprobante',
         'script'   => true,
         'submit' => 'sf_admin_edit_form',
         )) ?>
<? } ?> <div id="comp"></div>
<? if ($caordcom->getId()!='' and $aprobacion=='S' and $caordcom->getCompro()=='N') { ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo submit_to_remote('Submit2', 'Generar Compromiso', array(
         'url'      => 'almordcom/ajaxcompromiso',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)' )) ?>

<? }?>

<?php if ($caordcom->getId()!='') { ?>
  <input type="button" name="Submit" value="Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
<? } ?>

  </div>
<br>

<div id="div_fechas_entregas" class="form-row" style="display:none">
<?php echo grid_tag($obj_fechas);?>
</div>

</div>
</fieldset>
<br>
<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Detalle');?>
<fieldset>
<div class="form-row">

<div id="recargos" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?
 echo input_hidden_tag('totartsinrec', '0');
 echo input_hidden_tag('actualfila', '0');
?>
<div id="grid_recargo">
<?
echo grid_tag($obj_recargos);
?>
</div>
<div align="center">
<table>
<tr>
<th>
<?php echo label_for('',__('Total') , 'class="required" Style="width:40px"') ?>
<?php echo input_tag('totrecar','0,00', 'size=14 class=grid_txtright readonly=true') ?>

</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <div align="right">
    <?php if ($caordcom->getOrdcom()==''){ ?>
      <?php echo link_to_function(image_tag('/images/salir.gif'), "salvarmontorecargos()")?>
    <?php } else if ($caordcom->getOrdcom()!='' && $caordcom->getCompro()=='N') {?>
    	<?php echo link_to_function(image_tag('/images/salir.gif'), "salvarmontorecargos()")?>
    	<?php }else {?>
      <?php echo link_to_function(image_tag('/images/salir.gif'), "$('recargos').hide();")?>
    <?php }?>
  </div>
</th>
</tr>
</table>
</div>


</div>
</fieldset>
</div>

<? if ($caordcom->getOrdcom()=='' || ($caordcom->getOrdcom()!='' && $caordcom->getCompro()=='N')) { ?>
<div align="left" id="botonesmarcar">

<table>
<tr>
  <fieldset> <legend><?php echo __('Aplicar recargo en lote a articulos seleccionados') ?></legend>
    <th>
      <input type="button" name="Submit" value="Marcar" onClick="marcarTodo();"/>
    </th>
    <th>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
      <input type="button" name="Submit" value="Desmarcar" onClick="desmarcarTodo();"/>
    </th>
  </fieldset>
</tr>
</table>
</div>
<?php } else {?>
<div align="left" id="botonesmarcar">
</div>
  <?php } ?>
<div id="grid">
<?php echo grid_tag($obj);?>
</div>
<table>
    <tr>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th><?php echo label_for('Totales', __('TOTALES'), 'class="required" ') ?></th>
      <th>&nbsp;&nbsp;</th>
      <th>
      <?php echo label_for('caordcom[totrecargo]', __($labels['caordcom{totrecargo}']), 'class="required"') ?>
		<div class="content<?php if ($sf_request->hasError('caordcom{totrecargo}')): ?> form-error<?php endif; ?>">
		<?php if ($sf_request->hasError('caordcom{totrecargo}')): ?> <?php echo form_error('caordcom{totrecargo}', array('class' => 'form-error-msg')) ?>
		<?php endif; ?>

      <?php $value = object_input_tag($caordcom, array('getTotrecargo',true), array (
    'size' => 15,
    'readonly' => true,
    'class' => 'grid_txtright',
    'control_name' => 'caordcom[totrecargo]',
  )); echo $value ? $value : '&nbsp;' ?></th>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th>
        <?php echo label_for('caordcom[totorden]', __($labels['caordcom{totorden}']), 'class="required"') ?>
		<div class="content<?php if ($sf_request->hasError('caordcom{totorden}')): ?> form-error<?php endif; ?>">
		<?php if ($sf_request->hasError('caordcom{totorden}')): ?> <?php echo form_error('caordcom{totorden}', array('class' => 'form-error-msg')) ?>
		<?php endif; ?>

       <?php $value = object_input_tag($caordcom, array('getTotorden',true), array (
    'size' => 15,
    'readonly' => true,
    'class' => 'grid_txtright',
    'control_name' => 'caordcom[totorden]',
  )); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>
<div id="div_recargo">
</div>
</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage2", 'Condiciones de Pago/Proyecto');?>
<fieldset><legend><?php echo __('Condición de Pago') ?></legend>
<div class="form-row">
<?php echo label_for('caordcom[codconpag]', __($labels['caordcom{codconpag}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{codconpag}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{codconpag}')): ?> <?php echo form_error('caordcom{codconpag}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($caordcom, 'getCodconpag', array (
  'size' => 8,
  'maxlength' => 4,
  'control_name' => 'caordcom[codconpag]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcom/ajax',
              'before'   => 'var codconpag=document.getElementById("caordcom_codconpag").value;codconpag=codconpag.pad(4, "0",0);document.getElementById("caordcom_codconpag").value=codconpag;',
        'complete' => 'AjaxJSON(request, json),actualizar_codconpag_dos()',
          'with' => "'ajax=6&cajtexmos=caordcom_desconpag&cajtexmos2=codconpag_dos&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caconpag_Almordcom/clase/Caconpag/frame/sf_admin_edit_form/obj1/caordcom_codconpag/obj2/caordcom_desconpag/campo1/codconpag/campo2/desconpag')?></th>

<?php $value = object_input_tag($caordcom, 'getDesconpag', array (
'size' => 60,
'disabled' => true,
'control_name' => 'caordcom[desconpag]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div>
</div>
</fieldset>
<br>
<fieldset><legend><?php echo __('Proyecto')?></legend>
<div class="form-row">
<?php echo label_for('caordcom[tippro]', __($labels['caordcom{tippro}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{tippro}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{tippro}')): ?> <?php echo form_error('caordcom{tippro}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getTippro', array (
  'size' => 8,
  'maxlength' => 4,
  'control_name' => 'caordcom[tippro]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcom/ajax',
              'before'   => 'var tippro=document.getElementById("caordcom_tippro").value;tippro=tippro.pad(4, "0",0);document.getElementById("caordcom_tippro").value=tippro;',
        'complete' => 'AjaxJSON(request, json),habilitar_boton_comprobante()',
          'with' => "'ajax=8&cajtexmos=caordcom_despro&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catippro_Almordcom/clase/Catippro/frame/sf_admin_edit_form/obj1/caordcom_tippro/obj2/caordcom_despro/campo1/codpro/campo2/despro')?></th>

<?php $value = object_input_tag($caordcom, 'getDespro', array (
'size' => 60,
'disabled' => true,
'control_name' => 'caordcom[despro]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Forma de Entrega');?>
<fieldset>
<div class="form-row">
<?php echo label_for('caordcom[codforent]', __($labels['caordcom{codforent}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('caordcom{codforent}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{codforent}')): ?> <?php echo form_error('caordcom{codforent}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
  <?php $value = object_input_tag($caordcom, 'getCodforent', array (
  'size' => 8,
  'maxlength' => 4,
  'control_name' => 'caordcom[codforent]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcom/ajax',
              'before'   => 'var codforent=document.getElementById("caordcom_codforent").value;codforent=codforent.pad(4, "0",0);document.getElementById("caordcom_codforent").value=codforent;',
        'complete' => 'AjaxJSON(request, json),actualizar_codforent_dos()',
          'with' => "'ajax=7&cajtexmos=caordcom_desforent&cajtexmos2=codforent_dos&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caforent_Almordcom/clase/Caforent/frame/sf_admin_edit_form/obj1/caordcom_codforent/obj2/caordcom_desforent/campo1/codforent/campo2/desforent')?></th>

<?php $value = object_input_tag($caordcom, 'getDesforent', array (
'size' => 60,
'disabled' => true,
'control_name' => 'caordcom[desforent]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div>
</div>
</fieldset>
<br>
<fieldset><legend><?php echo __('Justificación') ?></strong></legend>
<div class="form-row">
<?php echo label_for('caordcom[justif]', __($labels['caordcom{justif}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{justif}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{justif}')): ?> <?php echo form_error('caordcom{justif}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php $value = object_textarea_tag($caordcom, 'getJustif', array (
  'size' => '106x3',
  'control_name' => 'caordcom[justif]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Introduzca una Descripción Valida') ?></div></div>
</div>
</fieldset>
<br>
<fieldset>
<legend><?php echo __('Tipo Financiamiento') ?></legend>
<div class="form-row">
<?php echo label_for('caordcom[tipfin]', __($labels['caordcom{tipfin}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{tipfin}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{tipfin}')): ?> <?php echo form_error('caordcom{tipfin}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getTipfin', array (
  'size' => 8,
  'maxlength' => 4,
  'control_name' => 'caordcom[tipfin]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcom/ajax',
              'before'   => 'var tipfin=document.getElementById("caordcom_tipfin").value;tipfin=tipfin.pad(4, "0",0);document.getElementById("caordcom_tipfin").value=tipfin;',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=9&cajtexmos=caordcom_nomfin&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fortipfin_Almordcom/clase/Fortipfin/frame/sf_admin_edit_form/obj1/caordcom_tipfin/obj2/caordcom_nomfin/campo1/codfin/campo2/nomext')?></th>

<?php $value = object_input_tag($caordcom, 'getNomfin', array (
'size' => 60,
'disabled' => true,
'control_name' => 'caordcom[nomfin]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'Resumen');?>
<fieldset>
<div class="form-row">
<?php echo grid_tag($obj_resumen);?>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage5", 'Entregas');?>
<fieldset>
<div class="form-row">
<?php echo grid_tag($obj_entregas);?>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage6", 'Responsables');?>
<fieldset>
<div class="form-row">
<?php echo label_for('caordcom[coduni]', __($labels['caordcom{coduni}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('caordcom{coduni}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{coduni}')): ?> <?php echo form_error('caordcom{coduni}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCoduni', array (
  'size' => 8,
  'maxlength' => 3,
  'control_name' => 'caordcom[coduni]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcom/ajax',
              'before'   => 'var coduni=document.getElementById("caordcom_coduni").value;coduni=coduni.pad(3, "0",0);document.getElementById("caordcom_coduni").value=coduni;',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=10&cajtexmos=caordcom_desubi&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_Almordcom/clase/Bnubica/frame/sf_admin_edit_form/obj1/caordcom_coduni/obj2/caordcom_desubi/campo1/codubi/campo2/desubi')?></th>

<?php $value = object_input_tag($caordcom, 'getDesubi', array (
'size' => 50,
'maxlength' => 50,
'disabled' => true,
'control_name' => 'caordcom[desubi]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 3 caracteres') ?></div></div>

<br>
<?php echo label_for('caordcom[codemp]', __($labels['caordcom{codemp}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('caordcom{codemp}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{codemp}')): ?> <?php echo form_error('caordcom{codemp}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCodemp', array (
  'size' => 16,
  'maxlength' => 16,
  'control_name' => 'caordcom[codemp]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcom/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=11&cajtexmos=caordcom_nomemp&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Almordcom/clase/Nphojint/frame/sf_admin_edit_form/obj1/caordcom_codemp/obj2/caordcom_nomemp/campo1/codemp/campo2/nomemp')?></th>

 <?php $value = object_input_tag($caordcom, 'getNomemp', array (
'size' => 50,
'maxlength' => 50,
'disabled' => true,
'control_name' => 'caordcom[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 16 caracteres') ?></div></div>

<br>
<?php echo label_for('caordcom[codcen]', __($labels['caordcom{codcen}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('caordcom{codcen}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{codcen}')): ?> <?php echo form_error('caordcom{codcen}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCodcen', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'caordcom[codcen]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcom/ajax',
        'condition' => "$('caordcom_codcen').value!=''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=17&cajtexmos=caordcom_descen&cajtexcom=caordcom_codcen&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefcen_Almsolegr/clase/Cadefcen/frame/sf_admin_edit_form/obj1/caordcom_codcen/obj2/caordcom_descen/campo1/codcen/campo2/descen')?>

<?php $value = object_input_tag($caordcom, 'getDescen', array (
'size' => 50,
'maxlength' => 50,
'disabled' => true,
'control_name' => 'caordcom[descen]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div>
<br>
<?php echo label_for('caordcom[codcenaco]', __($labels['caordcom{codcenaco}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('caordcom{codcenaco}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{codcenaco}')): ?> <?php echo form_error('caordcom{codcenaco}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCodcenaco', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'caordcom[codcenaco]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcom/ajax',
        'condition' => "$('caordcom_codcenaco').value!=''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=19&cajtexmos=caordcom_descenaco&cajtexcom=caordcom_codcenaco&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefcenaco_Almsolegr/clase/Cadefcenaco/frame/sf_admin_edit_form/obj1/caordcom_codcenaco/obj2/caordcom_descenaco/campo1/codcenaco/campo2/descenaco')?>

<?php $value = object_input_tag($caordcom, 'getDescenaco', array (
'size' => 50,
'maxlength' => 50,
'disabled' => true,
'control_name' => 'caordcom[descenaco]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage8", 'Nota');?>
<fieldset>
<div class="form-row">
<?php echo label_for('caordcom[notord]', __($labels['caordcom{notord}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{notord}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{notord}')): ?> <?php echo form_error('caordcom{notord}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caordcom, 'getNotord', array (
'size' => 80,
'control_name' => 'caordcom[notord]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Introduzca una Nota Valida') ?></div></div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage7", 'SNC');?>
<fieldset>
<div class="form-row">
 <table>
  <tr>
   <th>
     <?php echo label_for('caordcom[codmedcom]', __($labels['caordcom{codmedcom}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{codmedcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{codmedcom}')): ?>
    <?php echo form_error('caordcom{codmedcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('caordcom[codmedcom]', objects_for_select(CamedcomPeer::doSelect(new Criteria()),'getCodmedcom','getDesmedcom',$caordcom->getCodmedcom(),'include_custom=Seleccione')) ?>
  </div>
   </th>
   <th>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
     <?php echo label_for('caordcom[codprocom]', __($labels['caordcom{codprocom}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{codprocom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{codprocom}')): ?>
    <?php echo form_error('caordcom{codprocom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('caordcom[codprocom]', objects_for_select(CaprocomPeer::doSelect(new Criteria()),'getCodprocom','getDesprocom',$caordcom->getCodprocom(),'include_custom=Seleccione')) ?>
    </div>
   </th>
  </tr>
 </table>

<br>

 <table>
  <tr>
   <th>  <?php echo label_for('caordcom[codpai]', __($labels['caordcom{codpai}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{codpai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{codpai}')): ?>
    <?php echo form_error('caordcom{codpai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo select_tag('caordcom[codpai]', options_for_select($pais,$caordcom->getCodpai(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
    'update'   => 'divEstados',
    'url'      => 'almordcom/combosnc?par=1',
    'with' => "'pais='+this.value"
  ))));?>
    </div>
   </th>
   <th>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
   <?php echo label_for('caordcom[codedo]', __($labels['caordcom{codedo}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{codedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{codedo}')): ?>
    <?php echo form_error('caordcom{codedo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<div id="divEstados">
<?php echo select_tag('caordcom[codedo]', options_for_select($estados,$caordcom->getCodedo(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
    'update'   => 'divMunicipios',
    'url'      => 'almordcom/combosnc?par=2',
    'with' => "'pais='+document.getElementById('caordcom_codpai').value+'&estado='+this.value"
  ))));?></div>
    </div>
   </th>
   <th>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
     <?php echo label_for('caordcom[codmun]', __($labels['caordcom{codmun}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{codmun}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{codmun}')): ?>
    <?php echo form_error('caordcom{codmun}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<div id="divMunicipios">
<?php echo select_tag('caordcom[codmun]', options_for_select($municipio,$caordcom->getCodmun(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
    'update'   => 'divParroquia',
    'url'      => 'almordcom/combosnc?par=3',
    'with' => "'pais='+document.getElementById('caordcom_codpai').value+'&estado='+document.getElementById('caordcom_codedo').value+'&municipio='+this.value"
  ))));?></div>
    </div>
   </th>
  </tr>
 </table>

<br>

<fieldset>
<legend><strong><?php echo __('Decreto 4000')?></strong></legend>
<div class="form-row">
  <?php echo label_for('caordcom[aplart]', __($labels['caordcom{aplart}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{aplart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{aplart}')): ?>
    <?php echo form_error('caordcom{aplart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if ($caordcom->getAplart()=='S')
  {
    $v=true;
  }
  else
  {
    $v=false;
  }
?> <?php echo "Si ".radiobutton_tag('caordcom[aplart]', 'S', $v) ?>&nbsp;
<?php echo "No ".radiobutton_tag('caordcom[aplart]', 'N', !$v) ?>&nbsp;
<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>
    </div>
</div>
</fieldset>

<br>

<fieldset>
<legend><strong><?php echo __('Decreto 3798') ?></strong></legend>
<div class="form-row">
  <?php echo label_for('caordcom[aplart6]', __($labels['caordcom{aplart6}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{aplart6}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{aplart6}')): ?>
    <?php echo form_error('caordcom{aplart6}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php if ($caordcom->getAplart6()=='S')
  {
    $v=true;
  }
  else
  {
    $v=false;
  }
?> <?php echo "Si ".radiobutton_tag('caordcom[aplart6]', 'S', $v) ?>&nbsp;
<?php echo "No ".radiobutton_tag('caordcom[aplart6]', 'N', !$v) ?>&nbsp;
<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>
    </div>
</div>
</fieldset>

</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage9", 'SIGECOF');?>
<fieldset>
<div class="form-row">
<?php echo label_for('caordcom[numsigecof]', __($labels['caordcom{numsigecof}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{numsigecof}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{numsigecof}')): ?> <?php echo form_error('caordcom{numsigecof}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($caordcom, 'getNumsigecof', array (
'size' => 8,
'readonly'  =>  $caordcom->getId()!='' ? true : false ,
'control_name' => 'caordcom[numsigecof]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Introduzca un Nombre Valido') ?></div></div>
</div>

<div class="form-row">
<?php echo label_for('caordcom[fecsigecof]', __($labels['caordcom{fecsigecof}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{fecsigecof}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{fecsigecof}')): ?> <?php echo form_error('caordcom{fecsigecof}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_date_tag($caordcom, 'getFecsigecof', array (
  'size' => 11,
  'maxlength' => 10,  'rich' => true,
  'readonly' => $readonly,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caordcom[fecsigecof]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'almordcom/ajax',
        'complete' => 'AjaxJSON(request, json), Mostrar_mensaje_periodo()',
        'condition' => "$('caordcom_fecsigecof').value != '' && $('id').value == ''",
        'with' => "'ajax=14&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Seleccione la Fecha en el Calendario') ?></div></div>
</div>

<div class="form-row">
<?php echo label_for('caordcom[expsigecof]', __($labels['caordcom{expsigecof}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{expsigecof}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{expsigecof}')): ?> <?php echo form_error('caordcom{expsigecof}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caordcom, 'getExpsigecof', array (
'size' => 8,
'readonly'  =>  $caordcom->getId()!='' ? true : false ,
'control_name' => 'caordcom[expsigecof]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Maximo 8 Caracteres ') ?></div></div>
</div>

</fieldset>

<?php tabPageOpenClose("tp1", "tabPage10", 'Resumen por Partida Presupuestaria');?>
<fieldset>
<div class="form-row">
<?php echo grid_tag($obj_respartidas);?>
</div>
</fieldset>

<?php if ($caordcom->getManorddon()=='S') tabPageOpenClose("tp1", "tabPage11", 'Datos del Beneficiario de la Donación');?>
<div id="datbendon" style="display:none">
<fieldset>
<div class="form-row">
<?php echo label_for('caordcom[tipocom]', __($labels['caordcom{tipocom}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{tipocom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{tipocom}')): ?>
    <?php echo form_error('caordcom{tipocom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getTipocom', array (
  'size' => 60,
  'maxlength' => 50,
  'control_name' => 'caordcom[tipocom]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('caordcom[ceddon]', __($labels['caordcom{ceddon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{ceddon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{ceddon}')): ?>
    <?php echo form_error('caordcom{ceddon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCeddon', array (
  'size' => 15,
  'maxlength' => 15,
  'control_name' => 'caordcom[ceddon]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('caordcom[nomdon]', __($labels['caordcom{nomdon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{nomdon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{nomdon}')): ?>
    <?php echo form_error('caordcom{nomdon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getNomdon', array (
  'size' => 60,
  'maxlength' => 50,
  'control_name' => 'caordcom[nomdon]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('caordcom[sexdon]', __($labels['caordcom{sexdon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{sexdon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{sexdon}')): ?>
    <?php echo form_error('caordcom{sexdon}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <? if ($caordcom->getSexdon()=='M')  {
      ?><?php echo radiobutton_tag('caordcom[sexdon]', 'M', true)        ."   Masculino".'&nbsp;&nbsp;';
          echo radiobutton_tag('caordcom[sexdon]', 'F', false)."     Femenino";?>
        <?
    }else{
      echo radiobutton_tag('caordcom[sexdon]', 'M', false)        ."Masculino".'&nbsp;&nbsp;';
      echo radiobutton_tag('caordcom[sexdon]', 'F', true)."   Femenino";

    } ?>
  </div>

<br>

<?php echo label_for('caordcom[fecdon]', __($labels['caordcom{fecdon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{fecdon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{fecdon}')): ?>
    <?php echo form_error('caordcom{fecdon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($caordcom, 'getFecdon', array (
  'rich' => true,
  'maxlength' => 10,
  'size' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caordcom[fecdon]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onChange'=> remote_function(array(
        'url'      => 'almordcom/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=18&cajtexmos=caordcom_edadon&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('caordcom[edadon]', __($labels['caordcom{edadon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{edadon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{edadon}')): ?>
    <?php echo form_error('caordcom{edadon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getEdaact', array (
  'size' => 3,
  'readonly' => true,
  'control_name' => 'caordcom[edadon]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

 <?php echo label_for('caordcom[serdon]', __($labels['caordcom{serdon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{serdon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{serdon}')): ?>
    <?php echo form_error('caordcom{serdon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('caordcom[serdon]', options_for_select(array('M' => 'Medicina', 'T' => 'Materiales', 'O' => 'Otro'),$caordcom->getSerdon(),'include_custom=Seleccione Uno')) ?>
  </div>
</div>
</fieldset>
</div>

<?php tabInit();?>
<?php include_partial('edit_actions', array('caordcom' => $caordcom)) ?>
</form>


<ul class="sf_admin_actions">
      <li class="float-left">
      <?php if ($oculeli!="S"): ?>
      <?php if ($caordcom->getId() and $caordcom->getStaord()!='N') : ?>
<?php echo button_to(__('delete'), 'almordcom/delete?id='.$caordcom->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?> <?php endif; ?>
</li>

<?php if ($caordcom->getId()!='' and $caordcom->getStaord()!='N') { ?>
<li>
<div id="anul">
<input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:Anular_orden();" />
</div>
</li
<? } ?>
  </ul>



<script type="text/javascript">
nuevo='<?php echo $caordcom->getId() ?>';
if (nuevo!="")
{
	actualizarsaldos();
}else{
     var manesolcorr='<?php echo $mansolocor; ?>';
     if (manesolcorr=='S')
     {
        $('caordcom_ordcom').value='########';
     	$('caordcom_ordcom').readOnly=true;
        $('caordcom_doccom').focus();
     }
  }

  var deshab='<?php echo $bloqfec; ?>';
  if (deshab=='S')
  {
  	$('trigger_caordcom_fecord').hide();
  	$('caordcom_fecord').readOnly=true;
  }

  var manorddon='<?php echo $caordcom->getManorddon();?>';
  if (manorddon=='S')
      $('datbendon').show();

 // if ($('caordcom_refsol').value=='') $('div_solicitud').hide();
   if ($('id').value=='' ||  $('caordcom_refsol').value=='')  $('div_solicitud').hide();
   var idordcom=$('id').value;
   $('tab9').innerHTML = '<a id="tab9" onClick="javascript:GenerarResumenPartidas(idordcom)" href="#">Resumen por Partida Presupuestaria</a>';


function enter(e,valor)
 {

   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('caordcom_ordcom').value=valor;
     var ordcomdesh='<?php echo $ordcomdesh; ?>';
     if (ordcomdesh=='S')
     {
     	$('caordcom_ordcom').readOnly=true;
     }
   }
 }

   function comprobante(formulario)
  {
      window.open('/tesoreria_dev.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

 function Mostrar_orden_preimpresa()
  {
      f=0;
      i=0;
      var primer_art=$("ax_0_2").value;
      while (f < $('numero_filas_orden').value)
      {
        var campo="ax_"+f+"_2";
        if(!$(campo))
        {
                i=f-1;
                var campo2="ax_"+i+"_2";
                var ultimo_art=$(campo2).value;
            break;
        }
            f++;
      }
      if(confirm("¿Desea imprimir la orden Pre-Impresa?"))
      {
            var ordcomdes=$('caordcom_ordcom').value;
            var ordcomhas=$('caordcom_ordcom').value;
            var codprodes='<?php echo $caordcom->getCodpro()?>';
            var codprohas='<?php echo $caordcom->getCodpro()?>';
            var codartdes=primer_art;
            var codarthas=ultimo_art;
            var fecorddes=$('caordcom_fecord').value;
            var fecordhas=$('caordcom_fecord').value;
            var status='Activas';
            var tipcom=$('caordcom_doccom').value;
        //$this->despacho=str_replace('*',' ',$_GET["despacho"]);
        var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
          pagina=ruta+"/reportes/reportes/compras/r.php=?r=<?php echo $caordcom->getReptipcom(); ?>&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&codartdes="+codartdes+"&codarthas="+codarthas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
          window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
      }
  }

</script>

