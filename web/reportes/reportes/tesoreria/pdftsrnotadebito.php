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
		var $sql;
		var $sql2;
		var $sql3;
		var $rep;
		var $numero;
		var $cab;
		var $numcom;
		var $refpag;
		var $deb1;
		var $deb2;
		var $status;
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
			$this->deb1=$_POST["deb1"];
			$this->deb2=$_POST["deb2"];
	
			$this->sql="select a.refpag, a.fecpag,a.cedrif, a.monpag,to_char(d.feclib,'dd/mm/yyyy') as feclib,c.nomben,b.nomcue,d.deslib as descon, d.numcom,c.cedrif,
						b.numcue
						from cppagos a, tsdefban b, opbenefi c, tsmovlib d
						where rtrim(b.numcue)=rtrim(d.numcue) and rtrim(a.refpag)=rtrim(d.reflib) and
						rtrim(d.reflib) >= rtrim('".$this->deb1."') and rtrim(d.reflib) <= rtrim('".$this->deb2."') and
						a.fecpag=d.feclib and rtrim(a.cedrif)=rtrim(c.cedrif) 
						order by rtrim(a.refpag)";

			
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO. CUENTA";
				$this->titulos[1]="DESCRIPCION";
				$this->titulos[2]="CARGABLE";
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
			$this->ln(4); 
		
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			
			
			while(!$tb->EOF)
			{
				$this->numcom=$tb->fields["numcom"];
				$this->refpag=$tb->fields["refpag"];
				$this->setFont("Arial","B",8);
				$this->cell(25,5,"Nota de Debito:");
				$this->setFont("Arial","B",9);
				$this->cell(55,5,$tb->fields["refpag"]);
				$this->setFont("Arial","",8);
				$this->cell(25,5,"Fecha Emision:");
				$this->cell(40,5,$tb->fields["feclib"]);
				$this->setFont("Arial","B",8);
				$this->cell(16,5,"Monto:");
				$this->setFont("Arial","",8);
				$this->cell(40,5,number_format($tb->fields["monpag"],2,'.',','));
				$this->ln(10); 
				$this->Line(10,$this->GetY()-2,200,$this->GetY()-2);
				$this->setFont("Arial","B",8);
				$this->cell(15,5,"Banco");
				$this->setFont("Arial","",8);
				$this->cell(85,5,strtoupper($tb->fields["nomcue"]));
				$this->setFont("Arial","B",8);
				$this->cell(25,5,"Cta Numero:");
				$this->cell(40,5,$tb->fields["numcue"]);
				$this->ln(10); 
				$this->Line(10,$this->GetY()-2,200,$this->GetY()-2);
				$this->setFont("Arial","B",8);
				$this->cell(20,5,"Concepto");
				$this->setFont("Arial","",8);
				$x=$this->GetX();
				$y=$this->GetY();
				$this->MultiCell(160,5,strtoupper($tb->fields["descon"]));
				$this->SetX($x);
				$this->SetY($y);
				$this->ln(20); 
				$this->Line(10,$this->GetY()-2,200,$this->GetY()-2);
				$this->setFont("Arial","B",8);
				$this->cell(25,5,"Beneficiario");
				$this->setFont("Arial","",8);
				$this->cell(180,5,strtoupper($tb->fields["nomben"]));
				$this->setFont("Arial","B",8);
				$this->cell(25,5,"Cedula/RIF");
				$this->setFont("Arial","",8);
				$this->cell(180,5,strtoupper($tb->fields["cedrif"]));
				$this->ln(10); 
				$this->Line(10,$this->GetY()-2,200,$this->GetY()-2);
				$this->setFont("Arial","B",8);
				$this->cell(10,5,"");
				$this->cell(40,5,"Numero de Cuenta");
				$this->cell(70,5,"Descripcion de la Cuenta");
				$this->cell(35,5,"Debitos");
				$this->cell(35,5,"Creditos");
				$this->ln(); 
				//--------
				$this->sql2="select  c.numcom,c.codcta,d.descta,
					(CASE WHEN c.debcre='d' THEN c.monasi ELSE 0 END) as debitos,
					(CASE WHEN c.debcre='c' THEN c.monasi ELSE 0 END) as creditos
					from  contabc1 c, contabb d
					where 
					c.numcom = '".$this->numcom."' and
					rtrim(c.codcta)   = rtrim(d.codcta)
					order by  c.debcre desc,c.codcta";
				$tb2=$this->bd->select($this->sql2);
				
				while (!$tb2->EOF)
				{
				$this->setFont("Arial","",8);
				$this->cell(10,5,"");
				$this->cell(40,5,$tb2->fields["codcta"]);
				$aquix=$this->GetX();
				$this->cell(70);
				$this->cell(35,5,$tb2->fields["debitos"]);
				$this->cell(35,5,$tb2->fields["creditos"]);
				$this->SetX($aquix);
				$this->Multicell(70,5,$tb2->fields["descta"]);
				$this->ln(1); 
				$tb2->MoveNext();
				}			
				$this->ln(15); 
				//--------
				$this->sql3="select b.refpag,b.codpre,c.nompre,b.monimp
						from  cpimppag b, cpdeftit c
						where
						b.refpag = '".$this->refpag."' and
						rtrim(b.codpre) = rtrim(c.codpre) 
						order by b.codpre";
				$tb3=$this->bd->select($this->sql3);
				$this->setFont("Arial","B",8);
				$this->cell(20,5,"");
				$this->cell(120,5,"Codigo Presupuestario");
				$this->cell(40,5,"Monto");
				$this->ln(); 
				
				while (!$tb3->EOF)
				{
				$this->setFont("Arial","",8);
				$this->cell(22,5,"");
				$this->cell(115,5,$tb3->fields["codpre"]);
				$this->cell(40,5,number_format($tb3->fields["monimp"],2,'.',','));
				$this->ln(); 
				$tb3->MoveNext();
				}			
				//--------
				
				$this->ln(500); 
			$tb->MoveNext();
			}
		}
	}
?>
