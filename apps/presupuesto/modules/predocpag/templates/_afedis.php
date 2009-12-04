<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdocpag->getAfedis()=="S"){
	echo radiobutton_tag('cpdocpag[afedis]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afedis]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdocpag->getAfedis()=="R") {
	echo radiobutton_tag('cpdocpag[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afedis]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afedis]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdocpag[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdocpag[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdocpag[afedis]','N', true) .'  '. "No Afecta "."<br>";
}
?>