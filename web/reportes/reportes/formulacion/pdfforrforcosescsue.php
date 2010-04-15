<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $sqla;
		var $sqla2;
		var $sqlb;
		var $sqlg;
		var $sqlg2;
		var $rep;
		var $cab;
		var $titulo;
		var $agr;
		var $agr2;
		var $filtro;
		var $fecha;
		var $tip1;
		var $tip2;
		var $ord;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;
		var $cantcat=0;
		var $loncat=0;
		var $cancat=0;
		var $lonpar=0;
		var $canpar=0;
		var $nombre=array();
		var $nombre2=array();
		var $lon=array();
		var $lon2=array();

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->agr=$_POST["agr"];
			$this->fecha=$_POST["fecha"];
			$this->tip1=$_POST["tip1"];
			$this->tip2=$_POST["tip2"];
			$this->filtro=$_POST["filtro"];
            $this->titulo=$_POST["titulo"];

             if ($this->agr==""){
             	$this->agr=0;
             	}

			//buscamos nombre del grupo
			$sq="select nomext,lonniv from forniveles where catpar='C' and consec <= ".$this->agr." order by consec";
			$t=$this->bd->select($sq);
			$i=0;
			while (!$t->EOF)
			{
				$this->nombre[$i] = $t->fields["nomext"];
				$this->lon[$i] = $t->fields["lonniv"];

			$i++;
			$t->MoveNext();
			}
			$this->nombre[1];

			//sacamos cuanto es la longitud de la cat y cuantas son
			$this->sqla="select sum(lonniv) + (count(catpar)-1) as suma, count(catpar) as cont
						from forniveles
						where catpar='C'";
			$tba=$this->bd->select($this->sqla);
			$this->loncat=$tba->fields["suma"];
			$this->cancat=$tba->fields["cont"];

			// sacamos hasta donde vamos a agrupar las categorias
			$this->sqlb="select sum(lonniv) + (count(catpar)-1) as agrup
						from forniveles
						where catpar='C' and consec <= '".$this->agr."'";
			$tbb=$this->bd->select($this->sqlb);
			$this->agrup=$tbb->fields["agrup"];


             if ($this->agrup==""){
             	$this->agrup=0;
             	}


			$this->sqlg="select
						substr(b.codcat,1,".$this->agrup.") as cat

						from forcarpre b, npcomocp a, npcargos c

						where
						b.codcar = c.codcar and
						c.codtip = a.codtipcar and
						c.graocp = a.gracar and
						a.fecdes = to_date('".$this->fecha."','dd/mm/yyyy') and
						substr(b.codcat,1,".$this->agrup.") like ('".$this->filtro."%')

						group by
						substr(b.codcat,1,".$this->agrup.")

						order by substr(b.codcat,1,".$this->agrup.")";
						//H::PrintR($this->sqlg);exit;



		}


		function Header()
		{
			$this->Image("../../img/logo_1.jpg",10,12,18);
			/////////////////////
			$sql="select nomext from forniveles where consec=".$this->agr." ";
			$tb=$this->bd->select($sql);

			$this->Rect(10,10,190,30);
			$this->setFont("Arial","",6);
			$this->SetY(11);
			$this->SetX(45);
			//$this->cell(5,5,"JOSE FELIX RIBAS");
			$this->SetY(13);
			$this->SetX(45);
			//$this->cell(5,5,"DIRECCION DE PRESUPUESTO");
			$this->setFont("Arial","",7);
			$this->SetY(11);
			$this->SetX(184);
			$this->cell(5,5,"FECHA");
			$this->setFont("Arial","",8);
			$this->SetY(15);
			$this->SetX(183);
			$this->cell(5,5,date('d/m/y'));
			$this->setFont("Arial","B",12);
			$this->SetY(22);
			$this->SetX(52);
			$this->Multicell(105,4,$this->titulo,0,"C");
			$this->setFont("Arial","",7);
			$this->SetY(35);
			$this->SetX(90);
			$this->cell(5,5,"PRESUPUESTO   ");
			$this->setFont("Arial","B",7);
			$this->SetX(110);
			$this->cell(5,5,date('Y'));
			$this->setFont("Arial","",7);
			$this->SetY(35);
			$this->SetX(185);
			$this->cell(5,5,"Pag. ".$this->PageNo());

			$this->SetY(35);
			$this->setFont("Arial","B",7);
			$this->SetTextColor(140,0,0);
			$this->SetX(25);
			$this->cell(5,5,"Fecha de Vigencia de la Escala: ");
			$this->SetX(110);
			$this->SetTextColor(0,0,0);
			$this->cell(5,5,$this->fecha);

			$this->SetY(35);
			$this->setFont("Arial","B",7);
			$this->SetTextColor(140,0,0);
			$this->SetX(130);
			$this->cell(5,5,"Agrupado por: ");
			$this->SetX(150);
			$this->SetTextColor(0,0,0);
			$this->cell(5,5,trim($tb->fields["nomext"]));
			/////////////////////

			$this->ln(7);

		}
		function Cuerpo()
		{

		    $tbg=$this->bd->select($this->sqlg);
			$this->setFont("Arial","B",7);
			$primera="S";

			while (!$tbg->EOF)
			{
				$cate=trim($tbg->fields["cat"]);
				$acumcant1=0;
				$acumcant2=0;
				$acummonto1=0;
				$acummonto2=0;
				if ($primera!="S")
				{
					$this->AddPage();
				}
				else
				{
					$primera="N";
				}
				/////////////////////////
				//PINT TITULOS
				//pinta titulos
				$this->Line(10,42,200,42);
				$this->Line(10,42,10,53);
				$this->Line(200,42,200,53);
				$this->Line(10,53,200,53);

				$i=count($this->nombre);
				$categoria= array();
				$categoria=split("-",trim($tbg->fields["cat"]));
				$cat="";
				$x=32;
				for ($j=0;$j<$i;$j++)
				{
					if ($j==0)
					{
						$cat=$categoria[$j];
						$this->setFont("Arial","B",7);
					}
					else
					{
						$cat=$cat."-".$categoria[$j];
						$this->setFont("Arial","",7);
					}
					$this->cell(5,5,strtoupper($this->nombre[$j]).": ");
					$sql="select codcat,nomcat from fordefcatpre where trim(codcat)=trim('".$cat."')";
					$tb=$this->bd->select($sql);
					$this->SetX($x);
					$this->cell(5,5,trim(substr($tb->fields["codcat"],strlen(trim($tb->fields["codcat"]))-$this->lon[$j],strlen(trim($tb->fields["codcat"]))))."    ".strtoupper($tb->fields["nomcat"]));
					$this->ln(3);
					$x=$x+5;
				}
				//recuadro titulos
				$this->Line(10,54,200,54);
				$this->Line(10,68,200,68);
				$this->Line(10,54,10,68);
				$this->Line(200,54,200,68);
				// lineas hor
				$this->Line(59,61,200,61);
				$this->Line(59,58,153,58);
				//lineas ver
				$this->Line(22,54,22,68);
				$this->Line(59,54,59,68);
				$this->Line(71,61,71,68);
				$this->Line(106,58,106,68);
				$this->Line(118,61,118,68);
				$this->Line(153,54,153,68);
				$this->Line(165,61,165,68);
				//letras
				$this->SetY(58);
				$this->SetX(10);
				$this->setFont("Arial","B",7);
				$this->cell(5,5,"GRUPO");

				$this->SetY(58);
				$this->SetX(28);
				$this->setFont("Arial","B",7);
				$this->cell(5,5,"SUELDO/SALARIO");

				$sql="select destipcar from nptipcar where codtipcar='".$this->tip1."' ";
				$tb=$this->bd->select($sql);
				$this->SetY(64);
				$this->SetX(28);
				$this->setFont("Arial","B",5);
				$this->cell(5,5,$tb->fields["destipcar"],0,0,"C");

				$sql="select destipcar from nptipcar where codtipcar='".$this->tip2."' ";
				$tb=$this->bd->select($sql);
				$this->SetY(64);
				$this->SetX(47);
				$this->setFont("Arial","B",5);
				$this->cell(5,5,$tb->fields["destipcar"],0,0,"C");

				$this->SetY(54);
				$this->SetX(93);
				$this->setFont("Arial","B",6);
				$this->cell(5,5,"ESTIMADO PARA ".substr($this->fecha,6,4));

				$sql="select destipcar from nptipcar where codtipcar='".$this->tip1."' ";
				$tb=$this->bd->select($sql);
				$this->SetY(57);
				$this->SetX(81);
				$this->setFont("Arial","B",5);
				$this->cell(5,5,$tb->fields["destipcar"],0,0,"C");

				$sql="select destipcar from nptipcar where codtipcar='".$this->tip2."' ";
				$tb=$this->bd->select($sql);
				$this->SetY(57);
				$this->SetX(126);
				$this->setFont("Arial","B",5);
				$this->cell(5,5,$tb->fields["destipcar"],0,0,"C");

				$this->SetY(55);
				$this->SetX(165);
				$this->setFont("Arial","B",6);
				$this->cell(5,5,"TOTAL GENERAL");

				$this->SetY(63);
				$this->SetX(63);
				$this->setFont("Arial","B",5);
				$this->cell(5,5,"N�");

				$this->SetY(63);
				$this->SetX(80);
				$this->setFont("Arial","B",5);
				$this->cell(5,5,"MONTO (En Bs.)");

				$this->SetY(63);
				$this->SetX(110);
				$this->setFont("Arial","B",5);
				$this->cell(5,5,"N�");

				$this->SetY(63);
				$this->SetX(127);
				$this->setFont("Arial","B",5);
				$this->cell(5,5,"MONTO (En Bs.)");

				$this->SetY(63);
				$this->SetX(157);
				$this->setFont("Arial","B",5);
				$this->cell(5,5,"N�");

				$this->SetY(63);
				$this->SetX(174);
				$this->setFont("Arial","B",5);
				$this->cell(5,5,"MONTO (En Bs.)");

				$this->ln();
				/////////////////////////

					/*$this->sqlggg="select
								a.gracar as gracar,
								sum(case when a.codtipcar='".$this->tip1."' then (b.canasi + b.canvac) else null end) as cant1,
								sum(case when a.codtipcar='".$this->tip1."' then (a.suecar*(b.canasi + b.canvac)) else null end) as monto1,

								sum(case when a.codtipcar='".$this->tip2."' then (b.canasi + b.canvac) else null end) as cant2,
								sum(case when a.codtipcar='".$this->tip2."' then (a.suecar*(b.canasi + b.canvac)) else null end) as monto2

								from
								(npcomocp a left outer join npcargos c on (a.gracar=c.graocp and a.codtipcar=c.codtip))
								left outer join
								forcarpre b on (b.codcar=c.codcar)

								where
								(a.fecdes = to_date('".$this->fecha."','dd/mm/yyyy') or a.fecdes is null) and
								(substr(b.codcat,1,".$this->agrup.") = '".$cate."' or substr(b.codcat,1,".$this->agrup.") is null)

								group by
								a.gracar

								order by a.gracar";*/

						$this->sqlg2="SELECT gracar,
								SUM((CASE WHEN CODTIPCAR='".$this->tip1."' THEN (SELECT SUM(A.CANASI+A.CANVAC) FROM FORCARPRE A,NPCARGOS B WHERE substr(a.codcat,1,".$this->agrup.") = '".$cate."' AND B.CODTIP='".$this->tip1."' AND NPCOMOCP.fecdes = to_date('".$this->fecha."','dd/mm/yyyy') AND B.GRAOCP=NPCOMOCP.GRACAR AND A.CODCAR=B.CODCAR) ELSE NULL END)) AS cant1,
								SUM((CASE WHEN CODTIPCAR='".$this->tip2."' THEN (SELECT SUM(A.CANASI+A.CANVAC) FROM FORCARPRE A,NPCARGOS B WHERE substr(a.codcat,1,".$this->agrup.") = '".$cate."' AND B.CODTIP='".$this->tip2."' AND NPCOMOCP.fecdes = to_date('".$this->fecha."','dd/mm/yyyy') AND B.GRAOCP=NPCOMOCP.GRACAR AND A.CODCAR=B.CODCAR) ELSE NULL END)) AS cant2,
								SUM((CASE WHEN CODTIPCAR='".$this->tip1."' THEN (SELECT SUM((A.CANASI+A.CANVAC) * NPCOMOCP.SUECAR) FROM FORCARPRE A,NPCARGOS B WHERE substr(a.codcat,1,".$this->agrup.") = '".$cate."' AND B.CODTIP='".$this->tip1."' AND NPCOMOCP.fecdes = to_date('".$this->fecha."','dd/mm/yyyy') AND B.GRAOCP=NPCOMOCP.GRACAR AND A.CODCAR=B.CODCAR) ELSE NULL END)) AS monto1,
								SUM((CASE WHEN CODTIPCAR='".$this->tip2."' THEN (SELECT SUM((A.CANASI+A.CANVAC) * NPCOMOCP.SUECAR) FROM FORCARPRE A,NPCARGOS B WHERE substr(a.codcat,1,".$this->agrup.") = '".$cate."' AND B.CODTIP='".$this->tip2."' AND NPCOMOCP.fecdes = to_date('".$this->fecha."','dd/mm/yyyy') AND B.GRAOCP=NPCOMOCP.GRACAR AND A.CODCAR=B.CODCAR) ELSE NULL END)) AS monto2
								FROM NPCOMOCP
								WHERE CODTIPCAR='".$this->tip1."' OR CODTIPCAR='".$this->tip2."'
								GROUP BY GRACAR
								ORDER BY GRACAR";

						$tbg2=$this->bd->select($this->sqlg2);

						while (!$tbg2->EOF)
						{

							$this->setFont("Arial","",6);
							$this->SetX(13);
							$this->cell(5,5,substr($tbg2->fields["gracar"],1,2),0,0,"C");

							$sql="select suecar
									from npcomocp
									where codtipcar='".$this->tip1."' and
									gracar='".$tbg2->fields["gracar"]."' and
									fecdes=to_date('".$this->fecha."','dd/mm/yyyy')";
							$tb=$this->bd->select($sql);
							if ($tb->fields["suecar"] != null)
							{
								$this->SetX(28);
								$this->cell(5,5,number_format($tb->fields["suecar"],2,'.',','),0,0,"C");
							}

							$sql="select suecar
									from npcomocp
									where codtipcar='".$this->tip2."' and
									gracar='".$tbg2->fields["gracar"]."' and
									fecdes=to_date('".$this->fecha."','dd/mm/yyyy')";
							$tb=$this->bd->select($sql);
							if ($tb->fields["suecar"] != null)
							{
								$this->SetX(47);
								$this->cell(5,5,number_format($tb->fields["suecar"],2,'.',','),0,0,"C");
							}


							if ($tbg2->fields["cant1"] != null)
							{
								$acumcant1=$acumcant1+$tbg2->fields["cant1"];
								$this->SetX(63);
								$this->cell(5,5,intval($tbg2->fields["cant1"]),0,0,"C");
							}

							if ($tbg2->fields["monto1"] != null)
							{
								$acummonto1=$acummonto1+$tbg2->fields["monto1"];
								$this->SetX(100);
								$this->cell(5,5,number_format($tbg2->fields["monto1"],2,'.',','),0,0,"R");
							}

							if ($tbg2->fields["cant2"] != null)
							{
								$acumcant2=$acumcant2+$tbg2->fields["cant2"];
								$this->SetX(110);
								$this->cell(5,5,intval($tbg2->fields["cant2"]),0,0,"C");
							}

							if ($tbg2->fields["monto2"] != null)
							{
								$acummonto2=$acummonto2+$tbg2->fields["monto2"];
								$this->SetX(147);
								$this->cell(5,5,number_format($tbg2->fields["monto2"],2,'.',','),0,0,"R");
							}

							$this->setFont("Arial","B",6);
							if ( ($tbg2->fields["cant1"] != null) && ($tbg2->fields["cant2"] != null) )
							{
								$this->SetX(157);
								$this->cell(5,5,intval($tbg2->fields["cant1"]+$tbg2->fields["cant2"]),0,0,"C");
							}
							else
							{
								if ( ($tbg2->fields["cant1"] == null) && ($tbg2->fields["cant2"] != null) )
								{
									$this->SetX(157);
									$this->cell(5,5,intval($tbg2->fields["cant2"]),0,0,"C");
								}
								elseif ( ($tbg2->fields["cant2"] == null) && ($tbg2->fields["cant1"] != null) )
								{
									$this->SetX(157);
									$this->cell(5,5,intval($tbg2->fields["cant1"]),0,0,"C");
								}
							}

							if ( ($tbg2->fields["monto1"] != null) && ($tbg2->fields["monto2"] != null) )
							{
								$this->SetX(194);
								$this->cell(5,5,number_format($tbg2->fields["monto1"]+$tbg2->fields["monto2"],2,'.',','),0,0,"R");
							}
							else
							{
								if ( ($tbg2->fields["monto1"] == null) && ($tbg2->fields["monto2"] != null) )
								{
									$this->SetX(194);
									$this->cell(5,5,number_format($tbg2->fields["monto2"],2,'.',','),0,0,"R");
								}
								elseif ( ($tbg2->fields["monto2"] == null) && ($tbg2->fields["monto1"] != null) )
								{
									$this->SetX(194);
									$this->cell(5,5,number_format($tbg2->fields["monto1"],2,'.',','),0,0,"R");
								}
							}

							// pinta lineas laterales
							$this->line(10,$this->GetY(),10,$this->GetY()+5);
							$this->line(22,$this->GetY(),22,$this->GetY()+5);
							$this->line(40,$this->GetY(),40,$this->GetY()+5);
							$this->line(59,$this->GetY(),59,$this->GetY()+5);
							$this->line(71,$this->GetY(),71,$this->GetY()+5);
							$this->line(106,$this->GetY(),106,$this->GetY()+5);
							$this->line(118,$this->GetY(),118,$this->GetY()+5);
							$this->line(153,$this->GetY(),153,$this->GetY()+5);
							$this->line(165,$this->GetY(),165,$this->GetY()+5);
							$this->line(200,$this->GetY(),200,$this->GetY()+5);


						$this->ln(4);
						$tbg2->MoveNext();
						}
						$this->ln();
						$this->line(10,$this->GetY()-4,10,$this->GetY()+7);
						$this->line(22,$this->GetY()-4,22,$this->GetY()+3);
						$this->line(40,$this->GetY()-4,40,$this->GetY()+3);
						$this->line(59,$this->GetY()-4,59,$this->GetY()+7);
						$this->line(71,$this->GetY()-4,71,$this->GetY()+7);
						$this->line(106,$this->GetY()-4,106,$this->GetY()+7);
						$this->line(118,$this->GetY()-4,118,$this->GetY()+7);
						$this->line(153,$this->GetY()-4,153,$this->GetY()+7);
						$this->line(165,$this->GetY()-4,165,$this->GetY()+7);
						$this->line(200,$this->GetY()-4,200,$this->GetY()+7);

						$this->Rect(10,$this->GetY()+3,190,4);

						$y=$this->GetY();
						$this->SetY($y+3);
						$this->SetX(45);

						$this->setFont("Arial","B",6);
						$this->cell(5,5,"TOTALES");

						if (intval($acumcant1)!=0)
						{
							$this->SetX(63);
							$this->cell(5,5,intval($acumcant1),0,0,"C");
						}

						if ($acummonto1!=0)
						{
							$this->SetX(100);
							$this->cell(5,5,number_format($acummonto1,2,'.',','),0,0,"R");
						}

						if (intval($acumcant2)!=0)
						{
							$this->SetX(110);
							$this->cell(5,5,intval($acumcant2),0,0,"C");
						}

						if ($acummonto2!=0)
						{
							$this->SetX(147);
							$this->cell(5,5,number_format($acummonto2,2,'.',','),0,0,"R");
						}

						if ( ($acumcant1+$acumcant2) != 0 )
						{
							$this->SetX(157);
							$this->cell(5,5,intval($acumcant1+$acumcant2),0,0,"C");
						}

						if ( ($acummonto1+$acummonto2) != 0 )
						{
							$this->SetX(194);
							$this->cell(5,5,number_format($acummonto1+$acummonto2,2,'.',','),0,0,"R");
						}
						//////////////////////////////////////////

			$tbg->MoveNext();
			}

		}
	}
?>
