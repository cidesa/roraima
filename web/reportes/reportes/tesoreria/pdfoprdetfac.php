<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	#require_once("../../lib/general/caracteres.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $numorddes;
		var $numordhas;
		var $bendes;
		var $benhas;
		var $fechades;
		var $fechahas;
		var $codtipdes;
		var $codtiphas;
		var $conf;
		var $formato;
		var $direccion;
		var $telefono;
				
		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numorddes=$_POST["numorddes"];
			$this->numordhas=$_POST["numordhas"];
			$this->bendes=$_POST["bendes"];
			$this->benhas=$_POST["benhas"];
			$this->fechades=$_POST["fechades"];
			$this->fechahas=$_POST["fechahas"];
			$this->codtipdes=$_POST["codtipdes"];
			$this->codtiphas=$_POST["codtiphas"];
			$this->sql="SELECT 
							A.NUMORD,
							A.CEDRIF,
							A.NOMBEN,
							A.DESORD,
							to_char(A.FECEMI,'dd/mm/yyyy') as fecemi,
							to_char(A.FECPAG,'dd/mm/yyyy') as fecpag,
							to_char(A.FECANU,'dd/mm/yyyy') as fecanu,
							A.MONORD,
							A.MONRET,
							A.MONDES,
							(CASE WHEN A.STATUS='I' THEN 'Pagadas' WHEN A.STATUS='N' THEN 'No Pagadas' WHEN A.STATUS='A' THEN 'Anuladas' ELSE '' END) as ESTATUS,
							to_char(B.FECFAC,'dd/mm/yyyy') as fecfac,
							B.NUMFAC,
							B.NUMCTR,
							B.TIPTRA,
							B.FACAFE,
							B.TOTFAC,
							B.EXEIVA,
							B.BASIMP,
							B.PORIVA,
							B.MONIVA,
							B.MONRET as RETIVA,
							B.BASLTF,
							B.MONLTF,
							B.PORLTF,
							B.BASISLR,
							B.PORISLR,
							B.MONISLR
						FROM OPORDPAG A, OPFACTUR B
						WHERE 
							A.NUMORD >= RPAD('".$this->numorddes."',8,' ') AND
							A.NUMORD <= Rpad('".$this->numordhas."',8,' ') AND
							A.CEDRIF >= Rpad('".$this->bendes."',15,' ') AND
							A.CEDRIF <= Rpad('".$this->benhas."',15,' ') AND
							A.NUMORD = B.NUMORD AND
							A.FECEMI >= to_date('".$this->fechades."','dd/mm/yyyy') AND
							A.FECEMI <= to_date('".$this->fechahas."','dd/mm/yyyy') 
						ORDER BY A.NUMORD,A.FECEMI";			
			//print $this->sql;
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
			$this->setFont("Arial","B",6);
			$this->line(10,$this->getY(),270,$this->getY());
			$this->cell(20,5,'Orden');
			$this->cell(80,5,'Beneficiario');
			$this->cell(30,5,'Fecha');
			$this->cell(60,5,'Concepto');
			$this->ln(4);
			$this->cell(15,5,'Fecha');
			$this->cell(22,5,'No. Fact.');
			$this->cell(22,5,'No. Cont.');
			$this->cell(10,5,'Tipo');
			$this->cell(16,5,'Tot. Factura');
			$this->cell(16,5,'Monto Exento');
			$this->cell(19,5,'Base Imponible');
			$this->cell(11,5,'% IVA');
			$this->cell(16,5,'Monto IVA');
			$this->cell(16,5,'IVA Retenido');
			$this->cell(16,5,'Base ISLR');
			$this->cell(16,5,'% ISLR');
			$this->cell(16,5,'ISLR Retenido');
			$this->cell(16,5,'Base LTF');
			$this->cell(11,5,'% LTF');
			$this->cell(16,5,'LTF Retenido');
		    $this->ln(4);
			$this->line(10,$this->getY(),270,$this->getY());
		}
		function Cuerpo()
		{
			$this->setFont("Arial","",7);
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$acum4=0;
			$acum5=0;
			$acum6=0;
			$acum7=0;
			$acum8=0;
			$acum9=0;
		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$ref="";
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["numord"];
				$this->setFont("Arial","B",6);
				$this->cell(20,5,$tb->fields["numord"]);
				$this->cell(80,5,$tb->fields["nomben"]);
				$this->cell(30,5,$tb->fields["fecemi"]);
				$concepto=$tb->fields["desord"];
				#$concepto=eliminarcaracter($tb->fields["desord"]);
				$x = $this->GetX();
				$this->SetY($this->GetY()+1);
				$this->SetX($x);
				$this->MultiCell(128,3,$concepto);
				//$this->ln(4);
							}
			while(!$tb->EOF)
			{
				if($tb->fields["numord"]!=$ref)
				{
					//Totales
					$this->setFont("Arial","B",6);
					$this->ln(2);
					$this->line(10,$this->getY(),270,$this->getY());
					$this->cell(15,5,'TOTAL ');
					$this->cell(22,5,'');
					$this->cell(22,5,'');
					$this->cell(10,5,'');
					$this->cell(16,5,number_format($acum1,2,'.',','),0,0,'R');
					$acum1=0;
					$this->cell(16,5,number_format($acum2,2,'.',','),0,0,'R');
					$acum2=0;
					$this->cell(19,5,number_format($acum3,2,'.',','),0,0,'R');
					$acum3=0;
					$this->cell(11,5,'');
					$this->cell(16,5,number_format($acum4,2,'.',','),0,0,'R');
					$acum4=0;
					$this->cell(16,5,number_format($acum5,2,'.',','),0,0,'R');
					$acum5=0;
					$this->cell(16,5,number_format($acum6,2,'.',','),0,0,'R');
					$acum6=0;
					$this->cell(12,5,'');
					$this->cell(21,5,number_format($acum7,2,'.',','),0,0,'R');
					$acum7=0;
					$this->cell(15,5,number_format($acum8,2,'.',','),0,0,'R');
					$acum8=0;
					$this->cell(11,5,'');
					$this->cell(16,5,number_format($acum9,2,'.',','),0,0,'R');
					$acum9=0;
					//
					$this->ln(4);
					$this->setFont("Arial","B",6);
					$this->line(10,$this->getY(),270,$this->getY());
					$this->cell(20,5,$tb->fields["numord"]);
					$this->cell(80,5,$tb->fields["nomben"]);
					$this->cell(30,5,$tb->fields["fecemi"]);
					$concepto=$tb->fields["desord"];
					#$concepto=eliminarcaracter($tb->fields["desord"]);
					$this->cell(60,5,substr($concepto,0,95));
					$this->ln(4);
				}
				$this->setFont("Arial","",6);
				//$this->ln(2);
				$this->cell(15,5,$tb->fields["fecfac"]);
				$this->cell(22,5,$tb->fields["numfac"]);
				$this->cell(22,5,$tb->fields["numctr"]);
				$this->cell(10,5,$tb->fields["tiptra"]);
				$this->cell(16,5,number_format($tb->fields["totfac"],2,'.',','),0,0,'R');
				$acum1=$acum1+$tb->fields["totfac"];
				$this->cell(16,5,number_format($tb->fields["exeiva"],2,'.',','),0,0,'R');
				$acum2=$acum2+$tb->fields["exeiva"];
				$this->cell(19,5,number_format($tb->fields["basimp"],2,'.',','),0,0,'R');
				$acum3=$acum3+$tb->fields["basimp"];
				$this->cell(11,5,$tb->fields["poriva"],0,0,'C');
				$this->cell(16,5,number_format($tb->fields["moniva"],2,'.',','),0,0,'R');
				$acum4=$acum4+$tb->fields["moniva"];
				$this->cell(16,5,number_format($tb->fields["retiva"],2,'.',','),0,0,'R');
				$acum5=$acum5+$tb->fields["retiva"];
				$this->cell(16,5,number_format($tb->fields["basislr"],2,'.',','),0,0,'R');
				$acum6=$acum6+$tb->fields["basislr"];
				$this->cell(12,5,$tb->fields["porislr"],0,0,'C');
				$this->cell(21,5,number_format($tb->fields["monislr"],2,'.',','),0,0,'R');
				$acum7=$acum7+$tb->fields["monislr"];
				$this->cell(15,5,number_format($tb->fields["basltf"],2,'.',','),0,0,'R');
				$acum8=$acum8+$tb->fields["basltf"];
				$this->cell(11,5,$tb->fields["porltf"],0,0,'C');
				$this->cell(16,5,number_format($tb->fields["monltf"],2,'.',','),0,0,'R');
				$acum9=$acum9+$tb->fields["monltf"];
				$ref=$tb->fields["numord"];
			  $tb->MoveNext();
  			  $this->ln(3);			
  		  }	
		  
					//Totales
					$this->setFont("Arial","B",6);
					$this->ln(2);
					$this->line(10,$this->getY(),270,$this->getY());
					$this->cell(15,5,'TOTAL ');
					$this->cell(22,5,'');
					$this->cell(22,5,'');
					$this->cell(10,5,'');
					$this->cell(16,5,number_format($acum1,2,'.',','),0,0,'R');
					$acum1=0;
					$this->cell(16,5,number_format($acum2,2,'.',','),0,0,'R');
					$acum2=0;
					$this->cell(19,5,number_format($acum3,2,'.',','),0,0,'R');
					$acum3=0;
					$this->cell(11,5,'');
					$this->cell(16,5,number_format($acum4,2,'.',','),0,0,'R');
					$acum4=0;
					$this->cell(16,5,number_format($acum5,2,'.',','),0,0,'R');
					$acum5=0;
					$this->cell(16,5,number_format($acum6,2,'.',','),0,0,'R');
					$acum6=0;
					$this->cell(12,5,'');
					$this->cell(21,5,number_format($acum7,2,'.',','),0,0,'R');
					$acum7=0;
					$this->cell(15,5,number_format($acum8,2,'.',','),0,0,'R');
					$acum8=0;
					$this->cell(11,5,'');
					$this->cell(16,5,number_format($acum9,2,'.',','),0,0,'R');
					$acum9=0;
					//
		}
	}
?>