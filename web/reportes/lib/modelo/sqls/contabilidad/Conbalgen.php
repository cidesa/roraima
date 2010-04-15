<?php
require_once ("../../lib/modelo/baseClases.class.php");

class Conbalcom extends BaseClases {

		public function SQLContaba_loniv1($valor) {
		$sql = "SELECT coalesce(coalesce(LENGTH(SUBSTR(FORCTA,1,$valor))-1, 0), 0) as LONIV1,
					FECINI as fecha_ini,
					FECCIE as fecha_cie,
					CODRES as cuenta_resultado
			   FROM
					CONTABA";

		return $this->select($sql);
	}


	public function SQLContaba() {
		$sql = "select fecini as fechainic, forcta as forcta from contaba";

		return $this->select($sql);
	}

	public function SQLContaba_nivel() {
		$sql = "SELECT coalesce(LENGTH(RTRIM(FORCTA)), 0) as nivel FROM contaba";
		return $this->select($sql);
	}

	public function SQLContaba_nivel2($valor) {
		$sql = "SELECT coalesce(coalesce(LENGTH(SUBSTR(FORCTA,1,'".$valor."'))-1, 0), 0) as nivel FROM contaba";
		return $this->select($sql);
	}

}
