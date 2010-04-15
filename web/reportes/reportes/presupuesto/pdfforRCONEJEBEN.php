<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $titulo;
		var $sql;
		var $per1; 
		var $per2; 
		var $cod1; 
		var $cod2; 
		var $tip1; 
		var $fec1; 
		var $fec2; 
				
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
            $this->titulo=$_POST["titulo"];
			$this->bd=new basedatosAdo();
			$this->per1=$_POST["per1"];
			$this->per2=$_POST["per2"];
			$this->fec1=$_POST["fec1"];
			$this->fec2=$_POST["fec2"];
			$this->tip1=trim($_POST["tip1"]);
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			
			// sacamos todos los proveedores que tengan compromisos, pagos y/o causados
			
			if ($this->tip1=='t')	
			{
				$this->sqlg="select distinct(a.codpro), a.nompro
						from caprovee a
						
						where
						--precom
						(trim(a.codpro) in
						(select trim(y.cedrif) from cpprecom x, cpcompro y, cpimpprc c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where 
						x.refprc=y.refprc and
						x.fecprc>=to_date('".$this->fec1."','dd/mm/yyyy')
						and x.fecprc<=to_date('".$this->fec2."','dd/mm/yyyy')
						and to_char(x.fecprc,'mm')>='".$this->per1."'
						and to_char(x.fecprc,'mm')<='".$this->per2."'
						and x.refprc=c.refprc
						and c.codpre=d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')))
						
						--compro
						or (trim(a.codpro) in
						(select trim(x.cedrif) from cpcompro x, cpimpcom c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where x.feccom>=to_date('".$this->fec1."','dd/mm/yyyy')
						and x.feccom<=to_date('".$this->fec2."','dd/mm/yyyy')
						and to_char(x.feccom,'mm')>='".$this->per1."'
						and to_char(x.feccom,'mm')<='".$this->per2."'
						and x.refcom=c.refcom
						and c.codpre=d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')))
						
						--causad
						or (trim(a.codpro) in
						(select trim(x.cedrif) from cpcausad x, cpimpcau c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where x.feccau>=to_date('".$this->fec1."','dd/mm/yyyy')
						and x.feccau<=to_date('".$this->fec2."','dd/mm/yyyy')
						and to_char(x.feccau,'mm')>='".$this->per1."'
						and to_char(x.feccau,'mm')<='".$this->per2."'
						and x.refcau=c.refcau
						and c.codpre=d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')))
						
						--pagos
						or (trim(a.codpro) in
						(select trim(x.cedrif) from cppagos x, cpimppag c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where x.fecpag>=to_date('".$this->fec1."','dd/mm/yyyy')
						and x.fecpag<=to_date('".$this->fec2."','dd/mm/yyyy')
						and to_char(x.fecpag,'mm')>='".$this->per1."'
						and to_char(x.fecpag,'mm')<='".$this->per2."'
						and x.refpag=c.refpag
						and c.codpre=d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')))

						order by a.codpro 
						
						--trim(a.codpro) in (select trim(x.cedrif) from cpcompro x)
						--or trim(a.codpro) in (select trim(y.cedrif) from cppagos y)
						--or trim(a.codpro) in (select trim(z.cedrif) from cpcausad z) 
						--trim(a.codpro)='J075121058'
						--limit 5";
			}
			else if ($this->tip1=='prc')	
			{
				$this->sqlg="select distinct(a.codpro), a.nompro
						from caprovee a
						
						where
						--precom
						(trim(a.codpro) in
						(select trim(y.cedrif) from cpprecom x, cpcompro y, cpimpprc c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where 
						x.refprc=y.refprc and
						x.fecprc>=to_date('".$this->fec1."','dd/mm/yyyy')
						and x.fecprc<=to_date('".$this->fec2."','dd/mm/yyyy')
						and to_char(x.fecprc,'mm')>='".$this->per1."'
						and to_char(x.fecprc,'mm')<='".$this->per2."'
						and x.refprc=c.refprc
						and c.codpre=d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')))
						
						order by a.codpro";
			}
			
			else if ($this->tip1=='com')	
			{
				$this->sqlg="select distinct(a.codpro), a.nompro
						from caprovee a
						
						where
						--compro
						(trim(a.codpro) in
						(select trim(x.cedrif) from cpcompro x, cpimpcom c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where x.feccom>=to_date('".$this->fec1."','dd/mm/yyyy')
						and x.feccom<=to_date('".$this->fec2."','dd/mm/yyyy')
						and to_char(x.feccom,'mm')>='".$this->per1."'
						and to_char(x.feccom,'mm')<='".$this->per2."'
						and x.refcom=c.refcom
						and c.codpre=d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')))
						
						order by a.codpro";
			}
			
			else if ($this->tip1=='cau')	
			{
				$this->sqlg="select distinct(a.codpro), a.nompro
						from caprovee a
						
						where
						--causad
						(trim(a.codpro) in
						(select trim(x.cedrif) from cpcausad x, cpimpcau c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where x.feccau>=to_date('".$this->fec1."','dd/mm/yyyy')
						and x.feccau<=to_date('".$this->fec2."','dd/mm/yyyy')
						and to_char(x.feccau,'mm')>='".$this->per1."'
						and to_char(x.feccau,'mm')<='".$this->per2."'
						and x.refcau=c.refcau
						and c.codpre=d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')))
						
						order by a.codpro";
			}
			
			else if ($this->tip1=='pag')	
			{
				$this->sqlg="select distinct(a.codpro), a.nompro
						from caprovee a
						
						where
						--pagos
						(trim(a.codpro) in
						(select trim(x.cedrif) from cppagos x, cpimppag c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where x.fecpag>=to_date('".$this->fec1."','dd/mm/yyyy')
						and x.fecpag<=to_date('".$this->fec2."','dd/mm/yyyy')
						and to_char(x.fecpag,'mm')>='".$this->per1."'
						and to_char(x.fecpag,'mm')<='".$this->per2."'
						and x.refpag=c.refpag
						and c.codpre=d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')))
						
						order by a.codpro";
			}
			
			
		}
		

		function Header()
		{
			$this->Image("../../img/logo_1.jpg",11,8,20);
			$this->settextcolor(0,0,0);
			/////////////////////
			$this->Rect(10,10,260,20);
			$this->setFont("Arial","",6);
			$this->SetY(11);
			$this->SetX(45);
			$this->cell(5,5,"OPSU");
			$this->SetY(13);
			$this->SetX(45);
			$this->cell(5,5,"DIRECCION DE PRESUPUESTO");
			$this->setFont("Arial","",7);
			$this->SetY(11);
			$this->SetX(254);
			$this->cell(5,5,"FECHA");
			$this->setFont("Arial","",8);
			$this->SetY(15);
			$this->SetX(253);
			$this->cell(5,5,date('d/m/y'));
			$this->setFont("Arial","B",14);
			$this->SetY(18);
			$this->SetX(85);
			$this->Multicell(100,5,$this->titulo,0,'C');
			$this->setFont("Arial","",7);
			$this->SetY(25);
			$this->SetX(10);
			$this->cell(5,5,"PRESUPUESTO   ");
			$this->setFont("Arial","B",7);
			$this->SetX(30);
			$this->cell(5,5,date('Y'));

			////////////////////
			$this->line(10,32,270,32);
			$this->line(10,44,270,44);
			
			$this->setFont("Arial","",7);
			
			$this->sety(33);
			$this->setx(12);
			$this->cell(5,5,"CEDULA/RIF");
			$this->sety(33);
			$this->setx(44);
			$this->cell(5,5,"NOMBRE DEL BENEFICIARIO");
			
			$this->sety(39);
			$this->setx(11);
			$this->cell(5,5,"FECHA");
			$this->sety(39);
			$this->setx(28);
			$this->cell(5,5,"TIPO");
			$this->sety(39);
			$this->setx(42);
			$this->cell(5,5,"REFERENCIA/DOC");
			$this->sety(39);
			$this->setx(68);
			$this->cell(5,5,"DESCRIPCION DEL DOCUMENTO");
			$this->sety(39);
			$this->setx(152);
			$this->cell(5,5,"PARTIDAS DEL DOCUMENTO(Código y Nombre)");
			$this->sety(39);
			$this->setx(249);
			$this->cell(5,5,"MONTO");
			
			/////////////////////

			$this->ln(6); 
			
		}
		function Cuerpo()
		{
		    $tbg=$this->bd->select($this->sqlg);
			
			// ciclo de beneficiarios
			while (!$tbg->EOF)
			{
			$cedrif=trim($tbg->fields["codpro"]);
		
				$this->settextcolor(0,0,170);		
				$this->setFont("Arial","B",8);			
				$this->setx(12);
				$this->cell(5,5,$tbg->fields["codpro"]);
				$this->setx(44);
				$this->cell(5,5,$tbg->fields["nompro"]);
				$this->settextcolor(0,0,0);
				
				if ($this->tip1=='prc' || $this->tip1=='t')	
				{
				$this->ln();
				$this->setx(15);
				$this->cell(5,5,"PRECOMPROMISOS");
				$this->ln();
				
				////////////////////////////////////////////
				// sacamos los PRECOMPROMISOS  del proveedor
				$sqla="select to_char(a.fecprc,'dd/mm/yyyy') as fecprc, a.fecprc as fec,a.tipprc,a.refprc,a.desprc
						from cpprecom a, cpcompro b, cpimpprc c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where 

						b.refprc=a.refprc
						and trim(b.cedrif)='".$cedrif."' 
						--per
						and to_char(a.fecprc,'mm')>='".$this->per1."'
						and to_char(a.fecprc,'mm')<='".$this->per2."'
						--fec
						and a.fecprc>=to_date('".$this->fec1."','dd/mm/yyyy')
						and a.fecprc<=to_date('".$this->fec2."','dd/mm/yyyy')
						--codpre
						and a.refprc=c.refprc
						and c.codpre = d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')
						
						order by a.fecprc,a.refprc";
						
				$tba=$this->bd->select($sqla);
				$tba2=$this->bd->select($sqla);
				$acumprctot=0;

				if ($tba2->EOF)
				{
					$this->setFont("Arial","",7);
					$this->setx(20);
					$this->cell(5,5,"No tiene Precompromisos");
					$this->ln();
				}
				while (!$tba->EOF)
				{
					if ($this->gety()>175)
					{
						$this->AddPage();
					}
					$this->setFont("Arial","",7);
					$this->setx(10);
					$this->cell(5,5,$tba->fields["fecprc"]);
					$this->setx(29);
					$this->cell(5,5,$tba->fields["tipprc"]);
					$this->setx(47);
					$this->cell(5,5,$tba->fields["refprc"]);
					$this->ln(1);
					$this->setx(68);
					$this->multicell(80,3,str_pad($tba->fields["desprc"],100,' '),0,'L');
					$this->ln(-7);
						$sqlaa="select a.codpre, b.nompre, a.monimp
								from cpimpprc a left outer join cpdeftit b on (trim(a.codpre) = trim(b.codpre))
								where 
								trim(a.refprc)=trim('".$tba->fields["refprc"]."')";
						$tbaa=$this->bd->select($sqlaa);
						$acumprc=0;
						
						while (!$tbaa->EOF)
						{
							$this->setx(152);
							$this->cell(5,5,$tbaa->fields["codpre"]);
							$this->setx(180);
							$this->cell(5,5,substr($tbaa->fields["nompre"],0,45));
							$this->setx(265);
							$this->cell(5,5,number_format($tbaa->fields["monimp"],2,'.',','),0,0,'R');
							
							$acumprc=$acumprc+$tbaa->fields["monimp"];
							$acumprctot=$acumprctot+$tbaa->fields["monimp"];
							
						$this->ln(4);
						$tbaa->MoveNext();					
						}
						$this->line(245,$this->GetY(),270,$this->GetY());
						$this->setx(265);
						$this->cell(5,5,number_format($acumprc,2,'.',','),0,0,'R');
					
					$this->ln();
				$tba->MoveNext();
				}

					$this->setFont("Arial","B",7);
					$this->setx(140);
					$this->cell(5,5,"TOTAL DE PRECOMPROMISOS");
					$this->setx(265);
					$this->cell(5,5,number_format($acumprctot,2,'.',','),0,0,'R');
					
				}// if prc
			
				////////////////////////////////////////////////////////////
				////////////////////////////////////////////////////////////
				if ($this->tip1=='com' || $this->tip1=='t')
				{
				if ($this->gety()>165)
					{
						$this->AddPage();
					}
				else
				{
					$this->ln(8);
				}
				$this->setx(15);
				$this->cell(5,5,"COMPROMISOS");
				$this->ln();
				
				////////////////////////////////////////////
				// sacamos los COMPROMISOS  del proveedor
				$sqla="select to_char(a.feccom,'dd/mm/yyyy') as feccom, a.feccom as fec,a.tipcom,a.refcom,a.descom
						from cpcompro a, cpimpcom c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where 
						
						trim(a.cedrif)='".$cedrif."' 
						--per
						and to_char(a.feccom,'mm')>='".$this->per1."'
						and to_char(a.feccom,'mm')<='".$this->per2."'
						--fec
						and a.feccom>=to_date('".$this->fec1."','dd/mm/yyyy')
						and a.feccom<=to_date('".$this->fec2."','dd/mm/yyyy')
						--codpre
						and a.refcom=c.refcom
						and c.codpre = d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')
						
						order by a.feccom,a.refcom";
						
				$tba=$this->bd->select($sqla);
				$tba2=$this->bd->select($sqla);
				$acumcomtot=0;

				if ($tba2->EOF)
				{
					$this->setFont("Arial","",7);
					$this->setx(20);
					$this->cell(5,5,"No tiene Compromisos");
					$this->ln();
				}
				while (!$tba->EOF)
				{
					if ($this->gety()>175)
					{
						$this->AddPage();
					}
					$this->setFont("Arial","",7);
					$this->setx(10);
					$this->cell(5,5,$tba->fields["feccom"]);
					$this->setx(29);
					$this->cell(5,5,$tba->fields["tipcom"]);
					$this->setx(47);
					$this->cell(5,5,$tba->fields["refcom"]);
					$this->ln(1);
					$this->setx(68);
					$this->multicell(80,3,str_pad($tba->fields["descom"],100,' '),0,'L');
					$this->ln(-7);
						$sqlaa="select a.codpre, b.nompre, a.monimp
								from cpimpcom a left outer join cpdeftit b on (trim(a.codpre) = trim(b.codpre))
								where 
								trim(a.refcom)=trim('".$tba->fields["refcom"]."')";
						$tbaa=$this->bd->select($sqlaa);
						$acumcom=0;
						
						while (!$tbaa->EOF)
						{
							$this->setx(152);
							$this->cell(5,5,$tbaa->fields["codpre"]);
							$this->setx(180);
							$this->cell(5,5,substr($tbaa->fields["nompre"],0,45));
							$this->setx(265);
							$this->cell(5,5,number_format($tbaa->fields["monimp"],2,'.',','),0,0,'R');
							
							$acumcom=$acumcom+$tbaa->fields["monimp"];
							$acumcomtot=$acumcomtot+$tbaa->fields["monimp"];
							
						$this->ln(4);
						$tbaa->MoveNext();					
						}
						$this->line(245,$this->GetY(),270,$this->GetY());
						$this->setx(265);
						$this->cell(5,5,number_format($acumcom,2,'.',','),0,0,'R');
					
					$this->ln();
				$tba->MoveNext();
				}

					$this->setFont("Arial","B",7);
					$this->setx(140);
					$this->cell(5,5,"TOTAL DE COMPROMISOS");
					$this->setx(265);
					$this->cell(5,5,number_format($acumcomtot,2,'.',','),0,0,'R');	
			
				}// if com
			
			
				////////////////////////////////////////////////////////////
				////////////////////////////////////////////////////////////
				if ($this->tip1=='cau' || $this->tip1=='t')
				{
				if ($this->gety()>165)
					{
						$this->AddPage();
					}
				else
				{
					$this->ln(8);
				}
				$this->setx(15);
				$this->cell(5,5,"CAUSADOS");
				$this->ln();
				
				////////////////////////////////////////////
				// sacamos los CAUSADOS  del proveedor
				$sqla="select to_char(a.feccau,'dd/mm/yyyy') as feccau, a.feccau as fec,a.tipcau,a.refcau,a.descau
						from cpcausad a, cpimpcau c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where 
						trim(a.cedrif)='".$cedrif."' 
						
						--per
						and to_char(a.feccau,'mm')>='".$this->per1."'
						and to_char(a.feccau,'mm')<='".$this->per2."'
						--fec
						and a.feccau>=to_date('".$this->fec1."','dd/mm/yyyy')
						and a.feccau<=to_date('".$this->fec2."','dd/mm/yyyy')
						--codpre
						and a.refcau=c.refcau
						and c.codpre = d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')
						
						order by a.feccau,a.refcau";
						
				$tba=$this->bd->select($sqla);
				$tba2=$this->bd->select($sqla);
				$acumcautot=0;

				if ($tba2->EOF)
				{
					$this->setFont("Arial","",7);
					$this->setx(20);
					$this->cell(5,5,"No tiene Causados");
					$this->ln();
				}
				while (!$tba->EOF)
				{
					if ($this->gety()>175)
					{
						$this->AddPage();
					}
					$this->setFont("Arial","",7);
					$this->setx(10);
					$this->cell(5,5,$tba->fields["feccau"]);
					$this->setx(29);
					$this->cell(5,5,$tba->fields["tipcau"]);
					$this->setx(47);
					$this->cell(5,5,$tba->fields["refcau"]);
					$this->ln(1);
					$this->setx(68);
					$this->multicell(80,3,str_pad($tba->fields["descau"],100,' '),0,'L');
					$this->ln(-7);
						$sqlaa="select a.codpre, b.nompre, a.monimp
								from cpimpcau a left outer join cpdeftit b on (trim(a.codpre) = trim(b.codpre))
								where 
								trim(a.refcau)=trim('".$tba->fields["refcau"]."')";
						$tbaa=$this->bd->select($sqlaa);
						$acumcau=0;
						
						while (!$tbaa->EOF)
						{
							$this->setx(152);
							$this->cell(5,5,$tbaa->fields["codpre"]);
							$this->setx(180);
							$this->cell(5,5,substr($tbaa->fields["nompre"],0,45));
							$this->setx(265);
							$this->cell(5,5,number_format($tbaa->fields["monimp"],2,'.',','),0,0,'R');
							
							$acumcau=$acumcau+$tbaa->fields["monimp"];
							$acumcautot=$acumcautot+$tbaa->fields["monimp"];
							
						$this->ln(4);
						$tbaa->MoveNext();					
						}
						$this->line(245,$this->GetY(),270,$this->GetY());
						$this->setx(265);
						$this->cell(5,5,number_format($acumcau,2,'.',','),0,0,'R');
					
					$this->ln();
				$tba->MoveNext();
				}

					$this->setFont("Arial","B",7);
					$this->setx(140);
					$this->cell(5,5,"TOTAL DE CAUSADOS");
					$this->setx(265);
					$this->cell(5,5,number_format($acumcautot,2,'.',','),0,0,'R');	
					
				}// if cau
			
			
				////////////////////////////////////////////////////////////
				////////////////////////////////////////////////////////////
				if ($this->tip1=='pag' || $this->tip1=='t')
				{
				if ($this->gety()>165)
					{
						$this->AddPage();
					}
				else
				{
					$this->ln(8);
				}
				$this->setx(15);
				$this->cell(5,5,"PAGADOS");
				$this->ln();
				
				////////////////////////////////////////////
				// sacamos los PAGADOS  del proveedor
				$sqla="select to_char(a.fecpag,'dd/mm/yyyy') as fecpag, a.fecpag as fec,a.tippag,a.refpag,a.despag
						from cppagos a, cpimppag c, (select distinct(x.codpre) as codpre from cpasiini x) d
						where 
						trim(a.cedrif)='".$cedrif."' 
						
						--per
						and to_char(a.fecpag,'mm')>='".$this->per1."'
						and to_char(a.fecpag,'mm')<='".$this->per2."'
						--fec
						and a.fecpag>=to_date('".$this->fec1."','dd/mm/yyyy')
						and a.fecpag<=to_date('".$this->fec2."','dd/mm/yyyy')
						--codpre
						and a.refpag=c.refpag
						and c.codpre = d.codpre
						and d.codpre >= rpad('".$this->cod1."',32,' ')
						and d.codpre <= rpad('".$this->cod2."',32,' ')
						
						order by a.fecpag,a.refpag";
						
				$tba=$this->bd->select($sqla);
				$tba2=$this->bd->select($sqla);
				$acumpagtot=0;

				if ($tba2->EOF)
				{
					$this->setFont("Arial","",7);
					$this->setx(20);
					$this->cell(5,5,"No tiene Pagados");
					$this->ln();
				}
				while (!$tba->EOF)
				{
					if ($this->gety()>175)
					{
						$this->AddPage();
					}
					$this->setFont("Arial","",7);
					$this->setx(10);
					$this->cell(5,5,$tba->fields["fecpag"]);
					$this->setx(29);
					$this->cell(5,5,$tba->fields["tippag"]);
					$this->setx(47);
					$this->cell(5,5,$tba->fields["refpag"]);
					$this->ln(1);
					$this->setx(68);
					$this->multicell(80,3,str_pad($tba->fields["despag"],100,' '),0,'L');
					$this->ln(-7);
						$sqlaa="select a.codpre, b.nompre, a.monimp
								from cpimpag a left outer join cpdeftit b on (trim(a.codpre) = trim(b.codpre))
								where 
								trim(a.refpag)=trim('".$tba->fields["refpag"]."')";
						$tbaa=$this->bd->select($sqlaa);
						$acumpag=0;
						
						while (!$tbaa->EOF)
						{
							$this->setx(152);
							$this->cell(5,5,$tbaa->fields["codpre"]);
							$this->setx(180);
							$this->cell(5,5,substr($tbaa->fields["nompre"],0,45));
							$this->setx(265);
							$this->cell(5,5,number_format($tbaa->fields["monimp"],2,'.',','),0,0,'R');
							
							$acumpag=$acumpag+$tbaa->fields["monimp"];
							$acumpagtot=$acumpagtot+$tbaa->fields["monimp"];
							
						$this->ln(4);
						$tbaa->MoveNext();					
						}
						$this->line(245,$this->GetY(),270,$this->GetY());
						$this->setx(265);
						$this->cell(5,5,number_format($acumpag,2,'.',','),0,0,'R');
					
					$this->ln();
				$tba->MoveNext();
				}

					$this->setFont("Arial","B",7);
					$this->setx(140);
					$this->cell(5,5,"TOTAL DE PAGADOS");
					$this->setx(265);
					$this->cell(5,5,number_format($acumpagtot,2,'.',','),0,0,'R');	
				}// if pag
						
			///////////////////////////////////////////////////
			///////////////////////////////////////////////////
			///////////////////////////////////////////////////
			if ($this->gety()>165)
			{
				$this->AddPage();		
			}
			else
			{
				$this->ln(10);
			}
			
			$this->setFont("Arial","B",8);
			$this->setx(12);
			$this->cell(5,5,"RESUMEN TOTAL POR EL BENEFICIARIO:");
			$this->setx(78);
			$this->cell(5,5,$tbg->fields["codpro"]);
			$this->setx(100);
			$this->cell(5,5,$tbg->fields["nompro"]);
			$this->ln(8);
			$this->setFont("Arial","",8);
			$this->setx(12);
			$this->cell(5,5,"Precompromisos:");
			$this->setFont("Arial","B",8);
			$this->setx(65);
			$this->cell(5,5,number_format($acumprctot,2,'.',','),0,0,'R');
			$this->ln();
			$this->setFont("Arial","",8);
			$this->setx(12);
			$this->cell(5,5,"Compromisos:");
			$this->setFont("Arial","B",8);
			$this->setx(65);
			$this->cell(5,5,number_format($acumcomtot,2,'.',','),0,0,'R');
			$this->ln();
			$this->setFont("Arial","",8);
			$this->setx(12);
			$this->cell(5,5,"Causados:");
			$this->setFont("Arial","B",8);
			$this->setx(65);
			$this->cell(5,5,number_format($acumcautot,2,'.',','),0,0,'R');
			$this->ln();
			$this->setFont("Arial","",8);
			$this->setx(12);
			$this->cell(5,5,"Pagados:");
			$this->setFont("Arial","B",8);
			$this->setx(65);
			$this->cell(5,5,number_format($acumpagtot,2,'.',','),0,0,'R');
			
			
			
			
			
			
			
			$this->ln(200);
			$tbg->MoveNext();
			}
			
	
			
		}
	}
?>
