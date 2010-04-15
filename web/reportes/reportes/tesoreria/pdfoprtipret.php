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
			#$this->bd->validar();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cod1=trim($_POST["cod1"]);
			$this->cod2=trim($_POST["cod2"]);


			$this->sql="select a.codtip, a.destip, a.codcon, a.basimp, a.porret, a.porsus, b.descta as descon
				from optipret a, contabb b
				where rpad(a.codcon,32,' ') = rpad(b.codcta,32,' ') and
				rpad(a.codtip,3,' ') >= rpad('".$this->cod1."',3,' ') and rpad(a.codtip,3,' ') <= rpad('".$this->cod2."',3,' ')
				order by a.codtip";

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Base Imp.";
				$this->titulos[3]="Tarifa";
				$this->titulos[4]="Cod. Contable";
				$this->titulos[5]="Desc. Contable";
				$this->anchos[0]=5;
				$this->anchos[1]=50;

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
			$this->setFont("Arial","",6);
			$ncampos=count($this->titulos);

			while (!$tb->EOF)
			{
				//$this->setFont("Arial","B",8);
				$this->SetAutoPageBreak(false);
				$this->cell($this->anchos[0],5,$tb->fields["codtip"]);
				$yy=$this->GetY();
				$this->Multicell($this->anchos[1],4,$tb->fields["destip"]);
				$this->SetXY($this->anchos[0]+$this->anchos[1]+10,$yy);
				$this->cell($this->anchos[2]+2,5,$tb->fields["basimp"]."%");
				if (!$tb->fields["porsus"]=0)
				{
					$this->cell($this->anchos[3],5,$tb->fields["porsus"]."%");
				}
				else
				{
					$this->cell($this->anchos[3],5,$tb->fields["porsus"]."%");
				}
				$this->cell($this->anchos[4]-5,5,$tb->fields["codcon"]);
				$this->Multicell($this->anchos[5]-5,4,$tb->fields["descon"]);
				$this->ln();
				$this->SetAutoPageBreak(true);
				$tb->MoveNext();
				if ($this->GetY()>=220){
					$this->AddPage();
				}
			}
			$this->bd->closed();
		}
	}
?>
