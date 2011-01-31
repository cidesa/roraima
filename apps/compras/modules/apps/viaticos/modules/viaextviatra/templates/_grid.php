<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="div1">

<?php echo grid_tag_v2($viaextviatra->getGrid()); ?>

</div>
<script language="Javascript">
    if('<?php echo $viaextviatra->getRefcom()?>'=='')
    {
        $('divcompromiso').hide();
    }
</script>