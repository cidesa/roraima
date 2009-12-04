<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdocpag->getAfecau()=="S"){
	echo radiobutton_tag('cpdocpag[afecau]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afecau]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afecau]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdocpag->getAfecau()=="R") {
	echo radiobutton_tag('cpdocpag[afecau]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afecau]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afecau]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdocpag[afecau]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afecau]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afecau]','N', true) .'  '. "No Afecta "."<br>";
}
?>