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
		var $sqla;
		var $sqlb;
		var $sqlc;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $emp1;
		var $emp2;
		var $apor1;
		var $apor2;
		var $con;
		var $cont;
		var $acum;
		var $acum2;
		var $nom;
		var $ref3;
		var $ref4;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;
		var $check=0;
		var $elab;
		var $rev;
		var $auto;	
				
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->apor1=$_POST["apor1"];
			$this->apor2=$_POST["apor2"];
			$this->emp1=$_POST["emp1"];
			$this->emp2=$_POST["emp2"];
			$this->nom=$_POST["nom"];
			$this->elab=$_POST["elab"];
			$this->rev=$_POST["rev"];
			$this->auto=$_POST["auto"];

			$this->sql="select c.frecon,a.codtipapo,a.destipapo,a.porapo,a.porret,b.codcon as codconapo,
						b.codnom as codnomapo
						from nptipaportes a,npcontipaporet b,npasiconnom c  
						where 
						a.codtipapo=b.codtipapo and b.codcon=c.codcon and
						b.codnom=c.codnom and 
						a.codtipapo>='".$this->apor1."' and a.codtipapo<='".$this->apor2."' and
						b.codnom =('".$this->nom."') and tipo='A'";
						
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			
		}
		function Cuerpo()
		{
			
			$this->sqlc="select c.frecon,a.codtipapo,a.destipapo,a.porapo,a.porret,b.codcon as codconapo,
						b.codnom as codnomapo
						from nptipaportes a,npcontipaporet b,npasiconnom c  
						where 
						a.codtipapo=b.codtipapo and b.codcon=c.codcon and
						b.codnom=c.codnom and 
						a.codtipapo>='".$this->apor1."' and a.codtipapo<='".$this->apor2."' and
						b.codnom =('".$this->nom."') and tipo='A'";
			$tbc=$this->bd->select($this->sqlc);
			$tbc->MoveLast();
			$x=$tbc->fields["codtipapo"];

			
		    $tb=$this->bd->select($this->sql);
			
			while (!$tb->EOF)
			{
				$codnom=$tb->fields["codnomapo"];
				$codcon=$tb->fields["codconapo"];
			
				$this->setFont("Arial","B",9);
				$this->cell(170,5,strtoupper($tb->fields["destipapo"]),0,0,'C');
				$this->ln(7);
				$this->setFont("Arial","B",8);
				$this->SetTextColor(0,0,128);
				$this->cell(5,5,"");
				$this->sqla="select nomnom from npnomina where codnom='".$this->nom."'";
				$tba=$this->bd->select($this->sqla);
				$this->cell(5,5,"Nómina:   ".$this->nom."  -  ".strtoupper($tba->fields["nomnom"]));
				$this->ln(5);
				
				//-----
				$this->sqla="";
				$this->sqla="SELECT to_char(ultfec,'dd/mm/yyyy') as valor
							 FROM npnomina WHERE codnom='".$this->nom."'";
				$tba=$this->bd->select($this->sqla);
				$this->cell(5,5,"");
				$this->cell(40,5,"Fecha Desde:   ".$tba->fields["valor"]);
				$this->sqla="";
				$this->sqla="SELECT to_char(profec,'dd/mm/yyyy') as valor
							 FROM npnomina WHERE codnom='".$this->nom."'";
				$tba=$this->bd->select($this->sqla);
				$this->cell(50,5,"Fecha Hasta:   ".$tba->fields["valor"]);
				$this->ln(8);
				
				$this->SetFillColor(175,175,175);
				$this->Rect(15,$this->GetY(),165,9,"DF");
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","B",7);
				$this->cell(7,5,"");
				$this->cell(37,5,"CEDULA");
				$this->cell(51,5,"EMPLEADO");
				$this->cell(25,5,"SUELDO");
				$this->cell(27,5,"FECHA DE");
				$this->cell(30,5,"APORTE");
				$this->ln(3);
				$this->cell(7,5,"");
				$this->cell(37,5,"");
				$this->cell(49,5,"");
				$this->cell(27,5,"");
				$this->cell(31,5,"INGRESO");
				$this->cell(30,5,"9%");
				$this->Line(33,$this->GetY()-3,33,$this->GetY()+6);
				$this->Line(98,$this->GetY()-3,98,$this->GetY()+6);
				$this->Line(127,$this->GetY()-3,127,$this->GetY()+6);
				$this->Line(148,$this->GetY()-3,148,$this->GetY()+6);
				//---
				$this->sql2="select distinct (a.codemp) as codemp,a.codnom,a.codcar,a.codcon,sum(a.saldo) as monto,
							to_char(coalesce(fecrei,fecing),'dd/mm/yyyy') as fecing,b.nomemp
							from npnomcal a,nphojint b
							where
							b.codemp=a.codemp and a.codnom='".$codnom."' and a.codcon='".$codcon."' and
							b.codemp >=  rpad('".$this->emp1."',16,' ') and  b.codemp<= rpad('".$this->emp2."',16,' ')
							group by a.codemp,a.codnom,a.codcon,a.codcar,b.nomemp,coalesce(fecrei,fecing)
							having  sum(a.saldo) <>0
							order by a.codemp";
							
				$tb2=$this->bd->select($this->sql2);
				
				$this->ln(6);
				$cont=0;
				$suel=0;
				$apor=0;
				while (!$tb2->EOF)
				{
				$this->Rect(15,$this->GetY(),165,5);
				$this->Line(33,$this->GetY(),33,$this->GetY()+5);
				$this->Line(98,$this->GetY(),98,$this->GetY()+5);
				$this->Line(127,$this->GetY(),127,$this->GetY()+5);
				$this->Line(148,$this->GetY(),148,$this->GetY()+5);
				$this->cell(7,5,"");
				$this->cell(17,5,$tb2->fields["codemp"]);
				$this->cell(71,5,strtoupper($tb2->fields["nomemp"]));
				//--
				$this->sqlb="select coalesce(sum(monto),0) as valor 
							from npasiconemp a,npconsueldo b 
							where 
							codemp=rpad('".$tb2->fields["codemp"]."',16,' ') and codcar=rpad('".$tb2->fields["codcar"]."',16,' ')
							and a.codcon=b.codcon and codnom='".$tb2->fields["codnom"]."'";

				$tbb=$this->bd->select($this->sqlb);
				$this->cell(21,5,number_format($tbb->fields["valor"],2,'.',','),0,0,"R");
				//--
				$this->cell(24,5,$tb2->fields["fecing"],0,0,"C");				
				$this->cell(29,5,number_format($tb2->fields["monto"],2,'.',','),0,0,"R");
				$cont=$cont+1;
				$suel=$suel+$tbb->fields["valor"];
				$apor=$apor+$tb2->fields["monto"];
				$this->ln();
				$tb2->MoveNext();
				}
				//---
				
				$this->SetFillColor(255,255,180);
				$this->Rect(40,$this->GetY()+10,110,30,"DF");
				
				
				$this->SetFillColor(175,175,175);
				$this->Rect(57,$this->GetY()+19,76,15,"DF");
				$this->Line(77,$this->GetY()+19,77,$this->GetY()+34);
				$this->Line(102,$this->GetY()+19,102,$this->GetY()+34);
				
				$this->ln(12);
				$this->SetTextColor(0,0,128);
				$this->cell(78,5,"");
				$this->cell(5,5,"RESUMEN");
				
				$this->ln(12);
				$this->SetTextColor(0,0,0);
				$this->cell(51,5,"");
				$this->cell(5,5,"TOTAL");
				$this->ln(-5);
				$this->cell(68,5,"");
				$this->cell(5,5,"TRABAJADORES");
				$this->ln(5);
				$this->cell(69,5,"");
				$this->cell(5,5,"SUELDO TOTAL");
				$this->ln(5);
				$this->cell(73,5,"");
				$this->cell(5,5,"APORTE");
				
				$this->SetTextColor(0,0,128);
				$this->ln(-10);
				$this->cell(112,5,"");
				$this->cell(10,5,$cont,0,0,'R');
				$this->ln(5);
				$this->cell(102,5,"");
				$this->cell(20,5,number_format($suel,2,'.',','),0,0,'R');
				$this->ln(5);
				$this->cell(102,5,"");
				$this->cell(20,5,number_format($apor,2,'.',','),0,0,'R');
				$this->SetTextColor(0,0,0);
				
				if ($tb->fields["codtipapo"]!=$x)
				{
				$this->ln(250);
				$this->cell(5,5,"");
				}
				else
				{
				$this->ln(250);
				}
				
			$tb->MoveNext();
			}
			
	
			
		}//cuerpo
	}//clase
?>
