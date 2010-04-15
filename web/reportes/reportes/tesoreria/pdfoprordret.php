<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acumret=0;
		var $acum2=0;
		var $acum3=0;
		var $acum1t=0;
		var $acum2t=0;
		var $acum3t=0;
		var $cont=0;
		var $cont1=0;
		var $result=0;
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $sql5;
		var $rep;
		var $numero;
		var $cab;
		var $nroord1;
		var $nroord2;
		var $ben1;
		var $ben2;
		var $fecreg1;
		var $fecreg2;
		var $tipcau1;
		var $tipcau2;
		var $status;
		var $codpre1;
		var $codpre2;
		var $comodin;




		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->nroord1=$_POST["nroord1"];
			$this->nroord2=$_POST["nroord2"];
			$this->ben1=$_POST["ben1"];
			$this->ben2=$_POST["ben2"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];
			$this->tipcau1=$_POST["tipcau1"];
			$this->tipcau2=$_POST["tipcau2"];
			$this->status=$_POST["status"];
			$this->codpre1=$_POST["codpre1"];
			$this->codpre2=$_POST["codpre2"];
			$this->comodin=$_POST["comodin"];


				if ($this->status=='t')
				{

				$this->sql="SELECT DISTINCT(A.NUMORD),A.CEDRIF,A.NOMBEN,to_char(A.FECEMI,'DD/MM/YYYY') as fecemi,A.TIPCAU,A.FECPAG,A.FECANU,A.STATUS as estatus
							FROM OPORDPAG A, OPRETORD B
							WHERE
							A.NUMORD = B.NUMORD AND
							A.NUMORD >= ('".$this->nroord1."') AND A.NUMORD <= ('".$this->nroord2."') AND
							A.NOMBEN >= '".$this->ben1."' AND A.NOMBEN <= '".$this->ben2."' AND
							A.TIPCAU >= ('".$this->tipcau1."') AND A.TIPCAU <= ('".$this->tipcau2."') AND
							A.FECEMI >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECEMI <= to_date('".$this->fecreg2."','dd/mm/yyyy')
							ORDER BY A.NUMORD";

							}
				else
				{
				$this->sql="SELECT DISTINCT(A.NUMORD),A.CEDRIF,A.NOMBEN,to_char(A.FECEMI,'DD/MM/YYYY') as fecemi,A.TIPCAU,A.FECPAG,A.FECANU,A.STATUS as estatus
							FROM OPORDPAG A, OPRETORD B
							WHERE
							A.NUMORD = B.NUMORD AND
							A.NUMORD >= ('".$this->nroord1."') AND A.NUMORD <= ('".$this->nroord2."') AND
							A.NOMBEN >= '".$this->ben1."' AND A.NOMBEN <= '".$this->ben2."' AND
							A.TIPCAU >= ('".$this->tipcau1."') AND A.TIPCAU <= ('".$this->tipcau2."') AND
							A.FECEMI >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECEMI <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
							A.STATUS = '".$this->status."' ORDER BY A.NUMORD";


				}

