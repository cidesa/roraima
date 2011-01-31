<? if ($catproter->getEsmunicipal()=='S')  {
  ?><?php echo radiobutton_tag('catproter[esmunicipal]', 'S', true)        ."   Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('catproter[esmunicipal]', 'N', false)."     No";?>
    <?
}else{
  echo radiobutton_tag('catproter[esmunicipal]', 'S', false)        ." Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('catproter[esmunicipal]', 'N', true)."   No";

} ?>
