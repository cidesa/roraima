<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $acum1=0;
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
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $tiqdesde;
		var $tiqhasta;
		var $ben1;
		var $ben2;
		var $fecreg1;
		var $fecreg2;
		var $tipcau1;		
		var $tipcau2;
		var $nomben;				
		
						
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->tiqdesde=$_POST["tiqdesde"];
			$this->tiqhasta=$_POST["tiqhasta"];
			$this->ben1=$_POST["ben1"];
			$this->ben2=$_POST["ben2"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];
			$this->tipcau1=$_POST["tipcau1"];
			$this->tipcau2=$_POST["tipcau2"];			
			$this->nomben=$_POST["nomben"];			

			$this->sql="SELECT 
						A.NUMORD as numord,
						A.NUMORD2 as numord2,
						A.CEDRIF as  cedrif,
						A.NOMBEN as nomben,
						to_char(A.FECEMI,'dd/mm/yyyy') as fecemi,
						A.MONORD as monto_orden,
						A.MONRET as monret,
						A.MONDES as mondes,
						A.NUMTIQ as numerotiq
						FROM 
						OPORDPAG A                    
						WHERE 
						A.NUMTIQ >= '".$this->tiqdesde."' AND 
						A.NUMTIQ <= '".$this->tiqhasta."' AND							
						A.TIPCAU >= '".$this->tipcau1."' AND 
						A.TIPCAU <= '".$this->tipcau2."' AND							
						A.CEDRIF >= RPAD('".$this->ben1."',15,' ') AND 
						A.CEDRIF <= RPAD('".$this->ben2."',15,' ') AND
						A.FECEMI >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND 
						A.FECEMI <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND																				
						RTRIM(A.NOMBEN) Like RTRIM('".$this->nomben."')
						ORDER BY A.NUMORD, A.FECEMI";
		
			$this->llenartitulosmaestro();
			$this->llenartitulos2();			
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,20);			
			
		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="    Nro.";
				$this->titulos[1]="  Nro.";
				$this->titulos[2]="Beneficiario ";
				$this->titulos[3]="     Monto";
				$this->titulos[4]="Fecha";
				$this->titulos[5]="Estado";
				$this->titulos[6]="Fecha";

				$this->anchos=array();


				$this->anchos[0]=18;
				$this->anchos[1]=16;
				$this->anchos[2]=48;
				$this->anchos[3]=32;
				$this->anchos[4]=28;
				$this->anchos[5]=35;
				$this->anchos[6]=20;
		}
		
		function llenartitulos2()
		{
				$this->titulos2[0]="    O/P";
				$this->titulos2[1]="  Ticket";
				$this->titulos2[2]="";				
				$this->titulos2[3]="     Total";
				$this->titulos2[4]="Emisión O/P";
				$this->titulos2[5]="";
				$this->titulos2[6]="Envío";
				
				$this->anchos2=array();
				$this->anchos2[0]=16;
				$this->anchos2[1]=16;
				$this->anchos2[2]=50;
				$this->anchos2[3]=30;
				$this->anchos2[4]=28;
				$this->anchos2[5]=37;
				$this->anchos2[6]=20;
	
		}		

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
		    $this->setFont("Arial","",8);
		    $this->cell(62,5," ");
		    $this->cell(10,5,"Desde: ");
		    $this->cell(20,5,$this->fecreg1);
		    $this->cell(10,5,"Hasta: ");
			$this->cell(15,5,$this->fecreg2);
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
			
				$tb=$this->bd->select($this->sql);
				$this->setFont("Arial","",8);
				$this->SetFillColor(255,255,255);
				$this->ln(2);
				$con=0;
				$acuTot=0;
				while(!$tb->EOF)
				{				
					 // calcula Monto Total 
					 $MontoTotal=$tb->fields["monto_orden"] - $tb->fields["monret"]  - $tb->fields["mondes"];	
					 ////
					 ///Seleccionar STATUS///////////////////////////////////////////////////////////////////
					$estado="";
					$fecenv="";
					$sql1="SELECT coalesce(COUNT(NUMORD),0) as contador  FROM TMPORDPAGDES WHERE NUMORD='".$tb->fields["numord"]."' ";
					$tb1=$this->bd->select($sql1);			
					if (!$tb1->EOF)
					{
						$contador=$tb1->fields["contador"];
					}	

				    $sql2="SELECT DISTINCT(STATUS) as status, to_char(FECENVCON,'dd/mm/yyyy') as fecenvcon, 
					       to_char(FECENVFIN,'dd/mm/yyyy') as fecenvfin  
						   FROM OPORDPAG WHERE NUMORD='".$tb->fields["numord"]."' ";
					$tb2=$this->bd->select($sql2);			
					if (!$tb2->EOF)
					{
						$status=$tb2->fields["status"];
					}	
					
					if ($contador!=0 and $status!='N' and $status!='I' )
					 {
						  if ($status=='A')
						  {
				             $estado="ANULADA";
						  }
						  else
						  {
				             $estado="DESPACHO";
							 //para la fecha de envio
							 $sqlfec="SELECT DISTINCT to_char(FECENV,'dd/mm/yyyy') as fecenv
									FROM TMPORDPAGDES  
								    WHERE NUMORD='".$tb->fields["numord"]."' ";
							 $tbfec=$this->bd->select($sqlfec);			
							 if (!$tbfec->EOF) 
							 {
								$fecenv=$tbfec->fields["fecenv"];
							 }	
						  }//else  if ($status=='A')
					 } // if ($contador!=0 and $status!='N' and $status!='I' )
					 else
					  {

						if ($status=='N')
						{
				             $estado="FINANZAS";
							 $fecenv=$tbfec->fields["fecenvfin"];
						}
						elseif ($status=='C')
						{
				             $estado="CONTRALORIA";
							 $fecenv=$tb2->fields["fecenvcon"];
						}
						elseif ($status=='I')
				        {  
							$sql3="SELECT status as refpag  FROM tscheemi WHERE numche=RPAD('".$tb->fields["numord"]."',20,' ')  ";
							$tb3=$this->bd->select($sql3);			
							if (!$tb3->EOF)
							{
								$refpag=$tb3->fields["refpag"];
							}	
							if ($refpag=='E')
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
						 elseif ($status=='A')
				           { 
							$estado="PARA ENVIAR A CONTRALORÍA"; 						
						   }	
						 elseif ($status!='E' and $status!='C' and $status!='I' and $status!='N' and $status!='A')
						  {
							 $estado="-";
						  }
						}//// if ($contador!=0 and $status!='N' and $status!='I' )

				 if  ($estado=="") // NO SE ENCONTRARON DATOS
				 {
					$sql3="SELECT coalesce(COUNT(REFOPP),0) as contador2  FROM opcheper WHERE refopp='".$tb->fields["numord"]."' ";
					$tb3=$this->bd->select($sql3);			
					if (!$tb3->EOF)
					{
						$contador2=$tb3->fields["contador2"];
					}	
					if ($contador2 >0)
					{
					   $estado="PERMANENTE PAGADA";       
					}	  
					else
					{
						$estado="---";       
					}
				 }// if  ($estado="") 				 
				 /////////////////////////////////////////////////////////////////////////////////////////						
				
					 $this->cell($this->anchos2[0],5,$tb->fields["numord2"]);
					 $this->cell($this->anchos2[1],5,$tb->fields["numerotiq"]);
					 $this->cell($this->anchos2[2],5,substr($tb->fields["nomben"],0,25));		 	
					 $this->cell($this->anchos2[3]-8,5,number_format($MontoTotal,2,'.',','),0,0,'R',1);
					 $this->cell(8,5,"");	
					 $this->cell($this->anchos2[4],5,$tb->fields["fecemi"]);
					 $this->cell($this->anchos2[5],5,$estado);
					 $this->ln(4);
					 $con=$con+1;
					 $acuTot=$acuTot+$MontoTotal;
					 $tb->MoveNext();
				} //end while

                 if ($this->getY() > 220 )
					{
				  		$this->AddPage();					
					}
				 $this->ln(4);
  				 $this->Line(10, $this->getY(),118,$this->getY());
				 $this->ln(2);
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,"TOTALES: ");
			 	 $this->ln(5);
				 $this->cell(20,5,""); 
				 $this->cell(28,5,"Nº DE ORDENES: ");
				 $this->cell(15,5,$con);
				 $this->cell(19,5,"MONTO: ");
 			     $this->cell($this->anchos2[3]-8,5,number_format($acuTot,2,'.',','),0,0,'R',1);
				 
			}
	}
?>