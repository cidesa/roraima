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
		var $per1;
		var $per2;
		var $cod1;
		var $cod2;
		var $con;
		var $cont;
		var $nom;
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
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->con=strtoupper($_POST["con"]);
			$this->nom=$_POST["nom"];

			$this->sql2="select codnom, nomnom from npnomina where codnom='".$this->nom."'";

			if ($this->con=='T')
			{
			$this->sql="select distinct(b.codcon),b.frecon,a.nomcon as anomcon,c.codcat,a.codpar, a.opecon as opecon,
			a.acuhis as acuhis, a.inimon as inimon, a.conact as conact, a.impcpt as impcpt, a.ordpag as ordpag
			from npdefcpt a,npasiconemp b,npasicaremp c,npasiconnom d
			where b.codemp=c.codemp and b.codcar=c.codcar and c.codnom=d.codnom and a.codcon=b.codcon and a.codcon=d.codcon and
			c.codnom='".$this->nom."' and
			rtrim(a.codcon) >= rtrim('".$this->cod1."') and rtrim(a.codcon) <= rtrim('".$this->cod2."')
			and a.codcon not in	(select codcon from npconceptoscategoria)
			group by b.codcon,b.frecon,a.nomcon, a.codpar, a.acuhis,a.inimon,a.conact,a.impcpt,a.ordpag,
			a.opecon,c.codcat,substr(rtrim(c.codcat)||'-'||rtrim(a.codpar)||'                                ',1,32) ";
			}
			else
			{
			$this->sql="select distinct(b.codcon),b.frecon,a.nomcon as anomcon,c.codcat,a.codpar, a.opecon as opecon,
			a.acuhis as acuhis, a.inimon as inimon, a.conact as conact, a.impcpt as impcpt, a.ordpag as ordpag
			from npdefcpt a,npasiconemp b,npasicaremp c,npasiconnom d
			where b.codemp=c.codemp and b.codcar=c.codcar and c.codnom=d.codnom and a.codcon=b.codcon and a.codcon=d.codcon and
			c.codnom='".$this->nom."' and
			rtrim(a.codcon) >= rtrim('".$this->cod1."') and rtrim(a.codcon) <= rtrim('".$this->cod2."') and
			a.opecon = '".$this->con."'
			and a.codcon not in	(select codcon from npconceptoscategoria)
			group by b.codcon,b.frecon,a.nomcon, a.codpar, a.acuhis,a.inimon,a.conact,a.impcpt,a.ordpag,
			a.opecon,c.codcat,substr(rtrim(c.codcat)||'-'||rtrim(a.codpar)||'                                ',1,32) ";
			}

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código";
				$this->titulos[1]="Nombre";
				$this->titulos[2]="Titulo Presupuestario";
				$this->titulos[3]="Frecuencia";
				$this->titulos[4]="Op.Contable";
				$this->titulos[5]="Acum.His";
				$this->titulos[6]="Inic.Mon";
				$this->titulos[7]="Imp.Conc";
				$this->titulos[8]="Activo";
				$this->titulos[9]="Ord.Pag";


		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos[$i]);
			}
			$this->ln();
			/*for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}*/
			$this->ln();
			$this->Line(10,43,270,43);
			$this->ln(-1);

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql2);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);

			if (!$tb2->EOF)
			{
				$this->SetTextColor(0,0,196);
				$codigo=strtoupper($tb2->fields["codnom"]);
				$nombre=strtoupper($tb2->fields["nomnom"]);
				$this->cell(20,5,"Nómina: ".$codigo." - ".$nombre);
				$this->SetTextColor(0,0,0);
				$this->ln();
				$this->ln(2);
			}

			while (!$tb->EOF)
			{
				$this->setFont("Arial","",8);
				//$this->setFont("Arial","B",8);
				$this->cell($this->anchos[0]-12,5,"".$tb->fields["codcon"]);
				$this->cell($this->anchos[1]+19,5,substr($tb->fields["anomcon"],0,50));
				$this->sql3="select coalesce(codcat,'0') as categoria
							from npconceptoscategoria
							where codcon='".$tb->fields["codcon"]."' ";

				$tb3=$this->bd->select($this->sql3);
				if ($tb3->fields["categoria"]=='0')
				{
					$categoria=$tb->fields["codcat"];
				}
				else
				{
								//VIENE EN BLANCO
					$categoria=$tb3->fields["categoria"];
				}
				if ($categoria=='0')
				{
					$codpre=$tb->fields["codcat"]."-".$tb->fields["codpar"];
				}
				else
				{
					$codpre=$categoria."-".$tb->fields["codpar"];
				}

				$this->cell($this->anchos[2]-9,5,"".$codpre);
				if (strtoupper($tb->fields["frecon"])=='D'){$this->cell($this->anchos[3],5,"  Dos Semanas");}
				if (strtoupper($tb->fields["frecon"])=='S'){$this->cell($this->anchos[3],5," Segunda Semana");}
				if (strtoupper($tb->fields["frecon"])=='P'){$this->cell($this->anchos[3],5," Primera Semana");}
				if (strtoupper($tb->fields["frecon"])=='M'){$this->cell($this->anchos[3],5,"   Mensual");}

				if (strtoupper($tb->fields["opecon"])=='A'){$this->cell($this->anchos[4],5,"     Asignaci�n");}
				if (strtoupper($tb->fields["opecon"])=='D'){$this->cell($this->anchos[4],5,"     Deducci�n");}
				if (strtoupper($tb->fields["opecon"])=='P'){$this->cell($this->anchos[4],5,"  Aporte Patronal");}

				if (strtoupper($tb->fields["acuhis"])=='S'){$this->cell($this->anchos[5],5,"         Si");}
				if (strtoupper($tb->fields["acuhis"])=='N'){$this->cell($this->anchos[5],5,"         No");}

				if (strtoupper($tb->fields["inimon"])=='S'){$this->cell($this->anchos[6],5,"       Si");}
				if (strtoupper($tb->fields["inimon"])=='N'){$this->cell($this->anchos[6],5,"       No");}

				if (strtoupper($tb->fields["impcpt"])=='S'){$this->cell($this->anchos[7],5,"         Si");}
				if (strtoupper($tb->fields["impcpt"])=='N'){$this->cell($this->anchos[7],5,"         No");}

				if (strtoupper($tb->fields["conact"])=='S'){$this->cell($this->anchos[8],5,"       Si");}
				if (strtoupper($tb->fields["conact"])=='N'){$this->cell($this->anchos[8],5,"       No");}

				if (strtoupper($tb->fields["ordpag"])=='S'){$this->cell($this->anchos[9],5,"       Si");}
				if (strtoupper($tb->fields["ordpag"])=='N'){$this->cell($this->anchos[9],5,"       No");}
				$this->cont=$this->cont+1;
				$this->ln();
				$tb->MoveNext(4);
			}
			$this->ln();
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,196);
			$this->cell(20,5," Total  Conceptos:   ".$this->cont);
			$this->SetTextColor(0,0,0);

		}
	}
?>
