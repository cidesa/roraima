<?php
/*
 * Created on 25/07/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($litipsol->getTipSol()=="S"){
	echo radiobutton_tag('litipsol[tipsol]','S', true) .'  '. "Servicio ";
	echo radiobutton_tag('litipsol[tipsol]','O', false) .'  '. "Obra "."<br>";
	echo radiobutton_tag('litipsol[tipsol]','B', false) .'  '. "Bien "."<br>";
}
else if ($litipsol->getTipSol()=="O") {
	echo radiobutton_tag('litipsol[tipsol]','S', false) .'  '. "Servicio ";
	echo radiobutton_tag('litipsol[tipsol]','O', true) .'  '. "Obra "."<br>";
	echo radiobutton_tag('litipsol[tipsol]','B', false) .'  '. "Bien "."<br>";
}
else{
	echo radiobutton_tag('litipsol[tipsol]','S', false) .'  '. "Servicio ";
	echo radiobutton_tag('litipsol[tipsol]','O', false) .'  '. "Obra "."<br>";
	echo radiobutton_tag('litipsol[tipsol]','B', true) .'  '. "Bien "."<br>";
}
?>