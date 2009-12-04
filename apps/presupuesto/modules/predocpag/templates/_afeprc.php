<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdocpag->getAfeprc()=="S"){
	echo radiobutton_tag('cpdocpag[afeprc]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afeprc]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afeprc]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdocpag->getAfeprc()=="R") {
	echo radiobutton_tag('cpdocpag[afeprc]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afeprc]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afeprc]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdocpag[afeprc]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afeprc]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afeprc]','N', true) .'  '. "No Afecta "."<br>";
}
?>