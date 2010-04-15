<?

	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum=0;
		var $result=0;
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
		var $codact1;
		var $codact2;
		var $codmue1;
		var $codmue2;
		var $fecreg1;
		var $fecreg2;
		var $prenom;
		var $precar;
		var $confnom;
		var $confcar;
		var $apronom;
		var $aprocar;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Legal");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->refapa1=$_POST["refapa1"];
			$this->refapa2=$_POST["refapa2"];
			$this->fecdis1=$_POST["fecdis1"];
			$this->fecdis2=$_POST["fecdis2"];
			$this->nomben1=$_POST["nomben1"];
			$this->nomben2=$_POST["nomben2"];
			$this->tipapa1=$_POST["tipapa1"];
			$this->tipapa2=$_POST["tipapa2"];


				$this->sql= "select a.refapa,desapa,to_date(fecapa,'dd/mm/yyyy') as fecapa,
				case when estcie='N' then 'ABIERTO' else 'CERRADO' end,
				monapa,nomben,nomext,d.codpre,e.nompre,moncom,moncau,(MONCOM-MONCAU) as monpag
				FROM cpapafon a,opbenefi b,cpdoccom c,cpimpapa d,cpdeftit e
				WHERE a.cedrif=b.cedrif and a.tipapa=c.tipcom
				and a.refapa=d.refapa and d.codpre=e.codpre
				and a.refapa>=('".$this->refapa1."') and a.refapa<=('".$this->refapa2."') and
				a.fecapa>= to_date('".$this->fecdis1."','dd/mm/yyyy') and a.fecapa<= to_date('".$this->fecdis2."','dd/mm/yyyy') and
				nomben>=('".$this->nomben1."') and nomben<=('".$this->nomben2."') and
				c.tipcom>=('".$this->tipapa1."') and c.tipcom<=('".$this->tipapa2."')
				group by a.refapa,desapa,fecapa,estcie,monapa,nomben,nomext,d.codpre,e.nompre,moncom,moncau,monpag";
				//print $this->sql;



			//$this->llenartitulosmaestro();
			//$this->cab=new cabecera();


		}





	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Funcion que imprime la cabecera que se desea en el reporte                                                 //
	// $objeto: es el objeto fpdf que construye la cabecera                                                       //
	// $rep: es el Titulo del Reporte                                                                             //
	// $configuracion: es la manera de como vamos a mostrar las paginas (p) si es Vertical y (l) si es Horizontal //
	// $pagina: es el valor para mostrar el numero y el total de paginas (s) las muestra y (n) no las muestra     //
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function poner_cabecera($objeto,$rep,$configuracion,$pagina)
	{
		//configuro la pagina con Orientacion Horizontal
		//busco la descripcion y direccion de la empresa
		$tb3=$this->bd->select("select * from empresa where codemp='001'");
		if(!$tb3->EOF)
			{
				$nombre=$tb3->fields["nomemp"];
				$direccion=$tb3->fields["diremp"];
				$telef=$tb3->fields["tlfemp"];
				$fax=$tb3->fields["faxemp"];
			}
			$objeto->setFont("Arial","B",8);
			//Logo de la Empresa
			$objeto->Image("../../img/logo_1.jpg",10,8,33);
			//fecha actual
			$fecha=date("d/m/Y");
			$this->SetX(280);
			$objeto->Cell(50,10,'Fecha: '.$fecha,0,0,'C');
			$objeto->ln(5);
			//Paginas
			if($pagina=="s")
			{
				$this->SetX(280);
				$objeto->Cell(50,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');
			}
	    //Titulo Descripcion de la Empresa
    		/*$objeto->Ln(-5);*/
			$objeto->Ln(-5);
    		$objeto->Cell(270,5,'',0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(270,5,'',0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(270,5,'',0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(270,5,'',0,0,'C');
    		$objeto->Ln(8);
			//Titulo del Reporte
			$objeto->setFont("Arial","B",12);
			$objeto->Cell(270,10,$rep,0,0,'C',0);
			$objeto->ln(10);
			$objeto->Line(10,35,350,35);
			$objeto->ln(10);
			$objeto->Line(10,35,350,35);
		}



		function Header()
		{

			$this->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->Line(10,50,350,50);
			$this->ln(40);
		}

		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
		    $tb2=$tb;
			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,128);
			$ncampos=count($this->titulos);
			$acum1=0;
			$acum2=0;
			$acum3=0;
			if (!$tb2->EOF)
			{

				$ref=$tb2->fields["refapa1"];
				$this->SetTextColor(0,0,128);
				$this->SetY(45);
				$this->cell(15,3,"DESDE: " );
				$this->cell(15,3,$_POST["fecdis1"]);
				$this->cell(20);
				$this->cell(15,3,"HASTA: ");
				$this->cell(15,3,$_POST["fecdis2"]);
				$this->line(10,65,350,65);
				$this->SetY(55);
				$this->cell(10,3,"ORDEN DE PAGO");
				$this->cell(70);
				$this->cell(10,3,"BENEFICIARIO");
				$this->cell(80);
				$this->cell(10,3,"TIPO");
				$this->cell(110);
				$this->cell(10,3,"FECHA EMISIÓN");
				$this->ln(16);
				$this->SetX(10);
				$this->cell(20,3,$tb2->fields["refapa"]);
				$x=$this->GetX();
				$this->cell(60);
				$this->cell(80,3,$tb2->fields["nomben"],0,0,'');
				$this->cell(12);
				$this->cell(40,3,$tb2->fields["nomex"],0,0,'');
				$this->cell(80);
				$this->cell(60,3,($tb2->fields["fecapa"]),0,0,'');
				//$yy=$this->GetY();
				$this->SetTextColor(0,0,0);
				$this->SetXY(10,60);
				$this->cell(10,3,"PARTIDA PRESUPUESTARIA");
				$this->cell(150);
				$this->cell(30,3,"MONTO OTORGADO BS.");
				$this->cell(30);
				$this->cell(30,3,"MONTO RENDIDO BS.");
				$this->cell(35);
				$this->cell(20,3,"SALDO POR RENDIR BS.");
			}
			while(!$tb2->EOF)
			{
			if ($tb->fields["refapa1"]!=$ref)
			{
				$this->SetAutoPageBreak(false);
				$this->SetTextColor(0,0,0);
				$this->cell(20,3,"TOTAL ORDEN DE PAGO:");
				$this->cell(20);
				$this->cell(20,3,"".number_format($this->acum1));
				$this->cell(10);
				$this->cell(20,3,"".number_format($this->acum2));
				$this->cell(10);
				$this->cell(20,3,"".number_format($this->acum3));
				$this->SetTextColor(0,0,128);
				$this->cell(15,3,"DESDE: " );
				$this->cell(15,3,$_POST["fecdis1"]);
				$this->cell(20);
				$this->cell(15,3,"HASTA: ");
				$this->cell(15,3,$_POST["fecdis2"]);
				$this->line(10,65,350,65);
				$this->SetY(55);
				$this->cell(10,3,"ORDEN DE PAGO");
				$this->cell(70);
				$this->cell(10,3,"BENEFICIARIO");
				$this->cell(80);
				$this->cell(10,3,"TIPO");
				$this->cell(110);
				$this->cell(10,3,"FECHA EMISIÓN");
				$this->ln(5);
				$this->cell(20,3,$tb2->fields["refapa1"]);
				$x=$this->GetX();
				//$y=$this->GetY();
				$this->cell(70);
				$this->cell(60,3,$tb2->fields["nomben"]);
				$this->cell(150);
				$this->cell(60,3,$tb2->fields["nomex"]);
				$this->cell(110);
				$this->cell(60,3,$tb2->fields["fecapa"]);
				$y1=$this->SetY();
				$this->ln(10);
				$this->SetTextColor(0,0,0);
				$this->cell(10,3,"PARTIDA PRESUPUESTARIA");
				$this->cell(150);
				$this->cell(30,3,"MONTO OTORGADO BS.");
				$this->cell(30);
				$this->cell(30,3,"MONTO RENDIDO BS.");
				$this->cell(35);
				$this->cell(20,3,"SALDO POR RENDIR BS.");
				$y1=$this->SetY();
			}
					//Detalle
					$ref=$tb2->fields["refapa1"];
					$this->cell(60,3,$tb2->fields["codpre"]);
					$xx=$this->GetX();
					$this->cell(100);
					$this->cell(20,3,$tb2->fields["moncom"]);
					$this->acum1=($this->acum1+$tb->fields["moncom"]);
					$this->cell(45);
					$this->cell(20,3,$tb2->fields["moncau"]);
					$this->acum2=($this->acum2+$tb->fields["moncau"]);
					$this->cell(45);
					$this->cell(30,3,$tb2->fields["monpag"]);
					$this->acum3=($this->acum3+$tb->fields["monpag"]);
					$this->SetX($xx);
					$this->MultiCell(90,4,$tb2->fields["desapa"]);
					$this->ln(5);
					$this->SetAutoPageBreak(true);
					$y=$this->GetY();
					$tb->MoveNext();
					if ($y>=170)
					{
						$this->AddPage();
					}

			}


		}


	}
?>