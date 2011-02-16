<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid', 'Validation') ?>

<?php echo grid_tag_v2($liprebas->getObj()); ?>

<div id="gendet"></div>


<script type="text/javascript">
function validar(id)
{
var aux = id.split("_");
var name=aux[0];
var fil=parseInt(aux[1]);
var col=parseInt(aux[2]);

  var q=0;
  var enc=false;
  var am=obtener_filas_grid('a',2);
  while (q<am && (!enc))
  {
      var act="compromisox_"+q+"_1";
      if (fil!=q)
      {
          if ($(act).checked==true)
          {
           enc=true;
          }
      }
      q++;
  }
  if (enc)
  {
      alert('Marque solo uno...');
      $(id).checked=false;
  }
}


</script>