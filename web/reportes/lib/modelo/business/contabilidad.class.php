<?php
require_once("../../lib/modelo/baseClases.class.php");

class Contabilidad extends baseClases
{
 	public static function catalogo_numcom($objhtml)
	{
		$sql="select distinct a.codcta, b.descta from contabc1 a, contabb b where a.codcta=b.codcta and ( a.codcta like '%V_0%' and b.descta like '%V_1%') order by a.codcta";

		$catalogo = array(
		    $sql,
		    array('Comprobante','Descripcion'),
		    array($objhtml),
		    array('codcta'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_codcta($objhtml)
		{
			$sql="SELECT DISTINCT(codcta), descta FROM CONTABB where ( codcta like '%V_0%' and descta like '%V_1%') order by codcta";

			$catalogo = array(
			    $sql,
			    array('Cuenta Contable','Descripcion'),
			    array($objhtml),
			    array('codcta'),
			    100
			    );

		    return $catalogo;
		}


		public static function ActualizarSaldos($codigo_cta,$fecha_ini,$fecha_cie)
		{
		    $valor          = H::instr($this->forcta,'-',0,$this->auxnivel);
		    $arrp           = $this->SQLContaba_nivel2();
		    $arrp_saldo_ant = $this->SQLContabb_Saldo_ant($codigo_cta, $fecha_ini, $fecha_cie);
   		    $arrp_temp      = $this->SQLContabb12($codigo_cta, $fecha_ini, $fecha_cie);
			$periodo_ant    = '00';
exit('jesus');
			   	foreach ($arrp_temp as $arrp)
			   	{
				 echo   $this->actualizar("UPDATE CONTABB1
						SET SALACT = ('".$arrp["totdeb"]."')  + ('".$arrp_saldo_ant[0]["saldo_ant"]."') - ('".$arrp["totcre"]."')
					  WHERE CODCTA = ('".$arrp["codcta"]."') AND
							PEREJE = ('".$arrp["pereje"]."') AND
							FECINI = ('".$arrp["fecini"]."') AND
							FECCIE = ('".$arrp["feccie"]."')");
exit('ActualizarSaldos');
				   $periodo_ant    = str_pad(to_char(to_numer($periodo_ant)+1),2,'0',STR_PAD_LEFT);
				   $arrp_saldo_ant = $this->SQLContabb1_Saldo_ant($codigo_cta, $fecha_ini, $fecha_cie, $periodo_ant);
				}
		}

		public function SQLContabb1_Saldo_ant($codigo_cta, $fecha_ini, $fecha_cie, $periodo_ant)
		{
			$sql = "SELECT SALACT as SALDO_ANT
					 FROM CONTABB1
					 WHERE CODCTA = rpad($codigo_cta,32,' ') AND
							FECINI = ($fec_ini) AND
							FECCIE = ($fec_cie) AND
							PEREJE = $periodo_ant";

			return $this->select($sql);
		}

	  public static function SQLContabb12($codigo_cta, $fecha_ini, $fecha_cie)
	  {
		$sql="SELECT *
				 FROM CONTABB1
				 WHERE CODCTA = rpad($codigo_cta,32,' ')
						 AND FECINI = ($fecha_ini')
						 AND FECCIE = ($fecha_cie')
				 ORDER BY PEREJE";

		return $this->select($sql);
	  }


	  public static function SQLContabb_Saldo_ant($codigo_cta, $fecha_ini, $fecha_cie)
	  {
			$sql="SELECT
				    SALANT as SALDO_ANT
			   FROM CONTABB
			   WHERE CODCTA = rpad(($codigo_cta),32,' ') AND
					FECINI = ($fecha_ini) AND
					FECCIE = ($fecha_cie)";

		return $this->select($sql);
	  }

	  public static function SQLContaba_nivel2($valor)
	  {
		$sql="SELECT coalesce(coalesce(LENGTH(SUBSTR(FORCTA,1,'".$valor."'))-1, 0), 0) as nivel FROM contaba";
		return $this->select($sql);
	  }


		public function ReactualizarSaldosAnteriores()
		{
			$temp=$this->select("SELECT
							   SUBSTR(CODCTA,1,17) AS CUENTA,
							   SUM(COALESCE(SALANT,0)) AS SALDO
						FROM
							CONTABB
						WHERE
							upper(CARGAB)='C'
						GROUP BY SUBSTR(CODCTA,1,17)");

					foreach($temp as $arr){
						$this->actualizar("update contabb set salant=coalesce('".$arr["saldo"]."',0) where codcta=rpad(coalesce('".$arr["cuenta"]."',32,' '))");
					 }
				//--------------

			   $temp=$this->select("SELECT SUBSTR(CODCTA,1,13) as CUENTA,SUM(COALESCE(SALANT,0)) as SALDO FROM CONTABB WHERE upper(CARGAB)='C' GROUP BY SUBSTR(CODCTA,1,13)");
					foreach($temp as $arr){
						$this->bd->actualizar("update contabb set salant=coalesce('".$arr["saldo"]."',0) where codcta=rpad(coalesce('".$arr["cuenta"]."',32,' '))");
					 }
				//--------------

			   $temp=$this->select("SELECT SUBSTR(CODCTA,1,10) as CUENTA,SUM(COALESCE(SALANT,0)) as SALDO FROM CONTABB WHERE upper(CARGAB)='C' GROUP BY SUBSTR(CODCTA,1,10)");
					foreach($temp as $arr){
						$this->bd->actualizar("update contabb set salant=coalesce('".$arr["saldo"]."',0) where codcta=rpad(coalesce('".$arr["cuenta"]."',32,' '))");
					}
				//--------------

			   $temp=$this->select("SELECT SUBSTR(CODCTA,1,07) as CUENTA,SUM(COALESCE(SALANT,0)) as SALDO FROM CONTABB WHERE upper(CARGAB)='C' GROUP BY SUBSTR(CODCTA,1,07)");
					foreach($temp as $arr){
						$this->bd->actualizar("update contabb set salant=coalesce('".$arr["saldo"]."',0) where codcta=rpad(coalesce('".$arr["cuenta"]."',32,' '))");
					}
				//--------------

			   $temp=$this->select("SELECT SUBSTR(CODCTA,1,04) as CUENTA,SUM(COALESCE(SALANT,0)) as SALDO FROM CONTABB WHERE upper(CARGAB)='C' GROUP BY SUBSTR(CODCTA,1,04)");
					foreach($temp as $arr){
						$this->bd->actualizar("update contabb set salant=coalesce('".$arr["saldo"]."',0) where codcta=rpad(coalesce('".$arr["cuenta"]."',32,' '))");
					}
				//--------------

			   $temp=$this->select("SELECT SUBSTR(CODCTA,1,01) as CUENTA,SUM(COALESCE(SALANT,0)) as SALDO FROM CONTABB WHERE upper(CARGAB)='C' GROUP BY SUBSTR(CODCTA,1,01)");
					foreach($temp as $arr){
						$this->bd->actualizar("update contabb set salant=coalesce('".$arr["saldo"]."',0) where codcta=rpad(coalesce('".$arr->fields["cuenta"]."',32,' '))");
					}
				//--------------
		} //Fin Return


		function ActualizarMaestro(){
			 $temp=$this->select("select substr(codcta,1,17) as codcta,
									 RTRIM(to_char(a.feccom,'MM')) as mes,
									 sum(case when a.debcre='D' then a.monasi else 0 end) AS DEB,
									 sum(case when a.debcre='C' then a.monasi else 0 end) as CRE
							  from
							  		contabc1 a,
									contabc b
							where
									a.numcom=b.numcom and
									a.feccom = b.feccom and
									b.stacom='A'
							group by substr(codcta,1,17),RTRIM(to_char(a.feccom,'MM'))");

			foreach($temp as $arr){
				$this->bd->actualizar("update contabb1 set totdeb=COALESCE('".$arr["deb"]."',0),totcre=COALESCE('".$arr["cre"]."',0) where codcta=rpad('".$arr["codcta"]."',32,' ') and pereje='".$arr["mes"]."'");
			}

				//--------------
			$temp=$this->select("select substr(codcta,1,13) as codcta, RTRIM(to_char(a.feccom,'MM')) as mes,sum(case when a.debcre='D' then a.monasi else 0 end) AS DEB,sum(case when a.debcre='C' then a.monasi else 0 end) as CRE from contabc1 a, contabc b where a.feccom = b.feccom and b.stacom='A' group by substr(codcta,1,13),RTRIM(to_char(a.feccom,'MM'))");
			foreach($temp as $arr){
				$this->bd->actualizar("update contabb1 set totdeb=COALESCE('".$arr["deb"]."',0),totcre=COALESCE('".$arr["cre"]."',0) where codcta=rpad('".$arr["codcta"]."',32,' ') and pereje='".$arr["mes"]."'");
			}

				//--------------
			$temp=$this->select("select substr(codcta,1,10) as codcta, RTRIM(to_char(a.feccom,'MM')) as mes,sum(case when a.debcre='D' then a.monasi else 0 end) AS DEB,sum(case when a.debcre='C' then a.monasi else 0 end) as CRE from contabc1 a, contabc b where a.feccom = b.feccom and b.stacom='A' group by substr(codcta,1,10),RTRIM(to_char(a.feccom,'MM'))");
			foreach($temp as $arr){
				$this->bd->actualizar("update contabb1 set totdeb=COALESCE('".$arr["deb"]."',0),totcre=COALESCE('".$$arr["cre"]."',0) where codcta=rpad('".$arr["codcta"]."',32,' ') and pereje='".$arr["mes"]."'");
			}

				//--------------
			$temp=$this->select("select substr(codcta,1,7) as codcta, RTRIM(to_char(a.feccom,'MM')) as mes,sum(case when a.debcre='D' then a.monasi else 0 end) AS DEB,sum(case when a.debcre='C' then a.monasi else 0 end) as CRE from contabc1 a, contabc b where a.feccom = b.feccom and b.stacom='A' group by substr(codcta,1,7),RTRIM(to_char(a.feccom,'MM'))");
			foreach($temp as $arr){
				$this->bd->actualizar("update contabb1 set totdeb=COALESCE('".$arr["deb"]."',0),totcre=COALESCE('".$arr["cre"]."',0) where codcta=rpad('".$arr["codcta"]."',32,' ') and pereje='".$arr["mes"]."'");
			}

				//--------------
			$temp=$this->select("select substr(codcta,1,4) as codcta, RTRIM(to_char(a.feccom,'MM')) as mes,sum(case when a.debcre='D' then a.monasi else 0 end) AS DEB,sum(case when a.debcre='C' then a.monasi else 0 end) as CRE from contabc1 a, contabc b where a.feccom = b.feccom and b.stacom='A' group by substr(codcta,1,4),RTRIM(to_char(a.feccom,'MM'))");
			foreach($temp as $arr){
				$this->bd->actualizar("update contabb1 set totdeb=COALESCE('".$arr["deb"]."',0),totcre=COALESCE('".$arr["cre"]."',0) where codcta=rpad('".$arr["codcta"]."',32,' ') and pereje='".$arr["mes"]."'");
			}

				//--------------
			$temp=$this->select("select substr(codcta,1,1) as codcta, RTRIM(to_char(a.feccom,'MM')) as mes,sum(case when a.debcre='D' then a.monasi else 0 end) AS DEB,sum(case when a.debcre='C' then a.monasi else 0 end) as CRE from contabc1 a, contabc b where a.feccom = b.feccom and b.stacom='A' group by substr(codcta,1,1),RTRIM(to_char(a.feccom,'MM'))");
			foreach($temp as $arr){
				$this->bd->actualizar("update contabb1 set totdeb=COALESCE('".$arr["deb"]."',0),totcre=COALESCE('".$arr["cre"]."',0) where codcta=rpad('".$arr["codcta"]."',32,' ') and pereje='".$arr["mes"]."'");
			}

			//cursor cuentas is (select * from contabb);
			$this->actualizar("update contabb1 set totdeb=0,totcre=0,salact=0");

			$temp=$this->select("select * from contabb");
			foreach($temp as $arr)
			{
				  $this->ActualizarSaldos($arr["codcta"],$arr["fecini"],$arr["feccie"]);
			}
		} //Return
}