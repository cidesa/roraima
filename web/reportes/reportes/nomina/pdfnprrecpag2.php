<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acumret=0;
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
		var $sqla;
		var $sqlb;
		var $sqlc;
		var $sql;
		var $sql1;
		var $sql2;
		var $sql3;
		var $sql5;
		var $rep;
		var $numero;
		var $cab;
		var $codempdes;
		var $codemphas;
		var $codcardes;
		var $codcarhas;
		var $codcondes;
		var $codconhas;
		var $tipnomdes;
		var $tipnomhas;
		var $fecreg1;
		var $fecreg2;
		var $consecutivo;
		var $numrec;
//----------------------------------//
		var $A="10000";
		var	$B="5000";
		var	$C="2000";
		var	$D="1000";
		var	$E="500";
		var	$F="100";
		var	$G="50";
		var	$H="20";
		var	$I="10";
		var	$J="5";
		var	$K="2";
		var	$L="1";
		var	$M="0.50";
		var	$N="0.25";
		var	$O="0.10";
		var	$P="0.05";
		var	$Q="0.01";

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
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
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->tipnomhas=$_POST["tipnomhas"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];
			$this->consecutivo=strtoupper($_POST["consecutivo"]);


			$this->sql="
						select distinct e.codnom as nomina2, a.nomnom,
						 a.codemp,c.nomemp,c.cedemp,
						 c.fecing,c.fecret,
						 c.codban as codban,g .nomban,
						 a.codcar,b.nomcar,
						 a.codcon,a.nomcon,
						(CASE WHEN a.asided='A' THEN coalesce(a.saldo,0) ELSE 0 END) as asigna,
						(CASE WHEN a.asided='D' THEN coalesce(a.saldo,0) ELSE 0 END) as deduc,
						a.asided,
						f.codcat,f.nomcat,
						a.saldo,
						coalesce(c.codniv,' ') as codniv,
						C.NUMCUE as numcue,
						c.codpai,c.codest,c.codciu

						from npnomcal a, npcargos b, npdefcpt d,npasicaremp e,npcatpre f,
						nphojint c LEFT OUTER JOIN npbancos g ON (c.codban=g.codban)

						where
						a.codnom >=  rpad('".$this->tipnomdes."',3,' ') and a.codnom <= rpad('".$this->tipnomhas."',3,' ') and
						f.codcat=e.codcat and e.codemp=a.codemp and
						e.codcar=a.codcar and e.codnom=a.codnom and
						c.codemp=a.codemp and b.codcar=a.codcar and
						a.codemp >=rpad('".$this->codempdes."',16,' ') and (a.codemp) <= rpad('".$this->codemphas."',16,' ') and
						a.codcar >= rpad('".$this->codcardes."',16,' ') and a.codcar <=rpad('".$this->codcarhas."',16,' ') and
						a.codcon >= rpad('".$this->codcondes."',3,' ') and a.codcon <=rpad('".$this->codconhas."',3,' ') and
						a.codcon=d.codcon and d.impcpt = 'S' and status='V' and d.opecon <> 'P'

      					order by  a.codemp,e.codnom,a.codcon,coalesce(c.codniv,' ')";

			$this->SetAutoPageBreak(true,50);
		//print $this->sql;


		}
		function llenartitulosmaestro()
		{

				$this->titulos[0]=$this->A;
				$this->titulos[1]=$this->B;
				$this->titulos[2]=$this->C;
				$this->titulos[3]=$this->D;
				$this->titulos[4]=$this->E;
				$this->titulos[5]=$this->F;
				$this->titulos[6]=$this->G;
				$this->titulos[7]=$this->H;
				$this->titulos[8]=$this->I;
				$this->titulos[9]=$this->J;
				$this->titulos[10]=$this->K;
				$this->titulos[11]=$this->L;
				$this->titulos[12]=$this->M;
				$this->titulos[13]=$this->N;
				$this->titulos[14]=$this->O;
				$this->titulos[15]=$this->P;
				$this->titulos[16]=$this->Q;
		}


