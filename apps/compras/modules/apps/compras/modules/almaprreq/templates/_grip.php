<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid', 'Validation') ?>

<?php echo grid_tag_v2($careqart->getObj()); ?>

<div id="gendeta"></div>

<script language="JavaScript" type="text/javascript">
colocarenDif();


function colocarenDif()
{
  var j=0;
  am='<?php echo $careqart->getTotfil()?>';
  while (j<am)
  {
    var aprob="requisicionx_"+j+"_10";
    var dif="requisicionx_"+j+"_3";

    if ($(aprob).value=='D')
    {
    	$(dif).checked=true;
    }
  	j++;
  }
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
     var colcom2=col+2;
    }else if (col==2)
    {
      var colcom=col-1;
      var colcom2=col+1;
    }
    else {
      var colcom=col-2;
      var colcom2=col-1;
    }

    var compara=name+"_"+fil+"_"+colcom;
    var compara2=name+"_"+fil+"_"+colcom2;

    if ($(compara).checked==true || $(compara2).checked==true)
    {
      alert('Debe marcar solo una opcion');
      $(id).checked=false;
    }
}

function ajaxmostrardetallereq(e,id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codigo=$(id).value;

  if(confirm("Â¿Desea visualizar el detalle de la Solicitud de RequisiciÃ³n?"))
  {

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
       new Ajax.Updater('gendeta', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codigo='+codigo});
      }
    }
  }
}

 function detalle(formulario)
 {
   window.open('/compras_dev.php/almdetsolreq/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
 }
</script>