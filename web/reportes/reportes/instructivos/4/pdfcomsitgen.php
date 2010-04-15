<?
	require_once("../../lib/general/fpdfadds.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $sql;		
		var $cab;
		var $titulo;
		//
		var $codemp;
		var $nomemp;
		var $fecha;
		var $orgads;
		
		function pdfreporte()
		{
		    $this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();			
			$this->codemp=$_POST["codemp"];
			$this->nomemp=$_POST["nomemp"];
			$this->fecha=date("d/m/Y");
			$this->orgads=$_POST["orgads"];
			$this->titulo=$_POST["titulo"];
			$this->explicacion=$_POST["explicacion"];
			$this->problemas=$_POST["problemas"];
			$this->soluciones=$_POST["soluciones"];
			
			
			$this->sql="";
			
			
			
			
		$this->cab=new cabecera();
		}
		

		function Header()
		{
			//$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->SetFont("Arial","B",7);
			$this->setLinewidth(0.5);
			$this->rect(12,9,190,37);
			$this->Image("../../img/logo_1.jpg",25,10,25);
			$this->setXY(15,30);
			$this->MultiCell(45,3,'
			'.$this->codemp.'
			'.$this->nomemp,0,'C',0);						
			$this->SetFont("Arial","B",10);
			$this->setXY(70,25);
			$this->setTextcolor(0,0,150);
			$this->MultiCell(80,3,$this->titulo,0,'C',0);						
			$this->setTextcolor(0,0,0);
			$this->SetFont("Arial","B",8);
			$this->setXY(18,38);
			//$this->Cell(60,10,$this->orgads);
			$this->setXY(180,10);
			$this->Cell(15,10,'FECHA');
			$this->setLinewidth(0);
			$this->line(178,22,196,22);
			$this->line(178,19,178,22);
			$this->line(196,19,196,22);
			$this->line(183,19,183,22);
			$this->line(188,19,188,22);
			$this->setXY(178,13);
			$this->Cell(5,15,substr($this->fecha,0,2));
			$this->Cell(5,15,substr($this->fecha,3,2));
			$this->Cell(10,15,substr($this->fecha,6,4));			
			$this->Formato();
		}
		
		function Formato()
		{
			$this->setLinewidth(0.5);
			$this->rect(12,50,190,210);
			$this->setLinewidth(0);
			$this->setXY(20,58);
			$this->MultiCell(180,4,'
			EXPLICACIÓN DE LAS DESVIACIONES MAS SIGNIFICATIVAS CON RESPECTO AL PRESUPUESTO POR
			PROYECTO O ACCIÓN CENTRALIZADA, PARTIDAS DE INGRESOS Y GASTOS; METAS Y RECURSOS
			HUMANOS',0,'J',0);
			$this->setXY(20,145);
			$this->Cell(100,10,'PROBLEMAS PREVISIBLES MAS IMPORTANTES');
			$this->setXY(20,195);
			$this->Cell(100,10,'SOLUCIONES POSIBLES A LOS PROBLEMAS');
			$this->setLinewidth(0.7);
			$this->line(90,249,140,249);
			$this->setXY(20,249);
			$this->Cell(190,10,'FIRMA DEL PRESIDENTE O GERENTE',0,0,'C');
		   	
		}
		
		function Cuerpo()
		{	
			$this->setXY(22,75);
			$this->MultiCell(170,4,$this->explicacion,0,'J',0);	
			$this->setXY(22,155);
			$this->MultiCell(170,4,$this->problemas,0,'J',0);	
			$this->setXY(22,205);
			$this->MultiCell(170,4,$this->soluciones,0,'J',0);			
		}		
	}
?>