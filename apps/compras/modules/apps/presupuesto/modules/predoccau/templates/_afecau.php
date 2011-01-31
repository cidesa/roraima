<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccau->getAfecau()=="S"){
	echo radiobutton_tag('cpdoccau[afecau]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afecau]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afecau]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdoccau->getAfecau()=="R") {
	echo radiobutton_tag('cpdoccau[afecau]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afecau]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afecau]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdoccau[afecau]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afecau]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afecau]','N', true) .'  '. "No Afecta "."<br>";
}
?>