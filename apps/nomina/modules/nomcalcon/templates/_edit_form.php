<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/23 14:28:48
?>
<?php echo form_tag('nomcalcon/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>


<?php echo javascript_include_tag('dFilter_string') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools','grid') ?>
<?php echo javascript_include_tag('nomina/nomcalcon') ?>

<?php echo object_input_hidden_tag($npcalcon, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
<fieldset>
<legend><? echo __('Concepto')?></legend>
<div class="form-row">
 <table>
  <tr>
  	<th><?php echo label_for('npcalcon[codcon]', __($labels['npcalcon{codcon}']), 'class="required" ') ?>
		  <div class="content<?php if ($sf_request->hasError('npcalcon{codcon}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('npcalcon{codcon}')): ?>
		    <?php echo form_error('npcalcon{codcon}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php echo input_auto_complete_tag('npcalcon[codcon]', $npcalcon->getCodcon(),
  		  'nomcalcon/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 3,'size' => 5 ,
          'onKeypress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();$('npcalcon_codcon').value=cadena;if(event.keyCode==13) $('npcalcon_codcon').blur();",
		   'onBlur'=> remote_function(array(
               'update'   => 'divConceptos',
			  'url'      => 'nomcalcon/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('id').value==''",
			  'script' => true,
  			  'with' => "'ajax=1&cajtexmos=npcalcon_nomcon&cajtexcom=npcalcon_codcon&codigo='+this.value"
			  ))),
     		array('use_style' => 'true'))
     		?>

     		<?php echo input_hidden_tag('cajocu1', 'cajocu1') ?>
     		<?php echo input_hidden_tag('entorno',$ent) ?>
		    </div>

	</th>
	<th>&nbsp;&nbsp;&nbsp;
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npcalcon_nomcalcon/clase/Npdefcpt/frame/sf_admin_edit_form/obj1/npcalcon_codcon/obj2/npcalcon_nomcon/campo1/codcon/campo2/nomcon','','','buttoncat')?></th>
  </tr>
</table>

<br>

   <?php $value = object_input_tag($npcalcon, 'getNomcon', array (
  'readonly' => true,
  'size' => 60,
  'style' => "border-style:none;",
  'control_name' => 'npcalcon[nomcon]',
)); echo $value ? $value : '&nbsp;' ?>

</div>
</fieldset>
</th>
<th>
<fieldset>
<legend><? echo __('Nomina')?></legend>
<div class="form-row">
 <table>
  <tr>
  	<th><?php echo label_for('npcalcon[codnom]', __($labels['npcalcon{codnom}']), 'class="required" ') ?>
		  <div class="content<?php if ($sf_request->hasError('npcalcon{codnom}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('npcalcon{codnom}')): ?>
		    <?php echo form_error('npcalcon{codnom}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>


		  <?php $value = object_input_tag($npcalcon,'getCodnom',array(
		  'maxlength' => 3,
		  'control_name' => 'npcalcon[codnom]',
		  'size' => 5 ,
          'onKeypress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();$('npcalcon_codnom').value=cadena;if(event.keyCode==13) $('npcalcon_codnom').blur();",
          'onBlur'=> remote_function(array(
              'update'   => 'divMovimientos',
			  'url'      => 'nomcalcon/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('id').value==''",
			  'script' => true,
  			  'with' => "'ajax=2&cajtexmos=npcalcon_nomnom&cajtexcom=npcalcon_codnom&codigo='+this.value+'&cod_con='+$('npcalcon_codcon').value+'&id='+$('id').value"
			  )))); echo $value ? $value : '&nbsp;' ?>

			<?php echo input_hidden_tag('cajocu2', 'cajocu2') ?>
			<?php echo input_hidden_tag('cajocu3', 'cajocu3') ?>

		    </div>

	</th>
	<th>&nbsp;&nbsp;&nbsp;
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npcalcon_nomcalcon2/clase/Npnomina/frame/sf_admin_edit_form/obj1/npcalcon_codnom/obj2/npcalcon_nomnom/campo1/codnom/campo2/nomnom/param1/'+$('npcalcon_codcon').value+' ",'','','buttoncat')?></th>
  </tr>
</table>

<br>

   <?php $value = object_input_tag($npcalcon, 'getNomnom', array (
  'readonly' => true,
  'size' => 60,
  'style' => "border-style:none;",
  'control_name' => 'npcalcon[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>

</div>
</fieldset>
</th>
</tr>
</table>

<table>
<tr>
  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th align="center">
  <div id="mensaje" style="display:none" align="center">
   <fieldset id="sf_fieldset_none" class="">
	<div class="form-row" align="center">
	<strong>
		<?php echo label_for('', __('label'), array('id' => 'labelmensaje', 'style' => 'width:450px; color: #c11b17; font-size: 14px; font-weight: bold " ' )) ?>
	</strong>
         <br>
	</div>
   </fieldset>
   </div>
  </th>
</tr>
</table>

<table>
 <tr>
   <th>
   <div id="grid1"   style="font-weight:bold">

		<?
			echo grid_tag($obj);
			echo input_hidden_tag('cajgrid1', '');
			echo input_hidden_tag('cajgrid2', '');
			echo input_hidden_tag('cajgrid3', '');
			echo input_hidden_tag('cajgrid4', '');

	    ?>


</div>
   </th>
 </tr>
 <tr>
	 <th>
		 <div id="textooculto1" style="display:none">
		 <fieldset>
			 <div class="form-row">
				 <?php echo label_for('label1', __('label'), array('id' => 'label1', 'class' => 'required', 'style' => 'width:350px' )) ?>
				 <?php echo input_tag('idlabel','','size=15');?>
				 <?php echo input_tag('idlabel2','',array('size' => 15, 'onkeyUp' => "javascript: mascara(this,'/',patron,true)"));?>
				 <?php echo input_hidden_tag('cajoculabel', 'valor') ?>
				 <?php echo input_hidden_tag('cajaux', '') ?>
				 <input type="button" value="Aceptar" onClick="javascript:botonAceptar()" >
				 <input type="button" value="Cancelar" onClick="javascript:botonCancelar()" >

			 </div>
		  </fieldset>
         </div>
		 <div id="histoculto" style="display:none">
		 <fieldset>
		  <div class="form-row">
		  <table>
		   <tr>
		     <th>
			     <fieldset>
				 <legend><?php echo __('Fecha de Inicial')?></legend>
				 <div class="form-row">
					<?php echo input_tag('fecini','',array('size' => 15, 'onkeyUp' => "javascript: mascara(this,'/',patron,true)"));?>
				 </div>
				</fieldset>
				<br><br>
				<fieldset>
				<legend><?php echo __('Fecha de Final')?></legend>
				 <div class="form-row">
					<?php echo input_tag('fecfin','',array('size' => 15, 'onkeyUp' => "javascript: mascara(this,'/',patron,true)"));?>
				 </div>
			     </fieldset>

			 </th>
			 <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			 <th>
			  <fieldset>
				<legend><?php echo __('Opciones')?></legend>
				 <div class="form-row">
					<?php echo select_tag('opciones',array('-1' => 'Opciones', 'P' => 'Promedio', 'M' => 'Mayor en el Rango', 'N' => 'Menor en el Rango', 'S' => 'Suma de todos los Valores'));?>
				 </div>
				</fieldset>
				<br><br>
				<fieldset>
				 <div class="form-row">
				    <?php echo label_for('label2', __('En los Ultimos'), array('class' => 'required', 'style' => 'width:100px' )) ?>
					<?php echo input_tag('ultmes','0',array('size' => 5)) ?> <?php echo select_tag('mesper',array('M' => 'Meses', 'P' => 'Períodos'));?>
					<?php echo input_hidden_tag('cajaux2', '') ?>

				 </div>
			  </fieldset>
			 </th>
			 <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			 <th>
			    <input type="button" value="Aceptar" onClick="javascript:botonAceptar2()" >
			    &nbsp;&nbsp;&nbsp;
				<input type="button" value="Cancelar" onClick="javascript:botonCancelar2()" >
			 </th>
			</tr>
		  </table>
		  </div>
		  </fieldset>
		 </div>
	 </th>
 </tr>
</table>



<table>
  <tr>
     <th>
     <fieldset>
	<legend><? echo __('Funciones')?></legend>
	<div class="form-row" id="divFunciones">

		  <?php $value = select_tag('idfunciones',$lista1,array (
		  'control_name' => 'funciones',
		  'multiple' => false,
		  'size' => 5,
		  'style' => 'width:300px',
		  'onDblClick'=> "javascript:CargarFormula(this.id)"/*remote_function(array(
		        'url'      => 'tesmoslib/ajax',
		         'script'   => true,
		        'complete' => 'AjaxJSON(request, json)',
		          'with' => "'ajax=1&cajtexmos=nrocta&cajtexcom=nomban&codigo='+this.value",

		        ))*/
		)); echo $value ? $value : '&nbsp;' ?>


   </div>
   </fieldset>
     </th>
     <th>
     <fieldset>
	<legend><? echo __('Variables')?></legend>
	<div class="form-row" id="divVariables">

		  <?php $value = select_tag('idvariables',$objlistvar,array (
		  'control_name' => 'variables',
		  'multiple' => false,
		  'size' => 5,
		  'style' => 'width:300px',
		  'onDblClick'=> "javascript:CargarFormula(this.id)"
		  /*'onclick'=> remote_function(array(
		        'url'      => 'tesmoslib/ajax',
		         'script'   => true,
		        'complete' => 'AjaxJSON(request, json)',
		          'with' => "'ajax=1&cajtexmos=nrocta&cajtexcom=nomban&codigo='+this.value",

		        ))*/
		)); echo $value ? $value : '&nbsp;' ?>


   </div>
   </fieldset>
     </th>
  </tr>
  <tr>
    <th>
	<fieldset>
	<legend><? echo __('Movimientos (M-CódigoNomina-CódigoConcepto-Tipo)')?></legend>
	<div class="form-row" id="divMovimientos">

		  <?php $value = select_tag('idmovimientos',$objlistmov,array (
		  'control_name' => 'movimientos',
		  'multiple' => false,
		  'size' => 5,
		  'style' => 'width:300px',
		  'onDblClick'=> "javascript:CargarFormula(this.id)"
		  /*'onclick'=> remote_function(array(
		        'url'      => 'tesmoslib/ajax',
		         'script'   => true,
		        'complete' => 'AjaxJSON(request, json)',
		          'with' => "'ajax=1&cajtexmos=nrocta&cajtexcom=nomban&codigo='+this.value",

		        ))*/
		)); echo $value ? $value : '&nbsp;' ?>


   </div>
   </fieldset>
	</th>

	<th>
	<fieldset>
	<legend><? echo __('Conceptos (C-Codigo-(S)Saldo ó (A)cumulado)')?></legend>
	<div class="form-row" id="divConceptos">

		  <?php $value = select_tag('idconceptos',$objlistcon,array (
		  'control_name' => 'conceptos',
		  'multiple' => false,
		  'size' => 5,
		  'style' => 'width:300px',
		  'onDblClick'=> "javascript:CargarFormula(this.id)"
		  /*'onclick'=> remote_function(array(
		        'url'      => 'tesmoslib/ajax',
		         'script'   => true,
		        'complete' => 'AjaxJSON(request, json)',
		          'with' => "'ajax=1&cajtexmos=nrocta&cajtexcom=nomban&codigo='+this.value",

		        ))*/
		)); echo $value ? $value : '&nbsp;' ?>


   </div>
   </fieldset>
	</th>
  </tr>
  <tr>
    <th>
    <fieldset>
	<legend><? echo __('Datos del Empleado')?></legend>
	<div class="form-row" id="divEmpleados">

		  <?php $value = select_tag('idempleados',$lista2,array (
		  'control_name' => 'empleados',
		  'multiple' => false,
		  'size' => 5,
		  'style' => 'width:300px',
		  'onDblClick'=> "javascript:CargarFormula(this.id)"
		  /*'onclick'=> remote_function(array(
		        'url'      => 'tesmoslib/ajax',
		         'script'   => true,
		        'complete' => 'AjaxJSON(request, json)',
		          'with' => "'ajax=1&cajtexmos=nrocta&cajtexcom=nomban&codigo='+this.value",

		        ))*/
		)); echo $value ? $value : '&nbsp;' ?>


   </div>
   </fieldset>

    </th>
    <th>
    <fieldset>
	<legend><? echo __('Historicos (H-CódigoNomina-CódigoConcepto)')?></legend>
	<div class="form-row" id="divHistoricos">

		  <?php $value = select_tag('idhistoricos',$objlisthis,array (
		  'control_name' => 'historicos',
		  'multiple' => false,
		  'size' => 5,
		  'style' => 'width:300px',
		  'onDblClick'=> "javascript:CargarFormula(this.id)"
		  /*'onclick'=> remote_function(array(
		        'url'      => 'tesmoslib/ajax',
		         'script'   => true,
		        'complete' => 'AjaxJSON(request, json)',
		          'with' => "'ajax=1&cajtexmos=nrocta&cajtexcom=nomban&codigo='+this.value",

		        ))*/
		)); echo $value ? $value : '&nbsp;' ?>


   </div>
   </fieldset>
    </th>
  </tr>
</table>



</div>



</fieldset>

<?php include_partial('edit_actions', array('npcalcon' => $npcalcon)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npcalcon->getId()): ?>
<?php echo button_to(__('delete'), 'nomcalcon/delete?id='.$npcalcon->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript" >

    Inicial();



</script>