////function desgloce($codemp,$nomina,$neto)
//		{
//				$sueldo=$this->neto;
//				$sum=$sum+$this->neto;
//				if (($sueldo > '0') and ($sueldo >= $this->A))
//				{	$num=intval($sueldo/$this->A);
//					$restar=$num*$this->A;
//					$resto=$sueldo-$restar;	}
//				else
//				{	$num=0;
//					$resto=$sueldo;	}
//
//					$snum=$snum+$num;
//
//				if (($resto > '0') and ($resto >= $this->B))
//				{	$num2=intval($resto/$this->B);
//					$restar=$num*$this->A;
//					$restar2=$num2*$this->B;
//					$resto=$sueldo-($restar+$restar2);
//
//					}
//				else
//				{	$num2=0;
//					$restar2=0;
//
//					}
//					$snum2=$snum2+$num2;
//				if (($resto > '0') and ($resto >= $this->C))
//				{	$num3=intval($resto/$this->C);
//					$restar3=$num3*$this->C;
//					$resto=$sueldo-($restar+$restar2+$restar3);
//
//					}
//				else
//				{	$num3=0;
//					$restar3=0;
//
//					}
//					$snum3=$snum3+$num3;
// 			 if (($resto > '0') and ($resto >= $this->D))
//				{	$num4=intval($resto/$this->D);
//					$restar4=$num4*$this->D;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4);
//
//					}
//				else
//				{	$num4=0;
//					$restar4=0;
//
//					}
//					$snum4=$snum4+$num4;
//			 if (($resto > '0') and ($resto >= $this->E))
//				{	$num5=intval($resto/$this->E);
//					$restar5=$num5*$this->E;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5);
//
//					}
//				else
//				{	$num5=0;
//					$restar5=0;
//
//					}
//					$snum5=$snum5+$num5;
//
//			if (($resto > '0') and ($resto >= $this->F))
//				{	$num6=intval($resto/$this->F);
//					$restar6=$num6*$this->F;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6);
//
//					}
//				else
//				{	$num6=0;
//					$restar6=0;
//				}
//				$snum6=$snum6+$num6;
//
//		 	if (($resto > '0') and ($resto >= $this->G))
//				{	$num7=intval($resto/$this->G);
//					$restar7=$num7*$this->G;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7);
//				}
//				else
//				{	$num7=0;
//					$restar7=0;
//				}
//				$snum7=$snum7+$num7;
//			if (($resto > '0') and ($resto >= $this->H))
//				{	$num8=intval($resto/$this->H);
//					$restar8=$num8*$this->H;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+$restar8);
//				}
//				else
//				{	$num8=0;
//					$restar8=0;
//				}
//				$snum8=$snum8+$num8;
//    		if (($resto > '0') and ($resto >= $this->I))
//				{	$num9=intval($resto/$this->I);
//					$restar9=$num9*$this->I;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+$restar8+$restar9);
//				}
//				else
//				{	$num9=0;
//					$restar9=0;
//				}
//				$snum9=$snum9+$num9;
//			if (($resto > '0') and ($resto >= $this->J))
//				{	$num10=intval($resto/$this->J);
//					$restar10=$num10*$this->J;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+$restar8+$restar9+$restar10);
//				}
//				else
//				{	$num10=0;
//					$restar10=0;
//				}
//				$snum10=$snum10+$num10;
//		    if (($resto > '0') and ($resto >= $this->K))
//				{	$num11=intval($resto/$this->K);
//					$restar11=$num11*$this->K;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
//									$restar8+$restar9+$restar10+$restar11);
//				}
//				else
//				{	$num11=0;
//					$restar11=0;
//				}
//				$snum11=$snum11+$num11;
//		  if (($resto > '0') and ($resto >= $this->L))
//				{	$num12=intval($resto/$this->L);
//					$restar12=$num12*$this->L;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
//									$restar8+$restar9+$restar10+$restar11+$restar12);
//				}
//				else
//				{	$num12=0;
//					$restar12=0;
//				}
//				$snum12=$snum12+$num12;
//		if (($resto > '0') and ($resto >= $this->M))
//				{	$num13=intval($resto/$this->M);
//					$restar13=$num13*$this->M;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
//									$restar8+$restar9+$restar10+$restar11+$restar12+$restar13);
//				}
//				else
//				{	$num13=0;
//					$restar13=0;
//				}
//		$snum13=$snum13+$num13;
//		if (($resto > '0') and ($resto >= $this->N))
//				{	$num14=intval($resto/$this->N);
//					$restar14=$num14*$this->N;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
//									$restar8+$restar9+$restar10+$restar11+$restar12+$restar13+$restar14);
//				}
//				else
//				{	$num14=0;
//					$restar14=0;
//				}
//		$snum14=$snum14+$num14;
//		if (($resto > '0') and ($resto >= $this->O))
//				{	$num15=intval($resto/$this->O);
//					$restar15=$num15*$this->O;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
//									$restar8+$restar9+$restar10+$restar11+$restar12+$restar13+$restar14+$restar15);
//				}
//				else
//				{	$num15=0;
//					$restar15=0;
//				}
//		$snum15=$snum15+$num15;
//		if (($resto > '0') and ($resto >= $this->P))
//				{	$num16=intval($resto/$this->P);
//					$restar16=$num16*$this->P;
//					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
//									$restar8+$restar9+$restar10+$restar11+$restar12+$restar13+$restar14+$restar15+$restar16);
//				}
//				else
//				{	$num16=0;
//					$restar16=0;
//				}
//		$snum16=$snum16+$num16;
//		if (($resto > '0') and ($resto >=$this->Q))
//				{	$num17=intval($resto/$this->Q);
//							}
//				else
//				{	$num17=0;
//						}
//		$snum17=$snum17+$num17;
//				 $this->setFont("Arial","",8);
//				 $this->setX(10);
//				 $this->setY(120);
//				 $this->ln();
//				 //$this->cell(10,5,"");
//				 $this->setX(10);
//				 $this->cell(11,5,$num,0,0,"C");
//				 $this->cell(11,5,$num2,0,0,"C");
//				 $this->cell(11,5,$num3,0,0,"C");
//				 $this->cell(11,5,$num4,0,0,"C");
//				 $this->cell(11,5,$num5,0,0,"C");
//				 $this->cell(11,5,$num6,0,0,"C");
//				 $this->cell(11,5,$num7,0,0,"C");
//				 $this->cell(11,5,$num8,0,0,"C");
//				 $this->cell(11,5,$num9,0,0,"C");
//				 $this->cell(11,5,$num10,0,0,"C");
//				 $this->cell(11,5,$num11,0,0,"C");
//				 $this->cell(11,5,$num12,0,0,"C");
//				 $this->cell(11,5,$num13,0,0,"C");
//				 $this->cell(11,5,$num14,0,0,"C");
//				 $this->cell(11,5,$num15,0,0,"C");
//				 $this->cell(11,5,$num16,0,0,"C");
//				 $this->cell(11,5,$num17,0,0,"C");
//				 $this->ln(5);
//  	 		//	 $this->cell(10,5,number_format($this->neto,2,'.',','));
//
//
//				}
//
//	// para actualizar el numero del recibo
function br()
		{
			$this->sqlx="select numrec as ultrec from npdefgen";
			$tbx=$this->bd->select($this->sqlx);
			$this->numrec=$tbx->fields["ultrec"];
			$ultrec=$tbx->fields["ultrec"];

			if ($this->consecutivo=='SI')
			{
				$this->sqly="select  count(distinct(a.codemp)) as numemp
							from npnomcal a, npcargos b, npdefcpt d,npasicaremp e,npcatpre f,
							nphojint c LEFT OUTER JOIN npbancos g ON (c.codban=g.codban)
							--,npempleados_banco h--,npestorg i
							where
							a.codnom >=  rpad('".$this->tipnomdes."',3,' ') and	a.codnom <= rpad('".$this->tipnomhas."',3,' ') and
							f.codcat=e.codcat and
							e.codemp=a.codemp and
							e.codcar=a.codcar and
							e.codnom=a.codnom and
							c.codemp=a.codemp and
							b.codcar=a.codcar and
							--h.codnom=a.codnom and
							--h.codemp=a.codemp and
							a.codemp >=rpad('".$this->codempdes."',16,' ') and (a.codemp) <= rpad('".$this->codemphas."',16,' ') and
							a.codcar >= rpad('".$this->codcardes."',16,' ') and a.codcar <=rpad('".$this->codcarhas."',16,' ') and
							a.codcon >= rpad('".$this->codcondes."',3,' ') and a.codcon <=rpad('".$this->codconhas."',3,' ') and
							--i.codniv=c.codniv and
							a.codcon=d.codcon and
							d.impcpt = 'S'
							and status='V'
							group by c.codban,a.codcar,a.codnom
							order by c.codniv,c.cedemp";


					$tby=$this->bd->select($this->sqly);
					$numemp=0;
					while (!$tby->EOF)
					{
					$numemp=$numemp+$tby->fields["numemp"];
					$tby->MoveNext();
					}


			  $this->sqlz="update npdefgen set numrec='".$ultrec+$numemp."'  ";
  		      $this->bd->actualizar($this->sqlz);

			}

		}

