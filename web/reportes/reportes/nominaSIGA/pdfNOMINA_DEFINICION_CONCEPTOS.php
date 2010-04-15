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
		var $nom1;
		var $nom2;
		var $cod1;
		var $cod2;
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
			$this->nom1=$_POST["nom1"];
			$this->nom2=$_POST["nom2"];
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];

			
			$this->sql="select b.codnom, b.nomnom, a.codcon,  a.nomcon, d.codpre as codpar, a.opecon as opecon, a.acuhis as acuhis,
				a.inimon as inimon,	a.conact as conact, a.impcpt as impcpt, a.ordpag as ordpag, a.afepre as afepre
				from npdefcpt a,npnomina b, 
				npasiconnom c LEFT OUTER JOIN npasicodpre d ON (c.codcon=d.codcon) and (c.codnom=d.codnom)
				where 
				--(c.codcon=d.codcon) and (c.codnom=d.codnom) and
				a.codcon=c.codcon and b.codnom=c.codnom and
				b.codnom>='".$this->nom1."' and b.codnom<='".$this->nom2."' and
				a.codcon >= '".$this->cod1."' and a.codcon <= '".$this->cod2."'
				order by b.codnom,a.codcon";
			
			$this->llenartitulosmaestro();
			$this->llenartitulosmaestro2();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código";
				$this->titulos[1]="Nombre";
				$this->titulos[2]="Código";
				$this->titulos[3]="Operación";
				$this->titulos[4]="Acum.";
				$this->titulos[5]="Inic";
				$this->titulos[6]="Imp.";
				$this->titulos[7]="Activo";
				$this->titulos[8]="Ord.";
				$this->titulos[9]="Afec.";
		}
		function llenartitulosmaestro2()
		{
				$this->titulos2[0]="";
				$this->titulos2[1]="Partida";
				$this->titulos2[2]="Contable";
				$this->titulos2[3]="His.";
				$this->titulos2[4]="Mon.";
				$this->titulos2[5]="Conc.";
				$this->titulos2[6]="Pag.";
				$this->titulos2[7]="Activo";
				$this->titulos2[8]="Ppto";

		}
		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos[$i]);
			}
			$this->ln(); 
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],5,$this->titulos2[$i]);
			}
			$this->ln(); 
			$this->ln(); 
			$this->Line(10,49,200,49);
			
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			$ncampos=count($this->titulos);
			
			if (!$tb2->EOF)
			{
			$ref=$tb2->fields["codnom"];
			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,20,200);
			$this->cell(10,5,"   ".$tb2->fields["codnom"]);
			$this->cell(30,5,"   ".$tb2->fields["nomnom"]);
			$this->ln();
			$this->Line(10,$this->GetY(),55,$this->GetY());
			}
			
			while (!$tb->EOF)
			{
				if ($tb->fields["codnom"]!=$ref)
				{
				$this->ln(300);
				$this->setFont("Arial","B",8);
				$this->SetTextColor(0,20,200);
				$this->cell(10,5,"   ".$tb->fields["codnom"]);
				$this->cell(30,5,"   ".$tb->fields["nomnom"]);
				$this->SetTextColor(0,0,0);
				$this->ln();
				$this->Line(10,$this->GetY(),55,$this->GetY());
				}
			
				$ref=$tb->fields["codnom"];
				//Detalle
				$this->setFont("Arial","",8);
				$this->SetTextColor(0,0,0);
				$this->cell($this->anchos[0],5,"   ".$tb->fields["codcon"]);
				$this->cell($this->anchos[1]-2,5,substr($tb->fields["nomcon"],0,35));
				$this->cell($this->anchos[2],5,"".$tb->fields["codpar"]);
				if (strtoupper($tb->fields["opecon"])=='A'){$this->cell($this->anchos[3],5,"   Asignación");}
				if (strtoupper($tb->fields["opecon"])=='D'){$this->cell($this->anchos[3],5,"    Deducción");}
				if (strtoupper($tb->fields["opecon"])=='P'){$this->cell($this->anchos[3],5," Aporte Patronal");}
				
				if (strtoupper($tb->fields["acuhis"])=='S'){$this->cell($this->anchos[4],5,"        Si");}
				if (strtoupper($tb->fields["acuhis"])=='N'){$this->cell($this->anchos[4],5,"        No");}
				
				if (strtoupper($tb->fields["inimon"])=='S'){$this->cell($this->anchos[5],5,"      Si");}
				if (strtoupper($tb->fields["inimon"])=='N'){$this->cell($this->anchos[5],5,"      No");}

				if (strtoupper($tb->fields["impcpt"])=='S'){$this->cell($this->anchos[6],5,"      Si");}
				if (strtoupper($tb->fields["impcpt"])=='N'){$this->cell($this->anchos[6],5,"      No");}

				if (strtoupper($tb->fields["conact"])=='S'){$this->cell($this->anchos[7],5,"          Si");}
				if (strtoupper($tb->fields["conact"])=='N'){$this->cell($this->anchos[7],5,"          No");}

				$this->ln();
				$tb->MoveNext();
			}
		}
	}
?>
