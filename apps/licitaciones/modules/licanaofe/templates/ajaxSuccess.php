<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>


<?php
if($ajax=='1')
    echo grid_tag_v2($lianaofe->getGridleg());
elseif($ajax=='7')
    echo grid_tag_v2($lianaofe->getGridtec());
elseif($ajax=='8')
    echo grid_tag_v2($lianaofe->getGridfin());
elseif($ajax=='9')
    echo grid_tag_v2($lianaofe->getGridfia());
elseif($ajax=='10')
    echo grid_tag_v2($lianaofe->getGridtipemp());
?>
