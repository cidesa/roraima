<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $tb;
		var $tbb;
		var $tbm;
		var $tbc;
		var $tbco;

		var $cab;
		var $titulos;

		var $nroctaban;
		var $nroofi;
		var $directora;
		var $directorafinan;
		var $observacion;
		var $firmas;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();
			$this->nroctaban=$_POST["nroctaban"];
			$this->nroofi=$_POST["nroofi"];
			$this->directora=$_POST["directora"];
			$this->directorafinan=$_POST["directorafinan"];
			$this->observacion=$_POST["observacion"];
			$this->firmas=$_POST["firmas"];

       		$this->sql= "select
						distinct a.refopp as orden,
						a.monopp,
						c.nomben,
						d.numche as numeroche,
						to_char(d.fecpag,'dd/mm/yyyy') as fecpag,
						d.ctaban as ctaori,
						d.tipmov as tipo
						from
						opordper a,
						opbenefi c,
						opcheper d
						where
						a.cedrif=c.cedrif and
						a.refopp=d.refopp and
						d.numche like rtrim('".$this->nroofi."')||'%' ";


		$this->cab=new cabecera();
		}

		function Header()
		{


			$this->SetFont("Arial","B",8);
			$this->SetXY(30,5+5);
			$this->Cell(20,5,'REPUBLICA BOLIVARIANA DE VENEZUELA ',0,0,'L');
			$this->SetXY(30,5+9);
			$this->Cell(20,5,'GOBERNACION DEL ESTADO TACHIRA',0,0,'L');
			$this->SetXY(30,5+13);
			$this->Cell(10,5,'SECRETARIA DE ADMINISTRACION Y FINANZAS',0,0,'L');
			$this->SetXY(30,5+17);
			$this->Cell(10,5,'DIRECCION DE FINANZAS Y TESORERIA',0,0,'L');

			$this->SetDrawColor(17,51,153);
			$this->SetLineWidth(1);
			$this->line(5,30,210,30);
			$this->SetTextColor(0,0,0);

		}


		function Cuerpo()
		{

		$tb=$this->bd->select($this->sql);

			$this->SetFont("Arial","",11);
			$this->SetXY(145,40);
			$this->Cell(10,5,'San Cristobal, '.$tb->fields["fecpag"],0,0,'L');

   			$this->SetFont("Arial","B",11);
			$this->SetXY(8,50);
			$this->Cell(10,5,'DFT/No. '.$tb->fields["numeroche"],0,0,'L');
   			$this->SetFont("Arial","B",10);
			$this->SetXY(8,61);
			$this->Cell(10,5,'Señores',0,0,'L');

			$tbb=$this->bd->select("  select desenl as desenl
										from tsdefban
									   where numcue='".$tb->fields["ctaori"]."' ");
			$this->SetXY(8,66);
			$this->Cell(10,5,'BANCO '.$tbb->fields["desenl"],0,0,'L');
			$this->SetXY(8,71);
			$this->Cell(10,5,'Agencia Principal',0,0,'L');
			$this->SetXY(8,76);
			$this->Cell(10,5,'Ciudad.',0,0,'L');

			$tbm=$this->bd->select(" select sum(monpag) as monto
									  from opcheper
									  where numche like rtrim('".$tb->fields["numeroche"]."')||'%' ");

			$tbc=$this->bd->select("   select c.destip as tipcuen1
										from tsdefban a,tstipcue c
									   where rtrim(a.numcue)=rtrim('".$this->nroctaban."') and
											 a.tipcue=c.codtip ");


			$this->SetFont("Arial","",10);
			$this->SetXY(8,90);
			$this->MultiCell(190,8.5,'Por medio de la presente, autorizamos al  BANCO '.$tbb->fields["desenl"].', para que proceda a acreditar a la Cuenta Corriente No. '.$this->nroctaban.', la cantidad de: (Bs. '.number_format($tbm->fields["monto"],2,',','.').'), de la Orden de Pago Permanente a nombre de '.$tb->fields["nomben"].' girada contra la Cuenta '.$tbc->fields["tipcuen1"].' No. '.$tb->fields["ctaori"],0,"J",0);


			$this->Rect(8,$this->getY()+3,190,10);
			$this->Rect(8,$this->getY()+13,190,10);
			$this->Line(35,$this->getY()+3,35,$this->getY()+23);
			$this->Line(140,$this->getY()+3,140,$this->getY()+23);

			$this->SetFont("Arial","B",8);
			$this->SetXY(8.5,$this->getY()+5);
			$this->Cell(70,3,'ORDEN DE PAGO ');
			$this->Cell(75,3,'CONCEPTO');
			$this->Cell(20,3,'MONTO ABONO Bs');

			$tbco=$this->bd->select(" select deslib as deslib
									   from tsmovlib
									  where rtrim(reflib)=rtrim('".$tb->fields["numeroche"]."') and
											rtrim(tipmov)=rtrim('".$tb->fields["tipo"]."') ");
			$this->SetFont("Arial","",8);
			$this->SetXY(8.5,$this->getY()+10);
			$this->Cell(40,3,$tb->fields["orden"],0,0,"L");
			$x=$this->GetX();
			$this->Cell(100);
			$this->Cell(20,3,number_format($tbm->fields["monto"],2,',','.'),0,0,"L");
			$this->SetX($x-23);
			$this->MultiCell(100,3,$tbco->fields["deslib"],0,0,"L");
			$this->SetFont("Arial","",10);
			$this->SetXY(8,$this->getY()+10);
			$this->MultiCell(190,8.5,$this->observacion,0,"J",0);

			$this->SetXY(8,$this->getY()+6);
			$this->Cell(10,5,'Por lo antes expuesto, me suscribo de ud;',0,0,'L');
			$this->SetXY(100,$this->getY()+15);
			$this->Cell(10,5,'Atentamente;',0,0,'L');

			$this->SetFont("Arial","BI",10);
			$this->SetXY(40,$this->getY()+15);
			$this->Cell(80,5,$this->directora,0,0,'L');
			$this->Cell(10,5,$this->directorafinan,0,0,'L');

			$this->SetFont("Arial","B",10);
			$this->SetXY(35,$this->getY()+5);
			$this->Cell(75,5,'Directora de Administración ',0,0,'L');
			$this->Cell(10,5,'Directora de Finanzas y Tesorería ',0,0,'L');

			$this->SetFont("Arial","",8);
			$this->SetXY(8,218);
			$this->Cell(15,5,$this->firmas,0,0,'L');
			$this->SetXY(8,222);
			$this->Cell(10,5,'Copias: Dpto. Control Bancario',0,0,'L');
			$this->SetXY(17,226);
			$this->Cell(10,5,'Contabilidad General',0,0,'L');
			$this->SetXY(17,230);
			$this->Cell(10,5,'Archivo',0,0,'L');

			$this->SetFont("Times","BI",18);
			$this->SetXY(80,238);
			$this->Cell(15,5,'Primero Tachira',0,0,'L');
			$this->SetDrawColor(17,51,153);
			$this->SetLineWidth(1);
			$this->line(5,244,210,244);

			$this->SetFont("Arial","",8);
			$this->SetXY(95,246);
			$this->Cell(10,5,'CALLE AMOR PATRIO CRUCE CON CARABOBO - CASCO HISTORICO',0,0,'C');
			$this->SetXY(95,250);
			$this->Cell(10,5,'EDIF. ADMINISTRATIVO PLANTA BAJA - TELF.FAX. 0285- 6002101 - 6002275',0,0,'C');
			$this->SetXY(95,254);
			$this->Cell(10,5,'SAN CRISTOBAL - ESTADO TACHIRA',0,0,'C');


		}
	}
?>