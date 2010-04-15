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
			$this->fecnomdes=$_POST["fecnomdes"];
			$this->fecnomhas=$_POST["fecnomhas"];			
			$this->tipnom=$_POST["tipnom"];					
 			
			$this->sql="SELECT
						C.CODCAT as codcat,
						RTRIM(B.NOMCAT) as NOMCAT,
						C.CODCON as codcon,
						D.NOMCON as nomcon,
						SUM((CASE WHEN D.OPECON='D' THEN C.MONTO ELSE 0 END)) as DEDUC ,
						SUM((CASE WHEN D.OPECON='A' THEN C.MONTO ELSE 0 END)) as ASIGNA,
 						SUM((CASE WHEN D.OPECON='P' THEN C.MONTO ELSE 0 END)) as PATRON
						FROM
						NPCATPRE B left outer join 	NPHISCON C on (C.CODCAT=B.CODCAT),
						NPDEFCPT D
						WHERE
						C.CODNOM= '".$this->tipnom."' AND
						C.FECNOM>= ('".$this->fecnomdes."') AND
						C.FECNOM<= ('".$this->fecnomhas."') AND
						C.CODCON >= '".$this->codcondes."' AND
						C.CODCON <= '".$this->codconhas."' AND
						C.CODCAT >= '".$this->codnivdes."' AND
						C.CODCAT <= '".$this->codnivhas."' AND						
						C.CODCON=D.CODCON
						GROUP BY
						C.CODCAT,
						B.NOMCAT,
						C.CODCON,
						D.NOMCON
						HAVING
						(SUM((CASE WHEN D.OPECON='D' THEN C.MONTO ELSE 0 END))<>0) OR
						(SUM((CASE WHEN D.OPECON='A' THEN C.MONTO ELSE 0 END))<>0) OR
						(SUM((CASE WHEN D.OPECON='P' THEN C.MONTO ELSE 0 END))<>0)						
						ORDER BY
						C.CODCAT";		
			//print $this->sql;exit;
								
			$this->usql="SELECT DISTINCT B.NOMNOM as nomnom
								FROM NPNOMCAL A,NPNOMINA B
								WHERE A.CODNOM=B.CODNOM
								AND B.CODNOM = '".$this->tipnom."' ";
			$tbu = $this->bd->select($this->usql);
			$this->nomnom=$tbu->fields["nomnom"];
			
		}	
		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",7);
			$this->setXY(148,30);
			$this->cell(50,5,'DESDE:  '.$this->fecnomdes.'    HASTA:   '.$this->fecnomhas);
			$this->ln(4);
			$this->setTextColor(0,0,150);						
			$this->ln(1);
			$this->setFont("Arial","B",8); 
		    $this->cell(35,5,'Codigo Categoria ');
			$this->cell(60,5,'Descripcion Categoria ');
			$this->ln(4);
			
			$this->ln(4); 
			$this->cell(5,3,'');
			$this->cell(40,3,'Codigo Concepto');
			$this->cell(70,3,'Descripcion Concepto');
			$this->cell(28,3,'Asignacion');
			$this->cell(20,3,'Deduccion');
			$this->cell(20,3,'Aporte Patronal');
			$this->ln(6);
			$this->line(10,$this->getY(),200,$this->getY());
			$this->setY(53);
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
					$this->cell(30,5,number_format($sum_asi,2,'.',','),0,0,'R');
					$this->cell(30,5,number_format($sum_deduc,2,'.',','),0,0,'R');
					$this->cell(30,5,number_format($sum_patron,2,'.',','),0,0,'R');
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
				$this->setX(20);
				$this->cell(25,5,$tb->fields["codcon"]);
				$this->cell(65,5,$tb->fields["nomcon"]);
				$this->cell(30,5,number_format($tb->fields["asigna"],2,'.',','),0,0,'R');
				$sum_asi = $sum_asi +  $tb->fields["asigna"];
				$tot_asi = $tot_asi + $tb->fields["asigna"];
				$this->cell(30,5,number_format($tb->fields["deduc"],2,'.',','),0,0,'R');
				$sum_deduc = $sum_deduc +  $tb->fields["deduc"];
				$tot_deduc = $tot_deduc +  $tb->fields["deduc"];
				$this->cell(30,5,number_format($tb->fields["patron"],2,'.',','),0,0,'R');
				$sum_patron = $sum_patron +  $tb->fields["patron"];
				$tot_patron = $tot_patron +  $tb->fields["patron"];
				
				
				$this->ln(4);
				
				
				$ref=$tb->fields["codcat"];
				$nom=$tb->fields["nomcat"];
				$tb->MoveNext();
				
			}
			    $this->ln(3);
				$this->setX(10);
				$this->setFont("Arial","B",8);
				$this->setTextColor(0,0,150);
				$this->cell(100,5,'TOTAL   '.$nom.' : ');
				$this->cell(30,5,number_format($sum_asi,2,'.',','),0,0,'R');
				$this->cell(30,5,number_format($sum_deduc,2,'.',','),0,0,'R');
				$this->cell(30,5,number_format($sum_patron,2,'.',','),0,0,'R');
				$this->ln(8);
				
				//TOTALES GENERALES
				$this->setFont("Arial","B",8);
				$this->setTextColor(0,0,150);
				
				
				$this->setX(40);
				$this->cell(70,5,'TOTAL   '.$this->nomnom.' : ');
				$this->cell(30,5,number_format($tot_asi,2,'.',','),0,0,'R');
				$this->cell(30,5,number_format($tot_deduc,2,'.',','),0,0,'R');
				$this->cell(30,5,number_format($tot_patron,2,'.',','),0,0,'R');
			
		}
	}//class
?>