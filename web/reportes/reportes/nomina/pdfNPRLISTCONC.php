<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
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
		var $pf_10;
		var $codempdes;
		var $codemphas;
		var $codcardes;
		var $codcarhas;
		var $codcondes;
		var $codconhas;
		var $fecreg1;
		var $fecreg2;
		var $codnom;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->pf_10     = $_POST["pf_10"];
			$this->codempdes = $_POST["codempdes"];
			$this->codemphas = $_POST["codemphas"];
			$this->codcardes = $_POST["codcardes"];
			$this->codcarhas = $_POST["codcarhas"];
			$this->codcondes = $_POST["codcondes"];
			$this->codconhas = $_POST["codconhas"];
			$this->fecreg1   = $_POST["fecreg1"];
			$this->fecreg2   = $_POST["fecreg2"];
			$this->codnom    = $_POST["codnom"];
			$this->especial    = $_POST["especial"];
			$this->tipnomesp1=$_POST["tipnomesp"];


               if ($this->especial == 'S')
            {
                $especial = " a.especial = 'S' AND
                              (A.CODNOMESP) = TRIM('".$this->tipnomesp1."') AND   ";
             }
            else
            {  if ($this->especial == 'N')           $especial = " a.especial = 'N' AND";
            }


				if ($this->pf_10=='t')
				{
				$this->sql="SELECT A.CODEMP, D.NOMCON, A.CODCON, A.CODCAR,sum(a.saldo) as saldo, A.CODNOM, C.NOMEMP, C.CEDEMP, C.CODBAN, E.NOMBAN,
							B.NOMCAR, D.OPECON, D.CODCON, D.IMPCPT
							FROM npasicaremp f,npnomcal a left outer join  NPCARGOS B on (A.CODCAR=B.CODCAR)
							left outer join   NPDEFCPT D on (A.CODCON=D.CODCON),
							NPHOJINT C
							LEFT OUTER JOIN NPBANCOS E ON (C.CODBAN=E.CODBAN)
							WHERE
							a.saldo<>0.00 AND
							(A.CODEMP) >= ('".$this->codempdes."') AND (A.CODEMP) <= ('".$this->codemphas."') AND
							A.CODCAR >= ('".$this->codcardes."') AND A.CODCAR <= ('".$this->codcarhas."') AND
							A.CODCON >= ('".$this->codcondes."') AND A.CODCON <= ('".$this->codconhas."') AND
							A.CODNOM = '".$this->codnom."' and
							A.CODEMP=C.CODEMP AND
							A.CODEMP=f.CODEMP AND
							A.CODCAR=f.CODCAR AND ".$especial."
							A.CODNOM=f.CODNOM AND F.STATUS='V'
							group by
							A.CODEMP,d.NOMCON,A.CODCON,A.CODCAR,A.CODNOM,C.NOMEMP,C.CEDEMP,C.CODBAN,E.NOMBAN,B.NOMCAR,D.OPECON,D.CODCON,D.IMPCPT
							ORDER BY A.CODCON,cast(REPLACE(c.cedemp,'.', '') as int )";
					//		print '<pre>'; print $this->sql; exit;
			}
		else
			{
				$this->sql="SELECT A.CODEMP, D.NOMCON, A.CODCON, A.CODCAR,sum(a.saldo) as saldo, A.CODNOM, C.NOMEMP, C.CEDEMP, C.CODBAN, E.NOMBAN,
							B.NOMCAR, D.OPECON, D.CODCON, D.IMPCPT
							FROM npasicaremp f,npnomcal a left outer join  NPCARGOS B on (A.CODCAR=B.CODCAR)
							left outer join   NPDEFCPT D on (A.CODCON=D.CODCON),
							NPHOJINT C
							LEFT OUTER JOIN NPBANCOS E ON (C.CODBAN=E.CODBAN)
							WHERE
							a.saldo<>0.00 AND
							(A.CODEMP) >= ('".$this->codempdes."') AND (A.CODEMP) <= ('".$this->codemphas."') AND
							A.CODCAR >= ('".$this->codcardes."') AND A.CODCAR <= ('".$this->codcarhas."') AND
							A.CODCON >= ('".$this->codcondes."') AND A.CODCON <= ('".$this->codconhas."') AND
							A.CODNOM = '".$this->codnom."' AND
							D.OPECON = '".$this->pf_10."' and
							A.CODEMP=C.CODEMP AND
							A.CODEMP=f.CODEMP AND
							A.CODCAR=f.CODCAR AND ".$especial."
							A.CODNOM=f.CODNOM AND F.STATUS='V'
							group by
							A.CODEMP,d.NOMCON,A.CODCON,A.CODCAR,A.CODNOM,C.NOMEMP,C.CEDEMP,C.CODBAN,E.NOMBAN,B.NOMCAR,D.OPECON,D.CODCON,D.IMPCPT
							ORDER BY A.CODCON,cast(REPLACE(c.cedemp,'.', '') as int )";
			}
//print '<pre>'; print $this->sql;
//			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

		}

