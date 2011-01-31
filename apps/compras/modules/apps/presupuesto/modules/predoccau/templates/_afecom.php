<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccau->getAfecom()=="S"){
	echo radiobutton_tag('cpdoccau[afecom]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afecom]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afecom]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdoccau->getAfecom()=="R") {
	echo radiobutton_tag('cpdoccau[afecom]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afecom]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afecom]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdoccau[afecom]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afecom]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afecom]','N', true) .'  '. "No Afecta "."<br>";
}
?>