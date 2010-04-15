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
						  (A.STATUS  = '".$this->sta4."' AND A.NUMORD IN (SELECT NUMORD FROM TMPORDPAGDES)) or
						  (A.STATUS  = '".$this->sta5."' AND A.NUMORD NOT IN (SELECT NUMORD FROM TMPORDPAGDES))  or
						  (A.STATUS  = '".$this->sta6."' AND A.NUMORD IN (SELECT RTRIM(REFCAU) FROM CPPAGOS)) or
						  (A.STATUS<>'A' AND A.TIPCAU NOT IN ('OP10','OP04','OP06','OP07') AND A.NUMORD IN (SELECT SUBSTR(NUMCHE,1,8)  FROM TSCHEEMI WHERE STATUS='".$this->sta7."') ) )
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
						  (C.STATUS  = '".$this->sta4."' AND C.NUMORD IN (SELECT NUMORD FROM TMPORDPAGDES)) or
						  (C.STATUS  = '".$this->sta5."' AND C.NUMORD NOT IN (SELECT NUMORD FROM TMPORDPAGDES))  or
						  (C.STATUS  = '".$this->sta6."' AND C.NUMORD IN (SELECT RTRIM(REFCAU) FROM CPPAGOS)) or
						  (C.STATUS<>'A' AND C.TIPCAU NOT IN ('OP10','OP04','OP06','OP07') AND C.NUMORD IN (SELECT SUBSTR(NUMCHE,1,8)  FROM TSCHEEMI WHERE STATUS='".$this->sta7."') ) )
						ORDER BY NUMORD, FECEMI";


			$this->llenartitulosmaestro();
			$this->llenartitulos2();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,20);
		}


		function verificar_status()
		{
			if ($this->estatus=='PEC')
			{  //PARA ENVIAR CONTRALORIA
				  $this->sta1='E';
				  $this->sta4=' ';
				  $this->sta5=' ';
				  $this->sta6=' ';
			  	  $this->sta7=' ';
			}else if ($this->estatus=='C')
			{  //CONTRALORIA
				  $this->sta1=' ';
				  $this->sta4=' ';
				  $this->sta5='C';
				  $this->sta6=' ';
			  	  $this->sta7=' ';
			}else if ($this->estatus=='D')
			{  //DESPACHO
				  $this->sta1=' ';
				  $this->sta4='C ';
				  $this->sta5=' ';
				  $this->sta6=' ';
			  	  $this->sta7=' ';
			}else if ($this->estatus=='F')
			{  //FINANZAS
				  $this->sta1='N';
				  $this->sta4=' ';
				  $this->sta5=' ';
				  $this->sta6=' ';
			  	  $this->sta7=' ';
			}else if ($this->estatus=='CC')
			{  //CUSTODIA
				  $this->sta1='';
				  $this->sta4=' ';
				  $this->sta5=' ';
				  $this->sta6=' ';
			  	  $this->sta7='C ';
			}else if ($this->estatus=='P')
			{  //PAGADAS
				  $this->sta1='';
				  $this->sta4=' ';
				  $this->sta5=' ';
				  $this->sta6='I';
			  	  $this->sta7=' ';
			}else if ($this->estatus=='A')
			{  //ANULADAS
				  $this->sta1='A';
				  $this->sta4=' ';
				  $this->sta5=' ';
				  $this->sta6=' ';
			  	  $this->sta7=' ';
			}

			return true;
		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="    Nro.";
				$this->titulos[1]="   Nro.";
				$this->titulos[2]=" Beneficiario ";
				$this->titulos[3]="Nro Pagos";
				$this->titulos[4]="                 Monto";
				$this->titulos[5]="   Tipo de Orden";
				$this->titulos[6]="  Fecha";
				$this->titulos[7]="  Fecha";
				$this->titulos[8]=" Estado";

				$this->anchos=array();


				$this->anchos[0]=18;
				$this->anchos[1]=16;
				$this->anchos[2]=38;
				$this->anchos[3]=10;
				$this->anchos[4]=28;
				$this->anchos[5]=26;
				$this->anchos[6]=18;
				$this->anchos[7]=18;
				$this->anchos[8]=35;
		}

		function llenartitulos2()
		{
				$this->titulos2[0]="    O/P";
				$this->titulos2[1]="   Ticket";
				$this->titulos2[2]="";
				$this->titulos2[3]="";
				$this->titulos2[4]="                    Total";
				$this->titulos2[5]="";
				$this->titulos2[6]="   Emision";
				$this->titulos2[7]="      Envio";
				$this->titulos2[8]="";
				$this->anchos2=array();
				$this->anchos2[0]=16;
				$this->anchos2[1]=16;
				$this->anchos2[2]=38;
				$this->anchos2[3]=10;
				$this->anchos2[4]=26;
				$this->anchos2[5]=28;
				$this->anchos2[6]=18;
				$this->anchos2[7]=18;
				$this->anchos2[8]=37;
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

			         	 if ($this->getY() >230 )
					{
						$this->AddPage();
					}
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

					if ($contador!=0 and $status!='N' and $status!='I' and $status!='A' )
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
							$estado="PARA ENVIAR A CONTRALOR�A";
						   }
						 elseif ($status!='E' and $status!='C' and $status!='I' and $status!='N' and $status!='A')
						  {
							 $estado="-";
						  }
						}//// if ($contador!=0 and $status!='N' and $status!='I' )

					 ////////////////////////////////////////////////////////////////////////////////
					 ///////////SELECCIONA FECHA DE EMISION ////////////////////////////////////////
					 	if ($estado=='DESPACHO')
						{
							$sql="SELECT to_char(fecenv,'dd/mm/yyyy') as fecenv FROM TMPORDPAGDES	WHERE NUMORD='".$tb->fields["numord"]."'";
							$tbFec=$this->bd->select($sql);
							if (!$tbFec->EOF)
							{
								$fecenv=$tbFec->fields["fecenv"];
							}
						}
						 if ($estado=='CONTRALORIA')
						{
							$sql="SELECT to_char(fecenvcon,'dd/mm/yyyy') as fecenv FROM OPORDPAG	WHERE NUMORD='".$tb->fields["numord"]."'";
							$tbFec=$this->bd->select($sql);
							if (!$tbFec->EOF)
							{
								$fecenv=$tbFec->fields["fecenv"];
							}
						}
						 if ($estado=='FINANZAS')
						{
							$sql="SELECT to_char(fecenvfin,'dd/mm/yyyy') as fecenv FROM OPORDPAG	WHERE NUMORD='".$tb->fields["numord"]."'";
							$tbFec=$this->bd->select($sql);
							if (!$tbFec->EOF)
							{
								$fecenv=$tbFec->fields["fecenv"];
							}
						}
						 if ($estado=='PAGADA')
						{
							$sql="SELECT to_char(fecent,'dd/mm/yyyy') as fecenv FROM TSCHEEMI	WHERE RTRIM(NUMCHE)='".$tb->fields["numord"]."'";
							$tbFec=$this->bd->select($sql);
							if (!$tbFec->EOF)
							{
								$fecenv=$tbFec->fields["fecenv"];
							}
						}
						if ($estado=='CUSTODIA')
						{
							$sql="SELECT to_char(fecemi,'dd/mm/yyyy') as fecenvFROM TSCHEEMI	WHERE RTRIM(NUMCHE)='".$tb->fields["numord"]."'";
							$tbFec=$this->bd->select($sql);
							if (!$tbFec->EOF)
							{
								$fecenv=$tbFec->fields["fecenv"];
							}
						}
					  	if ($estado=='ANULADA')
						{
							$sql="SELECT to_char(fecanu,'dd/mm/yyyy') as fecenv FROM OPORDPAG	WHERE  NUMORD='".$tb->fields["numord"]."'";
							$tbFec=$this->bd->select($sql);
							if (!$tbFec->EOF)
							{
								$fecenv=$tbFec->fields["fecenv"];
							}
						}
						if ($estado=='PARA ENVIAR A CONTRALORIA')
						{
							$sql="SELECT to_char(fecemi,'dd/mm/yyyy') as fecenv FROM OPORDPAG	WHERE  NUMORD='".$tb->fields["numord"]."'";
							$tbFec=$this->bd->select($sql);
							if (!$tbFec->EOF)
							{
								$fecenv=$tbFec->fields["fecenv"];
							}
						}

					 //////////////////////////////////////////////////////////////////////////////

					 	 if ($this->getY() >230 )
					{
						$this->AddPage();
					}
					$this->setFont("Arial","",7);
					 $this->cell($this->anchos[0],6,$tb->fields["numord2"]);
				     $this->cell($this->anchos[1],6,$tb->fields["numerotiq"]);
					 $this->cell(42,6," ");
					 $this->cell($this->anchos[3]-4,6,$numcuo);
					 $this->cell($this->anchos[4],6,number_format($montoTotal,2,'.',','),0,0,'R');
					$this->cell($this->anchos[5],6,"  ");
					 $this->cell($this->anchos[6],6,$tb->fields["fecemi"]);
					 $this->cell($this->anchos[7],6,$fecenv);
					 //$this->cell($this->anchos[8],6,$estado);

					 $this->setFont("Arial","",6);
					 $y=$this->GetY();
					 $this->setXY(45,$y);
					 $this->Multicell(38,3,$tb->fields["nomben"]); //Beneficiario

					 $z=$this->GetY();
					 $this->Setxy(130,$z-($z-$y));

					 $this->setXY(122,$y);
					 $this->Multicell(25,3,$tb->fields["nomext"]);// nro de orden

					 $l=$this->GetY();
					 $this->Setxy(180,$l-($l-$y));
					 $this->multicell(20,3,$estado); // estado


					 $con=$con+1;
					 $acuTot=$acuTot+$montoTotal;
					 $tb->MoveNext();
					 $this->ln(6);
  		  	}	//end while
			if ($this->getY() > 220 )
			{
				$this->AddPage();
			}
			 $this->ln(4);
			 $this->Line(20, $this->getY(),150,$this->getY());
			 $this->ln(2);
			 $this->setFont("Arial","B",8);
			 $this->cell(20,5,"TOTALES: ");
			 $this->cell(28,5,"NRO DE ORDENES: ");
			 $this->cell(20,5,$con);
			 $this->cell(14,5,"MONTO: ");
			 $this->cell($this->anchos[4],5,number_format($acuTot,2,'.',','),0,0,'R',1);

		}
	}
?>