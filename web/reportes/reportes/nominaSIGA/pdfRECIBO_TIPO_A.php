<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");
	
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
		var $codempdes;
		var $codemphas;
		var $codcardes;
		var $codcarhas;
		var $codcatdes;
		var $codcathas;
		var $codcondes;
		var $codconhas;
		var $tipnom;
		var $elaborado;
		var $revisado;
		var $autorizado;
		var $conf;
		var $nombre;
				
		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->tipnom=trim($_POST["tipnom"]);
			$this->fecnom=trim($_POST["fecnom"]);
			$this->tipgas=trim($_POST["tipgas"]);
			$this->tipban=trim($_POST["tipban"]);
			$this->codben=trim($_POST["codben"]);
			$this->autcob=trim($_POST["autcob"]);
			$this->secgen=trim($_POST["secgen"]);
			$this->admin=trim($_POST["admin"]);
			$this->diruni=trim($_POST["diruni"]);
			$this->nrorec=trim($_POST["nrorec"]);
			$this->fecfin=trim($_POST["fecfin"]);

			$this->sql="select distinct(a.codpre) as codpre,
					sum(case when a.asided='A' then a.monto else 0 end) - sum(case when a.asided='D' then a.monto else 0 end) as monto_presup

					from npcienom a
					
					where 
					trim(a.codnom)='".$this->tipnom."' and
					a.fecnom=to_date('".$this->fecnom."','dd/mm/yyyy') and
					trim(a.codban)='".$this->tipban."' and
					trim(a.codtipgas)='".$this->tipgas."' and
					(a.asided='A' or a.asided='D')
					group by a.codpre
					order by a.codpre";
			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s");
			$this->setFont("Arial","B",8);
			$this->ln(5);
			
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			
			$this->SetLineWidth(0.4);
			$this->Rect(10,35,190,222);
			$this->SetLineWidth(0.2);
			
			$this->setFont("Arial","B",8);
			$this->SetY(38);
			$this->SetX(14);
			$this->cell(5,5,"NOMBRE COMPLETO DEL BENEFICIARIO");	
			$this->SetX(140);
			$this->cell(5,5,"AUTORIZADO PARA COBRAR");
			
			$sqla="select nomben from opbenefi where trim(cedrif)='".$this->codben."' ";
			$tba=$this->bd->select($sqla);
			
			$this->setFont("Arial","I",8);
			$this->SetY(44);
			$this->SetX(41);
			$this->cell(5,5,$tba->fields["nomben"],0,0,"C");
			$this->SetX(158);
			$this->cell(5,5,$this->autcob,0,0,"C");
			
			$this->Line(15,50,75,50);
			$this->Line(135,50,190,50);
			
			$this->setFont("Arial","B",12);
			$this->SetY(60);
			$this->SetX(100);
			$this->cell(5,5,'RECIBO TIPO "A"',0,0,"C");
			
			$this->SetY(70);
			$this->SetX(50);
			$this->cell(5,5,'POR Bs.');
			$this->Rect(69,69,55,7);
			
			$this->setFont("Arial","B",11);
			$this->SetY(70);
			$this->SetX(115);
			$this->cell(5,5,number_format($tb->fields["monto_presup"],2,'.',','),0,0,'R');
			$this->Rect(69,69,55,7);
			
			$this->SetY(70);
			$this->SetX(150);
			$this->cell(5,5,'N°');
			$this->Rect(157,69,20,7);
			
			$this->setFont("Arial","B",11);
			$this->SetY(70);
			$this->SetX(164);
			$this->cell(5,5,$this->nrorec,0,0,"C");
			
			$this->setFont("Arial","B",9);
			$this->SetY(85);
			$this->SetX(100);
			$this->cell(5,5,"HE RECIBIDO DE LA TESORERÍA GENERAL DEL ESTADO BOLÍVAR LA CANTIDAD DE",0,0,"C");
			
			
			$this->Rect(13,95,183,5);
			$this->setFont("Arial","",8);
			$this->SetY(95);
			$this->SetX(15);
			$this->cell(5,5,montoescrito($tb->fields["monto_presup"],$this->bd));
			
			$this->setFont("Arial","B",9);
			$this->SetY(102);
			$this->SetX(20);
			$this->cell(5,5,"POR CONCEPTO DE");
			
			$sqlb="select * from npnomina where trim(codnom)=trim('".$this->tipnom."')";
			$tbb=$this->bd->select($sqlb);
			
			if ( ($tbb->fields["frecal"]=='M') || ($tbb->fields["frecal"]=='Q'))
			{
				$frecal='al período del ';
			}
			else
			{
				$frecal='a la semana Nro. ';
			}
			
			$this->setFont("Arial","",8);
			$this->SetY(110);
			$this->SetX(25);
			$this->cell(5,5,"Cancelación de Nómina de ");
			$this->SetY(116);
			$this->SetX(25);
			$this->cell(5,5,"Correspondiente ".$frecal);
			
			$this->setFont("Arial","BI",9);
			$this->SetY(110);
			$this->SetX(62);
			$this->cell(5,5,$tbb->fields["nomnom"]);
			
			//PERNOMINI FORMULA
			$dia=intval(substr($this->fecnom,0,2));
			$resto=substr($this->fecnom,2,10);
			$frecal='Q';
			if ($frecal=='M')
			{
				$perini='01'.$resto;
			}
			else
			{
				if ($frecal=='Q')
				{
					if ($dia=='15')
					{
						$perini='01'.$resto;
					}
					else
					{
						if ($dia=='30')
						{
							$d1=intval($dia)-14;
							$perini=strval($d1).$resto;
						}
						else
						{
							$d1=abs(intval($dia)-15);
							$perini=strval($d1).$resto;
						}					
					}
				}
			
			}

			///////////////////
			
			$this->setFont("Arial","BI",9);
			$this->SetY(116);
			$this->SetX(70);
			$this->cell(5,5,$perini);
			$this->setFont("Arial","",8);
			$this->SetY(116);
			$this->SetX(91);
			$this->cell(5,5,"al ");
			$this->setFont("Arial","BI",9);
			$this->SetY(116);
			$this->SetX(100);
			$this->cell(5,5,$this->fecfin);
			
			$this->Rect(13,125,183,7);
			$this->setFont("Arial","B",9);
			$this->SetY(126);
			$this->SetX(18);
			$this->cell(5,5,"CODIGO DE CUENTA");
			$this->SetX(85);
			$this->cell(5,5,"DENOMINACION");
			$this->SetX(170);
			$this->cell(5,5,"MONTO Bs.");
			
			$this->ln(8);	
			while (!$tb->EOF)
			{
				$this->setFont("Arial","",8);
				$this->SetX(20);
				$this->cell(5,5,$tb->fields["codpre"],0,0,'L');
				
				$sqlx="select nompre from cpdeftit where trim(codpre)=trim('".$tb->fields["codpre"]."')";
				$tbx=$this->bd->select($sqlx);
				$this->SetX(80);
				$this->cell(5,5,$tbx->fields["nompre"],0,0,'L');
				
				$this->SetX(182);
				$this->cell(5,5,$tb->fields["monto_presup"],0,0,'R');
			
				$this->ln();	
			
			$tb->MoveNext();
			}
			
			$this->setFont("Arial","",8);
			$this->SetY(195);
			$this->SetX(102);
			$this->cell(5,5,"Ciudad xxxxxxxxxxx, ".date('d/m/Y'),0,0,"C");			
			
			$this->SetY(200);
			$this->SetX(18);
			$this->cell(5,5,"Conforme");
			
			$this->SetY(210);
			$this->SetX(37);
			$this->cell(5,5,"xxxxxxxxxxxxxxxxx",0,0,"C");
			$this->Line(20,215,60,215);
			$this->SetY(215);
			$this->SetX(37);
			$this->cell(5,5,"Secretario General",0,0,"C");
			
			$this->SetY(230);
			$this->SetX(18);
			$this->cell(5,5,"Conforme");
			
			$this->SetY(240);
			$this->SetX(37);
			$this->cell(5,5,"yyyyyyyyyyyyyyyyyyy",0,0,"C");
			$this->Line(20,245,60,245);
			$this->SetY(245);
			$this->SetX(37);
			$this->cell(5,5,"Secretaria de Administración",0,0,"C");
			$this->SetY(249);
			$this->SetX(37);
			$this->cell(5,5,"y Finanzas",0,0,"C");
			
			$this->SetY(210);
			$this->SetX(165);
			$this->cell(5,5,"xxxxxxxxxxxxxxxxx",0,0,"C");
			$this->Line(147,215,187,215);
			$this->SetY(215);
			$this->SetX(165);
			$this->cell(5,5,"Firma del Beneficiario o Autorizado",0,0,"C");
			$this->SetY(219);
			$this->SetX(165);
			$this->cell(5,5,"a Cobrar",0,0,"C");
			
			$this->SetY(230);
			$this->SetX(145);
			$this->cell(5,5,"Aprobado");
			
			$this->SetY(240);
			$this->SetX(165);
			$this->cell(5,5,"xxxxxxxxxxxxxxxxx",0,0,"C");
			$this->Line(147,245,187,245);
			$this->SetY(245);
			$this->SetX(165);
			$this->cell(5,5,"Director de la Unidad Básica",0,0,"C");
			
			
			
			
			
			
		}
	}
?>