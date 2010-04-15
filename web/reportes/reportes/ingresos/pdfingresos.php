<?
	require_once("../../lib/general/fpdf/fpdf.php");
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
	var $rep;
	var $numero;
	var $cab;
	var $numing1;
	var $numing2;
	var $rifcon1;
	var $rifcon2;
	var $fecing1;
	var $fecing2;
	var $tiping1;
	var $tiping2;
	var $codpre1;
	var $codpre2;
	var $comodin;

	function pdfreporte()
	{
	 $this->fpdf("l","mm","Letter");
	 $this->bd=new basedatosAdo();
	 $this->titulos=array();
	 $this->titulos2=array();
	 $this->campos=array();
	 $this->anchos=array();
	 $this->anchos2=array();
	 $this->codpredes=H::GetPost("codpre1");
	 $this->codprehas=H::GetPost("codpre2");
	 $this->nivel=H::GetPost("periodo");

	 $this->arrp=$this->sql="select
	 			 a.codpre,
	 			 a.nompre,
	 			 a.liquidado,
	 			 a.devengado,
	 			 a.recaudado
	 			 from ingresos a
	 			 where
	 			 a.codpre>='".$this->codpredes."' and
	 			 a.codpre<='".$this->codprehas."' and (perpre)=('".$this->nivel."')
	 			 order by a.codpre";
	 //print $this->sql;exit;
	 $this->tb=$this->bd->select($this->sql);
	 if(!$this->tb->EOF)
	 $this->arrp=array("no vacio");
	 $this->cab=new cabecera();
	}
	function poner_cabecera($objeto,$rep,$configuracion,$pagina)
	{
		if($configuracion=="p")
		{
			//configuro la pagina con Orientacion Vertical
			//busco la descripcion y direccion de la empresa
			$tb3=$this->bd->select("select * from empresa where codemp='001'");
			if(!$tb3->EOF)
			{
				$nombre=$tb3->fields["nomemp"];
				$direccion=$tb3->fields["diremp"];
				$telef=$tb3->fields["tlfemp"];
				$fax=$tb3->fields["faxemp"];
			}
			$objeto->setFont("Arial","B",8);
			//Logo de la Empresa
			$objeto->Image("../../img/logo_1.jpg",10,8,33);
			//fecha actual
			$fecha=date("d/m/Y");
			$objeto->Cell(350,10,'Fecha: '.$fecha,0,0,'C');
			$objeto->ln(5);
			//Paginas
			if($pagina=="s")
			{
				$objeto->Cell(350,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');
			}
	    	//Titulo Descripcion de la Empresa
    		/*$objeto->Ln(-5);
    		$objeto->Cell(180,5,$nombre,0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(180,5,$direccion,0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(180,5,'Tlf:'.$telef,0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(180,5,'Fax:'.$fax,0,0,'C');
    		$objeto->Ln(8);*/
      $objeto->setFont("Arial","B",12);
      $objeto->Ln(-8);
       $tab = 45;
      $objeto->setX($tab);
      $objeto->Cell(270,10,'República Bolivariana de Venezuela',0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->setFont("Arial","B",8);
      $objeto->Cell(270,10,'Ministerio del Poder Popular Para la Finanzas',0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->Cell(270,10,$nombre,0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->Cell(270,10,'',0,0,'L');
      $objeto->Ln(10);
      $objeto->setFont("Arial","B",12);
      //$objeto->setX(80);
      $objeto->Cell(180,10,$rep,0,0,'C',0);
      $objeto->ln(10);
      $objeto->Line(10,35,200,35);
		}
 else
    {
      //configuro la pagina con Orientacion Horizontal
      //busco la descripcion y direccion de la empresa
      $tb3=$this->bd->select("select * from empresa where codemp='001'");
      if(!$tb3->EOF)
      {
        $nombre=$tb3->fields["nomemp"];
        $direccion=$tb3->fields["diremp"];
        $telef=$tb3->fields["tlfemp"];
        $fax=$tb3->fields["faxemp"];
      }
      $objeto->setFont("Arial","B",8);
      //Logo de la Empresa
      $objeto->Image("../../img/logo_1.jpg",10,8,33);
      //fecha actual
      $fecha=date("d/m/Y");
      $objeto->Cell(470,10,'Fecha: '.$fecha,0,0,'C');
      $objeto->ln(5);
      //Paginas
      if($pagina=="s")
      {
        $objeto->Cell(470,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');
      }
        //Titulo Descripcion de la Empresa
         $tab = 45;
      $objeto->setFont("Arial","B",12);
      $objeto->Ln(-8);
      $objeto->setX($tab);
      $objeto->Cell(270,5,'República Bolivariana de Venezuela',0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->setFont("Arial","B",8);
      $objeto->Cell(270,5,'Ministerio del Poder Popular Para la Finanzas',0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->Cell(270,5,$nombre,0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->Cell(270,5,'',0,0,'L');
      $objeto->Ln(10);
      $objeto->setFont("Arial","B",12);
      $objeto->Cell(270,10,$rep,0,0,'L',0);
      $objeto->ln(10);
      $objeto->Line(10,35,270,35);
      }
	}

	function Header()
	{
	 $this->cab->poner_cabecera($this,$_POST["titulo"],"l","s","");
	 $this->setFont("Arial","B",9);
	 $this->cell(270,5,'Codigo Presupuestario Desde '.$this->codpredes.' Hasta '.$this->codprehas);
	 $this->ln(6);
	 $this->Line(10,$this->getY(),270,$this->getY());
	 $this->ln(5);
	 $this->SetWidths(array(40,110,40,40,40));
	 $this->SetBorder(false);
	 $this->Setaligns(array('C','C','C','C','C'));
	 $this->Row(array('Codigo Presupuestario','Descripción','Liquidado','Devengado','Recaudado'));
	 $this->SetWidths(array(40,110,30,40,40));
	 $this->Setaligns(array('L','L','R','R','R'));
	}

	function Cuerpo()
	{
		while(!$this->tb->EOF)
		{
			$this->RowM(array(trim($this->tb->fields["codpre"]),trim($this->tb->fields["nompre"]),number_format($this->tb->fields["liquidado"],2,'.',','),number_format($this->tb->fields["devengado"],2,'.',','),number_format($this->tb->fields["recaudado"],2,'.',',')));
			$this->tb->MoveNext();
		}
    }
}
?>