<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 37989 2010-05-06 14:43:24Z dmartinez $
 */
// date: 2007/07/09 16:18:38
?>
<?php echo form_tag('pagemiord/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($opordpag, 'getId') ?>
<input id="idrefer" name="idrefer" type="hidden" value="<? print $opordpag->getIdrefer(); ?>">
<input id="numcom" name="numcom" type="hidden" value="<? print $opordpag->getNumcom(); ?>">

<?php echo javascript_include_tag('dFilter', 'ajax', 'tesoreria/pagemiord', 'tools') ?>
<?php echo input_hidden_tag('modifico1', 'true') ?>
<?php echo input_hidden_tag('modifico2', 'true') ?>
<?php echo input_hidden_tag('unidad', $unidad) ?>
<?php echo input_hidden_tag('numgridconsulta', $numconsul) ?>
<?php echo input_hidden_tag('numgridret', $numretencion) ?>
<?php echo input_hidden_tag('opordpag[presiono]', $opordpag->getPresiono()) ?>
<?php echo input_hidden_tag('opnomina', $ordpagnom) ?>
<?php echo input_hidden_tag('opaporte', $ordpagapo) ?>
<?php echo input_hidden_tag('opliquidacion', $ordpagliq) ?>
<?php echo input_hidden_tag('opfideicomiso', $ordpagfid) ?>
<?php echo input_hidden_tag('compadicional', $compadic) ?>
<?php echo input_hidden_tag('generactaord', $genctaord) ?>
<?php echo input_hidden_tag('opordpag[totalcomprobantes]', $opordpag->getTotalcomprobantes()) ?>
<?php echo input_hidden_tag('opordpag[cuentarendicion]', $opordpag->getCuentarendicion()) ?>
<?php echo input_hidden_tag('opordpag[totfonter]', $opordpag->getTotfonter()) ?>
<?php echo input_hidden_tag('opordpag[datosnomina]', $opordpag->getDatosnomina()) ?>
<?php echo input_hidden_tag('opordpag[observe]', $opordpag->getObserve()) ?>
<?php echo input_hidden_tag('opordpag[modbasimpiva]', $opordpag->getModbasimpiva()) ?>
<?php echo input_hidden_tag('opordpag[limbaseret]', $opordpag->getLimbaseret()) ?>
<table width="100%">
  <tr>
    <th><strong><font color="<? print $color;?>" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $eti;?></font></strong></th>
  </tr>
</table>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Orden')?></legend>
<div class="form-row">
  <table>
   <tr>
    <th><?php echo label_for('opordpag[numord]', __($labels['opordpag{numord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numord}')): ?>
    <?php echo form_error('opordpag{numord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumord', array (
  'size' => 20,
  'control_name' => 'opordpag[numord]',
  'maxlength' => 8,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('opordpag_fecemi').focus();}",
  'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('opordpag[fecemi]', __($labels['opordpag{fecemi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecemi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecemi}')): ?>
    <?php echo form_error('opordpag{fecemi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecemi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecemi]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('opordpag_fecemi').value != '' && $('id').value == ''",
        'with' => "'ajax=16&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('valfec', '') ?>
    </div></th>
   </tr>
  </table>

<br>

  <table>
   <tr>
    <th><?php echo label_for('opordpag[tipcau]', __($labels['opordpag{tipcau}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{tipcau}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{tipcau}')): ?>
    <?php echo form_error('opordpag{tipcau}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getTipcau', array (
  'size' => 20,
  'control_name' => 'opordpag[tipcau]',
  'maxlength' => 4,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opordpag_tipcau').value=cadena",
  'onBlur'=> remote_function(array(
        'update'   => 'divGrid',
        'condition' => "$('opordpag_tipcau').value != '' && $('id').value == ''",
        'url'      => 'pagemiord/ajax',
        'complete' => 'AjaxJSON(request, json), actualizarsaldos() , mostrarcat()',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=opordpag_nomext&cajtexcom=opordpag_tipcau&opordpag_monord='+$('opordpag_monord').value+'&opordpag_monret='+$('opordpag_monret').value+'&opordpag_mondes='+$('opordpag_mondes').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdoccau_Pagemiord/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opordpag_tipcau/obj2/opordpag_nomext/campo1/tipcau/campo2/nomext','','','botoncat')?></th>
    <th><?php $value = object_input_tag($opordpag, 'getNomext', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[nomext]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>
<div id="divAdi">
</div>

<div id="divCon">
</div>

<br><?php echo input_hidden_tag('opordpag[afectapre]', $opordpag->getAfectapre()) ?> <?php echo input_hidden_tag('partidas', '') ?><?php echo input_hidden_tag('opordpag[documento]', $opordpag->getDocumento()) ?>

<?php $cadestatus=substr($eti,0,6);?>

 <?php echo label_for('opordpag[desord]', __($labels['opordpag{desord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{desord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{desord}')): ?>
    <?php echo form_error('opordpag{desord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($opordpag, 'getDesord', array (
  'size' => '80x3',
  'readonly'  =>  $cadestatus=='PAGADA' ? true : false ,
  'control_name' => 'opordpag[desord]',
  'maxlength'=> 1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<table>
   <tr>
    <th><?php echo label_for('opordpag[cedrif]', __($labels['opordpag{cedrif}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{cedrif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{cedrif}')): ?>
    <?php echo form_error('opordpag{cedrif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('opordpag[cedrif]', $opordpag->getCedrif(),
    'pagemiord/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 15,
'readonly'  =>  $opordpag->getId()!='' ? true : false ,
'onBlur'=> remote_function(array(
        'update'   => 'combo',
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_cedrif').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json), actualizarbenefi() ',
        'script' => true,
        'before' => 'var cod=$("opordpag_cedrif").value; var i=0; while (i<cod.length){ cod=cod.replace(".","@"); i++;}',
          'with' => "'ajax=2&cajtexmos=opordpag_nomben&cajtexcom=opordpag_cedrif&cuenta=opordpag_ctapag&descuenta=opordpag_descta&cuenta2=codctasec&codigo='+cod"
        ))),
     array('use_style' => 'true', 'complete' => 'actualizarbenefi()',)
  )
?></div></th>
    <th>&nbsp;&nbsp;&nbsp;<?php echo input_hidden_tag('existeben', '') ?></th>
    <th><?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Pagemiord/clase/Opbenefi/frame/sf_admin_edit_form/obj1/opordpag_cedrif/obj2/opordpag_nomben/campo1/cedrif/campo2/nomben','','','botoncat')?></th>
    <th>
    <div id="combo">
    </div>
    </th>
    </tr>
  </table>

<br>

  <?php echo label_for('opordpag[nomben]', __($labels['opordpag{nomben}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{nomben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{nomben}')): ?>
    <?php echo form_error('opordpag{nomben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNomben', array (
  'size' => 80,
  'control_name' => 'opordpag[nomben]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('opordpag[nombensus]', __($labels['opordpag{nombensus}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{nombensus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{nombensus}')): ?>
    <?php echo form_error('opordpag{nombensus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNombensus', array (
  'size' => 80,
  'control_name' => 'opordpag[nombensus]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

 <table>
   <tr>
    <th><?php echo label_for('opordpag[ctapag]', __($labels['opordpag{ctapag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{ctapag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{ctapag}')): ?>
    <?php echo form_error('opordpag{ctapag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCtapag', array (
  'size' => 32,
  'maxlength' => $loncta,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'control_name' => 'opordpag[ctapag]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_ctapag').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json), verificar()',
          'with' => "'ajax=3&cajtexmos=opordpag_descta&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('cargable', '') ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Pagemiord/clase/Contabb/frame/sf_admin_edit_form/obj1/opordpag_ctapag/obj2/opordpag_descta/campo1/codcta/campo2/descta','','','botoncat')?></th>
    <th><?php $value = object_input_tag($opordpag, 'getDescta', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[descta]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>
 &nbsp;&nbsp;&nbsp;<?php echo object_input_hidden_tag($opordpag, 'getCodctasec') ?>
<br>
<?php if ($opordpag->getFilordcbtp()=='S') { ?>
<?php echo label_for('opordpag[numcta]', __($labels['opordpag{numcta}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numcta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numcta}')): ?>
    <?php echo form_error('opordpag{numcta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('opordpag[numcta]', $opordpag->getNumcta(),
    'pagemiord/autocomplete?ajax=8',  array('autocomplete' => 'off','maxlength' => 20, 'size' => 23, 'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opordpag_numcta').value != ''",
          'with' => "'ajax=25&cajtexmos=opordpag_nomcue2&cajtexcom=opordpag_numcta&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsdefban_Tesmovemiche/clase/Tsdefban/frame/sf_admin_edit_form/obj1/opordpag_numcta/obj2/opordpag_nomcue2/campo1/numcue/campo2/nomcue')?>

&nbsp;
  <?php $value = object_input_tag($opordpag, 'getNomcue2', array (
  'disabled' => true,
  'control_name' => 'opordpag[nomcue2]',
  'size'=> 60,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<?php echo label_for('opordpag[tipdoc]', __($labels['opordpag{tipdoc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{tipdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{tipdoc}')): ?>
    <?php echo form_error('opordpag{tipdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('opordpag[tipdoc]', $opordpag->getTipdoc(),
    'pagemiord/autocomplete?ajax=9',  array('autocomplete' => 'off','maxlength' => 4, 'size' => 23, 'onBlur'=> remote_function(array(
       'url'      => 'pagemiord/ajax',
       'condition' => "$('opordpag_tipdoc').value != ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=26&cajtexmos=opordpag_destip2&cajtexcom=opordpag_tipdoc&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
  ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdocpag_Tesmovemiche/clase/Cpdocpag/frame/sf_admin_edit_form/obj1/opordpag_tipdoc/obj2/opordpag_destip2/campo1/tippag/campo2/nomext')?>

&nbsp;
  <?php $value = object_input_tag($opordpag, 'getDestip2', array (
   'disabled' => true,
  'control_name' => 'opordpag[destip2]',
  'size'=> 60,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
<?php } ?>
 <table>
   <tr>
    <th><?php echo label_for('opordpag[coduni]', __($labels['opordpag{coduni}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{coduni}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{coduni}')): ?>
    <?php echo form_error('opordpag{coduni}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_tag($opordpag, 'getCoduni', array (
  'size' => 32,
  'maxlength' => $lonubi,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'control_name' => 'opordpag[coduni]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
  'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_coduni').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=4&cajtexmos=opordpag_desubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div></th>
    <th><?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_Pagemiord/clase/Bnubica/frame/sf_admin_edit_form/obj1/opordpag_coduni/obj2/opordpag_desubi/obj3/generaotro/campo1/codubi/campo2/desubi/param1/'.$lonubi,'','','botoncat')?></th>
    <th> <?php $value = object_input_tag($opordpag, 'getdesubi', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[desubi]',
)); echo $value ? $value : '&nbsp;' ?> <?php echo input_hidden_tag('generaotro', '') ?></th>
   </tr>
  </table>

<br>

 <table>
 <tr>
 <tr>
    <th><?php echo label_for('opordpag[tipfin]', __($labels['opordpag{tipfin}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{tipfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{tipfin}')): ?>
    <?php echo form_error('opordpag{tipfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('opordpag[tipfin]', $opordpag->getTipfin(),
    'pagemiord/autocomplete?ajax=5',  array('autocomplete' => 'off','maxlength' => 4,
    'readonly'  =>  $opordpag->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_tipfin').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=5&cajtexmos=opordpag_nomext2&cajtexcom=opordpag_tipfin&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?></div></th>
    <th>
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fortipfin_Pagemiord/clase/Fortipfin/frame/sf_admin_edit_form/obj1/opordpag_tipfin/obj2/opordpag_nomext2/campo1/codfin/campo2/nomext','','','botoncat')?></th>
    <th> <?php $value = object_input_tag($opordpag, 'getNomext2', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[nomext2]',
)); echo $value ? $value : '&nbsp;' ?></th>
 </tr>
   <tr>
    <th><?php echo label_for('opordpag[codconcepto]', __($labels['opordpag{codconcepto}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{codconcepto}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{codconcepto}')): ?>
    <?php echo form_error('opordpag{codconcepto}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('opordpag[codconcepto]', $opordpag->getCodconcepto(),
    'pagemiord/autocomplete?ajax=3',  array('autocomplete' => 'off','maxlength' => 4,
    'readonly'  =>  $opordpag->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_codconcepto').value != ''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=23&cajtexmos=opordpag_nomconcepto&cajtexcom=opordpag_codconcepto&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?></div></th>
    <th>
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opconpag_Pagemiord/clase/Opconpag/frame/sf_admin_edit_form/obj1/opordpag_codconcepto/obj2/opordpag_nomconcepto/campo1/codconcepto/campo2/nomconcepto','','','botoncat')?></th>
    <th> <?php $value = object_input_tag($opordpag, 'getNomconcepto', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[nomconcepto]',
)); echo $value ? $value : '&nbsp;' ?></th>
<th>
<? if ($opordpag->getId()=='' && $comprobaut!='S') { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'pagemiord/ajaxcomprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         )) ?>
<? } else if ($opordpag->getId()!='') { ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Comprobante" type="button" value="Comprobantes" onClick="consultarComp()">
  <input type="button" name="Submit" value="Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
<?php } ?>


</th>
   </tr>
   <tr>
   <th>
   <?php echo label_for('opordpag[numforpre]', __($labels['opordpag{numforpre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numforpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numforpre}')): ?>
    <?php echo form_error('opordpag{numforpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumforpre', array (
  'size' => 20,
  'control_name' => 'opordpag[numforpre]',
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>
   </th>
   </tr>
  </table>
<div id="comp">
</div>

</div>
</fieldset>
<br>
<div id="genret"></div>


<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Imputaciones Presupuestarias');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<div id="botonret" style="display:none">
<ul class="sf_admin_actions">
<li class="float-rigth">
<input type="button" name="Submit" value="Retenciones" onClick="javascript:$('reten').toggle();"/>
</li>
</ul>
</div>

  <div id="divGrid">
  <?
  echo grid_tag($obj);
  ?></div>
  <?php echo input_hidden_tag('noexiste', '') ?><?php echo input_hidden_tag('noasigna', '') ?><?php echo input_hidden_tag('nonivel', '') ?><?php echo input_hidden_tag('errormonto', '') ?><?php echo input_hidden_tag('montodisponible', '') ?><?php echo input_hidden_tag('codigopresupuestario', '') ?>
  <?php echo input_hidden_tag('totmarcadas', '0,00') ?><?php echo input_hidden_tag('opordpag[referencias]', $opordpag->getReferencias()) ?>

  <br>
  <?php echo input_hidden_tag('afectarec', $afectarec) ?><?php echo input_hidden_tag('formato', $formatpar) ?><?php echo input_hidden_tag('inicio', $iniciopar) ?>
  <table>
    <tr>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th><?php echo label_for('Totales', __('TOTALES'), 'class="required" ') ?></th>
      <th>&nbsp;&nbsp;</th>
      <th><?php $value = object_input_tag($opordpag, array('getMonord',true), array (
    'size' => 15,
    'readonly' => true,
    'class' => 'grid_txtright',
    'control_name' => 'opordpag[monord]',
  )); echo $value ? $value : '&nbsp;' ?></th>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th>  <?php $value = object_input_tag($opordpag, array('getMonret',true), array (
    'size' => 15,
    'readonly' => true,
    'class' => 'grid_txtright',
    'control_name' => 'opordpag[monret]',
  )); echo $value ? $value : '&nbsp;' ?></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>  <?php $value = object_input_tag($opordpag, array('getMondes',true), array (
      'size' => 15,
      'readonly' => true,
      'class' => 'grid_txtright',
      'control_name' => 'opordpag[mondes]',
    )); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

  <br>
  <table>
    <tr>
    <th>
    <?php echo label_for('',__('Neto a Pagar') , 'class="required" Style="width:100px"') ?>
    <?php echo input_tag('opordpag[neto]',$opordpag->getNeto(), 'size=15 class=grid_txtright readonly=true onBlur="javascript:event.keyCode=13; return entermontootro(event, this.id)"') ?>
    </th>
    </tr>
  </table>

  <br>

  <div id="reten" style="display:none">
    <fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
    <? echo grid_tag($obj5);?>
    <?php echo input_hidden_tag('totalmontorete', '') ?><?php echo input_hidden_tag('existeretencion', '') ?>
    <div align="center">
      <?php echo link_to_function(image_tag('/images/salir.gif'), "salvarretenciones()") ?>
    </div>
    </div>
    </fieldset>
    </div>

    <div id="consulta" style="display:none">
      <? echo grid_tag($obj6);?>
    </div>
    <?php echo input_hidden_tag('mensaje', '') ?><?php echo input_hidden_tag('ajaxs', '') ?>
  </div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Observaciones');?>
<fieldset id="sf_fieldset_none" class="">
  <div class="form-row">
    <?php echo label_for('opordpag[obsord]', __($labels['opordpag{obsord}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('opordpag{obsord}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{obsord}')): ?>
      <?php echo form_error('opordpag{obsord}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

      <?php $value = object_textarea_tag($opordpag, 'getObsord', array (
      'size' => '80x5',
      'control_name' => 'opordpag[obsord]',
      'maxlength' => 250,
      'onkeyup' => "javascript:return ismaxlength(this)",
    )); echo $value ? $value : '&nbsp;' ?>
    </div>
  </div>
</fieldset>


<?php tabPageOpenClose("tp1", "tabPage3", 'Factura');?>
<fieldset id="sf_fieldset_none" class="">
  <div class="form-row">
    <div id="botonfac">
      <?php echo submit_to_remote('btnFactura', 'Factura', array(
       'update'   => 'divFac',
       'url'      => 'pagemiord/ajaxfactura',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json), notas() ',
       'submit' => 'sf_admin_edit_form',
      )) ?>
    </div>
    <br>
    <?php echo input_hidden_tag('nota', '') ?>
    <?php echo input_hidden_tag('referencia2', '') ?>
    <?php echo input_hidden_tag('opordpag[vacio]', $opordpag->getVacio()) ?>
    <div id="divFac" Style="display:none">
      <? echo grid_tag($obj2);?>
    </div>
  </div>
</fieldset>

<?php if ($opordpag->getId()!='') //ES UNA CONSULTA
{?>
<?php tabPageOpenClose("tp1", "tabPage4", 'Retenciones');?>
<fieldset id="sf_fieldset_none" class="">
  <div class="form-row">
    <? echo grid_tag($obj3);?>
    <br>
    <?php echo input_hidden_tag('esta', $esta) ?>
    <?php echo input_hidden_tag('fac', '') ?>
    <table>
      <tr>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th><?php echo label_for('',__('Total Retenciones') , 'class="required" Style="width:100px"') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo input_tag('total', '', array(
        'size'=> 20,
        'class'=> 'grid_txtright',
        'readonly'=> true,
        )) ?></th>
      </tr>
    </table>
  </div>
</fieldset>
<?}?>

<?
if ( ($opordpag->getId()!='')) //ES CONSULTA
    {
      echo javascript_tag("
                    javascript:actualizarsaldos_d();
        ");
    }
?>

<fieldset>
<div id="anul" style="display:none">
 <?php echo label_for('opordpag[desanu]', __($labels['opordpag{desanu}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{desanu}')): ?>
    <?php echo form_error('opordpag{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getDesanu', array (
  'size' => 80,
  'control_name' => 'opordpag[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<?php echo label_for('opordpag[fecanu]', __($labels['opordpag{fecanu}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecanu}')): ?>
    <?php echo form_error('opordpag{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onkeyPress' => "javascript: validar(event,this.id)",
  ),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
</filedset>




<?php tabPageOpenClose("tp1", "tabPage5", 'SIGECOF');?>
<fieldset id="sf_fieldset_none" class="">
  <div class="form-row">
    <?php echo label_for('opordpag[numsigecof]', __($labels['opordpag{numsigecof}']), 'class="required"') ?>
    <div class="content<?php if ($sf_request->hasError('opordpag{numsigecof}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{numsigecof}')): ?> <?php echo form_error('opordpag{numsigecof}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?> <?php $value = object_input_tag($opordpag, 'getNumsigecof', array (
    'size' => 8,
    'control_name' => 'opordpag[numsigecof]',
    )); echo $value ? $value : '&nbsp;' ?>
    </div>

  <br>
  <?php echo label_for('opordpag[fecsigecof]', __($labels['opordpag{fecsigecof}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecsigecof}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{fecsigecof}')): ?> <?php echo form_error('opordpag{fecsigecof}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?> <?php $value = object_input_date_tag($opordpag, 'getFecsigecof', array (
      'rich' => true,
      'calendar_button_img' => '/sf/sf_admin/images/date.png',
      'control_name' => 'opordpag[fecsigecof]',
      'date_format' => 'dd/MM/yyyy',
      'maxlength' => 10,
      'readonly'  =>  $opordpag->getId()!='' ? true : false ,
      'onkeyup' => "javascript: mascara(this,'/',patron,true)",
      'onBlur'=> remote_function(array(
            'url'      => 'pagemiord/ajax',
            'complete' => 'AjaxJSON(request, json), validafec()',
            'condition' => "$('opordpag_fecsigecof').value != '' && $('id').value == ''",
            'with' => "'ajax=16&codigo='+this.value"
            ))
      ),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('valfec', '') ?>
  </div>
  <br>

  <?php echo label_for('opordpag[expsigecof]', __($labels['opordpag{expsigecof}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{expsigecof}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{expsigecof}')): ?> <?php echo form_error('opordpag{expsigecof}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?> <?php $value = object_input_tag($opordpag, 'getExpsigecof', array (
    'size' => 8,
    'control_name' => 'opordpag[expsigecof]',
    )); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
</fieldset>

<?php tabInit('tp1','0'); ?>

<?php include_partial('edit_actions', array('opordpag' => $opordpag)) ?>
</form>

<ul class="sf_admin_actions">
<li class="float-rigth">
<?php if ($opordpag->getId() && $opordpag->getStatus()!='A') {?>
  <input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:anular();" />
<?php }?>
</li>
<li class="float-rigth">
<?php if ($opordpag->getId() && $opordpag->getStatus()!='A'): ?>
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
<?php endif; ?>
</li>
</ul>
<script type="text/javascript">
var nuevo='<?php echo $opordpag->getId()?>';
    if (nuevo=='')
    {
     var manesolcorr='<?php echo $mansolocor; ?>';
     if (manesolcorr=='S')
     {
        $('opordpag_numord').value='########';
     	$('opordpag_numord').readOnly=true;
        $('opordpag_tipcau').focus();
     }else{
      $('opordpag_numord').focus();
     }
    }

var ordpagval='<?echo $ordpagval;?>';
if ($('opordpag_tipcau').value!='' && ($('opordpag_tipcau').value!=$('opnomina').value || $('opordpag_tipcau').value!='OPNN') && ($('opordpag_tipcau').value!=$('opaporte').value || $('opordpag_tipcau').value!='APOR') && ($('opordpag_tipcau').value!=$('opliquidacion').value || $('opordpag_tipcau').value!='LIQU') && ($('opordpag_tipcau').value!=$('opfideicomiso').value || $('opordpag_tipcau').value!='OPFD') && ($('opordpag_tipcau').value!=ordpagval || $('opordpag_tipcau').value!='OPVA'))
{
  $('botonret').show();
}
mostarq();
actualiza();


var aplico='<?php echo $sf_user->getAttribute('retencion','','pagemiord')?>';
var grabo='<?echo $grabo;?>';
var presiona='<?php echo $numretencion?>';
var genordret='<?php echo $genordret?>';

if (grabo=='S' && presiona>0 && aplico=='S' && genordret=='S')
{
  if(confirm("¿Desea Generar las Órdenes de Pago de las Retenciones?"))
  {
    new Ajax.Updater('genret', '/tesoreria_dev.php/pagemiord/ajaxretenciones', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});
  }
}

function num(e) {
    evt = e ? e : event;
    tcl = (window.Event) ? evt.which : evt.keyCode;
    if ((tcl < 48 || tcl > 57))
    {
        return false;
    }
    return true;
}
  function notas()
  {
   var nuev='<?php echo $opordpag->getId()?>';
   if ($('nota').value!="")
   {
    alert($('nota').value);
    $('nota').value="";
   }
  }

  function actualiza()
  { var id="";
    var id='<?php echo $opordpag->getId()?>';
    if (id!="")
    {
      $('trigger_opordpag_fecemi').hide();
      $('opordpag_nomben').readOnly=true;
     $$('.botoncat')[0].disabled=true;
    $$('.botoncat')[1].disabled=true;
    $$('.botoncat')[2].disabled=true;
    $$('.botoncat')[3].disabled=true;
    $$('.botoncat')[4].disabled=true;
      actualizarsaldos();
      netos();
   }

    var deshab='<?php echo $bloqfec; ?>';
    if (deshab=='S')
    {
    	$('trigger_opordpag_fecemi').hide();
    	$('opordpag_fecemi').readOnly=true;
    }
  }

 function actualizarbenefi()
 {
     if ($('existeben').value=='S')
     {
      $('opordpag_nomben').readOnly=true;
     }
     else
     {
       alert('El Beneficiario no Existe. Ingrese uno nuevo');
       $('opordpag_nomben').value="";
       $('opordpag_ctapag').value="";
       $('opordpag_descta').value="";

       $('opordpag_nomben').readOnly=false;
     }
 }

 function actualizargrid()
 {
   if (($('eliva').value!=0) || ($('elislr').value!=0) || ($('eltimbre')!=0) || ($('elirs').value!=0))
    {
      $('divFac').show();
       n=0;
       while (n<10)
       {
         var alicuota="bx"+"_"+n+"_11";
         for(i=8;i<=21;i++)
         {
         var campo="bx"+"_"+n+"_"+i;
         if ((i!=11) && (i!=14) && (i!=15))
         {
          if ($(campo).value=="")
          {
            $(campo).value="0,00";
          }
         }

         if (($(alicuota).value="0,00") || ($(alicuota).value=""))
         {
          $(alicuota).value=$('eliva').value;
         }
        }
         n++;
       }
    }
    else { alert('No hay Retenciones que generen comprobante');}

 }

 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('opordpag_numord').value=valor;
     var desh='<?php echo $numdesh; ?>';
     if (desh=='S')
     {
     	$('opordpag_numord').readOnly=true;
     }

   }
 }

 function mostrarcat()
 {
   if ($('opordpag_afectapre').value==0)
   {
     $('opordpag_neto').readOnly=false;
   }

   if($('opordpag_documento').value=='P')
   {
     $('cpprecom').show();
   }else { $('cpcompro').show();}


 }


  function comprobante(formulario)
  {
      window.open('/tesoreria_dev.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

  function consultarComp()
  {
    window.open('/tesoreria_dev.php/confincomgen/edit/id/'+document.getElementById("idrefer").value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

  function anular()
  {
    if ($('numcom').value!="")
    {
     var referencia="RE"+$('numcom').value.substr(2,6);
    }
    else
    {
     var referencia=$('opordpag_numord').value;
    }
    var numord=$('opordpag_numord').value;
    var fecemi=$('opordpag_fecemi').value;
    var compadic=$('compadicional').value;
    window.open('/tesoreria_dev.php/pagemiord/anular?numord='+numord+'&referencia='+referencia+'&fecemi='+fecemi+'&compadic='+compadic,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }


  function eliminar()
  {
  if (confirm("¿Esta seguro de eliminar la Orden de Pago?"))
  {
    var numord=$('opordpag_numord').value;
    var tipcau=$('opordpag_tipcau').value;
    var compadic=$('compadicional').value;
    var coduni=$('opordpag_coduni').value;

    location.href='/tesoreria_dev.php/pagemiord/ajax?ajax=8&numord='+numord+'&tipcau='+tipcau+'&compadic='+compadic+'&coduni='+coduni;
  }
  }

  function perderfocus(e,id,totcol)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   if (col!=totcol)
   {
    var colsig=col+1;
    var siguiente=name+"_"+fil+"_"+colsig;
   }
   else
   {
    var fila=fil+1;
    var siguiente=name+"_"+fila+"_2";
   }

   if (e.keyCode==13 || e.keyCode==9)
   {
    $(siguiente).focus();
   }
  }

  function mostarq()
  {
  	if ($('opordpag_vacio').value=='1')
  	{
  		$('divFac').show();
  		$('botonfac').hide();
  	}
  }

  function verificar()
 {
  if ($('cargable').value!='C' && $('opordpag_ctapag').value!='')
  {
    alert('La Cuenta Contable no es Cargable, Por favor Cambiela por una Cuenta Cargable');
    $('opordpag_ctapag').value="";
    $('opordpag_descta').value="";
  }
 }

 function retenciones(formulario)
 {
   window.open('/tesoreria_dev.php/pagemiret/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
 }

 function generar()
 {
   var y=totalregistros('ax',2,100);
  if ($('opordpag_cedrif').value=="" || $('opordpag_ctapag').value=="" || y<=0)
  {
    alert('Verique si introdujo los Datos del Beneficiario, el Código Contable y las Imputaciones Presupuestarias, para luego generar el comprobante');
  }
 }

  function validafec()
  {
    if ($('valfec').value=='S')
    {
      alert('La Fecha no se encuentra del Período Fiscal');
      $('casolart_fecreq').value="";
      $('casolart_fecreq').focus();
    }
  }


 function Mostrar_orden_preimpresa()
  {
      f=0;
      i=0;
    /*  var primer_art=$("ax_0_2").value;
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
      }*/
      if(confirm("¿Desea imprimir la orden Pre-Impresa?"))
      {
            var ordpagdes=$('opordpag_numord').value;
            var ordpaghas=$('opordpag_numord').value;

            var codprodes=$('opordpag_cedrif').value;
            var codprohas=$('opordpag_cedrif').value;

            var tiporddes=$('opordpag_tipcau').value;
            var tipordhas=$('opordpag_tipcau').value;

            //var codartdes=primer_art;
            //var codarthas=ultimo_art;

            var fecorddes=$('opordpag_fecemi').value;
            var fecordhas=$('opordpag_fecemi').value;

            var status='Todas';

          var  ruta='http://'+'<? echo $this->getContext()->getRequest()->getHost();?>';
          pagina=ruta+"/<? echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r=oprordpre.php&ordpagdes="+ordpagdes+"&ordpaghas="+ordpaghas;
          window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
      }
  }
 </script>