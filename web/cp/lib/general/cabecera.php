<?
require_once("../../lib/bd/basedatosAdo.php");

class cabecera 
{
	
	var $bd;
	
	function cabecera()
	{
		$this->bd=new basedatosAdo();
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Funcion que imprime la cabecera que se desea en el reporte                                                 //
	// $objeto: es el objeto fpdf que construye la cabecera                                                       //
	// $rep: es el Titulo del Reporte                                                                             //
	// $configuracion: es la manera de como vamos a mostrar las paginas (p) si es Vertical y (l) si es Horizontal //
	// $pagina: es el valor para mostrar el numero y el total de paginas (s) las muestra y (n) no las muestra     //
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function poner_cabecera($objeto,$rep,$configuracion,$pagina)
	{
		if($configuracion=="p")
		{
			//configuro la pagina con Orientacion Vertical
			//busco la descripcion y direccion de la empresa
			$tb3=$this->bd->select("select * from empresa where codemp='001'");
			if(!$tb3->EOF)
			{
				$nombre=$tb3->fields["nomemp"];
				$direccion=$tb3->fields["diremp"];
				$telef=$tb3->fields["tlfemp"];
				$fax=$tb3->fields["faxemp"];
			}
			$objeto->setFont("Arial","B",8);
			//Logo de la Empresa
			$objeto->Image("../../img/logo_1.jpg",10,8,33);
			//fecha actual
			$fecha=date("d/m/Y");
			$objeto->Cell(350,10,'Fecha: '.$fecha,0,0,'C');
			$objeto->ln(5);
			//Paginas
			if($pagina=="s")
			{
				$objeto->Cell(350,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');
			}
	    	//Titulo Descripcion de la Empresa
    		$objeto->Ln(-5);
    		$objeto->Cell(180,5,$nombre,0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(180,5,$direccion,0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(180,5,'Tlf:'.$telef,0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(180,5,'Fax:'.$fax,0,0,'C');
    		$objeto->Ln(8);
			//Titulo del Reporte
			$objeto->setFont("Arial","B",12);
			$objeto->Cell(180,10,$rep,0,0,'C',0); 
			$objeto->ln(10);
			$objeto->Line(10,35,200,35);
		}
		else
		{
			//configuro la pagina con Orientacion Horizontal
			//busco la descripcion y direccion de la empresa
			$tb3=$this->bd->select("select * from empresa where codemp='001'");
			if(!$tb3->EOF)
			{
				$nombre=$tb3->fields["nomemp"];
				$direccion=$tb3->fields["diremp"];
				$telef=$tb3->fields["tlfemp"];
				$fax=$tb3->fields["faxemp"];
			}
			$objeto->setFont("Arial","B",8);
			//Logo de la Empresa
			$objeto->Image("../../img/logo_1.jpg",10,8,33);
			//fecha actual
			$fecha=date("d/m/Y");
			$objeto->Cell(470,10,'Fecha: '.$fecha,0,0,'C');
			$objeto->ln(5);
			//Paginas
			if($pagina=="s")
			{
				$objeto->Cell(470,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');
			}
	    	//Titulo Descripcion de la Empresa
    		$objeto->Ln(-5);
    		$objeto->Cell(270,5,$nombre,0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(270,5,$direccion,0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(270,5,'Tlf:'.$telef,0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(270,5,'Fax:'.$fax,0,0,'C');
    		$objeto->Ln(8);
			//Titulo del Reporte
			$objeto->setFont("Arial","B",12);
			$objeto->Cell(270,10,$rep,0,0,'C',0); 
			$objeto->ln(10);
			$objeto->Line(10,35,270,35);

		}

	}
}
?>