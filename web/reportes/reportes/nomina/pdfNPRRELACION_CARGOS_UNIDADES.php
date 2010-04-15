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
		var $sql3;
		var $sql4;
		var $rep;
		var $numero;
		var $cab;
		var $emp1;
		var $emp2;
		var $cod1;
		var $cod2;
		var $con;
		var $cont;

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
		var $carcon=0;
		var $acum=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->emp1=$_POST["emp1"];
			$this->emp2=$_POST["emp2"];
			$this->nom=$_POST["nom"];


			$this->sql1="select distinct(b.codcat) as codpre, d.nomcat as nompre
						from npnomcal a,npasicaremp b,npdefcpt c,npcatpre d
						where
						(d.codcat)=(b.codcat) and
						(a.codemp) >= rpad('".$this->emp1."',16,' ') and (a.codemp) <= rpad('".$this->emp2."',16,' ') and
						(a.codcon) >= rpad('".$this->cod1."',3,' ') and (a.codcon) <= rpad('".$this->cod2."',3,' ') and
						(a.codnom) = rpad('".$this->nom."',3,' ') and
						(b.codemp)=(a.codemp) and (b.codcar)=(a.codcar) and c.codcon=a.codcon and
						(b.status)='V' and
						(impcpt) = 'S' and (opecon) <> 'P' and a.saldo>0 and a.codcon<>'XXX'
						and a.codcon not in (select codcon from npconceptoscategoria)
						order by b.codcat";//print $this->sql1;exit;


			$this->cab=new cabecera();

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);

			$this->sql2="select codnom, nomnom, to_char(ultfec,'dd/mm/yyyy') as ultfec,
						 to_char(profec,'dd/mm/yyyy') as profec
						 from npnomina
						 where codnom='".$this->nom."'";
			$tb2=$this->bd->select($this->sql2);

			$this->SetTextColor(0,0,196);
			$codigo=strtoupper($tb2->fields["codnom"]);
			$nombre=strtoupper($tb2->fields["nomnom"]);
			$this->cell(20,5,"Nómina: ".$codigo." - ".$nombre);
			$this->ln();
			$this->cell(20,5,"DESDE:   : ".$tb2->fields["ultfec"]."       HASTA:   ".$tb2->fields["profec"]);
			$this->ln();
			$this->ln();
			$this->SetTextColor(0,0,0);

		}
		function Cuerpo()
		{

			$tb1=$this->bd->select($this->sql1);



			while (!$tb1->EOF)
			{
			if ($this->GetY()>230)
			{
				$this->ln(300);
			}
			$this->cell(5,5,"");
			$this->ln(1);
			$this->ln(-1);
			$this->setFont("Arial","B",8);
			$this->SetLineWidth(0.5);
			$this->Line(10,$this->GetY()-2,200,$this->GetY()-2);
			$this->SetLineWidth(0.2);
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->Line(10,$this->GetY()+10,200,$this->GetY()+10);
			$this->SetFillColor(90,90,90);
			$this->Rect(10,$this->GetY(),190,4,'F');

			$this->SetTextColor(255);
			$this->cell(10,5,"");
			$this->cell(55,5,$tb1->fields["codpre"]);
			$this->cell(88,5,$tb1->fields["nompre"]);
			$this->sql4="select distinct(b.codemp) as codemp
								from npnomcal a,npasicaremp b,npdefcpt c,npcatpre d
								where

								b.codcat='".$tb1->fields["codpre"]."' and
								(d.codcat)=(b.codcat) and
								(a.codemp) >= rpad('".$this->emp1."',16,' ') and (a.codemp) <= rpad('".$this->emp2."',16,' ') and
								(a.codcon) >= rpad('".$this->cod1."',3,' ') and (a.codcon) <= rpad('".$this->cod2."',3,' ') and
								(a.codnom) = rpad('".$this->nom."',3,' ') and
								(b.codemp)=(a.codemp) and (b.codcar)=(a.codcar) and c.codcon=a.codcon and
								(b.status)='V' and
								(impcpt) = 'S' and (opecon) <> 'P' and a.saldo>0 and a.codcon<>'XXX'
								and a.codcon not in (select codcon from npconceptoscategoria)
								order by b.codemp";
					$tb4=$this->bd->select($this->sql4);
					//--
					$cont=0;
					while (!$tb4->EOF)
					{
					$cont=$cont+1;
					$tb4->MoveNext();
					}
					$this->acum=$this->acum+$cont;
					//--
			$this->cell(30,5,"Cantidad Empleados:  ");
			$this->cell(5,5,$cont,0,0,"R");
			$this->ln();
			$this->SetTextColor(0);
			$this->cell(5,5,"");
			$this->setFont("Arial","B",8);
			$this->cell(55,5,"Código Cargo");
			$this->cell(100,5,"Descripción del Cargo");
			$this->cell(40,5,"Nro. Empleados");
			$this->ln();
			$this->setFont("Arial","",8);

			$this->sql2="select distinct(b.codcar) as codcar,b.nomcar as nomcar
						from npnomcal a,npasicaremp b,npdefcpt c,npcatpre d
						where
						b.codcat='".$tb1->fields["codpre"]."' and
						(d.codcat)=(b.codcat) and
						(a.codemp) >= rpad('".$this->emp1."',16,' ') and (a.codemp) <= rpad('".$this->emp2."',16,' ') and
						(a.codcon) >= rpad('".$this->cod1."',3,' ') and (a.codcon) <= rpad('".$this->cod2."',3,' ') and
						(a.codnom) = rpad('".$this->nom."',3,' ') and
						(b.codemp)=(a.codemp) and (b.codcar)=(a.codcar) and c.codcon=a.codcon and
						(b.status)='V' and
						(impcpt) = 'S' and (opecon) <> 'P' and a.saldo>0 and a.codcon<>'XXX'
						and a.codcon not in (select codcon from npconceptoscategoria)
						order by b.codcar";
			$tb2=$this->bd->select($this->sql2);

			while (!$tb2->EOF)
			{
			$this->cell(11,5,"");
			$this->cell(40,5,$tb2->fields["codcar"]);
			$this->cell(80,5,$tb2->fields["nomcar"]);
			$this->sql3="select distinct(b.codemp) as codemp
						from npnomcal a,npasicaremp b,npdefcpt c,npcatpre d
						where
						b.codcar='".$tb2->fields["codcar"]."' and
						b.codcat='".$tb1->fields["codpre"]."' and
						(d.codcat)=(b.codcat) and
						(a.codemp) >= rpad('".$this->emp1."',16,' ') and (a.codemp) <= rpad('".$this->emp2."',16,' ') and
						(a.codcon) >= rpad('".$this->cod1."',3,' ') and (a.codcon) <= rpad('".$this->cod2."',3,' ') and
						(a.codnom) = rpad('".$this->nom."',3,' ') and
						(b.codemp)=(a.codemp) and (b.codcar)=(a.codcar) and c.codcon=a.codcon and
						(b.status)='V' and
						(impcpt) = 'S' and (opecon) <> 'P' and a.saldo>0 and a.codcon<>'XXX'
						and a.codcon not in (select codcon from npconceptoscategoria)
						order by b.codemp";
			$tb3=$this->bd->select($this->sql3);
			$cont=0;
			//--
			while (!$tb3->EOF)
			{
			$cont=$cont+1;
			$tb3->MoveNext();
			}
			//--
			$this->cell(40,5,$cont,0,0,"R");


			$this->ln(4.5);
			$tb2->MoveNext();
			}


			$this->ln(10);
			$tb1->MoveNext();
			}

			$this->ln(-7);
			$this->SetLineWidth(0.4);
			$this->Line(175,$this->GetY(),185,$this->GetY());
			$this->setFont("Arial","B",8);
			$this->cell(130,5,"");
			$this->cell(34,5,"TOTAL EMPLEADOS");
			$this->cell(8,5,$this->acum,0,0,"R");



		}//cuerpo
	}//clase
?>
