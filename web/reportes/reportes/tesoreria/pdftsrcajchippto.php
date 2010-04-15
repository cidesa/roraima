<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/tesoreria/Tsrcajchippto.class.php");

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
	    $this->mincodpre=str_replace('*',' ',H::GetPost("mincodpre"));
	    $this->maxcodpre=str_replace('*',' ',H::GetPost("maxcodpre"));
	    $this->cedrifmin=str_replace('*',' ',H::GetPost("cedrifmin"));
	    $this->cedrifmax=str_replace('*',' ',H::GetPost("cedrifmax"));
	    $this->fecmin=str_replace('*',' ',H::GetPost("fecmin"));
	    $this->fecmax=str_replace('*',' ',H::GetPost("fecmax"));


      $this->tsrcajchippto = new Tsrcajchippto();
	  $this->arrp=$this->tsrcajchippto->sqlp($this->mincodpre,$this->maxcodpre,$this->fecmin,$this->fecmax);


    }

    function Header()
    {
     	        $this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
     	        $this->ln(5);
     	        $this->setFont("Arial","B",10);
                $this->cell(0,5,'Desde: '.$this->fecmin.' Hasta: '.$this->fecmax,0,0,'C');
			    $this->ln(10);
			    $this->setFillcolor(255,255,255);
				$this->settextcolor(155,0,0);
				$this->setwidths(array(46,46,46,47));
				$this->setBorder(true);
				$this->setFont("Arial","B",9);
				$this->setaligns(array("C","C","C","C"));
				$this->rowm(array('Imputación Presupuestaria','Monto','Disponibilidad','Disponibilidad Presupuestaria Proyectada de Salidas de Caja Chica'));
				$this->setaligns(array("C","R","R","R"));


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
    	   $this->arrp2=$this->tsrcajchippto->disponibilidad($dato["codpre"]);
		   $this->setFont("Arial","",7);
		   foreach($this->arrp2 as $dato2)
    	   {
            $saldo=$dato2["saldo"];
    	   }
           $this->rowm(array($dato["codpre"],H::FormatoMonto($dato["monto"]), H::FormatoMonto($saldo),H::FormatoMonto($saldo-$dato["monto"])));
    	}
    		$this->ln();
    		//$this->line(10,$this->gety(),205,$this->gety());
    		$this->ln();
    		$this->setwidths(array(30,20,20,70,30,20));
    		$this->setaligns(array("R","R","R","R"));
    		$this->setBorder(false);
    	//	$this->rowm(array("","","TOTAL GENERAL: ",H::FormatoMonto($this->total)));


     }
  }
?>
