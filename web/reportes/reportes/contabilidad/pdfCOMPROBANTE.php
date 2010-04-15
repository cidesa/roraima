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
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->estado=$_POST["estado"];
			$this->com1=$_POST["com1"];
			$this->com2=$_POST["com2"];
			$this->estado=strtoupper($_POST["estado"]);
			$this->elaborado=H::GetPost("elaborado");
			$this->revisado=H::GetPost("revisado");
	        $this->conformado=H::GetPost("conformado");

			if (strtoupper($this->estado)=="T")
			{
			$this->sql="select a.numcom as comp, a.descom as descom, to_char(A.FECCOM,'dd/mm/yyyy') as fecha, a.stacom as estado,
			b.codcta as cta, b.desasi as bdesasi, b.refasi as brefasi, b.debcre as bdebcre, b.monasi as bmonasi
			from contabc a,contabc1 b
			where a.numcom=b.numcom and a.feccom=b.feccom and
			a.numcom >= RPAD('".$this->com1."',8,' ') and a.numcom <= RPAD('".$this->com2."',8,' ') and
			a.feccom>=to_date('".$this->fecha1."','dd/mm/yyyy') and a.feccom<=to_date('".$this->fecha2."','dd/mm/yyyy')
			order by a.feccom,a.numcom,b.numasi";
			}
			else
			{
			$this->sql="select a.numcom as comp, a.descom as descom, to_char(A.FECCOM,'dd/mm/yyyy') as fecha, a.stacom as estado,
			b.codcta as cta, b.desasi as bdesasi, b.refasi as brefasi, b.debcre as bdebcre, b.monasi as bmonasi
			from contabc a,contabc1 b
			where a.numcom=b.numcom and a.feccom=b.feccom and
			a.numcom >= RPAD('".$this->com1."',8,' ') and a.numcom <= RPAD('".$this->com2."',8,' ') and
			a.feccom>=to_date('".$this->fecha1."','dd/mm/yyyy') and a.feccom<=to_date('".$this->fecha2."','dd/mm/yyyy')  and
			(a.stacom='".$this->estado."') order by a.feccom,a.numcom,b.numasi";
			}

