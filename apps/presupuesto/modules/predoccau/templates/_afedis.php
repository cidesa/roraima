<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccau->getAfedis()=="S"){
	echo radiobutton_tag('cpdoccau[afedis]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afedis]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdoccau->getAfedis()=="R") {
	echo radiobutton_tag('cpdoccau[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afedis]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afedis]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdoccau[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afedis]','N', true) .'  '. "No Afecta "."<br>";
}
?>

<script language="JavaScript" type="text/javascript">
  var nuevo='<?php echo $cpdoccau->getId(); ?>';
  var etadef='<?php echo $cpdoccau->getEtadef(); ?>';
  if (nuevo!="")
  {
    $('cpdoccau_tipcau').readOnly=true;
    if (etadef=='C')
    {
      $('cpdoccau_nomext').readOnly=true;
      $('cpdoccau_nomabr').readOnly=true;
      $('cpdoccau_refier_P').disabled=true;
      $('cpdoccau_refier_C').disabled=true;
      $('cpdoccau_refier_N').disabled=true;
      $('cpdoccau_afeprc_S').disabled=true;
      $('cpdoccau_afeprc_R').disabled=true;
      $('cpdoccau_afeprc_N').disabled=true;
      $('cpdoccau_afecom_S').disabled=true;
      $('cpdoccau_afecom_R').disabled=true;
      $('cpdoccau_afecom_N').disabled=true;
      $('cpdoccau_afecau_S').disabled=true;
      $('cpdoccau_afecau_R').disabled=true;
      $('cpdoccau_afecau_N').disabled=true;
      $('cpdoccau_afedis_S').disabled=true;
      $('cpdoccau_afedis_R').disabled=true;
      $('cpdoccau_afedis_N').disabled=true;

    }
  }

</script>