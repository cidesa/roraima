<div id="divinthor" style="display:none">
	<table>
		<tr>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>
				<?php if($labels['rhdefcur{hora}']!='.:') { ?>
				  <?php echo label_for('rhdefcur[hora]', __($labels['rhdefcur{hora}' ]), 'class="required" Style="text-align:left; width:200px"') ?>
				  <div class="content<?php if ($sf_request->hasError('rhdefcur{hora}')): ?> form-error<?php endif; ?>">
				  <?php if ($sf_request->hasError('rhdefcur{hora}')): ?>
				    <?php echo form_error('rhdefcur{hora}', array('class' => 'form-error-msg')) ?>
				  <?php endif; }?>  
				  
				   
				  
				  <?php echo select_time_tag('rhdefcur[hora]', $rhdefcur->getHora() ? $rhdefcur->getHora() : '08:00', array('time_seperator' => ' : '), array('style' => 'width:50px;')); ?>					      
				  						
				  <?php if($labels['rhdefcur{hora}']!='.:') { ?>
				  <!--AQUI VAMOS-->
				  <?php echo button_to();?>
				
				   
				  </div>
				  <?php  } ?> 					
				 	
				 </div>
				 
			</th>			
		</tr>
	</table>
</div>
<script language="JavaScript">
	function darformato()
	{
		$('divinthor').show();
		disableAllObjetos_(a=new Array('rhdefcur_hora_hour','rhdefcur_hora_minute'),true);
		
	}
</script>

