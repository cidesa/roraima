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
		var $codempdes;
		var $codemphas;
		var $codcardes;
		var $codcarhas;
		var $codcatdes;
		var $codcathas;
		var $codcondes;
		var $codconhas;
		var $tipnom;
		var $elaborado;
		var $revisado;
		var $autorizado;
		var $conf;
		var $nombre;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->codcardes=$_POST["codcardes"];
			$this->codcarhas=$_POST["codcarhas"];
			$this->codgasdes=$_POST["codgasdes"];
			$this->codgashas=$_POST["codgashas"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnom=$_POST["tipnom"];
			$this->elaborado=$_POST["elaborado"];
			$this->revisado=$_POST["revisado"];
			$this->autorizado=$_POST["autorizado"];
			    $this->especial=$_POST["especial"];
			       $this->fechades=$_POST["fechades"];
	  $this->fechahas=$_POST["fechahas"];

			$this->sqla="SELECT * FROM NPTIPGAS WHERE CODTIPGAS >= '".$this->codgasdes."' AND CODTIPGAS<= '".$this->codgashas."'";

			$this->sql="SELECT
							distinct C.CODEMP as codemp,a.codtipgas,a.destipgas,f.nomnom,
							to_char(C.FECRET,'dd/mm/yyyy') as fecret,
							C.NOMEMP as nomemp,
							to_char(C.FECING,'dd/mm/yyyy') as fecing,
							C.NUMCUE as CUENTA_BANCO,
							B.CODCAT as CODCAT,
							D.nomcat as nomcat,
							C.CEDEMP as cedemp,
							LTRIM(RTRIM(B.CODCAR)) as CODCAR,
							B.NOMCAR as nomcar,
							(CASE WHEN C.STAEMP='A' THEN 'ACTIVO' WHEN C.STAEMP='S' THEN 'SUSPENDIDO' WHEN C.STAEMP='V' THEN 'VACACIONES' ELSE '' END) as ESTATUS,
							G.CODCAR as codcargo,
							G.CODCON as codcon, e.DESNIV as desniv,
							LTRIM(RTRIM(G.NOMCON)) AS NOMCON,-- G.MONTO as ASIGNA
							(CASE WHEN H.OPECON='A' THEN coalesce(G.MONTO,0) ELSE 0 END) as ASIGNA,
							(CASE WHEN H.OPECON='D' THEN coalesce(G.MONTO,0) ELSE 0 END) as DEDUC,
							(CASE WHEN H.OPECON='P' THEN coalesce(G.MONTO,0) ELSE 0 END) as APORTE
						FROM
							NPHOJINT C,
							NPASICAREMP B,
							NPCATPRE D,
							NPESTORG E,
							NPHISCON G,
							NPDEFCPT H,
							NPTIPGAS A,
							npnomina F
						WHERE
							(B.CODNOM) = RTRIM('".$this->tipnom."') AND
							C.CODEMP >= RTRIM('".$this->codempdes."') AND
							C.CODEMP <= RTRIM('".$this->codemphas."') AND
							B.CODCAR >= RTRIM('".$this->codcardes."') AND
							B.CODCAR <= RTRIM('".$this->codcarhas."') AND
                             G.especial='".$this->especial."' AND
							B.STATUS='V' AND
							G.CODCON>='".$this->codcondes."' AND
							G.CODCON<='".$this->codconhas."' AND
							C.CODEMP=B.CODEMP AND
							B.CODEMP=G.CODEMP AND
							B.CODCAR=G.CODCAR AND
							B.CODNOM=G.CODNOM AND
							B.CODCAT=D.CODCAT AND
							B.CODTIPGAS=A.CODTIPGAS AND
							B.CODNOM=F.CODNOM AND
							C.CODNIV=E.CODNIV AND
							G.CODCON=H.CODCON and G.CODCON<>'006' and
		      g.fecnomdes>=to_date('".$this->fechades."','dd/mm/yyyy') and
			  g.fecnom<=to_date('".$this->fechahas."','dd/mm/yyyy')
						ORDER BY
							a.codtipgas,b.codcat,C.CODEMP";
//print '<pre>'; print $this->sql; exit;
			$this->tb=$this->bd->select($this->sql);

		}
		function Footer(){
			    $this->ln(15);
				$this->line(10,$this->getY(),200,$this->getY());
				$this->cell(190,5,'RECIBI CONFORME',0,0,'C');
				$this->ln();
				$this->cell(190,5,'FECHA:   /    /    /',0,0,'C');

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s");
			$this->setFont("Arial","B",8);
			//$rs=$this->bd->select("select upper(nomnom) as nombre from NPASICAREMP where codnom='".$this->tipnom."'");
			if(!$this->tb->EOF)
			{
				$this->nombre=$this->tb->fields["nomnom"];
			}
		    $sr=$this->bd->select("SELECT frecal, numsem, to_char(ULTFEC,'dd/mm/yyyy') as FECHA,to_char(PROFEC,'dd/mm/yyyy') as FECHA2 FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnom."',3,' ')");
			if(!$sr->EOF)
			{
				if($sr->fields["frecal"]=='S')
				{
					$band=true;
					$fechasem=$sr->fields["numsem"];

				}
				$fechad=$sr->fields["fecha"];
				$fechah=$sr->fields["fecha2"];

			}
			$this->cell(85,5,'NOMINA: '.$this->tipnom.' - '.$this->nombre);
			 $this->cell(60,5,'PERIODO DEL: '.$this->fechades.' AL '.$this->fechahas);
			if($band==true)
			{
				$this->cell(40,5,'SEMANA Nro: '.$fechasem);
			}
			$this->ln(5);

		}

		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
			//$tba=$this->bd->select($this->sqla);
		    $tb=$this->tb;

			$ref=$tb->fields["codemp"];
			$cat=$tb->fields["codcat"];
			$refgas="";
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$totacum1=0;
			$totacum2=0;
			$totacum3=0;
			$acumulado=0;
			$cont=0;
			$contador=0;
			$total1=0;
			$total2=0;
			$total3=0;
			$neto=0;
			$totalneto=0;
			$cond=false;

			while (!$tb->EOF) // while primerito
			{

				if($refgas!=$tb->fields["codtipgas"])
				{
					if($tb->fields["codemp"]!=$ref)
					{
						 $this->setFont("Arial","B",8);
						 $this->ln(2);
						 $this->line(100,$this->getY(),200,$this->getY());
						 //totales
						 $cont=$cont+1;
						 $this->cell(20,5,'');
						 $this->cell(75,5,'Totales Bs.',0,0,'R');
						 $this->cell(10,5,'');
						 $this->cell(30,5,number_format($acum1,2,'.',','));
						 $this->cell(30,5,number_format($acum2,2,'.',','));
						 $this->cell(30,5,number_format($acum3,2,'.',','));
						 $totacum1=$totacum1+$acum1;
						 $totacum2=$totacum2+$acum2;
						 $totacum3=$totacum3+$acum3;
						 $this->ln(4);
						 $this->cell(20,5,'');
						 $this->cell(75,5,'Neto a Cobrar Bs.',0,0,'R');
						 $this->cell(10,3,'');
						 $this->SetFillColor(195,195,195);
						 $this->cell(30,3,number_format(($acum1-$acum2),2,'.',','),0,0,'');
						 $neto=$neto+$acum1-$acum2;
						 $this->SetFillColor(0,0,0);
						 $this->cell(30,5,'');
						 $this->ln(5);
						 $acum1=0;
						 $acum2=0;
						 $this->addpage();
						 $acum3=0;
					 }//
					 if($tb->fields["codcat"]!=$cat)
					 {
						$this->line(10,$this->getY(),200,$this->getY());
					// 	$this->cell(95,5,'TOTAL:  '.ucwords($nomcat));
					 //	$this->cell(30,5,number_format($totacum1,2,'.',','));
					// 	$this->cell(30,5,number_format($totacum2,2,'.',','));
					// 	$this->cell(30,5,number_format($totacum3,2,'.',','));
						$total1=$total1+$totacum1;
						$total2=$total2+$totacum2;
					//	$total3=$total3+$totacum3;
					 	$totacum1=0;
					 	$totacum2=0;
					 //	$totacum3=0;
					 	//
					 	$acumulado=0;
					//	$this->ln(4);
					//	$this->line(10,$this->getY(),200,$this->getY());
					// 	$this->cell(110,5,'CANTIDAD DE TRABAJADORES: '.$cont);
						$cont=0;
					 	//$this->cell(50,5,'TOTAL A PAGAR: '.number_format($neto,2,'.',','));
						$totalneto=$totalneto+$neto;
						$neto=0;
					//	$this->ln(4);
					//	$this->line(10,$this->getY(),200,$this->getY());
					 	$this->ln(8);
					 	//$this->cell(80,5,$tb->fields["codcat"].' '.strtoupper($tb->fields["nomcat"]));
					 	$nomcat=$tb->fields["nomcat"];
					// 	$this->ln(5);
					 }



					$this->SetX(10);
					//$this->ln(5);
					$this->SetTextColor(0,0,128);
					//$this->cell(5,5,"TIPO DE GASTO:   ".$tb->fields["codtipgas"]."   ".$tb->fields["destipgas"]);
					$this->SetTextColor(0,0,0);
				//	$this->ln(5);

					$contador=$contador+1;
					 $cont=1;
					 $this->setFont("Arial","B",8);
					// $this->cell(80,5,$tb->fields["codcat"].' '.strtoupper($tb->fields["nomcat"]));
					 $this->cell(80,5,'NIVEL ORGANIZACIONAL: '.$tb->fields["desniv"]);
					 $nomcat=$tb->fields["nomcat"];
					 $this->ln(5);
					 $this->line(10,$this->getY(),200,$this->getY());
					// $this->ln(2);
					 $this->SetFillColor(195,195,195);
					 $this->cell(20,3,'Cédula',0,0,'');
					 $this->cell(70,3,'Apellidos y Nombres',0,0,'');
					 $this->cell(20,3,'Fecha Ingreso',0,0,'');
					 $this->cell(30,3,'C.Cargo',0,0,'');
					 $this->cell(50,3,'Descripción del Cargo',0,0,'');
					 $this->SetFillColor(0,0,0);
					 $this->ln(4);
					 $this->line(10,$this->getY(),200,$this->getY());
					 $this->setFont("Arial","",8);
					 $this->cell(20,5,$tb->fields["codemp"]);
					 $this->cell(70,5,$tb->fields["nomemp"]);
					 $this->cell(20,5,$tb->fields["fecing"]);
					 $this->cell(30,5,$tb->fields["codcar"]);
					 $this->cell(50,5,$tb->fields["nomcar"]);
					 $this->ln(5);
					 //$this->line(10,$this->getY(),200,$this->getY());
					 $this->setFont("Arial","BU",8);
					 $this->cell(20,5,'Código');
					 $this->cell(85,5,'Nombre del Concepto');
					 $this->cell(30,5,'Asignaciones');
					 $this->cell(30,5,'Deducciones');
				     $this->cell(30,5,'Aportes');
					// $this->cell(30,5,'Aporte');
					 $this->ln(4);

				}elseif($ref!=$tb->fields["codemp"] || $cat!=$tb->fields["codcat"])
				{
					if($tb->fields["codemp"]!=$ref)
					{
					 $this->setFont("Arial","B",8);
					 $this->ln(2);
					 $this->line(100,$this->getY(),200,$this->getY());
					 //totales
					 $cont=$cont+1;
					 $this->cell(20,5,'');
					 $this->cell(75,5,'Totales Bs.',0,0,'R');
					 $this->cell(10,5,'');
					 $this->cell(30,5,number_format($acum1,2,'.',','));
					 $this->cell(30,5,number_format($acum2,2,'.',','));
					 $this->cell(30,5,number_format($acum3,2,'.',','));
					 $totacum1=$totacum1+$acum1;
					 $totacum2=$totacum2+$acum2;
					 $totacum3=$totacum3+$acum3;
					 $this->ln(4);
					 $this->cell(20,5,'');
					 $this->cell(75,5,'Neto a Cobrar Bs.',0,0,'R');
					 $this->cell(10,3,'');
					 $this->SetFillColor(195,195,195);
					 $this->cell(30,3,number_format(($acum1-$acum2),2,'.',','),0,0,'');
					 $neto=$neto+$acum1-$acum2;
					 $this->SetFillColor(0,0,0);
					 $this->cell(30,5,'');
					 $this->ln(5);
					 $acum1=0;
					 $acum2=0;
					 $acum3=0;
				 $this->addpage();
					 //
					}
					 if($tb->fields["codcat"]!=$cat)
					 {
						$this->line(10,$this->getY(),200,$this->getY());
					// 	$this->cell(95,5,'TOTAL:  '.ucwords($nomcat));
				//	 	$this->cell(30,5,number_format($totacum1,2,'.',','));
				//	 	$this->cell(30,5,number_format($totacum2,2,'.',','));
				//	 	$this->cell(30,5,number_format($totacum3,2,'.',','));
						$total1=$total1+$totacum1;
						$total2=$total2+$totacum2;
					//	$total3=$total3+$totacum3;
					 	$totacum1=0;
					 	$totacum2=0;
					 //	$totacum3=0;
					 	//
					 	$acumulado=0;
					//	$this->ln(4);
					//	$this->line(10,$this->getY(),200,$this->getY());
					// 	$this->cell(110,5,'CANTIDAD DE TRABAJADORES: '.$cont);
						$cont=0;
					 	//$this->cell(50,5,'TOTAL A PAGAR: '.number_format($neto,2,'.',','));
						$totalneto=$totalneto+$neto;
						$neto=0;
					//	$this->ln(4);
					//	$this->line(10,$this->getY(),200,$this->getY());
					 	$this->ln(8);
					 	//$this->cell(80,5,$tb->fields["codcat"].' '.strtoupper($tb->fields["nomcat"]));
					 	$nomcat=$tb->fields["nomcat"];
					 //	$this->ln(5);
					 }

					 $contador=$contador+1;
					 $cont=1;
					 $this->setFont("Arial","B",8);
				//	 $this->cell(80,5,$tb->fields["codcat"].' '.strtoupper($tb->fields["nomcat"]));
				$this->cell(80,5,'NIVEL ORGANIZACIONAL: '.$tb->fields["desniv"]);
					 $nomcat=$tb->fields["nomcat"];
					 $this->ln(5);
					 $this->line(10,$this->getY(),200,$this->getY());
					 $this->ln(2);
					 $this->SetFillColor(195,195,195);
					 $this->cell(20,3,'Cédula',0,0,'');
					 $this->cell(70,3,'Apellidos y Nombres',0,0,'');
					 $this->cell(20,3,'Fecha Ingreso',0,0,'');
					 $this->cell(30,3,'C.Cargo',0,0,'');
					 $this->cell(50,3,'Descripción del Cargo',0,0,'');
					 $this->SetFillColor(0,0,0);
					 $this->ln(4);
					 $this->line(10,$this->getY(),200,$this->getY());
					 $this->setFont("Arial","",8);
					 $this->cell(20,5,$tb->fields["codemp"]);
					 $this->cell(70,5,$tb->fields["nomemp"]);
					 $this->cell(20,5,$tb->fields["fecing"]);
					 $this->cell(30,5,$tb->fields["codcar"]);
					 $this->cell(50,5,$tb->fields["nomcar"]);
					 $this->ln(5);
					 //$this->line(10,$this->getY(),200,$this->getY());
					 $this->setFont("Arial","BU",8);
					 $this->cell(20,5,'Código');
					 $this->cell(85,5,'Nombre del Concepto');
					 $this->cell(30,5,'Asignaciones');
					 $this->cell(30,5,'Deducciones');
					 $this->cell(30,5,'Aporte');
					// $this->cell(30,5,'Aporte');
					 $this->ln(4);
					 //$this->line(10,$this->getY(),200,$this->getY());
				}
				 $this->setFont("Arial","",8);
				 $this->cell(20,5,$tb->fields["codcon"]);
				 $this->cell(85,5,"");
				 $this->cell(30,5,number_format($tb->fields["asigna"],2,'.',','));
				 $acum1=$acum1+$tb->fields["asigna"];
				 $this->cell(30,5,number_format($tb->fields["deduc"],2,'.',','));
				 $acum2=$acum2+$tb->fields["deduc"];
				 $this->cell(30,5,number_format($tb->fields["aporte"],2,'.',','));
				 $this->setx(30);
                 $this->multicell(85,3,$tb->fields["nomcon"]);
				 $acum3=$acum3+$tb->fields["aporte"];
				 $ref=$tb->fields["codemp"];
				 $cat=$tb->fields["codcat"];
				 $refgas=$tb->fields["codtipgas"];
				 $tb->MoveNext();
			   //  $this->ln(3);
			}
				 $this->setFont("Arial","B",8);
				 $this->ln(2);
				 $this->line(100,$this->getY(),200,$this->getY());

				 //totales
				 $this->cell(20,5,'');
				 $this->cell(75,5,'Totales Bs.',0,0,'R');
				 $this->cell(10,5,' ');
				 $this->cell(30,5,number_format($acum1,2,'.',','));
				$this->cell(30,5,number_format($acum2,2,'.',','));
				 $this->cell(30,5,number_format($acum3,2,'.',','));
				 $totacum1=$totacum1+$acum1;
				 $totacum2=$totacum2+$acum2;
				 $totacum3=$totacum3+$acum3;
				 $this->ln(4);
				 $this->cell(20,5,'');
				 $this->cell(75,5,'Neto a Cobrar Bs.',0,0,'R');
				 $this->cell(10,3,'');
				 $this->SetFillColor(195,195,195);
				 $this->cell(30,3,number_format(($acum1-$acum2),2,'.',','),0,0,'');
				 $neto=$neto+($acum1-$acum2);
				 $this->SetFillColor(0,0,0);
				 $this->cell(30,5,'');
			//	 $this->ln(5);
				// $this->line(10,$this->getY(),200,$this->getY());
			//	 $this->cell(95,5,'TOTAL:  '.$nomcat);
				// $this->cell(30,5,number_format($totacum1,2,'.',','));
				 $acum1=0;
				// $this->cell(30,5,number_format($totacum2,2,'.',','));
				 $acum2=0;
				 //$this->cell(30,5,number_format($totacum3,2,'.',','));
				 $total1=$total1+$totacum1;
				 $total2=$total2+$totacum2;
				// $total3=$total3+$totacum3;
				 $totacum1=0;
				 $totacum2=0;
				// $totacum3=0;
				// $this->ln(4);
				// $this->line(10,$this->getY(),200,$this->getY());
			//	 $this->cell(110,5,'CANTIDAD DE TRABAJADORES: '.($cont));
				 $cont=0;
				 //$this->cell(50,5,'TOTAL A PAGAR: '.number_format($neto,2,'.',','));
				 $totalneto=$totalneto+$neto;
				 //$neto=0;
				// $this->ln(4);
			//	 $this->line(10,$this->getY(),200,$this->getY());
				// $this->ln(8);
			//	 $this->cell(95,5,'TOTAL NOMINA:  '.$this->nombre);
			//	 $this->cell(30,5,number_format($total1,2,'.',','));
				 $acum1=0;
			//	 $this->cell(30,5,number_format($total2,2,'.',','));
				 $acum2=0;
				// $this->cell(30,5,number_format($total3,2,'.',','));
				// $this->ln(4);
			//	 $this->line(10,$this->getY(),200,$this->getY());
			//	 $this->cell(110,5,'TOTAL DE TRABAJADORES: '.($contador));
				 //$contador=0;
				 //$this->cell(50,5,'TOTAL A PAGAR: '.number_format($totalneto,2,'.',','));
				// $this->ln(4);
			//	 $this->line(10,$this->getY(),200,$this->getY());
				// $this->ln(5);
				 $this->setFont("Arial","BU",8);
			//	 $this->cell(150,5,$this->elaborado);
			//	 $this->cell(50,5,$this->revisado);
			//	 $this->ln(3);
				 $this->setFont("Arial","B",8);
			//	 $this->cell(150,5,'						Elaborado Por');
			//	 $this->cell(50,5,'							Revisado Por');
				// $this->ln(3);
				 $this->setFont("Arial","BU",8);
				// $this->cell(110,5,$this->autorizado,0,0,'R');
				// $this->ln(3);
				 $this->setFont("Arial","B",8);
			//	 $this->cell(110,5,'Autorizado Por						',0,0,'R');
			//	 $this->ln(8);
		}
	}
?>