<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccau->getAfeprc()=="S"){
	echo radiobutton_tag('cpdoccau[afeprc]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afeprc]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afeprc]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdoccau->getAfeprc()=="R") {
	echo radiobutton_tag('cpdoccau[afeprc]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afeprc]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afeprc]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdoccau[afeprc]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afeprc]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afeprc]','N', true) .'  '. "No Afecta "."<br>";
}
?>