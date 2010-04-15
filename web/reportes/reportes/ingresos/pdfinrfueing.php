<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $codigo1;
		var $codigo2;
		var $nombre1;
		var $nombre2;
		var $nac;
		var $nacionalidad;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Legal");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->nombre1=$_POST["nombre1"];
			$this->nombre2=$_POST["nombre2"];
			$this->abre1=$_POST["abre1"];
			$this->abre2=$_POST["abre2"];

			/*$this->AUXNAC="";
			$this->AUXNAC2="";

				if ($this->nac=='A'){
  					$this->AUXNAC2='E';
  					$this->AUXNAC='V';
  					}
  				else if ($this->nac=='V'){
  					$this->AUXNAC2='V';
  					$this->AUXNAC='V';
  					}
  				else if(	$this->nac=='E'){
  					$this->AUXNAC2='E';
  					$this->AUXNAC='E';
  					}*/

/*SELECT CODFUE,
NOMFUE,
NOMABR,
FRECOB,
MONMOR,
PERMOR,
PROPAG,
PERPPG,
DEUFEC,
RECFEC,
FECUFA,
INGREC,
FUEING,
INIEJE,
FINEJE,
DIAVSO,
CODPREI,
DEUFRA,
AUTLIQ,
SIMPRE,
MONCOB
FROM INFUEPRE
WHERE CODFUE>=:CODFUEDES AND
CODFUE<=:CODFUEHAS AND
NOMFUE>=:NOMFUEDES AND
NOMFUE<=:NOMFUEHAS AND
NOMABR>=:NOMABRDES AND
NOMABR<=:NOMABRHAS
ORDER BY CODFUE*/


		$this->sql="SELECT distinct( CODFUE),
							NOMFUE,
							NOMABR,
							FRECOB,
							MONMOR,
							PERMOR,
							PROPAG,
							PERPPG,
							DEUFEC,
							RECFEC,
							FECUFA,
							INGREC,
							FUEING,
							INIEJE,
							FINEJE,
							DIAVSO,
							CODPREI,
							DEUFRA,
							AUTLIQ,
							SIMPRE,
							MONCOB
							FROM INFUEPRE
							WHERE CODFUE>='".$this->cod1."'  AND
							CODFUE<='".$this->cod2."'  AND
							NOMFUE>='".$this->nombre1."' AND
							NOMFUE<='".$this->nombre2."'AND
							NOMABR>='".$this->abre1."' AND
							NOMABR<='".$this->abre2."'
							ORDER BY CODFUE
							";
					//print ($this->sql);
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,20);
		}

	function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->SetDrawColor(255,255,255);
			$this->Line(10,35,270,35);
			$this->SetDrawColor(0,0,0);
			$this->SetTextColor(135,0,0);
		    $this->setFont("Arial","B",8);
			$this->Line(10, $this->getY(),340,$this->getY());

// aqui van los titulos

			$this->setFont("Arial","B",7);
			$this->SetTextColor(0,0,128);
		$this->Setx(10);
			$this->cell(20,5,"CODIGO: ");
		$this->Setx(30);
			$this->cell(20,5,"NOMBRE: ");
		$this->Setx(50);
			$this->cell(10,5,"ABREV.: ");
		$this->Setx(70);
			$this->cell(10,5,"FREC.: ");
		$this->Setx(90);
			$this->cell(25,5,"TOTAL");
		$this->Setx(120);
			$this->cell(25,5,"TOTAL");
		$this->Setx(150);
			$this->cell(25,5,"TOTAL");

			$this->Setx(180);
			$this->cell(20,5,"INICIO ");

			$this->Setx(205);
			$this->cell(20,5,"FIN");


			$this->Setx(230);
			$this->cell(20,5,"ULTIMA ");

			$this->Setx(250);
			$this->cell(20,5,"RECARGO ");

			$this->Setx(270);
			$this->cell(20,5,"DCTO.POR ");

			$this->Setx(295);
			$this->cell(20,5,"PERIODO");

			$this->Setx(315);
			$this->cell(15,5,"PERIODO DE ");


			// SEGUNDA LINEA
			$this->ln();
			$this->Setx(90);
			$this->cell(25,5,"DEUDA");

			$this->Setx(120);
			$this->cell(25,5,"RECAUDO");

			$this->Setx(150);
			$this->cell(20,5,"PENDIENTE: ");

			$this->Setx(180);
			$this->cell(20,5,"PERIODO: ");

			$this->Setx(205);
			$this->cell(20,5,"PERIODO: ");


			$this->Setx(230);
			$this->cell(20,5,"FACTURA: ");

		   $this->Setx(250);
			$this->cell(20,5,"POR MORA: ");

			$this->Setx(270);
			$this->cell(20,5,"PRONTO PAGO: ");


			$this->Setx(295);
			$this->cell(20,5,"DE MORA: ");

			$this->Setx(315);
			$this->cell(15,5,"PRONTO PAGO: ");

			 $this->ln(4);
			 $this->Line(10, $this->getY()+3,340,$this->getY()+3);
			 $this->Sety(50);
		}

		function Cuerpo()
		{
			$this->setFont("Arial","",7);
			$this->SetFillColor(255,255,255);
		    $tb=$this->bd->select($this->sql);

		 while(!$tb->EOF)
			 {
						$this->Setx(10);
						$this->cell(20,5,$tb->fields["codfue"]);// codigo
						$this->Setx(30);
						$this->cell(20,5,$tb->fields["nomfue"]);//nombre
					   $this->Setx(50);
						$this->cell(20,5,$tb->fields["nomabr"]);//abreviado
			        	$this->Setx(70);
						$this->cell(20,5,$tb->fields["frecob"]);//fre
							$this->Setx(90);
						$this->cell(20,5,number_format($tb->fields["deufec"],2,'.',','),0,0,'R'); //deuda
			        	$this->Setx(120);
						$this->cell(20,5,number_format($tb->fields["recfec"],2,'.',','),0,0,'R');// recaudo


			 			 $totpen=($tb->fields["deufec"]-$tb->fields["recfec"]); // total pendiente
			 			 	$this->Setx(150);
						$this->cell(20,5,number_format($this->totpen,2,'.',','),0,0,'R');


							$this->Setx(180);
						$this->cell(20,5,$tb->fields["inieje"]);// inicio del periodo

				    	$this->Setx(205);

						$this->cell(20,5,$tb->fields["fineje"]);//fin del periodo

						$this->Setx(230);

						$this->cell(20,5,$tb->fields["fecufa"]);// fecaha ultima factura

						$this->Setx(250);

						$this->cell(20,5,number_format($tb->fields["recfec"],2,'.',','),0,0,'R'); //recargo de mora
						$this->Setx(270);
						$this->cell(20,5,number_format($tb->fields["propag"],2,'.',','),0,0,'R'); // descuento por pronto pago

							$this->Setx(295);
						$this->cell(20,5,$tb->fields["premor"]);// preiodo por mora
								$this->Setx(315);
						$this->cell(20,5,$tb->fields["perppg"]);//pronto pago


  			  $this->ln(3);

			  $tb->MoveNext();
  			  $this->ln(3);
  		  	}	//end while

//totales
			if ($this->getY() >230 )
			{
				$this->AddPage();
			}
			 $this->ln(4);



		}
	}
?>