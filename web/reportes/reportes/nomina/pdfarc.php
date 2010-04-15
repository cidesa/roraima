<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Herramientas.class.php");


	class pdfreporte extends fpdf
		{

		function pdfreporte()
		{

			$this->bd=new basedatosAdo();
			$this->fpdf("p","mm","legal");
			$this->cabe='s';
			$this->codempdes=H::GetPost("codempdes");
			$this->codemphas=H::GetPost("codemphas");
			$this->perdes=H::GetPost("pernomdes");
			$this->perhas=H::GetPost("pernomhas");
			$this->revisado=H::GetPost("revisado");
			$this->cedula=H::GetPost("cedula");
			$this->rif=H::GetPost("rif");

			$this->anodes=substr($this->perdes,6,4);
			$this->anohas=substr($this->perhas,6,4);


			$this->sqlp="select a.codemp,a.cedemp,a.nomemp,to_char(a.fecing,'dd/mm/yyyy') as fecing,a.codemp,a.nacemp,
			to_char(a.fecret,'dd/mm/yyyy') as fecret
						 from nphojint a
						 where codemp >= '".$this->codempdes."' and codemp <= '".$this->codemphas."' order by a.cedemp,a.codemp";
						// H::PrintR($this->sqlp);exit;
			$this->arrp=$this->bd->select($this->sqlp);

			$this->setAutoPageBreak(true,30);

		}

		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			$this->ln();

		}

	function formato($codemp,$nombre,$cedula,$codemp,$nacemp,$desde,$hasta)
		{	$this->setFont("Arial","B",7);
			$this->ln(-3);
            $aux=split("/",$this->perdes);
            $aux1=split("/",$this->perhas);
			$this->setFont("Arial","B",10);
			$this->cell(90,5,"");
			$this->cell(50,5,"PERIODO");
			$this->setFont("Arial","B",8);
			$this->cell(30,5,"DESDE");
			$this->cell(30,5,"HASTA");
			$this->ln();
			$this->cell(90,5,"");
			$this->cell(45,5,"");
			$this->setFont("Arial","",6);
			$this->cell(8,5,"DIA");
			$this->cell(8,5,"MES");
			$this->cell(10,5,"AÑO");
			$this->cell(5,5,"/");
			$this->cell(8,5,"DIA");
			$this->cell(8,5,"MES");
			$this->cell(10,5,"AÑO");
			$this->ln();
			$this->cell(90,5,"");
			$this->cell(45,5,"");
			$this->setFont("Arial","",8);
			$this->cell(8,5,$aux[0]);
			$this->cell(8,5,$aux[1]);
			$this->cell(10,5,$aux[2]);
			$this->cell(5,5,"/");
			$this->cell(8,5,$aux1[0]);
			$this->cell(8,5,$aux1[1]);
			$this->cell(10,5,$aux1[2]);
			$this->ln();
			$this->cell(150,5,"BENEFICIARIO DE LAS REMUNERACIONES ");

			$this->ln();
			$this->setFont("Arial","",7);
			$this->cell(110,5,"APELLIDOS Y NOMBRES");
			$this->cell(45,5,"NUMERO DE RIF");
			$this->cell(45,5,"CEDULA DE IDENTIDAD");
			$this->ln();
			$this->cell(110,5,$nombre);
			$this->setFont("Arial","",7);
			$this->cell(45,5,$codemp);
			$this->cell(45,5,$nacemp.'-'.$cedula);
			$this->ln();
			$this->setFont("Arial","B",9);
			$this->ln();
			$this->cell(70,5,"TIPO DE AGENTE DE RETENCION ");
			$this->setFont("Arial","",7);
			$this->ln();
			$this->cell(110,5,"PERSONA NATURAL-APELLIDOS Y NOMBRES ");
			$this->cell(45,5,"NUMERO DE RIF");
			$this->cell(45,5,"CONTRIBUYENTE Nº");
			$this->ln();
			$this->cell(110,5,$nombre);
			$this->cell(45,5,$codemp);
			$this->cell(45,5,$nacemp.'-'.$cedula);
			$this->ln();
			$this->cell(110,5,"DEPENDENCIA OFICIAL, ORGANISMO INTERNACIONAL, OTROS");
			$this->cell(45,5,"NUMERO DE RIF");
			$this->cell(45,5,"AGENTE DE RETENCION Nº");
			$this->ln();
			$this->cell(110,5,"Contraloría Metropolitana de Caracas");
			$this->cell(45,5,"G-20001764-3");
			$this->cell(45,5,"Contraloría Metropolitana de Caracas");
			$this->ln();

			$this->cell(110,5,"FUNCIONARIO AUTORIZADO PARA HACER LA RETENCIÓN,  APELLIDOS Y NOMBRES");
			$this->cell(45,5,"NUMERO DE RIF");
			$this->cell(45,5,"CEDULA DE IDENTIDAD");
			$this->ln();
			$this->cell(110,5,$this->revisado);
			$this->cell(45,5,$this->rif);
			$this->cell(45,5,$this->cedula);
			$this->ln();
			$this->setFont("Arial","B",9);
			$this->ln();
			$this->cell(70,5,"DIRECCIÓN DEL AGENTE DE RETENCIÓN");
			$this->ln();
			$this->setFont("Arial","",7);
            $this->cell(160,5,"DE LA SOCIEDAD, COMUNIDAD, DEPENDENCIA OFICIAL, ORGANISMO INTERNACIONAL Y OTROS");
             $this->cell(35,5,"RETENIDO POR:");
            $this->ln();
            $this->cell(165,5,"Avenida Urdaneta, Esqina de Animas a Plaza España, Edificio Centro Financiero Latino, piso 24");
            $this->cell(30,5,"1- retenido");

            $this->ln();
            $this->cell(45,5,"CIUDAD O LUGAR ");
            $this->cell(45,5,"ZONA POSTAL ");
            $this->cell(45,5,"ESTADO O ENTIDAD FEDERAL");
            $this->cell(30,5,"TELÉFONOS");
            $this->cell(30,5,"2-retenido");
            $this->ln();
            $this->cell(45,5,'Caracas');
            $this->cell(45,5,'1010');
            $this->cell(45,5,'Distrito Metropolitano');
            $this->cell(30,5,'0212-5649781');
            $this->cell(30,5,"3-retenido");
            $this->ln();
            $this->cell(165,5,"DE LA RESIDENCIA PARA (TIPO 1 Y 3) : ".$resid);
            $this->cell(30,5,"4-retenido");
            $this->ln();
            $this->cell(45,5,"CIUDAD O LUGAR ");
            $this->cell(45,5,"ZONA POSTAL ");
            $this->cell(45,5,"ESTADO O ENTIDAD FEDERAL");
            $this->cell(30,5,"TELÉFONOS");
            $this->cell(30,5,"5-retenido");
            $this->ln();
            $this->cell(45,5,$LUGAR);
            $this->cell(45,5,$ZPOSTAL);
            $this->cell(45,5,$ENTIDAD);
            $this->cell(30,5,$TELF);
            $this->cell(30,5,"6-retenido");
            $this->ln();


			//$this->cell(110,5,"Fecha de Ingreso :   ".$fecha);
			//$this->ln();
			if(trim($fechar)<>'')
			{
				$this->cell(110,5,"Fecha de Egreso :   ".$fechar);
				$this->ln();
			}
				$this->Ded="select
							nomcon,sum(monto) as monto
						from nphiscon
						where
							codemp='".$codemp."' and
							codcon like 'D%' and codcon not in (select codconimp  from npislr) and
							fecnom>=to_date('$desde','dd/mm/yyyy') and
							fecnom<=to_date('$hasta','dd/mm/yyyy')
						group by codcon,nomcon

						union all

						select
							'ISLR',sum(monto) as monto
						from nphiscon
						where
							codemp='".$codemp."' and codcon in (select codconimp  from npislr) and
							fecnom>=to_date('$desde','dd/mm/yyyy') and
							fecnom<=to_date('$hasta','dd/mm/yyyy')
							";
							//print '<pre>'; print $this->Ded; exit;
			$des=$this->bd->select($this->Ded);
			/*while (!$des->EOF)
				{
    				$this->setFont("Arial","",8);
					$this->cell(110,5,(substr($des->fields['nomcon'],0,100)));
					$this->cell(40,5,(H::FormatoMonto($des->fields['monto'])),0,0,'R');
					$this->ln();
					$acum=$acum+$des->fields['monto'];
					$des->MoveNext();
				}
*/

		}

		function llenararreglo()
		{
			$this->meses[1]='Enero';
			$this->meses[2]='Febrero';
			$this->meses[3]='Marzo';
			$this->meses[4]='Abril';
			$this->meses[5]='Mayo';
			$this->meses[6]='Junio';
			$this->meses[7]='Julio';
			$this->meses[8]='Agosto';
			$this->meses[9]='Septiembre';
			$this->meses[10]='Octubre';
			$this->meses[11]='Noviembre';
			$this->meses[12]='Diciembre';
		}

		function Cuerpo()
		{   $tb=$this->arrp;
			$this->llenararreglo();
			$this->SetLineWidth(0.2);
			while (!$tb->EOF)
			{
				$this->formato($tb->fields['codemp'],$tb->fields['nomemp'],$tb->fields['cedemp'],$tb->fields['codemp'],$tb->fields['nacemp'],$this->perdes,$this->perhas);
				  $this->ln(5);
				  $this->setX(10);
				  $this->setFont("Arial","B",7);
				  $this->SetWidths(array(17,21,17,15,22,15,91));
				  $this->SetAligns(array('C','C','C','C','C','C','C'));
			      $this->SetBorder(true);
                  $this->ln(-1);
                  $this->setFont("Arial","B",6);
			      $this->RowM(array('MES','REMUNERACIÓN Bs','% RETENCION ISLR Bs','RETENCION ISLR','ACUMULADO REMUNERACIÓN Bs','ACUMULADO ISLR Bs','DATOS OBTENIDOS DE LA INFORMACIÓN OBTENIDA POR EL CONTRIBUYENTE'));
			      $this->SetWidths(array(17,21,17,15,22,15,20,18,18));
			        $this->setFont("Arial","",6);
			        $y=$this->GetY();
			         $this->SetBorder(true);
				  $this->SetAligns(array('C','C','C','C','C','C','C','C','C'));

			      $this->RowM(array('','','','','','','INFORMACIÓN SEGÍN ARI','REMUNERACION ANUAL','DESGRAVAMEN EN Bs.'));
			     // $Y=$this->GetY();
			      $this->setFont("Arial","",5);
			      $this->SetXY(173,$y);
			      $this->cell(35,2.9,"CARGA FAMILIAR",1,0,"C");
			      $this->Ln();
			      $this->setFont("Arial","",5);
			      $this->SetX(173);
			      $this->cell(8,5,"CONY",1,0,"C");
			      $this->SetX(173+8);
			      $this->cell(8,5,"ASC",1,0,"C");
			      $this->SetX(173+16);
			      $this->cell(8,5,"DESC",1,0,"C");
			      $this->SetX(173+24);
			      $this->cell(11,5,"TOTAL",1,0,"C");
                  $this->Ln();
			      $this->cell(107,5,"");
			      $this->setFont("Arial","",5);
			      $this->cell(20,5,"PRIMERA RELACIÓN",1,0,"C");
			      $this->cell(18,5,"",1,0,"C");
			      $this->cell(18,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(11,5,"",1,0,"C");
			      $this->Ln();
			      $this->cell(107,5,"");
			      $this->cell(20,5,"SEGUNDA RELACIÓN",1,0,"C");
			      $this->cell(18,5,"",1,0,"C");
			      $this->cell(18,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(11,5,"",1,0,"C");
			      $this->Ln();
			      $this->cell(107,5,"");
			      $this->cell(20,5,"TERCERA RELACIÓN",1,0,"C");
			      $this->cell(18,5,"",1,0,"C");
			      $this->cell(18,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(11,5,"",1,0,"C");
			      $this->Ln();
			      $this->cell(107,5,"");
			      $this->cell(20,5,"CUARTA RELACIÓN",1,0,"C");
			      $this->cell(18,5,"",1,0,"C");
			      $this->cell(18,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(8,5,"",1,0,"C");
			      $this->cell(11,5,"",1,0,"C");
			      $this->setFont("Arial","B",6);
				$i=1;
				$this->SetY($y);
				$acum=0;
				$totalacumA=0;
				$totalacumD=0;
				$acumcant=0;
				$acumD=0;
				$acumcant=0;
				$totaldec=0;
				while ($i<=12)
				{
      				$this->sqlD=("select sum(cantidad) as cant, sum(monto) as monto
							 from nphiscon
							 where
							 codemp='".$tb->fields['codemp']."' and
							 codcon in (select codconimp  from npislr) and
							 to_char(fecnom,'mm')=lpad('".$i."',2,'0') and
							    to_char(fecnom,'yyyy')>=trim('".$this->anodes."') and
								to_char(fecnom,'yyyy')<=trim('".$this->anohas."')");//print $this->sqlD;exit;

			//H::printR($this->sqlD);exit;

				$this->sqlA="select sum(a.monto) as monto from nphiscon a, npconsalint b
								where
								codemp='".$tb->fields['codemp']."' and
								to_char(fecnom,'mm')=lpad('".$i."',2,'0') and
							    to_char(fecnom,'yyyy')>=trim('".$this->anodes."') and
								to_char(fecnom,'yyyy')<=trim('".$this->anohas."') and
								a.codcon=b.codcon and
								a.codnom=b.codnom";
							//	print '<pre>'; print $this->sqlA;
				  //H::printR($this->sqlA);exit;
				  $dec=$this->bd->select($this->sqlD);
				  $asi=$this->bd->select($this->sqlA);

				  $this->setFont("Arial","",8);
				  $this->SetWidths(array(17,21,17,15,22,15));
				  $this->SetAligns(array('R','R','R','R','R','R'));
			      $this->SetBorder(true);
			      $acumA=$acumA+$asi->fields['monto'];
			      $acumD=$acumD+$dec->fields['monto'];
			      $acumcant=$acumcant+$asi->fields['monto'];

			      $totalacumA=$totalacumA+$acumA;
			      $totalacumD=$totalacumD+$acumD;
			      $totaldec=$totaldec+$dec->fields['cant'];
			      $this->RowM(array($this->meses[$i],H::FormatoMonto($asi->fields['monto']),H::FormatoMonto($dec->fields['cant']),H::FormatoMonto($dec->fields['monto']),H::FormatoMonto($acumA),H::FormatoMonto($acumD)));

				$i++;
				}
			      //$this->ln(1);
			      $this->SetX(10);
			      $this->SetWidths(array(17,21,17,15,22,15));
				  $this->SetAligns(array('R','R','R','R','R','R'));
			      $this->SetBorder(true);
			      $acumA=$acumA+$asi->fields['monto'];
			      $acumD=$acumD+$dec->fields['monto'];
			      $this->RowM(array('TOTAL',H::FormatoMonto($acumA),H::FormatoMonto($acumcant),H::FormatoMonto($totaldec),H::FormatoMonto($totalacumA),H::FormatoMonto($totalacumD)));

			      $this->setXY(140,230);
			      $this->cell(50,4,'AGENTE DE RETENCION',0,0,'C');
			      $this->setXY(140,233);
			      $this->cell(50,4,'',0,0,'C');
			      $this->setXY(140,236);
			      $this->cell(50,4,'__________________',0,0,'C');
			      $this->setXY(140,240);
			      $this->cell(50,4,'FIRMA Y SELLO',0,0,'C');

				$this->SetTextColor(0,0,0);
				$tb->MoveNext();
				if(!$tb->EOF)
				{
					$this->addPage();
				}

			}

		}
	}
?>
