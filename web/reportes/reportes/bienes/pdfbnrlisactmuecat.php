<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/bienes/Bnrlisactmuecat.class.php");
  require_once("../../lib/general/cabecera.php");

  class pdfreporte extends fpdf
  {
    var $bd;
    var $nro;
    var $sub;

    function pdfreporte()
    {
      $this->fpdf("l","mm","Letter");
      $this->bd=new basedatosAdo();
      $this->cab=new cabecera();
      $this->titulos=array();


	    //Recibir las variables por el Post
	    $this->codubides=H::GetPost("codubides");
		$this->codubihas=H::GetPost("codubihas");
		$this->codact1=H::GetPost("codact1");
		$this->codact2=H::GetPost("codact2");
		$this->codmue1=H::GetPost("codmue1");
		$this->codmue2=H::GetPost("codmue2");
		$this->prenom=H::GetPost("prepardes");
		$this->precar=H::GetPost("preparhas");
		$this->confnom=H::GetPost("confordes");
		$this->confcar=H::GetPost("conforhas");
		$this->respondes=H::GetPost("respondes");
		$this->responhas=H::GetPost("responhas");
		$this->abscrides=H::GetPost("abscrides");
		$this->abscrihas=H::GetPost("abscrihas");

      $this->bnrlisactmuecat = new Bnrlisactmuecat();
	  $this->arrp=$this->bnrlisactmuecat->sqlp($this->codact1,$this->codact2,$this->codubides,$this->codubihas,$this->codmue1,$this->codmue2);

    }

    function Header()
    {
            $dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->settextcolor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->ln();
		    $this->settextcolor(0,0,115);
			$this->setwidths(array(20,120,20,20,20,20,30));
			$this->setaligns(array("L","L","L","L","L","L"));
			$this->setFillcolor(230,230,230);
			$this->setFillTable(1);
			$this->rowm(array('Activos','Descripción','Fecha Compra','Costo Inicial','Fecha inc.','Edo','Notas'));
			$this->Line(10,$this->GetY(),260,$this->GetY());
			$this->setFillTable(0);
		    $this->settextcolor(0,0,0);
    }

function Footer()
	{

	}


    function Cuerpo()
    {
    	$ref = "";
    	$ref2="";
    	$primeravez = true;
    	$this->sub=0;
    	$this->i=0;
    	$this->ubi='';
    	$this->encabubi=false;
    	$this->encabcat=false;
        $total=0;
    	$cat = $this->arrp[0]["codact"];
        $des = $this->arrp[0]["desact"];
    	foreach($this->arrp as $dato)
    	{
			 //categoria
             if ($dato["codact"] != $cat)
             {
               $this->ln();
               $cat = $dato["codact"];
               $this->cell(20,10," Cantidad de activos por : ".$des." : ".$this->i.' '.'Total del Costo: '.number_format($total,2,',','.'));
	           $this->encabcat=false;
	           $this->ln();
               $this->i=0;
               $total=0;
              }

			//encabezado de la categoria
               if (!$this->encabcat)
               {
                $this->settextcolor(0,0,115);
                $this->Line(10,$this->GetY()+1,260,$this->GetY()+1);
                $this->ln();
    			$this->cell(100,5,'CATEGORIA: '.$dato["desact"]);
    			$this->ln();
    	    	$this->encabcat=true;
                $this->settextcolor(0,0,0);
           	   }
            //se imprime el detalle
					$this->rowm(array($dato["codmue"],$dato["desmue"],$dato["feccom"],$dato["valini"],$dato["fecreg"],$dato["stamue"],$dato["detmue"]));
				$this->i++;
				$des=$dato["desact"];
				$total+=$dato["valini2"];
				}//fin del foreach
				     $this->ln();

             $this->cell(20,10," Cantidad de activos por : ".$des." : ".$this->i.' '.'Total del Costo: '.number_format($total,2,',','.'));
    	}// fin cuerpo
     }

?>
