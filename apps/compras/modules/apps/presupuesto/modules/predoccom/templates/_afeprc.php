<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccom->getAfeprc()=="S"){
	echo radiobutton_tag('cpdoccom[afeprc]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afeprc]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afeprc]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdoccom->getAfeprc()=="R") {
	echo radiobutton_tag('cpdoccom[afeprc]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afeprc]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afeprc]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdoccom[afeprc]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afeprc]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afeprc]','N', true) .'  '. "No Afecta "."<br>";
}
?>