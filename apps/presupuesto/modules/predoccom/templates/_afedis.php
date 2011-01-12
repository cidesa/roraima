<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccom->getAfedis()=="S"){
	echo radiobutton_tag('cpdoccom[afedis]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afedis]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdoccom->getAfedis()=="R") {
	echo radiobutton_tag('cpdoccom[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afedis]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afedis]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdoccom[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afedis]','N', true) .'  '. "No Afecta "."<br>";
}
?>

<script language="JavaScript" type="text/javascript">
  var nuevo='<?php echo $cpdoccom->getId(); ?>';
  var etadef='<?php echo $cpdoccom->getEtadef(); ?>';
  if (nuevo!="")
  {
    $('cpdoccom_tipcom').readOnly=true;
    if (etadef=='C')
    {
      $('cpdoccom_nomext').readOnly=true;
      $('cpdoccom_nomabr').readOnly=true;
      $('cpdoccom_refprc_S').disabled=true;
      $('cpdoccom_refprc_N').disabled=true;
      $('cpdoccom_reqaut_S').disabled=true;
      $('cpdoccom_reqaut_N').disabled=true;
      $('cpdoccom_afeprc_S').disabled=true;
      $('cpdoccom_afeprc_R').disabled=true;
      $('cpdoccom_afeprc_N').disabled=true;
      $('cpdoccom_afecom_S').disabled=true;
      $('cpdoccom_afecom_R').disabled=true;
      $('cpdoccom_afecom_N').disabled=true;
      $('cpdoccom_afedis_S').disabled=true;
      $('cpdoccom_afedis_R').disabled=true;
      $('cpdoccom_afedis_N').disabled=true;

    }
  }

</script>
