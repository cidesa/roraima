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