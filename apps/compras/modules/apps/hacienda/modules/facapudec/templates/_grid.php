<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<div id="divGrid">
<?
	echo grid_tag_v2($fcdeclar->getGrid());
?>
</div>
