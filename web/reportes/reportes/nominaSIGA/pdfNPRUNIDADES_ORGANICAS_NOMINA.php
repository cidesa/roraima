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
		var $nom;
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
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->emp1=$_POST["emp1"];
			$this->emp2=$_POST["emp2"];
			$this->nom=$_POST["nom"];
			
			$this->sql2="select codnom, nomnom, 
						to_char(ultfec,'dd/mm/yyyy') as ultfec, to_char(profec,'dd/mm/yyyy') as profec
						from npnomina where codnom='".$this->nom."'";
			
			

			$this->sql="select rtrim(b.codcat) as codpre, d.nomcat
					from npnomcal a,npasicaremp b,npdefcpt c, npcatpre d
					where 
					(d.codcat) = (b.codcat) and
					(b.codemp)=(a.codemp) and (b.codcar)=(a.codcar) and c.codcon=a.codcon and
					(a.codemp) >= rpad('".$this->emp1."',16,' ') and (a.codemp) <= rpad('".$this->emp2."',16,' ') and
					(a.codcon) >= rpad('".$this->cod1."',3,' ') and (a.codcon) <= rpad('".$this->cod2."',3,' ') and
					(a.codnom) = ('".$this->nom."') and
					(b.status)='V' and
					(impcpt) = 'S' and (opecon) <> 'P' and
					a.saldo>0 and a.codcon<>'XXX' 
					and a.codcon not in (select codcon from npconceptoscategoria)
					group by rtrim(b.codcat),(d.nomcat)
					order by rtrim(b.codcat),d.nomcat";
			
//			Agregarle esto	//substr(d.codcat,1,5) = substr(b.codcat,1,5) and
			
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Código Unidad";
				$this->titulos[2]="                                  Descripción de la Unidad Orgánica";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],4,$this->titulos[$i]);
			}
			
			/*for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}*/
			$this->ln(); 
			$this->ln(); 
			$this->SetLineWidth(0.5);
			$this->Line(10,43,200,43);
			$this->SetLineWidth(0.2);
			
			$tb2=$this->bd->select($this->sql2);
			$this->setFont("Arial","B",9);
			if (!$tb2->EOF)
			{
				$this->setFont("Arial","B",9);
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
			$this->Line(10,56,200,56);
			$this->ln(-2);
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			
			
			
			
			
			while (!$tb->EOF)
			{
				$this->setFont("Arial","",7);
				$this->cell($this->anchos[0]+6,5,"");
				$this->cell($this->anchos[1]+15,5,$tb->fields["codpre"]);
				$this->cell($this->anchos[2],5,substr($tb->fields["nomcat"],0,100));
				$this->ln(4);
				$tb->MoveNext();
			}
		}
	}
?>
