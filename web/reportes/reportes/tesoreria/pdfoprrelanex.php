<?
//<!--  Programado  por Jaime Su�rez -->
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");


	class pdfreporte extends fpdf
	{

		var $bd;
		var $bd1;
		var $bd2;
		var $bd3;
		var $bd4;
		var $bd5;
		var $bd6;
		var $bd7;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sqla;
		var $sqlb;
		var $sqlc;
		var $sqld;
		var $sqle;
		var $sqlf;
		var $sqlg;
		var $sqlh;
		var $sqli;
		var $sqlj;
		var $sqlk;
		var $sqll;
		var $sqlm;
		var $sqln;
		var $salida;
		var $salida_refere;
		var $moncau;
		var $monret;
		var $neto;
		var $nombre;

		var $nroorddes;
		var $codprodes;
		var $codprohas;
		var $unidad_solicitante;
		var $codartdes;
		var $codarthas;
		var $fechades;
		var $fechahas;
		var $status;
		var $razon_compra;
		var $fecha_entrega;
		var $unico_provee;

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


//*********************** variables **************************************
 			$this->nroorddes=$_POST["nroorddes"];
 			$this->nroordhas=$_POST["nroordhas"];
 			$this->bendes=$_POST["bendes"];
 			$this->benhas=$_POST["benhas"];
 			$this->fechades=$_POST["fechades"];
 			$this->fechahas=$_POST["fechahas"];
 			$this->tipcaudes=$_POST["tipcaudes"];
 			$this->tipcauhas=$_POST["tipcauhas"];
 			$this->status=$_POST["status"];

//******************** validaciones de los trigerrr*************************

//**estatus***
  if ($this->status=='1'):
      $this->sta1='I';
      $this->sta2='N';
      $this->sta3='A';
      $this->sta4='E';
      $this->sta5='C';
  elseif ($this->status=='2'):
      $this->sta1='I';
      $this->sta2='I';
      $this->sta3='I';
      $this->sta4='I';
      $this->sta5='I';
  elseif ($this->status=='3'):
      $this->sta1='A';
      $this->sta2='A';
      $this->sta3='A';
      $this->sta4='A';
      $this->sta5='A';
  elseif ($this->status=='4'):
      $this->sta1='N';
      $this->sta2='N';
      $this->sta3='N';
      $this->sta4='N';
      $this->sta5='N';
  elseif ($this->status=='5'):
      $this->sta1='E';
      $this->sta2='E';
      $this->sta3='E';
      $this->sta4='E';
      $this->sta5='E';
  elseif ($this->status=='6'):
      $this->sta1='C';
      $this->sta2='C';
      $this->sta3='C';
      $this->sta4='C';
      $this->sta5='Cc';
  endif;

//*********************** fin de variables *******************************
//*********************** inicio de sql *******************************
			$this->sql="";
			$this->sql="select
						distinct
									rtrim(a.numord) as orden,
									rtrim(a.numord) as numord,
									rtrim(a.numord2) as numord2,
									a.cedrif,
									a.nomben,
									a.desord,
									to_char(a.fecemi,'dd/mm/yyyy') as fecemi,
									a.numcom,
									(a.monord-a.monret-a.mondes) as neto,
									(case when a.status='I' then 'PAGADAS' when a.status='N' then 'PENDIENTES POR PAGAR' when a.status='A' then 'ANULADAS' when a.status='E' then 'ELABORADA' when a.status='C' then 'CAJA' end) as staord,
									a.numtiq,
									a.tipcau,
									c.nitben
						from
									opordpag a,
									opbenefi c
						where
									a.cedrif=c.cedrif and
									a.numord >= '".$this->nroorddes."' and
									a.numord <= '".$this->nroordhas."' and
									a.cedrif >= '".$this->bendes."' and
									a.cedrif <= '".$this->benhas."' and
									a.fecemi >= to_date('".$this->fechades."','dd/mm/yyyy') and
									a.fecemi <= to_date('".$this->fechahas."','dd/mm/yyyy') and
									a.tipcau >= '".$this->tipcaudes."' and
									a.tipcau <= '".$this->tipcauhas."' and
									(a.status = '".$this->sta1."' or
									 a.status = '".$this->sta2."' or
									 a.status = '".$this->sta3."'  or
									 a.status = '".$this->sta4."' or
									 a.status = '".$this->sta5."')
						order by orden asc";
					//print $this->sql;
		}

