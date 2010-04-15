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
							B.CODEMP as codemp,
							to_char(B.FECINS,'dd/mm/yyyy') as fecins,
							C.NOMEMP as nomemp
							FROM RHDEFCUR A, RHINSCUR B,NPHOJINT C
						WHERE 
							RTRIM(A.CODCUR) >= RTRIM('".$this->codcurdes."') AND
							RTRIM(A.CODCUR)<= RTRIM('".$this->codcurhas."') AND
							A.CODCUR=B.CODCUR AND
							B.CODEMP=C.CODEMP
						ORDER BY A.CODCUR";		
							//print $this->sql;	
			$this->llenartitulosmaestro();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código del Curso";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Código";
				$this->titulos[3]="Nombre";	
				$this->titulos[4]="Fecha Inscripción";				
				$this->anchos[0]=30;
				$this->anchos[1]=55;	
				$this->anchos[2]=30;	
				$this->anchos[3]=45;					
				$this->anchos[4]=30;					
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
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
				 $this->cell($this->anchos[2],10,$tb->fields["codemp"]);
				 $this->cell($this->anchos[3],10,$tb->fields["nomemp"]);
				 $this->cell($this->anchos[4],10,$tb->fields["fecins"]);
				 $ref=$tb->fields["codcur"];
				 $tb->MoveNext();
			     $this->ln(3);
			}	
		}
	}
?>