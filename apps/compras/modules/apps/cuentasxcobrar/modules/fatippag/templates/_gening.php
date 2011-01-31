<?php
/*
 * Created on 25/07/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($fatippag->getGening()=="S"){
	echo radiobutton_tag('fatippag[gening]','S', true) .'  '. "Si ";
	echo radiobutton_tag('fatippag[gening]','N', false) .'  '. "No ";
}
else  {
	echo radiobutton_tag('fatippag[gening]','S', false) .'  '. "Si ";
	echo radiobutton_tag('fatippag[gening]','N', true) .'  '. "No ";
}

?>