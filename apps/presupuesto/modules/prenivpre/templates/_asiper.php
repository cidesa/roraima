<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($cpdefniv->getAsiper()=="S"){
	echo radiobutton_tag('cpdefniv[asiper]','S', true) .'  '. "Si ";
	echo radiobutton_tag('cpdefniv[asiper]','N', false) .'  '. "No "."<br>";
}else{
	echo radiobutton_tag('cpdefniv[asiper]','S', false) .'  '. "Si ";
	echo radiobutton_tag('cpdefniv[asiper]','N', true) .'  '. "No "."<br>";
}
?>