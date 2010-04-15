<?php
/*
 * Created on 10/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($contabb->getCargab()=="C"){
	echo radiobutton_tag('contabb[cargab]','C', true, array('onClick'=> "$('ax_0_5').readOnly=false")) .'  '. "Si ";
	echo radiobutton_tag('contabb[cargab]','N', false, array('onClick'=> "$('ax_0_5').readOnly=true")) .'  '. "No "."<br>";
}else{
	echo radiobutton_tag('contabb[cargab]','C', false, array('onClick'=> "$('ax_0_5').readOnly=false")) .'  '. "Si ";
	echo radiobutton_tag('contabb[cargab]','N', true, array('onClick'=> "$('ax_0_5').readOnly=true")) .'  '. "No "."<br>";
}
?>