<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<div id="divGrid">
<?
 echo grid_tag($nptippre->getObj());
?>
</div>