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
			$this->fpdf("p","mm","Letter");
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
							A.NUMCHE as anumche, A.STATUS as status2 FROM OPORDPAG A
							WHERE
							A.NUMORD >= RPAD('".$this->orddes."',8,' ') AND A.NUMORD <= RPAD('".$this->ordhas."',8,' ') AND
							A.TIPCAU >= RPAD('".$this->tipcau1."',4,' ') AND A.TIPCAU <= RPAD('".$this->tipcau2."',4,' ') AND
							A.CEDRIF >= RPAD('".$this->bendes."',15,' ') AND A.CEDRIF <= RPAD('".$this->benhas."',15,' ') AND
							A.FECEMI >= to_date('".$this->fecdes."','dd/mm/yyyy') AND A.FECEMI <= to_date('".$this->fechas."','dd/mm/yyyy')
							ORDER BY A.FECEMI, A.NUMORD";
			}
		else
			{
				$this->sql="SELECT A.NUMORD as anumord, CTABAN as actaban, A.TIPCAU as atipcau, A.CEDRIF as acedrif, A.NOMBEN as anomben, A.DESORD as adesord, to_char(A.FECEMI,'DD/MM/YYYY') as afecemi,
							A.FECPAG as afecpag, A.FECANU as afecanu, A.MONORD as amonord, A.MONRET as amonret, A.MONDES as amondes,
							A.NUMCHE as anumche, A.STATUS as status2 FROM OPORDPAG A
							WHERE
							A.NUMORD >= RPAD('".$this->orddes."',8,' ') AND A.NUMORD <= RPAD('".$this->ordhas."',8,' ')AND
							A.TIPCAU >= RPAD('".$this->tipcau1."',4,' ') AND A.TIPCAU <= RPAD('".$this->tipcau2."',4,' ')  AND
							A.CEDRIF >= RPAD('".$this->bendes."',15,' ') AND A.CEDRIF <= RPAD('".$this->benhas."',15,' ') AND
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
				$this->titulos[1]="Beneficiario ";
				$this->titulos[2]="Status Act.";
				$this->titulos[3]="Nro Cheque";
				$this->titulos[4]="Cta Bancaria";
				$this->titulos[5]="Monto Orden";
				$this->titulos[6]="Monto Ret.";


		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			 $this->ln();
 			$this->SetTextColor(0,0,0);
			$this->Line(10,50,200,50);
  		    $this->ln();
		}

			function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["afecemi"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
	    		 $this->SetTextColor(0,0,128);
				 $this->cell($this->anchos[0],5,"Fecha : ".$tb2->fields["afecemi"]);
				 $aux=$tb2->fields["afecemi"];
 	 			 $this->SetTextColor(0,0,0);
				 $this->ln();
				 $this->ln();
			}
		while(!$tb->EOF)
			{
				if($tb->fields["afecemi"]!=$ref)
				{
			 $this->SetLineWidth(0.2);

			 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","",8);
				 $this->cell(35,4,"                                ");
		    	 $this->Line(155,$this->GetY(),200,$this->GetY());
				 $this->cell(45,4,"");
				 $this->cell(35,4,"TOTALES PARA EL DIA:      ");
 	    		 $this->SetTextColor(0,0,128);
				 $this->cell(20,4," ".$aux);
 	    		 $this->SetTextColor(0,0,0);
				 $this->cell(35,4,"            ".number_format($this->acum1,2,'.',','));
				 $this->cell(35,4," ".number_format($this->acum2,2,'.',','));
				 $this->ln();
				 $this->acum1=0;
				 $this->acum2=0;
				 $this->acum3=0;
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
 	 			 $this->SetTextColor(0,0,128);
				 $this->cell($this->anchos[0],5,"Fecha : ".$tb->fields["afecemi"]);
 	 			 $this->SetTextColor(0,0,0);
				 $this->ln();
				 $this->ln();

		        }
				$ref=$tb->fields["afecemi"];
				$aux=$tb->fields["afecemi"];
				$this->setFont("Arial","",8);
				//Detalle
				 $this->cell($this->anchos[0],4,$tb->fields["anumord"]);
				 $this->cell($this->anchos[1],4," ");
				 if	($tb->fields["status2"] == 'I')
				 {
				 $this->cell($this->anchos[2],5,"Pagadas");
				 }
				 else if	($tb->fields["status2"] == 'N')
				 {
				 $this->cell($this->anchos[2],5,"No Pagadas");
				 } else if	($tb->fields["status2"] == 'A')
				 {
				 $this->cell($this->anchos[2],5,"Anuladas");
				 }
				 else {
				 	 $this->cell($this->anchos[2],5," ");
				 }
				 $this->cell($this->anchos[3],4,$tb->fields["anumche"]);
				 $this->cell($this->anchos[4],5,$tb->fields["actaban"]);
				 $this->cell($this->anchos[5],5,NUMBER_FORMAT($tb->fields["amonord"],2,'.',','));
				 $this->cell($this->anchos[6],5,number_format($tb->fields["amonret"],2,'.',','));
				 $this->acum1=($this->acum1+$tb->fields["amonord"]);
				 $this->acum2=($this->acum2+$tb->fields["amonret"]);
				 $this->acum1t=($this->acum1t+$tb->fields["amonord"]);
				 $this->acum2t=($this->acum2t+$tb->fields["amonret"]);
				// $this->ln(2);
				 $this->setX(30);
				 $this->Multicell($this->anchos[1],4,$tb->fields["anomben"]);
				 $this->ln(2);
				 $tb->MoveNext();


			 }
				 $this->cell(35,4,"                                ");
		    	 $this->Line(155,$this->GetY(),200,$this->GetY());
				 $this->cell(45,4,"");
				 $this->cell(35,4,"TOTALES PARA EL DIA:      ");
 	    		 $this->SetTextColor(0,0,128);
				 $this->cell(20,4," ".$aux);
 	    		 $this->SetTextColor(0,0,0);
				 $this->cell(35,4,"            ".number_format($this->acum1,2,'.',','));
				 $this->cell(35,4," ".number_format($this->acum2,2,'.',','));
				 $this->SetLineWidth(0.5);
				 $this->ln();
				 $this->cell(35,4,"                                ");
		    	 $this->Line(155,$this->GetY(),200,$this->GetY());
				 $this->cell(65,4,"");
				 $this->cell(20,4,"          TOTALES");
				 $this->cell(35,4,"                                ".number_format($this->acum1t,2,'.',','));
				 $this->cell(35,4,"                   ".number_format($this->acum2t,2,'.',','));
		}

	}
?>