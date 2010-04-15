<?
	require_once("../../lib/general/fpdfadds.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");


	class pdfreporte extends PDF_ADDS
	{

		var $bd;
		var $cab;
		var $titulo;
		var $ordserdes;
		var $ordserhas;
		var $codprodes;
		var $codprohas;
		var $fecorddes;
		var $fecordhas;
		var $status;
		var $despacho;
		var $condicion;
		var $conf;

		function pdfreporte()
		{
		    $this->conf="p";
			$this->fpdf($this->conf,"mm","Legal");
			$this->bd=new basedatosAdo();
			if  (!empty($_POST["ordserdes"]))
			{
				$this->ordserdes=$_POST["ordserdes"];
				$this->ordserhas=$_POST["ordserhas"];
				$this->codprodes=$_POST["codprodes"];
				$this->codprohas=$_POST["codprohas"];
				$this->fecorddes=$_POST["fecorddes"];
				$this->fecordhas=$_POST["fecordhas"];
				$this->status=$_POST["status"];
				$this->despacho=$_POST["despacho"];
			}
			else
			{
				$this->ordserdes=$_GET["ordserdes"];
				$this->ordserhas=$_GET["ordserhas"];
				$this->codprodes=str_replace('*',' ',$_GET["codprodes"]);
				$this->codprohas=str_replace('*',' ',$_GET["codprohas"]);
				$this->fecorddes=$_GET["fecorddes"];
				$this->fecordhas=$_GET["fecordhas"];
				$this->status=$_GET["status"];
				$this->despacho=str_replace('*',' ',$_GET["despacho"]);

			}


			if ($this->status=="Activas"){$this->condicion=" a.staord='A'";}
			elseif ($this->status=="Ambos"){$this->condicion=" (a.staord='A' or a.staord='N')";}
			else { $this->condicion=" a.staord='N'";}

			if (trim($this->despacho)=="Todos" or trim($this->despacho)=="")
			   $this->condicionD=" ";
			else   $this->condicionD=" and a.lugent ='".$this->despacho."'";

			$this->sql="select a.ordcom,a.codpro,a.fecord,a.notord as notord,a.desord,a.staord,";
			$this->sql=$this->sql."	to_char(a.fecord,'DD/MM/YYYY') as fecord, c.codcat as codcat,d.ordcom as codpar,";
			$this->sql=$this->sql."b.codpro,b.nompro,b.rifrepleg,b.nomrepleg,";
			$this->sql=$this->sql."	c.codart,c.ordcom,c.totart,d.codart,d.desres as desart, e.codpar as partida,";
			$this->sql=$this->sql."(CASE WHEN A.STAORD='A' THEN 'Activo' ";
   			$this->sql=$this->sql."WHEN A.STAORD='N' THEN 'Anulado'" ;
			$this->sql=$this->sql."ELSE 'Desconocido' END) AS STAORD ";
			$this->sql=$this->sql."from caordcom as a,caprovee as b,caartord as  c, caresordcom as d, caregart as e ";
			$this->sql=$this->sql."WHERE c.codart=d.codart and a.codpro=b.codpro and ";
			$this->sql=$this->sql."a.ordcom=c.ordcom and a.ordcom=d.ordcom and c.codart=d.codart and e.codart=d.codart and A.TIPORD='S' and ";
			$this->sql=$this->sql."A.ORDCOM>='".$this->ordserdes."' AND ";
			$this->sql=$this->sql."A.ORDCOM<='".$this->ordserhas."' AND ";
			$this->sql=$this->sql."A.FECORD >=TO_DATE('".$this->fecorddes."','DD/MM/YYYY') AND ";
			$this->sql=$this->sql."A.FECORD <=TO_DATE('".$this->fecordhas."','DD/MM/YYYY') AND".$this->condicion." AND ";
			$this->sql=$this->sql."a.codpro >='".$this->codprodes."' AND a.codpro <='".$this->codprohas."'".$this->condicionD;
			$this->sql=$this->sql."group by a.ordcom,a.codpro,a.fecord,a.notord,a.desord,a.staord,to_char(a.fecord,'DD/MM/YYYY'), c.codcat,d.ordcom, b.codpro,b.nompro,b.rifrepleg,b.nomrepleg, c.codart,c.ordcom,c.totart,d.codart,d.desres,e.codpar";
			$this->sql=$this->sql." ORDER BY A.FECORD,A.ORDCOM";

//print $this->sql;
		 /*caregart as d cambio para caresordcom... codpar como ordcom... desart como desres*/
		$this->cab=new cabecera();
		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->SetFont("Arial","B",9);

		}

		function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);

			$ref="";
			$primeravez=true;
			$subtotal=0;
			$descuento=0;
			$iva=0;
			$total=0;

			while (!$tb->EOF)
			{
			  if($tb->fields["ordcom"]!=$ref) //Imprimimos encabezado
			  {
			    $ref=$tb->fields["ordcom"];
				if (!$primeravez)
				{
				  $this->AddPage();
				}
				$primeravez=false;
				//Colocamos el Sello de ANULADA
				if ($tb->fields["staord"]=='Anulado')
				{
					$this->SetLineWidth(1);
					$this->SetDrawColor(100,1,1);
					$this->SetFont("Arial","B",84);
					$this->SetTextColor(100,1,1);
					$this->SetAlpha(0.5);
					$this->Rotate(45,40,160);
					$this->RoundedRect(40, 160, 150, 25, 2.5, 'D');
					$this->Text(42,183,'ANULADA');
					$this->Rotate(0);
					$this->SetDrawColor(0);
					$this->SetTextColor(0);
					$this->SetAlpha(1);
					$this->SetLineWidth(0);
				 }
				 else
				 {
					$this->SetAlpha(1);
				 } //	if ($tb->fields["staord"]=='Anulado')
				/////////////////////////////////////////
				/*$this->SetXY(175,20);
			    $this->SetFont("Arial","B",14);
				$this->Cell(20,5,$tb->fields["ordcom"]);*/
			    $this->SetXY(42,32);
			    $this->SetFont("Arial","",9);
			    $this->MultiCell(140,3,$tb->fields["nompro"]);
				$this->SetXY(160,37);
       		    $this->Cell(10,5,$tb->fields["rifrepleg"]);
				$this->SetXY(55,37);
				$this->MultiCell(100,3,$tb->fields["nomrepleg"]);

				$this->SetXY(62,46);
     		    $this->MultiCell(180,7,$tb->fields["lugent"]);
				$this->SetXY(10,100);
				$MiY=100;
			  }	// if($tb->fields["ordcom"]!=$ref) //Imprimimos encabezado

			  //Ya esta posicionado en la primera fila y Columna para Empezar el detalle
			  $this->SetFont("Arial","",8);
  			  $this->SetX(35);
			 // $this->Cell(32,5,$tb->fields["desart"]);
			  $this->SetX(139);
			  $this->Cell(28,5,number_format($tb->fields["totart"],2,".",","),0,0,"R");
			  $this->SetX(170);
			 $this->Cell(28,5,number_format($tb->fields["totart"],2,".",","),0,0,"R");
 			  $this->SetX(57);
			  $this->MultiCell(150,4,trim($tb->fields["desart"]));
			  $MiY=$this->GetY();
			  //Acumulamos Totales
			 $subtotal=$subtotal+$tb->fields["totart"];
			  $iva=0.11*$subtotal;


			  	 $notord=$tb->fields["notord"];
				$sector=substr($tb->fields["codcat"],0,2);
			  $programa=substr($tb->fields["codcat"],3,2);
			  $actividad=substr($tb->fields["codcat"],12,2);
			  $partida=$tb->fields["partida"];
			  $tbpartida= $this->bd->select("select nompar from nppartidas where trim(codpar)=trim('".$tb->fields["partida"]."')");
			  $nompartida= $tbpartida->fields["nompar"] ;
			  $tbgenerica= $this->bd->select("select c.codpar,c.nompar from cargosol a, carecarg b, nppartidas c
			   where (a.reqart)=trim('".$tb->fields["ordcom"]."') and a.codrgo=b.codrgo and b.codpre=c.codpar");
			     $generica= $tbgenerica->fields["codpar"];
			  $nomgenerica= $tbgenerica->fields["nompar"];
				$fecord=$tb->fields["fecord"];





			   $tb->MoveNext();


			   	 if (($MiY>190) && (!$tb->EOF))
			  {
			    $ref="";
				$this->SetFont("Arial","",7);
				$this->SetXY(182,170);
     			$this->Cell(28,5,"continua...",0,0,"R");
				$this->SetXY(57,$MiY+25);
			  	$this->MultiCell(70,4,$notord);
			     $this->SetFont("Arial","",9);
				 $this->SetXY(42,209);
				 $this->Cell(12,5,$sector);
				 $this->SetXY(42,214);
 				 $this->Cell(12,5,$programa);
				 $this->SetXY(42,219);
				 $this->Cell(12,5,$actividad);
				 $this->SetXY(35,224);
				 $this->Cell(35,5,$partida);
				 $this->Cell(12,5,$nompartida);
				 $this->SetXY(35,231);
				 $this->Cell(35,5,$generica);
				 $this->Cell(12,5,$nomgenerica);

				$this->SetXY(138,276);
				$this->Cell(20,5,substr($fecord,0,2));
				$this->SetX(160);
				$this->Cell(20,5,substr($fecord,3,2));
				$this->SetX(195);
				$this->Cell(20,5,substr($fecord,6,4));
			  }  // if (($MiY>180) && (!$tb->EOF))

			/*  else if (!$tb->EOF)
			  {
			  $this->SetXY(50,$MiY+25);
			  	$this->MultiCell(75,4,$notord);
			 $this->SetFont("Arial","",9);
				 $this->SetXY(42,210);
				 $this->Cell(12,5,$sector);
				 $this->SetXY(42,215);
 				 $this->Cell(12,5,$programa);
				 $this->SetXY(42,221);
				 $this->Cell(12,5,$actividad);
				 $this->SetXY(35,226);
				 $this->Cell(35,5,$partida);
				 $this->Cell(12,5,$nompartida);
				 $this->SetXY(35,231);
				 $this->Cell(35,5,$generica);
				 $this->Cell(12,5,$nomgenerica);

				$this->SetXY(140,280);
				$this->Cell(20,5,substr($fecord,0,2));
				$this->SetX(160);
				$this->Cell(20,5,substr($fecord,3,2));
				$this->SetX(190);
				$this->Cell(20,5,substr($fecord,6,4));
			   }
			   */

			  if (($tb->EOF) || (($ref!="") && ($ref!=$tb->fields["ordcom"])))
			  {
			     $total=$subtotal+$iva;
				 $this->Line(178,$MiY+6,200,$MiY+6);
   				 $this->SetXY(170,$MiY+6);                   /// voy aqui ///

				 $this->Cell(28,5,'SUB TOTAL								 '.number_format($subtotal,2,".",","),0,0,"R");
				 $this->SetXY(170,$MiY+11);

				 $this->Cell(28,5,'IVA 11%								 '.number_format($iva,2,".",","),0,0,"R");
				 $this->Line(178,$MiY+16,200,$MiY+16);
				 $this->SetXY(170,$MiY+16);
				 $this->SetFont("Arial","B",8);
				 $this->Cell(28,5,'TOTAL 								 '.number_format($total,2,".",","),0,0,"R");

				 $this->SetXY(170,253);
				 $this->SetFont("Arial","B",8);
				 $this->Cell(28,5,number_format($total,2,".",","),0,0,"R");
				// $subtotal=0;
				 //$descuento=0;
				 //$iva=0;
				  $this->SetXY(57,$MiY+25);
			  	$this->MultiCell(70,4,$notord);
			 $this->SetFont("Arial","",9);
				 $this->SetXY(42,209);
				 $this->Cell(12,5,$sector);
				 $this->SetXY(42,214);
 				 $this->Cell(12,5,$programa);
				 $this->SetXY(42,219);
				 $this->Cell(12,5,$actividad);
				 $this->SetXY(35,224);
				 $this->Cell(35,5,$partida);
				 $this->Cell(12,5,$nompartida);
				 $this->SetXY(35,231);
				 $this->Cell(35,5,$generica);
				 $this->Cell(12,5,$nomgenerica);

				$this->SetXY(138,276);
				$this->Cell(20,5,substr($fecord,0,2));
				$this->SetX(160);
				$this->Cell(20,5,substr($fecord,3,2));
				$this->SetX(195);
				$this->Cell(20,5,substr($fecord,6,4));
			 }


			  } //end while



			/* 	$this->SetXY(50,$MiY+25);
			  	$this->MultiCell(75,4,$notord);
			 $this->SetFont("Arial","",9);
				 $this->SetXY(42,204);
				 $this->Cell(12,5,$sector);
				 $this->SetXY(42,209);
 				 $this->Cell(12,5,$programa);
				 $this->SetXY(42,214);
				 $this->Cell(12,5,$actividad);
				 $this->SetXY(35,219);
				 $this->Cell(35,5,$partida);
				 $this->Cell(12,5,$nompartida);
				 $this->SetXY(35,224);
				 $this->Cell(35,5,$generica);
				 $this->Cell(12,5,$nomgenerica);

				$this->SetXY(140,279);
				$this->Cell(20,5,substr($fecord,0,2));
				$this->SetX(160);
				$this->Cell(20,5,substr($fecord,3,2));
				$this->SetX(191);
				$this->Cell(20,5,substr($fecord,6,4));*/



		}
	}
?>