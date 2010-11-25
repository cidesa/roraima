<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid', 'Validation') ?>

<?php echo grid_tag_v2($casolart->getObj()); ?>

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
  var am=obtener_filas_grid('compromiso',2);
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

function ajaxmostrardetalle(e,id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codigo=$(id).value;

  if(confirm("¿Desea visualizar el detalle de la Solicitud de Egresos?"))
  {

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
       new Ajax.Updater('gendet', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codigo='+codigo});
      }
    }
  }
}

 function detalle(formulario)
 {
   window.open('/compras_dev.php/almdetsol/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
 }

</script>