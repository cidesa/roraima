<?php
require_once ("../../lib/modelo/baseClases.class.php");

class Conedores extends BaseClases {

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

	public function SQLP($status,$periodo, $fecha_ini, $fecha_cie, $nivel, $codcta1, $codcta2, $comodin)
	{
		if ($status=='S')
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
								LENGTH(RTRIM(A.CUENTA)) <= ('".$nivel."')  AND
								RTRIM(A.CUENTA) >= RTRIM('".$codcta1."') AND
								RTRIM(A.CUENTA) <= RTRIM('".$codcta2."')  AND
								RTRIM(A.CUENTA) LIKE RTRIM('".$comodin."') AND
								((A.CARGABLE='C' AND A.SALDO <> 0) OR A.CARGABLE<>'C') AND
								( A.CUENTA LIKE (RTRIM(B.CODIND)||'%')  OR
								A.CUENTA LIKE (RTRIM(B.CODEGD)||'%'))
						ORDER BY A.ORDEN";
		}
		else
		{
			$ingr="UPDATE CONTABB1
					SET SALPRGPER = ((TOTDEB) - (TOTCRE))
					WHERE CODCTA LIKE '5%' AND PEREJE='".$periodo."'";

			$egr="UPDATE CONTABB1
					SET SALPRGPER = ((TOTDEB) - (TOTCRE))
					WHERE CODCTA LIKE '6%' AND PEREJE='".$periodo."'";
			$this->actualizar($ingr);$this->actualizar($egr);

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
							A.SALPRGPER AS SALDO,
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
							A.SALPRGPER AS SALDO,
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
								LENGTH(RTRIM(A.CUENTA)) <= ('".$nivel."')  AND
								RTRIM(A.CUENTA) >= RTRIM('".$codcta1."') AND
								RTRIM(A.CUENTA) <= RTRIM('".$codcta2."')  AND
								RTRIM(A.CUENTA) LIKE RTRIM('".$comodin."') AND
								((A.CARGABLE='C' AND A.SALDO <> 0) OR A.CARGABLE<>'C') AND
								( A.CUENTA LIKE (RTRIM(B.CODIND)||'%')  OR
								A.CUENTA LIKE (RTRIM(B.CODEGD)||'%'))
						ORDER BY A.ORDEN";

		}
		//yH::PrintR($sql);exit;
		return $this->select($sql);
	}


	public function SQLContaba2()
	{
		$sql="SELECT
						CODTESPAS as CUENTA_PASIVOS,
				        CODCTA as CUENTA_CAPITAL,
						CODRESANT as CUENTA_RESULTADO
					FROM
						CONTABA";
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

}
