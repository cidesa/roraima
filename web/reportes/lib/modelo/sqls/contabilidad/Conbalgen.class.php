<?php
require_once ("../../lib/modelo/baseClases.class.php");

class Conbalgen extends BaseClases {

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

	public function SQLP($periodo, $fecha_ini, $fecha_cie, $nivel, $codcta1, $codcta2, $comodin)
	{
		$sql="SELECT  A.ORDEN,
								A.TITULO,
								A.CUENTA,
								A.NOMBRE,
								A.DEBITO,
								A.CREDITO,
								ABS(A.SALDO) as SALDO,
								A.CARGABLE
						FROM
							(SELECT RTRIM(A.CODCTA) AS ORDEN,
									A.CODCTA AS TITULO,
									A.CODCTA AS CUENTA,
									B.DESCTA AS NOMBRE,
									A.TOTDEB AS DEBITO,
									A.TOTCRE AS CREDITO,
									 A.SALACT AS SALDO,
									B.CARGAB AS CARGABLE,'C'
								 FROM
									CONTABB1 A,
									CONTABB B
								 WHERE
									A.CODCTA=B.CODCTA AND
									A.PEREJE = ('".$periodo."') AND
									A.FECINI = ('".$fecha_ini."') AND
									A.FECCIE = ('".$fecha_cie."')
								UNION ALL
								SELECT RTRIM(A.CODCTA)||'T' AS ORDEN,'TOTAL' AS TITULO,
									A.CODCTA AS CUENTA,
									B.DESCTA AS NOMBRE,
									A.TOTDEB AS DEBITO,
									A.TOTCRE AS CREDITO,
									 A.SALACT AS SALDO,
									B.CARGAB AS CARGABLE,'C'
								 FROM
									CONTABB1 A,
									CONTABB B

								 WHERE A.CODCTA=B.CODCTA AND
									   A.PEREJE = ('".$periodo."') AND
									   A.FECINI = ('".$fecha_ini."') AND
									   A.FECCIE = ('".$fecha_cie."') AND
									   B.CARGAB<>'C') A,

								CONTABA B
						WHERE
								LENGTH(RTRIM(A.CUENTA))<= ('".$nivel."') AND
								RTRIM( A.CUENTA) >= RTRIM('".$codcta1."') AND
								RTRIM(A.CUENTA) <= RTRIM('".$codcta2."')  AND
								RTRIM(A.CUENTA) LIKE RTRIM('".$comodin."') AND
								((A.CARGABLE='C' AND A.SALDO <> 0 ) OR (A.CARGABLE<>'C')) AND
								( A.CUENTA LIKE (RTRIM(B.CODTESACT)||'%')  OR
								A.CUENTA LIKE (RTRIM(B.CODTESPAS)||'%') OR
								A.CUENTA LIKE (RTRIM(B.CODCTA)||'%') OR
								A.CUENTA LIKE (RTRIM(B.CODCTD)||'%') )
								ORDER BY A.ORDEN";

								H::printR($sql);exit;
		return $this->select($sql);
	}


	public function arrp_detalles($periodo, $fecha_ini, $fecha_cie, $nivel, $codcta1, $codcta2, $comodin)
	{
			$sql="SELECT A.ORDEN,
								A.TITULO,
								A.CUENTA,
								A.NOMBRE,
								A.DEBITO,
								A.CREDITO,
								ABS(A.SALDO) as SALDO,
								A.CARGABLE
						FROM
							(SELECT RTRIM(A.CODCTA) AS ORDEN,
									A.CODCTA AS TITULO,
									A.CODCTA AS CUENTA,
									B.DESCTA AS NOMBRE,
									A.TOTDEB AS DEBITO,
									A.TOTCRE AS CREDITO,
									 A.SALACT AS SALDO,
									B.CARGAB AS CARGABLE,'C'
								 FROM
									CONTABB1 A,
									CONTABB B
								 WHERE
									A.CODCTA=B.CODCTA AND
									A.PEREJE = ('".$this->periodo."') AND
									A.FECINI = ('".$this->fecha_ini."') AND
									A.FECCIE = ('".$this->fecha_cie."')
								UNION ALL
								SELECT RTRIM(A.CODCTA)||'T' AS ORDEN,'TOTAL' AS TITULO,
									A.CODCTA AS CUENTA,
									B.DESCTA AS NOMBRE,
									A.TOTDEB AS DEBITO,
									A.TOTCRE AS CREDITO,
									 A.SALACT AS SALDO,
									B.CARGAB AS CARGABLE,'C'
								 FROM
									CONTABB1 A,
									CONTABB B

								 WHERE A.CODCTA=B.CODCTA AND
									   A.PEREJE = ('".$this->periodo."') AND
									   A.FECINI = ('".$this->fecha_ini."') AND
									   A.FECCIE = ('".$this->fecha_cie."') AND
									   B.CARGAB<>'C') A,

								CONTABA B
						WHERE
								LENGTH(RTRIM(A.CUENTA))<= ('".$this->nivel."') AND
								RTRIM( A.CUENTA) >= RTRIM('".$this->codcta1."') AND
								RTRIM(A.CUENTA) <= RTRIM('".$this->codcta2."')  AND
								RTRIM(A.CUENTA) LIKE RTRIM('".$this->comodin."') AND
								((A.CARGABLE='C' AND A.SALDO <> 0 ) OR (A.CARGABLE<>'C')) AND
								( A.CUENTA LIKE (RTRIM(B.CODORD)||'%') )
								ORDER BY A.ORDEN";

			return $this->select($sql);
	}

