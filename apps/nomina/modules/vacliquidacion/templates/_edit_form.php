<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 40785 2010-09-28 17:03:56Z cramirez $
 */
// date: 2007/03/16 17:33:55
?>
<?php echo form_tag('vacliquidacion/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools') ?>

<?php echo object_input_hidden_tag($nphojint, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('nphojint[codemp]', __($labels['nphojint{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codemp}')): ?>
    <?php echo form_error('nphojint{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_tag('nphojint[codemp]', $nphojint->getCodemp(),
    	array('maxlength' => 12,
    	      'readonly'  =>  $nphojint->getId()!='' ? true : false ,
			  'onBlur'=> remote_function(array(
			  'update'=> 'grid',
			  'url'      => 'vacliquidacion/ajax',
			  'complete' => 'AjaxJSON(request, json);$("nphojint_fecing").focus()',
			  'condition' => "$('nphojint_codemp').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajnomemp=nphojint_nomemp&cajfecing=nphojint_fecing&cajfecret=nphojint_fecret&cajultsue=nphojint_ultsue&cajsuenor=nphojint_suenor&codigo='+this.value"
			  )))
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Vacsalidas/clase/Nphojint/frame/sf_admin_edit_form/obj1/nphojint_codemp/obj2/nphojint_nomemp/obj3/nphojint_fecing/obj4/nphojint_fecret/campo1/codemp/campo2/nomemp/campo3/fecing/campo4/fecret','','','buttoncat')?> &nbsp;

  <?php $value = object_input_tag($nphojint, 'getNomemp', array (
  'size' => 60,
  'readonly' => true,
  'control_name' => 'nphojint[nomemp]',
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<table>
<th>
  <?php echo label_for('nphojint[fecing]', __($labels['nphojint{fecing}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fecing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fecing}')): ?>
    <?php echo form_error('nphojint{fecing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nphojint, 'getFecing', array (
  'readonly' => true,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'size' => 12,
  'date_format' => 'dd/MM/yyyy',
  'control_name' => 'nphojint[fecing]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 </th>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;
 </th>
 <th>
  <?php echo label_for('nphojint[fecret]', __($labels['nphojint{fecret}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fecret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fecret}')): ?>
    <?php echo form_error('nphojint{fecret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nphojint, 'getFecret', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nphojint[fecret]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 </th>
  </table>
<table>
	<tr>
		<th>
			<strong>Sueldo Normal:</strong>&nbsp;
			  <?php echo input_tag('nphojint_ultsue',$suenor, array (
			  'size' => 13,
			  'readonly'  =>  $nphojint->getId()!='' ? true : false ,
			  'name' => 'nphojint_ultsue',
			  'maxlength' => 15,
			  'onBlur'=> remote_function(array(
						  'update'=> 'grid',
						  'url'      => 'vacliquidacion/ajax',
						  'complete' => 'AjaxJSON(request, json);$("nphojint_fecing").focus();formatearcajita("nphojint_ultsue");',
						  'condition' => "$('nphojint_codemp').value != '' && $('id').value == ''",
			  			  'with' => "'ajax=2&cajcodemp='+$(nphojint_codemp).value+'&cajultsue='+this.value+'&cajsuenor='+$(nphojint_suenor).value"
						  ))
			));  ?>
			&nbsp;&nbsp;&nbsp;
		</th>
		<th>
                        <?php if($sf_user->getAttribute('nomsalint','','vacliquidacion')=='S'){ ?>
                            <strong>Salario Base:</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php }else { ?>
                            <strong>Salario Integral:</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                           <?php } ?>
				  <?php echo input_tag('nphojint_suenor',$ultsue, array (
				  'size' => 13,
				  'readonly'  =>  $nphojint->getId()!='' ? true : false ,
				  'name' => 'nphojint_suenor',
				  'maxlength' => 15,
				  'onBlur'=> remote_function(array(
							  'update'=> 'grid',
							  'url'      => 'vacliquidacion/ajax',
							  'complete' => 'AjaxJSON(request, json);$("nphojint_fecing").focus();formatearcajita("nphojint_suenor");',
							  'condition' => "$('nphojint_codemp').value != '' && $('id').value == ''",
				  			  'with' => "'ajax=2&cajcodemp='+$(nphojint_codemp).value+'&cajultsue='+$(nphojint_ultsue).value+'&cajsuenor='+this.value"
							  ))
				));  ?>
				&nbsp;&nbsp;&nbsp;
		</th>
		<th>
			<?php if($factorvacv!=0 && !is_null($factorvacv)){?>
				<strong>Salario Diario Vacaciones Vencidas <br> (Convencion Colectiva):
			<?php }else{?>
			    <strong>Salario Diario Vacaciones Vencidas :
			<?php }?>
			&nbsp;
			  <?php echo input_tag('nphojint_suediario',$suediario, array (
			  'size' => 13,
			  'readonly'  =>  true,
			  'name' => 'nphojint_suedia',
			  'maxlength' => 15,

			));  ?>
		</th>
	</tr>
</table>

<table>
	<tr>
		<th>
			<strong>Ultimo Sueldo:</strong>&nbsp;&nbsp;
				  <?php echo input_tag('nphojint_sueult',$sueult, array (
				  'size' => 13,
				  'readonly'  =>  true,
				  'name' => 'nphojint_sueult',
				  'maxlength' => 15,

				));  ?>
				&nbsp;&nbsp;&nbsp;
		</th>
		<th>
			<strong>Salario Promedio:</strong>&nbsp;
			  <?php echo input_tag('nphojint_suepro',$suepro, array (
			  'size' => 13,
			  'readonly'  =>  true,
			  'name' => 'nphojint_suepro',
			  'maxlength' => 15,

			));  ?>

			&nbsp;&nbsp;&nbsp;
		</th>
		<th>
			<?php if($factorbonvf!=0 && !is_null($factorbonvf)){?>
				<div id="divsuedia" >
					<strong>Salario Diario Bono Vacacional Fraccionado <br>(Convencion Colectiva):</strong>&nbsp;
			<?php }else{?>
			    <div id="divsuedia" >
			    	<strong>Salario Diario Bono Vacacional Fraccionado :</strong>&nbsp;
			<?php }?>

			  <?php echo input_tag('nphojint_suedia',$suedia, array (
			  'size' => 13,
			  'readonly'  =>  true,
			  'name' => 'nphojint_suedia',
			  'maxlength' => 15,

			));  ?>
			</div>
		</th>
	</tr>
</table>

</fieldset>

<br>

<div id=grid>
<?php
 echo grid_tag($objVac);
 ?>
 <br>
<?php
 echo grid_tag($objHis);
?>
</div>

<?php include_partial('edit_actions', array('nphojint' => $nphojint)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($nphojint->getId()): ?>
<?php echo button_to(__('delete'), 'vacliquidacion/delete?id='.$nphojint->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">
  var id="";
  var id='<?php echo $nphojint->getId()?>';
  actualiza(id);

  function formatearcajita(id)
  {
  	if (ValidarNumeroV2(id)==true)
    {
      if(ValidarNumeroV2Float(id))
        elnum = FloattoFloatVE($(id).value);
      else
        if(ValidarNumeroV2VE(id))
        {
          elnum = FloatVEtoFloat($(id).value);
          elnum = FloattoFloatVE(elnum);
        }
        else{elnum = '0,00';}
      $(id).value = elnum;
      return true;
    }
    else
    {
      $(id).value='0,00';
      $(id).focus();
      $(id).select();
      return false;
    }
  }

  function actualiza(id)
  {
  	$('trigger_nphojint_fecing').hide();
  	$('trigger_nphojint_fecret').hide();
    if (id!="")
    {
	    $$('.buttoncat')[0].disabled=true;
   }
  }
</script>