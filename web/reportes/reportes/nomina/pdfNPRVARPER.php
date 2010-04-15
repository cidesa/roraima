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
		var $sql;
		var $sql2;
		var $sql3;
		var $sql4;
		var $sql5;
		var $sql6;
		var $sql7;
		var $sql8;
		var $sql9;
		var $sql10;
		var $sql11;
		var $sqla;
		var $sqlax;
		var $sqlb;
		var $sqlc;
		var $sqlx;
		var $sqlt;
		var $sqly;
		var $sqlz;
		var $rep;
		var $numero;
		var $cab;
		var $con1;
		var $con2;
		var $niv1;
		var $niv2;
		var $per1;
		var $per2;
		var $nom;
		var $nombre;
		var $elab;
		var $rev;
		var $auto;
		var $pre;
		var $tipcon;
		var $fecha1;
		var $fecha2;
		var $fechae1;
		var $fechae2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];

			$this->pre=$_POST["pre"];
			$this->auto=$_POST["auto"];
			$this->rev=$_POST["rev"];
			$this->ela=$_POST["ela"];
			$this->nom=$_POST["nom"];
			$this->especial=$_POST["especial"];
  $this->tipnomesp1=$_POST["tipnomesp"];


			/*$this->sqlx="select max(fecnom) as fecha from nphiscon where codnom='".$this->nom."'";
			$tbx=$this->bd->select($this->sqlx);
			print $this->sqlx;*/

			if ($this->especial == 'S')
			{
               $this->sql1="select distinct a.codcon,b.nomcon,a.opecon
						from npdefcpt a,npasiconemp b,npasiconnom c, npnomcal d
						where
						a.codcon=c.codcon and
						a.codcon=b.codcon and a.codcon = d.codcon
						and c.codnom='".$this->nom."'  and d.especial = 'S' and   (d.CODNOMESP) = TRIM('".$this->tipnomesp1."') AND
						impcpt='S'
						order by a.opecon,a.codcon";

			}

			else
			{
				if ($this->especial == 'N') {
				$this->sql1="select distinct a.codcon,b.nomcon,a.opecon
						from npdefcpt a,npasiconemp b,npasiconnom c , npnomcal d
						where
						a.codcon=c.codcon and
						a.codcon=b.codcon  and a.codcon = d.codcon
						and c.codnom='".$this->nom."' and d.especial = 'N' and
						impcpt='S'
						order by a.opecon,a.codcon";}
						if ($this->especial == 'T'){
							$this->sql1="select distinct a.codcon,b.nomcon,a.opecon
						from npdefcpt a,npasiconemp b,npasiconnom c
						where
						a.codcon=c.codcon and
						a.codcon=b.codcon
						and c.codnom='".$this->nom."' and
						impcpt='S'
						order by a.opecon,a.codcon";

						}

			}

				/*SQL DEL REPORT
						SELECT DISTINCT A.CODCON,B.NOMCON,A.OPECON FROM
						NPDEFCPT A,NPASICONEMP B,NPASICONNOM C
						WHERE
						A.CODCON=C.CODCON AND
						A.CodCon=B.CodCon
						AND C.CODNOM='' AND
						impcpt='S'
						ORDER BY A.OPECON,A.CODCON
*/

		//	print $this->sql1;

			$this->cab=new cabecera();

		}


		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->setFont("Arial","B",8);
			$this->ln(-1);
			$this->sqlx="select codnom, nomnom, to_char(ultfec,'dd/mm/yyyy') as ultfec, to_char(profec,'dd/mm/yyyy') as profec
						from npnomina where codnom='".$this->nom."'";
			$tbx=$this->bd->select($this->sqlx);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$codigo=strtoupper($tbx->fields["codnom"]);
			$nombre=strtoupper($tbx->fields["nomnom"]);
			$this->nombre=$nombre;
			$this->cell(17,5,"NOMINA:");
			$this->cell(110,5,$codigo."   -   ".$nombre);
			//$this->ln();
			$this->SetTextColor(0,0,128);
			$this->cell(14,5,"Desde:                                  Hasta:                 ");
			$this->cell(80,5,$tbx->fields["ultfec"]."                 	         ".$tbx->fields["profec"]);
			$this->sqly="select coalesce(numsem,-1) as nombre
						from npnomina where rtrim(codnom)= rtrim('".$this->nom."') ";
			$tby=$this->bd->select($this->sqly);
  			if ($tby->fields["nombre"]<>-1)
			{
				$sem=$tby->fields["nombre"];
			}
			else
			{
				$sem="";
			}
		//	$this->cell(30,5,"SEMANA: ".$sem);
			$this->cell(30,5," ");
			$this->ln();
			if ($this->nom<>'008')
			{
				$this->sqlz="select count(distinct(codemp)) as numero from npnomcal where rtrim(codnom)= rtrim('".$this->nom."') ";
			}
  		    else
			{
				$this->sqlz="select count(codemp) as numero
						from npnomcal
						where (codcon = '156' or codcon= '157' or codcon='161' or codcon = '163')
					    and saldo<>0";
			}
			$tbz=$this->bd->select($this->sqlz);
			$this->cell(30,5,"Nro. de Trabajadores:    ".$tbz->fields["numero"]);
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","B",7);
			$this->ln(7);
			$this->cell(72,5,"");
			$this->cell(69,5,"PERIODO ANTERIOR");
			$this->cell(69,5,"PERIODO ACTUAL");
			$this->cell(50,5,"VARIACIONES");
			$this->ln(6);
			$this->cell(2,5,"");
			$this->cell(12,5,"Código");
			$this->cell(45,5,"Nombre del Concepto");
			$this->cell(21,5,"Cant. Emp.");
			$this->cell(25,5,"Asignaciones");
			$this->cell(22,5,"Deducciones");
			$this->cell(21,5,"Cant. Emp.");
			$this->cell(25,5,"Asignaciones");
			$this->cell(22,5,"Deducciones");
			$this->cell(21,5,"Cant. Emp.");
			$this->cell(25,5,"Asignaciones");
			$this->cell(22,5,"Deducciones");
			$this->ln();
		}
		function Cuerpo()
		{

			$tb=$this->bd->select($this->sql1);
			$asig1=0;
			$asig2=0;
			$asig3=0;
			$deduc1=0;
			$deduc2=0;
			$deduc3=0;
			while (!$tb->EOF)
			{
			if ($this->GetY()>180)
			{
			$this->Line(10,47,270,47);
			$this->Line(10,54,270,54);
			$this->Line(10,59,270,59);
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->Line(10,47,10,$this->GetY());
			$this->Line(68,47,68,$this->GetY());
			$this->Line(136,47,136,$this->GetY());
			$this->Line(203,47,203,$this->GetY());
			$this->Line(270,47,270,$this->GetY());
			$this->ln(100);
			}
			$this->setFont("Arial","",7);
			$this->cell(2,5,"");
			$this->cell(12,5,"  ".strtoupper($tb->fields["codcon"]));
			$this->cell(45,5,substr(strtoupper($tb->fields["nomcon"]),0,27));
			$this->sql3="select max(fecnom) as fecha from nphiscon where codnom='".$this->nom."'";
			$tb3=$this->bd->select($this->sql3);
			$this->sql2="select sum(CASE WHEN monto=0 THEN 0 ELSE 1 END) as numero
						from nphiscon a, npdefcpt b
						where
						a.codcon = b.codcon and
						a.codcon = '".$tb->fields["codcon"]."' and
						a.fecnom='".$tb3->fields["fecha"]."' and
						a.monto > 0
						group by a.codcon,a.codnom, b.impcpt,b.codpar";
			$tb2=$this->bd->select($this->sql2);
			$this->cell(10,5,$tb2->fields["numero"],0,0,"R");//cant.emp1
			$this->sql4="select sum(CASE WHEN b.opecon='A' THEN monto ELSE 0 END) as numero
						from nphiscon a, npdefcpt b
						where
						a.codcon = b.codcon and
						a.codcon = '".$tb->fields["codcon"]."' and
						a.fecnom='".$tb3->fields["fecha"]."' and
						a.monto > 0
						group by a.codcon,a.codnom, b.impcpt,b.codpar";
			$tb4=$this->bd->select($this->sql4);
			$this->cell(29,5,number_format($tb4->fields["numero"],2,',','.'),0,0,"R");//asig1
			$asig1=$asig1+$tb4->fields["numero"];
			$this->sql5="select sum(CASE WHEN b.opecon='D' THEN monto ELSE 0 END) as numero
						from nphiscon a, npdefcpt b
						where
						a.codcon = b.codcon and
						a.codcon = '".$tb->fields["codcon"]."' and
						a.fecnom='".$tb3->fields["fecha"]."' and
						a.monto > 0
						group by a.codcon,a.codnom, b.impcpt,b.codpar";
			$tb5=$this->bd->select($this->sql5);
			$this->cell(24,5,number_format($tb5->fields["numero"],2,',','.'),0,0,"R");//deduc1
			$deduc1=$deduc1+$tb5->fields["numero"];
			$this->sql6="select sum(CASE WHEN monto=0 THEN 0 ELSE 1 END) as numero
						from npnomcal a, npdefcpt b
						where
						a.codcon = b.codcon and
						a.codcon = '".$tb->fields["codcon"]."' and
						a.fecnom='".$tb3->fields["fecha"]."' and
						a.saldo > 0
						group by a.codcon,a.codnom, b.impcpt";
			$tb6=$this->bd->select($this->sql2);
			$this->cell(15,5,$tb6->fields["numero"],0,0,"R");//cant.emp2
			$this->sql7="select sum(CASE WHEN b.opecon='A' THEN saldo ELSE 0 END) as numero
						from npnomcal a, npdefcpt b
						where
						a.codcon = b.codcon and
						a.codcon = '".$tb->fields["codcon"]."' and
						a.saldo > 0
						group by a.codcon,a.codnom, b.impcpt";
			$tb7=$this->bd->select($this->sql7);
			$this->cell(29,5,number_format($tb7->fields["numero"],2,',','.'),0,0,"R");//asig2
			$asig2=$asig2+$tb7->fields["numero"];
			$this->sql8="select sum(CASE WHEN b.opecon='D' THEN saldo ELSE 0 END) as numero
						from npnomcal a, npdefcpt b
						where
						a.codcon = b.codcon and
						a.codcon = '".$tb->fields["codcon"]."' and
						a.saldo > 0
						group by a.codcon,a.codnom, b.impcpt";
			$tb8=$this->bd->select($this->sql8);
			$this->cell(24,5,number_format($tb8->fields["numero"],2,',','.'),0,0,"R");//deduc2
			$deduc2=$deduc2+$tb8->fields["numero"];
			$this->cell(15,5,$tb6->fields["numero"]-$tb2->fields["numero"],0,0,"R");//cantemp3
			$this->cell(29,5,number_format($tb7->fields["numero"]-$tb4->fields["numero"],2,',','.'),0,0,"R");//asig3
			$asig3=$asig3+($tb7->fields["numero"]-$tb4->fields["numero"]);
			$this->cell(24,5,number_format($tb8->fields["numero"]-$tb5->fields["numero"],2,',','.'),0,0,"R");//deduc3
			$deduc3=$deduc3+($tb8->fields["numero"]-$tb5->fields["numero"]);


			$this->ln();
			$tb->MoveNext();
			}
			$this->Line(10,47,270,47);
			$this->Line(10,54,270,54);
			$this->Line(10,59,270,59);
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->Line(10,47,10,$this->GetY());
			$this->Line(68,47,68,$this->GetY());
			$this->Line(136,47,136,$this->GetY());
			$this->Line(203,47,203,$this->GetY());
			$this->Line(270,47,270,$this->GetY());

			$this->ln(2);
			$this->setFont("Arial","B",8);
			$this->cell(75,5,"");
			$this->cell(23,5,number_format($asig1,2,',','.'),0,0,"R");//asig1T
			$this->cell(24,5,number_format($deduc1,2,',','.'),0,0,"R");//deduc1T
			$this->cell(45,5,number_format($asig2,2,',','.'),0,0,"R");//asig2T
			$this->cell(24,5,number_format($deduc2,2,',','.'),0,0,"R");//deduc2T
			//$this->cell(43,5,number_format($asig3,2,',','.'),0,0,"R");//asig3T
			$this->cell(43,5,number_format($asig3+($asig2*-1),2,',','.'),0,0,"R");//asig3T
			$this->cell(24,5,number_format($deduc3+($deduc2*-1),2,',','.'),0,0,"R");//deduc3T
			$this->ln(7);
			$this->cell(86,5,"TOTAL   ".substr($this->nombre,0,35));
			$this->cell(24,5,number_format($asig1-$deduc1,2,',','.'),0,0,"R");
			$this->cell(70,5,number_format($asig2-$deduc2,2,',','.'),0,0,"R");
			$this->cell(67,5,number_format(($asig1-$deduc1)-($asig2-$deduc2),2,',','.'),0,0,"R");
			$this->ln();
			$this->sql9="select count(distinct(a.codemp)) as totemping
						from npnomcal a, nphojint b, npnomina c
						where
						a.codemp=b.codemp and
						a.codnom='".$this->nom."' and
						a.codnom=c.codnom and
						b.fecing>=a.fecnomdes and
						b.fecing<=c.profec and
						b.staemp='A' ";
						//print '<pre>'; print $this->sql9;
			$tb9=$this->bd->select($this->sql9);
			$this->cell(55,5,"TOTAL EMPLEADOS INGRESADOS:");
			$this->cell(5,5,$tb9->fields["totemping"],0,0,"R");
			$this->sql10="select count(distinct(a.codemp)) as totempegr
						from npnomcal a, nphojint b, npnomina c
						where
						a.codemp=b.codemp and
						a.codnom='".$this->nom."' and
						a.codnom=c.codnom and
						b.fecret>=a.fecnomdes and
						b.fecret<=c.profec and
						(b.staemp='R' or b.staemp='E')";
			$tb10=$this->bd->select($this->sql10);
			$this->ln();
			$this->cell(55,5,"TOTAL EMPLEADOS EGRESADOS:");
			$this->cell(5,5,$tb10->fields["totempegr"],0,0,"R");
		}
	}
?>
