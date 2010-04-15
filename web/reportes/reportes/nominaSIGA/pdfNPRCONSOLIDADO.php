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
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->nom=$_POST["nom"];

			
			$this->sql="select a.nacemp,a.cedemp as codemp ,a.codemp as idemp,b.codnom, a.nomemp,numcue,d.codban as codban,
						b.codcar,c.nomcar,sum(montonomina) as monto 
						from nphojint a,npasicaremp b,npcargos c ,npbancos d
						where 
						a.codban=d.codban and
						b.codemp = a.codemp and 
						b.codcar=c.codcar and
						d.codban='".$this->nom."' and
						status='V' 
						and a.staemp in (select codsitemp from npsitemp where calnom='S')
						and b.codemp in (select distinct codemp from npnomcal)
						 --where codnom=:tipnomdes)
						 and numcue is not null
						 group by b.codnom,d.codban,a.cedemp,a.codemp,a.nomemp,b.codcar,c.nomcar,numcue,a.nacemp
						 order by b.codnom,d.codban, rtrim(a.codemp)";
					

			$this->cab=new cabecera();
			
		}
		
		
		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$this->ln(-1);
			$this->sqly="select nomban from npbancos where codban='".$this->nom."'";
			$tby=$this->bd->select($this->sqly);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$nombre2=strtoupper($tby->fields["nomban"]);
			$this->nombre=$nombre2;
			$this->cell(185,5,$nombre2,0,0,"C");
			$this->SetTextColor(0,0,0);
			$this->ln(10);
			//--
			
			
		}
		function Cuerpo()
		{
			
			$this->setFont("Arial","B",9);
			$tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			
			$acum=0;
			$cont=0;
			$acum2=0;
			$cont2=0;
			if (!$tb2->EOF)
			{
			$ref=$tb2->fields["codnom"];
			$this->sqlx="select codnom, nomnom, to_char(ultfec,'dd/mm/yyyy') as ultfec, to_char(profec,'dd/mm/yyyy') as profec 
			from npnomina where codnom='".$tb2->fields["codnom"]."'";
			$tbx=$this->bd->select($this->sqlx);
			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,0);
			$codigo=strtoupper($tbx->fields["codnom"]);
			$nombre=strtoupper($tbx->fields["nomnom"]);
			$this->nombre=$nombre;
			$this->cell(17,5,"NOMINA:");
			$this->cell(130,5,$codigo."    -    ".$nombre);
			$this->setFont("Arial","",7);
			$this->cell(8,5,"DEL                         AL                 ");
			$this->SetTextColor(0,0,0);
			$this->cell(20,5,$tbx->fields["ultfec"]."            ".$tbx->fields["profec"]);
			$this->ln(7);
			$this->Line(10,$this->GetY(),200,$this->GetY());
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->setFont("Arial","B",8);
			$this->cell(1,5,"");
			$this->cell(16,5,"CEDULA");
			$this->cell(53,5,"NOMBRE DEL EMPLEADO");
			$this->cell(62,5,"CARGO");
			$this->cell(33,5,"CUENTA BANCARIA");
			$this->cell(20,5,"NETO A COBRAR");
			$this->ln();
			
			}
			
			while (!$tb->EOF)
			{
				if ($tb->fields["codnom"]!=$ref)
				{
				$this->ln(2);
				$this->Line(10,$this->GetY()-1,200,$this->GetY()-1);
				$this->setFont("Arial","B",8);
				$this->cell(160,5,"TOTAL ".$nombre);
				$this->cell(29,5,number_format($acum,2,'.',','),0,0,"R");
				$this->ln();
				$this->cell(160,5,"CANTIDAD DE TRABAJADORES DE LA NOMINA    ".$cont);
				
				//----
				$acum=0;
				$cont=0;
				$this->ln(300);
				$this->sqlx="select codnom, nomnom, ultfec, profec from npnomina where codnom='".$tb->fields["codnom"]."'";
				$tbx=$this->bd->select($this->sqlx);
				$this->setFont("Arial","B",8);
				$this->SetTextColor(0,0,0);
				$codigo=strtoupper($tbx->fields["codnom"]);
				$nombre=strtoupper($tbx->fields["nomnom"]);
				$this->cell(17,5,"NOMINA:");
				$this->cell(130,5,$codigo."    -    ".$nombre);
				$this->setFont("Arial","",7);
				$this->cell(8,5,"DEL                         AL                 ");
				$this->SetTextColor(0,0,0);
				$this->cell(20,5,$this->fecha1."            ".$this->fecha2);
				$this->ln(7);
				$this->Line(10,$this->GetY(),200,$this->GetY());
				$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
				$this->setFont("Arial","B",8);
				$this->cell(1,5,"");
				$this->cell(16,5,"CEDULA");
				$this->cell(53,5,"NOMBRE DEL EMPLEADO");
				$this->cell(62,5,"CARGO");
				$this->cell(33,5,"CUENTA BANCARIA");
				$this->cell(20,5,"NETO A COBRAR");
				$this->ln();
				}
			//Detalle
			$ref=$tb->fields["codnom"];
			$this->setFont("Arial","",7);
			$this->cell(1,5,"");
			$this->cell(16,5,$tb->fields["codemp"]);
			$this->cell(53,5,strtoupper($tb->fields["nomemp"]));
			$this->cell(62,5,strtoupper($tb->fields["nomcar"]));
			$this->cell(33,5,$tb->fields["numcue"]);
			$this->cell(24,5,number_format($tb->fields["monto"],2,'.',','),0,0,"R");
			$acum=$acum+$tb->fields["monto"];
			$cont=$cont+1;
			$acum2=$acum2+$tb->fields["monto"];
			$cont2=$cont2+1;
			$this->ln(4);
			$tb->MoveNext();
			}
			$this->ln(2);
			$this->Line(10,$this->GetY()-1,200,$this->GetY()-1);
			$this->setFont("Arial","B",8);
			$this->cell(160,5,"TOTAL ".$this->nombre);
			$this->cell(29,5,number_format($acum,2,'.',','),0,0,"R");
			$this->ln();
			$this->cell(160,5,"CANTIDAD DE TRABAJADORES DE LA NOMINA    ".$cont);
			$this->ln(8);
			$this->Rect(10,$this->GetY()-1,190,12);
			$this->cell(160,5,"TOTAL ".$this->nombre);
			$this->cell(29,5,number_format($acum2,2,'.',','),0,0,"R");
			$this->ln();
			$this->cell(160,5,"CANTIDAD DE TRABAJADORES:    ".$cont2);	
		}
	}
?>
