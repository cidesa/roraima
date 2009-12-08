<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/17 17:53:42
?>
<?php echo form_tag('nomdefespcar/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'double_list_submit(); return true;'
)) ?>

<?php echo object_input_hidden_tag($npcargos, 'getId') ?>
<?php echo javascript_include_tag('ajax', 'tools', 'observe', 'dFilter') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Cargo')?></h2></legend>
<div class="form-row">
  <?php echo label_for('npcargos[codcar]', __($labels['npcargos{codcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcargos{codcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcargos{codcar}')): ?>
    <?php echo form_error('npcargos{codcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php $value = object_input_tag($npcargos, 'getCodcar', array (
  'size' => 8,
  'control_name' => 'npcargos[codcar]',
  'maxlength' =>  $lonmascar,
  'readonly'  =>  $npcargos->getId()!='' ? true : false ,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracargo')",
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
  <?php echo label_for('npcargos[nomcar]', __($labels['npcargos{nomcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcargos{nomcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcargos{nomcar}')): ?>
    <?php echo form_error('npcargos{nomcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npcargos, 'getNomcar', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'npcargos[nomcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npcargos[codtip]', __($labels['npcargos{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcargos{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcargos{codtip}')): ?>
    <?php echo form_error('npcargos{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('npcargos[codtip]', $npcargos->getCodtip(),
    'nomdefespcar/autocomplete?ajax=1',  array(
    'autocomplete' => 'off',
    'maxlength' => 3,
    'size' => 3,
    'onBlur'=> remote_function(array(
        'url'      => 'nomdefespcar/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=npcargos_nomtip&cajtexcom=npcargos_codtip&codtip='+this.value"
        ))),
     array('use_style' => 'true')
  )
?>&nbsp;&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npcargos_nomdefespcar/clase/Nptipcar/frame/sf_admin_edit_form/obj1/npcargos_nomtip/obj2/npcargos_codtip/campo1/destipcar/campo2/codtipcar/param1/Y')?>
&nbsp;
<?php $value = object_input_tag($npcargos, 'getNomtip', array (
  'readonly' => true,
  'size'=> 66,
  'control_name' => 'npcargos[nomtip]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>

<br>

  <?php echo label_for('npcargos[graocp]', __($labels['npcargos{graocp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcargos{graocp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcargos{graocp}')): ?>
    <?php echo form_error('npcargos{graocp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('npcargos[graocp]', $npcargos->getGraocp(),
    'nomdefespcar/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 3, 'size' => 3,
  'onBlur'=> remote_function(array(
        'url'      => 'nomdefespcar/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=1&cajtexmos=npcargos_suecar&cajtexcom=npcargos_graocp&codgra='+this.value+'&codtipcar='+$('npcargos_codtip').value"
        ))),
     array('use_style' => 'true')
  )
?> &nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npcargos_nomdefespcar/clase/Npcomocp/frame/sf_admin_edit_form/obj1/npcargos_graocp/obj2/npcargos_suecar/campo1/gracar/campo2/suecar/param1/'+$('npcargos_codtip').value+'")?>

    </div>

<br>

<table cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<?php echo label_for('npcargos[suecar]', __($labels['npcargos{suecar}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('npcargos{suecar}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npcargos{suecar}')): ?>
			    <?php echo form_error('npcargos{suecar}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>

			  <?php $value = object_input_tag($npcargos, array('getSuecar',true), array (
			  'size' => 7,
			  'maxlength' => 21,
			  'control_name' => 'npcargos[suecar]',
			  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
			)); echo $value ? $value : '&nbsp;' ?>
			    </div>
		</td>
		<td>
			<?php echo label_for('npcargos[comcar]', __($labels['npcargos{comcar}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('npcargos{comcar}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npcargos{comcar}')): ?>
			    <?php echo form_error('npcargos{comcar}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>

			  <?php $value = object_input_tag($npcargos, array('getComcar',true), array (
			  'size' => 7,
			  'maxlength' => 21,
			  'control_name' => 'npcargos[comcar]',
			  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
			)); echo $value ? $value : '&nbsp;' ?>
    </div>
		</td>
		<td>
			<?php echo label_for('npcargos[pricar]', __($labels['npcargos{pricar}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('npcargos{pricar}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npcargos{pricar}')): ?>
			    <?php echo form_error('npcargos{pricar}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>

			  <?php $value = object_input_tag($npcargos, array('getPricar',true), array (
			  'size' => 7,
			  'maxlength' => 21,
			  'control_name' => 'npcargos[pricar]',
			  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
			)); echo $value ? $value : '&nbsp;' ?>
			    </div>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo label_for('npcargos[canmuj]', __($labels['npcargos{canmuj}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('npcargos{canmuj}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npcargos{canmuj}')): ?>
			    <?php echo form_error('npcargos{canmuj}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>

			  <?php $value = object_input_tag($npcargos, array('getCanmuj',true), array (
			  'size' => 7,
			  'maxlength' => 21,
			  'onBlur' => "javascript:event.keyCode=13; calcularo(event,this.id)",
			  'control_name' => 'npcargos[canmuj]',
			)); echo $value ? $value : '&nbsp;' ?>
		</td>
		<td><?php echo label_for('npcargos[canhom]', __($labels['npcargos{canhom}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('npcargos{canhom}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npcargos{canhom}')): ?>
			    <?php echo form_error('npcargos{canhom}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>

			  <?php $value = object_input_tag($npcargos, array('getCanhom',true), array (
			  'size' => 7,
			  'maxlength' => 21,
			  'onBlur' => "javascript:event.keyCode=13; calcularo(event,this.id)",
			  'control_name' => 'npcargos[canhom]',
			)); echo $value ? $value : '&nbsp;'?>
		</td>
	</tr>

	<tr>
		<td>
			<?php echo label_for('npcargos[carvan]', __($labels['npcargos{carvan}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('npcargos{carvan}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npcargos{carvan}')): ?>
			    <?php echo form_error('npcargos{carvan}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>

			  <?php $value = object_input_tag($npcargos, array('getCarvan',true), array (
			  'size' => 6,
			  'maxlength' => 6,
			  'readonly' => true,
			  'control_name' => 'npcargos[carvan]',
			)); echo $value ? $value : '&nbsp;' ?>
		</td>
		<td><?php echo label_for('npcargos[carasi]', __($labels['npcargos{carasi}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('npcargos{carasi}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npcargos{carasi}')): ?>
			    <?php echo form_error('npcargos{carasi}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>

			  <?php $value = object_input_tag($npcargos, array('getCarasi',true), array (
			  'size' => 6,
			  'maxlength' => 6,
			  'readonly' => true,
			  'control_name' => 'npcargos[carasi]',
			)); echo $value ? $value : '&nbsp;'?>
		</td>
	</tr>

</table>



<br>
<table>
<tr>
<th>
</th>
</tr>
</table>


<table>
<tr>
<th>
</th>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Puntuación Mínima para optar por el Cargo')?></h2></legend>
<div class="form-row" align="center">
  <?php $value = object_input_tag($npcargos, array('getPunmin',true), array (
  'size' => 15,
  'maxlength' => 21,
  'control_name' => 'npcargos[punmin]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</fieldset>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Categoría del Cargo')?></h2></legend>
<div class="form-row" align="center">
<?php  if($npcargos->getStacar()=='O') $val = true; else $val=false; ?>
  <?php echo "Empleado ".radiobutton_tag('npcargos[stacar]', 'E', !$val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'?>
  <?php echo "  Obrero ".radiobutton_tag('npcargos[stacar]', 'O', $val ).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
</div>
</fieldset>
</th>
</tr>
</table>
</div>
</fieldset>
</div>
</fieldset>

<br>
<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Profesiones que optan por el Cargo');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('npcargos[profecargo]', __($labels['npcargos{profecargo}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcargos{profecargo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcargos{profecargo}')): ?>
    <?php echo form_error('npcargos{profecargo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_double_list($npcargos, 'getProfecargo', array (
  'control_name' => 'npcargos[profecargo]',
  'through_class' => 'Npprocar',
  'unassociated_label' => 'Profesiones',
  'associated_label' => 'Profesiones por Cargo'
),array('NpprofesionPeer','cargarSelect')); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage2", 'Perfiles que requieren el Cargo');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?
echo grid_tag($obj);
?>
</div>
</fieldset>

<?php tabPageOpenClose("tp1","tabPage3", 'Aumentar % Sueldos');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
  <?php echo label_for('npcargos[porcen]', __($labels['npcargos{porcen}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcargos{porcen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcargos{porcen}')): ?>
    <?php echo form_error('npcargos{porcen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npcargos, array('getPorcen',true), array (
  'control_name' => 'npcargos[porcen]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<ul class="sf_admin_actions">
<li class="float-left">
<?php echo submit_to_remote('Submit2', 'Aumentar', array(
         'update'   => 'comp',
         'url'      => 'nomdefespcar/ajax?ajax=4',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('class' => 'sf_admin_action_save')) ?>
</li>
</ul>
</th>
</tr>
</table>
<br>
<div id="comp">
</div>

</div>
</fieldset>

<?php tabInit('tp1','0');?>
<?php include_partial('edit_actions', array('npcargos' => $npcargos)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npcargos->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefespcar/delete?id='.$npcargos->getId(), array (
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

  if (perfil_repetido(id))
  {
    alert('El Perfil se encuentra repetido');
    $(id).value="";
    $(descripcion).value="";
  }

 }

 function calcularo(e,id)
 {

 	if (e.keyCode==13 || e.keyCode==9)
 	{
       if (IsNumeric($(id).value))
       {
       	  var canmuj=parseInt($('npcargos_canmuj').value);
       	  var canhom=parseInt($('npcargos_canhom').value);
       	  var carasi=parseInt($('npcargos_carasi').value);

          var cuenta= canmuj + canhom - carasi;
          $('npcargos_carvan').value=cuenta;
       }else{
       	alert('Debe introducir un valor entero');
       	$(id).value='';
       }
 	}

 }

 function perfil_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var perfil=$(id).value;

   var perfilrepetido=false;
   var am=totalregistros('ax',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var perfil2=$(codigo).value;

    if (i!=fila)
    {
      if (perfil==perfil2)
      {
        perfilrepetido=true;
        break;
      }
    }
   i++;
   }
   return perfilrepetido;
 }

  function ajax(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var descripcion=name+"_"+fil+"_"+coldes;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {

    new Ajax.Request('/nomina_dev.php/nomdefespcar/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validargrid(id); }, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
 }
 }
</script>

