<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/nomina/Nprhiscon.class.php");


class pdfreporte extends fpdf
{
  function pdfreporte()
  {
   $this->fpdf("p","mm","Letter");

   $this->codnomdes=H::GetPost("codnomdes");
   $this->codempdes=H::GetPost("codempdes");
   $this->codemphas=H::GetPost("codemphas");
   $this->codcardes=H::GetPost("codcardes");
   $this->codcondes=H::GetPost("codcondes");
   $this->codconhas=H::GetPost("codconhas");
   $this->fecnomdes=H::GetPost("fecnomdes");
   $this->fecnomhas=H::GetPost("fecnomhas");

   $this->cab = new Cabecera();

   $this->objclass = new Nprhiscon();
   $this->arrp= $this->objclass->SQLp($this->codnomdes,$this->codempdes, $this->codemphas,$this->codcardes,$this->codcondes,$this->codconhas,$this->fecnomdes,$this->fecnomhas);



  }


  function Header()
  {
      $this->getCabecera(H::GetPost("titulo"),"");

  }

  function Cuerpo()
  {
      $ref='';
      $pri=true;
      foreach($this->arrp as $registro)
      {
          	     if ($ref!=$registro["codemp"]){//imprima un emcabezado por pagina
                    if (!$pri){//agregue una pagina por empleado
          	     	  $pri=false;
                      $this->addpage();
          	     	}
	      		  $ref=$registro["codemp"];
			      $this->setFont("Arial","B",8);
			      $this->SetWidths(array(30,40,40,30,30,30));
			      $this->SetBorder(true);
			      $this->SetAligns(array('C','C','C','C','C','C'));
			      $this->RowM(array("CODIGO EMPLEADO","NOMBRE","CATEGORIA","CARGO","FECHA DE SALIDA","FECHA DE REINTEGRO"));
			      $this->SetAligns(array('C','C','C','C','C','C'));
			       $this->arrp2= $this->objclass->sqldatos($registro["codemp"]);
			      foreach($this->arrp2 as $registro2)
			      {
			      	$this->setFont("Arial","",8);
			      	$this->SetAligns(array('C','L','L','L','C','C'));
			        $this->RowM(array($registro2["cedemp"],$registro2["nomemp"],$registro2["categoria"],$registro2["cargo"],$registro2["fecing"],$registro2["fecret"]));
			      }
			      $this->ln();
			  	  $this->SetWidths(array(30,65,20,25));
			      $this->SetBorder(true);
			      $this->SetJump(5);
			      $this->setFont("Arial","B",8);
			      $this->RowM(array("Concepto","Descripcion","Fecha","Monto"));
			      $this->SetAligns(array('L','L','L','R'));
			      $this->SetJump(4);
          	      $pri=false;
         	}

      	$this->setFont("Arial","",8);
        $this->RowM(array($registro["codcon"],$registro["nomcon"],$registro["fecnom"],H::FormatoMonto($registro["monto"])));
      }
  }

}
?>