<?php echo javascript_include_tag('dFilter', 'ajax', 'facturacion/proformas', 'tools') ?>

<script>
function rellenarcorr(id)
    {
        if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0)
    }
</script>