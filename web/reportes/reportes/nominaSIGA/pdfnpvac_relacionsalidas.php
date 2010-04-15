<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		var $bd;
		var $sql;
		var $codempdes;
		var $codemphas;
		var $fecsaldes;
		var $fecsalhas;
		var $tipnomdes;
		var $firma1;
		var $firma2;		
		var $firma3;
		var $cont;
		
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
 			$this->codempdes=trim($_POST["codempdes"]);
			$this->codemphas=trim($_POST["codemphas"]);
			$this->fecsaldes=trim($_POST["fecsaldes"]);
			$this->fecsalhas=trim($_POST["fecsalhas"]);
			$this->tipnomdes=trim($_POST["tipnomdes"]);									
			$this->firma1=trim($_POST["firma1"]);									
			$this->firma2=trim($_POST["firma2"]);				
			$this->firma3=trim($_POST["firma3"]);				
		
			$this->sql="select
						c.codemp,         
						c.nomemp,
						to_char(c.fecing,'dd/mm/yyyy') as fecing,
						c.fecret,
						c.cedemp,
						a.codcar,         
						b.nomcar,
						b.codcat,
						e.nomcat,
						to_char(fechasalida,'dd/mm/yyyy') as fechasalida,
						to_char(fechaentrada,'dd/mm/yyyy') as fechaentrada,
						diadis,
						perini,
						perfin, 
						diasbono
						from  npcatpre e,npvacregsal a,nphojint c, npasicaremp b
						where
						trim(b.codnom)= '".$this->tipnomdes."' and
						b.codnom=a.codnom and
						b.codcat=e.codcat and
						b.codcar=a.codcar and
						b.codemp=c.codemp and
						b.codemp=a.codemp and
						trim(b.codemp) >= '".$this->codempdes."'  and
						trim(b.codemp) <= '".$this->codemphas."' and 
						a.fechasalida >= to_date('".$this->fecsaldes."','dd/mm/yyyy') and
						a.fechasalida <= to_date('".$this->fecsalhas."','dd/mm/yyyy') and
						b.status='V' and
						a.stavac='N'
						order by
						c.codemp,
						perini
						";
			
			//print $this->sql;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Nro";
				$this->titulos[1]="Cédula";
				$this->titulos[2]="Nombre del Trabajador";
				$this->titulos[3]="Fecha";
				$this->titulos[4]="Ingreso";
				$this->titulos[5]="Cargo del Trabajador";
				$this->titulos[6]="Ubicación Administrativa";								
				$this->titulos[7]="F.Salida";
				$this->titulos[8]="F.Llegada";
				$this->titulos[9]="Período";
				$this->titulos[10]="Días";				
				$this->titulos[11]="B.V.";				
				$this->titulos[12]="Días";				
				$this->titulos[13]="Disf";				
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
			
/*			$cont=0;
			$cont2=0;	
			$cont3=0;	
			$sum_asig1=0;	
			$sum_deducc1=0;	
			$sum_total1=0;	
			*/

			$this->setFont("Arial","B",7);
			//$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+260,$this->GetY()+1);
			$this->cell(20,6,"Nomina: ".$this->tipnomdes);
			$this->cell(30,6,"Empleado Administrativo ");
			$this->setFont("Arial","",7);
			$this->ln();

			$this->setFont("Arial","B",7);
			$this->cell(7,6,$this->titulos[0]);
			$this->cell(15,6,$this->titulos[1]);
			$this->cell(40,6,$this->titulos[2]);
			$this->cell(15,6,$this->titulos[3]);
			$this->cell(55,6,$this->titulos[5]);
			$this->cell(63,6,$this->titulos[6],0,0,'L');
			$this->cell(15,6,$this->titulos[7],0,0,'L');
			$this->cell(14,6,$this->titulos[8],0,0,'C');
			$this->cell(18,6,$this->titulos[9],0,0,'L');
			$this->cell(10,6,$this->titulos[10],0,0,'C');			
			$this->cell(10,6,$this->titulos[12],0,0,'C');
			$this->ln(4);
			$this->cell(73,6,$this->titulos[4],0,0,'R');
			$this->cell(165,6," ");
			$this->cell(12,6,$this->titulos[11],0,0,'R');
			$this->cell(10,6,$this->titulos[13],0,0,'R');
			$this->ln(4);
			$this->setFont("Arial","",7);
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+260,$this->GetY()+1);

			$cont=0;
			while (!$tb->EOF)
			{
				$this->ln();
				$cont=$cont+1;
				$this->cell(7,6,$cont);
				$this->cell(15,6,$tb->fields["cedemp"]);
				$this->cell(40,6,substr($tb->fields["nomemp"],0,40));
				$this->cell(15,6,$tb->fields["fecing"]);
				$this->cell(55,6,substr($tb->fields["nomcar"],0,55));
				$this->cell(63,6,substr($tb->fields["nomcat"],0,63));	
				$this->cell(15,6,$tb->fields["fechasalida"]);
				$this->cell(15,6,$tb->fields["fechaentrada"]);
				$this->cell(20,6,$tb->fields["perini"]."/".$tb->fields["perfin"]);
				$this->cell(10,6,$tb->fields["diasbono"]);
				$this->cell(10,6,$tb->fields["diadis"]);
				
				$tb->MoveNext();
			}
			$this->ln();
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+260,$this->GetY()+1);

			$this->cell(20,6,"");
			$this->cell(20,6,"Total Vacaciones Procesadas: ".$cont);
			$this->ln(25);
			$this->cell(30,6,"");
			$this->cell(10,6,"-----------------------------------------          					  																									    -----------------------------------------					      								   							    		 ----------------------------------------");
			$this->ln();
			$this->cell(30,6,"");
			$this->cell(10,6,"      Jefe(a) Dpto Beneficios y                                                        Jefe(a) División Adm.                                                        Director(a)");
			$this->ln(4);
			$this->cell(30,6,"");
			$this->cell(10,6,"       Servicios al Personal                                                                   Personal                                                                          Humano");
			
		}
	}
?>
