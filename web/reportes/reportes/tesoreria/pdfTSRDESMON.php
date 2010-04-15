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
		var $per1;
		var $per2;
		var $cod1;
		var $cod2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;	
				
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->estado=strtoupper($_POST["estado"]);
			
			if (strtoupper($this->estado)=='T')
			{
				$this->sql="select codmon, nommon, valmon, aumdis 
					from tsdesmon 
					where (RTRIM(codmon) >= RTRIM('".$this->cod1."')) and (RTRIM(codmon) <= RTRIM('".$this->cod2."'))
					order by codmon";
			}
			else
			{
			$this->sql="select codmon, nommon, valmon, aumdis 
					from tsdesmon 
					where (RTRIM(codmon) >= RTRIM('".$this->cod1."')) and (RTRIM(codmon) <= RTRIM('".$this->cod2."')) and
					aumdis='".$this->estado."'
					order by codmon";	
			}

			
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO MONEDA";
				$this->titulos[1]="NOMBRE MONEDA";
				$this->titulos[2]="VALOR MONEDA";
				$this->titulos[3]="AUMENTA/DISMINUYE";
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(); 
			/*for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}*/
			$this->ln(); 
			$this->Line(10,50,200,50);
			
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			$ncampos=count($this->titulos);
			
			while (!$tb->EOF)
			{
				//$this->setFont("Arial","B",8); 
				$this->cell($this->anchos[0],5,$tb->fields["codmon"]);
				$this->cell($this->anchos[1],5,substr($tb->fields["nommon"],0,100));
				$this->cell($this->anchos[2],5,$tb->fields["valmon"]);
				if (strtoupper($tb->fields["aumdis"])=='D')
				{
					$this->car="Disminuye";
				}
				else
				{
					$this->car="Aumenta";
				}
				$this->cell($this->anchos[3],5,$this->car);				
				$this->ln();
				$tb->MoveNext();
			}
		}
	}
?>
