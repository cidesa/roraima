<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		var $bd;
		var $sql;
		var $codemp1;
		var $codemp2;
		var $codban1;
		var $codban2;
		var $codcat1;
		var $codcat2;
		var $codnom;		
		var $pernomdes;
		var $pernomhas;	
		var $codcat;	
		var $asigna;
		var $nomcat;
		var $cont2;
		var $sum_asig;
		var $sum_deducc;
		var $sum_total;
		var $sum_asig1;
		var $sum_deducc1;
		var $sum_total1;
		var $codban;
		var $nomban;
		
		
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
 			$this->codemp1=trim($_POST["codemp1"]);
			$this->codemp2=trim($_POST["codemp2"]);
			$this->codban1=trim($_POST["codban1"]);
			$this->codban2=trim($_POST["codban2"]);
			$this->codcat1=trim($_POST["codcat1"]);									
			$this->codcat2=trim($_POST["codcat2"]);									
			$this->codnom=trim($_POST["codnom"]);				
			$this->pernomdes=trim($_POST["pernomdes"]);				
			$this->pernomhas=trim($_POST["pernomhas"]);	
			
			$this->sql="select f.codban,
						c.nomban,
						a.nacemp,
						a.cedemp as codemp,
						a.codemp as idemp,
						a.nomemp,
						f.cuenta_banco,
						sum(montonomina) as monto,
						b.codcar,
						d.nomcar,
						b.codnom,
						b.codcat,
						e.nomcat,
						g.numrec 
					from 
						npbancos c,
						nphojint a,
						npasicaremp b,
						npcargos d,
						npcatpre e,
						npempleados_banco f,
						npnomcal g
					where
						f.codnom=b.codnom and
						f.codemp=b.codemp and 
						f.codban=c.codban and
						b.codcar=d.codcar and
						b.codcat=e.codcat and
						b.codnom=g.codnom and
						b.codemp=g.codemp and
						b.codcar=g.codcar and
						trim(b.codnom)='".$this->codnom."'  and
						b.codemp = a.codemp  and
						trim(b.codemp) >= '".$this->codemp1."' and
						trim(b.codemp) <= '".$this->codemp2."' and 
						trim(f.codban) >= '".$this->codban1."' and
						trim(f.codban) <= '".$this->codban2."' and
						trim(b.codcat) >= '".$this->codcat1."'  and
						trim(b.codcat) <= '".$this->codcat2."' and
						status='V'  and
						montonomina<>0 
					group by f.codban,c.nomban,b.codcat,e.nomcat,g.numrec,a.cedemp,a.codemp,a.nomemp,a.nacemp,f.cuenta_banco,b.codcar,d.nomcar,b.codnom
					order by f.codban, b.codcat,g.numrec,a.codemp";
					
			//print $this->sql;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CEDULA";
				$this->titulos[1]="NOMBRE DEL EMPLEADOR";
				$this->titulos[2]="CARGO";
				$this->titulos[3]="NRO";
				$this->titulos[4]="DE RECIBO";
				$this->titulos[5]="CUENTA BANCARIA";
				$this->titulos[6]="ASIGNACIONES";								
				$this->titulos[7]="DEDUCCIONES";
				$this->titulos[8]="MONTO A";
				$this->titulos[9]="DEPOSITAR";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"","s");
			$this->setFont("Arial","",8);	
			//$this->cell(15,6,"NOMINA :"); 
			//$this->Line(10,55,200,55);
			
		}
		function Cuerpo()
		{
			$this->setFont("Arial","",7);			
		    $tb=$this->bd->select($this->sql);
			
			$cont=0;
			$cont2=0;	
			$cont3=0;	
			$sum_asig1=0;	
			$sum_deducc1=0;	
			$sum_total1=0;	
			
			while (!$tb->EOF)
			{
				if ($codban!=$tb->fields["codban"]){  //Por codigo del Banco
					if ($cont<>0){
						$this->ln(4);
						$this->cell(80,6,"TOTAL ".$nomban);
						$this->cell(72,6,"");
						$this->cell(35,6,number_format($sum_asig1,2,'.',','),0,0,'R');    //Asignacion
						$this->cell(35,6,number_format($sum_deducc1,2,'.',','),0,0,'R');  //Deducciones
						$this->cell(35,6,number_format($sum_total1,2,'.',','),0,0,'R');   //Monto a Pagar						
						$this->ln(4);
						$this->cell(80,6,"CANTIDAD DE TRABAJADORES : ".$cont3,0,0,'R');
						$cont3=0;
						$sum_asig1=0;
						$sum_deducc1=0;
						$sum_total1=0;
					    $this->AddPage();
						}
						
					$codban=$tb->fields["codban"];		
					$nomban=trim($tb->fields["nomban"]);
					$this->cell(260,6,$nomban,0,0,'C');
					$this->ln(4);
					$this->setFont("Arial","B",7);
					$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+260,$this->GetY()+1);
					$this->cell(20,6,"Nomina: ".$this->codnom);
					$this->cell(30,6,"Empleado Administrativo ");
					$this->setFont("Arial","",7);
					$this->ln();
				}
					$cont=$cont+1; //Contador Total
					$cont2=$cont2+1; //Contador por Grupo
					$cont3=$cont3+1; //Contador por Banco
					$nomcat=$tb->fields["nomcat"];
					if ($codcat!=$tb->fields["codcat"]){
						$codcat=$tb->fields["codcat"];		
							$cont2=1;
							$sum_asig=0;
							$sum_deducc=0;
							$sum_total=0;													
							$this->ln(4);			
							$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+260,$this->GetY()+1);		
							$this->cell(20,6,$tb->fields["codcat"]);
							$this->cell(70,6,$tb->fields["nomcat"]);				
							$this->ln();
							$this->setFont("Arial","B",7);
							$this->cell(12,6,$this->titulos[0]);
							$this->cell(40,6,$this->titulos[1]);
							$this->cell(50,6,$this->titulos[2]);
							$this->cell(30,6,$this->titulos[3]);
							$this->cell(20,6,$this->titulos[5]);
							$this->cell(35,6,$this->titulos[6],0,0,'R');
							$this->cell(35,6,$this->titulos[7],0,0,'R');
							$this->cell(35,6,$this->titulos[8],0,0,'R');
							$this->ln(4);
							$this->cell(118,6,$this->titulos[4],0,0,'R');
							$this->cell(140,6,$this->titulos[9],0,0,'R');
							$this->ln(4);
							$this->setFont("Arial","",7);
							$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+260,$this->GetY()+1);
					}
					
					$this->cell(12,6,$tb->fields["codemp"]);
					$this->cell(40,6,substr($tb->fields["nomemp"],0,25));
					$this->cell(50,6,substr($tb->fields["nomcar"],0,30));				
					$this->cell(30,6,$tb->fields["numrec"]);
					$this->cell(20,6,$tb->fields["cuenta_banco"]);
	
					//Asignaciones
					$this->sql2="select coalesce(sum(a.saldo),0) as asigna from npnomcal a  where trim(a.codnom)='".trim($tb->fields["codnom"])."' and  trim(a.codemp)='".trim($tb->fields["idemp"])."'  and trim(a.codcar)='".trim($tb->fields["codcar"])."' and a.asided='A'";
					$tb2=$this->bd->select($this->sql2);
					$asigna=$tb2->fields["asigna"];
					$this->cell(35,6,number_format($tb2->fields["asigna"],2,'.',','),0,0,'R');
					
					//Deducciones
					$this->sql2="select coalesce(sum(a.saldo),0) as deducc from npnomcal a  where trim(a.codnom)='".trim($tb->fields["codnom"])."' and  trim(a.codemp)='".trim($tb->fields["idemp"])."'  and trim(a.codcar)='".trim($tb->fields["codcar"])."' and a.asided='D'";
					$tb2=$this->bd->select($this->sql2);
					$this->cell(35,6,number_format($tb2->fields["deducc"],2,'.',','),0,0,'R');
					
					//Monto a Pagar
					$this->cell(35,6,number_format(($asigna-$tb2->fields["deducc"]),2,'.',','),0,0,'R');
	
					//Sumatorias Totales
					$sum_asig   = $sum_asig + $asigna;
					$sum_deducc = $sum_deducc + $tb2->fields["deducc"];
					$sum_total = $sum_total + ($asigna-$tb2->fields["deducc"]);
									
					$this->ln(4);

				$tb->MoveNext();

					//Totales por Grupo
					if ($codcat!=$tb->fields["codcat"]){  
						$this->ln(3); 	 
						$this->cell(80,6,"TOTAL ".$nomcat,0,0,'R');
						$this->cell(72,6,"");
						$this->cell(35,6,number_format($sum_asig,2,'.',','),0,0,'R');    //Asignacion
						$this->cell(35,6,number_format($sum_deducc,2,'.',','),0,0,'R');  //Deducciones
						$this->cell(35,6,number_format($sum_total,2,'.',','),0,0,'R');   //Monto a Pagar
						$this->ln(4);
						$this->cell(80,6,"CANTIDAD DE TRABAJADORES : ".$cont2,0,0,'R');
						$this->ln(4);
	
						$sum_asig1   = $sum_asig1 + $sum_asig;
						$sum_deducc1 = $sum_deducc1 + $sum_asig;
						$sum_total1 = $sum_total1 + $sum_total;												
					}
			}
		}
	}
?>
