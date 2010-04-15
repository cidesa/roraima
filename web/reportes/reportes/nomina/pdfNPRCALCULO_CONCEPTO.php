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


			$this->sql="select a.codnom,b.nomnom,a.codcon,c.nomcon,a.numcon,a.campo,
					a.operador,a.valor,trim(a.confor) as confor
					from npcalcon a, npnomina b, npdefcpt c
					where
					(b.codnom) = (a.codnom) and
					(c.codcon) = (a.codcon)  and
					(a.codnom) >= rpad('".$this->nom1."',3,' ') and
					(a.codnom) <= rpad('".$this->nom2."',3,' ') and
					(a.codcon) >= rpad('".$this->cod1."',3,' ') and
					(a.codcon) <= rpad('".$this->cod2."',3,' ')
					order by a.codnom, a.codcon,a.numcon";


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
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			/*$ncampos=count($this->titulos);
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
			$this->Line(10,49,200,49);*/

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$tb3=$this->bd->select($this->sql);
			$tbx=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);

			$this->SetTextColor(0,0,196);
			$this->cell(10,5,"DESDE LA NOMINA:   ".$this->nom1."     -    HASTA LA NOMINA:   ".$this->nom2);
			$this->ln();

			//---------------------------------------




			if (!$tb->EOF)
			{
			$this->cell(16,5,"NOMINA:");
			$this->SetTextColor(0,0,0);
			$this->cell(10,5,strtoupper($tb->fields["nomnom"]));
			$this->ln();
			$ref=$tb->fields["codcon"];
			$refx=$tb->fields["codnom"];
			$this->setFont("Arial","B",7);
			$this->cell(20,5,$tb->fields["codcon"]);
			$aux=strtoupper($tb->fields["nomcon"]);
			$this->cell(40,5,$aux);
			$this->ln();
			$this->cell(30,5,"");
			$this->cell(30,5,"Campo");
			$this->cell(30,5,"Operador");
			$this->cell(25,5,"Valor");
			$this->cell(45,5,"Condicion / Formula");
			$this->Line(37,$this->GetY()+5,55,$this->GetY()+5);
			$this->Line(67,$this->GetY()+5,87,$this->GetY()+5);
			$this->Line(95,$this->GetY()+5,115,$this->GetY()+5);
			$this->Line(122,$this->GetY()+5,180,$this->GetY()+5);
			$this->ln();

			}

			while (!$tb2->EOF)
			{
				if ($tb2->fields["codnom"]!=$refx)
				{
				$this->ln(300);
				$this->setFont("Arial","B",8);
				$this->SetTextColor(0,0,196);
				$this->cell(16,5,"NOMINA:");
				$this->SetTextColor(0,0,0);
				$this->cell(10,5,strtoupper($tb2->fields["nomnom"]));
				$this->ln();
				}

				if ($tb2->fields["codcon"]!=$ref)
				{
				$this->ln();
				if ($this->GetY()>245){$this->ln(300);}
				$this->setFont("Arial","B",7);
				$this->cell(20,5,$tb2->fields["codcon"]);
				$aux=strtoupper($tb2->fields["nomcon"]);
				$this->cell(40,5,$aux);
				$this->ln();
				$this->cell(30,5,"");
				$this->cell(30,5,"Campo");
				$this->cell(30,5,"Operador");
				$this->cell(25,5,"Valor");
				$this->cell(45,5,"Condicion / Formula");
				$this->Line(37,$this->GetY()+5,55,$this->GetY()+5);
				$this->Line(67,$this->GetY()+5,87,$this->GetY()+5);
				$this->Line(95,$this->GetY()+5,115,$this->GetY()+5);
				$this->Line(122,$this->GetY()+5,180,$this->GetY()+5);

				$this->ln();
				}
				//Detalle
				$this->setFont("Arial","",7);
				$ref=$tb2->fields["codcon"];
				$this->cell(19,5,"");
				$this->cell(34,5,$tb2->fields["campo"],0,0,"C");
				$this->cell(25,5,"     ".$tb2->fields["operador"],0,0,"C");
				$this->cell(34,5,$tb2->fields["valor"],0,0,"C");
				$this->Multicell(60,3,$tb2->fields["confor"]);
				//$this->cell(45,5,$tb2->fields["confor"]);
				//$this->ln();

			$refx=$tb2->fields["codnom"];
			$tb2->MoveNext();
			}


		}
	}
?>
