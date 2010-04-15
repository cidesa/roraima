<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $tipo;
		var $referencia;
		var $sql;
		var $tbg;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->tipo=$_POST["tipo"];
			$this->referencia=$_POST["referencia"];


			$this->sql="select
						a.refrei,
						a.codtipgas,
						c.destipgas,
						to_char(a.feclib,'dd/mm/yyyy') as feclib,
						a.cedrif,
						d.nomben,
						a.monmov,
						a.deslib,
						a.reflib,
						e.nomcue,
						e.desenl,
						a.numcue,
						f.codpre,
						f.monto
						from
						tsmovlib a
						left outer join
						nptipgas c
						on (trim(a.codtipgas)=trim(c.codtipgas))
						left outer join
						opbenefi d
						on (trim(a.cedrif)=trim(d.cedrif))
						left outer join
						tsdefban e
						on (trim(a.numcue)=trim(e.numcue))
						left outer join
						tsdetrei f
						on(a.refrei=f.refrei and trim(a.reflib)=trim(f.reflib)),
						tstipmov b
						where
						trim(a.refrei)=trim('".$this->referencia."') and
						trim(a.tipmov)=trim(b.codtip) and
						b.starei = 'S'
						order by a.refrei";
//print $this->sql;exit;
/*
			$this->sql="select
						b.refing,
						c.montot,
						c.codpre,
						b.desing,
						b.anoing,
						b.tipmov,
						b.ctaban,
						to_char(b.fecing,'dd/mm/yyyy') as fecha,
						a.destip
						from
						citiping a, cireging b, ciimping c
						where
						b.codtip = a.codtip and
						b.refing = c.refing and
						trim(b.refing) = trim('".$this->referencia."') and
						lower(a.destip) like '%reintegro%'";
*/
			//print $this->sql;exit;
			$this->cab=new cabecera();
			$this->tbg = $this->bd->select($this->sql);
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

		function Header()
		{
			$this->SetAutoPageBreak(false);
			$this->Image("../../img/logo_1.jpg",35,13,45);
			$tb3=$this->bd->select("select * from empresa where codemp='001'");
			if(!$tb3->EOF)
			{
				$nombre=strtoupper($tb3->fields["nomemp"]);
				$direccion=strtoupper($tb3->fields["diremp"]);
				$telef=strtoupper($tb3->fields["tlfemp"]);
				$fax=strtoupper($tb3->fields["faxemp"]);
			}
	    	//Titulo Descripcion de la Empresa
			$this->setFont("Arial","B",7);
			$a1=35;
			$a2=33;
    		$this->SetXY($a1,$a2);
    		$this->Cell(45,5,$direccion,0,0,'C');
    		$this->SetXY($a1,$a2+3);
    		$this->Cell(45,5,'Tlf:'.$telef,0,0,'C');
    		$this->SetXY($a1,$a2+6);
    		$this->Cell(45,5,'Fax:'.$fax,0,0,'C');
			$this->cuadros(115,14,70,10,1,3,'D');
			$this->SetXY(115,14);
			$this->setFont("Arial","B",12);
			$this->Cell(70,10,$_POST["titulo"],0,0,'C');
			$this->SetXY(115,24);
			$this->Cell(70,10,"No.  ".$this->tbg->fields["refrei"]);
			$this->SetXY(115,34);
			$this->Cell(70,6,"RAMO:");
			$this->SetXY(115,38);
			if(strtoupper(trim($this->tbg->fields["destipgas"]))=="FUNCIONAMIENTO")
			{
				$this->Cell(70,6,"PRESUPUESTO ORDINARIO",0,0,'C');
			}
			elseif(strtoupper(trim($this->tbg->fields["destipgas"]))=="INVERSION")
			{
				$this->Cell(70,6,"PRESUPUESTO COORDINADO",0,0,'C');
			}
			$this->SetXY(115,50);
			$mes = array("01" => "Enero",
						 "02" => "Febrero",
						 "03" => "Marzo",
						 "04" => "Abril",
						 "05" => "Mayo",
						 "06" => "Junio",
						 "07" => "Julio",
						 "08" => "Agosto",
						 "09" => "Septiembre",
						 "10" => "Octubre",
						 "11" => "Noviembre",
						 "12" => "Diciembre");
			$this->setFont("Arial","",8);
			$fecha = explode("/",$this->tbg->fields["feclib"]);
			$this->Cell(1,5,"San Cristobal, ".$fecha[0]." de ".$mes[$fecha[1]]." de ".$fecha[2]);
			$this->SetY(58);
			$this->setFont("Arial","B",10);
			$this->Cell(25,5,"CIUDADANO:");
			$this->Ln(5);
			$this->Cell(30,5,"TESORERO GENERAL DEL ESTADO");
			$this->Ln(5);
			$this->Cell(40,5,"SIRVASE RECIBIR DE:");
			//$this->Cell(30,5,"Otro Rufino Antonio Blanco Fombona");
			$this->Ln(6);
			$this->Rect(10,$this->GetY(),195,195);
			$this->Cell(1,5,"CONSIGNATARIO:");
			$this->ln(5);
		}

		function Cuerpo()
		{
			for($co=1;$co<=2;$co++)
			{
				$this->setFont("Arial","B",10);
				$this->SetX(30);
				$this->Multicell(150,4,$this->tbg->fields["nomben"]);
				$this->Ln(2);
				$this->Line(10,$this->GetY()-1,205,$this->GetY()-1);
				$this->Cell(190,4,"CANTIDAD: ");
				$this->SetX(10);
				$this->setFont("Arial","",10);
				$aqui1=$this->GetY();
				$this->Multicell(190,4,"\n\n\n");
				#$this->Multicell(190,4,"                     ".ucwords(strtolower(H::Obtenermontoescrito($this->tbg->fields["monmov"]))));
				$this->Ln(2);
				$this->Line(10,$this->GetY()-1,205,$this->GetY()-1);
				$this->setFont("Arial","B",10);
				$this->Cell(10,4,"Bs. ");
				$this->setFont("Arial","",10);
				$aqui2=$this->GetY();
				$this->Cell(190);
				#$this->Cell(190,4,H::FormatoMonto($this->tbg->fields["monmov"],2,'.',','));
				$this->Ln(6);
				$this->Line(10,$this->GetY()-1,205,$this->GetY()-1);
				$this->setFont("Arial","B",10);
				$this->Cell(190,4,"CORRESPONDIENTE: ");
				$this->SetX(10);
				$this->setFont("Arial","",10);
				$this->Multicell(190,4,"                                        ".ucwords(strtoupper($this->tbg->fields["deslib"])));
				$this->Ln(2);
				$this->Line(10,$this->GetY()-1,205,$this->GetY()-1);
				/*AHORA VIENE EL CUADRITO DE ADENTRO*/
				$this->Ln(4);
				$this->SetX(13);
				$this->Cell(13,8,"Ano",1,0,'C');
				$codpretit = $this->bd->select("select consec, nomabr,nomext from cpniveles order by consec");
				$this->setFont("Arial","",6);
				$cont=0;
				while(!$codpretit->EOF)
				{
					$this->Cell(12,8,$codpretit->fields["nomabr"],1,0,'C');
					$cont++;
					$codpretit->MoveNext();
				}
				$this->Cell(43,8,"Monto",1,0,'C');
				$this->Ln(8);
				$py = $this->GetY();
				$this->setFont("Arial","",8);
				$total=0;
				$depositos=array();
				while(!$this->tbg->EOF)
				{
					$codpre = explode("-",trim($this->tbg->fields["codpre"]));
					$ano = explode("/",trim($this->tbg->fields["feclib"]));
					$ano = $ano[2];
					$this->SetX(13);
					$this->Cell(13,4,$ano,1,0,'C');
					$cont=0;
					$codpretit->MoveFirst();
					while(!$codpretit->EOF)
					{
						$this->Cell(12,4,$codpre[$codpretit->fields["consec"]-1],1,0,'C');
						$codpretit->MoveNext();
					}
					$this->Cell(43,4,H::FormatoMonto($this->tbg->fields["monto"]),1,0,'C');
					$this->Ln(4);
					$total+=$this->tbg->fields["monmov"];
					$depositos[]=trim($this->tbg->fields["reflib"]);
					$this->tbg->MoveNext();
				}
				if($total==0)
				{
					$total=$this->tbg->fields["monmov"];
				}
				$this->SetY($py);
				$this->tbg->MoveFirst();
				/*FIN DEL CUADRITO DE ADENTRO*/
				$this->Ln(56);
				$this->Line(25,$this->GetY(),90,$this->GetY());
				$this->Line(125,$this->GetY(),200,$this->GetY());
				$this->setFont("Arial","B",10);
				$this->SetX(25);
				$this->Cell(65,5,"LIC.MAYELA CANTOR DE VALERA",0,0,'C');
				$this->Cell(40);
				$this->Cell(65,5,"LIC. JESANIT Y. GUERRERO VALERO",0,0,'C');
				$this->Ln(5);
				$this->SetX(25);
				$this->Cell(65,5,"LIQUIDADOR",0,0,'C');
				$this->Cell(40);
				$this->Cell(65,5,"Tesorera General del Estado(E)",0,0,'C');
				$this->Ln(20);
				$this->Cell(30,5,"CUENTA No. ");
				$this->Cell(65,5,$this->tbg->fields["numcue"]);
				$this->Ln(10);
				$this->Cell(30,5,"BANCO:");
				$this->Cell(65,5,trim($this->tbg->fields["desenl"])." - ".trim($this->tbg->fields["nomcue"]));
				$this->Ln(10);
				$this->Cell(30,5,"DEPOSITO:");
				$this->MultiCell(160,5,implode(", ",$depositos));
				$this->SetXY(12,255);
				$this->Cell(65,5,"CC.CONTABILIDAD");
				$this->SetXY(100,170);
				$this->Cell(65,5,"RECIBI CONFORME:");
				$this->SetXY(130,240);
				#$this->line(125,240,200,240);
				#$this->Cell(65,5,"LIC. JESANIT Y. GUERRERO VALERO",0,0,'C');
				$this->SetXY(130,245);
				#$this->Cell(65,5,"Tesorera General del Estado(E)",0,0,'C');
				$this->SetTextColor(200,50,50);
				$this->SetDrawColor(200,50,50);
				$this->SetXY(50,256);
				$this->setFont("Arial","B",26);
				if($co==1)
				{
					$this->Cell(58,11,"ORIGINAL",1,0,'C');
				}
				else
				{
					$this->Cell(40,11,"COPIA",1,0,'C');
				}
				$this->SetDrawColor(0,0,0);
				$this->SetTextColor(0,0,0);
				$this->SetXY(10,$aqui1);
				$this->setFont("Arial","",10);
				$this->Multicell(190,4,"                     ".ucwords(strtolower(H::Obtenermontoescrito($total))));
				$this->SetXY(20,$aqui2);
				$this->Cell(190,4,H::FormatoMonto($total));
				if($co==1)
				{
					$this->AddPage();
				}



			}
			$this->bd->closed();
		}
	}
?>