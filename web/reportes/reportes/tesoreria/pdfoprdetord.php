<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $lay;
		var $acum1=0;
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
			$this->fpdf("p","mm","Letter");
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

				$this->sql="SELECT A.NUMORD as anumord,(case when B.refcom='NULO' then '' else B.refcom end) as refcom, A.TIPCAU as atipcau, A.CEDRIF as acedrif, A.NOMBEN as anomben, A.DESORD as adesord, to_char(A.FECEMI,'DD/MM/YYYY') as afecemi,
							A.FECPAG as afecpag, A.FECANU as afecanu, A.MONORD as amonord, A.MONRET as amonret, A.MONDES as amondes,
							B.CODPRE as bcodpre, B.MONCAU as bmoncau, B.MONDES as mdes, B.MONRET as mret, C.NOMPRE as cnompre,
							A.STATUS as status2, (B.MONCAU-B.MONRET) as tot1 FROM OPORDPAG A, OPDETORD B, CPDEFTIT C WHERE
							(A.NUMORD = B.NUMORD) AND (B.CODPRE = C.CODPRE) AND
							A.NUMORD >= ('".$this->nroord1."') AND A.NUMORD <= ('".$this->nroord2."') AND
							A.TIPCAU >= '".$this->tipcau1."' AND A.TIPCAU <= '".$this->tipcau2."' AND
							A.CEDRIF >= ('".$this->ben1."') AND A.CEDRIF <= ('".$this->ben2."') AND
							A.FECEMI >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECEMI <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
							B.CODPRE >= ('".$this->codpre1."') AND B.CODPRE <= ('".$this->codpre2."') AND
							RTRIM(B.CODPRE) LIKE RTRIM('".$this->comodin."') ORDER BY A.NUMORD,A.FECEMI";


			}
		else
			{
				$this->sql="SELECT A.NUMORD as anumord,(case when B.refcom='NULO' then '' else B.refcom end) as refcom, A.TIPCAU as atipcau, A.CEDRIF as acedrif, (A.NOMBEN) as anomben, (A.DESORD) as adesord, A.FECEMI as afecemi,
							A.FECPAG as afecpag, A.FECANU as afecanu, A.MONORD as amonord, A.MONRET as amonret, A.MONDES as amondes,
							B.CODPRE as bcodpre, B.MONCAU as bmoncau, B.MONDES as mdes, B.MONRET as mret, C.NOMPRE as cnompre,
							A.STATUS as status2,(B.MONCAU-B.MONRET) as tot1 FROM OPORDPAG A, OPDETORD B, CPDEFTIT C WHERE
							(A.NUMORD = B.NUMORD) AND (B.CODPRE = C.CODPRE ) AND
							A.NUMORD >= ('".$this->nroord1."') AND A.NUMORD <= ('".$this->nroord2."') AND
							A.TIPCAU >= '".$this->tipcau1."' AND A.TIPCAU <= '".$this->tipcau2."' AND
							A.CEDRIF >= ('".$this->ben1."') AND A.CEDRIF <= ('".$this->ben2."') AND
							A.FECEMI >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECEMI <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
							B.CODPRE >= ('".$this->codpre1."') AND B.CODPRE <= ('".$this->codpre2."',) AND
							RTRIM(B.CODPRE) LIKE RTRIM('".$this->comodin."') AND A.STATUS = '".$this->status."' ORDER BY A.NUMORD,A.FECEMI";

			 }