//*********************** fin de sql *******************************
		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);

		}
		function Cuerpo()
		{
	    $tb=$this->bd->select($this->sql);


	    $tb=$this->bd->select($this->sql);
		while (!$tb->EOF)
			{
							//**********************************************************
							$this->sqlc="select rtrim(b.numcom) as ordcon,b.codcta,c.descta,(case when b.debcre='D' then b.monasi else 0 end) as debitos,(case when b.debcre='C' then b.monasi else 0 end) as creditos from contabc1 b, contabb c where b.codcta = rpad(c.codcta,32,' ') and b.numcom= trim('".$tb->fields["numcom"]."') order by  b.debcre desc,b.codcta";
							$tb3=$this->bd->select($this->sqlc);
							//**********************************************************
							$this->sqld="select rtrim(b.numord) as ordret, b.codtip, c.destip, c.porret, sum(b.monret) as sumret from opretord b, optipret c where b.codtip=c.codtip and trim(b.numord)=rtrim('".$tb->fields["orden"]."') group by rtrim(b.numord),b.codtip,c.destip,c.porret order by rtrim(b.codtip)";
							$tb4=$this->bd->select($this->sqld);
							//**********************************************************
							$this->sqle="select coalesce(count(nomext),0) as tipo from cpdoccau where tipcau='".$tb->fields["tipcau"]."'";
							$tb5=$this->bd->select($this->sqle);
								if ($tb5->fields["tipo"]<>0):
									$this->sqlf="select nomext as nombre from cpdoccau where tipcau='".$tb->fields["tipcau"]."'";
									$tb6=$this->bd->select($this->sqlf);
									$this->nombre=$tb6->fields["nombre"];
								else:
									$this->sqlf="select nomext as nombre from cpdoccom where tipcom='".$tb->fields["tipcau"]."'";
									$tb6=$this->bd->select($this->sqlf);
									$this->nombre=$tb6->fields["nombre"];
								endif;


							//**********************************************************
							$this->sqlg="select coalesce(count(distinct(tipcau)),0) as contador from cpdoccau where tipcau='".$tb->fields["tipcau"]."'";
							$tb7=$this->bd->select($this->sqlg);
								if ($tb7->fields["contador"]<>0):
									$this->sqlh="select coalesce(count(distinct(refprc)),0) as contador from cpimpcau where refcau='".$tb->fields["numord"]."'";
									$tb8=$this->bd->select($this->sqlh);
											if ($tb8->fields["contador"]<>0):
												$this->sqli="select distinct(refprc) as refere from cpimpcau where refcau='".$tb->fields["numord"]."'";
												$tb9=$this->bd->select($this->sqli);
												if ($tb9->fields["refere"]<>'NULO'):
													$this->refere=$tb9->fields["refere"];
												else:
													$this->refere='';
												endif;
											endif;
								else:
								     $this->sqlh="select coalesce(count(distinct(tipcom)),0) as contador from cpdoccom where tipcom='".$tb->fields["tipcau"]."'";
 									 $tb8=$this->bd->select($this->sqlh);
										if ($tb8->fields["contador"]<>0):
   												$this->sqli="select distinct(refprc) as refere from cpimpcau where refcau='".$tb->fields["numord"]."'";
												$tb9=$this->bd->select($this->sqli);
												$this->refere=$tb9->fields["refere"];
										endif;
								endif;



							//**********************************************************
							$this->sqlj="select coalesce(count(distinct(b.estatus)),0) as contador from opdetord a,cpdeftit b where a.numord='".$tb->fields["numord"]."' and a.codpre=b.codpre";
							$tb9=$this->bd->select($this->sqlj);
									if ($tb9->fields["contador"]>1):
								     	  $this->salida="Funcionamiento e Inversión";
    								else:
										$this->sqll="select distinct(b.estatus) as refere from opdetord a,cpdeftit b where a.numord='".$tb->fields["numord"]."' and a.codpre=b.codpre";
										$tb10=$this->bd->select($this->sqll);
											if ($tb10->fields["refere"]=="F"):
												 $this->salida="Funcionamiento";
											 else:
												$this->salida="Inversion";
											 endif;
     								endif;


							//**********************************************************
							$this->sqlm="select coalesce(count(distinct(refere)),0) as contador from cpimpcau where refcau='".$tb->fields["numord"]."'";
							$tb11=$this->bd->select($this->sqlm);
									if ($tb11->fields["contador"]<>0):
										$this->sqln="select distinct(refere) as refere from cpimpcau where refcau='".$tb->fields["numord"]."'";
										$tb12=$this->bd->select($this->sqln);
											if ($tb12->fields["refere"]<>"NULO"):
												 $this->salida_refere=$tb12->fields["refere"];
											 else:
												$this->salida_refere="";
											 endif;
     								endif;





							$this->SetTextColor(0,0,0);
							////////////////////////////////////////planilla completa////////////////////////////////////////////////////////////////////
						////cuadro uno
								$this->setFont("Arial","",8);
								$this->SetXY(10,40);
								$this->Line($this->GetX(),$this->GetY(),$this->GetX(),$this->GetY()+215);//verical MARCO
								$this->Line($this->GetX()+195,$this->GetY(),$this->GetX()+195,$this->GetY()+215);//verical MARCO
								$this->Line($this->GetX()+100,$this->GetY(),$this->GetX()+100,$this->GetY()+10);//verical MARCO
								$this->Line($this->GetX()+140,$this->GetY()+20,$this->GetX()+140,$this->GetY()+10);//verical MARCO

								$this->SetXY(10,40);
								$this->Line($this->GetX(),$this->GetY(),$this->GetX()+195,$this->GetY());//horizontal
								$this->Line($this->GetX(),$this->GetY()+5,$this->GetX()+195,$this->GetY()+5);//horizontal
								$this->SetXY(150,40);
								$this->Line($this->GetX(),$this->GetY()+15,$this->GetX()+55,$this->GetY()+15);//horizontal
								$this->SetXY(10,40);
								$this->Line($this->GetX(),$this->GetY()+20,$this->GetX()+195,$this->GetY()+20);//horizontal
								$this->Line($this->GetX(),$this->GetY()+30,$this->GetX()+195,$this->GetY()+30);//horizontal
								$this->Line($this->GetX(),$this->GetY()+50,$this->GetX()+195,$this->GetY()+50);//horizontal
								$this->Line($this->GetX(),$this->GetY()+60,$this->GetX()+195,$this->GetY()+60);//horizontal
								$this->Line($this->GetX(),$this->GetY()+215,$this->GetX()+195,$this->GetY()+215);//horizontal



								$this->SetXY($this->GetX(),$this->GetY());
								$this->cell(50,5,"Tipo de Orden de Pago: ".$tb6->fields["nombre"]);

								$this->SetXY($this->GetX()+50,$this->GetY());
								$this->cell(50,5,"Certificación Presup.: ".trim($this->refere));

								$this->SetXY(10,50);
								$this->Line($this->GetX(),$this->GetY(),$this->GetX()+195,$this->GetY());//horizontal

								$this->SetXY(10,45);
								$this->SetXY($this->GetX(),$this->GetY());
								$this->cell(50,5,"Presupuesto: ".trim($this->salida));

								$this->SetXY($this->GetX(),$this->GetY());
								$this->cell(50,5,"Año: ".substr($tb->fields["fecemi"],6,4));

								$this->SetXY($this->GetX(),$this->GetY());
								$this->cell(50,5,"Compromiso: ".trim($this->salida_refere));

								$this->SetXY(10,50);
								$this->SetXY($this->GetX(),$this->GetY());
								$this->cell(50,5,"Beneficiario: ".trim($tb->fields["nomben"]));

								$this->SetXY($this->GetX()+90,$this->GetY());
								$this->cell(50,5,"Cédula o Rif.: ".trim($tb->fields["cedrif"]));

								$this->SetXY(150,55);
								$this->SetXY($this->GetX(),$this->GetY());
								$this->cell(50,5,"Nit: ".trim($tb->fields["nitben"]));

								$this->SetXY(10,61);
								$this->SetXY($this->GetX(),$this->GetY());
								$this->multicell(185,3,"Por la Cantidad de: ".montoescrito($tb->fields["neto"],$this->bd),0,'l');

								$this->SetXY(10,71);
								$this->SetXY($this->GetX(),$this->GetY());
								$this->multicell(185,3,strtoupper($tb->fields["desord"]),0,'l');// DESCRIPCION

								$this->SetXY(10,80);
								$this->SetXY($this->GetX(),$this->GetY());
								$this->cell(50,5,"Nro. Ticket: ".trim($tb->fields["numtiq"]));

								$this->SetXY(10,91);
								$this->SetXY($this->GetX(),$this->GetY());
								$this->cell(50,5,"                                                                                                         Control Presupuestario");
								$this->SetXY(10,$this->GetY()+5);
								$this->cell(50,5,"Codigo Presupuestario              Descripción                                                                                            Monto                  Monto Ret.       Monto Neto");

								$this->ln();

								$this->setFont("Arial","",7);
								$this->moncau="0";
								$this->monret="0";
								$this->neto="0";
								$this->sqla="select distinct (b.numord) as ordpre, b.codpre,rtrim(c.nompre) as nompre, sum(b.moncau) as moncau, sum(b.mondes) as mondes, sum(b.monret) as monret from opdetord b, cpdeftit c where b.codpre = rpad(c.codpre,32,' ') and b.numord= trim('".$tb->fields["orden"]."')  group by b.numord, b.codpre, c.nompre order by b.codpre";
								$tb1=$this->bd->select($this->sqla);
								while (!$tb1->EOF)
									{
										$this->SetXY($this->GetX(),$this->GetY());
										$this->cell(40,5,trim($tb1->fields["codpre"]));

										$this->SetXY($this->GetX()+80,$this->GetY());
										$this->cell(20,5,number_format($tb1->fields["moncau"],2,'.',','),0,0,'R',0);//FORMATO MONTO NUMERO

										$this->SetXY($this->GetX()+10,$this->GetY());
										$this->cell(10,5,number_format($tb1->fields["monret"],2,'.',','),0,0,'R',0);//FORMATO MONTO NUMERO

										$this->SetXY($this->GetX(),$this->GetY());
										$this->cell(25,5,number_format(($tb1->fields["moncau"]-$tb1->fields["monret"]-$tb1->fields["monret"]),2,'.',','),0,0,'R',0);//FORMATO MONTO NUMERO

										$this->SetXY($this->GetX()-145,$this->GetY()+1.5);
        								$this->multicell(80,2,strtoupper($tb1->fields["nompre"]),0,'l');// DESCRIPCION

										$this->moncau=$this->moncau+$tb1->fields["moncau"];
										$this->monret=$this->monret+$tb1->fields["monret"];
										$this->neto=$this->neto+($tb1->fields["moncau"]-$tb1->fields["monret"]-$tb1->fields["monret"]);

										$tb1->MoveNext();
									}//ciclo
								$this->setFont("Arial","B",7);
										$this->SetXY($this->GetX()+100,$this->GetY()+1);
										$this->cell(20,5,"Totales Bs.");//FORMATO MONTO NUMERO

										$this->SetXY($this->GetX(),$this->GetY());
										$this->cell(20,5,number_format($this->moncau,2,'.',','),0,0,'R',0);//FORMATO MONTO NUMERO

										$this->SetXY($this->GetX(),$this->GetY());
										$this->cell(20,5,number_format($this->monret,2,'.',','),0,0,'R',0);//FORMATO MONTO NUMERO

										$this->SetXY($this->GetX(),$this->GetY());
										$this->cell(25,5,number_format($this->neto,2,'.',','),0,0,'R',0);//FORMATO MONTO NUMERO


								$this->addpage();
				$tb->MoveNext();

								}//ciclo
								$this->ln(1);

		////////////////////////////////fin del  ciclo////////////////////////////////
		}//cuerpo
	}//clase
?>
