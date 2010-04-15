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
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codnivdes=$_POST["codnivdes"];
			$this->codnivhas=$_POST["codnivhas"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
		
			$this->tsql="SELECT DISTINCT(A.CODCAT)  as codcat,B.NOMCAT as  nomcat  FROM
								NPASICAREMP A,
								NPCATPRE B
								WHERE   
								A.CODCAT=B.CODCAT AND
								A.CODCAT>= '".$this->codnivdes."' AND
								A.CODCAT<= '".$this->codnivhas."'
								ORDER BY
								A.CODCAT";		
								
			$this->sql="SELECT	A.CODCAT as codcatemp,
						C.CODCON,
						C.NOMCON,
						SUM((CASE WHEN C.ASIDED='D' THEN C.SALDO ELSE 0 END)) as DEDUC ,
						SUM((CASE WHEN C.ASIDED='A' THEN C.SALDO ELSE 0 END)) as ASIGNA
						FROM
						NPASICAREMP A,
						NPNOMCAL C,
						NPDEFCPT D
						WHERE
						A.CODEMP=C.CODEMP AND
						A.CODCAR=C.CODCAR AND
						C.CODCON=D.CODCON AND
					    (C.CODCON) >= RPAD('".$this->codcondes."',3,' ') AND
						(C.CODCON) <= RPAD('".$this->codconhas."',3,' ') AND   
						A.CODCAT>= '".$this->codnivdes."' AND
						A.CODCAT<= '".$this->codnivhas."'
						GROUP BY
						A.CODCAT,
						C.CODCON,
						C.NOMCON
						ORDER BY
						A.CODCAT";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
						
			$this->ln(1);
			$this->setFont("Arial","B",8); 
		    $this->cell(35,5,'Código Categoría ');
			$this->cell(60,5,'Descripción Categoria ');
			$this->ln(4);
			
			$this->ln(4); 
			$this->cell(35,3,'');
			$this->cell(40,3,'Código Concepto');
			$this->cell(70,3,'Descripción Concepto');
			$this->cell(28,3,'Asignación');
			$this->cell(20,3,'Deducción');
			$this->ln(6);
			$this->line(10,$this->getY(),200,$this->getY());

			
		}
		
		function Cuerpo()
		{			
		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->tsql);
			while(!$tb2->EOF)
			{			
				$this->setFont("Arial","B",8);
				$this->cell(35,8,$tb2->fields["codcat"]);
   			    $this->cell(60,8,strtoupper($tb2->fields["nomcat"]));
				$this->ln(4);
				$ok=true;
				$ref=$tb2->fields["codcat"];
				
				while((!$tb->EOF)&&($ok==true))
				{
					if($tb->fields["codcatemp"]!=$ref)
					{
						$cont=$cont+1;
						$ok=false;
					}
					else
					{
						$this->setFont("Arial","",8); 
						$this->cell(35,8,"");
						$this->cell(40,8,$tb->fields["codcon"]);
						$this->cell(70,8,$tb->fields["nomcon"]);
						$this->cell(28,8,number_format($tb->fields["asigna"],2,'.',','));
						$this->cell(20,8,number_format($tb->fields["deduc"],2,'.',','));
						$this->ln(4);
						$tb->MoveNext();
					}
				}
				
				 $tb2->MoveNext();
			}//while((!$tb2->EOF))
		}// end cuerpo
	}//class
?>