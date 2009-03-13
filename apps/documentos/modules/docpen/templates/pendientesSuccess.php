<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Documentos Actualizados', 
array()) ?></h1>

<div id="sf_admin_header">
<br><?php if($resultado) $resp = __('Documentos Actualizados',array()); else $resp = __('Error al actualizar los Documentos',array()); echo $resp;?></br>
<br><?php echo __('Espere por favor...',array()) ?></br>
</div>

</div>