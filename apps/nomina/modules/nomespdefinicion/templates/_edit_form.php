<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/25 01:43:42
?>
<?php echo form_tag('nomespdefinicion/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>

<?php echo object_input_hidden_tag($npnomesptipos, 'getId') ?>

<h2 class="h2" ><?php echo __('Definiciones Generales') ?></h2>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('npnomesptipos[codnomesp]', __($labels['npnomesptipos{codnomesp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomesptipos{codnomesp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomesptipos{codnomesp}')): ?>
    <?php echo form_error('npnomesptipos{codnomesp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomesptipos, 'getCodnomesp', array (
  'size' => 3,
  'maxlength' => 3,
  'readonly' => $npnomesptipos->getId()!='' ? true : false ,
  'control_name' => 'npnomesptipos[codnomesp]',
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'condition' =>  "$('id').value == ''",
        'url'      => 'nomespdefinicion/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexdesc=npnomesptipos_desnomesp&cajtexdesde=npnomesptipos_fecnomdes&cajtexhasta=npnomesptipos_fecnomhas&codigo='+this.value"
        ))

  )); echo $value ? $value : '&nbsp;' ?> &nbsp;

<?php /*echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npnomesptipos_nomespdefinicion/clase/Npnomesptipos/frame/sf_admin_edit_form/obj1/npnomesptipos_codnomesp/obj2/npnomesptipos_desnomesp/obj3/npnomesptipos_fecnomdes/obj4/npnomesptipos_fecnomhas/campo1/codnomesp/campo2/desnomesp/campo3/fecnomdes/campo4/fecnomhas/param1/")*/?>

    </div>

<br>

  <?php echo label_for('npnomesptipos[desnomesp]', __($labels['npnomesptipos{desnomesp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomesptipos{desnomesp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomesptipos{desnomesp}')): ?>
    <?php echo form_error('npnomesptipos{desnomesp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomesptipos, 'getDesnomesp', array (
  'size' => 60,
  'readonly' => $npnomesptipos->getId()!='' ? true : false ,
  'control_name' => 'npnomesptipos[desnomesp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('npnomesptipos[nomintpre]', __($labels['npnomesptipos{nomintpre}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npnomesptipos{nomintpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomesptipos{nomintpre}')): ?>
    <?php echo form_error('npnomesptipos{nomintpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($npnomesptipos, 'getNomintpre', array (
  'control_name' => 'npnomesptipos[nomintpre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
	
<br>	
<br>
</div>
</fieldset>

<br>

<h2 class="h2" ><?php echo __('Periodo de la Nomina') ?></h2>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo label_for('npnomesptipos[fecnomdes]', __($labels['npnomesptipos{fecnomdes}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('npnomesptipos{fecnomdes}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('npnomesptipos{fecnomdes}')): ?> <?php echo form_error('npnomesptipos{fecnomdes}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_date_tag($npnomesptipos, 'getFecnomdes', array (
  'rich' => true,
  'readonly' => $npnomesptipos->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npnomesptipos[fecnomdes]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?> &nbsp; &nbsp; &nbsp; &nbsp;
<strong>Hasta</strong>
&nbsp; <?php $value = object_input_date_tag($npnomesptipos, 'getFecnomhas', array (
'rich' => true,
'readonly' => $npnomesptipos->getId()!='' ? true : false ,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'control_name' => 'npnomesptipos[fecnomhas]',
'date_format' => 'dd/MM/yy',
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>

</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<br>
	<div id="grid" class="form-row">
	<?
		echo grid_tag($obj);
	?>
	</div>

</fieldset>

<?php include_partial('edit_actions', array('npnomesptipos' => $npnomesptipos)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npnomesptipos->getId()): ?>
<?php echo button_to(__('delete'), 'nomespdefinicion/delete?id='.$npnomesptipos->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>


 <script type="text/javascript">

    var id="";
    var id='<?php echo $npnomesptipos->getId()?>';
    if (id!="")
    {
      $('trigger_npnomesptipos_fecnomdes').hide();
      $('trigger_npnomesptipos_fecnomhas').hide();
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

 function codnom_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var codret=$(id).value;

   var codretrepetido=false;
   var am=totalregistros('ax',1,20);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var codret2=$(codigo).value;

    if (i!=fila)
    {
      if (codret==codret2)
      {
        codretrepetido=true;
        break;
      }
    }
   i++;
   }
   return codretrepetido;
}

function verificar_codnom(e,id)
{
  if (codnom_repetido(id))
    {
	 alert('El Codigo de la Nomina se encuentra repetido');
	 $(id).value="";
	 var aux = id.split("_");

   	var name=aux[0];
   	var fila=aux[1];
   	var col=parseInt(aux[2]);

      var coldes=col+1;
      var nombre=name+"_"+fila+"_"+coldes;

	$(nombre).value="";

    }
}


  </script>