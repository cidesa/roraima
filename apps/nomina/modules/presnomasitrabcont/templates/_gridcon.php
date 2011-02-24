<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<div id="mensaje">
<?php
echo grid_tag_v2($npasiempcont->getObjcon());
?>
</div>
<script language="JavaScript" type="text/javascript">

  function marcarTodo()
  {  	 
     var tfil=obtener_filas_grid('a',2);
     var id='';
     for(i=0;i<tfil;i++)
     {
          id="ax"+"_"+i+"_1";
          if(id)
            $(id).checked=1;
     }
  }

  function desmarcarTodo()
  {
     var tfil=obtener_filas_grid('a',2);
     var id='';
     for(i=0;i<tfil;i++)
     {
          id="ax"+"_"+i+"_1";
          if(id)
            $(id).checked=0;
     }
  }
  /*function ocutaricono()
  {
  	var am=parseInt($('totalfilas').value);
     var fil=0;
	 while (fil<am)
	 {
	  var id="ax"+"_"+fil+"_6";
	  $('trigger_'+id).hide();
	  fil++;
	 }
  }*/
</script>