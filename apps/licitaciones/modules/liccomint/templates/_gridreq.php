<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid', 'Validation') ?>
<?php if($licomint->getNumcomint()==''){ ?>
    <div id="divreq" style="display:none">
<?php }else{ ?>
    <div id="divreq" >
<?php } ?>
<?php echo grid_tag_v2($licomint->getObjreq()); ?>
</div>

<script>
function BuscarRequisiciones(id)
{
    var idart = obtenerColumnaSiguiente(id);
    var codart = $(idart).value;
    var tfil = obtener_filas_grid('a', 2);
    if($(id).checked==true)
    {
        for(i=0;i<tfil;i++)
        {
            if(id!='ax_'+i+'_1')
                $('ax_'+i+'_1').checked=false;
        }
        $('divreq').show();
        toAjaxUpdater('divreq', '2', getUrlModulo()+'/ajax', codart, '', '');
    }
}
</script>