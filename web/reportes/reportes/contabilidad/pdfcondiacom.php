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
		var $cta1;
		var $cta2;
		var $fecha1;
		var $fecha2;
		var $com1;
		var $com2;
		var $estado;
		var $auxd=0;
		var $auxc=0;
		var $cont=0;
		var $auxdg=0;
		var $auxcg=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cta1=$_POST["cta1"];
			$this->cta2=$_POST["cta2"];
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->estado=$_POST["estado"];
			$this->com1=$_POST["com1"];
			$this->com2=$_POST["com2"];
			$this->estado=strtoupper($_POST["estado"]);

			if (strtoupper($this->estado)=="T")
			{
			$this->sql="select a.numcom as comp, a.descom as descom, to_char(A.FECCOM,'dd/mm/yyyy') as fecha, a.stacom as estado,
			b.codcta as cta, b.desasi as bdesasi, b.refasi as brefasi, b.debcre as bdebcre, b.monasi as bmonasi
			from contabc a,contabc1 b
			where a.numcom=b.numcom and a.feccom=b.feccom and
			RTRIM(b.codcta) >= RTRIM('".$this->cta1."') and RTRIM(b.codcta) <= RTRIM('".$this->cta2."') and
			a.numcom >= ('".$this->com1."') and a.numcom <= ('".$this->com2."') and
			a.feccom>=to_date('".$this->fecha1."','dd/mm/yyyy') and a.feccom<=to_date('".$this->fecha2."','dd/mm/yyyy')
			order by a.numcom,b.numasi";
			}
			else
			{
			$this->sql="select a.numcom as comp, a.descom as descom, to_char(A.FECCOM,'dd/mm/yyyy') as fecha, a.stacom as estado,
			b.codcta as cta, b.desasi as bdesasi, b.refasi as brefasi, b.debcre as bdebcre, b.monasi as bmonasi
			from contabc a,contabc1 b
			where a.numcom=b.numcom and a.feccom=b.feccom and
			RTRIM(b.codcta) >= RTRIM('".$this->cta1."') and RTRIM(b.codcta) <= RTRIM('".$this->cta2."') and
			a.numcom >= ('".$this->com1."') and a.numcom <=('".$this->com2."') and
			a.feccom>=to_date('".$this->fecha1."','dd/mm/yyyy') and a.feccom<=to_date('".$this->fecha2."','dd/mm/yyyy')  and
			(a.stacom='".$this->estado."') order by a.numcom,b.numasi";
			}


			$this->llenartitulosmaestro();
			$this->llenartitulosdetalle();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="COMPROBANTE";
				$this->titulos[1]="DESCRIPCIÓN";
				$this->titulos[2]="FECHA";
				$this->titulos[3]="ESTATUS";
		}
		function llenartitulosdetalle()
		{
				$this->titulos2[0]="Cuenta";
				$this->titulos2[1]="Descripción del Asiento";
				$this->titulos2[2]="Referencia";
				$this->titulos2[3]="Débitos";
				$this->titulos2[4]="Créditos";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$x=$this->GetX();
			$y=$this->GetY();
            $tb8=$this->bd->select($this->sql8);
            $tb9=$this->bd->select($this->sql9);
			$this->SetXY(140,27);
			$this->cell(30,10,"Desde :".$this->fecha1);
			$this->cell(30,10,"Hasta :".$this->fecha2);
			$this->SetXY($x,$y);

			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			$this->ln();
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],7,$this->titulos2[$i]);
			}
			$this->ln();
			$this->Line(10,55,200,55);
			$this->ln();
		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["comp"];
				//$this->Line(10,$this->GetY(),200,$this->GetY());
				$this->cont=$this->cont+1;
				$this->cell($this->anchos[0],7,$tb2->fields["comp"]);

				$this->Setx(150);
				$this->cell($this->anchos[2]+5,7,$tb2->fields["fecha"]);
				if (strtoupper($tb2->fields["estado"])=='A'){$aux="Activo";}
				if (strtoupper($tb2->fields["estado"])=='D'){$aux="Diferido";}
				if (strtoupper($tb2->fields["estado"])=='N'){$aux="Anulado";}
				if (strtoupper($tb2->fields["estado"])=='R'){$aux="Reversado";}
				$this->cell($this->anchos[3],7,$aux);
				$this->Setx(40);
				$this->multicell(100,3,$tb2->fields["descom"]);
				$this->ln();
			}
			while(!$tb->EOF)
			{

				if($tb->fields["comp"]!=$ref)
				{
				$this->cont=$this->cont+1;
				$this->setFont("Arial","B",8);
				$this->cell(135,5,"");
				$this->cell(20,5,"Totales:       ".number_format($this->auxd,2,',','.'),0,0,'R');
				$this->cell(30,5,"".number_format($this->auxc,2,',','.'),0,0,'R');
				$this->ln(5);
				$this->auxd=0;
				$this->auxc=0;
				$this->Line(140,$this->GetY()-5,195,$this->GetY()-5);
				$this->Line(10,$this->GetY(),200,$this->GetY());


				// a partir del segundo

				$y=$this->gety();

				if($y>=230){

					$this->Addpage();
					$this->sety(60);
				}
				$this->ln(5);
				$this->cell($this->anchos[0],7,$tb->fields["comp"]);
			//	$this->cell($this->anchos[1],7,substr($tb->fields["descom"],0,60));

				$this->Setx(150);
				$this->cell($this->anchos[2]+5,7,$tb->fields["fecha"]);
				if (strtoupper($tb->fields["estado"])=='A'){$aux="Activo";}
				if (strtoupper($tb->fields["estado"])=='D'){$aux="Diferido";}
				if (strtoupper($tb->fields["estado"])=='N'){$aux="Anulado";}
				if (strtoupper($tb->fields["estado"])=='R'){$aux="Reversado";}
				$this->cell($this->anchos[3],7,$aux);
				$this->Setx(40);
				$descripcion='';
				if (strtoupper($tb->fields["estado"])!='A')

				{ $descripcion=$aux.'  '.$tb->fields["descom"];}
				else
				{
					$descripcion=$tb->fields["descom"];

				}


				$this->multicell(100,3,$descripcion);
				$this->ln();

		        }
				$ref=$tb->fields["comp"];
				$this->setFont("Arial","",8);

				//Detalle
				$this->cell($this->anchos2[0]-6,5,$tb->fields["cta"]);

				$this->cell($this->anchos2[1]+10,5,substr($tb->fields["bdesasi"],0,32));
				$this->cell($this->anchos2[2]-14,5,$tb->fields["brefasi"]);


				if (strtoupper($tb->fields["bdebcre"])=="D")
				{
				$this->auxd= $this->auxd + $tb->fields["bmonasi"];
				$this->auxdg= $this->auxdg + $tb->fields["bmonasi"];
				$this->cell($this->anchos2[3],5,number_format($tb->fields["bmonasi"],2,',','.'),0,0,'R');
				$this->cell($this->anchos2[4],5,number_format(0,2,',','.'),0,0,'R');
				}
				else
				{
				$this->auxc= $this->auxc + $tb->fields["bmonasi"];
				$this->auxcg= $this->auxcg + $tb->fields["bmonasi"];
				$this->cell($this->anchos2[3],5,number_format(0,2,',','.'),0,0,'R');
				$this->cell($this->anchos2[4],5,number_format($tb->fields["bmonasi"],2,',','.'),0,0,'R');
				}
				$this->ln(4);
				$tb->MoveNext();
			}
			$this->setFont("Arial","B",8);
			$this->cell(135,5,'');
			$this->cell(20,5,"Totales:       ".number_format($this->auxd,2,',','.'),0,0,'R');
			$this->cell(30,5,"".number_format($this->auxc,2,',','.'),0,0,'R');
			//$this->cell(20,5,"                                                                                                                                                       Totales:       ".number_format($this->auxd,2,',','.'));
			//$this->cell(20,5,"                                                                                                                                                                                        ".number_format($this->auxc,2,',','.'));
			$this->Line(140,$this->GetY(),195,$this->GetY());

			$this->ln();
			$this->ln();
			$this->Line(10,$this->GetY(),200,$this->GetY());
			$this->cell(20,5,"           Total Comprobantes:   ".$this->cont);
			$this->cell(20,5,"                                                                                                               Total General:         ".number_format($this->auxdg,2,',','.'));
			$this->cell(20,5,"                                                                                                                                                            ".number_format($this->auxcg,2,',','.'));
		}
	}
?>
