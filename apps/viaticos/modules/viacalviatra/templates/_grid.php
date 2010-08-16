<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="div1">

<?php echo grid_tag_v2($viacalviatra->getGrid()); ?>

</div>
<script language="Javascript">
    if('<?php echo $viacalviatra->getRefcom()?>'=='')
    {
        $('divcompromiso').hide();
    }
    if('<?php echo $viacalviatra->getTipvia()?>'=='NACIONAL')
    {
        $('divtotviadol').hide();
    }else
    {
        $('divtotviadol').show();
    }
</script>