/*		function llenartitulosmaestro()
		{
				$this->titulos[0]="Tipo";
				$this->titulos[1]="N�mero Cheque ";
				$this->titulos[2]="Beneficiario";
				$this->titulos[3]="Orden de Pago";
				$this->titulos[4]="Fecha Emision";
				$this->titulos[5]="Monto Cheque";

		}*/

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],7,$this->titulos2[$i]);
			}

		}



			function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$tb;
			$this->setFont("Arial","B",8);
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["codcon"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
	 			 $this->SetTextColor(0,0,128);
			//-----------------------sql2--------------------------
			 $this->sql2="SELECT NOMNOM as nombre FROM NPNOMINA WHERE
			 codnom='".$this->codnom."'";
			 $tb2b=$this->bd->select($this->sql2);
			 $this->cell(0,5,"Nómina: ".$tb2->fields["codnom"]."      ".strtoupper($tb2b->fields["nombre"])."   Del:".$this->fecreg1."    Al:".$this->fecreg2);
			//-----------------------fin--------------------------
				// $this->cell(45,5,"            Del:".$this->fecreg1);
 				// $this->cell(45,5,"            Al:".$this->fecreg2);
 				 $this->SetTextColor(0,0,0);
				 $this->ln();
 				 $this->Line(10,$this->GetY(),200,$this->GetY());
				 $this->setFont("Arial","",8);
				 $this->cell(50,4,"   Código Concepto  ");
				 $this->cell(100,4,"   Descripción Concepto  ");
				 $this->ln();
				 $this->cell(50,4,"   ".strtoupper($tb2->fields["codcon"]));
				 $this->cell(100,4,"   ".strtoupper($tb2->fields["nomcon"]));
				 $this->ln();
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
				 $this->cell(30,4,"Cédula");
				 $this->cell(65,4,"Nombre");
				 $this->cell(70,4,"Cargo");
				 $this->cell(23,4,"Monto Concepto");
				 $this->ln();

	 			 $this->SetLineWidth(0.4);
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
 		  		  $this->ln();
			}
			while(!$tb->EOF)
			{
				if($tb->fields["codcon"]!=$ref)
				{
			 $this->SetLineWidth(0.2);
				 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","",8);
				 $this->cell(20,8,"         TOTAL CONCEPTO:  ".strtoupper( $codcon."      ".strtoupper( $nomcon)));
 		  		 $this->Line(175,$this->GetY(),199,$this->GetY());
				 $this->ln(1);
				 $this->ln(-1);
 				 $this->cell(30,8,"");
				 $this->cell(65,8,"");
				 $this->cell(70,8,"");
				 $this->cell(23,8,"".number_format($this->acum2,2,'.',','),0,0,"R");
				 $this->ln();
				 $this->cell(20,4,"         CANTIDAD TRABAJADORES:         ".$this->cont);
				 $this->ln(200);
 				 $this->cell(20,4,"");
				 $this->cont=0;
				 $this->acum2=0;
 //		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
				 $this->ln(1);
				 $this->ln(-1);
		 		 $this->setFont("Arial","B",8);
	 			 $this->SetTextColor(0,0,128);
			//-----------------------sql2--------------------------
			 $this->sql2="SELECT NOMNOM as nombre FROM NPNOMINA WHERE
			 codnom='".$this->codnom."'";
			 $tb2b=$this->bd->select($this->sql2);
			// $this->cell(80,5,"Nómina: ".$tb->fields["codnom"]."      ".strtoupper($tb2b->fields["nombre"]));
			 $this->cell(0,5,"Nómina: ".$tb2->fields["codnom"]."      ".strtoupper($tb2b->fields["nombre"])."   Del:".$this->fecreg1."    Al:".$this->fecreg2);
			//-----------------------fin--------------------------
				// $this->cell(45,5,"            Del:".$this->fecreg1);
 				// $this->cell(45,5,"            Al:".$this->fecreg2);
 				 $this->SetTextColor(0,0,0);
				 $this->ln();
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
				 $this->setFont("Arial","",8);
				 $this->cell(50,4,"   Código Concepto  ");
				 $this->cell(100,4,"   Descripción Concepto  ");
				 $this->ln();
				 $this->cell(50,4,"   ".$tb->fields["codcon"]);
				 $this->cell(100,4,"   ".$tb->fields["nomcon"]);
				 $this->ln();
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
				 $this->cell(30,4,"Cédula");
				 $this->cell(65,4,"Nombre");
				 $this->cell(70,4,"Cargo");
				 $this->cell(23,4,"Monto Concepto");
				 $this->ln();

	 			 $this->SetLineWidth(0.4);
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
 		  		   $this->ln();
		        }
				$ref=$tb->fields["codcon"];
				$this->setFont("Arial","",8);
				//Detalle
				 $aux=$tb->fields["anomben"];
				 $codcon=$tb->fields["codcon"];
				 $nomcon=$tb->fields["nomcon"];
				 $this->cell(30,5,$tb->fields["codemp"]);
				 $this->cell(65,5,$tb->fields["nomemp"]);
				 $this->cell(70,5,"");
				 $this->cell(23,5,"".number_format($tb->fields["saldo"],2,'.',','),0,0,"R");
				 $this->setx(105);
				 $this->multicell(70,3,$tb->fields["nomcar"]);
				 $this->cont=($this->cont+1);
				 $this->cont1=($this->cont1+1);
 				 $this->acum2=($this->acum2+$tb->fields["saldo"]);
				 $this->ln(1);
				 $tb->MoveNext();


			 }
				 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","",8);
				 $this->cell(20,8,"         TOTAL CONCEPTO:  ".strtoupper($codcon."      ".strtoupper($nomcon)));
 		  		 $this->Line(175,$this->GetY(),199,$this->GetY());
				 $this->ln(1);
				 $this->ln(-1);
 				 $this->cell(30,8,"");
				 $this->cell(65,8,"");
				 $this->cell(70,8,"");
				 $this->cell(23,8,"".number_format($this->acum2,2,'.',','),0,0,"R");
				 $this->ln();
				 $this->cell(20,4,"         CANTIDAD TRABAJADORES:         ".$this->cont);

		}


	}
?>