<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
	echo grid_tag_v2($bdcriterio->getObj());
?>

<script language="JavaScript" type="text/javascript">
  var i=0;
  var fil=parseInt($('bdcriterio_numfilas').value);
  while (i<fil)
  {
    var col1="ax_"+i+"_1";
    var col2="ax_"+i+"_2";
    var col3="ax_"+i+"_3";
    var col4="ax_"+i+"_4";
    if ($(col3))
    {
      if ($(col3).value!=0)
      {         
         $(col3).className='colorrojo';
      }
    }
    i++;
  }
</script>