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
		var $nombreben;
				
		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();		
			$this->numorddes=$_POST["ord1"];
			$this->numordhas=$_POST["ord2"];
			$this->fecenv1=$_POST["fecenv1"];
			$this->fecenv2=$_POST["fecenv2"];
			$this->secadmfin=$_POST["secadmfin"];
			
			///
			$this->sql="SELECT A.NUMORD,                      
						A.NUMORD2 as NUMORD2,   
						to_char(A.FECEMI,'dd/mm/yyyy') as fecemi,
						A.NOMBEN as NOMBENEF,
						A.MONORD,
						A.NUMTIQ,
						A.TIPCAU
						FROM 
						OPORDPAG A
						WHERE 
						A.NUMORD>='".$this->numorddes."' and
						A.NUMORD<='".$this->numordhas."' and
						A.FECENVFIN >= to_date('".$this->fecenv1."','dd/mm/yyyy') and
						A.FECENVFIN <= to_date('".$this->fecenv2."','dd/mm/yyyy') and
						(A.STATUS='N' OR A.STATUS='I') 
						UNION
						SELECT 
						D.REFAJU,
						D.REFAJU as NUMORD2,
						to_char(D.FECAJU,'dd/mm/yyyy') as fecemi,
						C.NOMBEN,
						D.TOTAJU,
						C.NUMTIQ,
						D.TIPAJU
						FROM 
						CPAJUSTE D,
						OPORDPAG C
						WHERE 
						D.REFERE=C.NUMORD AND
						(D.ORDPAG='N' OR D.ORDPAG='I') AND
						D.REFAJU >='".$this->numorddes."' AND
						D.REFAJU <='".$this->numordhas."' and
						d.refaju not in (select numord from opordpag)
						ORDER BY NUMORD";

			$this->llenartitulosmaestro();
			$this->llenartitulos2();			
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,20);							
		}
		

				
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Orden de";
				$this->titulos[1]="             Beneficiario ";
				$this->titulos[2]="  Tipo de Orden";
				$this->titulos[3]="    Nro.";
				$this->titulos[4]="  Fecha";
				$this->titulos[5]="           Monto";
	
				$this->anchos=array();


				$this->anchos[0]=20;
				$this->anchos[1]=60;
				$this->anchos[2]=42;
				$this->anchos[3]=22;
				$this->anchos[4]=22;
				$this->anchos[5]=24;
		}
		
		function llenartitulos2()
		{
				$this->titulos2[0]="   Pago";
				$this->titulos2[1]="";	
				$this->titulos2[2]="";					
				$this->titulos2[3]="  Ticket";      
				$this->titulos2[4]="Emisión";
				$this->titulos2[5]="             Bs.";			
		}		

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);

			
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
				$this->cell($this->anchos[$i],7,$this->titulos2[$i]);
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
             $con=0;
			 $acuTot=0;
			 while(!$tb->EOF){
			        
				   ///TIPO DE ORDEN ///////////////////////////////////////////////////////////////////
				   $sql="SELECT coalesce(COUNT(TIPCAU),0) as contador FROM CPDOCCAU WHERE TIPCAU='".$tb->fields["tipcau"]."'";
				   $tb1=$this->bd->select($sql);			
				   if (!$tb1->EOF)	{$contador=$tb1->fields["contador"];	}	 					   
				   if ($contador!=0 )
					{
					  $sql="SELECT coalesce(NOMEXT,' ') as nombre	FROM CPDOCCAU WHERE TIPCAU='".$tb->fields["tipcau"]."'";
					  $tbN=$this->bd->select($sql);			
					  if (!$tbN->EOF) {$tipord=$tbN->fields["nombre"];	}	 
					 }  
				   else
				   {   
				     $sql="SELECT coalesce(MAX(NOMEXT),' ') as nombre FROM CPDOCCOM WHERE TIPCOM='".$tb->fields["tipcau"]."'";
				     $tbN=$this->bd->select($sql);			
				     if (!$tbN->EOF) {$tipord=$tbN->fields["nombre"];	}
				     
								   
					  if ($tipord!='')
					  {
						$tipord=$tipord; 	
					  }	 
					  else
					  {
						  $sql="SELECT coalesce(NOMEXT,' ') as nombre	FROM CPDOCAJU WHERE TIPAJU='".$tb->fields["tipcau"]."'";
						  $tbN=$this->bd->select($sql);			
						  if (!$tbN->EOF) {$tipord=$tbN->fields["nombre"];	}	              
					 }
				   }//if ($contador!=0 ) 
				   
					////////////////////////////////////////////////////////////////////////////////////
					 $this->cell($this->anchos[0],5,$tb->fields["numord2"]);
					 $this->cell($this->anchos[1],5," ");
				     $this->cell($this->anchos[2],5,$tipord);
					 $this->cell($this->anchos[3],5,$tb->fields["numtiq"]);
		 			 $this->cell($this->anchos[4],5,$tb->fields["fecemi"]);
					 $this->cell($this->anchos[5],5,number_format($tb->fields["monord"],2,'.',','),0,0,'R');
		
					 $y=$this->GetY();					 
					 $this->setXY(30,$y+1);
					 $this->Multicell(52,3,$tb->fields["nombenef"]); //Beneficiario					
					 $con=$con+1;
					 $acuTot=$acuTot+$tb->fields["monord"];
 				     $tb->MoveNext();
					// $this->ln();								 
  		  	}	//end while
			if ($this->getY() > 220 )
			{
				$this->AddPage();					
			}
			 $this->ln(4);
			 $this->Line(156, $this->getY(),200,$this->getY());
			 $this->ln(2);
			 $this->setFont("Arial","B",8);
			 $this->cell(25,5,"TOTAL DE ORDENES:   ".$con);
	 		 $this->setXY(154,$this->GetY());
			 $this->cell(24,5,"TOTAL Bs.: ");
			 $this->cell($this->anchos[4],5,number_format($acuTot,2,'.',','),0,0,'R',1);			
	 	     $this->ln(15);
			 $this->cell(15,5,"Atentamente");
 			 $this->ln(20);
			 $this->Line(10, $this->getY(),60,$this->getY());
			 $this->ln(1);
			 $this->cell(15,5,$this->secadmfin);

		}
	}
?>