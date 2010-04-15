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
		var $tsql;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codnivdes;
		var $codnivhas;
		var $codcondes;
		var $codconhas;
		var $tipnomesp;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();

			$this->codnivdes=$_POST["codnivdes"];
			$this->codnivhas=$_POST["codnivhas"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnom=$_POST["tipnom"];
			$this->tipnomesp=$_POST["tipnomesp"];
			$this->elaborado=$_POST["elaborado"];
			$this->elaboradocar=$_POST["elaboradocar"];
			$this->revisado=$_POST["revisado"];
			$this->revisadocar=$_POST["revisadocar"];
			$this->especial = $_POST["especial"];
			if ($this->especial == 'S')
            {
            	$especial = "  c.especial = 'S' and
		C.CODNOMESP = '".$this->tipnomesp."' AND	";
            }
            else
            {
            	$especial = " c.especial = 'N' and ";
            }

			$this->sql="SELECT
						A.CODCAT as codcat,
						RTRIM(B.NOMCAT) as NOMCAT,
						C.CODCON as codcon,
						D.NOMCON as nomcon,D.codpar as codpar,
						SUM((CASE WHEN C.ASIDED='D' THEN C.SALDO ELSE 0 END)) as DEDUC ,
						SUM((CASE WHEN C.ASIDED='A' THEN C.SALDO ELSE 0 END)) as ASIGNA,
 						SUM((CASE WHEN C.ASIDED='P' THEN C.SALDO ELSE 0 END)) as PATRON, to_Char(E.ultfec,'dd/mm/yyyy') as ultfec, to_char(E.profec,'dd/mm/yyyy') as profec
						FROM
						NPASICAREMP A,
						NPCATPRE B,
						NPNOMCAL C,
						NPDEFCPT D , NPNOMINA E
						WHERE
						C.CODNOM = '".$this->tipnom."' AND a.codnom=E.codnom and
						C.CODCON >= '".$this->codcondes."' AND
						C.CODCON <= '".$this->codconhas."' AND".$especial."
						A.CODCAT >= '".$this->codnivdes."' AND
						A.CODCAT <= '".$this->codnivhas."' AND
						A.CODCAT=B.CODCAT AND
						A.CODEMP=C.CODEMP AND a.status='V' and
					--	A.CODCAR=C.CODCAR AND
						C.CODCON=D.CODCON
						GROUP BY
						A.CODCAT,
						B.NOMCAT,
						C.CODCON,
						D.NOMCON,D.CODPAR, E.ultfec, E.profec
						HAVING
						(SUM((CASE WHEN C.ASIDED='D' THEN C.SALDO ELSE 0 END))<>0) OR
						(SUM((CASE WHEN C.ASIDED='A' THEN C.SALDO ELSE 0 END))<>0) OR
						(SUM((CASE WHEN C.ASIDED='P' THEN C.SALDO ELSE 0 END))<>0)
						ORDER BY
						A.CODCAT";
			//H::PrintR($this->sql);exit;
			// print $this->sql;exit;
			 $tb=$this->bd->select($this->sql);
			$this->ultfec=$tb->fields['ultfec'];
			$this->profec=$tb->fields['profec'];

		}
		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
			$this->setTextColor(0,0,150);
			$this->SetXY(122,35);
			$this->cell(25,5,"PERIODO DE: ");
			$this->SetTextColor(0,0,0);
			$this->cell(15,5,$this->ultfec);
			$this->SetTextColor(0,0,128);
			$this->cell(15,5,"  AL  ");
			$this->SetTextColor(0,0,0);
			$this->cell(15,5,$this->profec);
			$this->ln(1);
			$this->setFont("Arial","B",8);
		    $this->cell(35,5,'Codigo Categoria ');
			$this->cell(60,5,'Descripcion Categoria ');
			$this->ln(4);

			$this->ln(4);
			$this->cell(5,3,'');
			$this->cell(40,3,'Codigo Concepto');
			$this->cell(40,3,'Descripcion Concepto');
			$this->cell(40,3,'Partida Presupuestaria');
			$this->cell(28,3,'Asignacion');
			$this->cell(20,3,'Deduccion');
			$this->cell(20,3,'Aporte Patronal');
			$this->ln(6);
			$this->line(10,$this->getY(),200,$this->getY());
			$this->setY(55);
			$this->setTextColor(0,0,0);


		}

		function Cuerpo()
		{
 $tb=$this->bd->select($this->sql);
		    $nom=$tb->fields["nomcat"];
			$ref=$tb->fields["codcat"];
			$sum_asi = 0;
			$sum_deduc = 0;
			$sum_patron = 0;
			$tot_asi = 0;
			$tot_deduc = 0;
			$tot_patron = 0;
			$this->setX(15);
			$this->setTextColor(150,0,0);
			$this->cell(35,5,$tb->fields["codcat"]);
			$this->cell(65,5,$tb->fields["nomcat"]);
			$this->ln(7);
			while (!$tb->EOF)
			{
				if ($ref!=$tb->fields["codcat"])
				{
					$this->ln(3);
					$this->setX(10);
					$this->setFont("Arial","B",8);
					$this->setTextColor(0,0,150);
					$this->cell(100,5,'TOTAL   '.$nom.' : ');
					$this->cell(30,5,number_format($sum_asi,2,',','.'),0,0,'R');
					$this->cell(30,5,number_format($sum_deduc,2,',','.'),0,0,'R');
					$this->cell(30,5,number_format($sum_patron,2,',','.'),0,0,'R');
					$sum_asi = 0;
					$sum_deduc = 0;
					$sum_patron = 0;
					$this->ln(7);
					$this->setTextColor(150,0,0);
					$this->setX(15);
					$this->cell(35,5,$tb->fields["codcat"]);
					$this->cell(65,5,$tb->fields["nomcat"]);
					$this->ln(7);
				}

//DETALLE
				$this->setTextColor(0,0,0);
				$this->setFont("Arial","B",7);
				$this->setX(15);
				//$this->cell(25,5,$tb->fields["codcon"]);$y=$this->getY();
				//$this->multicell(35,5,$tb->fields["nomcon"]);
				//$this->multicell(25,5,$tb->fields["codpar"]);
				//$this->setY($y);
				//$this->cell(30,5,number_format($tb->fields["asigna"],2,',','.'),0,0,'R');
				$sum_asi = $sum_asi +  $tb->fields["asigna"];
				$tot_asi = $tot_asi + $tb->fields["asigna"];
				//$this->cell(30,5,number_format($tb->fields["deduc"],2,',','.'),0,0,'R');
				$sum_deduc = $sum_deduc +  $tb->fields["deduc"];
				$tot_deduc = $tot_deduc +  $tb->fields["deduc"];
				//$this->cell(30,5,number_format($tb->fields["patron"],2,',','.'),0,0,'R');
				$sum_patron = $sum_patron +  $tb->fields["patron"];
				$tot_patron = $tot_patron +  $tb->fields["patron"];

				$this->SetWidths(array(25,50,5,30,2,25,25,25));
				$this->SetAligns(array("C","L","C","C","C","R","R","R"));
				//$this->setBorder(1);
				$this->Row(array($tb->fields["codcon"],$tb->fields["nomcon"],"",$tb->fields["codpar"],"",H::FormatoMonto($tb->fields["asigna"]), H::FormatoMonto($tb->fields["deduc"]),H::FormatoMonto($tb->fields["patron"])));



				//$this->ln();


				$ref=$tb->fields["codcat"];
				$nom=$tb->fields["nomcat"];
				$tb->MoveNext();

			}
			    $this->ln(3);
				$this->setX(10);
				$this->setFont("Arial","B",8);
				$this->setTextColor(0,0,150);
				$this->cell(118,5,'TOTAL   '.$nom.' : ');
				$this->cell(25,5,H::FormatoMonto($sum_asi),0,0,'R');
				$this->cell(25,5,H::FormatoMonto($sum_deduc),0,0,'R');
				$this->cell(25,5,H::FormatoMonto($sum_patron),0,0,'R');
				$this->ln(8);

				//TOTALES GENERALES
				$this->setFont("Arial","B",8);
				$this->setTextColor(0,0,150);
				$this->usql="SELECT DISTINCT B.NOMNOM as nomnom
								FROM NPNOMCAL A,NPNOMINA B
								WHERE A.CODNOM=B.CODNOM
								AND B.CODNOM = '".$this->tipnom."' ";
				$tbu = $this->bd->select($this->usql);

				$this->setX(10);
				$this->cell(118,5,'TOTAL   '.$tbu->fields["nomnom"].' : ',1,0);
				$this->cell(25,5,H::FormatoMonto($tot_asi),1,0,'R');
				$this->cell(25,5,H::FormatoMonto($tot_deduc),1,0,'R');
				$this->cell(25,5,H::FormatoMonto($tot_patron),1,0,'R');

			 $this->setXY(20,240);
			 $this->setFont("Arial","B",8);
			 $this->setTextColor(0,0,0);
			 $this->cell(50,5,'Elaborado Por',0,0,'C');
			 $this->cell(60,5,"");
			 $this->cell(50,5,'Revisado Por',0,0,'C');
			 $this->ln(5);
			 $this->setFont("Arial","BU",8);
			 $this->setX(20);
			 $this->cell(50,5,$this->elaborado,0,0,'C');
			 $this->cell(60,5,"");
			 $this->cell(50,5,$this->revisado,0,0,'C');
		     $this->ln(4);
		     $this->setFont("Arial","B",8);
		     $this->setX(20);
			 $this->cell(50,5,$this->elaboradocar,0,0,'C');
			 $this->cell(60,5,"");
			 $this->cell(50,5,$this->revisadocar,0,0,'C');

		}
	}//class
?>