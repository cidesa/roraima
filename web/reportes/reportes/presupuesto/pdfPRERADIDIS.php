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
		var $adi1;
		var $adi2;
		var $fecha1;
		var $fecha2;
		var $tipo;
		var $status;
		var $codpre1;
		var $codpre2;
		var $filtro;
		var $auxd=0;
		var $auxc=0;
		var $salant=0;
		var $salact=0;
		var $estado1;
		var $estado2;
		var $titulo;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->adi1=$_POST["adi1"];
			$this->adi2=$_POST["adi2"];
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->tipo=strtoupper($_POST["tipo"]);
			$this->status=strtoupper($_POST["status"]);
			$this->codpre1=$_POST["codpre1"];
			$this->codpre2=$_POST["codpre2"];
			$this->filtro=$_POST["filtro"];


			if ($this->tipo=='A')
			  	{
					$this->estado1='A';
					$this->estado2='A';
					$this->titulo='Creditos Adicionales';
			  	}

		    if ($this->tipo=='D')
				{
					$this->estado1='D';
					$this->estado2='D';
					$this->titulo="Disminuciones";
				}

			if ($this->tipo=='T')
				{
					$this->estado1='A';
					$this->estado2='D';
					$this->titulo="Creditos Adicionales-Disminuciones";
				}

			if ($this->status=='T')
			{
			$this->sql="select a.refadi,
						(CASE WHEN a.adidis='A' THEN 'Adicion' ELSE 'Disminucion' END) as tipadi,
						(CASE WHEN a.adidis='A' THEN b.monmov ELSE 0 END) as monadi,
						(CASE WHEN a.adidis='D' THEN b.monmov ELSE 0 END) as mondis,
						(CASE WHEN a.staadi='A' THEN 'Activo'
							  WHEN a.staadi='N' THEN 'Anulado' END) as status2,
						a.staadi,a.fecanu,to_char(a.fecadi,'dd/mm/yyyy') as fecadi,rtrim(a.desadi) as desadi,rtrim(b.codpre) as codpre,
						rtrim(c.nompre) as nompre,d.despre, d.justificacion, d.enunciado
						from cpadidis a,cpmovadi b, cpdeftit c,cpsoladidis d
						where
						a.refadi = b.refadi and a.refadi = d.refadi and
						b.codpre  = c.codpre  and
						(a.refadi) >= ('".$this->adi1."') and (a.refadi) <= ('".$this->adi2."') and
						a.fecadi >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecadi <= to_date('".$this->fecha2."','dd/mm/yyyy') and
						(b.codpre) >= ('".$this->codpre1."') and (b.codpre) <= ('".$this->codpre2."') and
						(b.codpre) like rtrim('".$this->filtro."') AND
						(RTRIM(A.ADIDIS)= rtrim('".$this->estado1."') OR  RTRIM(A.ADIDIS)=rtrim('".$this->estado2."') )
						order by refadi,a.fecadi,a.adidis desc";
			}
			else
			{
			$this->sql="select a.refadi,
						(CASE WHEN a.adidis='A' THEN 'Adicion' ELSE 'Disminucion' END) as tipadi,
						(CASE WHEN a.adidis='A' THEN b.monmov ELSE 0 END) as monadi,
						(CASE WHEN a.adidis='D' THEN b.monmov ELSE 0 END) as mondis,
						(CASE WHEN a.staadi='A' THEN 'Activo'
							  WHEN a.staadi='N' THEN 'Anulado' END) as status2,
						a.staadi,a.fecanu,to_char(a.fecadi,'dd/mm/yyyy') as fecadi,rtrim(a.desadi) as desadi,rtrim(b.codpre) as codpre,
						rtrim(c.nompre) as nompre,d.despre, d.justificacion, d.enunciado
						from cpadidis a,cpmovadi b, cpdeftit c,cpsoladidis d
						where
						a.refadi = b.refadi and a.refadi = d.refadi and
						b.codpre  = c.codpre  and
						(a.refadi) >= ('".$this->adi1."') and (a.refadi) <= ('".$this->adi2."') and
						a.fecadi >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecadi <= to_date('".$this->fecha2."','dd/mm/yyyy') and
						a.adidis = '".$this->status."' and
						(b.codpre) >= ('".$this->codpre1."') and (b.codpre) <= ('".$this->codpre2."') and
						(b.codpre) like rtrim('".$this->filtro."') AND
						(RTRIM(A.ADIDIS)= rtrim('".$this->estado1."') OR  RTRIM(A.ADIDIS)=rtrim('".$this->estado2."') )
						order by a.refadi,a.fecadi,a.adidis desc";

			}
		//	print '<pre>'; print $this->sql; exit;
			$this->cab=new cabecera();
			//$this->SetAutoPageBreak(true,35);

		}

		function Header()
		{
		$this->cab->poner_cabecera_f_b($this,$_POST["titulo"],$this->conf,"s","s");

			$mascara="PR-AC-PAR-GE-ES-SE";
			$sql="Select obtener_mascara() as mascara";
			$mytb=$this->bd->select($sql);
			if (!$mytb->EOF){$mascara=$mytb->fields["mascara"];}

			$this->SetDrawColor(255,255,255);
			$this->Line(10,35,270,35);
			$this->SetDrawColor(0,0,0);
			//$this->ln();
			$this->SetTextColor(0,0,128);
			$this->setFont("Arial","B",9);
			$this->cell(107,5,"");
			$this->cell(30,5,"Del  ".$this->fecha1."                   Hasta  ".$this->fecha2);
			$this->Line(10,43,270,43);
			$this->SetTextColor(135,0,0);
			$this->ln(6);
			$this->cell(2,5,"");
			$this->cell(36,5,"Referencia");
			$this->cell(35,5,"Tipo");
			$this->cell(20,5,"Fecha");
			$this->cell(35,5,"Descripción");
			$this->ln(4);
			$this->cell(3,5,"");
			$this->cell(25,5,"Adición");
			$this->cell(65,5,"Código Presupuestario");
			$this->cell(98,5,"Descrip. Código Presupuestario");
			$this->cell(50,5,"Monto Adiciones");
			$this->cell(35,5,"Monto");
			$this->ln(4);
			$this->SetTextColor(0,0,128);
			$this->cell(28,5,"");
			$this->cell(90,5,$mascara);
			$this->SetTextColor(150,0,0);
			$this->cell(117,5,"Adición");
			$this->cell(35,5,"Disminuciones");
			$this->ln(4);
			$this->SetTextColor(0,0,0);
			$this->SetLineWidth(0.5);
			$this->Line(10,56,270,56);
			$this->SetLineWidth(0.2);
			$this->ln(3);

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);

			$acum1=0;
			$acum2=0;
			$acumt1=0;
			$acumt2=0;
			if (!$tb2->EOF)
			{
				$ref=$tb2->fields["refadi"];
				$this->setFont("Arial","",8);
				$this->cell(3,5,"");
				$this->cell(34,3,$tb2->fields["refadi"]);
				$this->cell(34,3,$tb2->fields["tipadi"]);
				$this->cell(20,3,$tb2->fields["fecadi"]);
				$this->Multicell(180,3,ucwords(strtolower($tb->fields["desadi"]).'  .  '.ucwords(strtolower($tb->fields["despre"])).'  .  '.ucwords(strtolower($tb->fields["justificacion"])).'  .  '.ucwords(strtolower($tb->fields["enunciado"]))),0,'L');
				$this->ln();
			}

			while (!$tb->EOF)
			{
				if ($tb->fields["refadi"]!=$ref)
				{
				$this->setFont("Arial","B",8);
				$this->SetTextColor(0,0,128);
				$this->SetDrawColor(0,0,128);
				$this->Line(200,$this->GetY(),270,$this->GetY());
				$this->cell(170,5,"");
				$this->cell(24,5,"SUB-TOTAL");
				$this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
				$this->SetTextColor(0,0,0);
				$this->SetDrawColor(0,0,0);
				$this->setFont("Arial","",8);
				$this->cell(25,5,number_format($acum1,2,'.',','),0,0,'R');
				$this->cell(40,5,number_format($acum2,2,'.',','),0,0,'R');
				$acum1=0;
				$acum2=0;
				$this->ln(9);
				if ($this->GetY()>175){$this->ln(300);$this->cell(5,5,"");$this->ln(1);$this->ln(-1);}
				$this->setFont("Arial","",8);
				$this->cell(3,5,"");
				$this->cell(34,3,$tb->fields["refadi"]);
				$this->cell(34,3,$tb->fields["tipadi"]);
				$this->cell(20,3,$tb->fields["fecadi"]);
				$this->Multicell(180,3,ucwords(strtolower($tb->fields["desadi"]).'  .  '.ucwords(strtolower($tb->fields["despre"])).'  .  '.ucwords(strtolower($tb->fields["justificacion"])).'  .  '.ucwords(strtolower($tb->fields["enunciado"]))),0,'L');
                $this->ln();
				}
			//Detalle
			$this->setFont("Arial","",8);
			$ref=$tb->fields["refadi"];

			$this->cell(3,3,"");
			$this->cell(25,3,"");
			$this->cell(65,3,$tb->fields["codpre"]);
			$x=$this->GetX();
			$this->cell(76);
			$this->cell(50,3,number_format($tb->fields["monadi"],2,'.',','),0,0,'R');
			$this->cell(40,3,number_format($tb->fields["mondis"],2,'.',','),0,0,'R');
			$this->SetX($x);
			$this->Multicell(76,3,ucwords(strtolower($tb->fields["nompre"])));
			$acum1=$acum1+$tb->fields["monadi"];
			$acum2=$acum2+$tb->fields["mondis"];
			$acumt1=$acumt1+$tb->fields["monadi"];
			$acumt2=$acumt2+$tb->fields["mondis"];

			$this->ln();
			$tb->MoveNext();
			}
			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,128);
			$this->SetDrawColor(0,0,128);
			$this->Line(200,$this->GetY(),270,$this->GetY());
			$this->cell(170,5,"");
			$this->cell(24,5,"SUB-TOTAL");
			$this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
			$this->SetTextColor(0,0,0);
			$this->SetDrawColor(0,0,0);
			$this->setFont("Arial","",8);
			$this->cell(25,5,number_format($acum1,2,'.',','),0,0,'R');
			$this->cell(40,5,number_format($acum2,2,'.',','),0,0,'R');
			$this->ln(7);
			$this->SetTextColor(0,0,128);
			$this->SetDrawColor(0,0,128);
			$this->setFont("Arial","B",8);
			$this->cell(170,5,"");
			$this->cell(24,5,"     TOTAL");
			$this->SetLineWidth(0.5);
			$this->Line(200,$this->GetY(),270,$this->GetY());
			$this->SetTextColor(0,0,0);
			$this->SetDrawColor(0,0,128);
			$this->setFont("Arial","",8);
			$this->cell(25,5,number_format($acumt1,2,'.',','),0,0,'R');
			$this->cell(40,5,number_format($acumt2,2,'.',','),0,0,'R');

		}
	}
?>
