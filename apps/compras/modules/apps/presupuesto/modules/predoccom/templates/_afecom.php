<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccom->getAfecom()=="S"){
	echo radiobutton_tag('cpdoccom[afecom]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afecom]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afecom]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdoccom->getAfecom()=="R") {
	echo radiobutton_tag('cpdoccom[afecom]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afecom]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afecom]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdoccom[afecom]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccom[afecom]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccom[afecom]','N', true) .'  '. "No Afecta "."<br>";
}
?>