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
		var $codprodesde;
		var $codprohasta;
		var $rifdesde;
		var $rifhasta;
		var $nombdesde;
		var $nombhasta;
		var $orden;
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
			$this->codprodesde=$_POST["codprodesde"];
			$this->codprohasta=$_POST["codprohasta"];
			$this->rifdesde=$_POST["rifdesde"];
			$this->rifhasta=$_POST["rifhasta"];
			$this->nombdesde=$_POST["nombdesde"];
			$this->nombhasta=$_POST["nombhasta"];
			$this->orden="A.".trim($_POST["orden"]);

				$this->sql="SELECT A.CODPRO, A.NOMPRO, A.RIFPRO, A.DIRPRO, A.TELPRO, A.CODCTA FROM CAPROVEE A WHERE " .
						"RTRIM(A.CODPRO) >= RTRIM('".$this->codprodesde."') AND " .
						"RTRIM(A.CODPRO) <= RTRIM('".$this->codprohasta."') AND " .
						"RTRIM(A.RIFPRO) >= RTRIM('".$this->rifdesde."') AND
						RTRIM(A.RIFPRO) <= RTRIM('".$this->rifhasta."') AND
						RTRIM(A.NOMPRO) >= RTRIM('".$this->nombdesde."') AND
						RTRIM(A.NOMPRO) <= ('".$this->nombhasta."')
						ORDER BY ".$this->orden;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(false,32);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo";
				$this->titulos[1]="RIF Proveedor";
				$this->titulos[2]="Nombre Proveedor";
				$this->titulos[3]="Cuenta Contable";
				$this->titulos[4]="Direccion Proveedor";
				$this->titulos[5]="Telefono";


		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<6;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln();
			$this->Line(10,45,200,45);
		}




		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);

			while(!$tb->EOF)
			{

			     $this->setFont("Arial","",8);
				 $this->SetAutoPageBreak(false);
				 $this->cell($this->anchos[0],4,$tb->fields["codpro"]);
				 $this->cell($this->anchos[1],4,$tb->fields["rifpro"]);
				 $yy=$this->GetY();
				 $this->Multicell($this->anchos[2]-2,4,$tb->fields["nompro"]);
				 $y1=$this->GetY();
				 $this->SetXY($this->anchos[0]+$this->anchos[1]+$this->anchos[2]+10,$yy);
				 $this->cell($this->anchos[3],4,$tb->fields["codcta"]);
				 $this->Multicell($this->anchos[4]-2,4,ucfirst(strtolower($tb->fields["dirpro"])));
				 $y2=$this->GetY();
				 $this->SetXY($this->anchos[0]+$this->anchos[1]+$this->anchos[2]+$this->anchos[3]+$this->anchos[4]+10,$yy);
				 $this->Multicell($this->anchos[5],4,$tb->fields["telpro"]);
				 $this->SetAutoPageBreak(true);
				 if ($y1>$y2){
				 $this->SetY($y1+5);
				 }else $this->SetY($y2+5);

				 $tb->MoveNext();
				 if ($this->GetY()>=220){
				 	$this->AddPage();
				 }
				}
		}


	}
?>