//print $this->sql;

			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

		}

		function Header()
		{
			$this->SetTextColor(0,0,128);
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->cell(45,5,"Del:".$this->fecreg1);
			$this->cell(45,5,"Al:".$this->fecreg2);

   		    $this->SetLineWidth(0.2);
    		$this->ln();
		}



			function Cuerpo()
			{

    		$this->ln();
 			$this->SetTextColor(0,0,0);
		    $tb=$this->bd->select($this->sql);

			$this->setFont("Arial","B",8);

		//----------------------------------
		while (!$tb->EOF)
		{

				$numord=$tb->fields["numord"];
				if ($this->GetY()>220){$this->ln(100);}
				$this->SetTextColor(0,0,128);
				$this->SetLineWidth(0.5);
				$this->Line(10,$this->GetY(),270,$this->GetY());
				$this->SetLineWidth(0.2);
				 $this->cell(30,5,"Numero de Orden: ");
				 $this->cell(40,5," ".$tb->fields["numord"]);
				 $this->cell(30,5,"Tipo Orden: ");
				 $this->cell(30,5," ".$tb->fields["tipcau"]);
				 $this->cell(30,5,"Fecha Emision: ");
				 $this->cell(30,5," ".$tb->fields["fecemi"]);
				 $this->cell(30,5,"Status Actual: ");
				 if	($tb->fields["estatus"] == 'i')
				 {
				 $this->cell($this->anchos[4],5,"Pagadas");
				 }
				 if	($tb->fields["estatus"] == 'n')
				 {
				 $this->cell($this->anchos[4],5,"No Pagadas");
				 }
				 if	($tb->fields["estatus"] == 'a')
				 {
				 $this->cell($this->anchos[4],5,"Anuladas");
				 }
				 $this->ln();
				 $this->cell(30,5,"Cedula: ");
				 $this->cell(40,5," ".$tb->fields["cedrif"]);
				 $this->cell(30,5,"Beneficiario: ");
				 $this->cell(30,5," ".$tb->fields["nomben"]);
				 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
				 $this->SetTextColor(0,0,0);
				 $this->ln();
				 //-------
				 $this->sql2="select B.CODTIP,C.DESTIP,(case when B.NUMRET='NOASIGNA' then '' else B.NUMRET end) as NUMRET,B.CODPRE,D.NOMPRE,B.MONRET as mret
							from OPRETORD B, OPTIPRET C, CPDEFTIT D
							where
							B.CODTIP = C.CODTIP AND B.CODPRE = D.CODPRE AND b.NUMORD = '".$numord."'
							ORDER BY b.CODTIP";
							//print '<pre>'; print $this->sql2; exit;
				 $tb2=$this->bd->select($this->sql2);
				 $tb3=$this->bd->select($this->sql2);

				 if (!$tb2->EOF)
				 {
				 $mret=0;
				 $this->SetTextColor(200,0,0);
				 if ($this->GetY()>220){$this->ln(100);}
				 $this->cell(30,4,"Tipo de Retencion: ");
				 $this->cell(30,4," ".$tb2->fields["codtip"]);
				 $this->cell(40,4,"Descripcion Retencion   : ");
				 $this->Multicell(150,4," ".$tb2->fields["destip"]);
				 $this->ln();
				 $this->cell(30,5,"Nro Orden Generada: ");
				 $this->cell(40,5,"Codigo Presupuestario: ");
				 $this->cell(165,5,"Codigo Presupuestario: ");
				 $this->cell(30,5,"Monto Retencion: ");
				 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
				 //$this->ln();
				 $this->ln();
				 $this->SetTextColor(0,0,0);
				 $ref=$tb2->fields["codtip"];
				 }

				 while (!$tb3->EOF)
				 {
				 	if ($tb3->fields["codtip"]!=$ref)
					{
						$this->setFont("Arial","B",8);
						 if ($this->GetY()>220){$this->ln(100);}
						 $this->Line(240,$this->GetY(),270,$this->GetY());
						 $this->cell(205,5,"");
						 $this->cell(30,5,"SUBTOTAL: ");
						 $this->setx(244);
						 $this->cell(20,5,number_format($mret,2,',','.'),0,'R',0);
						 $mret=0;
						 $this->SetTextColor(200,0,0);
						  $this->ln();
						 if ($this->GetY()>220){$this->ln(100);}
						 $this->cell(30,4,"Tipo de Retencion: ");
						 $this->cell(30,4," ".$tb3->fields["codtip"]);
						 $this->cell(40,4,"Descripcion Retencion   : ");
						 $this->Multicell(150,4," ".$tb3->fields["destip"]);
						 $this->ln();
						 $this->cell(30,5,"Nro Orden Generada: ");
						 $this->cell(40,5,"Codigo Presupuestario: ");
						 $this->cell(165,5,"Codigo Presupuestario: ");
						 $this->cell(30,5,"Monto Retencion: ");
						 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
						 $this->ln();
						 $this->ln();
						 $this->SetTextColor(0,0,0);
						 $ref=$tb3->fields["codtip"];
					}
				//Detalle
				$this->setFont("Arial","",8);
				$ref=$tb3->fields["codtip"];
 				$this->cell(30,5," ".$tb3->fields["numret"]);
			    $this->cell(55,5," ".$tb3->fields["codpre"]);
			    $this->cell(165,5," ".$tb3->fields["nompre"]);
				$this->setx(244);
			    $this->cell(20,5,number_format($tb3->fields["mret"],2,',','.'),0,'R',0);
			    $mret=$mret+$tb3->fields["mret"];
				$this->acumret=$this->acumret+$tb3->fields["mret"];
				$this->ln();
				$tb3->MoveNext();
				 }

				 $this->setFont("Arial","B",8);
				 if ($this->GetY()>220){$this->ln(100);}
				 $this->Line(240,$this->GetY(),270,$this->GetY());
				 $this->cell(205,5,"");
				 $this->cell(30,5,"SUBTOTAL: ");
				 $this->setx(244);
				 $this->cell(20,5," ".number_format($mret,2,',','.'),0,'R',0);
				//--------

		$this->ln(7);
		$tb->MoveNext();
		}
		$this->ln();
		//----------------------------------
		//RESUMEN GLOBAL
		$tot=0;
		$this->setFont("Arial","B",8);
		$this->cell(85,5," ");
		$this->cell(50,5,"RESUMEN GLOBAL RETENCIONES POR TIPO");
		$this->ln(1);
		$this->ln(-1);
		$this->setx(220);
		$this->cell(5,5,"TOTAL");
		$this->setx(244);
		$this->cell(20,5,number_format($this->acumret,2,',','.'),0,'R',0);
		$this->ln();
		$this->ln();
		$this->sql5="SELECT A.CODTIP as CODTIPTOT,B.DESTIP as DESTIPTOT,SUM(A.MONRET) as MONRETTOT
					FROM OPRETORD A, OPTIPRET B
					WHERE A.CODTIP = B.CODTIP
					GROUP BY A.CODTIP,B.DESTIP ORDER BY A.CODTIP";

		$this->sql6="SELECT A.NUMORD,A.CODTIP as codtip,B.DESTIP as destip,A.MONRET as monret
					FROM OPRETORD A, OPTIPRET B
					WHERE A.CODTIP = B.CODTIP
					ORDER BY A.CODTIP";

		$tb5=$this->bd->select($this->sql5);
		$tb6=$this->bd->select($this->sql6);
		$tb7=$this->bd->select($this->sql6);




		//$this->cell(30,5,"Nro ORDEN");
		$this->cell(30,5,"TIPO RETENCION");
		$this->cell(190,5,"DESCRIPCION TIPO RETENCION");
		$this->cell(45,5,"MONTO TIPO RETENCION");
		$this->ln();

		//PRUEBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
		$acumr=0;
		$acumrt=0;
		if (!$tb6->EOF)
		{
		$ref=$tb6->fields["codtip"];
    	$this->setFont("Arial","",8);
		$this->cell(5,5,"");
		//$this->cell(25,5,$tb6->fields["numord"]);
		$this->cell(25,5,$tb6->fields["codtip"]);
		$this->cell(204,5,$tb6->fields["destip"]);
		}

		while (!$tb7->EOF)
		{
			if ($tb7->fields["codtip"] != $ref)
			{
			$this->cell(19,5,number_format($acumr,2,',','.'),0,'R',0);
			$this->ln();
			$acumr=0;
    		$this->setFont("Arial","",8);
			//$this->cell(25,5,$tb6->fields["numord"]);
			$this->cell(5,5,"");
			$this->cell(25,5,$tb7->fields["codtip"]);
			$this->cell(204,5,$tb7->fields["destip"]);
			}
			//DETALLE
			$ref=$tb7->fields["codtip"];
			$acumr=$acumr+$tb7->fields["monret"];
			$acumrt=$acumrt+$tb7->fields["monret"];

		$tb7->MoveNext();
		}
			$this->setx(244);
			$this->cell(19,5,number_format($acumr,2,',','.'),0,'R',0);
			$this->ln();


		/////

		$this->SetLineWidth(0.5);
		$this->Line(242,$this->GetY(),265,$this->GetY());
		$this->setx(220);
		$this->cell(5,5,"TOTAL");
		$this->setx(244);
		$this->cell(19,5,number_format($acumrt,2,',','.'),0,'R',0);




	}
	}
?>
