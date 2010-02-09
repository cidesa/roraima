<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdocpag->getAfedis()=="S"){
	echo radiobutton_tag('cpdocpag[afedis]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afedis]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdocpag->getAfedis()=="R") {
	echo radiobutton_tag('cpdocpag[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afedis]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afedis]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdocpag[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afedis]','N', true) .'  '. "No Afecta "."<br>";
}
?>

<script language="JavaScript" type="text/javascript">
  var nuevo='<?php echo $cpdocpag->getId(); ?>';
  var etadef='<?php echo $cpdocpag->getEtadef(); ?>';
  if (nuevo!="")
  {
    $('cpdocpag_tippag').readOnly=true;
    if (etadef=='C')
    {
      $('cpdocpag_nomext').readOnly=true;
      $('cpdocpag_nomabr').readOnly=true;
      $('cpdocpag_refier_P').disabled=true;
      $('cpdocpag_refier_C').disabled=true;
      $('cpdocpag_refier_A').disabled=true;
      $('cpdocpag_refier_N').disabled=true;
      $('cpdocpag_afeprc_S').disabled=true;
      $('cpdocpag_afeprc_R').disabled=true;
      $('cpdocpag_afeprc_N').disabled=true;
      $('cpdocpag_afecom_S').disabled=true;
      $('cpdocpag_afecom_R').disabled=true;
      $('cpdocpag_afecom_N').disabled=true;
      $('cpdocpag_afecau_S').disabled=true;
      $('cpdocpag_afecau_R').disabled=true;
      $('cpdocpag_afecau_N').disabled=true;
      $('cpdocpag_afepag_S').disabled=true;
      $('cpdocpag_afepag_R').disabled=true;
      $('cpdocpag_afepag_N').disabled=true;
      $('cpdocpag_afedis_S').disabled=true;
      $('cpdocpag_afedis_R').disabled=true;
      $('cpdocpag_afedis_N').disabled=true;

    }
  }

</script>