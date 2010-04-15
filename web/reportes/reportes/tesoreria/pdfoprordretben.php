<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acumret=0;
		var $acum2=0;
		var $monord2=0;
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
		var $sql0;
		var $sql1;
		var $sql2;
		var $sql5;
		var $rep;
		var $numero;
		var $cab;
		var $bendes;
		var $benhas;
		var $codtipdes;
		var $codtiphas;
		var $fecreg1;
		var $fecreg2;
		var $coddes;
		var $codhas;
		var $status;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->bd->validar();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->bendes=$_POST["bendes"];
			$this->benhas=$_POST["benhas"];
			$this->codtipdes=$_POST["codtipdes"];
			$this->codtiphas=$_POST["codtiphas"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];
			$this->coddes=$_POST["coddes"];
			$this->codhas=$_POST["codhas"];
			$this->status=$_POST["status"];


				$this->sql0="SELECT DISTINCT(A.CEDRIF), B.CEDRIF, RTRIM(A.NOMBEN) as nomben FROM OPBENEFI A,  OPORDPAG B, OPRETORD C WHERE
				A.CEDRIF = B.CEDRIF AND B.NUMORD = C.NUMORD AND
				RTRIM(A.CEDRIF) >= RTRIM('".$this->bendes."') AND RTRIM(A.CEDRIF) <= RTRIM('".$this->benhas."')
				ORDER BY A.CEDRIF ";


			$this->llenartitulosmaestro();
			$this->llenartitulos2();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

		}

	function llenartitulosmaestro()
		{
				$this->titulos[0]="Nro Orden";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Fecha Emision";
				$this->titulos[3]="Monto Orden";
				$this->titulos[4]="Número Cheque";
				$this->titulos[5]="Estatus Actual";

		}

		function llenartitulos2()
		{
				$this->titulos2[0]="";
				$this->titulos2[1]="Código";
				$this->titulos2[2]="";
				$this->titulos2[3]="Código Presupuestario";
				$this->titulos2[4]="";
				$this->titulos2[5]="Monto";


		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			$this->SetTextColor(0,0,128);
			$this->cell(45,5,"Del:".$this->fecreg1);
			$this->cell(45,5,"Al:".$this->fecreg2);

   		    $this->SetLineWidth(0.2);
    		$this->ln();
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

    		$this->ln();
 			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","B",8);
		//----------------------------------

	    $tb0=$this->bd->select($this->sql0);
		while(!$tb0->EOF)
		{
				$this->SetTextColor(0,0,128);
				$this->SetLineWidth(0.5);
				$this->Line(10,$this->GetY(),270,$this->GetY());
				$this->SetLineWidth(0.2);
				$this->setFont("Arial","B",8);
				 $this->cell(30,5,"Cédula o RIF: ");
				 $this->cell(40,5," ".$tb0->fields["cedrif"]);
				 $this->ln();
				 $this->cell(30,5,"Nombre: ");
				 $this->cell(40,5," ".$tb0->fields["nomben"]);
				 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
				 $this->SetTextColor(0,0,0);
				 $this->ln();
		$monord=0;
		$cedrif=$tb0->fields["cedrif"];

				if ($this->status=='T')
				{

				$this->sql="SELECT DISTINCT(B.NUMORD), to_char(B.FECEMI,'DD/MM/YYYY') as fecemi, B.DESORD, B.FECPAG, B.FECANU,
							B.STATUS as status2, RTRIM(B.NUMCHE) as numche, (B.MONORD-B.MONDES-B.MONRET) as monord
							FROM OPORDPAG B,  OPRETORD C
							WHERE
							B.NUMORD = C.NUMORD AND
							B.CEDRIF = '".$cedrif."'  AND
							B.FECEMI >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND B.FECEMI <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
							C.CODTIP >= ('".$this->codtipdes."') AND C.CODTIP <= ('".$this->codtiphas."')
							ORDER BY B.NUMORD";
				}

				else
				{
				$this->sql="SELECT DISTINCT(B.NUMORD), to_char(B.FECEMI,'DD/MM/YYYY') as fecemi, B.DESORD, B.FECPAG, B.FECANU,
							B.STATUS as status2, RTRIM(B.NUMCHE) as numche, (B.MONORD-B.MONDES-B.MONRET) as monord
							FROM OPORDPAG B, OPRETORD C
							WHERE
							B.NUMORD = C.NUMORD AND
							B.CEDRIF = '".$cedrif."'  AND
							B.FECEMI >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND B.FECEMI <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
							B.STATUS = '".$this->status."' AND
							C.CODTIP >= ('".$this->codtipdes."') AND C.CODTIP <= ('".$this->codtiphas."') ORDER BY B.NUMORD";


				}
		$contord=0;
		$totret=0;
		$this->setFont("Arial","",8);
	    $tb=$this->bd->select($this->sql);
		while (!$tb->EOF and !$tb0->EOF)
		{
				$this->setFont("Arial","",8);
				$numord=$tb->fields["numord"];
				$contord=$contord+1;
				$contord2=$contord2+1;
  			    $this->cell($this->anchos[0],5,$tb->fields["numord"]);
  			    $x=$this->anchos[0]+10;
  			    $this->SetX($this->anchos[0]+$this->anchos[1]+10);
  			    $this->cell($this->anchos[2],5,$tb->fields["fecemi"]);
  			    $this->cell($this->anchos[3],5,number_format($tb->fields["monord"],2,',','.'));
				$monord=$monord+$tb->fields["monord"];
				$monord2=$monord2+$tb->fields["monord"];
  			    $this->cell($this->anchos[4],5,$tb->fields["numche"]);
				if	($tb->fields["status2"] == 'I')
				{
				$this->cell($this->anchos[5],5,"Pagadas");
				}
				if	($tb->fields["status2"] == 'N')
				{
				$this->cell($this->anchos[5],5,"No Pagadas");
				}
				if	($tb->fields["status2"] == 'A')
				{
				$this->cell($this->anchos[5],5,"Anuladas");
				}
				$this->SetXY($x,$this->GetY());
				$this->Multicell($this->anchos[1],5,substr($tb->fields["desord"],0,80));
			    $this->ln();

			 //-------
				 $this->sql2="select  C.CODTIP, D.DESTIP, C.CODPRE, SUM(C.MONRET) as monret
							from OPRETORD C,OPTIPRET D
							where C.NUMORD = '".$numord."' AND C.CODTIP=D.CODTIP AND
							C.CODTIP >= ('".$this->codtipdes."') AND C.CODTIP <= ('".$this->codtiphas."')
							GROUP BY C.CODTIP, D.DESTIP, C.CODPRE, C.MONRET ORDER BY C.codtip";

             //    print '<pre>' ; print $this->sql2;

				 $tb2=$this->bd->select($this->sql2);
				 $tb3=$this->bd->select($this->sql2);
				 $mret=0;

				 while (!$tb3->EOF)
				 {
		 				 $this->setFont("Arial","",8);
						 $this->cell($this->anchos2[0],5,"");
						 $this->cell($this->anchos2[1],5,$tb3->fields["codtip"]);
						 $this->cell($this->anchos2[2],5,substr($tb3->fields["destip"],0,60));
						 $this->cell($this->anchos2[3],5,$tb3->fields["codpre"]);
						 $this->cell($this->anchos2[4],5,"");
						 $this->cell($this->anchos2[5]-10,5,number_format($tb3->fields["monret"],2,',','.'),0,0,'R');
						 $this->ln();
					    $mret=$mret+$tb3->fields["monret"];
						$totret=$totret+$tb3->fields["monret"];
						$this->acumret=$this->acumret+$tb3->fields["monret"];
						$tb3->MoveNext();
						if ($this->GetY()>=170){
							$this->AddPage();
						}
				 }

				 $this->setFont("Arial","B",8);
				  $this->Line(240,$this->GetY(),270,$this->GetY());
				 $this->cell(200,7,"");
				 $this->cell(35,7,"TOTAL RET BENEFI:       ");
				 $this->cell(30,7," ".number_format($mret,2,',','.'));
				//--------

		$this->ln();
		$tb->MoveNext();
		if ($this->GetY()>=170){
			$this->AddPage();
		}

		}
		$this->setFont("Arial","B",8);
		 $this->cell(60,7,"TOTAL DE ORDENES POR BENEFICIARIO");
		 $this->cell(60,7,$contord);
		 $this->cell(50,7,"TOTAL BENEFICIARIO");
		 $this->cell(60,7,number_format($monord,2,',','.'));
 		$this->ln();
		 $this->cell(60,7,"");
		 $this->cell(60,7,"");
		 $this->cell(50,7,"TOT. RET. BENEFI");
		 $this->cell(60,7,number_format($totret,2,',','.'));
 		$this->ln();
		$tb0->MoveNext();
		if ($this->GetY()>=170){
			$this->AddPage();
		}
		}
		//----------------------------------


		$this->SetLineWidth(0.5);
	    $this->Line(10,$this->GetY(),270,$this->GetY());
		$this->cell(60,7,"TOTAL ORDENES GENERAL");
   	    $this->cell(60,7,$contord2);
   	    $this->cell(50,7,"                                        TOTAL");
		$this->cell(60,7,number_format($monord2,2,',','.'));
		$this->ln();
		$this->cell(150,5,"");
		$this->cell(30,5," TOT. RET        ".number_format($this->acumret,2,',','.'));
		$this->bd->closed();



	}
	}
?>