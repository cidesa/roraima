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
		var $sqla;
		var $sqlb;
		var $sqlc;
		var $rep;
		var $numero;
		var $cab;
		var $per1;
		var $per2;
		var $com1;
		var $com2;
		var $filtro;
		var $auxd=0;
		var $auxc=0;
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
			$this->per1=$_POST["per1"];
			$this->per2=$_POST["per2"];
			$this->com1=$_POST["com1"];
			$this->com2=$_POST["com2"];
			$this->filtro=$_POST["filtro"];


			$this->sql="select b.codcta as cta, a.descta as desc, sum( b.totdeb) as debitos, sum(b.totcre) as creditos,
					sum( b.totdeb) -  sum(b.totcre) as salact
					from contabb a , contabb1 b
					where a.codcta =  b.codcta and
		            rtrim(b.codcta)>=rtrim('".$this->com1."')  and rtrim(b.codcta)<=rtrim('".$this->com2."')  and
		            rtrim(b.codcta)  like rtrim('".$this->filtro."') and
					b.pereje >='".$this->per1."'  and b.pereje <='".$this->per2."'  and
					a.cargab = 'C'
					group by b.codcta,a.descta,a.salant
					order by b.codcta";
            $this->sql8= "select to_char(fecdes,'dd/mm/yyyy') as desde from contaba1 where pereje='".$this->per1."' ";//H::PrintR($this->sql1);exit;
            $this->sql9= "select to_char(fechas,'dd/mm/yyyy') as hasta from contaba1 where pereje='".$this->per2."' ";

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="COD. CUENTA";
				$this->titulos[1]="DESCRIPCION";
				$this->titulos[2]="SALDO ANTERIOR";
				$this->titulos[3]="            DEBITOS";
				$this->titulos[4]="          CREDITOS";
				$this->titulos[5]="    SALDO ACTUAL";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
		    $this->setFont("Arial","",10);
			$x=$this->GetX();
			$y=$this->GetY();
            $tb8=$this->bd->select($this->sql8);
            $tb9=$this->bd->select($this->sql9);
			$this->SetXY(190,27);
			$this->cell(35,10,"Desde :".$tb8->fields["desde"]);
			$this->cell(30,10,"Hasta :".$tb9->fields["hasta"]);
			$this->SetXY($x,$y);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln();
			/*for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}*/
			$this->ln();
			$this->Line(10,50,270,50);
			$this->ln(-5);
		}
		function Cuerpo()
		{
			$this->sqla="select forcta as mascara from contaba";
			$tba=$this->bd->select($this->sqla);
			$this->sqlb="select fecini as fecdes from contaba";
			$tbb=$this->bd->select($this->sqlb);
			$this->sqlc="select feccie as fechas from contaba";
			$tbc=$this->bd->select($this->sqlc);


		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			$ncampos=count($this->titulos);

			while(!$tb->EOF)
			{
				//$this->setFont("Arial","B",8);
				$this->cell($this->anchos[0],3,$tb->fields["cta"]);
				$x=$this->GetX();
				$this->cell($this->anchos[1]-10);

				//--
				if ($this->per1<>'01')
				{
				$num= intval($this->per1);
				$num= $num-1;
				$num= (string)$num;
				$perant= "0".$num;
   				$this->sql2="select salact as total from contabb1
							where
							rtrim(codcta)=rtrim('".$tb->fields["cta"]."') and
							pereje = '".$perant."' and
							fecini >='".$tbb->fields["fecdes"]."' and
							feccie<='".$tbc->fields["fechas"]."'";
				}
				else
				{
				$this->sql2="select salant as total from contabb
							where
							rtrim(codcta)=rtrim('".$tb->fields["cta"]."') and
							fecini >='".$tbb->fields["fecdes"]."' and
							feccie<='".$tbc->fields["fechas"]."' ";
				}
				$tb2=$this->bd->select($this->sql2);
 				$this->cell($this->anchos[2],3,number_format($tb2->fields["total"],2,',','.'),0,0,"R");
				$this->cell($this->anchos[3],3,number_format($tb->fields["debitos"],2,',','.'),0,0,"R");
				$this->cell($this->anchos[4],3,number_format($tb->fields["creditos"],2,',','.'),0,0,"R");
				$this->cell($this->anchos[5],3,number_format($tb->fields["salact"],2,',','.'),0,0,"R");
				$this->SetX($x);
				$this->MultiCell($this->anchos[1]-10,3,$tb->fields["desc"]);
				$this->salant=$this->salant + $tb2->fields["total"];
				$this->auxd=$this->auxd + $tb->fields["debitos"];
				$this->auxc=$this->auxc + $tb->fields["creditos"];
				$this->salact=$this->salact + $tb->fields["salact"];
				$this->ln();
				$tb->MoveNext();
			}
			    $this->setFont("Arial","B",8);
				$this->Line(10,$this->GetY(),270,$this->GetY());
				$this->cell(70,5,"  ");
				$this->cell(28,5,"  Total Resumen...");
				$this->cell(40,5,number_format($this->salant,2,',','.'),0,0,"R");
 				$this->cell(40,5,"                                                                                       ".number_format($this->auxd,2,',','.'),0,0,"R");
				$this->cell(40,5,"                                                                                  ".number_format($this->auxc,2,',','.'),0,0,"R");
				$this->cell(40,5,"                                                                                      ".number_format($this->salact,2,',','.'),0,0,"R");
				$this->cell(40,5,"");
		}
	}
?>
