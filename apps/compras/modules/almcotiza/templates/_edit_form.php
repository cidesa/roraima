<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/04 16:39:42
?>
<?php echo form_tag('almcotiza/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($cacotiza, 'getId') ?>
<?php echo javascript_include_tag('dFilter','Linktoapp','compras/almcotiza','ajax','tools','observe') ?>
<?php use_helper('Javascript', 'tabs', 'Grid') ?>
<?php echo input_hidden_tag('fila2', $numreg) ?>
<?php echo input_hidden_tag('montorecargo', $cacotiza->getMonrec(true)) ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Cotización')?></legend>
<div class="form-row">
<table>
 <tr>
  <th>
    <?php echo label_for('cacotiza[refcot]', __($labels['cacotiza{refcot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{refcot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{refcot}')): ?>
    <?php echo form_error('cacotiza{refcot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cacotiza, 'getRefcot', array (
  'size' => 8,
  'control_name' => 'cacotiza[refcot]',
  'maxlength' => 8,
  'onBlur'  => "javascript:event.keyCode=13; enters(event,this.value);",
  'readonly'  =>  $cacotiza->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
  <?php echo label_for('cacotiza[feccot]', __($labels['cacotiza{feccot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{feccot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{feccot}')): ?>
    <?php echo form_error('cacotiza{feccot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cacotiza, 'getFeccot', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cacotiza[feccot]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'readonly'  =>  $cacotiza->getId()!='' ? true : false ,
 ),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?></div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
    <?php echo label_for('cacotiza[tipmon]', __($labels['cacotiza{tipmon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{tipmon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{tipmon}')): ?>
    <?php echo form_error('cacotiza{tipmon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php if ($cacotiza->getTipmon()=='') $var='001'; else $var=$cacotiza->getTipmon();?>
  <?php echo select_tag('cacotiza[tipmon]', options_for_select($moneda,$var, 'include_custom=Seleccione Uno'), array(
  'readonly'  =>  $cacotiza->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
        'url'      => 'almcotiza/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=6&fecha='+$('cacotiza_feccot').value+'&cajtexcom=cacotiza_tipmon&codigo='+this.value"
        ))
  )); ?></div> <div  style="display:none"> <?php $value = object_input_tag($cacotiza, 'getValmon', array (
  'size' => 7,
  'control_name' => 'cacotiza[valmon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div><?php echo input_hidden_tag('posneg', $aumdis) ?>
  </th>
 </tr>
</table>

<br>
  <?php echo label_for('cacotiza[rifpro]', __($labels['cacotiza{rifpro}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{rifpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{rifpro}')): ?>
    <?php echo form_error('cacotiza{rifpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('cacotiza[rifpro]', $cacotiza->getRifpro(),
  'almcotiza/autocomplete?ajax=1', array('autocomplete' => 'off',
  'maxlength' => 15,'size' => 15,
  'readonly'  =>  $cacotiza->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
  'url'      => 'almcotiza/ajax',
  'complete' => 'AjaxJSON(request, json)',
  'condition' => "$('cacotiza_rifpro').value != '' && $('id').value == ''",
  'script'   => true,
  'with' => "'ajax=1&cajtexmos=cacotiza_nompro&cajtexcom=cacotiza_rifpro&codigo='+this.value"
      ))),
 array('use_style' => 'true')
  )
  ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cotizaciones/clase/Caprovee/frame/sf_admin_edit_form/obj1/cacotiza_rifpro/obj2/cacotiza_nompro/campo1/rifpro/campo2/nompro','','','botoncat');?>

  <?php $value = object_input_tag($cacotiza, 'getNompro', array (
  'disabled' => true,
  'size' => 70,
  'control_name' => 'cacotiza[nompro]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>
<br>
  <?php echo label_for('cacotiza[descot]', __($labels['cacotiza{descot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{descot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{descot}')): ?>
    <?php echo form_error('cacotiza{descot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($cacotiza, 'getDescot', array (
  'size' => '90x3',
  'maxlength'=>250,
  'control_name' => 'cacotiza[descot]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
 <table>
 <tr>
 <th>
  <?php echo label_for('cacotiza[refsol]', __($labels['cacotiza{refsol}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{refsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{refsol}')): ?>
    <?php echo form_error('cacotiza{refsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('cacotiza[refsol]', $cacotiza->getRefsol(),
    'almcotiza/autocomplete?ajax=3', array('autocomplete' => 'off',
    'maxlength' => 8,'size' => 8,
    'readonly'  =>  $cacotiza->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
          'update'   => 'divGrid',
          'url'      => 'almcotiza/ajax',
          'script'   => true,
          'complete' => 'AjaxJSON(request, json), verifica()',
          'condition' => "$('cacotiza_refsol').value != '' && $('id').value == ''",
          'with' => "'ajax=5&cajtexcom=cacotiza_refsol&cajtexmos=cacotiza_desreq&codigo='+this.value",

      ))),
     array('use_style' => 'true')
  )?>
 &nbsp;<?php echo input_hidden_tag('saldada', '') ?>

 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Casolart_Almcotizacion/clase/Casolart/frame/sf_admin_edit_form/obj1/cacotiza_refsol/obj2/cacotiza_desreq/campo1/reqart/campo2/desreq','','','botoncat')?>


  <?php $value = object_input_tag($cacotiza, 'getDesreq', array (
  'readonly' => true,
  'size' => 45,
  'control_name' => 'cacotiza[desreq]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('cacotiza[refpro]', __($labels['cacotiza{refpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{refpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{refpro}')): ?>
    <?php echo form_error('cacotiza{refpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cacotiza, 'getRefpro', array (
  'size' => 10,
  'maxlength' => 10,
  'control_name' => 'cacotiza[refpro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>

  <table>
  <tr>
  <th>
    <?php echo label_for('cacotiza[moncot]', __($labels['cacotiza{moncot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{moncot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{moncot}')): ?>
    <?php echo form_error('cacotiza{moncot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cacotiza, array('getMoncot',true), array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'cacotiza[moncot]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
<?php echo label_for('cacotiza[monrec]', __($labels['cacotiza{monrec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{monrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{monrec}')): ?>
    <?php echo form_error('cacotiza{monrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cacotiza, array('getMonrec',true), array (
  'size' => 20,
   'maxlength' => 20,
   'control_name' => 'cacotiza[monrec]',
   'onBlur' => "javascript:event.keyCode=13; entermontootro(event, this.id); calcular(this.id)",
)); echo $value ? $value : '&nbsp;' ?>

</th>
<th>
  <?php echo label_for('cacotiza[mondes]', __($labels['cacotiza{mondes}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{mondes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{mondes}')): ?>
    <?php echo form_error('cacotiza{mondes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($cacotiza, array('getMondes',true), array (
  'size' => 20,
  'readonly'=> true,
  'control_name' => 'cacotiza[mondes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>

  <?php echo label_for('cacotiza[tipo]', __($labels['cacotiza{tipo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{tipo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{tipo}')): ?>
  <?php echo form_error('cacotiza{tipo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <? if ($cacotiza->getTipo()=='P')	{
  ?><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo Porcentaje&nbsp;&nbsp; ".radiobutton_tag('cacotiza[tipo]', 'P', true).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo Monto &nbsp;&nbsp;".radiobutton_tag('cacotiza[tipo]', 'M', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo Total &nbsp;&nbsp;".radiobutton_tag('cacotiza[tipo]', 'T', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';	?>

<? }else if ($cacotiza->getTipo()=='M'){?>
	<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo Porcentaje ".radiobutton_tag('cacotiza[tipo]', 'P', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo Monto ".radiobutton_tag('cacotiza[tipo]', 'M', true).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo Total ".radiobutton_tag('cacotiza[tipo]', 'T', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';	?>

<? } else { ?>
    <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo Porcentaje &nbsp;&nbsp; ".radiobutton_tag('cacotiza[tipo]', 'P', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo Monto &nbsp;&nbsp;".radiobutton_tag('cacotiza[tipo]', 'M', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo Total &nbsp;&nbsp;".radiobutton_tag('cacotiza[tipo]', 'T', true).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';	?>
	<? } ?>
&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" name="Submit" value="Global" onClick="javascript:globalizar();"/>
  </div>

</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Detalle de la Cotización');?>
<div id="divGrid">
<?php echo grid_tag($obj);?>
</div>
&nbsp;<?php echo input_hidden_tag('totales', '0,00') ?>

<?php tabPageOpenClose("tp1", "tabPage2", 'Condiciones de Pago');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('cacotiza[conpag]', __($labels['cacotiza{conpag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{conpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{conpag}')): ?>
    <?php echo form_error('cacotiza{conpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('cacotiza[conpag]', $cacotiza->getConpag(),
    'almcotiza/autocomplete?ajax=2', array('autocomplete' => 'off','maxlength' => 4,'size' => 4,'onBlur'=> remote_function(array(
      'url'      => 'almcotiza/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('cacotiza_conpag').value != '' && $('id').value == ''",
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=cacotiza_desconpag&cajtexcom=cacotiza_conpag&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caconpag_Almcotiza/clase/Caconpag/frame/sf_admin_edit_form/obj1/cacotiza_conpag/obj2/cacotiza_desconpag/campo1/codconpag/campo2/desconpag','','','botoncat')?>

    </div>
<br>
  <?php echo label_for('cacotiza[desconpag]', __($labels['cacotiza{desconpag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{desconpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{desconpag}')): ?>
    <?php echo form_error('cacotiza{desconpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cacotiza, 'getDesconpag', array (
  'disabled' => true,
  'size' => 80,
  'control_name' => 'cacotiza[desconpag]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Forma de Entrega');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('cacotiza[forent]', __($labels['cacotiza{forent}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{forent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{forent}')): ?>
    <?php echo form_error('cacotiza{forent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('cacotiza[forent]', $cacotiza->getForent(),
    'almcotiza/autocomplete?ajax=4', array('autocomplete' => 'off','maxlength' => 4,'size' => 4,'onBlur'=> remote_function(array(
      'url'      => 'almcotiza/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('cacotiza_forent').value != '' && $('id').value == ''",
      'script'   => true,
      'with' => "'ajax=4&cajtexmos=cacotiza_desforent&cajtexcom=cacotiza_forent&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caforent_Almcotiza/clase/Caforent/frame/sf_admin_edit_form/obj1/cacotiza_forent/obj2/cacotiza_desforent/campo1/codforent/campo2/desforent','','','botoncat')?>

    </div>
<br>
  <?php echo label_for('cacotiza[desforent]', __($labels['cacotiza{desforent}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{desforent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{desforent}')): ?>
    <?php echo form_error('cacotiza{desforent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cacotiza, 'getDesforent', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'cacotiza[desforent]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'SNC');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('cacotiza[porvan]', __($labels['cacotiza{porvan}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{porvan}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{porvan}')): ?>
    <?php echo form_error('cacotiza{porvan}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cacotiza, array('getPorvan',true), array (
  'size' => 7,
  'control_name' => 'cacotiza[porvan]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cacotiza[porant]', __($labels['cacotiza{porant}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cacotiza{porant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cacotiza{porant}')): ?>
    <?php echo form_error('cacotiza{porant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cacotiza, array('getPorant',true), array (
  'size' => 7,
  'control_name' => 'cacotiza[porant]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php tabInit();?>

<?php include_partial('edit_actions', array('cacotiza' => $cacotiza)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($cacotiza->getId() && $oculeli!="S"): ?>
<?php echo button_to(__('delete'), 'almcotiza/delete?id='.$cacotiza->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">
var id='<?php echo $cacotiza->getId()?>';
if (id)
{
	$('trigger_cacotiza_feccot').hide();
	$$('.botoncat')[0].disabled=true;
	$$('.botoncat')[1].disabled=true;
	$('cacotiza_monrec').value=$('montorecargo').value
}else {
	var manesolcorr='<?php echo $mansolocor; ?>';
     if (manesolcorr=='S')
     {
        $('cacotiza_refcot').value='########';
     	$('cacotiza_refcot').readOnly=true;
        $('cacotiza_rifpro').focus();
     }
}

  var deshab='<?php echo $bloqfec; ?>';
  if (deshab=='S')
  {
  	$('trigger_cacotiza_feccot').hide();
  	$('cacotiza_feccot').readOnly=true;
  }


function enter(e,valor)
 {

   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('cacotiza_refcot').value=valor;
   }
 }

 function verifica()
 {
 	if ($('saldada').value=='0')
 	{
 	 alert('La Solicitud esta Totalmente Saldada')
 	 $('cacotiza_refsol').value="";
 	 $('cacotiza_desreq').value="";
 	}
 	else if ($('saldada').value=='N')
 	{
 	  alert('La Solicitud no existe')
 	  $('cacotiza_refsol').value="";
 	  $('cacotiza_desreq').value="";
 	}

 }

  function enters(e,valor)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('cacotiza_refcot').value=valor;

   }
  }

  function calculadescuento(e,id)
  {
    if (e.keyCode==13)
    {
     if ($('cacotiza_tipmon').value!="")
  	{
	  var aux = id.split("_");
	  var name=aux[0];
	  var fil=aux[1];
	  var col=parseInt(aux[2]);

	  var colcant=col-2;
	  var colcosto=col-1;
	  var coltotal=col+1;

	  var costo=name+"_"+fil+"_"+colcosto;
	  var cant=name+"_"+fil+"_"+colcant;
	  var total=name+"_"+fil+"_"+coltotal;

	  var numero=toFloat(cant);
	  var numero2=toFloat(costo);
	  var numero3=toFloat(id);

    var ids='<?php echo $cacotiza->getId()?>';
    if (ids=="" && $('cacotiza_refsol').value=='')
    { var am=totalregistros('ax',1,50);}
    else if (ids=="" && $('cacotiza_refsol').value!='')
    { var am=parseInt($('fila').value);}
    else if (ids!="" )
    { var am=parseInt($('fila2').value);}

    if (numero!="" && numero2!="" && numero>0 && numero2>0)
    {
	  if (numero3!="")
	  {
         if (validarnumero(id))
        {
           if (document.sf_admin_edit_form.cacotiza_tipo_P.checked)
            {
              var calcula=(numero*numero2)*numero3/100;
              $(id).value=format(calcula.toFixed(2),'.',',','.');
            }
           var cal=numero*numero2;
            if (numero<=cal || document.sf_admin_edit_form.cacotiza_tipo_T.checked)
            {
              if (document.sf_admin_edit_form.cacotiza_tipo_T.checked)
              {
                var montototal=0;
                var i=0;
                while (i<am)
                {
                  var canti= "ax_"+i+"_3";
                  var cost= "ax_"+i+"_4";
                   var descuento= "ax_"+i+"_5";
                   var num=toFloat(canti);
                   var num2=toFloat(cost);

                  montototal=montototal + (num*num2);
                 i++;
                }

                if (numero3>=montototal)
                {
                  alert('El Monto del Descuento no puede ser mayor al del Total del Articulo');
                  $(id).value='0,00';
                  return true;
                }
              }

                if (document.sf_admin_edit_form.cacotiza_tipo_M.checked || document.sf_admin_edit_form.cacotiza_tipo_T.checked)
                {
                 var aumento_dis='Suelto';
                 if ($('cacotiza_valmon').value!=0 && numero3>0)
                 {
                  if (($('posneg').value=='D' && aumento_dis=='Agarro') || ($('posneg').value=='A' && aumento_dis=='Suelto'))
                  {
                    var cal=numero3/$('cacotiza_valmon').value;
                    $(id).value= format(cal.toFixed(2),'.',',','.');
                  }
                  else if (($('posneg').value=='D' && aumento_dis=='Suelto') || ($('posneg').value=='A' && aumento_dis=='Agarro'))
                  {
                    var cal=numero3*$('cacotiza_valmon').value;
                    $(id).value= format(cal.toFixed(2),'.',',','.');
                  }
                 }
                }

	         var pro=toFloat(id);
	         var producto=(numero*numero2)-pro;
	         $(total).value=format(producto.toFixed(2),'.',',','.');

        }
        else
        {
            alert('El Monto debe ser menor al Total del Artículo');
            $(id).value='0,00';
        }
        }
        else
        {
          alert('El Dato debe ser Númerico');
          $(id).value='0,00';
        }
 	  }
	  else
	  {
	    alert('El Dato debe ser Númerico');
        $(id).value='0,00';
	  }
    }
    else
    {
    alert('Debe Introducir primero la Cantidad y el Costo del Articulo');
    $(id).value='0,00';
    }
  }
  else
  {
  	alert('Debe seleccionar el Tipo de Moneda');
  	$(id).value='0,00';
  }
  actualizarsaldos();
  var numuno=toFloat('cacotiza_monrec');
  var numdos=toFloat('totales');

  var montot=numuno+numdos;

$('cacotiza_moncot').value=format(montot.toFixed(2),'.',',','.');
 }
 }

  function globalizar()
  {
  	if ($('cacotiza_tipmon').value!="")
  	{
    var cantidad="ax_0_3";
    var costo="ax_0_4";
    var descuento="ax_0_5";

    var num2=toFloat(cantidad);
    var num3=toFloat(costo);
    var num1=toFloat(descuento);

    if (document.sf_admin_edit_form.cacotiza_tipo_M.checked || document.sf_admin_edit_form.cacotiza_tipo_T.checked)
    {
      if ($('cacotiza_valmon').value!=0 && num1>0)
      {
        if ($('posneg').value=='D')
        {
         var monto= num1/$('cacotiza_valmon').value;
        }
        else if ($('posneg').value=='A')
        {
         var monto= num1*$('cacotiza_valmon').value;
        }
      }
    }
    else if (document.sf_admin_edit_form.cacotiza_tipo_P.checked)
    {
     var cal=num2*num3;
      if (cal>0)
      {
        var monto=(num1*100)/cal;
      }else { var monto=0;}
    }

    var ids='<?php echo $cacotiza->getId()?>';
    if (ids=="" && $('cacotiza_refsol').value=='')
    { var am=totalregistros('ax',1,50);}
    else if (ids=="" && $('cacotiza_refsol').value!='')
    { var am=parseInt($('fila').value);}
    else if (ids!="" )
    { var am=parseInt($('fila2').value);}

    var montototal=0;
    var fil=0;
    while (fil<am)
    {
     var cant= "ax_"+fil+"_3";
     var costo= "ax_"+fil+"_4";

     var numero=toFloat(cant);
     var numero2=toFloat(costo);

     montototal= montototal + (numero*numero2);
     fil++;
    }

    if (monto>0)
    {
     var j=1;
     while (j<am)
     {
       var cant= "ax_"+j+"_3";
       var costo= "ax_"+j+"_4";
       var descuento= "ax_"+j+"_5";

       var numero=toFloat(cant);
       var numero2=toFloat(costo);

	   if (document.sf_admin_edit_form.cacotiza_tipo_T.checked)
	   {
	    var cal= (((numero*numero2)*100/montototal)/100)
        $(descuento).value=format(cal.toFixed(2),'.',',','.');
	   }
	   else
	   {
	   $(descuento).value=format(monto.toFixed(2),'.',',','.');
	   }
	   calculadescuentos(j);
     j++;
    }
    }
    else
    {
      var j=1;
     while (j<am)
     {
       var cant= "ax_"+j+"_3";
       var costo= "ax_"+j+"_4";
       var descuento= "ax_"+j+"_5";

       var numero=toFloat(cant);
       var numero2=toFloat(costo);

	   var monto=0;
	   $(descuento).value=format(monto.toFixed(2),'.',',','.');
	   calculadescuentos(j);
     j++;
    }
    }

    if (document.sf_admin_edit_form.cacotiza_tipo_T.checked)
    {
      var resul=(monto*((numero*numero2)*100/montototal))/100;
      $(descuento).value=format(resul.toFixed(2),'.',',','.');
      var j=0;
      calculadescuentos(j);
    }
  actualizarsaldos();

  var numtres=toFloat('cacotiza_monrec');
   var numcuatro=toFloat('totales');

   var tota=numtres+numcuatro;

	$('cacotiza_moncot').value=format(tota.toFixed(2),'.',',','.');
  }
  else
  {
  	alert('Debe seleccionar el Tipo de Moneda');
  }

  }


   function calculadescuentos(fil)
  {
    var cant="ax"+"_"+fil+"_3";
    var costo="ax"+"_"+fil+"_4";
    var descuen="ax"+"_"+fil+"_5";
    var total="ax"+"_"+fil+"_6";

    var numero=toFloat(cant);
    var numero2=toFloat(costo);
    var numero3=toFloat(descuen);

    var ids='<?php echo $cacotiza->getId()?>';
    if (ids=="" && $('cacotiza_refsol').value=='')
    { var am=totalregistros('ax',1,50);}
    else if (ids=="" && $('cacotiza_refsol').value!='')
    { var am=parseInt($('fila').value);}
    else if (ids!="" )
    { var am=parseInt($('fila2').value);}

     if (numero!="" && numero2!="" && numero>0 && numero2>0)
	   {
	     if (numero3!="")
	     {
          if (validarnumero(descuen))
          {
            if (document.sf_admin_edit_form.cacotiza_tipo_P.checked)
            {
              var calcula=(numero*numero2)*numero3/100;
              $(descuen).value=format(calcula.toFixed(2),'.',',','.');
            }
           var cal=numero*numero2;
            if (numero<=cal || document.sf_admin_edit_form.cacotiza_tipo_T.checked)
            {
              if (document.sf_admin_edit_form.cacotiza_tipo_T.checked)
              {
                var montototal=0;
                var i=0;
                while (i<am)
                {
                  var cant= "ax_"+i+"_3";
                  var costo= "ax_"+i+"_4";
                   var num=toFloat(cant);
                   var num2=toFloat(costo);

                  montototal=montototal + (num*num2);
                 i++;
                }

                if (numero3>=montototal)
                {
                  alert('El Monto del Descuento no puede ser mayor al del Total del Articulo');
                  $(descuen).value='0,00';
                  return true;
                }
              }

                if (document.sf_admin_edit_form.cacotiza_tipo_M.checked || document.sf_admin_edit_form.cacotiza_tipo_T.checked)
                {
                 var aumento_dis='Suelto';
                 if ($('cacotiza_valmon').value!=0 && numero3>0)
                 {
                  if (($('posneg').value=='D' && aumento_dis=='Agarro') || ($('posneg').value=='A' && aumento_dis=='Suelto'))
                  {
                    var cal=numero3/$('cacotiza_valmon').value;
                    $(descuen).value= format(cal.toFixed(2),'.',',','.');
                  }
                  else if (($('posneg').value=='D' && aumento_dis=='Suelto') || ($('posneg').value=='A' && aumento_dis=='Agarro'))
                  {
                    var cal=numero3*$('cacotiza_valmon').value;
                    $(descuen).value= format(cal.toFixed(2),'.',',','.');
                  }
                 }
                }

             var pro=toFloat(descuen);
             var producto=(numero*numero2)-pro;
             $(total).value=format(producto.toFixed(2),'.',',','.');

            }
            else
            {
               alert('El Monto debe ser menor al Total del Artículo');
               $(id).value='0,00';
            }
          }
          else
          {
            alert('El Dato debe ser Númerico');
            $(descuen).value='0,00';
          }
	     }
	     else
	     {
	       alert('El Dato debe ser Númerico');
           $(descuen).value='0,00';
	     }
	   }
	   else
	   {
	     alert('Debe Introducir primero la Cantidad y el Costo del Articulo');
	     $(descuen).value='0,00';
	   }
  }

  function calcular(id)
  {
    var numero1=toFloat(id);
    var numero2=toFloat('totales');
    var numero3=toFloat('cacotiza_mondes');

    var total=(numero2+numero1)-numero3;
    $('cacotiza_moncot').value=format(total.toFixed(2),'.',',','.');
  }

</script>