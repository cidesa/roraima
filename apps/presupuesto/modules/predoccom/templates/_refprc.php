<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdoccom->getRefprc()=="S"){
	echo radiobutton_tag('cpdoccom[refprc]','S', true) .'  '. "Si ";
	echo radiobutton_tag('cpdoccom[refprc]','N', false) .'  '. "No "."<br>";
}else{
	echo radiobutton_tag('cpdoccom[refprc]','S', false) .'  '. "Si ";
	echo radiobutton_tag('cpdoccom[refprc]','N', true) .'  '. "No "."<br>";
}
?>