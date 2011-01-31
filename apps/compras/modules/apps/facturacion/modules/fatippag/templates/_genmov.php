<? if ($fatippag->getGenmov()=='S')  {
  ?><?php echo radiobutton_tag('fatippag[genmov]', 'S', true)        ."   Si".'&nbsp;&nbsp;';
      echo radiobutton_tag('fatippag[genmov]', 'N', false)."     No";?>
    <?
}else{
  echo radiobutton_tag('fatippag[genmov]', 'S', false)        ."Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('fatippag[genmov]', 'N', true)."   No";

} ?>