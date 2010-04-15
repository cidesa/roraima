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
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->req1=$_POST["req1"];
			$this->req2=$_POST["req2"];
			$this->art1=$_POST["art1"];
			$this->art2=$_POST["art2"];
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->status=strtolower($_POST["status"]);

			if ($this->status=='t')
			{
			 $this->sql="select a.reqart,a.fecreq,a.desreq,b.codart,d.dphart,e.desdph,e.fecdph,b.canreq,b.canrec,d.candph,
						b.montot,c.desart,c.exitot
						from careqart a, caartreq b, caregart c,caartdph d, cadphart e
						where
						rtrim(a.reqart) = rtrim(b.reqart) and rtrim(b.codart)  = rtrim(c.codart) and
						rtrim(b.codart)  = rtrim(d.codart) and rtrim(b.reqart)  = rtrim(e.reqart) and
						rtrim(d.dphart)  = rtrim(e.dphart) and
						rtrim(a.reqart) >= rtrim('".$this->req1."') and rtrim(a.reqart) <= rtrim('".$this->req2."') and
						rtrim(b.codart) >= rtrim('".$this->art1."') and rtrim(b.codart) <= rtrim('".$this->art2."') and
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
						rtrim(a.reqart) = rtrim(b.reqart) and rtrim(b.codart)  = rtrim(c.codart) and
						rtrim(b.codart)  = rtrim(d.codart) and rtrim(b.reqart)  = rtrim(e.reqart) and
						rtrim(d.dphart)  = rtrim(e.dphart) and
						rtrim(a.reqart) >= rtrim('".$this->req1."') and rtrim(a.reqart) <= rtrim('".$this->req2."') and
						rtrim(b.codart) >= rtrim('".$this->art1."') and rtrim(b.codart) <= rtrim('".$this->art2."') and
						a.fecreq >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecreq <= to_date('".$this->fecha2."','dd/mm/yyyy') and
						b.canreq<>d.candph and
						stareq='".$this->status."'
						order by a.reqart";
			}



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
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
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
				$this->cell(25,5,"Código Artículo");
				$this->cell(60,5,"Descripción Artículo");
				$this->cell(20,5,"Existencia Actual");
				$this->ln();
				$this->setFont("Arial","",8);
				$this->cell(25,5,$tb2->fields["codart"]);
				$this->cell(60,5,$tb2->fields["desart"]);
				$this->cell(20,5,$tb2->fields["exitot"]);
				$this->ln();
				$this->setFont("Arial","I",8);
				$this->cell(20,5,"Fecha Req.");
				$this->cell(20,5,"Nro. Req.");
				$this->cell(50,5,"Descripción Req.");
				$this->cell(25,5,"Fecha Despacho");
				$this->cell(25,5,"Nro. Despacho");
				$this->cell(50,5,"Descripción Despacho");
				$this->cell(5,5,"");
				$this->cell(20,5,"Cant. Req.");
				$this->cell(30,5,"Cant. Despachada");
				$this->cell(20,5,"Diferencia");
				$this->setFont("Arial","",8);
				$this->ln();
			}

			while(!$tb->EOF)
			{
				if ($tb->fields["codart"]!=$ref)
				{
				$this->ln();
				$this->cell(25,5,"Código Artículo");
				$this->cell(60,5,"Descripción Artículo");
				$this->cell(20,5,"Existencia Actual");
				$this->ln();
				$this->setFont("Arial","",8);
				$this->cell(25,5,$tb->fields["codart"]);
				$this->cell(60,5,$tb->fields["desart"]);
				$this->cell(20,5,$tb->fields["exitot"]);
				$this->ln();
				$this->setFont("Arial","I",8);
				$this->cell(20,5,"Fecha Req.");
				$this->cell(20,5,"Nro. Req.");
				$this->cell(50,5,"Descripción Req.");
				$this->cell(25,5,"Fecha Despacho");
				$this->cell(25,5,"Nro. Despacho");
				$this->cell(50,5,"Descripción Despacho");
				$this->cell(5,5,"");
				$this->cell(20,5,"Cant. Req.");
				$this->cell(30,5,"Cant. Despachada");
				$this->cell(20,5,"Diferencia");
				$this->setFont("Arial","",8);
				$this->ln();
				}
			//Detalle
			$this->setFont("Arial","",8);
			$ref=$tb->fields["codart"];
			$this->cell(20,5,$tb->fields["fecreq"]);
			$this->cell(20,5,$tb->fields["reqart"]);
			//$this->Cell(50,5,"                              ");
			$this->Setx(100);
			$this->cell(25,5,$tb->fields["fecdph"]);
			$this->cell(25,5,$tb->fields["dphart"]);

			$this->Setx(210);
			$this->cell(20,5,$tb->fields["canreq"]);
			$this->cell(30,5,$tb->fields["candph"]);
			$this->cell(20,5,abs($tb->fields["candph"]-$tb->fields["canreq"]));

			$this->Setx(45);
			$y= $this->Gety();
			$this->multicell(50,5,$tb->fields["desreq"]);
			$z= $this->GetY();

			$p=($z-($z-$y));

			$this->SetXY(150,$p);
			$this->multicell(50,5,$tb->fields["desdph"]);

			$this->ln();
			$tb->MoveNext();
			}
		}
	}
?>
