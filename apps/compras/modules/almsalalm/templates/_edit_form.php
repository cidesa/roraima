<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 15:17:59
?>
<?php echo form_tag('almsalalm/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<?php echo object_input_hidden_tag($casalalm, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Salida') ?></legend>
<div class="form-row">
  <table>
   <tr>
    <th> <?php echo label_for('casalalm[codsal]', __($labels['casalalm{codsal}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casalalm{codsal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casalalm{codsal}')): ?>
    <?php echo form_error('casalalm{codsal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casalalm, 'getCodsal', array (
  'size' => 20,
  'maxlength' => 8,
  'control_name' => 'casalalm[codsal]',
  'onBlur'  => "javascript:enter(this.value);",
  'readonly'  =>  $casalalm->getId()!='' ? true : false,
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('casalalm[fecsal]', __($labels['casalalm{fecsal}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casalalm{fecsal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casalalm{fecsal}')): ?>
    <?php echo form_error('casalalm{fecsal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_date_tag($casalalm, 'getFecsal', array (
  'size' => 11,
  'maxlength' => 10,  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'casalalm[fecsal]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
   'readonly'  =>  $casalalm->getId()!='' ? true : false,
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div></th>
   </tr>
  </table>

<br>
 <?php echo label_for('casalalm[rifpro]', __($labels['casalalm{rifpro}']), 'class="required" Style="width:210px"') ?>
  <div class="content<?php if ($sf_request->hasError('casalalm{rifpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casalalm{rifpro}')): ?>
    <?php echo form_error('casalalm{rifpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php if ($casalalm->getId()=="") { ?>
  <?php echo input_auto_complete_tag('casalalm[rifpro]', $casalalm->getRifpro(),
    'almsalalm/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 18, 'onBlur'=> remote_function(array(
			  'url'      => 'almsalalm/ajax',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=2&cajtexmos=casalalm_nompro&cajtexcom=casalalm_rifpro&codigo='+this.value"
			  ))),
     array('use_style' => 'true') )?>  &nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caprovee_Almsalalm/clase/Caprovee/frame/sf_admin_edit_form/obj1/casalalm_rifpro/obj2/casalalm_nompro/campo1/rifpro/campo2/nompro','','','botoncat')?>
    <?php } else { ?>
     <?php $value= object_input_tag($casalalm,'getRifpro',array('maxlength' => 18,
    'readonly'=>true,
    'control_name'=>'casalalm[rifpro]') ); echo $value ? $value : '&nbsp;' ?>
    <?php }?>

<?php $value = object_input_tag($casalalm, 'getNompro', array (
  'size' => 55,
  'disabled' => true,
  'control_name' => 'casalalm[nompro]',
)); echo $value ? $value : '&nbsp;' ?>

</div>
<br>


  <?php echo label_for('casalalm[dessal]', __($labels['casalalm{dessal}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casalalm{dessal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casalalm{dessal}')): ?>
    <?php echo form_error('casalalm{dessal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casalalm, 'getDessal', array (
  'size' => 106,
  'control_name' => 'casalalm[dessal]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <table>
   <tr>
    <th> <?php echo label_for('casalalm[tipmov]', __($labels['casalalm{tipmov}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casalalm{tipmov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casalalm{tipmov}')): ?>
    <?php echo form_error('casalalm{tipmov}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('casalalm[tipmov]', $casalalm->getTipmov(),
    'almsalalm/autocomplete?ajax=3',  array('autocomplete' => 'off','maxlength' => 3,   'readonly'  =>  $casalalm->getId()!='' ? true : false, 'onBlur'=> remote_function(array(
			  'url'      => 'almsalalm/ajax',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=3&cajtexmos=casalalm_destipsal&cajtexcom=casalalm_tipmov&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?></div></th>
<th>&nbsp;</th>
<th>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catipsal_Almsalalm/clase/Catipsal/frame/sf_admin_edit_form/obj1/casalalm_tipmov/obj2/casalalm_destipsal/campo1/codtipsal/campo2/destipsal','','','botoncat')?>
</th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th>  <?php $value = object_input_tag($casalalm, 'getDestipsal', array (
  'disabled' => true,
  'control_name' => 'casalalm[destipsal]',
)); echo $value ? $value : '&nbsp;' ?>
    </th>
    <th></th>
    <th><?php echo label_for('casalalm[monsal]', __($labels['casalalm{monsal}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casalalm{monsal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casalalm{monsal}')): ?>
    <?php echo form_error('casalalm{monsal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casalalm, 'getMonsal', array (
  'size' => 19,
  'readonly' => true,
  'control_name' => 'casalalm[monsal]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
   </tr>
  </table>
<br>
  <?php echo label_for('casalalm[observ]', __($labels['casalalm{observ}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casalalm{observ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casalalm{observ}')): ?>
    <?php echo form_error('casalalm{observ}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casalalm, 'getObserv', array (
  'control_name' => 'casalalm[observ]',
  'size' => '100x3',
  'maxlength' => 1000,
  'onkeyup' => '"ismaxlength(this)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
</form>

<script type="text/javascript">
function canttotal(e,id)
{
if (e.keyCode==13)
{
	var aux = id.split("_");
	var name=aux[0];
	var fil=aux[1];
	var col=parseInt(aux[2]);


	var cantidad=name+"_"+fil+"_3";
	var costo=name+"_"+fil+"_4";
	var total=name+"_"+fil+"_5";

 	var num1=toFloat(cantidad);
    var num2=toFloat(costo);

	 costototal=num1*num2;

	 document.getElementById(total).value=format(costototal.toFixed(2),'.',',','.');

	 entermonto_b(e,id);
}
}

 function ejecutaajax(e,id)
 {
    if (e.keyCode==13 || e.keyCode==9)
    {
        var aux = id.split("_");
	    var name=aux[0];
	    var fil=parseInt(aux[1]);
	    var col=parseInt(aux[2]);

	  	var coldes=col+1;
    	var descripcion=name+"_"+fil+"_"+coldes;

	    var colalm=col-2;
	    var codalm=name+"_"+fil+"_"+colalm;
	    var valcodalm=$(codalm).value;
	    var cod=$(id).value;

        if ($(id).value!="")
      	{
    		new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&cajtexmos='+descripcion+'&cajtexcom='+id+'&codalm='+valcodalm+'&codigo='+cod})
    	}
    }
 }

 function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('casalalm_codsal').value=valor;
 }
</script>

<?php include_partial('edit_actions', array('casalalm' => $casalalm)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($casalalm->getId()): ?>
<?php echo button_to(__('delete'), 'almsalalm/delete?id='.$casalalm->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
 </ul>