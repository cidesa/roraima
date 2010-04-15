<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
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
		var $rep;
		var $numero;
		var $cab;
		var $tipnomdes;
		var $empdes;
		var $emphas;
		var $cardes;
		var $carhas;
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
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->empdes=$_POST["empdes"];
			$this->emphas=$_POST["emphas"];
			$this->cardes=$_POST["cardes"];
			$this->carhas=$_POST["carhas"];
			$this->tipnomdes=$_POST["tipnomdes"];

			$this->especial = $_POST["especial"];

				$this->sql="SELECT A.CODEMP, A.NOMEMP, A.CODNOM, A.NOMNOM, CAST(A.CODCAR AS INT) AS CODCARORD,B.CEDEMP
						FROM NPASICAREMP A,  NPHOJINT B
						WHERE
						TRIM(A.CODEMP)   = TRIM(B.CODEMP) AND
						TRIM(A.CODEMP) >= TRIM('".$this->empdes."') AND
						TRIM(A.CODEMP) <= TRIM('".$this->emphas."') AND
						TRIM(A.CODCAR) >= TRIM('".$this->cardes."') AND
						TRIM(A.CODCAR) <= TRIM('".$this->carhas."') AND
						TRIM(A.CODNOM) = TRIM('".$this->tipnomdes."') AND
						TRIM(B.STAEMP)   =  'A'
						ORDER BY CODCARORD,LTRIM(TRIM(A.CODEMP))";

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			//$this->SetAutoPageBreak(true,52);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Cedula ";
				$this->titulos[1]="Nombre Empleado";
				$this->titulos[2]="Total a Cobrar";
				$this->titulos[3]=$this->A;
				$this->titulos[4]=$this->B;
				$this->titulos[5]=$this->C;
				$this->titulos[6]=$this->D;
				$this->titulos[7]=$this->E;
				$this->titulos[8]=$this->F;
				$this->titulos[9]=$this->G;
				$this->titulos[10]=$this->H;
				$this->titulos[11]=$this->I;
				$this->titulos[12]=$this->J;
				$this->titulos[13]=$this->K;
				$this->titulos[14]=$this->L;
				$this->titulos[15]=$this->M;
				$this->titulos[16]=$this->N;
				$this->titulos[17]=$this->O;
				$this->titulos[18]=$this->P;
				$this->titulos[19]=$this->Q;
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",7);
			$ncampos=count($this->titulos);
			$this->SetTextColor(0,0,128);
		    $tb=$this->bd->select($this->sql);

		    $this->setFont("Arial","B",10);
			$this->cell($this->anchos[2],5,"Nomina y Personal");$this->ln();
			$this->cell($this->anchos[2],5,"Desglose de la Nomina ".$tb->fields["codnom"]." ".$tb->fields["nomnom"]);$this->ln();
			 $v=0;
			 while(!$tb->EOF)
			{
			 $v=$v+1;
			 $tb->MoveNext();

			}
			$this->cell($this->anchos[2],5,"Total de Empleados:" .$v);
			$this->ln();

			$this->SetTextColor(0,0,0);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(15);

			$this->Line(10,52,270,52);

			$this->SetLineWidth(0.5);
			$this->Line(10,63,270,63);
		}


		function Cuerpo()
		{
			$sum=0;$sueldo=0;
		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			while(!$tb->EOF)
			{

	            if ($this->especial == 'S')
	            {
	            	$especial = " and a.especial = 'S' ";
	            }
	            else
	            {
	            	$especial = " and a.especial = 'N' ";
	            }


				 $this->sql2="SELECT SUM(case when (A.ASIDED='A') then A.SALDO else 0 end) - SUM(case when (A.ASIDED='D') then A.SALDO else 0 end) as MONTOT
				    FROM NPNOMCAL A, NPDEFCPT B
 					WHERE RTRIM(A.CODEMP) = RTRIM('".$tb->fields["codemp"]."') AND
 					RTRIM(A.CODNOM) = RTRIM('".$tb->fields["codnom"]."') AND
 					RTRIM(A.CODCON) = RTRIM(B.CODCON) AND
 					B.IMPCPT = 'S'".$especial ;
 				 $tb2=$this->bd->select($this->sql2);
				//print $this->sql2;
				$sueldo=$tb2->fields["montot"];
				$sum=$sum+$tb2->fields["montot"];
				if (($sueldo > '0') and ($sueldo >= $this->A))
				{	$num=intval($sueldo/$this->A);
					$restar=$num*$this->A;
					$resto=$sueldo-$restar;	}
				else
				{	$num=0;
					$resto=$sueldo;	}

					$snum=$snum+$num;

				if (($resto > '0') and ($resto >= $this->B))
				{	$num2=intval($resto/$this->B);
					$restar=$num*$this->A;
					$restar2=$num2*$this->B;
					$resto=$sueldo-($restar+$restar2);

					}
				else
				{	$num2=0;
					$restar2=0;

					}
					$snum2=$snum2+$num2;
				if (($resto > '0') and ($resto >= $this->C))
				{	$num3=intval($resto/$this->C);
					$restar3=$num3*$this->C;
					$resto=$sueldo-($restar+$restar2+$restar3);

					}
				else
				{	$num3=0;
					$restar3=0;

					}
					$snum3=$snum3+$num3;
 			 if (($resto > '0') and ($resto >= $this->D))
				{	$num4=intval($resto/$this->D);
					$restar4=$num4*$this->D;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4);

					}
				else
				{	$num4=0;
					$restar4=0;

					}
					$snum4=$snum4+$num4;
			 if (($resto > '0') and ($resto >= $this->E))
				{	$num5=intval($resto/$this->E);
					$restar5=$num5*$this->E;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5);

					}
				else
				{	$num5=0;
					$restar5=0;

					}
					$snum5=$snum5+$num5;

			if (($resto > '0') and ($resto >= $this->F))
				{	$num6=intval($resto/$this->F);
					$restar6=$num6*$this->F;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6);

					}
				else
				{	$num6=0;
					$restar6=0;
				}
				$snum6=$snum6+$num6;

		 	if (($resto > '0') and ($resto >= $this->G))
				{	$num7=intval($resto/$this->G);
					$restar7=$num7*$this->G;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7);
				}
				else
				{	$num7=0;
					$restar7=0;
				}
				$snum7=$snum7+$num7;
			if (($resto > '0') and ($resto >= $this->H))
				{	$num8=intval($resto/$this->H);
					$restar8=$num8*$this->H;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+$restar8);
				}
				else
				{	$num8=0;
					$restar8=0;
				}
				$snum8=$snum8+$num8;
    		if (($resto > '0') and ($resto >= $this->I))
				{	$num9=intval($resto/$this->I);
					$restar9=$num9*$this->I;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+$restar8+$restar9);
				}
				else
				{	$num9=0;
					$restar9=0;
				}
				$snum9=$snum9+$num9;
			if (($resto > '0') and ($resto >= $this->J))
				{	$num10=intval($resto/$this->J);
					$restar10=$num10*$this->J;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+$restar8+$restar9+$restar10);
				}
				else
				{	$num10=0;
					$restar10=0;
				}
				$snum10=$snum10+$num10;
		    if (($resto > '0') and ($resto >= $this->K))
				{	$num11=intval($resto/$this->K);
					$restar11=$num11*$this->K;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
									$restar8+$restar9+$restar10+$restar11);
				}
				else
				{	$num11=0;
					$restar11=0;
				}
				$snum11=$snum11+$num11;
		  if (($resto > '0') and ($resto >= $this->L))
				{	$num12=intval($resto/$this->L);
					$restar12=$num12*$this->L;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
									$restar8+$restar9+$restar10+$restar11+$restar12);
				}
				else
				{	$num12=0;
					$restar12=0;
				}
				$snum12=$snum12+$num12;
		if (($resto > '0') and ($resto >= $this->M))
				{	$num13=intval($resto/$this->M);
					$restar13=$num13*$this->M;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
									$restar8+$restar9+$restar10+$restar11+$restar12+$restar13);
				}
				else
				{	$num13=0;
					$restar13=0;
				}
		$snum13=$snum13+$num13;
		if (($resto > '0') and ($resto >= $this->N))
				{	$num14=intval($resto/$this->N);
					$restar14=$num14*$this->N;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
									$restar8+$restar9+$restar10+$restar11+$restar12+$restar13+$restar14);
				}
				else
				{	$num14=0;
					$restar14=0;
				}
		$snum14=$snum14+$num14;
		if (($resto > '0') and ($resto >= $this->O))
				{	$num15=intval($resto/$this->O);
					$restar15=$num15*$this->O;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
									$restar8+$restar9+$restar10+$restar11+$restar12+$restar13+$restar14+$restar15);
				}
				else
				{	$num15=0;
					$restar15=0;
				}
		$snum15=$snum15+$num15;
		if (($resto > '0') and ($resto >= $this->P))
				{	$num16=intval($resto/$this->P);
					$restar16=$num16*$this->P;
					$resto=$sueldo-($restar+$restar2+$restar3+$restar4+$restar5+$restar6+$restar7+
									$restar8+$restar9+$restar10+$restar11+$restar12+$restar13+$restar14+$restar15+$restar16);
				}
				else
				{	$num16=0;
					$restar16=0;
				}
		$snum16=$snum16+$num16;
		if (($resto > '0') and ($resto >=$this->Q))
				{	$num17=intval($resto/$this->Q);
							}
				else
				{	$num17=0;
						}
		$snum17=$snum17+$num17;
				 $this->setFont("Arial","",8);
				 $this->cell($this->anchos[0],5,$tb->fields["codemp"]);
				 $this->cell($this->anchos[1],5,"");
				 $this->cell($this->anchos[2],5,number_format($tb2->fields["montot"],2,'.',','));
				 $this->cell($this->anchos[3],5,$num);
				 $this->cell($this->anchos[4],5,$num2);
				 $this->cell($this->anchos[5],5,$num3);
				 $this->cell($this->anchos[6],5,$num4);
				 $this->cell($this->anchos[7],5,$num5);
				 $this->cell($this->anchos[8],5,$num6);
				 $this->cell($this->anchos[9],5,$num7);
				 $this->cell($this->anchos[10],5,$num8);
				 $this->cell($this->anchos[11],5,$num9);
				 $this->cell($this->anchos[12],5,$num10);
				 $this->cell($this->anchos[13],5,$num11);
				 $this->cell($this->anchos[14],5,$num12);
				 $this->cell($this->anchos[15],5,$num13);
				 $this->cell($this->anchos[16],5,$num14);
				 $this->cell($this->anchos[17],5,$num15);
				 $this->cell($this->anchos[18],5,$num16);
				 $this->cell($this->anchos[19],5,$num17);
  	 			 $this->setX(27);
				 $this->Multicell($this->anchos[1],5,strtoupper($tb->fields["nomemp"]),0,'L',0);
    			 $this->ln(5);
	  			 $tb->MoveNext();
				}
			 $this->cell($this->anchos[0],5,"");
			 $this->cell($this->anchos[1],5,"TOTALES: ");
			 $this->cell($this->anchos[2],5,number_format($sum,2,'.',','));
			 $this->cell($this->anchos[3],5,$snum);
			 $this->cell($this->anchos[4],5,$snum2);
			 $this->cell($this->anchos[5],5,$snum3);
			 $this->cell($this->anchos[6],5,$snum4);
			 $this->cell($this->anchos[7],5,$snum5);
			 $this->cell($this->anchos[8],5,$snum6);
			 $this->cell($this->anchos[9],5,$snum7);
			 $this->cell($this->anchos[10],5,$snum8);
			 $this->cell($this->anchos[11],5,$snum9);
			 $this->cell($this->anchos[12],5,$snum10);
			 $this->cell($this->anchos[13],5,$snum11);
			 $this->cell($this->anchos[14],5,$snum12);
			 $this->cell($this->anchos[15],5,$snum13);
			 $this->cell($this->anchos[16],5,$snum14);
			 $this->cell($this->anchos[17],5,$snum15);
			 $this->cell($this->anchos[18],5,$snum16);
			 $this->cell($this->anchos[19],5,$snum17);

