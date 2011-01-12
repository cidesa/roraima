<?php
/*
 * Created on 25/07/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($atciudadano->getAyusolant()=="S"){
	echo radiobutton_tag('atciudadano[ayusolant]','S', true) .'  '. "Si ";
	echo radiobutton_tag('atciudadano[ayusolant]','N', false) .'  '. "No "."<br>";
}else{
	echo radiobutton_tag('atciudadano[ayusolant]','S', false) .'  '. "Si ";
	echo radiobutton_tag('atciudadano[ayusolant]','N', true) .'  '. "No "."<br>";
}
?>