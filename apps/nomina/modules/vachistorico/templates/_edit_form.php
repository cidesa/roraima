<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/16 16:07:24
?>
<?php echo form_tag('vachistorico/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($nphojint, 'getId') ?>
<?php use_helper('Javascript','wait','Grid','PopUp','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('ajax','tools','observe','dFilter') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('nphojint[codemp]', __($labels['nphojint{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codemp}')): ?>
    <?php echo form_error('nphojint{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCodemp', array (
  'size' => 12,
  'readonly' => $nphojint->getId()!='' ? true : false ,
  'control_name' => 'nphojint[codemp]',
  'onBlur'=> remote_function(array(
   'update'   => 'grid',
   'condition' =>  "$('id').value == ''",
   'url'      => 'vachistorico/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'script' => true,
   'with' => "'ajax=1&cajtexcom=nphojint_codemp&cajadias=diaspen&cajtexnom=nphojint_nomemp&cajtexfec=nphojint_fecing&codigo='+this.value"
        ))


    )); echo $value ? $value : '&nbsp;' ?> &nbsp;

 <?php if (!$nphojint->getId()) echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Vachistorico/clase/Nphojint/frame/sf_admin_edit_form/obj1/nphojint_codemp/obj2/nphojint_nomemp/obj3/nphojint_fecing/campo1/codemp/campo2/nomemp/campo3/fecing')?> &nbsp;

 <?php $value = object_input_tag($nphojint, 'getNomemp', array (
  //'readonly' => true,
  'style' => "border-style:none;",
   'size'=> 60,
  'control_name' => 'nphojint[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>

</div>

<br>

  <?php echo label_for('nphojint[fecing]', __($labels['nphojint{fecing}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fecing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fecing}')): ?>
    <?php echo form_error('nphojint{fecing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nphojint, 'getFecing', array (
  'readonly' => true,
  'style' => "border-style:none;",
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nphojint[fecing]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('diaspen', __('Dias Pendientes:'), 'class="required"') ?>
  <div class="content">
<?php echo input_tag('diaspen', $diaspen,array(
'readonly' => true,
'style' => "border-style:none;"
)) ?>
</div>
<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>


</fieldset>

<?php include_partial('edit_actions', array('nphojint' => $nphojint)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($nphojint->getId()): ?>
<?php echo button_to(__('delete'), 'vachistorico/delete?id='.$nphojint->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>


   <script type="text/javascript">

   $('trigger_nphojint_fecing').hide();

   function calcular_dias(id)
{
	var adisfrutar = $(id).value;
	var aux = id.split("_");

   	var name=aux[0];
   	var fila=aux[1];
   	var col=parseInt(aux[2]);

      var coldes=col+1;
      var disfrutados  = name+"_"+fila+"_"+coldes;

      var coldes=col+2;
      var pordisfrutar = name+"_"+fila+"_"+coldes;
      var diaspordis=$(pordisfrutar).value;
      //calcular los dias pendientes
      var diaspdisfrutarant = $(pordisfrutar).value;
      $('diaspen').value=parseInt($('diaspen').value) - (diaspdisfrutarant-(parseInt(adisfrutar) - parseInt($(disfrutados).value)));


	$(pordisfrutar).value = parseInt(adisfrutar) - parseInt($(disfrutados).value);

	if($(pordisfrutar).value<0)
	{
		$(id).value=parseInt(diaspordis)+parseInt($(disfrutados).value);
		$(pordisfrutar).value=parseInt(diaspordis);
		alert('Los dias por disfrutar no puede dar negativo');
		$(id).focus();
	}


}

function calcular_dias2(id)
{
	var disfrutados = $(id).value;
	var aux = id.split("_");

   	var name=aux[0];
   	var fila=aux[1];
   	var col=parseInt(aux[2]);

      var coldes=col-1;
      var adisfrutar  = name+"_"+fila+"_"+coldes;

      var coldes=col+1;
      var pordisfrutar = name+"_"+fila+"_"+coldes;
      //calcular los dias pendientes
      var diaspdisfrutarant = $(pordisfrutar).value;
      $('diaspen').value=parseInt($('diaspen').value) - (diaspdisfrutarant-(parseInt($(adisfrutar).value) - parseInt(disfrutados)));

	$(pordisfrutar).value = parseInt($(adisfrutar).value) - parseInt(disfrutados);

    if($(pordisfrutar).value<0)
	{
		$(id).value=parseInt(disfrutados)+parseInt($(pordisfrutar).value);
		$(pordisfrutar).value=0;
		alert('Los dias por disfrutar no puede dar negativo');
		$(id).focus();
	}
}


   </script>


