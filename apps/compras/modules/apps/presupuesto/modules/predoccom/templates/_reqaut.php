<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccom->getReqaut()=="S"){
	echo radiobutton_tag('cpdoccom[reqaut]','S', true) .'  '. "Si ";
	echo radiobutton_tag('cpdoccom[reqaut]','N', false) .'  '. "No "."<br>";
}else{
	echo radiobutton_tag('cpdoccom[reqaut]','S', false) .'  '. "Si ";
	echo radiobutton_tag('cpdoccom[reqaut]','N', true) .'  '. "No "."<br>";
}
?>