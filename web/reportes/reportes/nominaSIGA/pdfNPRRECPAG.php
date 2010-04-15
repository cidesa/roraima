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
			

				$this->sql="select distinct a.codemp, c.nomemp,c.cedemp,c.fecing,c.fecret,c.codban as codban,g.nomban,a.codcon,
						a.codcar,b.nomcar,a.nomcon, 
						(CASE WHEN a.asided='A' THEN coalesce(a.saldo,0) ELSE 0 END) as asigna,
						(CASE WHEN a.asided='D' THEN coalesce(a.saldo,0) ELSE 0 END) as deduc,
						a.asided,f.codcat,f.nomcat,a.nomnom,a.saldo,coalesce(c.codniv,' ') as codniv,e.codnom as nomina2
						from npnomcal a, npcargos b, npdefcpt d,npasicaremp e,npcatpre f, 
						nphojint c LEFT OUTER JOIN npbancos g ON (c.codban=g.codban)
						--,npempleados_banco h
						where
						--(c.codban=g.codban) and
						a.codnom >=  rpad('".$this->tipnomdes."',3,' ') and a.codnom <= rpad('".$this->tipnomhas."',3,' ') and 
						f.codcat=e.codcat and e.codemp=a.codemp and
						e.codcar=a.codcar and e.codnom=a.codnom and
						c.codemp=a.codemp and b.codcar=a.codcar and
						--h.codnom=a.codnom and --h.codemp= a.codemp and
						a.codemp >=rpad('".$this->codempdes."',16,' ') and (a.codemp) <= rpad('".$this->codemphas."',16,' ') and
						a.codcar >= rpad('".$this->codcardes."',16,' ') and a.codcar <=rpad('".$this->codcarhas."',16,' ') and
						a.codcon >= rpad('".$this->codcondes."',3,' ') and a.codcon <=rpad('".$this->codconhas."',3,' ') and
						a.codcon=d.codcon and d.impcpt = 'S' and status='V'
						order by a.codemp,coalesce(c.codniv,' '),c.cedemp";
							

		
			//$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,20);			
			
		}


		/*function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);  		
			$this->cell(45,5,"Desde:".$this->fecreg1);
			$this->cell(45,5,"Hasta:".$this->fecreg2);
   		    
   		    $this->SetLineWidth(0.2);
    		$this->ln();						

		}*/
		
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
		
			function Cuerpo()
		{
			$this->br();
			$this->sqla="select nomemp from empresa where codemp='001'";
			$tba=$this->bd->select($this->sqla);
			
			
		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
		
			if (!$tb2->EOF)
			{
				$acumasigna=0;
				$acumdeduc=0;
				$ref=$tb2->fields["codemp"];
				$this->ln(7);
				$this->SetTextColor(0,0,128);  
				$this->setFont("Arial","B",9);
				$this->cell(190,5,strtoupper($tba->fields["nomemp"]),0,0,"C");
				$this->ln();
				$this->cell(81,5,"");
				$this->cell(30,5,"RECIBO DE PAGO");
				$this->ln();
				$this->SetTextColor(0,0,0); 
				//--
				               //+:recibo???
				$recibo=1;			   
				$this->numrec=$this->numrec+$recibo;
				if ($this->consecutivo='SI')
				{
					$this->sql3="update npnomcal set numrec='".$this->numrec."'
								 where codemp=rpad('".$tb2->fields["codemp"]."',16,' ') and
								 codcar=rpad('".$tb2->fields["codcar"]."',16,' ') and
								 codnom= '".$tb2->fields["nomina2"]."' ";
					$this->bd->actualizar($this->sql3);
					$nro=$this->numrec;
				}
				else
				{
					$this->sql3="select distinct numrec as numero
							from npnomcal 
							where codemp=rpad('".$tb2->fields["codemp"]."',16,' ') and
								 codcar=rpad('".$tb2->fields["codcar"]."',16,' ') and
								 codnom= '".$tb2->fields["nomina2"]."' ";
					$tb3=$this->bd->select($this->sql3);
					$nro=$tb3->fields["numero"];
				}
				//--
				$this->setFont("Arial","B",8); 
				$this->cell(150,5,"");
				$this->cell(10,5,"NRO.   ".$nro);
				$this->ln();
				$this->cell(5,5,"");
				$this->cell(115,5,"Nómina:   ".strtoupper($tb2->fields["nomnom"]));
				$this->cell(10,5,"Desde");
				$this->setFont("Arial","",8); 
				$this->cell(20,5,$this->fecreg1);
				$this->setFont("Arial","B",8); 
				$this->cell(10,5,"Hasta");
				$this->setFont("Arial","",8); 
				$this->cell(20,5,$this->fecreg2);
				$this->setFont("Arial","B",8); 
				$this->ln(6);
				$this->cell(5,5,"");
				$this->cell(32,5,"Cedula Identidad");
				$this->cell(115,5,"Nombre del Trabajador");
				$this->cell(32,5,"Sueldo");
				$this->ln();
				$this->setFont("Arial","",8); 
				$this->SetFillColor(170,170,170);
				$this->Rect(16,$this->GetY(),22,4,"F");
				$this->Rect(48,$this->GetY(),75,4,"F");
				$this->cell(9,5,"");
				$this->cell(28,5,$tb2->fields["codemp"]);
				$this->cell(104,5,strtoupper($tb2->fields["nomemp"]));
				$this->sqlb="select coalesce(sum(monto),0) as valor 
							from npasiconemp a,npconsueldo b 
							where 
							(codemp) =rpad('".$tb2->fields["codemp"]."',16,' ') and (codcar) =rpad('".$tb2->fields["codcar"]."',16,' ') and a.codcon=b.codcon";
				$tbb=$this->bd->select($this->sqlb);
				$this->cell(30,5,number_format($tbb->fields["valor"],2,'.',','),0,0,"R");
				
				$this->setFont("Arial","B",8); 
				$this->ln();
				$this->cell(5,5,"");
				$this->cell(85,5,"Cargo");
				$this->cell(30,5,"Unidad de Adscripción");
				$this->ln(4);
				$this->setFont("Arial","",8); 
				$this->cell(5,5,"");
				$this->cell(90,5,strtoupper($tb2->fields["nomcar"]));
				$this->cell(80,5,$tb2->fields["codniv"]);
				$this->ln();
				$this->setFont("Arial","B",8); 
				$this->cell(5,5,"");
				$this->cell(85,5,"Centro de Pago");
				$this->ln(4);
				$this->setFont("Arial","",8); 
				$this->cell(5,5,"");
				$this->cell(85,5,strtoupper($tb2->fields["nomban"]));
				$this->setFont("Arial","B",8); 
				$this->ln(7);
				$this->cell(16,5,"");
				$this->cell(74,5,"Nombre del Concepto");
				$this->cell(35,5,"Asignaciones");
				$this->cell(40,5,"Deducciones");
				$this->cell(30,5,"Saldo");
				$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
				$y=$this->GetY();
				$this->ln();
			}
		
			while (!$tb->EOF)	
			{
				if ($tb->fields["codemp"]!=$ref)
				{
				$this->SetY($y+50);
				$this->Line(92,$this->GetY(),195,$this->GetY());
				$this->cell(5,5,"");
				$this->setFont("Arial","B",8);
				$this->cell(60,5,"Recibí Conforme:");
				$this->cell(13,5,"TOTALES");
				$this->cell(34,5,number_format($acumasigna,2,'.',','),0,0,"R");
				$this->cell(34,5,number_format($acumdeduc,2,'.',','),0,0,"R");
				$this->ln(7);
				$this->cell(80,5,"");
				$this->cell(40,5,"NETO A COBRAR");
				$this->Rect(117,$this->GetY(),30,4,"F");
				$this->cell(13,5,number_format($acumasigna-$acumdeduc,2,'.',','),0,0,"R");
				
				$acumasigna=0;
				$acumdeduc=0;
				if ($this->GetY()>180)
				{
					$this->ln(100);
				}
				else
				{
					$this->ln(10);
				}
				$this->SetTextColor(0,0,128);  
				$this->setFont("Arial","B",9);
				$this->cell(190,5,strtoupper($tba->fields["nomemp"]),0,0,"C");
				$this->ln();
				$this->cell(81,5,"");
				$this->cell(30,5,"RECIBO DE PAGO");
				$this->ln();
				$this->SetTextColor(0,0,0); 
				$this->setFont("Arial","B",8);
				//--
				               //+:recibo???
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
				//-- 
				$this->cell(150,5,"");
				$this->cell(10,5,"NRO.   ".$nro);
				$this->ln();
				$this->cell(5,5,"");
				$this->cell(115,5,"Nómina:   ".strtoupper($tb->fields["nomnom"]));
				$this->cell(10,5,"Desde");
				$this->setFont("Arial","",8); 
				$this->cell(20,5,$this->fecreg1);
				$this->setFont("Arial","B",8); 
				$this->cell(10,5,"Hasta");
				$this->setFont("Arial","",8); 
				$this->cell(20,5,$this->fecreg2);
				$this->setFont("Arial","B",8); 
				$this->ln(6);
				$this->cell(5,5,"");
				$this->cell(32,5,"Cedula Identidad");
				$this->cell(115,5,"Nombre del Trabajador");
				$this->cell(32,5,"Sueldo");
				$this->ln();
				$this->setFont("Arial","",8); 
				$this->SetFillColor(170,170,170);
				$this->Rect(16,$this->GetY(),22,4,"F");
				$this->Rect(48,$this->GetY(),75,4,"F");
				$this->cell(9,5,"");
				$this->cell(28,5,$tb->fields["codemp"]);
				$this->cell(104,5,strtoupper($tb->fields["nomemp"]));
				$this->sqlb="select coalesce(sum(monto),0) as valor 
							from npasiconemp a,npconsueldo b 
							where 
							(codemp) =rpad('".$tb->fields["codemp"]."',16,' ') and (codcar) =rpad('".$tb->fields["codcar"]."',16,' ') and a.codcon=b.codcon";
				$tbb=$this->bd->select($this->sqlb);
				$this->cell(30,5,number_format($tbb->fields["valor"],2,'.',','),0,0,"R");
				
				$this->setFont("Arial","B",8); 
				$this->ln();
				$this->cell(5,5,"");
				$this->cell(85,5,"Cargo");
				$this->cell(30,5,"Unidad de Adscripción");
				$this->ln(4);
				$this->setFont("Arial","",8); 
				$this->cell(5,5,"");
				$this->cell(90,5,strtoupper($tb->fields["nomcar"]));
				$this->cell(80,5,$tb->fields["codniv"]);
				$this->ln();
				$this->setFont("Arial","B",8); 
				$this->cell(5,5,"");
				$this->cell(85,5,"Centro de Pago");
				$this->ln(4);
				$this->setFont("Arial","",8); 
				$this->cell(5,5,"");
				$this->cell(85,5,strtoupper($tb->fields["nomban"]));
				$this->setFont("Arial","B",8); 
				$this->ln(7);
				$this->cell(16,5,"");
				$this->cell(74,5,"Nombre del Concepto");
				$this->cell(35,5,"Asignaciones");
				$this->cell(40,5,"Deducciones");
				$this->cell(30,5,"Saldo");
				$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
				$y=$this->GetY();
				//aki
				$this->ln();
				}
			//Detalle
			$ref=$tb->fields["codemp"];
			$this->setFont("Arial","",8); 
			$this->cell(16,5,"");
			$this->cell(74,5,strtoupper($tb->fields["nomcon"]));
			$this->cell(21,5,number_format($tb->fields["asigna"],2,'.',','),0,0,"R");
			$acumasigna=$acumasigna+$tb->fields["asigna"];
			$this->cell(34,5,number_format($tb->fields["deduc"],2,'.',','),0,0,"R");
			$acumdeduc=$acumdeduc+$tb->fields["deduc"];
			$this->sqld="select codtippre as valor from nptippre where codcon='".$tb->fields["codcon"]."'";
			$tbd=$this->bd->select($this->sqld);				
			
			$this->sqlc="select coalesce(acumulado,0) as saldo 
					  from npasiconemp 
					  where codcar = rpad('".$tb->fields["codcar"]."',16,' ') and 
					  codemp=rpad('".$tb->fields["codemp"]."',16,' ') and codcon='".$tb->fields["codcon"]."'";
			$tbc=$this->bd->select($this->sqlc);				  
			
			if ($tbd->fields["valor"]==NULL)
			{
				$saldo=0;
			}
			else
			{
				$saldo=$tbc->fields["saldo"];
			}
			$this->cell(30,5,number_format($saldo,2,'.',','),0,0,"R");

			$this->ln(4);
			$tb->MoveNext();
			}
			
		}

	}
?>