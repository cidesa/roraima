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
			$this->sql="SELECT a.*,to_char(B.feccal,'dd/mm/yyyy') as fecing,to_char(a.feccal,'dd/mm/yyyy') as feccal1,to_char(a.feccal-1,'dd/mm/yyyy') as feccal, c.nomemp 
						from NPPRESOCAnt a, NPasiempcont b  ,NPHOJINT c
						where 
						a.codemp=c.codemp and
						a.codemp>= RPAD('".$this->codempdes."',16,' ') AND
						a.codemp <= RPAD('".$this->codemphas."',16,' ')AND
						a.codemp=b.codemp"; 		
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s");
			$this->setFont("Arial","B",8);		
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		  
			$ref="";
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$totacum1=0;
			$totacum2=0;
			$totacum3=0;
			$acumulado=0;
			$cont=0;
			$contador=0;
			$total1=0;
			$total2=0;
			$total3=0;
			$neto=0;
			$totalneto=0;
			while (!$tb->EOF) // while 
			{
			    $valor=0;
                $sqlmon="SELECT coalesce(sum(monasi),0) as valor FROM NPSALINT WHERE FECFINCON=to_date('31/12/1996','dd/mm/yyyy') AND  CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') ";        
			    $tbDev=$this->bd->select($sqlmon);	
				if(!$tbDev->EOF)
				{
					$valor=$tbDev->fields["valor"];
				}
                $this->SetX(10);
				//$this->ln(5);
				$this->SetFillColor(195,195,195);
				$this->cell(80,5,$tb->fields["codemp"].'           '.strtoupper($tb->fields["nomemp"]),0,0,'',1);
				$this->SetFillColor(0,0,0);
				$this->ln(5);
				$this->SetTextColor(0,0,128);
				$this->cell(45,5,"DEVENGADO AL 31/12/1996 Bs:");
                $this->SetTextColor(0,0,0);
				$this->cell(65,5,number_format($valor,2,'.',','));				
				$this->SetTextColor(0,0,128);
				$this->cell(35,5,"TIEMPO DE SERVICIO");
                $this->SetTextColor(0,0,0);
			    $this->ln(5);
			    $this->cell(110,5,"");
				$this->cell(10,5,"Años:   ");
				$this->cell(10,5,$tb->fields["anoser"]);
				$this->cell(10,5,"Meses:   ");
				$this->cell(10,5,$tb->fields["messer"]);
				$this->cell(10,5,"Días:   ");
				$this->cell(10,5,$tb->fields["diaser"]);
			    $this->ln(5);
				$this->SetTextColor(0,0,128);
				$this->cell(31,5,"FECHA DE INGRESO:");
                $this->SetTextColor(0,0,0);
				$this->cell(20,5,$tb->fields["fecing"]);
				$this->SetTextColor(0,0,128);
				$this->cell(28,5,"FECHA DE CORTE:");
                $this->SetTextColor(0,0,0);
				$this->cell(20,5,$tb->fields["feccal"]);
				$this->ln(5);
				$this->ln(5);
				$this->SetFillColor(195,195,195);
				$this->SetTextColor(0,0,128);
				$this->cell(190,8,"                                      COMPENSACION BONO DE TRANSFERENCIA Bs.:          ",1,1,'',1);
				$this->SetTextColor(0,0,0);
				$this->SetY(62);
				$this->SetX(120);
				$this->cell(20,8,number_format($tb->fields["bontra"],2,'.',','));
				$this->SetFillColor(0,0,0); 
			    $tb->MoveNext(); 
				if (!$tb->EOF) {$this->AddPage();}
            }//while				
 
		}
	}
?>