<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/02 16:41:01
?>
<?php echo form_tag('nomnommovnomemp/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>

<?php echo object_input_hidden_tag($npasicaremp, 'getId') ?>


<fieldset>
<legend>Tipo de N&oacute;mina</legend>
<div class="form-row">

 <strong>C&oacute;digo</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_tag($npasicaremp, 'getCodnom', array (
  'size' => 10,
  'control_name' => 'codigonomina',
  'maxlength' => '12,',
  'onBlur'=> remote_function(array(
        'url'      => 'nomnommovnomemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=codigonomina&cajtexcom=nombrenomina&codigo='+this.value"
        ))

)); echo $value ? $value : '&nbsp;' ?>&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npdefmov_nomnommovnomcon/clase/Npnomina/frame/sf_admin_edit_form/obj1/codigonomina/obj2/nombrenomina/campo1/codnom/campo2/nomnom/param1/")?>

<?php $value = object_input_tag($npasicaremp, 'getNomnom', array (
  'size' => 50,
  'control_name' => 'nombrenomina',
  'maxlength' => '40,',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

</div>

</fieldset>


<fieldset>
<legend>Empleados</legend>
<div class="form-row">

 <strong>C&oacute;digo</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php $value = object_input_tag($npasicaremp, 'getCodemp', array (
  'size' => 10,
  'control_name' => 'codigoempleado',
  'maxlength' => '12,',
  'onBlur'=> remote_function(array(
        'url'      => 'nomnommovnomemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=3&cajtexmos=codigoempleado&cajtexcom=nombreempleado&codigonom='+$('codigonomina').value+'&codigoemp='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npasicaremp_nomnommovnomemp/clase/Npasicaremp/frame/sf_admin_edit_form/obj1/codigoempleado/obj2/nombreempleado/campo1/codemp/campo2/nomemp/param1/'+$('codigonomina').value+'")?>

<?php $value = object_input_tag($npasicaremp, 'getNomemp', array (
  'size' => 50,
  'control_name' => 'nombreempleado',
  'maxlength' => '40,',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

</div>

</fieldset>


<fieldset>
<legend>Cargos</legend>
<div class="form-row">

 <strong>C&oacute;digo</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php $value = object_input_tag($npasicaremp, 'getCodcar', array (
  'size' => 10,
  'control_name' => 'codigocargo',
  'maxlength' => '12,',
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'url'      => 'nomnommovnomemp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=2&cajtexmos=codigocargo&cajtexcom=nombrecargo&codigonomina='+$('codigonomina').value+'&codigoempleado='+$('codigoempleado').value+'&codigocargo='+this.value"
  )),

)); echo $value ? $value : '&nbsp;' ?>&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npasiconemp_nomnommovnomemp/clase/Npasiconemp/frame/sf_admin_edit_form/obj1/codigocargo/obj2/nombrecargo/campo1/codcar/campo2/nomcar/param1/'+$('codigoempleado').value+'")?>

<?php $value = object_input_tag($npasicaremp, 'getNomcar', array (
  'size' => 50,
  'control_name' => 'nombrecargo',
  'maxlength' => '50,',
  'readonly' => true,
  )); echo $value ? $value : '&nbsp;' ?>

</div>

</fieldset>

<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>


<?php include_partial('edit_actions', array('npasicaremp' => $npasicaremp)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npasicaremp->getId()): ?>
<?php echo button_to(__('delete'), 'nomnommovnomemp/delete?id='.$npasicaremp->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>


   <script type="text/javascript">

    function validar_monto_numero(e,id)
    {
    	 var aux = id.split("_");
   	 var name=aux[0];
   	 var fila=aux[1];
   	 var col=parseInt(aux[2]);

   	 var status = col - 1;

   	 var idnuevo = name+"_"+fila+"_"+status;

   	 var valor = $(idnuevo).value;

	 if (valor=="M")
	 {
	  entermontootro(e,id);
	 }
	 else
	 {
        enternumero(e,id);
	 }

    }

   </script>