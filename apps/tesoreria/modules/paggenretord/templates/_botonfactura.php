<?php
/*
 * Created on 10/06/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php echo submit_to_remote('btnFactura', 'Generar Factura', array(
       'update'   => 'divgridfac',
       'url'      => 'paggenretord/ajax',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'submit' => 'sf_admin_edit_form',
      )) ?>