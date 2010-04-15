<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atcanayu.class.php");
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
			$this->periodo=H::GetPost("periodo");

			$this->bd=new basedatosAdo();
			$this->atcanayu = new Atcanayu();
		    $this->arrp = $this->atcanayu->sqlp($this->coddes,$this->codhas);
		    $this->periodo();
		    $this->convertir();
			$this->llenartitulosmaestro();
			$this->llenaranchos();
}

	function llenartitulosmaestro()
		{

			    $this->titulosm[100]="TOTAL POR TIPO DE AYUDA";
			    $this->titulosm[200]="";
			    $this->titulosm[300]="TOTA GENERAL";

				$this->titulosm[0]="TIPO DE AYUDA";
				$this->titulosm[1]="/2008";
				//$this->titulosm[2]="NOMBRES Y APELLIDOS";
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
		$this->anchos[5]=20;
		$this->anchos[6]=22;
		$this->anchos[7]=25;
        $this->anchos[8]=20;
        $this->anchos[9]=15;
        $this->anchos[10]=10;
        $this->anchos[11]=8;

	}

 function periodo()
 {
    switch ($this->periodo)
    {
  	case 1:
  	$this->p1=1;
  	$this->p2=2;
  	$this->p3=3;
    break;
    case 2:
  	$this->p1=4;
  	$this->p2=5;
  	$this->p3=6;
    break;
    case 3:
  	$this->p1=7;
  	$this->p2=8;
  	$this->p3=9;
    break;
    case 4:
  	$this->p1=10;
  	$this->p2=11;
  	$this->p3=12;
    break;
    }
 }

 function convertir($x)
         {
          switch ($x){

          	case 1:
          	$p='01';
            break;
            case 2:
          	$p='02';
            break;
            case 3:
          	$p='03';
            break;
            case 4:
          	$p='04';
            break;
            case 5:
          	$p='05';
            break;
            case 6:
          	$p='06';
            break;
            case 7:
          	$p='07';
            break;
            case 8:
          	$p='08';
            break;
            case 9:
          	$p='09';
            break;
            case 10:
          	$p='10';
            break;
            case 11:
          	$p='11';
            break;
            case 12:
          	$p='12';
            break;
         }

 return $p;

     }

		function Header()
		{
                $this->cab->poner_cabecera($this,$_POST["titulo"],"p");
                $this->setFont("Arial","B",8);
                $this->SetWidths(array($this->anchos[4],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[6],$this->anchos[6],$this->anchos[6]));
        		$this->SetAligns(array("C","C","C","C","C","C","C","C"));
        		$this->setBorder();
        		$this->Row(array($this->titulosm[0],$this->p1.$this->titulosm[1],$this->p2.$this->titulosm[1],$this->p3.$this->titulosm[1],$this->titulosm[200],$this->p1.$this->titulosm[1],$this->p2.$this->titulosm[1],$this->p3.$this->titulosm[1]));
		}

function Cuerpo()
		{
		$tipo="";
		$registro=count($this->arrp);
        $monto=0;
		foreach($this->arrp as $dato)
            {

			 if($dato["tipo"]!=$tipo)

               {

                $k=0;
                for ($I=$this->p1;$I<=$this->p3;$I++)

                   {
                   	    $mes=$this->convertir($I);
                   	    $this->arrp1=array();
               	        $this->arrp1 = $this->atcanayu->sqlp1($dato["id"],$mes);
                        $dato["cantidad".$I]=$this->arrp1[0]["cantidad"];
                        $dato["monto".$I]=$this->arrp1[0]["monto"];

                   }//for
                   $tipo=$dato["tipo"];


		     }//if

                    $this->setFont("Arial","",8);
                    $this->SetWidths(array($this->anchos[4],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5]));
            		$this->SetAligns(array("L","C","C","C","R","R","R"));
            		$this->setBorder();
            		$this->RowM(array($dato["tipo"],$dato["cantidad".$this->p1],$dato["cantidad".$this->p2],$dato["cantidad".$this->p3],$this->titulosm[200],$dato["monto".$this->p1],$dato["monto".$this->p2],$dato["monto".$this->p3]));



		     }//foreach

            }//cuerpo
}//principal