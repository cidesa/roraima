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
		var $sql3;
		var $sql4;
		var $sql5;
		var $sql6;
		var $numcue;
		var $antlib;
		var $salant;
		var $sal;
		var $rep;
		var $numero;
		var $cab;
		var $fecha1;
		var $fecha2;
		var $cta1;
		var $cta2;
		var $mov1;
		var $mov2;
		var $ref1;
		var $ref2;
		var $fechat1;
		var $fechat2;
		var $fecham1;
		var $fecham2;
		var $deb;
		var $cre;
		var $mes;
		var $status;
		var $auxd=0;
		var $car;
		var $acumsalant=0;
		var $acumdeb=0;
		var $acumcre=0;
		var $acumseg=0;
		var $cont=0;
		var $cont2=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
		    $this->cta1=$_POST["numcuedes"];
		    $this->cta2=$_POST["numcuehas"];
			$this->mov1=$_POST["tipmovdes"];
			$this->mov2=$_POST["tipmovhas"];
			$this->ref1=$_POST["referedes"];
			$this->ref2=$_POST["referehas"];
			$this->fechat1=$_POST["fecmovdes"];
			$this->fechat2=$_POST["fecmovhas"];
			$this->fecham1=$_POST["fectrades"];
			$this->fecham2=$_POST["fectrahas"];
			$this->status=strtoupper($_POST["stamov"]);
			$this->sta=strtoupper($_POST["sta"]);
				$this->sql="select a.numcue,a.nomcue,a.antlib,a.tipmon
						from tsdefban a
						where (a.numcue) >= rpad('".$this->cta1."',20,' ') and (a.numcue) <= rpad('".$this->cta2."',20,' ')
						order by a.numcue";//print $this->sql;exit;

		$this->arrp=$tb=$this->bd->select($this->sql);

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Cuenta";
				$this->titulos[2]="Uso";
				$this->titulos[3]="Saldo Anterior";
				$this->titulos[4]="Debitos";
				$this->titulos[5]="Creditos";
				$this->titulos[6]="Saldo Segun Libros";

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			/*for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln();
			/*for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}*/
			$this->ln();
			//$this->Line(10,50,270,50);

		}
		function Cuerpo()
		{
			$tb=$this->bd->select($this->sql);
			$this->bd->validar();
			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,128);
			while (!$tb->EOF)
			{

			$Y=$this->Gety();

			if ($Y>=230)
				{
				$this->Addpage();
				$this->SetY(45);
				}
			$this->numcue=$tb->fields["numcue"];
		    $this->antlib=$tb->fields["antlib"];
			$this->SetTextColor(0,0,128);
			$this->setFont("Arial","B",8);
			$this->cell(12,5,"Banco");
			$this->cell(110,5,substr(strtoupper($tb->fields["nomcue"]),0,100));
			$this->cell(20,5,"Nro. Cuenta");
			$this->cell(100,5,$tb->fields["numcue"]);
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->SetTextColor(0,0,0);
			$this->ln();
			$this->cell(8,5,"Tipo");
			$this->cell(20,5,"Referencia");
			//$this->cell(25,5,"Beneficiario");
			$this->cell(50,5,"Descripción");
			$this->cell(20,5,"Status");
			$this->cell(15,5,"Fecha");
			$this->cell(30,5,"Debitos");
			$this->cell(22,5,"Creditos");
			$this->cell(30,5,"Saldo Actual");
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->ln();

			//------------------------------------------------------------------
			$this->sql2="SELECT coalesce(B.MONMOV,0) as mon, a.debcre as debcre
				FROM TSTIPMOV A, TSMOVLIB B, CONTABA C
			    WHERE (A.CODTIP) = (B.TIPMOV) AND
		        RPAD(B.NUMCUE,20,' ') = RPAD('".$this->numcue."',20,' ') AND C.CODEMP='001' AND
         		B.FECLIB<to_date('".$this->fecham1."','dd/mm/yyyy') AND B.FECLIB>=C.FECINI";//print $this->sql2;exit;
				$tb2=$this->bd->select($this->sql2);
				$this->deb=0;
				$this->cre=0;

				while (!$tb2->EOF)
				{
				if ($Y>=230)
				{
				$this->Addpage();
				$this->SetY(45);
				}

					if (strtoupper($tb2->fields["debcre"])=='D')
					{
						$this->deb=$this->deb+$tb2->fields["mon"];
					}
					if (strtoupper($tb2->fields["debcre"])=='C')
					{
						$this->cre=$this->cre+$tb2->fields["mon"];
					}
				$tb2->MoveNext();
				}
				$this->salant=$this->antlib+$this->deb-$this->cre;
				$this->setFont("Arial","B",7);
				$this->cell(135,5,"");
				$this->cell(30,5,"Saldo Anterior...");
				$this->setFont("Arial","",7);
				$this->SetX(170);
				$this->cell(30,5,number_format($this->salant,2,'.',','),0,0,'R');
			//-------------------------------------------------------
			$this->ln();
			if ($this->sta=='T')
			{
				 $status='';
			}
			elseif($this->sta=='N')
			{  //  $especial="(A.especial IS NULL OR  A.especial='N') and ";

				 $status="and b.stacon='N'";
			}
			elseif ($this->sta=='C')
			{//print "hola";exit;
				 $status="and b.stacon='C'";
			}

			if (strtoupper($this->status)=='T')
			{
			$this->sql3="select  a.numcue,(b.tipmov) as tipmov,to_char(b.feclib,'dd/mm/yyyy') as feclib,c.orden,b.reflib,b.deslib,c.destip,
					substr(to_char(b.feclib,'dd/mm/yyyy'),4,2) as mes,
					b.status, b.stacon, coalesce(b.monmov,0) as mon, c.debcre
					from tsdefban a, tsmovlib b, tstipmov c
					where (a.numcue)=(b.numcue) and (b.tipmov)=(c.codtip) and
					RPAD(b.numcue,20,' ') = RPAD('".$this->numcue."',20,' ') and
					trim(b.tipmov) >= trim('".$this->mov1."')  and trim(b.tipmov) <= trim('".$this->mov2."') and
					(b.feclib >= to_date('".$this->fecham1."','dd/mm/yyyy')) and (b.feclib <= to_date('".$this->fecham2."','dd/mm/yyyy')) and
					rpad(b.reflib,20,' ') >= rpad('".$this->ref1."',20,' ') and rpad(b.reflib,20,' ') <= rpad('".$this->ref2."',20,' ') ".$status."
					order by b.stacon,b.feclib";//print $this->sql3;exit;
					//b.status<>'a'
			}
			if ((strtoupper($this->status)=='A')||(strtoupper($this->status)=='C')||(strtoupper($this->status)=='N'))
			{
			$this->sql3="select  a.numcue,(b.tipmov) as tipmov,to_char(b.feclib,'dd/mm/yyyy') as feclib,c.orden,b.reflib,b.deslib,c.destip,
					substr(to_char(b.feclib,'dd/mm/yyyy'),4,2) as mes,
					b.status, b.stacon, coalesce(b.monmov,0) as mon, c.debcre
					from tsdefban a, tsmovlib b, tstipmov c
					where (a.numcue)=(b.numcue) and (b.tipmov)=(c.codtip) and
					RPAD(b.numcue,20,' ') = RPAD('".$this->numcue."',20,' ') and
					trim(b.tipmov) >= trim('".$this->mov1."')  and trim(b.tipmov) <= trim('".$this->mov2."') and
					(b.feclib >= to_date('".$this->fecham1."','dd/mm/yyyy')) and (b.feclib <= to_date('".$this->fecham2."','dd/mm/yyyy')) and
					rpad(b.reflib,20,' ') >= rpad('".$this->ref1."',20,' ') and rpad(b.reflib,20,' ') <= rpad('".$this->ref2."',20,' ')
					".$status."
					order by b.stacon,b.feclib";
			}
			if (strtoupper($this->status)=='TA')
			{
			$this->sql3="select  d.refsult,a.numcue,(b.tipmov) as tipmov,to_char(b.feclib,'dd/mm/yyyy') as feclib,c.orden,b.reflib,b.deslib,c.destip,
					substr(to_char(b.feclib,'dd/mm/yyyy'),4,2) as mes,
					b.status, b.stacon, coalesce(b.monmov,0) as mon, c.debcre
					from tsdefban a, tsmovlib b, tstipmov c, tsconcil d
					where (a.numcue)=(b.numcue) and (b.tipmov)=(c.codtip) and
					RPAD(b.numcue,20,' ') = RPAD('".$this->numcue."',20,' ') and
					trim(b.tipmov) >= trim('".$this->mov1."')  and trim(b.tipmov) <= trim('".$this->mov2."') and
					(b.feclib >= to_date('".$this->fecham1."','dd/mm/yyyy')) and (b.feclib <= to_date('".$this->fecham2."','dd/mm/yyyy')) and
					rpad(b.reflib,20,' ') >= rpad('".$this->ref1."',20,' ') and rpad(b.reflib,20,' ') <= rpad('".$this->ref2."',20,' ') and
					b.status<>'A' ".$status."
					order by b.stacon,b.feclib";
			}
					$tb3=$this->bd->select($this->sql3);
					$this->setFont("Arial","",7);
					if (!$tb3->EOF)
					{
					$ref=$tb3->fields["mes"];
					$this->mes=$tb3->fields["mes"];
					}
					while (!$tb3->EOF)
					{

					if ($tb3->fields["mes"]!=$ref)
					{
# Verifivar que el reporte de movimientos segun libros filtre por el tipo de movimiento
# Reporte de movimientos según libros donde se muestren totales por tipo de movimiento, primero los movimientos que suman al saldo y después los movimientos que restan y al final el saldo actual.
						$this->Line(58,$this->GetY(),200,$this->GetY());
						$this->cell(50,5,"");
						$this->setFont("Arial","B",7);
						$this->cell(35,5,"Cantidad de Movimientos");
						$this->setFont("Arial","",7);
						$this->cell(23,5,$this->cont);
						$this->SetX(110);
						$this->cell(30,5,number_format($this->acumdeb,2,'.',','),0,0,'R');
						$this->SetX(140);
						$this->cell(30,5,number_format($this->acumcre,2,'.',','),0,0,'R');
						$this->cont=0;
						$this->acumdeb=0;
						$this->acumcre=0;
						$this->ln();
							//-----------------------
							$this->sql4="select substr(to_char(a.feclib,'dd/mm/yyyy'),4,2) as mesmov,
									a.tipmov as tipo, b.destip as descripcion, count(a.reflib) as cuantos,
									coalesce(a.monmov,0) as mon, b.debcre
									from tsmovlib a,tstipmov b
									where  a.tipmov = b.codtip and
									(substr(to_char(a.feclib,'dd/mm/yyyy'),4,2))= '".$this->mes."' and
									trim(a.tipmov) >= trim('".$this->mov1."')  and trim(a.tipmov) <= trim('".$this->mov2."') and
									RPAD(a.numcue,20,' ') = RPAD('".$this->numcue."',20,' ')
									group by a.tipmov,substr(to_char(a.feclib,'dd/mm/yyyy'),4,2), b.destip,a.reflib,a.monmov,b.debcre order by b.debcre desc";//print $this->sql4;exit;
							$tb4=$this->bd->select($this->sql4);
							$tb4x=$this->bd->select($this->sql4);
							$tb4y=$this->bd->select($this->sql4);
							$deb=0;
							$cre=0;
							$this->setFont("Arial","B",7);
							$this->cell(5,5,"");
							$this->cell(27,5,"Totales por Mes");
							if ($tb4y->fields["mesmov"]=='01'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  ENERO");}
							if ($tb4y->fields["mesmov"]=='02'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  FEBRERO");}
							if ($tb4y->fields["mesmov"]=='03'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  MARZO");}
							if ($tb4y->fields["mesmov"]=='04'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  ABRIL");}
							if ($tb4y->fields["mesmov"]=='05'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  MAYO");}
							if ($tb4y->fields["mesmov"]=='06'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  JUNIO");}
							if ($tb4y->fields["mesmov"]=='07'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  JULIO");}
							if ($tb4y->fields["mesmov"]=='08'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  AGOSTO");}
							if ($tb4y->fields["mesmov"]=='09'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  SEPTIEMBRE");}
							if ($tb4y->fields["mesmov"]=='10'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  OCTUBRE");}
							if ($tb4y->fields["mesmov"]=='11'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  NOVIEMBRE");}
							if ($tb4y->fields["mesmov"]=='12'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  DICIEMBRE");}
							$this->ln();
							$this->cell(15,5,"");
							$this->cell(45,5,"Tipo de Movimiento");
							$this->cell(35,5,"Cantidad");
							$this->cell(35,5,"Debito");
							$this->cell(35,5,"Credito");
							$this->ln();
							$this->setFont("Arial","",7);
							if(!$tb4x->EOF)
							{
							$ref2=$tb4x->fields["tipo"];
							}
							while (!$tb4->EOF)
							{//print "hola";exit;
								if($tb4->fields["tipo"]!=$ref2)
								{
								$this->cell(60,5,$des);
								$this->cell(35,5,$this->cont);
								$this->SetX(90);
								$this->cell(35,5,number_format($deb,2,'.',','),0,0,'R');
								$this->SetX(120);
								$this->cell(35,5,number_format($cre,2,'.',','),0,0,'R');
								$this->cont=0;
								$deb=0;
								$cre=0;
								$this->ln();
								}
								$this->cont=$this->cont+1;
								$ref2=$tb4->fields["tipo"];
								$des=$tb4->fields["descripcion"];

								if (strtoupper($tb4->fields["debcre"])=='D')
								{
									$deb=$deb+$tb4->fields["mon"];
									$cre=$cre+0;
								}
								elseif (strtoupper($tb4->fields["debcre"])=='C')
								{
									$cre=$cre+$tb4->fields["mon"];
									$deb=$deb+0;
								}
							$tb4->MoveNext();
							}
							$this->cell(60,5,$des);
							$this->cell(35,5,$this->cont);
							$this->SetX(90);
							$this->cell(35,5,number_format($deb,2,'.',','),0,0,'R');
							$this->SetX(120);
							$this->cell(35,5,number_format($cre,2,'.',','),0,0,'R');
							$this->ln();
								if($tb4->EOF)
								{
									$this->cell(60,5,"SALDO ACTUAL");
									$this->line(100,$this->GetY(),190,$this->GetY());
									$this->SetX(150);
									$this->cell(35,5,number_format($this->salant,2,'.',','),0,0,'R');
									$this->ln();
								}
							$this->ln();
							$this->Line(10,$this->GetY(),200,$this->GetY());
							$this->Line(10,$this->GetY()-1,200,$this->GetY()-1);
							$this->cont=0;
							//-----------------------
					}
					//detalle

			$this->sqlJ="select result from tsconcil where trim(refere)=trim('".$tb3->fields["reflib"]."')";
							$tbJ=$this->bd->select($this->sqlJ);

						$this->cont=$this->cont+1;
						$ref=$tb3->fields["mes"];
						$this->mes=$tb3->fields["mes"];
						$this->cell(8,5,$tb3->fields["tipmov"]);
						$this->cell(20,5,$tb3->fields["reflib"]);
						//$this->cell(25,5,"beneficiario");
						$this->cell(48,5,substr($tb3->fields["deslib"],0,30));
						if (trim($tbJ->fields["result"])=='CONCILIADO')
						{
						$this->cell(20,5,substr(substr($tbJ->fields["result"],0,10),0,30));
						}
						else
						{
						$this->cell(20,5,substr(substr('TRÁNSITO',0,10),0,30));
						}
						$this->cell(15,5,$tb3->fields["feclib"]);

						if (strtoupper($tb3->fields["debcre"])=='D'){
						$this->Setx(110);
						$this->cell(30,5,number_format($tb3->fields["mon"],2,'.',','),0,0,'R');
						$this->cell(30,5);
						$deb=$tb3->fields["mon"];
						$cre=0;
						$this->acumdeb=$this->acumdeb+$tb3->fields["mon"];
						}
						else
						{
						//$this->cell(30,5,0);
						$this->Setx(140);
						$this->cell(30,5,number_format($tb3->fields["mon"],2,'.',','),0,0,'R');
						$this->acumcre=$this->acumcre+$tb3->fields["mon"];
						$deb=0;
						$cre=$tb3->fields["mon"];
						}

						$this->sal=$this->salant+$deb-$cre;
						$this->Setx(165);
						$this->cell(30,5,number_format($this->sal,2,'.',','),0,0,'R');
						$this->salant=$this->sal;
						$this->ln();
					//----------------------------------------------------------------
					$tb3->MoveNext();
					}
						$this->Line(58,$this->GetY(),200,$this->GetY());
						$this->cell(50,5,"");
						$this->setFont("Arial","B",7);
						$this->cell(35,5,"Cantidad de Movimientos");
						$this->setFont("Arial","",7);
						$this->cell(23,5,$this->cont);
						$this->SetX(110);
						$this->cell(30,5,number_format($this->acumdeb,2,'.',','),0,0,'R');
						$this->SetX(140);
						$this->cell(30,5,number_format($this->acumcre,2,'.',','),0,0,'R');
						$this->ln();
					//-----------------------
							$this->sql4="select substr(to_char(a.feclib,'dd/mm/yyyy'),4,2) as mesmov,
									a.tipmov as tipo, b.destip as descripcion, count(a.reflib) as cuantos,
									coalesce(a.monmov,0) as mon, b.debcre
									from tsmovlib a,tstipmov b
									where  a.tipmov = b.codtip and
									(substr(to_char(a.feclib,'dd/mm/yyyy'),4,2))= '".$this->mes."' and
									trim(a.tipmov) >= trim('".$this->mov1."')  and trim(a.tipmov) <= trim('".$this->mov2."') and
									RPAD(a.numcue,20,' ') = RPAD('".$this->numcue."',20,' ')
									group by a.tipmov,substr(to_char(a.feclib,'dd/mm/yyyy'),4,2), b.destip,a.reflib,a.monmov,b.debcre order by b.debcre desc";
							$tb4y=$tb4x=$tb4=$this->bd->select($this->sql4);
							$deb=0;
							$cre=0;
							$this->setFont("Arial","B",7);
							$this->cell(5,5,"");
							$this->cell(27,5,"Totales por Mes");
							if ($tb4y->fields["mesmov"]=='01'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  ENERO");}
							if ($tb4y->fields["mesmov"]=='02'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  FEBRERO");}
							if ($tb4y->fields["mesmov"]=='03'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  MARZO");}
							if ($tb4y->fields["mesmov"]=='04'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  ABRIL");}
							if ($tb4y->fields["mesmov"]=='05'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  MAYO");}
							if ($tb4y->fields["mesmov"]=='06'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  JUNIO");}
							if ($tb4y->fields["mesmov"]=='07'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  JULIO");}
							if ($tb4y->fields["mesmov"]=='08'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  AGOSTO");}
							if ($tb4y->fields["mesmov"]=='09'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  SEPTIEMBRE");}
							if ($tb4y->fields["mesmov"]=='10'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  OCTUBRE");}
							if ($tb4y->fields["mesmov"]=='11'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  NOVIEMBRE");}
							if ($tb4y->fields["mesmov"]=='12'){$this->cell(10,5,$tb4y->fields["mesmov"]." -  DICIEMBRE");}
							$this->ln();
							$this->cell(15,5,"");
							$this->cell(45,5,"Tipo de Movimiento");
							$this->cell(35,5,"Cantidad");
							$this->cell(35,5,"Debito");
							$this->cell(35,5,"Credito");
							$this->ln();
							$this->setFont("Arial","",7);
							if(!$tb4x->EOF)
							{
							$ref2=$tb4x->fields["tipo"];
							}
							/*********************/
							$this->cont=0;

					$this->sqlM="select count(numcue) as numcue from tsconcil where trim(numcue)=trim('".$this->numcue."') and trim(result)<>'CONCILIADO'";
							$tbM=$this->bd->select($this->sqlM);


								$this->cell(60,5,"MOVIMIENTOS EN TRÁNSITO");
								$this->cell(35,5,$tbM->fields["numcue"]);
								$this->ln(4);
							while (!$tb4->EOF)
							{

								if($tb4->fields["tipo"]!=$ref2)
								{
								$this->cell(60,5,$des);
								$this->cell(35,5,$this->cont);
								$this->Setx(90);
								$this->cell(35,5,number_format($deb,2,'.',','),0,0,'R');
								$this->Setx(120);
								$this->cell(35,5,number_format($cre,2,'.',','),0,0,'R');
								$this->cont=0;
								$deb=0;
								$cre=0;
								$this->ln();
								}
								$this->cont=$this->cont+1;
								$ref2=$tb4->fields["tipo"];
								$des=$tb4->fields["descripcion"];

								if (strtoupper($tb4->fields["debcre"])=='D')
								{
									$deb=$deb+$tb4->fields["mon"];
									$cre=$cre+0;
								}
								else
								{
									$cre=$cre+$tb4->fields["mon"];
									$deb=$deb+0;
								}
							$tb4->MoveNext();
							}

							$this->cell(60,5,$des);
							$this->cell(35,5,$this->cont);
							$this->SetX(90);
							$this->cell(35,5,number_format($deb,2,'.',','),0,0,'R');
							$this->SetX(120);
							$this->cell(35,5,number_format($cre,2,'.',','),0,0,'R');
							$this->ln();
								if($tb4->EOF)
								{
									$this->cell(60,5,"SALDO ACTUAL");
									$this->line(100,$this->GetY(),190,$this->GetY());
									$this->SetX(150);
									$this->cell(35,5,number_format($this->salant,2,'.',','),0,0,'R');
									$this->ln();
								}
							$this->Line(10,$this->GetY(),200,$this->GetY());
							$this->cell(87,5,"");
							$this->cell(16,5,"TOTALES");
							$this->sql5="select sum(a.monmov) as mondeb
										from tsmovlib a,tstipmov b
										where a.tipmov=b.codtip and
										rpad(a.numcue,20,' ')=rpad('".$this->numcue."',20,' ') and
										b.debcre='D' and
										trim(a.tipmov) >= trim('".$this->mov1."')  and trim(a.tipmov) <= trim('".$this->mov2."') and
										a.feclib >= to_date('".$this->fecham1."','dd/mm/yyyy') and a.feclib <= to_date('".$this->fecham2."','dd/mm/yyyy')";
							$tb5=$this->bd->select($this->sql5);
							$this->cell(30,5,$tb5->fields["mondeb"]);
							$totdeb=$tb5->fields["mondeb"];
							$this->sql6="select sum(a.monmov) as moncre
										from tsmovlib a,tstipmov b
										where a.tipmov=b.codtip and
										rpad(a.numcue,20,' ')=rpad('".$this->numcue."',20,' ') and
										b.debcre='C' and
										trim(a.tipmov) >= trim('".$this->mov1."')  and trim(a.tipmov) <= trim('".$this->mov2."') and
										a.feclib >= to_date('".$this->fecham1."','dd/mm/yyyy') and a.feclib <= to_date('".$this->fecham2."','dd/mm/yyyy')";
							$tb6=$this->bd->select($this->sql6);
							$this->cell(30,5,$tb6->fields["moncre"]);
							$totcre=$tb6->fields["moncre"];

							$this->SetX(170);
							//$this->cell(30,5,number_format($this->salant+$totdeb-$totcre,2,'.',','),0,0,'R');

							//-----------------------
			$this->ln();
			$this->ln();
			$tb->MoveNext();
			}


		}
	}
?>
