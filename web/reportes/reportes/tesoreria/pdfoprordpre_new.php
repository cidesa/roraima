<?
//Definiciones de Funciones
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/tesoreria/Oprordpre.class.php");
    require_once("../../lib/modelo/business/presupuesto.class.php");


	class pdfreporte extends fpdf
	{
		//Def de Variables a utilizar
		var $bd;
		var $cf_montocuotas;
		var $monto;
		var $cs;
		var $cs2;
		var $montocuotas;
		var $numorddes;
		var $numordhas;
		var $bendes;
		var $benhas;
		var $fechades;
		var $fechahas;
		var $tipcaudes;
		var $tipcauhas;
		var $lugar_pago;
		var $cod_lugar;
		var $numcont;
		var $antic;
		var $valuac;
		var $fecha;
		var $numord;
		var $fecord;
		var $numserv;
		var $fecserv;
		var $proy;
		var $tb1;
		var $tb3;
		var $pase="vacio";


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->cab=new cabecera();
			$this->SetTopMargin(5);
			//Recibir las variables por el Post
			$this->numorddes=H::GetPost("NUMORDDES");
			$this->numordhas=H::GetPost("NUMORDHAS");
			$this->bendes=H::GetPost("BENDES");
			$this->benhas=H::GetPost("BENHAS");
			$this->fechades=H::GetPost("FECHADES");
			$this->fechahas=H::GetPost("FECHAHAS");
			$this->tipcaudes=H::GetPost("TIPCAUDES");
			$this->tipcauhas=H::GetPost("TIPCAUHAS");
			$this->oprordpre= new Oprordpre();
	        $this->arrp=$this->oprordpre->sqlp($this->numorddes,$this->numordhas,$this->bendes,$this->benhas,$this->fechades,$this->fechahas,$this->tipcaudes,$this->tipcauhas);
	        $this->cont=0;
		    $this->SetAutoPageBreak(true,51);
		}

		function Header()
		{
				$this->SetFont("Arial","B",8);
				$this->SetXY(180,18);
				$this->Cell(40,4,$this->arrp[$this->cont]["orden"]);
				$this->SetXY(180,23);
				$this->Cell(20,4,$this->arrp[$this->cont]["fecemi"]);
				$this->setFont("Arial","",8);
				$this->SetXY(10,36);
				$this->MultiCell(90,4,$this->arrp[$this->cont]["nomben"],0,'J',0);
				$this->SetXY(136,36);
				$this->Cell(65,4,$this->arrp[$this->cont]["cedrif"]);
				$this->SetXY(10,50);
				$this->MultiCell(140,4,montoescrito($this->arrp[$this->cont]["monord"],$this->bd)." Bolivares",0,'J',0);
				$this->SetXY(160,50);
				$this->cell(28,3,number_format($this->arrp[$this->cont]["monord"],2,'.',','),0,0,'R');
				$this->sqlret="SELECT b.destip as destip FROM opretord a, optipret b where
							a.NUMORD = ('".$this->arrp[$this->cont]["orden"]."') and
							a.codtip = b.codtip
							ORDER BY a.codtip";
				$this->tbret=$this->bd->select($this->sqlret);
				$deducciones="";
				while(!$this->tbret->EOF)
				{
					if ($deducciones!="")
					  $deducciones=$deducciones." - ".$this->tbret->fields["destip"];
					else
					  $deducciones=$this->tbret->fields["destip"];

					$this->tbret->MoveNext();
				}
				$this->SetXY(10,64);
				$this->MultiCell(140,4,$deducciones,0,'J',0);
				$montoneto=$this->arrp[$this->cont]["monord"]-$this->arrp[$this->cont]["monret"];
				$this->SetXY(160,64);
				$this->cell(28,3,number_format($montoneto,2,'.',','),0,0,'R');
				$this->SetXY(10,100);
				$this->MultiCell(195,4,$this->arrp[$this->cont]["desord"],0,'J',0);
				if($this->arrp[$this->cont]["orden"]!=$this->pase)
				{
					$this->pase=$this->arrp[$this->cont]["orden"];
					$presupuesto=new Presupuesto();
                    $misql=$presupuesto->ObtenerCodPreporNiveles();


                    $this->sql3="SELECT B.NUMORD as ORDPRE, B.CODPRE, B.REFCOM,  to_char(D.FECCOM,'dd/mm/yyyy') as feccom,".$misql.
                   			" ,RTRIM(C.NOMPRE) as nompre, B.moncau
							FROM OPDETORD as B, CPDEFTIT as C, CPCOMPRO D
							WHERE
							B.NUMORD = ('".$this->arrp[$this->cont]["orden"]."') and
							B.CODPRE = C.CODPRE and
							B.REFCOM = D.REFCOM
							ORDER BY B.CODPRE";

					$this->tb3=$this->bd->select($this->sql3);
				}
				$this->SetXY(175,33);
				$this->Cell(65,4,$this->tb3->fields["refcom"]);
				$this->SetXY(175,42);
				$this->Cell(65,4,$this->tb3->fields["feccom"]);
				$this->SetY(83);
				$this->SetX(6);
				$anno=substr($this->arrp[$this->cont]["fecemi"],6,4);
				$this->cell(10,3,$anno);

				$this->cont++;

		}

		function Cuerpo()
		{
			//foreach($this->arrp as $this->arrp[$this->cont])
			while ($this->cont<=count($this->arrp))
			{
                $i=1;
				while(!$this->tb3->EOF && $i<3)
				{
					$this->SetX(19);
					$this->cell(10,3,$this->tb3->fields[4],0,0,'C');
					$this->SetX(32);
					$this->cell(12,3,$this->tb3->fields[5],0,0,'C');
					$this->SetX(44);
					$this->cell(10,3,$this->tb3->fields[6],0,0,'C');
					$this->SetX(58);
					$this->cell(10,3,$this->tb3->fields[7],0,0,'C');
					$this->SetX(71);
					$this->cell(10,3,$this->tb3->fields[8],0,0,'C');
					$this->SetX(85);
					$this->cell(10,3,$this->tb3->fields[9],0,0,'C');
					$this->SetX(98);
					$this->cell(10,3,$this->tb3->fields[10],0,0,'C');
					$this->SetX(111);
					$this->cell(10,3,$this->tb3->fields[11],0,0,'C');
					$this->SetX(124);
					$this->cell(10,3,$this->tb3->fields[12],0,0,'C');
					$this->SetX(140);
					$this->cell(10,3,$this->tb3->fields[13],0,0,'C');
					$this->tb3->MoveNext();
					$i++;
					$this->ln(3);
				}
				//if(!$this->tb1->EOF)
				if ($this->cont<count($this->arrp))
				{
					$this-> AddPage();
				}
				else
					$this->cont++;
			}//while
			unset($this->oprordpre);
	}
}

?>