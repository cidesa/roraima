<?php
	$bandera1="style=\"display:none;\"";
	$bandera2="";
	$bandera3="";
	if ($fcsollic->getId()!='')
	{
		if ($fcsollic->getStasol()=='A')
		{
			$bandera1="style=\"display:none;\"";
			$bandera2="";
			$bandera3="style=\"display:none;\"";
			if ($fcsollic->getStalic()=='V')
			{
				$bandera1="style=\"display:none;\"";
				$bandera2="";
				$bandera3="style=\"display:none;\"";
			}
			else
			{
		      if ($fcsollic->getStalic()=='E')
		      {
		      	$bandera1="style=\"display:none;\"";
		      	$bandera2="style=\"display:none;\"";
		      }
			  elseif ($fcsollic->getStalic()=='C')
			  {
			  	$bandera1="style=\"display:none;\"";
			  	$bandera2="style=\"display:none;\"";
			  }
			  elseif ($fcsollic->getStalic()=='S')
			  {
			  	$bandera1="style=\"display:none;\"";
			  	$bandera2="style=\"display:none;\"";
			  }
			}
		}
		else
		{
			$bandera1="";
			$bandera2="style=\"display:none;\"";
		}
	?>


<div>
<table>
<tr>
    <th>
		<ul  class="sf_admin_actions" >
			<input type="button" name="Submit1" value="Negacion" class="sf_admin_action_delete" onclick="Mostrar_Negacion();" />
		</ul>
    </th>
    <th>
      &nbsp;
    </th>
    <th>
		<ul  class="sf_admin_actions" >
			<input type="button" name="Submit1" value="Imprimir Forma Pre-Impresa" class="sf_admin_action" onclick="Mostrar_orden_preimpresa();" />
		</ul>
    </th>
    <th>
      &nbsp;
    </th>
</tr>
</table>


<div id="negacion2" <?php echo $bandera1; ?>>
<br><br>
<div id="divnumneg">
  <?php echo label_for('fcsollic[numneg]', __('Numero:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{numneg}')): ?> form-error<?php endif; ?>">
<?php if ($fcsollic->getNumneg()=='') { ?>
  <?php $value = object_input_tag($fcsollic, 'getNumneg', array (
  'size' => 12,
  'maxlength' => 10,
  'control_name' => 'fcsollic[numneg]',
  'onChange' => "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('fcsollic_numneg').value=valor;document.getElementById('fcsollic_numneg').disabled=false;",
  'onBlur'=> remote_function(array(
        'url'      => 'facpicsollic/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=5&numero='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
<?php } else  { ?>
 <?php $value = object_input_tag($fcsollic, 'getNumneg', array (
  'size' => 12,
  'readonly' => true,
  'maxlength' => 10,
  'control_name' => 'fcsollic[numneg]',
)); echo $value ? $value : '&nbsp;' ?>
<?php }?>
<div class="sf_admin_edit_help"><?php echo __('Solo Numeros') ?></div>

  </div>
</div>
<br>

<div id="divfunneg">
  <?php echo label_for('fcsollic[funneg]', __('Funcionario:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{funneg}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getFunneg', array (
  'size' => 17,
  'maxlength' => 15,
  'control_name' => 'fcsollic[funneg]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Solo Letras') ?></div>
  </div>
</div>
<br>

<div id="divfecneg">
  <?php echo label_for('fcsollic[fecneg]', __('Fecha:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{fecneg}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_date_tag($fcsollic, 'getFecneg', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcsollic[fecneg]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

<div id="divmotneg">
  <?php echo label_for('fcsollic[motneg]', __('Motivo de la Negación:'), 'class="required" Style="text-align:left; width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{motneg}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getMotneg', array (
  'size' => 70,
  'maxlength' => 210,
  'control_name' => 'fcsollic[motneg]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>

<br>

<fieldset class="" id="sf_fieldset_7___documentos">
<h2 >Documentos</h2>
<div id="documentos" class="form-row">

<div id="divtomo">
  <?php echo label_for('fcsollic[tomon]', __('Tomo:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{tomon}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getTomon', array (
  'size' => 10,
  'maxlength' => 8,
  'control_name' => 'fcsollic[tomon]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

<div id="divnumeron">
  <?php echo label_for('fcsollic[numeron]', __('Numero:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{numeron}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getNumeron', array (
  'size' => 10,
  'maxlength' => 8,
  'control_name' => 'fcsollic[numeron]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

<div id="divfolion">
  <?php echo label_for('fcsollic[folion]', __('Folio:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{folion}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getFolion', array (
  'size' => 10,
  'maxlength' => 8,
  'control_name' => 'fcsollic[folion]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

<div id="divresolu">
  <?php echo label_for('fcsollic[resolu]', __('Resolución:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{resolu}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getResolu', array (
  'size' => 10,
  'maxlength' => 12,
  'control_name' => 'fcsollic[resolu]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>

</div>

</fieldset>

<table>
<tr>
    <th>
		<ul  class="sf_admin_actions" >
			<input type="button" name="Submit1" value="Cancelar" class="sf_admin_action_cancel" onclick="Ocultar_Negacion();" />
		</ul>
    </th>
    <th>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
</tr>
</table>

</div>
</div>
<?php }  ?>