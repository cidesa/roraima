<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/mc_table.php");

	class pdfreporte extends PDF_MC_Table
	{

		var $bd;
		var $titulos;
		var $codigo1;
		var $codigo2;
		var $nombre1;
		var $nombre2;
		var $nac;
		var $nacionalidad;
		var $tbg;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->nombre1=$_POST["nombre1"];
			$this->nombre2=$_POST["nombre2"];
			$this->nac=$_POST["nac"];
			$this->sql="select 
						case when lower(a.destip) like '%ordinario%' then c.montot else 0 end as ordinario, 
						case when lower(a.destip) like '%coordinado%' then c.montot else 0 end as coordinado, 
						b.desing, 
						to_char(b.fecing,'dd/mm/yyyy') as fecha, 
						b.refing
						from 
						citiping a, cireging b, ciimping c 
						where
						b.codtip = a.codtip and 
						b.refing = c.refing and
						lower(a.destip) like '%reintegro%'";
						//print ($this->sql);

			$this->cab=new cabecera();
			//$this->SetAutoPageBreak(true,20);
			$this->tbg = $this->bd->select($this->sql);
		}

		function Header()
		{
			$this->SetDrawColor(255,255,255);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->SetDrawColor(0,0,0);
			$this->Rect(97,28,96,15);
			$this->SetXY(135,35);
			$this->cell(20,5,"MES: AGOSTO DEL 2007",0,0,'C');
			$this->Ln(15);
			/*CUADROS DEL ENCABEZADO*/
			$aqui = $this->GetY();
			$this->SetFillColor(190,190,190);
			$this->cuadros(10,$aqui,22,14,2,1,'DF');
			$this->Rect(54,$aqui,101,14,'DF');
			$this->Rect(155,$aqui,74,14,'DF');
			$this->cuadros(155,$aqui+5,37,9,2,1,'DF');
			$this->Rect(229,$aqui,40,14,'DF');
			$this->SetFillColor(255,255,255);

			$this->SetFont("Arial","",10);
			$this->SetXY(10,$aqui+3);
			$this->MultiCell(22,3,"No. de Planilla",0,'C',0);
			$this->SetXY(32,$aqui+3);
			$this->MultiCell(22,3,"Fecha Cancelacion",0,'C',0);
			$this->SetXY(54,$aqui+5);
			$this->MultiCell(101,3,"Concepto",0,'C',0);
			$this->SetXY(155,$aqui+1);
			$this->MultiCell(74,3,"Tipo de Ingreso",0,'C',0);

			$this->SetXY(155,$aqui+7);
			$this->MultiCell(37,3,"Ordinario monto
			Bs.",0,'C',0);
			$this->SetXY(192,$aqui+7);
			$this->MultiCell(37,3,"Coordinado monto
			Bs.",0,'C',0);

			$this->SetXY(229,$aqui+5);
			$this->MultiCell(40,3,"Banco",0,'C',0);
			$this->SetY($aqui+14);


		}

		function cuadros($posx, $posy, $ancho, $alto, $cantidadh, $cantidadv, $estilo)
		{
			/*******************************************/
			/****ESTA FUNCION ES PARA PINTAR CUADROS****/
			/*******************************************/
			for($x=0;$x < $cantidadh;$x++)
			{
				for($y=0;$y < $cantidadv;$y++)
				{
					$forx=$posx+($x*$ancho);
					$fory=$posy+($y*$alto);
					$this->Rect($forx,$fory,$ancho,$alto,$estilo);
				}
			}
		}

		function Cuerpo()
		{
			$this->SetWidths(array(22,22,101,37,37,40));
			$this->SetAligns(array('C','C','L','R','R','C'));
			$acumulador1=0;
			$acumulador2=0;
			while(!$this->tbg->EOF)
			{
				$this->Row(array($this->tbg->fields["refing"],$this->tbg->fields["fecha"],ucfirst(strtolower($this->tbg->fields["desing"])),number_format($this->tbg->fields["ordinario"],2,'.',','),number_format($this->tbg->fields["coordinado"],2,'.',','),"BANFOANDES"));
				$acumulador1+=$this->tbg->fields["ordinario"];
				$acumulador2+=$this->tbg->fields["coordinado"];
				$this->tbg->MoveNext();
			}
			$this->Cell(145,8,"TOTAL...",1,0,'C');
			$this->Cell(37,8,number_format($acumulador1,2,'.',','),1,0,'R');
			$this->Cell(37,8,number_format($acumulador2,2,'.',','),1,0,'R');
			
		}
	}
?>