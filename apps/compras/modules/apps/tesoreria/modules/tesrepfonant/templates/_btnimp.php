<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<ul class="sf_admin_actions" >
<li class="float-center">
<input id="mostrar" class="sf_admin_action_save" type="button" value="Cargar Imputaciones" onClick="cargarimp();">
</li>
</ul>

<script language="JavaScript" type="text/javascript">
  var ids='<?php echo $opordpag->getId();?>';
  if (ids!="")
  {
    $('divSalidas por Rendir').hide();
    $('divfecdes').hide();
    $('divfechas').hide();
    $('divgridsal').hide();
    $('divbtnimp').hide();
  }
</script>