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
		var $emp1;
		var $emp2;
		var $cod1;
		var $cod2;
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



			$this->sql="select distinct(b.codcat) as codpre,d.nomcat as nompre,a.codnom
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
					--group by a.codnom,(b.codcat),(d.nomcat)
					order by b.codcat";



			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->sql2="select codnom, nomnom, to_char(ultfec,'dd/mm/yyyy') as ultfec, to_char(profec,'dd/mm/yyyy') as profec
						 from npnomina where codnom='".$this->nom."'";
			 $tb2=$this->bd->select($this->sql2);
				$this->SetTextColor(0,0,196);
				$codigo=strtoupper($tb2->fields["codnom"]);
				$nombre=strtoupper($tb2->fields["nomnom"]);
				$this->cell(20,5,"Nómina: ".$codigo." - ".$nombre);
				$this->ln();
				$this->cell(20,5,"DESDE:   : ".$tb2->fields["ultfec"]."       HASTA:   ".$tb2->fields["profec"]);
				$this->ln(7);
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","B",8);
				$this->cell(5,5,"");
				$this->cell(55,5,"Código Presupuestario");
				$this->cell(100,5,"Secretaria / Oficina");
				$this->cell(40,5,"Nro. Empleados");
				$this->Line(10,$this->GetY(),200,$this->GetY());
				$this->SetLineWidth(0.5);
				$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
				$this->ln(6);
		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);

			$this->setFont("Arial","",8);
			$contot=0;

			while (!$tb->EOF)
			{
				$this->cell(15,5,"");
				$this->cell(35,5,$tb->fields["codpre"]);
				$this->cell(120,5,strtoupper($tb->fields["nompre"]));
				$this->sql3="select distinct(b.codemp) as codemp
					from npnomcal a,npasicaremp b,npdefcpt c,npcatpre d
					where
					(d.codcat)=(b.codcat) and
					b.codcat='".$tb->fields["codpre"]."' and
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
				 while (!$tb3->EOF)
				 {
				 $cont=$cont+1;
				 $contot=$contot+1;
				 $tb3->MoveNext();
				 }
				$this->cell(8,5,$cont,0,0,"R");

			$this->ln(4.5);
			$tb->MoveNext();
			}
			$this->setFont("Arial","B",8);
			$this->SetLineWidth(0.4);
			$this->Line(181,$this->GetY(),191,$this->GetY());
			$this->setFont("Arial","B",8);
			$this->cell(136,5,"");
			$this->cell(34.2,5,"TOTAL EMPLEADOS");
			$this->cell(8,5,$contot,0,0,"R");


		}//cuerpo
	}//clase
?>