function header()

{
	$this->setFont("Arial","B",7);
	$this->sqla="select nomemp from empresa where codemp='001'";
	$tba=$this->bd->select($this->sqla);

	// primer reectangulo
	$this->Rect(10,10,200,20);
	$this->cell(100,5,strtoupper($tba->fields["nomemp"]),0,0,"L");
	$this->ln();
	$this->cell(100,5,strtoupper("CANCELACION A:"),0,0,"L");
	// calculo de fecha
	$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	if ( $this->fecreg1>=10) {$femes=substr($this->fecreg1,4,2);}
	else
	 $femes=substr($this->fecreg1,4,1);
	 $me=$mes[$femes];
	//print $me=$mes[date('n')];
    $nro=substr($this->fecreg1,0,2);
    if ($nro<=15)
    {	$quin="1ERA"; }
	else $quin="2DA";
	$fecha=strtoupper(strftime("$me"))."/".date("Y");
	///---------
	$this->ln();
	//$this->Setx(5);
	$this->cell(100,5,$quin." QUINCENA ".$fecha);
	$this->ln();
	$this->cell(50,5," Nomina Nro :");
	$this->cell(10,5," Periodo:  ");
	$this->cell(60,5,"      Desde: ");
	$this->cell(60,5," Hasta: ");

	// segundo rectangulo
	$this->Rect(10,30,200,10);
	$this->ln();
	$this->cell(100,5," FAVOR DIRIGIRSE PARA EL COBRO AL BANCO :                     ");
	$this->line(100,30,100,40);
	$this->Setx(100);
	$this->cell(100,5,"RECIBO NUMERO  :");
	$this->ln();
	$this->Setx(50);
	$this->cell(100,5,"CTA   :  ");
	$this->Setx(100);
	$this->cell(100,5,"FECHA DE EMISION  :");
$this->setFont("Arial","B",7);
// TERCER RECTANGULO
	$this->Rect(10,40,200,10);
	$this->ln();
	$this->cell(20,5,"COD.CARGO:",1);
	$this->cell(30,5,"COD.TRABAJADOR",1);
	$this->cell(30,5,"CEDULA . IDENTIDAD ",1);
	$this->cell(90,5,"APELLIDOS Y NOMBRES",1);
	$this->cell(30,5,"CANTIDAD DE PAGO",1);
	$this->ln();
	$this->cell(20,5,"",1);
	$this->cell(30,5,"",1);
	$this->cell(30,5,"",1);
	$this->cell(90,5,"",1);
	$this->cell(30,5,"",1);

	// CUARTO RECTANGULO
	$this->Rect(10,50,200,5);
	$this->ln();
	$this->cell(100,5,"ASIGNACIONES",1,0,"C");
	$this->cell(100,5,"DEDUCCIONES",1,0,"C");

	// quinto cuadro
	$this->Rect(10,55,200,5);
	$this->ln();
	$this->cell(10,5,"COD.",1,0,"C");
	$this->cell(30,5,"DESCRIPCION",1,0,"C");
	$this->cell(10,5,"NR.CT.",1,0,"C");
	$this->cell(25,5,"CUOTA",1,0,"C");
	$this->cell(25,5,"SALDO",1,0,"C");
	// DEDUCCIONES
	$this->cell(10,5,"COD.",1,0,"C");
	$this->cell(30,5,"DESCRIPCION",1,0,"C");
	$this->cell(10,5,"NR.CT.",1,0,"C");
	$this->cell(25,5,"CUOTA",1,0,"C");
	$this->cell(25,5,"SALDO",1,0,"C");

	// SEXTO cuadro del detalle
	$this->Rect(10,60,200,50);
	$this->ln();
	$this->cell(10,50,"",1,0,"C");
	$this->cell(30,50,"",1,0,"C");
	$this->cell(10,50,"",1,0,"C");
	$this->cell(25,50,"",1,0,"C");
	$this->cell(25,50,"",1,0,"C");
	// segunda fila (asignaciones)
	$this->cell(10,50,"",1,0,"C");
	$this->cell(30,50,"",1,0,"C");
	$this->cell(10,50,"",1,0,"C");
	$this->cell(25,50,"",1,0,"C");
	$this->cell(25,50,"",1,0,"C");
$this->setFont("Arial","B",7);
	// SEPTIMO cuadro de los totales
	$this->Rect(10,110,200,5);
		$this->ln();
	$this->cell(70,5," TOTAL ASIGNACIONES:",1,0,"L");
	$this->cell(70,5,"TOTAL DEDUCCIONES:",1,0,"L");
	$this->cell(60,5,"NETO	:",1,0,"L");

//	// OCTAVO CUARDO
//	$this->Rect(10,110,200,5);
//	$this->ln();
//	$this->cell(200,5," DISTRIBUCION DE LA MONEDA",1,0,"C");
//
//	// NOVENO CUADRO
//	$this->ln();
//	$this->llenartitulosmaestro();
//	// titulos
//	$ncampos=count($this->titulos);
//	$this->Setx(10);
//			for($i=0;$i<$ncampos;$i++)
//			{
//				$this->cell(11,5,$this->titulos[$i],1,0,"C");
//			}
//			$this->cell(13,5,"DIF	:",1,0,"L");
//			$this->ln(5);
//// fila para las cantidades
//			for($i=0;$i<$ncampos;$i++)
//			{
//			$this->cell(11,10,"",1,0,"C");
//			}
//			$this->cell(13,10,"	",1,0,"L");
//			$sum=0;$sueldo=0;
//		    $this->setFont("Arial","B",8);
//			$ncampos=count($this->titulos);
//
//// decimo cuadro
//$this->setFont("Arial","B",7);
//	$this->Rect(10,120,200,5);
//	$this->ln();
//	$this->cell(100,5,"UBICACION GEOGRAFICA",1,0,"C");
//	$this->cell(100,5,"O B S E R V A C I O N E S ",1,0,"C");
//	$this->ln();
//// ONCEABO CUADRO
//
//	$this->Rect(10,125,200,50);
//	$this->Rect(110,135,100,40);
//		$this->ln(15);
//	$this->cell(100,5,"UBICACION ADMINISTRATIVA",1,0,"C");
//
//
//// DOCEABO CUARDO
//	$this->ln(20);
//	$this->Rect(10,175,200,15);
//	$this->cell(100,5,"DENOMINACION DEL CARGO",1,0,"L");
//	//$this->ln(10);
//	$this->cell(100,5,"DEPOSITADO EN:",1,0,"L");
//	$this->ln();
//	$this->cell(100,10,"",1,0,"L");
//	$this->cell(100,10,"",1,0,"L");
//
}



