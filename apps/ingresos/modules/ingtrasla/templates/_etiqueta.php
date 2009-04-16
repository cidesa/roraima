
<h3 align="center"><?php
if ($citrasla->getId()!='' and $citrasla->getStatra()=='N'){
	$fec=$citrasla->getFecanu();
	$cadena=$etiqueta=$citrasla->getEtiqueta()." el ".substr($fec,8,2)."/".substr($fec,5,2)."/".substr($fec,0,4);
    echo "<font color=\"#CC0000\">".$cadena."</font>";}
?>
</h3>
