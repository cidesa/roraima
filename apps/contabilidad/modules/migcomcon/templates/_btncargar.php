<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<ul class="sf_admin_actions">
<li>
<?php echo submit_to_remote('Submit2', 'Cargar Comprobantes', array(
         'update'   => 'divgrid',
         'url'      => 'migcomcon/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_list',)) ?>
</li>
</ul>

<script type="text/javascript" language="JavaScript">

function verificar(id)
{
  if ($(id).checked==true)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var col2=col+1;
    var col3=col+2;
    var col7=col+6;

    var idnumcom=name+"_"+fil+"_"+col2;
    var idfeccom=name+"_"+fil+"_"+col3;
    var iddescuadrado=name+"_"+fil+"_"+col7;


     if ($(iddescuadrado).value=='S')
     {
       var numcom=$(idnumcom).value;
       var feccom=$(idfeccom).value;

       new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&numcom='+numcom+'&feccom='+feccom+'&codigo='+id})
     }else{
      alert_('El Comprobante Contable está Descuadrado');
      $(id).checked=false;
     }
  }
}

</script>