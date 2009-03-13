<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if($cond==1) {?>
<div id='divgridvaca'>
<?php
echo grid_tag_v2($npliquidacion_det->getObjvaca()); ?>
</div>
<?php }elseif($cond==2){?>
<div id='divgridasig'>
<?php
;
echo grid_tag_v2($objasig); ?>
</div>
<?php }elseif($cond==3){?>
<div id='divgriddeduc'>
<?php
echo grid_tag_v2($objdeduc); ?>
</div>
<?php }?>