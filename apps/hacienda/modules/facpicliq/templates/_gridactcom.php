<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>

<div id='grid1'>
<?php
	echo grid_tag_v2($fcdeclar->getGridactcom());
	echo grid_tag_v2($fcdeclar->getGriddisdeu());
?>
</div>

