<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<div id='divgridper'>
<?php 
echo grid_tag_v2($nppernom->getObjPer()); 
?>
</div>
