<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccau->getRefier()=="P"){
	echo radiobutton_tag('cpdoccau[refier]','P', true) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdoccau[refier]','C', false) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdoccau[refier]','N', false) .'  '. "Ninguno "."<br>";
}else if ($cpdoccau->getRefier()=="C"){
	echo radiobutton_tag('cpdoccau[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdoccau[refier]','C', true) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdoccau[refier]','N', false) .'  '. "Ninguno "."<br>";
}else if ($cpdoccau->getRefier()=="A"){
	echo radiobutton_tag('cpdoccau[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdoccau[refier]','C', false) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdoccau[refier]','N', false) .'  '. "Ninguno "."<br>";
}else {
	echo radiobutton_tag('cpdoccau[refier]','P', false) .'  '. "Precompromiso ";
	echo radiobutton_tag('cpdoccau[refier]','C', false) .'  '. "Compromiso ";
	echo radiobutton_tag('cpdoccau[refier]','N', true) .'  '. "Ninguno "."<br>";
}
?>