	public function SQLContaba2()
	{
		$sql="SELECT
						CODTESPAS as CUENTA_PASIVOS,
				        CODCTA as CUENTA_CAPITAL,
						CODRESANT as CUENTA_RESULTADO
					FROM
						CONTABA
				   WHERE
				   		CODEMP= '001'";
		return $this->select($sql);
	}

	public function SQLContabb1_pasivo($periodo)
	{
		$sql="SELECT
				(A.SALACT) as PASIVO
			FROM
				CONTABB1 A,
			    CONTABA B
	   		WHERE
			 	RTRIM(A.CODCTA)=RTRIM(B.CODTESPAS) AND
			    A.PEREJE = ('".$periodo."') AND
				A.FECINI = B.FECINI AND
			    A.FECCIE = B.FECCIE";

		return $this->select($sql);
	}


	public function SQLContabb1_capital($periodo)
	{
		 $sql="SELECT
					A.SALACT as capital
			   FROM
			   		CONTABB1 A,
					CONTABA B
			   WHERE
			   		A.CODCTA=rpad(B.CODCTA,32,' ') AND
					A.PEREJE = ('".$periodo."') AND
					A.FECINI = B.FECINI AND
					A.FECCIE = B.FECCIE";

		return $this->select($sql);
	}

	public function SQLContabb1_ingreso($periodo)
	{
		$sql="SELECT A.SALACT as INGRESO
			 FROM
				CONTABB1 A,
				CONTABA B
			 WHERE
				TRIM(A.CODCTA)=TRIM(B.CODIND) AND
				A.PEREJE = ('".$periodo."') AND
				A.FECINI = B.FECINI AND
				A.FECCIE = B.FECCIE";

		return $this->select($sql);
	}

	public function SQLContabb1_egreso($periodo)
	{
		$sql="SELECT (A.SALACT) as EGRESO
			  FROM
				CONTABB1 A,
				CONTABA B
			  WHERE
				A.CODCTA=rpad(B.CODEGD,32,' ') AND
				A.PEREJE = ('".$periodo."') AND
				A.FECINI = B.FECINI AND
				A.FECCIE = B.FECCIE";

		return $this->select($sql);
	}

	public function SQLContabb1_resultado($periodo)
	{
		$sql="SELECT A.SALACT as resultado
			   FROM
				 CONTABB1 A,
				 CONTABA B
			   WHERE
					A.CODCTA=rpad(B.CODCTD,32,' ') AND
					A.PEREJE = ('".$periodo."') AND
					A.FECINI = B.FECINI AND
					A.FECCIE = B.FECCIE";

		return $this->select($sql);
	}

	public function SQLCuenta()
	{
		$sql="SELECT CODRES FROM CONTABA WHERE TRIM(CODEMP)='001'";

		return $this->select($sql);
	}
		public function SQLresultado($periodo,$ingreso,$egreso,$cuenta)
	{
		$sql="   UPDATE CONTABB1
			     SET SALACT = (ABS('".$ingreso."') - (ABS('".$egreso."')))*(-1)
			     WHERE RTRIM(CODCTA)=RTRIM('".$cuenta."') AND PEREJE='".$periodo."'";
		//print $sql;exit;
		return $this->actualizar($sql);

	}
		public function SQLactualizapadres($periodo,$ingreso,$egreso,$cuenta)
	{
		$auxcta=split("-",$cuenta);
		$saldo=abs(abs($ingreso)-abs($egreso));

			$sql="   UPDATE CONTABB1
			     SET SALACT = (abs(SALACT)+abs(".$saldo."))*-1
			     WHERE
			     RTRIM(CODCTA)=substr(RTRIM('".$cuenta."'),1,1) AND PEREJE='".$periodo."'
				 or
			     RTRIM(CODCTA)=substr(RTRIM('".$cuenta."'),1,3) AND PEREJE='".$periodo."'
				 or
			     RTRIM(CODCTA)=substr(RTRIM('".$cuenta."'),1,5) AND PEREJE='".$periodo."' ";

		return $this->actualizar($sql);

	}
		public function SQLreversoact($periodo,$ingreso,$egreso,$cuenta)
	{
		$auxcta=split("-",$cuenta);
		$saldo=abs(abs($ingreso)-abs($egreso));

			$sql="   UPDATE CONTABB1
			     SET SALACT = (abs(SALACT)-abs(".$saldo."))*-1
			     WHERE
			     RTRIM(CODCTA)=substr(RTRIM('".$cuenta."'),1,1) AND PEREJE='".$periodo."'
				 or
			     RTRIM(CODCTA)=substr(RTRIM('".$cuenta."'),1,3) AND PEREJE='".$periodo."'
				 or
			     RTRIM(CODCTA)=substr(RTRIM('".$cuenta."'),1,5) AND PEREJE='".$periodo."' ";

		return $this->actualizar($sql);

	}

}