if ($snum>0)
{
	$AA=$snum*$this->A;
}
else $AA=0;
if ($snum2>0)
{
	$BB=$snum2*$this->B;
}
else $BB=0;
if ($snum3>0)
{
	$CC=$snum3*$this->C;
}
else $CC=0;
if ($snum4>0)
{
	$DD=$snum4*$this->D;
}
else $DD=0;
if ($snum5>0)
{
	$EE=$snum5*$this->E;
}
else $EE=0;
if ($snum6>0)
{
	$FF=$snum6*$this->F;
}
else $FF=0;
if ($snum7>0)
{
	$GG=$snum7*$this->G;
}
else $GG=0;
if ($snum8>0)
{
	$HH=$snum8*$this->H;
}
else $HH=0;
if ($snum9>0)
{
	$II=$snum9*$this->I;
}
else $II=0;
if ($snum10>0)
{
	$JJ=$snum10*$this->J;
}
else $JJ=0;
if ($snum11>0)
{
	$KK=$snum11*$this->K;
}
else $KK=0;
if ($snum12>0)
{
	$LL=$snum12*$this->L;
}
else $LL=0;
if ($snum13>0)
{
	$MM=$snum13*$this->M;
}
else $MM=0;
if ($snum14>0)
{
	$NN=$snum14*$this->N;
}
else $NN=0;
if ($snum15>0)
{
	$OO=$snum15*$this->O;
}
else $OO=0;
if ($snum16>0)
{
	$PP=$snum16*$this->P;
}
else $PP=0;
if ($snum17>0)
{
	$QQ=$snum17*$this->Q;
}
else $QQ=0;


			 $this->Rect(90,$this->GetY()+10,60,$this->GetY()+50);
			 $this->SetXY(100,$this->GetY()+12);
			 $this->setFont("Arial","B",10);
			 $this->cell($this->anchos[2],5,"Resumen de Desglose"); $this->ln(10); $this->SetX(95);
			 $this->setFont("Arial","",8);
			  $this->cell($this->anchos[3],5,"Denom.   Cantidad   Bolivares");$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[3],5,$this->A." = ".$snum." => ".number_format($AA,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[4],5,$this->B." = ".$snum2." => ".number_format($BB,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[5],5,$this->C." = ".$snum3." => ".number_format($CC,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[6],5,$this->D." = ".$snum4." => ".number_format($DD,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[7],5,$this->E." = ".$snum5." => ".number_format($EE,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[8],5,$this->F." = ".$snum6." => ".number_format($FF,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[9],5,$this->G." = ".$snum7." => ".number_format($GG,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[10],5,$this->H." = ".$snum8." => ".number_format($HH,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[11],5,$this->I." = ".$snum9." => ".number_format($II,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[12],5,$this->J." = ".$snum10." => ".number_format($JJ,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[13],5,$this->K." = ".$snum11." => ".number_format($KK,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[14],5,$this->L." = ".$snum12." => ".number_format($LL,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[15],5,$this->M." = ".$snum13." => ".number_format($MM,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[16],5,$this->N." = ".$snum14." => ".number_format($NN,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[17],5,$this->O." = ".$snum15." => ".number_format($OO,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[18],5,$this->P." = ".$snum16." => ".number_format($PP,2,".",","));$this->ln(); $this->SetX(95);
			 $this->cell($this->anchos[19],5,$this->Q." = ".$snum17." => ".number_format($QQ,2,".",","));$this->ln(); $this->SetX(95);

		}
			}
?>