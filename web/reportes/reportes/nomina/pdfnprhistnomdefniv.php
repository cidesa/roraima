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
		var $empdes;
		var $emphas;
		var $cardes;
		var $carhas;
		var $nivdes;
		var $nivhas;
		var $condes;
		var $conhas;
		var $revisado;
		var $autorizado;
		var $elaborado;
		var $tipnomdes;
		var $tipnomesp;


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
			$this->empdes=$_POST["empdes"];
			$this->emphas=$_POST["emphas"];
			$this->cardes=$_POST["cardes"];
			$this->carhas=$_POST["carhas"];
			$this->nivdes=$_POST["nivdes"];
			$this->nivhas=$_POST["nivhas"];
			$this->condes=$_POST["condes"];
			$this->conhas=$_POST["conhas"];
			$this->fechades=$_POST["fechades"];
	        $this->fechahas=$_POST["fechahas"];
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->tipnomesp=$_POST["tipnomesp"];
			$this->elaborado=$_POST["elaborado"];
			$this->elaboradocar=$_POST["elaboradocar"];
			$this->revisado=$_POST["revisado"];
			$this->revisadocar=$_POST["revisadocar"];
			$this->revisado2=$_POST["revisado2"];
			$this->revisado2car=$_POST["revisado2car"];
			$this->revisado3=$_POST["revisado3"];
			$this->revisado3car=$_POST["revisado3car"];
			$this->autorizado=$_POST["autorizado"];
			$this->autorizadocar=$_POST["autorizadocar"];
			$this->especial=$_POST["especial"];


            if ($this->especial == 'S')
            {
                $especial = " G.especial = 'S' AND
                (G.CODNOMESP) = TRIM('".$this->tipnomesp."') and  ";
            }
            else
            {  if ($this->especial == 'N')           $especial = " G.especial = 'N' AND";
            }

			$this->sqll="	SELECT DISTINCT(C.CODEMP) as codemp, to_char(C.FECRET,'dd/mm/yyyy') as fecret,
						C.NOMEMP as nomemp,	B.CODCAR, d.codcat as codcta,	d.nomcat as nomcat,
						to_char(C.FECING,'dd/mm/yyyy') as fecing,
						C.NUMCUE as CUENTA_BANCO,C.CODNIV as codniv, C.CEDEMP as cedemp,
						f.nomban as nomban,	LTRIM(RTRIM(B.CODCAR)) as CODCAR, cast(B.CODCAR as int ) as codcarord,B.NOMCAR as nomcar,
						E.DESNIV as desniv,
						(CASE WHEN C.STAEMP='A' THEN 'ACTIVO' WHEN C.STAEMP='S' THEN 'SUSPENDIDO' WHEN C.STAEMP='V' THEN 'VACACIONES' ELSE '' END) as ESTATUS,
						G.CODCON as codcon,	LTRIM(RTRIM(H.NOMCON)) AS NOMCON,
						(CASE WHEN H.OPECON='A' THEN coalesce(sum(G.MONTO),0) ELSE 0 END) as ASIGNA,
						(CASE WHEN H.OPECON='D' THEN coalesce(sum(G.MONTO),0) ELSE 0 END) as DEDUC, cast(REPLACE(c.cedemp,'.', '') as int )
						FROM
						NPHOJINT C LEFT OUTER JOIN npbancos f ON (C.CODBAN=f.codban),
						NPASICAREMP B,	NPCATPRE D,	NPESTORG E,	nphiscon G,	NPDEFCPT H
						WHERE
						C.CODEMP <= '".$this->emphas."' AND
						C.CODEMP >= '".$this->empdes."' AND
						C.CODNIV >= '".$this->nivdes."' AND
						C.CODNIV <= '".$this->nivhas."' AND
						B.CODCAR >= '".$this->cardes."' AND
					    B.CODCAR <= '".$this->carhas."' AND
						G.CODCON >= '".$this->condes."' AND
						G.CODCON <= '".$this->conhas."' AND  ".$especial."
						B.CODEMP=C.CODEMP AND
						G.CODEMP=C.CODEMP AND
						G.CODCON=H.CODCON AND
					    D.CODCAT=B.CODCAT AND
					    E.CODNIV=C.CODNIV AND
					    B.CODNOM = '".$this->tipnomdes."' AND
						G.CODNOM = '".$this->tipnomdes."' AND
						B.STATUS='V' AND
						H.IMPCPT='S' and
	                    g.fecnomdes>=to_date('".$this->fechades."','dd/mm/yyyy') and
		                g.fecnom<=to_date('".$this->fechahas."','dd/mm/yyyy')
						GROUP BY
						C.CODEMP, C.FECRET,
						C.NOMEMP ,	B.CODCAR, d.codcat ,	d.nomcat ,
						C.FECING,
						C.NUMCUE ,C.CODNIV , C.CEDEMP ,
						f.nomban ,	LTRIM(RTRIM(B.CODCAR)) , cast(B.CODCAR as int ) ,B.NOMCAR ,
						E.DESNIV ,
						C.STAEMP,
						G.CODCON ,H.NOMCON,
						H.OPECON
						ORDER BY C.CODNIV,codcta, codcarord, cast(REPLACE(c.cedemp,'.', '') as int )";



					//	H::PrintR ($this->sqll); exit;


}


		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
			$rs=$this->bd->select("select nomnom as nombre from NPASICAREMP where codnom='".$this->tipnomdes."'");
			$band=false;
			if(!$rs->EOF)
			{
				$this->nombre=$rs->fields["nombre"];
			}

			$sr=$this->bd->select("SELECT frecal, numsem, to_char(ULTFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnomdes."',3,' ')");
			if(!$sr->EOF)
			{
				if($sr->fields["frecal"]=='S')
				{
					$band=true;
					$fechasem=$sr->fields["numsem"];

				}
				$fechad=$sr->fields["fecha"];

			}
			$ss=$this->bd->select("SELECT to_char(PROFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnomdes."',3,' ')");
			if(!$ss->EOF)
			{
				$fechah=$ss->fields["fecha"];
			}
			$this->cell(0,5,'NOMINA: '.$this->tipnomdes.' - '.$this->nombre.' PERIODO DEL: '.$this->fechades.' AL '.$this->fechahas,0,0,'');
		//	$this->cell(60,5,'PERIODO DEL: '.$fechad.' AL '.$fechah);
			if($band==true)
			{
				$this->cell(40,5,'SEMANA Nro: '.$fechasem);
			}
			$this->ln(5);
			//print $rs;exit;

		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sqll);

		  	$tb2=$this->bd->select($this->sqll);
		    //print $tb2;
			$ref='';
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
			$van = 0;
			$hayunid = 0;
			$niv=$tb->fields["codniv"];
			$cta=$tb->fields["codcta"];

				 $ref=$tb->fields["codemp"];
				 $niv=$tb->fields["codniv"];
				 $contador=$contador+1;
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'UNIDAD:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(60,5,$tb->fields["codniv"].' '.$tb->fields["desniv"],0,0,'');$this->ln();
				 $unidad=$tb->fields["desniv"];
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'CATEGORIA:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(60,5,$tb->fields["codcta"].' '.$tb->fields["nomcat"]);
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->SetFillColor(195,195,195);
				 $this->setFont("Arial","B",7);
				 $this->cell(70,3,$tb->fields["codemp"].' '.$tb->fields["nomemp"],0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'CARGO:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(60,5,$tb->fields["codcar"].' - '.$tb->fields["nomcar"]);
				 $this->ln(4);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Fecha de Ingreso:  ');
				 $this->setFont("Arial","",8);
				 $this->cell(65,5,$tb->fields["fecing"]);
				 //$this->setFont("Arial","B",8);
				 //$this->cell(25,5,'Fecha de Egreso:  ');
				 //$this->setFont("Arial","",8);
				 //$this->cell(30,5,$tb->fields["fecret"]);
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'SUELDO:  ');
				/* $gp=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as VALOR FROM NPASICONEMP A,NPCONSUELDO B WHERE (CODEMP) =RPAD('".$tb->fields["codemp"]."',16,' ') AND (CODCAR) =RPAD('".$tb->fields["codcar"]."',16,' ') AND A.CODCON=B.CODCON");


				 if(!$gp->EOF)
				 {
				 	$sueldo=$gp->fields["valor"];
				 }*/

				 $suelrs=$this->bd->select("select suecar as valor from npcargos where rpad(codcar,16,' ') =rpad('".$tb->fields["codcar"]."',16,' ')");
				 $sueldo = $suelrs->fields["valor"];
				 $this->cell(30,5,number_format($sueldo,2,',','.'));
				 $this->ln(4);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Centro de Pago:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(65,5,$tb->fields["nomban"]);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Cuenta Bancaria:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(60,5,$tb->fields["cuenta_banco"]);
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'Codigo');
				 $this->cell(90,5,'Nombre del Concepto');
				 //$this->cell(20,5,'');
				 $this->cell(25,5,'Asignacion');
				 $this->cell(25,5,'Deduccion');
				 $this->cell(25,5,'');
				  //$this->cell(25,5,'Saldo');
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $sueldo=0;

			while(!$tb->EOF)
			{
				if($tb->fields["codemp"]!=$ref)
				{
				 $this->setFont("Arial","B",8);
				 $this->ln(2);
				 $this->line(100,$this->getY(),200,$this->getY());
				 //totales
				 $cont=$cont+1;
				 $this->cell(20,5,'');
				 $this->cell(70,5,'');
				 $this->cell(20,5,'Total ');
				 $this->cell(25,5,number_format($acum1,2,',','.'));
				 $this->cell(25,5,number_format($acum2,2,',','.'));
				 $this->ln(4);
				 $this->cell(20,5,'');
				 $this->cell(70,5,'');
				 $this->cell(20,3,'Neto ');
				 $this->SetFillColor(195,195,195);
				 $this->cell(25,3,number_format(($acum1-$acum2),2,',','.'),0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->cell(25,5,'');
				 $this->ln(5);
				 $acum1=0;
				 $acum2=0;
				 //
				 if($tb->fields["codniv"]!=$niv ||  $tb->fields["codcta"]!=$cta )
				 {
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->cell(110,5,'TOTAL:  '.$unidad);
				 	$this->cell(25,5,number_format($totacum1,2,',','.'));
				 	$this->cell(25,5,number_format($totacum2,2,',','.'));
				 	$this->cell(25,5,number_format(($totacum1-$totacum2),2,',','.'));
					$total1=$total1+$totacum1;
					$total2=$total2+$totacum2;
					//$total3=$total3+($totacum1-$totacum2);
				 	$totacum1=0;
				 	$totacum2=0;
				 	//
				 	$acumulado=0;
					$this->ln(4);
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->cell(50,5,'CANTIDAD DE TRABAJADORES: '.$cont);
					$cont=0;
					$this->ln(4);
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->ln(6);
				 	if ($van >= 2)
					{
				 		$van = 0;
				 		$this->addpage();
				 	}
				 	$hayunid = 0;
				 	$this->cell(20,5,'UNIDAD:  ');
				 	$this->setFont("Arial","",7);
				 	$this->cell(60,5,$tb->fields["codniv"].' '.$tb->fields["desniv"]);$this->ln();
				 	$unidad=$tb->fields["desniv"];
				 	$this->setFont("Arial","B",8);
				 	$this->cell(20,5,'CATEGORIA:  ');
				 	$this->setFont("Arial","",7);
				 	$this->cell(60,5,$tb->fields["codcta"].' '.$tb->fields["nomcat"]);
				 	$this->ln(5);
				 }
				  	if ($van >= 2+$hayunid or $this->posicion>150){
					$van = 0;
					$hayunid = 1;
					$this->addpage();
				}
				else {
					$van++;
					//$this->ln(15);
				}


				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $niv=$tb->fields["codniv"];
				 $cta=$tb->fields["codcta"];
				 $this->setFont("Arial","B",7);
				 $this->SetFillColor(195,195,195);
				 $this->cell(70,3,$tb->fields["codemp"].' '.$tb->fields["nomemp"],0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'CARGO:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(60,5,$tb->fields["codcar"].' - '.$tb->fields["nomcar"]);
				 $this->ln(4);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Fecha de Ingreso:  ');
				 $this->setFont("Arial","",8);
				 $this->cell(65,5,$tb->fields["fecing"]);
				 //$this->setFont("Arial","B",8);
				 //$this->cell(25,5,'Fecha de Egreso:  ');
				 //$this->setFont("Arial","",8);
				 //$this->cell(30,5,$tb->fields["fecret"]);
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'SUELDO:  ');
				 /*
				 $gp=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as VALOR FROM NPASICONEMP A,NPCONSUELDO B WHERE (CODEMP) ='".$tb->fields["codemp"]."' AND (CODCAR) ='".$tb->fields["codcar"]."' AND A.CODCON=B.CODCON");
				 if(!$gp->EOF)
				 {
				 	$sueldo=$gp->fields["valor"];
				 }
				*/
				$suelrs=$this->bd->select("select suecar as valor from npcargos where codcar ='".$tb->fields["codcar"]."'");
				 $sueldo = $suelrs->fields["valor"];
				 $this->cell(30,5,number_format($sueldo,2,',','.'));
				 $this->ln(4);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Centro de Pago:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(65,5,$tb->fields["nomban"]);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Cuenta Bancaria:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(60,5,$tb->fields["cuenta_banco"]);
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'Codigo');
				 $this->cell(90,5,'Nombre del Concepto');
				 //$this->cell(20,5,'Cantidad');
				 $this->cell(25,5,'Asignacion');
				 $this->cell(25,5,'Deduccion');
				 $this->cell(25,5,'');
				 //$this->cell(25,5,'Saldo');
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $contador=$contador + 1;
				}

				 $this->setFont("Arial","",8);
				 $nl = $this->nblines(90,$tb->fields["nomcon"]);
				if (5*$nl+$this->gety()>$this->PageBreakTrigger) $this->addpage();

				 $this->cell(20,5,$tb->fields["codcon"]); $this->setXY($this->getx(), $this->gety()+1);
				    $this->posicion=$this->gety();
					 $x=$this->GetX();
					 $y=$this->getY();
				$this->multicell(90,3,$tb->fields["nomcon"],0,'L');
				//$this->cell(90,5,$tb->fields["nomcon"]);
				 $this->setXY($x+90, $y-1);
				 //$this->cell(20,5,'');
				 $this->cell(25,5,number_format($tb->fields["asigna"],2,',','.'), 0, 'R');
				 $acum1=$acum1+$tb->fields["asigna"];
				 $totacum1=$totacum1+$tb->fields["asigna"];
				 $this->cell(25,5,number_format($tb->fields["deduc"],2,',','.'));
				 //$this->ln(3*($nl-1));

				 $acum2=$acum2+$tb->fields["deduc"];
				 $totacum2=$totacum2+$tb->fields["deduc"];
				 $hh=$this->bd->select("SELECT coalesce(ACUMULADO,0) as SALDO FROM NPASICONEMP
				 WHERE CODCAR = RTRIM('".$tb->fields["codcar"]."') AND CODEMP=rtrim('".$tb->fields["codemp"]."') AND CODCON='".$tb->fields["codcon"]."'");
				 //H::PrintR ($hh); exit;
				 if(!$hh->EOF)
				 {
				 	$saldo=$hh->fields["saldo"];
				 }
				 $acumulado=$saldo;
				 $p=$this->bd->select("SELECT CODTIPPRE as VALOR FROM NPTIPPRE WHERE CODCON='".$tb->fields["codcon"]."'");
				 if(!$p->EOF)
				 {
				 	$tipo=$p->fields["valor"];
				 }
				 if(($tipo==NULL)||($saldo==0))
				 {
				 	$acumulado=0;
				 }
				 else
				 {
				 	$acumulado=$saldo;
				 }

			//	 $this->cell(25,5,number_format($acumulado,2,',','.'));
				 $this->ln(3*($nl-1));
				 $ref=$tb->fields["codemp"];
				 $tb->MoveNext();
			     $this->ln(3);
			}
				$this->setFont("Arial","B",8);
				 $this->ln(2);
				 $this->line(100,$this->getY(),200,$this->getY());
				 //totales
				 $this->cell(20,5,'');
				 $this->cell(70,5,'');
				 $this->cell(20,5,'Total ');
				 $this->cell(25,5,number_format($acum1,2,',','.'));
				 $this->cell(25,5,number_format($acum2,2,',','.'));
				 $this->ln(4);
				 $this->cell(20,5,'');
				 $this->cell(70,5,'');
				 $this->cell(20,3,'Neto ');
				 $this->SetFillColor(195,195,195);
				 $this->cell(25,3,number_format(($acum1-$acum2),2,',','.'),0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->cell(25,5,'');
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(110,5,'TOTAL:  '.$unidad);
				 $this->cell(25,5,number_format($totacum1,2,',','.'));
				 $acum1=0;
				 $this->cell(25,5,number_format($totacum2,2,',','.'));
				 $acum2=0;
				 $this->cell(25,5,number_format(($totacum1-$totacum2),2,',','.'));
				 $total1=$total1+$totacum1;
				 $total2=$total2+$totacum2;
				 $total3=$total3+($total1-$total2);
				 $totacum1=0;
				 $totacum2=0;
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(50,5,'CANTIDAD DE TRABAJADORES: '.($cont+1));
				 $cont=0;
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(3);
				 $this->cell(110,5,'TOTAL NOMINA:  '.$this->nombre);
				 $this->cell(25,5,number_format($total1,2,',','.'));
				 $acum1=0;
				 $this->cell(25,5,number_format($total2,2,',','.'));
				 $acum2=0;
				 $this->cell(25,5,number_format($total3,2,',','.'));
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(50,5,' DE TRABAJADORES: '.($contador));
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(5);
								 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(20);
				 $this->setFont("Arial","B",8);
				  $this->ln(5);
				 $this->setFont("Arial","BU",8);
                          //  $this->SetXY(49,205);
				 $this->cell(106,5,$this->revisado3);
			        $this->cell(150,5,$this->revisado2);

				  $this->ln(4);
				  $this->setFont("Arial","B",8);
                          //  $this->SetXY(45,210);
				 $this->cell(106,5, $this->revisado3car);
				 $this->cell(45,5,$this->revisado2car);

				 $this->ln(8);
				  $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(105,8,'Elaborado Por');
    	 			  $this->cell(80,8,'	Revisado Por');
				  $this->ln(5);
				 $this->setFont("Arial","BU",8);
                            // $this->SetXY(48,230);
				 $this->cell(105,22,$this->   elaborado);
				 $this->cell(50,22,$this->    revisado);
				  $this->ln(4);
				  $this->setFont("Arial","B",8);
                          //  $this->SetXY(40,234);
				 $this->cell(105,22,$this->elaboradocar);
				 $this->cell(40,22,$this->revisadocar);

				 			 $this->ln(8);
		}
	}
?>