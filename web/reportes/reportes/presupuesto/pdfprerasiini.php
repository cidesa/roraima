<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
 require_once("../../lib/general/cabecera.php");
  //	require_once("../../lib/general/cabecera.php");
  require_once("../../lib/general/Herramientas.class.php");
  require_once("../../lib/modelo/sqls/presupuesto/Prerasiini.class.php");
  class pdfreporte extends fpdf
  {
    var $bd;
    var $titulos;
    var $titulos2;
    var $anchos;
    var $anchos2;
    var $campos;
    var $sql1;
    var $sql2;
    var $rep;
    var $numero;
    var $cab;
    var $nivel1;
    var $nivel2;
    var $nivel3;
    var $periodo1;
    var $periodo2;
    var $anno;
    var $codpredesde;
    var $codprehasta;
    var $comodin;
    var $conf;
    var $lonivdesde;
    var $lonivhasta;
    var $anoini;
    var $anofin;
    var $montoacu=0;
    var $montotal=0;

    function pdfreporte()
    {
      $this->conf="p";
      $this->fpdf($this->conf,"mm","Letter");
      $this->bd=new basedatosAdo();
      $this->titulos=array();
      $this->titulos2=array();
      $this->campos=array();
      $this->anchos=array();
      $this->anchos2=array();
      $this->nivel1=H::GetPost("nivel1");
      $this->nivel2=H::GetPost("nivel2");
      $this->periodo1="00";#H::GetPost("periodo1");
      $this->periodo2="00";#H::GetPost("periodo2");
      $this->codpredesde=H::GetPost("codpredesde");
      $this->codprehasta=H::GetPost("codprehasta");
      $this->comodin=H::GetPost("comodin");
      $this->nivel3=H::GetPost("nivel3");
      	$this->revisado=H::GetPost("revisado");
			$this->conformado=H::GetPost("conformado");
      $prerasiini= new Prerasiini();
      $this->lonnivdes=$prerasiini->sql_cpniveles($this->nivel1);
      $this->lonnivhas=$prerasiini->sql_cpniveles($this->nivel2);
      $this->lonopc=$prerasiini->sql_cpniveles2($this->nivel3);
	  $this->loncat = $prerasiini->sql_cat();
      $this->anno=$prerasiini->sql_cpdefniv();
      $this->arrp=$prerasiini->sqlp($this->lonnivdes,$this->lonnivhas,$this->lonopc,$this->codpredesde,$this->codprehasta,$this->periodo1,$this->periodo2,$this->comodin);
      $this->llenartitulosmaestro();
      unset($prerasiini);
      	$this->cab=new cabecera();
    }

    function llenartitulosmaestro()
    {
     $this->titulos[0]="Código Presupuestario";
     $this->titulos[1]="Descripción";
     $this->titulos[2]="Asignado";
     $this->anchos[0]=45;
     $this->anchos[1]=120;
     $this->anchos[2]=30;
    }

    function Header()
    {
	  $dir = parse_url($_SERVER["HTTP_REFERER"]);
	  $parte = explode("/",$dir["path"]);
	  $ubica = count($parte)-2;
	// $this->getCabecera(H::GetPost("titulo"),"");
	  $this->cab->poner_cabecera_f_b($this,$_POST["titulo"],$this->conf,"s","s");

      $this->setFont("Arial","B",9);
      $this->cell(8,-8,'                      Año:'.$this->anno[0][0]);
      $this->ln(1);
      $ncampos=count($this->titulos);
      for($i=0;$i<$ncampos;$i++)
      {
        $this->cell($this->anchos[$i],5,$this->titulos[$i]);
      }
      $this->ln(2);
      $this->Line(10,43,200,43);
      $this->ln(10);
    }

    function Cuerpo()
    {
      $acumtot=0;
      $acumgru=0;
	  $ref="";
	  $conref=$this->lonopc[0][0];

      foreach($this->arrp as $datos)
	  {
	  	   if($ref!=substr($datos['codigopre'],0,$conref) && strlen(trim(substr($datos['codigopre'],0,$conref)))==$conref)
		   {
		   	  if($ref and $acumgru>0)
			  {
			  	  $this->setAutoPagebreak(false);
			      $this->setFont("Arial","B",7);
			      $this->cell($this->anchos[0],3,' TOTAL PARTIDA '.substr($ref,$this->loncat[0][0]),0,0);
			      $this->cell($this->anchos[1],3,'',0,0);
			      $this->cell(17,3,H::FormatoMonto($acumgru),0,0,"R");
				  $this->ln(6);
			  	  $acumgru=0;
				  $this->setAutoPagebreak(true,25);
			  }
		   }
		   $this->setFont("Arial","",7);
		   $this->cell($this->anchos[0]+10,3,$datos["codigopre"]);
	       $x=$this->GetX();
		   $this->cell($this->anchos[1]);
		   $this->cell(7,3,H::FormatoMonto($datos["monasi"]),0,0,"R");
		   $this->SetX($x-10);
	       $this->MultiCell($this->anchos[1],3,$datos["nombre"]);
		   $this->ln();
		   if (strlen(trim($datos["codigopre"]))==$this->lonnivhas[0][0])
	       {
	       	 $acumtot+=$datos["monasi"];
	       	 $acumgru+=$datos["monasi"];
	       }
		   $ref=substr($datos['codigopre'],0,$conref);
	  }#FIN CICLO
      #TOTALES
      $this->setautopagebreak(false);
      $this->ln(4);
	  $this->setFont("Arial","B",7);
      $this->cell($this->anchos[0],3,' TOTAL PARTIDA '.substr($ref,$this->loncat[0][0]),0,0);
      $this->cell($this->anchos[1],3,'',0,0);
      $this->cell(17,3,H::FormatoMonto($acumgru),0,0,"R");
	  $this->ln(6);
      $this->setFont("Arial","B",8);
      $this->Line(10,$this->getY(),200,$this->getY());
      $this->cell($this->anchos[0],5,' TOTAL GENERAL',0,0);
      $this->cell($this->anchos[1],5,'',0,0);
      $this->cell(17,5,H::FormatoMonto($acumtot),0,0,"R");
       $this->sety(240);
            $this->SetWidths(array(100,100));
		    $this->SetAligns(array("C","C"));
		    $this->SetBorder(1);
            $this->ln();
			$this->Row(array("REVISADO","CONFORMADO"));
			// $this->ln();
			$this->setJump(8);
		    $this->Row(array($this->revisado,$this->conformado));
		    $this->setJump(2);
		     $this->setFont("Arial","B",7);
		     $this->Row(array("Analista de Presupuesto","Director de la Oficina de Planificación y Presupuesto"));

	}
  }






/*
	  	$reg++;

        if($this->nivel1==$this->nivel2 && $this->lonopc[0][0]!=0)
        {
       	 if ($grupo!="" && $grupo!=$datos["grupo"])
       	 {
	      $this->Line(10,$this->getY(),200,$this->getY());
	      $this->cell($this->anchos[0],5,' SUBTOTAL');
	      $this->cell($this->anchos[1],5,'');
	      $this->cell($this->anchos[2],5,H::FormatoMonto($this->acumgru),0,0,"R");
	      $this->ln(5);
	      $this->acumgru=0;
       	 }
       	 $grupo=$datos["grupo"];
        }
		else{




      }

      if($this->nivel1==$this->nivel2 && $this->lonopc[0][0]!=0)
      {
       $this->ln(4);
       $this->Line(10,$this->getY(),200,$this->getY());
       $this->cell($this->anchos[0],5,' Subtotal');
       $this->cell($this->anchos[1],5,'');
       $this->cell($this->anchos[2],5,H::FormatoMonto($this->acumgru),0,0,"R");
      }

      }

    }
  }*/
?>