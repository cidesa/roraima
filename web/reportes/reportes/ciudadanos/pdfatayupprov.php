<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atayupprov.class.php");
    require_once("../../lib/general/funciones.php");



	class pdfreporte extends fpdf
	{

	var $bd;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->coddes=H::GetPost("codmin");
			$this->codhas=H::GetPost("codmax");

			$this->fechades=H::GetPost("fechades");
			$this->fechahas=H::GetPost("fechahas");

			$this->bd=new basedatosAdo();
			$this->atayupprov = new Atayupprov();
		    $this->arrp = $this->atayupprov->sqlp($this->coddes,$this->codhas);
			$this->llenartitulosmaestro();
			$this->llenaranchos();
}

	function llenartitulosmaestro()
		{

			    $this->titulosm[100]="TOTAL POR TIPO DE AYUDA";
			    $this->titulosm[200]="";
			    $this->titulosm[300]="TOTA GENERAL";

				$this->titulosm[0]="FECHA DE SOLICITUD";
				$this->titulosm[2]="Nº EXP ";
				$this->titulosm[1]="NOMBRE DEL PROVEEDOR";
				$this->titulosm[3]="TOTAL";


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
                $this->cab->poner_cabecera($this,$_POST["titulo"],"p");

				$this->setFont("Arial","",10);
				$this->SetWidths(array($this->anchos[5]));
    	        $this->SetAligns(array("L"));
    	        $this->setBorder(1);
                $this->Row(array($this->titulosm[0]));
		}

function Cuerpo()

		{


		$fecha="";
		$registro=count($this->arrp);
        $monto=0;
		foreach($this->arrp as $dato)
            {

			 if($dato["fecha"]!=$fecha)

               {
                $this->Ln();
                $this->setFont("Arial","",8);
               	$this->SetWidths(array($this->anchos[8]));
    	        $this->SetAligns(array("L"));
    	        $this->setBorder(1);
                $this->Row(array($dato["fecha"]));

               	$this->arrp1 = $this->atayupprov->sqlp1($dato["fecha"]);
                $this->Ln(5);
                	$this->setFont("Arial","",10);
                $this->SetWidths(array($this->anchos[4],$this->anchos[5],$this->anchos[5]));
    	        $this->SetAligns(array("C","C","R"));
    	        $this->setBorder();
                $this->Row(array($this->titulosm[1],$this->titulosm[2],$this->titulosm[3]));
                $this->Ln();
                $fecha=$dato["fecha"];
                $monto=0;
                foreach($this->arrp1 as $dato1)
                       {

                $monto=$monto+$dato1["monto"];

               	$this->setFont("Arial","",8);
               	$this->SetWidths(array($this->anchos[4],$this->anchos[5],$this->anchos[5]));
    	        $this->SetAligns(array("L","C","R"));
    	        $this->setBorder();
                $this->Row(array($dato1["nombre"],$dato1["expediente"],H::Formatomonto($dato1["monto"])));

                       }
                $total=$total+$monto;
                $this->Ln(8);
                $this->setFont("Arial","B",8);
                $this->SetWidths(array($this->anchos[4],$this->anchos[5],$this->anchos[5]));
    	        $this->SetAligns(array("R","R","R"));
    	        $this->setBorder();
                $this->Row(array($this->titulosm[200],$this->titulosm[100],H::Formatomonto($monto).''));

				}
		}

		        $this->Ln();
                $this->setFont("Arial","B",8);
                $this->SetWidths(array($this->anchos[4],$this->anchos[5],$this->anchos[5]));
    	        $this->SetAligns(array("R","R","R"));
    	        $this->setBorder();
                $this->Row(array($this->titulosm[200],$this->titulosm[300],H::Formatomonto($total).''));

}
}