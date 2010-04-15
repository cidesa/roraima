<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/tesoreria/Tsrdetrelcajchi.class.php");

  class pdfreporte extends fpdf
  {
    var $bd;
    var $nro;

    function pdfreporte()
    {
      $this->fpdf("p","mm","Letter");
      $this->cab=new cabecera();
      $this->bd=new basedatosAdo();
      $this->titulos=array();

	    //Recibir las variables por el Post
	    $this->refsalmin=str_replace('*',' ',H::GetPost("refsalmin"));
	    $this->refsalmax=str_replace('*',' ',H::GetPost("refsalmax"));
	    $this->cedrifmin=str_replace('*',' ',H::GetPost("cedrifmin"));
	    $this->cedrifmax=str_replace('*',' ',H::GetPost("cedrifmax"));
	    $this->fecmin=str_replace('*',' ',H::GetPost("fecmin"));
	    $this->fecmax=str_replace('*',' ',H::GetPost("fecmax"));


      $this->tsrdetrelcajchi = new Tsrdetrelcajchi();
	  $this->arrp=$this->tsrdetrelcajchi->sqlp($this->refsalmin,$this->refsalmax,$this->cedrifmin,$this->cedrifmax,$this->fecmin,$this->fecmax);
      $this->arrp2=$this->tsrdetrelcajchi->montoape();


    }

    function Header()
    {
     	        $this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			    $this->ln(10);
			    $this->setFillcolor(255,255,255);
				$this->settextcolor(155,0,0);
				$this->setwidths(array(30,20,20,70,30,20));
				$this->setBorder(true);
				$this->setFont("Arial","B",9);
				$this->setaligns(array("C","C","C","C","C","C"));
				$this->rowm(array('Núm. Recibo','Fecha de Emisión','Cédula','Beneficiario','Concepto','Total'));
				$this->setaligns(array("C","C","L","L","L","R"));


			//H::FormatoMonto
    }
    function Footer()
		{
		}
    function Cuerpo()
    {
    	$ref="";
    	$this->total=0;
    	foreach($this->arrp as $dato)
    	{
    		if ($ref!=$dato["refsal"])
    		{
    		$this->ln();
    		$ref=$dato["refsal"];
    		$this->setwidths(array(30,20,20,70,30,20));
    		$this->setaligns(array("C","C","C","C","C","C"));
    		$this->setBorder(true);
			$this->setFont("Arial","",7);//H::PrintR($dato["status"]);exit;
			$this->rowm(array($dato["refsal"],$dato["fecsal"],$dato["cedrif"],$dato["nomben"],$dato["dessal"],H::FormatoMonto($dato["total"])));
			$this->total+=($dato["total"]);

				//CABECERA DEL DETALLE
				$this->ln();
    			$this->setwidths(array(30,90,40,30));
				$this->setBorder(false);
				$this->setFont("Arial","B",9);
				$this->setaligns(array("C","L","L","C"));
				$this->rowm(array('Codigo Art.','Descripción','Imputación Presupuestaria','Monto'));
				$this->setaligns(array("C","L","L","R"));
				$this->ln();

    		}

		   $this->setFont("Arial","",7);
           $this->rowm(array($dato["codart"],$dato["desart"],$dato["codpre"],H::FormatoMonto($dato["monsal"])));


    	}
    		$this->ln();
    		$this->line(10,$this->gety(),205,$this->gety());
    		$this->ln();
    		foreach($this->arrp2 as $dato2)
    	{
    	$this->setFont("Arial","B",9);
    	$this->setBorder(false);
    	$this->setwidths(array(30,20,20,100,20));
    	$this->setaligns(array("C","C","L","R","R","R"));
    	$this->rowm(array("","","","TOTAL GENERAL: ",H::FormatoMonto($this->total)));
    	$this->rowm(array("","","","APERTURA DE CAJA DE CHICA: ",H::FormatoMonto($dato2["monapecajchi"])));
    	$this->rowm(array("","","","PORCENTAJE DE REPOSICION: ",H::FormatoMonto($dato2["porrepcajchi"]).' %'));
    	$this->rowm(array("","","","SALDO DE CAJA CHICA: ",H::FormatoMonto($dato2["monapecajchi"]-$this->total)));
    	$this->rowm(array("","","","PORCENTAJE EJECUTADO: ",H::FormatoMonto(($this->total*100)/$dato2["monapecajchi"]).' %'));
    	}


     }
  }
?>
