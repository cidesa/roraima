<? if ($fatippag->getTipcan()=='E')  {
  ?><?php echo radiobutton_tag('fatippag[tipcan]', 'E', true)        ."   Efectivo".'&nbsp;&nbsp;';
      echo radiobutton_tag('fatippag[tipcan]', 'R', false)."     Retención";?>
    <?
}else{
  echo radiobutton_tag('fatippag[tipcan]', 'E', false)        ."Efectivo".'&nbsp;&nbsp;';
  echo radiobutton_tag('fatippag[tipcan]', 'R', true)."   Retención";

} ?>