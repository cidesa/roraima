<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="divcolrep">

<?php echo grid_tag_v2($npdefrepcon->getGrid()); ?>

</div>

<script>
function cambiardescripcion(id)
{
    var auxid = id.split("_");
    var name = auxid[0];
    var fil = auxid[1];
    var col = auxid[2];
    var colant = parseInt(auxid[2])-1;
    var idcolant = name+'_'+fil+'_'+colant;
    var val ='';
    if($(idcolant))
        val = $(idcolant).value;
    var t = obtener_filas_grid('a', '1')
    for(i=0;i<t;i++)
    {
        if(val == $('ax_'+i+'_1').value)
        {
            $('ax_'+i+'_2').value=$(id).value;
        }
    }

}
</script>
