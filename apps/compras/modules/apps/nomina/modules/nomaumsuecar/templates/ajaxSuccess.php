<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if($val==1){ ?>
<div id="divgridcargos">
<?php echo grid_tag_v2($npcargos->getObjcar()); ?>
</div>
<?php }?>

