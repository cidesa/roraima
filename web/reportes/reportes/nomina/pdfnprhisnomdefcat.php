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
		var $fecnomdes;
		var $fecnomhas;
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
			$this->codcatdes=$_POST["codcatdes"];
			$this->codcathas=$_POST["codcathas"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnom=$_POST["tipnom"];
			$this->fecnomdes=$_POST["fecnomdes"];
			$this->fecnomhas=$_POST["fecnomhas"];
			$this->elaborado=$_POST["elaborado"];
			$this->revisado=$_POST["revisado"];
			$this->autorizado=$_POST["autorizado"];
			$this->sql="select distinct
						c.codemp,         
						c.nomemp,
						c.numcue as cuenta_banco,
						d.nomban,
						c.fecing,
						c.fecret,
						c.cedemp,
						b.codcar,         
						f.nomcar,
						b.codcat,
						e.nomcat
						from  
						npcargos  f,
						nphojint c right outer join npbancos d on (c.codban=d.codban),
						npcatpre e left outer join nphiscon b on (e.codcat=b.codcat)
						where
						b.codnom = rpad('".$this->tipnom."',3,' ') and
						b.codemp=c.codemp and
						b.codcar=f.codcar and
						c.codemp>= rpad('".$this->codempdes."',16,' ') and
						c.codemp <= rpad('".$this->codemphas."',16,' ') and 
						b.codcar>= rpad('".$this->codcardes."',16,' ') and
						b.codcar <= rpad('".$this->codcarhas."',16,' ') and
						b.codcat>=rpad('".$this->codcatdes."',32,' ') and
						b.codcat<=rpad('".$this->codcathas."',32,' ') and
						b.fecnom>='".$this->fecnomdes."' and
						b.fecnom<='".$this->fecnomhas."'
						order by
						c.codemp";
			

							//print $this->sql2;			
			
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",8);
			$rs=$this->bd->select("select upper(nomnom) as nombre from NPASICAREMP where codnom='".$this->tipnom."'");
			if(!$rs->EOF)
			{
				$this->nombre=$rs->fields["nombre"];
			}
			
			$this->cell(100,5,'NOMINA: '.$this->tipnom.' - '.$this->nombre);
			$this->cell(60,5,'PERIODO DEL: '.$this->fecnomdes.' AL '.$this->fecnomhas);
			$this->ln(5);
			
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->sql);
			$ref="";
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
			if(!$tb2->EOF)
			{
				 $ref=$tb2->fields["codemp"];
				 $cat=$tb2->fields["codcat"];
				 $contador=$contador+1;
				 $this->setFont("Arial","B",8); 
				 $this->cell(80,5,$tb2->fields["codcat"].' '.strtoupper($tb2->fields["nomcat"]));
				 $nomcat=$tb2->fields["nomcat"];
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->SetFillColor(195,195,195);
				 $this->cell(20,5,$tb2->fields["codemp"],0,0,'',1);
				 $this->cell(90,5,$tb2->fields["nomemp"],0,0,'',1);
				 $this->cell(40,5,'CARGO:  '.$tb2->fields["codcar"]);
				 $this->cell(50,5,$tb2->fields["nomcar"]);
				 $this->SetFillColor(0,0,0);
				 $this->ln(4);
				 $this->setFont("Arial","",8);
				 $this->cell(110,5,'Fecha de Ingreso:     '.$tb2->fields["fecing"]);
				 $s=$this->bd->select("select coalesce(sum(monto),0) as valor 
									   from nphiscon a,npconsueldo b 
									   where 
									   (a.codemp) =rpad('".$tb2->fields["codemp"]."',16,' ') and 
									   (a.codcar) =rpad('".$tb2->fields["codcar"]."',16,' ') and
									   a.fecnom>='".$this->fecnomdes."' and
									   a.fecnom<='".$this->fecnomhas."' and 
									   a.codcon=b.codcon and
									   b.codnom='".$this->tipnom."'");
				 
				 $this->cell(60,5,'Sueldo:    '.number_format($s->fields["valor"],2,'.',','));
				 $this->ln(4);
				 $this->cell(110,5,'Centro de Pago:     '.$tb2->fields["nomban"]);
				 $this->cell(60,5,'Cuenta Bancaria:     '.$tb2->fields["cuenta_banco"]);
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","",8); 
				 $this->ln(5);
				 //$this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","BU",8); 
				 $this->cell(20,5,'Codigo');
				 $this->cell(75,5,'Nombre del Concepto');
				 $this->cell(30,5,'Asignaciones');
				 $this->cell(30,5,'Deducciones');
				 $this->cell(30,5,'Saldo');
				 $this->ln(4);
				 //$this->line(10,$this->getY(),200,$this->getY());
			}
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
				 $this->cell(65,5,'Totales Bs.',0,0,'R');
				 $this->cell(10,5,'');
				 $this->cell(30,5,number_format($acum1,2,'.',','));
				 $this->cell(30,5,number_format($acum2,2,'.',','));
				 $this->cell(30,5,number_format($acum3,2,'.',','));
				 $totacum1=$totacum1+$acum1;
				 $totacum2=$totacum2+$acum2;
				 $totacum3=$totacum3+$acum3;
				 $this->ln(4);
				 $this->cell(20,5,'');
				 $this->cell(65,5,'Neto a Cobrar Bs.',0,0,'R');
				 $this->cell(10,3,'');
				 $this->SetFillColor(195,195,195);
				 $this->cell(30,3,number_format(($acum1-$acum2),2,'.',','),0,0,'',1);
				 $neto=$neto+$acum1-$acum2;
				 $this->SetFillColor(0,0,0);
				 $this->cell(30,5,'');
				 $this->ln(5);
				 $acum1=0;
				 $acum2=0;
				 $acum3=0;
				 //
				 if($tb->fields["codcat"]!=$cat)
				 {
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->cell(95,5,'TOTAL:  '.ucwords($nomcat));
				 	$this->cell(30,5,number_format($totacum1,2,'.',','));
				 	$this->cell(30,5,number_format($totacum2,2,'.',','));
				 	$this->cell(30,5,number_format($totacum3,2,'.',','));
					$total1=$total1+$totacum1;
					$total2=$total2+$totacum2;
					$total3=$total3+$totacum3;
				 	$totacum1=0;
				 	$totacum2=0;
				 	$totacum3=0;
				 	// 
				 	$acumulado=0;
					$this->ln(4);
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->cell(110,5,'CANTIDAD DE TRABAJADORES: '.$cont);
					$cont=0;
				 	//$this->cell(50,5,'TOTAL A PAGAR: '.number_format($neto,2,'.',','));
					$totalneto=$totalneto+$neto;
					$neto=0;
					$this->ln(4);
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->ln(8);
				 	$this->cell(80,5,$tb2->fields["codcat"].' '.strtoupper($tb2->fields["nomcat"]));
				 	$nomcat=$tb->fields["nomcat"];
				 	$this->ln(5);
				 }	
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $cat=$tb->fields["codcat"];
				 $this->SetFillColor(195,195,195);
				 $this->cell(20,5,$tb2->fields["codemp"],0,0,'',1);
				 $this->cell(90,5,$tb2->fields["nomemp"],0,0,'',1);
				 $this->cell(40,5,'CARGO:  '.$tb2->fields["codcar"]);
				 $this->cell(50,5,$tb2->fields["nomcar"]);
				 $this->SetFillColor(0,0,0);
				 $this->ln(4);
				 $this->setFont("Arial","",8);
				 $this->cell(110,5,'Fecha de Ingreso:     '.$tb2->fields["fecing"]);
				 $s=$this->bd->select("select coalesce(sum(monto),0) as valor 
									   from nphiscon a,npconsueldo b 
									   where 
									   (a.codemp) =rpad('".$tb2->fields["codemp"]."',16,' ') and 
									   (a.codcar) =rpad('".$tb2->fields["codcar"]."',16,' ') and
									   a.fecnom>='".$this->fecnomdes."' and
									   a.fecnom<='".$this->fecnomhas."' and 
									   a.codcon=b.codcon and
									   b.codnom='".$this->tipnom."'");
				 
				 $this->cell(60,5,'Sueldo:    '.number_format($s->fields["valor"],2,'.',','));
				 $this->ln(4);
				 $this->cell(110,5,'Centro de Pago:     '.$tb2->fields["nomban"]);
				 $this->cell(60,5,'Cuenta Bancaria:     '.$tb2->fields["cuenta_banco"]);
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				  
				 $this->ln(5);
				 $this->setFont("Arial","BU",8); 
				 $this->cell(20,5,'Cdigo');
				 $this->cell(75,5,'Nombre del Concepto');
				 $this->cell(30,5,'Asignaciones');
				 $this->cell(30,5,'Deducciones');
				 $this->cell(30,5,'Saldo');
				 $this->ln(4);
				 $contador=$contador + 1;
				} //end If
				 
				 $tb3=$this->bd->select("select 
						a.codemp,
						a.codcar as codcar2,         
						a.codcon,
						trim(a.nomcon) as nomcon,         
						(case when d.opecon='A' then coalesce(a.monto,0) else 0 end) as asigna, 
						(case when d.opecon='D' then coalesce(a.monto,0) else 0 end) as deduc
						from nphiscon a,npdefcpt d
						where
						trim(a.codemp)= trim('".$tb2->fields["codemp"]."') and
						d.codcon=a.codcon and
						a.codcon>='".$this->codcondes."' and
						a.codcon<='".$this->codconhas."' and
						(a.codnom) =rpad('".$this->tipnom."',3,' ') and
						a.fecnom>='".$this->fecnomdes."' and
						a.fecnom<='".$this->fecnomhas."'
						order by
						a.codemp,d.opecon,a.codcon");
				 
				 while (!$tb3->EOF){
				 $this->setFont("Arial","",8); 
				 $this->cell(20,5,$tb3->fields["codcon"]);
				 $this->cell(75,5,$tb3->fields["nomcon"]);
				 $this->cell(30,5,number_format($tb3->fields["asigna"],2,'.',','));
				 $acum1=$acum1+$tb3->fields["asigna"];
				 $this->cell(30,5,number_format($tb3->fields["deduc"],2,'.',','));
				 $acum2=$acum2+$tb3->fields["deduc"];
				 $tp=$this->bd->select("SELECT CODTIPPRE as VALOR FROM NPTIPPRE 
										WHERE CODCON='".$tb3->fields["CODCON"]."'");
				 if ($tp->fields["valor"]=='') 
				 	{$saldo=0;}
				 else
				 	{	
				 		$a=$this->bd->select("SELECT coalesce(SALDO,0) as SALDO 
										  FROM NPHISPRE 
										  WHERE  
										  CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') 
										  AND CODTIPPRE='".$tb3->fields["CODCON"]."'");
				 		$saldo= $a->fields["saldo"];}
				 $this->cell(30,5,number_format($saldo,2,'.',','));
				 $this->ln(4);
				 $Y=$this->GetY();
				 if ($Y>=250) {
				 		 $this->AddPage();
				 		 $this->ln(5);
						 $this->line(10,$this->getY(),200,$this->getY());
						 $this->ln(2);
						 $this->SetFillColor(195,195,195);
						 $this->cell(20,5,$tb2->fields["codemp"],0,0,'',1);
						 $this->cell(90,5,$tb2->fields["nomemp"],0,0,'',1);
						 $this->cell(40,5,'CARGO:  '.$tb2->fields["codcar"]);
						 $this->cell(50,5,$tb2->fields["nomcar"]);
						 $this->SetFillColor(0,0,0);
						 $this->ln(4);
						 $this->setFont("Arial","",8);
						 $this->cell(110,5,'Fecha de Ingreso:     '.$tb2->fields["fecing"]);
						 $s=$this->bd->select("select coalesce(sum(monto),0) as valor 
											   from nphiscon a,npconsueldo b 
											   where 
											   (a.codemp) =rpad('".$tb2->fields["codemp"]."',16,' ') and 
											   (a.codcar) =rpad('".$tb2->fields["codcar"]."',16,' ') and
											   a.fecnom>='".$this->fecnomdes."' and
											   a.fecnom<='".$this->fecnomhas."' and 
											   a.codcon=b.codcon and
											   b.codnom='".$this->tipnom."'");
						 
						 $this->cell(60,5,'Sueldo:    '.number_format($s->fields["valor"],2,'.',','));
						 $this->ln(4);
						 $this->line(10,$this->getY(),200,$this->getY());
						 $this->ln(5);
						 $this->setFont("Arial","BU",8); 
						 $this->cell(20,5,'Cdigo');
						 $this->cell(75,5,'Nombre del Concepto');
						 $this->cell(30,5,'Asignaciones');
						 $this->cell(30,5,'Deducciones');
						 $this->cell(30,5,'Saldo');
						 $this->ln(4);
				 }
				 
				 $acum3=$acum3+$saldo;
				 $tb3->MoveNext();
				 }
				 $ref=$tb->fields["codemp"];
				 $tb->MoveNext();
			     $this->ln(3);
				 
			}//end While
				 $this->setFont("Arial","B",8);
				 $this->ln(2);
				 $this->line(100,$this->getY(),200,$this->getY());
				 
				 //totales
				 $this->cell(20,5,'');
				 $this->cell(65,5,'Totales Bs.',0,0,'R');
				 $this->cell(10,5,' ');
				 $this->cell(30,5,number_format($acum1,2,'.',','));
				 $this->cell(30,5,number_format($acum2,2,'.',','));
				 $this->cell(30,5,number_format($acum3,2,'.',','));
				 $totacum1=$totacum1+$acum1;
				 $totacum2=$totacum2+$acum2;
				 $totacum3=$totacum3+$acum3;
				 $this->ln(4);
				 $this->cell(20,5,'');
				 $this->cell(65,5,'Neto a Cobrar Bs.',0,0,'R');
				 $this->cell(10,3,'');
				 $this->SetFillColor(195,195,195);
				 $this->cell(30,3,number_format(($acum1-$acum2),2,'.',','),0,0,'',1);
				 $neto=$neto+($acum1-$acum2);
				 $this->SetFillColor(0,0,0);
				 $this->cell(30,5,'');
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(95,5,'TOTAL:  '.$nomcat);
				 $this->cell(30,5,number_format($totacum1,2,'.',','));
				 $acum1=0;
				 $this->cell(30,5,number_format($totacum2,2,'.',','));
				 $acum2=0;
				 $this->cell(30,5,number_format($totacum3,2,'.',','));
				 $total1=$total1+$totacum1;
				 $total2=$total2+$totacum2;
				 $total3=$total3+$totacum3;
				 $totacum1=0;
				 $totacum2=0;
				 $totacum3=0;
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(110,5,'CANTIDAD DE TRABAJADORES: '.($cont+1));
				 $cont=0;
				 //$this->cell(50,5,'TOTAL A PAGAR: '.number_format($neto,2,'.',','));
				 $totalneto=$totalneto+$neto;
				 //$neto=0;
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(8);
				 $this->cell(95,5,'TOTAL NOMINA:  '.$this->nombre);
				 $this->cell(30,5,number_format($total1,2,'.',','));
				 $acum1=0;
				 $this->cell(30,5,number_format($total2,2,'.',','));
				 $acum2=0;
				 $this->cell(30,5,number_format($total3,2,'.',','));
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(110,5,'TOTAL DE TRABAJADORES: '.($contador));
				 //$this->cell(50,5,'TOTAL A PAGAR: '.number_format($totalneto,2,'.',','));
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(5);
				 $this->setFont("Arial","BU",8);
				 $this->cell(150,5,$this->elaborado);
				 $this->cell(50,5,$this->revisado);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(150,5,'						Elaborado Por');
				 $this->cell(50,5,'							Revisado Por');
				 $this->ln(3);
				 $this->setFont("Arial","BU",8);
				 $this->cell(110,5,$this->autorizado,0,0,'R');
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(110,5,'Autorizado Por						',0,0,'R');
				 // 
		}
	}
?>