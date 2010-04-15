<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $nroorddes;
		var $bd;		
		var $nroordhas;
		var $bendes;
		var $benhas;
		var $fechades;
		var $fechahas;
		var $tipcaudes;
		var $tipcauhas;
		var $codpredes;
		var $codprehas;
		var $codunides;
		var $codunihas;
		var $comodin;
						
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->nroorddes=$_POST["nroorddes"];
			$this->nroordhas=$_POST["nroordhas"];
			$this->bendes=$_POST["bendes"];
			$this->benhas=$_POST["benhas"];
			$this->fechades=$_POST["fechades"];
			$this->fechahas=$_POST["fechahas"];
			$this->tipcaudes=$_POST["tipcaudes"];
			$this->tipcauhas=$_POST["tipcauhas"];			
			$this->codpredes=$_POST["codpredes"];
			$this->codprehas=$_POST["codprehas"];
			$this->codunides=$_POST["codunides"];			
			$this->codunihas=$_POST["codunihas"];	
			$this->comodin=$_POST["comodin"];			
			$this->estatus=$_POST["estatus"];			

			$this->sql="select 
						a.numord2 AS numorden,
						a.numord as orden,
						a.cedrif,
						a.nomben,
						a.desord,
						to_char(a.fecemi,'dd/mm/yyyy') as fecemi,
						a.monord,
						a.monret,
						a.mondes,
						a.coduni,
						(case when a.status='I' then 'Pagadas'
						  when a.status='N' then 'Pediente Por Pagar'
						  when a.status='A' then 'Anuladas' end) as status1,
						b.codpre,
						b.moncau as moncau,
						b.mondes as mdes,
						b.monret as mret,
						c.nompre,
						d.desubi
						from 
						opordpag a, 
						opdetord b, 
						cpdeftit c, 
						bnubica d,
						cpajuste e
						where 
						a.numord = b.numord and
						a.coduni = rpad(d.codubi,30,' ') and
						b.codpre= rpad(c.codpre,32,' ') and
						a.numord=e.refere and
						a.numord >= '".$this->nroorddes."' and
						a.numord <= '".$this->nroordhas."' and
						a.cedrif >= '".$this->bendes."' and
						a.cedrif <= '".$this->benhas."' and
						a.fecemi >= to_date('".$this->fechades."','dd/mm/yyyy') and
						a.fecemi <= to_date('".$this->fechahas."','dd/mm/yyyy') and
						b.codpre>='".$this->codpredes."' and
						b.codpre<='".$this->codprehas."' and
						a.coduni>='".$this->codunides."' and
						a.coduni<='".$this->codunihas."' and
						rtrim(b.codpre) like rtrim('".$this->comodin."') and
						a.status like '".$this->estatus."'
						order by a.numord,a.fecemi,a.coduni";
					

			$this->cab=new cabecera();			
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->cell(270,3,'Del: '.$this->fechades.' Al '.$this->fechahas,0,0,'C');
			$this->ln(4);
			$this->setFont("Arial","B",8);
			$this->line(10,$this->getY(),270,$this->getY());
			$this->cell(15,5,'Numero');
			$this->cell(46,5,'Beneficiario');			
			$this->cell(49,5,'Concepto');
		    //$this->ln(3);
		    $this->Cell(70);
			$this->cell(18,5,'Fecha');
			$this->cell(20,5,'Status');
		    $this->cell(22,5,'Orden de Pago',0,0,'R');
			$this->cell(15,5,'Fecha',0,0,'R');
		    $this->ln(4);
		    $this->Cell(145);
			$this->cell(25,5,'Monto',0,0,'R');
			$this->cell(37);
			$this->cell(25,5,'Monto',0,0,'R');
			$this->cell(25,5,'Total',0,0,'R');
			$this->ln(6);
			$this->line(10,$this->getY()-2,270,$this->getY()-2);
		}
		
		
		function Cuerpo()
		{
			$this->setFont("Arial","",8);
		    $tb=$this->bd->select($this->sql);

			 while(!$tb->EOF){
					 $this->cell(15,3,$tb->fields["numorden"]);
					 $this->cell(163);
					 $this->cell(15,3,$tb->fields["fecemi"],0,0,'C');
					 $this->cell(20,3,$tb->fields["status1"],0,0,'C');
					 $this->cell(24,3," ");
					 $pag = $this->PageNo();
					 $y=$this->GetY();		
					 $this->setXY(25,$y); //Para Asginar la posicion de las filas
					$this->setFont("Arial","",7);
					$this->Multicell(43,3,trim($tb->fields["nomben"]));
					$hasta1=$this->GetY();	 
					$this->setXY(70,$y);
					$this->Multicell(116,3,trim($tb->fields["desord"]));
					$this->setFont("Arial","",8);
					$hasta2=$this->GetY();	 
					//----------  Fecha
					 $numorden=$tb->fields["numorden"];
					 $sql="select a.refaju as ordanu,to_char(a.fecaju,'dd/mm/yyyy') as fecaju,a.refere from cpajuste a where a.refere='$numorden'";
					 $tb2=$this->bd->select($sql);
					 $this->SetY($y);
					 while(!$tb2->EOF) 
					 {
						 $this->SetX(233);
					     $this->cell(20,3,$tb2->fields["ordanu"],0,0,'L');
						 $this->cell(16,3,$tb2->fields["fecaju"],0,0,'R');						 
						 $this->ln(3);
						 $tb2->MoveNext();
					 }
					//-----------
					
					if($this->GetY() < $hasta1 and $this->GetY() < $hasta2 and $pag == $this->PageNo())
					{
						if($hasta1 < $hasta2)
						{
							$this->SetY($hasta2);
						}
						else
						{
							$this->SetY($hasta1);
						}
					}
					 $this->ln(4);
					 
					 $monaju=0;
					 $monto=0;
					 while($numorden==$tb->fields["numorden"])
					 {
					     $codpre1=$tb->fields["codpre"];
						 $this->cell(5,5," ");					 
						 $this->cell(45,5,trim($tb->fields["codpre"]));
						 $this->cell(93,5,substr(trim($tb->fields["nompre"]),0,50));
						 $monto=$monto+($tb->fields["moncau"]-$tb->fields["mret"]-$tb->fields["mdes"]);
						 $this->cell(25,5,number_format(($tb->fields["moncau"]-$tb->fields["mret"]-$tb->fields["mdes"]),2,'.',','),0,0,'R');		
						 $this->cell(40,5," ");				
						    //RETURN(:CF_SUBTOT-:CS_ANULADO);
							
						 $sql="Select a.refaju, b.monaju, b.codpre as codigo, c.numord as numerorden from cpajuste a, cpmovaju b, opordpag c where a.refaju=b.refaju and a.refere=c.numord and c.status='A' and b.codpre='$codpre1' and c.numord='$numorden'";
						 $tb2=$this->bd->select($sql);
						 $monaju=$monaju+$tb2->fields["monaju"];
						 $this->cell(25,5,number_format($tb2->fields["monaju"],2,'.',','),0,0,'R');		
						 $this->ln(4);
						 $tb->MoveNext();
					 }
					 $this->ln(3);
					 $this->line(140,$this->getY(),270,$this->getY());
					 $this->cell(143,5," ");		
					 $this->cell(25,5,number_format($monto,2,'.',','),0,0,'R');		
					 $this->cell(40,5," ");							 
					 $this->cell(25,5,number_format($monaju,2,'.',','),0,0,'R');		
					 $this->cell(25,5,number_format($monto-$monaju,2,'.',','),0,0,'R');		
					 $this->ln(4);
  			  $this->ln(3);			
  		  	}	
//			$this->line(10,$this->getY(),270,$this->getY());
			// Impresion de Totales
				//	 $this->cell(175,6," ");			
	//				 $this->cell(25,6,number_format($sum_monord,2,'.',','),0,0,'R');
		//			 $this->cell(25,6,number_format($sum_monret,2,'.',','),0,0,'R');					
			//		 $this->cell(25,6,number_format($sum_tot,2,'.',','),0,0,'R');
			//*
		}
	}
?>