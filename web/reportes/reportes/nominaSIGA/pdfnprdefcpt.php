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
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codcon1;
		var $codcon2;
		var $comodin;
		var $conf;
				
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
			$this->codcon1=$_POST["codcon1"];
			$this->codcon2=$_POST["codcon2"];
			$this->comodin=$_POST["comodin"];
			$this->sql="SELECT 
									codcon,
									(CASE WHEN trim(opecon)='A' THEN 'ASIGNACION' WHEN trim(opecon)='D' THEN 'DEDUCCION' WHEN trim(opecon)='P' THEN 'APORTE' END)  as opecon, 
									nomcon,
									codpar,
									(CASE WHEN trim(acuhis)='S' THEN 'SI' WHEN trim(acuhis)='N' THEN 'NO' END) as acuhis,
									(CASE WHEN trim(inimon)='S' THEN 'SI' WHEN trim(inimon)='N' THEN 'NO' END) as inimon,
									(CASE WHEN trim(conact)='S' THEN 'SI' WHEN trim(conact)='N' THEN 'NO' END) as conact,
									(CASE WHEN trim(impcpt)='S' THEN 'SI' WHEN trim(impcpt)='N' THEN 'NO' END) as impcpt,
									(CASE WHEN trim(afepre)='S' THEN 'SI' WHEN trim(afepre)='N' THEN 'NO' END) as afepre,									ordpag,
									nrocta 
									FROM npdefcpt 
						      WHERE 
							        (codcon Between  '".$this->codcon1."' AND '".$this->codcon2."')  
							  ORDER BY 
							  codcon";			
			$this->llenartitulosmaestro();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo";
				$this->titulos[1]="Operaciòn";
				$this->titulos[2]="Descripción";
				$this->titulos[3]="Partida";
				$this->titulos[4]="Ini.";
				$this->titulos[5]="Act..";
				$this->titulos[6]="Impri..";
				$this->titulos[7]="Ord. Pgo.";
				$this->titulos[8]="Presu.";

				$this->anchos[0]=10;
				$this->anchos[1]=20;
				$this->anchos[2]=70;
				$this->anchos[3]=20;	
				$this->anchos[4]=15;					
				$this->anchos[5]=15;	
				$this->anchos[6]=15;					
				$this->anchos[7]=15;	
				$this->anchos[8]=15;					


		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",7);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(4); 
			$this->Line(10,45,200,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(5); 
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",7);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			while(!$tb->EOF)
			{
				 $this->setFont("Arial","",7); 
				 $this->cell($this->anchos[0],10,$tb->fields["codcon"]);
				 $this->cell($this->anchos[1],10,$tb->fields["opecon"]);
				 $this->cell($this->anchos[2],10,$tb->fields["nomcon"]);
				 $this->cell($this->anchos[3],10,$tb->fields["codpar"]);
				 $this->cell($this->anchos[4],10,$tb->fields["acuhis"]);
				 $this->cell($this->anchos[5],10,$tb->fields["inimon"]);
				 $this->cell($this->anchos[6],10,$tb->fields["conact"]);
				 $this->cell($this->anchos[5],10,$tb->fields["impcpt"]);
				 $this->cell($this->anchos[6],10,$tb->fields["afepre"]);

				 $tb->MoveNext();
			     $this->ln(3);
			}	
		}
	}
?>