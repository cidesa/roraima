<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="div1">

<?php if($viacalrub->getId())  echo grid_tag_v2($viacalrub->getGrid()); ?>

</div>
<script language="Javascript">

function calculamontofinal(id)
{
    var auxid=id.split('_');
    var col=auxid[2];
    var name=auxid[0];
    var fil= auxid[1];
    var colmon = parseInt(col)+2;
    var colprox = parseInt(col)+1;
    var idprox = name+'_'+fil+'_'+colprox;
    var idmon = name+'_'+fil+'_'+colmon;
    var valprox = $(idprox).value
    valprox = valprox.replace('.','');
    valprox = valprox.replace(',','.');

    var valor = $(id).value
    valor = valor.replace('.','');
    valor = valor.replace(',','.');    

    $(idmon).value=number_format(parseFloat(valor)*parseFloat(valprox),2,',','.');

}
</script>
