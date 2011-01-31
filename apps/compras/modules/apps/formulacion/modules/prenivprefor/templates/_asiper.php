<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($fordefniv->getAsiper()=="S"){
	echo radiobutton_tag('fordefniv[asiper]','S', true) .'  '. "Si ";
	echo radiobutton_tag('fordefniv[asiper]','N', false) .'  '. "No "."<br>";
}else{
	echo radiobutton_tag('fordefniv[asiper]','S', false) .'  '. "Si ";
	echo radiobutton_tag('fordefniv[asiper]','N', true) .'  '. "No "."<br>";
}
?>