//print '<pre>'; print $this->sql; exit;


			$this->llenartitulosmaestro();
			$this->llenartitulos2();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="Orden";
				$this->titulos[1]="Beneficiario ";
				$this->titulos[2]="Concepto";
				$this->titulos[3]="Fecha";
				$this->titulos[4]="Status";


		}

		function llenartitulos2()
		{
				$this->titulos2[0]="";
				$this->titulos2[1]="";
				$this->titulos2[2]="Refiere ";
				$this->titulos2[3]="Monto   ";
				$this->titulos2[4]="Retenido";
				$this->titulos2[5]="Total   ";


		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			$this->SetTextColor(0,0,128);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			 $this->ln();
 			$this->SetTextColor(0,0,0);
 			$this->setX(70);
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell(25,7,$this->titulos2[$i]);
			}
			$this->Line(10,50,200,50);

   		    $this->ln();

		}



			function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","B",7);
			if(!$tb2->EOF)
			{

				 $ref=$tb2->fields["anumord"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",7);
		 		 $y=$this->GetY();
				 $this->cell($this->anchos[0],3,$tb2->fields["anumord"]);
				 $this->setx(27);
				 $this->Multicell($this->anchos[1],3,substr($tb2->fields["anomben"],0,70),0,'L');
		 		 $this->setFont("Arial","B",7);

				 $this->SetXY(120,$y);
				 $this->cell($this->anchos[3],3,$tb2->fields["afecemi"]);
				 if	($tb2->fields["status2"] == 'I')
				 {
				 $this->cell($this->anchos[4],3,"Pagadas");
				 }
				 if	($tb2->fields["status2"] == 'N')
				 {
				 $this->cell($this->anchos[4],3,"No Pagadas");
				 }
				 if	($tb2->fields["status2"] == 'A')
				 {
				 $this->cell($this->anchos[4],3,"Anuladas");
				 }
				 $this->SetXY(65,$y);
				 $this->Multicell($this->anchos[2],3,substr($tb2->fields["adesord"],0,70),0,'L');
				 $this->ln();
				 $this->ln();
			}
		while(!$tb->EOF)
			{
				if($tb->fields["anumord"]!=$ref)
				{
			 $this->SetLineWidth(0.2);
			 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","",7);
		    	 $this->Line(105,$this->GetY(),200,$this->GetY());
				 $this->setx(123);
				 $this->cell(35,5,number_format($this->acum1,2,',','.'),0,'R',0);
				 $this->cell(25,5,number_format($this->acum2,2,',','.'),0,'R',0);
				 $this->cell(22,5,number_format($this->acum3,2,',','.'),0,'R',0);
				 $this->ln();
				 $this->acum1=0;
				 $this->acum2=0;
				 $this->acum3=0;
				 $this->ln();
		 		 $this->setFont("Arial","B",7);
				 $lay=$this->GetY();
				 if ($lay>=230)
				 {$this->AddPage();
				   }
				 else { 	}
				 $y=$this->GetY();
				 $this->cell($this->anchos[0],3,$tb->fields["anumord"]);
				 $this->setX(27);
				 $this->Multicell($this->anchos[1],3,substr($tb->fields["anomben"],0,70),0,'L');
		 		 $this->setFont("Arial","B",7);

				 $this->SetXY(120,$y);
				 $this->cell($this->anchos[3],3,$tb->fields["afecemi"]);
				 if	($tb->fields["status2"] == 'I')
				 {
				 $this->cell($this->anchos[4],3,"Pagadas");
				 }
				 if	($tb->fields["status2"] == 'N')
				 {
				 $this->cell($this->anchos[4],3,"No Pagadas");
				 }
				 if	($tb->fields["status2"] == 'A')
				 {
				 $this->cell($this->anchos[4],3,"Anuladas");
				 }
				  $this->SetXY(65,$y);
				 $this->Multicell($this->anchos[2],3,substr($tb->fields["adesord"],0,70),0,'L');
				 $this->ln();
				 $this->ln();
		        }
				$ref=$tb->fields["anumord"];
				//Detalle
				 $this->setFont("Arial","",6);
				 $this->cell($this->anchos2[1]+10,3,$tb->fields["bcodpre"]);
				 $this->setFont("Arial","B",7);
				 $this->setx(123);
				 $this->cell(12,3,($tb->fields["refcom"]),0,'L',0);
				 $this->setFont("Arial","",7);
				 $this->cell(23,3,number_format($tb->fields["bmoncau"],2,',','.'),0,'R',0);
				 $this->cell(25,3,number_format($tb->fields["mret"],2,',','.'),0,'R',0);
				 $this->cell(22,3,number_format($tb->fields["tot1"],2,',','.'),0,'R',0);
				 $this->setFont("Arial","",6);
				 $this->SetX($this->anchos2[1]+18);
				 $this->MultiCell($this->anchos2[2]-10,3,$tb->fields["cnompre"]);

				 $this->acum1=($this->acum1+$tb->fields["bmoncau"]);
				 $this->acum2=($this->acum2+$tb->fields["mret"]);
 				 $this->acum3=($this->acum3+$tb->fields["tot1"]);
				 $this->acum1t=($this->acum1t+$tb->fields["bmoncau"]);
				 $this->acum2t=($this->acum2t+$tb->fields["mret"]);
 				 $this->acum3t=($this->acum3t+$tb->fields["tot1"]);
				 $this->ln();

				 $tb->MoveNext();

			 }
		    	 $this->Line(105,$this->GetY(),200,$this->GetY());
				 $this->setX(123);
				 $this->cell(35,5,number_format($this->acum1,2,',','.'),0,'R',0);
				 $this->cell(25,5,number_format($this->acum2,2,',','.'),0,'R',0);
				 $this->cell(22,5,number_format($this->acum3,2,',','.'),0,'R',0);
				 $this->SetLineWidth(0.5);
				 $this->ln();
		    	 $this->Line(105,$this->GetY(),200,$this->GetY());

				 $this->setFont("Arial","B",7);
				 $this->setx(80);
				 $this->cell(5,5,"TOTALES");
				 $this->setx(123);
				 $this->cell(35,5,number_format($this->acum1t,2,',','.'),0,'R',0);
				 $this->cell(25,5,number_format($this->acum2t,2,',','.'),0,'R',0);
				 $this->cell(22,5,number_format($this->acum3t,2,',','.'),0,'R',0);
		}

	}
?>