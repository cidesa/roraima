<?php

require_once("../../lib/modelo/baseClases.class.php");

class Tsrrelret extends baseClases {

    function SQLp($fechades,$fechahas,$ordendes,$ordenhas,$facdes,$fachas,$cedrifdes,$cedrifhas) {
		$sql="select * from opordpag";

		return $this->select($sql);
    }

}
?>