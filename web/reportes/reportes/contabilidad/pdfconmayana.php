<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codctades;
		var $codctahas;
		var $feccom1;
		var $feccom2;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codctades=$_POST["codctades"];
			$this->codctahas=$_POST["codctahas"];
			$this->feccom1=$_POST["feccom1"];
			$this->feccom2=$_POST["feccom2"];
			$this->estado=$_POST["estado"];
			$this->estado=strtoupper($_POST["estado"]);

			if (strtoupper($this->estado)=="T")
			{
			    $this->sql="SELECT
							A.CODCTA as codcta,
							A.DESCTA as descta,
							A.DEBCRE as DEBITOCREDITO,
							C.CODCTA as NROCTA,
							to_char(C.FECCOM,'dd/mm/yyyy') as feccom,
							C.NUMCOM as numcom,
							C.REFASI as refasi,
							substr(B.DESCOM,1,80) as descom,
							C.DEBCRE as debcre,
							(CASE WHEN C.DEBCRE='D' THEN C.MONASI ELSE 0 END) as DEBITOS,
							(CASE WHEN C.DEBCRE='C' THEN C.MONASI ELSE 0 END) as CREDITOS
						FROM CONTABB A,CONTABC B,CONTABC1 C
						WHERE
							A.CODCTA = C.CODCTA AND
							(A.CODCTA) >= ('".$this->codctades."') AND
        					(A.CODCTA) <= ('".$this->codctahas."') AND
        					A.CARGAB = 'C' AND
							B.NUMCOM = C.NUMCOM AND
        					B.FECCOM = C.FECCOM AND
        					C.FECCOM >= to_date('".$this->feccom1."','dd/mm/yyyy') AND
        					C.FECCOM <= to_date('".$this->feccom2."','dd/mm/yyyy') AND
        					B.STACOM <> 'N' AND
        					B.STACOM <> 'R'
						ORDER BY A.CODCTA,C.CODCTA,C.FECCOM,C.DEBCRE ,C.NUMCOM";//H::PrintR($this->sql);exit;
			}
			else
				{
					$this->sql="SELECT
							A.CODCTA as codcta,
							A.DESCTA as descta,
							A.DEBCRE as DEBITOCREDITO,
							C.CODCTA as NROCTA,
							to_char(C.FECCOM,'dd/mm/yyyy') as feccom,
							C.NUMCOM as numcom,
							C.REFASI as refasi,
							substr(B.DESCOM,1,80) as descom,
							C.DEBCRE as debcre,
							B.STACOM as stacom,
							(CASE WHEN C.DEBCRE='D' THEN C.MONASI ELSE 0 END) as DEBITOS,
							(CASE WHEN C.DEBCRE='C' THEN C.MONASI ELSE 0 END) as CREDITOS
						FROM CONTABB A,CONTABC B,CONTABC1 C
						WHERE
							A.CODCTA = C.CODCTA AND
							(A.CODCTA) >= ('".$this->codctades."') AND
        					(A.CODCTA) <= ('".$this->codctahas."') AND
        					A.CARGAB = 'C' AND
							B.NUMCOM = C.NUMCOM AND
        					B.FECCOM = C.FECCOM AND
        					C.FECCOM >= to_date('".$this->feccom1."','dd/mm/yyyy') AND
        					C.FECCOM <= to_date('".$this->feccom2."','dd/mm/yyyy') AND
        					B.STACOM <> 'N' AND
        					B.STACOM <> 'R' AND
							(b.stacom='".$this->estado."')
						ORDER BY A.CODCTA,C.CODCTA,C.FECCOM,C.DEBCRE ,C.NUMCOM";
				}


		//print "<pre>".$this->sql;exit;
			$this->cab=new cabecera();

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s","s");
			$this->setFont("Arial","",9);
			$this->cell(30,5,'Desde: '.$this->feccom1.' Hasta: '.$this->feccom2.'                                                                                                                                    Expresado en Bolivares');
			$this->ln();
			$this->setFont("Arial","B",9);
		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->sql);
			$ref="";
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$total1=0;
			$total2=0;
			$total3=0;
			$x=0;
			$y=0;
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["codcta"];
				 $this->setFont("Arial","B",8);
				 $acunSaldoActual=0;
				 $this->cell(50,10,'Código Cuenta: '.$tb2->fields["codcta"]);
				 $this->cell(50,10,' Descripción Cuenta: '.$tb2->fields["descta"]);
				 $this->ln(8);
				 $this->line(10,$this->getY(),270,$this->getY());
				 $this->ln(2);
				 $this->cell(20,5,'Fecha');
				 $this->cell(30,5,'Numero');
				 $this->cell(20,5,'Referencia');

				 $this->cell(100,5,'Descripción del Asiento');
				 $this->cell(30,5,'Debitos',0,0,'R');
				 $this->cell(30,5,'Creditos',0,0,'R');
				 $this->cell(30,5,'Saldo Actual',0,0,'R');
				 $this->ln(4);
				 $this->line(10,$this->getY(),270,$this->getY());
				 $rs=$this->bd->select("SELECT SALANT as salant FROM CONTABB WHERE CODCTA=('".$tb2->fields["codcta"]."')");
				 if(!$rs->EOF)
				 {
				 	$saldoant=$rs->fields["salant"];
				 }
				 $res=$this->bd->select("SELECT 	sum((CASE WHEN C.DEBCRE='D' THEN C.MONASI ELSE 0 END)) as debitoant,
													sum((CASE WHEN C.DEBCRE='C' THEN C.MONASI ELSE 0 END)) as creditoant
											FROM 	CONTABB A,CONTABC B,CONTABC1 C
											WHERE 	A.CODCTA = C.CODCTA AND
												(A.CODCTA) = ('".$tb->fields["codcta"]."') AND
												A.CARGAB = 'C' AND
												B.NUMCOM = C.NUMCOM AND
												B.FECCOM = C.FECCOM AND
												C.FECCOM < to_date('".$this->feccom1."','dd/mm/yyyy') AND
												B.STACOM <> 'N' AND B.STACOM <> 'R' AND (b.stacom='A')");

				 if(!$res->EOF)
				 {
				 	$debitoanterior=$res->fields["debitoant"];
					$creditoanterior=$res->fields["creditoant"];
				 }
				 $saldoAnterior=($saldoant+$debitoanterior)-$creditoanterior;
				 $saldoAntes=($saldoAnterior);
				 /*if($tb2->fields["debcre"]=='D')
				 {
				 	$saldoAntes=($saldoAnterior);
				 }
				 elseif($saldoAnterior < 0)
				 {
				 	$saldoAntes=($saldoAnterior*(-1));
				 }
				 else
				 {
				 	$saldoAntes=($saldoAnterior);
				 }*/
				 $this->ln(2);
				 $this->cell(20,5,'');
				 $this->cell(35,5,'');
				 $this->cell(105,5,'');
				 $this->cell(30,5,'');
				 $this->cell(30,5,'Saldo Anterior... ');
				 $this->cell(30,5,number_format($saldoAntes,2,',','.'),0,0,'R');
				  $acunSaldoActual=$saldoAntes;
				 $this->ln(4);
			}
			while(!$tb->EOF)
			{
				if($tb->fields["codcta"]!=$ref)
				{
				 $this->setFont("Arial","B",8);
				  //Totales
					$this->ln(4);
					$this->line(10,$this->getY(),270,$this->getY());
					$this->ln(3);
					$this->cell(20,5,'Totales Cuenta: ');
					$this->cell(35,5,'');
					$this->cell(105,5,'');
					$this->cell(30,5,number_format($acum1,2,',','.'),0,0,'R');
					$this->cell(30,5,number_format($acum2,2,',','.'),0,0,'R');
					$this->cell(30,5,number_format($acunSaldoActual,2,',','.'),0,0,'R');

					$this->ln(4);
					$this->line(10,$this->getY(),270,$this->getY());
					$total1=$total1+$acum1;
					$total2=$total2+$acum2;
					$total3=$total3+$acunSaldoActual;
					$acum1=0;
					$acum2=0;
				    $acunSaldoActual=0;
				  ////
				 $this->cell(50,10,'Código Cuenta: '.$tb->fields["codcta"]);
				 $this->cell(50,10,' Descripción Cuenta: '.$tb->fields["descta"]);
				 $this->ln(8);
				 $this->line(10,$this->getY(),270,$this->getY());
				 $this->ln(2);
				 $this->cell(20,5,'Fecha');
				 $this->cell(30,5,'Numero');
				 $this->cell(20,5,'Referencia');

				 $this->cell(105,5,'Descripción del Asiento');
				 $this->cell(30,5,'Debitos',0,0,'R');
				 $this->cell(30,5,'Creditos',0,0,'R');
				 $this->cell(30,5,'Saldo Actual',0,0,'R');
				 //$this->cell(20,5,$this->getY().' -- '.$this->getX());
				 $this->ln(4);
				 $this->line(10,$this->getY(),270,$this->getY());
				 $rs=$this->bd->select("SELECT SALANT as salant FROM CONTABB WHERE CODCTA=('".$tb->fields["codcta"]."')");
				 if(!$rs->EOF)
				 {
				 	$saldoant=$rs->fields["salant"];
				 }
				  $res=$this->bd->select("SELECT 	sum((CASE WHEN C.DEBCRE='D' THEN C.MONASI ELSE 0 END)) as debitoant,
													sum((CASE WHEN C.DEBCRE='C' THEN C.MONASI ELSE 0 END)) as creditoant
											FROM 	CONTABB A,CONTABC B,CONTABC1 C
											WHERE 	A.CODCTA = C.CODCTA AND
												(A.CODCTA) = ('".$tb->fields["codcta"]."') AND
												A.CARGAB = 'C' AND
												B.NUMCOM = C.NUMCOM AND
												B.FECCOM = C.FECCOM AND
												C.FECCOM < to_date('".$this->feccom1."','dd/mm/yyyy') AND
												B.STACOM <> 'N' AND B.STACOM <> 'R' AND (b.stacom='A')");

				 if(!$res->EOF)
				 {
				 	$debitoanterior=$res->fields["debitoant"];
					$creditoanterior=$res->fields["creditoant"];
				 }
				 $saldoAnterior=($saldoant+$debitoanterior)-$creditoanterior;
				 $saldoAntes=($saldoAnterior);
				 /*if($tb->fields["debcre"]=='D')
				 {
				 	$saldoAntes=($saldoAnterior);
				 }
				 else if($saldoAnterior < 0)
				 {
				 	$saldoAntes=($saldoAnterior*(-1));
				 }
				 else
				 {
				 	$saldoAntes=($saldoAnterior);
				 }*/
				 $this->ln(2);
				 $this->cell(20,5,'');
				 $this->cell(35,5,'');
				 $this->cell(105,5,'');
				 $this->cell(30,5,'');
				 $this->cell(30,5,'Saldo Anterior... ');
				 $this->cell(30,5,number_format($saldoAntes,2,',','.'),0,0,'R');

				  $acunSaldoActual=$saldoAntes;
				 $this->ln(4);
		        }
				$ref=$tb->fields["codcta"];
				$this->setFont("Arial","",8);
				//Detalle
				 $this->cell(20,5,$tb->fields["feccom"]);
				 $this->cell(30,5,$tb->fields["numcom"]);
				 $this->cell(20,5,$tb->fields["refasi"]);
				 $this->setFont("Arial","",6);
				 $this->cell(105,5,$tb->fields["descom"]);
				 $this->setFont("Arial","",8);
				 $this->cell(30,5,number_format($tb->fields["debitos"],2,',','.'),0,0,'R');
				 $this->cell(30,5,number_format($tb->fields["creditos"],2,',','.'),0,0,'R');
				 $acunSaldoActual=($acunSaldoActual+$tb->fields["debitos"])-$tb->fields["creditos"];

			/*	 if($tb->fields["debcre"]=='D')
				 {
				 	$acunSaldoActual=($acunSaldoActual);
				 }
				 elseif($acunSaldoActual < 0)
				 {
				 	$acunSaldoActual=($acunSaldoActual*(-1));
				 }
				 else
				 {
				 	$acunSaldoActual=($acunSaldoActual);
				 }*/
				 $this->cell(30,5,number_format($acunSaldoActual,2,',','.'),0,0,'R');
			// 	print $acunSaldoActual;
				 $acum1=$acum1+$tb->fields["debitos"];
				 $acum2=$acum2+$tb->fields["creditos"];
				 //$acum3=$acum3+$acunSaldoActual;
			     $this->ln(3);
				$tb->MoveNext();
			}
			$this->ln(5);
			$this->line(10,$this->getY(),270,$this->getY());
			$this->ln(4);
			$this->cell(20,5,'Totales Cuenta: ');
			$this->cell(35,5,'');
			$this->cell(105,5,'');
			$this->cell(30,5,number_format($acum1,2,',','.'),0,0,'R');
			$this->cell(30,5,number_format($acum2,2,',','.'),0,0,'R');
			$this->cell(30,5,number_format($acunSaldoActual,2,',','.'),0,0,'R');
			$total1=$total1+$acum1;
			$total2=$total2+$acum2;
			$total3=$total3+$acunSaldoActual;
			$this->ln(4);
			$this->line(10,$this->getY(),270,$this->getY());
			$this->ln(6);
			$this->line(10,$this->getY(),270,$this->getY());
			$this->ln(4);
			$this->cell(20,5,'Totales:');
			$this->cell(35,5,'');
			$this->cell(105,5,'');
			$this->cell(30,5,number_format($total1,2,',','.'),0,0,'R');
			$this->cell(30,5,number_format($total2,2,',','.'),0,0,'R');
			$this->cell(30,5,number_format($total3,2,',','.'),0,0,'R');

		}
	}
?>