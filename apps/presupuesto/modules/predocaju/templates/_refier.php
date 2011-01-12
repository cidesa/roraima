<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdocaju->getRefier()=="P"){
	echo radiobutton_tag('cpdocaju[refier]','P', true) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdocaju[refier]','C', false) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdocaju[refier]','A', false) .'  '. "Causado ";
	echo radiobutton_tag('cpdocaju[refier]','G', false) .'  '. "Pago "."<br>";
}else if ($cpdocaju->getRefier()=="C"){
	echo radiobutton_tag('cpdocaju[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdocaju[refier]','C', true) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdocaju[refier]','A', false) .'  '. "Causado ";
	echo radiobutton_tag('cpdocaju[refier]','G', false) .'  '. "Pago "."<br>";
}else if ($cpdocaju->getRefier()=="A"){
	echo radiobutton_tag('cpdocaju[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdocaju[refier]','C', false) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdocaju[refier]','A', true) .'  '. "Causado ";
	echo radiobutton_tag('cpdocaju[refier]','G', false) .'  '. "Pago "."<br>";
}else {
	echo radiobutton_tag('cpdocaju[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdocaju[refier]','C', false) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdocaju[refier]','A', false) .'  '. "Causado ";
	echo radiobutton_tag('cpdocaju[refier]','G', true) .'  '. "Pago "."<br>";
}
?>

<script language="JavaScript" type="text/javascript">
  var nuevo='<?php echo $cpdocaju->getId(); ?>';
  var etadef='<?php echo $cpdocaju->getEtadef(); ?>';
  if (nuevo!="")
  {
    $('cpdocaju_tipaju').readOnly=true;
    if (etadef=='C')
    {
      $('cpdocaju_nomext').readOnly=true;
      $('cpdocaju_nomabr').readOnly=true;
      $('cpdocaju_refier_P').disabled=true;
      $('cpdocaju_refier_C').disabled=true;
      $('cpdocaju_refier_A').disabled=true;
      $('cpdocaju_refier_G').disabled=true;
    }
  }

</script>
