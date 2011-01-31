<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdocpag->getRefier()=="P"){
	echo radiobutton_tag('cpdocpag[refier]','P', true) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdocpag[refier]','C', false) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdocpag[refier]','A', false) .'  '. "Causado ";
	echo radiobutton_tag('cpdocpag[refier]','N', false) .'  '. "Ninguno "."<br>";
}else if ($cpdocpag->getRefier()=="C"){
	echo radiobutton_tag('cpdocpag[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdocpag[refier]','C', true) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdocpag[refier]','A', false) .'  '. "Causado ";
	echo radiobutton_tag('cpdocpag[refier]','N', false) .'  '. "Ninguno "."<br>";
}else if ($cpdocpag->getRefier()=="A"){
	echo radiobutton_tag('cpdocpag[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdocpag[refier]','C', false) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdocpag[refier]','A', true) .'  '. "Causado ";
	echo radiobutton_tag('cpdocpag[refier]','N', false) .'  '. "Ninguno "."<br>";
}else {
	echo radiobutton_tag('cpdocpag[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdocpag[refier]','C', false) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdocpag[refier]','A', false) .'  '. "Causado ";
	echo radiobutton_tag('cpdocpag[refier]','N', true) .'  '. "Ninguno "."<br>";
}
?>