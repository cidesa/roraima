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
	echo radiobutton_tag('cpdocaju[refier]','P', false) .'  '. "Pago "."<br>";
}else if ($cpdocaju->getRefier()=="C"){
	echo radiobutton_tag('cpdocaju[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdocaju[refier]','C', true) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdocaju[refier]','A', false) .'  '. "Causado ";
	echo radiobutton_tag('cpdocaju[refier]','P', false) .'  '. "Pago "."<br>";
}else if ($cpdocaju->getRefier()=="A"){
	echo radiobutton_tag('cpdocaju[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdocaju[refier]','C', false) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdocaju[refier]','A', true) .'  '. "Causado ";
	echo radiobutton_tag('cpdocaju[refier]','P', false) .'  '. "Pago "."<br>";
}else {
	echo radiobutton_tag('cpdocaju[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdocaju[refier]','C', false) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdocaju[refier]','A', false) .'  '. "Causado ";
	echo radiobutton_tag('cpdocaju[refier]','P', true) .'  '. "Pago "."<br>";
}
?>