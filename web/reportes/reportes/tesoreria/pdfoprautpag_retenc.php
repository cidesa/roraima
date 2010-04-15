<?
//Definiciones de Funciones
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");


	class pdfreporte extends fpdf
	{
		//Def de Variables a utilizar
		var $bd;
		var $numau;
		var $nomasc;
		var $nomdes;
		var $obra;
		var $numcont;
		var $retenc;
		var $agencia;
		var $diradfin;
		var $secgen;
		var $congen;
		var $ci1;
		var $ci2;
		var $ci3;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->bd->validar();
			//Recibir las variables por el Post
			$this->numaudes=trim($_POST["numaudes"]);
		//	$this->numauhas=trim($_POST["numauhas"]); En comentario porque todas las autorizaciones de la base de datos no pueden tener la misma descripcion y monto de
			$this->obra=$_POST["obra"];
			$this->numcont=$_POST["numcont"];
			$this->retenc=$_POST["retenc"];
			$this->agencia=$_POST["agencia"];
			$this->diradfin=$_POST["diradfin"];
			$this->secgen=$_POST["secgen"];
			$this->congen=$_POST["congen"];
			$this->ci1=$_POST["ci1"];
			$this->ci2=$_POST["ci2"];
			$this->ci3=$_POST["ci3"];


			/*$this->sql= "SELECT *,to_char(fecini,'DD/MM/YYYY') as fecha
						FROM contabb
						where codcta >= ('".$this->ascendente."')
						and codcta <= ('".$this->descendente."')";*/

			$this->cab=new cabecera();
		}


		function Header()
		{
			// pagina con Orientacion Vertical
			$this->setFont("Arial","B",9);
			//Logo de la Empresa
			$this->Image("../../img/logo_1.jpg",10,8,33);
			//fecha actual

			/*$this->Cell(360,10,'Fecha: '.$fecha,0,0,'C');
			$this->ln(5);
			*/
	    	//Titulo Descripcion de la Empresa
			$this->setFont("Arial","B",9);
    		$this->Ln(4);
    		$this->tb4=$this->bd->select("Select nomemp,ciuemp from empresa where codemp='001'");
    		$this->Cell(210,5,'REPÚBLICA BOLIVARIANA DE VENEZUELA',0,0,'C');
			$this->Ln(5);
    		$this->Cell(210,5,$this->tb4->fields["nomemp"],0,0,'C');
			$this->Ln(5);
    		$this->Cell(210,5,'DIRECCIÓN DE ADMINISTRACIÓN Y FINANZAS',0,0,'C');
			$this->Ln(10);
    		$this->Cell(210,5,'CONVENIO GOBERNACIÓN - FIDES',10,0,'C');
    		$this->Ln(18);
			//$this->Line(10,35,270,35);
		}

		function Cuerpo()
		{


			$this->sql1= "SELECT DISTINCT A.REFCAU, A.DESCAU, A.FECCAU, A.MONCAU as moncau, B.NOMBEN as nomben
						FROM CPCAUSAD as A, OPBENEFI as B
						WHERE  trim(A.CEDRIF)=trim(B.CEDRIF) and
						A.REFCAU=('".$this->numaudes."')
						-- AND B.NOMBEN >= ('".$this->nomasc."')
						-- AND B.NOMBEN <= ('".$this->nomdes."')
						ORDER BY A.REFCAU";
//Beneficiario no hace nada en el reporte, la autorización es relación a uno con el beneficiario
			//print $this->sql1;
			$tb1=$this->bd->select($this->sql1);


		while(!$tb1->EOF) {

			$this->Cell(180,5,'AUTORIZACIÓN DE PAGO No.: '.$this->numaudes,0,0,'R');
			$this->Ln(5);
			$this->setFont("Arial","B",11);
			$fecha=date("d/m/Y");


			$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$me=$mes[date('n')];


			$this->Cell(180,5,ucwords(strtolower($this->tb4->fields["ciuemp"])).', '.strftime(" %d de $me del %Y"),0,0,'R');
			//$this->Cell(170,5,'Ciudad Bolivar, '.$fecha,0,0,'R');
			$this->Ln(10);
			$this->Cell(20,5,'Señores: ',0,0,'L');
			$this->Ln(5);

			$this->Cell(210,5,'GERENCIA GENERAL DE FIDECOMISO ',0,0,'L');
			$this->Ln(5);

			$this->Cell(210,5,$this->agencia,0,0,'L');
			$this->Ln(5);
			$this->Cell(210,5,'Presente.-',0,0,'L');
			$this->Ln(15);
			$this->Cell(210,5,'								Con base a los términos de Contrato de Fideicomiso celebrado por el Fondo Intergubernamental ',0,0,'L');
			$this->Ln(5);
			$this->Cell(210,5,'				para la Descentralización (FIDES) y esa Institución, solicitamos de usted, cancelar, con cargo al ',0,0,'L');
			$this->Ln(5);
			$this->Cell(210,5,'				Fondo de Fideicomiso, el pago a nombre de la Tesorería Nacional del '.$this->retenc.' I.S.RL.R. referente a:',0,0,'L');
			$this->Ln(15);

				$this->cell(210,5,substr($tb1->fields["descau"],0,70),0,0,'C');
				$this->Ln(5);
				$this->cell(210,5,substr($tb1->fields["descau"],70,80).' ... ',0,0,'C');
				$this->Ln(5);
				$emp='la Gobernación del Estado Bolívar';
				$this->Cell(210,5,'suscrito entre el mencionado Fondo y '.$emp.', asignado a favor : ',0,0,'C');
				$this->Ln(5);
				$this->cell(210,5,'de la Empresa '.substr($tb1->fields["nomben"],0,70).' correspondiente a:',0,0,'C');
				$this->Ln(10);

				$this->rect($this->GetX(),$this->GetY()-2,190,22);
				$this->Cell(210,5,'OBRA: '.$this->obra,0,0,'L');
				$this->Ln(5);
				$this->Cell(210,5,'CONTRATO N°: '.$this->numcont,0,0,'L');
				$this->Ln(5);
				$this->cell(210,5,'MONTO Bs.: '.number_format($tb1->fields["moncau"],2,'.',','),0,0,'L');
				$this->Ln(30);

				$this->rect($this->GetX(),$this->GetY()-2,190,70);
				$this->Cell(180,5,'Se anexa a la presente Original de Valuación',0,0,'C');
				$this->Ln(5);
				$this->Cell(180,5,'Atentamente;',0,0,'C');
				$this->Ln(20);
				$this->line(11,$this->GetY()-2,70,$this->GetY()-2);
				$this->line(75,$this->GetY()-2,133,$this->GetY()-2);
				$this->line(138,$this->GetY()-2,192,$this->GetY()-2);
				//$this->Ln(5);
				//$this->Cell(210,5,$this->diradfin.'										'.$this->secgen.'									'.$this->congen,0,0,'C');
				$this->Cell(62,5,'	 '.$this->diradfin,0,0,'C');
				$this->Cell(62,5,'	 '.$this->secgen,0,0,'C');
				$this->Cell(62,5,'	 '.$this->congen,0,0,'C');

				$this->Ln(5);
				$this->Cell(62,5,'Directora de Admón. y Finanzas',0,0,'C');
				$this->Cell(62,5,'Secretaria General de Gobierno',0,0,'C');
				$this->Cell(62,5,'Contralor General del Estado',0,0,'C');
				$this->Ln(5);
				$this->Cell(62,5,'	CI: '.$this->ci1,0,0,'C');
				$this->Cell(62,5,'	CI: '.$this->ci2,0,0,'C');
				$this->Cell(62,5,'	CI: '.$this->ci3,0,0,'C');
				$this->Ln(10);
				$this->setFont("Arial","B",8);
				$this->Cell(20,5,'Copia:',0,0,'L');$this->Ln(5);
				$this->Cell(20,5,'FIDES',0,0,'L');$this->Ln(5);
				$this->Cell(20,5,'Archivo',0,0,'L');

			$tb1->MoveNext();
			   if(!$tb1->EOF)
				{$this->AddPage();}
			}

			$this->bd->closed();

		}


	}

?>