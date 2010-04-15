<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
		var $acum1t=0;
		var $acum2t=0;
		var $acum3t=0;
		var $cont=0;
		var $cont1=0;
		var $result=0;
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
		var $codart1;
		var $codart2;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
				$this->bd=new basedatosAdo();
			$this->bd->validar();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codart1=trim(H::GetPost("codart1"));
			$this->codart2=trim(H::GetPost("codart2"));


 				$this->sql1= "SELECT FORART as formatoart FROM CADEFART";
		    	$tb1=$this->bd->select($this->sql1);

				$forma=$tb1->fields["formatoart"];
				$this->sql2="SELECT A.CODART as acodart, A.DESART as adesart, A.EXITOT as aexitot FROM CAREGART A WHERE
							A.CODART >= '".$this->codart1."' AND A.CODART <= '".$this->codart2."' AND
							LENGTH(RTRIM(CODART))=(LenGTH(Trim('".$forma."'))) ORDER BY CODART";

			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

		}

	function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=20;
		$anchos[1]=50;
		$anchos[2]=30;
		$anchos[3]=20;
		$anchos[4]=30;
		$anchos[5]=40;
		$anchos[6]=25;
		$anchos[7]=25;
		$anchos[8]=25;
		$anchos[9]=30;
		$anchos[10]=30;
		$anchos[11]=30;

		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=5;
		$anchos2[1]=30;
		$anchos2[2]=70;
		$anchos2[3]=30;
		$anchos2[4]=30;
		$anchos2[5]=25;
		$anchos2[6]=30;
		$anchos2[7]=30;
