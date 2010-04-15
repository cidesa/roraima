<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $numorddes;
		var $numordhas;
		var $bendes;
		var $benhas;
		var $fechades;
		var $fechahas;
		var $tipcaudes;
		var $tipcauhas;
		var $estatus;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->numorddes=$_POST["numorddes"];
			$this->numordhas=$_POST["numordhas"];
			$this->bendes=$_POST["bendes"];
			$this->benhas=$_POST["benhas"];
			$this->fechades=$_POST["fechades"];
			$this->fechahas=$_POST["fechahas"];
			$this->tipcaudes=$_POST["tipcaudes"];
			$this->tipcauhas=$_POST["tipcauhas"];
			$this->estatus=$_POST["estatus"];

			///Verificar Status
			$this->verificar_status();
			///
			$this->sql="SELECT
						A.NUMORD,
						A.NUMORD2 as NUMORD2,
						A.CEDRIF,
						A.NOMBEN,
						to_char(A.FECEMI,'dd/mm/yyyy') as fecemi,
						A.MONORD as MONTO_ORDEN,
						A.MONRET,
						A.MONDES,
						(case when A.STATUS='I' then 'PAGADA'
						  when A.STATUS='N' then 'PENDIENTE POR PAGAR'
						  when A.STATUS='A' then 'ANULADA'
						  when A.STATUS='E' then 'ELABORADA'
						  when A.STATUS='C' then 'CONTRALORIA' end) as status_ord,
						A.NUMTIQ as  NUMEROTIQ,
						B.NOMEXT as nomext
						FROM
						OPORDPAG A,
						CPDOCCAU B
						WHERE
						A.TIPCAU=B.TIPCAU AND
					  	A.NUMORD>= '".$this->numorddes."' and
						A.NUMORD <= '".$this->numordhas."' and
						A.CEDRIF >= '".$this->bendes."' and
						A.CEDRIF <= '".$this->benhas."' and
						A.TIPCAU >= '".$this->tipcaudes."' and
						A.TIPCAU <= '".$this->tipcauhas."' and
						A.FECEMI >= to_date('".$this->fechades."','dd/mm/yyyy') and
						A.FECEMI <= to_date('".$this->fechahas."','dd/mm/yyyy') and
						( A.STATUS  = '".$this->sta1."' or
						  A.STATUS  = '".$this->sta2."' or
						  A.STATUS  = '".$this->sta3."'  or
						  A.STATUS  = '".$this->sta4."' )
						UNION
						SELECT
						C.NUMORD,
						C.NUMORD2 as NUMORD2,
						C.CEDRIF,
						C.NOMBEN,
						to_char(C.FECEMI,'dd/mm/yyyy') as fecemi,
						C.MONORD as MONTO_ORDEN,
						C.MONRET,
						C.MONDES,
						(case when C.STATUS='I' then 'PAGADA'
						  when C.STATUS='N' then 'PENDIENTE POR PAGAR'
						  when C.STATUS='A' then 'ANULADA'
						  when C.STATUS='E' then 'ELABORADA'
						  when C.STATUS='C' then 'CONTRALORIA' end) as status_ord,
						C.NUMTIQ as NUMEROTIQ,
						D.NOMEXT as nomext
						FROM
						OPORDPAG C,
						CPDOCCOM D
						WHERE
						C.TIPCAU=D.TIPCOM AND
						C.NUMORD>= '".$this->numorddes."' and
						C.NUMORD <= '".$this->numordhas."' and
						C.CEDRIF >= '".$this->bendes."' and
						C.CEDRIF <= '".$this->benhas."' and
						C.TIPCAU >= '".$this->tipcaudes."' and
						C.TIPCAU <= '".$this->tipcauhas."' and
						C.FECEMI >= to_date('".$this->fechades."','dd/mm/yyyy') and
						C.FECEMI <= to_date('".$this->fechahas."','dd/mm/yyyy') and
						( C.STATUS  = '".$this->sta1."' or
						  C.STATUS  = '".$this->sta2."' or
						  C.STATUS  = '".$this->sta3."'  or
						  C.STATUS  = '".$this->sta4."' )
						ORDER BY NUMORD, FECEMI";

			$this->llenartitulosmaestro();
			$this->llenartitulos2();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,20);
		}


		function verificar_status()
		{
			if ($this->estatus=='E')
			{  //Efectivas
				  $this->sta1='E';
				  $this->sta2='C';
				  $this->sta3='N';
				  $this->sta4='I';
			}else if ($this->estatus=='A')
			{  //Anuladas
				  $this->sta1='A';
				  $this->sta2='A';
				  $this->sta3='A';
				  $this->sta4='A';
			}
			return true;
		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="    Nro.";
				$this->titulos[1]="   Nro.";
				$this->titulos[2]=" Beneficiario ";
				$this->titulos[3]="Nro. Pagos";
				$this->titulos[4]="                 Monto";
				$this->titulos[5]="   Tipo de Orden";
				$this->titulos[6]="  Fecha";
				$this->titulos[7]=" Estado";

				$this->anchos=array();


				$this->anchos[0]=18;
				$this->anchos[1]=16;
				$this->anchos[2]=48;
				$this->anchos[3]=10;
				$this->anchos[4]=28;
				$this->anchos[5]=38;
				$this->anchos[6]=18;
				$this->anchos[7]=35;
		}

		function llenartitulos2()
		{
				$this->titulos2[0]="    O/P";
				$this->titulos2[1]="   Ticket";
				$this->titulos2[2]="";
				$this->titulos2[3]="";
				$this->titulos2[4]="                    Total";
				$this->titulos2[5]="";
				$this->titulos2[6]="   Emisión";
				$this->titulos2[7]="";
				$this->anchos2=array();
				$this->anchos2[0]=16;
				$this->anchos2[1]=16;
				$this->anchos2[2]=48;
				$this->anchos2[3]=10;
				$this->anchos2[4]=28;
				$this->anchos2[5]=38;
				$this->anchos2[6]=18;
				$this->anchos2[7]=37;
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->SetDrawColor(255,255,255);
			$this->Line(10,35,270,35);
			$this->SetDrawColor(0,0,0);
			$this->SetTextColor(135,0,0);
		    $this->setFont("Arial","B",8);
		    $this->cell(62,3," ");
		    $this->cell(10,3,"Desde: ");
		    $this->cell(20,3,$this->fechades);
		    $this->cell(10,3,"Hasta: ");
			$this->cell(15,3,$this->fechahas);
			$this->ln(5);
			$this->Line(10, $this->getY(),200,$this->getY());

			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			$this->SetTextColor(0,0,128);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			 $this->ln(3);

			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],7,$this->titulos2[$i]);
			}

			$this->ln(7);

			$this->Line(10, $this->getY(),200,$this->getY());
   			$this->ln(2);
		}

		function Cuerpo()
		{
			$this->setFont("Arial","",8);
			$this->SetFillColor(255,255,255);
		    $tb=$this->bd->select($this->sql);
		    $this->bd->validar();
             $con=0;
			 $acuTot=0;
			 while(!$tb->EOF){
			         //Obtener N� pagos
 					 $numcuo=1;
					 $sql="SELECT NUMCUO as numcuo FROM OPORDPER WHERE REFOPP='".$tb->fields["numord"]."'";

 					 $tb1=$this->bd->select($sql);
					 if (!$tb1->EOF)
					 {
						$numcuo=$tb1->fields["numcuo"];
					 }
					 $montoTotal=$tb->fields["monto_orden"] -  $tb->fields["monret"] - $tb->fields["mondes"];

					///Seleccionar STATUS///////////////////////////////////////////////////////////////////

					$estado="";
					$fecenv="";
					$sql1="SELECT coalesce(COUNT(NUMORD),0) as contador  FROM TMPORDPAGDES WHERE NUMORD='".$tb->fields["numord"]."' ";
					$tb1=$this->bd->select($sql1);
					if (!$tb1->EOF)
					{
						$contador=$tb1->fields["contador"];
					}

				    $sql2="SELECT DISTINCT(STATUS) as status
						   FROM OPORDPAG WHERE NUMORD='".$tb->fields["numord"]."' ";
					$tb2=$this->bd->select($sql2);
					if (!$tb2->EOF)
					{
						$status=$tb2->fields["status"];
					}

					if ($contador!=0 and $status!='N' and $status!='I' )
					 {
				             $estado="DESPACHO";
					 } // if ($contador!=0 and $status!='N' and $status!='I' )
					 else
					  {
						if ($status=='N')
						{
				             $estado="FINANZAS";
						}
						elseif ($status=='C')
						{
				             $estado="CONTRALORIA";
						}
						elseif ($status=='I')
				        {

							$sql3="SELECT coalesce(COUNT(REFPAG),0) as refpag  FROM CPPAGOS  WHERE REFCAU='".$tb->fields["numord"]."'";
							$tb3=$this->bd->select($sql3);
							if (!$tb3->EOF)
							{
								$refpag=$tb3->fields["refpag"];
							}
							if ($refpag > 0)
							{
								 $estado="PAGADA";
							 }
							else
							{
								 $estado="CUSTODIA";
							}
						}//elseif ($status=='I')
				        elseif ($status=='A')
				        {
							$estado="ANULADA";
						 }
						 elseif ($status=='E')
				           {
							$estado="PARA ENVIAR A CONTRALORIA";
						   }
						 elseif ($status!='E' and $status!='C' and $status!='I' and $status!='N' and $status!='A')
						  {
							 $estado="-";
						  }
						}//// if ($contador!=0 and $status!='N' and $status!='I' )

					 ////////////////////////////////////////////////////////////////////////////////

					 	if ($this->getY() > 230 )
						{
							$this->AddPage();
						}
					$this->setFont("Arial","",7);
					 $this->cell($this->anchos[0],6,$tb->fields["numord2"]);
				     $this->cell($this->anchos[1],6,$tb->fields["numerotiq"]);
					 $this->cell(50,6," ");
					 $this->cell($this->anchos[3]-4,6,$numcuo);
					 $this->cell($this->anchos[4],6,number_format($montoTotal,2,'.',','),0,0,'R');

					 $this->cell(50,6," ");



					 	$this->Setx(165);
					 $this->cell($this->anchos[6],6,$tb->fields["fecemi"]);


					$this->setFont("Arial","",6);
					 $y=$this->GetY();
					 $this->setXY(45,$y);
					 $this->Multicell(46,3,$tb->fields["nomben"]); //Beneficiario

					 $z=$this->GetY();
					 $this->Setxy(130,$z-($z-$y));
					 $this->multicell(35,3,$tb->fields["nomext"]); // nro de orden

					 $l=$this->GetY();
					 $this->Setxy(180,$l-($l-$y));
					 $this->multicell(20,3,$estado); // estado





					 $con=$con+1;
					 $acuTot=$acuTot+$montoTotal;
			  $tb->MoveNext();

  			  $this->ln(3);
  		  	}	//end while
			if ($this->getY() > 230 )
			{
				$this->AddPage();
			}
			 $this->ln(4);
			 $this->Line(30, $this->getY(),130,$this->getY());
			 $this->ln(2);
			 $this->setFont("Arial","B",8);
			 $this->cell(25,5,"TOTALES: ");
			 $this->cell(28,5,"NRO. DE ORDENES: ");
			 $this->cell(25,5,$con);
			 $this->cell(12,5,"MONTO: ");
			 $this->cell($this->anchos[4],5,number_format($acuTot,2,'.',','),0,0,'R',1);

		}
	}
?>