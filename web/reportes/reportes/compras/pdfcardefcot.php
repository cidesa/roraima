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
		var $candes1;
		var $candes2;

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
			$this->candes1=$_POST["candes1"];
			$this->candes2=$_POST["candes2"];
			///nombre de tabla: predocprc
			$this->sql="SELECT candes,canhas,cancot,nroran
						FROM carancot
						WHERE ( candes >='".$this->candes1."' AND canhas <='".$this->candes2."' )
						ORDER BY candes,canhas";
//print $this->sql; exit;
			$this->llenartitulosmaestro();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Indice";
				$this->titulos[1]="Desde";
				$this->titulos[2]="Hasta";
				//$this->titulos[3]="Cantidad de Cotizaciones";
				$this->anchos[0]=10;
				$this->anchos[1]=30;
				$this->anchos[2]=30;
				$this->anchos[3]=30;


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
				$this->cell($this->anchos[$i]+40,10,$this->titulos[$i]);
			}
				$this->setXY(182,40);
				$this->cell(8);
				$this->cell(30,5,'Cantidad de Cotizaciones');

				// $this->cell($this->anchos[0]-10,10,"Refiere");

			$this->ln(4);
			$this->Line(10,45,270,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(5);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",7);
		    $tb=$this->bd->select($this->sql);
		    $tb2=$tb;
		    $this->tb2=$tb;
			$ref="";
			while(!$tb->EOF)
			{
				 $this->setFont("Arial","",8);
				 $this->cell($this->anchos[0]+40,10,$tb->fields["nroran"]);
				 $this->cell($this->anchos[1]+40,10,$tb->fields["candes"]);
				 $this->cell($this->anchos[2]+40,10,$tb->fields["canhas"]);
				 //$this->SetX(210);
				 $this->cell($this->anchos[3],10,number_format($tb->fields["cancot"]),0,0,'R');
				 $tb->MoveNext();
			    $this->ln(4);
			    $y=$this->GetY();
			    if($y>=170)
			    {
			    	$this->AddPage();
			    }
			}
		}
	}
