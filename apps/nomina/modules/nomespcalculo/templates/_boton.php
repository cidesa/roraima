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


<ul  class="sf_admin_actions" >
<?php echo submit_to_remote('btnCalcular', 'Calcular Nomina', array(
			   'update'  => 'grid1',
			   'url'      => 'nomespcalculo/ajax',
			   'script'   => true,
			   'complete' => 'AjaxJSON(request, json), validarCalculo()',
			   'with'     => "'ajax=3&codnom='+$('npnomina_codnom').value+'&numsem='+$('npnomina_numsem').value+'&desde='+$('npnomina_ultfec').value+'&hasta='+$('npnomina_profec').value+'&opsi='+$('opsi').value+'&msem2='+$('msem2').value+'&nomnom='+$('npnomina_nomnom').value+'&codnomesp='+$('npnomina_codnomesp').value",
));

 ?>
</ul>
