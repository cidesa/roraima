<?php
/*
 * Created on 25/07/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($fatippag->getGenmov()=="S"){
	echo radiobutton_tag('fatippag[genmov]','S', true) .'  '. "Si ";
	echo radiobutton_tag('fatippag[genmov]','N', false) .'  '. "No ";
}
else  {
	echo radiobutton_tag('fatippag[genmov]','S', false) .'  '. "Si ";
	echo radiobutton_tag('fatippag[genmov]','N', true) .'  '. "No ";
}

?>