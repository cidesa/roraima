<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/bd/basedatosAdo.php");


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
	 $this->fpdf("l","mm","Legal");
	 $this->bd=new basedatosAdo();
	 $this->titulos=array();
	 $this->titulos2=array();
	 $this->campos=array();
	 $this->anchos=array();
	 $this->anchos2=array();
	 $this->codcta1=H::GetPost("codcta1");
	 $this->codcta2=H::GetPost("codcta2");
	 $this->nivel=H::GetPost("periodo");
	 $this->fecha();

	 $this->arrp=$this->sql="select
	 			 a.codcta,
	 			 a.descta,
	 			 a.debito_consolidado,
	 			 a.credito_consolidado,
	 			 a.debito,
	 			 a.credito
	 			 from DIFERENCIAS_CONSOLIDADOS a
	 			 where
	 			 rpad(a.codcta,32,' ')>=rpad('".$this->codcta1."',32,' ') and
	 			 rpad(a.codcta,32,' ')<=rpad('".$this->codcta2."',32,' ') and (pereje)=('".$this->nivel."')";
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
			$objeto->Cell(470,10,'Fecha: '.$fecha,0,0,'R');
			$objeto->ln(5);
			//Paginas
			if($pagina=="s")
			{
				$objeto->Cell(470,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'R');
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
      $objeto->Cell(302,10,'Fecha: '.$fecha,0,0,'R');
      $objeto->ln(5);
      //Paginas
      if($pagina=="s")
      {
        $objeto->Cell(300,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'R');
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
      $objeto->Line(10,35,330,35);
      }
	}
	function fecha(){
			  $tb36=$this->bd->select("SELECT to_char(B.FECDES,'dd/mm/yyyy') as fecperdes
									  FROM
									  	CONTABA A, CONTABA1 B
									  WHERE A.FECINI = B.FECINI AND
											A.FECCIE = B.FECCIE AND
											B.PEREJE = '".$this->nivel."'");
					if (!$tb36->EOF){  $this->fecperdes=$tb36->fields["fecperdes"]; }

				 $tb36=$this->bd->select("SELECT to_char(B.FECHAS,'dd/mm/yyyy') as fecperhas
									FROM CONTABA A, CONTABA1 B
									WHERE A.FECINI = B.FECINI AND
											A.FECCIE = B.FECCIE AND
											B.PEREJE = '".$this->nivel."'");

					if (!$tb36->EOF){  $this->fecperhas=$tb36->fields["fecperhas"];}
					}

	function Header()
	{

	 $this->poner_cabecera($this,$_POST["titulo"],"l","s","");
	 $this->setFont("Arial","B",9);
	 $this->cell(270,5,'Cuenta Contable Desde '.$this->codcta1.' Hasta '.$this->codcta2);
	 $this->ln(6);
	 $this->Line(10,$this->getY(),330,$this->getY());
	 $this->ln(5);
	}

	function Cuerpo()
	{$this->setFont("Arial","B",9);
		while(!$this->tb->EOF)
		{
				 $this->SetWidths(array(40,110,40,40,40,40));
				 $this->SetBorder(false);
				 $this->Setaligns(array('C','C','C','C','C','C'));
				 $this->Row(array('Cuenta Contable','Descripción','Deditos Consolidados','Creditos Cosolidados','Debitos','Creditos'));
				 $this->SetWidths(array(40,110,30,40,40,40));
				 $this->Setaligns(array('L','L','R','R','R','R'));
				 $this->SetWidths(array(40,110,30,40,40,40));
				 $this->Setaligns(array('L','L','R','R','R','R'));

			$this->RowM(array(trim($this->tb->fields["codcta"]),trim($this->tb->fields["descta"]),number_format($this->tb->fields["credito_consolidado"],2,'.',','),number_format($this->tb->fields["debito_consolidado"],2,'.',','),number_format($this->tb->fields["credito"],2,'.',','),number_format($this->tb->fields["debito"],2,'.',',')));
			if(($this->tb->fields["credito_consolidado"]<>$this->tb->fields["credito"]) or ($this->tb->fields["debito_consolidado"]<>$this->tb->fields["debito"]))
			{

			$this->sqlD="select
							 a.numcom,
							 a.desasi,
						         a.feccom,
						         a.numcomadi,
							(CASE WHEN a.DEBCRE='D' THEN a.MONASI ELSE 0 END) as DEBITOS,
							(CASE WHEN a.DEBCRE='C' THEN a.MONASI ELSE 0 END) as CREDITOS
						from contabc1 a
							 where
							 rpad(a.codcta,32,' ') = rpad('".$this->tb->fields["codcta"]."',32,' ') and a.feccom >= to_date('".$this->fecperdes."','dd/mm/yyyy') and a.feccom <= to_date('".$this->fecperhas."','dd/mm/yyyy')";//print $this->sqlD;exit;
							$this->tbD=$this->bd->select($this->sqlD);
				 if(!$this->tbD->EOF)
				 {
				 $this->SetWidths(array(40,110,80,40,40));
				 $this->SetBorder(false);
				 $this->Setaligns(array('C','L','C','C','C'));
  			     $this->RowM(array('','','','',''));
				 $this->setFont("Arial","B",9);
				 $this->Row(array('Numero de Comprobante','Descripción Del Comprobante','','Debitos','Creditos'));
				 }

			while(!$this->tbD->EOF)
				{if (trim($this->tbD->fields["numcomadi"])=='')
				{
				 $this->SetWidths(array(40,140,40,40,40));
				 $this->Setaligns(array('L','L','C','R','R'));
				 $this->setFont("Arial","",9);
				 $this->RowM(array(trim($this->tbD->fields["numcom"]),trim($this->tbD->fields["desasi"]),'',number_format($this->tbD->fields["creditos"],2,'.',','),number_format($this->tbD->fields["debitos"],2,'.',',')));
				}
				 $this->tbD->MoveNext();
				}
		      		if($this->tbD->EOF)
		      		{
		      			 $this->Line(10,$this->getY(),330,$this->getY());
		      		}
			}$this->RowM(array('','','','',''));
					$this->tb->MoveNext();
		}
    }
}
?>