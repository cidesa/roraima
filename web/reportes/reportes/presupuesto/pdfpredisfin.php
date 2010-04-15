<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	function TemporalTipGas($Mascara,$PerDesde,$PerHasta,$CodPreDesde,$CodPreHasta,$Comodin,$TipoGasto,$con)
        {
		 $sql="SELECT substr(A.codpre,1,".$Mascara.") as codpre,
				 sum(A.MonAsi) as monasi,
				 (sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) as modificacion,
				 (sum(A.MonAsi)+sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) as asigactual,
				  sum(A.MonPrc) as Monprc,
				  sum(A.MonCom) as moncom,
				  sum(A.MonDis) as mondis,
				  sum(A.MonCau) as moncau,
				  sum(A.MonPag) as monpag,
				  (sum(A.MonCau)-sum(A.MonPag)) as  Deuda
				FROM CPASIINI A,
					 CPDEFNIV B,
					 CPDEFTIT C
				WHERE
				   B.CodEmp = '001' AND
				   A.PerPre >= '".$PerDesde."' AND
				   A.PerPre <= '".$PerHasta."' AND
				   A.AnoPre >= RTRIM(TO_CHAR(B.FecIni,'YYYY')) And
				   A.AnoPre <= RTRIM(TO_CHAR(B.FecCie,'YYYY')) And
				   A.CODPRE = C.CODPRE AND
				   C.ESTATUS = '".$TipoGasto."' AND
				   RTRIM(A.codpre) >= '".$CodPreDesde."' AND
				   RTRIM(A.codpre) <= '".$CodPreHasta."' AND
				   substr(A.codpre,1,".$Mascara.") LIKE substr(A.codpre,1,".$Mascara.")||'%' AND
				   RTRIM(A.codpre) LIKE '".$Comodin."'
				   group by substr(A.codpre,1,".$Mascara.")";
	//		print $sql;
	//	    exit;

			$tb=$con->select($sql);
			while(!$tb->EOF)
			{
			  $sql1="insert into cpdisniv(codpre,monasi,modificacion,asigactual,monprc,moncom,mondis,moncau,monpag,deuda)
			  		 values ('".$tb->fields["codpre"]."','".$tb->fields["monasi"]."','".$tb->fields["modificacion"]."',
					 '".$tb->fields["asigactual"]."','".$tb->fields["monprc"]."','".$tb->fields["moncom"]."','".$tb->fields["mondis"]."',
					 '".$tb->fields["moncau"]."','".$tb->fields["monpag"]."','".$tb->fields["deuda"]."')";
			  $con->actualizar($sql1);
			  $tb->MoveNext();
			}

	}

	function Temporal($Mascara,$PerDesde,$PerHasta,$CodPreDesde,$CodPreHasta,$Comodin,$con)
        {
		 $sql="SELECT substr(A.codpre,1,".$Mascara.") as codpre,
				 sum(A.MonAsi) as monasi,
				 (sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) as modificacion,
				 (sum(A.MonAsi)+sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) as asigactual,
				  sum(A.MonPrc) as Monprc,
				  sum(A.MonCom) as moncom,
				  sum(A.MonDis) as mondis,
				  sum(A.MonCau) as moncau,
				  sum(A.MonPag) as monpag,
				  (sum(A.MonCau)-sum(A.MonPag)) as  Deuda
				FROM CPASIINI A,
					 CPDEFNIV B
				WHERE
				   B.CodEmp = '001' AND
				   A.PerPre >= '".$PerDesde."' AND
				   A.PerPre <= '".$PerHasta."' AND
				   A.AnoPre >= RTRIM(TO_CHAR(B.FecIni,'YYYY')) And
				   A.AnoPre <= RTRIM(TO_CHAR(B.FecCie,'YYYY')) And
				   RTRIM(A.codpre) >= '".$CodPreDesde."' AND
				   RTRIM(A.codpre) <= '".$CodPreHasta."' AND
				   substr(A.codpre,1,".$Mascara.") LIKE substr(A.codpre,1,".$Mascara.")||'%' AND
				   RTRIM(A.codpre) LIKE '".$Comodin."'
				   group by substr(A.codpre,1,".$Mascara.")";

			$tb=$con->select($sql);
			while(!$tb->EOF)
			{
			  $sql1="insert into cpdisniv(codpre,monasi,modificacion,asigactual,monprc,moncom,mondis,moncau,monpag,deuda)
			  		 values ('".$tb->fields["codpre"]."','".$tb->fields["monasi"]."','".$tb->fields["modificacion"]."',
					 '".$tb->fields["asigactual"]."','".$tb->fields["monprc"]."','".$tb->fields["moncom"]."','".$tb->fields["mondis"]."',
					 '".$tb->fields["moncau"]."','".$tb->fields["monpag"]."','".$tb->fields["deuda"]."')";
			  $con->actualizar($sql1);
			  $tb->MoveNext();
			}
			}

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
		var $codigo1;
		var $codigo2;
		var $periodo1;
		var $periodo2;
		var $comodin;
		var $nivel1;
		var $nivel2;
		var $tipopre;
		var $empresa;
		var $mascara;
		var $lonnivdes;
		var $lonnivhas;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codigo1=$_POST["codigo1"];
			$this->codigo2=$_POST["codigo2"];
			$this->periodo1=$_POST["periodo1"];
			$this->periodo2=$_POST["periodo2"];
			$this->nivel1=$_POST["nivel1"];
			$this->nivel2=$_POST["nivel2"];
			$this->tipopre=$_POST["tipopre"];
			$this->comodin=$_POST["comodin"];


			$this->lonnivdes=0;
			 $sql="SELECT sum(coalesce(length(rtrim(NOMABR)), 0)) as lonnivdes
				   FROM CPNIVELES
				   WHERE CONSEC <= ".$this->nivel1."";
			$mytb=$this->bd->select($sql);
			if (!$mytb->EOF){$this->lonnivdes=$mytb->fields["lonnivdes"];}
            $this->lonnivdes=$this->lonnivdes + ($this->nivel1 - 1);


			 $sql="SELECT sum(coalesce(length(rtrim(NOMABR)), 0)) as lonnivhas
				   FROM CPNIVELES
				   WHERE CONSEC <= ".$this->nivel2."";
			$mytb=$this->bd->select($sql);
			if (!$mytb->EOF){$this->lonnivhas=$mytb->fields["lonnivhas"];}
	        if ($this->nivel2>=11)
                 $this->lonnivhas=$this->lonnivhas + ($this->nivel2);
	        else
	             $this->lonnivhas=$this->lonnivhas + ($this->nivel2-1) ;


			$this->sql="SELECT
						SUBSTR(A.CODPRE,1,2) as sector,
						SUBSTR(A.CODPRE,1,5) as programa,
						SUBSTR(A.CODPRE,1,8) as actividad,
						A.CODPRE as codpre,
						RTRIM(B.Nompre) as nompre,
						A.Modificacion,
						A.MonPrc,
						A.MonCom,
						A.MonCau,
						A.MonPag,
						CASE WHEN LENGTH(RTRIM(A.CODPRE))= ".$this->lonnivhas." THEN A.MODIFICACION ELSE 0 END as monmodult,
						CASE WHEN LENGTH(RTRIM(A.CODPRE))= ".$this->lonnivhas." THEN A.MONPRC ELSE 0 END as monprcult,
						CASE WHEN LENGTH(RTRIM(A.CODPRE))= ".$this->lonnivhas." THEN A.MONCOM ELSE 0 END as moncomult,
						CASE WHEN LENGTH(RTRIM(A.CODPRE))= ".$this->lonnivhas." THEN A.MONCAU ELSE 0 END as moncauult,
						CASE WHEN LENGTH(RTRIM(A.CODPRE))= ".$this->lonnivhas." THEN A.MONPAG ELSE 0 END as monpagult,
						CASE WHEN LENGTH(RTRIM(A.CODPRE))= ".$this->lonnivhas." THEN A.MONCAU-A.MONPAG ELSE 0 END as monpenult
						FROM
						CPDISNIV A,
						CPDEFTIT B
						WHERE  RTRIM(B.CODPRE)=RTRIM(A.CODPRE) AND
						LENGTH(RTRIM(A.CODPRE))>=".$this->lonnivdes." AND
						LENGTH(RTRIM(A.CODPRE))<=".$this->lonnivhas."
						ORDER BY A.CODPRE";

			$this->llenartitulosmaestro();
			$this->SetAutoPageBreak(true,15 );
		}




		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo Presupuestario";
				$this->titulos[1]="           Descripcion";
				$this->titulos[2]="         Creditos";
				$this->titulos[3]="            Gasto";
				$this->titulos[4]="     Disponibilidad";
				$this->anchos[0]=45;
				$this->anchos[1]=60;
				$this->anchos[2]=30;
				$this->anchos[3]=30;
				$this->anchos[4]=30;

				$this->titulos2[0]="";
				$this->titulos2[1]="  Codigo Presupuestario";
				$this->titulos2[2]="   Presupuestarios";
				$this->titulos2[3]="           Pagado";
				$this->titulos2[4]="        Financiera";

		}

		function Header()
		{

			$this->mascara=" ";
			$sql="Select obtener_mascara() as mascara";
			$mytb=$this->bd->select($sql);
			if (!$mytb->EOF){$this->mascara=$mytb->fields["mascara"];}

			$sql="SELECT TO_CHAR(FECPER,'YYYY') as anno FROM CPDEFNIV";
			$mytb=$this->bd->select($sql);
			if (!$mytb->EOF){$anno=$mytb->fields["anno"];}

			if ($this->tipopre=='F') {$TipPre="FINANCIAMIENTO";}
			if ($this->tipopre=='G') {$TipPre="GENERAL";}
			if ($this->tipopre=='I') {$TipPre="INVERSION";}


			$this->SetTextColor(0,0,128);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->SetDrawColor(255,255,255);
			$this->Line(10,35,270,35);
			$this->SetDrawColor(0,0,0);
			$this->SetTextColor(135,0,0);
			$this->setFont("Arial","B",9);
			$this->SetY(32);
			$this->cell(180,10,"(En Bolivares)",0,0,'C',0);
			$this->ln(8);
			$this->SetTextColor(0,0,128);
			$this->cell(30,5,"  Año : ".$anno);
			$this->SetTextColor(0,0,0);
			$this->cell(130,5,"  Periodo : ".$this->FecPerEje($this->periodo1)."   Al   ".$this->FecPerEje($this->periodo2));
			$this->SetTextColor(0,0,128);
			$this->cell(20,5,$TipPre);
			$this->ln(7);
			$this->Line(10,$this->GetY(),205,$this->GetY());
			$this->SetTextColor(135,0,0);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(4);

			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos2[$i]);
			}
			$this->SetX(10);
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","",7);
			$this->cell(20,10,$this->mascara);
			$this->SetTextColor(135,0,0);
			$this->setFont("Arial","B",9);
			$this->ln(4);
			$this->SetX(113);
			$this->cell(20,10,"Asignación Modificada");

			$this->ln(9);
			$this->Line(10,$this->GetY(),205,$this->GetY());
			$this->ln(4);
		}

		function Cuerpo()
		{
		   ////CODIGO DEL BEFORE REPORT//////////////////////////////////////////////////////////////////////////////////////////////
		     $sql="SELECT NOMEMP as empresa FROM EMPRESA";
			  $mytb=$this->bd->select($sql);
			  if (!$mytb->EOF){$this->empresa=$mytb->fields["empresa"];}


			  $lenmascara=0;
			  $sql="select sum(lonniv) as lenmascara from cpniveles where consec<=".$this->nivel2."";
  			  $tb1=$this->bd->select($sql);
			  if (!$tb1->EOF){$lenmascara=$tb1->fields["lenmascara"];}
              $lenmascara=$lenmascara + $this->nivel2 - 1;


  		      $sqlD="DELETE FROM CPDISNIV";
			  $this->bd->actualizar($sqlD);

			  $mysql="select consec,lonniv from cpniveles where consec<=".$this->nivel2." order by consec desc";
			  $mytb=$this->bd->select($mysql);
			  $cont=0;
			  while(!$mytb->EOF)
			  {
				if ($this->tipopre=='F' || $this->tipopre=='I')
				{
				   TemporalTipGas($lenmascara,$this->periodo1,$this->periodo2,rtrim($this->codigo1),rtrim($this->codigo2),$this->comodin,$this->tipopre,$this->bd);
				}
				else
				{
				   Temporal($lenmascara,$this->periodo1,$this->periodo2,rtrim($this->codigo1),rtrim($this->codigo2),$this->comodin,$this->bd);
				}
				$cont=$mytb->fields["lonniv"];

				if ($mytb->fields["consec"]!=1)
				 {
				   $lenmascara=$lenmascara - $cont - 1;
				 }
				else
				{
				   $lenmascara=$lenmascara - $cont;
				}
				$mytb->MoveNext();
               } //end while
		    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		    $tb=$this->bd->select($this->sql);
			if (!$tb->EOF)
			 {
			 	$actividad=trim($tb->fields["actividad"]);
				$programa=trim($tb->fields["programa"]);
				$sector=trim($tb->fields["sector"]);
			 }
			$TotTotCrePre=0;
			$TotTotGasPag=0;
			$TotTotDispon=0;
			$TotCrePreSec=0;
			$TotGasPagSec=0;
			$TotDisponSec=0;
			$TotCrePrePro=0;
			$TotGasPagPro=0;
			$TotDisponPro=0;
			$TotCrePreAct=0;
			$TotGasPagAct=0;
			$TotDisponAct=0;
			while(!$tb->EOF)
			{
				 if  (trim($tb->fields["nompre"]) !="")
				  {
				    $Print="S";
				  }
				  else
				  {
				    $Print="N";
				  }
	/*			  if (strlen(rtrim($tb->fields["codpre"]))==8)
				  {
				 	if (trim(substr($tb->fields["codpre"],6,2))=='00')
					 {
						 $Print="N";
					  }
					 else
					 {
						  $Print="S";
					 }
				  }
				  elseif (strlen(rtrim($tb->fields["codpre"]))==24)
				  {
					 if (substr($tb->fields["codpre"],22,2)=='00')
					 {
						 $Print="N";
					  }
					 else
					 {
						  $Print="S";
					 }
				  }
				  elseif (strlen(rtrim($tb->fields["codpre"]))==28)
				    {
					 if (substr($tb->fields["codpre"],25,3)=='000')
					 {
						 $Print="N";
					  }
					 else
					 {
						  $Print="S";
					 }
					}
				  else
				   {
					  $Print="S";
				   }*/


				   ////////PARA CALCULAR TOTALES POR ACTIVIDAD, PROGRAMA Y SECTOR ///////////////////////////////////
				   /////ACTIVIDAD
				   if ($actividad!=trim($tb->fields["actividad"]) and strlen($actividad)==8) //grupo actividad
				   { //////////MOSTRAR TOTALES ACTIVIDAD /////////////////
					    $this->setFont("Arial","B",7.5);
						$this->cell($this->anchos[0] + $this->anchos[1]-3,3,"");
						$this->cell($this->anchos[2],3,number_format($TotCrePreAct,2,',','.'),0,0,'R');
						$this->cell($this->anchos[2],3,number_format($TotGasPagAct,2,',','.'),0,0,'R');
						$this->cell($this->anchos[2],3,number_format($TotDisponAct,2,',','.'),0,0,'R');
					  	$this->SetX(52);
						$this->multicell($this->anchos[1],3,"TOTAL ACTIVIDAD",0,'l');
					    $this->ln(2);
						$TotCrePreAct=0;
						$TotGasPagAct=0;
						$TotDisponAct=0;
				   }
				   ////PROGRAMA
				   if ($programa!=trim($tb->fields["programa"]) and strlen($programa)>=5) //grupo programa
				   { //////////MOSTRAR TOTALES PROGRMA /////////////////
					    $this->setFont("Arial","B",7.5);
						$this->cell($this->anchos[0] + $this->anchos[1]-3,3,"");
						$this->cell($this->anchos[2],3,number_format($TotCrePrePro,2,',','.'),0,0,'R');
						$this->cell($this->anchos[2],3,number_format($TotGasPagPro,2,',','.'),0,0,'R');
						$this->cell($this->anchos[2],3,number_format($TotDisponPro,2,',','.'),0,0,'R');
					  	$this->SetX(52);
						$this->multicell($this->anchos[1],3,"TOTAL PROGRAMA",0,'l');
					    $this->ln(2);
						$TotCrePreAct=0;
						$TotGasPagAct=0;
						$TotDisponAct=0;
						$TotCrePrePro=0;
						$TotGasPagPro=0;
						$TotDisponPro=0;
				   }
				   ////SECTOR
				   if ($sector!=trim($tb->fields["sector"]) and strlen($sector)==2) //grupo sector
				   { //////////MOSTRAR TOTALES PROGRMA /////////////////
				    $this->setFont("Arial","B",7.5);
					$this->cell($this->anchos[0] + $this->anchos[1]-3,3,"");
					$this->cell($this->anchos[2],3,number_format($TotCrePreSec,2,',','.'),0,0,'R');
					$this->cell($this->anchos[2],3,number_format($TotGasPagSec,2,',','.'),0,0,'R');
					$this->cell($this->anchos[2],3,number_format($TotDisponSec,2,',','.'),0,0,'R');
				  	$this->SetX(52);
					$this->multicell($this->anchos[1],3,"TOTAL SECTOR",0,'l');
				    $TotCrePreAct=0;
					$TotGasPagAct=0;
					$TotDisponAct=0;
					$TotCrePrePro=0;
					$TotGasPagPro=0;
					$TotDisponPro=0;
					$TotCrePreSec=0;
					$TotGasPagSec=0;
					$TotDisponSec=0;
					$this->AddPage();
				   }
				   	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
				    ////// CALCULA MONASI /////////////////////////////////////////////////////////////////////////////////////////
					$monasi=0;
					if ($this->tipopre=='F' || $this->tipopre=='I')
					{
					  $sqlM="SELECT SUM(A.MONASI) as monto FROM CPASIINI A,CPDEFTIT C
							 WHERE A.CODPRE LIKE RTRIM('".$tb->fields["codpre"]."')||'%' AND
							  A.PERPRE='00' AND
							  C.ESTATUS = '".$this->tipopre."' AND
							  A.CODPRE=C.CODPRE and a.codpre like '".$this->comodin."'";
						$tbM=$this->bd->select($sqlM);
			  			if (!$tbM->EOF){$monasi=$tbM->fields["monto"];}
					}
					else
					 {
						$sqlM="SELECT SUM(A.MONASI) as monto FROM CPASIINI A
								WHERE A.CODPRE LIKE RTRIM('".$tb->fields["codpre"]."')||'%' AND
							  	A.PERPRE='00' and a.codpre like'".$this->comodin."'";
						$tbM=$this->bd->select($sqlM);
			  			if (!$tbM->EOF){$monasi=$tbM->fields["monto"];}
					 }
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////
				    $actividad=trim($tb->fields["actividad"]);
					$programa=trim($tb->fields["programa"]);
  					$sector=trim($tb->fields["sector"]);

					$MonAsiActual=$monasi + $tb->fields["modificacion"];
					$mondis=$MonAsiActual - $tb->fields["monpag"];
					if ($Print=="S")
				    {
						$this->setFont("Arial","",7.5);
						$this->cell($this->anchos[0],3,$tb->fields["codpre"]);
						$this->cell($this->anchos[1]-3,3,"");
						$this->cell($this->anchos[2],3,number_format($MonAsiActual,2,',','.'),0,0,'R');
						$this->cell($this->anchos[2],3,number_format($tb->fields["monpag"],2,',','.'),0,0,'R');
						$this->cell($this->anchos[2],3,number_format($mondis,2,',','.'),0,0,'R');
						$this->SetX(56);
						$this->multicell($this->anchos[1]-4,3,$tb->fields["nompre"],0,'l');
						$this->ln(2);
					}//   if ($Print=="S")
					//////////////////ACUMULADORES /////////////////////////////////////////////////////////////////
				//	print "<br> Len codpre " .strlen(rtrim($tb->fields["codpre"]))." y lon hasta ".$this->lonnivhas ;
					if (strlen(rtrim($tb->fields["codpre"]))==$this->lonnivhas)
					{
						$TotCrePreAct= $TotCrePreAct + $MonAsiActual;
						$TotCrePrePro= $TotCrePrePro + $MonAsiActual;
						$TotCrePreSec= $TotCrePreSec + $MonAsiActual;
						$TotTotCrePre=$TotTotCrePre + $MonAsiActual;
					}
					$TotGasPagAct= $TotGasPagAct + $tb->fields["monpagult"];
					$TotGasPagPro=$TotGasPagPro + $tb->fields["monpagult"];
					$TotGasPagSec= $TotGasPagSec + $tb->fields["monpagult"];
					$TotDisponAct=$TotCrePreAct - $TotGasPagAct;
					$TotDisponPro =($TotCrePrePro - $TotGasPagPro);
					$TotDisponSec= ($TotCrePreSec - $TotGasPagSec) ;
					///////////TOTALES TOTALES///////////////
					$TotTotGasPag=$TotTotGasPag + $tb->fields["monpagult"];
					$TotTotDispon=($TotTotCrePre - $TotTotGasPag);
					//////////////
				$tb->MoveNext();
			}
			//MOSTRAR LOS TOTALES QUE QUEDARON DESPUES DEL CICLO
				$this->setFont("Arial","B",7.5);
			////////MOSTRAR TOTALES ACTIVIDAD /////////////////
			 if (strlen($actividad)==8) //grupo actividad
			 {
				$this->cell($this->anchos[0] + $this->anchos[1]-3,3,"");
				$this->cell($this->anchos[2],3,number_format($TotCrePreAct,2,',','.'),0,0,'R');
				$this->cell($this->anchos[2],3,number_format($TotGasPagAct,2,',','.'),0,0,'R');
				$this->cell($this->anchos[2],3,number_format($TotDisponAct,2,',','.'),0,0,'R');
				$this->SetX(52);
				$this->multicell($this->anchos[1],3,"TOTAL ACTIVIDAD",0,'l');
				$this->ln(2);
			}
			//////////MOSTRAR TOTALES PROGRAMA /////////////////
			if (strlen($programa)>=5) //grupo programa
			 {
				$this->cell($this->anchos[0] + $this->anchos[1]-3,3,"");
				$this->cell($this->anchos[2],3,number_format($TotCrePrePro,2,',','.'),0,0,'R');
				$this->cell($this->anchos[2],3,number_format($TotGasPagPro,2,',','.'),0,0,'R');
				$this->cell($this->anchos[2],3,number_format($TotDisponPro,2,',','.'),0,0,'R');
				$this->SetX(52);
				$this->multicell($this->anchos[1],3,"TOTAL PROGRAMA",0,'l');
				$this->ln(2);
			}
				//////////MOSTRAR TOTALES SECTOR /////////////////
			if (strlen($sector)==2) //grupo actividad
			 {
				$this->cell($this->anchos[0] + $this->anchos[1]-3,3,"");
				$this->cell($this->anchos[2],3,number_format($TotCrePreSec,2,',','.'),0,0,'R');
				$this->cell($this->anchos[2],3,number_format($TotGasPagSec,2,',','.'),0,0,'R');
				$this->cell($this->anchos[2],3,number_format($TotDisponSec,2,',','.'),0,0,'R');
				$this->SetX(52);
				$this->multicell($this->anchos[1],3,"TOTAL SECTOR",0,'l');
				$this->ln(5);
             }
			$this->SetTextColor(0,0,128);
			$this->cell($this->anchos[0] + $this->anchos[1]-3,3,"");
			$this->cell($this->anchos[2],3,number_format($TotTotCrePre,2,',','.'),0,0,'R');
			$this->cell($this->anchos[2],3,number_format($TotTotGasPag,2,',','.'),0,0,'R');
			$this->cell($this->anchos[2],3,number_format($TotTotDispon,2,',','.'),0,0,'R');
			$this->SetX(52);
			$this->multicell($this->anchos[1],3,"TOTALES",0,'l');

			$sqlD="DELETE FROM CPDISNIV";
			$this->bd->actualizar($sqlD);
		}
	}
?>