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
		var $firma4;		
		var $firma5;
		var $cont;
		var $rf;
		
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
 			$this->codempdes=trim($_POST["codempdes"]);
			$this->codemphas=trim($_POST["codemphas"]);
			$this->fecsaldes=trim($_POST["fecsaldes"]);
			$this->fecsalhas=trim($_POST["fecsalhas"]);
			$this->tipnomdes=trim($_POST["tipnomdes"]);									
			$this->firma1=trim($_POST["firma1"]);									
			$this->firma2=trim($_POST["firma2"]);				
			$this->firma3=trim($_POST["firma3"]);	
			$this->firma4=trim($_POST["firma4"]);	
			$this->firma5=trim($_POST["firma5"]);				
		
			$this->sql="select
						a.codnom,
						h.nomnom as nomina,
						c.codemp,         
						c.nomemp,
						to_char(c.fecing,'dd/mm/yyyy') as fecing,
						c.fecret,
						c.cedemp,
						c.codniv,
						d.desniv,
						a.codcar ,         
						b.nomcar,
						b.codcat,
						e.nomcat,
						to_char(fechasalida,'dd/mm/yyyy') as fechasalida,
						to_char(fechaentrada,'dd/mm/yyyy') as fechaentrada,
						diadis,
						perini,
						perfin, 
						diasbono,
						c.codregpai,
						c.codregest,
						c.codregciu
						from  npnomina h,npcatpre e,npvacregsal a,nphojint c, npasicaremp b, npestorg d
						where
						trim(b.codnom) = '".$this->tipnomdes."' and
						b.codnom=a.codnom and
						b.codnom=h.codnom and
						b.codcat=e.codcat and
						b.codcar=a.codcar and
						b.codemp=c.codemp and
						b.codemp=a.codemp and
						c.codniv=d.codniv and
						trim(b.codemp) >= '".$this->codempdes."'  and 
						trim(b.codemp) <= '".$this->codemphas."' and 
						fechasalida >= to_date('".$this->fecsaldes."','dd/mm/yyyy') and
						fechasalida <= to_date('".$this->fecsalhas."','dd/mm/yyyy') and 
						b.status='V' and
						a.stavac='S'
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
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","",8);	
			//$this->cell(15,6,"NOMINA :"); 
			//$this->Line(10,55,200,55);
			
		}
		
		function calculosueldo($codemp,$codcar)
		{
		
			
			$this->sql="SELECT periodos FROM NPVACREGCALNOM WHERE trim(CODNOM)='".$this->tipnomdes."' AND trim(CODEMP)='".$codemp."'";
		    $tb=$this->bd->select($this->sql);			
			if (!empty($tb->fields["periodos"])){ $periodos=$tb->fields["periodos"]; }else{ $periodos=0; }			
			
			if ($periodos > 0)
			{
				$this->sql="select coalesce(sum(saldo)/$periodos+1),0) as valor 
						from 
							npnomcal 
						where
							trim(codnom)='".tipnomdes."' and codemp='".$codemp."' and codcar='".$codcar."' and
							(codcon in (select codcon from npconsalint where codnom='".$tipnomdes."') or
							codcon in (select codcon from npconcomp where codnom='".$tipnomdes."'))";
			}else{
				$this->sql="SELECT MAX(fecnom) as fecnom FECNOM FROM NPHISCON WHERE trim(codnom)='".$this->tipnomdes."' AND trim(CODEMP)='".$codemp."' AND trim(CODCAR)='".$codcar."'";
				$tb=$this->bd->select($this->sql);
				if (!empty($tb->fields["fecnom"])){ $fecnom=$tb->fields["fecnom"]; }else{ $fecnom=0; }
			
				$this->sql="select coalesce(sum(monto),0) as valor 
						from 
							nphiscon 
						where
							trim(codnom)='".tipnomdes."' and codemp='".$codemp."' and
							(codcon in (select codcon from npconsalint where codnom='".$tipnomdes."') or
							codcon in (select codcon from npconcomp where codnom='".$tipnomdes."')) and
							fecnom='".$fecnom."'";
			
			}
	
			$this->sql="SELECT frecal as frecuencia FROM NPNOMINA WHERE trim(CODNOM)='".$tipnomdes."'";
			if (($frecuencia=='M') or ($frecuencia=='S'))
			{
				return($valor);	
			}else{
				return($valor*2);	
			}
		}
		
		function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);
			while (!$tb->EOF){
				$this->setFont("Arial","",7);			
				$this->cell(190,6,"PARA USO DEL DEPARTAMENTO DE BENEFICIOS Y SERVICIOS AL PERSONAL",0,0,'C'); 
				$this->ln();
				$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+190,$this->GetY()+1);			
				$this->ln(3);
				$this->setFont("Arial","B",8);	
				$this->cell(40,6,"Ced. Identidad"); 
				$this->cell(80,6,"Apellidos y Nombres"); 
				$this->cell(70,6,"Tipo de Nómina"); 		
				$this->ln(3);
				$this->Rect($this->GetX(),$this->GetY()-5,28,27);
				$this->Rect($this->GetX()+28,$this->GetY()-5,75,15);
				$this->Rect($this->GetX()+103,$this->GetY()-5,87,15);
				$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+190,$this->GetY()+1);
				$this->ln(3);
				$this->setFont("Arial","",8);	
				$this->cell(4,6," "); 
				$this->cell(35,6,$tb->fields["codemp"]); 
				$this->cell(70,6,$tb->fields["nomemp"]);
				$this->cell(70,6,$tb->fields["nomina"]); 
	
				$this->ln();
				$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+190,$this->GetY()+1);			
				$this->setFont("Arial","B",8);	
				$this->cell(40,6,"Fecha de Ingreso"); 
				$this->cell(85,6,"Cargo del Trabajador");
				$this->cell(20,6,"Sueldo"); 			
				$this->ln(3);			
				$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+190,$this->GetY()+1);		
				$this->Rect($this->GetX()+103,$this->GetY()-2,87,12);
				$this->ln(3);	
				$this->setFont("Arial","",8);	
				$this->cell(35,6,$tb->fields["fecing"]); 
				$this->cell(85,6,trim($tb->fields["codcar"])." - ".trim($tb->fields["nomcar"]));
				$this->cell(20,6,$this->calculosueldo(trim($tb->fields["codemp"]),trim($tb->fields["codcar"]))); 
	
				$this->ln();			
				$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+190,$this->GetY()+1);		
				$this->Rect($this->GetX(),$this->GetY()+1,120,12);
				$this->Rect($this->GetX()+120,$this->GetY()+1,70,12);			
				$this->setFont("Arial","B",8);	
				$this->cell(120,6,"Ubicación Administrativa",0,0,'C'); 
				$this->cell(60,6,"Ubicación Geografica",0,0,'C'); 
				$this->ln(3);
				$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+190,$this->GetY()+1);		
				$this->ln(3);
				$this->cell(120,6,trim($tb->fields["codniv"])." - ".trim($tb->fields["desniv"]),0,0,'C'); 	
	
	
				$codciu=trim($tb->fields["codregciu"]);
				$this->sql="select nomciu as municipio from npciudad where trim(codciu)='$codciu'";	
				$tb1=$this->bd->select($this->sql);
				$this->cell(35,6,trim($tb1->fields["municipio"]),0,0,'C'); 	
				$this->ln();
				$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+190,$this->GetY()+1);		
				
	
				$this->ln(20);
				$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+190,$this->GetY()+1);		
				
				$this->ln(5);
				$this->Multicell(190,6,"ES RESPONSABILIDAD DEL DIRECTOR Y DEL SUPERVISOR INMEDIATO, DAR CUMPLIMIENTO A LOS ESTABLECIDO EN EL ARTICULO 226 DE LA LEY ORGANICA DEL TRABAJO, EL CUAL ESTA REFERIDO A LA OBLIGATORIEDAD DEL DISFRUTE DE LS VACACIONES EFECTIVAS.");
				
				$this->ln(5);
				
				$this->cell(190,6,"PARA USO DE LA DIRECCION DE RECURSOS HUMANOS",0,0,'C'); 
				$this->ln(5);
				$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+190,$this->GetY()+1);
				$this->Rect($this->GetX(),$this->GetY()-5,190,29); //Recuadro Principal
				$this->Line($this->GetX()+25,$this->GetY()+6,$this->GetX()+25,$this->GetY()+24); //linea 1
				$this->Line($this->GetX()+50,$this->GetY()+6,$this->GetX()+50,$this->GetY()+24); //linea 2
				$this->Line($this->GetX()+90,$this->GetY()+1,$this->GetX()+90,$this->GetY()+24); //linea mitad
				$this->cell(98,6,"DATOS PARA LA VACACIONES A DISFRUTAR",0,0,'C'); 			
				$this->cell(85,6,"VACACIONES VENCIDAS",0,0,'C'); 
				$this->ln(5);
				$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+190,$this->GetY()+1);
				$this->setFont("Arial","B",7);	
				$this->cell(25,6,"Dias de Disfrute",0,0,'C'); 
				$this->cell(29,6,"Fecha de Salida",0,0,'C'); 
				$this->cell(25,6,"Fecha de Regreso",0,0,'C'); 			
				$this->cell(20,6," ",0,0,'C'); 			
				$this->cell(42,6,"Periodo Desde",0,0,'C'); 
				$this->cell(30,6,"Periodo Hasta",0,0,'C'); 
				
				$this->ln(5);
				$this->setFont("Arial","",7);	
				$this->cell(25,6,$tb->fields["diadis"],0,0,'C'); 
				$this->cell(25,6,$tb->fields["fechasalida"],0,0,'C'); 
				$this->cell(25,6,$tb->fields["fechaentrada"],0,0,'C'); 			
				$this->cell(20,6," ",0,0,'C'); 			
				$this->cell(25,6,"   ",0,0,'C'); 
				$this->cell(25,6,"   ",0,0,'C'); 
				
				$this->ln(5);
				$this->setFont("Arial","B",7);	
				$this->cell(25,6,"Periodo Desde",0,0,'C'); 
				$this->cell(29,6,"Periodo Hasta",0,0,'C'); 
				$this->cell(25,6,"Dia Bonos Vacacional",0,0,'C'); 			
	
				$this->ln(5);
				$this->setFont("Arial","",7);	
				$this->cell(25,6,$tb->fields["perini"],0,0,'C'); 
				$this->cell(25,6,$tb->fields["perfin"],0,0,'C'); 
				$this->cell(25,6,$tb->fields["diasbono"],0,0,'C'); 			
			  $tb->Movenext();
			$this->AddPage();
			}
		}
		
	}
	
?>