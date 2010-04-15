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
		var $codcurdes;
		var $codcurhas;
		var $tipo;
		var $conf;
				
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
			$this->codcurdes=$_POST["codcurdes"];
			$this->codcurhas=$_POST["codcurhas"];			
			$this->sql="SELECT 
							A.CODCUR as codcur, 
							A.DESCUR as descur,
							B.NUMCLA as numcla,
							to_char(B.FECCLA,'dd/mm/yyyy') as feccla,
							B.NUMHOR as numhor
						FROM RHDEFCUR A, RHCLACUR B
						WHERE 
							RTRIM(A.CODCUR) >= RTRIM('".$this->codcurdes."') AND
							RTRIM(A.CODCUR)<= RTRIM('".$this->codcurhas."') AND
							A.CODCUR=B.CODCUR
						ORDER BY A.CODCUR";		
							//print $this->sql;	
			$this->llenartitulosmaestro();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código del Curso";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Nº de la Clase";
				$this->titulos[3]="Fecha de la Clase";	
				$this->titulos[4]="Nº de Horas";				
				$this->anchos[0]=30;
				$this->anchos[1]=55;	
				$this->anchos[2]=30;	
				$this->anchos[3]=30;					
				$this->anchos[4]=30;					
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(4); 
			$this->Line(10,45,200,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(5); 
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			while(!$tb->EOF)
			{
				if($tb->fields["codcur"]!=$ref)
				{
				 $this->setFont("Arial","",8); 
				 $this->cell($this->anchos[0],10,$tb->fields["codcur"]);
				 $this->cell($this->anchos[1],10,$tb->fields["descur"]);
				 $this->ln(3);
				} 
				 $this->cell($this->anchos[0],10,'      ');		
				 $this->cell($this->anchos[1],10,'      ');		
				 $this->cell($this->anchos[2],10,$tb->fields["numcla"]);
				 $this->cell($this->anchos[3],10,$tb->fields["feccla"]);
				 $this->cell($this->anchos[4],10,$tb->fields["numhor"]);
				 $ref=$tb->fields["codcur"];
				 $tb->MoveNext();
			     $this->ln(3);
			}	
		}
	}
?>