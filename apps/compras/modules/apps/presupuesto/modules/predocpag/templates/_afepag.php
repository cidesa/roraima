<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdocpag->getAfepag()=="S"){
	echo radiobutton_tag('cpdocpag[afepag]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afepag]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afepag]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdocpag->getAfecau()=="R") {
	echo radiobutton_tag('cpdocpag[afepag]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afepag]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afepag]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdocpag[afepag]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afepag]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afepag]','N', true) .'  '. "No Afecta "."<br>";
}
?>