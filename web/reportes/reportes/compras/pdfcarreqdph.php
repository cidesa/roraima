<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
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
		var $fecha1;
		var $fecha2;
		var $art1;
		var $art2;
		var $req1;
		var $req2;
		var $status;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
				$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->req1=H::GetPost("req1");
			$this->req2=H::GetPost("req2");
			$this->art1=H::GetPost("art1");
			$this->art2=H::GetPost("art2");
			$this->fecha1=H::GetPost("fecha1");
			$this->fecha2=H::GetPost("fecha2");
			$this->status=strtolower(H::GetPost("status"));

			if ($this->status=='t')
			{
			 $this->sql="select a.reqart,a.fecreq,a.desreq,b.codart,d.dphart,e.desdph,e.fecdph,b.canreq,b.canrec,d.candph,
						b.montot,c.desart,c.exitot
						from careqart a, caartreq b, caregart c,caartdph d, cadphart e
						where
						(a.reqart) = (b.reqart) and (b.codart)  = (c.codart) and
						(b.codart)  = (d.codart) and (b.reqart)  = (e.reqart) and
						(d.dphart)  = (e.dphart) and
						(a.reqart) >= ('".$this->req1."') and (a.reqart) <= ('".$this->req2."') and
						(b.codart) >= ('".$this->art1."') and (b.codart) <= ('".$this->art2."') and
						a.fecreq >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecreq <= to_date('".$this->fecha2."','dd/mm/yyyy') and
						b.canreq<>d.candph
						order by a.reqart";
			}
			else
			{
			$this->sql="select a.reqart,a.fecreq,a.desreq,b.codart,d.dphart,e.desdph,e.fecdph,b.canreq,b.canrec,d.candph,
						b.montot,c.desart,c.exitot
						from careqart a, caartreq b, caregart c,caartdph d, cadphart e
						where
						(a.reqart) = (b.reqart) and (b.codart)  = (c.codart) and
						(b.codart)  = (d.codart) and (b.reqart)  = (e.reqart) and
						(d.dphart)  = (e.dphart) and
						(a.reqart) >= ('".$this->req1."') and (a.reqart) <= ('".$this->req2."') and
						(b.codart) >= ('".$this->art1."') and (b.codart) <= ('".$this->art2."') and
						a.fecreq >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecreq <= to_date('".$this->fecha2."','dd/mm/yyyy') and
						b.canreq<>d.candph and
						stareq='".$this->status."'
						order by a.reqart";
			}



			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}

	function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=35;
		$anchos[1]=130;
		$anchos[2]=40;
		$anchos[3]=40;
		$anchos[4]=40;
		$anchos[5]=40;
		$anchos[6]=20;
		$anchos[7]=10;
		$anchos[8]=30;
		$anchos[9]=30;
		$anchos[10]=30;
		$anchos[11]=30;

		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=30;
		$anchos2[1]=30;
		$anchos2[2]=30;
		$anchos2[3]=30;
		$anchos2[4]=30;
		$anchos2[5]=30;
		$anchos2[6]=30;
		$anchos2[7]=30;
		$anchos2[8]=30;
		$anchos2[9]=30;
		$anchos2[10]=30;

		return $anchos2[$pos];
	}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO. CUENTA";
				$this->titulos[1]="DESCRIPCION";
				$this->titulos[2]="CARGABLE";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s");
			$this->setFont("Arial","B",9);

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->cell(8,5,"Al  ".date('d/m/Y'));
			$this->ln();
			$this->ln();
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","B",8);

			if (!$tb2->EOF)
			{
				$ref=$tb2->fields["codart"];
			/*	$this->cell(25,5,"Código Artículo");
				$this->cell(60,5,"Descripción Artículo");
				$this->cell(20,5,"Existencia Actual");*/
				$this->setwidths(array(30,100,30));
			    $this->setaligns(array("C","L","C"));
			    $this->rowm(array("Código Artículo","Descripción Artículo","Existencia Actual"));
			     $this->line(10,$this->GetY(),270,$this->GetY());
				$this->ln();
				$this->setFont("Arial","",8);
				/*$this->cell(25,5,$tb2->fields["codart"]);
				$this->cell(60,5,$tb2->fields["desart"]);
				$this->cell(20,5,$tb2->fields["exitot"]);*/

			    $this->setwidths(array(30,100,30));
			    $this->setaligns(array("C","L","C"));
		        $this->rowm(array($tb2->fields["codart"],$tb2->fields["desart"],$tb2->fields["exitot"]));
			    $this->line(10,$this->GetY(),270,$this->GetY());

				$this->ln();
				$this->setFont("Arial","I",9);

				$this->setwidths(array(20,20,50,25,25,50,25,30,20));
		  	    $this->setaligns(array("C","C","C","C","C","C","C","C","C"));
			    $this->rowm(array("Fecha Req.","Nro. Req.","Descripción Req.","Fecha Despacho","Nro. Despacho","Descripción Despacho","Cant. Req.","Cant. Despachada","Diferencia"));

			/*	$this->cell(20,5,"Fecha Req.");
				$this->cell(20,5,"Nro. Req.");
				$this->cell(50,5,"Descripción Req.");
				$this->cell(25,5,"Fecha Despacho");
				$this->cell(25,5,"Nro. Despacho");
				$this->cell(50,5,"Descripción Despacho");
				$this->cell(5,5,"");
				$this->cell(20,5,"Cant. Req.");
				$this->cell(30,5,"Cant. Despachada");
				$this->cell(20,5,"Diferencia");*/
				$this->setFont("Arial","",8);
				$this->ln();
			}

			while(!$tb->EOF)
			{
				if ($tb->fields["codart"]!=$ref)
				{
				$this->ln();
				$this->setFont("Arial","B",8);
			/*	$this->cell(25,5,"Código Artículo");
				$this->cell(60,5,"Descripción Artículo");
				$this->cell(20,5,"Existencia Actual");*/
				$this->setwidths(array(30,100,30));
			    $this->setaligns(array("C","L","C"));
			    $this->rowm(array("Código Artículo","Descripción Artículo","Existencia Actual"));
			    $this->line(10,$this->GetY(),270,$this->GetY());
				$this->ln();
				$this->setFont("Arial","",8);
				/*$this->cell(25,5,$tb->fields["codart"]);
				$this->cell(60,5,$tb->fields["desart"]);
				$this->cell(20,5,$tb->fields["exitot"]);*/
			    $this->setwidths(array(30,100,30));
			    $this->setaligns(array("C","L","C"));
			    $this->rowm(array($tb2->fields["codart"],$tb2->fields["desart"],$tb2->fields["exitot"]));
			     $this->line(10,$this->GetY(),270,$this->GetY());
				$this->ln();
				$this->setFont("Arial","I",9);
				$this->setwidths(array(20,20,50,25,25,50,25,30,20));
		  	    $this->setaligns(array("C","C","C","C","C","C","C","C","C"));
			    $this->rowm(array("Fecha Req.","Nro. Req.","Descripción Req.","Fecha Despacho","Nro. Despacho","Descripción Despacho","Cant. Req.","Cant. Despachada","Diferencia"));

			/*	$this->cell(20,5,"Fecha Req.");
				$this->cell(20,5,"Nro. Req.");
				$this->cell(50,5,"Descripción Req.");
				$this->cell(25,5,"Fecha Despacho");
				$this->cell(25,5,"Nro. Despacho");
				$this->cell(50,5,"Descripción Despacho");
				$this->cell(5,5,"");
				$this->cell(20,5,"Cant. Req.");
				$this->cell(30,5,"Cant. Despachada");
				$this->cell(20,5,"Diferencia");*/
				$this->setFont("Arial","",8);
				$this->ln();
				}
			//Detalle

			$this->setwidths(array(20,20,50,25,25,45,25,30,20));
		    $this->setaligns(array("C","C","L","C","C","L","R","R","R"));
		    $this->rowm(array($tb->fields["fecreq"],$tb->fields["reqart"],$tb->fields["desreq"],$tb->fields["fecdph"],$tb->fields["dphart"],$tb->fields["desdph"],$tb->fields["canreq"],$tb->fields["candph"],abs($tb->fields["candph"]-$tb->fields["canreq"])));


			$this->setFont("Arial","",8);
			$ref=$tb->fields["codart"];
		/*	$this->cell(20,5,$tb->fields["fecreq"]);
			$this->cell(20,5,$tb->fields["reqart"]);
			//$this->Cell(50,5,"                              ");
			$this->Setx(100);
			$this->cell(25,5,$tb->fields["fecdph"]);
			$this->cell(25,5,$tb->fields["dphart"]);

			$this->Setx(210);
			$this->cell(20,5,$tb->fields["canreq"]);
			$this->cell(30,5,$tb->fields["candph"]);
			$this->cell(20,5,abs($tb->fields["candph"]-$tb->fields["canreq"]));

			$this->Setx(45);*/
			$y= $this->Gety();
		//	$this->multicell(50,5,$tb->fields["desreq"]);
			$z= $this->GetY();

			$p=($z-($z-$y));

			$this->SetXY(150,$p);
		//	$this->multicell(50,5,$tb->fields["desdph"]);

			$this->ln();
			$tb->MoveNext();
			}
		}
	}
?>