//print $this->sql;
//exit;

			//$this->llenartitulosmaestro();
			//$this->llenartitulosdetalle();
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
			/*
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
			$this->ln(); */
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

				$this->cell(20,7,"Comprobante:  ");
				$this->setFont("Arial","",8);
				$this->cell(130,7,$tb->fields["comp"]);
				$this->setFont("Arial","B",8);
				$this->cell(12,7,"Fecha:  ");
				$this->setFont("Arial","",8);
				$this->cell(10,7,$tb->fields["fecha"]);
				$this->ln();
				$this->setFont("Arial","B",8);
				$this->cell(20,3,"Descripción:  ");

				// aqui me falta un multicell

				$this->setFont("Arial","B",8);


				if (strtoupper($tb->fields["estado"])=='A'){$aux="Activo";}
				if (strtoupper($tb->fields["estado"])=='D'){$aux="Diferido";}
				if (strtoupper($tb->fields["estado"])=='N'){$aux="Anulado";}
				if (strtoupper($tb->fields["estado"])=='R'){$aux="Reversado";}

				$this->setFont("Arial","B",8);
				$this->Setx(150);
				$this->cell(15,3,"Estatus:  ");
				$this->setFont("Arial","",8);
				$this->cell(10,3,$aux);
				$this->Setx(30);
				$this->setFont("Arial","",7);
				$this->multicell(120,3,$tb->fields["descom"]);

				$this->ln();
				$this->Line(10,$this->GetY(),200,$this->GetY());
				$this->setFont("Arial","B",8);
				$this->cell(12,7,"Nro.");
				$this->cell(25,7,"Cuenta");
				$this->cell(70,7,"Descripción de la Cuenta.");
				$this->cell(32,7,"Referencia");
				$this->cell(29,7,"Débito");
				$this->cell(25,7,"Crédito");
				$this->ln();
				$this->Line(10,$this->GetY(),200,$this->GetY());

			}
			while(!$tb->EOF)
			{
				if($tb->fields["comp"]!=$ref)
				{
// aqui esta el error
				$z=$this->Gety();
				if($z>220)
				{
					$this->Addpage();
					$this->sety(35);
					}

				$this->cont=0;
				$this->setFont("Arial","B",8);
				$this->ln();
	/*estos*/			$this->cell(133);
				$this->cell(25,5,"                                                                                                                                           Totales:                   ".number_format($this->auxd,2,',','.'),0,0,'R');
				$this->cell(30,5,"                                                                                                                                                                                        ".number_format($this->auxc,2,',','.'),0,0,'R');
				$this->ln();
				$this->ln();
				$this->ln();
				$this->ln();
				$this->cell(120,7,"                                                  Revisado por ");
				$this->cell(20,7,"Supervisado por ");
				$this->Line(30,$this->GetY(),90,$this->GetY());
				$this->Line(110,$this->GetY(),170,$this->GetY());
				$this->auxd=0;
				$this->auxc=0;
				$this->Line(10,$this->GetY()-25,200,$this->GetY()-25);
				$this->setFont("Arial","B",15);
				$this->setFont("Arial","B",8);

				$this->ln();
				$this->ln();
				$this->ln();


				$this->cell(20,7,"Comprobante:  ");
				$this->setFont("Arial","",8);
				$this->cell(130,7,$tb->fields["comp"]);
				$this->setFont("Arial","B",8);
				$this->cell(12,7,"Fecha:  ");
				$this->setFont("Arial","",8);
				$this->cell(10,7,$tb->fields["fecha"]);
				$this->ln();
				$this->setFont("Arial","B",8);
				$this->cell(20,7,"Descripción:  ");

				$this->setFont("Arial","",7);
				// aqui me falta un multicell


				if (strtoupper($tb->fields["estado"])=='A'){$aux="Activo";}
				if (strtoupper($tb->fields["estado"])=='D'){$aux="Diferido";}
				if (strtoupper($tb->fields["estado"])=='N'){$aux="Anulado";}
				if (strtoupper($tb->fields["estado"])=='R'){$aux="Reversado";}

				$this->setFont("Arial","B",8);
				$this->Setx(150);
				$this->cell(15,7,"Estatus:  ");
				$this->setFont("Arial","",8);
				$this->cell(10,7,$aux);
				$this->Setx(30);
				$this->setFont("Arial","",7);
				$this->multicell(120,3,$tb->fields["descom"]);

				$this->ln();
				$this->Line(10,$this->GetY(),200,$this->GetY());
				$this->setFont("Arial","B",8);

				$this->cell(12,7,"Nro.");
				$this->cell(25,7,"Cuenta");
				$this->cell(70,7,"Descripción de la Cuenta.");
				$this->cell(32,7,"Referencia");
				$this->cell(29,7,"Débito");
				$this->cell(25,7,"Crédito");
				$this->ln();
				$this->Line(10,$this->GetY(),200,$this->GetY());


		        } // end del if

				$ref=$tb->fields["comp"];


				//Detalle
				$this->setFont("Arial","",8);
				$this->ln();
				$this->cont=$this->cont+1;
				$this->cell(7,5," ".$this->cont);

				$this->cell(28,5,$tb->fields["cta"]);


				//referencia
				$this->Setx(117);
				$this->cell(25,5,$tb->fields["brefasi"]);

				if (strtoupper($tb->fields["bdebcre"])=="D")
				{
				$this->auxd= $this->auxd + $tb->fields["bmonasi"];
				$this->auxdg= $this->auxdg + $tb->fields["bmonasi"];
				$this->cell(25,5,number_format($tb->fields["bmonasi"],2,',','.'),0,0,'R');
				$this->cell(30,5,"          0.00",0,0,"R");
				}
				else
				{
				$this->auxc= $this->auxc + $tb->fields["bmonasi"];
				$this->auxcg= $this->auxcg + $tb->fields["bmonasi"];
				$this->cell(25,5,"          0.00",0,0,'R');
				$this->cell(30,5,number_format($tb->fields["bmonasi"],2,',','.'),0,0,'R');
				}
				$this->Setx(45);
				$this->setFont("Arial","",7);
				$this->multicell(70,3,$tb->fields["bdesasi"]);
				$this->ln();


				$tb->MoveNext();
			} //end ciclo

				$this->setFont("Arial","B",8);

				$y=$this->gety();

				if($y>200){

					$this->Addpage();
					$this->sety(200);
				}

				$this->cont=0;
				$this->setFont("Arial","B",8);
				$this->ln();
				$this->cell(20,5,"                                                                                                                                           Totales:                   ".number_format($this->auxd,2,',','.'));
				$this->cell(20,5,"                                                                                                                                                                                        ".number_format($this->auxc,2,',','.'));
				$this->ln();
				$this->ln();
				$this->ln();
				$this->ln();
				$this->sety(240);
	$this->SetWidths(array(66,68,66));
	$this->SetAligns(array("C","C","C"));
	$this->SetBorder(1);
	$this->ln();
	$this->Row(array("ELABORADO","REVISADO","CONFORMADO"));
	// $this->ln();
	$this->setJump(8);
	$this->Row(array($this->elaborado,$this->revisado,$this->conformado));
	$this->setJump(2);
	$this->setFont("Arial","B",7);
	$this->Row(array("","",""));

				$this->Line(30,$this->GetY(),90,$this->GetY());
				$this->Line(110,$this->GetY(),170,$this->GetY());
				$this->auxd=0;
				$this->auxc=0;
				$this->Line(10,$this->GetY()-25,200,$this->GetY()-25);
				$this->setFont("Arial","B",15);
				$this->setFont("Arial","B",8);
				$this->ln();
				$this->ln();
				$this->ln();

		}
	}
?>
