<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?
	echo grid_tag_v2($opordpag->getObjeto());
?>

<script language="JavaScript" type="text/javascript">
  var am=parseInt('<?php echo $opordpag->getFilasord() ?>');
  var j=0;
  while (j<am)
  {
    var fecha="trigger_ax_"+j+"_5";

    $(fecha).hide();
  	j++;
  }

function verificar(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    if (col==1)
    {
     var colcom=col+1;
    }else var colcom=col-1;

    var compara=name+"_"+fil+"_"+colcom;

    if ($(compara).checked==true)
    {
      alert('Debe marcar solo una opcion');
      $(id).checked=false;
    }
}
</script>
