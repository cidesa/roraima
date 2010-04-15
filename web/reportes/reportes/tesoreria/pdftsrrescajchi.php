<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/tesoreria/Tsrrescajchi.class.php");

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


      $this->tsrrescajchi = new Tsrrescajchi();
	  $this->arrp=$this->tsrrescajchi->sqlp($this->refsalmin,$this->refsalmax,$this->cedrifmin,$this->cedrifmax,$this->fecmin,$this->fecmax);
      $this->arrp2=$this->tsrrescajchi->montoape();

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
				$this->rowm(array('Núm. Recibo','Fecha de Emisión','Cédula','Beneficiario','Concepto','Monto'));
			    $this->ln();
				$this->setaligns(array("C","C","L","L","L","R"));

			//H::FormatoMonto
    }
    function Footer()
		{
		}
    function Cuerpo()
    {
    	$this->total=0;
    	foreach($this->arrp as $dato)
    	{
			$this->setFont("Arial","",7);//H::PrintR($dato["status"]);exit;
			$this->rowm(array($dato["refsal"],$dato["fecsal"],$dato["cedrif"],$dato["nomben"],$dato["dessal"],H::FormatoMonto($dato["monsal"])));
			$this->total+=($dato["monsal"]);
			$this->ln();
    	}
    	$this->setFont("Arial","B",9);
    	foreach($this->arrp2 as $dato2)
    	{
    	$this->setBorder(false);
    	$this->setwidths(array(30,20,20,100,20));
    	$this->setaligns(array("C","C","L","R","R","R"));
    	$this->rowm(array("","","","TOTAL: ",H::FormatoMonto($this->total)));
    	$this->rowm(array("","","","APERTURA DE CAJA DE CHICA: ",H::FormatoMonto($dato2["monapecajchi"])));
    	$this->rowm(array("","","","PORCENTAJE DE REPOSICION: ",H::FormatoMonto($dato2["porrepcajchi"]).' %'));
    	$this->rowm(array("","","","SALDO DE CAJA CHICA: ",H::FormatoMonto($dato2["monapecajchi"]-$this->total)));
    	$this->rowm(array("","","","PORCENTAJE EJECUTADO: ",H::FormatoMonto(($this->total*100)/$dato2["monapecajchi"]).' %'));
    	}

     }
  }
?>