/*		$anchos2[7]=30;
		$anchos2[8]=30;
		$anchos2[9]=30;
		$anchos2[10]=30;
		$anchos2[11]=30;*/

		return $anchos2[$pos];
	}



		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s");
			$this->setFont("Arial","B",9);


		}



			function Cuerpo()
		{
 			$this->setFont("Arial","B",9);
 			$this->SetTextColor(0,0,128);
			$this->cell(20,5," ");
			$this->cell(50,5,"MOVIMIENTOS POR ARTICULO");
			$this->ln();
			$this->cell(50,5,"Al:".date('d/m/Y'));
			$this->ln();
 			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","B",8);
	//		$this->Line(10,50,270,50);
	    	$tb2=$this->bd->select($this->sql2);
	    	$this->tb2=$tb2;
		while(!$tb2->EOF)
			{
				 $codart=$tb2->fields["acodart"];

				 $this->Line(10,$this->GetY(),270,$this->GetY());

				 $this->SetLineWidth(0.2);
				 $this->setFont("Arial","B",7);
				 $this->cell(60,5,"Código Artículo   ".$tb2->fields["acodart"]);
				// $this->cell(130,5,"Descripción Artículo   ".$tb2->fields["adesart"]);
				 $this->cell(170,5,"");
				 $this->cell(60,5,"Existencia Actual   ".$tb2->fields["aexitot"]);
				$this->Setx(55);
				 $this->multicell(170,5,"Descripción Artículo   ".$tb2->fields["adesart"]);
				  $this->SetLineWidth(0.5);
				 $this->Line(10,$this->GetY(),270,$this->GetY());
				   $this->SetLineWidth(0.2);
				 $this->ln();
				 $this->SetTextColor(200,0,0);
				 $this->setFont("Arial","",7);
				 $this->cell(60,5,"Fecha");
				 $this->SetTextColor(0,0,0);
				 $this->ln();
				 $this->cell(15,5,"Referencia");
				 $this->cell(40,5,"Descripción");
				 $this->cell(30,5,"Tipo de");
				 $this->cell(35,5,"Unidad Origen");
 				 $this->cell(37,5,"Unidad Destino");
				 $this->setFont("Arial","B",8);
				 $this->cell(40,5,"ENTRADAS");
				 $this->cell(40,5,"SALIDA  ");
				 $this->setFont("Arial","",7);
				 $this->ln(4);
				 $this->cell(15,5,"Movimiento");
				 $this->cell(40,5,"Movimiento");
				 $this->cell(30,5,"Movimiento");
				 $this->cell(35,5,"");
 				 $this->cell(30,5,"");
				 $this->cell(20,5,"Cantidad");
				 $this->cell(20,5,"Costo");
				 $this->cell(20,5,"Cantidad");
				 $this->cell(30,5,"Costo");
				 $this->cell(20,5,"Saldo");
				 $this->setFont("Arial","",8);
			 $this->Line(160,$this->GetY(),195,$this->GetY());
				 $this->Line(200,$this->GetY(),240,$this->GetY());
  				 $this->ln();
				 //-------ORDEN DE COMPRA-----


				$this->sql3= "SELECT A.CODART as artcom, B.ORDCOM, to_char(B.FECORD,'dd/mm/yyyy') as fecord, B.DESORD, A.CODCAT, C.NOMCAT  as nomcatord,
							 A.PREART,A.CANORD FROM  CAARTORD A,CAORDCOM B, npcatpre C
							 WHERE A.ORDCOM=B.ORDCOM AND
							 A.CODART='".$codart."' AND
							 A.CODCAT=C.CODCAT ORDER BY A.CODART, B.FECORD";

							 	//	print $this->sql3;
				//exit;
		    	$tb3=$this->bd->select($this->sql3);
				while(!$tb3->EOF)
				{
				$this->SetTextColor(140,0,0);
				$this->setFont("Arial","B",7);
				$this->cell(15,5,$tb3->fields["fecord"]);
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","",6);
				$this->ln(3);
  			    $this->cell(15,5,"".$tb3->fields["ordcom"]);
				$this->ln(2);
				$this->ln(-1);
				$this->cell(15,5,"");
				$this->SetAutoPageBreak(false);
  			    $this->Multicell(38,3,"".substr($tb3->fields["desord"],0,55),0,"L");
				$this->SetAutoPageBreak(true);
				$this->ln(-2);
				$this->ln(-5);
				$this->cell(55,5,"");
				$this->SetTextColor(180,180,180);
				$this->setFont("Arial","BI",5);
  			    $this->cell(30,5,"ORDEN DE COMPRA");
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","",6);
  			    $this->cell(30,5,"".substr($tb3->fields["nomcatord"],0,25));
  			    $this->cell(30,5,"");
  			    $this->cell(15,5,"".H::FormatoMonto($tb3->fields["canord"],0),0,0,'R');
  			    $this->cell(20,5,"".H::FormatoMonto($tb3->fields["preart"]),0,0,'R');
				$this->cell(7,5,"");
  			    $this->cell(15,5,"");
  			    $this->cell(20,5,"");
  			    $this->cell(7,5,"");
  			    $this->cell(20,5,"".H::FormatoMonto($tb3->fields["canord"]*$tb3->fields["preart"]),0,0,'R');
				$this->ln();
				$tb3->MoveNext();
				}

				//-------RECEPCION-----
				$this->sql6= "SELECT A.CODART as artrcp, A.RCPART,A.ORDCOM as ordrcp, to_char(B.FECRCP,'dd/mm/yyyy') as fecrcp,B.DESRCP,(A.MONTOT/A.CANREC) as cosrec,A.CANREC
							 FROM  CAARTRCP A,CARCPART B
							 WHERE A.RCPART=B.RCPART AND
							 A.CODART='".$codart."'
							 ORDER BY A.CODART, B.FECRCP";
		    	$tb6=$this->bd->select($this->sql6);
				while(!$tb6->EOF)
				{
				$this->SetTextColor(140,0,0);
				$this->setFont("Arial","B",7);
				$this->cell(15,5,$tb6->fields["fecrcp"]);
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","",6);
				$this->ln(3);
  			    $this->cell(15,5,"".$tb6->fields["rcpart"]);
				//--
				$this->ln(2);
				$this->ln(-1);
				$this->cell(15,5,"");
				$this->SetAutoPageBreak(false);
  			    $this->Multicell(38,3,"".substr($tb6->fields["desrcp"],0,55),0,"L");
  			    $this->SetAutoPageBreak(true);
				$this->ln(-2);
				$this->ln(-5);
				$this->cell(55,5,"");
				//--
				$this->SetTextColor(180,180,180);
				$this->setFont("Arial","BI",5);
  			    $this->cell(30,5,"RECEPCION");
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","",6);
  			    $this->cell(30,5,"");
  			    $this->cell(30,5,"");
  			    $this->cell(15,5,"".H::FormatoMonto($tb6->fields["canrec"],0),0,0,'R');
  			    $this->cell(20,5,"".H::FormatoMonto($tb6->fields["cosrec"]),0,0,'R');
  			   $this->cell(7,5,"");
  			    $this->cell(15,5,"");
  			    $this->cell(20,5,"");
  			    $this->cell(7,5,"");
  			    $this->cell(20,5,"".H::FormatoMonto($tb6->fields["canrec"]*$tb6->fields["cosrec"]),0,0,'R');
				$this->ln();
				$tb6->MoveNext();
				}

				//-------REQUISICION-----
				$this->sql4= "SELECT A.REQART, A.CODART as artreq,to_char(B.FECREQ,'dd/mm/yyyy') as fecreq,B.DESREQ,(A.MONTOT/A.CANREQ) as cosreq,A.CANREQ,A.CODCAT as carreq,C.NOMCAT as nomcatreq
							  FROM  CAARTREQ A,CAREQART B, npcatpre C
							  WHERE A.REQART=B.REQART AND
							  A.CODART='".$codart."' AND
							  A.CODCAT=C.CODCAT ORDER BY A.CODART, B.FECREQ";

		    	$tb4=$this->bd->select($this->sql4);
				while(!$tb4->EOF)
				{
				$this->SetTextColor(140,0,0);
				$this->setFont("Arial","B",7);
				$this->cell(15,5,$tb4->fields["fecreq"]);
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","",6);
				$this->ln(3);
  			    $this->cell(15,5,"".$tb4->fields["reqart"]);
				//--
				$this->ln(2);
				$this->ln(-1);
				$this->cell(15,5,"");
				$this->SetAutoPageBreak(false);
				$this->Multicell(38,3,"".substr($tb4->fields["desreq"],0,55),0,"L");
				$this->SetAutoPageBreak(true);
				$this->ln(-2);
				$this->ln(-5);
				$this->cell(55,5,"");
				//--
				$this->SetTextColor(180,180,180);
				$this->setFont("Arial","BI",5);
  			    $this->cell(30,5,"REQUISICION");
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","",6);
  			    $this->cell(30,5,"".substr($tb4->fields["nomcatreq"],0,25));
  			    $this->cell(30,5,"");
  			    $this->cell(15,5,"".H::FormatoMonto($tb4->fields["canreq"],0),0,0,'R');
  			    $this->cell(20,5,"".H::FormatoMonto($tb4->fields["cosreq"]),0,0,'R');
  			    $this->cell(7,5,"");
  			    $this->cell(15,5,"");
  			    $this->cell(20,5,"");
  			    $this->cell(7,5,"");
  			    $this->cell(20,5,"".H::FormatoMonto($tb4->fields["canreq"]*$tb4->fields["cosreq"]),0,0,'R');
				$this->ln();
				$tb4->MoveNext();
				}

				//-------DESPACHO-----
				$this->sql5= "SELECT A.CODART as artdph,A.CANDPH,B.DPHART,to_char(B.FECDPH,'dd/mm/yyyy') as fecdph,B.DESDPH,A.CODCAT,C.NOMCAT as nomcatdph
							 FROM CAARTDPH A, CADPHART B, npcatpre C
							 WHERE A.DPHART=B.DPHART AND
							 A.CODART='".$codart."' AND
							 A.CODCAT=C.CODCAT ORDER BY A.CODART, B.FECDPH";
		    	$tb5=$this->bd->select($this->sql5);
				while(!$tb5->EOF)
				{
				$this->SetTextColor(140,0,0);
				$this->setFont("Arial","B",7);
				$this->cell(15,5,$tb4->fields["fecdph"]);
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","",6);
				$this->ln(3);
  			    $this->cell(15,5,"".$tb5->fields["dphart"]);
				//--
				$this->ln(2);
				$this->ln(-1);
				$this->cell(15,5,"");
				$this->SetAutoPageBreak(false);
  			    $this->Multicell(38,3,"".substr($tb5->fields["desdph"],0,55),0,"L");
  			    $this->SetAutoPageBreak(true);
				$this->ln(-2);
				$this->ln(-5);
				$this->cell(55,5,"");
				//--
				$this->SetTextColor(180,180,180);
				$this->setFont("Arial","BI",5);
  			   $this->cell(30,5,"DESPACHO");
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","",6);
			    $this->cell(30,5,"");
  			    $this->cell(30,5,"".$tb5->fields["nomcatdph"]);
  			    $this->cell(15,5,"");
  			    $this->cell(20,5,"");
  			   	$this->cell(7,5,"");
  			    $this->cell(15,5,"".H::FormatoMonto($tb5->fields["candph"]),0,0,'R');
  			    $this->cell(20,5,"".$tb5->fields["candph"]);
  			    $this->cell(20,5,"".$tb5->fields["candph"]);
				$this->cell(7,5,"");
				$this->ln();
				$tb5->MoveNext();

				}
				 $this->ln();
				 $this->ln();
				 $tb2->MoveNext();
				 if($this->GetY()>=170){
				 	$this->AddPage();
				 }
		        }
				$this->bd->closed();
		}
	}
?>