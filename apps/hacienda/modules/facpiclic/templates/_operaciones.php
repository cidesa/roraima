<?php if ($fcsollic->getId()!='')
{
	$bandera='';
	if ($fcsollic->getStasol()=='A')
	{
		$bandera="style=\"display:none;\"";
		if ($fcsollic->getStalic()=='V') $bandera="style=\"display:none;\"";
		else
		{
	      if ($fcsollic->getStalic()=='E') $bandera="";
		  elseif ($fcsollic->getStalic()=='C') $bandera="";
		  elseif ($fcsollic->getStalic()=='S') $bandera="";
		}
	}
	else $bandera="";
?>
<div>
<table>
<tr>
    <th>
    <?php echo submit_to_remote('Submit2', 'Reactivar', array(
         'url'      => 'facpiclic/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=6&numero='+this.value"
         ));?>
    </th>
    <th>
      &nbsp;
    </th>
    <th>
    <?php echo submit_to_remote('Submit2', 'Renovar', array(
         'url'      => 'facpiclic/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=7&numero='+this.value"
         ));?>
    </th>
    <th>
      &nbsp;
    </th>
    <th>
    <?php echo submit_to_remote('Submit2', 'Suspender', array(
         'url'      => 'facpiclic/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=8&numero='+this.value"
         ));?>
    </th>
    <th>
      &nbsp;
    </th>
    <th>
    <?php echo submit_to_remote('Submit2', 'Cancelar', array(
         'url'      => 'facpiclic/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=9&numero='+this.value"
         ));?>
    </th>
    <th>
      &nbsp;
    </th>
</tr>
</table>
<br>
<div id="reactivar" style="color:#009E00; font-weight:bolder; display:none;"><strong>Reactivar Licencia</strong></div>
<div id="renovar" style="color:#0090FE; font-weight:bolder; display:none;"><strong>Renovar Licencia</strong></div>
<div id="suspender" style="color:#FF8C1E; font-weight:bolder; display:none;"><strong>Suspender Licencia</strong></div>
<div id="cancelar" style="color:#E06C6C; font-weight:bolder; display:none;"><strong>Cancelar Licencia</strong></div>
</div>

<br><br>
<div id="suspencion" <?php echo $bandera; ?>">
<div id="divnumsus">
  <?php echo label_for('fcsollic[numsus]', __('Numero'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{numsus}')): ?> form-error<?php endif; ?>">
<?php if ($fcsollic->getNumsus()=='') { ?>
  <?php $value = object_input_tag($fcsollic, 'getNumsus', array (
  'size' => 12,
  'maxlength' => 10,
  'control_name' => 'fcsollic[numsus]',
  'onChange' => "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('fcsollic_numsus').value=valor;document.getElementById('fcsollic_numsus').disabled=false;",
  'onBlur'=> remote_function(array(
        'url'      => 'facpiclic/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=8&numero='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
<?php } else  { ?>
 <?php $value = object_input_tag($fcsollic, 'getNumsus', array (
  'size' => 12,
  'readonly' => true,
  'maxlength' => 10,
  'control_name' => 'fcsollic[numsus]',
)); echo $value ? $value : '&nbsp;' ?>
<?php }?>
<div class="sf_admin_edit_help"><?php echo __('Solo Numeros') ?></div>

  </div>
</div>
<br>

<div id="divfecsus">
  <?php echo label_for('fcsollic[fecsus]', __('Fecha'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{fecsus}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_date_tag($fcsollic, 'getFecsus', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcsollic[fecsus]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>




<div id="divmotsus">
  <?php echo label_for('fcsollic[funsus]', __('Funcionario'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{funsus}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getFunsus', array (
  'size' => 40,
  'maxlength' => 210,
  'control_name' => 'fcsollic[funsus]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

<div id="divmotsus">
  <?php echo label_for('fcsollic[motsus]', __('Motivo'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{motsus}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getMotsus', array (
  'size' => 40,
  'maxlength' => 210,
  'control_name' => 'fcsollic[motsus]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>


<div id="divsolsus">
  <?php echo label_for('fcsollic[solsus]', __('Solvencia'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{solsus}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getSolsus', array (
  'size' => 40,
  'maxlength' => 100,
  'control_name' => 'fcsollic[solsus]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

<div id="divfolsus">
  <?php echo label_for('fcsollic[folsus]', __('Folio'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{folsus}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getFolsus', array (
  'size' => 40,
  'maxlength' => 100,
  'control_name' => 'fcsollic[folsus]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

<div id="divactsus">
  <?php echo label_for('fcsollic[actsus]', __('Acta'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{actsus}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getActsus', array (
  'size' => 10,
  'maxlength' => 12,
  'control_name' => 'fcsollic[actsus]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>



<div id="divresolsus">
  <?php echo label_for('fcsollic[resolsus]', __('Resolución'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{resolsus}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getResolsus', array (
  'size' => 40,
  'maxlength' => 100,
  'control_name' => 'fcsollic[resolsus]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br><br>
<table>
<tr>
    <th>
      <input type="button" name="Submit" value="Cancelar" onClick="Ocultar_suspencion();"/>
    </th>
</tr>
</table>

</div>
<br>

<?php }
?>