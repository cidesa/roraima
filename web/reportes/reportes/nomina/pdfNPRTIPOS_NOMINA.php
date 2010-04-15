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
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];

			
			$this->sql="select a.codnom, a.nomnom, a.frecal, to_char(a.ultfec,'dd/mm/yyyy') as ultfec,
					 to_char(a.profec,'dd/mm/yyyy') as profec, a.numsem, a.ordpag, a.tipcau, a.refcau, a.tipprc,
			         a.refprc, a.tipcom, a.refcom  
					 from npnomina a
					 where codnom>='".$this->cod1."' and codnom<='".$this->cod2."'
					 order by a.codnom";

						

			
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código Nómina";
				$this->titulos[1]="Nombre Nómina";
				$this->titulos[2]="Frecuencia Cálculo";
				$this->titulos[3]="Ultima Fecha";
				$this->titulos[4]="Próxima Fecha";
				$this->titulos[5]="Número Semana";
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos[$i]);
			}
			$this->ln(); 
			/*for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}*/
			$this->ln(); 
			$this->SetLineWidth(0.5);
			$this->Line(10,43,270,43);
			$this->SetLineWidth(0.2);
			$this->ln(-3);
			
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			$ncampos=count($this->titulos);
			
			while (!$tb->EOF)
			{
				//$this->setFont("Arial","B",8); 
				$this->cell($this->anchos[0],5,"         ".$tb->fields["codnom"]);
				$this->cell($this->anchos[1],5,substr($tb->fields["nomnom"],0,100));
				if (strtoupper($tb->fields["frecal"])=='S'){$this->cell($this->anchos[2]+1,5,"        Semanal");}
				if (strtoupper($tb->fields["frecal"])=='Q'){$this->cell($this->anchos[2]+1,5,"        Quincenal");}
				if (strtoupper($tb->fields["frecal"])=='M'){$this->cell($this->anchos[2]+1,5,"        Mensual");}
				if (strtoupper($tb->fields["frecal"])=='A'){$this->cell($this->anchos[2]+1,5,"        Anual");}
				$this->cell($this->anchos[3]-1,5,"  ".$tb->fields["ultfec"]);
				$this->cell($this->anchos[4],5,"    ".$tb->fields["profec"]);
				$this->cell($this->anchos[5],5,"              ".$tb->fields["numsem"]);

				$this->ln();
				$tb->MoveNext();
			}
		}
	}
?>
