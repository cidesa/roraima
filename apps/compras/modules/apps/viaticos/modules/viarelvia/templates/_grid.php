<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="div1">

<?php echo grid_tag_v2($viarelvia->getGrid()); ?>

</div>
<script language="Javascript">
    if('<?php echo $viarelvia->getRefcom()?>'=='')
    {
        $('divcompromiso').hide();
    }
</script>
