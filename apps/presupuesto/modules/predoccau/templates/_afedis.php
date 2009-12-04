<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccau->getAfedis()=="S"){
	echo radiobutton_tag('cpdoccau[afedis]','S', true) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afedis]','N', false) .'  '. "No Afecta "."<br>";
}else if ($cpdoccau->getAfedis()=="R") {
	echo radiobutton_tag('cpdoccau[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afedis]','R', true) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afedis]','N', false) .'  '. "No Afecta "."<br>";
} else {
	echo radiobutton_tag('cpdoccau[afedis]','S', false) .'  '. "Suma ";
	echo radiobutton_tag('cpdoccau[afedis]','R', false) .'  '. "Resta ";
	echo radiobutton_tag('cpdoccau[afedis]','N', true) .'  '. "No Afecta "."<br>";
}
?>