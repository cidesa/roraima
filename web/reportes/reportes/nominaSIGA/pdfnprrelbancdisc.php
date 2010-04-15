<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $sql;
		var $codnom;
		var $codban;				
		var $generar;
		var $cta;
		var $fecha;
		
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
 			$this->codnom=$_POST["codnom"];
			$this->codban=$_POST["codban"];
			$this->generar=$_POST["generar"];
			$this->cta=$_POST["cta"];
			$this->fecha=$_POST["fecha"];									

			
			$this->sql="select a.nacemp,
						a.cedemp AS codemp ,
						a.codemp AS idemp, 
						a.nomemp,
						numcue,
						d.codban AS codban,
						b.codcar,
						c.nomcar,
						b.codnom,
						sum(montonomina) as monto 
						from 
						nphojint a,
						npasicaremp b,
						npcargos c ,
						npsucban d
						where 
						a.codban=d.codsuc and
						codnom='".$this->codnom."'  and
						b.codemp = a.codemp and 
						b.codcar=c.codcar and
						d.codban='".$this->codban."' and
						status='V' 
						and a.staemp in (select codsitemp from npsitemp where calnom='S')
						and b.codemp in (select codemp from npnomcal where codnom='".$this->codnom."')
						and numcue is not null
						group by b.codnom,d.codban,a.cedemp,a.codemp,a.nomemp,b.codcar,c.nomcar,numcue,a.nacemp
						order by d.codban, rtrim(a.codemp)";
			

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CEDULA";
				$this->titulos[1]="NOMBRE DEL EMPLEADOR";
				$this->titulos[2]="CARGOS";
				$this->titulos[3]="CUENTA BANCARIA";
				$this->titulos[4]="MONTO A DEPOSITAR";								
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","",8);	
			$this->cell(15,6,"NOMINA :"); 
			//$this->Line(10,55,200,55);
			
		}
		function Cuerpo()
		{
			$this->setFont("Arial","",7);			
		    $tb=$this->bd->select($this->sql);

		//print	$tipnomdes=$tb->fields["tipnomdes"];
			
			$this->sql2="select nomnom as nombre					
							   from npnomina
							   where trim(codnom)='$this->codnom'";
							   
			 $tb2=$this->bd->select($this->sql2);
   			
			$this->cell(8,6,$this->codnom);
			$this->cell(100,6,$tb2->fields["nombre"]);		

		
			$this->sql3="SELECT to_char(ultfec,'dd/mm/yyyy') as ultfec,to_char(profec,'dd/mm/yyyy') as profec FROM npnomina WHERE trim(codnom)='$this->codnom'";		
			$tb3=$this->bd->select($this->sql3);
			$this->cell(13,6,"Desde: ".$tb3->fields["ultfec"]. "       Hasta : ".$tb3->fields["profec"]);
				
			$this->ln();

			$this->setFont("Arial","B",8);	
			$this->sql2="SELECT DISTINCT nomban as nombre FROM NPSUCBAN  WHERE trim(codban)='$this->codban'";
  		    $tb2=$this->bd->select($this->sql2);
			$this->cell(200,6,$tb2->fields["nombre"],0,0,'C');	
					
			
			$this->setFont("Arial","",7);	
			$this->ln();				
			$this->cell(13,6,$this->titulos[0]);
			$this->cell(55,6,$this->titulos[1]);
			$this->cell(60,6,$this->titulos[2]);
			$this->cell(40,6,$this->titulos[3]);
			$this->cell(15,6,$this->titulos[4]);
			$this->ln(4);
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+195,$this->GetY()+1);
			//$this->ln(2);
			$cont=0;
			$acum=0;
			while (!$tb->EOF)
			{	
				$cont=$cont+1;
				$this->cell(13,6,$tb->fields["codemp"]);
				$this->cell(55,6,$tb->fields["nomemp"]);
				$this->cell(60,6,$tb->fields["nomcar"]);
				$this->cell(45,6,$tb->fields["numcue"]);
				$acum=$acum+$tb->fields["monto"];
				$this->cell(20,6,number_format($tb->fields["monto"],2,'.',','),0,0,'R');
				$this->ln(4);
				$tb->MoveNext();
			}
			
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+195,$this->GetY()+1);
			$this->ln(4);
			$this->cell(13,6,"Total   ".$tb2->fields["nombre"]);
			$this->cell(167,6,"  ");
			$this->cell(13,6,number_format($acum,2,'.',','),0,0,'R');						
			$this->ln(4);
			$this->cell(13,6,"Cantidad de Trabajadores : ".$cont);

			
			

		}
	}
?>
