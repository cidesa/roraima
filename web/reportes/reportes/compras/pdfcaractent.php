<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/compras/Caractent.class.php");

	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			parent::FPDF("P");
			$this->ordcomdes=H::GetPost("ordcomdes");
			$this->ordcomhas=H::GetPost("ordcomhas");
			$this->codprodes=H::GetPost("codprodes");
			$this->codprehas=H::GetPost("codprohas");
			$this->codartdes=H::GetPost("codartdes");
			$this->codarthas=H::GetPost("codarthas");
			$this->fecorddes=H::GetPost("fecorddes");
			$this->fecordhas=H::GetPost("fecordhas");
			$this->bd = new Tsrvoucher();
			$this->arrp=$this->bd->sqlp($this->numchedes,$this->numchehas);
			$this->llenartitulosmaestro();

		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Cuenta";
				$this->titulos[2]="Uso";
				$this->titulos[3]="Saldo Anterior";
				$this->titulos[4]="Débitos";
				$this->titulos[5]="Créditos";
				$this->titulos[6]="Saldo Segun Libros";

		}

		function Header()
		{
			$this->setFont("Arial","B",11);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
		}

		function Cuerpo()
		{
			$this->setFont("Arial","B",11);
			$i=0;
			//------------------------------------------------------------------------------------------------
			foreach($this->arrp as $cheque)//while
			{
				$this->numcom=$cheque["numcom"];

				$this->setFont("Arial","B",11);
				$this->SetXY(165,28);
				$this->cell(30,2,str_pad($cheque["monchestr"], 20, "*", STR_PAD_LEFT));
				$this->setFont("Arial","",11);
				$this->SetXY(60,44);
				$this->cell(130,5,'***'.strtoupper($cheque["nomben"]).'***'.'       '.$cheque["cedrif"]);
				$this->SetXY(60,51);
				$this->MultiCell(130,5,(str_pad(montoescrito($cheque["monche"],$this->bd),100," ",STR_PAD_RIGHT)).'--------------');
				$this->SetXY(45,63);
				$this->cell(30,5,"LOS TEQUES,   ");
				$this->cell(20,5,$cheque["dia"]."/".$cheque["mes"]);
				$this->cell(20,5,"       ".$cheque["ano"]);
				//$this->SetXY(45,90);
				$this->SetXY(45,70);
				$this->cell(10,5,'CADUCA A LOS 90 DIAS              NO ENDOSABLE');
				$this->SetXY(20,110);
				$this->cell(60,5,trim($cheque["numche"]),0,0,'R');
				$this->cell(60,5,trim("BANESCO"),0,0,'C');
				$this->cell(60,5,trim($cheque["numcue"]),0,0,'R');
				$this->SetXY(40,130);
				$this->MultiCell(130,5,strtoupper($cheque["desord"]));
				$i++;
				if($i < count($this->arrp))
				{
					$this->AddPage();
				}
			}
		}
	}
?>
