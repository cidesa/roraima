<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdocpag->getAfecom()=="S"){
	echo radiobutton_tag('cpdocpag[afecom]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afecom]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afecom]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdocpag->getAfecom()=="R") {
	echo radiobutton_tag('cpdocpag[afecom]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afecom]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afecom]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdocpag[afecom]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afecom]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afecom]','N', true) .'  '. "No Afecta "."<br>";
}
?>