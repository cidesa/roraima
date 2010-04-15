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
		var $tip;
		var $nom;
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
			$this->tip=strtoupper($_POST["tip"]);
			$this->nom=$_POST["nom"];
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];

			if (!$this->tip='T')
			{
			$this->sql="select distinct(b.codcon),b.frecon,a.nomcon, 
			        (CASE WHEN c.codpre is null THEN a.codpar ELSE c.codpre END) as codpar1,
					 a.opecon as opecon, a.acuhis as acuhis,
					a.inimon as inimon, a.conact as conact, a.impcpt as impcpt, a.ordpag as ordpag 
					from npdefcpt a, 
					npasiconnom b LEFT OUTER JOIN npasicodpre c ON (b.codnom=c.codnom) and (b.codcon=c.codcon)
					where 
					a.codcon=b.codcon and
					b.codnom = '".$this->nom."' and
					(a.codcon) >= rpad('".$this->cod1."',3,' ') and (a.codcon) <= rpad('".$this->cod2."',3,' ') and
					(a.opecon = '".$this->tip."')
					order by b.codcon";
			}

			else
			{
			$this->sql="select distinct(b.codcon),b.frecon,a.nomcon, 
					(CASE WHEN c.codpre is null THEN a.codpar ELSE c.codpre END) as codpar1,
					a.opecon as opecon, a.acuhis as acuhis,
					a.inimon as inimon, a.conact as conact, a.impcpt as impcpt, a.ordpag as ordpag 
					from npdefcpt a, 
					npasiconnom b LEFT OUTER JOIN npasicodpre c ON (b.codnom=c.codnom) and (b.codcon=c.codcon)
					where 
					a.codcon=b.codcon and
					b.codnom = '".$this->nom."' and
					(a.codcon) >= rpad('".$this->cod1."',3,' ') and (a.codcon) <= rpad('".$this->cod2."',3,' ')
					order by b.codcon";
			}

			$this->llenartitulosmaestro();
			$this->llenartitulosmaestro2();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código";
				$this->titulos[1]="Nombre";
				$this->titulos[2]="Código";
				$this->titulos[3]="Frecuencia";
				$this->titulos[4]="Operación";
				$this->titulos[5]="Acum.";
				$this->titulos[6]="Inic";
				$this->titulos[7]="Imp.";
				$this->titulos[8]="Activo";
				$this->titulos[9]="Ord.";

		}
		function llenartitulosmaestro2()
		{
				$this->titulos2[0]="";
				$this->titulos2[1]="Partida";
				$this->titulos2[2]=" ";
				$this->titulos2[3]="Contable";
				$this->titulos2[4]="His.";
				$this->titulos2[5]="Mon.";
				$this->titulos2[6]="Conc.";
				$this->titulos2[7]="Pag.";

		}
		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",8);
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
			$this->setFont("Arial","",6.5);
			$ncampos=count($this->titulos);
			$cont=0;
			while (!$tb->EOF)
			{
				//$this->setFont("Arial","B",8); 
				$this->cell($this->anchos[0],5,"   ".$tb->fields["codcon"]);
				$this->cell($this->anchos[1]-1,5,substr($tb->fields["nomcon"],0,35));
				$this->cell($this->anchos[2]+2,5,"".$tb->fields["codpar1"]);
				
				if (strtoupper($tb->fields["frecon"])=='S'){$this->cell($this->anchos[3],5,"   Semanal");}
				if (strtoupper($tb->fields["frecon"])=='D'){$this->cell($this->anchos[3],5,"   Quincenal");}
				if (strtoupper($tb->fields["frecon"])=='M'){$this->cell($this->anchos[3],5,"   Mensual");}
				if (strtoupper($tb->fields["frecon"])=='P'){$this->cell($this->anchos[3],5,"   Anual");}

				
				if (strtoupper($tb->fields["opecon"])=='A'){$this->cell($this->anchos[4]-2,5,"  Asignación");}
				if (strtoupper($tb->fields["opecon"])=='D'){$this->cell($this->anchos[4]-2,5,"   Deducción");}
				if (strtoupper($tb->fields["opecon"])=='P'){$this->cell($this->anchos[4]-2,5," Aporte Patronal");}
				
				if (strtoupper($tb->fields["acuhis"])=='S'){$this->cell($this->anchos[5],5,"      Si");}
				if (strtoupper($tb->fields["acuhis"])=='N'){$this->cell($this->anchos[5],5,"      No");}
				
				if (strtoupper($tb->fields["inimon"])=='S'){$this->cell($this->anchos[6],5,"    Si");}
				if (strtoupper($tb->fields["inimon"])=='N'){$this->cell($this->anchos[6],5,"    No");}

				if (strtoupper($tb->fields["impcpt"])=='S'){$this->cell($this->anchos[7],5,"    Si");}
				if (strtoupper($tb->fields["impcpt"])=='N'){$this->cell($this->anchos[7],5,"    No");}

				if (strtoupper($tb->fields["conact"])=='S'){$this->cell($this->anchos[8],5,"       Si");}
				if (strtoupper($tb->fields["conact"])=='N'){$this->cell($this->anchos[8],5,"       No");}
				
				if (strtoupper($tb->fields["ordpag"])=='S'){$this->cell($this->anchos[9],5,"     Si");}
				if (strtoupper($tb->fields["ordpag"])=='N'){$this->cell($this->anchos[9],5,"     No");}
				$cont=$cont+1;
				$this->ln();
				$tb->MoveNext();
			}
			$this->SetTextColor(0,0,128);
			$this->ln();
			$this->cell(5,5,"");
			$this->cell(5,5,"Total Conceptos    ".$cont);
		}
	}
?>
