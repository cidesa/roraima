<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php //echo javascript_include_tag('nomina/nomnomcalnom') ?>

<?php
  $catparams="/param1/'+$('npnomesptipos_codnomesp').value+'";
  $ajaxparams="+'&codnomesp='+$('npnomesptipos_codnomesp').value";
 ?>

<?php
echo Catalogo($npnomesptipos,2,array(
  'getprincipal' => 'getCodnom',
  'getsecundario' => 'getNomnom',
  'campoprincipal' => 'codnom',
  'camposecundario' => 'nomnom',
  'campobase' => 'npnomesptipos',
  ), 'Npnomespnomtip_Nomespcalculo', 'Npnomespnomtip',$catparams,$ajaxparams,'divmensaje'); // '', $ajaxparams, 'divProgram' si acaso lleva param


///fecha/obj4/frecuencia/obj5/proxcalculo/
//campo3/ultfec/campo4/frecal/campo5/profec/

?>
<?php echo input_hidden_tag('proxcalculo', '') ?>
<?php echo input_hidden_tag('frecuencia', '') ?>
<?php echo input_hidden_tag('valida', '') ?>

<?php //echo input_tag('pago2','', 'size=15 readonly=true') ?>
<?php //echo input_hidden_tag('npnomesptipos_numsem','') ?>
<?php //echo object_input_hidden_tag($npnomesptipos, 'getNumsem')
  echo object_input_hidden_tag($npnomesptipos, 'getNumsem', array(
     'control_name' => 'npnomesptipos[numsem]',
    ));
?>

<input id="opsi" type="text" value="" style="display:none">

  <div id="numsemanas" style="display:none">
  <fieldset>
  <div class="form-row">
   <table>
    <tr>
    <th>
    	<?php echo label_for('labelmsem', __('Nro. de la Semana'), array('class' => 'required', 'style' => 'width:100px' )) ?>
		<?php echo input_tag('msem2','0',array('size' => 5, 'onBlur' => "javascript: validaMsem()")) ?>
    </th>
    <th>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
    <div id="ultimasemana">
     <fieldset>
     <legend><?php echo __('Ultima Semana') ?></legend>
		   <div class="form-row">

			<?php echo __('SI')?><?php echo radiobutton_tag('opsi[]','SI',true).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'?>
			<?php echo __('NO')?><?php echo radiobutton_tag('opsi[]','NO',false)?>
		  </div>
         </fieldset>
     </div>
    </th>
    </tr>
   </table>
   </div>
   </fieldset>
  </div>
