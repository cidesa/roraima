<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Npvac_solicitud.class.php");


class pdfreporte extends fpdf
{
	var $i=0;
	var $arrp=array();

	function pdfreporte()
	{
		 $this->fpdf("p","mm","Letter");
		 $this->codempdes=H::GetPost("codempdes");
		 $this->codemphas=H::GetPost("codemphas");
		 $this->codnomdes=H::GetPost("codnomdes");
		 $this->fecdes=H::GetPost("fecdes");
		 $this->fechas=H::GetPost("fechas");
		 $this->elapor=H::GetPost("elapor");
		 $this->aprpor=H::GetPost("aprpor");
		 $this->revpor=H::GetPost("revpor");
		 $this->superv=H::GetPost("superv");
		 $this->dirsec=H::GetPost("dirsec");

		 $this->cab = new Cabecera();

		 $this->objclass = new Npvac_solicitud();
		 $this->arrp= $this->objclass->SQLp($this->codempdes,$this->codemphas,$this->fecdes,$this->fechas,$this->codnomdes);
		 $this->setAutoPageBreak(true,25);
	}

	function Header()
	{
		 $this->setdrawcolor(255,255,255);
		 $this->cab->poner_cabecera($this,H::GetPost('titulo'),"p","p","s");
		 $this->setdrawcolor(0,0,0);
	}

	function Cuerpo()
	{
		$ref="";

		$i= 0;
		$cuantos = count($this->arrp);

	//	H::PrintR($this->arrp);exit;
		for($y=0; $y < $cuantos; $y++)
		{
			//H::PrintR($this->arrp[$y]);exit;
			if($ref!=$this->arrp[$y]['codemp'])
			{
				if($ref)
					$this->AddPage();
				$this->setFont("Arial","B",10);
				$this->ln();

				$this->multicell(180,4,'PARA USO DE LA DIRECCIÓN DE RECURSOS HUMANOS',1,'C');

				$this->setwidths(array(20,80,80));
				$this->setAligns('C');
				$this->setborder(true);
				$this->rowm(array('Ced. Identidad','Apellidos y Nombres','Tipo de Nomina'));
				$this->setFont("Arial","",10);
				$this->rowm(array($this->arrp[$y]['cedemp'],$this->arrp[$y]['nomemp'],$this->arrp[$y]['nomina']));
				$this->setwidths(array(20,130,30));
				$this->setAligns('C');
				$this->setborder(true);
				$this->setFont("Arial","B",10);
				$this->rowm(array('Fecha Ingreso','Cargo','Sueldo'));
				$this->setFont("Arial","",10);
				$this->rowm(array(date('d/m/Y',strtotime($this->arrp[$y]['fecing'])),$this->arrp[$y]['codcar'].' - '.$this->arrp[$y]['nomcar'],$this->arrp[$y]['sueldo']));
				$this->setFont("Arial","B",10);
				$this->multicell(180,4,'Ubicación Administrativa',1,'C');
				$this->setFont("Arial","",10);
				$this->multicell(180,4,$this->arrp[$y]['codniv'].' - '.$this->arrp[$y]['desniv'],1,'C');
				$this->setFont("Arial","B",9);

				$this->multicell(180,4,"\n\n\n\n\n\n\n______________________________________________\n".$this->arrp[$y]['nomemp']."\n\n",1,'C');



				$this->ln(2);
				$this->setFont("Arial","",7);
				$this->multicell(180,3,"Artículo 24 Ley del Estatuto de la Función Pública (LEFP): \"Los funcionarios ".
				"o funcionarias de la Adminstración Pública tendrán derecho a disfrutar de una vacación anual de ".
				"quince días hábiles durante el primer quinquenio de servicios, de dieciocho días hábiles durante el ".
				"segundo quinquenio; de ventiun días hábiles durante el tercer quinquenio y de veinticinco días ".
				"hábiles a partir del décimosexto año de servicio. (...)\"".

				"\n\n".
				"Artículo 219: Ley Organica del Trabajo (LOT): \"Cuando el trabajador cumpla (1 año de trabajo, ".
				"ininterrumpido para un patrono, disfrutará de un período de vacaciones remuneradas de quince (15) ".
				"días habiles. Los años sucesivos tendrá derecho además a un 1 día adicional remunerado por cada ".
				"año de servicio, hasta un máximo de quince (15) días hábiles.(...)\"",1,'J');

				$this->ln(2);
				$this->setFont("Arial","B",10);
				$this->multicell(180,4,'PARA USO DE LA DIRECCIÓN DE RECURSOS HUMANOS',1,'C');
				$this->ln();
				$this->setwidths(array(90,90));
				$this->setAligns('C');
				$this->setborder(true);
				$this->setX(55);
				$this->rowm(array('DATOS DE LA VACACION A DISFRUTAR'));
                $this->ln(2);

                $this->setwidths(array(45,45));
				$this->setAligns('C');
				$this->setborder(true);

				$this->setFont("Arial","B",10);
				$this->setX(55);
				$this->rowm(array('Fecha de Salida','Fecha de Regreso'));
				$this->setFont("Arial","",10);
				$this->setX(55);
				$this->rowm(array(date('d/m/Y',strtotime($this->arrp[$y]['fechasalida'])),date('d/m/Y',strtotime($this->arrp[$y]['fechaentrada']))));





				}



				$this->setwidths(array(30,30,30));
				$this->setAligns('C');
				$this->setborder(true);
				$this->setFont("Arial","B",10);
				$this->setX(55);
				$this->rowm(array('Periodo Desde','Periodo Hasta','Dias Disfrute'));
				$this->setFont("Arial","",10);

			$this->setX(55);
			$this->rowm(array($this->arrp[$y]['perini'],$this->arrp[$y]['perfin'],$this->arrp[$y]['diadis']));
			$this->ln(2);
			$ref=$this->arrp[$y]['codemp'];
		}
		$this->setY(240);
		$this->setFont("Arial","B",10);
		$this->setWidths(array(60,60,60));
		$this->setaligns('C');
		$this->rowm(array("  ________________________  ","  ________________________  ","  ________________________  "));
		$this->rowm(array($this->elapor."\nElaborado Por",$this->revpor."\nRevisado Por",$this->aprpor."\nAprobado Por"));

    }
}
