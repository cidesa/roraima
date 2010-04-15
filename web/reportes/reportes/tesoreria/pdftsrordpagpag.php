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
			$this->orddes=$_POST["orddes"];
			$this->ordhas=$_POST["ordhas"];
			$this->bendes=$_POST["bendes"];
			$this->benhas=$_POST["benhas"];
			$this->fecdes=$_POST["fecdes"];
			$this->fechas=$_POST["fechas"];
			$this->tipcau1=$_POST["tipcau1"];
			$this->tipcau2=$_POST["tipcau2"];
			$this->status=$_POST["status"];

				if ($this->status=='t')
				{

				$this->sql="SELECT A.NUMORD as anumord, CTABAN as actaban, A.TIPCAU as atipcau, A.CEDRIF as acedrif, A.NOMBEN as anomben, A.DESORD as adesord, to_char(A.FECEMI,'DD/MM/YYYY') as afecemi,
							A.FECPAG as afecpag, A.FECANU as afecanu, (A.MONORD-A.MONRET) as amonord, A.MONRET as amonret, A.MONDES as amondes,
							(A.MONORD-A.MONRET-A.MONDES) as result, A.NUMCHE as anumche, A.STATUS as status2 FROM OPORDPAG A
							WHERE
							A.NUMORD >= RPAD('".$this->orddes."',8,' ') AND A.NUMORD <= RPAD('".$this->ordhas."',8,' ') AND
							A.TIPCAU >= RPAD('".$this->tipcau1."',4,' ') AND A.TIPCAU <= RPAD('".$this->tipcau2."',4,' ') AND
							trim(A.NOMBEN) >= trim('".$this->bendes."') AND trim(A.NOMBEN) <= trim('".$this->benhas."') AND
							A.FECEMI >= to_date('".$this->fecdes."','dd/mm/yyyy') AND A.FECEMI <= to_date('".$this->fechas."','dd/mm/yyyy')
							ORDER BY A.FECEMI, A.NUMORD";
			}
		else
			{
				$this->sql="SELECT A.NUMORD as anumord, CTABAN as actaban, A.TIPCAU as atipcau, A.CEDRIF as acedrif, A.NOMBEN as anomben, A.DESORD as adesord, to_char(A.FECEMI,'DD/MM/YYYY') as afecemi,
							A.FECPAG as afecpag, A.FECANU as afecanu, (A.MONORD-A.MONRET) as amonord, A.MONRET as amonret, A.MONDES as amondes,
							A.NUMCHE as anumche, A.STATUS as status2 FROM OPORDPAG A
							WHERE
							A.NUMORD >= RPAD('".$this->orddes."',8,' ') AND A.NUMORD <= RPAD('".$this->ordhas."',8,' ') AND
							A.TIPCAU >= RPAD('".$this->tipcau1."',4,' ') AND A.TIPCAU <= RPAD('".$this->tipcau2."',4,' ') AND
							trim(A.NOMBEN) >= trim('".$this->bendes."') AND trim(A.NOMBEN) <= trim('".$this->benhas."') AND
							A.FECEMI >= to_date('".$this->fecdes."','dd/mm/yyyy') AND A.FECEMI <= to_date('".$this->fechas."','dd/mm/yyyy') AND
							A.STATUS = '".$this->status."' ORDER BY A.FECEMI, A.NUMORD";

			 }
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="Nro Orden";
				$this->titulos[1]="Concepto";
				$this->titulos[2]="Fecha Emision";
				$this->titulos[3]="Status Act.";
				$this->titulos[4]="Cheque Num.";
				$this->titulos[5]="Cta. Bancaria";
				$this->titulos[6]="Monto Orig.";
				$this->titulos[7]="Monto Ret.";
				$this->titulos[8]="Total";
	}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);

			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			 $this->ln();
 			$this->SetTextColor(0,0,0);
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],7,$this->titulos2[$i]);
			}
			$this->Line(10,50,270,50);

   		    $this->ln();

		}



			function Cuerpo()
		{
 			$this->SetTextColor(0,0,128);
			$this->cell(45,5,"Del:".$this->fecdes);
			$this->cell(45,5,"Al:".$this->fechas);
    		$this->ln();
 			$this->SetTextColor(0,0,0);

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);

		//	print $this->sql;
			$this->setFont("Arial","B",8);
			$ref=$tb2->fields["acedrif"];
			$primero=true;
			if ((!$tb2->EOF) && (($tb2->fields["acedrif"]!=$ref) || $primero))
			{
				 $primero=false;
				 $ref=$tb2->fields["acedrif"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
				 $this->Line(10,$this->GetY(),270,$this->GetY());
	    		 $this->SetTextColor(0,0,128);
				 $this->cell(30,5,"RIF o Cédula: ");
 	 			 $this->SetTextColor(0,0,0);
				 $this->cell(30,5," ".$tb2->fields["acedrif"]);
	    		 $this->SetTextColor(0,0,128);
				 $this->cell(30,5,"Nombre: ");
 	 			 $this->SetTextColor(0,0,0);
				 $this->cell(30,5," ".$tb2->fields["anomben"]);
				 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
				 $aux=$tb2->fields["anomben"];
 	 			 $this->SetTextColor(0,0,0);
				 $this->ln();
				 $this->ln();
				 $tb2->MoveNext();

			}
		while(!$tb->EOF)
			{
				if($tb->fields["acedrif"]!=$ref)
				{
			 $this->SetLineWidth(0.2);
//				 $this->ln();
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
				 $this->cell($this->anchos[6],9,"".number_format($this->acum1,2,'.',','),0,'R');
				 $this->cell($this->anchos[7],9,"".number_format($this->acum2,2,'.',','),0,'R');
				 $this->cell($this->anchos[8],9,"".number_format($this->acum3,2,'.',','),0,'R');
 				 $this->ln(2);
				 $this->SetX(95);
				 $this->Multicell($this->anchos[4]+75,5," ".$aux);
				 $this->acum1=0;
				 $this->acum2=0;
				 $this->acum3=0;
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
				 $this->Line(10,$this->GetY(),270,$this->GetY());
	    		 $this->SetTextColor(0,0,128);
	    		if($tb2->fields["acedrif"]==$ref)
					{ while ($tb2->fields["acedrif"]==$ref)
						{	$tb2->MoveNext(); }
					}
					else{}

				 $this->cell(30,5,"RIF o Cédula: ");
 	 			 $this->SetTextColor(0,0,0);
				 $this->cell(30,5," ".$tb2->fields["acedrif"]);
	    		 $this->SetTextColor(0,0,128);
				 $this->cell(30,5,"Nombre: ");
 	 			 $this->SetTextColor(0,0,0);
				 $this->cell(30,5," ".$tb2->fields["anomben"]);
				 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
				 $aux=$tb2->fields["anomben"];
				 $tb2->MoveNext();

				 $this->SetTextColor(0,0,0);
				 $this->ln();
				 $this->ln();

		        }
				$ref=$tb->fields["acedrif"];
				$aux=$tb->fields["anomben"];
				$this->setFont("Arial","",8);
				//Detalle
				 $this->cell($this->anchos[0],4,$tb->fields["anumord"]);
				 $this->cell($this->anchos[1],4," ");
				 $this->cell($this->anchos[2],4,$tb->fields["afecemi"]);
				 if	($tb->fields["status2"] == 'I')
				 {
				 $this->cell($this->anchos[3],5,"Pagadas");
				 }
				 if	($tb->fields["status2"] == 'N')
				 {
				 $this->cell($this->anchos[3],5,"No Pagadas");
				 }
				 if	($tb->fields["status2"] == 'A')
				 {
				 $this->cell($this->anchos[3],5,"Anuladas");
				 }
				 $this->cell($this->anchos[4],4,$tb->fields["anumche"]);
				 $this->cell($this->anchos[5],5,$tb->fields["actaban"]);
				 $this->cell($this->anchos[6],5,number_format($tb->fields["amonord"],2,'.',','),0,'R');
				 $this->cell($this->anchos[7],5,number_format($tb->fields["amonret"],2,'.',','),0,'R');
				 $this->cell($this->anchos[8],5,number_format($tb->fields["result"],2,'.',','),0,'R');
				 $this->acum1=($this->acum1+$tb->fields["amonord"]);
				 $this->acum2=($this->acum2+$tb->fields["amonret"]);
				 $this->acum3=($this->acum3+$tb->fields["result"]);
				 $this->acum1t=($this->acum1t+$tb->fields["amonord"]);
				 $this->acum2t=($this->acum2t+$tb->fields["amonret"]);
				 $this->acum3t=($this->acum3t+$tb->fields["result"]);
			     $this->SetX(30);
			     $this->Multicell($this->anchos[1],4,$tb->fields["adesord"]);
				 $this->ln();
				 $tb->MoveNext();


			 }
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
				 $this->cell($this->anchos[6],9,"".number_format($this->acum1,2,'.',','),0,'R');
				 $this->cell($this->anchos[7],9,"".number_format($this->acum2,2,'.',','),0,'R');
				 $this->cell($this->anchos[8],9,"".number_format($this->acum3,2,'.',','),0,'R');
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
				 $this->cell($this->anchos[6],9,"".number_format($this->acum1t,2,'.',','),0,'R');
				 $this->cell($this->anchos[7],9,"".number_format($this->acum2t,2,'.',','),0,'R');
				 $this->cell($this->anchos[8],9,"".number_format($this->acum3t,2,'.',','),0,'R');		}

	}
?>