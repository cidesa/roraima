<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccom->getAfedis()=="S"){
	echo radiobutton_tag('cpdoccom[afedis]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afedis]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdoccom->getAfedis()=="R") {
	echo radiobutton_tag('cpdoccom[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afedis]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afedis]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdoccom[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afedis]','N', true) .'  '. "No Afecta "."<br>";
}
?>