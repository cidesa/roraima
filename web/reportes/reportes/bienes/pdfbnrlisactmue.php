<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/bienes/Bnrlisactmue.class.php");
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
		$this->prenom=H::GetPost("prepardes");
		$this->precar=H::GetPost("preparhas");
		$this->confnom=H::GetPost("confordes");
		$this->confcar=H::GetPost("conforhas");
		$this->respondes=H::GetPost("respondes");
		$this->responhas=H::GetPost("responhas");
		$this->abscrides=H::GetPost("abscrides");
		$this->abscrihas=H::GetPost("abscrihas");

      $this->bnrlisactmue = new Bnrlisactmue();
	  $this->arrp=$this->bnrlisactmue->sqlp($this->codact1,$this->codact2,$this->codubides,$this->codubihas);

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
    	$this->j=0;
    	$this->t=0;
    	$this->ubi='';
    	$this->temporal='';
    	$this->encabubi=false;
    	$this->encabcat=false;
    	$ubi = $this->arrp[0]["codubi"];
    	$cat = $this->arrp[0]["codact"];
        $des = $this->arrp[0]["desact"];
        $pri=true;
    	foreach($this->arrp as $dato)
    	{
			 //categoria
             if ($dato["codact"] != $cat)
             {

               $cat = $dato["codact"];
               $this->cell(20,10," Cantidad de activos por : ".$des." : ".$this->i);
	           $this->encabcat=false;
	           $this->ln();
               $this->i=0;
              }
			//ubicacion
    		if ($dato["codubi"] != $ubi)
				{
                $this->settextcolor(0,0,0);
				$this->encabubi=false;
	           	$this->setwidths(array(20,120,20,20,20,20,30));
				$this->setaligns(array("L","L","L","R","L","L"));
				$ubi = $dato["codubi"];
            	}
           	//encabezado de la ubicacion
    		if (!$this->encabubi)
    		   {
    		   	if (!$pri){
               $this->Line(10,$this->GetY(),260,$this->GetY());
               $this->ln(2);
               $this->cell(20,10," Cantidad Total por Ubicacion : ".$this->temporal." : ".$this->j);
               $this->Line(10,$this->GetY()+10,260,$this->GetY()+10);
               $this->j=0;
    		   	}
 			   $this->ln();
               $this->settextcolor(155,0,0);
               $this->MultiCell(150,5,'UBICACIÓN:  '.$dato["desubi"]);
               $this->Line(10,$this->GetY(),260,$this->GetY());
               $this->Line(10,$this->GetY()+1,260,$this->GetY()+1);
               $this->ln();
               $this->encabubi=true;
               $this->settextcolor(0,0,0);
               $this->temporal=$dato["desubi"];
               $pri=false;
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
            $this->setaligns(array("L","L","L","R","L","L"));
	$this->rowm(array($dato["codmue"],$dato["desmue"],$dato["feccom"],H::FormatoMonto($dato["valini"]),$dato["fecreg"],$dato["stamue"],$dato["detmue"]));
$this->i++;
$this->j++;
$this->t++;
$des=$dato["desact"];
				}//fin del foreach
			   $this->Line(10,$this->GetY(),260,$this->GetY());
               $this->ln(2);
               $this->cell(20,10," Cantidad Total por Ubicacion : ".$this->temporal." : ".H::FormatoMonto($this->j));
               $this->Line(10,$this->GetY()+10,260,$this->GetY()+10);
               $this->Line(10,$this->GetY(),260,$this->GetY());
               $this->ln(2);
               $this->Line(10,$this->GetY()+10,260,$this->GetY()+10);
               $this->ln();
               	$this->setFont("Arial","B",12);
               $this->cell(20,10," Total General : ".H::FormatoMonto($this->t));
               $this->t=0;
    	}// fin cuerpo
     }

?>
