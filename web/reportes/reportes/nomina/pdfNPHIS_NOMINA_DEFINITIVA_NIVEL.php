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
		var $sqla;
		var $sqlax;
		var $sqlb;		
		var $sqlc;
		var $sqlx;
		var $sqlt;		
		var $rep;
		var $numero;
		var $cab;
		var $con1;
		var $con2;
		var $car1;
		var $car2;
		var $niv1;
		var $niv2;
		var $emp1;
		var $emp2;
		var $nom;
		var $nombre;
		
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
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->emp1=$_POST["emp1"];
			$this->emp2=$_POST["emp2"];
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];
			$this->car1=$_POST["car1"];
			$this->car2=$_POST["car2"];
			$this->niv1=$_POST["niv1"];
			$this->niv2=$_POST["niv2"];
			$this->nom=$_POST["nom"];

			
			$this->sqla="select distinct(c.codniv)

					from  nphojint c,nphiscon b
					where
					b.codemp=c.codemp and
					b.codnom = rpad('".$this->nom."',3,' ') and
					c.codniv>= rpad('".$this->niv1."',16,' ') and c.codniv <= rpad('".$this->niv2."',16,' ')  
					order by c.codniv";
					

			$this->cab=new cabecera();
			
		}
		
		
		function Header()
		{
			$this->SetTextColor(0,0,0);
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->ln(-1);
			$this->sqlx="select codnom, nomnom, ultfec, profec from npnomina where codnom='".$this->nom."'";
			$tbx=$this->bd->select($this->sqlx);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$codigo=strtoupper($tbx->fields["codnom"]);
			$nombre=strtoupper($tbx->fields["nomnom"]);
			$this->nombre=$nombre;
			$this->cell(17,5,"NOMINA:");
			$this->SetTextColor(0,0,0);
			$this->cell(80,5,$codigo." - ".$nombre);
			$this->SetTextColor(0,0,128);
			$this->cell(20,5,"PERIDO DE                         AL                 ");
			$this->SetTextColor(0,0,0);
			$this->cell(20,5,$this->fecha1."            ".$this->fecha2);
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->ln();
		}
		function Cuerpo()
		{
			$acumasigna3=0;
			$acumdeduc3=0;
			$acumaporte3=0;
			$cont2=0;
		
			$tba2=$this->bd->select($this->sqla);
			$tba2->MoveLast();
			$ult=$tba2->fields["codniv"];
			$tba=$this->bd->select($this->sqla);
						
			while (!$tba->EOF)
			{
			$cont=0;
			$acumasigna2=0;
			$acumdeduc2=0;
			$acumaporte2=0;
			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,128);
			//$this->cell(5,5,"");
			$this->cell(30,5,$tba->fields["codniv"]);
			$this->sqlax="select desniv as cadena 
							from npestorg where codniv='".$tba->fields["codniv"]."' ";
			$tbax=$this->bd->select($this->sqlax);
			$this->cell(50,5,strtoupper($tbax->fields["cadena"]));
			$this->SetTextColor(0,0,0);
			$this->ln();
			//----
				$this->sql="select distinct(c.codemp),c.nomemp,c.numcue,to_char(c.fecing,'dd/mm/yyyy') as fecing,c.fecret,c.cedemp,b.codcar,
						c.codniv as codcat,
						(CASE WHEN c.staemp='A' THEN 'Activo'
							  WHEN c.staemp='S' THEN 'Suspendido'
							  WHEN c.staemp='V' THEN 'Vacaciones' END) as estatus
						from  nphojint c, nphiscon b, npdefcpt e           
						where
						b.codemp=c.codemp and	
						c.codemp>= rpad('".$this->emp1."',16,' ') and c.codemp <= rpad('".$this->emp2."',16,' ') and
						b.codcar>= rpad('".$this->car1."',16,' ') and b.codcar <= rpad('".$this->car2."',16,' ') and
						b.codcon=e.codcon and
						c.codniv>= rpad('".$this->niv1."',16,' ') and c.codniv <= rpad('".$this->niv2."',16,' ') and
						b.fecnom>=to_date('".$this->fecha1."','dd/mm/yyyy') and b.fecnom<=to_date('".$this->fecha2."','dd/mm/yyyy') and
						c.codniv='".$tba->fields["codniv"]."' and
						b.codnom = rpad('".$this->nom."',3,' ')
						
						order by c.nomemp,c.codemp";
				$tb=$this->bd->select($this->sql);	

				while (!$tb->EOF)
				{
				if ($this->GetY()>170)
				{
				$this->ln(300);
				$this->cell(5,5,"");
				}
				$this->SetFillColor(135,135,135);
				$this->Rect(10,$this->GetY(),190,4,"DF");
				$this->setFont("Arial","B",7);
				$this->cell(5,5,"");
				$this->cell(30,5,"Cédula");
				$this->cell(55,5,"Apellidos y Nombres");
				$this->cell(20,5,"F. Ingreso");
				$this->cell(27,5,"C. Cargo");
				$this->cell(50,5,"Descripción del Cargo");
				$this->ln(4);
				$this->cell(4,5,"");
				$this->cell(25,5,$tb->fields["codemp"]);
				$this->cell(61,5,strtoupper($tb->fields["nomemp"]));
				$this->cell(23,5,$tb->fields["fecing"]);
				$this->cell(15,5,$tb->fields["codcar"]);
				$this->sqlt="select nomcar as cadena from npcargos where codcar='".$tb->fields["codcar"]."' ";
				$tbt=$this->bd->select($this->sqlt);
				$this->cell(50,5,strtoupper($tbt->fields["cadena"]));
				$this->ln(4);
				$this->cell(1,5,"");
				$this->cell(23,5,"Código Concep.");
				$this->cell(80,5,"             Nombre Concepto");
				$this->cell(30,5," Asignaciones");
				$this->cell(30,5," Deducciones");
				$this->cell(30,5,"     Aportes");
				$this->Line(12,$this->GetY()+5,31,$this->GetY()+5);
				$this->Line(34,$this->GetY()+5,106,$this->GetY()+5);
				$this->Line(113,$this->GetY()+5,136,$this->GetY()+5);
				$this->Line(143,$this->GetY()+5,166,$this->GetY()+5);
				$this->Line(173,$this->GetY()+5,196,$this->GetY()+5);
				$this->ln();
				
				//--
				$this->sqlb="select c.codemp, c.nomemp,c.numcue,c.fecing,c.fecret,c.cedemp,b.codcar,
						c.codniv as codcat,
						(CASE WHEN c.staemp='A' THEN 'Activo'
							  WHEN c.staemp='S' THEN 'Suspendido'
							  WHEN c.staemp='V' THEN 'Vacaciones' END) as estatus,
						b.codcon,rtrim(e.nomcon) as nomcon,
						(CASE WHEN e.opecon='A' THEN coalesce(sum(b.monto),0) ELSE 0 END) as asigna,
						(CASE WHEN e.opecon='D' THEN coalesce(sum(b.monto),0) ELSE 0 END) as deduc,
						(CASE WHEN e.opecon='P' THEN coalesce(sum(b.monto),0) ELSE 0 END) as aporte
						from  npdefcpt e,nphojint c, nphiscon b              

						where
						b.codnom = rpad('".$this->nom."',3,' ') and
						b.codemp=c.codemp and
						b.codcar>= rpad('".$this->car1."',16,' ') and b.codcar <= rpad('".$this->car2."',16,' ') and
						b.fecnom>=to_date('".$this->fecha1."','dd/mm/yyyy') and b.fecnom<=to_date('".$this->fecha2."','dd/mm/yyyy') and
						b.codcon=e.codcon and
						c.codniv='".$tba->fields["codniv"]."' and
						c.codemp= '".$tb->fields["codemp"]."' 
						
						group by
						c.codemp, c.nomemp,c.numcue,c.fecing,c.fecret,c.cedemp,b.codcar,         
						--d.nomcar,
						c.codniv,
						--f.desniv,
						c.staemp,b.codcon,e.nomcon,e.opecon
						order by c.nomemp,c.codemp,e.opecon,b.codcon";
				$tbb=$this->bd->select($this->sqlb);
				//--
				$acumasigna=0;
				$acumdeduc=0;
				$acumaporte=0;
				while (!$tbb->EOF)
				{
				$this->setFont("Arial","",7);
				$this->cell(1,5,"");
				$this->cell(23,5,"       ".$tbb->fields["codcon"]);
				$this->cell(70,5,substr(strtoupper($tbb->fields["nomcon"]),0,47));
				$this->cell(30,5,number_format($tbb->fields["asigna"],2,'.',','),0,0,"R");
				$this->cell(30,5,number_format($tbb->fields["deduc"],2,'.',','),0,0,"R");
				$this->cell(30,5,number_format($tbb->fields["aporte"],2,'.',','),0,0,"R");
				$acumasigna=$acumasigna+$tbb->fields["asigna"];
				$acumdeduc=$acumdeduc+$tbb->fields["deduc"];
				$acumaporte=$acumaporte+$tbb->fields["aporte"];
				$acumasigna2=$acumasigna2+$tbb->fields["asigna"];
				$acumdeduc2=$acumdeduc2+$tbb->fields["deduc"];
				$acumaporte2=$acumaporte2+$tbb->fields["aporte"];
				$acumasigna3=$acumasigna3+$tbb->fields["asigna"];
				$acumdeduc3=$acumdeduc3+$tbb->fields["deduc"];
				$acumaporte3=$acumaporte3+$tbb->fields["aporte"];
				$this->ln(3);
				$tbb->MoveNext();
				}
				$this->Line(105,$this->GetY()+2,196,$this->GetY()+2);
				$this->setFont("Arial","B",7);
				$this->ln(2);
				$this->cell(80,5,"");
				$this->cell(14,5,"Totales Bs.");
				$this->setFont("Arial","",7);
				$this->cell(30,5,number_format($acumasigna,2,'.',','),0,0,"R");
				$this->cell(30,5,number_format($acumdeduc,2,'.',','),0,0,"R");
				$this->cell(30,5,number_format($acumaporte,2,'.',','),0,0,"R");
				$this->ln(4);
				$this->setFont("Arial","B",7);
				$this->cell(73,5,"");
				$this->cell(21,5,"Neto a Cobrar Bs.");
				$this->setFont("Arial","B",8);
				$this->cell(30,5,number_format($acumasigna-$acumdeduc,2,'.',','),0,0,"R");
				$this->ln();
			$cont=$cont+1;
			$cont2=$cont2+1;	
			
			$tb->MoveNext();
			}

			$this->setFont("Arial","B",7);
			$this->SetTextColor(0,0,128);
			$this->cell(94,5,"TOTAL ".strtoupper($tbax->fields["cadena"]));
			$this->cell(30,5,number_format($acumasigna2,2,'.',','),0,0,"R");
			$this->cell(30,5,number_format($acumdeduc2,2,'.',','),0,0,"R");
			$this->cell(30,5,number_format($acumasigna2-$acumdeduc2,2,'.',','),0,0,"R");
			$this->ln(3);
			$this->cell(94,5,"CANTIDAD DE TRABAJADORES:   ".$cont);
			//$this->cell();
			if ($tba->fields["codniv"]!=$ult)
			{
			$this->ln(300);
			}
			$tba->MoveNext();
			}
			
			$this->ln();
			$this->Line(10,$this->GetY(),200,$this->GetY());
			$this->cell(94,5,"TOTAL ".$this->nombre);
		 	$this->cell(30,5,number_format($acumasigna3,2,'.',','),0,0,"R");
			$this->cell(30,5,number_format($acumdeduc3,2,'.',','),0,0,"R");
			$this->cell(30,5,number_format($acumasigna3-$acumdeduc3,2,'.',','),0,0,"R");
			$this->ln(3);
			$this->cell(94,5,"CANTIDAD DE TRABAJADORES:   ".$cont2);
		}
	}
?>
