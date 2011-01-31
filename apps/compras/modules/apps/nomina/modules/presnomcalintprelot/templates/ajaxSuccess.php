<?php use_helper('Object','ObjectAdmin','Grid');?>
<strong><font color="#CC0000" size="3" face="Verdana, Arial, Helvetica, sans-serif">
  <div><?php echo __('Prestaciones Calculadas:     '.$cal); ?></div></font></strong>
<strong><font color="#084B8A" size="3" face="Verdana, Arial, Helvetica, sans-serif">
  <div><?php echo __('Prestaciones No Calculadas:     '.$nocal); ?></div></font></strong>

<?php echo grid_tag_v2($nppresoc->getObj());?>
