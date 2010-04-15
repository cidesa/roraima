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
    var $pro1;
    var $pro2;
    var $art1;
    var $art2;
    var $com1;
    var $com2;
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
      $this->com1=H::GetPost("com1");
      $this->com2=H::GetPost("com2");
      $this->pro1=H::GetPost("pro1");
      $this->pro2=H::GetPost("pro2");
      $this->art1=H::GetPost("art1");
      $this->art2=H::GetPost("art2");
      $this->fecha1=H::GetPost("fecha1");
      $this->fecha2=H::GetPost("fecha2");
      $this->status=strtolower(H::GetPost("status"));

      if ($this->status=='t')
      {
       $this->sql="select a.ordcom,a.fecord,a.desord,b.codart,d.rcpart,e.desrcp,e.fecrcp,b.canord,b.canrec,b.preart,
            c.desart,c.exitot
            from caordcom a, caartord b, caregart c,caartrcp d, carcpart e
            where
            (a.ordcom) = (b.ordcom) and (b.codart)  = (c.codart) and
            (b.codart)  = (d.codart) and (b.ordcom)  = (d.ordcom) and
            (d.rcpart)  = (e.rcpart) and
            (a.ordcom) >= ('".$this->com1."') and (a.ordcom) <= ('".$this->com2."') and
            (a.codpro) >= ('".$this->pro1."') and (a.codpro) <= ('".$this->pro2."') and
            (b.codart) >= ('".$this->art1."') and (b.codart) <= ('".$this->art2."') and
            a.fecord >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecord <= to_date('".$this->fecha2."','dd/mm/yyyy') and
            b.canord<>b.canrec
            order by a.ordcom";
      }
      else
      {
      $this->sql="select a.ordcom,a.fecord,a.desord,b.codart,d.rcpart,e.desrcp,e.fecrcp,b.canord,b.canrec,b.preart,
            c.desart,c.exitot
            from caordcom a, caartord b, caregart c,caartrcp d, carcpart e
            where
            (a.ordcom) = (b.ordcom) and (b.codart)  = (c.codart) and
            (b.codart)  = (d.codart) and (b.ordcom)  = (d.ordcom) and
            (d.rcpart)  = (e.rcpart) and
            (a.ordcom) >= ('".$this->com1."') and (a.ordcom) <= ('".$this->com2."') and
            (a.codpro) >= ('".$this->pro1."') and (a.codpro) <= ('".$this->pro2."') and
            (b.codart) >= ('".$this->art1."') and (b.codart) <= ('".$this->art2."') and
            a.fecord >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecord <= to_date('".$this->fecha2."','dd/mm/yyyy') and
            b.canord<>b.canrec and
            staord='".$this->status."'
            order by a.ordcom";
      }
      //print '<pre>'; print $this->sql;  exit;
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
      $ncampos=count($this->titulos);
      $ncampos2=count($this->titulos2);

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
        $this->cell(20,5,"Fecha Orden");
        $this->cell(20,5,"Nro. Orden");
        $this->cell(50,5,"Descripción Orden");
        $this->cell(25,5,"Fecha Recepción");
        $this->cell(25,5,"Nro. Recepción");
        $this->cell(50,5,"Descripción Recepción");
        $this->cell(20,5,"Precio Art.");
        $this->cell(20,5,"Cant. Ord.");
        $this->cell(20,5,"Cant. Recib.");
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
        $this->cell(20,5,"Fecha Orden");
        $this->cell(20,5,"Nro. Orden");
        $this->cell(50,5,"Descripción Orden");
        $this->cell(25,5,"Fecha Recepción");
        $this->cell(25,5,"Nro. Recepción");
        $this->cell(50,5,"Descripción Recepción");
        $this->cell(20,5,"Precio Art.");
        $this->cell(20,5,"Cant. Ord.");
        $this->cell(20,5,"Cant. Recib.");
        $this->cell(20,5,"Diferencia");
        $this->setFont("Arial","",8);
        $this->ln();
        }
      //Detalle
      $this->setFont("Arial","",8);
      $ref=$tb->fields["codart"];
      $this->cell(20,5,$tb->fields["fecord"]);
      $this->cell(20,5,$tb->fields["ordcom"]);
      $this->cell(50,5,$tb->fields["desord"]);
      $this->cell(25,5,$tb->fields["fecrcp"]);
      $this->cell(25,5,$tb->fields["rcpart"]);
      $this->cell(50,5,$tb->fields["desrcp"]);
      $this->cell(20,5,H::FormatoMonto($tb->fields["preart"]));
      $this->cell(20,5,$tb->fields["canord"]);
      $this->cell(20,5,$tb->fields["canrec"]);
      $this->cell(20,5,abs($tb->fields["canord"]-$tb->fields["canrec"]));
      $this->ln();
      $tb->MoveNext();
      }
    }
  }
?>
