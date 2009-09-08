<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/22 18:17:38
?>
<?php echo form_tag('nomdefconaportes/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npcontipaporet, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipos de Retención y Aportes')?></legend>
<div class="form-row">
  <?php echo label_for('npcontipaporet[codtipapo]', __($labels['npcontipaporet{codtipapo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcontipaporet{codtipapo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcontipaporet{codtipapo}')): ?>
    <?php echo form_error('npcontipaporet{codtipapo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('npcontipaporet[codtipapo]', $npcontipaporet->getCodtipapo(),
    'nomdefconaportes/autocomplete?ajax=3',  array('autocomplete' => 'off','maxlength' => 4,
    'readonly'  =>  $npcontipaporet->getId()!='' ? true : false ,
    //'onKeyPress' => "javascript: valor=this.value; valor=valor.pad(4, '0',0);$('npcontipaporet_codtipapo').value=valor",
	'onBlur'=> remote_function(array(
			  'url'      => 'nomdefconaportes/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('npcontipaporet_codtipapo').value != '' && $('id').value == ''",
  			  'with' => "'ajax=3&cajtexmos=npcontipaporet_destipapo&cajtexcom=npcontipaporet_codtipapo&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?>
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nptipaportes_Nomdefconaportes/clase/Nptipaportes/frame/sf_admin_edit_form/obj1/npcontipaporet_codtipapo/obj2/npcontipaporet_destipapo/campo1/codtipapo/campo2/destipapo')?>

 <?php $value = object_input_tag($npcontipaporet, 'getDestipapo', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'npcontipaporet[destipapo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<?php echo grid_tag($grid);?><?php echo input_hidden_tag('existecon', '') ?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('npcontipaporet' => $npcontipaporet)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npcontipaporet->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefconaportes/delete?id='.$npcontipaporet->getId().'&codigo='.$npcontipaporet->getCodtipapo(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">

   function validargrid(id)
 {
    var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
    var descripcion=name+"_"+fila+"_"+coldes;

	if ($('existecon').value=='NN')
	{
	  alert('El concepto no existe');
	  $(id).value="";
	}
	else if ($('existecon').value=='N')
	{
	  alert('El concepto no esta a la Nómina seleccionada');
	  $(id).value="";
	}
	else
	{
	if (concepto_repetido(id))
	{
		alert('El concepto ya esta registrado con esta Nómina');
		$(id).value="";
		$(descripcion).value="";
	}
	}
 }

 function concepto_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var colnom=col-2;

   var nom=name+"_"+fila+"_"+colnom;
   var nomina_concepto=$(nom).value+$(id).value;

   var conceptorepetido=false;
   var am=totalregistros('ax',1,50);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";
    var concepto="ax"+"_"+i+"_3";

    var nomina_concepto2=$(codigo).value+$(concepto).value;

    if (i!=fila)
    {
      if (nomina_concepto==nomina_concepto2)
      {
        conceptorepetido=true;
        break;
      }
    }
   i++;
   }
   return conceptorepetido;
 }

 function totalregistros(letra,posicion,filas)
  {
    var fil=0;
    var total=0;
    while (fil<filas)
    {
      var chk=letra+"_"+fil+"_"+posicion;
      if ($(chk).value!="")
      { total=total + 1; }
     fil++;
    }
    return total;
  }

  function ajax(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var colnom=col-2;
    var descripcion=name+"_"+fil+"_"+coldes;
    var nomina=name+"_"+fil+"_"+colnom;
    var nom=$(nomina).value;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
    if ($(id).value!='')
    {
      new Ajax.Request('/nomina_dev.php/nomdefconaportes/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validargrid(id); }, parameters:'ajax=2&cajtexmos='+descripcion+'&nomina='+nom+'&cajtexcom='+id+'&codigo='+cod})
    }
  }
 }
</script>
