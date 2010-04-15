<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

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
		var $orddes;
		var $ordhas;
		var $bendes;
		var $benhas;
		var $fecdes;
		var $fechas;
		var $tipcau1;
		var $tipcau2;
		var $status;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->orddes=H::GetPost("orddes");
			$this->ordhas=H::GetPost("ordhas");
			$this->bendes=H::GetPost("bendes");
			$this->benhas=H::GetPost("benhas");
			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");
			$this->tipcau1=H::GetPost("tipcau1");
			$this->tipcau2=H::GetPost("tipcau2");
			$this->status=strtoupper(trim(H::GetPost("status")));

				if ($this->status=='T')
				{
					$sql="";
				}
				elseif ($this->status=='I')
				{
					$sql=" and a.status='I'";
				}elseif ($this->status=='N')
				{
					$sql=" and a.status='N'";
				}else
				{
					$sql=" and a.status='A'";
				}

			 $this->sql="SELECT A.NUMORD as anumord, CTABAN as actaban, A.TIPCAU as atipcau, A.CEDRIF as acedrif, A.NOMBEN as anomben, A.DESORD as adesord, to_char(A.FECEMI,'DD/MM/YYYY') as afecemi,
							A.FECPAG as afecpag, A.FECANU as afecanu, (A.MONORD-A.MONRET) as amonord, A.MONRET as amonret, A.MONDES as amondes,
							(A.MONORD-A.MONRET-A.MONDES) as result, A.NUMCHE as anumche, A.STATUS as status2 FROM OPORDPAG A
							WHERE
							A.NUMORD >= RPAD('".$this->orddes."',8,' ')
							AND A.NUMORD <= RPAD('".$this->ordhas."',8,' ')
							AND A.TIPCAU >= RPAD('".$this->tipcau1."',4,' ')
							AND A.TIPCAU <= RPAD('".$this->tipcau2."',4,' ')
							AND trim(A.CEDRIF) >= trim('".$this->bendes."')
							AND trim(A.CEDRIF) <= trim('".$this->benhas."')
							".$sql."
							AND	A.FECEMI >= to_date('".$this->fecdes."','dd/mm/yyyy')
							AND A.FECEMI <= to_date('".$this->fechas."','dd/mm/yyyy')
							ORDER BY  A.NUMORD,a.cedrif,A.FECEMI";

						//	print '<pre>'; print $this->sql; exit;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,20);
			$this->arrp=$this->bd->select($this->sql);

		}

		function llenartitulosmaestro()
		{
				$this->titulos[]="Nro Orden";
				$this->titulos[]="Concepto";
				$this->titulos[]="Fecha Orden";
				$this->titulos[]="Status Act.";
				$this->titulos[]="Cheque Num.";
				$this->titulos[]="Cta. Bancaria";
				$this->titulos[]="Monto Orig.";
				$this->titulos[]="Monto Ret.";
				$this->titulos[]="Total";
		        $this->anchos[]=20;
		        $this->anchos[]=55;
		        $this->anchos[]=25;
		        $this->anchos[]=20;
		        $this->anchos[]=30;
		        $this->anchos[]=40;
		        $this->anchos[]=30;
		        $this->anchos[]=20;
		        $this->anchos[]=25;

	}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$this->SetTextColor(0,0,128);
			$this->cell(45,5,"Del:".$this->fecdes);
			$this->cell(45,5,"Al:".$this->fechas);
    		$this->ln();
 			$this->SetTextColor(0,0,0);

			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}

 			$this->SetTextColor(0,0,0);
			$this->Line(10,50,270,50);
   		    $this->ln(8);
		}



		function Cuerpo()
		{

		    $tb=$this->arrp;
			$this->setFont("Arial","B",8);
			$ref=$tb->fields["acedrif"];
			if (!$tb->EOF)
			{
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
				 $this->Line(10,$this->GetY(),270,$this->GetY());
	    		 $this->SetTextColor(0,0,128);
				 $this->cell(30,5,"RIF o Cédula: ");
 	 			 $this->SetTextColor(0,0,0);
				 $this->cell(30,5," ".$tb->fields["acedrif"]);
	    		 $this->SetTextColor(0,0,128);
				 $this->cell(30,5,"Nombre: ");
 	 			 $this->SetTextColor(0,0,0);
				 $this->cell(30,5," ".$tb->fields["anomben"]);
				 $aux=$tb->fields["anomben"];
				 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
 	 			 $this->SetTextColor(0,0,0);
				 $this->ln();
				 $this->ln();

			}
		while(!$tb->EOF)
			{
				if($tb->fields["acedrif"]!=$ref)
				{
				 $this->SetAutoPageBreak(false);
			 	 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","",8);
		    	 $this->Line(200,$this->GetY(),270,$this->GetY());
				 $this->cell($this->anchos[0],9,"");
				 $this->cell($this->anchos[1]-40,9,"");
				 $this->cell($this->anchos[2],9,"TOTALES POR EL BENEFICIARIO:");
				 $this->cell($this->anchos[3],9,"");
 				 $this->cell($this->anchos[4],9,"");
				 $this->cell($this->anchos[5]+40,9,"");
 	    		 $this->SetTextColor(0,0,0);
				 $this->cell($this->anchos[6],9,"".H::FormatoMonto($this->acum1),0,'R');
				 $this->cell($this->anchos[7],9,"".H::FormatoMonto($this->acum2),0,'R');
				 $this->cell($this->anchos[8],9,"".H::FormatoMonto($this->acum3),0,'R');
 				 $this->ln(2);
				 $this->SetX(95);
				 $this->Multicell($this->anchos[4]+75,5," ".$aux);
				 $this->SetAutoPageBreak(true,40);
				 $this->SetAutoPageBreak(true,20);
				 $this->acum1=0;
				 $this->acum2=0;
				 $this->acum3=0;
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
				 $this->Line(10,$this->GetY(),270,$this->GetY());
	    		 $this->SetTextColor(0,0,128);
				 $this->cell(30,5,"RIF o Cédula: ");
 	 			 $this->SetTextColor(0,0,0);
				 $this->cell(30,5," ".$tb->fields["acedrif"]);
	    		 $this->SetTextColor(0,0,128);
				 $this->cell(30,5,"Nombre: ");
 	 			 $this->SetTextColor(0,0,0);
				 $this->cell(30,5," ".$tb->fields["anomben"]);
				 $aux=$tb->fields["anomben"];
				 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
				 $this->SetTextColor(0,0,0);
				 $this->ln();
				 $this->ln();

		        }
				$this->setFont("Arial","",8);
				//Detalle
				 $this->cell($this->anchos[0],4,$tb->fields["anumord"]);
				 $this->cell($this->anchos[1],4," ");
				 $this->cell($this->anchos[2],4,$tb->fields["afecemi"]);
				 if	($tb->fields["status2"] == 'I')
				     $status="Pagadas";
				 if	($tb->fields["status2"] == 'N')
				 	 $status="No Pagadas";
				 if	($tb->fields["status2"] == 'A')
				    $status="Anuladas";
				 $this->cell($this->anchos[3],5,$status);
				 $this->cell($this->anchos[4],4,$tb->fields["anumche"]);
				 $this->cell($this->anchos[5],5,$tb->fields["actaban"]);
				 $this->cell($this->anchos[6],5,H::FormatoMonto($tb->fields["amonord"]),0,'R');
				 $this->cell($this->anchos[7],5,H::FormatoMonto($tb->fields["amonret"]),0,'R');
				 $this->cell($this->anchos[8],5,H::FormatoMonto($tb->fields["result"]),0,'R');
				 $this->acum1=($this->acum1+$tb->fields["amonord"]);
				 $this->acum2=($this->acum2+$tb->fields["amonret"]);
				 $this->acum3=($this->acum3+$tb->fields["result"]);
				 $this->acum1t=($this->acum1t+$tb->fields["amonord"]);
				 $this->acum2t=($this->acum2t+$tb->fields["amonret"]);
				 $this->acum3t=($this->acum3t+$tb->fields["result"]);
			     $this->SetX(30);
			     $this->Multicell($this->anchos[1],4,$tb->fields["adesord"]);
				 $this->ln();
				 $ref=$tb->fields["acedrif"];
				 $tb->MoveNext();


			 }
			 	 $this->SetAutoPageBreak(false);
			     $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","",8);
		    	 $this->Line(200,$this->GetY(),270,$this->GetY());
				 $this->cell($this->anchos[0],9,"");
				 $this->cell($this->anchos[1]-40,9,"");
				 $this->cell($this->anchos[2],9,"TOTALES POR EL BENEFICIARIO:");
				 $this->cell($this->anchos[3],9,"");
				 $this->cell($this->anchos[4],9," ");
				 $this->cell($this->anchos[5]+40,9,"");
 	    		 $this->SetTextColor(0,0,0);
				 $this->cell($this->anchos[6],9,"".H::FormatoMonto($this->acum1),0,'R');
				 $this->cell($this->anchos[7],9,"".H::FormatoMonto($this->acum2),0,'R');
				 $this->cell($this->anchos[8],9,"".H::FormatoMonto($this->acum3),0,'R');
			 	 $this->ln(2);
				 $this->SetX(95);
				 $this->Multicell($this->anchos[4]+75,5," ".$aux);
				 $this->SetLineWidth(0.5);
				 $this->ln();
		    	 $this->Line(200,$this->GetY(),270,$this->GetY());
				 $this->cell($this->anchos[0],9,"");
				 $this->cell($this->anchos[1],9,"");
				 $this->cell($this->anchos[2],9,"");
				 $this->cell($this->anchos[3],9,"");
				 $this->cell($this->anchos[4],9,"");
				 $this->cell($this->anchos[5],9,"TOTALES");
				 $this->cell($this->anchos[6],9,"".H::FormatoMonto($this->acum1t),0,'R');
				 $this->cell($this->anchos[7],9,"".H::FormatoMonto($this->acum2t),0,'R');
				 $this->cell($this->anchos[8],9,"".H::FormatoMonto($this->acum3t),0,'R');
	  }

	}
?>