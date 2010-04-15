<ul  >
<?php echo submit_to_remote('btnTraspasar', 'Traspasar Inventario', array(  'confirm' => __('¿Desea reemplazar el Inventario Inicial de los Artículos, con el Inventario actual?'),
			   'url'      => 'almtrainv/traspasar',
			   'script'   => true,
			   'complete' => 'AjaxJSON(request, json)',
			   'with' => "'fecinv='+$('cainvfis_fecinv').value"
));

 ?>
</ul>