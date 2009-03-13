<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<div id="divGrid" style="display:none">
<?php
	echo grid_tag_v2($viaregsolvia->getObjgastos());
?>
</div>

