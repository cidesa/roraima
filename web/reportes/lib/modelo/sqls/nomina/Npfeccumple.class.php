<?php
require_once("../../lib/modelo/baseClases.class.php");
class Npfeccumple extends BaseClases {

  public function sqlp($ced1,$ced2,$mes1,$mes2,$dia1,$dia2)
    {
	    $sql= "SELECT CODEMP AS CEDULA, NOMEMP AS NOMBRE, TO_CHAR(FECNAC, 'DD/MM/YYYY') AS FECHA," .
	    		"EDAEMP AS EDAD, CAST(CODEMP AS INT) AS CEDORD " .
	    		"FROM NPHOJINT " .
	    		"WHERE CODEMP >= '".$ced1."' AND CODEMP <= '".$ced2."' " .
	    		"AND to_char(FECNAC,'MM')>= '$mes1' AND to_char(FECNAC,'MM')<= '$mes2'" .
	    		"AND to_char(FECNAC,'DD')>= '$dia1' AND to_char(FECNAC,'DD')<= '$dia2'".
				"AND STAEMP='A'" .
				"ORDER BY to_char(FECNAC,'MM'),to_char(FECNAC,'DD'),to_char(FECNAC,'YY'),CEDORD";
         //print '<pre>'; print $sql;exit;
	      return $this->select($sql);

    }


}
?>