function Cuerpo()
		{
	$this->setFont("Arial","B",9);
    $tb=$this->bd->select($this->sql);
    $this->br();
    $this->SetAutoPageBreak(true,50);

	while(!$tb->EOF)
	{

    $ref=$tb->fields["codemp"];
	$this->sety(10);
	$recibo=1;
				$this->numrec=$this->numrec+$recibo;
				if ($this->consecutivo='SI')
				{
					$this->sql3="update npnomcal set numrec='".$this->numrec."'
								 where codemp=rpad('".$tb->fields["codemp"]."',16,' ') and
								 codcar=rpad('".$tb->fields["codcar"]."',16,' ') and
								 codnom= '".$tb->fields["nomina2"]."' ";
					$this->bd->actualizar($this->sql3);
					$nro=$this->numrec;
				}
				else
				{
					$this->sql3="select distinct numrec as numero
							from npnomcal
							where codemp=rpad('".$tb->fields["codemp"]."',16,' ') and
								 codcar=rpad('".$tb->fields["codcar"]."',16,' ') and
								 codnom= '".$tb->fields["nomina2"]."' ";
					$tb3=$this->bd->select($this->sql3);
					$nro=$tb3->fields["numero"];
				}
		$this->setFont("Arial","",7);
		$this->Setxy(130,30);
		$this->cell(10,5,$nro);
		$this->Setxy(40,15);
		$this->cell(150,5,strtoupper($tb->fields["nomnom"]));
		$this->Setxy(90,25);
		$this->cell(20,5,$this->fecreg1);
		$this->Setxy(140,25);
		$this->cell(20,5,$this->fecreg2);
		$this->Setxy(30,25);
		$this->cell(150,5,strtoupper($tb->fields["nomina2"]));

		$this->Setxy(60,35);
		$this->cell(150,5,($tb->fields["nomban"]));
		$this->Setxy(12,35);
		$this->cell(150,5,($tb->fields["cuenta_banco"]));
		$this->Setxy(130,35);
		$dia=date("d/m/Y");
		$this->cell(150,5,$dia);
		$this->Setxy(15,45);
		$this->cell(90,5,strtoupper($tb->fields["codcar"]));
		$this->Setxy(30,45);
		$this->cell(90,5,strtoupper($tb->fields["codemp"]));
		$this->Setxy(60,45);
		$this->cell(90,5,strtoupper($tb->fields["cedemp"]));
		$this->Setxy(95,45);
		$this->cell(104,5,strtoupper($tb->fields["nomemp"]));
		$this->Setxy(185,45);
		$this->cell(104,5,"1");

					$this->sety(61);
						$this->sqlb="select coalesce(sum(monto),0) as valor from npasiconemp a,npconsueldo b
									where (codemp) =rpad('".$tb->fields["codemp"]."',16,' ') and (codcar) =rpad('".$tb->fields["codcar"]."',16,' ') and a.codcon=b.codcon";
									$tbb=$this->bd->select($this->sqlb);
									$this->Setx(20);
									$this->cell(10,5,"SUELDO");
									$this->Setx(55);
									$this->setFont("Arial","",7);
									$this->cell(30,5,number_format($tbb->fields["valor"],2,'.',','),0,0,"R");
									$this->ln();

						$y=$this->gety();
						while(!$tb->EOF AND $ref==$tb->fields["codemp"])
								{
								// detalle
									// sueldo

									$this->setFont("Arial","",7);
									if ($tb->fields["asided"]=="A"){
									$this->Setx(10);
									$this->cell(15,3,($tb->fields["codcon"]));
									$this->Setx(20);
									$this->setFont("Arial","",6);
									$this->cell(30,3,substr(strtoupper($tb->fields["nomcon"]),0,20));
									$this->Setx(60);
									$this->setFont("Arial","",7);
									$this->cell(25,3,number_format($tb->fields["asigna"],2,'.',','),0,0,"R");
									$acumasigna=$acumasigna+$tb->fields["asigna"];
									}
									else{
									$this->sety($y);
									$this->Setx(110);
									$this->cell(15,3,($tb->fields["codcon"]));
									$this->Setx(120);
									$this->setFont("Arial","",6);
									$this->cell(74,3,substr(strtoupper($tb->fields["nomcon"]),0,20));
									$this->Setx(150);
									$this->setFont("Arial","",7);
									$this->cell(25,3,number_format($tb->fields["deduc"],2,'.',','),0,0,"R");
									$acumdeduc=$acumdeduc+$tb->fields["deduc"];
									//saldo
									$this->sqld="select codtippre as valor from nptippre where codcon='".$tb->fields["codcon"]."'";
									$tbd=$this->bd->select($this->sqld);

									$this->sqlc="select coalesce(acumulado,0) as saldo
											  from npasiconemp
											  where codcar = rpad('".$tb->fields["codcar"]."',16,' ') and
											  codemp=rpad('".$tb->fields["codemp"]."',16,' ') and codcon='".$tb->fields["codcon"]."'";
									$tbc=$this->bd->select($this->sqlc);

									if ($tbd->fields["valor"]==NULL)
									{
										$saldo=0.00;
									}
									else
									{
										$saldo=$tbc->fields["saldo"];
									}
									$this->Setx(170);
									$this->cell(30,3,number_format($saldo,2,'.',','),0,0,"R");
									$y=$y+3;
									}
									$this->ln();

							$tb->MoveNext();
								}
			//totales
			$this->Setxy(25,110);
			$this->cell(34,5,number_format($acumasigna,2,'.',','),0,0,"R");
			$this->Setxy(90,110);
			$this->cell(34,5,number_format($acumdeduc,2,'.',','),0,0,"R");
			$this->Setxy(165,110);
			$this->neto=$acumasigna-$acumdeduc;
			$this->cell(13,5,number_format($this->neto,2,'.',','),0,0,"R");

//--------------------------------- EL DESGLOCE------------------------------------------------------------------------------//
			//	$this->Setx(10);
				//$this->desgloce($tb->fields["codemp"],$tb->fields["nomina2"],$this->neto);
//--------------------------------- HASTA AQUI VA EL DESGLOCE------------------------------------------------------------------------------//
/*
		$this->Setxy(10,120);
		$this->cell(104,5,strtoupper($tb->fields["codest"]));
		$this->ln(5);
		$this->cell(104,5,strtoupper($tb->fields["codcui"]));

		$this->Setxy(10,180);
		$this->setFont("Arial","",7);
		$this->cell(50,5,strtoupper($tb->fields["nomcar"]));

		$this->Setxy(100,175);
		$this->cell(50,5,strtoupper($tb->fields["numcue"]));*/

		if (!$tb->EOF)
		{
		$this->addpage();
		}
 			}// while principal


		}// fin del cuerpo

		}
?>