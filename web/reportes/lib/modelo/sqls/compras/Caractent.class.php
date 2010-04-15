<?php
require_once("../../lib/modelo/baseClases.class.php");


class Caractent extends baseClases {

    function SQLp() {
    	$sql="";

    	return $this->select($sql);
    }
}
?>