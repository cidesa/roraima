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
		var $codaccadm1;
		var $codaccadm2;
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
			$this->codcom1=$_POST["codcom1"];
			$this->codcom2=$_POST["codcom2"];
			$this->sql="select a.codnom,
							   a.codcon,
							   (CASE WHEN trim(status)='C' THEN 'CANTIDAD' WHEN trim(status)='M' THEN 'MONTO' END) as status,
							   a.mensaje,
							   b.nomnom
							  from npdefmov a, npnomina b  
						      WHERE 
							        (a.codcon Between  '".$this->codcon1."' AND '".$this->codcon2."') and
									(a.codnom Between  '".$this->codcom1."' AND '".$this->codcom2."') and
									a.codnom=b.codnom
							  ORDER BY 
							  b.nomnom asc";			
			$this->llenartitulosmaestro();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Descripciòn de Nomina";
				$this->titulos[1]="Còdigo Concepto";
				$this->titulos[2]="Estatus";
				$this->titulos[3]="Mensaje";				
				$this->anchos[0]=80;
				$this->anchos[1]=30;
				$this->anchos[2]=40;
				$this->anchos[3]=10;

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
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
				 $this->cell($this->anchos[0],10,$tb->fields["nomnom"]);
				 $this->cell($this->anchos[1],10,$tb->fields["codcon"]);
				 $this->cell($this->anchos[2],10,$tb->fields["status"]);
				 $this->cell($this->anchos[3],10,$tb->fields["mensaje"]);
				 $tb->MoveNext();
			     $this->ln(3);
			}	
		}
	}
?>