<?php use_helper('Object','ObjectAdmin','Grid');?>

<ul class="sf_admin_actions">
  <li ><?php echo submit_to_remote('btnCalcular', 'Calcular', array(
  		   'update'   => 'divgrid',
		   'url'      => 'presnomcalintprelot/ajax',
		   'script'   => true,
		   'complete' => 'AjaxJSON(request, json)',
                   'condition'=> "$(nppresoc_codtipcon).value!='' && $(nppresoc_feccor).value!=''",
		   'with' => "'ajax=1&codigo='+$('nppresoc_codtipcon').value+'&feccor='+$('nppresoc_feccor').value+'&salario='+$('nppresoc_salario_P').checked+'&capita='+$('capitalizacion').value+'&anno='+$('anno_365').checked"
)) ?></li>
</ul>

