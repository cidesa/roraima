<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atregdiar.class.php");
    require_once("../../lib/general/funciones.php");



	class pdfreporte extends fpdf
	{

	var $bd;


		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->cab = new Cabecera();
			$this->coddes=H::GetPost("codmin");
			$this->codhas=H::GetPost("codmax");

			$this->fechades=H::GetPost("fechades");
			$this->fechahas=H::GetPost("fechahas");

			$this->bd=new basedatosAdo();
			$this->atregdiar = new Atregdiar();
		    $this->arrp = $this->atregdiar->sqlp($this->coddes,$this->codhas,$this->fechades,$this->fechahas);
			$this->llenartitulosmaestro();
			$this->llenaranchos();
}

	function llenartitulosmaestro()
		{

			    $this->titulosm[100]="";
			    $this->titulosm[200]=" ";
			    $this->titulosm[300]="";

				$this->titulosm[0]="N°";
				$this->titulosm[1]="FECHA";
				$this->titulosm[2]="NOMBRE Y APELLIDO";
				$this->titulosm[3]="SEXO";
				$this->titulosm[4]="CEDULA";
				$this->titulosm[5]="EDAD";
				$this->titulosm[6]="LOCALIDAD";
				$this->titulosm[7]="TELEFONO ";
				$this->titulosm[8]="N° EXP";
				$this->titulosm[9]="MOTIVO DE CONSULTA";
				$this->titulosm[10]="DESCRIPCIÓN";
				$this->titulosm[11]="PRESUPUESTO";
				$this->titulosm[12]="REFERIDO POR ";
				$this->titulosm[13]="ORGANISMO";

		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=100;
		$this->anchos[1]=90;
		$this->anchos[2]=80;
		$this->anchos[3]=70;
		$this->anchos[4]=50;
		$this->anchos[5]=40;
		$this->anchos[6]=30;
		$this->anchos[7]=25;
        $this->anchos[8]=20;
        $this->anchos[9]=15;
        $this->anchos[10]=10;
        $this->anchos[11]=8;

	}

		function Header()
		{
                $this->cab->poner_cabecera($this,$_POST["titulo"],"l");

				$this->setFont("Arial","",6);
				$this->SetWidths(array($this->anchos[11],$this->anchos[9],$this->anchos[6],$this->anchos[11],$this->anchos[9],$this->anchos[11],$this->anchos[7],$this->anchos[9],$this->anchos[10],$this->anchos[7],$this->anchos[6],$this->anchos[7],$this->anchos[7],$this->anchos[7]));
    	        $this->SetAligns(array("C","C","C","C","C","C","C","C","C","C","C","C","C","C"));
    	        $this->setBorder(1);
                $this->Row(array($this->titulosm[0],$this->titulosm[1],$this->titulosm[2],$this->titulosm[3],$this->titulosm[4],$this->titulosm[5],$this->titulosm[6],$this->titulosm[7],$this->titulosm[8],$this->titulosm[9],$this->titulosm[10],$this->titulosm[11],$this->titulosm[12],$this->titulosm[13]));

		}

function Cuerpo()

		{

	    $contador=0;
		$cedula="";
		$registro=count($this->arrp);
		$fecha=date("d/m/Y");

		foreach($this->arrp as $dato)
            {


			 if($dato["cedula"]!=$cedula)

               {
               	$contador=$contador+1;
               	$this->setFont("Arial","",6);
               	$this->SetWidths(array($this->anchos[11],$this->anchos[9],$this->anchos[6],$this->anchos[11],$this->anchos[9],$this->anchos[11],$this->anchos[7],$this->anchos[9],$this->anchos[10],$this->anchos[7],$this->anchos[6],$this->anchos[7],$this->anchos[7],$this->anchos[7]));
    	        $this->SetAligns(array("L","L","C","C","L","C","L","L","C","L","L","R","C","C"));
    	        $this->setBorder();
                $this->Row(array($contador.'',$dato["fecha"],$dato["nombre"].'   '.$dato["apellido"],$dato["sexo"],$dato["cedula"],$dato["edad"],$dato["localidad"],$dato["telefono"],$dato["expediente"],$dato["descripcion"],$dato["motivo"],$dato["presupuesto"],$dato["tipo"],$dato["organismo"]));


               	$nroexp=$dato["cedula"];
				}

		}
}
}