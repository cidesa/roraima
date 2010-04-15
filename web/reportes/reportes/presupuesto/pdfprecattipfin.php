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
		var $tipcom1;
		var $tipcom2;
		var $comodin;
				
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codfin1=$_POST["codfin1"];
			$this->codfin2=$_POST["codfin2"];
			$this->comodin=$_POST["comodin"];
			///nombre de tabla: predocprc
			$this->sql="SELECT codfin as codfin,substr(nomext,1,60) as nombre,nomabr as abrev
						FROM fortipfin
						WHERE ( codfin >='".$this->codfin1."' AND codfin <='".$this->codfin2."' )
						ORDER BY codfin";			
			$this->llenartitulosmaestro();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Tipo Financiamiento";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Abrev.";
				$this->anchos[0]=10;
				$this->anchos[1]=50;
				$this->anchos[2]=55;

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i]+50,10,$this->titulos[$i]);
			}
			$this->ln(4); 
			$this->Line(10,45,270,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(5); 
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",7);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8); 
				 $this->cell($this->anchos[0]+40,10,$tb->fields["codfin"]);
				 $this->cell($this->anchos[1]+60,10,$tb->fields["nombre"]);
				 $this->cell($this->anchos[2]+2,10,$tb->fields["abrev"]);
				$tb->MoveNext();
			    $this->ln(4);
			}	
		}
	}
?>