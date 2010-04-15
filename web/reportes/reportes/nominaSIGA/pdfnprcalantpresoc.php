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
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codempdes;
		var $codemphas;
		
				
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
			$this->codempdes=$_POST["emp1"];
			$this->codemphas=$_POST["emp2"];
			
							
			
			$this->tsql= "SELECT DISTINCT(a.codemp)  as codemp,
						C.NOMEMP,
						to_char(D.feccor,'dd/mm/yyyy') as feccor,
						D.ANOSER,
						D.MESSER,
						D.DIASER,
						to_char(D.feccal,'dd/mm/yyyy') as feccal,
						to_char(B.feccal,'dd/mm/yyyy') as fecing
						from NPANTPRE A,NPHOJINT C, NPPRESOC D,NPASIEMPCONT B
						where 
						a.codemp=c.codemp and
						A.CODEMP=D.CODEMP AND
						A.CODEMP=B.CODEMP AND
						a.codemp>= RPAD('".$this->codempdes."',16,' ') AND
						a.codemp <= RPAD('".$this->codemphas."',16,' ')
						order by a.codemp";
						
			$this->sql= "SELECT A.*,
						to_char(A.fecant,'dd/mm/yyyy') as fecantemp,
						C.NOMEMP,
						to_char(D.feccor,'dd/mm/yyyy') as feccor,
						D.ANOSER,
						D.MESSER,
						D.DIASER,
						to_char(D.feccal,'dd/mm/yyyy') as feccal,
						to_char(B.feccal,'dd/mm/yyyy') as fecing
						from NPANTPRE A,NPHOJINT C, NPPRESOC D,NPASIEMPCONT B
						where 
						a.codemp=c.codemp and
						A.CODEMP=D.CODEMP AND
						A.CODEMP=B.CODEMP AND
						a.codemp>= RPAD('".$this->codempdes."',16,' ') AND
						a.codemp <= RPAD('".$this->codemphas."',16,' ')
						order by a.codemp,A.fecant";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s");
			$this->setFont("Arial","B",8);		
		}
		function Cuerpo()
		{
		
		    $tb=$this->bd->select($this->tsql);
		    $tb2=$this->bd->select($this->sql);
		  
			while (!$tb->EOF) // while 
			{
			    if ($this->getY() > 220 )
				{
				  $this->AddPage();
				}
		       	$this->setFont("Arial","B",8);
			    $this->SetX(10);
				$this->SetFillColor(195,195,195);
				$this->cell(25,5,$tb->fields["codemp"],0,0,'C',1);
				$this->cell(2,5," ");
				$this->cell(164,5,strtoupper($tb->fields["nomemp"]),0,0,'C',1);
				$this->SetFillColor(0,0,0);
				$this->ln(7);
				$this->SetTextColor(0,0,128);
				$this->cell(31,5,"FECHA DE INGRESO:");
                $this->SetTextColor(0,0,0);
				$this->cell(102,5,$tb->fields["fecing"]);

				$this->SetTextColor(0,0,128);				
				$this->cell(35,5,"TIEMPO DE SERVICIO");
                $this->SetTextColor(0,0,0);
			    $this->ln(5);
				$this->SetTextColor(0,0,128);
				$this->cell(31,5,"FECHA DE CORTE:");
                $this->SetTextColor(0,0,0);
				$this->cell(23,5,$tb->fields["feccor"]);
				$this->SetTextColor(0,0,128);
				$this->cell(32,5,"FECHA DE CALCULO:");
                $this->SetTextColor(0,0,0);
				$this->cell(48,5,$tb->fields["feccor"]);
				$this->cell(10,5,"Años:   ");
				$this->cell(10,5,$tb->fields["anoser"]);
				$this->cell(10,5,"Meses:   ");
				$this->cell(10,5,$tb->fields["messer"]);
				$this->cell(10,5,"Días:   ");
				$this->cell(10,5,$tb->fields["diaser"]);
				$this->ln(7);
				$this->line(10,$this->getY(),200,$this->getY());	
				$this->ln(1);

				$ok=true;
				$ref=$tb->fields["codemp"];			
				$cont=0;
				$this->cell(70,5,"");
				$this->SetTextColor(0,0,128);
				$this->cell(40,5,"FECHA DEL");
				$this->cell(30,5,"MONTO DEL");
				$this->ln(3);
				$this->cell(71,5,"");
				$this->cell(40,5,"ANTICIPO");
				$this->cell(30,5,"ANTICIPO");
				$this->ln(5);				
				$this->line(77,$this->getY(),100,$this->getY());
				$this->line(117,$this->getY(),140,$this->getY());
				$this->ln(1);
				while((!$tb2->EOF)&&($ok==true))
				{
					if($tb2->fields["codemp"]!=$ref)
					{
						$cont=$cont+1;
						$ok=false;
					}
					else
					{					
						$this->SetTextColor(0,0,0);
						$this->setFont("Arial","",8); 
						$this->cell(71,5,"");
						$this->cell(39,5,$tb2->fields["fecantemp"]);
						$this->cell(30,5,number_format($tb2->fields["monant"],2,'.',','));
						$this->ln(5);
						$tb2->MoveNext();
					}
				}//while((!$tb->EOF)&&($ok==true))
				$this->line(10,$this->getY(),200,$this->getY());	
				$this->ln(3);
			    $tb->MoveNext(); 
            }//while				
 
		}
	}
?>