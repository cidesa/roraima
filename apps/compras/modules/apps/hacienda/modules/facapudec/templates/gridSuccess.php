<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?
if ($fcdeclar)
{
	echo grid_tag_v2($fcdeclar->getGriddeuda());
}
?>
