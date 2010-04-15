<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/bienes/Bnrbiemueconint.class.php");

	class pdfreporte extends fpdf
	{

		var $total_activo=0;
		var $acum_activo=0;
		var $acum2=0;
		var $acum3=0;
		var $result=0;
		var $result2=0;
		var $result3=0;
		var $i=0;
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
		var $codubi;
		var $codactdes;
		var $codacthas;
		var $codmuedes;
		var $codmuehas;
		var $fecregdes;
		var $fecreghas;
		var $prenom;
		var $precar;
		var $confnom;
		var $confcar;
		var $apronom;
		var $aprocar;
		var $p=0;

		function pdfreporte()
		{
			//$this->fpdf("l","mm","Letter");
			parent::FPDF("L");
			$this->bd        = new basedatosAdo();
			$this->titulos   = array();
			$this->titulos2  = array();
			$this->campos    = array();
			$this->anchos    = array();
			$this->anchos2   = array();
			//$this->codubi    = H::GetPost("codubi");
			$this->codactdes = H::GetPost("codactdes");
			$this->codacthas = H::GetPost("codacthas");
			$this->codmuedes = H::GetPost("codmuedes");
			$this->codmuehas = H::GetPost("codmuehas");
			$this->fecdes = H::GetPost("fecdes");
			$this->fechas = H::GetPost("fechas");


			$this->bnrbiemueconint = new Bnrbiemueconint();
		    $this->arrp=$this->bnrbiemueconint->sqlp($this->codactdes, $this->codacthas,$this->codmuedes,$this->codmuehas,$this->fecdes,$this->fechas);

		    //h::printR($this->arrp);

			$this->llenartitulosmaestro();
			$this->cab = new cabecera();
			$this->SetAutoPageBreak(true,50);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[]="Cantidad";
				$this->titulos[]="DESCRIPCION";
				$this->titulos[]="BOLIVARES";
		}

		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,H::GetPost("titulo","L"));
			$arrp = $this->bnrbiemueconint->sqlestado($this->arrp[$this->i]["acodubi"]);
		      $this->setFont("Arial","B",8);
		 	$this->MultiCell(200,5,"1.- ESTADO: ".$this->Edo());
      $this->MultiCell(200,5,"2.- MUNICIPIO: ".$this->Mun());
	  $this->MultiCell(200,5,"3.- PARROQUIA: "."");
	  $this->MultiCell(200,5,"4.- DIRECCION O LUGAR: ".$arrp[0]["dirubi"]);
      $this->MultiCell(200,5,"5.- DEPENDENCIA O UNIDAD PRIMARIA: ".$arrp[0]["nomunid"]);
      $this->MultiCell(200,5,"6.- SERVICIO: ");
      $this->MultiCell(200,5,"7.- UNIDAD DE TRABAJO O DEPENDENCIA: ".$arrp[0]["nomunit"]);
      $this->MultiCell(200,5,"8.- PERIODO DE LA CUENTA: ".H::ObtenerMesenLetras(substr(date('d/m/Y'),3,2))." ".substr(date('d/m/Y'),6,4));
	    $this->setFont("Arial","",8);
		      $this->multicell(0,4,"             TIPO DE ELEMENTO, ACCESORIO Y BIENES SEGÚN RESOLUCIÓN ADMINISTRATIVA N°13 GACETA ORDINARIO N°1530 DE LA CONTRALORIA GENERAL DEL ESTADO:");
			$this->setFont("Arial","B",10);
			$this->SetTextColor(150,0,0);
			$this->setWidths(array(20,200,35));
			$this->setborder(true);
			$this->setaligns('C');
			$this->Row($this->titulos);
			$this->setFont("Arial","",8);
			$this->setWidths(array(20,200,35));
			$this->setaligns(array("C","L","R"));
			$this->setborder(true);

		}

		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
			$tot_valini=0;
			foreach($this->arrp as $arrp)
			{
				///Detalles
 				 $this->Row(array($arrp["cant"],$arrp["desact"],$arrp["valini"]));
 				 $this->i++;
 				 $tot_valini+=$arrp["valini2"];
			}
			//TOTALES
			$this->ln();
				$this->setborder(false);
					$this->setWidths(array(20,200,35));
			$this->setaligns(array("C","L","R"));
			$this->row(array("","TOTALES:  ",H::FormatoMonto( $tot_valini)));

		}

	}

?>
