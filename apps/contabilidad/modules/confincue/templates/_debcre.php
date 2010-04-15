<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($contabb->getDebcre()=="D"){
	echo radiobutton_tag('contabb[debcre]','D', true) .'  '. "Deudor ";
	echo radiobutton_tag('contabb[debcre]','C', false) .'  '. "Acreedor "."<br>";
}else{
	echo radiobutton_tag('contabb[debcre]','D', false) .'  '. "Deudor ";
	echo radiobutton_tag('contabb[debcre]','C', true) .'  '. "Acreedor "."<br>";
}
?>